<style>
    .container__hot-product {
    margin-top: 80px;
    text-align: center; 
}

.container__hot-product h2 {
    color: #333;
    font-size: 30px;
    font-weight: 700;
    line-height: 30px;
    margin-bottom: 10px; 
    text-transform: uppercase;
}
.hot__title-item{
    color: #BA6D4C;
}
.container__hot-product p {
    margin-bottom: 30px; 
    color: #666;
    font-size: 16px; 
}

.product-grid {
    display: grid; 
    grid-template-columns: repeat(4, 1fr); 
    gap: 20px; 
    padding: 0 20px; 
}

.product-item {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px; 
    padding: 15px;
    text-align: center; 
    transition: transform 0.2s ease;
}

.product-item:hover {
    transform: translateY(-5px); 
}

.product-item img {
    max-width: 100%;
    height: auto;
    border-radius: 4px; 
}

.product-title {
    font-size: 18px; 
    font-weight: 600; 
    margin: 10px 0; 
}

.product-price {
    color: #ff5722; 
    font-size: 16px;
    font-weight: 500; 
}

</style>

<section class="container__hot-product">
    <h2>Sách <span class="hot__title-item">mới nhất</span></h2>
    <p>Khám phá bộ sưu tập sách mới nhất của chúng tôi với những tác phẩm nổi bật, hấp dẫn và đầy ý nghĩa.</p>

    <?php 
        require("./config.php");
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
        $sql = "SELECT * FROM san_pham ORDER BY product_id DESC LIMIT 4"; 
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="products">';
            while ($row = mysqli_fetch_assoc($result)) {
                $ma = $row["product_id"];
                $ten = $row["product_name"];
                $anh = $row["product_image"];
                $gia = $row["price"];
                $parsed_gia = number_format($gia, 0, ",", ".");
    ?>
                <div class="product">
                    <a href="./chitietsanpham.php?product_id=<?php echo $ma; ?>">
                        <img src="./hinh_anh/uploads/<?php echo $anh; ?>" alt="product_img">
                    </a>
                    <a href="./chitietsanpham.php?product_id=<?php echo $ma; ?>">
                        <h2><?php echo htmlspecialchars($ten); ?></h2>
                    </a>
                    <p><?php echo $parsed_gia; ?>₫</p>
                    <button>
                        <a href="./chitietsanpham.php?product_id=<?php echo $ma; ?>" class="btn">Xem chi tiết</a>
                    </button>
                </div>
    <?php
            }
            echo '</div>'; 
        } else {
            echo "<p>Không có sản phẩm nào.</p>";
        }

        mysqli_close($conn);
    ?>
</section>
