<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./giohang.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="shortcut icon" href="./hinh_anh/logomb.png" />
  <title>Giỏ hàng</title>
</head>

<body>
  <?php include 'header.php' ?>
  <?php
  include 'config.php';
  if (isset($_SESSION['username'])) {
    $error = false;
    $success = false;
    if (isset($_GET['action'])) {
      function addToCart($customer_id, $product_id, $quantity)
      {
        include 'config.php';
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
        $sql1 = "SELECT cart_id FROM gio_hang WHERE customer_id = $customer_id";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
          $row = $result1->fetch_assoc();
          $cart_id = $row['cart_id'];
        } else {
          $sql2 = "INSERT INTO gio_hang (customer_id) VALUES ($customer_id)";
          if ($conn->query($sql2) === TRUE) {
            $cart_id = $conn->insert_id;
          } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
            return;
          }
        }

        $sql3 = "SELECT quantity FROM chi_tiet_gio_hang WHERE cart_id = $cart_id AND product_id = $product_id";
        $result3 = $conn->query($sql3);

        $sql7 = "SELECT * from san_pham where product_id = $product_id";
        $resultProduct = $conn->query($sql7);

        if ($resultProduct->num_rows > 0) {
          $product = $resultProduct->fetch_assoc();
          $price = $product['price'];
        }

        if ($result3->num_rows > 0) {

          $row = $result3->fetch_assoc();
          $new_quantity = $row['quantity'] + $quantity;
          $sql4 = "UPDATE chi_tiet_gio_hang SET quantity = $new_quantity WHERE cart_id = $cart_id AND product_id = $product_id";
          $conn->query($sql4);
        } else {
          $sql5 = "INSERT INTO chi_tiet_gio_hang (cart_id, product_id, quantity, price) VALUES ($cart_id, $product_id, $quantity, $price)";
          $conn->query($sql5);
        }
      }

      function updateCart($cart_item_id, $product_id, $quantity)
      {
        include 'config.php';
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
        if ($quantity > 0) {
          $sql = "UPDATE chi_tiet_gio_hang SET quantity = $quantity Where id = $cart_item_id and product_id = $product_id";
          $conn->query($sql);
        }
      }

      function deleteCart($cart_id, $cart_item_id)
      {
        include 'config.php';
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
        $sql = "DELETE FROM chi_tiet_gio_hang WHERE id = $cart_item_id";
        $conn->query($sql);

        $sql_check = "SELECT COUNT(*) as total FROM chi_tiet_gio_hang WHERE cart_id = $cart_id";
        $result = $conn->query($sql_check);
        if ($result) {
          $row = $result->fetch_assoc();
          $total = $row['total'];
          if ($total == 0) {
            $sql_delete = "DELETE FROM gio_hang where cart_id = $cart_id";
            $conn->query($sql_delete);
          }
        }
      }

      function deleteCartWhenByProduct($customerId, $conn)
      {
        $sql1 = "SELECT cart_id FROM gio_hang WHERE customer_id = $customerId";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
          $row = $result1->fetch_assoc();
          $cart_id = $row['cart_id'];
          $sql2 = "SELECT id FROM chi_tiet_gio_hang WHERE cart_id = $cart_id";
          $result2 = $conn->query($sql2);

          if ($result2->num_rows > 0) {
            while ($itemRow = $result2->fetch_assoc()) {
              $cart_item_id = $itemRow['id'];
              deleteCart($cart_id, $cart_item_id);
            }
          }
        }
      }

      switch ($_GET['action']) {
        case "add";
          $customer_id = $_SESSION['user_id'];
          if (isset($_POST['quantity'])) {
            foreach ($_POST['quantity'] as $productID => $quantity) {
              addToCart($customer_id, $productID, $quantity);
            }
          }
          // header("location:giohang.php");
          break;
        case "delete":
          if (isset($_GET['id']) && isset($_GET['cart_id'])) {
            $cart_item_id = intval($_GET['id']);
            $cart_id = intval($_GET['cart_id']);
            deleteCart($cart_id, $cart_item_id);
          }
          // header("location:giohang.php");
          break;
        case "edit":
          $cart_item_id = intval($_POST['cart_item_id']);
          $quantity = intval($_POST['quantity']);
          $product_id = intval($_POST['product_id']);
          updateCart($cart_item_id, $product_id, $quantity);
          // header("location:giohang.php");
          break;
        case "submit":
          if (isset($_POST['order_click'])) {
            if (empty($_POST['ten'])) {
              $error = "Bạn chưa nhập tên của người nhận";
            } else if (empty($_POST['sdt'])) {
              $error = "Bạn chưa nhập số điện thoại";
            } else if (empty($_POST['diachicuthe'])) {
              $error = "Bạn chưa chưa nhập địa chỉ cụ thể";
            } else if (empty($_POST['email'])) {
              $error = "Bạn chưa chưa nhập email";
            } else if (empty($_POST['quantity'])) {
              $error = "Giỏ hàng rỗng";
            }
            if ($error == false && !empty($_POST['quantity'])) {
              $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
              $customer_id = $_SESSION['user_id'];

              $sql = "SELECT cart_id FROM gio_hang WHERE customer_id = $customer_id";
              $resultCartItem = $conn->query($sql);
              if ($resultCartItem->num_rows > 0) {
                $row = $resultCartItem->fetch_assoc();
                $cart_id = $row['cart_id'];
              }

              $resultUser = $conn->query("SELECT * from khach_hang where customer_id = $customer_id");
              $sql2 = "SELECT * FROM chi_tiet_gio_hang WHERE cart_id = $cart_id";
              $result2 = $conn->query($sql2);

              $total_amount = 0;
              if ($result2->num_rows > 0) {
                while ($itemRow = $result2->fetch_assoc()) {
                  $total = $itemRow["quantity"] * $itemRow["price"];
                  $total_amount += $total;
                }
              }

              $userRow = $resultUser->fetch_assoc();
              $customer_name = $userRow['customer_name'];
              $customer_address = $userRow['customer_address'];
              $customer_email = $userRow['customer_email'];
              $customer_phone = $userRow['customer_phone'];

              $order_date = date('Y-m-d H:i:s');
              $order_status = '1';
              $sql2 = "INSERT INTO `don_hang`( `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `total_amount`, `order_date`, `order_status`)
                  VALUES ('$customer_name', '$customer_address', '$customer_email', '$customer_phone', '$total_amount', '" . time() . "', '$order_status')";
              $inserntOrder = mysqli_query($conn, $sql2);
              $last_id = mysqli_insert_id($conn);

              $sql4 = "SELECT * FROM chi_tiet_gio_hang WHERE cart_id = $cart_id";
              $result4 = $conn->query($sql4);
              if ($result4->num_rows > 0) {
                while ($itemRow = $result4->fetch_assoc()) {
                  $price = $itemRow['price'];
                  $quantity = $itemRow['quantity'];
                  $product_id = $itemRow['product_id'];
                  $sql3 = "INSERT INTO `chi_tiet_don_hang` (`order_id`, `price`, `quantity`, `customer_id`, `product_id`) VALUES ('$last_id', '$price','$quantity','$customer_id','$product_id')";
                  $inserntOrder = mysqli_query($conn, $sql3);
                }
                $success = "Đặt hàng thành công";
              }
              deleteCartWhenByProduct($customer_id, $conn);
            }
          }
          break;
      }
    }
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
    $customer_id = $_SESSION['user_id'];
    $sql = "SELECT san_pham.product_name, san_pham.product_image,gio_hang.cart_id,chi_tiet_gio_hang.id, chi_tiet_gio_hang.price, chi_tiet_gio_hang.quantity, chi_tiet_gio_hang.product_id 
        FROM gio_hang 
        JOIN chi_tiet_gio_hang ON gio_hang.cart_id = chi_tiet_gio_hang.cart_id 
        JOIN san_pham ON chi_tiet_gio_hang.product_id = san_pham.product_id
        WHERE gio_hang.customer_id = $customer_id";
    $result = mysqli_query($conn, $sql);
  ?>
    <br>
    <br>
    <?php if (!empty($error)) { ?>
      <div style=" margin-left: 245px;" id="notify-msg">

        <?= $error ?>. <a href="javascript:history.back()">Quay lại</a>

      </div>
    <?php } else if (!empty($success)) { ?>
      <div style=" margin-left: 245px;" id="notify-msg">

        <?= $success ?>. <a href="donhang.php">Tiếp tục vào trang đơn hàng</a>

      </div>
    <?php
    } else { ?>
      <div id="cart" class="container">
        <div class="cart-head">
          <p>Giỏ hàng của bạn</p>
          <span>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
              $totalProducts = mysqli_num_rows($result);
              echo "<strong>$totalProducts</strong> sản phẩm";
            }
            ?>
          </span>
        </div>
        <form action="giohang.php?action=submit" method="POST">
          <div class="cart-left">
            <div class="cart-title">
              <div class="cart-title-title">
                <p>Sản Phẩm</p>
              </div>
              <div class="cart-title-content">
                <p>Giá</p>
                <p>Số lượng</p>
                <p>Tổng tiền</p>
              </div>
            </div>
            <div class="cart-content">
              <?php
              if ($result && mysqli_num_rows($result) > 0) {
                $total = 0;
                while ($row = mysqli_fetch_array($result)) {   ?>
                  <div class="cart-item">
                    <div class="cart-item-left">
                      <img src="./hinh_anh/uploads/<?= $row["product_image"] ?>" alt="">
                      <p><?= $row["product_name"] ?></p>
                    </div>
                    <div class="cart-item-center">
                      <span class="cart-item-center__price"><?= number_format($row["price"], 0, ",", ","); ?>₫</span>
                      <div class="cart-item-center__quantity">
                        <span id="prev" data-product_id="<?= $row["product_id"] ?>" data-cart-id="<?= $row["id"] ?>">-</span>
                        <input id="quantity" name="quantity" type="number" min="1" value="<?= $row["quantity"] ?>" data-product_id="<?= $row["product_id"] ?>" data-cart-id="<?= $row["id"] ?>">
                        <span id="add" data-product_id="<?= $row["product_id"] ?>" data-cart-id="<?= $row["id"] ?>">+</span>
                      </div>
                      <span class="cart-item-center__total"><?= number_format($row["quantity"] * $row["price"], 0, ",", ","); ?>₫</span>
                    </div>
                    <a class="cart-remove" href="giohang.php?action=delete&id=<?= $row["id"] ?>&cart_id=<?= $row["cart_id"] ?>" style="text-decoration: none;">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </div>
                  <hr>
                <?php
                  $total += $row["quantity"] * $row["price"];
                }
                ?>
              <?php } ?>
            </div>
          </div>
          <div class="cart-center">
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
            ?>
              <div class="cart-detail">
                <p>Thông tin đơn hàng</p>
                <span>Số lượng: <strong><?php echo $totalProducts; ?></strong> sản phẩm</span>
                <span>Tổng số tiền: <strong><?php echo number_format($total, 0, ',', '.'); ?>đ</strong></span>
              </div>
              <hr>
            <?php
            }
            ?>
            <div class="cart-shipping">
              <p>Thông tin nhận hàng</p>
              <div class="cart-shipping-input">
                <input type="text" name="ten" placeholder="Người nhận" />
                <input type="text" name="sdt" placeholder="Số điện thoại" />
                <input type="text" name="diachicuthe" placeholder="Địa chỉ cụ thể" />
                <input type="email" name="email" placeholder="Email" />
              </div>
              <input class="checkout" type="submit" name="order_click" value="Đặt hàng">
            </div>
          </div>
      </div>
      </form>
      <form id="updateCartForm" action="giohang.php?action=edit" method="POST" style="display:none;">
        <input type="hidden" name="cart_item_id" id="hiddenCartId">
        <input type="hidden" name="product_id" id="hiddenProductId">
        <input type="hidden" name="quantity" id="hiddenQuantity">
      </form>
      <!-- <div align="center" style="margin: 30px 0">
        <button class="buttont" onclick="addToT()">Thêm sản phẩm khác</button>
      </div> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
      <script>
        function addToT() {
          <?php

          echo "window.location.href='index.php';";
          ?>
        }
      </script>
  <?php
    }
  } else {
    echo "Bạn không thể thêm hoặc vào giỏ hàng vì chưa đăng nhập. Vui lòng đăng nhập tại đây.<a href='dangnhap.php'>Đăng nhập</a>";
  }
  ?>
  <script>
    document.querySelectorAll('.cart-item-center__quantity').forEach(countdown => {
      const prev = countdown.querySelector('#prev');
      const add = countdown.querySelector('#add');
      const quantityInput = countdown.querySelector('#quantity');

      prev.onclick = () => {
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
          quantityInput.value = currentValue - 1;
          updateHidden(prev, quantityInput.value);
        }
      }

      add.onclick = () => {
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
        updateHidden(add, quantityInput.value);
      }
    });

    function updateHidden(element, quantity) {
      const cartId = element.dataset.cartId;
      const productId = element.dataset.product_id;
      document.getElementById('hiddenCartId').value = cartId;
      document.getElementById('hiddenProductId').value = productId;
      document.getElementById('hiddenQuantity').value = quantity;
      document.getElementById('updateCartForm').submit();
    }
  </script>
</body>

</html>