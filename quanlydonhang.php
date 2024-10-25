<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="header">
        <div class="logo">BOOK STORE</div>
        <div class="user-info">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "<a href='thoat.php' >Đăng xuất</a>";
                echo "<p>Chào mừng,<br>" . $_SESSION['username'] . "</p>";
            } else {
                echo  "<a href='dangnhap.php'>Đăng nhập</a>";
            }
            ?>
        </div>
    </div>
    <header>
        <nav>
            <ul class="nav-links">
                <li><div class="menu"><a href="indexadmin.php">Trang chủ</a></div></li>
                <li><div class="menu"><a href="quanlysanpham.php">Sản phẩm</a></div></li>
                <li><div class="menu"><a href="quanlydanhmuc.php">Danh mục</a></div></li>
                <li><div class="menu"><a href="quanlydonhang.php">Đơn hàng</a></div></li>
                <li><div class="menu"><a href="quanlykhachhang.php">Khách hàng</a></div></li>
            </ul>
        </nav>
    </header>
    <section class="hero">
        <div class="hero-text">
            <?php
            include 'config.php';
            $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

            if (isset($_GET["search"]) && !empty($_GET["search"])) {
                $key = trim($_GET["search"]);
                $sql = "SELECT `order_id`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `order_date`, `order_status`
                FROM `don_hang` 
                WHERE (order_id LIKE '%$key%') 
                   OR (customer_name LIKE '%$key%') 
                   OR (customer_address LIKE '%$key%') 
                   OR (customer_email LIKE '%$key%')
                   OR (customer_phone LIKE '%$key%')
                   OR (order_date LIKE '%$key%')";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) <= 0) {
                    echo "<script>alert('Không tìm thấy thông tin đơn hàng " . $_GET["search"] . " trong tài liệu nào.!');
						window.location.href = 'quanlydonhang.php';
						</script>";
                }
            } else {
                $sql = "SELECT * FROM `don_hang`";
                $result = mysqli_query($conn, $sql);
            }
            ?>
            <div class="div1">
                <h3 align="center">Quản lý đơn hàng</h3>
                <form method="get" class="search-container">
                    <input class="search-input" type="text" name="search" placeholder="Nhập sản phẩm cần tìm"
                        value="<?php if (isset($_GET['search'])) { echo trim($_GET['search']); } ?>" />
                    <button type="submit" class="search-button">
                        <svg class="search-icon" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>
                    </button>
                </form>
            </div>
            <table class="bangchinh" align="center" cellspacing="0" width="100%">
                <tr>
                    <th>ID</th>
                    <th>Tên người nhận</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Ngày tạo</th>
                    <th>Trạng Thái</th>
                    <th>Xem đơn hàng</th>
                    <th>Cập nhật Trạng thái</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $ma = $row['order_id'];
                    $ten = $row['customer_name'];
                    $diachi = $row['customer_address'];
                    $email = $row['customer_email'];
                    $phone = $row['customer_phone'];
                    $Ngaytao = $row['order_date'];
                    $mattcu = isset($row['order_status']) ? $row['order_status'] : 0;
                ?>
                    <tr>
                        <td><?php echo $ma; ?></td>
                        <td><?php echo $ten; ?></td>
                        <td><?php echo $diachi; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($Ngaytao)); ?></td>
                        <td>
                            <?php
                                if ($mattcu == 1) {
                                    echo "Mới";
                                } else if ($mattcu == 2) {
                                    echo "Đang xử lý";
                                } else if ($mattcu == 3) {
                                    echo "Đang vận chuyển";
                                } else if ($mattcu == 4) {
                                    echo "Hoàn Thành";
                                } else {
                                    echo "Đã Hủy";
                                }
                            ?>
                        </td>
                        <td><a href="xemchitietdonhang.php?iddh=<?php echo $ma ?>">Xem chi tiết</a></td>
                        <td>
                            <a href="suadonhang.php?iddh=<?php echo $mattcu ?>">
                                <button>Cập nhật</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </section>
    <footer>
        <p>Lê Thị Phương Thảo - 18/09/2003</p>
        <p>Nguyễn Văn Quang - 10/08/2003</p>
        <p>Ngô Văn Thông - 09/06/2003</p>
    </footer>
</body>

</html>
