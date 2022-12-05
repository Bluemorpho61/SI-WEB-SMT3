-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 02:13 AM
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
-- Table structure for table `tb_deskripsi`
--

CREATE TABLE `tb_deskripsi` (
  `id_deskrpsi` int(11) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `id_warung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_deskripsi`
--

INSERT INTO `tb_deskripsi` (`id_deskrpsi`, `deskripsi`, `id_warung`) VALUES
(1, 'tes deskrpsi menu', 7),
(14, '\r\n            fefaawdwadacas    ', 7),
(17, 'srtsxrsxrsrydytd\r\n                ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_favorit`
--

CREATE TABLE `tb_favorit` (
  `id_favorit` int(11) NOT NULL,
  `id_warung` int(11) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_fotomenu`
--

CREATE TABLE `tb_fotomenu` (
  `id_fotomenu` int(7) NOT NULL,
  `foto_menu` varchar(256) NOT NULL,
  `id_deskrpsi` int(11) NOT NULL,
  `id_warung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fotomenu`
--

INSERT INTO `tb_fotomenu` (`id_fotomenu`, `foto_menu`, `id_deskrpsi`, `id_warung`) VALUES
(2, 'kue pukis keju.jpg', 1, 7),
(3, 'kue pukis keju.jpg', 1, 7),
(4, 'kue pukis keju.jpg', 1, 7),
(5, '2022-06-27.png', 14, 7),
(16, '2022-08-07.png', 17, 3),
(17, '2022-08-12.png', 17, 3),
(18, '2022-08-28.png', 17, 3),
(19, '2022-09-08.png', 17, 3),
(20, '2022-09-11.png', 17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_fotowarung`
--

CREATE TABLE `tb_fotowarung` (
  `id_fotowarung` int(7) NOT NULL,
  `foto_warung` varchar(256) NOT NULL,
  `id_warung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fotowarung`
--

INSERT INTO `tb_fotowarung` (`id_fotowarung`, `foto_warung`, `id_warung`) VALUES
(6, '2022-09-22.png', 7),
(20, '2022-09-08.png', 3),
(21, '2022-10-08.png', 7),
(22, '2022-09-22.png', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_comment_user`
--

CREATE TABLE `tb_log_comment_user` (
  `id_log_komen_user` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `komentar` mediumtext NOT NULL,
  `id_warung` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_log_comment_user`
--

INSERT INTO `tb_log_comment_user` (`id_log_komen_user`, `id_user`, `komentar`, `id_warung`, `waktu`) VALUES
(1, 14, 'fasdasda', 3, '2022-12-05 00:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_warung` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `waktu` datetime NOT NULL
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
  `foto` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `email`, `password`, `hak`, `alamat`, `foto`) VALUES
(9, 'Jamar', 'jamal99@gmail.com', '123456', 'admin', 'STB', '2022-09-08.png'),
(10, 'Mastur', 'mastur@gmail.com', '12345', 'registered', 'Mojokerto', '2022-09-11.png'),
(14, 'Imron', 'imrongeming@ymail.com', '123', 'registered', 'Jonggol', 'IMG-20221204-WA0000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_warung`
--

CREATE TABLE `tb_warung` (
  `id_warung` int(11) NOT NULL,
  `nama_warung` varchar(50) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `id_user` int(5) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_warung`
--

INSERT INTO `tb_warung` (`id_warung`, `nama_warung`, `alamat`, `deskripsi`, `foto`, `id_user`, `tanggal_ditambahkan`) VALUES
(3, 'Warung LGW', 'Jalan Sarijadi no.75', '', '', 9, '2022-11-24 18:48:05'),
(7, 'Lesehan Pak Dimas', 'Jalan Jawa No.68', 'Warung spesialis lalapan', '2022-08-05.png', 9, '2022-11-25 02:04:01'),
(9, 'Warung Mbok Darmi', 'Jl. Sudirman No.45', 'iijojoopj', '2022-11-21.png', 9, '2022-12-03 10:32:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_deskripsi`
--
ALTER TABLE `tb_deskripsi`
  ADD PRIMARY KEY (`id_deskrpsi`),
  ADD KEY `id_warung` (`id_warung`);

--
-- Indexes for table `tb_favorit`
--
ALTER TABLE `tb_favorit`
  ADD PRIMARY KEY (`id_favorit`),
  ADD KEY `id_warung` (`id_warung`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_fotomenu`
--
ALTER TABLE `tb_fotomenu`
  ADD PRIMARY KEY (`id_fotomenu`),
  ADD KEY `id_warung` (`id_warung`),
  ADD KEY `id_deskrpsi` (`id_deskrpsi`);

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
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD KEY `id_warung` (`id_warung`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT for table `tb_deskripsi`
--
ALTER TABLE `tb_deskripsi`
  MODIFY `id_deskrpsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_favorit`
--
ALTER TABLE `tb_favorit`
  MODIFY `id_favorit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_fotomenu`
--
ALTER TABLE `tb_fotomenu`
  MODIFY `id_fotomenu` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_fotowarung`
--
ALTER TABLE `tb_fotowarung`
  MODIFY `id_fotowarung` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_log_comment_user`
--
ALTER TABLE `tb_log_comment_user`
  MODIFY `id_log_komen_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_warung`
--
ALTER TABLE `tb_warung`
  MODIFY `id_warung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_deskripsi`
--
ALTER TABLE `tb_deskripsi`
  ADD CONSTRAINT `tb_deskripsi_ibfk_1` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_favorit`
--
ALTER TABLE `tb_favorit`
  ADD CONSTRAINT `tb_favorit_ibfk_1` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_favorit_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_fotomenu`
--
ALTER TABLE `tb_fotomenu`
  ADD CONSTRAINT `tb_fotomenu_ibfk_1` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_fotomenu_ibfk_2` FOREIGN KEY (`id_deskrpsi`) REFERENCES `tb_deskripsi` (`id_deskrpsi`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_fotowarung`
--
ALTER TABLE `tb_fotowarung`
  ADD CONSTRAINT `tb_fotowarung_ibfk_1` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_log_comment_user`
--
ALTER TABLE `tb_log_comment_user`
  ADD CONSTRAINT `tb_log_comment_user_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_log_comment_user_ibfk_4` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rating_ibfk_4` FOREIGN KEY (`id_warung`) REFERENCES `tb_warung` (`id_warung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_warung`
--
ALTER TABLE `tb_warung`
  ADD CONSTRAINT `tb_warung_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
