-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2023 pada 18.29
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
-- Struktur dari tabel `jadwal_keberangkatan`
--

CREATE TABLE `jadwal_keberangkatan` (
  `ID_KBR` int(30) NOT NULL,
  `ID_pemesan` int(20) NOT NULL,
  `KD_Pesawat` int(25) NOT NULL,
  `Rute_penerbangan` varchar(50) NOT NULL,
  `Tgl_keberangkatan` date NOT NULL,
  `Jam_keberangkatan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_keberangkatan`
--

INSERT INTO `jadwal_keberangkatan` (`ID_KBR`, `ID_pemesan`, `KD_Pesawat`, `Rute_penerbangan`, `Tgl_keberangkatan`, `Jam_keberangkatan`) VALUES
(1, 3, 16, 'Jakarta - Aceh', '2023-04-03', '15:29:00'),
(3, 1, 1, 'Jakarta - Tokyo', '2023-04-04', '22:18:00'),
(4, 4, 4, 'Jakarta - Singapura', '2023-04-04', '23:36:00'),
(6, 8, 51, 'Bali - Jakarta', '2023-04-08', '00:10:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_keberangkatan`
--
ALTER TABLE `jadwal_keberangkatan`
  ADD PRIMARY KEY (`ID_KBR`),
  ADD KEY `ID_pemesan` (`ID_pemesan`,`KD_Pesawat`),
  ADD KEY `KD_Pesawat` (`KD_Pesawat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_keberangkatan`
--
ALTER TABLE `jadwal_keberangkatan`
  MODIFY `ID_KBR` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_keberangkatan`
--
ALTER TABLE `jadwal_keberangkatan`
  ADD CONSTRAINT `jadwal_keberangkatan_ibfk_2` FOREIGN KEY (`KD_Pesawat`) REFERENCES `data_pesawat` (`KD_Pesawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_keberangkatan_ibfk_3` FOREIGN KEY (`ID_pemesan`) REFERENCES `data_pemesan` (`ID_pemesan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
