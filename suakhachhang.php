<style>
  table {
    border-collapse: collapse;
    width: 100%;
    max-width: 500px;
  }

  th,
  td {
    text-align: left;
    padding: 8px;
  }

  th {
    background-color: #ddd;
  }

  input[type=text],
  input[type=password],
  input[type=email],
  select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
</style>
<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$sql = "SELECT * FROM `khach_hang` WHERE `customer_id` = " . $_GET["idSV"] . "";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $ten =  $row['customer_name'];
  $sdt =  $row['customer_phone'];
  $diachi =  $row['customer_address'];
  $email =   $row['customer_email'];
  $user =  $row['username'];
  $pass =   $row['password'];
}
?>
<br><br>
<a style=" text-decoration: none;" href="javascript:history.back()">&#8592; Quay lại</a>
<br><br>
<form action="xulysuakhachhang.php?ma=<?php echo $_GET["idSV"] ?>" method="post">
  <table>
    <tr>
      <th colspan="2">Sửa khách hàng</th>
    </tr>
    <tr>
      <td>Họ và tên:</td>
      <td><input type="text" name="ten" placeholder="Họ và tên" value="<?php echo  $ten  ?>"></td>
    </tr>
    <tr>
      <td>Số điện thoại:</td>
      <td><input type="text" name="sdt" placeholder="Số điện thoại" value="<?php echo  $sdt ?>"></td>
    </tr>
    <tr>
      <td>Địa chỉ:</td>
      <td><input type="text" name="diachicuthe" placeholder="Địa chỉ cụ thể" value="<?php echo   $diachi ?>"></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="email" name="email" placeholder="Email" value="<?php echo $email ?>"></td>
    </tr>
    <tr>
      <td>Tên đăng nhập:</td>
      <td><input type="text" name="tendangnhap" placeholder="Tên đăng nhập" value="<?php echo  $user ?>"></td>
    </tr>
    <tr>
      <td>Mật khẩu:</td>
      <td>
        <input type="password" required="true" name="matkhau" placeholder="Mật khẩu" value="" </td>
    </tr>
    <tr>
    <tr>
      <td colspan="2"><input class="brcl" type="submit" id="btn" name="btnSavedk" value="Lưu" value=""></td>
    </tr>
  </table>
</form>