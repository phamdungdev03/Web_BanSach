<?php
$conn = mysqli_connect("localhost","root","","hung_mobile");

        $sql ="UPDATE `don_hang` SET `order_status`='5' WHERE `order_id`=' ".$_GET['iddh']."'";
        if(mysqli_query($conn, $sql))
        {
            header('location:donhang.php');
        }
        else{
            $result = "Lỗi thêm mới". mysqli_error($conn);
        }
?>