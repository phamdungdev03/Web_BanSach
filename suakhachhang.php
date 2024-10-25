<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa thông tin khách hàng</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #333;
    }

    table {
      width: 100%;
      margin: 20px 0;
    }

    th,
    td {
      text-align: left;
      padding: 12px;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    input[type=text],
    input[type=password],
    input[type=email] {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      transition: border 0.3s;
    }

    input[type=text]:focus,
    input[type=password]:focus,
    input[type=email]:focus {
      border: 1px solid #4CAF50;
      outline: none;
    }

    .back-link {
      display: inline-block;
      margin-bottom: 20px;
      text-decoration: none;
      color: #4CAF50;
      font-weight: bold;
      transition: color 0.3s;
    }

    .back-link:hover {
      color: #45a049;
    }

    .submit-btn {
      width: 100%;
      padding: 12px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
      font-size: 16px;
    }

    .submit-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<div class="container">
  <?php
  include 'config.php';
  $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

  if (!$conn) {
      die("Kết nối thất bại: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM `khach_hang` WHERE `customer_id` = " . intval($_GET["idSV"]);
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $ten = htmlspecialchars($row['customer_name']);
      $sdt = htmlspecialchars($row['customer_phone']);
      $diachi = htmlspecialchars($row['customer_address']);
      $email = htmlspecialchars($row['customer_email']);
      $user = htmlspecialchars($row['username']);
  } else {
      echo "<p style='color:red;'>Không tìm thấy thông tin khách hàng.</p>";
      exit;
  }
  ?>

  <h2>Sửa thông tin khách hàng</h2>
  <!-- <a class="back-link" href="javascript:history.back()">&#8592; Quay lại</a> -->

  <form action="xulysuakhachhang.php?ma=<?php echo htmlspecialchars($_GET["idSV"]); ?>" method="post">
    <table>
      <tr>
        <td>Họ và tên:</td>
        <td><input type="text" name="ten" placeholder="Họ và tên" value="<?php echo $ten; ?>" required></td>
      </tr>
      <tr>
        <td>Số điện thoại:</td>
        <td><input type="text" name="sdt" placeholder="Số điện thoại" value="<?php echo $sdt; ?>" required></td>
      </tr>
      <tr>
        <td>Địa chỉ:</td>
        <td><input type="text" name="diachicuthe" placeholder="Địa chỉ cụ thể" value="<?php echo $diachi; ?>" required></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required></td>
      </tr>
      <tr>
        <td>Tên đăng nhập:</td>
        <td><input type="text" name="tendangnhap" placeholder="Tên đăng nhập" value="<?php echo $user; ?>" required></td>
      </tr>
      <!-- <tr>
        <td>Mật khẩu:</td>
        <td><input type="password" name="matkhau" placeholder="Mật khẩu" required></td>
      </tr> -->
      <tr>
        <td colspan="2">
          <input class="submit-btn" type="submit" id="btn" name="btnSavedk" value="Lưu">
        </td>
      </tr>
    </table>
  </form>
</div>

</body>
</html>
