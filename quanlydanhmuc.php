<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ quản lý</title>
    <link rel="stylesheet" href="admin.css">
<style>
</style>
  </head>
  <body>
  <div class="header">
    <div class="logo">HUNG MOBILE</div>
    <div class="user-info">
    
        <?php
        session_start();
        if(isset($_SESSION['username'])) {
            echo "<a href='thoat.php' >Đăng xuất</a>";
            echo "<p>Chào mừng,<br>" . $_SESSION['username'] . "</p>";
        }
        else{
            echo  "<a href='dangnhap.php'>Đăng nhập</a>";
        }
        ?>
    </div>
    </div>
    <header>
      <nav>
        <ul class="nav-links">
          <li>
            <div class = "menu">
                <a href="indexadmin.php">Trang chủ</a>
            </div>
            </li>
          <li><div  class = "menu">
                <a href="quanlysanpham.php">Sản phẩm</a>
            </div></li>
          <li><div  class = "menu">
                <a href="quanlydanhmuc.php">Danh mục</a>
            </div></li>
          <li><div  class = "menu" >
                <a href="quanlydonhang.php">Đơn hàng</a>
            </div></li>
          <li><div  class = "menu">
                <a href="quanlykhachhang.php">Khách hàng</a>
            </div></li>
        </ul>
      </nav>
    </header>
    <section class="hero">
      <div class="hero-text">
      <?php 
 
  
  $conn = mysqli_connect("localhost","root","","hung_mobile");
			

				$sql = "SELECT * From `danh_muc_san_pham`";
				$result = mysqli_query($conn, $sql); 
    
    ?>
    <div style='margin-left: 200px;'>

    
    <div class="div1">
        <h3 align ="center">Quản lý danh mục sản phẩm </h3>
    </div>
    
    <table  class="bangchinh" border="1" align = "center" cellspacing = "0" width = "100%" >
    <tr>
    <tr>
    <tr>
    <form action="xulythemdanhmuc.php" method="POST">
    </tr>
        <td colspan="3" align="center" >
            <h3>Thêm danh mục</h3>
        </td>
        </tr>
		<td class="label"><label for="ten_danhmuc">Tên:</label></td>
				<td colspan="2"><input type="text" name="ten_danhmuc" id="mota"></td>
			</tr>
			<tr>
				<td class="label"><label for="mota">Mô tả:</label></td>
				<td colspan="2"> <textarea type="text" name="mota" id="mota" rows="10" cols="50">    
                        
                </textarea> </td>
			</tr>
        <td colspan="3" align="center" >
            <button type="submit" name = "btnSave" class="brcl1"  >Thêm mới </button>
            <button type="reset" class="brcl1"  >Nhập lại</button>
        </td>
           
        </tr>
    </form>
    <td colspan="3" align="center" >
            <h3>Liệt Kê menu</h3>
        </td>
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Tác vụ</th>
        </tr>
 <?php 
        $index = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $index++;
            $id  = $row['category_id'];
            $tendm = $row['category_name'];
            $mt = $row['category_description'];
    ?>
       <tr>
        <td>
            <?php  
                echo  $index
            ?>
        </td>
        <td>
            <?php  
                echo     $tendm
            ?>
        </td>

        <td >
        <div style="display: flex;">
        <button type="button" class="brcl3">
            <a style="text-decoration: none; color: aliceblue;" href="motadanhmuc.php?idSV=<?php echo $id;  ?>">Mô tả</a>
            </button type="button">
        <button type="button" class="brcl">
                  <a style="text-decoration: none; color: aliceblue;" href="suadanhmuc.php?idSV=<?php echo $id;  ?>">Sửa</a>
            </button type="button">
         <button type="button" class="brcl2">
            <a style="text-decoration: none; color: aliceblue;" href="xoadanhmuc.php?idSV=<?php echo $id;  ?>">Xóa</a>
            </button type="button">
        </td>
       </tr> 
        <?php 
        }
?>
<?php
    mysqli_close($conn);
?>

    </table>
      </div>
    </section>
    </div> 

    <footer>
      <p> Nguyễn Phi Hùng - 10/08/2002</p>
    </footer>
  </body>
</html>