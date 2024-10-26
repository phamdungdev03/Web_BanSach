<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
        }

        form {
            background-color: #fff;
            border-radius: 8px; /* Giảm border-radius */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px; /* Giảm chiều rộng tối đa */
            margin: 0 auto;
            padding: 20px; /* Giảm padding */
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px; 
            display: flex;
            flex-direction: column;
        }

        .label {
            margin-bottom: 5px; 
            color: #555;
            font-size: 14px;
        }

        .input,
        .textarea,
        .select {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px; 
            font-size: 14px; 
            background-color: #f9fafb;
            transition: border-color 0.3s;
        }

        .input:focus,
        .select:focus,
        .textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
            outline: none;
        }

        .textarea {
            height: 80px; 
            resize: none;
        }

        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px; 
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            font-size: 14px; 
        }

        button:hover {
            background-color: #45a049;
        }

        .img-preview {
            max-width: 60px; 
            margin-top: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            color: #777;
        }
    </style>
</head>

<body>
    <?php
    include 'config.php';
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
    $maSp = $_GET["idSV"];
    $sql = "SELECT * FROM `san_pham` WHERE product_id = $maSp";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $tensp = $row['product_name'];
    $mota = $row['product_description'];
    $hinhanh = $row['product_image'];
    $gia = $row['price'];
    $soluong = $row['stock_quantity'];
    $dmsp = $row['category_id'];
    ?>

    <form action="xulydulieusua.php?masp=<?php echo $maSp ?>" method="POST" enctype="multipart/form-data">
        <h1>Sửa Dữ Liệu Sản Phẩm</h1>
        
        <div class="form-group">
            <label class="label" for="ten_sanpham">Tên sản phẩm:</label>
            <input type="text" class="input" name="ten_sanpham" id="ten_sanpham" value="<?php echo $tensp; ?>" required>
        </div>

        <div class="form-group">
            <label class="label" for="mota">Mô tả:</label>
            <textarea name="mota" class="textarea" id="mota" rows="4" required><?php echo $mota; ?></textarea>
        </div>

        <div class="form-group">
            <label class="label" for="gia">Giá:</label>
            <input type="number" class="input" name="gia" id="gia" value="<?php echo $gia; ?>" required>
        </div>

        <div class="form-group">
            <label class="label" for="soluonghangton">Số lượng hàng tồn:</label>
            <input type="number" class="input" name="soluonghangton" id="soluonghangton" value="<?php echo $soluong; ?>" required>
        </div>

        <div class="form-group">
            <label class="label" for="danhmuc">Danh mục sản phẩm:</label>
            <select name="danhmuc" class="select" id="danhmuc" required>
                <?php
                $sql = "SELECT * FROM `danh_muc_san_pham`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $madm = $row["category_id"];
                    $tendm = $row["category_name"];
                    echo "<option value='$madm'" . ($madm == $dmsp ? " selected" : "") . ">$tendm</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label class="label" for="hinhanh">Hình ảnh:</label>
            <input type="hidden" name="hinhanh_cu" value="<?php echo $hinhanh; ?>">
            <input type="file" class="input" name="hinhanh" id="hinhanh">
            <img src="./hinh_anh/uploads/<?php echo $hinhanh; ?>" alt="Preview" class="img-preview">
        </div>

        <div class="buttons">
            <button type="submit" name="btnSave">Lưu</button>
        </div>
    </form>

    <footer>
        <p>&copy; 2024 Quản lý sản phẩm</p>
    </footer>
</body>

</html>
