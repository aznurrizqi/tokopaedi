-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 08:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokopaedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Budi', 'Jakarta', '098167239123', 'budi@gmail.com', 1690438097, 1690438097),
(2, 'Amanda', 'Bandung', '018273231911', 'amanda@gmail.com', 1690440468, 1690440468),
(3, 'Cantika', 'Tangerang', '089127389167', 'cantika@gmail.com', 1690440496, 1690440496),
(4, 'David', 'Jakarta', '08123719231', 'david@gmail.com', 1690441447, 1690441447),
(5, 'Emir', 'Jakarta', '012731928739', 'emir@gmail.com', 1690441473, 1690441473),
(6, 'Fahrizal', 'Jogja', '091712903788', 'fahrizal@gmail.com', 1690441497, 1690441497),
(7, 'Gina', 'Solo', '01728931792', 'gina@gmail.com', 1690441511, 1690441511),
(8, 'Hesti', 'Jakarta', '092739187989', 'hesti@gmail.com', 1690441527, 1690441527),
(9, 'Indika', 'Bandung', '018293179287', 'indika@gmail.com', 1690441542, 1690441542),
(10, 'Joshua', 'Tangerang', '081289319123', 'joshua@gmail.com', 1690441557, 1690441557);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `description`, `unit`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Harddisk 500GB SATA 2.5 inch', 'Harddisk untuk laptop', 'Unit', 4, 1690442838, 1690442870),
(4, 'Monitor 24 inch', 'Monitor LCD', 'Unit', 4, 1690442862, 1690442862),
(5, 'Keyboard', 'Keyboard dengan kabel', 'Unit', 4, 1690442995, 1690442995),
(6, 'Keyboard Wireless', 'Keyboard tanpa kabel', 'Unit', 4, 1690443024, 1690443024),
(7, 'Headset', 'Headset dengan kabel', 'Unit', 4, 1690443037, 1690443037),
(8, 'Smart TV', 'Smart TV dengan OS Android', 'Unit', 4, 1690443091, 1690443091),
(9, 'Laptop 500GB RAM 8 GB', 'Laptop spek standar', 'Unit', 4, 1690443122, 1690443122),
(10, 'Speaker Wireless', 'Speaker tanpa kabel', 'Unit', 4, 1690443150, 1690443150),
(11, 'Mouse Wireless', 'Mouse tanpa kabel', 'Unit', 4, 1690443172, 1690443172),
(12, 'Mouse', 'Mouse tanpa kabel', 'Unit', 4, 1690445592, 1690445592);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `purchase_price` decimal(10,0) NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `amount`, `purchase_price`, `product_id`, `supplier_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 20, 200000, 3, 2, 4, 1690443516, 1690443516),
(2, 5, 2800000, 4, 6, 4, 1690444230, 1690444230),
(3, 50, 200000, 5, 5, 4, 1690444630, 1690444630),
(4, 50, 300000, 6, 5, 4, 1690444645, 1690444645),
(5, 20, 600000, 7, 11, 4, 1690444825, 1690444825),
(6, 30, 4000000, 8, 9, 4, 1690444863, 1690444863),
(7, 10, 10000000, 9, 4, 4, 1690444885, 1690444885),
(8, 100, 200000, 10, 6, 4, 1690444924, 1690444924),
(9, 10, 1300000, 11, 7, 4, 1690445069, 1690445069),
(12, 100, 200000, 12, 10, 4, 1690446141, 1690446141);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `description`) VALUES
(1, 'admin', ''),
(2, 'inputer', '');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `sale_price` decimal(11,0) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `amount`, `sale_price`, `product_id`, `customer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 250000, 3, 2, 4, 1690449785, 1690449785),
(2, 5, 2750000, 4, 1, 4, 1690449997, 1690450179),
(3, 5, 230000, 5, 3, 4, 1690450073, 1690450073),
(4, 2, 330000, 6, 4, 4, 1690450121, 1690450121),
(5, 1, 630000, 7, 5, 4, 1690450133, 1690450133),
(6, 1, 4200000, 8, 6, 4, 1690450155, 1690450155),
(7, 1, 10100000, 9, 7, 4, 1690450231, 1690450231),
(8, 5, 230000, 10, 8, 4, 1690450253, 1690450253),
(9, 1, 1400000, 11, 9, 4, 1690450266, 1690450266),
(10, 10, 210000, 12, 10, 4, 1690450285, 1690450285),
(11, 2, 620000, 7, 8, 4, 1690450388, 1690450388),
(12, 1, 10050000, 9, 3, 4, 1690450410, 1690450410),
(13, 2, 1300000, 11, 2, 4, 1690450432, 1690450432),
(14, 3, 4100000, 8, 4, 4, 1690450473, 1690450473),
(15, 2, 2200000, 10, 10, 4, 1690450489, 1690450489),
(16, 1, 11000000, 9, 9, 4, 1690450552, 1690450552),
(17, 3, 220000, 3, 8, 4, 1690450581, 1690450590),
(18, 3, 250000, 12, 1, 4, 1690450623, 1690450623),
(19, 1, 1110000, 9, 2, 4, 1690450644, 1690450644),
(20, 5, 330000, 6, 1, 4, 1690450674, 1690450674);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'Samsung', 'Jakarta', '079341983740', 1690440299, 1690440299),
(3, 'Adata', 'Jakarta', '098173197269', 1690440364, 1690440364),
(4, 'Lenovo', 'Jakarta', '01829368912', 1690440430, 1690440430),
(5, 'Logitech', 'Jakarta', '091723123123', 1690441762, 1690441762),
(6, 'Xiaomi', 'Jakarta', '089127319393', 1690441782, 1690441782),
(7, 'Apple', 'Jakarta', '078263482234', 1690441846, 1690441846),
(8, 'LG', 'Jakarta', '0912731923113', 1690441855, 1690441855),
(9, 'Polytron', 'Jakarta', '019273123112', 1690441926, 1690441926),
(10, 'Corsair', 'Jakarta', '0182931723123', 1690441937, 1690445450),
(11, 'Audio Technica', 'Jakarta', '018293193154', 1690442023, 1690442023);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `first_name`, `last_name`, `phone`, `address`, `email`, `status`, `role_id`, `created_at`, `updated_at`) VALUES
(4, 'zidan', 'tO8TvMRIc4TVr52D1vBL_VBbgX6hmvKw', '$2y$13$rWob1uR4W03jjP1HCmQ5QuS8pr0eUOgTJOmYJAtv9f99Rh9YD8tpK', NULL, '', '', '', '', 'zidan@gmail.com', 10, 2, 1690354990, 1690354990),
(5, 'afif', 'dydn6HsYmMoWtTASr5qXVTaRgxz_TM4q', '$2y$13$llQj2YE7m8WZMkHwY4Cc1ukghu00w9UHNRwaleCgB6DM7fTaONgYe', NULL, '', '', '', '', 'afif@gmail.com', 10, 1, 1690431745, 1690431745);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
