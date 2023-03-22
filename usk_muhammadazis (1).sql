-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 03:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usk_muhammadazis`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `f_id` int(11) NOT NULL,
  `f_nama` varchar(200) NOT NULL,
  `f_username` varchar(200) NOT NULL,
  `f_password` varchar(200) NOT NULL,
  `f_level` enum('Admin','Pustakawan') NOT NULL,
  `f_status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`f_id`, `f_nama`, `f_username`, `f_password`, `f_level`, `f_status`) VALUES
(11, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', 'Aktif'),
(13, 'pustakawan', 'pustakawan', '202cb962ac59075b964b07152d234b70', 'Pustakawan', 'Aktif'),
(14, 'azis', 'azis', '202cb962ac59075b964b07152d234b70', 'Admin', 'Aktif'),
(32, 'ali', 'ali', '202cb962ac59075b964b07152d234b70', 'Pustakawan', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota`
--

CREATE TABLE `t_anggota` (
  `f_id` int(11) NOT NULL,
  `f_nama` varchar(200) NOT NULL,
  `f_username` varchar(200) NOT NULL,
  `f_password` varchar(200) NOT NULL,
  `f_tempatlahir` varchar(100) NOT NULL,
  `f_tanggallahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_anggota`
--

INSERT INTO `t_anggota` (`f_id`, `f_nama`, `f_username`, `f_password`, `f_tempatlahir`, `f_tanggallahir`) VALUES
(19, 'adi', 'adi', '202cb962ac59075b964b07152d234b70', 'medan', '2022-11-30'),
(20, 'azis', 'azis', '202cb962ac59075b964b07152d234b70', 'jakarta', '2004-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `t_buku`
--

CREATE TABLE `t_buku` (
  `f_id` int(11) NOT NULL,
  `f_idkategori` int(11) NOT NULL,
  `f_judul` varchar(200) NOT NULL,
  `f_pengarang` varchar(200) NOT NULL,
  `f_penerbit` varchar(200) NOT NULL,
  `f_deskripsi` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_buku`
--

INSERT INTO `t_buku` (`f_id`, `f_idkategori`, `f_judul`, `f_pengarang`, `f_penerbit`, `f_deskripsi`) VALUES
(17, 14, 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Gramedia', 'Ini adalah kisah 2 anak manusia yang meramu cinta di atas pentas pergelutan tanah kolonial awal abad 20'),
(18, 14, 'Koala Kumal', 'Raditya Dika', 'Gramedia', 'Novel Koala Kumal ini adalah menceritakan cerita kehidupan penulis yaitu Raditya Dika sendiri yang tulisannya dikemas dengan tema komedi dan ini cerita nyata dari kehidupannya yang absurd.'),
(19, 15, 'Ensiklopedia Sejarah Nasional dan Dunia', 'Retno Sasongkowati', 'Sirkulasi Majalah Gramedia', 'Sejarah nasional akan membahas dari manusia zaman purba, zaman hindu-budha, zaman islam, kedatangan dan ekspansi bangsa Eropa, zaman pergerakan nasional dan dunia'),
(20, 14, 'Hujan', 'Tere Liye', 'Gramedia', 'Ini adalah kisah dua anak manusia yang meramu cinta di atas pentas pergelutan tanah kolonial awal abad 20'),
(21, 16, 'Kamus Indonesia-Inggris', 'Aji Sasongko', 'Indoeduka', 'Kamus ini berisi 100000 kata Indonesia-Inggris'),
(22, 18, 'Akasha Record of Ragnarok 06 ', 'Aji Chika', 'PT. Gramedia Pustaka Utama', 'Jack the Ripper, sang penjahat terbesar umat manusia, akan melawan pahlawan tergigih, Heracles. Pertarungan epic mereka tentu tak terhindarkan, yaitu Pembunuh berantai terkejam vs Pahlawan dalam legenda!'),
(23, 16, 'Kamus Jepang-Indonesia', 'Christian', 'Indoeduka', 'Kamus ini berisi 100000 kata Indonesia-Jepang');

-- --------------------------------------------------------

--
-- Table structure for table `t_detailbuku`
--

CREATE TABLE `t_detailbuku` (
  `f_id` int(11) NOT NULL,
  `f_idbuku` int(11) NOT NULL,
  `f_status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_detailbuku`
--

INSERT INTO `t_detailbuku` (`f_id`, `f_idbuku`, `f_status`) VALUES
(165, 18, 'Tersedia'),
(166, 18, 'Tersedia'),
(167, 18, 'Tersedia'),
(168, 18, 'Tersedia'),
(169, 18, 'Tersedia'),
(170, 18, 'Tersedia'),
(171, 19, 'Tidak Tersedia'),
(172, 20, 'Tersedia'),
(173, 21, 'Tersedia'),
(174, 21, 'Tersedia'),
(175, 22, 'Tersedia'),
(176, 22, 'Tersedia'),
(177, 22, 'Tersedia'),
(178, 23, 'Tersedia'),
(179, 23, 'Tersedia'),
(182, 17, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `t_detailpeminjaman`
--

CREATE TABLE `t_detailpeminjaman` (
  `f_id` int(11) NOT NULL,
  `f_idpeminjaman` int(11) NOT NULL,
  `f_iddetailbuku` int(11) NOT NULL,
  `f_tanggalkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_detailpeminjaman`
--

INSERT INTO `t_detailpeminjaman` (`f_id`, `f_idpeminjaman`, `f_iddetailbuku`, `f_tanggalkembali`) VALUES
(29, 29, 165, '2023-02-27'),
(30, 30, 171, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `f_id` int(11) NOT NULL,
  `f_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`f_id`, `f_kategori`) VALUES
(14, 'Novel'),
(15, 'Ensiklopedia'),
(16, 'Kamus'),
(17, 'Majalah'),
(18, 'Komik');

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `f_id` int(11) NOT NULL,
  `f_idadmin` int(11) NOT NULL,
  `f_idanggota` int(11) NOT NULL,
  `f_tanggalpeminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_peminjaman`
--

INSERT INTO `t_peminjaman` (`f_id`, `f_idadmin`, `f_idanggota`, `f_tanggalpeminjaman`) VALUES
(29, 32, 19, '2023-03-15'),
(30, 11, 20, '2023-02-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_idkategori` (`f_idkategori`);

--
-- Indexes for table `t_detailbuku`
--
ALTER TABLE `t_detailbuku`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_idbuku` (`f_idbuku`);

--
-- Indexes for table `t_detailpeminjaman`
--
ALTER TABLE `t_detailpeminjaman`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_idpeminjaman` (`f_idpeminjaman`),
  ADD KEY `t_detailpeminjaman_ibfk_1` (`f_iddetailbuku`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_idadmin` (`f_idadmin`),
  ADD KEY `f_idanggota` (`f_idanggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `t_detailbuku`
--
ALTER TABLE `t_detailbuku`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `t_detailpeminjaman`
--
ALTER TABLE `t_detailpeminjaman`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD CONSTRAINT `t_buku_ibfk_1` FOREIGN KEY (`f_idkategori`) REFERENCES `t_kategori` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_detailbuku`
--
ALTER TABLE `t_detailbuku`
  ADD CONSTRAINT `t_detailbuku_ibfk_1` FOREIGN KEY (`f_idbuku`) REFERENCES `t_buku` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_detailpeminjaman`
--
ALTER TABLE `t_detailpeminjaman`
  ADD CONSTRAINT `t_detailpeminjaman_ibfk_1` FOREIGN KEY (`f_iddetailbuku`) REFERENCES `t_detailbuku` (`f_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_detailpeminjaman_ibfk_2` FOREIGN KEY (`f_idpeminjaman`) REFERENCES `t_peminjaman` (`f_id`) ON UPDATE CASCADE;

--
-- Constraints for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `t_peminjaman_ibfk_2` FOREIGN KEY (`f_idanggota`) REFERENCES `t_anggota` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_peminjaman_ibfk_3` FOREIGN KEY (`f_idadmin`) REFERENCES `t_admin` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
