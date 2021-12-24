-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 23, 2021 at 06:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spizy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id`, `name`, `email`, `password`) VALUES
(1, 'Mr. Hritik Kanojiya', 'hritikkanojiya13@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `cart_data`
--

CREATE TABLE `cart_data` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `dish_id` int(50) NOT NULL,
  `dish_amount` int(50) NOT NULL,
  `dish_quantity` int(50) NOT NULL,
  `status` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_data`
--

INSERT INTO `cart_data` (`id`, `user_id`, `dish_id`, `dish_amount`, `dish_quantity`, `status`) VALUES
(25, 15, 83, 500, 2, '1'),
(26, 15, 82, 900, 2, '1'),
(27, 15, 15, 1140, 2, '0'),
(28, 15, 7, 480, 1, '1'),
(29, 15, 78, 400, 2, '1'),
(30, 15, 79, 450, 3, '1'),
(31, 15, 87, 400, 4, '1'),
(32, 11, 18, 600, 2, '1'),
(33, 11, 19, 200, 2, '1'),
(34, 11, 24, 700, 2, '1'),
(35, 14, 13, 1200, 3, '0'),
(36, 14, 84, 2000, 4, '1'),
(37, 11, 53, 250, 1, '0'),
(38, 1, 80, 200, 1, '1'),
(39, 16, 80, 600, 3, '1'),
(40, 16, 79, 450, 3, '1'),
(41, 16, 4, 1000, 2, '1'),
(42, 16, 83, 500, 2, '1'),
(43, 16, 55, 210, 3, '1'),
(44, 16, 78, 600, 3, '1'),
(45, 16, 79, 150, 1, '1'),
(46, 16, 82, 450, 1, '1'),
(47, 16, 87, 100, 1, '1'),
(48, 16, 7, 480, 1, '1'),
(49, 16, 9, 600, 1, '1'),
(50, 16, 84, 500, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `chef_data`
--

CREATE TABLE `chef_data` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chef_data`
--

INSERT INTO `chef_data` (`id`, `name`, `email`, `password`) VALUES
(5, 'Hritik Kanojiya', 'hritikkanojiya13@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_data`
--

CREATE TABLE `contact_us_data` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us_data`
--

INSERT INTO `contact_us_data` (`id`, `user_id`, `name`, `email`, `phone`, `message`, `date`, `time`) VALUES
(1, 11, 'Hritik Rajdev Kanojiya', 'hritikkanojiya13@gmail.com', '+917506211129', 'aasasa', '2021/02/24', '21:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `dine_in_data`
--

CREATE TABLE `dine_in_data` (
  `id` int(50) NOT NULL,
  `order_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `person` int(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dine_in_data`
--

INSERT INTO `dine_in_data` (`id`, `order_id`, `name`, `email`, `contact`, `message`, `person`, `date`, `time`) VALUES
(3, 48, 'Hritik Rajdev Kanojiya', 'hritikkanojiya13@gmail.com', '+917506211129', 'jfyujhvj', 1, '04/21/2021', '7:13 PM'),
(4, 50, 'Hritik Rajdev Kanojiya', 'confusedgenius13@gmail.com', '+917506211129', 'ere', 1, '04/21/2021', '5:19 PM');

-- --------------------------------------------------------

--
-- Table structure for table `door_bell_data`
--

CREATE TABLE `door_bell_data` (
  `id` int(50) NOT NULL,
  `order_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `door_bell_data`
--

INSERT INTO `door_bell_data` (`id`, `order_id`, `user_id`, `name`, `contact`, `address`, `message`) VALUES
(28, 42, 11, 'Hritik Rajdev Kanojiya', '+917506211129', 'Room no2,ShivShankar Singh Chawl\nGanesh Chowk, Kajupada, Borivali (East)', 'fdfd'),
(29, 46, 1, 'Hritik Rajdev Kanojiya', '+917506211129', 'Room no2,ShivShankar Singh Chawl\nGanesh Chowk, Kajupada, Borivali (East)', 'xdas'),
(30, 47, 1, 'Hritik Rajdev Kanojiya', '+917506211129', 'Room no2,ShivShankar Singh Chawl\nGanesh Chowk, Kajupada, Borivali (East)', 'avsas'),
(31, 49, 16, 'Hritik Rajdev Kanojiya', '+917506211129', 'Room no2,ShivShankar Singh Chawl\nGanesh Chowk, Kajupada, Borivali (East)', ''),
(32, 51, 16, 'Hritik Rajdev Kanojiya', '+917506211129', 'Room no2,ShivShankar Singh Chawl\nGanesh Chowk, Kajupada, Borivali (East)', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_data`
--

CREATE TABLE `menu_data` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_data`
--

INSERT INTO `menu_data` (`id`, `name`, `category`, `picture`, `price`) VALUES
(1, 'Grilled Chicken', 'Non-Veg', '', 350),
(2, 'Chicken 65', 'Non-Veg', '', 300),
(3, 'Butter Chicken', 'Non-Veg', '', 400),
(4, 'Chicken Kolhapuri', 'Non-Veg', '', 500),
(5, 'Spicy Chicken Masala', 'Non-Veg', '', 550),
(6, 'Chicken Chettinad', 'Non-Veg', '', 350),
(7, 'Kadai Chicken', 'Non-Veg', '', 480),
(8, 'Malvani Chicken Curry', 'Non-Veg', '', 450),
(9, 'Chicken Tikka Masala', 'Non-Veg', '', 600),
(10, 'Mutton Korma', 'Non-Veg', '', 650),
(11, 'Fish Molee', 'Non-Veg', '', 370),
(12, 'Prawns Kuzhambu', 'Non-Veg', '', 350),
(13, 'Naadan Crab Masala', 'Non-Veg', '', 400),
(14, 'Hyderabadi Chicken Biryani', 'Non-Veg', '', 500),
(15, 'Mutton Kofte', 'Non-Veg', '', 570),
(16, 'Mattar paneer', 'Veg', '', 400),
(17, 'Malai kofta', 'Veg', '', 420),
(18, 'Rajma', 'Veg', '', 300),
(19, 'Misal pav', 'Veg', '', 100),
(20, 'Dal makhani', 'Veg', '', 200),
(21, 'Palak paneer', 'Veg', '', 350),
(22, 'Chana Masala', 'Veg', '', 410),
(23, 'Hyderabadi Baingan', 'Veg', '', 362),
(24, 'Chole (Chickpea Curry)', 'Veg', '', 350),
(25, 'Paneer Bhurji', 'Veg', '', 380),
(26, 'Tawa Paneer Masala', 'Veg', '', 430),
(27, 'Bhindi Fry', 'Veg', '', 200),
(28, 'Jeera Aloo', 'Veg', '', 220),
(29, 'Bhindi Do Pyaza', 'Veg', '', 300),
(30, 'Tawa Mushroom', 'Veg', '', 500),
(46, 'Barfi', 'Dessert', '', 120),
(47, 'Carrot Halwa', 'Dessert', '', 150),
(48, 'Gulab Jamun', 'Dessert', '', 100),
(49, 'Rasgulla', 'Dessert', '', 130),
(50, 'Basundi', 'Dessert', '', 200),
(51, 'Mysore Pak', 'Dessert', '', 80),
(52, 'Soan Papdi', 'Dessert', '', 120),
(53, 'Masurpeda', 'Dessert', '', 250),
(54, 'Kheer/Payasam', 'Dessert', '', 150),
(55, 'Kulfi', 'Dessert', '', 70),
(56, 'Laddu', 'Dessert', '', 200),
(57, 'Rasmalai', 'Dessert', '', 180),
(58, 'Peda', 'Dessert', '', 130),
(59, 'Mishra Doha', 'Dessert', '', 140),
(60, 'Jalebi', 'Dessert', '', 110),
(61, 'Mojito', 'Drinks', '', 170),
(62, 'Long Island Iced Tea', 'Drinks', '', 150),
(63, 'Daiquiri', 'Drinks', '', 160),
(64, 'Margarita', 'Drinks', '', 200),
(65, 'Bloody Mary', 'Drinks', '', 150),
(66, 'Cosmopolitan', 'Drinks', '', 130),
(67, 'Tom Collins', 'Drinks', '', 100),
(68, 'Moscow Mule', 'Drinks', '', 120),
(69, 'Screwdriver', 'Drinks', '', 220),
(70, 'Hurricane', 'Drinks', '', 130),
(71, 'Martini', 'Drinks', '', 190),
(72, 'Tequila Sunrise', 'Drinks', '', 250),
(73, 'Sangria', 'Drinks', '', 150),
(74, 'Aviation', 'Drinks', '', 130),
(75, 'Brandy Crusta', 'Drinks', '', 150),
(76, 'Undhiyu', 'Hot-Dishes', '', 300),
(77, 'Chole Bhature', 'Hot-Dishes', '', 450),
(78, 'Pav Bhaji', 'Hot-Dishes', '', 200),
(79, 'Masala Dosa', 'Hot-Dishes', '', 150),
(80, 'Dhokla', 'Hot-Dishes', '', 200),
(81, 'Dum Aloo', 'Hot-Dishes', '', 300),
(82, 'Tandoori Chicken', 'Hot-Dishes', '', 450),
(83, 'Paneer Tikka ', 'Veg', '', 250),
(84, 'Chicken Tikka Masala ', 'Non-Veg', '', 500),
(85, 'Mooncake ', 'Dessert', '', 150),
(86, 'Amaretto Sour', 'Drink', '', 150),
(87, 'Gajar ka Halwa', 'Hot-Dishes', '', 100);

-- --------------------------------------------------------

--
-- Table structure for table `order_data`
--

CREATE TABLE `order_data` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `order_details` varchar(100) NOT NULL,
  `order_quantity` varchar(100) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_data`
--

INSERT INTO `order_data` (`id`, `user_id`, `order_details`, `order_quantity`, `total_amount`, `type`, `date`, `time`) VALUES
(42, 11, '[\"18\",\"19\",\"24\"]', '[\"2\",\"2\",\"2\"]', '1500', 'Door-Bell', '2021/02/23', '17:12:34'),
(43, 11, '[\"53\"]', '[\"1\"]', '250', 'Dine-In', '2021/02/24', '21:33:36'),
(44, 11, '[\"53\"]', '[\"1\"]', '250', 'Door-Bell', '2021/02/24', '21:34:27'),
(45, 1, '[\"80\"]', '[\"1\"]', '200', 'Dine-In', '2021/04/02', '08:02:45'),
(46, 1, '[\"80\"]', '[\"1\"]', '200', 'Door-Bell', '2021/04/02', '08:03:21'),
(47, 1, '[\"80\"]', '[\"1\"]', '200', 'Door-Bell', '2021/04/02', '17:27:29'),
(48, 16, '[\"80\",\"79\",\"4\",\"83\",\"55\"]', '[\"3\",\"3\",\"2\",\"2\",\"3\"]', '2760', 'Dine-In', '2021/04/21', '17:13:43'),
(49, 16, '[\"78\"]', '[\"3\"]', '600', 'Door-Bell', '2021/04/21', '17:18:11'),
(50, 16, '[\"79\"]', '[\"1\"]', '150', 'Dine-In', '2021/04/21', '17:18:59'),
(51, 16, '[\"82\",\"87\",\"7\",\"9\",\"84\"]', '[\"1\",\"1\",\"1\",\"1\",\"1\"]', '2130', 'Door-Bell', '2021/04/21', '17:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `payment_data`
--

CREATE TABLE `payment_data` (
  `id` int(50) NOT NULL,
  `order_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `cnum` varchar(100) NOT NULL,
  `total_amount` int(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `payment_status` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_data`
--

INSERT INTO `payment_data` (`id`, `order_id`, `user_id`, `fname`, `lname`, `cnum`, `total_amount`, `date`, `time`, `payment_status`) VALUES
(26, 42, 11, 'Hritik', 'Kanojiya', '775757', 1550, '2021/02/23', '17:13:01', 1),
(28, 48, 16, 'Hritik', 'Kanojiya', '45021', 2810, '2021/04/21', '17:14:51', 1),
(29, 49, 16, 'Hritik', 'Kanojiya', '81', 650, '2021/04/21', '17:18:30', 1),
(30, 50, 16, 'Hritik', 'Kanojiya', '454', 200, '2021/04/21', '17:19:17', 1),
(31, 51, 16, 'Hritik', 'Kanojiya', '554', 2180, '2021/04/21', '17:20:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `email`, `password`, `address`) VALUES
(11, 'Hritik Rajdev Kanojiya', 'hritikkanojiya13@gmail.com', '123456789', 'Room no2,ShivShankar Singh Chawl\nGanesh Chowk, Kajupada, Borivali (East)'),
(12, 'Hritik Rajdev Kanojiya', 'hritikkanojiya13@gmail.com', '123456789', 'Room no2,ShivShankar Singh Chawl\nGanesh Chowk, Kajupada, Borivali (East)'),
(13, 'Hritik Rajdev Kanojiya', 'hritikkanojiya13@gmail.com', '123456789', 'Room no2,ShivShankar Singh Chawl\nGanesh Chowk, Kajupada, Borivali (East)'),
(14, 'Bhavesh Bhusare', 'bhaveshbs123@gmail.com', '8104026178', 'sdgsgdgsd'),
(15, 'Aditya Kanojiya', 'adi@gmail.com', '123456789', 'Room no2,ShivShankar Singh Chawl,Ganesh Chowk,Kajupada Borivali (East)'),
(16, 'ABC', 'abc@gmail.com', '123456789', 'Room no2,ShivShankar Singh Chawl\nGanesh Chowk, Kajupada, Borivali (East)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_data`
--
ALTER TABLE `cart_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chef_data`
--
ALTER TABLE `chef_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contact_us_data`
--
ALTER TABLE `contact_us_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dine_in_data`
--
ALTER TABLE `dine_in_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `door_bell_data`
--
ALTER TABLE `door_bell_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_data`
--
ALTER TABLE `menu_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_data`
--
ALTER TABLE `order_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_data`
--
ALTER TABLE `payment_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_data`
--
ALTER TABLE `cart_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `chef_data`
--
ALTER TABLE `chef_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us_data`
--
ALTER TABLE `contact_us_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dine_in_data`
--
ALTER TABLE `dine_in_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `door_bell_data`
--
ALTER TABLE `door_bell_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menu_data`
--
ALTER TABLE `menu_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `order_data`
--
ALTER TABLE `order_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `payment_data`
--
ALTER TABLE `payment_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
