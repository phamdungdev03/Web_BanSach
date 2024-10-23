<?php

    $conn = mysqli_connect("localhost","root","","hung_mobile");
    if(isset($_POST["save"])){
        $tthai = $_POST['Trangthai'];
        $macu = $_GET['macu'];
        $sql2= "SELECT order_id FROM `don_hang` where order_status =  '$macu'";
        $resultk = mysqli_query($conn, $sql2); 
        $donhang = mysqli_fetch_assoc($resultk );
        echo $donhang['order_id'];
        $sql ="UPDATE `don_hang` SET `order_status`='$tthai' WHERE `order_id`=' ".$donhang['order_id']."'";
        if(mysqli_query($conn, $sql))
        {
            header('location:quanlydonhang.php');
        }
        else{
            $result = "Lỗi thêm mới". mysqli_error($conn);
        }
    }
?>