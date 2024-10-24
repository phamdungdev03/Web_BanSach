<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (isset($_POST["btnSave"])) {
    $ten_sanpham = $_POST['ten_sanpham'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
    $soluonghangton = $_POST['soluonghangton'];
    $danhmuc = $_POST['danhmuc'];
    $hinhanh = $_POST['hinhanh'];
}

$sql = "INSERT INTO `san_pham`(`product_name`, `product_description`, `product_image`, `price`, `stock_quantity`, `category_id`)
    VALUES ('$ten_sanpham','$mota','$hinhanh','$gia','$soluonghangton','$danhmuc')";
if (mysqli_query($conn, $sql)) {
    header('location:quanlysanpham.php');
} else {
    //lỗi
    $result = "Lỗi thêm mới" . mysqli_error($conn);
}
