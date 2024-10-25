<style>
    body {
    font-family: Arial, sans-serif; 
    margin: 0; 
    background-color: #f1f1f1; 
}

.header {
    background-color: #343a40; 
    padding: 20px 30px;
    color: #ffffff; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-title {
    font-size: 24px; 
    margin: 0; 
}

.header-info {
    display: flex;
    gap: 20px; 
    align-items: center;
}

.admin-name,
.logout {
    cursor: pointer;
    color: #f8f9fa; 
    transition: color 0.3s; 
}

.admin-name:hover,
.logout:hover {
    color: #adb5bd; 
}

.logout {
    border: 1px solid #f8f9fa; 
    border-radius: 5px;
    padding: 5px 10px;
    background-color: transparent; 
    transition: background-color 0.3s, color 0.3s; 
}

.logout:hover {
    background-color: #495057; 
    color: #ffffff; 
}
</style>

<header class="header">
    <h3 class="header-title">Book Store</h3>
    <div class="header-info">
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<span class='admin-name'>" . $_SESSION['username'] . "</span>";
            echo "<span class='logout' href='thoat.php' >Đăng xuất</span>";
        } else {
            echo  "<span class='logout' href='dangnhap.php'>Đăng nhập</span>";
        }
        ?>
    </div>
</header>
