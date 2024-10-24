-- Tạo cơ sở dữ liệu và sử dụng nó
CREATE DATABASE qlbs;
USE qlbs;
-- Tạo bảng `danh_muc_san_pham`
CREATE TABLE `danh_muc_san_pham` (
    `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã danh mục sản phẩm',
    `category_name` varchar(255) NOT NULL COMMENT 'Tên danh mục sản phẩm',
    `category_description` text NOT NULL COMMENT 'Mô tả danh mục sản phẩm',
    PRIMARY KEY (`category_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- Tạo bảng `khach_hang`
CREATE TABLE `khach_hang` (
    `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng',
    `customer_name` varchar(255) NOT NULL COMMENT 'Tên khách hàng',
    `customer_address` varchar(255) NOT NULL COMMENT 'Địa chỉ khách hàng',
    `customer_email` varchar(255) NOT NULL COMMENT 'Email khách hàng',
    `customer_phone` varchar(20) NOT NULL COMMENT 'Số điện thoại khách hàng',
    `username` varchar(50) NOT NULL COMMENT 'Tên đăng nhập của khách hàng',
    `password` varchar(255) NOT NULL COMMENT 'Mật khẩu của khách hàng',
<<<<<<< HEAD
    `vaitro_id` int(10) UNSIGNED NOT NULL COMMENT 'Vai trò của người dùng',
    PRIMARY KEY (`customer_id`)
=======
    `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
    PRIMARY KEY (`customer_id`),
    CONSTRAINT `fk_khach_hang_vai_tro` FOREIGN KEY (`id`) REFERENCES `vai_tro` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- Tạo bảng `trang_thai`
CREATE TABLE `trang_thai` (
    `order_status` int(10) UNSIGNED NOT NULL COMMENT 'Mã Trạng Thái',
    `status` varchar(50) NOT NULL COMMENT 'Trạng Thái',
    PRIMARY KEY (`order_status`)
>>>>>>> a7fcd56e236a36ec7d5174fa45aaf0fe29b59c3f
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- Tạo bảng `san_pham`
CREATE TABLE `san_pham` (
    `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
    `product_name` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
    `product_description` text NOT NULL COMMENT 'Mô tả sản phẩm',
    `product_image` varchar(255) NOT NULL COMMENT 'Đường dẫn tới hình ảnh sản phẩm',
    `price` decimal(10, 0) NOT NULL COMMENT 'Giá sản phẩm',
    `stock_quantity` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Số lượng tồn kho',
    `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã danh mục sản phẩm',
    PRIMARY KEY (`product_id`),
    CONSTRAINT `fk_san_pham_danh_muc` FOREIGN KEY (`category_id`) REFERENCES `danh_muc_san_pham` (`category_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- Tạo bảng `don_hang`
CREATE TABLE `don_hang` (
    `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng',
    `customer_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã khách hàng',
    `total_amount` decimal(10, 0) NOT NULL COMMENT 'Tổng giá trị đơn hàng',
    `order_date` int(50) NOT NULL COMMENT 'Ngày đặt hàng',
    `order_status` int(10) UNSIGNED NOT NULL COMMENT 'Trạng thái đơn hàng',
    PRIMARY KEY (`order_id`),
    CONSTRAINT `fk_don_hang_khach_hang` FOREIGN KEY (`customer_id`) REFERENCES `khach_hang` (`customer_id`),
    CONSTRAINT `fk_don_hang_trang_thai` FOREIGN KEY (`order_status`) REFERENCES `trang_thai` (`order_status`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- Tạo bảng `chi_tiet_don_hang`
CREATE TABLE `chi_tiet_don_hang` (
    `order_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
    `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
    `product_name` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
    `price` decimal(10, 0) NOT NULL COMMENT 'Giá sản phẩm',
    `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Số lượng sản phẩm',
    `total_amount` decimal(10, 0) NOT NULL COMMENT 'Tổng giá trị',
    `customer_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã khách hàng',
    PRIMARY KEY (`order_id`, `product_id`),
    CONSTRAINT `fk_chi_tiet_don_hang_don_hang` FOREIGN KEY (`order_id`) REFERENCES `don_hang` (`order_id`),
    CONSTRAINT `fk_chi_tiet_don_hang_san_pham` FOREIGN KEY (`product_id`) REFERENCES `san_pham` (`product_id`),
    CONSTRAINT `fk_chi_tiet_don_hang_khach_hang` FOREIGN KEY (`customer_id`) REFERENCES `khach_hang` (`customer_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- Tạo bảng `vai_tro`
CREATE TABLE `vai_tro` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
    `name` varchar(255) NOT NULL COMMENT 'Tên',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- Dữ liệu mẫu cho bảng `vai_tro`
INSERT INTO `vai_tro` (`id`, `name`)
VALUES (1, 'admin'),
    (2, 'client');
<<<<<<< HEAD

-- Tạo Foreign Key cho bảng chi_tiet_don_hang
ALTER TABLE `chi_tiet_don_hang`
ADD CONSTRAINT `fk_chi_tiet_don_hang_don_hang`
FOREIGN KEY (`order_id`) REFERENCES `don_hang` (`order_id`);

ALTER TABLE `chi_tiet_don_hang`
ADD CONSTRAINT `fk_chi_tiet_don_hang_khach_hang`
FOREIGN KEY (`customer_id`) REFERENCES `khach_hang` (`customer_id`);

ALTER TABLE `chi_tiet_don_hang`
ADD CONSTRAINT `fk_chi_tiet_don_hang_san_pham`
FOREIGN KEY (`product_id`) REFERENCES `san_pham` (`product_id`);

-- Tạo Foreign Key cho bảng san_pham
ALTER TABLE `san_pham`
ADD CONSTRAINT `fk_san_pham_danh_muc_san_pham`
FOREIGN KEY (`category_id`) REFERENCES `danh_muc_san_pham` (`category_id`);

-- Tạo Foreign Key cho bảng don_hang
ALTER TABLE `don_hang`
ADD CONSTRAINT `fk_don_hang_trang_thai`
FOREIGN KEY (`order_status`) REFERENCES `trang_thai` (`order_status`);

-- Tạo Foreign Key cho bảng khach_hang
ALTER TABLE `khach_hang`
ADD CONSTRAINT `fk_khach_hang_vai_tro`
FOREIGN KEY (`vaitro_id`) REFERENCES `vai_tro` (`id`);
=======
-- Dữ liệu mẫu cho bảng `trang_thai`
INSERT INTO `trang_thai` (`order_status`, `status`)
VALUES (1, 'Mới'),
    (2, 'Đang xử lý'),
    (3, 'Đang vận chuyển'),
    (4, 'Hoàn thành'),
    (5, 'Đã hủy');
>>>>>>> a7fcd56e236a36ec7d5174fa45aaf0fe29b59c3f
