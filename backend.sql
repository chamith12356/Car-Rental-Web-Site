-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 03:01 AM
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
-- Database: `backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `Sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`Sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'UBC', '123'),
(2, 'UBC-RENTAL_MANAGER', '12');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `budegt` decimal(10,2) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `name`, `type`, `budegt`, `description`, `status`, `removed`) VALUES
(1, 'BMW M SPORT F87', 'Super Car', 10000.00, 'Since 2015 the BMW M2 has been the successor to the BMW 1 M Coupé, and has continued the dynamic, powerful compact series established by the BMW 2002 Turbo and the BMW M3 (E30).', 1, 0),
(20, 'Mercedes BENZ BRABUS', 'Luxury Car', 1000.00, 'The BRABUS 900 Superblack is the third addition to our monochrome design series of highly exclusive BRABUS signature supercars, defined at its core by the apex of uncompromising rocket ship power and an extravagant BRABUS 1-Second-Wow Character.', 1, 0),
(21, 'Toyota Brand New Avanza 2016 ', 'General Car', 400.00, 'Auto, Petrol, 7 seater, Dual A/C, CD, MP3, Badge interior, Alloy wheel, Remote key, New tyres, Just registered full option vehicle.', 1, 0),
(22, 'Audi Q3 SUV', 'Luxury Vehicle', 1200.00, 'The Q3 is a true all-rounder. Whether on a holiday trip or for everyday driving, it offers plenty of space and practical features whilst also putting comfort and performance at the centre of every journey.', 1, 0),
(23, 'BMW M Sport', 'Sport Type', 550.00, 'Since 2015 the BMW M2 has been the successor to the BMW 1 M Coupé, and has continued the dynamic, powerful compact series established by the BMW 2002 Turbo and the BMW M3 (E30).', 1, 0),
(24, 'Mercedes-Benz Brabus', 'Luxury Sport', 600.00, 'The BRABUS 900 Superblack is the third addition to our monochrome design series of highly exclusive BRABUS signature supercars, defined at its core by the apex of uncompromising rocket ship power and an extravagant BRABUS 1-Second-Wow Character.', 1, 0),
(25, 'Volkswagen Beetle', 'Classic', 650.00, 'The Beetle was a masterpiece of innovation and economics—it was compact, but practical, and inexpensive to buy and maintain. The car’s curved exterior not only gave it a groundbreaking look, but was aerodynamic, too. Rear-wheel drive and its small stature gave the Beetle excellent handling, particularly when compared to the American land yachts of ', 1, 0),
(26, 'AS 07', 'Classic', 500.00, 'This car supported only wedding pakcge. If you want to try you can buy onther place and try it.becuase thre not sell it. let get ou t bitch.', 1, 1),
(27, 'MS 02', 'Classic', 880.00, 'this car for corparate rentl. you can use for it.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_facilities`
--

CREATE TABLE `car_facilities` (
  `sr_no` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_facilities`
--

INSERT INTO `car_facilities` (`sr_no`, `car_id`, `facilities_id`) VALUES
(56, 23, 12),
(57, 23, 15),
(58, 23, 16),
(59, 23, 19),
(60, 23, 20),
(61, 24, 12),
(62, 24, 15),
(63, 24, 16),
(64, 24, 19),
(65, 24, 20),
(66, 25, 12),
(67, 25, 15),
(68, 25, 16),
(69, 25, 19),
(70, 25, 20),
(73, 1, 12),
(74, 1, 15),
(76, 20, 20),
(77, 21, 15),
(78, 22, 15);

-- --------------------------------------------------------

--
-- Table structure for table `car_features`
--

CREATE TABLE `car_features` (
  `sr_no` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_features`
--

INSERT INTO `car_features` (`sr_no`, `car_id`, `features_id`) VALUES
(52, 23, 1),
(53, 23, 2),
(54, 23, 3),
(55, 23, 4),
(56, 23, 5),
(57, 24, 1),
(58, 24, 2),
(59, 24, 3),
(60, 24, 4),
(61, 24, 5),
(62, 25, 1),
(63, 25, 2),
(64, 25, 3),
(65, 25, 4),
(66, 25, 5),
(74, 1, 1),
(75, 1, 2),
(76, 1, 3),
(77, 1, 4),
(78, 1, 5),
(84, 20, 1),
(85, 20, 2),
(86, 20, 3),
(87, 20, 4),
(88, 20, 5),
(89, 21, 1),
(90, 21, 2),
(91, 21, 3),
(92, 21, 4),
(93, 21, 5),
(94, 22, 1),
(95, 22, 2),
(96, 22, 3),
(97, 22, 4),
(98, 22, 5);

-- --------------------------------------------------------

--
-- Table structure for table `car_images`
--

CREATE TABLE `car_images` (
  `sr_no` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_images`
--

INSERT INTO `car_images` (`sr_no`, `car_id`, `image`, `thumb`) VALUES
(19, 23, 'IMG_86804.jpg', 1),
(20, 23, 'IMG_81066.jpg', 0),
(21, 23, 'IMG_98934.jpg', 0),
(22, 23, 'IMG_85320.jpg', 0),
(23, 24, 'IMG_40754.jpg', 1),
(24, 24, 'IMG_37943.jpg', 0),
(25, 24, 'IMG_93339.jpg', 0),
(26, 24, 'IMG_63401.jpg', 0),
(27, 25, 'IMG_92476.jpg', 1),
(28, 22, 'IMG_55073.jpg', 1),
(29, 21, 'IMG_45803.jpg', 1),
(30, 20, 'IMG_45404.jpg', 1),
(31, 1, 'IMG_24834.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` varchar(50) NOT NULL,
  `pn2` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `tw` varchar(80) NOT NULL,
  `fb` varchar(80) NOT NULL,
  `insta` varchar(80) NOT NULL,
  `iframe` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `tw`, `fb`, `insta`, `iframe`) VALUES
(1, '9/3,Batewela,Ranala.', 'http://localhost/New folder (7)/New folder/contact.php#', ' 94767649483', ' 94767649483', 'ushanloshitha@gmail.com', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126640.85977294996!2d80.625781!3d7.294545!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae366266498acd3:0x411a3818a1e03c35!2sKandy!5e0!3m2!1sen!2slk!4v1695106180896!5m2!1sen!2slk');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(12, 'IMG_72342.png', 'Short Term Rentals', 'Looking at renting a car for a week? Choose your car from our wide range of fleet.By renting a weekly car from UBC Rent A Car you get dedicated and personalized customer service.'),
(15, 'IMG_95276.png', 'Long Term Rentals', 'UBC Car Rental offers a Long-Term Rental Package for durations exceeding one week. This extended rental option provides customers with the flexibility and convenience.'),
(16, 'IMG_95328.png', 'Corporate Rentals', 'UBC Rent Car is able to provide any type of vehicles to your business travel needs. Whether your company needs one car or fleet we can help you acquire and maintain a fully operational fleet.'),
(19, 'IMG_99449.png', 'Wedding Car Rentals ', 'You have many different options when it comes to transport on your wedding day, including limos to transport your guest, or a simple classic car that can take the bride and groom back to their hotel.'),
(20, 'IMG_19574.png', 'Event Transportation', 'Why not utilize the advantage in booking your rides to that event with us, and avail an affordable and second to none professional event transportation services from our chauffeurs.');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(1, 'AC'),
(2, 'Adjustable Seats'),
(3, 'Airbags'),
(4, 'Cruise Control'),
(5, 'ABS Breaking System');

-- --------------------------------------------------------

--
-- Table structure for table `rental_details`
--

CREATE TABLE `rental_details` (
  `Sr_no` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `car_name` varchar(255) DEFAULT NULL,
  `rentalprice` int(11) DEFAULT NULL,
  `total_pay` int(11) DEFAULT NULL,
  `car_no` varchar(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `phonenum` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental_details`
--

INSERT INTO `rental_details` (`Sr_no`, `booking_id`, `car_name`, `rentalprice`, `total_pay`, `car_no`, `user_name`, `phonenum`, `address`) VALUES
(1, 1, 'Audi Q3 SUV', 4000, 3500, 'NULL', 'Chaminda', '0717548726', 'D1/colommbo5');

-- --------------------------------------------------------

--
-- Table structure for table `rental_order`
--

CREATE TABLE `rental_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `rental_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `arrival` int(11) DEFAULT 0,
  `refund` int(11) DEFAULT NULL,
  `rental_status` varchar(100) DEFAULT NULL,
  `order_id` varchar(150) DEFAULT NULL,
  `trans_id` int(200) DEFAULT NULL,
  `trans_amount` int(11) DEFAULT NULL,
  `trans_status` varchar(100) DEFAULT NULL,
  `trans_resp_msg` varchar(200) DEFAULT NULL,
  `datentime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental_order`
--

INSERT INTO `rental_order` (`booking_id`, `user_id`, `car_id`, `rental_date`, `return_date`, `arrival`, `refund`, `rental_status`, `order_id`, `trans_id`, `trans_amount`, `trans_status`, `trans_resp_msg`, `datentime`) VALUES
(1, 2, 22, '2024-01-14', '2024-01-16', 0, 45, 'booked', '0001', 2, 45000, 'done', 'thank you', '2024-01-13 03:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'UBC CAR RENTALS ', 'UBC Rent A Car service offers you a wide verity of vehicles to choose from low budget cars to luxury coaches to meet all your transport needs within Sri Lanka.Moreover, we also ensure that we provide our customers with a high-quality service together', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `picture` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(19, 'E2140110 - Buddika', 'IMG_28127.jpg'),
(20, 'E2140020 - Ushan', 'IMG_44772.jpg'),
(21, 'E2140156', 'IMG_81564.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(1, 'Ushan Loshitha ', 'ushanalwis0@gmail.com', '9/3,\r\nBatewela,\r\nRanala.', '0716944875', 10654, '2023-11-23', 'gd_extension_not_enabled', '$2y$10$Lst3yVaMxJPb3QyGDixw2eGi26arOFUm/1Haggb7Xx4ZNSi9gb16G', 0, 'af8eec6fe0763baf49d1a29075e7ba8b', NULL, 1, '2023-11-28 12:02:02'),
(2, 'Chaminda', 'ushanoal@gmail.com', '11410 Century Oaks Terrace', '0716944875', 78758, '2023-11-15', 'gd_extension_not_enabled', '$2y$10$g8Sq0OXM6cYjuRAWenhp5.5ie8y3gThF5RchVw/K2M5FV8gY.ygM2', 0, '09675527bf004f06b8585867ff846db1', NULL, 1, '2023-11-28 22:02:20'),
(3, 'Ushan Loshitha ', 'ushanoal@gmail.com', '9/3,\r\nBatewela,', '0716944875', 10654, '2023-11-15', 'gd_extension_not_enabled', '$2y$10$guFzsAbKD..ryZE3HnJ7YuIexVoDrJzHtkD0J0VfMsNq4IM62/Ywm', 0, '5a8d59de279e950c833e5b25763044b2', NULL, 1, '2023-11-28 23:32:31'),
(4, 'Thisan Thivina', 'ushanoal@gmail.com', '11410 Century Oaks Terrace', '0716944875', 78758, '2023-11-16', 'gd_extension_not_enabled', '$2y$10$O/1fZOwfObd8ZEoaJ9iUleCZ3BPkXcAq.somksBZh.1I.qGWKVAQ2', 0, '1df961025dcfed7ce34caeac0bea9184', NULL, 1, '2023-11-28 23:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `car_facilities`
--
ALTER TABLE `car_facilities`
  ADD PRIMARY KEY (`sr_no`) USING BTREE;

--
-- Indexes for table `car_features`
--
ALTER TABLE `car_features`
  ADD PRIMARY KEY (`sr_no`) USING BTREE;

--
-- Indexes for table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`sr_no`) USING BTREE,
  ADD KEY `car_images_ibfk_1` (`car_id`) USING BTREE;

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `rental_details`
--
ALTER TABLE `rental_details`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `rental_order`
--
ALTER TABLE `rental_order`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `Sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `car_facilities`
--
ALTER TABLE `car_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `car_features`
--
ALTER TABLE `car_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rental_order`
--
ALTER TABLE `rental_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_images`
--
ALTER TABLE `car_images`
  ADD CONSTRAINT `car_images_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
