-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2023 lúc 02:39 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(40, 'Điện thoại', 'PC gaming', '2023-12-06 03:34:51', '2023-12-06 03:34:51'),
(41, 'Máy quạt', 'Máy quạt', '2023-12-06 03:35:00', '2023-12-06 03:35:00'),
(42, 'Tủ lạnh', 'Tủ lạnh', '2023-12-06 03:35:11', '2023-12-06 03:35:11'),
(43, 'Máy giặt', 'Máy giặt', '2023-12-06 03:35:27', '2023-12-06 03:35:27'),
(44, 'Máy tính bảng', 'Máy tính bảng', '2023-12-06 03:35:44', '2023-12-06 03:35:44'),
(45, 'Camera', 'Camera', '2023-12-06 03:35:58', '2023-12-06 03:35:58'),
(46, 'Đồng hồ', 'Đồng hồ', '2023-12-06 03:36:41', '2023-12-06 03:36:41'),
(47, 'Ti vi( cảm ứng)', 'Ti vi( cảm ứng)', '2023-12-06 03:36:50', '2023-12-06 03:36:50'),
(48, 'Sạc sự phòng', 'Sạc sự phòng', '2023-12-06 03:37:01', '2023-12-06 03:37:01'),
(49, 'Laptop', 'Laptop', '2023-12-06 03:37:13', '2023-12-06 03:37:13'),
(50, 'PC gaming', 'PC gaming', '2023-12-22 07:24:58', '2023-12-22 07:24:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `tocalprice` varchar(255) DEFAULT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ispaid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(2048) DEFAULT NULL,
  `view` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `categories`, `description`, `price`, `image`, `view`, `quantity`, `created_at`) VALUES
(99, 'Tủ lạnh', 'Tủ lạnh', 'Tủ lạnh', 560, '/storage/fridge1.png', 3, 0, '2023-12-06 03:22:40'),
(100, 'Quạt nước', 'Quạt nước', 'Quạt nước', 200, '/storage/pr2.png', 5, 0, '2023-12-06 03:23:07'),
(101, 'Máy giặt', 'Máy giặt', 'Máy giặt', 310, '/storage/pr1.png', 10, 0, '2023-12-06 03:23:43'),
(102, 'Ipad (máy tính bảng)', 'Ipad (máy tính bảng)', 'Ipad (máy tính bảng)', 159, '/storage/t1.png', 10, 0, '2023-12-06 03:24:11'),
(103, 'Iphone 13', 'Iphone 13', 'Iphone 13', 120, '/storage/iphone 13 pro.png', 99, 0, '2023-12-06 03:24:51'),
(104, 'Iphone X', 'Iphone X', 'Iphone X', 99, '/storage/phone1.png', 15, 0, '2023-12-06 03:25:19'),
(106, 'Camera', 'Camera', 'Camera', 350, '/storage/dslr camera.png', 2, 0, '2023-12-06 03:27:45'),
(107, 'Đồng hồ', 'Đồng hồ', 'Đồng hồ', 130, '/storage/pr9.png', 1, 0, '2023-12-06 03:29:30'),
(109, 'Ti vi( cảm ứng)', 'Ti vi( cảm ứng)', 'Ti vi( cảm ứng)', 320, '/storage/pr8.png', 7, 0, '2023-12-06 03:31:12'),
(110, 'Laptop', 'Laptop', 'Laptop', 299, '/storage/laptop2.png', 10, 0, '2023-12-06 03:32:56'),
(111, 'Sạc sự phòng', 'Sạc sự phòng', 'Sạc sự phòng', 50, '/storage/pr10.png', 0, 0, '2023-12-06 03:33:44'),
(115, 'PC gaming', 'PC gaming', 'PC gaming', 399, '/storage/pr7.png', 99, 0, '2023-12-22 07:24:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(42, 'Thang', 'admin@gmail.com', '123456', '2023-12-21 03:08:40'),
(44, 'Ngô Ngọc Thắng', 'abcd@gmail.com', '123456', '2023-12-22 07:25:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`phone`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`,`products_id`,`orders_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
