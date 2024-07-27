-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2023 pada 18.45
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kd_buku` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `img_buku` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `thn_buku` varchar(20) NOT NULL,
  `isi` text NOT NULL,
  `stok_buku` int(11) NOT NULL,
  `jml_halaman` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tersedia` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kd_buku`, `kategori`, `img_buku`, `title`, `penerbit`, `pengarang`, `thn_buku`, `isi`, `stok_buku`, `jml_halaman`, `tgl_masuk`, `tersedia`) VALUES
(5, 'BK001', 'Buku Novel', '64b0f6cde69a0.jpg', 'aaaa', 'rifki', 'hikmali', '2015', 'HAHAHAHA', 7, 261, '2023-07-14', 1),
(6, 'BK002', 'Buku Ajar', '64b0f7a74e884.jpg', 'Java Script', 'Yusup', 'Teguh', '2013', 'GAGAGAGA', 18, 304, '2023-07-14', 1),
(7, 'BK003', 'Buku Novel', '64b0f9a4ea0f0.jpg', 'Pulang', 'Iki', 'Shakyla', '2017', 'JAJAJAJA', 28, 486, '2023-07-14', 1),
(9, 'BK004', 'Buku Novel', '64b100fd6f441.jpg', 'bbbb', 'Guh', 'Ma', '2010', 'LALALALAL', 20, 512, '2023-07-14', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `kd_pinjam` varchar(100) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `jmlh_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `kd_pinjam`, `id_users`, `id_buku`, `nama`, `title`, `jmlh_pinjam`, `tgl_pinjam`, `tgl_kembali`) VALUES
(3, 'BP001', 11, 6, ' RIFKI HIKMALI ', 'Java Script', 4, '2023-07-15', '2023-07-17'),
(14, 'BP002', 11, 5, ' RIFKI HIKMALI ', 'aaaa', 3, '2023-07-15', '2023-07-16'),
(17, 'BP003', 11, 7, ' RIFKI HIKMALI ', 'Pulang', 5, '2023-07-15', '2023-07-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `kd_users` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_profil` varchar(250) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `role` enum('anggota','petugas','kepala perpus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `kd_users`, `username`, `password`, `img_profil`, `nama`, `role`) VALUES
(1, '', '', '', '', '', 'anggota'),
(2, 'USR001', 'kaka', 'kaka', '', 'mama', 'anggota'),
(3, 'USR002', 'lala', 'lala', '', 'papa', 'anggota'),
(4, 'USR003', 'baba', 'baba', '', 'mama', 'anggota'),
(5, 'USR004', 'aku', '89ccfac87d8d06db06bf3211cb2d69ed', '', 'bagmar ni bos', 'anggota'),
(6, 'USR005', 'bagas', 'ee776a18253721efe8a62e4abd29dc47', '', 'Bagmar', 'kepala perpus'),
(7, 'USR006', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', '', 'rifki', 'petugas'),
(8, 'USR007', 'shakyla', '74cfe0edb9bbb9f34ff80080799b070e', '64abba22d5a25.', 'Shakyla', 'anggota'),
(9, 'USR008', 'guh', 'ed2b46093ad4e08c7eb256716ea3f18e', '64acfec8bcea1.', 'guh', 'anggota'),
(10, 'USR009', 'salmcantik', 'e2a7b5bb0fe3f8bae44b08d8d5916387', '64ad001a9efcc.jpg', 'salma', 'anggota'),
(11, 'USR010', 'popo', '54b1d109dc7156ef46816a9527a861bc', '64afaa753b879.jpg', 'RIFKI HIKMALI ', 'anggota'),
(12, 'USR011', 'kaka', '5541c7b5a06c39b267a5efae6628e003', '', 'Kakak', ''),
(13, 'USR012', 'lala', '2e3817293fc275dbee74bd71ce6eb056', '', 'LALAAL', 'petugas'),
(14, 'USR013', 'mama', 'eeafbf4d9b3957b139da7b7f2e7f2d4a', '', 'Mama', ''),
(15, 'USR014', 'koko', '37f525e2b6fc3cb4abd882f708ab80eb', '', 'kokok', 'kepala perpus');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD UNIQUE KEY `id_users` (`id_users`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjam_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
