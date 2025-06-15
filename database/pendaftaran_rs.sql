-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2025 pada 10.01
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_rs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) DEFAULT NULL,
  `spesialis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`) VALUES
(1, 'Sari', 'Kulit'),
(2, 'Rudi', 'Kandungan'),
(3, 'Ria', 'Anak'),
(4, 'tester', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(15) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama_pasien`, `tgl_lahir`, `alamat`, `telepon`, `id_user`) VALUES
(1, 'Natayahhu', '1955-01-20', 'Sirewel', '111111111111', 1),
(2, 'Natayahhu', '1955-01-20', 'Sirewel', '111111111111', 1),
(3, 'Natayahhu', '1955-01-20', 'sirewel', '111111111111', 1),
(4, 'Natayahhu', '1955-01-20', 'Sirewel', '111111111111', 1),
(6, 'test', '2004-01-02', 'test', '22222222222222', 2),
(7, 'test2', '2008-01-02', 'test2', '22222222222223', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `keluhan` text,
  `jadwal_kunjungan` datetime DEFAULT NULL,
  `status` enum('dalam proses','diterima','ditolak') DEFAULT 'dalam proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `id_pasien`, `id_dokter`, `keluhan`, `jadwal_kunjungan`, `status`) VALUES
(1, 1, 1, 'Ruam, Gatal-gatal', '2025-06-14 21:45:00', 'ditolak'),
(2, 2, 2, 'Katarak', '2025-06-14 21:45:00', 'ditolak'),
(3, 3, 2, 'Rewel', '2025-06-14 10:23:00', 'diterima'),
(4, 4, 1, 'Gatal-gatal', '2025-06-14 10:55:00', 'dalam proses'),
(5, 6, 4, 'test', '2025-06-29 19:35:00', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','pasien') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'kyda', '$2y$10$v30equVWza9i4Mz2rfyIzOghFJALg/5Cd7gOwI0eILJL/uwV8Ydzu', 'pasien'),
(2, 'vickyrahmanda', '$2y$10$ctZ/u.63LZ56IqAQa3QnfeFDf42fIOuBgaCNqUTwJWECZNyVkz.pa', 'pasien'),
(3, 'admin0094', '$2y$10$eiXwjMrqPBwu8DLQHCBt5uauDFP7/NTIM3l/8UxetIO6CX2yivRz.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD CONSTRAINT `tb_pendaftaran_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_pendaftaran_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
