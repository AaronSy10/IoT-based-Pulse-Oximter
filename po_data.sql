-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 03:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `po_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `PulseRate` decimal(5,2) NOT NULL,
  `BloodOxygenLevel` int(11) NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`Date`, `Time`, `PulseRate`, `BloodOxygenLevel`, `Remarks`) VALUES
('2022-02-05', '17:01:56', '47.63', 95, 'Needs immediate attention'),
('2022-02-05', '17:02:01', '53.95', 95, 'Needs immediate attention'),
('2022-02-05', '17:02:06', '64.09', 96, 'Normal'),
('2022-02-05', '17:02:11', '72.85', 96, 'Normal'),
('2022-02-05', '17:02:16', '81.32', 96, 'Normal'),
('2022-02-05', '17:02:22', '83.51', 96, 'Normal'),
('2022-02-05', '17:02:27', '79.00', 96, 'Normal'),
('2022-02-05', '18:13:37', '75.42', 95, 'Normal'),
('2022-02-05', '18:13:47', '85.57', 95, 'Normal'),
('2022-02-05', '18:13:52', '82.82', 96, 'Normal'),
('2022-02-05', '18:13:57', '77.36', 96, 'Normal'),
('2022-02-05', '18:14:02', '76.49', 96, 'Normal'),
('2022-02-05', '18:26:53', '85.30', 96, 'Normal'),
('2022-02-05', '18:29:05', '69.69', 69, 'Normal'),
('2022-02-05', '18:29:05', '69.69', 69, 'Normal');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
