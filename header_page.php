<style>
   .container_header {
    background-image: url("./hinh_anh/banner/banner_header.jpg");
    min-height: 85vh;
    position: relative; 
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover; 
}

.header {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 10px 20px;
    position: absolute;
    top: 0; 
    left: 0;
    right: 0;
    z-index: 10;
}

.header__logo img {
    height: 50px;
}

.header__nav {
    display: flex;
    gap: 20px;
}

.header__nav-item {
    font-size: 16px;
    color: #333;
    cursor: pointer;
    transition: color 0.2s ease;
    font-weight: 600;
}

.header__nav-item:hover {
    color: #007bff;
}

.header__search-bar {
    display: flex;
    justify-content: center;
    padding: 0 20px;
}

.header__search-input {
    max-width: 300px;
    padding: 5px 10px;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-size: 14px;
    transition: border-color 0.2s ease;
}

.header__search-input:focus {
    border-color: #007bff;
    outline: none;
}

.header__user-actions {
    display: flex;
    gap: 20px;
}

/* css thanh search */
.search-container {
  position: relative;
  display: inline-block;
}

.search-input {
  padding: 10px 40px 10px 15px;
  border: 1px solid #d1d5db; 
  border-radius: 15px;
  width: 224px;
  transition: all 0.3s ease;
  outline: none;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.search-input:focus {
  border-width: 2px;
  width: 256px; 
}

.search-button {
  position: absolute;
  top: 58%;
  right: 10px;
  background: none;
  border: none;
  transform: translateY(-50%);
  cursor: pointer;
}

.search-icon {
  width: 22px;
  height: 22px;
  color: #6b7280; 
}

</style>

<div class="container_header">
    <header class="header">
        <div class="header__logo">
            <a href="index.php"><img src="./hinh_anh/logo.png" alt="logo"></a>
        </div>
        <nav class="header__nav">
            <a href="index.php" class="header__nav-item">Trang chủ</a>
            <a href="sanpham.php" class="header__nav-item">Kho sách</a>
            <a class="header__nav-item">Thể loại</a>
            <a class="header__nav-item">Liên hệ</a>
            <a class="header__nav-item">Câu hỏi thường gặp</a>
        </nav>
        <div class="header__search-bar">
            <?php
                include 'config.php';
                $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

                if (isset($_GET["search1"]) && !empty($_GET["search1"])) {
                    $key = mysqli_real_escape_string($conn, trim($_GET["search1"]));
                    $sql = "SELECT product_id, product_name, product_image, price 
                    FROM san_pham 
                    WHERE (product_id LIKE '%$key%') 
                        OR (product_name LIKE '%$key%') 
                        OR (product_image LIKE '%$key%') 
                        OR (price LIKE '%$key%');";

                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) <= 0) {
                        echo "<script>alert('Không tìm thấy " . $_GET["search1"] . " trong tài liệu nào.!');
                            window.location.href = 'index.php';
                            </script>";
                    }
                } else {
                    $sql = "SELECT * FROM san_pham ORDER BY price DESC LIMIT 8;";
                    $result = mysqli_query($conn, $sql);
                }
            ?>
            <form method="get" class="search-container">
                <input class="search-input" type="text" name="search1" placeholder="Bạn cần tìm gì ..." value="<?php if (isset($_GET["search1"])) {
                                                                                            echo trim($_GET["search1"]);
                                                                                        }
                                                                                        ?>" />
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
        <div class="header__user-actions">
            <a class="header__nav-item"><i class="fa-regular fa-heart"></i></a>
            <?php
                if (isset($_SESSION['username'])) {
                    echo"
                            <a href='donhang.php' class='header__nav-item'><i class='fa-solid fa-cart-shopping'></i></a>
                            <p>" . $_SESSION['username'] . "</p>
                            <a  href='thoat.php'  class='header__nav-item'><i class='fa-solid fa-right-from-bracket'></i></a>
                        ";
                } else {
                    echo " 
                            <a href='giohang.php' class='header__nav-item'><i class='fa-solid fa-cart-shopping'></i></a>
                            <a href='dangnhap.php' class='header__nav-item'><i class='fa-solid fa-user'></i></a>
                        ";
                }
            ?>  
        </div>
    </header>
</div>
