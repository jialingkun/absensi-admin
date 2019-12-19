-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 09:25 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6084323_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `filename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scanlog`
--

CREATE TABLE `scanlog` (
  `sn` int(11) DEFAULT NULL,
  `scan_date` datetime NOT NULL,
  `pin` int(11) NOT NULL,
  `verifymode` int(11) DEFAULT NULL,
  `iomode` int(11) DEFAULT NULL,
  `workcode` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `pin` int(11) NOT NULL,
  `nama` varchar(6) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `rfid` varchar(0) DEFAULT NULL,
  `privilege` int(11) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT '-',
  `tanggal_lahir` date DEFAULT '2000-01-01',
  `alamat` varchar(255) DEFAULT '-',
  `tlp1` varchar(15) DEFAULT '-',
  `tlp2` varchar(15) DEFAULT '-',
  `wa` varchar(15) DEFAULT '-',
  `email` varchar(255) DEFAULT '-',
  `kategori` varchar(25) DEFAULT '-',
  `check_all` varchar(1) DEFAULT '0',
  `pujabakti` varchar(1) DEFAULT '0',
  `meditasi` varchar(1) DEFAULT '0',
  `dana_makan` varchar(1) DEFAULT '0',
  `baksos` varchar(1) DEFAULT '0',
  `fung_shen` varchar(1) DEFAULT '0',
  `sunskul` varchar(1) DEFAULT '0',
  `bursa` varchar(1) DEFAULT '0',
  `keakraban` varchar(1) DEFAULT '0',
  `pelayanan_umat` varchar(1) DEFAULT '0',
  `donasi` varchar(1) DEFAULT '0',
  `seminar` varchar(1) DEFAULT '0',
  `kelas_dhamma` varchar(1) DEFAULT '0',
  `jenis_kendaraan` varchar(50) DEFAULT '-',
  `no_kendaraan` varchar(50) DEFAULT '-',
  `status` varchar(1) DEFAULT '0',
  `tempat_lahir` varchar(99) DEFAULT '-',
  `goldar` varchar(3) DEFAULT NULL,
  `nama_buddhist` varchar(99) DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scanlog`
--
ALTER TABLE `scanlog`
  ADD PRIMARY KEY (`scan_date`,`pin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
