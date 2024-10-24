<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        td {
            font-size: 13px;
        }

        th {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">HUNG MOBILE</div>
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
                <li>
                    <div class="menu">
                        <a href="indexadmin.php">Trang chủ</a>
                    </div>
                </li>
                <li>
                    <div class="menu">
                        <a href="quanlysanpham.php">Sản phẩm</a>
                    </div>
                </li>
                <li>
                    <div class="menu">
                        <a href="quanlydanhmuc.php">Danh mục</a>
                    </div>
                </li>
                <li>
                    <div class="menu">
                        <a href="quanlydonhang.php">Đơn hàng</a>
                    </div>
                </li>
                <li>
                    <div class="menu">
                        <a href="quanlykhachhang.php">Khách hàng</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <section class="hero">
        <div class="hero-text">
            <?php

            include 'config.php';
            $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

            if (isset($_GET["search"]) && !empty($_GET["search"])) {
                $key = trim($_GET["search"]);
                $sql = "SELECT `order_id`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `order_date`
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
                $sql = "SELECT * From don_hang";
                $result = mysqli_query($conn, $sql);
            }

            ?>
            <div class="div1">
                <h3 align="center">Quản lý đơn hàng </h3>
            </div>

            <table class="search-form" align="center" cellpadding="5">

                <tr>
                    <td>
                        <form action="" method="get">
                            <input class="sae" type="text" name="search"
                                placeholder="Nhập thông tin đơn hàng cần tìm"
                                value="<?php if (isset($_GET["search"])) {
                                            echo trim($_GET["search"]);
                                        } ?>" size="50%">
                            <input class="scc" type="submit" value="Search">
                        </form>
                    </td>
                </tr>

            </table>
            <table class="bangchinh" border="1" align="center" cellspacing="0" width="100%">
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
                $index = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $index++;
                    $ma = $row['order_id'];
                    $ten = $row['customer_name'];
                    $diachi = $row['customer_address'];
                    $email = $row['customer_email'];
                    $phone = $row['customer_phone'];
                    $Ngaytao = $row['order_date'];
                    $mattcu = $row['order_status'];
                ?>
                    <tr>
                        <td>
                            <?php
                            echo  $ma
                            ?>
                        </td>
                        <td>
                            <?php
                            echo    $ten
                            ?>
                        </td>

                        <td>

                            <?php
                            echo     $diachi
                            ?>



                        </td>
                        <td>
                            <?php
                            echo  $phone
                            ?>

                        </td>
                        <td>
                            <?php
                            echo  $email
                            ?>

                        </td>

                        <td>
                            <?php
                            $timestamp = strtotime('+5 hour 0 minutes', $Ngaytao);
                            echo date('d/m/Y H:i',  $timestamp);
                            ?>
                        </td>
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
                        <td>
                            <a href="xemchitietdonhang.php?iddh=<?php echo $ma ?>">Xem chi tiết</a>
                        </td>
                        <td>
                            <a href="suadonhang.php?iddh=<?php echo $mattcu ?>">
                                <button> Cập nhật</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <?php
                mysqli_close($conn);
                ?>

            </table>
        </div>
    </section>


    <footer style="margin-top:400px">
        <p> Nguyễn Phi Hùng - 10/08/2002</p>
    </footer>
</body>

</html>