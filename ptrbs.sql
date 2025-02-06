-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Feb 2025 pada 07.31
-- Versi server: 8.0.30
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptrbs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int NOT NULL,
  `id_user_level` int NOT NULL,
  `id_menu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(30, 1, 2),
(31, 1, 10),
(32, 1, 11),
(33, 1, 12),
(34, 1, 13),
(35, 1, 14),
(36, 1, 15),
(37, 1, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kapal`
--

CREATE TABLE `tbl_kapal` (
  `id_kapal` int NOT NULL,
  `nomer_kapal` varchar(30) NOT NULL,
  `nama_kapal` varchar(100) NOT NULL,
  `tipe_kapal` varchar(100) NOT NULL,
  `panjang_kapal` int NOT NULL,
  `lebar_kapal` int NOT NULL,
  `tinggi_kapal` int NOT NULL,
  `tahun_kapal` int NOT NULL,
  `kapasitas_kapal` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kapal`
--

INSERT INTO `tbl_kapal` (`id_kapal`, `nomer_kapal`, `nama_kapal`, `tipe_kapal`, `panjang_kapal`, `lebar_kapal`, `tinggi_kapal`, `tahun_kapal`, `kapasitas_kapal`, `status`) VALUES
(1, 'KPL001', 'Sinar Laut', 'Kargo', 151, 30, 20, 2015, 5000, 6),
(2, 'KPL002', 'Samudra Raya', 'Penumpang', 200, 35, 25, 2018, 2000, 0),
(3, 'KPL003', 'Baruna Jaya', 'Nelayan', 50, 10, 8, 2020, 100, 0),
(4, 'KPL004', 'Citra Samudra', 'Kargo', 175, 32, 22, 2016, 6000, 0),
(5, 'KPL005', 'Mega Bahari', 'Penumpang', 180, 33, 24, 2017, 2500, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kapal_berlayar`
--

CREATE TABLE `tbl_kapal_berlayar` (
  `id_kapal_berlayar` int NOT NULL,
  `id_kapal` int NOT NULL,
  `tanggal_berlayar` date NOT NULL,
  `pelabuhan_tujuan` varchar(100) NOT NULL,
  `rute_pelayaran` text NOT NULL,
  `muatan` varchar(100) NOT NULL,
  `kapten_kapal` varchar(100) NOT NULL,
  `perkiraan_sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kapal_keluar`
--

CREATE TABLE `tbl_kapal_keluar` (
  `id_kapal_keluar` int NOT NULL,
  `id_kapal` int NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `pelabuhan_tujuan` varchar(100) NOT NULL,
  `muatan_keluar` varchar(100) NOT NULL,
  `alasan_keluar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kapal_masuk`
--

CREATE TABLE `tbl_kapal_masuk` (
  `id_kapal_masuk` int NOT NULL,
  `id_kapal` int NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `pelabuhan_asal` varchar(100) NOT NULL,
  `muatan` varchar(100) NOT NULL,
  `status_muatan` varchar(25) NOT NULL,
  `status_kapal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kapal_parkir`
--

CREATE TABLE `tbl_kapal_parkir` (
  `id_kapal_parkir` int NOT NULL,
  `id_kapal` int NOT NULL,
  `tanggal_parkir` date NOT NULL,
  `durasi_parkir` int NOT NULL,
  `lokasi_parkir` text NOT NULL,
  `biaya_parkir` int NOT NULL,
  `alasan_parkir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kapal_perbaikan`
--

CREATE TABLE `tbl_kapal_perbaikan` (
  `id_kapal_perbaikan` int NOT NULL,
  `id_kapal` int NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jenis_perbaikan` text NOT NULL,
  `biaya_perbaikan` int NOT NULL,
  `lokasi_perbaikan` varchar(100) NOT NULL,
  `teknisi_perbaikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
(10, 'DATA KAPAL', 'tbl_kapal', 'fa fa-ship', 0, 'y'),
(11, 'KAPAL MASUK', 'tbl_kapal_masuk', 'fa fa-sign-in', 0, 'y'),
(12, 'KAPAL KELUAR', 'tbl_kapal_keluar', 'fa fa-sign-out', 0, 'y'),
(13, 'KAPAL BERLAYAR', 'tbl_kapal_berlayar', 'fa fa-anchor', 0, 'y'),
(14, 'KAPAL PARKIR', 'tbl_kapal_parkir', 'fa fa-hand-paper-o', 0, 'y'),
(15, 'KAPAL PERBAIKAN', 'tbl_kapal_perbaikan', 'fa fa-cogs', 0, 'y'),
(16, 'RIWAYAT KAPAL', 'tbl_riwayat_kapal', 'fa fa-clock-o', 0, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_kapal`
--

CREATE TABLE `tbl_riwayat_kapal` (
  `id_riwayat` int NOT NULL,
  `id_kapal` int NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `status` varchar(100) NOT NULL,
  `pelabuhan_asal` varchar(100) NOT NULL,
  `pelabuhan_tujuan` varchar(100) NOT NULL,
  `muatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_riwayat_kapal`
--

INSERT INTO `tbl_riwayat_kapal` (`id_riwayat`, `id_kapal`, `tanggal_update`, `jam_update`, `status`, `pelabuhan_asal`, `pelabuhan_tujuan`, `muatan`) VALUES
(1, 1, '2025-02-06', '15:20:00', '-', 'Pelabuhan Rusdi', 'Tanjung Priok', 'Batu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Nuris Akbar M.Kom', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indeks untuk tabel `tbl_kapal_berlayar`
--
ALTER TABLE `tbl_kapal_berlayar`
  ADD PRIMARY KEY (`id_kapal_berlayar`);

--
-- Indeks untuk tabel `tbl_kapal_keluar`
--
ALTER TABLE `tbl_kapal_keluar`
  ADD PRIMARY KEY (`id_kapal_keluar`);

--
-- Indeks untuk tabel `tbl_kapal_masuk`
--
ALTER TABLE `tbl_kapal_masuk`
  ADD PRIMARY KEY (`id_kapal_masuk`);

--
-- Indeks untuk tabel `tbl_kapal_parkir`
--
ALTER TABLE `tbl_kapal_parkir`
  ADD PRIMARY KEY (`id_kapal_parkir`);

--
-- Indeks untuk tabel `tbl_kapal_perbaikan`
--
ALTER TABLE `tbl_kapal_perbaikan`
  ADD PRIMARY KEY (`id_kapal_perbaikan`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_riwayat_kapal`
--
ALTER TABLE `tbl_riwayat_kapal`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_kapal`
--
ALTER TABLE `tbl_kapal`
  MODIFY `id_kapal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_kapal_berlayar`
--
ALTER TABLE `tbl_kapal_berlayar`
  MODIFY `id_kapal_berlayar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_kapal_keluar`
--
ALTER TABLE `tbl_kapal_keluar`
  MODIFY `id_kapal_keluar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_kapal_masuk`
--
ALTER TABLE `tbl_kapal_masuk`
  MODIFY `id_kapal_masuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_kapal_parkir`
--
ALTER TABLE `tbl_kapal_parkir`
  MODIFY `id_kapal_parkir` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_kapal_perbaikan`
--
ALTER TABLE `tbl_kapal_perbaikan`
  MODIFY `id_kapal_perbaikan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_kapal`
--
ALTER TABLE `tbl_riwayat_kapal`
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
