-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3366
-- Thời gian đã tạo: Th10 28, 2024 lúc 01:55 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Cơ sở dữ liệu: `qlbs`
--
-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--
CREATE TABLE `chi_tiet_don_hang` (
    `order_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
    `price` decimal(10, 0) NOT NULL COMMENT 'Giá sản phẩm',
    `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Số lượng sản phẩm',
    `customer_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã khách hàng',
    `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hang`
--
CREATE TABLE `chi_tiet_gio_hang` (
    `id` int(11) NOT NULL,
    `product_id` int(11) DEFAULT NULL,
    `quantity` int(11) NOT NULL,
    `price` int(11) NOT NULL,
    `cart_id` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `danh_muc_san_pham`
--
CREATE TABLE `danh_muc_san_pham` (
    `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã danh mục sản phẩm',
    `category_name` varchar(255) NOT NULL COMMENT 'Tên danh mục sản phẩm',
    `category_description` text NOT NULL COMMENT 'Mô tả danh mục sản phẩm'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Đang đổ dữ liệu cho bảng `danh_muc_san_pham`
--
INSERT INTO `danh_muc_san_pham` (
        `category_id`,
        `category_name`,
        `category_description`
    )
VALUES (8, 'Sách Văn Học', 'Sách Văn Học'),
    (
        9,
        'Sách Giáo Khoa - Tham Khảo',
        'Sách Giáo Khoa - Tham Khảo'
    ),
    (10, 'Sách Thiếu Nhi', 'Sách Thiếu Nhi'),
    (
        11,
        'Sách Tiểu Sử - Hồi Kí',
        'Sách Tiểu Sử - Hồi Kí'
    ),
    (12, 'Sách Học Ngoại Ngữ', 'Sách Học Ngoại Ngữ');
-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `don_hang`
--
CREATE TABLE `don_hang` (
    `order_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
    `customer_name` varchar(255) NOT NULL COMMENT 'Tên khách hàng',
    `customer_address` varchar(255) NOT NULL COMMENT 'Địa chỉ khách hàng',
    `customer_email` varchar(255) NOT NULL COMMENT 'Email khách hàng',
    `customer_phone` varchar(20) NOT NULL COMMENT 'Số điện thoại khách hàng',
    `total_amount` decimal(10, 0) NOT NULL COMMENT 'Tổng giá trị đơn hàng',
    `order_date` int(50) NOT NULL COMMENT 'Ngày đặt hàng',
    `order_status` int(10) UNSIGNED NOT NULL COMMENT 'Trạng thái đơn hàng'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `gio_hang`
--
CREATE TABLE `gio_hang` (
    `cart_id` int(11) NOT NULL,
    `customer_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `khach_hang`
--
CREATE TABLE `khach_hang` (
    `customer_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã khách hàng',
    `customer_name` varchar(255) NOT NULL COMMENT 'Tên khách hàng',
    `customer_address` varchar(255) NOT NULL COMMENT 'Địa chỉ khách hàng',
    `customer_email` varchar(255) NOT NULL COMMENT 'Email khách hàng',
    `customer_phone` varchar(20) NOT NULL COMMENT 'Số điện thoại khách hàng',
    `username` varchar(50) NOT NULL COMMENT 'Tên đăng nhập của khách hàng',
    `password` varchar(255) NOT NULL COMMENT 'Mật khẩu của khách hàng',
    `vaitro_id` int(10) UNSIGNED NOT NULL COMMENT 'Vai trò của người dùng'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--
INSERT INTO `khach_hang` (
        `customer_id`,
        `customer_name`,
        `customer_address`,
        `customer_email`,
        `customer_phone`,
        `username`,
        `password`,
        `vaitro_id`
    )
VALUES (
        1,
        'Admin',
        'Hà Nội',
        'admin@gmail.com',
        '02222222222',
        'admin',
        '$2y$10$Wq.TiLAn4ZHhf8xqOUh0cOGRdFl8EFVziNfZo.cEBFmqtg4qButN2',
        1
    );
-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `san_pham`
--
CREATE TABLE `san_pham` (
    `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
    `product_name` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
    `product_description` text NOT NULL COMMENT 'Mô tả sản phẩm',
    `product_image` varchar(255) NOT NULL COMMENT 'Đường dẫn tới hình ảnh sản phẩm',
    `price` decimal(10, 0) NOT NULL COMMENT 'Giá sản phẩm',
    `stock_quantity` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Số lượng tồn kho',
    `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã danh mục sản phẩm'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Đang đổ dữ liệu cho bảng `san_pham`
--
INSERT INTO `san_pham` (
        `product_id`,
        `product_name`,
        `product_description`,
        `product_image`,
        `price`,
        `stock_quantity`,
        `category_id`
    )
VALUES (
        17,
        'Lén Nhặt Chuyện Đời',
        'Tại vùng ngoại ô xứ Đan Mạch xưa, người thợ kim hoàn Per Enevoldsen đã cho ra mắt một món đồ trang sức lấy ý tưởng từ Pandora - người phụ nữ đầu tiên của nhân loại mang vẻ đẹp như một ngọc nữ phù dung, kiêu sa và bí ẩn trong Thần thoại Hy Lạp. Vòng Pandora được kết hợp từ một sợi dây bằng vàng, bạc hoặc bằng da cùng với những viên charm được chế tác đa dạng, tỉ mỉ. Ý tưởng của ông, mỗi viên charm như một câu chuyện, một kỷ niệm đáng nhớ của người sở hữu chiếc vòng. Khi một viên charm được thêm vào sợi Pandora là cuộc đời lại có thêm một ký ức cần lưu lại để nhớ, để thương, để trân trọng. Lén nhặt chuyện đời ra mắt trong khoảng thời gian chông chênh nhất của bản thân, hay nói cách khác là một cậu bé mới lớn, vừa bước ra khỏi cái vỏ bọc vốn an toàn của mình. Những câu chuyện trong Lén nhặt chuyện đời là những câu chuyện tôi được nghe kể lại, hoặc vô tình bắt gặp, hoặc nhặt nhạnh ở đâu đó trong miền ký ức rời rạc của quá khứ, không theo một trình tự hay một thời gian nào nhất định.',
        '1729931076_lennhatchuyendoi.webp',
        42000,
        50,
        8
    ),
    (
        18,
        'Người Đàn Ông Mang Tên OVE (Tái Bản)',
        'Người đàn ông mang tên Ove năm nay năm mươi chín tuổi. Ông là kiểu người hay chỉ thẳng mặt những kẻ mà ông không ưa như thể họ là bọn ăn trộm và ngón trỏ của ông là cây đèn pin của cảnh sát. Ove tin tất cả những người ở nơi ông sống đều kém cỏi, ngu dốt và không đáng làm hàng xóm của ông. Ove nguyên tắc, cứng nhắc, cấm cảu và cay nghiệt.\r\n\r\nNgười đàn ông mang tên Ove lên kế hoạch tự tử. Nhưng những nỗ lực của ông liên tiếp bị phá đám. Bắt đầu từ việc một buổi sáng, một cặp đôi trẻ trung hay chuyện với hai đứa con cũng hay chuyện không kém chuyển đến gần nhà Ove và vô tình lùi xe đâm sầm vào tường nhà ông. Rồi đến con mèo hoang nhếch nhác, tình bạn không ngờ… cuộc sống của ông già mang tên Ove thay đổi hoàn toàn.',
        '1729931131_nguoidanong.webp',
        128000,
        50,
        8
    ),
    (
        19,
        'Trốn Lên Mái Nhà Để Khóc - Tặng Kèm Bookmark',
        'Những cơn gió heo may len lỏi vào từng góc phố nhỏ, mùa thu về gợi nhớ bao yêu thương đong đầy, bao xúc cảm dịu dàng của ký ức. Đó là nỗi nhớ đau đáu những hương vị quen thuộc của đồng nội, là hoài niệm bất chợt khi đi trên con đường cũ in dấu bao kỷ niệm... để rồi ta ước có một chuyến tàu kỳ diệu trở về những năm tháng ấy, trở về nơi nương náu bình yên sau những tháng ngày loay hoay để học cách trở thành một người lớn. Bạn sẽ được đắm mình trong những cảm xúc đẹp đẽ xen lẫn những tiếc nuối đầy lắng đọng trong “Trốn lên mái nhà đẻ khóc” của Lam.\r\n\r\nCó nhiều câu chuyện luôn nằm trong khảm sâu của ký ức…\r\n\r\nVí như, hồi nhỏ vào ngày hạ sao giăng đầy trời, được nằm dưới hiên nhà cùng bà ngắm bầu trời đêm cùng chú cún cứ ve vẩy cái đuôi đến thích thú,',
        '1729931182_tronlenmainhadekhoc.webp',
        72000,
        50,
        8
    ),
    (
        20,
        'Nơi Nào Có Mẹ - Nơi Ấy Là Nhà - Tặng Kèm Bookmark',
        'Nơi Nào Có Mẹ - Nơi Ấy Là Nhà\r\n\r\nTrên đời này, sẽ chẳng có ai vì bạn quan tâm mà hỏi “Dạo này con làm gì, dạo này con có đủ tiền không, dạo này con có ăn uống đầy đủ không?”... ngoại trừ MẸ của bạn.\r\n\r\nTrên đời này, sẽ chẳng có ai sẵn sàng mua những thứ tốt nhất cho bạn dù họ có thể cả năm không mua lấy một bộ quần áo mới… ngoại trừ MẸ của bạn.\r\n\r\nTrên đời này, sẽ chẳng có ai cho bạn những bữa ăn miễn phí, yêu thương bạn vô điều kiện…ngoại trừ MẸ của bạn.\r\n\r\nĐúng thật là “thế gian rộng lớn, có mẹ là đủ”, nơi chúng ta muốn quay trở về để được chữa lành, được an ủi. Dù cả thế giới có bỏ mặc bạn, vẫn dám chắc chắn một điều, trong lòng mẹ, bạn chính là cả thế giới.\r\n\r\nNƠI NÀO CÓ MẸ, NƠI ẤY LÀ NHÀ là lời nhắn mà tác giả Hạ Mer gửi đến tất cả chúng ta: Khi bạn tìm hoài chẳng thấy hạnh phúc, về nhà đi! Nơi có Mẹ, có một mâm cơm ấm, một vòng tay êm, một góc sân nhỏ. Nơi có mẹ tựa một gốc đại thụ che trời, luôn đóng vai trầm mặc, che gió, che mưa cho bạn, sẵn sàng hy sinh mọi thứ mà không cần hồi đáp.',
        '1729931218_noinaocome.webp',
        69000,
        50,
        8
    ),
    (
        21,
        'Kết Thúc Của Chúng Ta',
        'Kết Thúc Của Chúng Ta\r\n\r\nSau khi tốt nghiệp, Lily Bloom rời khỏi thị trấn quê hương để tới Boston sống tự lập và hiện thực hóa giấc mơ mở tiệm hoa của mình. Tại đây, cô vướng vào mối quan hệ tình ái lạ lùng với bác sĩ phẫu thuật thần kinh Ryle Kincaid. Mỗi người đều bị người kia cuốn hút, nhưng Lily muốn điều gì bền vững dài lâu, còn Ryle lại không muốn bị trói buộc vào một mối quan hệ chính thức. Bất chấp khác biệt, cũng như nhờ nhiều sự kiện tình cờ thú vị không kém phần hài hước, họ vẫn đến với nhau và trở thành một gia đình. Thế nhưng ngay khi Lily cảm thấy cuộc đời mình không thể viên mãn hơn, cô bỗng thấy mình phải đối diện với điều đã khiến cô căm ghét bố mẹ mình: bạo hành.',
        '1729931273_ketthuccuachungta.webp',
        154000,
        50,
        8
    ),
    (
        22,
        'Global Success - Tiếng Anh 11 - Student Book (2023)',
        'Global Success - Tiếng Anh 11 - Student Book được Nhà xuất bản Giáo dục Việt Nam tổ chức biên soạn theo “Chương trình giáo dục phổ thông: Chương trình môn Tiếng Anh” (từ lớp 3 đến lớp 12) ban hành theo Thông tư 32/2018/TT-BGDĐT ngày 26 tháng 12 năm 2018 của Bộ Giáo dục và Đào tạo, nối tiếp bộ sách tiếng Anh bậc tiểu học (Tiếng Anh 3, Tiếng Anh 4, Tiếng Anh 5) và bộ sách tiếng Anh trung học cơ sở (Tiếng Anh 6, Tiếng Anh 7, Tiếng Anh 8, Tiếng Anh 9).',
        '1729931321_tienganh11.webp',
        58000,
        50,
        9
    ),
    (
        23,
        'Vở Bài Tập Tiếng Việt 2 - Tập 1 (Chân Trời Sáng Tạo) (Chuẩn)',
        'VBT Tiếng Việt 2/1 (Chân Trời Sáng Tạo) (2023)',
        '1729931362_tiengviet.webp',
        17000,
        50,
        9
    ),
    (
        24,
        'Toán 9 - Tập 1 (Cánh Diều) (Chuẩn)',
        'Toán 9 - Tập 1 (Cánh Diều)\r\n\r\nBộ sách Cánh Diều là bộ sách thứ nhất (đầu tiên) góp phần thực hiện chủ trương xã hội hoá sách giáo khoa, xoá bỏ cơ chế độc quyền trong lĩnh vực xuất bản - in - phát hành sách giáo khoa.\r\n\r\nTác giả bộ sách Cánh Diều là những nhà giáo, nhà khoa học tâm huyết và giàu kinh nghiệm. Trong đó, có tác giả là Tổng Chủ biên Chương trình Giáo dục phổ thông 2018 và nhiều tác giả là thành viên Ban Phát triển Chương trình tổng thể, Ban Phát triển các chương trình môn học thành lập theo Quyết định của Bộ trưởng Bộ GDĐT.',
        '1729931397_toan9.webp',
        22000,
        50,
        9
    ),
    (
        25,
        'Atlat Địa lí Việt Nam (Theo Chương Trình Giáo Dục Phổ Thông 2018) (2024)',
        'Atlat Địa lí Việt Nam (Theo Chương Trình Giáo Dục Phổ Thông 2018)\r\n\r\nBản đồ là phương tiện giảng dạy và học tập điạ lý không thể thiếu trong nhà trường phổ thông. Cùng với sách giáo khoa, Atlat địa lí Việt Nam là nguồn cung cấp kiến thức, thông tin tổng hợp và hệ thống giúp giáo viên đổi mới phương pháp dạy học, hỗ trợ học.\r\n\r\nĐể đáp ứng nhu cầu bức thiết đó, NXB Giáo dục Việt Nam trân trọng giới thiệu tập Atlat địa lý Việt Nam gồm 21 bản đồ, được in màu rõ nét, liên quan đến các lĩnh vực kinh tế - xã hội. Các bản đồ được xây dựng theo nguồn số liệu của Nhà xuất bản thống kê - Tổng cục thống kê. Đây là tài liệu được phép mang vào phòng thi tốt nghiệp THPT môn Địa lý do Bộ Giáo dục và Đào tạo quy định.',
        '1729931435_atlat.webp',
        27000,
        50,
        9
    ),
    (
        27,
        'Việt Nam - Lịch Sử Không Biên Giới',
        '“Việt Nam: Lịch sử không biên giới” như một cuộc đối thoại quốc tế về Việt Nam giữa những nhà sử học ở Việt Nam, Trung Quốc, Nhật Bản, Hàn Quốc, Úc, Hoa Kỳ. Cuốn sách quy tụ các bài tham luận của các nhà Việt Nam học lừng danh trên thế giới tại hội thảo “Việt Nam: bên ngoài những đường biên” tháng 5/2001, mở ra những tri thức sâu và mới mẻ về sự tương tác giữa bản sắc Việt Nam - Chăm - Khmer - Pháp,... trên bán đảo Đông Dương trong hơn 1000 năm.',
        '1729931562_lichsu.webp',
        260000,
        50,
        9
    ),
    (
        28,
        '100 Kỹ Năng Sinh Tồn',
        'Bạn sẽ làm gì nếu như một ngày bị mắc kẹt giữa vùng lãnh thổ có dịch bệnh hoành hành, lạc ở nơi hoang dã, bị móc túi khi đi du lịch ở đất nước xa lạ, hay phải thoát ngay khỏi một vụ hỏa hoạn ở nhà cao tầng… ? Clint Emerson – một cựu Đặc vụ SEAL, lực lượng tác chiến đặc biệt của Hải quân Hoa Kỳ – muốn bạn có được sự chuẩn bị tốt nhất trong cuốn sách 100 kỹ năng sinh tồn này.\r\n\r\nRõ ràng, chi tiết và được trình bày dễ hiểu, cuốn sách này phác thảo chi tiết nhiều chiến lược giúp bảo vệ bạn và những người bạn yêu thương, dạy bạn cách suy nghĩ và hành động như một thành viên của lực lượng quân đội tinh nhuệ Hoa Kỳ. 100 kỹ năng sinh tồn thực sự là cuốn cẩm nang vô giá. Bởi lẽ, khi nguy hiểm xảy ra, bạn chẳng có nhiều thời gian cho những chỉ dẫn phức tạp đâu.',
        '1729931655_kynagsinhton.webp',
        74000,
        50,
        10
    ),
    (
        29,
        'Attack On Titan - Tập 16',
        'Attack On Titan - Tập 16\r\n\r\nSau nhiều năm sống yên ổn sau những bức tường thành cao lừng lững, loài người đã bắt đầu cảm nhận được nguy cơ diệt vong đến từ một giống loài khổng lồ mang tên Titan. Dù muốn dù không, họ buộc phải đứng lên, và đã đứng lên một cách đầy quyết tâm, mạnh mẽ để chống lại những kẻ thù hùng mạnh nhất.\r\n\r\nThế rồi họ dần nhận ra bản chất thật sự của những kẻ thù khổng lồ kia...',
        '1729931704_attack.webp',
        45000,
        50,
        10
    ),
    (
        30,
        'One Piece - Tập 104 - “Kozuki Momonosuke - Tướng Quân Của Wano Quốc” - Bản Bìa Áo',
        'One Piece - Tập 104 - “Kozuki Momonosuke - Tướng Quân Của Wano Quốc”\r\n\r\n20 năm trời nằm dưới ách thống trị của Kaido và Orochi... Liệu Wano quốc có được giải thoát khỏi sự thống khổ, và nụ cười thực sự sẽ trở lại trên gương mặt của người dân nơi đây!? Tất cả phụ thuộc vào nắm đấm của Luffy!!\r\n\r\nSắp có hồi kết cho vở kịch Wano quốc!! Những chuyến phiêu lưu trên đại dương xoay quanh “ONE PIECE” lại bắt đầu!!',
        '1729931737_one-piece.webp',
        23000,
        50,
        10
    ),
    (
        31,
        'Tủ Sách Tương Tác - Sách Âm Thanh - Bé Học Nói - Phiên Bản Đặc Biệt Với 30 Nút Bấm',
        'Tủ Sách Tương Tác - Sách Âm Thanh - Bé Học Nói - Phiên Bản Đặc Biệt Với 30 Nút Bấm\r\n\r\nSự phát triển ngôn ngữ của trẻ từ 0-6 tuổi\r\n\r\nThS. Tâm lý Lê Ngọc Bảo Trâm - Giảng viên Tâm lý Trường Đại học Khoa học Xã hội và Nhân văn cho biết: “Với trẻ từ 0-6 tuổi, đặc biệt là giai đoạn từ 2-3 tuổi, vốn từ của bé trở nên phong phú hơn (khoảng 900 từ), nói được câu có 3 đến 4 từ và phát âm cũng rõ hơn. Vì vậy, bé có thể dùng ngôn ngữ một cách phức tạp hơn như: dùng danh từ riêng (con, mẹ, ba, bà, ông, dì, …), đại từ xưng hô (con, mẹ, em, …). Ngoài ra, bé còn có thể dùng câu phủ định (con không ăn, mẹ không cho con, …), gọi tên các màu cơ bản, lặp lại các cụm từ, đọc được bài thơ hay hát.',
        '1729931780_behocnoi.webp',
        299000,
        50,
        10
    ),
    (
        33,
        'Điệp Viên Hoàn Hảo X6 - Phạm Xuân Ẩn',
        'Điệp Viên Hoàn Hảo X6 - Phạm Xuân Ẩn\r\n\r\nẤn bản mới này có bổ sung Lời giới thiệu của tác giả cho lần tái bản 2013 “Sáu năm sau: hồi tưởng về sách Điệp Viên Hoàn Hảo”. Larry Berman viết: “…cuộc đời của Ẩn không chỉ là một câu chuyện chiến tranh mà còn là câu chuyện về hàn gắn, về lòng trung thành với đất nước và bạn bè.\r\n\r\nTrong ấn bản mới, tôi đã thêm vào những câu chuyện và tình tiết mới mà hồi năm 2007 chưa thể kể ra. Tôi cũng phản ánh lại việc một số độc giả dân sự và quân sự Mỹ đã phản ứng về cuốn sách của tôi cũng như về nhân vật/con người Phạm Xuân Ẩn như thế nào. Tuy nhiên, điều làm cho ấn bản mới này trở nên rất quan trọng đó là bản dịch mới. Độc giả Việt Nam sẽ lần đầu tiên được đọc câu chuyện về cuộc đời phi thường của Phạm Xuân Ẩn như chính những gì mà ông đã kể với tôi, một người Mỹ viết hồi ký cho ông. Điều này làm cho ấn bản của First News - Trí Việt vừa rất đặc biệt, vừa là một cuốn sách mới chứa đựng rất nhiều thông tin lần đầu tiên công bố…”.',
        '1729931866_diepvienhonahao.webp',
        135000,
        50,
        11
    ),
    (
        34,
        'Bác Hồ Với Thiếu Niên Nhi Đồng',
        'Cả cuộc đời vì nước, vì dân, Bác Hồ là biểu tượng cao đẹp nhất của chủ nghĩa yêu nước và chủ nghĩa anh hùng cách mạng Việt Nam. Tấm gương đạo đức trong sáng, phong cách sống và làm việc của Người là mẫu mực, có sức cảm hóa và thúc đẩy cho mọi thế hệ cán bộ, đảng viên và nhân dân học tập, noi theo.\r\n\r\nSáu cuốn sách: Bác Hồ của chúng em, Chuyện kể từ làng Sen, Bác Hồ cầu hiền tài, Bác Hồ - tấm gương sáng mãi, Bác Hồ với thiếu niên nhi đồng, Học Bác lòng ta trong sáng hơn là những câu chuyện nhỏ xung quanh cuộc đời của vị lãnh tụ kính yêu kể từ khi còn nhỏ sống cùng mẹ cha nơi làng Sen đầy ắp yêu thương cho đến khi bước lên tàu từ bến cảng Nhà Rồng ra đi tìm đường cứu nước. Hay những câu câu chuyện, ghi lại tình cảm ấm áp của Bác với thiếu niên nhi đồng trong và ngoài nước. Mỗi câu chuyện là một kỷ niệm xúc động về tình cảm chan chứa yêu thương của Bác dành cho thiếu nhi. Bao giờ, lúc nào, ở đâu Bác cũng luôn dành tình cảm yêu thương bao la vô bờ bến cho các cháu thiếu niên nhi đồng.',
        '1729931901_bchovoithieunhi.webp',
        41000,
        50,
        11
    ),
    (
        35,
        'Kể Chuyện Cuộc Đời Các Thiên Tài: Albert Einstein - Tuổi Thơ Gian Khó Và Cuộc Đời Khoa Học Vĩ Đại',
        'uốn sách gồm những âu chuyện viết về cuộc đời của nhà khoa học thiên tài Albert Einstein, người đã làm thay đổi cả thế giới cũng như quan niệm khoa học đương thời.\r\n\r\nDo xuất thân có nguồn gốc Do Thái nên ngay từ khi bắt đầu đi học Albert Einstein đã chịu nhiều sự phân biệt kì thị. Cuộc đời nghiên cứu khoa học của Albert Einstein cũng gặp nhiều khó khăn do hoàn cảnh khách quan và thời cuộc đem lại, nhưng bằng trí tuệ phi thường, ông đã cho ra những công trình nghiên cứu làm thay đổi khoa học hiện đại.\r\n\r\nVào năm 1999, ông được tạp chi Time của Mỹ vinh danh là con người của Thế kỷ. Trước khi qua đời, ông đã viết giấy hiến tặng bộ óc của mình cho các nhà nhân chủng học nghiên cứu. Đại văn hào Bernard Shaw đã gọi Albert Einstein là “VĨ NHÂN THỨ TÁM” của thế giới khoa học, sau Pythagoras, Aristotle, Ptolemy, Copernicus, Galileo, Kepler và Newton.',
        '1729931948_cuopcdoithientai.webp',
        38000,
        50,
        11
    ),
    (
        36,
        'Donald Trump Dưới Góc Nhìn Của Tâm Lý Học',
        'Có thể coi cuốn sách này là một tập tài liệu chuyên môn về sức khỏe tâm thần, tâm lý học, nhưng không làm cho người đọc thấy hoảng sợ, vì lý thuyết được gắn với một tình huống nghiên cứu thực tiễn, điển hình.\r\n\r\nĐồng thời đây cũng là tiếng nói của những công dân có chuyên môn, ý thức rất rõ về “trách nhiệm cảnh báo” của mình; nhưng lại bị kẹt giữa hai nghĩa vụ nghề nghiệp hoàn toàn đối lập nhau, và việc vi phạm bất cứ nghĩa vụ nào cũng khiến họ bị coi là hành xử thiếu đạo đức.\r\n\r\nThứ nhất, họ có nghĩa vụ im lặng về đánh giá của họ với bất kỳ ai nếu người đó chưa cho phép họ lên tiếng công khai. Thứ hai, họ có nghĩa vụ lên tiếng và thông báo cho những người khác nếu họ có cơ sở để tin rằng một người nào đó có thể gây nguy hiểm cho những người khác.\r\n\r\nNhân vật được đưa ra làm điển hình trong cuốn sách là Donald Trump, tổng thống đương nhiệm của Hoa Kỳ, vì những hành xử có vẻ bất thường của ông.',
        '1729932032_gocnhintamlihoc.webp',
        204000,
        50,
        11
    ),
    (
        37,
        'The First Tycoon - Tài Phiệt Đầu Tiên Của Nước Mỹ Vanderbilt - Bìa Cứng',
        'The First Tycoon - Tài Phiệt Đầu Tiên Của Nước Mỹ Vanderbilt - Bìa Cứng\r\n\r\nCuốn tiểu sử này cung cấp những thông tin sâu rộng về sự nghiệp kinh doanh và cuộc sống cá nhân của Phó đề đốc Vanderbilt — ông trùm doanh nghiệp vĩ đại đầu tiên trong lịch sử Hoa Kỳ và là người sáng lập triều đại Vanderbilt.\r\n\r\nTrong số tất cả các nhà công nghiệp và nhân vật tài chính quan trọng của lịch sử Hoa Kỳ, Vanderbilt có thể coi là người đóng vai trò quan trọng nhất. Tuy nhiên, không giống như Jay Gould, JP Morgan, John D. Rockefeller và Andrew Carnegie, Ngài Phó đề đốc chưa bao giờ có được cho mình một cuốn tiểu sử đầy đủ và chính xác. Cuốn sách của tác giả T.J. Stiles là thành quả của sáu năm nghiên cứu chuyên sâu (trong các kho lưu trữ chưa được khai thác trước đây), được tổng hợp thành một câu chuyện có nhịp độ nhanh về một con người và đất nước cùng nhau vươn lên.',
        '1729932072_taiphietdautien.webp',
        385000,
        50,
        11
    ),
    (
        40,
        'Tiếng Nhật Cho Mọi Người - Sơ Cấp 1 - Bản Tiếng Nhật (Bản Mới) (Tái Bản 2023)',
        'Tiếng Nhật Cho Mọi Người - Sơ Cấp 1 - Bản Tiếng Nhật (Bản Mới)\r\n\r\nGiáo trình chính Tiếng Nhật cho mọi người bao gồm Giáo trình Sơ cấp I và Sơ cấp II Bản tiếng Nhật - 2 quyển và Bản dịch và Giải thích ngữ pháp Sơ cấp I và Sơ cấp II tương ứng. Sách có 50 bài học, mỗi bài bao gồm các phần Mẫu câu, Ví dụ, Hội thoại, Luyện tập, bao quát hầu như kiến thức cơ bản về tiếng Nhật để học tập và làm việc trong môi trường sử dụng tiếng Nhật. Tiếng Nhật cho mọi người được đánh giá là một trong những bộ giáo trình tiếng Nhật cơ bản tốt nhất hiện nay và được nhiều trường đại học, trường Nhật ngữ sử dụng.',
        '1729932235_tiengnhat.webp',
        147000,
        50,
        12
    ),
    (
        41,
        'Giáo Trình Chuẩn YCT 1 (CD)',
        '中小学生汉语考试（YCT）是一项国际汉语能力标准化考试，考查汉语非第一语言的中小学生在日常生活和学习中运用汉语的能力。在真题分析的基础上，本着“考教结合”的理念，《YCT标准教程》应运而生。\r\n\r\nBài thi tiếng Trung Quốc dành cho học sinh (Youth Chinese Test – YCT) là bài kiểm tra chuẩn ở cấp độ quốc tế về trình độ tiếng Trung Quốc. Bài thi này đánh giá khả năng sử dụng tiếng Trung Quốc trong cuộc sống hằng ngày cũng như trong học tập của học sinh tiểu học và trung học cơ sở có ngôn ngữ mẹ đẻ không phải là tiếng Trung Quốc. Bộ sách Giáo trình chuẩn YCT được biên soạn theo hướng bám sát các bài thi YCT đồng thời dựa trên nguyên tắc kết hợp giảng dạy và kiểm tra.',
        '1729932272_tienghoa.webp',
        113000,
        50,
        12
    ),
    (
        43,
        'Tiếng Hàn Tổng Hợp Dành Cho Người Việt Nam',
        'Tiếng Hàn Tổng Hợp Dành Cho Người Việt Nam - Sơ Cấp 1\r\n\r\nTrong những năm gần đây, nhu cầu học tiếng Hàn và tìm hiểu về văn hóa Hàn Quốc đang có xu hướng tăng lên. Người học tiếng Hàn rất mong muốn có được một bộ giáo trình chuẩn, được biên soạn một cách tỉ mỉ và hữu ích nhất.\r\n\r\nGiáo trình tiếng Hàn tổng hợp lần đầu tiên được trao bản quyền chính thức tại Việt Nam\r\n\r\nHiểu được điều đó, ngày 4-7, Đại diện chính phủ Hàn Quốc, ngài Woo Hyeong Min – Trưởng đại diện Văn phòng Quỹ giao lưu Quốc tế HQ tại Việt Nam cùng GS.TS.NGƯT Mai Ngọc Chừ – Chủ tịch Hội Nghiên cứu khoa học về Hàn Quốc của Việt Nam (KRAV) đã trao quyết định cho phép Công ty Cổ phần sách MCBooks của Việt Nam được xuất bản cuốn sách này tại thị trường Việt Nam. Và đây chính là bộ giáo trình tiếng Hàn tổng hợp đầu tiên có bản quyền chính thức có mặt tại Việt Nam.',
        '1729932503_tienghan.webp',
        153000,
        50,
        12
    ),
    (
        44,
        '\"Chém\" Tiếng Anh Không Cần Động Não',
        '“Chém” Tiếng Anh Không Cần Động Não\r\n\r\n“Phần lớn người Việt đều biết tiếng Anh NHIỀU HƠN HỌ NGHĨ, chỉ là họ chưa biết làm thế nào để đưa ý tưởng thành lời nói mà thôi!” - Bino chém tiếng Anh\r\n\r\nBiết nhiều tiếng Anh nhưng không… nói được - điều này có đúng với bạn không? Sao 12 năm học tiếng Anh không giúp chúng ta xử lý được những cuộc trò chuyện thông thường?\r\n\r\nSao điểm tiếng Anh trên lớp toàn 9, 10 nhưng gặp Tây lại ấp a ấp úng? Sao sở hữu điểm IELTS 7.0+ nhưng vẫn “sốc ngôn ngữ” khi ra nước ngoài?',
        '1729932539_tienganh.webp',
        121000,
        50,
        12
    ),
    (
        45,
        'Từ Vựng IELTS 8.0 - Từ Vựng Đắt Để Đạt Điểm Cao',
        'Từ Vựng IELTS 8.0 - Từ Vựng Đắt Để Đạt Điểm Cao 4 Kỹ Năng\r\n\r\nTừ vựng IELTS 8.0 - Từ vựng đắt để đạt điểm cao 4 kỹ năng là cuốn sách tổng hợp 15 chủ đề Từ vựng chất lượng giúp bạn đạt điểm cao cả 4 kỹ năng IELTS.\r\n\r\nƯU ĐIỂM NỔI BẬT CỦA BỘ SÁCH\r\n\r\nCuốn sách tổng hợp 15 chủ đề Từ vựng đắt giá giúp bạn đạt 8.0 IELTS\r\n\r\nNhững lưu ý, tiêu chí về Từ vựng để đạt điểm band 8.0 trong bài thi IELTS\r\n\r\nVới mỗi chủ đề, cuốn sách sẽ định hướng một số dạng câu hỏi chung và hàng trăm câu hỏi cụ thể thường gặp trong đề thi IELTS và gợi ý ý tưởng trả lời.\r\n\r\nNhờ vào đó, cuốn sách sẽ giúp ý tưởng của người học được trau dồi thêm phong phú, đơn giản hóa những kiến thức từ vựng và tiếp nhận chúng dễ dàng hơn.',
        '1729932585_tuvung.webp',
        100000,
        50,
        12
    ),
    (
        46,
        'Trò Chơi Mê Cung - Thử Thách Tư Duy (2-8 Tuổi)',
        'Trò chơi cũng giống như ánh sáng, không khí, nguồn nước, đồ ăn là nhu cầu cơ bản nhất trong quá trình trưởng thành. Để kích thích tiềm năng về mọi mặt của trẻ, chúng tôi đã đặt những trò chơi quen thuộc hằng ngày vào trong mê cung kỳ thú, để các bé vừa học vừa chơi.',
        '1729950174_1729931820_trochoimecung.webp',
        45000,
        50,
        10
    ),
    (
        49,
        'Càng Bình Tĩnh Càng Hạnh Phúc',
        'Càng Bình Tĩnh Càng Hạnh Phúc\r\n\r\nTiếp nối thành công rực rỡ của Bạn đắt giá bao nhiêu?, Khí chất bao nhiêu hạnh phúc bấy nhiêu, Không sợ chậm chỉ sợ dừng,… Vãn Tình đã quay trở lại cùng cuốn sách Càng bình tĩnh Càng hạnh phúc. Đây là cuốn sách thứ bảy của cô được xuất bản tại Việt Nam bởi thương hiệu sách Bloom Books, đánh dấu cho hành trình trưởng thành đầy rực rỡ của Vãn Tình – từ một cô gái trẻ trung, mạnh mẽ trở nên chín chắn, điềm tĩnh và bao dung hơn với cuộc đời.\r\n\r\nGần bảy mươi câu chuyện trong sách xoay quanh các chủ đề tình yêu, hôn nhân, gia đình, sự nghiệp… đến từ chính cuộc sống của tác giả và những người xung quanh, vừa thực tế lại vừa gợi mở, dễ dàng giúp chúng ta liên hệ với tình huống của chính mình. Với những câu chuyện đó, Vãn Tình hy vọng có thể giúp các cô gái trưởng thành, độc lập và tự tin hơn, tìm lại bản ngã và sống cuộc đời theo cách mà mình mong muốn.\r\n\r\nThông điệp xuyên suốt trong “Càng bình tĩnh Càng hạnh phúc” mà Vãn Tình muốn gửi gắm tới độc giả là:\r\n\r\n“Bảy năm trước tôi sẽ cãi vã với người ta khi phật ý, bảy năm sau tôi tuân thủ câu nói ‘Bận rộn là liều thuốc trị mọi chứng bệnh tâm lý.’\r\n\r\nBảy năm trước tôi luôn chuẩn bị cẩn thận cho mọi ngày lễ, bảy năm sau tôi bận tới mức quên cả bản thân mình chứ đừng nói tới ngày lễ gì.\r\n\r\nBảy năm trước, chú cún nhà tôi qua đời, bảy năm sau, tôi không còn nuôi cún nữa.\r\n\r\nBảy năm đủ để một phụ nữ ngây ngô trở nên chín chắn, ngây thơ trở nên lý trí, và xốc nổi trở nên bình tĩnh ung dung, dần dần tìm thấy ý nghĩa của cuộc đời mình.\r\n\r\nKhông biết bảy năm sau tôi sẽ như thế nào.”\r\n\r\nCòn bạn, bảy năm trước bạn là ai?\r\n\r\nVà bảy năm sau, bạn muốn trở thành một người như thế nào?\r\n\r\nTrích dẫn hay của Vãn Tình trong Càng bình tĩnh Càng hạnh phúc:\r\n\r\n“Phồn hoa tựa gấm, hào quang bốn phương đều có thể từ bỏ, nhưng chân tình đâu dễ gì có được.\r\n\r\nTôi muốn nói với mọi người rằng: ‘Có người yêu thương chúng ta là một điều tuyệt vời, nhưng nếu không có ai yêu thương chúng ta, chúng ta phải yêu thương bản thân mình gấp bội. Cuộc đời này ít người ‘trong tuyết đưa than’, mà đa phần là ‘dệt hoa trên gấm’, bởi vậy hãy biến bản thân thành ‘gấm’ trước đã!”\r\n\r\n“Người ta sống trên đời khó tránh nhất là một chữ ‘Tình’, không ai có thể làm lơ tình yêu, nhưng đời người đã có quá nhiều tiếc nuối và bất lực, khiến trái tim yếu mềm của chúng ta chịu nhiều giày vò khi phải đối mặt với vô vàn đau khổ và mất mát.\r\n\r\nNếu để cho phụ nữ trong chốn hồng trần này lựa chọn giữa quyền lực, tiền bạc và tình yêu chân thành, có lẽ mọi người đều muốn có được một tấm chân tình, chỉ ước sao được làm cô gái yếu mềm của người ấy.”\r\n\r\n“Chúng ta thường nói, sự khẳng định lớn nhất của một người đàn ông dành cho một người phụ nữ là cưới cô ấy về nhà. Nhưng tôi muốn nói rằng: ‘Sự khẳng định lớn nhất của một người phụ nữ dành cho bản thân mình chính là nắm bắt cuộc sống mình mong muốn một cách phóng khoáng ung dung.’”',
        '1730119737_VanTinh.webp',
        139000,
        50,
        8
    ),
    (
        50,
        'Đất Nước Gấm Hoa - Atlas Việt Nam',
        'Việt Nam chúng ta kết tinh của lịch sử hào hùng, thiên nhiên tươi đẹp cùng sức sáng tạo vô biến của con người và giờ đây chúng ta đang có ĐẤT NƯỚC GẤM HOA\r\n\r\nViệt Nam là một đất nước xinh đẹp với nhiều vùng văn hóa khác nhau. Với mong muốn mang đến nhũng kiến thức về địa lí, lịch sử, văn hóa và con người một cách dễ nhớ và gần gũi, “Đất nước gấm hoa” giúp bạn đọc nhiều độ tuổi có cái nhìn thật cụ thể và sống động về 63 tỉnh thành trên dải đất hình chữ S của chúng ta.\r\n\r\nLỜI GIỚI THIỆU\r\n\r\n“Quê nhà mình ở đâu trên bản đồ Việt Nam?\r\n\r\nNơi mình sinh ra và lớn lên có điều gì đặc biệt?\r\n\r\nBạn biết không, đất nước của chúng mình đẹp lắm. Từ những dòng thác tung bọt trắng xóa vùng Tây Bắc đến dòng Cửu Long chở nặng phù sa miền Tây Nam Bộ, từ núi rừng bao la nơi sinh sống của nhiều loài động vật quí hiếm đến vùng hải đảo nơi có những giàn khoan tung bay lá cờ đỏ sao vàng, từ những miền đất cổ kính với bề dày lịch sử đến các thành phố trẻ trung tràn đầy sức sống… tất cả hội tụ trên dải đất hình chữ S tươi đẹp, như một di sản tuyệt vời qua hàng ngàn năm dựng nước và giữ nước mà giờ đây cha ông trao lại cho chúng mình. Hành trình đi dọc theo đất nước từ Bắc vào Nam, lên rừng xuống biển cũng là hành trình khám phá nền văn hóa đặc sắc và đa dạng của cộng đồng 54 dân tộc anh em.\r\n\r\nDù chúng mình đang ở nơi đâu trên dải đất hình chữ S, thì bạn và tôi luôn hiểu rằng con đường mình đang đi, món ăn mình đang thưởng thức, công trình mình đang chiêm ngưỡng đều mang theo dấu ấn của lịch sử, của tinh hoa văn hóa đúc kết từ bao đời. 63 tỉnh thành là 63 vùng đất với vị trí địa lí khác nhau, địa hình, dân tộc, bản sắc văn hóa vì thế cũng chứa đựng những dấu ấn riêng. Tất cả tạo nên những hoa văn đặc sắc, vừa khác biệt, vừa hòa quyện vào nhau, tạo nên vẻ đẹp lung linh của đất nước gấm hoa.\r\n\r\nVới mong muốn mang đến một quyển sách chứa đựng kiến thức về địa lí, lịch sử, văn hóa, con người thật gần gũi đến bạn đọc nhiều độ tuổi, đặc biệt mong muốn các bạn học sinh có cái nhìn cụ thể và sống động về mỗi vùng đất, mỗi tỉnh thành trên bản đồ Việt Nam, ê kíp thực hiện đã dành tất cả tâm huyết cho quyển Atlas này. Trong từng dòng thông tin, từng hình vẽ, từng mảng màu đều thấm đượm tình yêu đất nước và niềm tự hào là người con của quê hương xứ sở. ĐẤT NƯỚC GẤM HOA – ATLAS VIỆT NAM, cuộc hành trình khám phá 63 bản đồ tỉnh thành đã ra đời với thật nhiều cảm xúc như thế.\r\n\r\nNhóm tác giả rất mong nhận được sự đóng góp ý kiến từ bạn đọc để nội dung quyển sách được hoàn thiện hơn nữa.\r\n\r\nCòn bây giờ, chuyến tàu xuyên suốt dải đất hình chữ S sắp sửa khởi hành. Mời bạn sẵn sàng cho kì du lịch thú vị nhất để khám phá đất nước Việt Nam tươi đẹp. Bắt đầu nào!”',
        '1730119791_8935244873306.webp',
        350000,
        50,
        9
    ),
    (
        52,
        'Tip Công Sở 2 - Khả Năng Đặt Câu Hỏi',
        'Giao tiếp là quá trình trao đổi và truyền đạt ý nghĩ, tình cảm giữa người với người. Đặt câu hỏi là một trong những mắt xích cơ bản nhất của quá trình giao tiếp và nó đóng vai trò quyết định hiệu quả giao tiếp. Một người biết cách đặt câu hỏi sẽ không làm cho người nghe rơi vào trình trạng không rõ người hỏi đang hỏi về cái gì, không biết trả lời thế nào; mà ngược lại, anh ta có thể khiến người nghe ngay lập tức nắm bắt chính xác chủ đề câu hỏi và dẫn dắt cuộc trò chuyện được tiếp tục.\r\n\r\nMuốn đối phương đón được bóng, trước hết bạn phải chuyền cho anh ta một đường bóng đẹp; tương tự, muốn nhận được câu trả lời có giá trị, trước tiên phải đưa ra câu hỏi thích hợp với người trả lời.\r\n\r\nĐặt câu hỏi là quá trình cân nhắc cả hai phía, người hỏi không chỉ phải nêu rõ vấn đề mà còn có vai trò dẫn dắt cuộc trò chuyện. Vì vậy, người đặt câu hỏi xuất sắc là người có thể “vận hành hệ thống kép”: một là trau chuốt câu hỏi của mình sao cho nổi bật trọng tâm và có tính logic; hai là phải quan tâm đến mong muốn và trải nghiệm của đối phương, dẫn dắt cuộc trò chuyện được tiếp tục. Việc “vận hành hệ thống kép” này ban đầu sẽ tương đối khó khăn, nhưng chỉ cần thực hành nhiều lần, nó sẽ trở nên dễ dàng như một thói quen.\r\n\r\nCuốn sách bạn đang cầm trên tay chính là cuốn cẩm năng tuyệt vời giúp chúng ta có được những phương thức hỏi thật hiệu quả. Từng nội dung trong sách được minh họa sinh đọng và hấp dẫn, trong niềm hứng thú, người đọc sẽ nhanh chóng nắm bắt được các phương pháp hỏi súc tích và thông minh nhất.',
        '1730119927_image_220086.webp',
        97000,
        50,
        9
    ),
    (
        53,
        'Take Note - Kiến Thức Toán Và Dạng Toán 3',
        'Take Note - Kiến Thức Toán Và Dạng Toán 3\r\n\r\nTake note Sổ tay kiến thức và dạng toán 3 là nguồn tư liệu hữu ích dành cho học sinh lớp 3, với các chương Toán với nhiều chủ đề được biên soạn theo chương trình giáo dục quốc gia. Với tổng cộng 11 chương, mỗi chương được biên soạn một cách tỉ mỉ và logic, sách cung cấp cho các em những dạng bài tập thường gặp trong học tập, kèm theo ví dụ minh họa và lời giải chi tiết, chắc chắn sẽ giúp các em vững vàng kiến thức, tự tin đạt điểm cao trong các kỳ thi.\r\n\r\nƯu điểm của cuốn sách: Take note Sổ tay kiến thức và dạng toán 3\r\n\r\n- Bám sát chương trình giáo dục: Cuốn sách được thiết kế theo chương trình của Bộ Giáo dục, bổ sung lý thuyết, kiến thức căn bản một cách bài bản, dễ hiểu, dễ vận dụng.\r\n\r\n- Đưa ra các dạng bài tập thường gặp kèm ví dụ minh họa và lời giải chi tiết: Giúp học sinh nắm vững kiến thức, hiểu bài dễ dàng hơn và rèn luyện kỹ năng giải bài tập toán.\r\n\r\n- Hình ảnh sinh động: Hình vẽ dễ thương và sinh động hỗ trợ việc học tập, làm cho nội dung trở nên gần gũi và thú vị hơn đối với học sinh.',
        '1730119992_b_a-in-takenote-kt-to_n-v_-d_ng-to_n-3_1.webp',
        79000,
        50,
        9
    ),
    (
        54,
        'Kết Nối',
        'Mạng xã hội tạo cho chúng ta áp lực phải tích cực hóa mọi chuyện. Bạn có thể đăng lên Facebook bức ảnh tươi cười trước tháp Eiffel, nhưng không ai biết thực tế chuyến đi đó đối với bạn khủng khiếp như thế nào.\r\n\r\nHàng trăm người theo dõi qua Instagram sẽ biết bạn gọi món gì trong bữa tối sang trọng tuần trước, nhưng chỉ những người có mối quan hệ đặc biệt với bạn mới biết bạn đang phải vật lộn với căn bệnh tiêu hóa suốt nhiều năm nay, hoặc biết trong bữa tối đó, bạn và người yêu đã bàn đến chuyện cùng nhau xây dựng tổ ấm hoặc cân nhắc những được mất của quyết định nghỉ việc.\r\n\r\nĐây chắc chắn là những chủ đề mà bạn sẽ không bao giờ đề cập với những người bạn trung học đã lâu không gặp hoặc những người đồng nghiệp chỉ thân thiết ở mức xã giao; đương nhiên, chúng cũng không phải là chủ đề thích hợp để trò chuyện cùng người cô mà bạn đến thăm hằng tuần. Nhưng những người có mối quan hệ đặc biệt với bạn sẽ biết điều gì đang thực sự xảy ra chỉ đơn giản vì họ hiểu bạn.\r\n\r\nCác mối quan hệ nằm trải dài trên một thang đo nhiều mức độ. Ở những mức độ thấp nhất, điều tồn tại giữa bạn và người kia là chỉ là mối liên hệ chứ không phải là sự kết nối. Nhưng khi mối quan hệ nằm ở đầu bên kia thang đo, bạn sẽ cảm thấy an toàn, được thấu hiểu, hỗ trợ, động viên và chấp nhận. Ở phần giữa thang đo, đó sẽ là những người cho bạn cảm giác gắn kết, nhưng trong số đó bạn chỉ muốn kết nối sâu sắc với một vài người. Câu hỏi đặt ra ở đây là: Làm thế nào để mối quan hệ của bạn với ai đó có thể tiến đến đầu bên kia của thang đo?',
        '1730120050_k_t-n_i---b_a-1.webp',
        220000,
        50,
        8
    );
-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `trang_thai`
--
CREATE TABLE `trang_thai` (
    `order_status` int(10) UNSIGNED NOT NULL COMMENT 'Mã Trạng Thái',
    `status` varchar(50) NOT NULL COMMENT 'Trạng Thái'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Đang đổ dữ liệu cho bảng `trang_thai`
--
INSERT INTO `trang_thai` (`order_status`, `status`)
VALUES (1, 'Mới'),
    (2, 'Đang xử lý'),
    (3, 'Đang vận chuyển'),
    (4, 'Hoàn thành'),
    (5, 'Đã hủy');
-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `vai_tro`
--
CREATE TABLE `vai_tro` (
    `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
    `name` varchar(255) NOT NULL COMMENT 'Tên'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Đang đổ dữ liệu cho bảng `vai_tro`
--
INSERT INTO `vai_tro` (`id`, `name`)
VALUES (1, 'admin'),
    (2, 'client');
--
-- Chỉ mục cho các bảng đã đổ
--
--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
ADD KEY `fk_chi_tiet_don_hang_don_hang` (`order_id`),
    ADD KEY `fk_chi_tiet_don_hang_khach_hang` (`customer_id`),
    ADD KEY `fk_chi_tiet_don_hang_san_pham` (`product_id`);
--
-- Chỉ mục cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
ADD PRIMARY KEY (`id`),
    ADD KEY `cart_id` (`cart_id`);
--
-- Chỉ mục cho bảng `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
ADD PRIMARY KEY (`category_id`);
--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
ADD PRIMARY KEY (`order_id`),
    ADD KEY `fk_don_hang_trang_thai` (`order_status`);
--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
ADD PRIMARY KEY (`cart_id`),
    ADD KEY `customer_id` (`customer_id`);
--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
ADD PRIMARY KEY (`customer_id`),
    ADD KEY `fk_khach_hang_vai_tro` (`vaitro_id`);
--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
ADD PRIMARY KEY (`product_id`),
    ADD KEY `fk_san_pham_danh_muc_san_pham` (`category_id`);
--
-- Chỉ mục cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
ADD PRIMARY KEY (`order_status`);
--
-- Chỉ mục cho bảng `vai_tro`
--
ALTER TABLE `vai_tro`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT cho các bảng đã đổ
--
--
-- AUTO_INCREMENT cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục sản phẩm',
    AUTO_INCREMENT = 13;
--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng',
    AUTO_INCREMENT = 25;
--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 12;
--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng',
    AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
    AUTO_INCREMENT = 55;
--
-- AUTO_INCREMENT cho bảng `vai_tro`
--
ALTER TABLE `vai_tro`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
    AUTO_INCREMENT = 3;
--
-- Các ràng buộc cho các bảng đã đổ
--
--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
ADD CONSTRAINT `fk_chi_tiet_don_hang_don_hang` FOREIGN KEY (`order_id`) REFERENCES `don_hang` (`order_id`),
    ADD CONSTRAINT `fk_chi_tiet_don_hang_khach_hang` FOREIGN KEY (`customer_id`) REFERENCES `khach_hang` (`customer_id`),
    ADD CONSTRAINT `fk_chi_tiet_don_hang_san_pham` FOREIGN KEY (`product_id`) REFERENCES `san_pham` (`product_id`);
--
-- Các ràng buộc cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `gio_hang` (`cart_id`);
--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
ADD CONSTRAINT `fk_don_hang_trang_thai` FOREIGN KEY (`order_status`) REFERENCES `trang_thai` (`order_status`);
--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `khach_hang` (`customer_id`);
--
-- Các ràng buộc cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
ADD CONSTRAINT `fk_khach_hang_vai_tro` FOREIGN KEY (`vaitro_id`) REFERENCES `vai_tro` (`id`);
--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
ADD CONSTRAINT `fk_san_pham_danh_muc_san_pham` FOREIGN KEY (`category_id`) REFERENCES `danh_muc_san_pham` (`category_id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;