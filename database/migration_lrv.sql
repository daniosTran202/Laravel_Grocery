-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2021 lúc 06:49 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `migration_lrv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(300) COLLATE utf8_unicode_ci DEFAULT '#',
  `description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1 là Hiển Thị , 0 là Ẩn ',
  `prioty` tinyint(4) DEFAULT 0,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sumary` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là Hiển Thị , 0 là Ẩn ',
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `prioty` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `prioty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rau nhân tạo', 0, 0, '2021-05-30 14:29:52', '2021-05-30', NULL),
(6, 'Hàng Xuất Khẩu', 1, 0, '2021-05-26 08:28:26', '2021-05-26', NULL),
(7, 'Đồ công nghệ', 0, 0, '2021-06-10 18:24:06', '2021-06-10', '2021-06-10'),
(9, 'Rau  Sạch', 0, 0, '2021-05-18 08:51:38', '2021-05-18', NULL),
(12, 'Quả ngọt', 0, 0, '2021-05-26 16:12:52', '2021-05-26', NULL),
(14, 'Củ Dưa', 0, 0, '2021-05-27 06:01:12', '2021-05-27', NULL),
(17, 'Củ Hành', 1, 0, '2021-05-29 04:22:17', '2021-05-29', NULL),
(18, 'Rau ăn hoa', 0, 0, '2021-05-26 23:00:36', '2021-05-27', NULL),
(19, 'Quả mọng', 0, 0, '2021-05-28 21:18:07', '2021-05-29', NULL),
(20, 'Quả', 0, 0, '2021-05-28 21:18:41', '2021-05-29', NULL),
(21, 'gia vị', 1, 0, '2021-05-29 04:22:27', '2021-05-29', '2021-05-29'),
(22, 'Quả mĩ', 1, 0, '2021-05-30 07:30:48', '2021-05-30', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `rule` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'customer',
  `gender` tinyint(4) DEFAULT 1,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  `lasted_login` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `email`, `password`, `address`, `rule`, `gender`, `created_at`, `updated_at`, `lasted_login`, `remember_token`) VALUES
(1, 'datbe202', '0359765884', 'datt4347@gmail.com', '$2y$10$zuAiPUnjUmJHwNX.AVaG0eQbLuxw68TiVR3pC8DJU5UqjK0jeiBdi', 'Quầy Thuốc Thu Ngân , Đông Xuân , Sóc Sơn, Hà Nội', 'customer', 0, '2021-06-01', '2021-06-01', NULL, 'etDTbao0FLxYAWAbYniD3zqh6VsE4oBaXirMj1XKQr5yGRqvhcb5rtPeZVwK'),
(2, 'Chúa hề', '0987695432', 'bkapc2009i1@gmail.com', '$2y$10$HgQgj95I5thubuoiXqtiguKpYDZr/TF9mDa8SKNozlMRiZ0.j283m', 'ở đâu còn lâu mới nói', 'customer', 1, '2021-06-01', '2021-06-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_17_235510_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `token` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `name`, `phone`, `email`, `address`, `total_price`, `customer_id`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'datbe202', '0359765884', 'datt4347@gmail.com', 'Quầy Thuốc Thu Ngân , Đông Xuân , Sóc Sơn, Hà Nội', NULL, 1, 1, NULL, '2021-06-13', '2021-06-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(11, 25, 4, 4314),
(11, 24, 1, 2340),
(15, 25, 4, 4314),
(15, 24, 1, 2340),
(16, 25, 4, 4314),
(16, 24, 1, 2340),
(17, 6, 1, 1234),
(17, 7, 1, 2455),
(17, 11, 3, 2424),
(18, 25, 2, 4314),
(18, 9, 1, 2344),
(19, 25, 2, 4314),
(19, 9, 1, 2344),
(20, 25, 2, 4314),
(20, 9, 1, 2344),
(21, 25, 2, 4314),
(21, 9, 1, 2344),
(22, 7, 2, 2455),
(22, 3, 3, 3134),
(23, 7, 2, 2455),
(23, 3, 3, 3134),
(24, 7, 2, 2455),
(24, 3, 3, 3134),
(25, 7, 2, 2455),
(25, 3, 3, 3134),
(25, 4, 1, 2124),
(26, 7, 2, 2455),
(26, 3, 3, 3134),
(26, 4, 1, 2124),
(27, 7, 2, 2455),
(27, 3, 3, 3134),
(27, 4, 1, 2124),
(28, 7, 2, 2455),
(28, 3, 3, 3134),
(28, 4, 1, 2124),
(29, 7, 2, 2455),
(29, 3, 3, 3134),
(29, 4, 1, 2124),
(30, 7, 2, 2455),
(30, 3, 3, 3134),
(30, 4, 1, 2124),
(31, 10, 1, 2344),
(32, 24, 1, 2340),
(32, 27, 1, 452),
(33, 27, 1, 452),
(34, 10, 1, 2344),
(35, 11, 1, 2424),
(36, 24, 1, 2340),
(37, 25, 1, 4314),
(38, 9, 1, 2344),
(38, 6, 1, 1234),
(39, 8, 1, 334),
(39, 24, 1, 2340),
(39, 27, 1, 452),
(39, 25, 1, 4314),
(40, 8, 1, 334),
(40, 24, 1, 2340),
(40, 27, 1, 452),
(40, 25, 1, 4314),
(41, 8, 1, 334),
(41, 24, 1, 2340),
(41, 27, 1, 452),
(41, 25, 1, 4314),
(1, 25, 2, 4314),
(1, 27, 1, 452);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(9,3) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sale_price` float(9,3) NOT NULL DEFAULT 0.000,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `image`, `sale_price`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Củ cà rốt', 50000.000, 9, '1622213031-product.jpg', 23456.000, '<span style=\"color: rgb(102, 102, 102); font-family: Dosis, sans-serif;\">Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.</span>', 1, '2021-05-19', '2021-06-06', NULL),
(2, 'hello world', 23452.000, 6, '1622262250-product.jpg', 22524.000, '<span style=\"color: rgb(102, 102, 102); font-family: Dosis, sans-serif;\">Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.</span>', 1, '2021-05-20', '2021-06-06', NULL),
(3, 'Rau xà lách', 3432.000, 9, '1622262275-product.jpg', 3134.000, '<p><span style=\"color: rgb(102, 102, 102); font-family: Dosis, sans-serif;\">Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.</span><br></p>', 1, '2021-05-20', '2021-06-06', NULL),
(4, 'Hoa atiso', 2345.000, 9, '1622736559-product.jpg', 2124.000, '<p><span style=\"color: rgb(102, 102, 102); font-family: Dosis, sans-serif;\">Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.</span><br></p>', 1, '2021-05-21', '2021-06-06', NULL),
(6, 'củ cảii', 23425.000, 18, '1622992559-product.jpg', 1234.000, '<span style=\"color: rgb(102, 102, 102); font-family: Dosis, sans-serif;\">Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.</span>', 1, '2021-05-21', '2021-06-06', NULL),
(7, 'hermes', 3432.000, 9, '1622992594-product.jpg', 2455.000, '<p><span style=\"color: rgb(102, 102, 102); font-family: Dosis, sans-serif;\">Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.</span><br></p>', 1, '2021-05-21', '2021-06-06', NULL),
(8, 'Củ cà rốt', 2345.000, 9, '1622992576-product.jpg', 334.000, '<p><font color=\"#000000\" style=\"background-color: rgb(255, 0, 0);\">ádaaaaaa</font></p>', 1, '2021-05-27', '2021-06-06', NULL),
(9, 'củ cải trắng', 3252.000, 1, '1622992836-product.jpg', 2344.000, '<p>cây nhà lá vườn</p>', 1, '2021-05-27', '2021-06-06', NULL),
(10, 'Nho mĩ', 34234.000, 1, '1622262383-product.jpg', 2344.000, '<p><span style=\"background-color: rgb(239, 239, 239);\"><font color=\"#ff9c00\">nho ngon ngọt</font></span></p>', 1, '2021-05-29', '2021-05-29', NULL),
(11, 'củ cải muối', 3234.000, 1, '1622742429-product.jpg', 2424.000, '<p><span style=\"color: rgb(102, 102, 102); font-family: Dosis, sans-serif;\">Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.</span><br></p>', 1, '2021-06-03', '2021-06-06', NULL),
(12, 'rau chi tiết', 31523.000, 9, '1622794491-product.jpg', 23511.000, '<p>áhkdfddddfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfđ</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(13, 'rau chi tiết ảnh', 31523.000, 9, '1622794800-product.jpg', 23511.000, '<p>áhkdfddddfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfđ</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(14, 'Trần Tiến Đạt', 2452.000, 17, '1622794968-product.jpg', 1334.000, '<p>aaaaaaaaaaaa</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(15, 'Trần Tiến Đạt', 2452.000, 17, '1622795056-product.jpg', 1334.000, '<p>aaaaaaaaaaaa</p>', 0, '2021-06-04', '2021-06-04', '2021-06-04'),
(16, 'Louis Vuiton', 55555.000, 6, '1622795217-product.jpg', 2344.000, '<p>sssss</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(17, 'Louis Vuiton', 55555.000, 6, '1622795241-product.jpg', 2344.000, '<p>sssssâsg</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(18, 'Louis Vuiton', 55555.000, 6, '1622795320-product.jpg', 2344.000, '<p>sssssâsg</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(19, 'Louis Vuiton', 55555.000, 6, '1622795341-product.jpg', 2344.000, '<p>sssssâsg</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(20, 'Louis Vuiton', 55555.000, 6, '1622795373-product.jpg', 2344.000, '<p>sssssâsg</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(21, 'Louis Vuiton', 55555.000, 6, '1622795395-product.jpg', 2344.000, '<p>sssssâsg</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(22, 'Louis Vuiton', 55555.000, 6, '1622795469-product.jpg', 2344.000, '<p>sssssâsg</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(23, 'Louis Vuiton', 55555.000, 6, '1622795538-product.jpg', 2344.000, '<p>sssssâsg</p>', 0, '2021-06-04', '2021-06-06', '2021-06-06'),
(24, 'củ hành tím', 2345.000, 6, '1622953594-product.jpg', 2340.000, '<p><span style=\"color: rgb(102, 102, 102); font-family: Dosis, sans-serif;\">Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.</span><br></p>', 1, '2021-06-06', '2021-06-06', NULL),
(25, 'dưa chuột', 4561.000, 14, '1622953798-product.jpg', 4314.000, '<p><span style=\"color: rgb(102, 102, 102); font-family: Dosis, sans-serif;\">Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at, tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu.</span><br></p>', 1, '2021-06-06', '2021-06-06', NULL),
(26, 'c2009i1', 2435.000, 14, '1623047799-product.jpg', 2244.000, '<p>ágababafbafg</p>', 1, '2021-06-07', '2021-06-10', '2021-06-10'),
(27, 'Louis Vuiton', 2352.000, 6, '1623048181-product.jpg', 452.000, '<p>aaaaaaaaaaaa</p>', 1, '2021-06-07', '2021-06-07', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `name`, `image`, `status`, `product_id`, `created_at`, `updated_at`) VALUES
(4, '1622953798-product.jpg', '1622953798-product.jpg', 1, 25, '2021-06-05 21:29:58', '2021-06-06'),
(5, '1622953798-product.jpg', '1622953798-product.jpg', 1, 25, '2021-06-05 21:29:58', '2021-06-06'),
(6, '1622953798-product.jpg', '1622953798-product.jpg', 1, 25, '2021-06-05 21:29:58', '2021-06-06'),
(13, '16230521720-product.jpg', '16230521720-product.jpg', 1, 26, '2021-06-07 00:49:32', '2021-06-07'),
(14, '16230521721-product.jpg', '16230521721-product.jpg', 1, 26, '2021-06-07 00:49:32', '2021-06-07'),
(15, '16230521722-product.jpg', '16230521722-product.jpg', 1, 26, '2021-06-07 00:49:32', '2021-06-07'),
(16, '16230521960-product.jpg', '16230521960-product.jpg', 1, 27, '2021-06-07 00:49:56', '2021-06-07'),
(17, '16230521961-product.jpg', '16230521961-product.jpg', 1, 27, '2021-06-07 00:49:56', '2021-06-07'),
(18, '16230521962-product.jpg', '16230521962-product.jpg', 1, 27, '2021-06-07 00:49:56', '2021-06-07'),
(19, '16230525080-product.jpg', '16230525080-product.jpg', 1, 1, '2021-06-07 00:55:08', '2021-06-07'),
(20, '16230525081-product.jpg', '16230525081-product.jpg', 1, 1, '2021-06-07 00:55:08', '2021-06-07'),
(21, '16230525082-product.jpg', '16230525082-product.jpg', 1, 1, '2021-06-07 00:55:08', '2021-06-07'),
(22, '16233494820-product.jpg', '16233494820-product.jpg', 1, 9, '2021-06-10 11:24:42', '2021-06-10'),
(23, '16233494821-product.jpg', '16233494821-product.jpg', 1, 9, '2021-06-10 11:24:42', '2021-06-10'),
(24, '16233494822-product.jpg', '16233494822-product.jpg', 1, 9, '2021-06-10 11:24:42', '2021-06-10'),
(25, '16233495070-product.jpg', '16233495070-product.jpg', 1, 7, '2021-06-10 11:25:07', '2021-06-10'),
(26, '16233495071-product.jpg', '16233495071-product.jpg', 1, 7, '2021-06-10 11:25:07', '2021-06-10'),
(27, '16233495072-product.jpg', '16233495072-product.jpg', 1, 7, '2021-06-10 11:25:07', '2021-06-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lasted_login` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `lasted_login`) VALUES
(1, 'Anonymous', 'demo@gmail.com', '$2y$10$s.StKmMfAHZB3uNd.D4uLOam4yaAJGDSM08jH7IZXsw5ht8LXinja', 'Hp8mJmbU4vtnm4ItSMvNgYqoxqXDu6QUoO8PEPvqiKNYoSEVMOqwcoZqh8El', '2021-05-30 00:08:35', '2021-05-30 00:08:35', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer` (`customer_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `fk_order_detail` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat` (`category_id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_order_detail` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
