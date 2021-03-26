-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 01:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wad_modul4`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `nama_barang`, `harga`) VALUES
(10, 1, 'AXIS-Y - Complete No-Stress Physical Sunscreen 50ml', 239000),
(13, 1, 'Hada labo Tamagohada Face Wash 100gr', 55000),
(14, 1, 'AXIS-Y - Complete No-Stress Physical Sunscreen 50ml', 239000),
(15, 1, 'AXIS-Y - Complete No-Stress Physical Sunscreen 50ml', 239000),
(16, 4, 'Hada labo Tamagohada Face Wash 100gr', 55000),
(17, 4, 'AXIS-Y - Complete No-Stress Physical Sunscreen 50ml', 239000),
(21, 5, 'AXIS-Y - Complete No-Stress Physical Sunscreen 50ml', 239000),
(22, 5, 'The Body Shop - Tea Tree Mattifying Lotion 50ml', 209000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` bigint(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `no_hp`, `password`) VALUES
(1, 'milenia', 'mileniaari24@gmail.com', 82219738268, '$2y$10$kMhdEr5eF7fg2uEPthlbxOSO6PaarCmx2XSdcpwbCyAYjkzuSN346'),
(2, 'Nama', 'mileniaari@gmail.com', 2343454, '$2y$10$6E7D7aeqzQPfbTdPXAPrwe9Q0DfHZVxxtOEz.DSu84BuPxjRGzKo.'),
(3, 'milen', 'milenia@gmail.com', 123, '$2y$10$w7ubrLrNyzDFtIdjB7.klu1Pd3Zc83He3D7Rflcbm.B/MIHISwU9q'),
(4, 'Milenia Ari Oktaviana', '123@gmail.com', 1234567890, '$2y$10$GRFVKB/ZzHAXHyqBgA38Fup41VLH5OnaIDzH3o/JIO/zbQJIvGkYq'),
(5, '', '', 0, '$2y$10$9l/mmr0DHrIvGmqqFM5aku8PN9mBtZBAk45rW/ifzc6u3t5jk6Lea'),
(6, '', '', 0, '$2y$10$CUuqM6cjxTapwCcgllk9g.IHPvSb2FuUlpUk4guLFQcSCksVkQ8zq'),
(7, '', '', 0, '$2y$10$X8t0YE8JiTs97Ao27mOimuVZPHSshF2YpT3vTbpbxUVwjW0ttex1a'),
(8, '', '', 0, '$2y$10$5h4rkENJpgAo8GBtye4t5uimwNqD0xQx..D9/7/0Pa9.LhdrgitXK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;