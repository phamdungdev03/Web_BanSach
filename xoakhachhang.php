<?php

include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$ma = $_GET["idSV"];

$sql = "DELETE FROM `khach_hang` WHERE  customer_id = '$ma'";
if (mysqli_query($conn, $sql)) {
    header('location:quanlykhachhang.php');
} else {
    $result = "Xóa  không thành công" . mysqli_error($conn);
}
mysqli_close($conn);
