<style>
.products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin: 0 auto;
    max-width: 1000px;
}

.product {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 15px;
    text-align: center;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.product:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.product a {
    text-decoration: none;
}

.product img {
    max-width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 5px;
    margin-bottom: 10px;
}

.product h2 {
    font-size: 16px;
    color: #333;
    margin: 10px 0;
    line-height: 1.2;
}

.product p {
    font-size: 14px;
    color: #ff5722;
    font-weight: bold;
    margin: 8px 0;
}

.product button {
    background-color: #007bff;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.2s;
    font-size: 12px;
}

.product button:hover {
    background-color: #0056b3;
}

.product .btn {
    text-decoration: none;
    color: inherit;
}

@media (max-width: 768px) {
    .products {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    }
}

</style>

<div class="products">
    <?php
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $ma = $row["product_id"];
            $ten = $row["product_name"];
            $anh = $row["product_image"];
            $gia = $row["price"];
            $parsed_gia = number_format($gia, 0, ",", ".");
    ?>
    <div class="product">
        <a href="./chitietsanpham.php?product_id=<?php echo $ma; ?>">
            <img src="./hinh_anh/uploads/<?php echo $anh ?>" alt="product_img">
        </a>
        <a href="./chitietsanpham.php?product_id=<?php echo $ma; ?>">
            <h2><?php echo htmlspecialchars($ten); ?></h2>
        </a>

        <p><?php echo $parsed_gia ?>₫</p>
        <button>
            <a href="./chitietsanpham.php?product_id=<?php echo $ma; ?>" class="btn">Xem chi tiết</a>
        </button>
    </div>
    <?php
        }
    ?>
</div>
