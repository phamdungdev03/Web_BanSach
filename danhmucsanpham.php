<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./danhmucsanpham.css">
    <title>Danh Mục Sản Phẩm</title>
</head>

<body>
    <?php include 'header.php' ?>
    <?php include 'config.php' ?>
    <div class="container">
        <?php
        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
        }
        ?>
        <div class="content">
            <div class="content-left">
                <?php include 'danhmuc.php' ?>
            </div>
            <div class="content-center">
                <p class="category-title">
                    <?php $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
                    $sql = "SELECT * FROM danh_muc_san_pham WHERE category_id = $category_id";
                    $result = mysqli_query($conn, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        echo $row["category_name"];
                    } ?></p>
                <div class="products">
                    <?php
                    $sql = "SELECT * FROM san_pham WHERE category_id = $category_id";
                    require("./card_sanpham.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>