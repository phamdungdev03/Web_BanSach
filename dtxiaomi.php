<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Trang chủ - Website bán điện thoại di động</title>
	<link rel="stylesheet" href="./style.css">
	<link rel="shortcut icon" href="./hinh_anh/logomb.png" />
    <style>
        .sc{
              border: 1px solid #ccc ;width: 120px; height: 36px;  border-radius: 52px;
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
			  $conn = mysqli_connect("localhost","root","","hung_mobile");
	
				$sql = "SELECT sp.product_id, sp.product_name, sp.product_description, sp.product_image, sp.price, sp.stock_quantity, sp.category_id
                FROM san_pham sp
                INNER JOIN danh_muc_san_pham dm ON sp.category_id = dm.category_id
                WHERE sp.category_id = 4;";
			  
			
			?>
		
		</div>
	
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
	<div class="sidebar">
		<!-- <p style="font-size: 16px;">DANH MỤC SẢN PHẨM</p> -->
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
                    <span class ="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                    <span class="dot" onclick="currentSlide(5)"></span>
                </div>
             </div>
             <div style="display:flex;">
              <a href="./dtiphone.php">
                  <img class="sc"  name ="img1" src="./hinh_anh/danhmucsanpham/logo-iphone-220x48.png" style= " margin-left: 300px;" alt="">
              </a>
            <a href="./dtsamsung.php">
                  <img class="sc" name ="img2" src="./hinh_anh/danhmucsanpham/samsungnew-220x48-1.png" alt="">
            </a>
              <a href="./dtoppo.php">
                  <img class="sc" name ="img3" src="./hinh_anh/danhmucsanpham/OPPO42-b_5.jpg" alt="">
              </a>
              <a href="./dtxiaomi.php">
                 <img class="sc"  name ="img4" src="./hinh_anh/danhmucsanpham/logo-xiaomi-220x48-5.png" alt="">
              </a>
   <a href="./dtvivo.php">
    <img  class="sc" name ="img5" src="./hinh_anh/danhmucsanpham/vivo-logo-220-220x48-3.png"  alt="">
   </a>
    

              </div>
             <div  style ="margin-left: 400px;font-size: 25px; margin-top:30px;">
            <p>__________ĐIỆN THOẠI XIAOMI__________</p>
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
	<footer>
		<div class="footer-ct">
				<p>Nguyễn Phi Hùng - 10/08/2002 </p>
				<p>Website bán điện thoại di động &copy; 2023</p>
		</div>
		
	</footer>
	<script src="script.js"></script>
</body>
</html>
