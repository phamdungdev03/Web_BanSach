<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <title>Chi tiết sản phẩm</title>
  <link rel="stylesheet" href="./chitietsanpham.css">
  <link rel="shortcut icon" href="./hinh_anh/logomb.png" />
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
  <?php include 'header.php' ?>
  <?php
  include 'config.php';
  $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
  $ma = $_GET["product_id"];
  $sql = "SELECT * From `san_pham` where product_id = $ma";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $ma = $row["product_id"];
    $ten = $row["product_name"];
    $anh = $row["product_image"];
    $gia = $row["price"];
    $mota = $row["product_description"];
    $parsed_gia = number_format($gia, 0, ",", ",");
  }

  ?>
  <div class="detail container">
    <div class="detail-info">
      <img src="./hinh_anh/uploads/<?php echo $anh ?>" alt="">
      <div class="detail-info-detail">
        <p class="detail-info-title"><?php echo $ten ?></p>
        <div class="detail-info-review">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <div class="detail-info-price">
          <p class="old-price"><?php echo $parsed_gia ?></p>
          <p class="new-price"><?php echo $parsed_gia ?></p>
        </div>
        <div class="detail-info-quantity">
          <form action="giohang.php?action=add" method="POST">
            <div class="detail-info-quantity__number">
              <span id="prev">-</span>
              <input type="number" id="quantity" value="1" name="quantity[<?php echo $ma ?>]">
              <span id="add">+</span>
            </div>
            <div class="detail-btn">
              <input type="submit" name="" id="" class="btn_add-cart" onclick="addToCart()" value="Thêm vào giỏ hàng">
              <input type="submit" id="add-to-cart-btn" class="btn-buy" onclick="addToCart()" value="Mua Ngay">
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="detail-description">
      <div class="detail-description-title">
        <span>Mô Tả</span>
      </div>
      <div class="detail-description-content">
        <p><?php echo $mota ?></p>
      </div>
    </div>
  </div>

  <div class="container">
    <br>
    <hr>
    <br>
    <h1 style="font-size: 20px;"> Các sản phẩm khác</h1>
    <br>
    <hr>
    <br>
    <div class="products">
      <?php
      $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
      $sql = "SELECT * From san_pham";
      require('./card_sanpham.php')
      ?>
    </div>
  </div>
  </main>

  </div>
  </div>
  <?php include 'footer.php'; ?>
</body>

</html>
<script>
  function addToCart() {
    <?php
    if (isset($_SESSION['username'])) {
      echo "alert('Thêm vào giỏ hàng thành công!');";
    } else {
      echo "alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');";
    }
    ?>
  }
  var prev = document.getElementById("prev");
  var add = document.getElementById("add");
  var quantity = document.getElementById("quantity");

  prev.onclick = () => {
    var currentValue = parseInt(quantity.value);
    if (currentValue > 1) {
      quantity.value = currentValue - 1;
    }
  }

  add.onclick = () => {
    var currentValue = parseInt(quantity.value);
    quantity.value = currentValue + 1;
  }
</script>