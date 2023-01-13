-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 01:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belanjain`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `unique_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `unique_id`) VALUES
(1, 'mufid@gmail.com', '3GiERsDQIJ8ETVD1NYFaweP6RZBiYWI5ZjdmNWUy', 'Mufid Farhan Muhana', '4e61845ff2'),
(2, 'user1@mail.com', '3GiERsDQIJ8ETVD1NYFaweP6RZBiYWI5ZjdmNWUy\r\n', 'user1', 'bab9f7f5e2'),
(3, 'admin@belanjain.com', '3GiERsDQIJ8ETVD1NYFaweP6RZBiYWI5ZjdmNWUy', 'Admin Belanjain', 'bab9f7f5e2');

-- --------------------------------------------------------

--
-- Table structure for table `customer_chart`
--

CREATE TABLE `customer_chart` (
  `id` int(8) NOT NULL,
  `email` varchar(128) NOT NULL,
  `customer_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `price` bigint(20) NOT NULL,
  `size` varchar(128) NOT NULL,
  `quantity` int(3) NOT NULL,
  `color` varchar(128) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_chart`
--

INSERT INTO `customer_chart` (`id`, `email`, `customer_id`, `product_id`, `product_name`, `price`, `size`, `quantity`, `color`, `create_at`, `image`) VALUES
(113, 'dhoni@gmail.com', 0, 74, 'Erigo - Short Shirt Quincy', 110000, '', 1, '', '2023-01-13 13:33:14', '588762940_shortshirt1.jpeg'),
(114, 'dhoni@gmail.com', 0, 74, 'Erigo - Short Shirt Quincy', 110000, '', 1, '', '2023-01-13 13:35:24', '588762940_shortshirt1.jpeg'),
(115, 'dhoni@gmail.com', 0, 73, 'Erigo - Erigo Flanel', 125000, '', 1, '', '2023-01-13 13:36:10', '1068203768_erigoFlanel.jpeg'),
(116, '', 0, 67, 'jovemboi - Loaferboi blacks', 980000, '', 1, '', '2023-01-13 14:28:13', '1351933754_loaferBoi1.jpeg'),
(117, 'testdpw@gmail.com', 0, 63, 'Jakarta Vibes - T-Shirt Damer', 140000, '', 1, '', '2023-01-13 14:30:16', '2051526080_jakartaVibes1.jpeg'),
(118, 'testdpw@gmail.com', 0, 63, 'Jakarta Vibes - T-Shirt Damer', 140000, 'S', 2, 'Red', '2023-01-13 14:30:29', '2051526080_jakartaVibes1.jpeg'),
(119, 'testdpw@gmail.com', 0, 63, 'Jakarta Vibes - T-Shirt Damer', 140000, '', 1, '', '2023-01-13 14:41:09', '2051526080_jakartaVibes1.jpeg'),
(120, 'testdpw@gmail.com', 0, 63, 'Jakarta Vibes - T-Shirt Damer', 140000, '', 1, '', '2023-01-13 14:41:17', '2051526080_jakartaVibes1.jpeg'),
(121, 'testdpw@gmail.com', 0, 69, 'Gizmo - Gizmo Cargo Pants', 100000, 'S', 1, '', '2023-01-13 14:49:20', '556610984_gizmo1.jpeg'),
(122, 'testdpw@gmail.com', 0, 69, 'Gizmo - Gizmo Cargo Pants', 100000, '', 1, '', '2023-01-13 14:49:38', '556610984_gizmo1.jpeg'),
(123, 'testdpw@gmail.com', 0, 80, 'JakartaVibes - T-Shirt Polos', 90000, 'S', 1, 'Red', '2023-01-13 14:54:42', '981117243_shortshirt1.jpeg'),
(124, 'testdpw@gmail.com', 0, 80, 'JakartaVibes - T-Shirt Polos', 90000, 'S', 1, 'Red', '2023-01-13 14:55:42', '981117243_shortshirt1.jpeg'),
(125, 'testdpw@gmail.com', 0, 80, 'JakartaVibes - T-Shirt Polos', 90000, '', 1, '', '2023-01-13 14:55:46', '981117243_shortshirt1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(8) NOT NULL,
  `customer_id` int(8) NOT NULL,
  `email` varchar(128) NOT NULL,
  `product_id` int(8) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(8) NOT NULL,
  `brand_name` varchar(128) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `category` varchar(32) NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(8) NOT NULL,
  `description` text DEFAULT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_name`, `product_name`, `category`, `price`, `quantity`, `description`, `image1`, `image2`, `image3`, `create_at`) VALUES
(63, 'Jakarta Vibes', 'T-Shirt Damer', 'unisex', 140000, 50, 'Bahan : Cotton\r\n tshirt yang cocok sekali untuk anak muda masa kini yang sedang mencari outfit', '2051526080_jakartaVibes1.jpeg', '968613291_jakartaVibes2.jpeg', '1646354385_jakartaVibes3.jpeg', '2023-01-13 11:50:33'),
(64, 'JakartaVibes', 'Shinner Pleasure Hoodie', 'unisex', 300000, 100, 'bahan produk : cotton\r\nhoodie yang cocok sekali untuk anak muda masa kini yang sedang mencari outfit', '179373461_hoodieJkt1.jpeg', '443793279_hoodieJkt2.jpeg', '1706771307_hoodieJkt3.jpg', '2023-01-13 11:53:01'),
(65, 'JakartaVibes', 'Workshirt Good Sunday', 'unisex', 280000, 50, 'bahan produk : cotton\r\nworkshirt yang cocok sekali untuk anak muda masa kini yang sedang mencari outfit', '1753676189_workshirtJkt1.jpeg', '967365233_workshirtJkt2.jpeg', '', '2023-01-13 11:55:40'),
(66, 'JakartaVibes', 'Workshirt Good Sunday', 'unisex', 280000, 50, 'bahan produk : cotton\r\nworkshirt yang cocok sekali untuk anak muda masa kini yang sedang mencari outfit', '375205316_limfoiJkt1.jpeg', '1357933226_limfoiJkt2.jpeg', '', '2023-01-13 11:56:43'),
(67, 'jovemboi', 'Loaferboi blacks', 'men', 980000, 30, 'bahan produk : .\r\n\r\nHANDMADE\r\nUpper : Full Grain Leather\r\nSole : Anti-Grease & Anti-Oil Rubber Outsole\r\nLining : Lambskin\r\n\r\n loafers  yang cocok sekali untuk anak muda masa kini yang sedang mencari outfit', '1351933754_loaferBoi1.jpeg', '1826298490_loaferBoi2.jpeg', '638733327_loaferBoi3.jpeg', '2023-01-13 11:57:49'),
(68, 'RootsAttitude', 'Caps Mentality', 'unisex', 120000, 100, 'bahan produk : twill\r\n\r\nhats yang cocok sekali untuk anak muda masa kini yang sedang mencari outfit', '1173176237_rootsAttitude1.jpeg', '619340007_rootsAttitude2.jpeg', '1195955952_rootsAttitude3.jpeg', '2023-01-13 11:58:51'),
(69, 'Gizmo', 'Gizmo Cargo Pants', 'men', 100000, 50, 'bahan produk : cotton\r\ncargopants yang cocok sekali untuk anak muda masa kini yang sedang mencari outfit', '556610984_gizmo1.jpeg', '1185647080_gizmo2.jpeg', '31092208_gizmo3.jpeg', '2023-01-13 11:59:44'),
(70, 'ThanksInsomnia', 'T-Shirt Destiny Black', 'unisex', 90000, 50, 'bahan produk : cotton 24s\r\ntshirt yang cocok sekali untuk anak muda masa kini yang sedang mencari outfit', '896090370_insomnia1.jpeg', '1029066780_insomnia2.jpeg', '', '2023-01-13 12:00:44'),
(71, 'ThanksInsomnia', 'T-Shirt Norrine Black', 'unisex', 90000, 50, 'bahan produk : cotton 24s\r\ntshirt yang cocok sekali untuk anak muda masa kini yang sedang mencari outfit', '86814646_insomnia3.jpeg', '1719084326_insomnia4.jpeg', '', '2023-01-13 12:01:54'),
(72, 'ThanksInsomnia', 'FlowerThanks', 'unisex', 90000, 50, 'bahan produk : cotton 24s\r\ntshirt yang cocok sekali untuk anak muda masa kini yang sedang mencari outfit', '2015990331_flowerthanks1.jpeg', '497085122_flowerthanks2.jpeg', '267506651_flowerthanks3.jpeg', '2023-01-13 12:08:35'),
(73, 'Erigo', 'Erigo Flanel', 'men', 125000, 50, 'Bahan katun \r\nukuran : S M L XL', '1068203768_erigoFlanel.jpeg', '', '', '2023-01-13 12:15:43'),
(74, 'Erigo', 'Short Shirt Quincy', 'men', 110000, 100, 'Bahan Katun\r\nS,M,L,XL,XXL', '588762940_shortshirt1.jpeg', '1971482948_shortshirt2.jpeg', '446997833_shortshirt3.jpeg', '2023-01-13 12:18:01'),
(75, 'Erigo', 'Short Shirt Gribson', 'men', 117000, 100, 'Katun\r\nS,M,L,XL,XXL', '460183631_gribson1.jpeg', '500765342_gribson2.jpeg', '1247563141_gribson3.jpeg', '2023-01-13 13:47:12'),
(76, 'H&M', 'Twill Overshirt', 'men', 250000, 50, 'Katun\r\nS,M,L,XL,XXL', '1315135227_handmover1.jpeg', '32343992_handmover2.jpeg', '', '2023-01-13 13:48:06'),
(77, 'Russ Co', 'Poloshirt Rugby', 'men', 225000, 50, 'Katun\r\nS,M,L,XL,XXL', '963498838_poloshirt1.jpeg', '1631856416_poloshirt2.jpeg', '', '2023-01-13 13:48:55'),
(78, 'BerryBenka', 'Blouse Wanita', 'women', 165000, 100, 'Katun\r\nS,M,L,XL,XXL', '2135912402_blouse1.jpeg', '1640324168_blouse2.jpeg', '', '2023-01-13 13:49:39'),
(79, 'This is April', 'Sweater Knit Stripped', 'women', 195000, 100, 'Katun\r\nS,M,L,XL,XXL', '1820246706_sweater1.jpeg', '1756025642_sweater2.jpeg', '', '2023-01-13 13:50:16'),
(80, 'JakartaVibes', 'T-Shirt Polos', 'men', 90000, 100, 'baju untuk laki laki ', '981117243_shortshirt1.jpeg', '529504923_shortshirt2.jpeg', '52627516_gribson2.jpeg', '2023-01-13 14:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phone_number` bigint(13) NOT NULL,
  `address` varchar(256) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `password`, `phone_number`, `address`, `create_at`, `unique_id`) VALUES
(72, '', 'haikal@gmail.com', 'fikri haikal', 'kTGtvE5bEj6weLf+K+gX/eTxdUc1ZmViM2RiZjMx', 812345678910, 'kavling taman wisata', '2022-06-10 00:49:55', '5feb3dbf31'),
(74, '', 'dhoni@gmail.com', 'Dhoni', 'MKLkSyjv7toMDD/6wc/ddVAMuYwyOTlhMzhhOTlk', 3724848, 'Jl.Kenangan', '2023-01-13 10:23:36', '299a38a99d'),
(75, '', 'abil@gmail.com', 'Abil Romadhon', '123', 8382842, 'Jl.Banjir', '2023-01-13 13:14:21', ''),
(76, '', 'testdpw@gmail.com', 'TestDpw', 'iwEB5c6F3DdG8SXkYzZhQsMYgZ00ZGExMDdjMzMx', 4536536, 'Jl,Test', '2023-01-13 14:29:44', '4da107c331'),
(77, '', 'test9@gmail.com', 'Test Akhir', '123', 8382842, 'Jl.Banjir', '2023-01-13 14:33:46', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_chart`
--
ALTER TABLE `customer_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_chart`
--
ALTER TABLE `customer_chart`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
