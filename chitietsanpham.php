<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="./chitietsanpham.css">
    <link rel="shortcut icon" href="./hinh_anh/logomb.png" />
    <link rel="stylesheet" href="./style.css">
<head>
</head>
<body>
<header>
		<div class="header-container">
			<div class="logo">
				<a href="index.php"><img src="./hinh_anh/logomb.png" alt="logo"></a>
			</div>
			<nav>
			<ul>
				<li><a href="index.php">Trang chủ</a></li>
				<li><a href="sanpham.php">Sản phẩm</a></li>
				<li><a href="#">Liên hệ</a></li>
			</ul>
		</nav>

	
		<div class="cart">
			<a href="giohang.php"><img src="./hinh_anh/logogiohang.png" alt="Giỏ hàng"></a>


		</div>
 
  <?php
    session_start();
    if(isset($_SESSION['username'])) {
	  echo "<div><a style='color:#fff; text-decoration: none;
	  font-weight: bold;'  href='./donhang.php'>Đơn hàng</a></div>";
	  echo "<div><a style='color:#fff; text-decoration: none;
	  font-weight: bold;'  href='thoat.php'>Đăng xuất</a></div>";
	  echo "<div><p style='color:#fff'>Chào mừng,<br>" . $_SESSION['username'] . "</p></div>";
    } else {
      echo "<div class='dangnhap'><a href='dangnhap.php'><img src='./hinh_anh/logodangnhap.png' alt='Đăng nhập'></a></div>";
    
    }
  ?>

			
	</header>

  <br><br><br><br> <br>
  <?php 
  $conn = mysqli_connect("localhost","root","","hung_mobile");
  $ma = $_GET["product_id"];
  $sql = "SELECT * From `san_pham` where product_id = $ma";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
  $ma = $row["product_id"];
  $ten = $row["product_name"];
  $anh = $row["product_image"];
  $gia = $row["price"];
  $mota = $row["product_description"];
  $parsed_gia = number_format($gia, 0, ",", ",");
}

?>
  <div class="product-detail">
  <a href="index.php" style = "   text-decoration: none;">&larr; Trang chủ</a>
  <br> 
  <br> 
  <hr>
  <br>
  <h2 class="product-name"><?php echo $ten?></h2>
  <br>
  <hr>
  <br>
    <div class="product-detail-tt">
          <img src="./hinh_anh/didong/<?php echo $anh?>" alt="Product Image">
    <div>
      <p style="font-size: 30px;">Mua ngay</p>
    <h3 class="product-price"><strong><?php echo $parsed_gia?> ₫</strong></h3>
    <p class="product-description"><?php echo $mota?></p>
    <!-- <a href="them-vao-gi o-hang.php?product_id=<?php// echo $ma ?>"> -->
    <p style="
  margin: 20px 0 0 0;
  font-size: 18px;
  font-weight: bold;">Số lượng</p>
    <form action="giohang.php?action=add" method = "POST">
      <input type="text" value= "1" name ="quantity[<?php echo $ma ?>]" size="2">
      <br>
      <input class="add-to-cart-btn" id ="add-to-cart-btn" onclick="addToCart()" type="submit" value="Mua sản phẩm">
      <!-- <button class="add-to-cart-btn" id ="add-to-cart-btn" onclick="addToCart()">+ Thêm vào giỏ hàng</button> -->
      </form>
      <!-- </a> -->
 
  </div>

  </div>
  </div>
 
  <div class="container">
  <br>
  <hr>
  <br>
  <h1 style="font-size: 2.5em;"> Các sản phẩm khác</h1>
  <br>
  <hr>
  <br>
  <div class="products">
			<?php 
			   $conn = mysqli_connect("localhost","root","","hung_mobile");
					 $sql = "SELECT * From san_pham";
				 
				 $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $ma = $row ["product_id"];
            $ten = $row["product_name"];
        	$anh = $row["product_image"];
        	$gia = $row["price"];
			$parsed_gia = number_format($gia, 0, ",", ",");
   			 ?>
				<div class="product">
					<a href="./chitietsanpham.php?product_id=<?php echo $ma;?>">
						<img src="./hinh_anh/didong/<?php echo $anh?>" alt="iPhone">
					</a>
					<a href="./chitietsanpham.php?product_id=<?php echo $ma;?>">
							<h2><?php echo $ten?></h2>
					</a>
					<p><?php echo $parsed_gia?>₫</p>
					<button>
						<a href="./chitietsanpham.php?product_id=<?php echo $ma;?>" class="btn">Xem chi tiết</a>
					</button>
					
            </div>
				
				<?php  }?>
				</div>
			</div>
		</main>
	
	</div>
  </div>
  <!-- <footer >
		<div class="footer-ct">
				<p>Nguyễn Phi Hùng - 10/08/2002 </p>
				<p>Website bán điện thoại di động &copy; 2023</p>
		</div>

	</footer> -->

</body>
</html>
<script>
function addToCart() {
  <?php
  if(isset($_SESSION['username'])) {
    echo "alert('Thêm vào giỏ hàng thành công!');";
  } else {
    echo "alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');";
  }
  ?>
}


</script>