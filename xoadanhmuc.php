<?php
 $conn = mysqli_connect("localhost","root","","hung_mobile");
$sql ="DELETE FROM `danh_muc_san_pham` 
WHERE `category_id`='".$_GET["idSV"]."'";
 if(mysqli_query($conn, $sql))
{
    header('location:quanlydanhmuc.php');
}
else{
    //lỗi
    $result = "Lỗi thêm mới". mysqli_error($conn);

}
?>