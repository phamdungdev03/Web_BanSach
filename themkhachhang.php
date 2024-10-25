<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
  }
  .title{
    text-align: center;
    font-size: 26px;
    margin: 20px 0;
  }

  a {
    text-decoration: none;
    color: #007BFF;
    font-weight: bold;
  }

  a:hover {
    text-decoration: underline;
  }

  form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  th {
    background-color: #007BFF;
    color: white;
    padding: 12px;
    text-align: center;
    font-size: 18px;
    border-radius: 8px 8px 0 0;
  }

  th,
  td {
    padding: 12px;
  }

  td:first-child {
    width: 30%;
    font-weight: bold;
  }

  input[type=text],
  input[type=password],
  input[type=email],
  select {
    width: 100%;
    padding: 10px;
    margin: 6px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[type=submit] {
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 12px 20px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s;
  }

  input[type=submit]:hover {
    background-color: #0056b3;
  }

  .form-footer {
    text-align: center;
    margin-top: 20px;
  }

  .form-footer a {
    font-size: 14px;
  }
</style>
<!-- 
<div class="form-footer">
  <a href="javascript:history.back()">&#8592; Quay lại</a>
</div> -->

<form action="xulythemkhachhang.php" method="post">
  <h3 class="title">Đăng ký</h3>
  <table>
    <tr>
      <td>Họ và tên:</td>
      <td><input type="text" name="ten" placeholder="Họ và tên" required></td>
    </tr>
    <tr>
      <td>Số điện thoại:</td>
      <td><input type="text" name="sdt" placeholder="Số điện thoại" required></td>
    </tr>
    <tr>
      <td>Địa chỉ cụ thể:</td>
      <td><input type="text" name="diachicuthe" placeholder="Địa chỉ cụ thể" required></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="email" name="email" placeholder="Email" required></td>
    </tr>
    <tr>
      <td>Tên đăng nhập:</td>
      <td><input type="text" name="tendangnhap" placeholder="Tên đăng nhập" required></td>
    </tr>
    <tr>
      <td>Mật khẩu:</td>
      <td><input type="password" name="matkhau" placeholder="Mật khẩu" required></td>
    </tr>
    <tr>
      <td>Xác nhận mật khẩu:</td>
      <td><input type="password" name="xnmatkhau" placeholder="Xác nhận mật khẩu" required></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" id="btn" name="btnSavedk" value="Thêm tài khoản">
      </td>
    </tr>
  </table>
</form>
