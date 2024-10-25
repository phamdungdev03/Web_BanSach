<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Mới Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            max-width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: inline-block;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }

        .input,
        .textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9fafb;
            transition: border-color 0.3s;
        }

        .select {
            width: calc(100%);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
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
            height: 100px;
            resize: none;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        button[type="reset"] {
            background-color: #f44336;
            margin-top: 10px;
        }

        button[type="reset"]:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <form action="xulythem.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <h1>Thêm Mới Sản Phẩm</h1>
        <label for="ten_sanpham">Tên sản phẩm:</label>
        <input type="text" name="ten_sanpham" id="ten_sanpham" class="input" required>

        <label for="mota">Mô tả:</label>
        <textarea name="mota" id="mota" class="textarea" placeholder="Nhập mô tả sản phẩm" required></textarea>

        <label for="gia">Giá:</label>
        <input type="text" name="gia" id="gia" class="input" required>

        <label for="soluonghangton">Số lượng hàng tồn:</label>
        <input type="number" name="soluonghangton" id="soluonghangton" class="input" required min="1">

        <label for="danhmuc">Danh mục sản phẩm:</label>
        <select name="danhmuc" id="danhmuc" class="select" required>
            <?php
            include 'config.php';
            $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
            $sql = "SELECT * FROM `danh_muc_san_pham`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $madm = $row["category_id"];
                $tendm = $row["category_name"];
            ?>
                <option value="<?php echo $madm; ?>"><?php echo $tendm; ?></option>
            <?php
            }
            ?>
        </select>

        <label for="hinhanh">Hình ảnh:</label>
        <input type="file" name="hinhanh" id="hinhanh" class="input" accept="image/*" required>

        <button type="submit" name="btnSave">Lưu Sản Phẩm</button>
        <button type="reset">Nhập Lại</button>
    </form>

    <script>
        function validateForm() {
            const gia = document.getElementById('gia').value;
            const hinhanh = document.getElementById('hinhanh').value;

            // Validate giá sản phẩm
            if (isNaN(gia) || gia <= 0) {
                alert('Vui lòng nhập giá sản phẩm là số lớn hơn 0.');
                return false;
            }

            // Validate file hình ảnh
            if (!hinhanh.match(/\.(jpg|jpeg|png|gif)$/i)) {
                alert('Vui lòng chọn file ảnh có định dạng jpg, jpeg, png hoặc gif.');
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
