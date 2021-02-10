-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 فبراير 2021 الساعة 01:08
-- إصدار الخادم: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- بنية الجدول `top_ads`
--

CREATE TABLE `bottom_ads` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `url` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `order_number` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `top_ads`
--

INSERT INTO `bottom_ads` (`id`, `img`, `title`, `description`, `url`, `active`, `order_number`) VALUES
(1, 'banner-home-5.jpg', 'pick yout items', 'Adipiscing elit curabitur senectus sem\r\n', 'categories.php', 0, 0),
(2, 'banner-home-6.jpg', 'Best Of\r\nProducts', 'Cras pulvinar loresum dolor conse\r\n', 'categories.php', 0, 0),
(4, '2640182.jpeg', '', '', 'http://localhost/Abuahmed/web-site/', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `top_ads`
--
ALTER TABLE `bottom_ads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `top_ads`
--
ALTER TABLE `bottom_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
