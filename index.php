<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Trang chủ - Website bán sách</title>
	<link rel="stylesheet" href="./style.css">
	<link rel="shortcut icon" href="./hinh_anh/logomb.png" />
</head>

<body>

	<?php include 'header.php'?>
	<div class="sidebar">
		<i>Danh mục sản phẩm</i>
        <a href="dtiphone.php" class="active">iPhone</a>
        <a href="dtsamsung.php">Samsung</a>
        <a href="dtoppo.php">Oppo</a>
        <a href="dtxiaomi.php">Xiaomi</a>
        <a href="dtvivo.php">Vivo</a>
    </div>
	<div class="container">

		<main>
			<div class="banner">
				<div class="slideshow-container">

					<div class="mySlides fade">

						<img src="./hinh_anh/banner/banner0.gif" style="width:100%;">

					</div>

					<div class="mySlides fade">
						<img src="./hinh_anh/banner/banner1.png" style="width:100%">
					</div>

					<div class="mySlides fade">
						<img src="./hinh_anh/banner/banner2.png" style="width:100%">
					</div>

					<div class="mySlides fade">
						<img src="./hinh_anh/banner/banner3.png" style="width:100%">
					</div>

					<div class="mySlides fade">
						<img src="./hinh_anh/banner/banner4.png" style="width:100%">
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


			<div class="products">
			<?php 
			 
			 $result = mysqli_query($conn, $sql); 
				
        while($row = mysqli_fetch_assoc($result)) {
            $ma = $row ["product_id"];
            $ten = $row["product_name"];
        	$anh = $row["product_image"];
        	$gia = $row["price"];
			$parsed_gia = number_format($gia, 0, ",", ",");
		}
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
				
			</div>
		</main>

	</div>

	<script src="script.js">
	</script>
</body>

</html>