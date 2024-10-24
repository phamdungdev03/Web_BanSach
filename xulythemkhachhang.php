<?php

include 'config.php';
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
if (empty($_POST['ten'])) {
    echo "Bạn chưa điền Họ tên! <a  href='javascript:history.back()'> Quay lại</a>";
    exit;
}

if (empty($_POST['sdt'])) {
    echo "Bạn chưa điền điền lại số điện thoại! <a  href='javascript:history.back()'> Quay lại</a>";
    exit;
}

if (empty($_POST['city'])) {
    echo "Bạn chưa điền tỉnh! <a  href='javascript:history.back()'> Quay lại</a>";
    exit;
}

if (empty($_POST['district'])) {
    echo "Bạn chưa điền huyện! <a  href='javascript:history.back()'> Quay lại</a>";
    exit;
}
if (empty($_POST['ward'])) {
    echo "Bạn chưa điền xã! <a  href='javascript:history.back()'> Quay lại</a>";
    exit;
}
if (empty($_POST['diachicuthe'])) {
    echo "Bạn chưa điền địa chỉ cụ thể! <a  href='javascript:history.back()'> Quay lại</a>";
    exit;
}
if (empty($_POST['email'])) {
    echo "Bạn chưa điền email! <a  href='javascript:history.back()'> Quay lại</a>";
    exit;
}
if (empty($_POST['tendangnhap'])) {
    echo "Bạn chưa điền tên đăng nhập! <a  href='javascript:history.back()'> Quay lại</a>";
    exit;
}
if (empty($_POST['matkhau'])) {
    echo "Bạn chưa điền mật khẩu! <a  href='javascript:history.back()'> Quay lại</a>";
    exit;
}
if (empty($_POST['xnmatkhau'])) {
    echo "Bạn chưa điền xác nhận mật khẩu! <a  href='javascript:history.back()'> Quay lại</a>";
    exit;
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
        $tinh = $_POST["city"];
        $huyen = $_POST["district"];
        $xa = $_POST["ward"];
        $dcct = $_POST["diachicuthe"];
        $email = $_POST["email"];
        $tendangnhap = $_POST["tendangnhap"];
        $matkhau = $_POST["matkhau"];
        $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `khach_hang`(`customer_name`, `customer_address`, `customer_email`, `customer_phone`, `username`, `password`,`vaitro_id`)
         VALUES ('$ten','$tinh - $huyen -  $xa -  $dcct','$email','$sdt','$tendangnhap','$hashed_password','2')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Đăng ký thành công!');
            window.location.href = 'quanlykhachhang.php';
            </script>";
        } else {
            $result = "Lỗi thêm mới" . mysqli_error($conn);
            echo $result;
        }
    }
}
if ($_POST['matkhau'] != $_POST['xnmatkhau']) {
    echo  "Bạn nhập xác nhận mật khẩu không khớp! <a href='javascript:history.back()'>Quay lại</a>";
}
