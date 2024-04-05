-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 01:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifiedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `createdAt`, `modifiedAt`) VALUES
(21, 'Credit Card Bills', '2024-03-14 10:31:25', NULL),
(25, 'Insurance', '2024-03-15 12:29:00', NULL),
(37, 'Gaming', '2024-03-18 10:27:52', NULL),
(38, 'Recharge', '2024-03-18 10:28:43', NULL),
(39, 'Food', '2024-03-18 10:29:26', NULL),
(40, 'Electricity', '2024-03-21 16:27:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `amount`, `categoryId`, `createdAt`, `updatedAt`) VALUES
(1, 'Winifred Serrano', 28, 25, '2024-03-16 16:08:08', '2024-03-16 16:08:08'),
(2, 'new', 20, 36, '2024-03-16 16:10:11', '2024-03-21 16:50:50'),
(3, 'Chancellor Key', 16, 25, '2024-03-16 16:11:54', '2024-03-16 16:11:54'),
(4, 'Rachel Vinson', 46, 25, '2024-03-16 18:53:09', '2024-03-16 18:53:09'),
(5, 'Kylan Joseph', 95, 35, '2024-03-16 18:54:30', '2024-03-16 18:54:30'),
(6, 'Jacob Suarez', 95, 25, '2024-03-16 18:54:52', '2024-03-16 18:54:52'),
(7, 'Cynthia Hubbard', 58, 25, '2024-03-18 10:09:30', '2024-03-18 10:09:30'),
(8, 'Jemima Livingston', 1, 22, '2024-03-18 10:26:35', '2024-03-18 10:26:35'),
(9, 'Ronan Roberson', 16, 21, '2024-03-18 15:15:39', '2024-03-18 15:15:39'),
(10, 'Russell Logan', 88, 21, '2024-03-18 15:16:40', '2024-03-18 15:16:40'),
(11, 'Candace Rodgers', 55, 38, '2024-03-18 15:58:59', '2024-03-18 15:58:59'),
(12, 'tester', 30, 37, '2024-03-18 16:04:42', '2024-03-21 16:52:14'),
(13, 'Taylor Floyd', 64, 39, '2024-03-18 16:05:18', '2024-03-18 16:05:18'),
(14, 'Christopher Daniel', 94, 37, '2024-03-18 16:07:16', '2024-03-18 16:07:16'),
(15, 'Inga Hardin', 4, 21, '2024-03-18 18:40:49', '2024-03-18 18:40:49'),
(16, 'Reagan Mcdonald', 92, 39, '2024-03-18 18:44:38', '2024-03-18 18:44:38'),
(17, 'Catherine Sanders', 56, 37, '2024-03-18 18:56:22', '2024-03-18 18:56:22'),
(18, 'test', 10, 39, '2024-03-21 15:46:20', '2024-03-21 15:46:20'),
(19, 'june', 100, 40, '2024-03-21 16:27:31', '2024-03-21 16:27:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
