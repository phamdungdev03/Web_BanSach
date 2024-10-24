<?php
include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
if (empty($_POST['username']) || empty($_POST['password'])) {
    echo "Vui lòng quay lại điền đầy đủ thông tin đăng nhập!";
    exit();
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `khach_hang` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    if ($user !== null && password_verify($password, $user['password'])) {
        // Đăng nhập thành công, lưu thông tin người dùng vào biến session
        session_start();
        $_SESSION['username'] = $username;
        if ($user['vaitro_id'] == 1) {
            header("Location: indexadmin.php");
        } else {
            header("Location: index.php");
        }
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng !  <a href='javascript:history.back()'>Quay lại</a>";
        // header("Location: dangnhap.php");
    }
}
