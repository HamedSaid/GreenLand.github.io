-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 09:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenland`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item` varchar(25) NOT NULL,
  `type` varchar(15) NOT NULL,
  `price` float NOT NULL,
  `count` int(11) NOT NULL,
  `src` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `item`, `type`, `price`, `count`, `src`) VALUES
(26, 19, 'Hybrid Tea Roses', 'seeds', 4, 1, 'statics/flower6.jpg'),
(27, 20, 'Narcissus', 'seeds', 3.6, 1, 'statics/flower2.jpg'),
(28, 11, 'Granny Apple Tree', 'seeds', 1.5, 1, 'statics/apple.webp');

-- --------------------------------------------------------

--
-- Table structure for table `trees`
--

CREATE TABLE `trees` (
  `ID` int(10) NOT NULL,
  `Item` varchar(25) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Price (OMR)` float NOT NULL,
  `Src` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trees`
--

INSERT INTO `trees` (`ID`, `Item`, `Type`, `Price (OMR)`, `Src`) VALUES
(1, 'Lemon Tree', 'tree', 3.5, 'statics/lemon.jpg'),
(2, 'Celeste Fig Tree', 'tree', 0.5, 'statics/fig.jpg'),
(3, 'Omani Palm Tree', 'tree', 10, 'statics/palm.webp'),
(4, 'Mint', 'tree', 0.6, 'statics/mingt.jpg'),
(9, 'Orange Tree', 'tree', 4, 'statics/orange.jpg'),
(10, 'Elberta Peach Tree', 'tree', 6.5, 'statics/fruit.jpg'),
(11, 'Granny Apple Tree', 'seeds', 1.5, 'statics/apple.webp'),
(12, 'Pomegranate Tree', 'seeds', 2, 'statics/pog.jpg'),
(13, 'Bing Cherry Tree', 'seeds', 3, 'statics/straw.jpg'),
(14, 'Strawberry', 'seeds', 1.4, 'statics/strawbery.jpg'),
(15, 'Grape Fruit', 'seeds', 0.8, 'statics/grapes.jpg'),
(16, 'Papaya Fruit', 'seeds', 0.5, 'statics/papaya.webp'),
(17, 'Royal Star Magnolia Tree', 'flowers', 1.5, 'statics/flower1.jpg'),
(18, 'Carolina Jasmine', 'flowers', 0.5, 'statics/flower.jpg'),
(19, 'Hybrid Tea Roses', 'flowers', 4, 'statics/flower6.jpg'),
(20, 'Narcissus', 'flowers', 3.6, 'statics/flower2.jpg'),
(21, 'Lilac', 'flowers', 2.5, 'statics/LilacFlower.jpg'),
(22, 'Peony', 'flowers', 9, 'statics/flower4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trees`
--
ALTER TABLE `trees`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `trees`
--
ALTER TABLE `trees`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
