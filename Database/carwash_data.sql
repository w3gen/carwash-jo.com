-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2021 at 09:45 PM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carwash_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification`, `timestamp`) VALUES
(8, 'Now you can see your car wash status online.', '2021-06-06 19:19:30'),
(2, 'We are open till 07.00PM from next week', '2021-06-02 15:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `owner_email` varchar(200) NOT NULL,
  `owner_name` varchar(200) NOT NULL,
  `owner_phone` varchar(20) NOT NULL,
  `owner_address` varchar(250) NOT NULL,
  `vehicle_type` int(11) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `service_type` int(11) NOT NULL,
  `in_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `out_time` timestamp NULL DEFAULT NULL,
  `status_type` int(11) NOT NULL DEFAULT '1',
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id`, `owner_email`, `owner_name`, `owner_phone`, `owner_address`, `vehicle_type`, `vehicle_number`, `service_type`, `in_time`, `out_time`, `status_type`, `last_update`) VALUES
(1, 'asiriofficial@gmail.com', 'Asiri H', '94786141343', '23 Avenue, Kandy Srilanka', 1, 'CAK6298322', 1, '2021-05-19 07:34:14', '2021-06-15 03:00:27', 4, '2021-06-06 19:08:10'),
(2, 'john@gmail.com', 'John C.', '34786141343', '23 Avenue, Kandy Armenia', 1, 'CAK25398344', 2, '2021-06-02 07:34:04', NULL, 1, '2021-06-06 19:04:13'),
(3, 'asiriofficial@gmail.com', 'Asiri H', '94786141343', '23 Avenue, Kandy Srilanka', 2, 'CAK6253983', 2, '2021-06-02 03:35:37', NULL, 2, '2021-06-03 15:07:31'),
(4, 'john@gmail.com', 'John C.', '34786141343', '23 Avenue, Kandy Armenia', 4, 'DE45436', 4, '2021-06-02 03:35:41', NULL, 4, '2021-06-03 15:07:31'),
(5, 'asiriofficial@gmail.com', 'Asiri H', '94786141343', '23 Avenue, Kandy Srilanka', 3, 'CAK62539833', 3, '2021-06-02 15:25:31', NULL, 0, '2021-06-03 15:07:31'),
(6, 'john@gmail.com', 'John C.', '34786141343', '23 Avenue, Kandy Armenia', 1, 'CAK253983', 3, '2021-06-02 03:21:07', NULL, 4, '2021-06-06 18:03:26'),
(7, 'asiriofficial@gmail.com', 'Asiri H', '94786141343', '23 Avenue, Kandy Srilanka', 2, 'CAK62539835', 1, '2021-02-02 03:35:44', NULL, 3, '2021-06-06 19:01:47'),
(8, 'john@gmail.com', 'John C.', '34786141343', '23 Avenue, Kandy Armenia', 2, 'CAK2539835', 3, '2021-06-02 03:21:04', NULL, 3, '2021-06-07 02:16:41'),
(9, 'john@gmail.com', 'John C.', '34786141343', '23 Avenue, Kandy Armenia', 1, 'CAK2539839', 3, '2021-06-02 03:21:04', NULL, 1, '2021-06-04 23:22:51'),
(12, 'foolmashi@gmail.com', 'John K', '+94786141343', 'Australia', 1, 'AS3435', 1, '2021-06-05 06:14:31', NULL, 2, '2021-06-07 16:22:44'),
(14, 'foolmashi@gmail.com', 'Asiri H', '+94786141343', 'No:1/48, Colombo', 2, 'AS34354', 2, '2021-06-05 06:26:18', NULL, 2, '2021-06-07 16:23:43'),
(15, 'foolmashi@gmail.com', 'Asiri H', '+94786141343', 'No:1/48, Haputhale-Egodagama\r\nThalathuoya', 1, 'AS343533', 2, '2021-06-07 19:48:43', NULL, 1, '2021-06-07 12:48:43'),
(16, 'foolmashi@gmail.com', 'Asiri H', '+94786141343', 'No:1/48, Haputhale-Egodagama\r\nThalathuoya', 1, 'AS3435333', 2, '2021-06-07 19:55:12', NULL, 1, '2021-06-07 12:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `type`, `description`) VALUES
(1, 'Car wash only', 'Only car wash'),
(2, 'Car wash and waxing', 'Car wash and waxing as an additional service '),
(3, 'Car wash only', 'Only car wash'),
(4, 'Car wash and waxing', 'Car wash and waxing as an additional service ');

-- --------------------------------------------------------

--
-- Table structure for table `status_type`
--

CREATE TABLE `status_type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_type`
--

INSERT INTO `status_type` (`id`, `name`) VALUES
(1, 'Initialized'),
(2, 'In Progress'),
(3, 'Completed'),
(4, 'Dispatched'),
(0, 'On Hold');

-- --------------------------------------------------------

--
-- Table structure for table `status_updates`
--

CREATE TABLE `status_updates` (
  `queue_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_updates`
--

INSERT INTO `status_updates` (`queue_id`, `status_id`, `time`, `description`) VALUES
(1, 4, '2021-06-03 14:50:42', 'Your car wash is completed'),
(1, 2, '2021-06-03 14:50:42', 'Your car wash is in progress. Please refresh back in few minutes for updates.'),
(2, 1, '2021-06-03 14:50:42', 'Your car wash is initialized. Please refresh back in few minutes for updates.'),
(2, 2, '2021-06-03 14:50:42', 'Your car wash is in progress. Please refresh back in few minutes for updates.'),
(3, 1, '2021-06-03 14:50:42', 'Your car wash is initialized. Please refresh back in few minutes for updates.'),
(3, 2, '2021-06-03 14:50:42', 'Your car wash is in progress. Please refresh back in few minutes for updates.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@example.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`id`, `name`) VALUES
(1, 'Car'),
(2, 'Van'),
(3, 'Taxi'),
(4, 'Bus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification` (`notification`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_number_2` (`vehicle_number`,`status_type`),
  ADD KEY `vehicle_number` (`vehicle_number`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_type`
--
ALTER TABLE `status_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_updates`
--
ALTER TABLE `status_updates`
  ADD PRIMARY KEY (`queue_id`,`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_type`
--
ALTER TABLE `status_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
