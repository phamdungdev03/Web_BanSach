<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./giohang.css">

  <link rel="shortcut icon" href="./hinh_anh/logomb.png" />
  <title>Giỏ hàng</title>
</head>

<body>
  <?php include 'header.php' ?>
  <?php
  include 'config.php';
  if (isset($_SESSION['username'])) {
    if (!isset($_SESSION["cart"])) {
      $_SESSION["cart"] = array();
    }
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

      function updateCart($cart_id, $product_id, $quantity)
      {
        include 'config.php';
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
        if ($quantity > 0) {
          $sql = "UPDATE chi_tiet_gio_hang SET quantity = $quantity Where cart_id = $cart_id and product_id = $product_id";
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
      switch ($_GET['action']) {
        case "add";
          $customer_id = $_SESSION['user_id'];
          if (isset($_POST['quantity'])) {
            foreach ($_POST['quantity'] as $productID => $quantity) {
              addToCart($customer_id, $productID, $quantity);
            }
          }
          header("location:giohang.php");
          break;
        case "delete":
          if (isset($_GET['id']) && isset($_GET['cart_id'])) {
            $cart_item_id = intval($_GET['id']);
            $cart_id = intval($_GET['cart_id']);
            deleteCart($cart_id, $cart_item_id);
          }
          header("location:giohang.php");
          break;
        case "submit":
          if (isset($_POST['update_click'])) {
            $cart_id = intval($_POST['cart_id']);
            $quantity = intval($_POST['quantity']);
            $product_id = intval($_POST['product_id']);
            updateCart($cart_id, $product_id, $quantity);
            header("location:giohang.php");
          } else if (isset($_POST['order_click'])) // đặt hàng sản phẩm
          {
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
            if ($error == false && !empty($_POST['quantity'])) { // xử lý lưu giỏ hàng bằng database
              //  var_dump($_POST['quantity']);
              $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
              //  SELECT * FROM `san_pham` WHERE `product_id` IN (2,3)

              $sql = "SELECT * FROM `san_pham` WHERE `product_id` IN (" . implode(",", array_keys($_POST["quantity"])) . ")";
              $result = mysqli_query($conn, $sql);
              $total = 0;
              $orderProducts = array();
              while ($row = mysqli_fetch_array($result)) {
                $orderProducts[] = $row;
                $total += $row['price'] * $_POST['quantity'][$row['product_id']];
              }
              //----------------------

              // Lấy mã khách hàng từ cơ sở dữ liệu
              $queryy = "SELECT customer_id FROM khach_hang WHERE username = '" . $_SESSION['username'] . "'";
              $resultkh = mysqli_query($conn, $queryy);
              $roww = mysqli_fetch_assoc($resultkh);
              $ma_khach_hang = $roww['customer_id'];

              //-----------------
              //    INSERT INTO `don_hang`(`order_id`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `total_amount`, `order_date`, `order_status`, `customer_id`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]')
              $sql2 = "INSERT INTO `don_hang`( `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `total_amount`, `order_date`, `order_status`)
                  VALUES ('" . $_POST['ten'] . "','" . $_POST['city'] . " - " . $_POST['district'] . " - " . $_POST['ward'] . " - " . $_POST['diachicuthe'] . "','" . $_POST['email'] . "','" . $_POST['sdt'] . "','" . $total . "','" . time() . "','1')";
              $inserntOrder = mysqli_query($conn, $sql2);
              $last_id = mysqli_insert_id($conn);
              $insentString = "";
              foreach ($orderProducts as $key => $product) {
                $insentString .= "(
                      '" . $last_id . "', 
                      '" . $product['product_name'] . "', 
                      '" . $product['price'] . "', 
                      '" . $_POST['quantity'][$product['product_id']] . "', 
                      '" . ($product['price'] * $_POST['quantity'][$product['product_id']]) . "', 
                      '" . $ma_khach_hang . "', 
                      '" . $product['product_id'] . "'
                    )";
                if ($key != count($orderProducts) - 1) {
                  $insentString .= ",";
                }
              }
              /* INSERT INTO `chi_tiet_don_hang` (`order_id`, `product_name`, `price`, `quantity`, `total_amount`, `customer_id`, `product_id`)
VALUES ('[value-1a]', '[value-2a]', '[value-3a]', '[value-4a]', '[value-5a]', '[value-6a]', '[value-7a]'),
('[value-1b]', '[value-2b]', '[value-3b]', '[value-4b]', '[value-5b]', '[value-6b]', '[value-7b]');*/
              $sql3 = "INSERT INTO `chi_tiet_don_hang` (`order_id`, `product_name`, `price`, `quantity`, `total_amount`, `customer_id`, `product_id`) VALUES " . $insentString . ";";
              $inserntOrder = mysqli_query($conn, $sql3);
              $success = "Đặt hàng thành công";
              unset($_SESSION['cart']);
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
    <br><br><br>
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
      <a href="index.php" style=" margin-left: 245px;   text-decoration: none;">&larr; Trang chủ</a>
      <br><br>
      <div id="cart">

        <h2>Giỏ hàng của bạn</h2>
        <form action="giohang.php?action=submit" method="POST">
          <table align="center">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($result && mysqli_num_rows($result) > 0) {
                $total = 0;
                $index = 1;
                while ($row = mysqli_fetch_array($result)) {   ?>
                  <tr>
                    <td><?= $index; ?></td>
                    <td><?= $row["product_name"] ?></td>
                    <td><img src="./hinh_anh/didong/<?= $row["product_image"] ?>" alt=""></td>
                    <td class="gia"><?= number_format($row["price"], 0, ",", ","); ?>₫</td>
                    <td><input size="1" name="quantity" type="number" value="<?= $row["quantity"] ?>"></td>
                    <input type="hidden" name="cart_id" value="<?= $row["cart_id"] ?>">
                    <input type="hidden" name="product_id" value="<?= $row["product_id"] ?>">
                    <td class="gia"><?= number_format($row["quantity"] * $row["price"], 0, ",", ","); ?>₫</td>
                    <td><a href="giohang.php?action=delete&id=<?= $row["id"] ?>&cart_id=<?= $row["cart_id"] ?>" style="text-decoration: none;">
                        <div class="remove">Xóa</div>
                      </a></td>
                  </tr>
                <?php
                  $total += $row["quantity"] * $row["price"];
                  $index++;
                }
                ?>
            </tbody>

            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <p>Tổng tiền: <span class="gia"><?= $parsed_gia = number_format($total, 0, ",", ","); ?>₫</span></p>
              </td>
              <td></td>

            </tr>
          <?php
              }

          ?>
          </table>
          <div id="form-button">
            <input class="update" type="submit" name="update_click" value="Cập nhật">
          </div>


      </div>
      <div class="total">
        <input type="text" name="ten" placeholder="Người nhận" />
        <input type="text" name="sdt" placeholder="Số điện thoại" />
        <input type="text" name="diachicuthe" placeholder="Địa chỉ cụ thể" />
        <input type="email" name="email" placeholder="Email" />
        <input class="checkout" type="submit" name="order_click" value="Đặt hàng">
        <!-- <button class="checkout">Tiến hành đặt hàng</button> -->
      </div>
      </form>
      <div align="center" style="margin: 30px 0">

        <button class="buttont" onclick="addToT()">Thêm sản phẩm khác</button>


      </div>
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
</body>

</html>