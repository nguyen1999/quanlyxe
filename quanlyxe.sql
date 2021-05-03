-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 07:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyxe`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image_path` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `image_path`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', 'Banner 1.jpg', 3, 1, '2021-04-27 09:07:00', '2021-04-28 16:45:53'),
(2, 'Banner 2', 'Banner 2.jpg', 2, 1, '2021-04-27 09:34:40', '2021-04-27 16:34:40'),
(3, 'Banner 3', 'Banner 3.jpg', 3, 1, '2021-04-27 09:34:53', '2021-04-27 16:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `hangxe`
--

CREATE TABLE `hangxe` (
  `id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `img_path` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hangxe`
--

INSERT INTO `hangxe` (`id`, `name`, `img_path`, `created_at`, `updated_at`) VALUES
(10, 'Hãng 3', 'Hãng 3.jpg', '2021-04-27 09:39:57', '2021-04-27 16:39:57'),
(11, 'Hãng 4', 'Hãng 4.jpg', '2021-04-27 09:40:08', '2021-04-27 16:40:08'),
(12, 'Hãng 5', 'Hãng 5.jpg', '2021-04-27 09:40:19', '2021-04-27 16:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `lapxe`
--

CREATE TABLE `lapxe` (
  `id` bigint(20) NOT NULL,
  `car_id` bigint(20) NOT NULL,
  `accessary_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapxe`
--

INSERT INTO `lapxe` (`id`, `car_id`, `accessary_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2021-04-28 09:02:05', '2021-04-28 16:02:05'),
(2, 2, 3, '2021-04-28 09:02:35', '2021-04-28 16:02:35'),
(3, 3, 2, '2021-04-28 09:02:58', '2021-04-28 16:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `lichdatxe`
--

CREATE TABLE `lichdatxe` (
  `id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `sex` char(6) NOT NULL,
  `address` varchar(50) NOT NULL,
  `car_id` bigint(20) NOT NULL,
  `start_date_at` date NOT NULL,
  `start_time_at` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `identity_card_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lichdatxe`
--

INSERT INTO `lichdatxe` (`id`, `name`, `phone`, `sex`, `address`, `car_id`, `start_date_at`, `start_time_at`, `created_at`, `updated_at`, `identity_card_number`, `email`, `status`) VALUES
(3, 'Nguyễn Hữu Luân', '0123456789', 'male', 'abc', 3, '2021-04-30', '22:59:00', '2021-04-28 08:59:39', '2021-04-28 16:01:03', '012345679', 'nguyenhuuluan17@gmail.com', 0),
(5, 'Nguyễn Hữu Luân', '0898103236', 'male', 'abc', 4, '2021-04-30', '22:47:00', '2021-04-29 08:47:58', '2021-04-29 15:53:07', '0123456789', 'nguyenhuuluan17@gmail.com', 0),
(6, 'Luân', '0123456789', 'female', 'abc', 2, '2021-04-30', '22:54:00', '2021-04-29 08:54:42', '2021-04-29 15:57:06', '0123456789', 'hyquynh123@gmail.com', 0),
(7, 'Nguyễn Nam', '0123456789', 'male', 'abc', 4, '2021-05-01', '22:55:00', '2021-04-29 08:56:05', '2021-04-29 15:57:16', '0123456789', 'nguyenhuuluan17@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phutungxe`
--

CREATE TABLE `phutungxe` (
  `id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_manufacture` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phutungxe`
--

INSERT INTO `phutungxe` (`id`, `name`, `date_manufacture`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Phụ kiện 1', '2021-04-30', 0, '2021-04-28 09:01:33', '2021-04-28 16:34:54'),
(3, 'Phụ kiện 2', '2021-04-30', 1, '2021-04-28 09:01:45', '2021-04-28 16:01:45'),
(4, 'Phụ kiện 3', '2021-04-26', 1, '2021-04-28 09:01:57', '2021-04-28 16:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image_path` text NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `price` float NOT NULL,
  `sku` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `hire_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`id`, `name`, `image_path`, `brand_id`, `price`, `sku`, `status`, `hire_price`, `created_at`, `updated_at`, `description`) VALUES
(2, 'Xe 1', 'Xe 1.webp', 11, 1000, '122', 1, 1000, '2021-04-27 20:10:12', '2021-04-29 15:57:06', '<p>abc</p>'),
(3, 'Xe 2', 'Xe 2.jpg', 10, 2000000, '123', 1, 2000000, '2021-04-28 06:01:07', '2021-04-28 16:40:43', '<p>456</p>'),
(4, 'Xe 3', 'Xe 3.jpg', 11, 300000, '123', 1, 300000, '2021-04-28 09:40:03', '2021-04-29 15:57:16', '<p>abc</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hangxe`
--
ALTER TABLE `hangxe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapxe`
--
ALTER TABLE `lapxe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AccessaryMix` (`accessary_id`),
  ADD KEY `FK_CarMix` (`car_id`);

--
-- Indexes for table `lichdatxe`
--
ALTER TABLE `lichdatxe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CarSchedule` (`car_id`);

--
-- Indexes for table `phutungxe`
--
ALTER TABLE `phutungxe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BrandCar` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hangxe`
--
ALTER TABLE `hangxe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lapxe`
--
ALTER TABLE `lapxe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lichdatxe`
--
ALTER TABLE `lichdatxe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `phutungxe`
--
ALTER TABLE `phutungxe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `xe`
--
ALTER TABLE `xe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lapxe`
--
ALTER TABLE `lapxe`
  ADD CONSTRAINT `FK_AccessaryMix` FOREIGN KEY (`accessary_id`) REFERENCES `phutungxe` (`id`),
  ADD CONSTRAINT `FK_CarMix` FOREIGN KEY (`car_id`) REFERENCES `xe` (`id`);

--
-- Constraints for table `lichdatxe`
--
ALTER TABLE `lichdatxe`
  ADD CONSTRAINT `FK_CarSchedule` FOREIGN KEY (`car_id`) REFERENCES `xe` (`id`);

--
-- Constraints for table `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `FK_BrandCar` FOREIGN KEY (`brand_id`) REFERENCES `hangxe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
