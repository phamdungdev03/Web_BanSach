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
            $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

            $sql = "SELECT * FROM `chi_tiet_don_hang` where order_id = " . $_GET['iddh'] . "";
            $result = mysqli_query($conn, $sql);
            ?>
            <table class="bangchinh" border="1" align="center" cellspacing="0" width="100%">
                <tr>
                    <th>STT</th>
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>GIÁ SẢN PHẨM</th>
                    <th>SỐ LƯỢNG</th>
                    <th>TỔNG GIÁ TRỊ</th>
                </tr>
                <?php
                $tongs = 0;
                $index = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $index++;
                    $ma = $row['order_id'];
                    $ten = $row['product_name'];
                    $gia = $row['price'];
                    $soluong = $row['quantity'];
                    $tong = $row['total_amount'];
                    $tongs += $row['total_amount'];
                ?>
                    <tr>
                        <td>
                            <?php
                            echo  $index++;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo    $ma;
                            ?>
                        </td>

                        <td>
                            <?php
                            echo   $ten;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo  number_format($gia, 0, ",", ",");
                            ?>
                        </td>
                        <td>
                            <?php
                            echo   $soluong
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $tong;
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo  number_format($tongs, 0, ",", ",") ?></td>
                </tr>
                <?php
                mysqli_close($conn);
                ?>

            </table>
        </div>
    </section>
    <a style="  text-decoration: none;" href="javascript:history.back()">&#8592; Quay lại</a>
</body>

</html>