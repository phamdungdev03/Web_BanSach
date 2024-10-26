<style>
    .container_header {
        background-image: url("./hinh_anh/banner/banner_header.png");
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
        position: relative;
        z-index: 1000;
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
        z-index: 1001;
    }

    .search-icon {
        width: 22px;
        height: 22px;
        color: #6b7280;
    }

    /* modal search */

    .modal-search {
        display: none;
    }

    .search-background {
        backdrop-filter: blur(1px);
        background-color: rgba(0, 0, 0, .4);
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        width: 100vw;
        z-index: 998;
    }

    .modal-search-container {
        min-height: 150px;
        max-height: 70vh;
        padding: 10px 0;
        position: fixed;
        right: 26%;
        top: 55px;
        transform: translateX(235px);
        width: 400px;
        z-index: 1000;
    }

    .modal-search-container::before {
        border-bottom: 9px solid #fff;
        border-left: 9px solid transparent;
        border-right: 9px solid transparent;
        content: "";
        height: 0;
        position: absolute;
        left: 20px;
        top: 2px;
        width: 0;
    }

    .search-container-wrapper {
        background-color: #fff;
        border-radius: 10px;
        height: 100%;
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    .modal-search-title {
        font-size: 16px;
        font-weight: 700;
        color: #615959;
        background-color: #f3f1f1;
        padding: 8px 14px;
    }

    .modal-search-list {
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-height: 500px;
    }

    .modal-search-list a {
        text-decoration: none;
        color: #444;
    }

    .search-item {
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 8px 10px;
    }

    .search-item:hover {
        background-color: #f3f1f1;
    }

    .search-item img {
        width: 60px;
        height: 60px;
        object-fit: contain;
        background-color: transparent;
        border-radius: 5px;
    }

    .search-item-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        line-height: 1.8;
        margin-left: 6px;
        white-space: nowrap;
        min-width: 80px;
    }

    .search-item-info p {
        padding: 0;
        margin: 0;
    }

    .search-item-info__name {
        font-size: 14px;
        color: #444;
        font-weight: bold;
        max-width: 400px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .search-item-info__price {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .search-item-price__new {
        color: red;
        font-size: 13px;
        font-weight: bold;
    }

    .search-item-price__old {
        text-decoration: line-through;
        font-size: 12px;
        font-weight: 600;
    }

    .search-no-product {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 50px 0;
    }

    .search-no-product img {
        width: 100px;
        height: 100px;
    }

    .search-no-product p {
        color: #444;
        font-size: 14px;
        font-weight: 500;
        padding: 0;
        margin: 0;
    }

    .search-no-product span {
        color: #444;
        font-size: 14px;
        font-weight: 400;
    }
</style>

<div class="container_header">
    <header class="header">
        <div class="header__logo">
            <a href="index.php"><img src="./hinh_anh/logo.png" alt="logo"></a>
        </div>
        <nav class="header__nav">
            <a href="index.php" class="header__nav-item">Trang chủ</a>
            <a href="danhmucsanpham.php" class="header__nav-item">Thể loại</a>
            <a class="header__nav-item">Liên hệ</a>
            <a class="header__nav-item">Câu hỏi thường gặp</a>
        </nav>
        <div class="header__search-bar">
            <?php
            include 'config.php';
            $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

            if (isset($_GET["s1"]) && !empty($_GET["s1"])) {
                $key = mysqli_real_escape_string($conn, trim($_GET["s1"]));
                $sql = "SELECT product_id, product_name, product_image, price 
                    FROM san_pham 
                    WHERE (product_id LIKE '%$key%') 
                        OR (product_name LIKE '%$key%') 
                        OR (product_image LIKE '%$key%') 
                        OR (price LIKE '%$key%');";

                $result = mysqli_query($conn, $sql);
            } else {
                $sql = "SELECT * FROM san_pham ORDER BY price DESC LIMIT 4;";
                $result = mysqli_query($conn, $sql);
            }
            ?>
            <div id="modal-search" class='modal-search'>
                <div id="background-close" class='search-background'></div>
                <div class='modal-search-container'>
                    <div class='search-container-wrapper'>
                        <div class='modal-search-title'>
                            <span>Sản phẩm gợi ý</span>
                        </div>
                        <div class='modal-search-list'>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $product_id = $row['product_id'];
                                    $product_name = $row['product_name'];
                                    $product_image = $row['product_image'];
                                    $price = number_format($row['price'], 0, ',', '.') . 'đ';
                                    echo "<a href='chitietsanpham.php?product_id=$product_id' class='search-item'>
                                    <img src='./hinh_anh/uploads/$product_image' alt='$product_name' />
                                    <div class='search-item-info'>
                                        <p class='search-item-info__name'>$product_name</p>
                                        <div class='search-item-info__price'>
                                            <p class='search-item-price__new'>$price</p>
                                        </div>
                                    </div>
                                </a>";
                                }
                            } else {
                                echo "<div class='search-no-product'>
                                        <img src='https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/search/a60759ad1dabe909c46a.png' alt='' />
                                        <p>Chưa có kết quả tìm kiếm nào.</p>
                                        <span>Vui lòng sử dụng những từ khóa chung.</span>
                                      </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <form id="searchForm" method="get" class="search-container">
                <input id="s1" class="search-input" type="text" name="s1" placeholder="Bạn cần tìm gì ..." value="<?php if (isset($_GET["s1"])) {
                                                                                                                                echo trim($_GET["s1"]);
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
            <?php
                if (isset($_SESSION['username'])) {
                    echo"
                            <a href='donhang.php' class='header__nav-item'><i class='fa-solid fa-table-list'></i></a>
                            <a href='giohang.php' class='header__nav-item'><i class='fa-solid fa-cart-shopping'></i></a>
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

<script>
    var search = document.getElementById('s1');
    var modal = document.getElementById('modal-search');
    var background = document.getElementById('background-close');

    search.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    background.addEventListener('click', function() {
        modal.style.display = 'none';
    });
</script>