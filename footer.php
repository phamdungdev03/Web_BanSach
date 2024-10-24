<style>
    footer {
        background: #B5DCE8;
        padding: 20px;
    }

    .footer_container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex; 
        justify-content: space-between;
        gap: 20px;
    }

    .footer_container div {
        flex: 1;
    }

    .footer_column h3 {
        font-size: 16px;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .footer_column ul {
        list-style: none;
        padding: 0;
    }

    .footer_column ul li {
        margin-bottom: 5px;
    }

    .footer_column ul li a {
        display: block;
        text-decoration: none;
        color: #333;
        padding: 6px 0;
    }

    .footer_column ul li a:hover {
        color: #007BFF;
    }
</style>

<footer>
    <section class="footer_container">
        <div class="footer_column">
            <h3>Thông tin thành viên</h3>
            <ul> 
                <li><a href="#">Lê Thị Phương Thảo 18/09/2003</a></li>
                <li><a href="#">Nguyễn Văn Quang 10/08/2003</a></li>
                <li><a href="#">Ngô Văn Thông 09/06/2003</a></li>
            </ul>
        </div>
        <div class="footer_column">
            <h3>Hỗ trợ</h3>
            <ul>
                <li><a href="#">Hướng dẫn đặt hàng</a></li>
                <li><a href="#">Chính sách đổi trả - hoàn tiền</a></li>
                <li><a href="#">Chính sách vận chuyển</a></li>
                <li><a href="#">Chính sách thanh toán</a></li>
                <li><a href="#">Chính sách khách hàng</a></li>
            </ul>
        </div>
        <div class="footer_column">
            <h3>Kết nối mạng xã hội</h3>
            <ul>
                <li><a href="#">Email Us</a></li>
                <li><a href="#">Find Us</a></li>
                <li><a href="#">Call: (123) 456-7890</a></li>
            </ul>
        </div>
    </section>
</footer>
