<?php

include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (isset($_POST["btnSavedk"])) {
   $ten = $_POST["ten"];
   $sdt = $_POST["sdt"];
   $dcct = $_POST["diachicuthe"];
   $email = $_POST["email"];
   $tendangnhap = $_POST["tendangnhap"];
   $matkhau = $_POST["matkhau"];
   $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);
}


$sql = "UPDATE `khach_hang` 
SET `customer_name`=' $ten',
`customer_address`='$dcct',
`customer_email`='$email',
`customer_phone`='$sdt',
`username`='$tendangnhap',
`password`='$hashed_password' WHERE `customer_id`='" . $_GET['ma'] . "'";
if (mysqli_query($conn, $sql)) {
   header('location:quanlykhachhang.php');
} else {

   $result = "Lỗi thêm mới" . mysqli_error($conn);
}
