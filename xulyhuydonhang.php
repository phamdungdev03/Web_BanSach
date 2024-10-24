<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

$sql = "UPDATE `don_hang` SET `order_status`='5' WHERE `order_id`=' " . $_GET['iddh'] . "'";
if (mysqli_query($conn, $sql)) {
    header('location:donhang.php');
} else {
    $result = "Lỗi thêm mới" . mysqli_error($conn);
}
