-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 02:29 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warungkuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_fotomenu`
--

CREATE TABLE `tb_fotomenu` (
  `id_fotomenu` char(11) NOT NULL,
  `foto_warung` mediumblob NOT NULL,
  `id_warung` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_fotowarung`
--

CREATE TABLE `tb_fotowarung` (
  `id_fotowarung` char(7) NOT NULL,
  `foto_warung` mediumblob NOT NULL,
  `id_warung` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_comment_user`
--

CREATE TABLE `tb_log_comment_user` (
  `id_log_komen_user` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_warung` char(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_makanan` char(4) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  `id_warung` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_warung` char(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tag`
--

CREATE TABLE `tb_tag` (
  `id_tag` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(5) NOT NULL,
  `username` char(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(20) NOT NULL,
  `hak` enum('admin','registered') NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `email`, `password`, `hak`, `alamat`, `foto`) VALUES
(1, 'Budi', 'vanda10.dava@gmail.com', '12345', 'registered', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_warung`
--

CREATE TABLE `tb_warung` (
  `id_warung` char(11) NOT NULL,
  `nama_warung` varchar(50) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `foto` mediumblob DEFAULT NULL,
  `id_user` int(5) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_fotomenu`
--
ALTER TABLE `tb_fotomenu`
  ADD PRIMARY KEY (`id_fotomenu`),
  ADD KEY `id_warung` (`id_warung`);

--
-- Indexes for table `tb_fotowarung`
--
ALTER TABLE `tb_fotowarung`
  ADD PRIMARY KEY (`id_fotowarung`),
  ADD KEY `id_warung` (`id_warung`);

--
-- Indexes for table `tb_log_comment_user`
--
ALTER TABLE `tb_log_comment_user`
  ADD PRIMARY KEY (`id_log_komen_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_warung` (`id_warung`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_makanan`),
  ADD KEY `id_warung` (`id_warung`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD KEY `id_warung` (`id_warung`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_tag`
--
ALTER TABLE `tb_tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_warung`
--
ALTER TABLE `tb_warung`
  ADD PRIMARY KEY (`id_warung`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_log_comment_user`
--
ALTER TABLE `tb_log_comment_user`
  MODIFY `id_log_komen_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tag`
--
ALTER TABLE `tb_tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_fotomenu`
--
ALTER TABLE `tb_fotomenu`
  ADD CONSTRAINT `tb_fotomenu_ibfk_1` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_fotowarung`
--
ALTER TABLE `tb_fotowarung`
  ADD CONSTRAINT `tb_fotowarung_ibfk_1` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_log_comment_user`
--
ALTER TABLE `tb_log_comment_user`
  ADD CONSTRAINT `tb_log_comment_user_ibfk_2` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_log_comment_user_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD CONSTRAINT `tb_menu_ibfk_1` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_menu_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tb_tag` (`id_tag`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_ibfk_2` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rating_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_warung`
--
ALTER TABLE `tb_warung`
  ADD CONSTRAINT `tb_warung_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
