-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 06:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(11) NOT NULL,
  `nameCategory` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `nameCategory`) VALUES
(2, 'Chụp X quang'),
(6, 'Tổng hợp'),
(7, 'khám răng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treatment_records`
--

CREATE TABLE `tbl_treatment_records` (
  `id_records` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `age` varchar(65) NOT NULL,
  `cmnd` varchar(65) NOT NULL,
  `phone` varchar(65) NOT NULL,
  `note` text NOT NULL,
  `date_create` varchar(10) DEFAULT NULL,
  `id_users` int(65) NOT NULL,
  `address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_treatment_records`
--

INSERT INTO `tbl_treatment_records` (`id_records`, `username`, `img`, `age`, `cmnd`, `phone`, `note`, `date_create`, `id_users`, `address`) VALUES
(26, 'Phankhoa', '1682135727_', '40', '12345678911', '0354606018', 'lolcoa', '2023-12-08', 0, ''),
(29, 'admin', '1682092939_', '21', '21365498723', '0354606018', 'chụp x quang', '2023-04-22', 0, ''),
(30, 'user', '1682096250_2022-04-26.png', '24', '2136498743', '0354606018', 'test', '2023-04-22', 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `repass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `username`, `email`, `pass`, `repass`) VALUES
(6, 'phong', 'phong@gmail.com ', '1', '1'),
(9, 'users', 'Kun@gmail.com', '1', '1'),
(10, 'phankhoa', 'khoa@gmail.com ', '1', '1'),
(11, 'dongdepzai', 'chodong@gmail.com', '1', '1'),
(14, 'admin', 'Kungfukid1002@gmail.com', '123', '123'),
(20, 'admin20', 'admin@gmail.com', '1', '1'),
(21, 'dong', 'dong@gmail.com', '1', '1'),
(22, 'occhodong', 'khang@gmail.com', '1', '1'),
(26, 'kungfukid1002', 'Kungfukid1002@gmail.com', '1', '1'),
(28, 'Kakakhoa123p', '123@gmail.com', '1', '1'),
(29, 'Phankhoa', 'khoa@gmail.com', '1', '1'),
(30, 'dongdepzai', 'chodong@gmail.com', '1', '1'),
(31, 'Phankhoa', '10@gmail.com', '1', '1'),
(32, 'admin10', 'Kungfukid1002@gmail.com', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tbl_treatment_records`
--
ALTER TABLE `tbl_treatment_records`
  ADD PRIMARY KEY (`id_records`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_treatment_records`
--
ALTER TABLE `tbl_treatment_records`
  MODIFY `id_records` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
