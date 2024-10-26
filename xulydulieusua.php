<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

if (isset($_POST["btnSave"])) {
    $ten_sanpham = $_POST['ten_sanpham'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
    $soluonghangton = $_POST['soluonghangton'];
    $madanhmuc = $_POST['danhmuc'];
    
    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['size'] > 0) {
        $hinhanh_ten = time() . '_' . basename($_FILES['hinhanh']['name']);
        $duongdan = 'hinh_anh/uploads/' . $hinhanh_ten;
        
        if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $duongdan)) {
            $hinhanh = $hinhanh_ten;
        } else {
            $result = "Lỗi upload hình ảnh.";
            exit;
        }
    } else {
        $hinhanh = $_POST['hinhanh_cu'];
    }

    $stmt = $conn->prepare("UPDATE san_pham SET product_name = ?, product_description = ?, product_image = ?, price = ?, stock_quantity = ?, category_id = ? WHERE product_id = ?");
    $stmt->bind_param("sssiiii", $ten_sanpham, $mota, $hinhanh, $gia, $soluonghangton, $madanhmuc, $_GET['masp']);

    if ($stmt->execute()) {
        header('Location: quanlysanpham.php');
        exit;
    } else {
        $result = "Lỗi cập nhật: " . $stmt->error;
    }

    $stmt->close();
}
?>
