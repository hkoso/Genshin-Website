-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 06, 2023 at 10:36 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `dish_info`
--

CREATE TABLE `dish_info` (
  `dish_name` varchar(64) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dish_info`
--

INSERT INTO `dish_info` (`dish_name`, `price`) VALUES
('Adeptus_Temptation', 9000),
('Almond_Tofu', 1500),
('Apple', 240),
('Bamboo_Shoot', 240),
('Bamboo_Shoot_Soup', 2500),
('Berry', 150),
('Bird_Egg', 200),
('Cabbage', 120),
('Carrot', 260),
('Chicken_Tofu_Pudding', 6000),
('Chili-Mince_Cornbread_Buns', 2000),
('Come_And_Get_It', 2000),
('Crab', 240),
('Crab_Roe', 1100),
('Crab_Roe_Tofu', 3000),
('Crispy_Potato_Shrimp_Platter', 1800),
('Crystal_Shrimp', 2000),
('Cured_Pork_Dry_Hotpot', 3000),
('Dragon_Beard_Noodles', 2000),
('Fish', 240),
('Flour', 150),
('Fowl', 240),
('Fried_Radish_Balls', 600),
('Fullmoon_Egg', 1500),
('Golden_Shrimp_Balls', 2000),
('Grilled_Tiger_Fish', 500),
('Jade_Parcels', 1500),
('Jewelry_Soup', 2000),
('Jueyun_Chili', 1000),
('Jueyun_Chili_Chicken', 2500),
('Lotus_Head', 300),
('Matsutake', 300),
('Mint_Salad', 1000),
('Mora_Meat', 500),
('Onion', 80),
('Pepper', 80),
('Pop\'s_Teas', 200),
('Potato', 120),
('Qingce_Stir_Fry', 2500),
('Radish', 350),
('Raw_Meat', 240),
('Rice', 100),
('Rice_Buns', 1125),
('Rice_Pudding', 1200),
('Rockin_Riffin_Chicken', 4000),
('Salt', 60),
('Shrimp_Meat', 120),
('Squirrel_Fish', 4000),
('Sugar', 200),
('Sunsettia', 170),
('Tianshu_Meat', 4000),
('Tofu', 100),
('Tomato', 120),
('Universal_Peace', 2500),
('Vegetarian_Abalone', 2500),
('Wanmin_Restaurant_Boiled_Fish', 6000),
('Water', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_contact_info`
--

CREATE TABLE `order_contact_info` (
  `order_id` int NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` char(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_contact_info`
--

INSERT INTO `order_contact_info` (`order_id`, `first_name`, `last_name`, `phone_number`) VALUES
(5, 'Yu', 'Gan', '123-456-7890'),
(4, '飞', '张', '123-456-8970'),
(2, 'Yu', 'Gan', '123-456-7890'),
(1, 'Qing', 'Ke', '123-456-7890'),
(14, 'Gan', 'Yu', '666-888-8888'),
(16, 'Li', 'Zhong', '123-567-4231');

-- --------------------------------------------------------

--
-- Table structure for table `order_deliver_address`
--

CREATE TABLE `order_deliver_address` (
  `order_id` int NOT NULL,
  `suit_number` int NOT NULL,
  `street` varchar(32) NOT NULL,
  `city` varchar(16) NOT NULL,
  `country` varchar(9) NOT NULL,
  `postal_code` char(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_deliver_address`
--

INSERT INTO `order_deliver_address` (`order_id`, `suit_number`, `street`, `city`, `country`, `postal_code`) VALUES
(16, 4, 'YujingTai', 'Liyue Port', 'Liyue', 'V1V 1V1');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_id` int NOT NULL,
  `dish_name` varchar(64) NOT NULL,
  `quantity` int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `dish_name`, `quantity`) VALUES
(5, 'Come_and_Get_It', 1),
(4, 'Cured_Pork_Dry_Hotpot', 2),
(16, 'Squirrel_Fish', 1),
(3, 'Cured_Pork_Dry_Hotpot', 2),
(2, 'Wanmin_Restaurant_Boiled_Fish', 2),
(1, 'Tianshu_Meat', 1),
(11, 'Sugar', 1),
(11, 'Crab', 2),
(17, 'Wanmin_Restaurant_Boiled_Fish', 1),
(16, 'Wanmin_Restaurant_Boiled_Fish', 1),
(14, 'Wanmin_Restaurant_Boiled_Fish', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_mode_info`
--

CREATE TABLE `service_mode_info` (
  `service_mode` int NOT NULL,
  `sevice` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_mode_info`
--

INSERT INTO `service_mode_info` (`service_mode`, `sevice`) VALUES
(0, 'dine_in'),
(1, 'take_out');

-- --------------------------------------------------------

--
-- Table structure for table `time_info`
--

CREATE TABLE `time_info` (
  `order_id` int NOT NULL,
  `year` char(4) NOT NULL,
  `month` char(2) NOT NULL,
  `day` char(2) NOT NULL,
  `hour` char(2) NOT NULL,
  `minute` char(2) NOT NULL,
  `second` char(2) NOT NULL,
  `meridiem` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `time_info`
--

INSERT INTO `time_info` (`order_id`, `year`, `month`, `day`, `hour`, `minute`, `second`, `meridiem`) VALUES
(1, '2022', '05', '09', '06', '18', '11', 'AM'),
(2, '2022', '05', '09', '06', '18', '41', 'AM'),
(9, '2023', '01', '03', '07', '09', '09', 'AM'),
(8, '2023', '01', '03', '07', '04', '18', 'AM'),
(10, '2023', '01', '03', '07', '12', '01', 'AM'),
(7, '2022', '07', '22', '03', '56', '24', 'AM'),
(6, '2022', '07', '22', '03', '38', '40', 'AM'),
(5, '2022', '07', '22', '03', '01', '12', 'AM'),
(4, '2022', '07', '09', '06', '33', '51', 'AM'),
(3, '2022', '05', '09', '06', '30', '18', 'AM'),
(11, '2023', '01', '03', '07', '25', '35', 'AM'),
(12, '2023', '01', '03', '08', '43', '01', 'AM'),
(13, '2023', '01', '03', '08', '46', '43', 'AM'),
(14, '2023', '01', '03', '09', '04', '59', 'AM'),
(15, '2023', '01', '03', '09', '05', '43', 'AM'),
(16, '2023', '01', '03', '09', '06', '09', 'AM'),
(17, '2023', '01', '04', '09', '01', '05', 'AM');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `permission_level` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`username`, `password`, `permission_level`) VALUES
('Xiangling', 'guoba123.', 3),
('Traveller', '589090Abc.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `username` varchar(12) NOT NULL,
  `order_id` int NOT NULL,
  `order_status` int NOT NULL,
  `service_mode` int NOT NULL DEFAULT '-1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`username`, `order_id`, `order_status`, `service_mode`) VALUES
('Traveller', 1, 0, 0),
('Traveller', 4, 0, 0),
('Traveller', 5, 0, 0),
('Traveller', 14, 0, 0),
('Traveller', 16, 0, 1),
('Traveller', 17, -1, -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dish_info`
--
ALTER TABLE `dish_info`
  ADD PRIMARY KEY (`dish_name`);

--
-- Indexes for table `order_contact_info`
--
ALTER TABLE `order_contact_info`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_deliver_address`
--
ALTER TABLE `order_deliver_address`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `time_info`
--
ALTER TABLE `time_info`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
