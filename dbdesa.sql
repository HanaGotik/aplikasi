-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2016 at 07:40 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbdesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desa`
--

CREATE TABLE IF NOT EXISTS `tbl_desa` (
  `id_desa` int(3) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `daerah` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_desa`
--

INSERT INTO `tbl_desa` (`id_desa`, `nama_desa`, `daerah`) VALUES
(1, 'Kampung Baru', 'Kampung Baru'),
(2, 'Sumber Mulia', 'Sumber Mulia'),
(3, 'Tampang', 'Tampang'),
(4, 'Sarang Halang', 'Sarang Halang'),
(5, 'Bumi Jaya', 'Bumi Jaya'),
(6, 'Atu-Atu', 'Atu-Atu'),
(7, 'Angsau', 'Angsau'),
(8, 'Pelaihari', 'Pelaihari'),
(9, 'Karang Taruna', 'Karang Taruna'),
(10, 'Telaga', 'Telaga'),
(11, 'Guntung Besar', 'Guntung Besar'),
(12, 'Panjaratan', 'Panjaratan'),
(13, 'Tungkaran', 'Tungkaran'),
(14, 'Panggung', 'Panggung'),
(15, 'Pabahanan', 'Pabahanan'),
(16, 'Ambungan', 'Ambungan'),
(17, 'Panggung Baru', 'Panggung Baru'),
(18, 'Ujung Batu', 'Ujung Batu'),
(19, 'Pemuda', 'Pemuda'),
(20, 'sungai riam', 'sungai riam'),
(21, 'Karang Jawa', 'Karang Jawa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_informasi`
--

CREATE TABLE IF NOT EXISTS `tbl_informasi` (
  `id` int(20) NOT NULL,
  `id_info` int(30) NOT NULL,
  `id_desa` int(30) NOT NULL,
  `nama_kades` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `fasilitas` text NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `lat` double NOT NULL,
  `lang` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id`, `id_info`, `id_desa`, `nama_kades`, `alamat`, `keterangan`, `fasilitas`, `jenis`, `lat`, `lang`) VALUES
(4, 1, 4, '', 'Jl. sarang halang', '', 'Masjid Jami Sarang Halang', 'Masjid', -3.81089, 114.779),
(8, 5, 2, '', 'Jl.Sumber Mulia', '', 'Balai Penyuluhan Pertanian desa Sumber Mulia', 'Balai Penyuluhan', -3.87862, 114.79031),
(9, 6, 2, '', 'Jl. Sumber mulia', '', 'Lembaga Simpan Pinjam Sumber Mulia', 'Simpan Pinjam', -3.88136, 114.79259),
(10, 7, 2, '', '', '', 'Knator Balai Desa Sumber Mulia', 'Balai Desa', -3.88158, 114.79224),
(11, 8, 2, '', 'Jl. Sumber Mulia', '', 'Pamsimas Desa Sumber Mulia', 'Penyedia Air Bersih', -3.88169, 114.79206),
(12, 9, 2, '', '', '', 'Masjid Sumber Mulia', 'Masjid', -3.88135, 114.79264),
(13, 10, 5, '', '', '', 'Balai Desa Bumi Jaya', 'Balai Desa', -3.82736, 114.7991),
(15, 12, 16, '', '', '', 'Masjid Desa Telaga', 'Masjid', -3.82083, 114.72396),
(16, 13, 10, '', '', '', 'Masjid Jami Desa Telaga', 'Masjid', -3.82083, 114.72396),
(19, 15, 21, '', 'Jl. Karang Jawa', '', 'Masjid Jami Karang Jawa', 'Masjid', -3.80988, 114.76376),
(20, 16, 9, '', '', '', 'Masjid Jami Karang Taruna', 'Balai Desa', -3.80883, 114.76244),
(21, 17, 20, '', '', '', 'Kantor Balai Desa Sungai Riam', 'Balai Desa', -3.85994, 114.74274),
(22, 18, 1, '', '', '', 'Kantor Balai Desa Kampung Baru', 'Balai Desa', -3.85682, 114.74491),
(23, 19, 8, '', 'Jl. Taqwa', '', 'Masjid Syuhada Pelaihari', 'Masjid', -3.80014, 114.76446),
(24, 19, 8, '', '', '', 'Masjid Al -Manar Pelaihari', 'Masjid', -3.80106, 114.77283),
(25, 20, 7, '', '', '', 'Kantor Lurah Angsau', 'Balai Desa', -3.79993, 114.77735),
(26, 21, 12, '', '', '', 'Kantor Balai Desa Panjaratan', 'Balai Desa', -3.77772, 114.69266),
(27, 22, 12, '', '', '', '', 'Penyedia Air Bersih', -3.77981, 114.69544),
(28, 23, 12, '', '', '', 'Masjid Jami Panjaratan', 'Masjid', -3.77705, 114.69198),
(29, 24, 13, '', '', '', '', 'Masjid', -3.76761, 114.6967),
(30, 25, 13, '', '', '', '', 'Simpan Pinjam', -3.76612, 114.69573),
(31, 26, 13, '', '', '', 'Kantor Balai Desa Tungkaran', 'Balai Desa', -3.76615, 114.69556),
(32, 26, 15, '', '', '', '', 'Balai Penyuluhan', -3.77652, 114.77465),
(33, 27, 18, 'Hidayat Noor', 'jl. a.yani', 'jumlah penduduk 2048', 'Kantor Desa Panggung', 'Balai Desa', -3.74576, 114.69471),
(34, 27, 18, 'Hidayat Noor', 'jl. a.yani', 'jumlah penduduk 2048', 'Kantor Desa Panggung', 'Masjid', -3.74576, 114.69471),
(35, 28, 17, 'Baharudin', 'jln. A yani panggung', 'jumlah penduduk 1702', 'balai Desa panggung', 'Balai Desa', -3.75547, 114.76648),
(37, 30, 19, '', '', '', '', 'Masjid', -3.76338, 114.77769),
(38, 31, 19, '', '', '', '', 'Simpan Pinjam', -3.76333, 114.77693),
(45, 28, 14, '', 'jl.panggung baru', '', 'TPA Ar-rahman', 'TPA', -3.7575460658320994, 114.76884841918945),
(46, 10, 5, '', 'jl.Bumi jaya', '', 'air bersih Pansimas 2014', 'Penyedia Air Bersih', -3.8204080831949407, 114.8012924194336),
(52, 10, 5, '', 'jl.Desa Bumi jaya', '', 'Masjid An-nur', 'Masjid', -3.822634, 114.80318),
(53, 10, 5, '', 'JL. Ds.Bumi jaya', '', 'TPA An-nur', 'TPA', -3.82075, 114.796485),
(54, 50, 10, 'jhfduhfdu', 'jfidsis', 'jumlah penduduk 2000', 'balai desa', 'Balai Desa', -3.768804573353566, 114.78858947805793);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`user_id`, `username`, `password`, `email`, `fullname`, `agama`, `no_hp`) VALUES
(1, 'admin', 'admin', 'Mayrida@yahoo.co.id', 'mayrida', 'Islam', '3829'),
(2, 'admin', '12345', 'raudatulmunawarah@yahoo.co.id', 'raudatul ', 'Islam', '082254416642');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_informasi`
--
CREATE TABLE IF NOT EXISTS `view_informasi` (
`id_info` int(30)
,`nama_desa` varchar(50)
,`nama_kades` varchar(100)
,`alamat` text
,`fasilitas` text
,`keterangan` text
,`jenis` varchar(30)
,`lat` double
,`lang` double
);

-- --------------------------------------------------------

--
-- Structure for view `view_informasi`
--
DROP TABLE IF EXISTS `view_informasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_informasi` AS select `info`.`id_info` AS `id_info`,`tbl_desa`.`nama_desa` AS `nama_desa`,`info`.`nama_kades` AS `nama_kades`,`info`.`alamat` AS `alamat`,`info`.`fasilitas` AS `fasilitas`,`info`.`keterangan` AS `keterangan`,`info`.`jenis` AS `jenis`,`info`.`lat` AS `lat`,`info`.`lang` AS `lang` from (`tbl_informasi` `info` join `tbl_desa`) where (`info`.`id_desa` = `tbl_desa`.`id_desa`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id_desa` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
