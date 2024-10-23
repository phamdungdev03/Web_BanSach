<?php
 $conn = mysqli_connect("localhost","root","","hung_mobile");
if(isset($_POST["btnSave"])){
$ten_dm = $_POST['ten_danhmuc'];
$mota = $_POST['mota'];
}


$sql ="UPDATE `danh_muc_san_pham` 
SET `category_name`='$ten_dm',`category_description`='$mota' 
WHERE `category_id`='".$_GET["madm"]."'";
 if(mysqli_query($conn, $sql))
{
    header('location:quanlydanhmuc.php');
}
else{
    //lỗi
    $result = "Lỗi thêm mới". mysqli_error($conn);

}
?>