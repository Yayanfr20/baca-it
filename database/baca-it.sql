-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 02:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baca-it`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$meVnSZ5EwZAMMeQKCdZjeOzpQwPgSw4C0bvECCwNAMUNNd5EpqXB2'),
(7, 'yayan', '$2y$10$eRCo5uOR.ObmAKLoyWw26eBtDTcZLHdcEvsELZ7hCqOG9bZ5gVpuO'),
(9, 'ferlan ferlani', '$2y$10$eP.NLn4LUOYq80CBkf3zsuhvvON/WWYA9YBUmReFWj1sMPCxFRPoy');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE `chat_users` (
  `id` int(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pesan` varchar(999) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `tgl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`id`, `nama`, `email`, `pesan`, `waktu`, `tgl`) VALUES
(33, 'Ferlan Ferlani', 'ferlanferlani.id@gmail.com', 'satu dua tiga empat lima enam tujuh delapan sembilan sepuluh sebelas dua belas tiga belas empat belas lima belas enam belas tujuh belas delapan belas sembilan belas duapuluh', '06:16 AM', 'Thursday, 28-07-2022');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `id` int(11) NOT NULL,
  `judul` varchar(99) NOT NULL,
  `deskripsi` varchar(999) NOT NULL,
  `pdf` varchar(999) NOT NULL,
  `cover` varchar(200) NOT NULL,
  `tglupload` varchar(50) NOT NULL,
  `admin_file_upload` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`id`, `judul`, `deskripsi`, `pdf`, `cover`, `tglupload`, `admin_file_upload`) VALUES
(37, 'Pramuka', 'tentang pembelajaran semaphore\r\n', '62e50f327676d.pdf', '62e50f3277af5.png', 'Saturday, 30-07-2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `multi_user`
--

CREATE TABLE `multi_user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('admin','users') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multi_user`
--

INSERT INTO `multi_user` (`id`, `username`, `password`, `level`) VALUES
(3, 'admin', '$2y$10$meVnSZ5EwZAMMeQKCdZjeOzpQwPgSw4C0bvECCwNAMUNNd5EpqXB2', 'admin'),
(9, 'yayan', '$2y$10$eRCo5uOR.ObmAKLoyWw26eBtDTcZLHdcEvsELZ7hCqOG9bZ5gVpuO', 'admin'),
(11, 'ferlan ferlani', '$2y$10$eP.NLn4LUOYq80CBkf3zsuhvvON/WWYA9YBUmReFWj1sMPCxFRPoy', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_users`
--
ALTER TABLE `chat_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_user`
--
ALTER TABLE `multi_user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chat_users`
--
ALTER TABLE `chat_users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `multi_user`
--
ALTER TABLE `multi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
