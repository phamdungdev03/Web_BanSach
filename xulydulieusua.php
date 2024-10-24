<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (isset($_POST["btnSave"])) {
    $ten_sanpham = $_POST['ten_sanpham'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
    $soluonghangton = $_POST['soluonghangton'];
    $madanhmuc = $_POST['danhmuc'];
    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['size'] > 0) {
        $hinhanh = $_POST['hinhanh_cu'];
    } else {
        $hinhanh = $_POST['hinhanh'];
    }
}


$sql = "UPDATE `san_pham` SET `product_name`='$ten_sanpham',`product_description`='$mota',`product_image`='$hinhanh',`price`='$gia',`stock_quantity`='$soluonghangton',`category_id`=' $madanhmuc' WHERE `product_id`= '" . $_GET['masp'] . "'";
if (mysqli_query($conn, $sql)) {
    header('location:quanlysanpham.php');
} else {
    //lỗi
    $result = "Lỗi thêm mới" . mysqli_error($conn);
}
