<?php
    include 'config.php';
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

    if (isset($_POST["btnSave"])) {
        $ten_sanpham = $_POST['ten_sanpham'];
        $mota = $_POST['mota'];
        $gia = $_POST['gia'];
        $soluonghangton = $_POST['soluonghangton'];
        $danhmuc = $_POST['danhmuc'];
        
        $hinhanh = $_FILES['hinhanh'];
        $hinhanh_ten = time() . '_' . basename($hinhanh['name']); 
        $duongdan = 'hinh_anh/uploads/' . $hinhanh_ten; 
        $check = getimagesize($hinhanh['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($hinhanh['tmp_name'], $duongdan)) {
                $sql = "INSERT INTO `san_pham`(`product_name`, `product_description`, `product_image`, `price`, `stock_quantity`, `category_id`)
                        VALUES ('$ten_sanpham','$mota','$hinhanh_ten','$gia','$soluonghangton','$danhmuc')";
                
                if (mysqli_query($conn, $sql)) {
                    header('location:quanlysanpham.php');
                } else {
                    $result = "Lỗi thêm mới: " . mysqli_error($conn);
                }
            } else {
                $result = "Lỗi upload hình ảnh.";
            }
        } else {
            $result = "Tệp không phải là hình ảnh.";
        }
    }
?>
