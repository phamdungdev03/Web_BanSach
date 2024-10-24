<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

$ma = $_GET["idSV"];

// Xóa sản phẩm
$sql = "DELETE FROM `san_pham` WHERE product_id = '$ma'";
if (mysqli_query($conn, $sql)) {
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
mysqli_close($conn);
?>
