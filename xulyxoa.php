<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

$ma = $_GET["idSV"];

$sql_select = "SELECT product_image FROM san_pham WHERE product_id = '$ma'";
$result = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $hinhanh = 'hinh_anh/uploads/' . $row['product_image'];
    
    $sql_delete = "DELETE FROM san_pham WHERE product_id = '$ma'";
    if (mysqli_query($conn, $sql_delete)) {
        
        if (file_exists($hinhanh)) {
            unlink($hinhanh);
        }
        
        echo "<script>
            alert('Xóa sản phẩm thành công!');
            window.location.href = 'quanlysanpham.php';
        </script>";
    } else {
        echo "<script>
            alert('Xóa không thành công: " . mysqli_error($conn) . "');
            window.location.href = 'quanlysanpham.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Không tìm thấy sản phẩm để xóa.');
        window.location.href = 'quanlysanpham.php';
    </script>";
}

mysqli_close($conn);
?>
