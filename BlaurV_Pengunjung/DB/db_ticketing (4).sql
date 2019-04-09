-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 11:42 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `hp`, `email`, `jk`, `status`, `username`, `password`, `level`) VALUES
('ADM00002', 'reno', '087877022228', 'reno@gmail.com', 'Laki - laki', 'AKTIF', 'reno', 'reno', 'Admin'),
('ADM00003', 'qwe', '087877022228', '', 'Laki - laki', 'AKTIF', 'qwe', 'qwe', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE IF NOT EXISTS `tb_customer` (
  `id_customer` varchar(10) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `id_admin`, `nama_lengkap`, `hp`, `email`, `username`, `password`, `level`) VALUES
('CS00001', 'ADM00002', 'Andri Hermawan', '087877022228', 'hermawanandry29@gmail.com', 'andri', 'andri', 'Customer'),
('CS00002', 'ADM00002', 'Pak Faruq', '085694978250', 'faruq@trilogi.ac.id', 'faruq', '1234', 'Customer'),
('CS00003', 'ADM00002', 'buluk', '1243456879857', 'maulana.eka9596@gmail.com', 'buluk', '123', 'Customer'),
('CS00004', 'ADM00002', 'indra', '087877022228', 'andrihermawan.andriher@gmail.com', 'indra', 'indra', 'Customer'),
('CS00005', 'ADM00002', 'koko', '083898713278', 'koko@gmail.com', 'KOKO99', 'Koko123', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_tribun`
--

CREATE TABLE IF NOT EXISTS `tb_kategori_tribun` (
  `id_tribun` varchar(10) NOT NULL,
  `id_tiket` varchar(10) NOT NULL,
  `nama_tribun` varchar(30) NOT NULL,
  `kuota_tribun` varchar(9) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori_tribun`
--

INSERT INTO `tb_kategori_tribun` (`id_tribun`, `id_tiket`, `nama_tribun`, `kuota_tribun`, `harga`) VALUES
('TRB00001', '	  TK00005', 'Tribun Barat', '1974', 50000),
('TRB00002', '	  TK00005', 'Tribun Utara', '4997', 40000),
('TRB00003', '	  TK00005', 'Tribun Timur', '6999', 50000),
('TRB00004', '	  TK00005', 'Tribun Selatan', '2954', 40000),
('TRB00005', '	  TK00005', 'VIP Tribun Barat', '478', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tb_pembayaran` (
  `id_pembayaran` varchar(10) NOT NULL,
  `id_pembelian` varchar(10) NOT NULL,
  `id_tribun` varchar(10) NOT NULL,
  `jml_beli_tiket` int(11) NOT NULL,
  `tgl_transfer` varchar(20) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `nama_pemilik_bank` varchar(50) NOT NULL,
  `jumlah_tf` varchar(12) NOT NULL,
  `foto_struk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pembelian`, `id_tribun`, `jml_beli_tiket`, `tgl_transfer`, `nama_bank`, `nama_pemilik_bank`, `jumlah_tf`, `foto_struk`) VALUES
('PB00001', 'TRS00014', 'TRB00004', 4, '05 September 2018', 'BANK BCA', 'Andri Hermawan', '160000', '_MG_5398.JPG'),
('PB00002', 'TRS00013', 'TRB00001', 2, '05 September 2018', 'BANK BCA', 'Andri Hermawan', '100000', '_MG_6279.JPG'),
('PB00003', 'TRS00013', 'TRB00001', 2, '05 September 2018', 'BANK BCA', 'Andri Hermawan', '80000', '_MG_5400.JPG'),
('PB00004', 'TRS00016', 'TRB00001', 1, '05 September 2018', 'BANK BCA', 'Andri Hermawan', '500000', 'Jellyfish.jpg'),
('PB00005', 'TRS00017', 'TRB00004', 2, '18 Oktober 2018', 'BANK BCA', 'Indra Hermawan', '80000', 'Koala.jpg'),
('PB00006', 'TRS00006', 'TRB00001', 2, '30 Oktober 2018', 'BANK BCA', 'Indra Hermawan', '100000', 'Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE IF NOT EXISTS `tb_tiket` (
  `id_tiket` varchar(10) NOT NULL,
  `tgl_pertandingan` varchar(20) NOT NULL,
  `tgl_setelah_pertandingan` varchar(20) NOT NULL,
  `jam_pertandingan` varchar(30) NOT NULL,
  `tim_tuanrumah` varchar(50) NOT NULL,
  `logo_tuanrumah` varchar(50) NOT NULL,
  `tim_tamu` varchar(50) NOT NULL,
  `logo_tamu` varchar(50) NOT NULL,
  `lokasi_pertandingan` varchar(100) NOT NULL,
  `status_tiket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`id_tiket`, `tgl_pertandingan`, `tgl_setelah_pertandingan`, `jam_pertandingan`, `tim_tuanrumah`, `logo_tuanrumah`, `tim_tamu`, `logo_tamu`, `lokasi_pertandingan`, `status_tiket`) VALUES
('TK00005', '10/29/2018', '10/30/2018', '16.00 W.I.B', 'PERSITA TANGERANG', 'download.png', 'PERSIB ', 'Logo_Persib.png', 'STADION BENTENG TANGERANG', 'Habis'),
('TK00006', '10/29/2018', '10/30/2018', '16.00 W.I.B', 'PERSITA TANGERANG', 'persita.png', 'Bhayangkara', 'Logo_Bhayangkara_FC.png', 'STADION BENTENG TANGERANG', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_pembelian` varchar(10) NOT NULL,
  `id_tiket` varchar(10) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `nama_pemesan` varchar(25) NOT NULL,
  `no_ktp_pemesan` varchar(16) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `nama_penonton1` varchar(50) NOT NULL,
  `nama_penonton2` varchar(50) NOT NULL,
  `nama_penonton3` varchar(50) NOT NULL,
  `nama_penonton4` varchar(50) NOT NULL,
  `id_tribun` varchar(20) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `jumlah_harga` bigint(20) NOT NULL,
  `status_pembelian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_pembelian`, `id_tiket`, `id_customer`, `nama_pemesan`, `no_ktp_pemesan`, `no_hp`, `email`, `jumlah_beli`, `nama_penonton1`, `nama_penonton2`, `nama_penonton3`, `nama_penonton4`, `id_tribun`, `harga`, `jumlah_harga`, `status_pembelian`) VALUES
('TRS00001', 'TK00005', 'CS00004', 'indra', '3456545676556789', '087877022228', 'andrihermawan.andriher@gmail.com', 2, 'Indra', 'Hermawan', '', '', 'TRB00004', '40000', 80000, 'MASUK'),
('TRS00002', 'TK00005', 'CS00004', 'indra', '3456545676556789', '087877022228', 'andrihermawan.andriher@gmail.com', 2, 'Bramantyo', 'Reno', '', '', 'TRB00001', '50000', 100000, 'MASUK'),
('TRS00003', 'TK00005', 'CS00004', 'indra', '3456545676556789', '087877022228', 'andrihermawan.andriher@gmail.com', 2, 'angga', 'luthfi', '', '', 'TRB00005', '100000', 200000, 'MASUK'),
('TRS00004', 'TK00005', 'CS00001', 'Andri Hermawan', '3456545676556789', '087877022228', 'hermawanandry29@gmail.com', 3, 'Andri', 'arie', 'Fadhel', '', 'TRB00001', '50000', 150000, 'Belum Diverifikasi'),
('TRS00005', 'TK00005', 'CS00001', 'Andri Hermawan', '3456545676556789', '087877022228', 'hermawanandry29@gmail.com', 3, 'Bramantyo', 'Reno', 'Fadhel', '', 'TRB00001', '50000', 150000, 'MASUK'),
('TRS00006', 'TK00006', 'CS00005', 'koko', '3456545676556789', '083898713278', 'koko@gmail.com', 2, 'andri', 'Hermawan', '', '', 'TRB00001', '50000', 100000, 'MASUK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_kategori_tribun`
--
ALTER TABLE `tb_kategori_tribun`
  ADD PRIMARY KEY (`id_tribun`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_pembelian`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
