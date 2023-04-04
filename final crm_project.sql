-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2023 at 03:44 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `delete_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '0 is Active 1 is Inactive ',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `category_name`, `delete_status`, `created_date`) VALUES
(1, 1, 'Doors', '0', '2023-03-03 17:33:51'),
(2, 1, 'Window', '0', '2023-03-06 09:08:58'),
(7, 1, ' Doors', '1', '2023-03-29 04:21:02'),
(8, 1, ' Doors', '0', '2023-03-29 04:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `delete_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '0 = Active 1 Inactive',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `company_name`, `delete_status`, `created_date`) VALUES
(1, 1, 'Tech Mahindraaa', '0', '2023-03-07 10:24:32'),
(2, 1, 'Altruist', '0', '2023-03-07 10:25:33'),
(3, 2, 'Info Tech', '0', '2023-03-09 08:50:43'),
(4, 1, 'other', '0', '2023-03-09 15:09:52'),
(5, 1, 'deppankar', '0', '2023-03-23 07:36:11'),
(6, 1, ' deppankar', '0', '2023-03-24 10:49:01'),
(7, 1, 'Deppankar', '0', '2023-03-29 04:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `company_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `delete_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT 'o Active 1 inactive',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `company_id`, `user_id`, `address`, `email`, `phone`, `delete_status`, `create_date`) VALUES
(1, 1, 1, 'Mohali', 'vinay@gmail.com', '1023456789', '0', '2023-03-07 10:47:20'),
(2, 2, 1, 'chandigarh', 'arun@gmail.com', '1234567890', '0', '2023-03-07 10:58:25'),
(3, 1, 2, 'Mohali', 'sumit@gmail.com', '8529637417', '0', '2023-03-09 08:52:37'),
(4, 3, 3, 'chandigarh', 'ankit@gmail.com', '9516328746', '0', '2023-03-09 09:10:43'),
(5, 4, 1, 'H No 123 ABC', 'ssss@gmail.com', '0123456789', '0', '2023-03-09 09:40:13'),
(6, 1, 1, 'H No 123 ABC', 'kunal001@gmail.com', '0123456789', '0', '2023-03-16 08:29:37'),
(7, 1, 1, 's', 'asd@yopmail.comas', '0123456789', '0', '2023-03-16 08:54:46'),
(8, 2, 1, 'sad', 'kunal@gmail.com', '0123456789', '0', '2023-03-16 08:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `query_type` varchar(50) NOT NULL,
  `message` varchar(350) DEFAULT NULL,
  `notification` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1= seen,2 = unseen',
  `work_status` enum('1','2') DEFAULT NULL COMMENT '1 = approved , 2 = rejected',
  `delete_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '0 = Active ,1 = inactive',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `query_type`, `message`, `notification`, `work_status`, `delete_status`, `created_date`) VALUES
(1, 'dvd', 'dd@yopmail.com', '1234567890', 'Doors and Windows', 'fghj', '1', NULL, '1', '2023-03-14 11:08:57'),
(2, 'dd', 'ddaed@gmail.com', '0123456789', 'Doors and Windows', 'fg', '1', '1', '0', '2023-03-15 04:18:17'),
(3, 'hfhf', 'dgdf@hjhg.com', '0123456789', 'Doors and Windows', 'bgf', '1', '1', '0', '2023-03-15 09:41:37'),
(4, 'sdffds', 'fdssdf@gmail.com', '8054636254', 'Windows', 'dddfsdsf', '1', NULL, '0', '2023-03-15 09:47:22'),
(5, 'sdf', 'admin123@gmail.com', '0123456789', 'Windows', 'sf', '1', NULL, '0', '2023-03-15 10:25:42'),
(6, 'sdf', 'admin123@gmail.com', '1234567890', 'Windows', 'sdf', '1', NULL, '0', '2023-03-15 10:29:51'),
(7, 'Sachin Singh', 'admin123@gmail.com', '8456321794', 'Windows', 'asdsad', '1', NULL, '0', '2023-03-15 10:47:57'),
(8, 'Kunal Singh', 'admin123@gmail.com', '1023456789', 'Windows', 'ry', '1', NULL, '0', '2023-03-15 10:52:20'),
(9, 'hjkjh', 'dd@yopmail.com', '0123456789', 'Doors and Windows', 'dgf', '1', NULL, '0', '2023-03-15 11:41:20'),
(10, 'dssfd', 'dd@yopmail.com', '1023456789', 'Doors and Windows', 'dfdd', '1', NULL, '0', '2023-03-15 11:51:41'),
(11, 'dsgd', 'ddaed@gmail.com', '6230254103', 'Repair Doors & Windows', 'gfhf', '1', NULL, '0', '2023-03-15 12:03:23'),
(12, 'Sachin Singh', 'admin123@gmail.com', '1234567890', 'Windows', 'gfdh', '1', NULL, '0', '2023-03-15 13:00:39'),
(13, 'Aman', 'dd@yopmail.com', '9876543215', 'Doors and Windows', 'dfhfg', '1', NULL, '0', '2023-03-16 04:47:49'),
(14, 'Sameera', 'dsasdasda@gmail.com', '9876543215', 'Doors and Windows', 'sdfgdf', '1', NULL, '0', '2023-03-16 05:24:35'),
(15, 'Manish Singh', 'manish@yopmail.com', '9876543215', 'Doors and Windows', 'Jante ho darwaja bnaoo', '1', '1', '0', '2023-03-16 07:14:28'),
(16, 'hey', 'manojkumaryadav7889@gmail.com', '0123456789', 'Doors', 'sfasfsf', '1', '1', '0', '2023-03-16 08:48:58'),
(17, 'arun', 'arun@yopmail.com', '9876543215', 'Doors and Windows', 'sadfsa', '1', NULL, '0', '2023-03-17 07:35:04'),
(18, 'Aman', 'aman@yopmail.com', '9876543215', 'Windows', 'aaaaa', '1', NULL, '0', '2023-03-17 07:51:20'),
(19, 'sumit', 'sumit@yopmail.com', '9876543215', 'Doors and Windows', 'sdffffffffg', '1', NULL, '0', '2023-03-17 07:53:59'),
(20, 'kamal', 'kamal@yopmail.com', '9876543215', 'Windows', 'rdhg', '1', NULL, '0', '2023-03-17 07:56:55'),
(21, 'arun', 'arun@yopmail.com', '9876543215', 'Doors and Windows', 'asfdsgd', '1', NULL, '0', '2023-03-17 08:41:16'),
(22, 'fb', 'dd@yopmail.com', '9876543215', 'Windows', 'tgj', '1', NULL, '0', '2023-03-17 08:44:19'),
(23, 'gdfxgc', 'dd@yopmail.com', '0123456789', 'Doors and Windows', 'dfgbfdh', '1', NULL, '0', '2023-03-17 08:48:08'),
(24, 'dgdf', 'dd@yopmail.com', '9876543215', 'Windows', 'dxgdf', '1', NULL, '0', '2023-03-17 09:11:27'),
(25, 'hvbjm', 'dd@yopmail.com', '9876543215', 'Windows', 'yhgj', '1', NULL, '0', '2023-03-17 09:20:45'),
(26, 'asf', 'dd@yopmail.com', '9876543215', 'Doors', 'sdf', '1', NULL, '0', '2023-03-17 10:29:27'),
(27, 'Manish', 'manishsingh19970@gmail.com', '9651915498', 'Doors', 'manish', '1', NULL, '0', '2023-03-17 12:06:16'),
(28, 'vghj', 'manish@mail.com', '1234567890', 'Doors and Windows', 'hgjbhj', '1', NULL, '0', '2023-03-17 12:08:43'),
(29, 'manish', 'manish@mail.com', '2222222222', 'Doors', 'dfghd', '1', NULL, '0', '2023-03-17 12:55:29'),
(30, 'Kunal', 'kunal02chd@gmail.com', '6230254103', 'Repair Doors & Windows', '', '1', NULL, '0', '2023-03-21 08:44:29'),
(31, 'manish', 'manishsingh19970@gmail.com', '9651915498', 'Doors', 'hello team ', '1', '1', '0', '2023-03-23 04:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `company_id` int DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `work_title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `delete_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT 'o = Active ,1 =inactive',
  `stages` enum('0','1','2','3','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1' COMMENT '0 = lost ,1 awerness,2 quilified , 3 Opportunity,4 won',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `user_id`, `company_id`, `name`, `price`, `work_title`, `delete_status`, `stages`, `created_date`) VALUES
(1, 1, 1, 'Sachin Singh', 42000, 'doors', '0', '4', '2023-03-07 11:26:01'),
(2, 1, 4, 'Kunal Singh', 42000, 'doors', '0', '3', '2023-03-07 11:26:31'),
(3, 1, 4, 'Sachin Singh', 42000, 'doors', '0', '4', '2023-03-07 11:34:49'),
(4, 1, 2, 'ravi', 42000, 'doors', '0', '4', '2023-03-07 11:37:21'),
(5, 1, 3, 'kunal', 2560, 'door', '1', '1', '2023-03-09 04:36:33'),
(6, 2, 1, 'Anu Priya', 6000, 'Wooden Doors And Windows ', '1', '4', '2023-03-09 08:58:56'),
(7, 2, 2, 'Mohit Verma', 10000, 'Glass Door And Window', '0', '1', '2023-03-09 08:59:55'),
(8, 3, 2, 'Dhiraj chaudhary', 120000, 'Repair Doors And Windows', '0', '4', '2023-03-09 09:05:01'),
(9, 3, 4, 'Priyanka Singh', 5000, 'Steel Windows', '0', '1', '2023-03-09 09:08:09'),
(32, 1, 1, 'Sachin Singh', 42000, 'doors', '1', '1', '2023-03-13 07:32:42'),
(33, 1, 2, 'Sachin Singh', 42000, 'doors', '1', '1', '2023-03-13 07:32:51'),
(34, 1, 3, 'Sachin Singh', 42000, 'doors', '1', '1', '2023-03-13 08:34:24'),
(35, 1, 4, 'Sachin Singh', 42000, 'doors', '1', '1', '2023-03-13 09:44:33'),
(36, 1, 1, 'Sachin Singh', 42000, 'doors', '1', '1', '2023-03-13 09:45:52'),
(37, 1, 1, 'Sachin Singh', 42000, 'doors', '1', '1', '2023-03-13 10:02:07'),
(38, 1, 2, 'sachin', 320, 'ohh yeah', '1', '1', '2023-03-16 05:29:06'),
(39, 1, 3, 'this is a test lead', 1000, 'doors', '1', '1', '2023-03-16 08:14:21'),
(40, 1, 2, 'Sachin Singh', 42000, 'doors', '0', '2', '2023-03-17 10:38:54'),
(41, 1, 4, 'manish', 20, 'sjbhk', '0', '1', '2023-03-21 04:44:53'),
(42, 1, 4, 'manoj', 500, 'doors', '0', '3', '2023-03-21 08:48:22'),
(43, 1, 5, 'deepa', 500, 'labour', '0', '1', '2023-03-23 07:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `lead_contacts`
--

CREATE TABLE `lead_contacts` (
  `id` int NOT NULL,
  `lead_id` int DEFAULT NULL,
  `contact` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lead_contacts`
--

INSERT INTO `lead_contacts` (`id`, `lead_id`, `contact`, `created_date`) VALUES
(1, 1, '5896427258', '2023-03-07 11:26:01'),
(2, 2, '7894561235', '2023-03-07 11:26:31'),
(3, 3, '5896427854', '2023-03-07 11:34:49'),
(4, 4, '7894561235', '2023-03-07 11:37:21'),
(5, 5, '7894561235', '2023-03-09 04:36:33'),
(6, 6, '0897526432', '2023-03-09 08:58:56'),
(7, 7, '8975642318', '2023-03-09 08:59:55'),
(8, 8, '8529637418', '2023-03-09 09:05:01'),
(9, 9, '7563214895', '2023-03-09 09:08:09'),
(10, 21, '6230254103', '2023-03-13 07:11:20'),
(11, 22, '6230254103', '2023-03-13 07:12:13'),
(12, 38, '9876549870', '2023-03-16 05:29:06'),
(13, 39, '0123456789', '2023-03-16 08:14:21'),
(14, 40, '7894561235', '2023-03-17 10:38:54'),
(15, 41, '6523055415', '2023-03-21 04:44:53'),
(16, 42, '1234567890', '2023-03-21 08:48:22'),
(17, 43, '1234567890', '2023-03-23 07:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `contact_us_id` int NOT NULL,
  `transaction_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `priority` float DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `contact_us_id`, `transaction_id`, `status`, `priority`, `created_date`) VALUES
(1, 1, NULL, '0', 7, '2023-03-14 11:08:57'),
(2, 2, NULL, '0', 7, '2023-03-15 04:18:17'),
(3, 3, NULL, '0', 7, '2023-03-15 09:41:37'),
(4, 4, NULL, '0', 5, '2023-03-15 09:47:22'),
(5, 5, NULL, '0', 7, '2023-03-15 10:25:42'),
(6, 6, NULL, '0', 5, '2023-03-15 10:29:51'),
(7, 7, NULL, '0', 5, '2023-03-15 10:47:57'),
(8, 8, NULL, '0', 7, '2023-03-15 10:52:20'),
(9, 9, NULL, '0', 10, '2023-03-15 11:41:20'),
(10, 10, NULL, '0', 7, '2023-03-15 11:51:41'),
(11, 11, NULL, '0', 10, '2023-03-15 12:03:23'),
(12, 12, NULL, '0', 10, '2023-03-15 13:00:39'),
(13, 13, NULL, '0', 10, '2023-03-16 04:47:49'),
(14, 14, NULL, '0', 10, '2023-03-16 05:24:35'),
(15, 15, NULL, '0', 10, '2023-03-16 07:14:28'),
(16, 16, NULL, '0', 10, '2023-03-16 08:48:58'),
(17, 17, NULL, '0', 5, '2023-03-17 07:35:04'),
(18, 18, NULL, '0', 5, '2023-03-17 07:51:20'),
(19, 19, NULL, '0', 5, '2023-03-17 07:53:59'),
(20, 20, NULL, '0', 5, '2023-03-17 07:56:55'),
(21, 21, NULL, '0', 5, '2023-03-17 08:41:16'),
(22, 22, NULL, '0', 5, '2023-03-17 08:44:19'),
(23, 23, NULL, '0', 7, '2023-03-17 08:48:08'),
(24, 24, NULL, '0', 5, '2023-03-17 09:11:27'),
(25, 25, NULL, '0', 10, '2023-03-17 09:20:45'),
(26, 26, NULL, '0', 5, '2023-03-17 10:29:27'),
(27, 27, NULL, '0', 5, '2023-03-17 12:06:16'),
(28, 28, NULL, '0', 5, '2023-03-17 12:08:43'),
(29, 29, NULL, '0', 5, '2023-03-17 12:55:29'),
(30, 30, NULL, '0', 7, '2023-03-21 08:44:29'),
(31, 31, NULL, '0', 10, '2023-03-23 04:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `short_discription` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `product_tags` text NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '"0 Active 1 inactive"',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '"0 Active 1 Inactive"',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `product_name`, `short_discription`, `description`, `product_tags`, `product_image`, `status`, `delete_status`, `created_date`) VALUES
(2, 1, 1, 'Glass Door', 'It was popularised in the 1960s with the release of Letraset sheets ', 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like', 'Glass', 'etched-sandblasted-62.jpg', '0', '0', '2023-03-03 12:39:04'),
(3, 1, 1, 'Wooden Door', 'containing Lorem Ipsum passages, and more recently', 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like.', 'Wood', 'solid-wooden-door-500x500.jpg', '0', '0', '2023-03-03 12:42:31'),
(4, 1, 1, 'Steel Doors', 'and more recently with desktop publishing', 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like', 'Glass', 'images.jpeg', '0', '0', '2023-03-03 12:50:30'),
(5, 1, 1, 'Fiberglass Door', 'including versions of Lorem Ipsum', 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'fiber', 'glass-doors.jpg', '0', '0', '2023-03-09 07:41:15'),
(6, 1, 2, 'Double Hung Windows', 'including versions of Lorem Ipsum', 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'double', 'Window-double-hung.jpg', '0', '0', '2023-03-09 07:51:36'),
(7, 1, 2, 'Bay Window', 'including versions of Lorem Ipsum', 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'window', 'awning-window.jpg', '0', '0', '2023-03-09 07:54:01'),
(8, 1, 2, 'Picture Windows', 'including versions of Lorem Ipsum', 'Whether the view outside your home is a lush green backyard or a mountain range, the best way to fully enjoy your view is with beautiful large picture windows. Picture windows are fixed windows that can not be opened, but are often paired with other windows for design and flexible', 'picture', '12-picture-768x541.jpg', '0', '0', '2023-03-09 07:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `assigned_by` int DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '(''0'' not started ''1'' Under Process ''2'' Completed)',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '(0 not delete 1 delete)',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `user_id`, `assigned_by`, `status`, `delete_status`, `created_date`) VALUES
(1, 3, 1, '0', '0', '2023-03-30 05:33:52'),
(2, 6, 1, '0', '0', '2023-03-30 05:33:52'),
(3, 7, 1, '0', '0', '2023-03-30 05:33:52'),
(4, 11, 1, '0', '0', '2023-03-30 05:33:52'),
(5, 3, 1, '0', '0', '2023-03-30 06:44:47'),
(6, 6, 1, '0', '0', '2023-03-30 06:44:47'),
(7, 2, 1, '0', '0', '2023-03-31 04:05:29'),
(8, 3, 1, '0', '0', '2023-03-31 04:05:29'),
(9, 4, 1, '0', '0', '2023-03-31 04:05:29'),
(10, 6, 1, '0', '0', '2023-03-31 04:05:29'),
(11, 7, 1, '0', '0', '2023-03-31 04:05:29'),
(12, 2, 1, '0', '0', '2023-04-04 09:59:57'),
(13, 4, 1, '0', '0', '2023-04-04 09:59:57'),
(14, 3, 1, '0', '0', '2023-04-04 10:08:09'),
(15, 7, 1, '0', '0', '2023-04-04 10:08:09'),
(16, 3, 1, '0', '0', '2023-04-04 10:08:54'),
(17, 3, 1, '0', '0', '2023-04-04 10:10:15'),
(18, 4, 1, '0', '0', '2023-04-04 10:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `task_assigned`
--

CREATE TABLE `task_assigned` (
  `id` int NOT NULL,
  `task_id` int DEFAULT NULL,
  `task_name` varchar(250) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `task_assigned`
--

INSERT INTO `task_assigned` (`id`, `task_id`, `task_name`, `due_date`, `create_at`) VALUES
(1, 1, 'Hello \r\nHow Are you', '2023-03-31 11:03:46', '2023-03-30 05:33:52'),
(2, 2, 'Hello \r\nHow Are you', '2023-03-31 11:03:46', '2023-03-30 05:33:52'),
(3, 3, 'Hello \r\nHow Are you', '2023-03-31 11:03:46', '2023-03-30 05:33:52'),
(4, 4, 'Hello \r\nHow Are you', '2023-03-31 11:03:46', '2023-03-30 05:33:52'),
(5, 5, 'hello', '2023-03-30 12:14:44', '2023-03-30 06:44:47'),
(6, 6, 'hello', '2023-03-30 12:14:44', '2023-03-30 06:44:47'),
(7, 7, 'sdfsdffs', '2023-03-31 09:35:20', '2023-03-31 04:05:29'),
(8, 8, 'sdfsdffs', '2023-03-31 09:35:20', '2023-03-31 04:05:29'),
(9, 9, 'sdfsdffs', '2023-03-31 09:35:20', '2023-03-31 04:05:29'),
(10, 10, 'sdfsdffs', '2023-03-31 09:35:20', '2023-03-31 04:05:29'),
(11, 11, 'sdfsdffs', '2023-03-31 09:35:20', '2023-03-31 04:05:29'),
(12, 12, 'hello', '2023-04-05 15:29:52', '2023-04-04 09:59:57'),
(13, 13, 'hello', '2023-04-05 15:29:52', '2023-04-04 09:59:57'),
(14, 14, 'dfsdf', NULL, '2023-04-04 10:08:09'),
(15, 15, 'dfsdf', NULL, '2023-04-04 10:08:09'),
(16, 16, 'sadsad', '2023-04-05 15:38:50', '2023-04-04 10:08:54'),
(17, 17, 'sdfdfsdfdsf', '2023-04-05 15:40:11', '2023-04-04 10:10:15'),
(18, 18, 'sdfdfsdfsdf', '2023-04-05 15:41:24', '2023-04-04 10:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `added_by` int DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '0 is Active , 1 is Inactive',
  `role` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '"0 for User 1 for Admin"',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '"0 for active 1 for inactive"',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `password`, `added_by`, `status`, `role`, `delete_status`, `created_date`) VALUES
(1, NULL, 'mayank@gmail.com', '$2y$10$dKzveczHBxtU9VZ0dpMXoecZ6R5UGOQ3/UgEyCccCPBkeq7RmiFyy', NULL, '0', '1', '0', '2023-03-01 10:26:50'),
(2, NULL, 'amit@gmail.com', '$2y$10$dKzveczHBxtU9VZ0dpMXoecZ6R5UGOQ3/UgEyCccCPBkeq7RmiFyy', 1, '0', '0', '0', '2023-03-02 12:32:46'),
(3, NULL, 'kunal@gmail.com', '$2y$10$PkFFBOtuZyi3OXxX9O5ZkOgHlmhLe9WPhmfrid0ehmhVUQMKpKu5m', 1, '0', '0', '0', '2023-03-06 08:55:58'),
(4, NULL, 'anuj@gmail.com', '$2y$10$8.k2JJ5kTk6UljorQ2Y7R.UBdu3gWp/IysC5M0RHaWWf/FlqaIfiS', 1, '0', '0', '0', '2023-03-06 08:58:16'),
(5, NULL, 'rahul@gmail.com', '$2y$10$Lu4kKTPq/sdGdXkE9OBqoOnzn/Qll/UaZI/caINOHFhgdaY9Q3UT2', 1, '0', '0', '1', '2023-03-09 04:16:32'),
(6, NULL, 'kl@gmail.com', '$2y$10$fVRz8R3S0huTbLYkjKOQCOihzV8u6GwM38Sj0C2/T6TqqcOtXRtee', 1, '0', '0', '0', '2023-03-23 05:07:28'),
(7, NULL, 'manish23@teqmavens.com', '$2y$10$ZZvkbpNb7/IoEba.I5OYr.IkqThg8HlPidvE2BegjD1JWKf1c.TMK', 1, '0', '0', '0', '2023-03-28 06:16:34'),
(8, NULL, 'manish21@gmail.com', '$2y$10$ygGYOhWwxLPlspY48.Uf0u9gju4o7GsG7qwZkiq9VHXXn3jcBLsW.', 1, '0', '0', '0', '2023-03-28 06:27:36'),
(9, NULL, 'manish100@gmail.com', '$2y$10$XcpZHfEC1QOto2mv4JmbeO07N6aEEdnn5pDGYDgLw6/.vgRPBN.KK', 1, '0', '0', '0', '2023-03-28 06:28:58'),
(10, NULL, 'manishd@mail.com', '$2y$10$vTW16RiTOpKYfEbJUw9vduruTkuxUk2wexTkhM7n..vMkatkmNJtO', 1, '0', '0', '0', '2023-03-28 06:32:23'),
(11, NULL, 'sddds@gmail.com', '$2y$10$eok96Fqkc2xrKcYh.49zXuhZY7jOQT8TRplWCogmL34hnvaMmA5p.', 1, '0', '0', '0', '2023-03-28 06:33:22'),
(12, NULL, 'yadavblu@gmail.c', '$2y$10$j1S8vtSu.9Z4UcGHX64poeXyIKn3FFA3dnVbYxdv1ieRF2NcAZlvu', 1, '0', '0', '0', '2023-03-29 04:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `last_name`, `address`, `contact`, `created_date`, `profile_image`) VALUES
(1, 1, 'Mayank', 'Gupta', 'kkkkkkkkkkk 111111', '0', '2023-03-01 10:26:50', 'team-2.jpg'),
(2, 2, 'Amit', 'Kumar', 'Patiala Punjab', '5469213784', '2023-03-02 12:32:46', 'person_2.jpg'),
(3, 3, 'Kunal', 'Singh', 'H No 123 ABC', '5469213784', '2023-03-06 08:55:58', 'team-3.jpg'),
(4, 4, 'Anuj', 'Kumars', 'H No 123 ABC', '9513627845', '2023-03-06 08:58:16', 'default.jpg'),
(5, 5, 'Rahul', 'Kumar', 'Chandigarh', '9513627845', '2023-03-09 04:16:32', 'default.jpg'),
(6, 6, 'kunal', 'singh', 'kumal', '1234567890', '2023-03-23 05:07:28', 'default.jpg'),
(7, 7, 'Singh', 'RaunK', 'PEERMUCHALA ,TRICITY', '9651915497', '2023-03-28 06:16:34', 'default.jpg'),
(8, 8, 'manish', 'singh', 'm,anish', '5821479630', '2023-03-28 06:27:36', 'default.jpg'),
(9, 9, 'Signhh', 'ajl', 'manish', '4785963210', '2023-03-28 06:28:58', 'default.jpg'),
(10, 10, 'manishaaa', 'singhff', 'peermuchaala, Tricity', '1234567890', '2023-03-28 06:32:23', 'default.jpg'),
(11, 11, 'manish', 'singhff', 'jghj', '1236547890', '2023-03-28 06:33:22', 'default.jpg'),
(12, 12, 'Bablu', 'Chaudhary', 'Gopalgan', '5201478963', '2023-03-29 04:16:30', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_contacts`
--
ALTER TABLE `lead_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us` (`contact_us_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_assigned`
--
ALTER TABLE `task_assigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `lead_contacts`
--
ALTER TABLE `lead_contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `task_assigned`
--
ALTER TABLE `task_assigned`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
