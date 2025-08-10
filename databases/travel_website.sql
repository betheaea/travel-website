-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2025 at 08:08 PM
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
-- Database: `travel_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `booked_at` datetime DEFAULT current_timestamp(),
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `country`, `description`, `image_path`) VALUES
(1, 'Switzerland', 'Whether you seek a winter wonderland or beautiful spring meadows, Switzerland has it all. Explore this charming country and all it has to offer including skiing and hiking.', 'swiss.png'),
(2, 'Indonesia', 'The perfect destination for all those in need of peace, as much as it is for any daring adventurer. Indonesia boasts beautiful ocean, islands, unique wildlife, and bustling cities.', 'indo.png'),
(3, 'Japan', 'Offering a unique blend of ancient tradition and modern convenience, Japan is an incredible destination for any traveller looking for something a bit different every time.', 'japan.png'),
(4, 'France', 'France is the number one location for any fans of excellent food and fine wines. Pairing these with its beautiful natural scenery makes it a no-brainer for all holiday-goers.', 'france.png'),
(5, 'Costa Rica', 'Known as a jewel of Central America, Costa Rica is famous for it\'s incredible landscapes and biodiversity - beaches and oceans are plentiful and home to much adventure and sports.', 'costarica.png');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('available','fully booked') DEFAULT 'available',
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `name`, `company`, `country`, `start_date`, `end_date`, `status`, `price`) VALUES
(1, 'Japan Air', 'Japan Air', 'Japan', '2025-09-20', '2025-09-30', 'available', 2000),
(2, 'Skyline', 'Swiss Airways', 'Switzerland', '2025-10-07', '2025-10-14', 'available', 400),
(3, 'Flyaway', 'Flyaway', 'Costa Rica', '2025-10-07', '2025-10-14', 'available', 1000),
(4, 'FranceAir', 'FlightPros', 'France', '2026-07-10', '2026-07-20', 'available', 200),
(5, 'Flyaway', 'Flyaway', 'Costa Rica', '2025-10-01', '2025-10-30', 'available', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('available','fully booked') DEFAULT 'available',
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `company`, `country`, `description`, `start_date`, `end_date`, `status`, `price`) VALUES
(1, 'Sakura Hotel', 'Sakura', 'Japan', 'Skyscraper hotel with beautiful 360 views of cherry trees', '2025-09-20', '2025-09-30', 'available', 1000),
(2, 'Ice Climber Cottages', 'Ice Inc.', 'Switzerland', 'Mountain top cottage in a traditional village', '2025-10-07', '2025-10-14', 'available', 400),
(3, 'Beach Huts', 'TropicalStays', 'Indonesia', 'Seaside living for a breath of fresh air', '2025-10-07', '2025-10-14', 'available', 800),
(4, 'Treehouse', 'TropicalStays', 'Costa Rica', 'Unique living in popular treehouses', '2026-07-10', '2026-07-20', 'available', 1200),
(5, 'Beach Huts', 'Retreat', 'Costa Rica', 'Spacious and cool beachside homes', '2025-10-01', '2025-10-30', 'available', 1400);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `description`, `price`, `destination`, `type`, `start_date`, `end_date`) VALUES
(1, 'Winter Sports Experience', 'Explore Zermatt and the Alps in this exhilarating high-altitude resort holiday.', 799.99, 'Switzerland', 'Adventure', '2026-01-05', '2026-01-10'),
(2, 'Beach Retreat', 'Relax on the famous beaches of the Gili Islands.', 599.99, 'Indonesia', 'Relaxation', '2025-09-21', '2025-09-26'),
(3, 'Jungle Expedition', 'Discover the diverse Indonesian wildlife while exploring temples and volcanoes on this guided tour.', 450.00, 'Indonesia', 'Adventure', '2025-09-21', '2025-09-26'),
(4, 'Cherry Blossom Viewing', 'Back by popular demand: Witness the blooming cherry blossoms in Tokyo', 2890.00, 'Japan', 'City Break', '2026-03-29', '2026-04-03'),
(6, 'Onsen Therapy', 'Experience the vibrant onsen town of Kusatsu and unwind in the famous Yubatake.', 3000.00, 'Japan', 'Relaxation', '2025-10-19', '2025-10-24'),
(7, 'Unique City Experience', 'Greet the incredible sika deer in this once-in-a-lifetime getaway to Nara.', 2500.00, 'Japan', 'City Break', '2025-10-12', '2025-10-17'),
(8, 'Wine Tasting Tour', 'Tour through famous Vineyards in Bordeaux.', 780.00, 'France', 'Honeymoon & Couples', '2025-10-26', '2025-10-31'),
(9, 'Swiss Spa Break', 'Experience a peaceful mountain retreat on the Alps.', 980.00, 'Switzerland', 'Honeymoon & Couples', '2025-09-15', '2025-09-19'),
(10, 'Extreme Sports Tour', 'Experience rainforest tours, ziplining, surfing, and white-water rafting in this action packed adventure tour.', 1100.00, 'Costa Rica', 'Adventure', '2025-09-14', '2025-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Test User', 'test@example.com', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
