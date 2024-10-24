<!DOCTYPE html>
<html>

<head>
    <title>Sửa sản phẩm</title>
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

        input[type="text"],
        input[type="number"],
        input[type="file"] {
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
    <?php
    include 'config.php';
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    $maSp = $_GET["idSV"];
    $sql = "SELECT * FROM `san_pham` where product_id = $maSp";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $maSp = $row['product_id'];
        $tensp = $row['product_name'];
        $mota = $row['product_description'];
        $hinhanh = $row['product_image'];
        $gia = $row['price'];
        $soluong = $row['stock_quantity'];
        $dmsp = $row['category_id'];
    }
    ?>
    <form action="xulydulieusua.php?masp=<?php echo $_GET["idSV"] ?>" method="POST">
        <h1>Sửa Dữ Liệu</h1>
        <table>
            <tr>
                <td class="label"><label for="ten_sanpham">Tên sản phẩm:</label></td>
                <td><input type="text" name="ten_sanpham" id="mota" value="<?php echo $tensp ?>"></td>
            </tr>
            <tr>
                <td class="label"><label for="hang_sua">Mô tả:</label></td>
                <td>
                    <textarea type="text" name="mota" id="mota" rows="10" cols="50">
                          <?php echo $mota ?>
                </textarea>
                </td>
            </tr>
            <tr>
                <td class="label"><label for="loai_sua">Giá:</label></td>
                <td><input type="text" name="gia" id="gia" value="<?php echo $gia ?>"></td>
            </tr>
            <tr>
                <td class="label"><label for="soluonghangton">Số lượng hàng tồn:</label></td>
                <td><input type="text" name="soluonghangton" value="<?php echo $soluong ?>" id="soluonghangton"></td>
            </tr>
            <tr>
                <td>Danh mục sản phẩm</td>
                <td class="label">

                    <select name="danhmuc">


                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "qlbs");
                        $sql = "SELECT * FROM `danh_muc_san_pham`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $madm = $row["category_id"];
                            $tendm = $row["category_name"];
                            // <select name="danhmuc">
                            //                             <option value="31">Hàng Cho free</option>

                            //                             <option value="27">Phụ kiện</option>

                            //                             <option selected="" value="18">Áo</option>
                            //                             <option value="15">Quần</option>

                            //                         </select>
                        ?>
                            <option <?php if ($madm ==  $dmsp)
                                        echo "selected=''";
                                    else
                                        echo "";
                                    ?> value="<?php echo $madm; ?>"><?php echo $tendm; ?></option>
                        <?php
                        }
                        ?>

                    </select>

                </td>

            </tr>
            <tr>
                <td class="label"><label for="hinhanh">Hình ảnh:</label></td>
                <td>
                    <input type="hidden" name="hinhanh_cu" value="<?php echo $hinhanh; ?>">
                    <input type="file" name="hinhanh" id="hinhanh">
                    <br>
                    <img src="./hinh_anh/didong/<?php echo  $hinhanh ?>" style=" max-width: 60px;" alt="iPhone">
                </td>
            </tr>
        </table>
        <div class="buttons">
            <button type="submit" id="btn" name="btnSave">Lưu</button>
        </div>
    </form>
</body>

</html>