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
    <div class="logo">Quản Lí Sách</div>
    <div class="user-info">
      <?php
      session_start();
      if (isset($_SESSION['username'])) {
        echo "<a href='thoat.php' >Đăng xuất</a>";
        echo "<p>Chào admin,<br>" . $_SESSION['username'] . "</p>";
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
      <br>
      <br>
      <br>
    </div>
    <div class="hero-image" align="center">
      <img src="./hinh_anh/admin5.jpg" alt="">
    </div>
  </section>
</body>

</html>