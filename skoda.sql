-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 04:58 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skoda`
--

-- --------------------------------------------------------

--
-- Table structure for table `bodywork_car`
--

CREATE TABLE `bodywork_car` (
  `idBodywork` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bodywork_car`
--

INSERT INTO `bodywork_car` (`idBodywork`, `name`) VALUES
(1, 'combi'),
(2, 'sportline'),
(3, 'classic');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `idCar` int(11) NOT NULL,
  `carName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `idModelBodywork` int(11) NOT NULL,
  `set_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`idCar`, `carName`, `description`, `price`, `idModelBodywork`, `set_date`) VALUES
(1, 'Fabia', 'Euro 5, rearward, 6 speed manual, diesel', '10.000', 1, '2020-01-28 21:23:41'),
(2, 'Kamiq', 'Euro 5, 4x4, 6 speed manual, petrol', '16.000', 2, '2020-02-10 21:44:12'),
(3, 'Kodiaq', 'Euro 5, 4x4, 6 speed manual, petrol', '19.200', 3, '2020-01-30 21:16:29'),
(4, 'Octavia', 'Euro 5, fore, 6-speed manual, diesel', '11.340', 4, '2020-01-30 21:19:30'),
(5, 'Scala', 'Euro 5, fore, 6-speed manual, deisel ', '9.450', 5, '2020-01-30 21:19:30'),
(6, 'Superb', 'Euro 6, 4x4, 7-speed automatic, petrol', '27.480', 6, '2020-01-30 21:20:48'),
(7, 'Fabia Combi', 'Euro 5, rearward, 6-speed manual, diesel', '14.000', 7, '2020-01-30 21:22:56'),
(8, 'Kodiaq Sportline', 'Euro 6, 4x4, 7-speed automatic, petrol', '30.000', 8, '2020-01-29 23:00:00'),
(9, 'Octavia Combi', 'Euro 6, 4x4, 7-speed automatic, petrol', '11.000', 9, '2020-01-29 23:00:00'),
(10, 'Superb Combi', 'Euro 6, 4x4, 7-speed automatic, petrol', '37.627', 10, '2020-01-29 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `image_car`
--

CREATE TABLE `image_car` (
  `idImage` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `miniImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `newImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image_car`
--

INSERT INTO `image_car` (`idImage`, `name`, `path`, `alt`, `miniImage`, `newImage`) VALUES
(1, 'Fabia Model', 'app/assets/images/CarModels/fabia.png', 'Fabia', 'app/assets/images/Mini-Models/fabia-mini.png', ''),
(2, 'Kamiq Model', 'app/assets/images/CarModels/kamiq.png', 'Kamiq', 'app/assets/images/Mini-Models/kamiq-mini.png', ''),
(3, 'Kodiaq Model', 'app/assets/images/CarModels/kodiaq.png', 'Kodiaq', 'app/assets/images/Mini-Models/kodiaq-mini.png', ''),
(4, 'Octavia Model', 'app/assets/images/CarModels/octavia.png', 'Octavia', 'app/assets/images/Mini-Models/octavia-mini.png', ''),
(5, 'Scala Model', 'app/assets/images/CarModels/scala.png', 'Scala', 'app/assets/images/Mini-Models/scala-mini.png', ''),
(6, 'Superb Model', 'app/assets/images/CarModels/superb.png', 'Superb', 'app/assets/images/Mini-Models/superb-mini.png', ''),
(7, 'Fabia Combi', 'app/assets/images/Bodywork/fabia-combi.png', 'Fabia Combi', 'app/assets/images/Mini-Models/fabia-combi-mini.png', ''),
(8, 'Kodiaq Sportline', 'app/assets/images/Bodywork/kodiaq-sportline.png', 'Kodiaq Sportline', 'app/assets/images/Mini-Models/kodiaq-mini-sportline.png', ''),
(9, 'Octavia Combi', 'app/assets/images/Bodywork/octavia-combi.png', 'Octavia Combi', 'app/assets/images/Mini-Models/ocatavia-combi-mini.png', ''),
(10, 'Superb Combi', 'app/assets/images/Bodywork/superb-combi.png', 'Superb Combi', 'app/assets/images/Mini-Models/superb-combi-mini.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `model_bodywork_car`
--

CREATE TABLE `model_bodywork_car` (
  `idModelBodywork` int(11) NOT NULL,
  `idBodywork` int(11) DEFAULT NULL,
  `idModel` int(11) NOT NULL,
  `idImage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_bodywork_car`
--

INSERT INTO `model_bodywork_car` (`idModelBodywork`, `idBodywork`, `idModel`, `idImage`) VALUES
(1, 1, 1, 1),
(2, 3, 2, 2),
(3, 2, 3, 3),
(4, 1, 4, 4),
(5, 3, 5, 5),
(6, 1, 6, 6),
(7, 1, 1, 7),
(8, 2, 3, 8),
(9, 1, 4, 9),
(10, 1, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_car`
--

CREATE TABLE `model_car` (
  `idModel` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_car`
--

INSERT INTO `model_car` (`idModel`, `name`) VALUES
(1, 'fabia'),
(2, 'kamiq'),
(3, 'kodiaq'),
(4, 'octavia'),
(5, 'scala'),
(6, 'superb');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `roleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idRole`, `roleName`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `first_name`, `last_name`, `email`, `password`, `idRole`) VALUES
(1, 'Marko', 'Gačanović', 'gacanovicm@yahoo.com', 'c6c0d95e21b180ce7cd28ee7ced3c09a', 2),
(2, 'Jovan', 'Jovanovic', 'jova@gmail.com', 'ed0d52bb35bbb598942a6fd0661b4362', 1),
(3, 'Nenad', 'Nedic', 'nenad@gmail.com', '3a3cce17292ad99bd5afaa89fc2a987e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bodywork_car`
--
ALTER TABLE `bodywork_car`
  ADD PRIMARY KEY (`idBodywork`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`idCar`),
  ADD KEY `idModelBodywork` (`idModelBodywork`);

--
-- Indexes for table `image_car`
--
ALTER TABLE `image_car`
  ADD PRIMARY KEY (`idImage`);

--
-- Indexes for table `model_bodywork_car`
--
ALTER TABLE `model_bodywork_car`
  ADD PRIMARY KEY (`idModelBodywork`),
  ADD KEY `idBodywork` (`idBodywork`),
  ADD KEY `idModel` (`idModel`),
  ADD KEY `idImage` (`idImage`);

--
-- Indexes for table `model_car`
--
ALTER TABLE `model_car`
  ADD PRIMARY KEY (`idModel`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bodywork_car`
--
ALTER TABLE `bodywork_car`
  MODIFY `idBodywork` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `idCar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `image_car`
--
ALTER TABLE `image_car`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `model_bodywork_car`
--
ALTER TABLE `model_bodywork_car`
  MODIFY `idModelBodywork` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `model_car`
--
ALTER TABLE `model_car`
  MODIFY `idModel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
