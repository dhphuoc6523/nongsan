-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: db
-- Thời gian đã tạo: Th3 12, 2026 lúc 08:19 AM
-- Phiên bản máy phục vụ: 8.4.7
-- Phiên bản PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nongsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Rau củ', NULL, '2026-03-11 03:46:15', '2026-03-11 03:46:15'),
(2, 'Sản phẩm OCOP', NULL, '2026-03-11 03:46:24', '2026-03-11 03:46:24'),
(3, 'Bổ dưỡng', NULL, '2026-03-11 03:46:31', '2026-03-11 03:46:31'),
(4, 'Trái cây', NULL, '2026-03-11 03:46:59', '2026-03-11 03:46:59'),
(5, 'Quà tặng', NULL, '2026-03-12 08:10:04', '2026-03-12 08:10:04'),
(6, 'Mật ong', NULL, '2026-03-12 08:16:24', '2026-03-12 08:16:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_04_021958_create_categories_table', 1),
(5, '2026_03_04_022312_create_products_table', 1),
(6, '2026_03_05_025908_create_orders_table', 1),
(7, '2026_03_05_030029_create_order_items_table', 1),
(8, '2026_03_05_082648_add_role_to_users_table', 1),
(9, '2026_03_10_011644_add_user_id_to_orders_table', 1),
(10, '2026_03_10_030904_add_status_to_users_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ xử lý',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `phone`, `address`, `total`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 'Phuoc', '33555555', 'tra vinh', 140000.00, 'Chờ xử lý', '2026-03-12 07:53:52', '2026-03-12 07:53:52'),
(5, 1, 'Phuoc', '33555555', 'tra vinh', 140000.00, 'Chờ xử lý', '2026-03-12 07:53:52', '2026-03-12 07:53:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(4, 4, 22, 1, 140000.00, '2026-03-12 07:53:52', '2026-03-12 07:53:52'),
(5, 5, 22, 1, 140000.00, '2026-03-12 07:53:52', '2026-03-12 07:53:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `image`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Cà rốt', 20000.00, 30, 'products/jIsOwygiScWSJ9hVBzroAPTVEOqwdLANVuJdxino.jpg', NULL, 1, '2026-03-11 03:51:56', '2026-03-12 07:03:17'),
(2, 'OCOP - Táo Sấy Dẻo Tách Hạt Thái Thuận - Túi 418g', 45000.00, 43, 'products/IjPwBpr0SvhDZVyW5PUBXjs2xmGrys95uX9IdWmQ.png', NULL, 2, '2026-03-12 01:01:22', '2026-03-12 07:40:56'),
(3, 'OCOP - Mắm Tép Chưng Thịt PTK - Gói 200g', 54000.00, 40, 'products/jwOQrppwpOKh1lBx8GQuN63FlbQbc1DePitvpSvk.png', NULL, 2, '2026-03-12 01:01:59', '2026-03-12 07:41:14'),
(4, 'OCOP - Chẩm Chéo Lực Lệ - Hộp 250g', 35000.00, 21, 'products/1OeJs6b2jTyxaBixqms8qRTdEteZZtF1HE2QSilx.jpg', NULL, 2, '2026-03-12 01:02:32', '2026-03-12 07:41:23'),
(5, 'OCOP - Miến Gia Huy Ngọc Cường - Túi 500g', 65000.00, 43, 'products/4UF55CPTac2MtgNBCxzat0tB52ZkixNdN0gWDUOd.jpg', NULL, 2, '2026-03-12 01:03:01', '2026-03-12 07:41:31'),
(6, 'OCOP - Tinh Bột Nghệ Hoàng Minh Châu HMC0004 - Túi 500gr', 60000.00, 20, 'products/PJ0FFQnvZinPJTOUkenkZXZE7jB9oXnfnCq9JSYF.webp', NULL, 2, '2026-03-12 01:03:56', '2026-03-12 07:41:53'),
(7, 'OCOP - Pía đậu xanh sầu riêng Tân Huê Viên số 1', 50000.00, 35, 'products/FAuB52bNE0whzzjvYXwmVZxSxBrXcgFiXCElcwVy.webp', NULL, 2, '2026-03-12 01:04:37', '2026-03-12 07:42:02'),
(8, 'OCOP - Nano Curcumin Hoàng Minh Châu HMC0007 - Hộp 2 Lọ (60 Viên/Lọ)', 120000.00, 20, 'products/UKfNJ0vAq576g7jLD2FG0YECFnFAq4PRWQMQtxoG.jpg', NULL, 2, '2026-03-12 01:05:02', '2026-03-12 07:42:21'),
(9, 'OCOP - Tinh Bột Nghệ Turmeric Hoàng Minh Châu HMC0003 - Lon 400gr', 35000.00, 21, 'products/1wmy5philokilGgSGoNsCkorjIuJj5kty0uNRiMw.jpg', NULL, 2, '2026-03-12 01:05:54', '2026-03-12 07:42:12'),
(10, 'Bắp cải', 15000.00, 15, 'products/kkvtR162gytPqlrsjnywuGQtniV2Sd571YUYMUMw.jpg', NULL, 1, '2026-03-12 01:10:43', '2026-03-12 07:43:26'),
(11, 'Bí cô tiên', 25000.00, 14, 'products/LQ80U4yXYzUpOjvTw7LCFCJOwRF8fgw4owo1vax8.jpg', NULL, 1, '2026-03-12 01:12:42', '2026-03-12 07:43:17'),
(12, 'Bí đỏ', 31000.00, 20, 'products/2sdVFFTWXok2Q1HAen1K7VtaPVVBU9nKwsLZ98GS.jpg', NULL, 1, '2026-03-12 01:13:01', '2026-03-12 07:43:44'),
(13, 'Bí ngồi xanh', 18000.00, 40, 'products/GFGAxGDJE1Rm9mytLVQQuZjPWZ5dq3JQIUeeljP5.jpg', NULL, 1, '2026-03-12 01:13:19', '2026-03-12 07:43:50'),
(14, 'Cà pháo', 12000.00, 35, 'products/F7XOvVfWUgGNCmI7o6vqIagzX7Wcs14wY3IOv45B.png', NULL, 1, '2026-03-12 01:13:39', '2026-03-12 07:43:56'),
(15, 'Cà tím tròn', 23000.00, 46, 'products/t9lQj42c55Zrdmr1cJO7VMqPsQZghIvxc607f2L4.jpg', NULL, 1, '2026-03-12 01:13:58', '2026-03-12 07:44:02'),
(16, 'Cà chua bi', 16000.00, 45, 'products/CxPmHxViuajPdSes3UGPyXAFBAP2qQKrot8DIZOh.png', NULL, 1, '2026-03-12 01:14:20', '2026-03-12 07:05:20'),
(17, 'Hà Thủ Ô Đỏ', 130000.00, 10, 'products/HaJ7YxpamWp2xrLxyWtsW40Vt1ONJZeprC8RudGX.jpg', NULL, 3, '2026-03-12 01:17:29', '2026-03-12 07:44:29'),
(18, 'Hà thủ ô trắng', 160000.00, 10, 'products/97NJw2hVTzS0VJ0e6WfznTyTD3gjm3O9NQNc1ZqX.jpg', NULL, 3, '2026-03-12 01:18:16', '2026-03-12 07:44:37'),
(19, 'Hoa Atiso Xanh Khô Sapa', 145000.00, 15, 'products/GNCoK0QswwBhCTLWq1QcDnabRvGKbEhIE9sJ16QM.jpg', NULL, 3, '2026-03-12 01:18:44', '2026-03-12 07:44:43'),
(20, 'Lá Dâm Dương Hoắc', 185000.00, 15, 'products/5btZ9nEhi5McZqOyLDXeSaGZRdoOW4iGzgnjprAF.jpg', NULL, 3, '2026-03-12 01:19:13', '2026-03-12 07:44:49'),
(21, 'Lá Xạ Đen', 180000.00, 12, 'products/nQG2iuIg9zfqjAM7aJbD6rCdBVAOxDS7taIkDFvP.jpg', NULL, 3, '2026-03-12 01:19:42', '2026-03-12 07:44:57'),
(22, 'Mật ong Bạc Hà', 140000.00, 16, 'products/jtSCkKRiRkEAJ1NapiMwqw7a9gsvZ7yAvCH3ORSu.jpg', NULL, 6, '2026-03-12 01:20:17', '2026-03-12 08:16:34'),
(23, 'Thanh Long tím ruột đỏ Globalgap', 65000.00, 15, 'products/kaqsDoVIl7b4nEjy99aupeAOTNverayLdMKtGbYc.jpg', NULL, 4, '2026-03-12 08:05:35', '2026-03-12 08:05:35'),
(24, 'Dứa mật MD2 Globalgap 1kg', 65000.00, 10, 'products/KE702H42T7LWKRK4cMW0sJt8iynVnEZ6xCJJyhDP.png', NULL, 4, '2026-03-12 08:06:58', '2026-03-12 08:06:58'),
(25, 'Nhãn Bắp Cải Vũng Tàu (Thanh Nhãn) 1kg', 85000.00, 40, 'products/52eGNpwKIri9XfKuoOwZCfN4A7K37AMnPgsg9diC.png', NULL, 4, '2026-03-12 08:07:21', '2026-03-12 08:07:21'),
(26, 'Dưa Lê Sữa - 1kg', 65000.00, 13, 'products/sItq3wKxBayihRIonJxjSq6yWzW7AwhXQA3LGdsd.png', NULL, 4, '2026-03-12 08:07:37', '2026-03-12 08:07:37'),
(27, 'Dưa hấu tròn Hắc Tiểu Long Tết 2026 - trái 5kg', 250000.00, 18, 'products/4HN3p0CcFVwQUNEJoBkkEhPluo66Hz8WDC6BcZDr.png', NULL, 4, '2026-03-12 08:07:55', '2026-03-12 08:07:55'),
(28, 'Quýt đường canh (cam canh)', 119000.00, 20, 'products/TO5qOwWGpjMYScpHljlmIW4AwSBLDV8CXaXgvoiU.jpg', NULL, 4, '2026-03-12 08:08:13', '2026-03-12 08:08:13'),
(29, 'Chuối Laba Loại 1 Org 1kg', 45000.00, 16, 'products/irZS2IL1q09CyDTBJ7EJoE2IKSwjcxrvKZgSQPyu.jpg', NULL, 4, '2026-03-12 08:08:31', '2026-03-12 08:08:31'),
(30, 'Chôm chôm Thái', 55000.00, 19, 'products/G3Ep2UI6qsJB77afajCkhULAMfRQrr8Dgk2BrX4K.png', NULL, 4, '2026-03-12 08:08:48', '2026-03-12 08:08:48'),
(31, 'Củ sen kẹp thơm 100g (Hộp giấy)', 115000.00, 5, 'products/3yTwbIwtu8FD9eAwhbtbgnY2ebp4NR0YIT4x6e5d.png', NULL, 5, '2026-03-12 08:11:47', '2026-03-12 08:11:47'),
(32, 'Set quà Tết 2026 - Future Bliss R.02', 350000.00, 10, 'products/CdIPSUZGky3UliKgtvDi5VbvohkcFx34KglGEDH3.jpg', NULL, 5, '2026-03-12 08:12:15', '2026-03-12 08:12:15'),
(33, 'Set quà Tết 2026 - Harmony Bloom R.02', 350000.00, 5, 'products/UGTUDR6AEWe431FgNxA87Rc3aRH8nYgYh6MI6m4x.jpg', NULL, 5, '2026-03-12 08:12:34', '2026-03-12 08:12:34'),
(34, 'Set quà Tết 2026 - Harmony Bloom R.03', 350000.00, 8, 'products/mzLEnBeDDwgNuUoVjpA0e8gQYMeBw99OtR6iidhE.jpg', NULL, 5, '2026-03-12 08:12:54', '2026-03-12 08:12:54'),
(35, 'NGHỆ ĐỎ NGÂM MẬT ONG NGUYÊN CHẤT 500ML', 210000.00, 10, 'products/OZC1aePCQ7Iz36eppwC5VmzftHB4Ai9VW5XyfM5Y.jpg', NULL, 6, '2026-03-12 08:18:34', '2026-03-12 08:18:34'),
(36, 'Mật ong hoa cà phê Gia Lai – Chai 1 Lít', 180000.00, 10, 'products/WLZntiexylHQykR6nnRdKko2Z7LZtPsrG7r8Wy90.jpg', NULL, 6, '2026-03-12 08:18:52', '2026-03-12 08:18:52'),
(37, 'CHANH ĐÀO NGÂM MẬT ONG NGUYÊN CHẤT 500ML', 210000.00, 20, 'products/8hmtMg3055fPu66ho4SA9AhT6AcM2uUKrVyoWzk9.jpg', NULL, 6, '2026-03-12 08:19:10', '2026-03-12 08:19:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `status`) VALUES
(1, 'admin', 'admin@nongsan.com', NULL, '$2y$12$HucdahgQlh9pkmStIeZcz.R51iwix5bdtRdLiNCtoTS98O/TLWv/u', NULL, '2026-03-11 03:44:39', '2026-03-11 03:44:39', 'admin', 'active'),
(2, 'test', 'test@nongsan.com', NULL, '$2y$12$U1.cnRsdSE04Yl8t/BKo5.UaMjXH38pc.0jbK/Dvutu4Hz7Iyd4XO', NULL, '2026-03-12 00:57:40', '2026-03-12 00:58:24', 'user', 'active');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ràng buộc đối với các bảng kết xuất
--

--
-- Ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
