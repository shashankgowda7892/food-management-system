-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 06:11 AM
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
-- Database: `hungryhive`
--

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `timings` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `r_id`, `title`, `description`, `price`, `image`, `category`, `timings`) VALUES
(1, 1, 'Idle and Vada', '2 Idle and 1 Vada with Chatni and Sambar.', 40, 'idlevada', 'southkarnataka', 'breakfast'),
(2, 1, 'Pallav', '1 plate Pallav And Curd Salad', 50, 'palav', 'southkarnataka', 'breakfast'),
(3, 1, 'Anna And Sambar', 'Anna and Sambar(Veg) with Apalla', 50, 'ricesambar', 'southkarnataka', 'lunch'),
(4, 2, 'Mangalore Buns', '2 Buns with Sambar.', 30, 'buns', 'coastalkarnataka', 'breakfast'),
(5, 2, 'Gollibaje', '1 Plate - 4 Golibaje with chatni', 40, 'golibaje', 'coastalkarnataka', 'breakfast'),
(6, 2, 'Parota', '1 Plate - 2 Parota with Palyya', 40, 'parota', 'coastalkarnatka', 'breakfast'),
(7, 2, 'Boil Rice and Fish', 'Rice and Fish Sambar with pieces.', 90, 'ricefish', 'coastalkarnataka', 'lunch'),
(8, 2, 'Boil Rice and Chicken', 'Rice and Fish Sambar with pieces.', 80, 'ricechicken', 'coastalkarnataka', 'lunch'),
(9, 2, 'Boil Rice and Chicken.', 'Rice and Fish Sambar with 2 kabab pieces.', 130, 'ricechickenk', 'coastalkarnataka', 'dinner'),
(10, 3, 'JolaRotti and Pudi', '2 JolaRotti with Chatni Pudi', 35, 'jolaroti', 'northkarnataka', 'breakfast'),
(14, 4, 'Pullivogare', '1 Plate of Pulivogare.', 40, 'pulivogare', 'southkarnataka', 'breakfast'),
(15, 4, 'Chittranna', '1 Plate of Chittranna.', 40, 'citranna', 'southkarnataka', 'breakfast'),
(16, 4, 'Mudde Utta', '1 Mudee with Rice and Sambar', 100, 'mudeutta', 'southkarnataka', 'lunch'),
(17, 4, 'Biryani', 'Full Biryani with 2 Eggs.', 120, 'biryani', 'southkarnataka', 'dinner'),
(18, 4, 'kabab', '5 Pices of kabab in a plate.', 90, 'kabab', 'southkarnataka', 'dinner'),
(19, 5, 'mangalore Neer Dose', '2 Plate - 4 Neer Dose', 30, 'neerdose', 'coastalkarnataka', 'breakfast'),
(20, 5, 'Fish Fry', '1 Plate - 2 Piece.', 150, 'fishfry', 'coastalkarnataka', 'lunch'),
(21, 5, 'Anna And Rasam Sambar', 'Anna And Samabar with Pickle and Appala', 60, 'ricerasam', 'coastalkarnataka', 'dinner');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `pay_method` varchar(225) NOT NULL,
  `pay_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `trans_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `u_id`, `amount`, `pay_method`, `pay_date`, `trans_id`) VALUES
(29, 3, 705, 'UPI', '2024-02-16 14:22:11', '236521425639'),
(30, 3, 705, 'UPI', '2024-02-16 14:24:55', '236521425639'),
(31, 3, 715, 'UPI', '2024-02-17 06:53:32', '123456789'),
(32, 3, 245, 'COD', '2024-02-17 06:58:30', ''),
(33, 6, 245, 'UPI', '2024-02-18 10:34:40', '45612'),
(34, 6, 175, 'COD', '2024-02-18 10:36:30', ''),
(35, 3, 755, 'COD', '2024-02-18 15:47:18', ''),
(36, 19, 245, 'UPI', '2024-03-15 01:57:03', '41561435454655445'),
(37, 19, 65, 'COD', '2024-03-15 02:28:03', ''),
(38, 19, 65, 'COD', '2024-03-15 02:28:43', ''),
(39, 19, 65, 'COD', '2024-03-15 02:28:53', ''),
(40, 19, 205, 'COD', '2024-03-15 02:29:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `special_user`
--

CREATE TABLE `special_user` (
  `r_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `o_hour` time NOT NULL,
  `c_hour` time NOT NULL,
  `name` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `del_places` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_user`
--

INSERT INTO `special_user` (`r_id`, `title`, `email`, `password`, `phone`, `o_hour`, `c_hour`, `name`, `address`, `image`, `del_places`, `category`) VALUES
(1, 'HOTEL SWAGATH\r\n', 'hotelswagath@gmail.com\r\n', 'swagatha123\r\n', '9963586235\r\n', '09:00:00', '09:00:00', 'ramachandra\r\n', 'bc road\r\n', 'swagath\r\n', 'bc road,kaikamba,bantwala,thumbe,panemangalore,melkar\r\n', 'south karnatka\r\n'),
(2, 'SHREE DHAMA\r\n', 'shreedhama@gmail.com\r\n', 'dhamashree\r\n', '6656948325\r\n', '09:00:00', '09:00:00', 'basappa\r\n', 'benjanapadavu\r\n', 'shreedhama\r\n', 'bc road,kaikamba,bantwala,thumbe,panemangalore,melkar,parangipete,adyar.\r\n', 'coastal karnatka\r\n'),
(3, 'HOTEL PALACE\r\n', 'palacehotel@gmail.com\r\n', 'palacehotel222\r\n', '8563256947\r\n', '09:00:00', '09:00:00', 'balaganesha\r\n', 'kaladka\r\n', 'hotelpalace\r\n', 'bc road,kaikamba,bantwala,panemangalore,melkar.\r\n', 'south karnataka\r\n'),
(4, 'MANE UTTA\r\n', 'maneuta@gmail.com\r\n', 'utadamane546\r\n', '6532985417\r\n', '09:00:00', '09:00:00', 'ramesh\r\n', 'mangalore\r\n', 'maneutta\r\n', 'mangalore full city\r\n', 'coastal karnataka\r\n'),
(5, 'KUDLA MANE UTTA\r\n', 'kudlauta@gmail.com\r\n', 'kudla452\r\n', '8759641253\r\n', '09:00:00', '09:00:00', 'avinash sharama\r\n', 'padil\r\n', 'kudlamane\r\n', 'padil,mangalore,adyar,kanuur,statebank.\r\n', 'north karanataka\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `fname`, `lname`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'suraj', 'suraj', 'gunaga', 'surajg@gmail.com', '9907300680', '963852', 'pochinok battle field,pochinok road BGMI.', 1, '2024-02-19 14:55:57'),
(2, 'shashank gowda c', 'shashank', 'gowda', 'shashank@gmail.com', '7892871357', '963852', 'pochinok battle field,pochinok road freefire.', 1, '2024-02-19 14:55:57'),
(3, 'srinidhi', 'srinidhi', 'srinidhi', 'srinidhi@gmail.com', '5426352148\r\n', '789456', 'benjanapadvu road pg near chicken shop.\r\n', 1, '2024-02-19 14:55:57'),
(4, 'sanket\r\n', 'sanket\r\n', 'ambig\r\n', 'sanket@gmail.com', '8965234172\r\n', '545454', 'new PG near canara engineering college Bnejanapadavu.\r\n', 1, '2024-02-19 14:55:57'),
(5, 'jaiganeh\r\n', 'jaiganeh\r\n', 'shetty\r\n', 'jaiganesh@gmail.com\r\n', '9968532417\r\n', '123213', 'moodbidri road , koila road near chicken shop.\r\n', 1, '2024-02-19 14:55:57'),
(6, 'thapa', 'thapa', 'tech', 'thap00a@gmail.com', '8527415244', '741852', 'bc road hshbbfsv', 1, '2024-02-27 14:56:00'),
(19, 'adithyanayak', 'adithya', 'nayak', 'adi@gmail.com', '2563658975', '258741', 'vamanapadavu', 1, '2024-03-15 01:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pay_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`, `pay_id`, `d_id`) VALUES
(10, 3, 'veg biryani', 4, 120, 'rejected', '2024-02-16 14:24:55', 30, 0),
(12, 3, 'veg biryani', 2, 120, 'rejected', '2024-02-17 06:53:32', 31, 0),
(14, 3, 'toamato rice', 1, 70, 'rejected', '2024-02-17 06:58:30', 32, 0),
(16, 6, 'toamato rice', 1, 70, 'rejected', '2024-02-18 10:34:40', 33, 0),
(17, 6, 'andhra egg dosa', 1, 150, 'finish', '2024-02-18 10:34:40', 33, 0),
(18, 6, 'andhra egg dosa', 1, 150, 'processing', '2024-02-18 10:36:30', 34, 0),
(19, 3, 'toamato rice', 4, 70, 'rejected', '2024-02-18 15:47:18', 35, 0),
(20, 3, 'andhra egg dosa', 3, 150, 'rejected', '2024-02-18 15:47:18', 35, 0),
(21, 19, 'Pallav', 2, 50, '', '2024-03-15 01:57:03', 36, 0),
(22, 19, 'Idle and Vada', 3, 40, '', '2024-03-15 01:57:03', 36, 0),
(23, 19, 'Idle and Vada', 1, 40, '', '2024-03-15 02:28:53', 39, 1),
(24, 19, 'mangalore Neer Dose', 1, 30, 'rejected', '2024-03-15 02:29:19', 40, 19),
(25, 19, 'Fish Fry', 1, 150, '', '2024-03-15 02:29:19', 40, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `special_user`
--
ALTER TABLE `special_user`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `pay_id` (`pay_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `special_user`
--
ALTER TABLE `special_user`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `special_user` (`r_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_orders_ibfk_2` FOREIGN KEY (`pay_id`) REFERENCES `payment` (`pay_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
