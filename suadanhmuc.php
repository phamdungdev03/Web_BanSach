<!DOCTYPE html>
<html>

<head>
    <title>Sửa danh mục</title>
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
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
    $madm = $_GET["idSV"];
    $sql = "SELECT * FROM `danh_muc_san_pham` where `category_id` = $madm";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $ma = $row['category_id'];
        $ten = $row['category_name'];
        $mota = $row['category_description'];
    }
    ?>
    <form action="xulysuadanhmuc.php?madm=<?php echo  $madm ?>" method="POST">

        <h1>Sửa danh mục</h1>
        <table>
            <tr>
                <td class="label"><label for="ten_danhmuc">Tên:</label></td>
                <td><input type="text" name="ten_danhmuc" id="mota" value=" <?php echo  $ten ?>"></td>
            </tr>
            <tr>
                <td class="label"><label for="hang_sua">Mô tả:</label></td>
                <td> <textarea type="text" name="mota" id="mota" rows="10" cols="50">
                        <?php echo $mota ?>
                </textarea> </td>
            </tr>
        </table>
        <div class="buttons">
            <button type="submit" id="btn" name="btnSave">Lưu</button>

        </div>

    </form>


</body>

</html>