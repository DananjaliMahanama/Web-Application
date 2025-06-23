-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 10:10 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `okid_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'Dananjali', 'dana@gmail.com', 'saasdd', '2025-06-09 15:40:09'),
(2, 'Dananjali', 'dananjalimahanama12@gmail.com', 'red beaded', '2025-06-12 14:18:46'),
(3, 'dananjali', 'dananjalimahanama11@gmail.com', 'hi', '2025-06-13 19:34:13'),
(4, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'adef', '2025-06-15 14:08:01'),
(5, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'fdgdfg', '2025-06-15 14:09:01'),
(6, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'fdgdfg', '2025-06-15 14:10:32'),
(7, 'Dananjali', 'dananjalimahanama12@gmail.com', 'sdcs', '2025-06-15 14:10:39'),
(8, 'Dananjali', 'dananjalimahanama12@gmail.com', 'tyrty', '2025-06-15 14:23:09'),
(9, 'Dananjali', 'dananjalimahanama12@gmail.com', 'yoyo', '2025-06-15 14:35:38'),
(10, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'hi', '2025-06-16 02:28:19'),
(11, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'hiii', '2025-06-16 10:40:18'),
(12, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'can I buy in bulk order?', '2025-06-19 10:14:01'),
(13, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'can I buy same colour ring', '2025-06-19 10:16:05'),
(14, 'dananjali mahanama', 'mahanama12@gmail.com', 'how to order', '2025-06-23 07:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `customize_requests`
--

CREATE TABLE `customize_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jewellery_type` varchar(100) DEFAULT NULL,
  `jewellery_size` varchar(100) NOT NULL,
  `color` varchar(100) DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customize_requests`
--

INSERT INTO `customize_requests` (`id`, `name`, `email`, `jewellery_type`, `jewellery_size`, `color`, `instructions`, `created_at`) VALUES
(2, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', '', 'red', 'vv', '2025-06-14 05:05:31'),
(3, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', '', 'red', 'ff', '2025-06-14 05:19:08'),
(4, 'Dananjali', 'dananjalimahanama12@gmail.com', 'Beaded Ring', '', 'red', 'vgdeg', '2025-06-14 11:25:09'),
(5, 'dananjali', 'dananjalimahanama12@gmail.com', 'Beaded Ring', '', 'red', 'aSA', '2025-06-14 12:16:45'),
(6, 'dananjali', 'dananjalimahanama12@gmail.com', 'Beaded Earring', '', 'red', 'fgfdg', '2025-06-14 19:46:57'),
(7, 'dananjali', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', '', 'red', 'sas', '2025-06-15 10:50:01'),
(8, 'Dananjali', 'dananjalimahanama12@gmail.com', 'Beaded Earring', '', 'red', 'cxv', '2025-06-15 10:59:14'),
(9, 'Dananjali', 'dananjalimahanama12@gmail.com', 'Beaded Earring', '', 'red', 'cxv', '2025-06-15 11:07:38'),
(10, 'Dananjali', 'dananjalimahanama12@gmail.com', 'Beaded Earring', '', 'red', 'cxv', '2025-06-15 11:09:05'),
(11, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', '', 'red', 'red and white', '2025-06-15 11:17:35'),
(12, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 'Large', 'red', 'white', '2025-06-15 11:39:22'),
(13, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 'Large', 'red', 'white', '2025-06-15 11:41:19'),
(14, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 'Large', 'red', 'white', '2025-06-15 11:41:25'),
(15, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 'Large', 'red', 'white', '2025-06-15 11:41:28'),
(16, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 'Large', 'red', 'wefr', '2025-06-15 15:56:40'),
(17, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 'Large', 'red', 'wefr', '2025-06-15 15:58:57'),
(18, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 'Large', 'red', 'wefr', '2025-06-15 18:20:22'),
(19, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 'Large', 'red', 'wefr', '2025-06-15 18:21:10'),
(20, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 'Large', 'red', 'wwqeqwq', '2025-06-15 18:21:19'),
(21, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 'Large', 'red', 'wwqeqwq', '2025-06-15 18:21:23'),
(22, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Earring', 'Free Size', 'pink', 'red and pink', '2025-06-16 02:28:01'),
(23, 'dananjali mahanama', 'mahanama12@gmail.com', 'Beaded Ring', 'Large', 'pink', 'aa', '2025-06-23 07:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `custom_orders`
--

CREATE TABLE `custom_orders` (
  `id` int(11) NOT NULL,
  `jewellery_type` varchar(50) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_orders`
--

INSERT INTO `custom_orders` (`id`, `jewellery_type`, `color`, `size`, `notes`, `created_at`) VALUES
(1, '', '', '', '', '2025-06-01 08:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `product_name`, `quantity`, `price`, `order_date`) VALUES
(1, 'Dananjali', 'dananjalimahanama12@gmail.com', 'N0 5,B.O.P 317, Talpotha, Polonnaruwa', NULL, NULL, NULL, '2025-06-12 19:22:03'),
(2, 'dananjali', 'dananjalimahanama12@gmail.com', 'polonnaruwa', NULL, NULL, NULL, '2025-06-14 07:56:19'),
(3, 'dananjali', 'dananjalimahanama12@gmail.com', 'dd', NULL, NULL, NULL, '2025-06-14 08:14:08'),
(4, 'ww', 'dananjalimahanama12@gmail.com', 'ew', NULL, NULL, NULL, '2025-06-14 08:20:22'),
(5, 'dananjali', 'dananjalimahanama12@gmail.com', 'wqw', NULL, NULL, NULL, '2025-06-14 08:20:57'),
(6, 'dananjali', 'dananjalimahanama12@gmail.com', 'ga', NULL, NULL, NULL, '2025-06-14 09:09:32'),
(7, 'dananjali', 'dananjalimahanama12@gmail.com', 'ga', NULL, 3, NULL, '2025-06-14 09:09:32'),
(8, 'dananjali', 'dananjalimahanama12@gmail.com', 'jh', 'Beaded Ring 1', 1, '15.00', '2025-06-14 11:19:24'),
(9, 'dananjali', 'dananjalimahanama12@gmail.com', 'jh', 'Beaded Ring 2', NULL, '18.00', '2025-06-14 11:19:25'),
(10, 'dananjali', 'dananjalimahanama12@gmail.com', 'hingurakgoda', 'Beaded Ring 3', 3, '20.00', '2025-06-14 12:08:52'),
(11, 'dananjali', 'dananjalimahanama12@gmail.com', 'hingurakgoda', 'Beaded Ring 2', 1, '18.00', '2025-06-14 12:08:53'),
(12, 'dananjali', 'dananjalimahanama12@gmail.com', 'hingurakgoda', 'Beaded Ring 1', 1, '15.00', '2025-06-14 12:08:53'),
(13, 'dananjali', 'dananjalimahanama12@gmail.com', 'hingurakgoda', 'Beaded Ring 4', 1, '22.00', '2025-06-14 12:08:53'),
(14, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Candy', 'Beaded Neckles 1', 1, '15.00', '2025-06-14 14:41:02'),
(15, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'Candy', 'Beaded Neckles 2', 1, '18.00', '2025-06-14 14:41:03'),
(16, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'polonnaruwa', 'Beaded Anklet 3', 1, '20.00', '2025-06-14 15:20:29'),
(17, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'polonnaruwa', 'Beaded Bangle 4', 1, '22.00', '2025-06-14 15:20:29'),
(18, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'polonnaruwa', 'Beaded Bangle 1', 1, '15.00', '2025-06-14 15:20:29'),
(19, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'polonnaruwa', 'Beaded Ring 6', 1, '17.00', '2025-06-14 15:20:30'),
(20, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'polonnaruwa', 'Beaded Anklet 2', 1, '18.00', '2025-06-14 15:20:30'),
(21, 'Dananjali Mahanama', 'dananjalimahanama12@gmail.com', 'polonnaruwa', 'Beaded Ring 5', 1, '19.00', '2025-06-14 15:20:30'),
(22, 'dananjali', 'dananjalimahanama12@gmail.com', 'gall', 'Beaded Neckles 4', 1, '250.00', '2025-06-14 19:46:17'),
(23, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'kaduruwela', 'Beaded Neckles 1', 1, '250.00', '2025-06-16 02:26:25'),
(24, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'kaduruwela', 'Beaded Ring 4', 1, '250.00', '2025-06-16 02:26:25'),
(25, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'kaduruwela', 'Beaded Earring 3', 2, '250.00', '2025-06-16 02:26:25'),
(26, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'kaduruwela', 'Beaded Anklet 2', 1, '350.00', '2025-06-16 02:26:25'),
(27, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'xcx', 'Beaded Neckles 4', 1, '250.00', '2025-06-16 11:38:35'),
(28, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'xcx', NULL, 1, NULL, '2025-06-16 11:39:39'),
(29, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'gall', NULL, 1, NULL, '2025-06-16 11:42:14'),
(30, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'gall', 'Beaded Earring 4', 1, '250.00', '2025-06-16 11:42:14'),
(31, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'hingurakgoda', 'Beaded Neckles 2', 1, '250.00', '2025-06-23 06:41:29'),
(32, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'hingurakgoda', 'Beaded Ring 3', 1, '250.00', '2025-06-23 06:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(3, 'neckless', '240.00', 'im16.jpeg'),
(10, 'ancklet', '250.00', '22.jpeg'),
(12, 'wedding ring', '2000.00', '88.jpeg'),
(13, 'ancklet', '400.00', '10.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `name`, `email`, `product_name`, `rating`, `review`, `created_at`) VALUES
(1, 'Dananjali', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 3, 'good', '2025-06-13 16:45:00'),
(2, 'Dananjali', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 3, 'good', '2025-06-13 16:47:46'),
(3, 'Dananjali', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 3, 'good', '2025-06-13 16:48:22'),
(11, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:02:32'),
(12, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:04:08'),
(13, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:04:36'),
(14, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:05:17'),
(15, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:07:19'),
(16, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:13:26'),
(17, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:14:08'),
(18, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:14:41'),
(19, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:15:01'),
(20, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:15:13'),
(21, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:15:34'),
(22, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:16:00'),
(23, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:16:16'),
(24, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:16:36'),
(25, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:18:12'),
(26, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:18:41'),
(27, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:19:20'),
(28, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:19:37'),
(29, 'Dananjali', 'dananjali@12gmail.com', 'Beaded Bangle', 5, 'woow', '2025-06-13 17:21:50'),
(30, 'dananjali', 'dananjalimahanama11@gmail.com', 'Beaded Necklace', 2, 'super', '2025-06-13 19:36:03'),
(31, 'dananjali mahanama', 'dananjalimahanama12@gmail.com', 'Beaded Necklace', 3, 'good', '2025-06-16 02:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'dana', 'dana@gmail.com', '$2y$10$8ShUO0ifpo4L2K0yLyXBAu5go.cxT8/IuerYLxYfzF7/UPjtXPEVq'),
(2, '', '', '$2y$10$SoqCH008wBQMxKoWzgOt4OkoyMT7RpfclYSNbk9PT5t1M/cQWQDWi'),
(3, 'Dananjali', 'dananjalimahanama12@gmail.com', '$2y$10$95OMjH7psZJ7Nv78nzGFDO4NLobhv1hQTq9zcAumUkuQJwBRPFK8e'),
(4, 'Himashi', 'hima@gmail.com', '$2y$10$h1v7y1d5fDP5jyb4hpDq8O9Kb0ZiAaQXfxN.9fB8FfETXViCr.H3u'),
(7, 'dananjali', 'dananjalimahanama11@gmail.com', '$2y$10$MPFUUFQPlpsEUm0gLbpk9O8Vo9hdyM3xwkKzpENK3WcuI4ySFdt06'),
(10, 'himashi', 'himashi12@gmail.com', '$2y$10$Knz9s6g87N3vOzN/U0LtdOzKJ7PtLaJeeaqiHtokzJ.Xb7IcMvls6'),
(12, 'Mahanama', 'mahanama12@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customize_requests`
--
ALTER TABLE `customize_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_orders`
--
ALTER TABLE `custom_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customize_requests`
--
ALTER TABLE `customize_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `custom_orders`
--
ALTER TABLE `custom_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
