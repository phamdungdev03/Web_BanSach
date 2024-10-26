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
	<?php 
		require("./header.php");
	?>
	<div class="container">
		<main>
			<div class="banner">
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