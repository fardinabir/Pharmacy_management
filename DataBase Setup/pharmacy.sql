-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 09:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--
CREATE DATABASE IF NOT EXISTS `pharmacy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pharmacy`;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `SL` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `med_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `bill` int(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`SL`, `date_time`, `med_name`, `quantity`, `bill`, `username`) VALUES
(1, '2019-03-20 00:00:00', 'maxpro', 7, 49, 'kamal'),
(2, '2019-03-13 00:00:00', 'napa', 12, 24, 'tuhin'),
(3, '2019-03-11 00:00:00', 'fast', 25, 250, 'tuhin'),
(4, '2019-03-20 00:00:00', 'sergel', 8, 80, 'jamil'),
(5, '2019-03-20 00:00:00', 'omidon', 4, 4, 'tuhin'),
(6, '0000-00-00 00:00:00', 'napa', 1, 200, 'kamal'),
(7, '0000-00-00 00:00:00', 'napa', 2, 400, 'kamal'),
(8, '2019-08-21 22:55:54', 'cetrin', 12, 1481472, 'kamal'),
(9, '2019-08-21 23:28:07', 'glycin', 2, 438, 'kamal');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(100) NOT NULL,
  `med_name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `quantity` int(123) NOT NULL,
  `process` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `med_name`, `company`, `quantity`, `process`, `price`) VALUES
(7, 'azicin', 'square', 12, 'normal', 12),
(1, 'cetrin', 'square', 211159, 'normal', 123456),
(2, 'glycin', 'beximco', 7, 'fridge', 219),
(3, 'maxpro', 'skf', 12, 'normal', 7),
(4, 'napa', 'square', 1009, 'normal', 2),
(10, 'natax', 'square', 100, 'Normal', 22),
(5, 'oramax gc', 'reneta', 11, 'fridge', 25),
(6, 'sergel', 'incepta', 19, 'normal', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('anoy', '987897897'),
('done', '1234'),
('Fardin Abir', '12345'),
('kamal', '121313'),
('kamrul', '1234'),
('Mithun Rahman', 'm1999'),
('sazid', 'sz1999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`SL`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`med_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `SL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
