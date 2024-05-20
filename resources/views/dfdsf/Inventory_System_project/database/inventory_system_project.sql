-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 06:29 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_system_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow_transaction`
--

CREATE TABLE `borrow_transaction` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `stock_name` text NOT NULL,
  `t_quantity` int(11) NOT NULL,
  `std_num` int(12) NOT NULL,
  `name` text NOT NULL,
  `section` text NOT NULL,
  `c_num` text NOT NULL,
  `lab_incharge` text NOT NULL,
  `date_issue` timestamp NOT NULL DEFAULT current_timestamp(),
  `due_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow_transaction`
--

INSERT INTO `borrow_transaction` (`id`, `stock_id`, `stock_name`, `t_quantity`, `std_num`, `name`, `section`, `c_num`, `lab_incharge`, `date_issue`, `due_date`) VALUES
(1, 123456789, 'Beaker', 10, 202012356, 'Carla A. Reyes', 'BSMT 3-5', '912345678', '', '2023-08-09 01:53:19', '2023-08-30 16:00:00'),
(13, 123456, 'beaker', 1, 202015622, 'John Michael Ibanez', ' BSMT 3-3', '09777749976', '', '2023-08-02 16:00:00', '2023-08-02 16:00:00'),
(14, 123456789, 'beaker', 3, 202015622, 'adrian', ' BSMT 3-5', '09777749976', '', '2023-08-13 16:00:00', '2023-08-13 16:00:00'),
(25, 123456789, 'Beaker', 15, 201810312, 'ariel', '4-1', '09162088724', '', '2023-08-17 16:00:00', '2023-08-17 16:00:00'),
(26, 123456789, 'Beaker', 1, 147258369, 'John Michael Ibanez', '1-5', '78945612314', 'Admin', '2023-08-19 16:00:00', '2023-08-19 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `name_item` text NOT NULL,
  `item_type` enum('equipment','glassware','reagents') NOT NULL,
  `t_quantity` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `function` text NOT NULL,
  `condemn` text NOT NULL,
  `storage` text NOT NULL,
  `supplier` text NOT NULL,
  `date_recieve` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `stock_id`, `name_item`, `item_type`, `t_quantity`, `quantity`, `function`, `condemn`, `storage`, `supplier`, `date_recieve`) VALUES
(3, 345678912, 'Uric Acid Reagent', 'reagents', 30, 5, 'Functional', '1', 'room102', '', '2023-08-16 08:32:31'),
(4, 456789123, 'Test tube', 'glassware', 0, 20, 'Functional', '1', 'room102', '', '2023-08-16 08:32:31'),
(5, 546987123, 'BUN Reagents', 'reagents', 0, 5, 'Functional', '1', 'room102', '', '2023-08-16 08:32:31'),
(7, 963852741, 'Graduate Cylinderrrr', 'glassware', 0, 5, 'Functional', '1', 'room102', '', '2023-08-16 08:32:31'),
(8, 214214231, 'centrifuge', 'equipment', 0, 2, 'Functional', '1', 'room102', '', '2023-08-16 08:32:31'),
(11, 147258369, 'Uric Acid Reagent', 'equipment', 0, 100, 'Functional', '0', 'room201', 'me', '2023-08-15 16:00:00'),
(14, 123456789, 'Beaker', 'equipment', 30, 14, 'Functional', '0', 'room203', 'CvSU', '2023-08-17 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `return_transaction`
--

CREATE TABLE `return_transaction` (
  `id` int(11) NOT NULL,
  `std_num` int(11) NOT NULL,
  `name` text NOT NULL,
  `stock_id` int(11) NOT NULL,
  `stock_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_issued` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_return` timestamp NOT NULL DEFAULT current_timestamp(),
  `lab_incharge` varchar(255) NOT NULL,
  `condition` text NOT NULL,
  `penalty` varchar(255) NOT NULL,
  `serviceable_item` text NOT NULL,
  `condemn_items` int(11) NOT NULL,
  `missing_item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_transaction`
--

INSERT INTO `return_transaction` (`id`, `std_num`, `name`, `stock_id`, `stock_name`, `quantity`, `date_issued`, `date_return`, `lab_incharge`, `condition`, `penalty`, `serviceable_item`, `condemn_items`, `missing_item`) VALUES
(1, 2020123456, 'Carla A. Reyes', 123456789, 'Beaker', 1, '2023-08-11 06:21:53', '2023-08-11 06:21:53', 'ADMINISTRSTOR', 'Functional', 'None', '1', 0, '0'),
(6, 201810312, 'ariel', 12, 'beaker', 12, '2023-08-10 16:00:00', '2023-08-10 16:00:00', 'admin', 'Functional', '', '1', 2, '0'),
(7, 202015622, 'John Michael Ibanez', 123456, 'beaker', 1, '2023-08-02 16:00:00', '2023-08-02 16:00:00', 'Mr. Leo Joveth Bartolome', 'Functional', '', '1', 0, '0'),
(8, 23123, 'asdasd', 123456789, 'Beaker', 13, '2023-08-15 16:00:00', '2023-08-15 16:00:00', 'admin', 'Functional', 'none', '1', 1, '0'),
(9, 2121, 'rr', 123456789, 'Beaker', 13, '2023-08-15 16:00:00', '2023-08-15 16:00:00', 'admin', 'Functional', 'none', '1', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `role` enum('admin','student') NOT NULL,
  `std_num` int(12) NOT NULL,
  `name` text NOT NULL,
  `section` text NOT NULL,
  `c_num` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `std_num`, `name`, `section`, `c_num`, `username`, `password`, `reg_date`) VALUES
(1, 'admin', 1, 'admin', 'admin', '0000000000', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2023-08-12 06:26:58'),
(2, 'student', 201810312, 'ariel', '4-1', '09162088724', '0a2e4da8f53ff496298559b7f100067ec5868c8b', '0a2e4da8f53ff496298559b7f100067ec5868c8b', '2023-08-12 07:02:40'),
(5, 'student', 2020123456, 'Carla A. Reyes', 'BSMT 3-5', '09123456789', '864c5405253befa87181b9a7ddf15c6b37b80b76', '864c5405253befa87181b9a7ddf15c6b37b80b76', '2023-08-20 06:06:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow_transaction`
--
ALTER TABLE `borrow_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_transaction`
--
ALTER TABLE `return_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow_transaction`
--
ALTER TABLE `borrow_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `return_transaction`
--
ALTER TABLE `return_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
