<style>
    .add-category-form {
        max-width: 400px; 
        margin: 20px auto; 
        padding: 20px; 
        border: 1px solid #e0e0e0; 
        border-radius: 8px; 
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
    }

    .add-category-form h3 {
        text-align: center; 
        margin-bottom: 20px; 
        color: #333; 
    }

    .add-category-form label {
        display: block; 
        margin-bottom: 5px; 
        color: #555; 
    }

    .add-category-form input,
    .add-category-form textarea {
        width: 100%; 
        padding: 10px; 
        margin-bottom: 15px; 
        border: 1px solid #ccc; 
        border-radius: 4px; 
        box-sizing: border-box; 
    }

    .add-category-form button {
        width: 100%; 
        padding: 10px; 
        background-color: #007bff; 
        color: white; 
        border: none; 
        border-radius: 4px; 
        cursor: pointer; 
        transition: background-color 0.3s; 
    }

    .add-category-form button:hover {
        background-color: #0056b3; 
    }
</style>


<form action="xulythemdanhmuc.php" method="POST" class="add-category-form">
    <h3>Thêm danh mục</h3>
    <label for="category-name">Tên danh mục:</label>
    <!-- <input type="text"  name="ten_danhmuc" id="mota" placeholder="Nhập tên danh mục" required> -->
    <input type="text" name="ten_danhmuc" id="mota" class="input" required>
    <label for="message">Mô tả:</label>
    <textarea id="message" name="mota" class="textarea" placeholder="Write your thoughts here..." required></textarea>

    <button type="submit" name="btnSave">Thêm mới</button>
</form>
