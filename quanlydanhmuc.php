<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ quản lý</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <section style="display: flex">
        <?php 
            require("./sidebar_admin.php");
        ?>
        <section class="hero">
            <div class="hero-text">
                <?php
                    include 'config.php';
                    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

                    $sql = "SELECT * From `danh_muc_san_pham`";
                    $result = mysqli_query($conn, $sql);
                ?>
                <div>
                    <div class="box_title">
                        <h3>Quản lý danh mục sản phẩm </h3>
                    </div>

                    <button type="button" class="button" onclick="window.location.href='themdanhmuc.php'">
                        <span class="button__text">Thêm mới</span>
                        <span class="button__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                                <line y2="19" y1="5" x2="12" x1="12"></line>
                                <line y2="12" y1="12" x2="19" x1="5"></line>
                            </svg>
                        </span>
                    </button>

                    <table class="bangchinh">
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Tác vụ</th>
                        </tr>
                        <?php
                        $index = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $index++;
                            $id  = $row['category_id'];
                            $tendm = $row['category_name'];
                        ?>
                            <tr>
                                <td><?php echo $index; ?></td>
                                <td><?php echo $tendm; ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="brcl3">
                                            <a href="motadanhmuc.php?idSV=<?php echo $id; ?>">Mô tả</a>
                                        </button>
                                        <button type="button" class="brcl">
                                            <a href="suadanhmuc.php?idSV=<?php echo $id; ?>">Sửa</a>
                                        </button>
                                        <button type="button" class="brcl2">
                                            <a href="xoadanhmuc.php?idSV=<?php echo $id; ?>">Xóa</a>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php mysqli_close($conn); ?>
                    </table>
                </div>
        </section>
    </section>

    <footer>
        <p>Lê Thị Phương Thảo - 18/09/2003 </p>
        <p>Nguyễn Văn Quang - 10/08/2003</p>
        <p>Ngô Văn Thông - 09/06/2003</p>
    </footer>
</body>

</html>