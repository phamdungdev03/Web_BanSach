<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./donhang.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
	  font-weight: bold;'  href='./donhang.html'>Đơn hàng</a></div>";
	  echo "<div><a style='color:#fff; text-decoration: none;
	  font-weight: bold;'  href='thoat.php'>Đăng xuất</a></div>";
	  echo "<div><p style='color:#fff'>Chào mừng,<br>" . $_SESSION['username'] . "</p></div>";
    } else {
      echo "<div class='dangnhap'><a href='dangnhap.php'><img src='./hinh_anh/logodangnhap.png' alt='Đăng nhập'></a></div>";
    }
  ?>
	
	</header>
  <br><br><br><br>
  
  <section>
    <div class="order">
        <h2>Chi tiết đơn hàng</h2>
        
        <?php 
 
  
 $conn = mysqli_connect("localhost","root","","hung_mobile");
           
               $sql = "SELECT * FROM `chi_tiet_don_hang` where order_id = ".$_GET['iddh']."";
               $result = mysqli_query($conn, $sql); 
   ?>
   <table class="bangchinh" border="1" align = "center" cellspacing = "0" width = "100%" >
       <tr>
           <th>STT</th>
           <th>MÃ ĐƠN HÀNG</th>
           <th>TÊN SẢN PHẨM</th>
           <th>GIÁ SẢN PHẨM</th>
           <th>SỐ LƯỢNG</th>
           <th>TỔNG GIÁ TRỊ</th>
       </tr>
<?php  
        $tongs=0;
        $index = 0;
       while($row = mysqli_fetch_assoc($result)) {
           $index++;
           $ma = $row['order_id'];
           $ten = $row['product_name'];
           $gia = $row['price'];
           $soluong = $row['quantity'];
           $tong= $row['total_amount'];
           $tongs += $row['total_amount'];
   ?>
      <tr>
       <td>
           <?php  
               echo  $index;
           ?>
       </td>
       <td>
           <?php  
               echo    $ma;
           ?>
       </td>
           
       <td>

       <?php  
               echo   $ten;
           ?>

       </td>
       <td>

   <?php  
       echo  number_format($gia, 0, ",", ",");
   ?>

</td>
       <td>
           <?php  
               echo   $soluong
          ?>

       </td>
       <td>
           <?php  
              echo   number_format($tong, 0, ",", ",")
          ?> 
          </td>
       </tr>
       <?php 
       }
?>
    <tr>
           <td colspan="6" style="text-align: center">Tổng giá trị: <?php echo  number_format($tongs, 0, ",", ",")?></td>
       </tr>
<?php
   mysqli_close($conn);
?>

   </table>
   <br><br>
   <a style = " text-decoration: none;" href="javascript:history.back()">&#8592; Quay lại</a>
      </div>
  </section>
    
</body>
</html>