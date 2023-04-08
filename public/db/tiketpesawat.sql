-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2023 pada 18.03
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
-- Struktur dari tabel `data_pemesan`
--

CREATE TABLE `data_pemesan` (
  `ID_pemesan` int(20) NOT NULL,
  `Nama_pemesan` varchar(100) NOT NULL,
  `Alamat_pemesan` varchar(100) NOT NULL,
  `KD_Penerbangan` int(25) NOT NULL,
  `Jumlah_tiket` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pemesan`
--

INSERT INTO `data_pemesan` (`ID_pemesan`, `Nama_pemesan`, `Alamat_pemesan`, `KD_Penerbangan`, `Jumlah_tiket`) VALUES
(1, 'Adji MZ', 'Kota Bekasi', 1, 1),
(2, 'Arini Yanti', 'Jakarta Timur', 2, 4),
(3, 'Septian Arif', 'Jakarta Barat', 1, 2),
(4, 'Nurmala', 'Kota Bekasi', 2, 1),
(5, 'Wahyu Adit', 'Kota Bekasi', 1, 3),
(7, 'Reyhan', 'Kota Bekasi', 2, 1),
(8, 'Arianto', 'Depok', 2, 3),
(9, 'Fajar Sadboy', 'Jakarta', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pemesan`
--
ALTER TABLE `data_pemesan`
  ADD PRIMARY KEY (`ID_pemesan`),
  ADD KEY `KD_Penerbangan` (`KD_Penerbangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pemesan`
--
ALTER TABLE `data_pemesan`
  MODIFY `ID_pemesan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pemesan`
--
ALTER TABLE `data_pemesan`
  ADD CONSTRAINT `data_pemesan_ibfk_1` FOREIGN KEY (`KD_Penerbangan`) REFERENCES `data_penerbangan` (`KD_Penerbangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
