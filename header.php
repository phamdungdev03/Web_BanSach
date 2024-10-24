<header>
    <div class="header-container">
        <div class="logo">
            <a href="index.php"><img src="./hinh_anh/logomb.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="sanpham.php">Sản phẩm</a></li>
            </ul>
        </nav>
        <div class="nav-search">
            <?php
            include 'config.php';
            $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

            if (isset($_GET["search1"]) && !empty($_GET["search1"])) {
                $key = trim($_GET["search1"]);
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
            <form action="" method="get">
                <input type="text" placeholder="Bạn tìm gì....." name="search1" value="<?php if (isset($_GET["search1"])) {
                                                                                            echo trim($_GET["search1"]);
                                                                                        }
                                                                                        ?>">
                <input type="submit" value="Tìm kiếm">
            </form>
        </div>
        <div class="cart">
            <a href="giohang.php">
                <img src="./hinh_anh/cart.png" alt="Giỏ hàng">
                <span>Giỏ hàng</span>
            </a>
        </div>

        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<div id='welcomeBtn' class='user-info'>
				<img src='./hinh_anh/user.jpg' alt='Đăng nhập'>
				<p>" . $_SESSION['username'] . "</p>
				</div>";
        } else {
            echo "<div class='dangnhap'><a href='dangnhap.php'><img src='./hinh_anh/logodangnhap.png' alt='Đăng nhập'></a></div>";
        }
        ?>
        <div id="myModal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-item"><a href='./donhang.php'>Đơn hàng</a></div>
                <div class="modal-item"><a href='thoat.php'>Đăng xuất</a></div>
            </div>
        </div>
</header>

<script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("welcomeBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>