<?php

$conn = mysqli_connect("localhost","root","","hung_mobile");
$ma = $_GET["idSV"];

$sql = "DELETE FROM `san_pham` WHERE product_id = '$ma'";
if(mysqli_query($conn, $sql))
{
    header('location:quanlysanpham.php');
}
else{
    //lỗi
    $result = "Xóa  không thành công". mysqli_error($conn);

}
mysqli_close($conn);
?>