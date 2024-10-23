-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 11:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12
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
-- Database: `hung_mobile`
--
-- --------------------------------------------------------
--
-- Table structure for table `chi_tiet_don_hang`
--
CREATE TABLE `chi_tiet_don_hang` (
  `order_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
  `product_name` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
  `price` decimal(10, 0) NOT NULL COMMENT 'Giá sản phẩm',
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Số lượng sản phẩm',
  `total_amount` decimal(10, 0) NOT NULL COMMENT 'Tổng giá trị',
  `customer_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã khách hàng',
  `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `chi_tiet_don_hang`
--
INSERT INTO `chi_tiet_don_hang` (
    `order_id`,
    `product_name`,
    `price`,
    `quantity`,
    `total_amount`,
    `customer_id`,
    `product_id`
  )
VALUES (
    19,
    'Samsung Galaxy S23 Ultra',
    '26990000',
    1,
    '26990000',
    2,
    11
  ),
  (
    19,
    'OPPO Reno8 T 5G',
    '10990000',
    2,
    '21980000',
    2,
    15
  ),
  (
    20,
    'iPhone 13 mini 128GB',
    '16990000',
    7,
    '118930000',
    2,
    6
  ),
  (
    22,
    'iPhone 14 Pro',
    '24990000',
    2,
    '49980000',
    6,
    2
  ),
  (
    22,
    'OPPO Reno8 series',
    '17990000',
    2,
    '35980000',
    6,
    16
  );
-- --------------------------------------------------------
--
-- Table structure for table `danh_muc_san_pham`
--
CREATE TABLE `danh_muc_san_pham` (
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã danh mục sản phẩm',
  `category_name` varchar(255) NOT NULL COMMENT 'Tên danh mục sản phẩm',
  `category_description` text NOT NULL COMMENT 'Mô tả danh mục sản phẩm'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `danh_muc_san_pham`
--
INSERT INTO `danh_muc_san_pham` (
    `category_id`,
    `category_name`,
    `category_description`
  )
VALUES (
    1,
    '  iphone ',
    '    \r\n                           \r\n                        iPhone là smartphone được tin dùng và sử dụng phổ biến trên toàn thế giới, tuy nhiên có bao giờ bạn tự hỏi chiếc điện thoại của mình có xuất xứ là hàng chính hãng hay thuộc thể loại tân trang,...? Để tránh được những hàng dựng và người bán không tâm có tâm trên thị trường. Và hôm nay, mình sẽ mách bạn cách phân biệt các loại iPhone trên thị trường hiện nay bằng số máy iPhone.                                '
  ),
  (
    2,
    'samsung',
    'Điện thoại Samsung nổi tiếng bởi độ bền cực kỳ cao, giá cả vừa phải nhưng lại có chất lượng tốt, mẫu mã đẹp mắt và đa dạng mức giá từ phổ thông đến cao cấp.'
  ),
  (
    3,
    'oppo',
    'Điện thoại OPPO mang đến siêu phẩm chụp hình với camera ấn tượng, thiết kế thời thượng cùng phụ kiện công nghệ, được giới trẻ toàn thế giới yêu thích.'
  ),
  (
    4,
    'xiaomi',
    'Mistore là Cửa hàng Xiaomi chính hãng đầu tiên tại Việt Nam. Trưng bày đầy đủ sản phẩm Xiaomi. Hệ thống cửa hàng Mi store / Mi Việt Nam chuyên bán các sản phẩm chính hãng'
  ),
  (
    5,
    'vivo',
    'vivo là thương hiệu hàng đầu thế giới về điện thoại thông minh và phụ kiện sáng tạo. Bước tới tương lai với Dòng sản phẩm vivo X80 , vivo V25 , vivo T1 và vivo TWS 2 .'
  );
-- --------------------------------------------------------
--
-- Table structure for table `don_hang`
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
--
-- Dumping data for table `don_hang`
--
INSERT INTO `don_hang` (
    `order_id`,
    `customer_name`,
    `customer_address`,
    `customer_email`,
    `customer_phone`,
    `total_amount`,
    `order_date`,
    `order_status`
  )
VALUES (
    19,
    'Phạm Anh Dũng',
    'Thành phố Hà Nội - Quận Hoàn Kiếm - Phường Hàng Bài - số nhà 7',
    'phamanhdung@gmail.com',
    '0945968152',
    '48970000',
    1683483069,
    4
  ),
  (
    20,
    'Lê Thị Quỳnh',
    'Thành phố Hà Nội - Quận Ba Đình - Phường Giảng Võ - số nhà 7',
    'anhdung@gmail.com',
    '515155152',
    '118930000',
    1683483255,
    1
  ),
  (
    21,
    'Hà Thành Tùng',
    'Tỉnh Quảng Ninh - Huyện Vân Đồn - Xã Đông Xá - nhà số 3',
    'hatung@gmail.com',
    '32515151',
    '24990000',
    1683497987,
    1
  ),
  (
    22,
    'Lê Thị Quỳnh',
    'Tỉnh Hưng Yên - Huyện Văn Giang - Xã Xuân Quan - số 7',
    'lequynh123@gmail.com',
    '0915388515',
    '85960000',
    1683575186,
    5
  );
-- --------------------------------------------------------
--
-- Table structure for table `khach_hang`
--
CREATE TABLE `khach_hang` (
  `customer_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã khách hàng',
  `customer_name` varchar(255) NOT NULL COMMENT 'Tên khách hàng',
  `customer_address` varchar(255) NOT NULL COMMENT 'Địa chỉ khách hàng',
  `customer_email` varchar(255) NOT NULL COMMENT 'Email khách hàng',
  `customer_phone` varchar(20) NOT NULL COMMENT 'Số điện thoại khách hàng',
  `username` varchar(50) NOT NULL COMMENT 'Tên đăng nhập của khách hàng',
  `password` varchar(255) NOT NULL COMMENT 'Mật khẩu của khách hàng',
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `khach_hang`
--
INSERT INTO `khach_hang` (
    `customer_id`,
    `customer_name`,
    `customer_address`,
    `customer_email`,
    `customer_phone`,
    `username`,
    `password`,
    `id`
  )
VALUES (
    1,
    'Nguyễn Phi Hùng',
    'Tỉnh Nghệ An - Huyện Tân Kỳ -  Xã Kỳ Sơn -  xóm 12',
    'nguyenhungtks1@gmail.com',
    '0945968013',
    'nguyenhungs1',
    '$2y$10$FdCIG.n9sj7BcU7HdIREwOMqZREZX.4ETUxpnZIhSmYdXvoUX9gpO',
    1
  ),
  (
    2,
    '   Phạm Anh Dũng ',
    'Tỉnh Bắc Ninh - Thị xã Từ Sơn -  Phường Châu Khê -  số 13',
    'phamanhdung@gmail.com',
    '051515515',
    'anhdung123',
    '$2y$10$Ku2I8d2gBBo04GTzUoMN8.14xHMbqxzfvM4qov0g09chTXrP3cbPq',
    2
  ),
  (
    4,
    'Vũ Quang Huy',
    'Tỉnh Nghệ An - Huyện Tân Kỳ -  Xã Kỳ Sơn -  xóm 12',
    'nguyenhungtks1@gmail.com',
    '0915388515',
    'huy',
    '$2y$10$CSNkCaezUaj2VR7jkkCCk.ppkVSfiyxqJiQD/Ejp27wqIIddCFcd.',
    2
  ),
  (
    5,
    'Nguyễn Thị Tố Uyên',
    'Thành phố Hồ Chí Minh - Quận 12 -  Phường Thạnh Lộc -  số 7',
    'touyen@gmail.com',
    '0515151221',
    'uyen123',
    '$2y$10$GRTgQGZXKU.WU4p41E2v5urbSuP4q7cyvqxT0Nsfl3jD27Cct5gb6',
    2
  ),
  (
    6,
    'Lê Thị Quỳnh',
    'Tỉnh Hưng Yên - Huyện Văn Lâm -  Thị trấn Như Quỳnh -  xóm 15',
    'lequynh123@gmail.com',
    '0945968013',
    'lequynh123',
    '$2y$10$cQCfGyZTitcnC0BSGWQk6utDreIBJ6ZhhweOUbjG3BlAn.NTujgR.',
    2
  );
-- --------------------------------------------------------
--
-- Table structure for table `san_pham`
--
CREATE TABLE `san_pham` (
  `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
  `product_name` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
  `product_description` text NOT NULL COMMENT 'Mô tả sản phẩm',
  `product_image` varchar(255) NOT NULL COMMENT 'Đường dẫn tới hình ảnh sản phẩm',
  `price` decimal(10, 0) NOT NULL COMMENT 'Giá sản phẩm',
  `stock_quantity` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'số lượng tồn kho',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã danh mục sản phẩm'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `san_pham`
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
    1,
    'iPhone 14 Pro Max',
    'Thông tin sản phẩm\r\niPhone 14 Pro Max một siêu phẩm trong giới smartphone được nhà Táo tung ra thị trường vào tháng 09/2022. Máy trang bị con chip Apple A16 Bionic vô cùng mạnh mẽ, đi kèm theo đó là thiết kế hình màn hình mới, hứa hẹn mang lại những trải nghiệm đầy mới mẻ cho người dùng iPhone.\r\nThiết kế cao cấp bền bỉ\r\niPhone năm nay sẽ được thừa hưởng nét đặc trưng từ người anh iPhone 13 Pro Max, vẫn sẽ là khung thép không gỉ và mặt lưng kính cường lực kết hợp với tạo hình vuông vức hiện đại thông qua cách tạo hình phẳng ở các cạnh và phần mặt lưng.',
    'iphone-14-pro-max-den-thumb-600x600.jpg',
    '27090000',
    14,
    1
  ),
  (
    2,
    'iPhone 14 Pro',
    'Thông tin sản phẩm\niPhone 14 Pro 128GB - Mẫu smartphone đến từ nhà Apple được mong đợi nhất năm 2022, lần này nhà Táo mang đến cho chúng ta một phiên bản với kiểu thiết kế hình notch mới, cấu hình mạnh mẽ nhờ con chip Apple A16 Bionic và cụm camera có độ phân giải được nâng cấp lên đến 48 MP.\nThiết kế mang dáng vẻ sang trọng và đặc trưng\nĐến với thiết kế của iPhone 14 Pro năm nay, hãng vẫn giữ lại nét đặc trưng vốn có từ các đời trước, vẫn mang trong mình ngoại hình vuông vức với các cạnh và mặt lưng vát phẳng. Hiện tại thị hiếu của người dùng về kiểu thiết kế này vẫn đang rất cao, vậy nên theo mình thấy thì đây vẫn sẽ là chiếc điện thoại bắt trend cho trong nhiều năm tiếp theo.',
    'iphone-14-pro-vang-thumb-600x600.jpg',
    '24990000',
    20,
    1
  ),
  (
    3,
    'iPhone 11',
    'Apple đã chính thức trình làng bộ 3 siêu phẩm iPhone 11, trong đó phiên bản iPhone 11 64GB có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như iPhone Xr ra mắt trước đó.Nâng cấp mạnh mẽ về camera.Nói về nâng cấp thì camera chính là điểm có nhiều cải tiến nhất trên thế hệ iPhone mới.Nếu như trước đây iPhone Xr chỉ có một camera thì nay với iPhone 11 chúng ta sẽ có tới hai camera ở mặt sau.\r\nNgoài camera chính vẫn có độ phân giải 12 MP thì chúng ta sẽ có thêm một camera góc siêu rộng và cũng với độ phân giải tương tự.\r\nTheo Apple thì việc chuyển đổi qua lại giữa hai ống kính thì sẽ không làm thay đổi màu sắc của bức ảnh.',
    'iphone-xi-den-600x600.jpg',
    '10390000',
    25,
    1
  ),
  (
    4,
    'iPhone 14',
    '    \n                              \n                   iPhone 14 128GB được xem là mẫu smartphone bùng nổ của nhà táo trong năm 2022, ấn tượng với ngoại hình trẻ trung, màn hình chất lượng đi kèm với những cải tiến về hệ điều hành và thuật toán xử lý hình ảnh, giúp máy trở thành cái tên thu hút được đông đảo người dùng quan tâm tại thời điểm ra mắt.\niPhone 14 sở hữu thiết kế cao cấp\nVới phiên bản tiêu chuẩn thì nhà Apple vẫn giữ nguyên kiểu dáng thiết kế so với thế hệ tiền nhiệm, vẫn là mặt lưng phẳng cùng bộ khung vuông giúp máy trở nên hiện đại hơn.                                ',
    'iPhone-14-thumb-do-600x600.jpg',
    '19490000',
    17,
    1
  ),
  (
    5,
    'iPhone 14 Plus',
    'Thông tin sản phẩm\nSau nhiều thế hệ điện thoại của Apple thì cái tên “Plus” cũng đã chính thức trở lại vào năm 2022 và xuất hiện trên chiếc iPhone 14 Plus 128GB, nổi trội với ngoại hình bắt trend cùng màn hình kích thước lớn để đem đến không gian hiển thị tốt hơn cùng cấu hình mạnh mẽ không đổi so với bản tiêu chuẩn.\nThân hình thanh mảnh cùng ngoại hình góc cạnh\nGiống như những thế hệ “Plus” trước đây, iPhone 14 Plus vẫn sẽ là phiên bản phóng to từ iPhone 14 với ngôn ngữ thiết kế không đổi, vẫn sẽ là cạnh viền vuông vức đi kèm với mặt lưng phẳng để tạo nên cái nhìn bắt trend và đặc trưng.',
    'iPhone-14-plus-thumb-den-600x600.jpg',
    '21890000',
    25,
    1
  ),
  (
    6,
    'iPhone 13 mini 128GB',
    '    \n                              \n                              \n                              \n                              \n                              \n                              \n                              \n                              \n                          Thông tin sản phẩm\niPhone 13 mini được Apple ra mắt với hàng loạt nâng cấp về cấu hình và các tính năng hữu ích, lại có thiết kế vừa vặn. Chiếc điện thoại này hứa hẹn là một thiết bị hoàn hảo hướng tới những khách hàng thích sự nhỏ gọn nhưng vẫn giữ được sự mạnh mẽ bên trong. \nHiệu năng mạnh mẽ hàng đầu\niPhone 13 mini được trang bị bộ vi xử lý A15 Bionic sản xuất trên tiến trình 5 nm giúp cải thiện hiệu suất và giảm điện năng tiêu thụ đến 15% so với phiên bản A14 Bionic trước đó, đáp ứng hoàn hảo trong công việc cũng như trong giải trí của người dùng tốt hơn.                                                                                                                                                ',
    'iphone-13-mini-pink-1-600x600.jpg',
    '16990000',
    30,
    1
  ),
  (
    7,
    'iPhone 13',
    'Thông tin sản phẩm\nTrong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì hãng điện thoại Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 với nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.\nHiệu năng vượt trội nhờ chip Apple A15 Bionic\nCon chip Apple A15 Bionic siêu mạnh được sản xuất trên quy trình 5 nm giúp iPhone 13 đạt hiệu năng ấn tượng, với CPU nhanh hơn 50%, GPU nhanh hơn 30% so với các đối thủ trong cùng phân khúc.',
    'iphone-13-blue-1-600x600.jpg',
    '17090000',
    40,
    1
  ),
  (
    8,
    'iPhone 12',
    '    \n                              \n                              \n                          Thông tin sản phẩm\nTrong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.\nHiệu năng vượt xa mọi giới hạn\nApple đã trang bị con chip mới nhất của hãng (tính đến 11/2020) cho iPhone 12 đó là A14 Bionic, được sản xuất trên tiến trình 5 nm với hiệu suất ổn định hơn so với chip A13 được trang bị trên phiên bản tiền nhiệm iPhone 11.                                                ',
    'iphone-12-tim-1-600x600.jpg',
    '14990000',
    34,
    1
  ),
  (
    9,
    'Samsung Galaxy S23 5G',
    'Thông tin sản phẩm\nSamsung Galaxy S23 5G 128GB chắc hẳn không còn là cái tên quá xa lạ đối với các tín độ công nghệ hiện nay, được xem là một trong những gương mặt chủ chốt đến từ nhà Samsung với cấu hình mạnh mẽ bậc nhất, camera trứ danh hàng đầu cùng lối hoàn thiện vô cùng sang trọng và hiện đại.\nSở hữu lối thiết kế sang trọng\nỞ phiên bản năm nay, mình rất vui khi biết được rằng Galaxy S23 vẫn giữ nguyên kiểu dáng quen thuộc từ thế hệ trước, nó được xem là một biểu tượng của dòng điện thoại Samsung Galaxy dòng S khi mang trong mình một đặc trưng riêng biệt và đầy đẳng cấp.',
    'samsung-galaxy-s23-600x600.jpg',
    '1999000',
    20,
    2
  ),
  (
    10,
    'Samsung Galaxy S21 FE',
    'Thông tin sản phẩm\nSamsung Galaxy S21 FE 5G (6GB/128GB) được Samsung ra mắt với dáng dấp thời thượng, cấu hình khỏe, chụp ảnh đẹp với bộ 3 camera chất lượng, thời lượng pin đủ dùng hằng ngày và còn gì nữa? Mời bạn khám phá qua nội dung sau ngay.\nVẻ ngoài sang trọng, màu sắc thời trang\nGalaxy S21 FE 5G thiết kế mỏng nhẹ với độ dày 7.9 mm, khối lượng chỉ 177 gram, các góc cạnh bo tròn cho cảm giác hài hòa, mềm mại, kết hợp các tông màu thời thượng gồm tím, xanh lá, xám và trắng giúp bạn dễ dàng tạo nên phong cách riêng đầy cá tính.',
    'Samsung-Galaxy-S21-FE-vang-1-2-600x600.jpg',
    '10990000',
    25,
    2
  ),
  (
    11,
    'Samsung Galaxy S23 Ultra',
    'Thông tin sản phẩm\nSamsung Galaxy S23 Ultra 5G 256GB là chiếc smartphone cao cấp nhất của nhà Samsung, sở hữu cấu hình không tưởng với con chip khủng được Qualcomm tối ưu riêng cho dòng Galaxy và camera lên đến 200 MP, xứng danh là chiếc flagship Android được mong đợi nhất trong năm 2023.\nTạo hình sang trọng đầy tinh tế\nVề thiết kế thì Samsung Galaxy S23 Ultra sẽ tiếp tục thừa hưởng kiểu dáng sang trọng đến từ thế hệ trước, vẫn là bộ khung kim loại, mặt lưng kính cùng kiểu tạo hình bo cong nhẹ ở cạnh bên và màn hình.',
    'samsung-galaxy-s23-ultra-1-600x600.jpg',
    '26990000',
    30,
    2
  ),
  (
    12,
    'Samsung Galaxy A23',
    'Thông tin sản phẩm\nSamsung Galaxy A23 4GB sở hữu bộ thông số kỹ thuật khá ấn tượng trong phân khúc, máy có một hiệu năng ổn định, cụm 4 camera thông minh cùng một diện mạo trẻ trung phù hợp cho mọi đối tượng người dùng.\nXử lý mượt mà nhờ chipset đến từ Qualcomm\nĐể máy vận hành một cách ổn định hơn Samsung trang bị cho Galaxy A23 con chip quốc dân dành cho thị trường di động tầm trung hiện nay (04/2022) mang tên Snapdragon 680 8 nhân với hiệu suất tối đa đạt được là 2.4 GHz.',
    'samsung-galaxy-a23-cam-thumb-600x600.jpg',
    '4690000',
    45,
    2
  ),
  (
    13,
    'Samsung Galaxy S20 FE (8GB/256GB)',
    'Thông tin sản phẩm\nSamsung đã giới thiệu đến người dùng thành viên mới của dòng S20 Series đó chính là điện thoại Samsung Galaxy S20 FE. Đây là mẫu flagship cao cấp quy tụ nhiều tính năng mà Samfan yêu thích, hứa hẹn sẽ mang lại trải nghiệm cao cấp của dòng Galaxy S với mức giá dễ tiếp cận hơn.\nNhiếp ảnh chuyên nghiệp với cụm camera đẳng cấp\nCamera trên S20 FE là 3 cảm biến chất lượng nằm gọn trong mô đun chữ nhật độc đáo ở mặt lưng bao gồm: Camera chính 12 MP cho chất lượng ảnh sắc nét, camera góc siêu rộng 12 MP cung cấp góc chụp tối đa và cuối cùng camera tele 8 MP hỗ trợ zoom quang học 3X.',
    'samsung-galaxy-s20600x600.jpeg',
    '9490000',
    30,
    2
  ),
  (
    14,
    'OPPO Find N2 Flip',
    'Thông tin sản phẩm\nOPPO Find N2 Flip, chiếc điện thoại gập đầu tiên của OPPO được giới thiệu chính thức vào tháng 03/2023. Với cấu hình mạnh mẽ bao gồm con chip Dimensity 9000+ và bộ camera nổi trội, đây được xem là một trong những mẫu điện thoại đáng chú ý ở thời điểm hiện tại khi sở hữu bộ cấu hình tốt trong tầm giá.\nSử dụng ngôn ngữ thiết kế gập hiện đại\nVề thiết kế của máy, Find N2 Flip sẽ được làm theo cơ chế gập ấn tượng với tỷ lệ khung hình rộng và viền mỏng. Ngoài ra, điện thoại còn được trang bị một màn hình phụ nhỏ ở mặt sau giúp người dùng tiện lợi trong việc chụp ảnh selfie hoặc kiểm tra thông báo. ',
    'oppo-find-n2-flip-purple-thumb-1-600x600-1-600x600.jpg',
    '19990000',
    7,
    3
  ),
  (
    15,
    'OPPO Reno8 T 5G',
    'Thông tin sản phẩm\nTiếp nối sự thành công rực rỡ đến từ các thế hệ trước đó thì chiếc OPPO Reno8 T 5G 256GB cuối cùng đã được giới thiệu chính thức tại Việt Nam, được định hình là dòng sản phẩm thuộc phân khúc tầm trung với camera 108 MP, con chip Snapdragon 695 cùng kiểu dáng thiết kế mặt lưng và màn hình bo cong hết sức nổi bật.\nThiết kế với kiểu dáng bắt mắt\nQua những lần chạm đầu tiên trên chiếc Reno8 T 5G thì mình thấy đây là một chiếc điện thoại có độ hoàn thiện khá tốt, máy mang lại cho mình một cảm giác cầm nắm tương đối là đầm tay, hai bên cạnh cũng được làm bo cong giúp hạn chế tình trạng cấn tay mang đến cho mình một trải nghiệm sử dụng khá là thoải mái.',
    'oppo-reno8t-vang1-thumb-600x600.jpg',
    '10990000',
    8,
    3
  ),
  (
    16,
    'OPPO Reno8 series',
    'Thông tin sản phẩm\nOPPO Reno8 Pro 5G là chiếc điện thoại cao cấp được nhà OPPO ra mắt vào thời điểm 09/2022, máy hướng đến sự hoàn thiện cao cấp ở phần thiết kế cùng khả năng quay chụp chuyên nghiệp nhờ trang bị vi xử lý hình ảnh MariSilicon X chuyên dụng.\nDáng vẻ cao cấp sang trọng\nLần này nhà OPPO mang đến cho chúng ta một chiếc điện thoại có thiết kế đặc biệt, máy sở hữu một diện mạo khác hẳn với những chiếc điện thoại OPPO Reno trước đây, cách thiết kế này đã làm mình liên tưởng đến chiếc OPPO Find X5 Pro được ra mắt trước đó.',
    'oppo-reno8-pro-thumb-xanh-1-600x600.jpg',
    '17990000',
    15,
    3
  ),
  (
    17,
    'OPPO A55',
    'Thông tin sản phẩm\nOPPO cho ra mắt OPPO A55 4G chiếc smartphone giá rẻ tầm trung có thiết kế đẹp mắt, cấu hình khá ổn, cụm camera chất lượng và dung lượng pin ấn tượng, mang đến một lựa chọn trải nghiệm thú vị vừa túi tiền cho người tiêu dùng.\nLớp “áo” đẹp mãn nhãn\nOPPO A55 4G có 3 phiên bản màu độc đáo là xanh lá, xanh dương và màu đen. Thiết kế cong 3D cùng kích thước mỏng nhẹ, OPPO A55 4G vừa vặn trong tay người cầm, cho từng thao tác trải nghiệm thoải mái và chắc chắn.',
    'oppo-a55-4g-thumb-new-600x600.jpg',
    '3690000',
    10,
    3
  ),
  (
    18,
    'OPPO A16K',
    'Thông tin sản phẩm\nOPPO chính thức trình làng mẫu smartphone giá rẻ - OPPO A16K sở hữu màu sắc thời thượng, viên pin dung lượng cao, cấu hình khỏe, selfie lung linh, một lựa chọn thú vị cho người tiêu dùng.\nHệ thống camera cho bạn tỏa sáng cùng vẻ đẹp tự nhiên \nCụm camera sau được xếp trong module hình vuông trong đó có 1 camera với độ phân giải 13 MP, hỗ trợ Al, đèn flash LED (tăng cường chất lượng chụp ảnh trong điều kiện thiếu sáng) mang đến khả năng quay chụp chuyên nghiệp với nhiều chế độ tiện ích đi kèm.',
    'OPPO-a16k-den-nhan-thumb-600x600.jpg',
    '4690000',
    41,
    3
  ),
  (
    19,
    'Xiaomi Redmi 12C',
    'Thông tin sản phẩm\nXiaomi Redmi 12C 64GB là một thiết bị di động tầm trung được giới thiệu bởi Xiaomi, với cấu hình vượt trội so với các đối thủ trong cùng phân khúc, điều này nhờ trang bị con chip MediaTek Helio G85 mạnh mẽ giúp máy có thể xử lý tốt nhiều tác vụ. Hơn nữa, với bộ ống kính chất lượng 50 MP cho phép bạn chụp ảnh chất lượng, sắc nét và đẹp mắt.\nNgoại hình trẻ trung hiện đại\nVới thiết kế bo cong mềm mại qua những đường nét tinh xảo và màu sắc hiện đại, Redmi 12C có vẻ ngoài rất sang trọng và thời thượng để mang đến cái nhìn đầy bắt mắt. Điện thoại không chỉ đơn thuần là một thiết bị thông thường mà còn có thể sử dụng như một phụ kiện thời trang giúp bạn tự tin hơn mỗi khi cầm nắm chúng trên tay.',
    'xiaomi-redmi-12c-grey-thumb-600x600.jpg',
    '2990000',
    30,
    4
  ),
  (
    20,
    'Xiaomi 12T',
    'Thông tin sản phẩm\nXiaomi 12T series đã ra mắt trong sự kiện của Xiaomi vào ngày 4/10, trong đó có Xiaomi 12T 5G 128GB - máy sở hữu nhiều công nghệ hàng đầu trong giới smartphone tiêu biểu như: Chipset mạnh mẽ đến từ MediaTek, camera 108 MP sắc nét cùng khả năng sạc 120 W siêu nhanh.\nẤn tượng với diện mạo sang trọng\nXiaomi 12T có thiết kế khá tương đồng với thế hệ tiền nhiệm, mặt lưng được làm bo cong ở hai cạnh kèm theo một dòng chữ “Xiaomi” bố trí ở góc dưới phần thân máy.',
    'xiaomi-12t-thumb-600x600.jpg',
    '9490000',
    31,
    4
  ),
  (
    21,
    'Xiaomi Redmi A1',
    'Thông tin sản phẩm\nMới đây chiếc điện thoại Xiaomi Redmi A1 cũng đã được nhà Xiaomi chính thức cho ra mắt cùng một mức giá bán khá ấn tượng, phù hợp với những bạn học sinh - sinh viên đang mong muốn chọn mua cho mình một thiết bị có giá thành vừa phải nhằm đáp ứng nhu cầu học tập cũng như tra cứu thông tin nhẹ nhàng.\nThiết kế trẻ trung\nSở hữu thiết kế giả da sang trọng mang đến cho thiết bị một diện mạo cuốn hút thời trang, đi kèm với đó sẽ là những màu sắc vô cùng cá tính và trẻ trung.',
    'Xiaomi-Redmi-A1-thumb-xanh-duong-600x600.jpg',
    '1890000',
    15,
    4
  ),
  (
    22,
    'Xiaomi 13 series',
    'Thông tin sản phẩm\nThông tin ra mắt về Xiaomi 13 hiện đang là chủ đề cực kỳ hot trên các diễn đàn bởi lần ra mắt này Xiaomi mang đến cho chúng ta khá nhiều điều mới mẻ, từ con chip Snapdragon 8 Gen 2 cho đến camera hợp tác với hãng Leica cũng đủ để thu hút các Mi fan hay tín đồ đam mê công nghệ.\nThiết kế với thân hình sang trọng\nNăm nay, nhà Xiaomi khoác lên mình sản phẩm mới với một vẻ ngoài hoàn toàn khác so với thế hệ cũ, từ màu sắc cho đến cách bố trí cụm camera trên Xiaomi 13 đều thể hiện lên một điểm độc lạ chưa từng có. ',
    'xiaomi-13-thumb-den-600x600.jpg',
    '17690000',
    3,
    4
  ),
  (
    23,
    'Xiaomi Redmi Note 12 ',
    'Thông tin sản phẩm\nXiaomi Redmi Note 12 Pro 5G là mẫu điện thoại thuộc dòng Redmi Note được chính thức ra mắt trong năm 2023, máy mang trên mình những cải tiến vượt trội về thiết kế, camera và hiệu năng, đáp ứng mượt mà hầu hết các nhu cầu khác nhau của người dùng.\nNgoại hình trẻ trung, màu sắc thời trang\nXiaomi Redmi Note 12 Pro 5G có kiểu dáng tổng thể khá hợp thời và trẻ trung với các phiên bản màu sắc lần lượt là: Xanh, Trắng và Đen. Máy sở hữu mặt lưng bằng chất liệu kính và khung viền vuông vức từ nhựa, hơi bo cong nhẹ hứa hẹn sẽ mang đến trải nghiệm cầm nắm dễ chịu, thoải mái trong quá trình sử dụng.',
    'xiaomi-redmi-note-12-pro-5g-momo-1-600x600.jpg',
    '9490000',
    5,
    4
  ),
  (
    24,
    'Xiaomi Redmi Note 11 Pro',
    'Thông tin sản phẩm\nXiaomi Redmi Note 11 Pro 4G mang trong mình khá nhiều những nâng cấp cực kì sáng giá. Là chiếc điện thoại có màn hình lớn, tần số quét 120 Hz, hiệu năng ổn định cùng một viên pin siêu trâu.\nThiết kế cứng cáp, cầm nắm rất đầm tay\nĐiểm nổi bật ở phần thiết kế của Redmi Note 11 Pro chính là cụm camera khá lớn và lồi so với mặt lưng, mặt lưng có chất liệu bằng kính đã được làm phẳng đi. Khung viền bằng nhựa cũng được bo tròn và vát phẳng rất liền mạch, mức độ hoàn thiện tốt, không có hiện tượng ọp ẹp khi mình sử dụng chiếc máy này..',
    'xiaomi-redmi-note-11-pro-trang-thumb-600x600.jpg',
    '9490000',
    6,
    4
  ),
  (
    25,
    'Xiaomi Redmi Note 11S',
    'Điện thoại Xiaomi Redmi Note 11S sẵn sàng đem đến cho bạn những trải nghiệm vô cùng hoàn hảo về chơi game, các tác vụ sử dụng hằng ngày hay sự ấn tượng từ vẻ đẹp bên ngoài.\nẤn tượng với màn hình AMOLED 6.43 inch\nMàn hình của Redmi Note 11S được thiết kế dạng nốt ruồi cho không gian hiển thị rộng lớn với các viền khá mỏng giúp máy trở nên đẹp và thanh thoát hơn.\n\nXiaomi Redmi Note 11S - Màn hình AMOLED 6.43 inch\n\nDù chỉ thuộc phân khúc giá tầm trung nhưng Xiaomi đã trang bị cho Note 11S tấm nền AMOLED mang lại khả năng hiển thị tốt, màu đen sâu hơn, độ tương phản cao và còn nâng cao khả năng hiển thị màu sắc sống động nhờ dải màu rộng DCI-P3. Nên có thể nói dù xem phim trên YouTube hay chơi game thì mình thật sự cảm thấy mãn nhãn với màn hình này.',
    'xiaomi-redmi-note-11s-xam-thumb-600x600.jpg',
    '4990000',
    6,
    4
  ),
  (
    26,
    'Vivo Y35',
    'Thông tin sản phẩm\nTiếp nối sự thành công của các mẫu smartphone tầm trung tại thị trường Việt Nam thì mới đây Vivo đã chính thức cho ra mắt điện thoại Vivo Y35. Máy sở hữu cho mình khả năng sạc siêu nhanh 44 W, cụm camera đem đến những bức ảnh sắc nét và một hiệu năng ổn định trong phân khúc.\nKhông gian hiển thị sắc nét\nVivo Y35 có kích thước màn hình 6.58 inch đi cùng là tấm nền IPS LCD, độ phân giải Full HD+ với những thông số trên chất lượng hình ảnh hiển thị có chi tiết tốt, góc nhìn rộng và màu sắc trung thực.',
    'vivo-y35-thumb-den-600x600.jpg',
    '6290000',
    12,
    5
  ),
  (
    27,
    'Vivo V25 series',
    'Thông tin sản phẩm\nDường như 2022 là một năm bùng nổ cho điện thoại V series khi nhiều sản phẩm được cho ra mắt với thông số và thiết kế rất ấn tượng, trong đó có Vivo V25 vừa được giới thiệu vào tháng 10/2022 hứa hẹn sẽ gây sốt trên thị trường công nghệ trong giai đoạn cuối năm nay nhờ tạo hình đẹp cùng hiệu năng mạnh mẽ.\nThiết kế tinh tế đầy sang trọng\nVivo V25 sở hữu cho mình những màu sắc hết sức trẻ trung và hiện đại, không chỉ mang đến nhiều sự lựa chọn hơn cho người dùng mà điều này còn đem lại cái nhìn tươi mới năng động hơn khi cầm nắm sử dụng.\n\nMột điểm độc đáo trên phiên bản này chính là khả năng thay đổi màu sắc từ nhạt sang tone màu đậm hơn khi tiếp xúc với môi trường có ánh sáng cao, đây chắc hẳn là điều khiến mọi người dùng có thể mê mẩn ngắm nhìn ngay từ lần tiếp xúc đầu tiên.\n\nThiết kế đẹp mắt - Vivo V25\n\nMáy sử dụng kiểu dáng thiết kế vuông vắn khi các cạnh và hai mặt được vát phẳng tinh tế, nhờ vậy mà máy mang lại một vẻ ngoài hào nhoáng đầy thời thượng. Giúp bạn có thể tự tin hơn trong việc chọn lựa để mua sắm bởi đây vẫn là một kiểu thiết kế vẫn đang rất thịnh hành trong năm 2022.\n\nThiết kế cao cấp - Vivo V25\n\nMặt lưng của Vivo V25 được làm vật liệu kính cao cấp để vừa mang lại khả năng hạn chế các vết xước nhẹ cũng như giúp cho chiếc máy của bạn trở nên thời thượng hơn.\n\nHỗ trợ chụp ảnh selfie chất lượng cao\nVề phần camera thì chiếc điện thoại Vivo dòng V này được trang bị 3 ống kính ở phần mặt lưng. Trong đó camera chính có độ phân giải 64 MP, camera góc siêu rộng 8 MP và cảm biến macro có độ phân giải 2 MP.\n\nTrang bị 3 camera - Vivo V25\n\nĐi kèm với những ống kính chất lượng sẽ là hàng loạt các tính năng cao cấp mà Vivo trang bị giúp bạn có thể thỏa sức nhiếp ảnh một cách đầy nghệ thuật, có thể kể đến các tính năng nổi bật như: Siêu độ phân giải, phơi sáng kép, ban đêm, xóa phông,...\n\nTính năng mà hãng đề cập khá nhiều ở phần camera sau chính là tính năng chụp ảnh Bokeh Flare, giúp người dùng có thể chủ động hơn trong việc tùy chỉnh mức độ làm mờ hậu cảnh để cho cho bức hình có thêm chiều sâu theo cách mà bạn mong muốn.\n\nChụp ảnh xóa phông - Vivo V25\n\nNgoài ra máy còn được hỗ trợ thêm khả năng chống rung quang học OIS cùng chuẩn video có thể thu được lên đến 4K.\n\nMột điểm nổi bật không kém đó chính là camera selfie có độ phân giải lên đến 50 MP, giúp máy có thể lấy nét rõ ràng hơn làm tăng độ chi tiết bức ảnh. Giờ đây người dùng có thể tự tin hơn trên những bức ảnh tự chụp để có thể thoải mái khoe lên trên các trang mạng xã hội nhờ các tấm hình chất lượng mà Vivo V25 mang đến.\n\nSelfie sắc nét - Vivo V25\n\nTrang bị màn hình chất lượng cùng công nghệ âm thanh tiên tiến\nVivo V25 được trang bị tấm nền AMOLED với kích thước 6.44 inch giúp tái hiện hình ảnh có màu sắc rực rỡ và sâu hơn, kèm với đó là không gian thao tác rộng rãi để bạn có thể chơi game hay xem phim một cách thoải mái.\n\nMàn hình chất lượng - Vivo V25\n\nThoải mái chiến game với con chip hiệu năng cao\nCung cấp sức mạnh cho máy sẽ là con chip Dimensity 900 5G đến từ nhà MediaTek, không chỉ đáp ứng tốt các tác vụ hàng ngày mà đây còn được xem là bộ vi xử lý có thể cân tốt nhiều tựa game đồ họa cao tính đến thời điểm hiện tại (10/2022).\n\nHiệu năng mạnh mẽ - Vivo V25\n\nNhằm tối ưu hơn trong việc chơi game thì hãng còn trang bị thêm cho Vivo V25 chế độ tối ưu Game giúp người dùng có điều chỉnh hiệu năng trên máy để tập trung vào trò chơi nhằm đem đến quá trình chiến game mượt mà và ổn định nhất có thể.\n\nTối ưu tốt việc chơi game - Vivo V25\n\nLà chiếc điện thoại RAM 8 GB cùng với khả năng mở rộng thêm 8 GB từ bộ nhớ trong, từ đó máy hoàn toàn có thể đa nhiệm mượt mà cho dù mở nhiều ứng dụng cùng một lúc.\n\nThời lượng sử dụng dài lâu\nTích hợp trong máy sẽ là viên pin có dung lượng 4500 mAh cùng khả năng sạc siêu nhanh có công suất 44 W, giúp thiết bị của bạn có thể duy trì việc sử dụng cả ngày mà không quá lo lắng đến vấn đề hết pin giữa chừng.\n\nSạc pin nhanh chóng - Vivo V25\n\nNếu bạn là một người yêu thích những chiếc điện thoại Vivo có thiết kế đẹp mắt, đáp ứng toàn diện mọi nhu cầu cơ bản từ chụp ảnh cho đến chơi game đồ họa cao thì chiếc Vivo V25 có lẽ là một lựa chọn rất đáng để cân nhắc và chọn mua. Nhờ được trang bị mức giá bán phải chăng cùng bộ thông số ấn tượng hứa hẹn sẽ là một cái tên gây sốt trong phân khúc tầm trung.',
    'vivo-v25-pro-5g-xanh-thumb-1-600x600.jpg',
    '9490000',
    22,
    5
  ),
  (
    28,
    'Vivo Y16',
    'Thông tin sản phẩm\nVivo Y16 64GB tiếp tục sẽ là cái tên được hãng bổ sung cho bộ sưu tập điện thoại Vivo dòng Y trong thời điểm cuối năm 2022, với mục tiêu mang đến nhiều trải nghiệm tốt hơn đối với dòng sản phẩm giá rẻ, Vivo hứa hẹn sẽ mang lại cho người dùng những trải nghiệm vượt xa mong đợi nhờ việc trang bị nhiều công nghệ xịn sò.\nNgoại hình vuông vắn đẹp mắt\nVivo Y16 được thiết kế phẳng bởi các cạnh và hai mặt của máy được tạo hình vuông vức, điều này giúp chiếc máy trở nên sang trọng và hợp thời hơn để bạn có thể tự tin sử dụng trên tay.\n\nLần này Vivo mang đến cho người dùng hai tùy chọn về màu sắc với tone màu trung tính nên cho dù là nam hay nữ đều có thể sở hữu cho mình một phiên bản màu phù hợp.',
    'vivo-y16-vang-thumb-600x600.jpg',
    '3290000',
    12,
    5
  ),
  (
    29,
    'Vivo Y02s',
    'Thông tin sản phẩm\nVivo Y02s - một cái tên thuộc dòng Y vừa được Vivo ra mắt với một diện mạo trẻ trung. Sở hữu bộ thông số được xem là nổi bật trong phân khúc điện thoại giá rẻ hiện nay (08/2022). Đây hứa hẹn sẽ là sản phẩm “vừa ngon vừa rẻ” mà người dùng không nên bỏ qua.\nVẻ ngoài hiện đại, màu sắc trẻ trung\nVivo Y02s được hoàn thiện với hai mặt và các cạnh vát phẳng giúp cho thân hình của chiếc máy trở nên vuông vắn và cực kỳ hợp xu hướng hiện nay. Nổi bật hơn hết là cụm camera được Vivo thiết kế với hai cụm tròn to nổi khá ấn tượng.',
    'vivo-y02s-thumb-1-2-3-600x600.jpg',
    '2790000',
    15,
    5
  ),
  (
    30,
    'Vivo Y21 series',
    'Thông tin sản phẩm\nVivo Y21 chiếc smartphone mang trong mình nhiều ưu điểm nổi bật như màn hình viền mỏng đẹp mắt, hiệu năng ổn định cùng dung lượng pin tận 5000 mAh chắc chắn sẽ đáp ứng nhu cầu sử dụng của bạn cả ngày dài.\nNgoại hình nổi bật với thiết kế siêu mỏng\nMáy có một thiết kế nguyên khối tạo cảm giác bền bỉ, chắc chắn. Vivo Y21 còn mang đến trải nghiệm cầm nắm thoải mái với thân máy mỏng chỉ 8 mm và có các cạnh viền bo tròn mịn màng giúp cho mọi thao tác sử dụng trở nên hoàn hảo.',
    'vivo-y21-white-01-1-600x600.jpg',
    '3290000',
    16,
    5
  ),
  (
    31,
    'Vivo V25 Pro 5G',
    'Thông tin sản phẩm\nVivo V25 Pro 5G vừa được ra mắt với một mức giá bán cực kỳ hấp dẫn, thế mạnh của máy thuộc về phần hiệu năng nhờ trang bị con chip MediaTek Dimensity 1300 và cụm camera sắc nét 64 MP, hứa hẹn mang lại cho người dùng những trải nghiệm ổn định trong suốt quá trình sử dụng.\nDiện mạo thời trang - nhìn ngắm cực sang\nGiữa vô vàn thiết bị sở hữu lối thiết kế vuông vức trên thị trường thì sự xuất hiện của V25 Pro làm mình cảm thấy rất thích thú bởi điện thoại được tạo hình bo cong ở các cạnh, mang lại cho thiết bị một nét đặc trưng riêng biệt.',
    'vivo-v25-pro-5g-xanh-thumb-1-600x600.jpg',
    '11990000',
    17,
    5
  ),
  (
    34,
    'Vivo V23 series',
    'Thông tin sản phẩm Vivo V23e - sản phẩm tầm trung được đầu tư lớn về khả năng selfie cùng ngoại hình mỏng nhẹ, bên cạnh thiết kế vuông vức theo xu hướng hiện tại thì V23e còn có hiệu năng tốt và một viên pin có khả năng sạc cực nhanh. Thiết kế mỏng nhẹ cùng màu sắc tinh tế Vivo V23e vẫn giữ đặc điểm nổi bật của Vivo V Series với thiết kế mỏng 7.36 mm ấn tượng (ở phiên bản màu đen). Viền màn hình 2 cạnh bên có độ mỏng ở mức vừa phải, tuy nhiên thì phần cạnh dưới thì có dày hơn một chút.Xem chi tiết thành công',
    'Vivo-V23e-1-2-600x600.jpg',
    '5490000',
    55,
    5
  );
-- --------------------------------------------------------
--
-- Table structure for table `trang_thai`
--
CREATE TABLE `trang_thai` (
  `order_status` int(10) UNSIGNED NOT NULL COMMENT 'Mã Trạng Thái',
  `status` varchar(50) NOT NULL COMMENT 'Trạng Thái'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `trang_thai`
--
INSERT INTO `trang_thai` (`order_status`, `status`)
VALUES (1, 'Mới'),
  (2, 'Đang xử lý'),
  (3, 'Đang vận chuyển'),
  (4, 'Hoàn thành'),
  (5, 'Đã hủy');
-- --------------------------------------------------------
--
-- Table structure for table `vai_tro`
--
CREATE TABLE `vai_tro` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT 'Tên'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `vai_tro`
--
INSERT INTO `vai_tro` (`id`, `name`)
VALUES (1, 'admin'),
  (2, 'client');
--
-- Indexes for dumped tables
--
--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
ADD KEY `fk_chi_tiet_don_hang_don_hang` (`order_id`),
  ADD KEY `fk_chi_tiet_don_hang_san_` (`product_id`),
  ADD KEY `fk_chi_tiet_don_hang_khach_hang` (`customer_id`);
--
-- Indexes for table `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
ADD PRIMARY KEY (`category_id`);
--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_don_hang_trang_thai` (`order_status`);
--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_khach_hang_vai_tro` (`id`);
--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_san_pham_category` (`category_id`);
--
-- Indexes for table `trang_thai`
--
ALTER TABLE `trang_thai`
ADD PRIMARY KEY (`order_status`);
--
-- Indexes for table `vai_tro`
--
ALTER TABLE `vai_tro`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `danh_muc_san_pham`
--
ALTER TABLE `danh_muc_san_pham`
MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục sản phẩm',
  AUTO_INCREMENT = 7;
--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng',
  AUTO_INCREMENT = 23;
--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng',
  AUTO_INCREMENT = 7;
--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
  AUTO_INCREMENT = 36;
--
-- AUTO_INCREMENT for table `trang_thai`
--
ALTER TABLE `trang_thai`
MODIFY `order_status` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã Trạng Thái',
  AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `vai_tro`
--
ALTER TABLE `vai_tro`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  AUTO_INCREMENT = 3;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
ADD CONSTRAINT `fk_chi_tiet_don_hang_don_hang` FOREIGN KEY (`order_id`) REFERENCES `don_hang` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chi_tiet_don_hang_khach_hang` FOREIGN KEY (`customer_id`) REFERENCES `khach_hang` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chi_tiet_don_hang_san_` FOREIGN KEY (`product_id`) REFERENCES `san_pham` (`product_id`);
--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
ADD CONSTRAINT `fk_don_hang_trang_thai` FOREIGN KEY (`order_status`) REFERENCES `trang_thai` (`order_status`);
--
-- Constraints for table `khach_hang`
--
ALTER TABLE `khach_hang`
ADD CONSTRAINT `fk_khach_hang_vai_tro` FOREIGN KEY (`id`) REFERENCES `vai_tro` (`id`);
--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
ADD CONSTRAINT `fk_san_pham_category` FOREIGN KEY (`category_id`) REFERENCES `danh_muc_san_pham` (`category_id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;