CREATE DATABASE qlbs;
USE qlbs;
CREATE TABLE `chi_tiet_don_hang` (
    `order_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
    `price` decimal(10, 0) NOT NULL COMMENT 'Giá sản phẩm',
    `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Số lượng sản phẩm',
    `customer_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã khách hàng',
    `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
CREATE TABLE `chi_tiet_gio_hang` (
    `id` int(11) NOT NULL,
    `product_id` int(11) DEFAULT NULL,
    `quantity` int(11) NOT NULL,
    `price` int(11) NOT NULL,
    `cart_id` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
CREATE TABLE `danh_muc_san_pham` (
    `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã danh mục sản phẩm',
    `category_name` varchar(255) NOT NULL COMMENT 'Tên danh mục sản phẩm',
    `category_description` text NOT NULL COMMENT 'Mô tả danh mục sản phẩm'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
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
CREATE TABLE `gio_hang` (
    `cart_id` int(11) NOT NULL,
    `customer_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
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
CREATE TABLE `san_pham` (
    `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
    `product_name` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
    `product_description` text NOT NULL COMMENT 'Mô tả sản phẩm',
    `product_image` varchar(255) NOT NULL COMMENT 'Đường dẫn tới hình ảnh sản phẩm',
    `price` decimal(10, 0) NOT NULL COMMENT 'Giá sản phẩm',
    `stock_quantity` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Số lượng tồn kho',
    `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã danh mục sản phẩm'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
CREATE TABLE `trang_thai` (
    `order_status` int(10) UNSIGNED NOT NULL COMMENT 'Mã Trạng Thái',
    `status` varchar(50) NOT NULL COMMENT 'Trạng Thái'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
INSERT INTO `trang_thai` (`order_status`, `status`)
VALUES (1, 'Mới'),
    (2, 'Đang xử lý'),
    (3, 'Đang vận chuyển'),
    (4, 'Hoàn thành'),
    (5, 'Đã hủy');
CREATE TABLE `vai_tro` (
    `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
    `name` varchar(255) NOT NULL COMMENT 'Tên'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
INSERT INTO `vai_tro` (`id`, `name`)
VALUES (1, 'admin'),
    (2, 'client');
ALTER TABLE `chi_tiet_don_hang`
ADD KEY `fk_chi_tiet_don_hang_don_hang` (`order_id`),
    ADD KEY `fk_chi_tiet_don_hang_khach_hang` (`customer_id`),
    ADD KEY `fk_chi_tiet_don_hang_san_pham` (`product_id`);
ALTER TABLE `chi_tiet_gio_hang`
ADD PRIMARY KEY (`id`),
    ADD KEY `cart_id` (`cart_id`);
ALTER TABLE `danh_muc_san_pham`
ADD PRIMARY KEY (`category_id`);
ALTER TABLE `don_hang`
ADD PRIMARY KEY (`order_id`),
    ADD KEY `fk_don_hang_trang_thai` (`order_status`);
ALTER TABLE `gio_hang`
ADD PRIMARY KEY (`cart_id`),
    ADD KEY `customer_id` (`customer_id`);
ALTER TABLE `khach_hang`
ADD PRIMARY KEY (`customer_id`),
    ADD KEY `fk_khach_hang_vai_tro` (`vaitro_id`);
ALTER TABLE `san_pham`
ADD PRIMARY KEY (`product_id`),
    ADD KEY `fk_san_pham_danh_muc_san_pham` (`category_id`);
ALTER TABLE `trang_thai`
ADD PRIMARY KEY (`order_status`);
ALTER TABLE `vai_tro`
ADD PRIMARY KEY (`id`);
ALTER TABLE `chi_tiet_don_hang`
ADD CONSTRAINT `fk_chi_tiet_don_hang_don_hang` FOREIGN KEY (`order_id`) REFERENCES `don_hang` (`order_id`),
    ADD CONSTRAINT `fk_chi_tiet_don_hang_khach_hang` FOREIGN KEY (`customer_id`) REFERENCES `khach_hang` (`customer_id`),
    ADD CONSTRAINT `fk_chi_tiet_don_hang_san_pham` FOREIGN KEY (`product_id`) REFERENCES `san_pham` (`product_id`);
ALTER TABLE `chi_tiet_gio_hang`
ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `gio_hang` (`cart_id`);
ALTER TABLE `don_hang`
ADD CONSTRAINT `fk_don_hang_trang_thai` FOREIGN KEY (`order_status`) REFERENCES `trang_thai` (`order_status`);
ALTER TABLE `gio_hang`
ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `khach_hang` (`customer_id`);
ALTER TABLE `khach_hang`
ADD CONSTRAINT `fk_khach_hang_vai_tro` FOREIGN KEY (`vaitro_id`) REFERENCES `vai_tro` (`id`);
ALTER TABLE `san_pham`
ADD CONSTRAINT `fk_san_pham_danh_muc_san_pham` FOREIGN KEY (`category_id`) REFERENCES `danh_muc_san_pham` (`category_id`);
COMMIT;