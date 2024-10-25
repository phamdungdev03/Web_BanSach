<style>
    .sidebar {
        width: 250px; 
        background-color: #ffffff;
        padding: 20px; 
        border-right: 1px solid #e0e0e0; 
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); 
        height: 100vh; 
        display: flex; 
        flex-direction: column;
        text-align: center;
        position: sticky;
        top: 0;
    }

    .sidebar-title {
        font-size: 1.5em; 
        margin-bottom: 20px;
        color: #333; 
        text-align: center; 
    }

    .sidebar-nav {
        flex-grow: 1; 
        display: flex; 
        flex-direction: column; 
        text-align: center;
    }

    .sidebar-item {
        text-decoration: none; 
        color: #555;
        padding: 12px 15px; 
        border-radius: 5px; 
        margin-bottom: 10px;
        transition: background-color 0.3s, color 0.3s; 
    }

    .sidebar-item:hover {
        background-color: #f0f0f0; 
        color: #000;
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


<aside class="sidebar">
    <h4 class="sidebar-title">Book Store</h4>
    <nav class="sidebar-nav">
        <a href="indexadmin.php" class="sidebar-item">Trang chủ</a>
        <a href="quanlysanpham.php" class="sidebar-item">Sản phẩm</a>
        <a href="quanlydanhmuc.php" class="sidebar-item">Danh mục</a>
        <a href="quanlydonhang.php" class="sidebar-item">Đơn hàng</a>
        <a href="quanlykhachhang.php" class="sidebar-item">Khách hàng</a>
    </nav>
    <a href="thoat.php" class="sidebar-item logout">Đăng xuất</a>
</aside>
