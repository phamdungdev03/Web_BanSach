<div class="category">
    <ul class="category-list">
        <?php
        include 'config.php';
        $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $HOST);
        $sql = "SELECT * FROM danh_muc_san_pham";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["category_id"];
                $name = $row["category_name"];
        ?>
                <li class="category-item">
                    <a href="danhmucsanpham.php?category_id=<?php echo $id; ?>"><?php echo $name ?></a>
                </li>
        <?php
            }
        }
        ?>
    </ul>
</div>