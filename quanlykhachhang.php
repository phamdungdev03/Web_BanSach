<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang chủ quản lý</title>
  <link rel="stylesheet" href="admin.css">
  <style>
  </style>
</head>

<body>
  <div class="header">
    <div class="logo">HUNG MOBILE</div>
    <div class="user-info">
      <?php
      session_start();
      if (isset($_SESSION['username'])) {
        echo "<a href='thoat.php' >Đăng xuất</a>";
        echo "<p>Chào mừng,<br>" . $_SESSION['username'] . "</p>";
      } else {
        echo  "<a href='dangnhap.php'>Đăng nhập</a>";
      }
      ?>
    </div>
  </div>
  <header>
    <nav>
      <ul class="nav-links">
        <li>
          <div class="menu">
            <a href="indexadmin.php">Trang chủ</a>
          </div>
        </li>
        <li>
          <div class="menu">
            <a href="quanlysanpham.php">Sản phẩm</a>
          </div>
        </li>
        <li>
          <div class="menu">
            <a href="quanlydanhmuc.php">Danh mục</a>
          </div>
        </li>
        <li>
          <div class="menu">
            <a href="quanlydonhang.php">Đơn hàng</a>
          </div>
        </li>
        <li>
          <div class="menu">
            <a href="quanlykhachhang.php">Khách hàng</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>
  <section class="hero">
    <div class="hero-text">
      <?php

      include 'config.php';
      $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
      $sql = "SELECT * FROM `khach_hang` WHERE `vaitro_id` = 2";
      $result = mysqli_query($conn, $sql);


      ?>
      <div class="div1">
        <h3 align="center">Liệt kê khách hàng</h3>
      </div>
      </table>
      <table class="bangchinh" border="1" align="center" cellspacing="0" width="100%">
        <tr>
          <td colspan="7" align="center">
            <button type="button" class="brcl1"> <a style="text-decoration: none;color: aliceblue;" href="themkhachhang.php">Thêm mới khách hàng</a> </button>
          </td>

        </tr>
        <tr>
          <th>STT</th>
          <th>Mã khách hàng</th>
          <th>Tên khách hàng</th>
          <th>Địa chỉ</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th>Tác vụ</th>
        </tr>
        <?php
        $index = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $index++;
          $ma = $row['customer_id'];
          $ten = $row['customer_name'];
          $diachi = $row['customer_address'];
          $email = $row['customer_email'];
          $phone = $row['customer_phone'];
        ?>
          <tr>
            <td>
              <?php
              echo  $index
              ?>
            </td>
            <td>
              <?php
              echo      $ma
              ?>
            </td>

            <td>

              <?php echo  $ten
              ?>



            </td>
            <td>
              <?php
              echo    $diachi;
              ?>

            </td>
            <td>
              <?php
              echo    $email
              ?>

            </td>
            <td>
              <?php
              echo   $phone
              ?>

            </td>
            <td>
              <div style="display: flex;">
                <button type="button" class="brcl">
                  <a style="text-decoration: none; color: aliceblue;" href="suakhachhang.php?idSV=<?php echo $ma;  ?>">Sửa</a>
                </button type="button">
                <button type="button" class="brcl2">
                  <a style="text-decoration: none; color: aliceblue;" href="xoakhachhang.php?idSV=<?php echo $ma;  ?>">Xóa</a>
                </button type="button">


            </td>
          </tr>
        <?php
        }
        ?>
        <?php
        mysqli_close($conn);
        ?>

      </table>
    </div>

  </section>
  <br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br>

  <footer>
    <p> Nguyễn Phi Hùng - 10/08/2002</p>
  </footer>
</body>

</html>