-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2025 pada 13.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_10241035`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_binatang`
--

CREATE TABLE `kebun_binatang` (
  `kode_hewan` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `spesies` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kebun_binatang`
--

INSERT INTO `kebun_binatang` (`kode_hewan`, `nama`, `spesies`, `jumlah`, `status`, `umur`) VALUES
('H0001', 'Harimau', 'Mamalia', 40, 'Dilindungi', 5),
('H0002', 'Burung', 'Burung', 70, 'Umum', 2),
('H0003', 'Ikan', 'Ikan', 403, 'Umum', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kebun_binatang`
--
ALTER TABLE `kebun_binatang`
  ADD PRIMARY KEY (`kode_hewan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
