-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2025 at 03:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gas_abc`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `IpAddress` varchar(255) DEFAULT 'not_detected',
  `City` varchar(255) DEFAULT 'not_detected',
  `Region` varchar(255) DEFAULT 'not_detected',
  `Country` varchar(255) DEFAULT 'not_detected',
  `DeviceInfo` varchar(255) DEFAULT 'not_detected',
  `Provider` varchar(255) NOT NULL,
  `NetworkType` varchar(255) NOT NULL,
  `Timestamp` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_activity`
--

INSERT INTO `login_activity` (`Id`, `UserId`, `IpAddress`, `City`, `Region`, `Country`, `DeviceInfo`, `Provider`, `NetworkType`, `Timestamp`) VALUES
(1, 17, '41.186.78.204', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2024-12-31 19:35:30'),
(2, 17, '41.186.78.204', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2024-12-31 19:37:37'),
(3, 17, '41.186.78.247', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2024-12-31 22:40:11'),
(4, 17, '41.186.78.174', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-01 05:26:00'),
(5, 12, '102.22.174.206', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-01 08:04:42'),
(6, 17, '41.186.78.158', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-01 09:32:30'),
(7, 17, '41.186.78.158', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-01 09:33:41'),
(8, 17, '41.186.78.178', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-01 16:06:10'),
(9, 17, '41.186.78.241', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-02 04:58:48'),
(10, 17, '41.186.78.183', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-02 08:06:59'),
(11, 17, '41.186.78.173', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-02 11:21:17'),
(12, 2, '105.178.104.115', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 13; V2279A; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/123.0.6312.118 Mobile Safari/537.36 VivoBrowser/22.7.0.0', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-02 23:26:54'),
(13, 2, '105.178.104.115', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-03 02:37:49'),
(14, 16, '105.178.104.115', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-03 02:49:42'),
(15, 15, '41.186.78.5', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-03 02:54:30'),
(16, 17, '41.186.78.100', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-03 04:50:20'),
(17, 2, '105.178.104.0', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-03 05:31:15'),
(18, 17, '41.186.78.100', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-03 06:08:03'),
(19, 17, '41.186.78.42', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-03 14:53:50'),
(20, 17, '41.186.78.57', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-04 04:47:13'),
(21, 15, '102.22.184.104', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-04 06:58:17'),
(22, 12, '197.157.165.29', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-04 07:14:24'),
(23, 17, '41.186.78.76', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-04 07:55:20'),
(24, 17, '41.186.78.123', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-04 07:59:59'),
(25, 17, '41.186.78.55', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-04 12:15:15'),
(26, 2, '197.157.187.71', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 13; V2279A; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/123.0.6312.118 Mobile Safari/537.36 VivoBrowser/22.7.0.0', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-04 12:34:11'),
(27, 2, '197.157.187.71', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 13; V2279A; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/123.0.6312.118 Mobile Safari/537.36 VivoBrowser/22.7.0.0', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-04 12:34:20'),
(28, 2, '197.157.187.71', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 13; V2279A; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/123.0.6312.118 Mobile Safari/537.36 VivoBrowser/22.7.0.0', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-04 12:34:25'),
(29, 17, '41.186.78.7', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-04 15:24:38'),
(30, 17, '41.186.78.7', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-04 15:29:39'),
(31, 17, '41.186.78.17', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-04 16:51:16'),
(32, 17, '41.186.78.17', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-04 16:51:17'),
(33, 17, '41.186.78.79', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-05 04:40:31'),
(34, 17, '41.186.78.79', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-05 05:03:21'),
(35, 17, '41.186.78.79', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-05 06:07:00'),
(36, 17, '41.186.78.79', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-05 10:17:29'),
(37, 17, '41.186.78.50', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-05 12:47:56'),
(38, 17, '41.186.78.82', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-06 02:35:22'),
(39, 17, '41.186.78.98', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-06 05:19:25'),
(40, 17, '41.186.78.99', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-06 07:52:58'),
(41, 2, '105.178.32.28', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-06 07:59:59'),
(42, 16, '105.178.32.28', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-06 10:13:59'),
(43, 17, '41.186.78.45', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-06 11:44:52'),
(44, 17, '41.186.78.45', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-06 11:49:27'),
(45, 16, '105.178.32.234', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-06 13:43:13'),
(46, 2, '105.178.104.191', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-07 03:51:24'),
(47, 17, '41.186.78.97', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-07 04:03:37'),
(48, 17, '41.186.78.60', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-07 06:36:30'),
(49, 15, '102.22.173.33', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-07 07:05:07'),
(50, 17, '102.22.184.240', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-07 08:58:54'),
(51, 12, '197.157.165.236', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-07 11:14:44'),
(52, 17, '41.186.78.110', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-07 13:06:04'),
(53, 2, '197.157.165.15', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 13; V2279A; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/123.0.6312.118 Mobile Safari/537.36 VivoBrowser/22.8.0.0', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-07 16:39:39'),
(54, 17, '41.186.78.44', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-08 03:03:44'),
(55, 17, '41.186.78.116', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-08 08:13:53'),
(56, 17, '41.186.78.116', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-08 09:06:16'),
(57, 2, '105.178.104.53', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-08 10:06:45'),
(58, 2, '105.178.104.53', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-08 10:49:24'),
(59, 17, '41.186.78.48', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-08 14:04:58'),
(60, 2, '105.178.104.24', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-09 02:23:07'),
(61, 15, '102.22.173.33', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-09 02:27:42'),
(62, 15, '102.22.173.33', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-09 02:27:42'),
(63, 17, '41.186.78.13', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-09 03:50:15'),
(64, 15, '102.22.173.33', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-09 05:38:17'),
(65, 17, '41.186.78.87', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-09 06:28:38'),
(66, 17, '41.186.78.87', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-09 06:32:11'),
(67, 17, '41.186.78.68', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-09 09:38:21'),
(68, 17, '41.186.78.68', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-09 09:38:25'),
(69, 2, '197.157.155.34', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 13; V2279A; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/123.0.6312.118 Mobile Safari/537.36 VivoBrowser/22.8.0.0', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-09 11:11:44'),
(70, 2, '197.157.155.34', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 13; V2279A; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/123.0.6312.118 Mobile Safari/537.36 VivoBrowser/22.8.0.0', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-09 11:11:49'),
(71, 17, '41.186.78.47', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-10 04:25:35'),
(72, 17, '41.186.78.68', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-10 07:17:50'),
(73, 17, '41.186.78.15', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-10 18:15:26'),
(74, 2, '105.178.32.216', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-11 00:49:02'),
(75, 2, '105.178.32.216', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-11 02:18:04'),
(76, 12, '102.22.174.206', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-11 03:19:50'),
(77, 2, '105.178.32.216', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-11 03:49:23'),
(78, 17, '41.186.78.77', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-11 14:14:40'),
(79, 17, '41.186.78.118', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-11 18:59:18'),
(80, 17, '41.186.78.7', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-12 04:03:04'),
(81, 12, '102.22.174.206', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-12 08:23:16'),
(82, 17, '41.186.78.126', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-12 09:30:25'),
(83, 17, '41.186.78.159', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-12 13:46:36'),
(84, 17, '41.186.78.159', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-12 13:49:39'),
(85, 17, '41.186.78.164', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-12 17:19:41'),
(86, 2, '105.178.32.159', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-13 02:51:13'),
(87, 17, '41.186.78.158', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-13 04:07:55'),
(88, 2, '105.178.32.159', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-13 04:30:20'),
(89, 2, '105.178.32.159', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-13 04:59:33'),
(90, 17, '41.186.78.158', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-13 07:01:28'),
(91, 17, '41.186.78.158', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-13 08:17:03'),
(92, 17, '41.186.184.14', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-13 09:05:26'),
(93, 17, '41.186.184.14', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-13 09:36:24'),
(94, 2, '197.157.187.116', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 13; V2279A; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/123.0.6312.118 Mobile Safari/537.36 VivoBrowser/22.9.0.2', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-13 13:48:13'),
(95, 17, '197.157.187.150', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-13 14:02:33'),
(96, 17, '197.157.187.150', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-13 14:02:33'),
(97, 17, '197.157.187.150', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS327707 Airtel Rwanda Ltd', 'VPN/Generic Tunnel', '2025-01-13 14:03:23'),
(98, 2, '105.178.32.211', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-14 05:01:46'),
(99, 17, '41.186.78.181', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-14 09:08:14'),
(100, 17, '41.186.78.222', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-14 15:18:15'),
(101, 2, '105.178.32.85', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-15 01:01:11'),
(102, 15, '102.22.173.33', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-15 01:18:17'),
(103, 17, '41.186.78.231', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-15 02:38:58'),
(104, 17, '41.186.78.231', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-15 02:39:48'),
(105, 2, '105.178.32.85', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-15 05:31:26'),
(106, 12, '105.178.32.85', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-15 07:52:00'),
(107, 17, '41.173.250.2', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36937 Liquid Telecommunications South Africa (Pty) Ltd', 'VPN/Generic Tunnel', '2025-01-15 07:58:12'),
(108, 2, '105.178.32.85', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-15 08:06:02'),
(109, 15, '102.22.170.201', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-16 03:07:39'),
(110, 2, '105.178.32.176', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-16 03:19:42'),
(111, 17, '41.186.78.201', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-16 04:15:28'),
(112, 2, '105.178.32.176', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-16 04:47:50'),
(113, 15, '102.22.170.201', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-16 05:06:13'),
(114, 2, '105.178.32.176', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-16 06:12:23'),
(115, 2, '105.178.32.176', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-16 07:02:01'),
(116, 16, '105.178.32.176', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-16 07:04:21'),
(117, 2, '105.178.32.176', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-16 07:06:21'),
(118, 12, '102.22.174.206', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS36924 GVA Cote d\'Ivoire SAS', 'VPN/Generic Tunnel', '2025-01-16 07:17:17'),
(119, 17, '41.186.78.209', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-16 07:18:21'),
(120, 17, '41.186.78.209', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-16 07:23:11'),
(121, 16, '41.186.78.209', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-16 07:30:21'),
(122, 16, '105.178.32.176', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-16 07:30:41'),
(123, 16, '105.178.32.176', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-16 07:31:49'),
(124, 16, '41.186.78.209', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-16 07:32:19'),
(125, 2, '105.178.32.176', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'AS37228 KT RWANDA NETWORK Ltd', 'VPN/Generic Tunnel', '2025-01-16 07:33:54'),
(126, 17, '41.186.78.209', 'Kigali', 'Kigali', 'RW', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'AS36890 MTN Rwandacell', 'VPN/Generic Tunnel', '2025-01-16 07:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `metrics`
--

CREATE TABLE `metrics` (
  `MetricId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Me_Action` varchar(500) NOT NULL,
  `isDeleted` varchar(45) NOT NULL DEFAULT 'notDeleted',
  `Me_Date` varchar(25) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metrics`
--

INSERT INTO `metrics` (`MetricId`, `UserId`, `Me_Action`, `isDeleted`, `Me_Date`) VALUES
(1, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (7066437375357) Ticket number on (357) Ticket System Price and (0) Ticket System Commission\r\n                on (JIA SHUQIANG) Passenger name with (EC7303512) passport number from (no_company_selected) Company name on (01/01/2025) Date.', 'notDeleted', '2025-01-01 08:33:06'),
(2, 15, '(KAREMERA  WILSON - User) added new ticket with (0712149785561) Ticket number on (796) Ticket System Price and (20) Ticket System Commission\r\n                on (TANG HAIPENG) Passenger name with (PE2193328) passport number from (no_company_selected) Company name on (03/01/2025) Date.', 'notDeleted', '2025-01-03 02:59:07'),
(3, 15, '(KAREMERA  WILSON - User) added new ticket with (4599588307038) Ticket number on (776) Ticket System Price and (13) Ticket System Commission\r\n                on (ZENG YONGZHONG) Passenger name with (E53166495) passport number from (no_company_selected) Company name on (03/01/2025) Date.', 'notDeleted', '2025-01-03 03:01:45'),
(4, 15, '(KAREMERA  WILSON - User) added new ticket with (4599588307039) Ticket number on (776) Ticket System Price and (13) Ticket System Commission\r\n                on (ZHANG YAN) Passenger name with (EJ0731953) passport number from (no_company_selected) Company name on (03/01/2025) Date.', 'notDeleted', '2025-01-03 03:04:03'),
(5, 2, 'NSHIMIYIMANA DIEUDONNE - admin changed report reference to () report reference in the system.', 'notDeleted', '2025-01-03 05:32:57'),
(6, 2, 'NSHIMIYIMANA DIEUDONNE - admin changed report reference to (PSTA 03012025) report reference in the system.', 'notDeleted', '2025-01-03 05:33:18'),
(7, 2, 'NSHIMIYIMANA DIEUDONNE - admin changed report price from $(2659.00) to $(2659.00) in the system.', 'notDeleted', '2025-01-03 05:34:02'),
(8, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (7066437375357) Ticket Number that was issued on\r\n        (JIA SHUQIANG) Passenger Name that has been issued at (2025-01-01) Date at the (DAR-KGL) Travel on the ticket\r\n        bought on (357 - $) Ticket System Price with (457 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-03 05:35:27'),
(9, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (0712149785561) Ticket Number that was issued on\r\n        (TANG HAIPENG) Passenger Name that has been issued at (2024-12-27) Date at the (KGL-PEK) Travel on the ticket\r\n        bought on (796 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-03 05:36:47'),
(10, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307038) Ticket Number that was issued on\r\n        (ZENG YONGZHONG) Passenger Name that has been issued at (2025-01-02) Date at the (NBO-KGL-NBO) Travel on the ticket\r\n        bought on (776 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-03 05:37:30'),
(11, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307039) Ticket Number that was issued on\r\n        (ZHANG YAN) Passenger Name that has been issued at (2025-01-02) Date at the (NBO-KGL-NBO) Travel on the ticket\r\n        bought on (776 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-03 05:38:09'),
(12, 15, '(KAREMERA  WILSON - User) added new ticket with (0779588307070) Ticket number on (867) Ticket System Price and (0) Ticket System Commission\r\n                on (HE XIAO) Passenger name with (EJ3837329) passport number from (no_company_selected) Company name on (04/01/2025) Date.', 'notDeleted', '2025-01-04 07:05:11'),
(13, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (0779588307075) Ticket number on (845) Ticket System Price and (0) Ticket System Commission\r\n                on (PENG XIAOQI) Passenger name with (EM3089864) passport number from (no_company_selected) Company name on (04/01/2025) Date.', 'notDeleted', '2025-01-04 07:17:24'),
(14, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307038) Ticket Number that was issued on\r\n        (ZENG YONGZHONG) Passenger Name that has been issued at (2025-01-02) Date at the (NBO-KGL-NBO) Travel on the ticket\r\n        bought on (776 - $) Ticket System Price with (950 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-07 03:53:21'),
(15, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307038) Ticket Number that was issued on\r\n        (ZENG YONGZHONG) Passenger Name that has been issued at (2025-01-02) Date at the (NBO-KGL-NBO) Travel on the ticket\r\n        bought on (776 - $) Ticket System Price with (950 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-07 04:22:18'),
(16, 15, '(KAREMERA  WILSON - User) added new ticket with (4599588307091) Ticket number on (344) Ticket System Price and (10) Ticket System Commission\r\n                on (YAN DONGMING) Passenger name with (ED6703921) passport number from (no_company_selected) Company name on (07/01/2025) Date.', 'notDeleted', '2025-01-07 07:07:26'),
(17, 15, '(KAREMERA  WILSON - User) added new ticket with (4599588307092) Ticket number on (344) Ticket System Price and (10) Ticket System Commission\r\n                on (CHEN DONGLIANG) Passenger name with (EJ4706965) passport number from (no_company_selected) Company name on (07/01/2025) Date.', 'notDeleted', '2025-01-07 07:11:07'),
(18, 15, '(KAREMERA  WILSON - User) added new ticket with (4599588307093) Ticket number on (344) Ticket System Price and (10) Ticket System Commission\r\n                on (LIN BINGQUAN) Passenger name with (EK4295562) passport number from (no_company_selected) Company name on (07/01/2025) Date.', 'notDeleted', '2025-01-07 07:12:05'),
(19, 15, '(KAREMERA  WILSON - User) updated this ticket with (4599588307093) Ticket Number that was issued on\r\n        (LIN BINGQUAN) Passenger Name that has been issued at (2025-01-06) Date at the (DAR-KGL) Travel on the ticket\r\n        bought on (344 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-07 07:12:30'),
(20, 15, '(KAREMERA  WILSON - User) added new ticket with (4599588307094) Ticket number on (344) Ticket System Price and (10) Ticket System Commission\r\n                on (YAN FENG) Passenger name with (EG1847557) passport number from (no_company_selected) Company name on (07/01/2025) Date.', 'notDeleted', '2025-01-07 07:13:40'),
(21, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (4599588307113) Ticket number on (344) Ticket System Price and (10) Ticket System Commission\r\n                on (YAN GAOSEN) Passenger name with (-) passport number from (no_company_selected) Company name on (07/01/2025) Date.', 'notDeleted', '2025-01-07 11:18:31'),
(22, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (7066437375357) Ticket Number that was issued on\r\n        (JIA SHUQIANG) Passenger Name that has been issued at (2025-01-01) Date at the (DAR-KGL) Travel on the ticket\r\n        bought on (357 - $) Ticket System Price with (457 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-08 10:12:50'),
(23, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (0712149785561) Ticket Number that was issued on\r\n        (TANG HAIPENG) Passenger Name that has been issued at (2024-12-27) Date at the (KGL-PEK) Travel on the ticket\r\n        bought on (796 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-08 10:13:57'),
(24, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (7066437375357) Ticket Number that was issued on\r\n        (JIA SHUQIANG) Passenger Name that has been issued at (2025-01-01) Date at the (DAR-KGL) Travel on the ticket\r\n        bought on (357 - $) Ticket System Price with (457 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-08 10:14:29'),
(25, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307038) Ticket Number that was issued on\r\n        (ZENG YONGZHONG) Passenger Name that has been issued at (2025-01-02) Date at the (NBO-KGL-NBO) Travel on the ticket\r\n        bought on (776 - $) Ticket System Price with (950 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-08 10:15:07'),
(26, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307039) Ticket Number that was issued on\r\n        (ZHANG YAN) Passenger Name that has been issued at (2025-01-02) Date at the (NBO-KGL-NBO) Travel on the ticket\r\n        bought on (776 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-08 10:15:37'),
(27, 2, 'NSHIMIYIMANA DIEUDONNE - admin changed report price from $(3382.00) to $(3382.00) in the system.', 'notDeleted', '2025-01-09 02:34:28'),
(28, 2, 'NSHIMIYIMANA DIEUDONNE - admin changed report reference to (PSTA 09012025) report reference in the system.', 'notDeleted', '2025-01-09 02:34:51'),
(29, 15, '(KAREMERA  WILSON - User) added new ticket with (3249042068885) Ticket number on (195) Ticket System Price and (0) Ticket System Commission\r\n                on (YU FEI) Passenger name with (EK3021436) passport number from (no_company_selected) Company name on (09/01/2025) Date.', 'notDeleted', '2025-01-09 02:40:15'),
(30, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (3249042068885) Ticket Number that was issued on\r\n        (YU FEI) Passenger Name that has been issued at (2025-01-05) Date at the (XMN-WDS) Travel on the ticket\r\n        bought on (195 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-09 02:44:56'),
(31, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (3249042068885) Ticket Number that was issued on\r\n        (YU FEI) Passenger Name that has been issued at (2025-01-05) Date at the (XMN-WDS) Travel on the ticket\r\n        bought on (195 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-09 02:46:10'),
(32, 15, '(KAREMERA  WILSON - User) voided this ticket with (3249042068885) Ticket number that was voided on (35) Void Fees\r\n            on (YU FEI) Passenger name with (EK3021436) passport number from (0) Company name on (09/01/2025) Date.', 'notDeleted', '2025-01-09 02:48:47'),
(33, 2, 'NSHIMIYIMANA DIEUDONNE - admin deleted already saved report with (000058) report number in the system.', 'notDeleted', '2025-01-09 03:07:22'),
(34, 2, 'NSHIMIYIMANA DIEUDONNE - admin deleted already saved report with (000058) report number in the system.', 'notDeleted', '2025-01-09 03:07:57'),
(35, 2, 'NSHIMIYIMANA DIEUDONNE - admin changed report reference to (PSTA 09012025) report reference in the system.', 'notDeleted', '2025-01-09 03:11:26'),
(36, 2, 'NSHIMIYIMANA DIEUDONNE - admin changed report price from $(3417.00) to $(3417.00) in the system.', 'notDeleted', '2025-01-09 03:12:00'),
(37, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (4599588307660) Ticket number on (235) Ticket System Price and (0) Ticket System Commission\r\n                on (JIANG XIA) Passenger name with (-) passport number from (no_company_selected) Company name on (11/01/2025) Date.', 'notDeleted', '2025-01-11 03:22:14'),
(38, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (4599588307661) Ticket number on (235) Ticket System Price and (0) Ticket System Commission\r\n                on (LUO XIAOLI) Passenger name with (-) passport number from (no_company_selected) Company name on (11/01/2025) Date.', 'notDeleted', '2025-01-11 03:24:34'),
(39, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307660) Ticket Number that was issued on\r\n        (JIANG XIA) Passenger Name that has been issued at (2025-01-11) Date at the (KGL-KME) Travel on the ticket\r\n        bought on (235 - $) Ticket System Price with (235 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-11 03:52:07'),
(40, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307661) Ticket Number that was issued on\r\n        (LUO XIAOLI) Passenger Name that has been issued at (2025-01-11) Date at the (KGL-KME) Travel on the ticket\r\n        bought on (235 - $) Ticket System Price with (235 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-11 03:52:31'),
(41, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307660) Ticket Number that was issued on\r\n        (JIANG XIA) Passenger Name that has been issued at (2025-01-11) Date at the (KGL-KME-KGL) Travel on the ticket\r\n        bought on (235 - $) Ticket System Price with (235 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-11 03:54:18'),
(42, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307661) Ticket Number that was issued on\r\n        (LUO XIAOLI) Passenger Name that has been issued at (2025-01-11) Date at the (KGL-KME-KGL) Travel on the ticket\r\n        bought on (235 - $) Ticket System Price with (235 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-11 03:54:53'),
(43, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307660) Ticket Number that was issued on\r\n        (JIANG XIA) Passenger Name that has been issued at (2025-01-11) Date at the (KGL-KME-KGL) Travel on the ticket\r\n        bought on (235 - $) Ticket System Price with (235 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-11 03:55:36'),
(44, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307660) Ticket Number that was issued on\r\n        (JIANG XIA) Passenger Name that has been issued at (2025-01-11) Date at the (KGL-KME-KGL) Travel on the ticket\r\n        bought on (235 - $) Ticket System Price with (235 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-11 04:09:46'),
(45, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307661) Ticket Number that was issued on\r\n        (LUO XIAOLI) Passenger Name that has been issued at (2025-01-11) Date at the (KGL-KME-KGL) Travel on the ticket\r\n        bought on (235 - $) Ticket System Price with (235 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-11 04:10:11'),
(46, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (4599588307677) Ticket number on (274) Ticket System Price and (9) Ticket System Commission\r\n                on (LIN BINGQUAN) Passenger name with (EK4295562) passport number from (no_company_selected) Company name on (12/01/2025) Date.', 'notDeleted', '2025-01-12 08:26:22'),
(47, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (459958830765) Ticket number on (274) Ticket System Price and (9) Ticket System Commission\r\n                on (CHENG DONGLIANG) Passenger name with (EJ4706965) passport number from (no_company_selected) Company name on (12/01/2025) Date.', 'notDeleted', '2025-01-12 08:28:29'),
(48, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (4599588307676) Ticket number on (274) Ticket System Price and (9) Ticket System Commission\r\n                on (YAN DONGMING) Passenger name with (ED6703921) passport number from (no_company_selected) Company name on (12/01/2025) Date.', 'notDeleted', '2025-01-12 08:29:40'),
(49, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (4599588307678) Ticket number on (274) Ticket System Price and (9) Ticket System Commission\r\n                on (YAN GAOSEN) Passenger name with (EN5825720) passport number from (no_company_selected) Company name on (12/01/2025) Date.', 'notDeleted', '2025-01-12 08:31:08'),
(50, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (4599588307674) Ticket number on (274) Ticket System Price and (9) Ticket System Commission\r\n                on (YAN FENG) Passenger name with (EG1847557) passport number from (no_company_selected) Company name on (12/01/2025) Date.', 'notDeleted', '2025-01-12 08:32:00'),
(51, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (0779588307070) Ticket Number that was issued on\r\n        (HE XIAO) Passenger Name that has been issued at (2025-01-03) Date at the (KGL-PEK) Travel on the ticket\r\n        bought on (867 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-13 05:03:54'),
(52, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (0779588307075) Ticket Number that was issued on\r\n        (PENG XIAOQI) Passenger Name that has been issued at (2025-01-04) Date at the (KGL-CAN) Travel on the ticket\r\n        bought on (845 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-13 05:05:09'),
(53, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307091) Ticket Number that was issued on\r\n        (YAN DONGMING) Passenger Name that has been issued at (2025-01-06) Date at the (DAR-KGL) Travel on the ticket\r\n        bought on (344 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-13 05:07:27'),
(54, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307092) Ticket Number that was issued on\r\n        (CHEN DONGLIANG) Passenger Name that has been issued at (2025-01-06) Date at the (DAR-KGL) Travel on the ticket\r\n        bought on (344 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-13 05:07:53'),
(55, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307093) Ticket Number that was issued on\r\n        (LIN BINGQUAN) Passenger Name that has been issued at (2025-01-06) Date at the (DAR-KGL) Travel on the ticket\r\n        bought on (344 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-13 05:08:24'),
(56, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307094) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-06) Date at the (DAR-KGL) Travel on the ticket\r\n        bought on (344 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-13 05:08:56'),
(57, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (4599588307113) Ticket Number that was issued on\r\n        (YAN GAOSEN) Passenger Name that has been issued at (2025-01-07) Date at the (DAR-KGL) Travel on the ticket\r\n        bought on (344 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-13 05:09:36'),
(58, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (7062306556298) Ticket number on (570) Ticket System Price and (0) Ticket System Commission\r\n                on (WANG WEI) Passenger name with (PE3236036) passport number from (no_company_selected) Company name on (15/01/2025) Date.', 'notDeleted', '2025-01-15 07:54:57'),
(59, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (7062306556298) Ticket Number that was issued on\r\n        (WANG WEI) Passenger Name that has been issued at (2025-01-15) Date at the (KGL-CAN) Travel on the ticket\r\n        bought on (570 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-15 08:06:52'),
(60, 15, '(KAREMERA  WILSON - User) added new ticket with (4599588307737) Ticket number on (322) Ticket System Price and (9) Ticket System Commission\r\n                on (YAN FENG) Passenger name with (EG1847557) passport number from (no_company_selected) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 03:17:10'),
(61, 15, '(KAREMERA  WILSON - User) added new ticket with (1099593251012) Ticket number on (361) Ticket System Price and (0) Ticket System Commission\r\n                on (YAN DONGMING) Passenger name with (ED6703921) passport number from (no_company_selected) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 03:19:10'),
(62, 15, '(KAREMERA  WILSON - User) added new ticket with (1099593251013) Ticket number on (361) Ticket System Price and (0) Ticket System Commission\r\n                on (YAN GAOSEN) Passenger name with (EN5825720) passport number from (no_company_selected) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 03:24:35'),
(63, 15, '(KAREMERA  WILSON - User) added new ticket with (1099593251011) Ticket number on (361) Ticket System Price and (0) Ticket System Commission\r\n                on (LIN BINGQUAN) Passenger name with (EK4295562) passport number from (no_company_selected) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 03:26:17'),
(64, 15, '(KAREMERA  WILSON - User) added new ticket with (1099593251010) Ticket number on (361) Ticket System Price and (0) Ticket System Commission\r\n                on (CHEN DONGLIANG) Passenger name with (EJ4706965) passport number from (no_company_selected) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 03:27:14'),
(65, 15, '(KAREMERA  WILSON - User) added new ticket with (0779588307744) Ticket number on (881) Ticket System Price and (0) Ticket System Commission\r\n                on (LU CHANGYU) Passenger name with (EL5803847) passport number from (no_company_selected) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 05:07:51'),
(66, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (0779588307744) Ticket Number that was issued on\r\n        (LU CHANGYU) Passenger Name that has been issued at (2025-01-16) Date at the (KGL-CAN) Travel on the ticket\r\n        bought on (881 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 05:22:26'),
(67, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (1099593251012) Ticket Number that was issued on\r\n        (YAN DONGMING) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-DAR) Travel on the ticket\r\n        bought on (361 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 07:03:14'),
(68, 2, '(NSHIMIYIMANA DIEUDONNE - admin) voided this ticket with (1099593251012) Ticket number that was voided on (20) Void Fees\r\n            on (YAN DONGMING) Passenger name with (ED6703921) passport number from (0) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 07:03:46'),
(69, 16, '(Didros thx - user) updated this ticket with (1099593251010) Ticket Number that was issued on\r\n        (CHEN DONGLIANG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-DAR) Travel on the ticket\r\n        bought on (361 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 07:05:16'),
(70, 16, '(Didros thx - user) updated this ticket with (1099593251010) Ticket Number that was issued on\r\n        (CHEN DONGLIANG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-DAR) Travel on the ticket\r\n        bought on (361 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 07:06:05'),
(71, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (1099593251010) Ticket Number that was issued on\r\n        (CHEN DONGLIANG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-DAR) Travel on the ticket\r\n        bought on (361 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 07:06:48'),
(72, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (1099593251013) Ticket Number that was issued on\r\n        (YAN GAOSEN) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-DAR) Travel on the ticket\r\n        bought on (361 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 07:07:38'),
(73, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (1099593251011) Ticket Number that was issued on\r\n        (LIN BINGQUAN) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-DAR) Travel on the ticket\r\n        bought on (361 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 07:07:54'),
(74, 2, '(NSHIMIYIMANA DIEUDONNE - admin) voided this ticket with (1099593251010) Ticket number that was voided on (20) Void Fees\r\n            on (CHEN DONGLIANG) Passenger name with (EJ4706965) passport number from (0) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 07:08:25'),
(75, 2, '(NSHIMIYIMANA DIEUDONNE - admin) voided this ticket with (1099593251013) Ticket number that was voided on (20) Void Fees\r\n            on (YAN GAOSEN) Passenger name with (EN5825720) passport number from (0) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 07:08:53'),
(76, 2, '(NSHIMIYIMANA DIEUDONNE - admin) voided this ticket with (1099593251011) Ticket number that was voided on (20) Void Fees\r\n            on (LIN BINGQUAN) Passenger name with (EK4295562) passport number from (0) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 07:09:19'),
(77, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (1097654876875) Ticket number on (675) Ticket System Price and (0) Ticket System Commission\r\n                on (CHEN DONGLIANG) Passenger name with (EJ4706965) passport number from (no_company_selected) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 07:22:26'),
(78, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (1097654876876) Ticket number on (675) Ticket System Price and (0) Ticket System Commission\r\n                on (LIN BINGQUAN) Passenger name with (EK4295562) passport number from (no_company_selected) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 07:24:36'),
(79, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (1097654876877) Ticket number on (675) Ticket System Price and (0) Ticket System Commission\r\n                on (YAN GAOSEN) Passenger name with (EN5825720) passport number from (no_company_selected) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 07:29:31'),
(80, 12, '(HABINTWALI IBRAHIM - user) added new ticket with (1097654876878) Ticket number on (675) Ticket System Price and (0) Ticket System Commission\r\n                on (YAN DONGMING) Passenger name with (ED6703921) passport number from (no_company_selected) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 07:31:05'),
(81, 16, 'Didros thx changed his/her password to the new one.', 'notDeleted', '2025-01-16 07:31:31'),
(82, 2, '(NSHIMIYIMANA DIEUDONNE - admin) updated this ticket with (7062306556298) Ticket Number that was issued on\r\n        (WANG WEI) Passenger Name that has been issued at (2025-01-15) Date at the (KGL-CAN) Travel on the ticket\r\n        bought on (570 - $) Ticket System Price with (670 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 07:44:44'),
(83, 17, '(GANZA PRINCE PARFAIT - admin) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 14:53:34'),
(84, 17, '(GANZA PRINCE PARFAIT - admin) voided this ticket with (4599588307737) Ticket number that was voided on (12) Void Fees\r\n            on (YAN FENG) Passenger name with (EG1847557) passport number from (0) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 14:54:08'),
(85, 17, 'GANZA PRINCE PARFAIT - admin deleted voided ticket in the system.', 'notDeleted', '2025-01-16 14:54:16'),
(86, 16, 'Didros thx changed his/her password to the new one.', 'notDeleted', '2025-01-16 14:55:03'),
(87, 17, '(GANZA PRINCE PARFAIT - admin) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 14:56:23'),
(88, 16, '(Didros thx - user) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 14:56:56'),
(89, 16, '(Didros thx - user) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 14:58:57'),
(90, 17, '(GANZA PRINCE PARFAIT - admin) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 14:59:26'),
(91, 17, '(GANZA PRINCE PARFAIT - admin) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 14:59:40'),
(92, 16, '(Didros thx - user) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 15:01:15'),
(93, 16, '(Didros thx - user) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 15:01:35'),
(94, 16, '(Didros thx - user) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 15:01:42'),
(95, 16, '(Didros thx - user) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 15:01:51'),
(96, 16, '(Didros thx - user) updated this ticket with (4599588307737) Ticket Number that was issued on\r\n        (YAN FENG) Passenger Name that has been issued at (2025-01-16) Date at the (EBB-KGL) Travel on the ticket\r\n        bought on (322 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-16 15:02:15'),
(97, 16, '(Didros thx - user) voided this ticket with (4599588307737) Ticket number that was voided on (12) Void Fees\r\n            on (YAN FENG) Passenger name with (EG1847557) passport number from (0) Company name on (16/01/2025) Date.', 'notDeleted', '2025-01-16 15:02:30'),
(98, 17, '(GANZA PRINCE PARFAIT - admin) updated this ticket with (0779588307070) Ticket Number that was issued on\r\n        (HE XIAO) Passenger Name that has been issued at (2025-01-03) Date at the (KGL-PEK) Travel on the ticket\r\n        bought on (867 - $) Ticket System Price with (0 - $) Commission Ticket System Price.', 'notDeleted', '2025-01-17 15:15:31'),
(99, 17, '(GANZA PRINCE PARFAIT - admin) refunded this ticket with (0779588307070) Ticket number that was refunded on (12) Refund Fees\r\n                on (HE XIAO) Passenger name with () passport number from (0) Company name on (17/01/2025) Date.', 'notDeleted', '2025-01-17 15:15:58'),
(100, 17, '(GANZA PRINCE PARFAIT - admin) updated this refunded ticket with (0779588307070) Ticket number that was refunded on (12) Refund Fees\r\n            on (HE XIAO) Passenger name with (EJ3837329) passport number from (N/A) Company name on (17/01/2025) Date.', 'notDeleted', '2025-01-17 15:17:50'),
(101, 17, 'Prince Parfait Parfait - admin changed his/her profile.', 'notDeleted', '2025-01-28 15:29:17'),
(102, 17, 'Prince Parfait w - admin changed his/her profile.', 'notDeleted', '2025-01-28 15:29:50'),
(103, 17, 'Prince Parfait GANZA changed his/her password to the new one.', 'notDeleted', '2025-01-28 15:31:09'),
(104, 17, 'Prince Parfait GANZA - admin changed his/her profile.', 'notDeleted', '2025-01-28 15:31:36'),
(105, 17, 'Prince Parfait GANZA - admin changed his/her profile.', 'notDeleted', '2025-01-28 15:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `Unique_id` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Role` varchar(50) NOT NULL DEFAULT 'NoRole',
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Profile` varchar(255) NOT NULL DEFAULT 'NoProfile',
  `Access` varchar(50) NOT NULL DEFAULT 'Granted',
  `failed_attempts` int(11) NOT NULL DEFAULT 0,
  `lock_until` datetime DEFAULT NULL,
  `PasswordDetection` int(11) NOT NULL DEFAULT 1,
  `isDeleted` varchar(45) NOT NULL DEFAULT 'notDeleted',
  `DateCreated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Unique_id`, `FirstName`, `LastName`, `PhoneNumber`, `Email`, `Role`, `Password`, `Gender`, `Profile`, `Access`, `failed_attempts`, `lock_until`, `PasswordDetection`, `isDeleted`, `DateCreated`) VALUES
(17, '198442649', 'Prince Parfait', 'GANZA', '0798442649', 'ganzaparfait7@gmail.com', 'admin', '$2y$10$h/eRPDZTzwLJ3vfIboeNHun29z1SNgfBvxgK9THv/ZKF0MRpEOhKu', 'male', '1738070990prince.jpg', 'Granted', 0, NULL, 1, 'notDeleted', '2024-05-14 04:22:55'),
(23, '991597663', 'Sauver', 'Pro', '0792054846', 'sauver220@gmail.com', 'user', '$2y$10$2DtOzlvemA.SDPTX30ZP/eTmymqhNFN71U/SUAti.Xth4J59mnqCi', 'Male', 'NoProfile', 'Granted', 0, NULL, 0, 'notDeleted', '2025-01-28 15:35:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_activity`
--
ALTER TABLE `login_activity`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `metrics`
--
ALTER TABLE `metrics`
  ADD PRIMARY KEY (`MetricId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_activity`
--
ALTER TABLE `login_activity`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `metrics`
--
ALTER TABLE `metrics`
  MODIFY `MetricId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
