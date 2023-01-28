-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 09:03 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_satria`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `foto_user` text NOT NULL,
  `hak_akses` enum('admin','karyawan','user') NOT NULL DEFAULT 'karyawan',
  `ket_posisi` varchar(20) DEFAULT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `alamat_alternatif` text NOT NULL,
  `no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('plth','no','yes','adm') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `username`, `password`, `nama_alternatif`, `foto_user`, `hak_akses`, `ket_posisi`, `tempat_lahir`, `tanggal_lahir`, `alamat_alternatif`, `no`, `email`, `status`) VALUES
('1', 'admin', 'admin', 'Satria Primatama', '', 'admin', NULL, '', '2021-10-13', 'Bekasi Utara', '', '', 'no'),
('2', 'admin2', 'admin2', 'Muhammad Agus Wijiantoro', '', 'admin', NULL, '', '1977-08-14', 'Bekasi', '', '', 'no'),
('2101', 'arsan1', '12345', 'Syarifudin Arsan', '', 'karyawan', 'Manajer pemasaran', '', '1998-10-12', 'Bekasi', '', '', 'no'),
('2102', 'abdul123', 'abdul', 'Abdul Hakim', '', 'karyawan', 'Ob', '', '1997-10-29', 'Bekasi', '', '', 'no'),
('2103', 'nur123', 'nur123', 'Nurhidayati', '', 'karyawan', 'Penjaga tiket', '', '1998-02-16', 'Bekasi', '', '', 'no'),
('2104', 'dewsap', 'dewi123', 'Dewi Saputri', '', 'karyawan', 'Penjaga tiket', '', '1999-07-15', 'Bekasi', '', '', 'no'),
('2105', 'adi123', 'adi123', 'Adi Firmansyah', '', 'karyawan', 'Tour guide', '', '1998-09-10', 'Bekasi', '', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot`, `jenis`) VALUES
('1', 'Tes Kpribadian', 5, 'cost'),
('2', 'Kreatifitas', 4, 'benefit'),
('3', 'Attitude', 3, 'benefit'),
('4', 'Pendidikan', 4, 'benefit'),
('5', 'Bekerja Dalam Team', 3, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(5) NOT NULL,
  `kode_kriteria` varchar(20) NOT NULL,
  `kode_alternatif` varchar(20) NOT NULL,
  `nilai1` varchar(20) NOT NULL,
  `nilai2` varchar(20) NOT NULL,
  `nilai3` varchar(20) NOT NULL,
  `nilai4` varchar(20) NOT NULL,
  `nilai5` varchar(20) NOT NULL,
  `rata2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `kode_kriteria`, `kode_alternatif`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`, `rata2`) VALUES
(15, '5', '2101', '5', '5', '1', '5', '5', '4.2'),
(16, '2', '2101', '5', '5', '5', '1', '5', '4.2'),
(17, '3', '2101', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_relasi`
--

CREATE TABLE `tb_relasi` (
  `ID` int(11) NOT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_relasi`
--

INSERT INTO `tb_relasi` (`ID`, `kode_alternatif`, `kode_kriteria`, `nilai`) VALUES
(188, '2104', '5', 5),
(187, '2104', '4', 4),
(148, '2101', '5', 4.2),
(147, '2101', '4', 4),
(146, '2101', '3', 1),
(145, '2101', '2', 4.2),
(144, '2101', '1', 3),
(186, '2104', '3', 3),
(185, '2104', '2', 4),
(184, '2104', '1', 3),
(183, '2103', '5', 91.666666666667),
(182, '2103', '4', 4),
(181, '2103', '3', 87.666666666667),
(180, '2103', '2', 3),
(179, '2103', '1', 3),
(178, '2102', '5', 5),
(177, '2102', '4', 3),
(176, '2102', '3', 3),
(175, '2102', '2', 5),
(174, '2102', '1', 3),
(217, '2105', '4', 4),
(215, '2105', '2', 4),
(218, '2105', '5', 3),
(216, '2105', '3', 4),
(214, '2105', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkriteria`
--

CREATE TABLE `tb_subkriteria` (
  `id_subkriteria` int(5) NOT NULL,
  `kode_kriteria` int(5) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `nilai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subkriteria`
--

INSERT INTO `tb_subkriteria` (`id_subkriteria`, `kode_kriteria`, `nama_subkriteria`, `nilai`) VALUES
(1, 1, 'Jauh', 1),
(2, 1, 'Lumayan Jauh', 2),
(4, 1, 'Dekat', 3),
(5, 1, 'Cukup Dekat', 4),
(6, 1, 'Sangat Dekat', 5),
(17, 4, 'TK/RA', 1),
(18, 4, 'SD/MI', 2),
(19, 4, 'SMP/MTS', 3),
(20, 4, 'SMA/SMK/MA', 4),
(21, 4, 'Perguruan Tinggi', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_syarat`
--

CREATE TABLE `tb_syarat` (
  `id_syarat` int(5) NOT NULL,
  `nama_posisi` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL,
  `gaji` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_syarat`
--

INSERT INTO `tb_syarat` (`id_syarat`, `nama_posisi`, `Keterangan`, `gaji`) VALUES
(1, 'Manajer pemasaran', 'Apayah', '5000000'),
(2, 'Ob', 'Apayah', '2000000'),
(3, 'Penjaga tiket', 'Apayah', '3500000'),
(4, 'Tour guide', 'Apayah', '3250000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_relasi`
--
ALTER TABLE `tb_relasi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `kode_alternatif` (`kode_alternatif`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indexes for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indexes for table `tb_syarat`
--
ALTER TABLE `tb_syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_relasi`
--
ALTER TABLE `tb_relasi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  MODIFY `id_subkriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_syarat`
--
ALTER TABLE `tb_syarat`
  MODIFY `id_syarat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
