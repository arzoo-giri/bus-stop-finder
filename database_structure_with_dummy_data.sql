-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 07:33 PM
-- Server version: 9.0.1
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
 /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
 /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 /*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver_data`
--

CREATE TABLE `driver_data` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `bus_registration` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dummy data for table `driver_data`
--

INSERT INTO `driver_data` (`id`, `name`, `number`, `bus_registration`, `license`, `password`) VALUES
(1, 'Driver One', '0000000000', 'BUS123', '001', 'Test@123'),
(2, 'Driver Two', '1111111111', 'BUS456', '002', 'Test@123');

-- --------------------------------------------------------

--
-- Table structure for table `fm_data`
--

CREATE TABLE `fm_data` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dummy data for table `fm_data`
--

INSERT INTO `fm_data` (`id`, `name`, `email`, `place_name`, `password`) VALUES
(2, 'Manager User', 'manager@example.com', 'Sample Location', '$2y$10$ExampleHashedPasswordString');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int NOT NULL,
  `bus_registration` varchar(255) DEFAULT NULL,
  `from_stop` varchar(255) DEFAULT NULL,
  `to_stop` varchar(255) DEFAULT NULL,
  `departure` varchar(255) DEFAULT NULL,
  `arrival` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dummy data for table `schedules`
--

INSERT INTO `schedules` (`id`, `bus_registration`, `from_stop`, `to_stop`, `departure`, `arrival`) VALUES
(2, 'BUS456', 'Stop A', 'Stop B', '08:00 AM', '08:30 AM');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `estimated_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dummy data for table `stops`
--

INSERT INTO `stops` (`id`, `name`, `latitude`, `longitude`, `estimated_time`) VALUES
(1, 'Stop A', '27.7000', '85.3000', '15'),
(2, 'Stop B', '27.7100', '85.3100', '10'),
(3, 'Stop C', '27.7200', '85.3200', '20');

-- Indexes
ALTER TABLE `driver_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bus_registration` (`bus_registration`);

ALTER TABLE `fm_data`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_registration` (`bus_registration`);

ALTER TABLE `stops`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT
ALTER TABLE `driver_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `fm_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `schedules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `stops`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- Foreign Keys
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`bus_registration`) REFERENCES `driver_data` (`bus_registration`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
