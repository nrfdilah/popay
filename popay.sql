-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2019 pada 13.40
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `popay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin`
(
  `id` int
(11) NOT NULL,
  `id_pengelola` int
(11) NOT NULL,
  `nama` varchar
(255) NOT NULL,
  `email` varchar
(255) NOT NULL,
  `level` varchar
(255) NOT NULL DEFAULT 'admin',
  `password` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas_admin`
--

CREATE TABLE `aktivitas_admin`
(
  `id` int
(11) NOT NULL,
  `id_pengelola` int
(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_admin` int
(11) NOT NULL,
  `code` varchar
(255) NOT NULL,
  `nilai` bigint
(20) NOT NULL,
  `ext_1` varchar
(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi`
(
  `id` int
(11) NOT NULL,
  `id_pengelola` int
(11) NOT NULL,
  `judul` varchar
(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `diposting_oleh` int
(11) NOT NULL COMMENT 'id admin',
  `target_donasi` bigint
(20) NOT NULL,
  `terkumpul` bigint
(20) NOT NULL DEFAULT '0',
  `status` enum
('open','close') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_donasi`
--

CREATE TABLE `pembayaran_donasi`
(
  `id` int
(11) NOT NULL,
  `id_pengelola` int
(11) NOT NULL,
  `idadmin` int
(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amout` bigint
(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `qrcode`
--

CREATE TABLE `qrcode`
(
  `id` int
(11) NOT NULL,
  `id_pengelola` int
(11) NOT NULL,
  `unique_id` varchar
(255) NOT NULL COMMENT 'Nilai QR Code',
  `judul` varchar
(255) NOT NULL,
  `tetap` tinyint
(1) NOT NULL,
  `dibuat_oleh` int
(11) NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nilai` bigint
(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelola`
--

CREATE TABLE `pengelola`
(
  `id` int
(11) NOT NULL,
  `telepon` varchar
(255) NOT NULL,
  `provinsi_pengelola` varchar
(255) NOT NULL COMMENT 'Sulawesi Selatan/dll',
  `nama_pengelola` varchar
(255) NOT NULL,
  `email` varchar
(255) NOT NULL,
  `alamat` varchar
(255) NOT NULL,
  `kode` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user`
(
  `id` int
(11) NOT NULL,
  `id_pengelola` int
(11) NOT NULL,
  `tanggal_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama` varchar
(255) NOT NULL,
  `jenis_kelamin` enum
('laki-laki','perempuan') NOT NULL,
  `email` varchar
(255) NOT NULL,
  `level` varchar
(255) NOT NULL DEFAULT 'user',
  `provinsi` varchar
(255) NOT NULL COMMENT 'Sulawesi Selatan/dll',
  `pekerjaan` varchar
(255) NOT NULL,
  `kodepos` varchar
(255) NOT NULL,
  `teleponuser` varchar
(255) NOT NULL,
  `saldo` bigint
(20) NOT NULL DEFAULT '0',
  `password` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi_user`
--

CREATE TABLE `donasi_user`
(
  `id` int
(11) NOT NULL,
  `id_pengelola` int
(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_donasi` int
(11) NOT NULL,
  `user_id` int
(11) NOT NULL,
  `jumlah` bigint
(20) NOT NULL,
  `private` tinyint
(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_user`
--

CREATE TABLE `transaksi_user`
(
  `id` bigint
(20) NOT NULL,
  `id_pengelola` int
(11) NOT NULL,
  `kredit` bigint
(20) NOT NULL,
  `debit` bigint
(20) NOT NULL,
  `tipe` varchar
(255) NOT NULL COMMENT 'tipe transaksi (Donasi/dll)',
  `jenistransaksi` enum
('masuk','keluar') NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tanggal transaksi',
  `user_id` int
(11) NOT NULL,
  `metode` varchar
(255) NOT NULL COMMENT 'metode pembayaran (QR Code/No. telepon user)',
  `deskripsi` varchar
(255) NOT NULL,
 `keterangan` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
ADD PRIMARY KEY
(`id`),
ADD UNIQUE KEY `email`
(`email`),
ADD KEY `id_pengelola`
(`id_pengelola`);

--
-- Indeks untuk tabel `aktivitas_admin`
--
ALTER TABLE `aktivitas_admin`
ADD PRIMARY KEY
(`id`),
ADD KEY `id_pengelola`
(`id_pengelola`),
ADD KEY `id_admin`
(`id_admin`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
ADD PRIMARY KEY
(`id`),
ADD KEY `diposting_oleh`
(`diposting_oleh`),
ADD KEY `id_pengelola`
(`id_pengelola`);

--
-- Indeks untuk tabel `pembayaran_donasi`
--
ALTER TABLE `pembayaran_donasi`
ADD PRIMARY KEY
(`id`),
ADD KEY `idadmin`
(`idadmin`),
ADD KEY `id_pengelola`
(`id_pengelola`);

--
-- Indeks untuk tabel `qrcode`
--
ALTER TABLE `qrcode`
ADD PRIMARY KEY
(`id`),
ADD UNIQUE KEY `unique_id`
(`unique_id`),
ADD KEY `dibuat_oleh`
(`dibuat_oleh`),
ADD KEY `id_pengelola`
(`id_pengelola`);

--
-- Indeks untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
ADD PRIMARY KEY
(`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY
(`id`),
ADD UNIQUE KEY `teleponuser`
(`teleponuser`),
ADD UNIQUE KEY `email`
(`email`),
ADD KEY `id_pengelola`
(`id_pengelola`);

--
-- Indeks untuk tabel `donasi_user`
--
ALTER TABLE `donasi_user`
ADD PRIMARY KEY
(`id`),
ADD KEY `id_donasi`
(`id_donasi`),
ADD KEY `user_id`
(`user_id`),
ADD KEY `id_pengelola`
(`id_pengelola`);

--
-- Indeks untuk tabel `transaksi_user`
--
ALTER TABLE `transaksi_user`
ADD PRIMARY KEY
(`id`),
ADD KEY `user_id`
(`user_id`),
ADD KEY `id_pengelola`
(`id_pengelola`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aktivitas_admin`
--
ALTER TABLE `aktivitas_admin`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_donasi`
--
ALTER TABLE `pembayaran_donasi`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donasi_user`
--
ALTER TABLE `donasi_user`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_user`
--
ALTER TABLE `transaksi_user`
  MODIFY `id` bigint
(20) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
