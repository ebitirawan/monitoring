-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2024 pada 04.30
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(0, 'none'),
(1, 'guru bk'),
(2, 'wali kelas'),
(3, 'kepala sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail`
--

CREATE TABLE `t_detail` (
  `id_detail` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `jenis_pelanggaran` char(20) NOT NULL,
  `id_pelanggaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_guru`
--

CREATE TABLE `t_guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_guru`
--

INSERT INTO `t_guru` (`id_guru`, `nama_guru`, `jabatan`, `id_user`) VALUES
(1, 'nisa', 'walikelas7a', 1),
(2, 'arni', 'walikelas7b', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `kelas`) VALUES
(1, 7),
(2, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_konfirmasi`
--

CREATE TABLE `t_konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `status` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_konfirmasi`
--

INSERT INTO `t_konfirmasi` (`id_konfirmasi`, `status`) VALUES
(1, 'pembinaan wali kelas'),
(2, 'pembinaan guru BK'),
(3, 'kirim undangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_orang_tua`
--

CREATE TABLE `t_orang_tua` (
  `id_orang_tua` int(11) NOT NULL,
  `nama_orang_tua` char(50) NOT NULL,
  `nomor_WA` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_orang_tua`
--

INSERT INTO `t_orang_tua` (`id_orang_tua`, `nama_orang_tua`, `nomor_WA`) VALUES
(1, 'irwan', '082295009664'),
(2, 'kasim', '082295009665'),
(3, 'sumar', '082295009666'),
(4, '2', 'ew'),
(5, 'ewd', '32'),
(6, 'apres', '08021'),
(7, 'aku', 'e'),
(8, 'ewdefw', '32'),
(9, 'aku', '08021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pelanggaran`
--

CREATE TABLE `t_pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `tanggal_pelanggaran` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_konfirmasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_siswa`
--

CREATE TABLE `t_siswa` (
  `id_siswa` int(11) NOT NULL,
  `NISN` int(11) NOT NULL,
  `nama_siswa` char(50) NOT NULL,
  `jenis_kelamin` char(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_orang_tua` int(11) NOT NULL,
  `id_wali_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_siswa`
--

INSERT INTO `t_siswa` (`id_siswa`, `NISN`, `nama_siswa`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `id_orang_tua`, `id_wali_kelas`) VALUES
(1, 21501012, 'alex', 'L', '2024-03-29', 'ngvgnv', 4, 2),
(34, 12322, 'ical', 'L', '2024-07-07', 'wdwdwww', 1, 2),
(35, 2313, 'arni', 'L', '2024-07-07', 'sdas', 1, 2),
(42, 2147483647, 'arni', 'P', '2024-07-08', 'djjiejd', 3, 1),
(44, 132655, 'bhffhghghg', 'P', '2024-07-11', 'jnjhuhu', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `email` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `id_level` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `email`, `password`, `id_level`, `create_at`, `update_at`) VALUES
(1, 'walikelas7a@gmail.com', 'admin', 2, '2024-02-27 16:34:34', '2024-03-06 15:43:43'),
(2, 'admin@gmail.com', '123', 1, '2024-02-29 17:11:32', '2024-03-01 14:12:14'),
(3, 'kepalasekolah@gmail.com', 'kepsek', 3, '2024-03-01 15:09:47', NULL),
(4, 'walikelas7b@gmail.com', '123', 2, '2024-03-06 15:47:07', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wali_kelas`
--

CREATE TABLE `t_wali_kelas` (
  `id_wali_kelas` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_wali_kelas`
--

INSERT INTO `t_wali_kelas` (`id_wali_kelas`, `id_kelas`, `id_guru`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `t_detail`
--
ALTER TABLE `t_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran`);

--
-- Indeks untuk tabel `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `t_konfirmasi`
--
ALTER TABLE `t_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indeks untuk tabel `t_orang_tua`
--
ALTER TABLE `t_orang_tua`
  ADD PRIMARY KEY (`id_orang_tua`);

--
-- Indeks untuk tabel `t_pelanggaran`
--
ALTER TABLE `t_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_konfirmasi` (`id_konfirmasi`);

--
-- Indeks untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_orang_tua` (`id_orang_tua`),
  ADD KEY `id_wali_kelas` (`id_wali_kelas`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `t_wali_kelas`
--
ALTER TABLE `t_wali_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_kelas`
--
ALTER TABLE `t_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_orang_tua`
--
ALTER TABLE `t_orang_tua`
  MODIFY `id_orang_tua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_detail`
--
ALTER TABLE `t_detail`
  ADD CONSTRAINT `t_detail_ibfk_1` FOREIGN KEY (`id_pelanggaran`) REFERENCES `t_pelanggaran` (`id_pelanggaran`);

--
-- Ketidakleluasaan untuk tabel `t_guru`
--
ALTER TABLE `t_guru`
  ADD CONSTRAINT `t_guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `t_pelanggaran`
--
ALTER TABLE `t_pelanggaran`
  ADD CONSTRAINT `t_pelanggaran_ibfk_2` FOREIGN KEY (`id_konfirmasi`) REFERENCES `t_konfirmasi` (`id_konfirmasi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pelanggaran_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `t_siswa` (`id_siswa`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD CONSTRAINT `t_siswa_ibfk_4` FOREIGN KEY (`id_wali_kelas`) REFERENCES `t_wali_kelas` (`id_wali_kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_siswa_ibfk_5` FOREIGN KEY (`id_orang_tua`) REFERENCES `t_orang_tua` (`id_orang_tua`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `t_wali_kelas`
--
ALTER TABLE `t_wali_kelas`
  ADD CONSTRAINT `t_wali_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `t_kelas` (`id_kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_wali_kelas_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `t_guru` (`id_guru`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
