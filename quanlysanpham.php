<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ quản lý</title>
    <link rel="stylesheet" href="admin.css">
    <style>
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">BOOK STORE</div>
        <div class="user-info">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "<p>Chào mừng,<br>" . $_SESSION['username'] . "</p>";
                echo "<a href='thoat.php' >Đăng xuất</a>";
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

                if (isset($_GET["search"]) && !empty($_GET["search"])) {
                    $key = trim($_GET["search"]);
                    $sql = "SELECT `product_id`, `product_name`, `product_image`, `price`, `stock_quantity` 
                    FROM `san_pham` 
                    WHERE (product_id LIKE '%$key%') 
                        OR (product_name LIKE '%$key%') 
                        OR (product_image LIKE '%$key%') 
                        OR (price LIKE '%$key%')
                        OR (stock_quantity LIKE '%$key%');
                        ";

                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) <= 0) {
                        echo "<script>alert('Không tìm thấy " . $_GET["search"] . " trong tài liệu nào.!');
                            window.location.href = 'quanlysanpham.php';
                            </script>";
                    }
                } else {
                    $sql = "SELECT * From san_pham";
                    $result = mysqli_query($conn, $sql);
                }
            ?>
            <div class="div1">
                <h3>Quản lý sản phẩm </h3>

                <form method="get" class="search-container">
                    <input
                        class="search-input"
                        type="text"
                        name="search"
                        placeholder="Nhập sản phẩm cần tìm"
                        value="<?php if (isset($_GET['search'])) {
                        echo trim($_GET['search']);
                        } ?>"
                    />
                    <button type="submit" class="search-button">
                        <svg
                        class="search-icon"
                        stroke="currentColor"
                        stroke-width="1.5"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                            stroke-linejoin="round"
                            stroke-linecap="round"
                        ></path>
                        </svg>
                    </button>
                </form>
            </div>


            <table class="bangchinh" border="1" align="center" cellspacing="0" width="100%">
                <tr>
                    <td colspan="7" align="center">
                        <button type="button" class="brcl1"> <a style="text-decoration: none;color: aliceblue;" href="themdulieu.php">Thêm mới</a> </button>
                    </td>
                </tr>
                <tr>
                    <th>STT</th>
                    <th>Tên Sách</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng sách tồn kho</th>
                    <th>Tác vụ</th>
                </tr>
                <?php
                $index = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $index++;
                    $maSp = $row['product_id'];
                    $tensp = $row['product_name'];
                    $hinhanh = $row['product_image'];
                    $gia = $row['price'];
                    $soluong = $row['stock_quantity'];
                ?>
                    <tr>
                        <td>
                            <?php
                            echo  $index
                            ?>
                        </td>
                        <td>
                            <?php
                            echo  $tensp
                            ?>
                        </td>

                        <td>
                            <img src="./hinh_anh/didong/<?php echo  $hinhanh ?>" style=" max-width: 60px;" alt="iPhone">
                        </td>
                        <td>
                            <?php
                            echo  number_format($gia, 0, ",", ",");
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $soluong
                            ?>
                        </td>
                        <td>
                            <div style="display: flex;">
                                <button type="button" class="brcl3">
                                    <a style="text-decoration: none; color: aliceblue;" href="motasp.php?idSV=<?php echo $maSp;  ?>">Mô tả</a>
                                </button type="button">
                                <button type="button" class="brcl">
                                    <a style="text-decoration: none; color: aliceblue;" href="suadulieu.php?idSV=<?php echo $maSp;  ?>">Sửa</a>
                                </button type="button">
                                <button type="button" class="brcl2">
                                    <a style="text-decoration: none; color: aliceblue;" href="xulyxoa.php?idSV=<?php echo $maSp;  ?>">Xóa</a>
                                </button type="button">
                            </div>
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

    <footer style="margin-top:100px">
        <p>Lê Thị Phương Thảo - 18/09/2003 </p>
        <p>Nguyễn Văn Quang - 10/08/2003</p>
        <p>Ngô Văn Thông - 09/06/2003</p>
    </footer>
</body>
</html>