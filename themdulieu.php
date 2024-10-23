<!DOCTYPE html>
<html>
<head>
	<title>Thêm  mới sản phẩm</title>
    <style>
        label {
    display: inline-block;
    width: 120px;
    text-align: right;
    margin-right: 10px;
}

input[type="text"],
input[type="number"],
select {
    width: 300px;
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
table {
			border: 1px solid black;
		}
		input[type="text"], input[type="number"], input[type="file"] {
			border: 1px solid black;
			padding: 5px;
			margin: 5px;
			width: 300px;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
		}

button {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}


button[type="reset"] {
    margin-left: 10px;
}
    </style>
</head>
<body>
	
	<form action="xulythem.php" method="POST">
    <h1>Thêm mới sản phẩm</h1>
		<table>
			<tr>
				<td class="label"><label for="ten_sanpham">Tên sản phẩm:</label></td>
				<td><input type="text" name="ten_sanpham" id="mota"></td>
			</tr>
			<tr>
				<td class="label"><label for="hang_sua">Mô tả:</label></td>
				<td> <textarea type="text" name="mota" id="mota" rows="10" cols="50">    
                        
                </textarea> </td>
			</tr>
			<tr>
				<td class="label"><label for="loai_sua">Giá:</label></td>
				<td><input type="text" name="gia" id="lgia"></td>
			</tr>
			<tr>
				<td class="label"><label for="soluonghangton">Số lượng hàng tồn:</label></td>
				<td><input type="number" name="soluonghangton" id="soluonghangton"></td>
			</tr>
			<tr>
            <td>Danh mục sản phẩm</td>
				<td class="label">
                <select name="danhmuc">
    <?php
        $conn = mysqli_connect("localhost","root","","hung_mobile");
        $sql = "SELECT * FROM `danh_muc_san_pham`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $madm= $row["category_id"];
            $tendm= $row["category_name"];
	
    ?>
            <option 
			value="<?php echo $madm;?>"><?php echo $tendm;?></option>
    <?php 
        }
    ?>
</select>
                </td>
				
			</tr>
			<tr>
				<td class="label"><label for="hinhanh">Hình ảnh:</label></td>
				<td><input type="file" name="hinhanh" id="hinhanh"></td>
			</tr>
		</table>
		<div class="buttons">
			<button type="submit" id="btn" name = "btnSave">Lưu sản phẩm</button>
			<button type="reset">Nhập lại</button>
		</div>
	</form>
</body>
</html>