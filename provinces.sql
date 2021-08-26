-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2021 at 05:33 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymusic`

--

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Chí Minh', 'SG', NULL, NULL),
(2, 'Hà Nội', 'HN', NULL, NULL),
(3, 'Đà Nẵng', 'DDN', NULL, NULL),
(4, 'Bình Dương', 'BD', NULL, NULL),
(5, 'Đồng Nai', 'DNA', NULL, NULL),
(6, 'Khánh Hòa', 'KH', NULL, NULL),
(7, 'Hải Phòng', 'HP', NULL, NULL),
(8, 'Long An', 'LA', NULL, NULL),
(9, 'Quảng Nam', 'QNA', NULL, NULL),
(10, 'Bà Rịa Vũng Tàu', 'VT', NULL, NULL),
(11, 'Đắk Lắk', 'DDL', NULL, NULL),
(12, 'Cần Thơ', 'CT', NULL, NULL),
(13, 'Bình Thuận  ', 'BTH', NULL, NULL),
(14, 'Lâm Đồng', 'LDD', NULL, NULL),
(15, 'Thừa Thiên Huế', 'TTH', NULL, NULL),
(16, 'Kiên Giang', 'KG', NULL, NULL),
(17, 'Bắc Ninh', 'BN', NULL, NULL),
(18, 'Quảng Ninh', 'QNI', NULL, NULL),
(19, 'Thanh Hóa', 'TH', NULL, NULL),
(20, 'Nghệ An', 'NA', NULL, NULL),
(21, 'Hải Dương', 'HD', NULL, NULL),
(22, 'Gia Lai', 'GL', NULL, NULL),
(23, 'Bình Phước', 'BP', NULL, NULL),
(24, 'Hưng Yên', 'HY', NULL, NULL),
(25, 'Bình Định', 'BDD', NULL, NULL),
(26, 'Tiền Giang', 'TG', NULL, NULL),
(27, 'Thái Bình', 'TB', NULL, NULL),
(28, 'Bắc Giang', 'BG', NULL, NULL),
(29, 'Hòa Bình', 'HB', NULL, NULL),
(30, 'An Giang', 'AG', NULL, NULL),
(31, 'Vĩnh Phúc', 'VP', NULL, NULL),
(32, 'Tây Ninh', 'TNI', NULL, NULL),
(33, 'Thái Nguyên', 'TN', NULL, NULL),
(34, 'Lào Cai', 'LCA', NULL, NULL),
(35, 'Nam Định', 'NDD', NULL, NULL),
(36, 'Quảng Ngãi', 'QNG', NULL, NULL),
(37, 'Bến Tre', 'BTR', NULL, NULL),
(38, 'Đắk Nông', 'DNO', NULL, NULL),
(39, 'Cà Mau', 'CM', NULL, NULL),
(40, 'Vĩnh Long', 'VL', NULL, NULL),
(41, 'Ninh Bình', 'NB', NULL, NULL),
(42, 'Phú Thọ', 'PT', NULL, NULL),
(43, 'Ninh Thuận', 'NT', NULL, NULL),
(44, 'Phú Yên', 'PY', NULL, NULL),
(45, 'Hà Nam', 'HNA', NULL, NULL),
(46, 'Hà Tĩnh', 'HT', NULL, NULL),
(47, 'Đồng Tháp', 'DDT', NULL, NULL),
(48, 'Sóc Trăng', 'ST', NULL, NULL),
(49, 'Kon Tum', 'KT', NULL, NULL),
(50, 'Quảng Bình', 'QB', NULL, NULL),
(51, 'Quảng Trị', 'QT', NULL, NULL),
(52, 'Trà Vinh', 'TV', NULL, NULL),
(53, 'Hậu Giang', 'HGI', NULL, NULL),
(54, 'Sơn La', 'SL', NULL, NULL),
(55, 'Bạc Liêu', 'BL', NULL, NULL),
(56, 'Yên Bái', 'YB', NULL, NULL),
(57, 'Tuyên Quang', 'TQ', NULL, NULL),
(58, 'Điện Biên', 'DDB', NULL, NULL),
(59, 'Lai Châu', 'LCH', NULL, NULL),
(60, 'Lạng Sơn', 'LS', NULL, NULL),
(61, 'Hà Giang', 'HG', NULL, NULL),
(62, 'Bắc Kạn', 'BK', NULL, NULL),
(63, 'Cao Bằng', 'CB', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
