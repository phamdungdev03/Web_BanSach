<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Trang chủ - Website bán điện thoại di động</title>
	<link rel="stylesheet" href="./style.css">
	<link rel="shortcut icon" href="./hinh_anh/logomb.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	<style>
		.sc {
			border: 1px solid #ccc;
			width: 120px;
			height: 36px;
			border-radius: 52px;
			margin: 15px 10px;
			cursor: pointer;
		}
	</style>
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
			<div>
				<?php
				include 'config.php';
				$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
				if (isset($_GET["search"]) && !empty($_GET["search"])) {
					$key = trim($_GET["search"]);
					$sql = "SELECT product_id, product_name, product_image, price 
				FROM san_pham 
				WHERE (product_id LIKE '%$key%') 
					OR (product_name LIKE '%$key%') 
					OR (product_image LIKE '%$key%') 
					OR (price LIKE '%$key%');";

					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) <= 0) {
						echo "<script>alert('Không tìm thấy " . $_GET["search"] . " trong tài liệu nào.!');
						window.location.href = 'index.php';
						</script>";
					}
				} else {
					$sql = "SELECT * FROM san_pham ORDER BY price DESC";
					$result = mysqli_query($conn, $sql);
				}

				?>
				<form action="" method="get">
					<input type="text" placeholder="Bạn tìm gì....." name="search" value="<?php if (isset($_GET["search"])) {
																								echo trim($_GET["search"]);
																							} ?>">
					<input type="submit" value="Search">
				</form>
			</div>

			<div class="cart">
				<a href="giohang.php"><img src="./hinh_anh/logogiohang.png" alt="Giỏ hàng"></a>
			</div>

			<?php
			session_start();
			if (isset($_SESSION['username'])) {

				echo "<div><a style='color:#fff; text-decoration: none;
	  font-weight: bold;'  href='./donhang.html'>Đơn hàng</a></div>";
				echo "<div><a style='color:#fff; text-decoration: none;
	  font-weight: bold;'  href='thoat.php'>Đăng xuất</a></div>";
				echo "<div><p style='color:#fff'>Chào mừng,<br>" . $_SESSION['username'] . "</p></div>";
			} else {
				echo "<div class='dangnhap'><a href='dangnhap.php'><img src='./hinh_anh/logodangnhap.png' alt='Đăng nhập'></a></div>";
			}
			?>
	</header>
	<div class="container">
		<main>
			<!-- <div class="banner">
				<div class="slideshow-container">

					<div class="mySlides fade">
						<img src="./hinh_anh/banner/banner0.webp" style="width:100%;">
					</div>

					<div class="mySlides fade">
						<img src="./hinh_anh/banner/banner1.webp" style="width:100%">
					</div>

					<div class="mySlides fade">
						<img src="./hinh_anh/banner/banner2.png" style="width:100%">
					</div>

					<div class="mySlides fade">
						<img src="./hinh_anh/banner/banner3.jpg" style="width:100%">
					</div>

					<div class="mySlides fade">
						<img src="./hinh_anh/banner/banner4.webp" style="width:100%">
					</div>

					<div class="boder-prev">
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					</div>
					<div class="boder-next">
						<a class="next" onclick="plusSlides(1)">&#10095;</a>
					</div>

				</div>
				<br>

				<div style="text-align:center">
					<span class="dot" onclick="currentSlide(1)"></span>
					<span class="dot" onclick="currentSlide(2)"></span>
					<span class="dot" onclick="currentSlide(3)"></span>
					<span class="dot" onclick="currentSlide(4)"></span>
					<span class="dot" onclick="currentSlide(5)"></span>
				</div>
			</div> -->

			<?php include 'danhmuc.php' ?>

			<div class="products">
				<?php


				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
					$ma = $row["product_id"];
					$ten = $row["product_name"];
					$anh = $row["product_image"];
					$gia = $row["price"];
					$parsed_gia = number_format($gia, 0, ",", ",");
				?>
					<div class="product">
						<a href="./chitietsanpham.php?product_id=<?php echo $ma; ?>">
							<img src="./hinh_anh/uploads/<?php echo $anh ?>" alt="sach_image">
						</a>
						<a href="./chitietsanpham.php?product_id=<?php echo $ma; ?>">
							<h2><?php echo $ten ?></h2>
						</a>
						<p><?php echo $parsed_gia ?>₫</p>
						<button>
							<a href="./chitietsanpham.php?product_id=<?php echo $ma; ?>" class="btn">Xem chi tiết</a>
						</button>

					</div>

				<?php  } ?>
			</div>
			<?php 
				require("./card_sanpham.php");
			?>
		</main>
	</div>

	<?php 
		require("./footer.php");
	?>
	<script src="script.js"></script>
</body>

</html>