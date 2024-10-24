<?php

include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$ma = $_GET["idSV"];

$sql = "DELETE FROM `san_pham` WHERE product_id = '$ma'";
if (mysqli_query($conn, $sql)) {
    header('location:quanlysanpham.php');
} else {
    //lỗi
    $result = "Xóa  không thành công" . mysqli_error($conn);
}
mysqli_close($conn);
