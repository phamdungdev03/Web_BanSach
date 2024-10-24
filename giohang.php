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
      function update_cart($add = false)
      {
        foreach ($_POST['quantity'] as $id => $quantity) {
          if ($quantity == 0) {
            unset($_SESSION["cart"][$id]);
          } else {
            if ($add) {
              $_SESSION["cart"][$id] += $quantity;
            } else {
              $_SESSION["cart"][$id] = $quantity;
            }
          }
        }
      }
      switch ($_GET['action']) {
        case "add";
          // var_dump($_POST);exit;
          update_cart(true);
          // var_dump( $_SESSION["cart"]);exit;
          header("location:giohang.php");
          break;
        case "delete":
          if (isset($_GET['id'])) {
            unset($_SESSION["cart"][$_GET['id']]);
          }
          header("location:giohang.php");
          break;
        case "submit":
          if (isset($_POST['update_click'])) { // cập nhật số lượng sản phẩm
            update_cart();
            header("location:giohang.php");
          } else if (isset($_POST['order_click'])) // đặt hàng sản phẩm
          {
            if (empty($_POST['ten'])) {
              $error = "Bạn chưa nhập tên của người nhận";
            } else if (empty($_POST['sdt'])) {
              $error = "Bạn chưa nhập số điện thoại";
            } else if (empty($_POST['city'])) {
              $error = "Bạn chưa chưa chọn tỉnh thành phố";
            } else if (empty($_POST['district'])) {
              $error = "Bạn chưa chưa chọn quận huyện";
            } else if (empty($_POST['ward'])) {
              $error = "Bạn chưa chưa chọn xa phuong";
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
    if (!empty($_SESSION["cart"])) {
      $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

      $sql = " SELECT * FROM `san_pham` WHERE `product_id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")";
    }
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
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (!empty($sql)) {
                $result = mysqli_query($conn, $sql);
                $total = 0;
                $index = 1;
                while ($row = mysqli_fetch_array($result)) {   ?>
                  <tr>
                    <td><?= $index; ?></td>
                    <td><?= $row["product_name"] ?></td>
                    <td><img src="./hinh_anh/didong/<?= $row["product_image"] ?>" alt=""></td>
                    <td class="gia"><?= $parsed_gia = number_format($row["price"], 0, ",", ","); ?>₫</td>
                    <td><input size="1" name="quantity[<?= $row["product_id"] ?>]" type="text" value="<?= $_SESSION["cart"][$row["product_id"]] ?>"></td>
                    <td class="gia"><?= $parsed_gia = number_format($_SESSION["cart"][$row["product_id"]] * $row["price"], 0, ",", ","); ?>₫ </td>
                    <td><a href="giohang.php?action=delete&id=<?= $row["product_id"] ?>" style=" text-decoration: none;">
                        <div class="remove">Xóa</div>
                      </a></td>
                  </tr>
                <?php
                  $total += $_SESSION["cart"][$row["product_id"]] * $row["price"];
                  $index++;
                } ?>
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
        <div>
          <select id="city" name="city">
            <option value="" name="city" selected>Chọn tỉnh thành</option>
          </select>

          <select id="district" name="district">
            <option value="" name="district" selected>Chọn quận huyện</option>
          </select>

          <select id="ward" name="ward">
            <option value="" name="ward" selected>Chọn phường xã</option>
          </select>


        </div>
        <input type="text" name="diachicuthe" placeholder="Địa chỉ cụ thể" />
        <input type="email" name="email" placeholder="Email" />
        <input class="checkout" type="submit" name="order_click" value="Đặt hàng">
        <!-- <button class="checkout">Tiến hành đặt hàng</button> -->
      </div>
      </form>
      <div align="center" style="margin: 30px 0">

        <button class="buttont" onclick="addToT()">Thêm sản phẩm khác</button>


      </div>
      <footer style="margin-top:20px;">
        <div class="footer-ct">
          <p>Nguyễn Phi Hùng - 10/08/2002 </p>
          <p>Website bán điện thoại di động &copy; 2023</p>
        </div>

      </footer>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
      <script>
        function addToT() {
          <?php

          echo "window.location.href='index.php';";
          ?>
        }
        //   xử lý địa chỉ
        const host = "https://provinces.open-api.vn/api/";
        var callAPI = (api) => {
          return axios.get(api)
            .then((response) => {
              renderData(response.data, "city");
            });
        }
        callAPI('https://provinces.open-api.vn/api/?depth=1');
        var callApiDistrict = (api) => {
          return axios.get(api)
            .then((response) => {
              renderData(response.data.districts, "district");
            });
        }
        var callApiWard = (api) => {
          return axios.get(api)
            .then((response) => {
              renderData(response.data.wards, "ward");
            });
        }

        var renderData = (array, select) => {
          let row = ' <option disable value="">Chọn</option>';
          array.forEach(element => {
            row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
          });
          document.querySelector("#" + select).innerHTML = row
        }

        $("#city").change(() => {
          callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
          printResult();
        });
        $("#district").change(() => {
          callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
          printResult();
        });
        $("#ward").change(() => {
          printResult();
        })

        var printResult = () => {
          if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
            $("#ward").find(':selected').data('id') != "") {
            let result = $("#city option:selected").text() +
              " | " + $("#district option:selected").text() + " | " +
              $("#ward option:selected").text();
            $("#result").text(result)
          }

        }
      </script>
  <?php }
  } else {
    echo "Bạn không thể thêm hoặc vào giỏ hàng vì chưa đăng nhập. Vui lòng đăng nhập tại đây.<a href='dangnhap.php'>Đăng nhập</a>";
  }
  ?>
</body>

</html>