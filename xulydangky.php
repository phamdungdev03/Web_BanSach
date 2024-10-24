<?php

include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, 3366);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
if (empty($_POST['ten']) || empty($_POST['sdt']) || empty($_POST['diachicuthe']) || empty($_POST['email']) || empty($_POST['tendangnhap']) || empty($_POST['matkhau'])) {
    echo "Vui lòng quay lại điền đầy đủ thông tin đăng ký!";

    exit();
}

if (isset($_POST["btnSavedk"]) && ($_POST['matkhau'] == $_POST['xnmatkhau'])) {

    $username = $_POST['tendangnhap'];
    $sql2 = "SELECT * FROM khach_hang WHERE username = '$username'";
    $result2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result2) > 0) {
        echo  "Tên đăng nhập đã tồn tại! <a href='javascript:history.back()'>Quay lại</a>";
    } else {

        $ten = $_POST["ten"];
        $sdt = $_POST["sdt"];
        $dcct = $_POST["diachicuthe"];
        $email = $_POST["email"];
        $tendangnhap = $_POST["tendangnhap"];
        $matkhau = $_POST["matkhau"];
        $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `khach_hang`(`customer_name`, `customer_address`, `customer_email`, `customer_phone`, `username`, `password`,`id`)
         VALUES ('$ten','$dcct','$email','$sdt','$tendangnhap','$hashed_password','2')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Đăng ký thành công!');
            window.location.href = 'dangnhap.php';
            </script>";
        } else {
            //lỗi
            header('location:dangnhap.php');
            $result = "Lỗi thêm mới" . mysqli_error($conn);
            echo $result;
        }
    }
}
