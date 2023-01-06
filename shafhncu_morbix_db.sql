-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2023 at 12:07 AM
-- Server version: 10.3.37-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shafhncu_morbix_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `delete_status`) VALUES
(1, 'N 00211205', 0),
(2, 'D 00211205', 0),
(3, 'B.NO 211026  27-10-2021', 0),
(4, 'B.NO 211027 28-10-2021', 0),
(5, '27-10-21', 0),
(6, 'D 00211118', 0),
(7, 'N 00211120', 0),
(8, '26-10-2021', 0),
(9, '29-10-2021', 0),
(10, '09-10-2021', 0),
(11, '28-10-2021', 0),
(12, '23-10-2021', 0),
(13, '01-10-2021', 0),
(14, '03-11-2021', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cmobile` varchar(255) NOT NULL,
  `caddress` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cid`, `cname`, `cmobile`, `caddress`, `created_by`, `created_date`, `delete_status`) VALUES
(1, 'TEST', '83725346', 'SDJKGH', 5, '2021-12-12 09:23:38', 0),
(2, 'trry', '87686', 'hgjfghf', 5, '2021-12-12 11:18:14', 0),
(3, 'dsgt', '45365465', 'fdgfd', 5, '2021-12-23 10:59:07', 0),
(4, 'CENTRAL SANIWARES', '32AAFFC7345D1ZU', 'M.A ROAD, BIG BAZAR, CALICUT', 5, '2022-01-07 17:36:41', 0),
(5, 'TILE LAND', '32AAMFT1722C1ZN', 'PREMIER, KALLAI, CALICUT', 5, '2022-01-07 17:39:28', 0),
(6, 'SHINE MARBLES', '32ADUFS5041E1Z2', 'ROOM NO.322/D, MAKKARAPARAMBA, MALAPURAM', 5, '2022-01-07 17:40:56', 0),
(7, 'METRO TILES', '32ABGFM7980G1Z2', 'METRO BUILD MALL, KADUNGATHUKUNDU,KALPAKANCHERY, MALAPPURAM', 5, '2022-01-07 17:42:48', 0),
(8, 'GUJARATH CERMICS', '32AAIFG0029R1ZB', 'SOUTH BEACH ROAD, KOZHIKODE', 5, '2022-01-07 17:43:55', 0),
(9, 'ERA TRADING', '32AAHFE3062D1Z0', 'VAIDYARANGADI, AIRPORT ROAD, RAMANATTUKAR, CALICUT', 5, '2022-01-07 17:45:36', 0),
(10, 'JAS GROUP', '32AAPFJ9206L1Z0', 'A.G ROAD, NEAR 4TH RLY GATE, KOZHIKODE', 5, '2022-01-07 17:47:18', 0),
(11, 'ROYAL TILE SHOPPE', '32AASQFR2846H1Z0', 'AIRPORT ROAD, AYIKKARAPPADI, MALAPPURAM', 5, '2022-01-07 17:48:39', 0),
(12, 'MALABAR GRANITES', '32AAXFM8326J1ZQ', 'OPP. AYANIKKAD JUMA MASJID, PAYYOLI, KOZHIKODE', 5, '2022-01-07 17:50:36', 0),
(13, 'TILE GALLERY', '32AARFT9182F1ZQ', 'THEEKUNI ROAD, AYANCHERY , KOZHIKODE', 5, '2022-01-07 17:51:37', 0),
(14, 'KALLIYATH SANITARY CENTRE', '32AAGFK7560D1ZK', 'BEYPORE ROAD, VATTAKKINAR, MEENCHADA, KOZHIKODE', 5, '2022-01-07 17:53:49', 0),
(15, 'THEJUS ENTERPRISES', '32AAEFT4990L1ZS', 'THOTTUMMARAM, KINASSERY, KOZHIKODE', 5, '2022-01-07 17:54:53', 0),
(16, 'CAPITAL ASSOCIATES', '32AALFC5420F1ZW', 'WAYANAD ROAD, EANGAPUZHA, KOZHIKODE', 5, '2022-01-07 17:56:31', 0),
(17, 'TILE PLANET', '32AAJFT7558D1Z2', 'PALLIMUKKU, KAMBALAKKAD, WAYANADU', 5, '2022-01-07 17:57:29', 0),
(18, 'GRAND TILES & GRANITES', '32AAIFG0584F1Z0', 'PERUMALPURAM, THIKKODI, PAYYOLI, KOZHIKODE', 5, '2022-01-07 17:59:38', 0),
(19, 'MALANADU MATERIAL MART', '32AAVFM9997P1ZT', 'BALUSSRY ROAD, NANMINDA, KOZHIKODE', 5, '2022-01-07 18:01:08', 0),
(20, 'STAR TILES AND PIPES', '32AOAPT4225LZY', 'NARIKKUNI, KOZHIKODE', 5, '2022-01-07 18:02:07', 0),
(21, 'KINGS TILES', '32BERPM2281P1ZW', 'MALA ROAD, KADAMPUZHA, MALAPPURAM', 5, '2022-01-07 18:03:26', 0),
(22, 'ERIYAL ELECTRICAL & SANITARY', '32CBRPK1507N1ZG', 'KUTTIPURAM, MALAPPURAM', 5, '2022-01-07 18:04:58', 0),
(23, 'ROYAL TILE SHOPPE', '32AAQFR2846H1Z0', 'AIRPORT ROAD, AYIKKARAPPADI, MALAPPURAM', 5, '2022-01-07 18:06:17', 0),
(24, 'AZEEM FLOORINGS', '32BQSPP3118D1ZY', 'MAIN ROAD, PADAPPRAMBA, MALAPPURAM', 5, '2022-01-07 18:07:40', 0),
(25, 'OTHAYAMANGALATH TILES', '32AAGFO0757Q1ZW', 'NIT, REC,KATTANGAL, MUKKAM, KOZHIKODE', 5, '2022-01-07 18:09:41', 0),
(26, 'METRO TILES MALL AND CERAMIC STUDIO', '32AAYFM2306B1ZM', 'CHEMMAD, TIRURANGADI, MALAPPRUAM', 5, '2022-01-07 18:11:25', 0),
(27, 'FAR', '99', 'FF', 5, '2022-11-19 10:27:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `delete_status`) VALUES
(1, 'MORBIX1', 0),
(2, '8005 - G', 0),
(3, '8010 - 51 - C', 0),
(4, '8005 - C', 0),
(5, 'MOSCO OAK', 0),
(6, 'ARMENIA PEANUT', 0),
(7, 'ARMENIA MOCHA', 0),
(8, 'ARMENIA AZURE', 0),
(9, 'ARMENIA SKY', 0),
(10, 'ARMENIA AQUA', 0),
(11, 'ARMENIA MINT', 0),
(12, 'VELVET ASH', 0),
(13, 'VELVET CHARCOLE', 0),
(14, 'VELVET TEAL', 0),
(15, 'VELVET PINE', 0),
(16, 'VELVET LIME', 0),
(17, 'MOSCO SAND', 0),
(18, 'MOSCO SAPPHIRE', 0),
(19, 'MOSCO NAVY', 0),
(20, 'N - IVORY 42 A', 0),
(21, 'N - IVORY 40 A', 0),
(22, 'COLARADO GRAFITO', 0),
(23, 'COLARADO GRAY DUST', 0),
(24, 'TANGER GRAFITO', 0),
(25, 'TESLA  AZUL', 0),
(26, 'TESLA GRAFITO', 0),
(27, 'TESLA  METALIC', 0),
(28, 'CREMA WOOD ( L)', 0),
(29, 'SP. WHITE PLAIN', 0),
(30, 'BLACK GLOSSY', 0),
(31, 'VIBRANT AQUA', 0),
(32, 'VIBRANT GREY', 0),
(33, 'CREMA WOOD ( D )', 0),
(34, 'BLACK WOOD ( L )', 0),
(35, 'BLACK WOOD ( D )', 0),
(36, 'COLARADO CORTINA', 0),
(37, 'EL - 529 ( HD )', 0),
(38, 'OMBRA GRAFITO', 0),
(39, 'DELFOS GRAFITO', 0),
(40, 'FUJI GRAFITO', 0),
(41, '3827 - ( D )', 0),
(42, '3828 - ( D )', 0),
(43, '3829 - ( D )', 0),
(44, '3830 - ( D )', 0),
(45, '3831 - ( L )', 0),
(46, 'CULTURED STONE - 07', 0),
(47, 'MODERN BLUE', 0),
(48, 'MODERN NATURE', 0),
(49, 'ROUSSEAU BLACK', 0),
(50, '8010 ', 0),
(51, '8005', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_read` enum('0','1') NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_last_seen`
--

CREATE TABLE `message_last_seen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `order_customer` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_created_date` datetime NOT NULL,
  `order_created_by` int(11) NOT NULL,
  `order_remarks` text NOT NULL,
  `delivery_date_time` datetime NOT NULL,
  `shipped_date_time` datetime NOT NULL,
  `driver` int(11) NOT NULL,
  `invoice_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_no`, `order_customer`, `order_status`, `order_created_date`, `order_created_by`, `order_remarks`, `delivery_date_time`, `shipped_date_time`, `driver`, `invoice_status`) VALUES
(1, 'INV-N0001', 17, 2, '2021-12-14 00:00:00', 5, '', '0000-00-00 00:00:00', '2022-01-31 11:22:31', 0, 0),
(2, 'INV-N0002', 1, 3, '2022-11-19 00:00:00', 5, 'ok', '2022-11-19 10:36:40', '2022-11-19 10:34:57', 8, 0),
(3, 'INV-N0003', 2, 2, '2022-11-19 00:00:00', 5, '', '0000-00-00 00:00:00', '2022-11-19 10:43:59', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `batch`, `item`, `qty`, `oid`) VALUES
(1, 8, 34, 1000, 1),
(2, 1, 6, 2000, 2),
(3, 2, 23, 100, 2),
(4, 1, 7, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE `return` (
  `return_id` int(11) NOT NULL,
  `stockid` int(11) NOT NULL,
  `return_qty` int(11) NOT NULL,
  `return_date` int(11) NOT NULL,
  `return_by` int(11) NOT NULL,
  `return_batch` int(11) NOT NULL,
  `return_item` int(11) NOT NULL,
  `remarks` int(11) NOT NULL,
  `return_customer` int(11) NOT NULL,
  `return_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_history`
--

CREATE TABLE `return_history` (
  `id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `created_date_time` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_batch` int(11) NOT NULL,
  `stock_item` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_status` int(11) NOT NULL,
  `stock_created_by` int(11) NOT NULL,
  `return_status` int(11) NOT NULL,
  `last_return_qty` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `stock_created_date` datetime NOT NULL,
  `damage` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_batch`, `stock_item`, `stock_qty`, `stock_status`, `stock_created_by`, `return_status`, `last_return_qty`, `store`, `stock_created_date`, `damage`, `photo`) VALUES
(1, 1, 6, 40, 1, 5, 0, 0, 1, '2021-12-25 17:02:48', 0, 'https://morbix.rootments.com/uploads/products/armenia peanut.png'),
(2, 1, 7, 1999, 1, 5, 0, 0, 1, '2021-12-25 17:03:50', 0, 'https://morbix.rootments.com/uploads/products/armenia mocha.png'),
(3, 1, 8, 1996, 1, 5, 0, 0, 1, '2021-12-25 17:05:18', 0, 'https://morbix.rootments.com/uploads/products/armenia azure.png'),
(4, 1, 9, 2040, 1, 5, 0, 0, 1, '2021-12-25 17:06:23', 0, 'https://morbix.rootments.com/uploads/products/armenia sky.png'),
(5, 1, 10, 1992, 1, 5, 0, 0, 1, '2021-12-25 17:07:50', 0, 'https://morbix.rootments.com/uploads/products/armenia aqua.png'),
(6, 1, 11, 2040, 1, 5, 0, 0, 1, '2021-12-25 17:08:44', 0, 'https://morbix.rootments.com/uploads/products/armenia mint.png'),
(7, 1, 12, 2044, 1, 5, 0, 0, 1, '2021-12-25 17:12:42', 0, 'https://morbix.rootments.com/uploads/products/velvet ash.png'),
(8, 1, 13, 1996, 1, 5, 0, 0, 1, '2021-12-25 17:26:48', 0, 'https://morbix.rootments.com/uploads/products/523velvet charcole.png'),
(9, 1, 14, 1052, 1, 5, 0, 0, 1, '2021-12-25 17:56:32', 0, 'https://morbix.rootments.com/uploads/products/velvet teal.png'),
(10, 1, 16, 1644, 1, 5, 0, 0, 1, '2021-12-27 19:02:53', 0, 'https://morbix.rootments.com/uploads/products/613velvet lime.png'),
(11, 1, 17, 2040, 1, 5, 0, 0, 1, '2021-12-30 10:29:12', 0, 'https://morbix.rootments.com/uploads/products/492mosco sand.png'),
(12, 1, 18, 1824, 1, 5, 0, 0, 1, '2021-12-30 12:18:48', 0, 'https://morbix.rootments.com/uploads/products/mosco sapphire.png'),
(13, 1, 19, 2220, 1, 5, 0, 0, 1, '2021-12-30 12:19:47', 0, 'https://morbix.rootments.com/uploads/products/mosco navy.png'),
(14, 2, 22, 2990, 1, 5, 0, 0, 1, '2021-12-30 12:27:50', 0, 'https://morbix.rootments.com/uploads/products/C O L O R A D O   G R A F I T O.png'),
(15, 2, 23, 1900, 1, 5, 0, 0, 1, '2021-12-30 12:46:20', 0, 'https://morbix.rootments.com/uploads/products/C O L O R A D O   G R E Y   D U S T.png'),
(16, 2, 24, 2015, 1, 5, 0, 0, 1, '2021-12-30 12:50:47', 0, 'https://morbix.rootments.com/uploads/products/T A N G E R   G R A F I T O.png'),
(17, 2, 25, 995, 1, 5, 0, 0, 1, '2021-12-30 12:55:22', 0, 'https://morbix.rootments.com/uploads/products/T E S L A   A Z U L.png'),
(18, 2, 26, 1000, 1, 5, 0, 0, 1, '2021-12-30 12:56:45', 0, 'https://morbix.rootments.com/uploads/products/T E S L A   G R A F I T O.png'),
(19, 2, 27, 1000, 1, 5, 0, 0, 1, '2021-12-30 12:58:07', 0, 'https://morbix.rootments.com/uploads/products/T E S L A   M E T A L I C.png'),
(20, 2, 29, 6115, 1, 5, 0, 0, 1, '2021-12-30 13:13:48', 0, 'https://morbix.rootments.com/uploads/products/SP WHITE.png'),
(21, 2, 30, 2000, 1, 5, 0, 0, 1, '2021-12-30 13:14:29', 0, 'https://morbix.rootments.com/uploads/products/SP BLACK.png'),
(22, 2, 31, 1065, 1, 5, 0, 0, 1, '2021-12-30 13:15:22', 0, 'https://morbix.rootments.com/uploads/products/VIBRANT AQUA.png'),
(23, 2, 32, 575, 1, 5, 0, 0, 1, '2021-12-30 13:16:25', 0, 'https://morbix.rootments.com/uploads/products/VIBRANT GREY.png'),
(24, 2, 36, 1930, 1, 5, 0, 0, 1, '2021-12-30 13:17:23', 0, 'https://morbix.rootments.com/uploads/products/C O L O R A D O   C O R T I N A.png'),
(25, 2, 37, 2000, 1, 5, 0, 0, 1, '2021-12-30 13:18:32', 0, 'https://morbix.rootments.com/uploads/products/EL - 529.png'),
(26, 2, 38, 2000, 1, 5, 0, 0, 1, '2021-12-30 13:19:28', 0, 'https://morbix.rootments.com/uploads/products/O M B R A   G R A F I T O.png'),
(27, 2, 39, 2095, 1, 5, 0, 0, 1, '2021-12-30 13:20:29', 0, 'https://morbix.rootments.com/uploads/products/D E L F O S   G R A F I T O.png'),
(28, 2, 40, 1975, 1, 5, 0, 0, 1, '2021-12-30 13:21:43', 0, 'https://morbix.rootments.com/uploads/products/F U J I   G R A F I T O.png'),
(29, 2, 41, 1250, 1, 5, 0, 0, 1, '2021-12-30 13:22:26', 0, 'https://morbix.rootments.com/uploads/products/3827 D.png'),
(30, 2, 42, 1305, 1, 5, 0, 0, 1, '2021-12-30 13:23:16', 0, 'https://morbix.rootments.com/uploads/products/3828 D.png'),
(31, 2, 43, 1300, 1, 5, 0, 0, 1, '2021-12-30 14:06:18', 0, 'https://morbix.rootments.com/uploads/products/3829 D.png'),
(32, 2, 44, 1250, 1, 5, 0, 0, 1, '2021-12-30 14:07:07', 0, 'https://morbix.rootments.com/uploads/products/3830 D.png'),
(33, 2, 45, 5250, 1, 5, 0, 0, 1, '2021-12-30 14:07:50', 0, 'https://morbix.rootments.com/uploads/products/3831 L.png'),
(34, 2, 46, 2495, 1, 5, 0, 0, 1, '2021-12-30 14:24:33', 0, 'https://morbix.rootments.com/uploads/products/C U L T U R E D   S T O N E   07.png'),
(35, 2, 47, 2495, 1, 5, 0, 0, 1, '2021-12-30 14:32:55', 0, 'https://morbix.rootments.com/uploads/products/M O D E R N   B L U E.png'),
(36, 2, 48, 2515, 1, 5, 0, 0, 1, '2021-12-30 14:34:07', 0, 'https://morbix.rootments.com/uploads/products/M O D E R N   N A T U R A L.png'),
(37, 2, 49, 2495, 1, 5, 0, 0, 1, '2021-12-30 14:35:09', 0, 'https://morbix.rootments.com/uploads/products/R O U S E E A U   B L A C K.png'),
(38, 1, 5, 2000, 1, 5, 0, 0, 1, '2022-01-03 11:37:19', 0, 'https://morbix.rootments.com/uploads/products/mosco oak.jpg'),
(39, 1, 20, 4600, 1, 5, 0, 0, 1, '2022-01-03 13:55:49', 0, 'https://morbix.rootments.com/uploads/products/ivory.jpg'),
(40, 1, 21, 1996, 1, 5, 0, 0, 1, '2022-01-03 13:56:25', 0, 'https://morbix.rootments.com/uploads/products/843ivory.jpg'),
(41, 1, 50, 1300, 1, 5, 0, 0, 1, '2022-01-03 13:57:09', 0, 'https://morbix.rootments.com/uploads/products/8010.jpg'),
(42, 1, 51, 1300, 1, 5, 0, 0, 1, '2022-01-03 13:57:58', 0, 'https://morbix.rootments.com/uploads/products/8005.jpg'),
(43, 2, 4, 348, 1, 5, 0, 0, 1, '2022-01-06 10:46:47', 0, 'https://morbix.rootments.com/uploads/products/778005.jpg'),
(44, 1, 3, 1300, 1, 5, 0, 0, 1, '2022-01-06 10:48:39', 0, 'https://morbix.rootments.com/uploads/products/4478010.jpg'),
(45, 3, 17, 2040, 1, 5, 0, 0, 1, '2022-01-06 10:51:46', 0, 'https://morbix.rootments.com/uploads/products/mosco sand.jpg'),
(46, 4, 18, 1824, 1, 5, 0, 0, 1, '2022-01-06 10:57:38', 0, 'https://morbix.rootments.com/uploads/products/mosco sapphire.jpg'),
(47, 5, 12, 2044, 1, 5, 0, 0, 1, '2022-01-06 11:20:51', 0, 'https://morbix.rootments.com/uploads/products/velvet ash.jpg'),
(48, 4, 11, 2040, 1, 5, 0, 0, 1, '2022-01-06 11:23:24', 0, 'https://morbix.rootments.com/uploads/products/armenia mint.jpg'),
(49, 4, 10, 1992, 1, 5, 0, 0, 1, '2022-01-06 11:50:51', 0, 'https://morbix.rootments.com/uploads/products/armenia aqua.jpg'),
(50, 4, 13, 1996, 1, 5, 0, 0, 1, '2022-01-06 11:59:15', 0, 'https://morbix.rootments.com/uploads/products/velvet charcole.jpg'),
(51, 3, 9, 2040, 1, 5, 0, 0, 1, '2022-01-06 12:03:34', 0, 'https://morbix.rootments.com/uploads/products/armenia sky.jpg'),
(52, 3, 8, 1996, 1, 5, 0, 0, 1, '2022-01-06 12:04:46', 0, 'https://morbix.rootments.com/uploads/products/armenia azure.jpg'),
(53, 3, 6, 40, 1, 5, 0, 0, 1, '2022-01-06 12:19:07', 0, 'https://morbix.rootments.com/uploads/products/armenia peanut.jpg'),
(54, 3, 7, 1999, 1, 5, 0, 0, 1, '2022-01-06 12:20:00', 0, 'https://morbix.rootments.com/uploads/products/armenia mocha.jpg'),
(55, 3, 14, 1052, 1, 5, 0, 0, 1, '2022-01-06 12:26:08', 0, 'https://morbix.rootments.com/uploads/products/velvet teal.jpg'),
(56, 4, 19, 2220, 1, 5, 0, 0, 1, '2022-01-06 12:27:27', 0, 'https://morbix.rootments.com/uploads/products/mosco navy.jpg'),
(57, 4, 15, 1348, 1, 5, 0, 0, 1, '2022-01-06 12:28:43', 0, 'https://morbix.rootments.com/uploads/products/velvet pine.jpg'),
(58, 6, 21, 3996, 1, 5, 0, 0, 1, '2022-01-06 12:31:43', 0, 'https://morbix.rootments.com/uploads/products/548ivory.jpg'),
(59, 7, 20, 4600, 1, 5, 0, 0, 1, '2022-01-06 12:35:34', 0, 'https://morbix.rootments.com/uploads/products/74ivory.jpg'),
(60, 3, 12, 2044, 1, 5, 0, 0, 1, '2022-01-06 15:58:57', 0, 'https://morbix.rootments.com/uploads/products/520velvet ash.jpg'),
(61, 5, 30, 2000, 1, 5, 0, 0, 1, '2022-01-06 16:49:21', 0, 'https://morbix.rootments.com/uploads/products/SP BLACK.jpg'),
(62, 8, 35, 2105, 1, 5, 0, 0, 1, '2022-01-06 16:53:26', 0, 'https://morbix.rootments.com/uploads/products/BLACK WOOD (D).jpg'),
(63, 8, 34, 3205, 1, 5, 0, 0, 1, '2022-01-06 16:54:19', 0, 'https://morbix.rootments.com/uploads/products/BLACK WOOD (L).jpg'),
(64, 9, 36, 1930, 1, 5, 0, 0, 1, '2022-01-06 16:56:02', 0, 'https://morbix.rootments.com/uploads/products/C O L O R A D O   C O R T I N A.jpg'),
(65, 10, 22, 2990, 1, 5, 0, 0, 1, '2022-01-06 16:57:02', 0, 'https://morbix.rootments.com/uploads/products/C O L O R A D O   G R A F I T O.jpg'),
(66, 10, 23, 1900, 1, 5, 0, 0, 1, '2022-01-07 12:40:41', 0, 'https://morbix.rootments.com/uploads/products/C O L O R A D O   G R E Y   D U S T.jpg'),
(67, 8, 33, 1315, 1, 5, 0, 0, 1, '2022-01-07 12:42:43', 0, 'https://morbix.rootments.com/uploads/products/CREMA WOOD (D).jpg'),
(68, 8, 28, 2870, 1, 5, 0, 0, 1, '2022-01-07 12:43:33', 0, 'https://morbix.rootments.com/uploads/products/CREMA WOOD (L).jpg'),
(69, 5, 46, 2495, 1, 5, 0, 0, 1, '2022-01-07 12:44:42', 0, 'https://morbix.rootments.com/uploads/products/C U L T U R E D   S T O N E   07.jpg'),
(70, 5, 39, 2095, 1, 5, 0, 0, 1, '2022-01-07 12:45:56', 0, 'https://morbix.rootments.com/uploads/products/D E L F O S   G R A F I T O.jpg'),
(71, 5, 40, 1975, 1, 5, 0, 0, 1, '2022-01-07 15:07:24', 0, 'https://morbix.rootments.com/uploads/products/F U J I   G R A F I T O.jpg'),
(72, 11, 47, 2495, 1, 5, 0, 0, 1, '2022-01-07 15:20:13', 0, 'https://morbix.rootments.com/uploads/products/M O D E R N   B L U E.jpg'),
(73, 11, 48, 2515, 1, 5, 0, 0, 1, '2022-01-07 15:21:20', 0, 'https://morbix.rootments.com/uploads/products/M O D E R N   N A T U R A L.jpg'),
(74, 9, 38, 2000, 1, 5, 0, 0, 1, '2022-01-07 15:22:32', 0, 'https://morbix.rootments.com/uploads/products/O M B R A   G R A F I T O.jpg'),
(75, 11, 49, 2495, 1, 5, 0, 0, 1, '2022-01-07 15:24:56', 0, 'https://morbix.rootments.com/uploads/products/R O U S E E A U   B L A C K.jpg'),
(76, 9, 29, 6115, 1, 5, 0, 0, 1, '2022-01-07 15:30:51', 0, 'https://morbix.rootments.com/uploads/products/SP WHITE.jpg'),
(77, 12, 24, 2015, 1, 5, 0, 0, 1, '2022-01-07 15:31:53', 0, 'https://morbix.rootments.com/uploads/products/T A N G E R   G R A F I T O.jpg'),
(78, 10, 25, 995, 1, 5, 0, 0, 1, '2022-01-07 15:33:05', 0, 'https://morbix.rootments.com/uploads/products/T E S L A   A Z U L.jpg'),
(79, 10, 26, 1000, 1, 5, 0, 0, 1, '2022-01-07 15:39:35', 0, 'https://morbix.rootments.com/uploads/products/T E S L A   G R A F I T O.jpg'),
(80, 10, 27, 1000, 1, 5, 0, 0, 1, '2022-01-07 15:43:24', 0, 'https://morbix.rootments.com/uploads/products/T E S L A   M E T A L I C.jpg'),
(81, 12, 31, 1065, 1, 5, 0, 0, 1, '2022-01-07 16:09:07', 0, 'https://morbix.rootments.com/uploads/products/VIBRANT AQUA.jpg'),
(82, 13, 32, 575, 1, 5, 0, 0, 1, '2022-01-07 16:10:01', 0, 'https://morbix.rootments.com/uploads/products/VIBRANT GREY.jpg'),
(83, 5, 37, 2000, 1, 5, 0, 0, 1, '2022-01-07 16:11:07', 0, 'https://morbix.rootments.com/uploads/products/EL - 529.jpg'),
(84, 14, 41, 1250, 1, 5, 0, 0, 1, '2022-01-07 16:11:54', 0, 'https://morbix.rootments.com/uploads/products/3827 D.jpg'),
(85, 14, 42, 1305, 1, 5, 0, 0, 1, '2022-01-07 16:12:32', 0, 'https://morbix.rootments.com/uploads/products/3828 D.jpg'),
(86, 14, 43, 1300, 1, 5, 0, 0, 1, '2022-01-07 16:13:21', 0, 'https://morbix.rootments.com/uploads/products/3829 D.jpg'),
(87, 14, 44, 1250, 1, 5, 0, 0, 1, '2022-01-07 16:13:57', 0, 'https://morbix.rootments.com/uploads/products/3830 D.jpg'),
(88, 14, 45, 5250, 1, 5, 0, 0, 1, '2022-01-07 16:14:40', 0, 'https://morbix.rootments.com/uploads/products/3831 L.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock_history`
--

CREATE TABLE `stock_history` (
  `hid` int(11) NOT NULL,
  `hbatch` int(11) NOT NULL,
  `hitem` int(11) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `hqty` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_history`
--

INSERT INTO `stock_history` (`hid`, `hbatch`, `hitem`, `created_date_time`, `created_by`, `hqty`, `photo`) VALUES
(1, 1, 6, '2021-12-25 17:02:48', 5, 2040, 'https://morbix.rootments.com/uploads/products/460armenia peanut.png'),
(2, 1, 7, '2021-12-25 17:03:50', 5, 2000, 'https://morbix.rootments.com/uploads/products/157armenia mocha.png'),
(3, 1, 8, '2021-12-25 17:05:18', 5, 1996, 'https://morbix.rootments.com/uploads/products/319armenia azure.png'),
(4, 1, 9, '2021-12-25 17:06:23', 5, 2040, 'https://morbix.rootments.com/uploads/products/15armenia sky.png'),
(5, 1, 10, '2021-12-25 17:07:50', 5, 1992, 'https://morbix.rootments.com/uploads/products/389armenia aqua.png'),
(6, 1, 11, '2021-12-25 17:08:45', 5, 2040, 'https://morbix.rootments.com/uploads/products/31armenia mint.png'),
(7, 1, 12, '2021-12-25 17:12:42', 5, 2044, 'https://morbix.rootments.com/uploads/products/73velvet ash.png'),
(8, 1, 13, '2021-12-25 17:26:48', 5, 1996, 'https://morbix.rootments.com/uploads/products/489velvet charcole.png'),
(9, 1, 14, '2021-12-25 17:56:32', 5, 1052, 'https://morbix.rootments.com/uploads/products/333velvet teal.png'),
(10, 1, 16, '2021-12-27 19:02:53', 5, 1348, 'https://morbix.rootments.com/uploads/products/749deals 1.png'),
(11, 1, 13, '2021-12-28 11:17:50', 5, 1400, ''),
(12, 1, 13, '2021-12-28 11:22:15', 5, 1400, ''),
(13, 1, 13, '2021-12-28 11:24:10', 5, 1400, ''),
(14, 1, 17, '2021-12-30 10:29:12', 5, 2040, 'https://morbix.rootments.com/uploads/products/54mosco sand.png'),
(15, 1, 17, '2021-12-30 11:50:32', 5, 2040, ''),
(16, 1, 18, '2021-12-30 12:18:48', 5, 1824, 'https://morbix.rootments.com/uploads/products/724mosco sapphire.png'),
(17, 1, 19, '2021-12-30 12:19:47', 5, 2220, 'https://morbix.rootments.com/uploads/products/848mosco navy.png'),
(18, 2, 22, '2021-12-30 12:27:50', 5, 2990, 'https://morbix.rootments.com/uploads/products/74C O L O R A D O   G R A F I T O.png'),
(19, 2, 23, '2021-12-30 12:46:20', 5, 2000, 'https://morbix.rootments.com/uploads/products/82C O L O R A D O   G R E Y   D U S T.png'),
(20, 2, 24, '2021-12-30 12:50:47', 5, 2015, 'https://morbix.rootments.com/uploads/products/228T A N G E R   G R A F I T O.png'),
(21, 2, 25, '2021-12-30 12:55:23', 5, 995, 'https://morbix.rootments.com/uploads/products/181T E S L A   A Z U L.png'),
(22, 2, 26, '2021-12-30 12:56:45', 5, 1000, 'https://morbix.rootments.com/uploads/products/751T E S L A   G R A F I T O.png'),
(23, 2, 27, '2021-12-30 12:58:07', 5, 1000, 'https://morbix.rootments.com/uploads/products/625T E S L A   M E T A L I C.png'),
(24, 2, 29, '2021-12-30 13:13:48', 5, 6115, 'https://morbix.rootments.com/uploads/products/771SP WHITE.png'),
(25, 2, 30, '2021-12-30 13:14:29', 5, 2000, 'https://morbix.rootments.com/uploads/products/153SP BLACK.png'),
(26, 2, 31, '2021-12-30 13:15:22', 5, 1065, 'https://morbix.rootments.com/uploads/products/102VIBRANT AQUA.png'),
(27, 2, 32, '2021-12-30 13:16:25', 5, 575, 'https://morbix.rootments.com/uploads/products/56VIBRANT GREY.png'),
(28, 2, 36, '2021-12-30 13:17:23', 5, 1930, 'https://morbix.rootments.com/uploads/products/878C O L O R A D O   C O R T I N A.png'),
(29, 2, 37, '2021-12-30 13:18:32', 5, 2000, 'https://morbix.rootments.com/uploads/products/159EL - 529.png'),
(30, 2, 38, '2021-12-30 13:19:28', 5, 2000, 'https://morbix.rootments.com/uploads/products/873O M B R A   G R A F I T O.png'),
(31, 2, 39, '2021-12-30 13:20:29', 5, 2095, 'https://morbix.rootments.com/uploads/products/935D E L F O S   G R A F I T O.png'),
(32, 2, 40, '2021-12-30 13:21:43', 5, 1975, 'https://morbix.rootments.com/uploads/products/248F U J I   G R A F I T O.png'),
(33, 2, 41, '2021-12-30 13:22:26', 5, 1250, 'https://morbix.rootments.com/uploads/products/2243827 D.png'),
(34, 2, 42, '2021-12-30 13:23:16', 5, 1305, 'https://morbix.rootments.com/uploads/products/3853828 D.png'),
(35, 2, 43, '2021-12-30 14:06:18', 5, 1300, 'https://morbix.rootments.com/uploads/products/4463829 D.png'),
(36, 2, 44, '2021-12-30 14:07:07', 5, 1250, 'https://morbix.rootments.com/uploads/products/5923830 D.png'),
(37, 2, 45, '2021-12-30 14:07:50', 5, 5250, 'https://morbix.rootments.com/uploads/products/9313831 L.png'),
(38, 2, 46, '2021-12-30 14:24:33', 5, 2495, 'https://morbix.rootments.com/uploads/products/724C U L T U R E D   S T O N E   07.png'),
(39, 2, 47, '2021-12-30 14:32:55', 5, 2495, 'https://morbix.rootments.com/uploads/products/68M O D E R N   B L U E.png'),
(40, 2, 48, '2021-12-30 14:34:07', 5, 2515, 'https://morbix.rootments.com/uploads/products/936M O D E R N   N A T U R A L.png'),
(41, 2, 49, '2021-12-30 14:35:09', 5, 2495, 'https://morbix.rootments.com/uploads/products/529R O U S E E A U   B L A C K.png'),
(42, 1, 5, '2022-01-03 11:37:19', 5, 2000, 'https://morbix.rootments.com/uploads/products/146mosco oak.jpg'),
(43, 1, 20, '2022-01-03 13:55:49', 5, 4600, 'https://morbix.rootments.com/uploads/products/91ivory.jpg'),
(44, 1, 21, '2022-01-03 13:56:25', 5, 1996, 'https://morbix.rootments.com/uploads/products/778ivory.jpg'),
(45, 1, 50, '2022-01-03 13:57:09', 5, 1300, 'https://morbix.rootments.com/uploads/products/3468010.jpg'),
(46, 1, 51, '2022-01-03 13:57:58', 5, 1300, 'https://morbix.rootments.com/uploads/products/5728005.jpg'),
(47, 2, 4, '2022-01-06 10:46:47', 5, 348, 'https://morbix.rootments.com/uploads/products/6568005.jpg'),
(48, 1, 3, '2022-01-06 10:48:39', 5, 1300, 'https://morbix.rootments.com/uploads/products/2798010.jpg'),
(49, 3, 17, '2022-01-06 10:51:46', 5, 2040, 'https://morbix.rootments.com/uploads/products/477mosco sand.jpg'),
(50, 4, 18, '2022-01-06 10:57:38', 5, 1824, 'https://morbix.rootments.com/uploads/products/954mosco sapphire.jpg'),
(51, 5, 12, '2022-01-06 11:20:52', 5, 2044, 'https://morbix.rootments.com/uploads/products/891velvet ash.jpg'),
(52, 4, 11, '2022-01-06 11:23:24', 5, 2040, 'https://morbix.rootments.com/uploads/products/230armenia mint.jpg'),
(53, 4, 10, '2022-01-06 11:50:51', 5, 1992, 'https://morbix.rootments.com/uploads/products/643armenia aqua.jpg'),
(54, 4, 13, '2022-01-06 11:59:15', 5, 1996, 'https://morbix.rootments.com/uploads/products/597velvet charcole.jpg'),
(55, 3, 9, '2022-01-06 12:03:34', 5, 2040, 'https://morbix.rootments.com/uploads/products/35armenia sky.jpg'),
(56, 3, 8, '2022-01-06 12:04:46', 5, 1996, 'https://morbix.rootments.com/uploads/products/98armenia azure.jpg'),
(57, 3, 6, '2022-01-06 12:19:07', 5, 2040, 'https://morbix.rootments.com/uploads/products/719armenia peanut.jpg'),
(58, 3, 7, '2022-01-06 12:20:00', 5, 2000, 'https://morbix.rootments.com/uploads/products/664armenia mocha.jpg'),
(59, 3, 14, '2022-01-06 12:26:08', 5, 1052, 'https://morbix.rootments.com/uploads/products/1velvet teal.jpg'),
(60, 4, 19, '2022-01-06 12:27:27', 5, 2220, 'https://morbix.rootments.com/uploads/products/909mosco navy.jpg'),
(61, 4, 15, '2022-01-06 12:28:43', 5, 1348, 'https://morbix.rootments.com/uploads/products/372velvet pine.jpg'),
(62, 6, 21, '2022-01-06 12:31:43', 5, 3996, 'https://morbix.rootments.com/uploads/products/331ivory.jpg'),
(63, 7, 20, '2022-01-06 12:35:34', 5, 4600, 'https://morbix.rootments.com/uploads/products/907ivory.jpg'),
(64, 3, 12, '2022-01-06 15:58:57', 5, 2044, 'https://morbix.rootments.com/uploads/products/790velvet ash.jpg'),
(65, 5, 30, '2022-01-06 16:49:21', 5, 2000, 'https://morbix.rootments.com/uploads/products/212SP BLACK.jpg'),
(66, 8, 35, '2022-01-06 16:53:26', 5, 2105, 'https://morbix.rootments.com/uploads/products/672BLACK WOOD (D).jpg'),
(67, 8, 34, '2022-01-06 16:54:19', 5, 4205, 'https://morbix.rootments.com/uploads/products/53BLACK WOOD (L).jpg'),
(68, 9, 36, '2022-01-06 16:56:02', 5, 1930, 'https://morbix.rootments.com/uploads/products/664C O L O R A D O   C O R T I N A.jpg'),
(69, 10, 22, '2022-01-06 16:57:02', 5, 2990, 'https://morbix.rootments.com/uploads/products/451C O L O R A D O   G R A F I T O.jpg'),
(70, 10, 23, '2022-01-07 12:40:41', 5, 2000, 'https://morbix.rootments.com/uploads/products/735C O L O R A D O   G R E Y   D U S T.jpg'),
(71, 8, 33, '2022-01-07 12:42:43', 5, 1315, 'https://morbix.rootments.com/uploads/products/285CREMA WOOD (D).jpg'),
(72, 8, 28, '2022-01-07 12:43:33', 5, 2870, 'https://morbix.rootments.com/uploads/products/989CREMA WOOD (L).jpg'),
(73, 5, 46, '2022-01-07 12:44:42', 5, 2495, 'https://morbix.rootments.com/uploads/products/166C U L T U R E D   S T O N E   07.jpg'),
(74, 5, 39, '2022-01-07 12:45:56', 5, 2095, 'https://morbix.rootments.com/uploads/products/711D E L F O S   G R A F I T O.jpg'),
(75, 5, 40, '2022-01-07 15:07:24', 5, 1975, 'https://morbix.rootments.com/uploads/products/845F U J I   G R A F I T O.jpg'),
(76, 11, 47, '2022-01-07 15:20:13', 5, 2495, 'https://morbix.rootments.com/uploads/products/893M O D E R N   B L U E.jpg'),
(77, 11, 48, '2022-01-07 15:21:20', 5, 2515, 'https://morbix.rootments.com/uploads/products/896M O D E R N   N A T U R A L.jpg'),
(78, 9, 38, '2022-01-07 15:22:32', 5, 2000, 'https://morbix.rootments.com/uploads/products/682O M B R A   G R A F I T O.jpg'),
(79, 11, 49, '2022-01-07 15:24:56', 5, 2495, 'https://morbix.rootments.com/uploads/products/223R O U S E E A U   B L A C K.jpg'),
(80, 9, 29, '2022-01-07 15:30:51', 5, 6115, 'https://morbix.rootments.com/uploads/products/159SP WHITE.jpg'),
(81, 12, 24, '2022-01-07 15:31:53', 5, 2015, 'https://morbix.rootments.com/uploads/products/450T A N G E R   G R A F I T O.jpg'),
(82, 10, 25, '2022-01-07 15:33:05', 5, 995, 'https://morbix.rootments.com/uploads/products/875T E S L A   A Z U L.jpg'),
(83, 10, 26, '2022-01-07 15:39:35', 5, 1000, 'https://morbix.rootments.com/uploads/products/845T E S L A   G R A F I T O.jpg'),
(84, 10, 27, '2022-01-07 15:43:24', 5, 1000, 'https://morbix.rootments.com/uploads/products/11T E S L A   M E T A L I C.jpg'),
(85, 12, 31, '2022-01-07 16:09:07', 5, 1065, 'https://morbix.rootments.com/uploads/products/916VIBRANT AQUA.jpg'),
(86, 13, 32, '2022-01-07 16:10:01', 5, 575, 'https://morbix.rootments.com/uploads/products/738VIBRANT GREY.jpg'),
(87, 5, 37, '2022-01-07 16:11:07', 5, 2000, 'https://morbix.rootments.com/uploads/products/687EL - 529.jpg'),
(88, 14, 41, '2022-01-07 16:11:54', 5, 1250, 'https://morbix.rootments.com/uploads/products/563827 D.jpg'),
(89, 14, 42, '2022-01-07 16:12:32', 5, 1305, 'https://morbix.rootments.com/uploads/products/1663828 D.jpg'),
(90, 14, 43, '2022-01-07 16:13:21', 5, 1300, 'https://morbix.rootments.com/uploads/products/3213829 D.jpg'),
(91, 14, 44, '2022-01-07 16:13:57', 5, 1250, 'https://morbix.rootments.com/uploads/products/5053830 D.jpg'),
(92, 14, 45, '2022-01-07 16:14:40', 5, 5250, 'https://morbix.rootments.com/uploads/products/6223831 L.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `ac_status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `photo` varchar(255) NOT NULL,
  `online_status` int(11) NOT NULL,
  `store` int(11) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `phone`, `role`, `ac_status`, `created_date`, `last_login`, `photo`, `online_status`, `store`, `address`) VALUES
(1, 'admin', 'admin', 'admin', '', 'admin', 1, '2021-11-21 11:44:16', '2022-11-19 00:00:00', '', 0, 1, ''),
(3, 'sales', 'sales', '123', '7045898765', 'sales', 1, '2021-11-21 00:00:00', '2021-12-17 00:00:00', 'http://localhost/warehouse_management/uploads/user/WH(1).png', 1, 1, 'Thamarashery'),
(5, 'Godown', 'godown', '123', '9879872131', 'godown', 1, '2021-11-22 00:00:00', '2022-11-19 00:00:00', 'http://localhost/warehouse_management/uploads/user/WH(1).png', 1, 1, 'jh'),
(8, 'SHAMEER', 'SHAMEER', 'sCdV3G', '9847815670', 'driver', 1, '2022-11-19 00:00:00', '2022-11-19 00:00:00', 'https://morbix.rootments.com/uploads/user/2x2.png', 0, 1, 'KALLAI');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `activity_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `activity_type` varchar(200) NOT NULL,
  `activity` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`activity_id`, `user`, `activity_type`, `activity`, `date`) VALUES
(1, 3, 'Login', 'Logged Out Successfully', '2021-12-11 12:14:39'),
(2, 6, 'Login', 'Logged in Successfully', '2021-12-11 12:14:57'),
(3, 1, 'Login', 'Logged in Successfully', '2021-12-11 01:02:12'),
(4, 5, 'Login', 'Logged in Successfully', '2021-12-11 04:12:45'),
(5, 5, 'Login', 'Logged Out Successfully', '2021-12-11 04:12:55'),
(6, 3, 'Login', 'Logged in Successfully', '2021-12-11 04:13:03'),
(7, 1, 'Login', 'Logged in Successfully', '2021-12-11 04:33:27'),
(8, 5, 'Login', 'Logged in Successfully', '2021-12-11 05:16:44'),
(9, 5, 'Login', 'Logged Out Successfully', '2021-12-11 05:34:18'),
(10, 3, 'Login', 'Logged in Successfully', '2021-12-11 05:34:25'),
(11, 3, 'Login', 'Logged in Successfully', '2021-12-11 05:36:05'),
(12, 3, 'Login', 'Logged in Successfully', '2021-12-11 05:38:08'),
(13, 3, 'Login', 'Logged Out Successfully', '2021-12-11 05:39:02'),
(14, 5, 'Login', 'Logged in Successfully', '2021-12-11 05:39:11'),
(15, 5, 'Login', 'Logged in Successfully', '2021-12-12 08:02:23'),
(16, 5, 'Login', 'Logged in Successfully', '2021-12-12 09:20:50'),
(17, 1, 'Login', 'Logged in Successfully', '2021-12-12 11:12:53'),
(18, 1, 'Login', 'Logged Out Successfully', '2021-12-12 11:14:13'),
(19, 5, 'Login', 'Logged in Successfully', '2021-12-12 11:14:18'),
(20, 5, 'Login', 'Logged Out Successfully', '2021-12-12 11:19:22'),
(21, 6, 'Login', 'Logged in Successfully', '2021-12-12 11:19:30'),
(22, 1, 'Login', 'Logged in Successfully', '2021-12-12 11:21:40'),
(23, 3, 'Login', 'Logged in Successfully', '2021-12-12 11:22:20'),
(24, 3, 'Login', 'Logged in Successfully', '2021-12-13 10:55:06'),
(25, 3, 'Login', 'Logged in Successfully', '2021-12-13 10:56:03'),
(26, 3, 'Login', 'Logged in Successfully', '2021-12-17 09:39:11'),
(27, 3, 'Login', 'Logged in Successfully', '2021-12-17 10:36:31'),
(28, 3, 'Login', 'Logged in Successfully', '2021-12-17 10:37:34'),
(29, 3, 'Login', 'Logged in Successfully', '2021-12-17 11:09:26'),
(30, 5, 'Login', 'Logged in Successfully', '2021-12-18 12:31:12'),
(31, 1, 'Login', 'Logged in Successfully', '2021-12-21 05:46:19'),
(32, 1, 'Login', 'Logged in Successfully', '2021-12-21 05:52:35'),
(33, 1, 'Login', 'Logged in Successfully', '2021-12-21 05:52:36'),
(34, 5, 'Login', 'Logged in Successfully', '2021-12-21 06:38:44'),
(35, 1, 'Login', 'Logged Out Successfully', '2021-12-21 06:40:38'),
(36, 5, 'Login', 'Logged in Successfully', '2021-12-21 06:40:51'),
(37, 5, 'Login', 'Logged in Successfully', '2021-12-23 10:54:41'),
(38, 5, 'Login', 'Logged Out Successfully', '2021-12-23 11:00:41'),
(39, 6, 'Login', 'Logged in Successfully', '2021-12-23 11:00:48'),
(40, 6, 'Login', 'Logged Out Successfully', '2021-12-23 11:01:30'),
(41, 5, 'Login', 'Logged in Successfully', '2021-12-23 11:01:37'),
(42, 5, 'Login', 'Logged in Successfully', '2021-12-23 11:03:29'),
(43, 5, 'Login', 'Logged in Successfully', '2021-12-23 11:53:15'),
(44, 5, 'Login', 'Logged in Successfully', '2021-12-23 12:01:13'),
(45, 5, 'Login', 'Logged in Successfully', '2021-12-23 12:09:14'),
(46, 5, 'Login', 'Logged in Successfully', '2021-12-23 05:07:53'),
(47, 5, 'Login', 'Logged in Successfully', '2021-12-23 05:55:06'),
(48, 5, 'Login', 'Logged in Successfully', '2021-12-24 10:11:57'),
(49, 5, 'Login', 'Logged in Successfully', '2021-12-25 11:16:29'),
(50, 5, 'Login', 'Logged in Successfully', '2021-12-25 05:00:09'),
(51, 5, 'Login', 'Logged in Successfully', '2021-12-27 01:19:38'),
(52, 5, 'Login', 'Logged in Successfully', '2021-12-27 01:22:35'),
(53, 5, 'Login', 'Logged in Successfully', '2021-12-27 01:29:44'),
(54, 5, 'Login', 'Logged in Successfully', '2021-12-27 05:22:59'),
(55, 5, 'Login', 'Logged in Successfully', '2021-12-27 05:28:58'),
(56, 5, 'Login', 'Logged in Successfully', '2021-12-27 06:31:13'),
(57, 5, 'Login', 'Logged in Successfully', '2021-12-27 06:34:46'),
(58, 5, 'Login', 'Logged in Successfully', '2021-12-27 06:36:45'),
(59, 5, 'Login', 'Logged in Successfully', '2021-12-27 06:40:31'),
(60, 5, 'Login', 'Logged in Successfully', '2021-12-27 06:43:47'),
(61, 5, 'Login', 'Logged Out Successfully', '2021-12-27 07:03:14'),
(62, 5, 'Login', 'Logged in Successfully', '2021-12-28 11:16:26'),
(63, 5, 'Login', 'Logged in Successfully', '2021-12-28 11:20:20'),
(64, 5, 'Login', 'Logged in Successfully', '2021-12-28 09:02:29'),
(65, 5, 'Login', 'Logged in Successfully', '2021-12-30 09:59:50'),
(66, 5, 'Login', 'Logged in Successfully', '2021-12-30 02:31:54'),
(67, 5, 'Login', 'Logged in Successfully', '2021-12-31 09:23:28'),
(68, 5, 'Login', 'Logged in Successfully', '2021-12-31 09:39:36'),
(69, 5, 'Login', 'Logged Out Successfully', '2021-12-31 09:56:15'),
(70, 5, 'Login', 'Logged in Successfully', '2021-12-31 09:56:19'),
(71, 5, 'Login', 'Logged Out Successfully', '2021-12-31 10:03:53'),
(72, 5, 'Login', 'Logged in Successfully', '2021-12-31 10:07:34'),
(73, 5, 'Login', 'Logged in Successfully', '2021-12-31 04:05:19'),
(74, 5, 'Login', 'Logged in Successfully', '2021-12-31 04:42:35'),
(75, 5, 'Login', 'Logged Out Successfully', '2021-12-31 06:30:39'),
(76, 5, 'Login', 'Logged in Successfully', '2022-01-01 09:34:26'),
(77, 5, 'Login', 'Logged in Successfully', '2022-01-01 09:58:05'),
(78, 5, 'Login', 'Logged in Successfully', '2022-01-01 09:59:20'),
(79, 5, 'Login', 'Logged in Successfully', '2022-01-03 09:40:10'),
(80, 5, 'Login', 'Logged in Successfully', '2022-01-03 01:51:22'),
(81, 5, 'Login', 'Logged Out Successfully', '2022-01-03 07:12:13'),
(82, 5, 'Login', 'Logged in Successfully', '2022-01-04 09:27:17'),
(83, 5, 'Login', 'Logged in Successfully', '2022-01-04 03:44:29'),
(84, 5, 'Login', 'Logged Out Successfully', '2022-01-04 03:45:34'),
(85, 5, 'Login', 'Logged in Successfully', '2022-01-05 09:44:57'),
(86, 5, 'Login', 'Logged in Successfully', '2022-01-06 09:55:50'),
(87, 5, 'Login', 'Logged in Successfully', '2022-01-06 02:36:00'),
(88, 5, 'Login', 'Logged in Successfully', '2022-01-07 09:39:12'),
(89, 5, 'Login', 'Logged Out Successfully', '2022-01-07 06:20:45'),
(90, 5, 'Login', 'Logged in Successfully', '2022-01-08 09:10:25'),
(91, 5, 'Login', 'Logged in Successfully', '2022-01-10 09:42:18'),
(92, 5, 'Login', 'Logged in Successfully', '2022-01-11 09:30:16'),
(93, 5, 'Login', 'Logged in Successfully', '2022-01-12 09:28:23'),
(94, 5, 'Login', 'Logged in Successfully', '2022-01-13 09:36:53'),
(95, 5, 'Login', 'Logged in Successfully', '2022-01-14 09:58:08'),
(96, 5, 'Login', 'Logged in Successfully', '2022-01-15 09:44:35'),
(97, 5, 'Login', 'Logged in Successfully', '2022-01-17 09:45:08'),
(98, 5, 'Login', 'Logged in Successfully', '2022-01-18 09:39:34'),
(99, 5, 'Login', 'Logged in Successfully', '2022-01-19 10:24:30'),
(100, 5, 'Login', 'Logged in Successfully', '2022-01-19 10:39:19'),
(101, 5, 'Login', 'Logged in Successfully', '2022-01-20 09:43:47'),
(102, 5, 'Login', 'Logged in Successfully', '2022-01-24 10:56:45'),
(103, 5, 'Login', 'Logged in Successfully', '2022-01-31 11:09:11'),
(104, 5, 'Login', 'Logged in Successfully', '2022-03-14 01:36:50'),
(105, 1, 'Login', 'Logged in Successfully', '2022-11-16 04:48:55'),
(106, 5, 'Login', 'Logged in Successfully', '2022-11-19 10:18:49'),
(107, 5, 'Login', 'Logged Out Successfully', '2022-11-19 10:19:37'),
(108, 1, 'Login', 'Logged in Successfully', '2022-11-19 10:19:47'),
(109, 1, 'Login', 'Logged Out Successfully', '2022-11-19 10:20:20'),
(110, 5, 'Login', 'Logged in Successfully', '2022-11-19 10:20:23'),
(111, 5, 'Login', 'Logged Out Successfully', '2022-11-19 10:29:16'),
(112, 1, 'Login', 'Logged in Successfully', '2022-11-19 10:29:28'),
(113, 1, 'Login', 'Logged in Successfully', '2022-11-19 10:33:35'),
(114, 1, 'Login', 'Logged Out Successfully', '2022-11-19 10:33:58'),
(115, 5, 'Login', 'Logged in Successfully', '2022-11-19 10:34:01'),
(116, 5, 'Login', 'Logged in Successfully', '2022-11-19 10:34:01'),
(117, 1, 'Login', 'Logged Out Successfully', '2022-11-19 10:35:05'),
(118, 8, 'Login', 'Logged in Successfully', '2022-11-19 10:36:20'),
(119, 8, 'Login', 'Logged Out Successfully', '2022-11-19 10:38:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_last_seen`
--
ALTER TABLE `message_last_seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return`
--
ALTER TABLE `return`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `return_history`
--
ALTER TABLE `return_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `stock_history`
--
ALTER TABLE `stock_history`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_last_seen`
--
ALTER TABLE `message_last_seen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `return`
--
ALTER TABLE `return`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_history`
--
ALTER TABLE `return_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `stock_history`
--
ALTER TABLE `stock_history`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
