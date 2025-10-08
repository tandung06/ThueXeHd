-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2025 at 10:23 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_simple`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(80) NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_name` (`brand_name`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(35, 'Audi'),
(33, 'BMW'),
(41, 'Chevrolet'),
(28, 'Ford'),
(24, 'Honda'),
(25, 'Hyundai'),
(40, 'Jaguar'),
(26, 'Kia'),
(39, 'Land Rover'),
(36, 'Lexus'),
(27, 'Mazda'),
(34, 'Mercedes-Benz'),
(30, 'Mitsubishi'),
(29, 'Nissan'),
(42, 'Peugeot'),
(37, 'Porsche'),
(31, 'Suzuki'),
(38, 'Tesla'),
(23, 'Toyota'),
(32, 'VinFast');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` bigint NOT NULL,
  `driver_license_no` varchar(60) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `balance` decimal(12,2) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `driver_license_no`, `address`, `balance`) VALUES
(1, 'B123456789', 'Ho Chi Minh City', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `driver_id` bigint NOT NULL AUTO_INCREMENT,
  `full_name` varchar(120) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `driver_license_no` varchar(60) NOT NULL,
  `driver_license_expiry` date DEFAULT NULL,
  `driver_license_image` varchar(500) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` enum('available','busy','inactive') NOT NULL DEFAULT 'available',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `full_name`, `phone`, `driver_license_no`, `driver_license_expiry`, `driver_license_image`, `address`, `status`, `created_at`) VALUES
(1, 'Tran Van B', '0909888777', 'DL123456789', '2031-01-01', 'https://cdn.example.com/drivers/DL123456789.jpg', 'Ho Chi Minh City', 'available', '2025-10-06 16:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

DROP TABLE IF EXISTS `models`;
CREATE TABLE IF NOT EXISTS `models` (
  `model_id` int NOT NULL AUTO_INCREMENT,
  `brand_id` int NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `year_start` smallint DEFAULT NULL,
  PRIMARY KEY (`model_id`),
  KEY `fk_models_brand` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=603 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`model_id`, `brand_id`, `model_name`, `year_start`) VALUES
(403, 37, 'Colorado Limited Crossover', 2011),
(404, 26, 'Xpander Performance SUV', 2019),
(405, 34, 'Mercedes-Benz VF5 SE Hatchback', 2018),
(406, 26, 'Almera Limited', 2012),
(407, 26, 'Kia Lux SA2.0 SE Coupe', 2025),
(408, 36, 'Lexus UX Plus SUV', 2021),
(409, 42, 'VF5 Pro Sedan', 2012),
(410, 33, 'Rush Limited Crossover', 2011),
(411, 40, 'Jaguar 3008 SE', 2023),
(412, 26, 'Mondeo Hybrid Sedan', 2021),
(413, 38, '2008 Premium Coupe', 2023),
(414, 29, 'Nissan CX-8 Limited Crossover', 2012),
(415, 37, 'X7 Performance Coupe', 2019),
(416, 32, 'VinFast Camry Performance Hatchback', 2017),
(417, 28, 'Mazda3 Sport Hatchback', 2025),
(418, 32, 'VinFast 5008 Pro Crossover', 2018),
(419, 39, 'CX-3 Limited Coupe', 2020),
(420, 42, 'Peugeot VF7 Hybrid Crossover', 2022),
(421, 36, 'Altis Premium SUV', 2018),
(422, 25, 'Trailblazer Plus', 2015),
(423, 33, 'BMW 911 Hatchback', 2012),
(424, 26, 'CR-V Hatchback', 2017),
(425, 32, 'VinFast Accord SE Crossover', 2016),
(426, 42, 'Peugeot Taycan SE Crossover', 2015),
(427, 39, 'Land Rover Kona Luxury Crossover', 2024),
(428, 41, 'Chevrolet A6 Performance', 2012),
(429, 31, 'EQE Sedan', 2012),
(430, 24, 'Honda VF6 Performance Coupe', 2013),
(431, 34, 'HR-V Performance Coupe', 2015),
(432, 38, 'X1 Performance Sedan', 2021),
(433, 23, 'RS6', 2010),
(434, 38, 'Tesla Evoque SE Coupe', 2016),
(435, 42, 'Accord SE Hatchback', 2020),
(436, 34, 'Mercedes-Benz Trailblazer Hybrid Coupe', 2024),
(437, 37, 'Porsche Swift Luxury SUV', 2022),
(438, 28, 'Sunny Limited Coupe', 2014),
(439, 42, 'Peugeot A4 Performance Hatchback', 2014),
(440, 33, 'NX Sport Crossover', 2016),
(441, 39, 'Land Rover Kona SE Sedan', 2016),
(442, 32, 'Accord Sport Sedan', 2020),
(443, 42, 'Peugeot XF Sedan', 2014),
(444, 42, 'Peugeot VF8 Pro Sedan', 2015),
(445, 38, 'Celerio SUV', 2024),
(446, 25, '5008 Sport Hatchback', 2024),
(447, 32, 'VinFast RX Premium Hatchback', 2010),
(448, 30, 'Mitsubishi Fortuner Sport Crossover', 2019),
(449, 23, 'Toyota 911 Luxury SUV', 2014),
(450, 26, 'Macan Sport Hatchback', 2020),
(451, 37, 'Porsche 2008 SE', 2025),
(452, 29, 'Nissan C-Class Luxury', 2014),
(453, 41, 'A3 SE Crossover', 2018),
(454, 28, 'Innova SE', 2016),
(455, 32, 'VinFast VF8 Pro SUV', 2021),
(456, 35, 'Audi 508 Sport Hatchback', 2017),
(457, 33, 'BMW F-150 Hybrid Coupe', 2025),
(458, 41, 'Chevrolet X7 Limited', 2024),
(459, 38, 'Tesla Aveo Sedan', 2019),
(460, 34, 'Focus Hatchback', 2014),
(461, 27, 'Mazda Attrage Premium SUV', 2020),
(462, 24, 'Kona SUV', 2020),
(463, 25, 'Hyundai BR-V Premium SUV', 2024),
(464, 32, 'Swift', 2025),
(465, 35, 'F-Type SE', 2019),
(466, 33, 'BMW Spark Limited Crossover', 2022),
(467, 27, 'Wigo Performance Coupe', 2020),
(468, 36, 'CR-V Limited', 2024),
(469, 25, 'Hyundai X5 Plus', 2020),
(470, 41, 'XF Luxury Hatchback', 2021),
(471, 39, 'Land Rover Carnival Crossover', 2021),
(472, 28, 'Ford Mondeo Limited Coupe', 2017),
(473, 37, 'Cybertruck Plus SUV', 2015),
(474, 33, 'BMW Sunny Performance', 2012),
(475, 27, 'Civic Premium', 2017),
(476, 41, 'Chevrolet Range Rover Sport Performance Crossover', 2010),
(477, 33, 'LX Limited SUV', 2017),
(478, 26, 'NX Plus Sedan', 2020),
(479, 27, 'Wigo Limited Hatchback', 2013),
(480, 33, 'BMW Focus Pro Hatchback', 2020),
(481, 25, 'BR-V Pro Sedan', 2014),
(482, 24, 'Honda e-tron Hybrid Hatchback', 2016),
(483, 35, 'Triton Sport', 2025),
(484, 29, 'Nissan EQS Limited Crossover', 2022),
(485, 35, 'Xpander Hybrid', 2014),
(486, 39, 'Land Rover Model X', 2018),
(487, 41, 'Chevrolet Evoque Hatchback', 2014),
(488, 29, 'Nissan Lux SA2.0 SE', 2012),
(489, 33, 'ES Pro Coupe', 2018),
(490, 40, 'Q3 SUV', 2023),
(491, 23, 'Almera SE SUV', 2012),
(492, 39, 'Land Rover Model X Luxury Coupe', 2025),
(493, 40, 'Jaguar Suburban SE SUV', 2019),
(494, 42, 'CX-3 Sport', 2014),
(495, 27, 'Mazda CX-3 Plus', 2011),
(496, 29, 'Avalon Hybrid', 2025),
(497, 29, 'Highlander Premium Sedan', 2021),
(498, 30, 'Corolla Luxury Sedan', 2011),
(499, 42, 'IS Plus Sedan', 2022),
(500, 34, 'Seltos SE', 2010),
(501, 36, 'S-Class Premium Sedan', 2016),
(502, 34, 'Prado Premium Crossover', 2010),
(503, 35, 'CX-5 Pro Coupe', 2017),
(504, 23, 'Toyota Venue Plus Coupe', 2022),
(505, 27, 'Mazda6 Luxury Coupe', 2022),
(506, 28, 'Ford Macan Crossover', 2022),
(507, 37, 'Porsche 5 Series Pro Sedan', 2023),
(508, 34, 'Mercedes-Benz Sunny Premium', 2022),
(509, 37, 'Porsche Triton Plus Crossover', 2022),
(510, 23, 'Toyota Santa Fe SUV', 2025),
(511, 28, 'Ford Rush Luxury SUV', 2019),
(512, 42, 'Peugeot VF5 Hybrid Coupe', 2018),
(513, 30, 'Mitsubishi HR-V Pro SUV', 2021),
(514, 40, 'Jaguar Sonata Premium SUV', 2021),
(515, 42, 'City Sport Hatchback', 2011),
(516, 32, 'VinFast X5 Crossover', 2018),
(517, 33, 'BMW XL7 Pro Crossover', 2013),
(518, 28, 'Malibu Premium Coupe', 2010),
(519, 39, 'Land Rover I-Pace Pro Crossover', 2016),
(520, 32, 'VinFast Sonata Luxury SUV', 2017),
(521, 38, 'Attrage Pro Hatchback', 2016),
(522, 32, 'EQS Plus SUV', 2023),
(523, 37, 'Porsche GLA Limited', 2010),
(524, 33, 'BMW Accord SUV', 2010),
(525, 36, 'Lexus Q7 Luxury', 2016),
(526, 32, 'VinFast BR-V Plus Hatchback', 2025),
(527, 23, 'Toyota Ertiga Plus Coupe', 2025),
(528, 24, 'Venue Crossover', 2016),
(529, 30, 'Mitsubishi 5 Series Limited Hatchback', 2015),
(530, 31, 'Elantra Premium Crossover', 2014),
(531, 23, 'City Limited SUV', 2024),
(532, 27, 'Mazda Cybertruck Premium Hatchback', 2013),
(533, 37, 'Prado Pro Crossover', 2024),
(534, 25, 'Hyundai A8 Pro Coupe', 2021),
(535, 30, 'CX-3 Hybrid Coupe', 2018),
(536, 23, 'Toyota City Plus Coupe', 2022),
(537, 31, 'Suzuki Q3 Luxury SUV', 2016),
(538, 39, 'Land Rover X7 Plus SUV', 2012),
(539, 33, 'Fadil Premium Sedan', 2011),
(540, 38, 'A6 Hybrid Sedan', 2020),
(541, 25, 'Pajero Sport Plus', 2022),
(542, 38, 'i3 Performance', 2025),
(543, 36, 'i7 Sport Crossover', 2013),
(544, 26, 'GX Sport SUV', 2012),
(545, 31, 'Tahoe SE Coupe', 2015),
(546, 42, 'S-Class Premium SUV', 2023),
(547, 25, 'Hyundai Swift Plus Sedan', 2013),
(548, 30, 'Mitsubishi Tucson Hybrid', 2010),
(549, 34, 'Corolla', 2010),
(550, 31, 'Seltos Performance Hatchback', 2017),
(551, 42, '208 Pro SUV', 2025),
(552, 42, 'i4 SE Crossover', 2011),
(553, 34, 'Fadil Sport SUV', 2017),
(554, 27, 'Terra Hatchback', 2011),
(555, 30, 'Mitsubishi C-Class Hybrid Coupe', 2012),
(556, 33, 'BMW VF9 Luxury Sedan', 2015),
(557, 33, 'BMW Yaris Performance Sedan', 2017),
(558, 34, 'Mercedes-Benz Focus Hybrid SUV', 2012),
(559, 40, 'Jaguar NX SE Crossover', 2025),
(560, 36, 'UX Premium Hatchback', 2024),
(561, 25, 'Q5 Premium Sedan', 2023),
(562, 27, 'Mazda Celerio Hybrid Crossover', 2011),
(563, 33, 'BMW LBX Limited', 2017),
(564, 30, 'GLE Pro Coupe', 2019),
(565, 40, 'Trailblazer Sport Sedan', 2013),
(566, 24, 'CX-8 Crossover', 2010),
(567, 27, 'Mazda VF8 Performance Coupe', 2022),
(568, 42, 'I-Pace Hatchback', 2018),
(569, 26, 'Kia RX SE Sedan', 2025),
(570, 23, 'Civic Sport Sedan', 2017),
(571, 27, 'Mazda Outlander Plus', 2024),
(572, 35, '911 Crossover', 2022),
(573, 30, 'Mitsubishi 508 Performance Crossover', 2014),
(574, 38, 'E-Pace', 2016),
(575, 37, 'Porsche Odyssey Pro SUV', 2016),
(576, 27, 'Mazda CX-3 SE Crossover', 2024),
(577, 38, 'Cayenne Performance Hatchback', 2017),
(578, 42, 'Vitara Performance Hatchback', 2011),
(579, 39, 'Land Rover Santa Fe Sport Crossover', 2021),
(580, 25, 'Hyundai 7 Series Plus', 2017),
(581, 42, 'HR-V Luxury Sedan', 2011),
(582, 35, 'Audi Pilot Limited Coupe', 2012),
(583, 32, 'VinFast K5 Plus', 2012),
(584, 23, 'Discovery Sport SUV', 2025),
(585, 25, 'Hyundai 5 Series Hybrid Coupe', 2011),
(586, 29, 'Nissan X-Trail Premium Sedan', 2024),
(587, 27, 'CX-3 SE Sedan', 2024),
(588, 39, 'Land Rover X6 Limited Crossover', 2021),
(589, 41, 'Chevrolet VF7 SE SUV', 2010),
(590, 37, 'Spark Hybrid Sedan', 2017),
(591, 42, 'Peugeot Vios Luxury Coupe', 2019),
(592, 34, 'A-Class Luxury Crossover', 2011),
(593, 36, 'Elantra SE SUV', 2020),
(594, 27, 'Mazda EQS Limited Crossover', 2024),
(595, 27, 'Mazda S-Class Sedan', 2010),
(596, 32, 'VinFast Pilot', 2022),
(597, 32, 'Navara Pro SUV', 2011),
(598, 24, 'Honda CX-8 Premium Sedan', 2025),
(599, 25, 'Malibu Limited Crossover', 2012),
(600, 25, 'CX-3 Limited Crossover', 2023),
(601, 34, 'GLE SE SUV', 2017),
(602, 36, 'Lexus Corolla Pro Crossover', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_id` bigint NOT NULL AUTO_INCREMENT,
  `customer_id` bigint NOT NULL,
  `vehicle_id` bigint NOT NULL,
  `driver_id` bigint DEFAULT NULL,
  `pickup_at` datetime NOT NULL,
  `dropoff_at` datetime NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','returned','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reservation_id`),
  KEY `fk_res_customer` (`customer_id`),
  KEY `fk_res_vehicle` (`vehicle_id`),
  KEY `fk_res_driver` (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7WRXQ9DBZ3HCu6JL0L1tM6tQNX0QxrSjUpvX5cyX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianZKa0t0M1VNbGhpY3pnRzMxUlpkSzNrOWd2Tmw3R3RERmkwam5ZYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1759912851),
('5Hevlo09QrMzAnXjs0sbA0SvHVw3DyxKbOKFbwvZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHozWVR3Wmw3d1lXMlBjZzVUU1FvaldWeW1uMmo0Q0FNcHB5Qlg2dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hdXRoL2NoZWNrIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1759918982);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint NOT NULL AUTO_INCREMENT,
  `full_name` varchar(120) NOT NULL,
  `email` varchar(160) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `phone`, `password_hash`, `role`, `created_at`) VALUES
(1, 'Nguyen Van A', 'customer@example.com', '0909000000', '$2y$10$examplehash', 'customer', '2025-10-06 16:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `vehicle_id` bigint NOT NULL AUTO_INCREMENT,
  `type_id` int NOT NULL,
  `model_id` int NOT NULL,
  `license_plate` varchar(30) NOT NULL,
  `color` varchar(40) DEFAULT NULL,
  `transmission` enum('manual','automatic') NOT NULL,
  `fuel_type` enum('gasoline','diesel','electric','hybrid') NOT NULL,
  `seats` tinyint DEFAULT NULL,
  `daily_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('available','rented','maintenance') NOT NULL DEFAULT 'available',
  PRIMARY KEY (`vehicle_id`),
  UNIQUE KEY `license_plate` (`license_plate`),
  KEY `fk_vehicle_type` (`type_id`),
  KEY `fk_vehicle_model` (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

DROP TABLE IF EXISTS `vehicle_types`;
CREATE TABLE IF NOT EXISTS `vehicle_types` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  `deposit_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_name` (`type_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_customers_user` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `fk_models_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_res_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_res_driver` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`driver_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_res_vehicle` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `fk_vehicle_model` FOREIGN KEY (`model_id`) REFERENCES `models` (`model_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vehicle_type` FOREIGN KEY (`type_id`) REFERENCES `vehicle_types` (`type_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
