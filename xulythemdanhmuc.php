<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

if (isset($_POST["btnSave"])) {
    $ten_dm = $_POST['ten_danhmuc'];
    $mota = $_POST['mota'];
}

$sql = "INSERT INTO `danh_muc_san_pham`( `category_name`, `category_description`) 
VALUES ('$ten_dm','$mota')";
if (mysqli_query($conn, $sql)) {
    header('location:quanlydanhmuc.php');
} else {
    //lỗi
    $result = "Lỗi thêm mới" . mysqli_error($conn);
}
