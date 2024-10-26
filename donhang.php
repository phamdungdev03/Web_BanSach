<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./donhang.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./hinh_anh/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Đơn hàng</title>
</head>

<body>
    <?php 
        require("./header.php");
    ?>

    <br><br>
    <section>
        <div class="order">
            <h2>Thông tin đơn hàng</h2>

            <?php

            include 'config.php';
            $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);

            $username = $_SESSION['username'];
            $query = "SELECT customer_id FROM khach_hang WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $customer_id = $row['customer_id'];
            $sql = "SELECT order_id FROM chi_tiet_don_hang WHERE customer_id = $customer_id";
            $result = mysqli_query($conn, $sql);
            $order_ids = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $order_ids[] = $row['order_id'];
            }
            if (count($order_ids) > 0) {
                $sql2 = "SELECT * FROM don_hang WHERE order_id IN (" . implode(',', $order_ids) . ")";
                $result2 = mysqli_query($conn, $sql2);
            } else {
                echo "<script>alert('Đơn hàng rỗng.! Bạn chưa mua đơn hàng nào');
						window.location.href = 'index.php';
						</script>";
            }

            ?>
            <table class="bangchinh" border="1" align="center" cellspacing="0" width="100%">
                <tr>
                    <th>STT</th>
                    <th>Tên người nhận</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Thời gian đặt</th>
                    <th>Thời gian giao</th>
                    <th>Trạng Thái</th>
                    <th>Xem đơn hàng</th>
                    <th>Cập nhật Trạng thái</th>
                </tr>
                <?php
                $index = 0;
                while ($row = mysqli_fetch_assoc($result2)) {
                    $index++;
                    $ma = $row['order_id'];
                    $ten = $row['customer_name'];
                    $diachi = $row['customer_address'];
                    $email = $row['customer_email'];
                    $phone = $row['customer_phone'];
                    $Ngaytao = $row['order_date'];
                    $mattcu = $row['order_status'];
                ?>
                    <tr>
                        <td>
                            <?php
                            echo   $index;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo    $ten
                            ?>
                        </td>

                        <td>

                            <?php
                            echo     $diachi
                            ?>



                        </td>
                        <td>
                            <?php
                            echo  $phone
                            ?>

                        </td>
                        <td>
                            <?php
                            echo  $email
                            ?>

                        </td>

                        <td>
                            <?php
                            $timestamp = strtotime('+5 hour 0 minutes', $Ngaytao);
                            echo date('d/m/Y H:i',  $timestamp);
                            ?>
                        </td>
                        <td>Dự kiến 10 ngày sau khi đơn hàng đã được xử lý</td>
                        <td>


                            <?php
                            if ($mattcu == 1) {
                                echo "Mới";
                            } else if ($mattcu == 2) {
                                echo "Đang xử lý";
                            } else if ($mattcu == 3) {
                                echo "Đang vận chuyển";
                            } else if ($mattcu == 4) {
                                echo "Hoàn Thành";
                            } else {
                                echo "Đã Hủy Đơn";
                            }

                            ?>


                        </td>
                        <td>
                            <a href="donhangchitietkhachhang.php?iddh=<?php echo $ma ?>">Xem chi tiết</a>
                        </td>
                        <td>
                            <?php if ($mattcu == 5) { ?>
                            <?php echo "Hủy thành công";
                            } else if ($mattcu == 4) {
                                echo "Đã hoàn thành";
                            } else {
                            ?>
                                <a href="Xacnhandonhang.php?iddh=<?php echo  $ma ?>">
                                    <button> Xác nhận</button>
                                </a>
                                <a href="xulyhuydonhang.php?iddh=<?php echo  $ma ?>">
                                    <button> Hủy đơn hàng</button>
                                </a>
                            <?php
                            } ?>
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

</body>

</html>