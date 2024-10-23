<?php
session_start();
session_destroy(); // Xoá toàn bộ thông tin của session

header("Location: index.php"); 
exit();
?>