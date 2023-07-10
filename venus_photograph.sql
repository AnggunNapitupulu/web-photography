-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 03:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venus_photograph`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cameras`
--

CREATE TABLE `cameras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `camera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_camera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cameras`
--

INSERT INTO `cameras` (`id`, `camera`, `slug_camera`, `photo`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'NIKON D810', 'lMpoDibrEmY', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1506770797561-3b22048d1a13', 1765797, 'new camera old lens', '2022-05-17 04:54:31', '2022-05-17 04:54:31'),
(2, 'ILCE-6300', 'VEbUF1BnGkA', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1581591546349-f29007542ed4', 222276, 'Sony Alpha A7III Mirrorless ILCE-7M3K\nSony SEL85F18 FE 85mm f/1.8\nTamron 28-75mm f/2.8 Di III RXD E mount', '2022-05-17 04:54:31', '2022-05-17 04:54:31'),
(3, 'Canon EOS 5D Mark III', 'AdMHAf_cdns', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1478145971721-10511ecaf005', 697875, 'Food Photographer', '2022-05-17 04:54:31', '2022-05-17 04:54:31'),
(4, NULL, 'G69CWIw1SEU', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1563404203912-0b424db17de6', 1949655, 'Camera in front of Light panel.', '2022-05-17 04:54:31', '2022-05-17 04:54:31'),
(5, 'Canon EOS 5D Mark III', 'FKyHyNowp-4', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1480365501497-199581be0e66', 611293, 'Nikon In The Cold', '2022-05-17 04:54:31', '2022-05-17 04:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `cat_galleries`
--

CREATE TABLE `cat_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cat_galleries`
--

INSERT INTO `cat_galleries` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Prewedding', '2022-05-17 04:54:22', '2022-05-17 04:54:22'),
(2, 'Products', '2022-05-17 04:54:22', '2022-05-17 04:54:22'),
(3, 'Sport', '2022-05-17 04:54:22', '2022-05-17 04:54:22'),
(4, 'Fashion', '2022-05-17 04:54:22', '2022-05-17 04:54:22'),
(5, 'Stage', '2022-05-17 04:54:22', '2022-05-17 04:54:22'),
(6, 'Beauty', '2022-05-17 04:54:22', '2022-05-17 04:54:22'),
(7, 'Trip', '2022-05-17 04:54:22', '2022-05-17 04:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribble` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `bio`, `photo`, `instagram`, `linkedin`, `twitter`, `facebook`, `dribble`, `pinterest`, `created_at`, `updated_at`) VALUES
(1, 'Kip Paucek', 'laurence64@example.org', '1-952-935-9736', 'Molestiae aut enim modi sit rerum et. Molestiae ipsam ut minus eum doloribus id. Illum quis eaque perspiciatis quia. Ad voluptatibus doloremque numquam possimus.', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1604822064782-86b012c1a8f7', 'https://www.instagram.com/kip', 'https://www.linkedin.com/in/anggun-prihatini-napitupulu-584b95223/kip', 'https://www.twitter.com/kip', 'https://www.facebook.com/kip', 'https://www.dribbble.com/kip', 'https://www.pinterest.com/kip', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(2, 'Sonya Gleichner', 'hmcclure@example.org', '+1.590.586.4577', 'Ducimus eum repudiandae non architecto expedita ut. Et autem itaque unde ad natus. Et fuga aut qui dolores placeat.', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1570579911191-50a4d029b108', 'https://www.instagram.com/sonya', 'https://www.linkedin.com/in/anggun-prihatini-napitupulu-584b95223/sonya', 'https://www.twitter.com/sonya', 'https://www.facebook.com/sonya', 'https://www.dribbble.com/sonya', 'https://www.pinterest.com/sonya', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(3, 'Shanel Schmeler Sr.', 'ceasar.monahan@example.com', '585.864.2807 x472', 'Ea amet dolore laborum eum. Deleniti quis cumque laboriosam explicabo similique ut voluptas quisquam.', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1603377957398-243861baef56', 'https://www.instagram.com/shanel', 'https://www.linkedin.com/in/anggun-prihatini-napitupulu-584b95223/shanel', 'https://www.twitter.com/shanel', 'https://www.facebook.com/shanel', 'https://www.dribbble.com/shanel', 'https://www.pinterest.com/shanel', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(4, 'Ian Kemmer', 'meredith91@example.org', '(871) 794-4693', 'Omnis ducimus est et. Pariatur repudiandae odio debitis quisquam qui ratione et maxime. Quibusdam at dolorum quisquam voluptatem. Dolorum eos illum ut aut et quo.', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1595860320513-01df382ebdb1', 'https://www.instagram.com/ian', 'https://www.linkedin.com/in/anggun-prihatini-napitupulu-584b95223/ian', 'https://www.twitter.com/ian', 'https://www.facebook.com/ian', 'https://www.dribbble.com/ian', 'https://www.pinterest.com/ian', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(5, 'Marta Rohan III', 'nova67@example.net', '1-604-818-3666', 'Vitae alias et minima voluptate et voluptate quia. Iusto maxime eos similique voluptatem numquam. Ducimus maxime quo sunt dolorem. Amet sint sapiente facilis et aspernatur dolores dicta.', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1568602471122-7832951cc4c5', 'https://www.instagram.com/marta', 'https://www.linkedin.com/in/anggun-prihatini-napitupulu-584b95223/marta', 'https://www.twitter.com/marta', 'https://www.facebook.com/marta', 'https://www.dribbble.com/marta', 'https://www.pinterest.com/marta', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(6, 'Tracey White', 'adrienne10@example.com', '687.422.8483', 'Eos culpa nulla omnis et ad asperiores optio. Alias quo et in deleniti doloremque odio.', 'https://s3.us-west-2.amazonaws.com/images.unsplash.com/small/photo-1597204081767-4c14a6b7cbec', 'https://www.instagram.com/tracey', 'https://www.linkedin.com/in/anggun-prihatini-napitupulu-584b95223/tracey', 'https://www.twitter.com/tracey', 'https://www.facebook.com/tracey', 'https://www.dribbble.com/tracey', 'https://www.pinterest.com/tracey', '2022-05-17 04:54:36', '2022-05-17 04:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_gallery_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `cat_gallery_id`, `title`, `path_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Prewedding 01', '1652792506.jpg', '2022-05-17 06:01:46', '2022-05-17 06:01:46'),
(2, 1, 'Prewedding 02', '1652792528.jpg', '2022-05-17 06:02:08', '2022-05-17 06:02:08'),
(3, 1, 'Prewedding 03', '1652792536.jpg', '2022-05-17 06:02:16', '2022-05-17 06:02:16'),
(4, 1, 'Prewedding 04', '1652792568.jpg', '2022-05-17 06:02:48', '2022-05-17 06:02:48'),
(5, 1, 'Prewedding 05', '1652792574.jpg', '2022-05-17 06:02:54', '2022-05-17 06:02:54'),
(6, 1, 'Prewedding 06', '1652792588.jpg', '2022-05-17 06:03:08', '2022-05-17 06:03:08'),
(7, 1, 'Prewedding 07', '1652792595.jpg', '2022-05-17 06:03:15', '2022-05-17 06:03:15'),
(8, 1, 'Prewedding 08', '1652792618.jpg', '2022-05-17 06:03:38', '2022-05-17 06:03:38'),
(9, 2, 'Product 01', '1652792668.jpg', '2022-05-17 06:04:28', '2022-05-17 06:04:28'),
(10, 2, 'Product 02', '1652792674.jpg', '2022-05-17 06:04:34', '2022-05-17 06:04:34'),
(11, 2, 'Product 03', '1652792679.jpg', '2022-05-17 06:04:39', '2022-05-17 06:04:39'),
(12, 2, 'Product 04', '1652792686.jpg', '2022-05-17 06:04:46', '2022-05-17 06:04:46'),
(13, 2, 'Product 05', '1652792692.jpg', '2022-05-17 06:04:52', '2022-05-17 06:04:52'),
(14, 2, 'Product 06', '1652792698.jpg', '2022-05-17 06:04:58', '2022-05-17 06:04:58'),
(16, 2, 'Product 07', '1652793346.jpg', '2022-05-17 06:15:46', '2022-05-17 06:15:46'),
(17, 3, 'Sport 01', '1652793866.jpg', '2022-05-17 06:24:26', '2022-05-17 06:24:26'),
(18, 3, 'Sport 02', '1652793873.jpg', '2022-05-17 06:24:33', '2022-05-17 06:24:33'),
(19, 3, 'Sport 03', '1652793879.jpg', '2022-05-17 06:24:39', '2022-05-17 06:24:39'),
(20, 3, 'Sport 04', '1652793890.jpg', '2022-05-17 06:24:50', '2022-05-17 06:24:50'),
(21, 3, 'Sport 05', '1652793896.jpg', '2022-05-17 06:24:56', '2022-05-17 06:24:56'),
(22, 3, 'Sport 06', '1652793902.jpg', '2022-05-17 06:25:02', '2022-05-17 06:25:02'),
(23, 3, 'Sport 07', '1652793908.jpg', '2022-05-17 06:25:08', '2022-05-17 06:25:08'),
(24, 5, 'Stage 01', '1652793932.jpg', '2022-05-17 06:25:32', '2022-05-17 06:25:32'),
(25, 5, 'Stage 02', '1652793939.jpg', '2022-05-17 06:25:39', '2022-05-17 06:25:39'),
(26, 5, 'Stage 03', '1652793949.jpg', '2022-05-17 06:25:49', '2022-05-17 06:25:49'),
(27, 5, 'Stage 04', '1652793963.jpg', '2022-05-17 06:26:03', '2022-05-17 06:26:03'),
(28, 5, 'Stage 05', '1652793972.jpg', '2022-05-17 06:26:12', '2022-05-17 06:26:12'),
(29, 5, 'Stage 06', '1652793990.jpg', '2022-05-17 06:26:30', '2022-05-17 06:26:30'),
(30, 5, 'Stage 07', '1652793999.jpg', '2022-05-17 06:26:39', '2022-05-17 06:26:39'),
(31, 5, 'Stage 08', '1652794005.jpeg', '2022-05-17 06:26:45', '2022-05-17 06:26:45'),
(32, 5, 'Stage 09', '1652794016.jpg', '2022-05-17 06:26:56', '2022-05-17 06:26:56'),
(33, 5, 'Stage 10', '1652794024.jpg', '2022-05-17 06:27:04', '2022-05-17 06:27:04'),
(34, 5, 'Stage 11', '1652794032.jpg', '2022-05-17 06:27:12', '2022-05-17 06:27:12'),
(35, 4, 'Fashion 01', '1652794103.jpg', '2022-05-17 06:28:23', '2022-05-17 06:28:23'),
(36, 4, 'Fashion 02', '1652794109.jpg', '2022-05-17 06:28:29', '2022-05-17 06:28:29'),
(37, 4, 'Fashion 03', '1652794116.jpg', '2022-05-17 06:28:36', '2022-05-17 06:28:36'),
(38, 4, 'Fashion 04', '1652794122.jpg', '2022-05-17 06:28:42', '2022-05-17 06:28:42'),
(39, 4, 'Fashion 05', '1652794128.jpg', '2022-05-17 06:28:48', '2022-05-17 06:28:48'),
(40, 4, 'Fashion 06', '1652794175.jpg', '2022-05-17 06:29:35', '2022-05-17 06:29:35'),
(41, 4, 'Fashion 07', '1652794180.jpg', '2022-05-17 06:29:40', '2022-05-17 06:29:40'),
(42, 4, 'Fashion 08', '1652794187.jpg', '2022-05-17 06:29:47', '2022-05-17 06:29:47'),
(43, 4, 'Fashion 09', '1652794194.jpg', '2022-05-17 06:29:54', '2022-05-17 06:29:54'),
(44, 4, 'Fashion 10', '1652794201.jpg', '2022-05-17 06:30:01', '2022-05-17 06:30:01'),
(45, 4, 'Fashion 11', '1652794209.jpg', '2022-05-17 06:30:09', '2022-05-17 06:30:09'),
(46, 4, 'Fashion 12', '1652794216.jpg', '2022-05-17 06:30:16', '2022-05-17 06:30:16'),
(47, 6, 'Beauty 01', '1652794284.jpg', '2022-05-17 06:31:24', '2022-05-17 06:31:24'),
(48, 6, 'Beauty 02', '1652794288.jpg', '2022-05-17 06:31:28', '2022-05-17 06:31:28'),
(49, 6, 'Beauty 03', '1652794294.jpg', '2022-05-17 06:31:34', '2022-05-17 06:31:34'),
(50, 6, 'Beauty 04', '1652794299.jpg', '2022-05-17 06:31:39', '2022-05-17 06:31:39'),
(51, 6, 'Beauty 05', '1652794305.jpg', '2022-05-17 06:31:45', '2022-05-17 06:31:45'),
(52, 6, 'Beauty 06', '1652794312.jpg', '2022-05-17 06:31:52', '2022-05-17 06:31:52'),
(53, 6, 'Beauty 07', '1652794318.jpg', '2022-05-17 06:31:58', '2022-05-17 06:31:58'),
(54, 6, 'Beauty 08', '1652794324.jpg', '2022-05-17 06:32:04', '2022-05-17 06:32:04'),
(55, 6, 'Beauty 09', '1652794329.jpg', '2022-05-17 06:32:09', '2022-05-17 06:32:09'),
(56, 7, 'Trip 01', '1652794691.jpg', '2022-05-17 06:38:11', '2022-05-17 06:38:11'),
(57, 7, 'Trip 02', '1652794696.jpg', '2022-05-17 06:38:16', '2022-05-17 06:38:16'),
(58, 7, 'Trip 03', '1652794703.jpg', '2022-05-17 06:38:23', '2022-05-17 06:38:23'),
(59, 7, 'Trip 04', '1652794710.jpg', '2022-05-17 06:38:30', '2022-05-17 06:38:30'),
(60, 7, 'Trip 05', '1652794716.jpg', '2022-05-17 06:38:36', '2022-05-17 06:38:36'),
(61, 7, 'Trip 06', '1652794722.jpg', '2022-05-17 06:38:42', '2022-05-17 06:38:42'),
(62, 7, 'Trip 07', '1652794727.jpg', '2022-05-17 06:38:47', '2022-05-17 06:38:47'),
(63, 7, 'Trip 08', '1652794734.jpg', '2022-05-17 06:38:54', '2022-05-17 06:38:54'),
(64, 7, 'Trip 09', '1652794742.jpg', '2022-05-17 06:39:02', '2022-05-17 06:39:02'),
(65, 7, 'Trip 10', '1652794750.jpg', '2022-05-17 06:39:10', '2022-05-17 06:39:10'),
(66, 7, 'Trip 11', '1652794756.jpg', '2022-05-17 06:39:16', '2022-05-17 06:39:16'),
(67, 7, 'Trip 12', '1652794762.jpg', '2022-05-17 06:39:22', '2022-05-17 06:39:22'),
(68, 7, 'Trip 13', '1652794767.jpg', '2022-05-17 06:39:27', '2022-05-17 06:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2022_03_13_111636_create_admins_table', 1),
(4, '2022_03_13_113207_create_sarans_table', 1),
(5, '2022_03_13_113550_create_cat_galleries_table', 1),
(6, '2022_03_13_113613_create_galleries_table', 1),
(7, '2022_03_13_114322_create_services_table', 1),
(8, '2022_03_13_114458_create_orders_table', 1),
(9, '2022_03_13_115148_create_contacts_table', 1),
(10, '2022_03_13_120047_create_cameras_table', 1),
(11, '2022_03_13_120324_create_order_cameras_table', 1),
(12, '2022_03_14_181714_laratrust_setup_tables', 1),
(13, '2022_04_20_110533_return_cameras', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_cameras`
--

CREATE TABLE `order_cameras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `camera_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(2, 'users-read', 'Read Users', 'Read Users', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(3, 'users-update', 'Update Users', 'Update Users', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(5, 'camera-create', 'Create Camera', 'Create Camera', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(6, 'camera-read', 'Read Camera', 'Read Camera', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(7, 'camera-update', 'Update Camera', 'Update Camera', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(8, 'camera-delete', 'Delete Camera', 'Delete Camera', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(9, 'contact-create', 'Create Contact', 'Create Contact', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(10, 'contact-read', 'Read Contact', 'Read Contact', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(11, 'contact-update', 'Update Contact', 'Update Contact', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(12, 'contact-delete', 'Delete Contact', 'Delete Contact', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(13, 'catgallery-create', 'Create Catgallery', 'Create Catgallery', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(14, 'catgallery-read', 'Read Catgallery', 'Read Catgallery', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(15, 'catgallery-update', 'Update Catgallery', 'Update Catgallery', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(16, 'catgallery-delete', 'Delete Catgallery', 'Delete Catgallery', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(17, 'gallery-create', 'Create Gallery', 'Create Gallery', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(18, 'gallery-read', 'Read Gallery', 'Read Gallery', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(19, 'gallery-update', 'Update Gallery', 'Update Gallery', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(20, 'gallery-delete', 'Delete Gallery', 'Delete Gallery', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(21, 'order-read', 'Read Order', 'Read Order', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(22, 'order-delete', 'Delete Order', 'Delete Order', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(23, 'ordercamera-read', 'Read Ordercamera', 'Read Ordercamera', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(24, 'ordercamera-delete', 'Delete Ordercamera', 'Delete Ordercamera', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(25, 'saran-read', 'Read Saran', 'Read Saran', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(26, 'saran-delete', 'Delete Saran', 'Delete Saran', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(27, 'service-create', 'Create Service', 'Create Service', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(28, 'service-read', 'Read Service', 'Read Service', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(29, 'service-update', 'Update Service', 'Update Service', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(30, 'service-delete', 'Delete Service', 'Delete Service', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(31, 'profile-read', 'Read Profile', 'Read Profile', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(32, 'profile-update', 'Update Profile', 'Update Profile', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(33, 'order-create', 'Create Order', 'Create Order', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(34, 'order-update', 'Update Order', 'Update Order', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(35, 'saran-create', 'Create Saran', 'Create Saran', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(36, 'ordercamera-create', 'Create Ordercamera', 'Create Ordercamera', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(37, 'ordercamera-update', 'Update Ordercamera', 'Update Ordercamera', '2022-05-17 04:54:36', '2022-05-17 04:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(20, 1),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(28, 2),
(28, 3),
(29, 1),
(30, 1),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 1, 'App\\Models\\User'),
(3, 1, 'App\\Models\\User'),
(4, 1, 'App\\Models\\User'),
(5, 1, 'App\\Models\\User'),
(6, 1, 'App\\Models\\User'),
(7, 1, 'App\\Models\\User'),
(8, 1, 'App\\Models\\User'),
(9, 1, 'App\\Models\\User'),
(10, 1, 'App\\Models\\User'),
(11, 1, 'App\\Models\\User'),
(12, 1, 'App\\Models\\User'),
(13, 1, 'App\\Models\\User'),
(14, 1, 'App\\Models\\User'),
(15, 1, 'App\\Models\\User'),
(16, 1, 'App\\Models\\User'),
(17, 1, 'App\\Models\\User'),
(18, 1, 'App\\Models\\User'),
(19, 1, 'App\\Models\\User'),
(6, 3, 'App\\Models\\User'),
(10, 3, 'App\\Models\\User'),
(18, 3, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `return_cameras`
--

CREATE TABLE `return_cameras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `camera_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'Admin', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(2, 'User', 'User', 'User', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(3, 'Guest', 'Guest', 'Guest', '2022-05-17 04:54:36', '2022-05-17 04:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(2, 3, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `sarans`
--

CREATE TABLE `sarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `slug_service`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Foto Fashion', 'foto-fashion', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(2, 'Foto Beauty/makeup', 'foto-beautymakeup', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(3, 'Foto Komersil/produk', 'foto-komersilproduk', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(4, 'Foto Trip', 'foto-trip', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(5, 'Foto Stage/panggung', 'foto-stagepanggung', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(6, 'Foto Prewedding', 'foto-prewedding', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis', '2022-05-17 04:54:36', '2022-05-17 04:54:36'),
(7, 'Foto Sport', 'foto-sport', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis', '2022-05-17 04:54:36', '2022-05-17 04:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '081234567890', 'admin@example.com', '2022-05-17 04:54:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TtkPNRQVPnxA4oRQlYsBbCmeDnkawG4DTqcNWLLA3aneLn1ePx8wN06mvwxe', '2022-05-17 04:54:22', '2022-05-17 04:54:22'),
(2, 'Jed Walter MD', '(641) 388-3719 x4914', 'marlin.hoeger@example.org', '2022-05-17 04:54:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ekW0rSpraE', '2022-05-17 04:54:22', '2022-05-17 04:54:22'),
(3, 'User', '081234567890', 'user@example.com', NULL, '$2y$10$hzt7.OBE3.xpecciiI5h7uNsL4kB6DqMAVHoNYqKOMFl4KMtDW46y', NULL, '2022-05-17 04:57:51', '2022-05-17 04:57:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cameras`
--
ALTER TABLE `cameras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_galleries`
--
ALTER TABLE `cat_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_cat_gallery_id_foreign` (`cat_gallery_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_service_id_foreign` (`service_id`);

--
-- Indexes for table `order_cameras`
--
ALTER TABLE `order_cameras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_cameras_user_id_foreign` (`user_id`),
  ADD KEY `order_cameras_camera_id_foreign` (`camera_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `return_cameras`
--
ALTER TABLE `return_cameras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_cameras_user_id_foreign` (`user_id`),
  ADD KEY `return_cameras_camera_id_foreign` (`camera_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sarans`
--
ALTER TABLE `sarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cameras`
--
ALTER TABLE `cameras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cat_galleries`
--
ALTER TABLE `cat_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_cameras`
--
ALTER TABLE `order_cameras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `return_cameras`
--
ALTER TABLE `return_cameras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sarans`
--
ALTER TABLE `sarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_cat_gallery_id_foreign` FOREIGN KEY (`cat_gallery_id`) REFERENCES `cat_galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_cameras`
--
ALTER TABLE `order_cameras`
  ADD CONSTRAINT `order_cameras_camera_id_foreign` FOREIGN KEY (`camera_id`) REFERENCES `cameras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_cameras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `return_cameras`
--
ALTER TABLE `return_cameras`
  ADD CONSTRAINT `return_cameras_camera_id_foreign` FOREIGN KEY (`camera_id`) REFERENCES `cameras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `return_cameras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
