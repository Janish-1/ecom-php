-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 03:32 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` text,
  `name` varchar(50) DEFAULT NULL,
  `address` text,
  `city` varchar(30) DEFAULT NULL,
  `gstin` varchar(20) DEFAULT NULL,
  `comission` varchar(2) NOT NULL DEFAULT '0',
  `lastloginip` varchar(20) DEFAULT NULL,
  `points` varchar(10) DEFAULT NULL,
  `blocked` int(2) DEFAULT '0',
  `reason` text,
  `admin` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `phone`, `password`, `name`, `address`, `city`, `gstin`, `comission`, `lastloginip`, `points`, `blocked`, `reason`, `admin`) VALUES
(5, 'ayushlove9@gmail.com', '8770078128', '5cbf249edf741e2a1561fb68f43b9bca', 'Paliwal ji', 'near bengali squre, kanadiya road', 'Indore', 'gstin', '2', NULL, '0', 0, NULL, 1),
(6, 'user@user.com', 'phone', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'address', 'city', 'gkls', '10', NULL, '0', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `adminlogintable`
--

CREATE TABLE `adminlogintable` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `system` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogintable`
--

INSERT INTO `adminlogintable` (`id`, `user`, `ip`, `dateTime`, `system`) VALUES
(1, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(2, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(3, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(4, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(5, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(6, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(7, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(8, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(9, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(10, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(11, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(12, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(13, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(14, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(15, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(16, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(17, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(18, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(19, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(20, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(21, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(22, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(23, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(24, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(25, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(26, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(27, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(28, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(29, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(30, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(31, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(32, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(33, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(34, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(35, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(36, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(37, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(38, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(39, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(40, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(41, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(42, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(43, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(44, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(45, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(46, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(47, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(48, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(49, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(50, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(51, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(52, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Mobile Safari/537.36'),
(53, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(54, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(55, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(56, 5, '::1', NULL, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(57, 5, '::1', NULL, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(58, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(59, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(60, 5, '::1', NULL, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(61, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(62, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(63, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(64, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(65, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'),
(66, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36'),
(67, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36'),
(68, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36'),
(69, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36'),
(70, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36'),
(71, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36'),
(72, 5, '::1', NULL, 'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Mobile Safari/537.36'),
(73, 5, '::1', NULL, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

CREATE TABLE `cartitem` (
  `id` int(11) NOT NULL,
  `uniqueuserid` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` varchar(30) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productOption` varchar(50) NOT NULL,
  `productPrice` varchar(10) NOT NULL,
  `productQuantity` varchar(5) NOT NULL,
  `productTotal` varchar(10) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`id`, `uniqueuserid`, `userid`, `productid`, `productName`, `productOption`, `productPrice`, `productQuantity`, `productTotal`, `datetime`, `active`) VALUES
(51, 'vMS3uKKtOAzPA1nzOIgU', 5, 'puk', 'kpaskp', '', '', '1', '', '2018-10-10 01:43:52', 0),
(52, 'vMS3uKKtOAzPA1nzOIgU', 5, 'sku', 'kl', '', '90', '1', '90', '2018-10-10 01:43:53', 0),
(53, 'vMS3uKKtOAzPA1nzOIgU', 5, '1234567', 'Product 1', '', '120', '1', '120', '2018-10-10 01:46:27', 0),
(54, 'vMS3uKKtOAzPA1nzOIgU', 0, '1234568', 'Product 2', '', '160', '1', '160', '2018-10-11 01:51:28', 0),
(55, 'vMS3uKKtOAzPA1nzOIgU', 0, '1234567', 'Product 1', '', '120', '1', '120', '2018-10-11 02:04:28', 0),
(56, 'vMS3uKKtOAzPA1nzOIgU', 0, '1234568', 'Product 2', '', '160', '1', '160', '2018-10-11 02:04:30', 0),
(57, 'vMS3uKKtOAzPA1nzOIgU', 0, 'Product', 'Product', '', '1456', '1', '1456', '2018-10-11 02:04:32', 0),
(58, 'vMS3uKKtOAzPA1nzOIgU', 0, '1234568', 'Product 2', '', '160', '2', '320', '2018-10-11 02:45:04', 1),
(59, 'vMS3uKKtOAzPA1nzOIgU', 0, 'puk', 'kpaskp', '', '', '3', '0', '2018-10-11 02:45:06', 1),
(60, 'vMS3uKKtOAzPA1nzOIgU', 0, 'Product', 'Product', '', '1456', '1', '1456', '2018-10-11 02:45:14', 1),
(61, 'vMS3uKKtOAzPA1nzOIgU', 0, 'desc', 'desc', '', '90', '1', '90', '2018-10-11 02:59:09', 1),
(62, 'vMS3uKKtOAzPA1nzOIgU', 0, 'kals', 'kl', '', '90', '1', '90', '2018-10-11 02:59:11', 1),
(63, 'vMS3uKKtOAzPA1nzOIgU', 0, 'sku', 'kl', '', '90', '1', '90', '2018-10-11 02:59:12', 1),
(64, 'lxh4TN9l7i5VQucRLdiT', 0, 'sku', 'kl', '', '90', '1', '90', '2018-10-11 23:02:31', 2),
(65, 'lxh4TN9l7i5VQucRLdiT', 0, 'puk', 'kpaskp', '', '', '1', '', '2018-10-13 00:06:50', 2),
(66, 'lxh4TN9l7i5VQucRLdiT', 0, 'sku', 'kl', '', '90', '1', '90', '2018-10-13 00:06:57', 2),
(67, 'lxh4TN9l7i5VQucRLdiT', 0, 'Product', 'Product', '', '1456', '1', '1456', '2018-10-14 00:02:04', 2),
(68, 'lxh4TN9l7i5VQucRLdiT', 0, '1234567', 'Product 1', '', '120', '2', '240', '2018-10-14 21:32:33', 2),
(69, 'lxh4TN9l7i5VQucRLdiT', 0, '1234567', 'Product 1', '', '120', '2', '240', '2018-10-14 21:33:21', 2),
(70, 'lxh4TN9l7i5VQucRLdiT', 0, '1234567', 'Product 1', '', '120', '4', '480', '2018-10-14 21:34:47', 2),
(71, 'lxh4TN9l7i5VQucRLdiT', 0, '1234567', 'Product 1', '', '120', '4', '480', '2018-10-14 22:34:00', 2),
(72, 'lxh4TN9l7i5VQucRLdiT', 5, '5457675', 'The Holy Mart Silk Mayur Embroided Ladoo Gopal Dre', '', '449', '1', '449', '2018-10-14 23:58:58', 2),
(73, 'lxh4TN9l7i5VQucRLdiT', 5, '1234567', 'Product 1', '', '120', '2', '240', '2018-10-15 00:07:19', 2),
(74, 'lxh4TN9l7i5VQucRLdiT', 5, '1234567', 'Product 1', '', '120', '2', '240', '2018-10-15 00:08:05', 2),
(75, 'lxh4TN9l7i5VQucRLdiT', 5, 'Product', 'Product', '', '1456', '2', '2912', '2018-10-15 14:57:50', 2),
(76, 'lxh4TN9l7i5VQucRLdiT', 0, 'puk', 'kpaskp', '', '', '1', '', '2018-10-17 01:32:49', 2),
(77, 'lxh4TN9l7i5VQucRLdiT', 0, '1234567', 'Product 1', '', '120', '1', '120', '2018-10-17 01:47:10', 2),
(78, 'lxh4TN9l7i5VQucRLdiT', 0, 'puk', 'kpaskp', '', '9', '2', '18', '2018-10-17 14:23:18', 2),
(79, 'lxh4TN9l7i5VQucRLdiT', 0, '1234567', 'Product 1', '', '120', '3', '360', '2018-10-17 15:16:13', 2),
(80, 'lxh4TN9l7i5VQucRLdiT', 0, 'desc', 'desc', '', '91', '1', '91', '2018-10-23 14:23:38', 2),
(81, 'lxh4TN9l7i5VQucRLdiT', 0, 'desc', 'desc', '', '91', '1', '91', '2018-10-23 14:40:10', 2),
(82, 'lxh4TN9l7i5VQucRLdiT', 0, 'desc', 'desc', '', '91', '1', '91', '2018-10-23 14:40:57', 2),
(83, 'lxh4TN9l7i5VQucRLdiT', 0, 'desc', 'desc', '', '91', '2', '182', '2018-10-23 14:43:56', 2),
(84, 'lxh4TN9l7i5VQucRLdiT', 0, '1234567', 'Product 1', '', '120', '1', '120', '2018-10-23 17:54:16', 2),
(85, 'lxh4TN9l7i5VQucRLdiT', 0, 'desc', 'desc', '', '91', '1', '91', '2018-10-23 17:58:06', 2),
(86, 'lxh4TN9l7i5VQucRLdiT', 0, 'desc', 'desc', '', '91', '1', '91', '2018-10-23 18:02:58', 2),
(87, 'lxh4TN9l7i5VQucRLdiT', 0, 'desc', 'desc', '', '91', '1', '91', '2018-10-23 18:04:54', 2),
(88, 'lxh4TN9l7i5VQucRLdiT', 0, '1234567', 'Product 1', '', '120', '1', '120', '2018-10-23 18:05:39', 2),
(89, 'lxh4TN9l7i5VQucRLdiT', 0, 'desc', 'desc', '', '91', '6', '546', '2018-10-23 18:15:27', 2),
(90, 'lxh4TN9l7i5VQucRLdiT', 0, '1234567', 'Product 1', '', '120', '1', '120', '2018-10-23 18:15:39', 2),
(91, 'lxh4TN9l7i5VQucRLdiT', 0, '1234567', 'Product 1', '', '120', '6', '720', '2018-10-25 23:18:09', 2),
(92, 'lxh4TN9l7i5VQucRLdiT', 27, '1234567', 'Product 1', '', '120', '4', '480', '2018-10-25 23:20:26', 2),
(93, 'lxh4TN9l7i5VQucRLdiT', 27, '1234568', 'Product 2', '', '130', '5', '650', '2018-10-25 23:29:24', 2),
(94, 'lxh4TN9l7i5VQucRLdiT', 27, '1234567', 'Product 1', '', '120', '3', '360', '2018-10-25 23:32:47', 2),
(95, 'lxh4TN9l7i5VQucRLdiT', 0, 'Product', 'Product', '', '1485', '2', '3010', '2018-10-29 18:55:38', 2),
(96, 'lxh4TN9l7i5VQucRLdiT', 0, '5457675', 'The Holy Mart Silk Mayur Embroided Ladoo Gopal Dre', '', '547', '2', '1183', '2018-10-29 19:09:55', 2),
(97, 'lxh4TN9l7i5VQucRLdiT', 0, 'sakl', 'klas', '', '116', '4', '464', '2018-10-29 19:10:53', 2),
(98, 'lxh4TN9l7i5VQucRLdiT', 0, '1234568', 'Product 2', '', '130', '1', '130', '2018-10-29 23:25:34', 2),
(99, 'lxh4TN9l7i5VQucRLdiT', 5, 'propop', 'name', '', '234', '1', '234', '2018-10-30 13:48:00', 2),
(100, 'lxh4TN9l7i5VQucRLdiT', 5, 'sakl', 'klas', '', '137', '2', '273', '2018-10-30 17:27:59', 0),
(101, 'lxh4TN9l7i5VQucRLdiT', 5, 'sakl', 'klas', '', '117', '3', '371', '2018-10-30 17:30:19', 0),
(102, 'lxh4TN9l7i5VQucRLdiT', 5, 'sakl', 'klas', '12,11', '117', '1', '117', '2018-10-30 17:33:16', 0),
(103, 'lxh4TN9l7i5VQucRLdiT', 5, 'sakl', 'klas', '13,10', '136', '1', '136', '2018-10-30 17:33:23', 0),
(104, 'lxh4TN9l7i5VQucRLdiT', 5, 'sakl', 'klas', '13,11', '137', '1', '137', '2018-10-30 17:34:08', 0),
(105, 'lxh4TN9l7i5VQucRLdiT', 5, 'sakl', 'klas', '13,11', '137', '2', '274', '2018-10-30 17:38:03', 1),
(106, 'lxh4TN9l7i5VQucRLdiT', 5, 'sakl', 'klas', '12,10', '116', '1', '116', '2018-10-30 17:38:14', 1),
(107, 'ftFxXkXRU2C8TyurS0Bg', 0, '1234568', 'Product 2', '', '130', '7', '910', '2019-09-26 17:22:46', 2),
(108, 'ftFxXkXRU2C8TyurS0Bg', 0, 'sku', 'kl', '', '91', '1', '91', '2019-09-26 17:42:01', 2),
(109, 'NXrVBbAZsqQkhATUUQbg', 0, '1234567', 'Product 1', '', '120', '7', '840', '2024-02-10 19:59:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'justArrival', '5'),
(2, 'specialOfferMain', '1,2'),
(3, 'bestSellerMain', '7,1,6');

-- --------------------------------------------------------

--
-- Table structure for table `loginrecord`
--

CREATE TABLE `loginrecord` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `sessionId` varchar(50) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logoutdateTime` datetime DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginrecord`
--

INSERT INTO `loginrecord` (`id`, `userId`, `sessionId`, `dateTime`, `logoutdateTime`, `ip`) VALUES
(1, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-26 00:11:34', NULL, '::1'),
(2, 28, 'lxh4TN9l7i5VQucRLdiT', '2018-10-26 00:12:00', NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `optiongroup`
--

CREATE TABLE `optiongroup` (
  `id` int(11) NOT NULL,
  `optionGroupName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `optiongroup`
--

INSERT INTO `optiongroup` (`id`, `optionGroupName`) VALUES
(1, 'Size'),
(3, 'Color');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `optionName` varchar(30) NOT NULL,
  `optionGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `optionName`, `optionGroup`) VALUES
(1, 'Size 0', 1),
(2, 'Size 1', 1),
(3, 'Size 2', 1),
(4, 'Red', 3),
(5, 'Pink', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `productId` varchar(50) DEFAULT NULL,
  `productOption` varchar(50) DEFAULT NULL,
  `productName` varchar(50) DEFAULT NULL,
  `productPrice` varchar(10) DEFAULT NULL,
  `productQuantity` varchar(5) DEFAULT NULL,
  `productTotal` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `orderId`, `productId`, `productOption`, `productName`, `productPrice`, `productQuantity`, `productTotal`) VALUES
(1, 4, '8', '', 'desc', '91', '6', '546'),
(2, 5, '8', '', 'desc', '91', '6', '546'),
(3, 6, '8', '', 'desc', '91', '6', '546'),
(4, 7, '8', '', 'desc', '91', '6', '546'),
(5, 8, '8', '', 'desc', '91', '6', '546'),
(6, 9, '8', '', 'desc', '91', '6', '546'),
(7, 10, '8', '', 'desc', '91', '6', '546'),
(8, 11, '1', '', 'Product 1', '120', '6', '720'),
(9, 12, '1', '', 'Product 1', '120', '4', '480'),
(10, 16, '2', '', 'Product 2', '130', '5', '650'),
(11, 18, '1', '', 'Product 1', '120', '3', '360'),
(12, 19, '4', '', 'klas', '116', '4', '464'),
(13, 19, '2', '', 'Product 2', '130', '1', '130'),
(14, 19, '14', '', 'name', '234', '1', '234'),
(15, 20, '2', '', 'Product 2', '130', '7', '910'),
(16, 20, '6', '', 'kl', '91', '1', '91');

-- --------------------------------------------------------

--
-- Table structure for table `orderpromo`
--

CREATE TABLE `orderpromo` (
  `id` int(11) NOT NULL,
  `promo` varchar(10) DEFAULT NULL,
  `orderId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `sessionId` varchar(50) DEFAULT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) DEFAULT NULL,
  `promoOff` varchar(5) DEFAULT NULL,
  `cartValue` varchar(10) DEFAULT NULL,
  `totalOrder` varchar(10) DEFAULT NULL,
  `promoApplied` int(2) NOT NULL DEFAULT '0',
  `promoPaid` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderpromo`
--

INSERT INTO `orderpromo` (`id`, `promo`, `orderId`, `userId`, `sessionId`, `dateTime`, `ip`, `promoOff`, `cartValue`, `totalOrder`, `promoApplied`, `promoPaid`) VALUES
(1, '<br />\r\n<b', 1, 28, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 15:56:00', '::1', '200', '546', '446', 1, 0),
(2, 'PROMO', 2, 28, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 15:57:51', '::1', '200', '546', '446', 1, 0),
(3, 'PROMO', 7, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 15:59:41', '::1', '200', '546', '446', 1, 0),
(4, 'promo', 8, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 20:43:31', '::1', '200', '546', '446', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderNo` int(10) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `sessionId` varchar(20) DEFAULT NULL,
  `orderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderAmount` varchar(10) DEFAULT NULL,
  `orderShipping` varchar(5) DEFAULT NULL,
  `walletPaid` varchar(10) DEFAULT NULL,
  `promoApplied` int(2) NOT NULL DEFAULT '0',
  `cashback` varchar(5) DEFAULT NULL,
  `cashbackAdded` int(2) NOT NULL DEFAULT '0',
  `paybleAmount` varchar(10) DEFAULT NULL,
  `orderAddress` int(11) DEFAULT NULL,
  `orderStatus` int(2) DEFAULT '1',
  `statusDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `orderTracking` text,
  `orderTrackingCode` varchar(50) DEFAULT NULL,
  `orderPaymentType` varchar(5) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `orderPaid` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderNo`, `userid`, `sessionId`, `orderDate`, `orderAmount`, `orderShipping`, `walletPaid`, `promoApplied`, `cashback`, `cashbackAdded`, `paybleAmount`, `orderAddress`, `orderStatus`, `statusDate`, `orderTracking`, `orderTrackingCode`, `orderPaymentType`, `ip`, `orderPaid`) VALUES
(1, NULL, 28, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 15:56:00', '546', '0', '100', 0, '200', 0, '446', 1, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(2, NULL, 28, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 15:57:51', '546', '0', '100', 0, '200', 0, '446', 2, 2, '2018-10-30 12:37:15', '', '', 'onlin', '::1', 1),
(3, NULL, 28, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 15:59:41', '546', '0', '100', 0, '200', 0, '446', 3, 2, '2018-10-30 12:37:15', '', '', 'onlin', '::1', 1),
(4, NULL, 28, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 16:01:02', '546', '0', '100', 0, '0', 0, '446', 4, 2, '2018-10-30 12:37:15', '', '', 'onlin', '::1', 1),
(5, NULL, 28, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 16:01:16', '546', '0', '100', 0, '0', 0, '446', 5, 2, '2018-10-30 12:37:15', '', '', 'onlin', '::1', 1),
(6, 1005, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 19:26:44', '546', '0', '100', 0, '0', 0, '446', 6, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(7, 1006, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 19:44:47', '546', '0', '100', 1, '200', 0, '446', 7, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(8, 1007, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 20:43:31', '546', '0', '100', 0, '200', 0, '446', 8, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(9, 1008, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 20:59:43', '546', '0', '100', 0, '0', 0, '446', 9, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(10, 1009, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 21:01:01', '546', '0', '100', 0, '0', 0, '446', 10, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(11, 1010, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 23:19:04', '720', '0', '100', 0, '0', 0, '620', 11, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(12, 1011, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 23:20:56', '480', '0', '100', 0, '0', 0, '380', 12, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(13, 1012, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 23:21:27', '480', '0', '100', 0, '0', 0, '380', 13, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(14, 1013, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 23:26:05', '480', '0', '100', 0, '0', 0, '380', 14, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(15, 1014, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 23:26:16', '480', '0', '100', 0, '0', 0, '380', 15, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(16, 1015, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 23:30:42', '650', '0', '100', 0, '0', 0, '550', 16, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(17, 1016, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 23:31:07', '650', '0', '100', 0, '0', 0, '550', 17, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(18, 1017, 27, 'lxh4TN9l7i5VQucRLdiT', '2018-10-25 23:37:21', '360', '50', '0', 0, '0', 0, '860', 18, 2, '2018-10-30 12:37:15', '', '', 'cod', '::1', 1),
(19, 1018, 5, 'lxh4TN9l7i5VQucRLdiT', '2018-10-30 13:48:21', '828', '0', '5', 1, '200', 1, '823', 19, 2, '2018-10-30 12:40:03', '15151', '15', 'cod', '::1', 1),
(20, 1019, 28, 'ftFxXkXRU2C8TyurS0Bg', '2019-09-26 17:44:01', '1001', '0', '0', 0, '0', 0, '1001', 20, 1, '2019-09-26 17:44:01', NULL, NULL, 'cod', '::1', 0),
(21, 1020, 28, 'ftFxXkXRU2C8TyurS0Bg', '2019-09-26 17:44:01', '1001', '0', '0', 0, '0', 0, '1001', 21, 1, '2019-09-26 17:44:01', NULL, NULL, 'cod', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `roles`, `user`) VALUES
(9, 'addProduct', 4),
(10, 'viewProduct', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` int(11) NOT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `paymode` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pincodes`
--

INSERT INTO `pincodes` (`id`, `pincode`, `paymode`) VALUES
(1, '452016', 1),
(2, '452001', 1),
(3, '452002', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productsku` varchar(50) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productPrice` varchar(10) NOT NULL,
  `productTax` varchar(5) NOT NULL,
  `productSell` varchar(10) NOT NULL,
  `productComission` varchar(5) DEFAULT NULL,
  `productTotal` varchar(10) NOT NULL,
  `productWeight` varchar(10) NOT NULL,
  `productShortDesc` text NOT NULL,
  `productDesc` text NOT NULL,
  `productCategory` int(11) NOT NULL,
  `productDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productStock` varchar(10) NOT NULL,
  `productLive` int(2) NOT NULL,
  `productUser` int(5) NOT NULL,
  `productReturn` int(2) NOT NULL,
  `featured` int(2) NOT NULL,
  `productNew` int(2) NOT NULL,
  `metaKeyword` varchar(50) DEFAULT NULL,
  `metaUrl` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productsku`, `productName`, `productPrice`, `productTax`, `productSell`, `productComission`, `productTotal`, `productWeight`, `productShortDesc`, `productDesc`, `productCategory`, `productDate`, `productStock`, `productLive`, `productUser`, `productReturn`, `featured`, `productNew`, `metaKeyword`, `metaUrl`) VALUES
(1, '1234567', 'Product 1', '150', '5', '120', NULL, '120', '50Gm', 'In the example provided, passing in a value of 5 ensures that the function will act on any word of length greater than 5 characters, so had the test case been \"Hello here\", the function fails and returns only \"', 'Long Description', 1, '2018-09-22 17:00:00', '5', 1, 1, 1, 1, 0, NULL, 'sss'),
(2, '1234568', 'Product 2', '170', '5', '160', NULL, '130', '40Gm', 'Description', 'Long Description', 1, '2018-09-22 00:00:00', '10', 1, 1, 1, 1, 1, NULL, 'fgg'),
(3, 'puk', 'kpaskp', '100', '0', '', '0.18', '9', '0', '1oa', '&lt;p&gt;op&lt;/p&gt;', 1, '0000-00-00 00:00:00', '09', 1, 0, 0, 0, 0, 'sop', 'kpaskp-puk'),
(4, 'sakl', 'klas', '90', '0', '100', '2', '102', '0', 'as', '&lt;p&gt;as&lt;/p&gt;', 7, '0000-00-00 00:00:00', '90', 1, 5, 0, 0, 0, 'sdsd', 'klas-sakl'),
(6, 'sku', 'kl', '100', '0', '90', '1.8', '91', '0', 'desc', '&lt;p&gt;desc&lt;/p&gt;', 1, '0000-00-00 00:00:00', '10', 1, 5, 0, 0, 0, 'keywork', 'kl-sku'),
(8, 'desc', 'desc', '100', '0', '90', '1.8', '91', '0', 'asas', '&lt;p&gt;assd&lt;/p&gt;', 7, '0000-00-00 00:00:00', 'desc', 1, 5, 0, 0, 0, 'asaskl', 'desc-desc'),
(10, 'kals', 'kl', '90', '0', '90', '1.8', '91', '0', 'ss', '&lt;p&gt;ss&lt;/p&gt;', 7, '0000-00-00 00:00:00', '90', 1, 5, 0, 0, 0, 'SS', 'kl-kals'),
(11, 'Product', 'Product', '1708', '0', '1456', '29.12', '1485', '0', 'Desc', '&lt;p&gt;desc&lt;/p&gt;', 1, '0000-00-00 00:00:00', '10', 1, 5, 1, 0, 0, 'keyu', 'product-product'),
(12, '5457675', 'The Holy Mart Silk Mayur Embroided Ladoo Gopal Dre', '898', '0', '449', '8.98', '457', '0', 'A special dress for laddu gopal ji with beautiful peacock embroidery, made of pure silk and have a embroidery peacock in which your gopal ji will look so beautiful', '&lt;ul&gt;\r\n	&lt;li&gt;Product: a special dress for laddu gopal ji with beautiful peacock embroidery&lt;/li&gt;\r\n	&lt;li&gt;About: the dress is made of pure silk and have a embroidery peacock in which your gopal ji will look so beautiful&lt;/li&gt;\r\n	&lt;li&gt;Size: fit for gopal ji of 6 size. Diameter of dress is 30 cm&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Silk with Full peacock embroidery. This is a beautiful dress for Ladoo Gopal/ Thakur jee. The colours may vary according to the stock available. The dress is made of pure silk and have a embroidery peacock in which your gopal ji will look so beautiful.&lt;/p&gt;', 10, '0000-00-00 00:00:00', '10', 1, 5, 1, 0, 0, 'Keyword, Shri Krishna Dress', 'the-holy-mart-silk-mayur-embroided-ladoo-gopal-dress-5457675'),
(13, 'asyu', 'klaskl', '200', '0', '900', '18', '918', '0', 'adsd', '&lt;p&gt;kl&lt;/p&gt;', 8, '2018-10-17 15:37:04', '10', 1, 5, 1, 0, 0, 'lkeko , kl;', 'klaskl-asyu'),
(14, 'propop', 'name', '250', '0', '210', '4.2', '214', '0', 'desc', '&lt;p&gt;dwewxc&lt;/p&gt;', 6, '2018-10-30 13:38:29', '10', 1, 5, 1, 0, 0, 'key', 'name-propop');

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(30) NOT NULL,
  `categoryUrl` text,
  `categoryOrder` int(4) NOT NULL,
  `categoryParent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`id`, `categoryName`, `categoryUrl`, `categoryOrder`, `categoryParent`) VALUES
(1, 'Dress', 'dress', 0, 0),
(2, 'Pankha', 'pankha', 0, 0),
(3, 'Sinhansan', 'sinhansan', 0, 0),
(4, 'Jhula', 'jhula', 0, 0),
(5, 'Khilona', 'khilona', 0, 0),
(6, 'Shri Mastak', 'shri-mastak', 0, 0),
(7, 'Accessories', 'accessories', 0, 0),
(8, 'Mala', 'mala', 0, 0),
(9, 'Pichwayi', 'pichwayi', 0, 0),
(10, 'Casual Designer Poshak', 'casual-designer-poshak', 0, 1),
(11, 'Chitarji Vastra', 'chitarji-vastra', 0, 1),
(12, 'Radha Krishna Dresses', 'radha-krishna-dresses', 0, 1),
(13, 'Khilona', 'khilona', 0, 5),
(14, 'Meenakari Khilona', 'meenakari-khilona', 0, 5),
(15, 'Tipara', 'tipara', 0, 6),
(16, 'Kilangi', 'kilangi', 0, 6),
(17, 'Mukut', 'mukut', 0, 6),
(18, 'Nag Fani Katra', 'nag-fani-katra', 0, 6),
(19, 'Paag', 'paag', 0, 6),
(20, 'Sehra', 'sehra', 0, 6),
(21, 'Shishfool', 'shishfool', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `image` text NOT NULL,
  `orderBy` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `productId`, `image`, `orderBy`) VALUES
(3, 1, 'p2.jpg', 1),
(4, 11, '../../product/11_1539109890.jpg', 0),
(10, 8, '8_1539372315.jpg', 2),
(11, 8, '8_1539372395.jpg', 1),
(12, 12, '12_1539540489.jpg', 1),
(13, 12, '12_1539540496.jpg', 3),
(14, 12, '12_1539540502.jpg', 4),
(15, 12, '12_1539540509.jpg', 2),
(16, 0, 'undefined_1540887243.jpg', 0),
(17, 0, 'undefined_1540887288.png', 0),
(18, 0, 'undefined_1540887305.jpg', 0),
(19, 14, '14_1540887390.jpg', 2),
(20, 14, '14_1540887393.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productoption`
--

CREATE TABLE `productoption` (
  `id` int(11) NOT NULL,
  `optionId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `optionGroupId` int(11) NOT NULL,
  `priceIncrement` varchar(10) NOT NULL,
  `enable` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productoption`
--

INSERT INTO `productoption` (`id`, `optionId`, `productId`, `optionGroupId`, `priceIncrement`, `enable`) VALUES
(1, 2, 0, 0, '10', 0),
(2, 2, 0, 0, '10', 1),
(3, 4, 4, 0, '5', 0),
(4, 3, 4, 0, '30', 0),
(5, 4, 4, 3, '5', 0),
(6, 2, 4, 1, '10', 0),
(7, 4, 4, 3, '5', 0),
(8, 2, 4, 1, '10', 0),
(9, 3, 4, 1, '30', 0),
(10, 5, 4, 3, '4', 1),
(11, 4, 4, 3, '5', 1),
(12, 2, 4, 1, '10', 1),
(13, 3, 4, 1, '30', 1),
(14, 5, 11, 3, '10', 1),
(15, 4, 11, 3, '40', 1),
(16, 4, 12, 3, '89', 1),
(17, 2, 12, 1, '70', 1),
(18, 3, 12, 1, '90', 1),
(19, 5, 14, 3, '20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` int(11) NOT NULL,
  `dateFrom` date DEFAULT NULL,
  `dateTo` date DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `promoCode` varchar(10) DEFAULT NULL,
  `promoDescription` varchar(200) NOT NULL,
  `promoDiscount` varchar(5) DEFAULT NULL,
  `promoMinPerUser` varchar(3) NOT NULL DEFAULT '1',
  `cod` int(2) NOT NULL DEFAULT '0',
  `minCartValue` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `dateFrom`, `dateTo`, `quantity`, `promoCode`, `promoDescription`, `promoDiscount`, `promoMinPerUser`, `cod`, `minCartValue`) VALUES
(1, '2018-10-01', '2018-10-31', 5, 'PROMO', 'Get Flat Rs 200 off on All Purchase Above Rs 500.', '200', '5', 1, '500');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rolename` varchar(50) NOT NULL,
  `roles` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rolename`, `roles`) VALUES
(1, 'Add Product', 'addProduct'),
(2, 'View Products', 'viewProduct');

-- --------------------------------------------------------

--
-- Table structure for table `staticpage`
--

CREATE TABLE `staticpage` (
  `id` int(11) NOT NULL,
  `pageHeading` varchar(100) DEFAULT NULL,
  `pageUrl` varchar(100) DEFAULT NULL,
  `pageData` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staticpage`
--

INSERT INTO `staticpage` (`id`, `pageHeading`, `pageUrl`, `pageData`) VALUES
(1, 'About Us', 'about-us', 'About Us Data Content');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userPhone` varchar(30) DEFAULT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userKey` text,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `regDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(30) DEFAULT NULL,
  `userCredits` varchar(5) DEFAULT NULL,
  `regOtp` int(4) DEFAULT NULL,
  `regId` varchar(30) DEFAULT NULL,
  `status` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userPhone`, `userEmail`, `userKey`, `firstName`, `lastName`, `regDate`, `ip`, `userCredits`, `regOtp`, `regId`, `status`) VALUES
(27, '9039993702', NULL, '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'Ayush', 'Paliwal', '2018-10-24 00:16:19', '::1', '-500', 1635, 'lxh4TN9l7i5VQucRLdiT', 1),
(28, '8770078128', NULL, '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'Ayush', 'Paliwal', '2018-10-24 21:43:06', '::1', '0', 1863, 'ftFxXkXRU2C8TyurS0Bg', 1),
(29, '9827052406', NULL, '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, NULL, '2018-10-26 00:07:22', '::1', NULL, 7560, 'lxh4TN9l7i5VQucRLdiT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `streetaddress` text,
  `streetaddress2` text,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `contactno` varchar(12) DEFAULT NULL,
  `contactno2` varchar(12) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`id`, `userId`, `firstname`, `lastname`, `streetaddress`, `streetaddress2`, `city`, `state`, `pincode`, `contactno`, `contactno2`, `email`) VALUES
(1, 28, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', 'Appp', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(2, 28, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(3, 28, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(4, 28, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(5, 28, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(6, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(7, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(8, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(9, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(10, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(11, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(12, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(13, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(14, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(15, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(16, 27, 'Ayushs', 's', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(17, 27, 'Ayushs', 's', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(18, 27, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(19, 5, 'Ayush', 'Paliwal', '63-64 Devpuri Colony, Near Bengali Squre, Kanadiya Road', '', 'Indore', 'Madhya Pradesh', '452016', NULL, '09039993702', 'meayush9@gmail.com'),
(20, 28, 'Ayush', 'Paliwal', '63-64 Devpuri Colony', '', 'Indore', 'Madhya Pradesh', '452001', NULL, '', ''),
(21, 28, 'Ayush', 'Paliwal', '63-64 Devpuri Colony', '', 'Indore', 'Madhya Pradesh', '452001', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `uniqueUserId` varchar(30) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `systeminfo` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `uniqueUserId`, `ip`, `systeminfo`, `datetime`) VALUES
(11, 'vMS3uKKtOAzPA1nzOIgU', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1', '2018-10-09 23:26:33'),
(12, 'lxh4TN9l7i5VQucRLdiT', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1', '2018-10-11 22:38:03'),
(13, 'SMDD728X4uSABHa6Gobp', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '2018-10-13 00:24:10'),
(14, 'I4JJ8dmNCL0WTF1nHi5P', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', '2018-10-29 20:41:10'),
(15, 'yux7298HF7i1N7HuOtKJ', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '2019-04-10 23:03:09'),
(16, 'ftFxXkXRU2C8TyurS0Bg', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '2019-09-22 10:26:13'),
(17, 'Ww8rivzg7kMTJzU0FwGd', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-10 21:44:54'),
(18, 'NXrVBbAZsqQkhATUUQbg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2024-02-10 19:59:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlogintable`
--
ALTER TABLE `adminlogintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginrecord`
--
ALTER TABLE `loginrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optiongroup`
--
ALTER TABLE `optiongroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderpromo`
--
ALTER TABLE `orderpromo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productsku` (`productsku`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productoption`
--
ALTER TABLE `productoption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staticpage`
--
ALTER TABLE `staticpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `adminlogintable`
--
ALTER TABLE `adminlogintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loginrecord`
--
ALTER TABLE `loginrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `optiongroup`
--
ALTER TABLE `optiongroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `orderpromo`
--
ALTER TABLE `orderpromo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `productoption`
--
ALTER TABLE `productoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staticpage`
--
ALTER TABLE `staticpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
