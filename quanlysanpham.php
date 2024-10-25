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
     <section style="display: flex">
        <?php require("./sidebar_admin.php");?>

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
                <button type="button" class="button" onclick="window.location.href='themdulieu.php'">
                    <span class="button__text">Thêm mới</span>
                    <span class="button__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                            <line y2="19" y1="5" x2="12" x1="12"></line>
                            <line y2="12" y1="12" x2="19" x1="5"></line>
                        </svg>
                    </span>
                </button>
    
                <table class="bangchinh" align="center" cellspacing="0" width="100%">
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
                                <img src="./hinh_anh/uploads/<?php echo  $hinhanh ?>" style=" max-width: 60px;" alt="iPhone">
                            </td>
                            <td>
                                <?php
                                    echo  number_format($gia, 0, ",", ",");
                                ?>
                            </td>
                            <td >
                                <?php
                                    echo "$soluong cuốn sách" 
                                ?>
                            </td>
                            <td>
                                <div style="display: flex; justify-content: space-around;">
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
     </section>

    <footer>
        <p>Lê Thị Phương Thảo - 18/09/2003 </p>
        <p>Nguyễn Văn Quang - 10/08/2003</p>
        <p>Ngô Văn Thông - 09/06/2003</p>
    </footer>
</body>
</html>