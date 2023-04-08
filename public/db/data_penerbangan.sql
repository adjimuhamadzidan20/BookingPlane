-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2023 pada 18.27
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
-- Struktur dari tabel `data_penerbangan`
--

CREATE TABLE `data_penerbangan` (
  `KD_Penerbangan` int(25) NOT NULL,
  `Jenis_Penerbangan` varchar(100) NOT NULL,
  `Harga_Penerbangan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_penerbangan`
--

INSERT INTO `data_penerbangan` (`KD_Penerbangan`, `Jenis_Penerbangan`, `Harga_Penerbangan`) VALUES
(1, 'First class', 2000000),
(2, 'Bussiness class', 1500000),
(5, 'Economy class', 1000000),
(13, 'High class', 3000000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_penerbangan`
--
ALTER TABLE `data_penerbangan`
  ADD PRIMARY KEY (`KD_Penerbangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_penerbangan`
--
ALTER TABLE `data_penerbangan`
  MODIFY `KD_Penerbangan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
