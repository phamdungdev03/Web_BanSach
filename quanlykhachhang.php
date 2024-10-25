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
   <section style="display: flex">
        <?php 
            require("./sidebar_admin.php");
        ?>
    <section class="hero">
      <div class="hero-text">
        <?php

        include 'config.php';
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
        $sql = "SELECT * FROM `khach_hang` WHERE `vaitro_id` = 2";
        $result = mysqli_query($conn, $sql);
        ?>
        <div class="box_title">
          <h3 class="text-center">Liệt kê khách hàng</h3>
        </div>
        <button type="button" class="button" onclick="window.location.href='themkhachhang.php'">
            <span class="button__text">Thêm mới</span>
            <span class="button__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                    <line y2="19" y1="5" x2="12" x1="12"></line>
                    <line y2="12" y1="12" x2="19" x1="5"></line>
                </svg>
            </span>
        </button>
        </table>
        <table class="bangchinh" align="center" cellspacing="0" width="100%">
          <tr>
            <th>STT</th>
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
                  echo  $ten
                ?>
              </td>
              <td>
                <?php
                  echo  $diachi;
                ?>
              </td>
              <td>
                <?php
                  echo  $email
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
   </section>
  <footer>
        <p>Lê Thị Phương Thảo - 18/09/2003 </p>
        <p>Nguyễn Văn Quang - 10/08/2003</p>
        <p>Ngô Văn Thông - 09/06/2003</p>
    </footer>
</body>

</html>