<form action="suatrangthaidonhang.php?macu=<?php echo  $_GET['iddh'] ?>" method="post">
        <select name="Trangthai">


                <?php $mattcu = $_GET['iddh'];
                include 'config.php';
                $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
                $sql = "SELECT * FROM `trang_thai`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                        $matt = $row["order_status"];
                        $tentt = $row["status"];
                ?>
                        <option <?php if ($matt ==   $mattcu)
                                        echo "selected=''";
                                else
                                        echo "";
                                ?> value="<?php echo $matt; ?>"><?php echo $tentt; ?></option>
                <?php
                }
                ?>
                <br>
                <input type="submit" name="save" value="Cập nhật">

        </select>
</form>