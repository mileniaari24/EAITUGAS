-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 01:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugaseai`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `bukalapak_image` varchar(60) NOT NULL,
  `bukalapak_url` varchar(144) DEFAULT NULL,
  `bukalapak_harga1` varchar(12) DEFAULT NULL,
  `bukalapak_namaproduk1` varchar(56) DEFAULT NULL,
  `bukalapak_namaproduk1_url` varchar(144) DEFAULT NULL,
  `samsung_image` varchar(127) DEFAULT NULL,
  `samsung_url` varchar(83) DEFAULT NULL,
  `samsung_harga` varchar(12) DEFAULT NULL,
  `samsung_harga_url` varchar(83) DEFAULT NULL,
  `samsung_namaproduk` varchar(36) DEFAULT NULL,
  `samsung_namaproduk_url` varchar(83) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`bukalapak_image`, `bukalapak_url`, `bukalapak_harga1`, `bukalapak_namaproduk1`, `bukalapak_namaproduk1_url`, `samsung_image`, `samsung_url`, `samsung_harga`, `samsung_harga_url`, `samsung_namaproduk`, `samsung_namaproduk_url`) VALUES
('https://s0.bukalapak.com/img/05203252972/s-330-330/data.jpeg', 'https://www.bukalapak.com/p/handphone/hp-smartphone/1qnqc0i-jual-samsung-s9-plus-64gb-second-fullset-lengkap?from=list-product&pos=1', 'Rp3.696.000', 'Samsung S9 Plus 64gb second fullset lengkap', 'https://www.bukalapak.com/p/handphone/hp-smartphone/1qnqc0i-jual-samsung-s9-plus-64gb-second-fullset-lengkap?from=list-product&pos=1', 'https://id.360buyimg.com/Indonesia/s220x220_/amZzL3Q0OS8zMDYvNDA5NjAwOTcwNC82NDg0Mi8zMTc2ZmVjMy81ZmY0MjQzOE4xMjM4ZTc0OA.jpg.dpg', 'https://www.jd.id/product/samsung-galaxy-a12-6-128gb-black_624252218/624252219.html', 'Rp 2,649,000', 'https://www.jd.id/product/samsung-galaxy-a12-6-128gb-black_624252218/624252219.html', 'SAMSUNG Galaxy A12 [6/128GB] - Black', 'https://www.jd.id/product/samsung-galaxy-a12-6-128gb-black_624252218/624252219.html'),
('https://s0.bukalapak.com/img/51022252972/s-330-330/data.jpeg', 'https://www.bukalapak.com/p/handphone/hp-smartphone/39kygx5-jual-samsung-s9-64gb-second-fullset-mulus?from=list-product&pos=2', 'Rp2.996.000', 'Samsung s9 64gb second fullset mulus', 'https://www.bukalapak.com/p/handphone/hp-smartphone/39kygx5-jual-samsung-s9-64gb-second-fullset-mulus?from=list-product&pos=2', 'https://id.360buyimg.com/Indonesia/s220x220_/amZzL3Q3OS83MS80MTQwMDQyNDAyLzIxODA5LzUxYjU4MTQ5LzYwNTQ4MDZiTjAyNGZiNGJk.jpg.dpg', 'https://www.jd.id/product/samsung-galaxy-a12-4-128gb-black_624250375/624250376.html', 'Rp 2,249,000', 'https://www.jd.id/product/samsung-galaxy-a12-4-128gb-black_624250375/624250376.html', 'SAMSUNG Galaxy A12 [4/128GB] - Black', 'https://www.jd.id/product/samsung-galaxy-a12-4-128gb-black_624250375/624250376.html'),
('https://s1.bukalapak.com/img/11764029682/s-330-330/data.jpeg', 'https://www.bukalapak.com/p/handphone/hp-smartphone/43buieq-jual-samsung-galaxy-note-20-ultra-5g-8gb-256gb-second?from=list-product&pos=0', 'Rp12.800.000', 'Samsung Galaxy Note 20 Ultra - 5G - 8GB - 256GB - SECOND', 'https://www.bukalapak.com/p/handphone/hp-smartphone/43buieq-jual-samsung-galaxy-note-20-ultra-5g-8gb-256gb-second?from=list-product&pos=0', 'https://id.360buyimg.com/Indonesia/s220x220_/amZzL3Q3My80MS8zNDUyNjYzMTM3LzcwOTY5Lzk4NDIzZjA1LzYwMmUzNTc5TjI0ZGVlZmY5.jpg.dpg', 'https://www.jd.id/product/samsung-led-tv-32-inch-hd-32n4001_11134101/102533630.html', 'Rp 2,399,000', 'https://www.jd.id/product/samsung-led-tv-32-inch-hd-32n4001_11134101/102533630.html', 'SAMSUNG LED TV 32 Inch HD - 32N4001', 'https://www.jd.id/product/samsung-led-tv-32-inch-hd-32n4001_11134101/102533630.html'),
('https://s2.bukalapak.com/img/23554061962/s-330-330/data.jpeg', 'https://www.bukalapak.com/p/handphone/hp-smartphone/30gqo2n-jual-samsung-galaxy-m31-garansi-resmi-samsung-indonesia-sein?from=list-product&pos=3', 'Rp3.175.000', 'samsung galaxy M31 garansi resmi samsung indonesia sein', 'https://www.bukalapak.com/p/handphone/hp-smartphone/30gqo2n-jual-samsung-galaxy-m31-garansi-resmi-samsung-indonesia-sein?from=list-product&pos=3', 'https://id.360buyimg.com/Indonesia/s220x220_/amZzL3QxOS8zNjIvNDY0Njc2ODg2MS82NDg0Mi8zMTc2ZmVjMy81ZmY0MjFiZk44OTE5MmUzMQ.jpg.dpg', 'https://www.jd.id/product/samsung-galaxy-a12-4-128gb-black_624632563/624632564.html', 'Rp 2,349,000', 'https://www.jd.id/product/samsung-galaxy-a12-4-128gb-black_624632563/624632564.html', 'SAMSUNG Galaxy A12 [4/128GB] - Black', 'https://www.jd.id/product/samsung-galaxy-a12-4-128gb-black_624632563/624632564.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`bukalapak_image`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
