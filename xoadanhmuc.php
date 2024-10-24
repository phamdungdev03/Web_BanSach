<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
$sql = "DELETE FROM `danh_muc_san_pham` 
WHERE `category_id`='" . $_GET["idSV"] . "'";
if (mysqli_query($conn, $sql)) {
    header('location:quanlydanhmuc.php');
} else {
    //lỗi
    $result = "Lỗi thêm mới" . mysqli_error($conn);
}
