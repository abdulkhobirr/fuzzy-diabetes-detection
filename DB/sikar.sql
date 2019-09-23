-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 04:11 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikar`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` varchar(10) NOT NULL,
  `gejala` text NOT NULL,
  `nama_lain` text NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `less` varchar(50) NOT NULL,
  `avg` varchar(50) NOT NULL,
  `more` varchar(50) NOT NULL,
  `no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`, `nama_lain`, `deskripsi`, `less`, `avg`, `more`, `no`) VALUES
('G01', 'Polyuria', 'Sering Buang Air Kecil', 'Kelainan frekuensi diuresis/buang air kecil sebagai akibat kelebihan produksi air seni', 'less_frequent;1;3;5', 'average;4;6;9', 'more_frequent;8;11;20', 1),
('G02', 'Polydipsia', 'Sering Merasa Haus', 'Rasa haus yang tidak berkesudahan', 'less_thirsty;1;2;4', 'average;3;5;8', 'more_thirsty;7;9;15', 2),
('G03', 'Polyphagia', 'Sering Merasa Lapar', 'Kelainan metabolisme berupa tingginya ritme rasa lapar yang harus dipuaskan dengan mengonsumsi makanan', 'less_hungry;1;2;3', 'average;2;3;5', 'more_hungry;4;6;10', 3),
('G04', 'Nocturia', 'Sering Buang Air Kecil pada Malam Hari', 'Kondisi buang air kecil pada tengah malam hari secara terus-menerus, yang disebabkan oleh gaya hidup atau kondisi medis', 'less_frequent;0;1;2', 'frequent;1;3;4', 'more_frequent;3;5;10', 4),
('G05', 'Giddiness', 'Lemas', 'Atau dapat disebut Dizziness adalah istilah yang dipakai untuk menggambarkan rasa pusing atau ringan kepala, lemas, merasa \'goyang\', atau tidak stabil', 'very_rare;0;0;1', 'rare;1;1;2', 'often;1;2;3', 5),
('G06', 'Recurrent Boils', 'Bisul Berulang', 'Bisul berulang', 'very_rare;0;0;1', 'rare;1;1;2', 'often;1;2;3', 6),
('G07', 'Weight Loss', 'Turunnya Berat Badan', 'Berat badan turun', 'very_less;0;0;1', 'less;1;1;2', 'more;1;2;3', 7),
('G08', 'Recurrent Urinary Tract Infections ', 'Infeksi pada Saluran Kemih', 'Infeksi berulang pada saluran urin', 'very_less;0;0;1', 'less;1;1;2', 'more;1;2;3', 8),
('G09', 'Vision Changes ', 'Penglihatan Kabur', 'Penglihatan kabur', 'very_less;0;0;1', 'less;1;1;2', 'more;1;2;3', 9),
('G10', 'Candidal Infections ', 'Infeksi pada Area Mulut, Kulit, atau Kelamin', 'Infeksi jamur yang disebabkan oleh jenis jamur yaitu Candida, atau Candida albicans. Candidiasis dapat mempengaruhi area kelamin, mulut, kulit, dan darah', 'very_rare;0;0;1', 'rare;1;1;2', 'often;1;2;3', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pencegahan`
--

CREATE TABLE `pencegahan` (
  `kd_solusi` varchar(10) NOT NULL,
  `terapi` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencegahan`
--

INSERT INTO `pencegahan` (`kd_solusi`, `terapi`, `solusi`) VALUES
('S01', 'Terapi Tanpa Obat', 'A. Pengaturan Diet<br/>Diet yang dianjurkan adalah makanan dengan komposisi yang seimbang dalam hal karbohidrat, protein dan lemak, sesuai dengan kecukupan gizi baik sebagai berikut:<br/><ul><li>Karbohidrat : 60-70%</li><li>Protein : 10-15%</li><li>Lemak : 20-25%</li></ul>Jumlah kalori disesuaikan dengan pertumbuhan, status gizi, umur, stres akut\r\ndan kegiatan fisik, yang pada dasarnya ditujukan untuk mencapai dan mempertahankan berat badan ideal.<br/><br/>B. Olah Raga<br/>Olahraga yang disarankan adalah yang bersifat CRIPE (Continuous,Rhytmical, Interval, Progressive, Endurance Training). Sedapat mungkin mencapai zona sasaran 75-85% denyut nadi maksimal (220-umur), disesuaikan dengan kemampuan dan kondisi penderita. Beberapa contoh olah raga yang disarankan, antara lain jalan atau lari pagi, bersepeda, berenang,dan lain sebagainya.');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode` varchar(10) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode`, `nama_penyakit`) VALUES
('P01', 'mild'),
('P02', 'moderate'),
('P03', 'severe');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `jika` varchar(200) NOT NULL,
  `maka` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`jika`, `maka`) VALUES
('averageANDaverageANDaverageANDfrequentANDrareANDrareANDlessANDlessANDlessANDrare', 'P02'),
('less_frequentANDless_thirstyANDless_hungryANDless_frequentANDvery_rare ANDvery_rareANDvery_lessANDlessANDlessANDrare', 'P01'),
('less_frequentANDless_thirstyANDless_hungryANDless_frequentANDvery_rareANDvery_rareANDvery_lessANDmoreANDmoreANDoften', 'P02'),
('less_frequentANDless_thirstyANDless_hungryANDless_frequentANDvery_rareANDvery_rareANDvery_lessANDvery_lessANDvery_lessANDvery_rare', 'P01'),
('more_frequentANDmore_thirstyANDmore_hungryANDmore_frequentANDoftenANDoftenANDmoreANDmoreANDmoreANDoften', 'P03'),
('more_frequentANDmore_thirstyANDmore_hungryANDmore_frequentANDvery_rareANDvery_rareANDvery_lessANDvery_lessANDvery_lessANDvery_rare ', 'P03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indexes for table `pencegahan`
--
ALTER TABLE `pencegahan`
  ADD PRIMARY KEY (`kd_solusi`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`jika`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
