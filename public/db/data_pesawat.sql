-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2023 pada 18.28
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketpesawat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pesawat`
--

CREATE TABLE `data_pesawat` (
  `KD_Pesawat` int(25) NOT NULL,
  `Nama_Pesawat` varchar(100) NOT NULL,
  `Jenis_Pesawat` varchar(100) NOT NULL,
  `Jumlah_Unit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pesawat`
--

INSERT INTO `data_pesawat` (`KD_Pesawat`, `Nama_Pesawat`, `Jenis_Pesawat`, `Jumlah_Unit`) VALUES
(1, 'Garuda Indonesia', 'Airbus', 120),
(3, 'Lion Air', 'AirBus', 85),
(4, 'Air Asia', 'AirBus', 40),
(16, 'Batik Air', 'AirBus', 20),
(20, 'Sriwijaya Air', 'Boeing 77', 100),
(51, 'Citilink', 'Boeing 737', 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pesawat`
--
ALTER TABLE `data_pesawat`
  ADD PRIMARY KEY (`KD_Pesawat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pesawat`
--
ALTER TABLE `data_pesawat`
  MODIFY `KD_Pesawat` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
