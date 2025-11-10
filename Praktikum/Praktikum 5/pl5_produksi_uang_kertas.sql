-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2025 pada 09.45
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
-- Database: `pl5_produksi_uang_kertas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id` int(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `nama_bahan`, `jenis`, `stok`) VALUES
(1, 'Kertas A', 'Kertas', 10000),
(2, 'Kertas B', 'Kertas', 12000),
(3, 'Kertas C', 'Kertas', 15000),
(4, 'Kertas D', 'Kertas', 9000),
(5, 'Kertas E', 'Kertas', 11000),
(6, 'Tinta A', 'Tinta', 5000),
(7, 'Tinta B', 'Tinta', 6000),
(8, 'Tinta C', 'Tinta', 5500),
(9, 'Tinta D', 'Tinta', 7000),
(10, 'Tinta E', 'Tinta', 6500),
(11, 'Plastik A', 'Plastik', 8000),
(12, 'Plastik B', 'Plastik', 9000),
(13, 'Plastik C', 'Plastik', 8500),
(14, 'Plastik D', 'Plastik', 7500),
(15, 'Plastik E', 'Plastik', 9500),
(16, 'Kertas F', 'Kertas', 10000),
(17, 'Tinta F', 'Tinta', 6000),
(18, 'Plastik F', 'Plastik', 8000),
(19, 'Kertas G', 'Kertas', 12000),
(20, 'Tinta G', 'Tinta', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin`
--

CREATE TABLE `mesin` (
  `id` int(11) NOT NULL,
  `nama_mesin` varchar(100) NOT NULL,
  `kapasitas_per_jam` int(11) DEFAULT NULL,
  `tahun_pembuatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mesin`
--

INSERT INTO `mesin` (`id`, `nama_mesin`, `kapasitas_per_jam`, `tahun_pembuatan`) VALUES
(1, 'Mesin Cetak A', 500, 2015),
(2, 'Mesin Cetak B', 600, 2016),
(3, 'Mesin Cetak C', 700, 2017),
(4, 'Mesin Cetak D', 400, 2018),
(5, 'Mesin Cetak E', 550, 2015),
(6, 'Mesin Cetak F', 650, 2016),
(7, 'Mesin Cetak G', 750, 2017),
(8, 'Mesin Cetak H', 800, 2018),
(9, 'Mesin Cetak I', 450, 2015),
(10, 'Mesin Cetak J', 500, 2016),
(11, 'Mesin Cetak K', 600, 2017),
(12, 'Mesin Cetak L', 700, 2018),
(13, 'Mesin Cetak M', 550, 2015),
(14, 'Mesin Cetak N', 650, 2016),
(15, 'Mesin Cetak O', 750, 2017),
(16, 'Mesin Cetak P', 800, 2018),
(17, 'Mesin Cetak Q', 400, 2015),
(18, 'Mesin Cetak R', 450, 2016),
(19, 'Mesin Cetak S', 500, 2017),
(20, 'Mesin Cetak T', 550, 2018),
(23, 'Mesin Cetak U', 550, 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `shift` enum('pagi','siang','malam') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id`, `nama`, `shift`) VALUES
(1, 'Andi', 'pagi'),
(2, 'Budi', 'siang'),
(3, 'Citra', 'malam'),
(4, 'Dewi', 'pagi'),
(5, 'Eka', 'siang'),
(6, 'Fajar', 'malam'),
(7, 'Gita', 'pagi'),
(8, 'Hadi', 'siang'),
(9, 'Intan', 'malam'),
(10, 'Joko', 'pagi'),
(11, 'Kiki', 'siang'),
(12, 'Lina', 'malam'),
(13, 'Miko', 'pagi'),
(14, 'Nina', 'siang'),
(15, 'Oki', 'malam'),
(16, 'Putu', 'pagi'),
(17, 'Rani', 'siang'),
(18, 'Sari', 'malam'),
(19, 'Tono', 'pagi'),
(20, 'Umi', 'siang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah_lembar` int(11) DEFAULT NULL,
  `mesin_id` int(11) DEFAULT NULL,
  `bahan_id` int(11) DEFAULT NULL,
  `operator_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id`, `tanggal`, `jumlah_lembar`, `mesin_id`, `bahan_id`, `operator_id`) VALUES
(1, '2025-01-01', 1000, 1, 1, 1),
(2, '2025-01-02', 1200, 2, 2, 2),
(3, '2025-01-03', 1500, 3, 3, 3),
(4, '2025-01-04', 1100, 4, 4, 4),
(5, '2025-01-05', 1300, 5, 5, 5),
(6, '2025-01-06', 1400, 6, 6, 6),
(7, '2025-01-07', 1600, 7, 7, 7),
(8, '2025-01-08', 1700, 8, 8, 8),
(9, '2025-01-09', 900, 9, 9, 9),
(10, '2025-01-10', 1000, 10, 10, 10),
(11, '2025-01-11', 1200, 11, 11, 11),
(12, '2025-01-12', 1500, 12, 12, 12),
(13, '2025-01-13', 1100, 13, 13, 13),
(14, '2025-01-14', 1300, 14, 14, 14),
(15, '2025-01-15', 1400, 15, 15, 15),
(16, '2025-01-16', 1600, 16, 16, 16),
(17, '2025-01-17', 1700, 17, 17, 17),
(18, '2025-01-18', 900, 18, 18, 18),
(19, '2025-01-19', 1000, 19, 19, 19),
(20, '2025-01-20', 1200, 20, 20, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `quality_check`
--

CREATE TABLE `quality_check` (
  `id` int(11) NOT NULL,
  `produksi_id` int(11) DEFAULT NULL,
  `tingkat_cacat` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` enum('lulus','ulang') DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `quality_check`
--

INSERT INTO `quality_check` (`id`, `produksi_id`, `tingkat_cacat`, `jumlah`, `status`, `catatan`) VALUES
(1, 1, 2, 20, 'lulus', 'Normal'),
(2, 2, 1, 12, 'lulus', 'Normal'),
(3, 3, 5, 75, 'ulang', 'Ada cacat pada lembar tengah'),
(4, 4, 2200, 0, 'lulus', 'Sempurna'),
(5, 5, 3, 39, 'ulang', 'Cacat minor'),
(6, 6, 2, 28, 'lulus', 'Normal'),
(7, 7, 4, 64, 'ulang', 'Perlu pengecekan ulang'),
(8, 8, 1, 17, 'lulus', 'Normal'),
(9, 9, 0, 0, 'lulus', 'Sempurna'),
(10, 10, 2, 20, 'lulus', 'Normal'),
(11, 11, 3, 36, 'ulang', 'Cacat minor'),
(12, 12, 1, 15, 'lulus', 'Normal'),
(13, 13, 5, 55, 'ulang', 'Perlu perhatian'),
(14, 14, 0, 0, 'lulus', 'Sempurna'),
(15, 15, 2, 25, 'lulus', 'Normal'),
(16, 16, 4, 66, 'ulang', 'Cacat banyak'),
(17, 17, 3, 45, 'ulang', 'Cacat minor');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mesin_id` (`mesin_id`),
  ADD KEY `bahan_id` (`bahan_id`),
  ADD KEY `operator_id` (`operator_id`);

--
-- Indeks untuk tabel `quality_check`
--
ALTER TABLE `quality_check`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produksi_id` (`produksi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `quality_check`
--
ALTER TABLE `quality_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`mesin_id`) REFERENCES `mesin` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produksi_ibfk_2` FOREIGN KEY (`bahan_id`) REFERENCES `bahan_baku` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produksi_ibfk_3` FOREIGN KEY (`operator_id`) REFERENCES `operator` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `quality_check`
--
ALTER TABLE `quality_check`
  ADD CONSTRAINT `quality_check_ibfk_1` FOREIGN KEY (`produksi_id`) REFERENCES `produksi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
