<style>
    .blog-section {
        padding: 40px;
        background-color: #f9f9f9;
        text-align: center;
        margin: 80px 0;
    }

    .blog-section h3 {
        font-size: 28px;
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
        text-transform: uppercase;
    }

    .blog__title-item{
        color: #BA6D4C;
    }

    .blog-section p {
        font-size: 16px;
        color: #666;
        margin-bottom: 30px;
    }

    .blog-cards {
        display: flex;
        justify-content: space-around;
        gap: 20px;
        flex-wrap: wrap;
    }

    .blog-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        width: 300px;
        padding: 20px;
        text-align: left;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    }

    .blog-card h4 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .blog-card p {
        font-size: 14px;
        color: #555;
        line-height: 1.5;
    }

    .blog-card .date {
        font-size: 12px;
        color: #999;
        margin-bottom: 10px;
    }
</style>

<section class="blog-section">
    <h3><span class="blog__title-item">Blog</span> của chúng tôi</h3>
    <p>Các hoạt động quốc tế của Hội chợ Sách Frankfurt</p>

    <div class="blog-cards">
        <div class="blog-card">
            <h4>Hoạt động Quốc tế của Hội chợ Sách Frankfurt</h4>
            <p class="date">06 Tháng 12, 18</p>
            <p>Chúng tôi tự hào giới thiệu ấn bản đầu tiên của bản tin Frankfurt. Cập nhật những tin tức mới nhất từ quốc tế tại đây.</p>
        </div>
        <div class="blog-card">
            <h4>Bản Tin Frankfurt - Ấn Bản Đầu Tiên</h4>
            <p class="date">06 Tháng 12, 18</p>
            <p>Chúng tôi tự hào giới thiệu ấn bản đầu tiên của bản tin Frankfurt. Theo dõi để cập nhật những sự kiện mới nhất.</p>
        </div>
        <div class="blog-card">
            <h4>Bản Tin Frankfurt Đặc Biệt Dành Cho Bạn</h4>
            <p class="date">06 Tháng 12, 18</p>
            <p>Chúng tôi tự hào giới thiệu ấn bản đầu tiên của bản tin đặc biệt, mang đến những thông tin và cái nhìn sâu sắc cho độc giả.</p>
        </div>
    </div>
</section>
