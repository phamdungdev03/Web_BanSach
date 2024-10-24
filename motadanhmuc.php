<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$ma = $_GET['idSV'];
$sql = "SELECT `category_description` FROM `danh_muc_san_pham` where `category_id` = $ma";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $mota = $row['category_description'];
    echo $mota;
}

if (mysqli_query($conn, $sql)) {
    echo "<br>
    <a href='javascript:history.back()'>Quay lại</a>";
} else {
    //lỗi
    $result = mysqli_error($conn);
}
mysqli_close($conn);
