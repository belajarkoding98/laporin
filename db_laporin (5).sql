-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2022 pada 21.21
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laporin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_1`
--

CREATE TABLE `admin_1` (
  `id_admin1` int(11) NOT NULL,
  `nama_admin1` varchar(50) NOT NULL,
  `username_admin1` text NOT NULL,
  `password_admin1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_1`
--

INSERT INTO `admin_1` (`id_admin1`, `nama_admin1`, `username_admin1`, `password_admin1`) VALUES
(1, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_2`
--

CREATE TABLE `admin_2` (
  `id_admin2` int(11) NOT NULL,
  `nama_admin2` varchar(50) NOT NULL,
  `tipe` text NOT NULL,
  `username_admin2` text NOT NULL,
  `password_admin2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduan`
--

CREATE TABLE `aduan` (
  `id_aduan` int(11) NOT NULL,
  `id_pelapor` int(11) NOT NULL,
  `id_admin1` int(11) DEFAULT NULL,
  `id_admin2` int(11) DEFAULT NULL,
  `waktu_kejadian` date NOT NULL,
  `waktu_laporan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kategori_laporan` varchar(255) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
  `deskripsi_umum` text NOT NULL,
  `lokasi_aset` text NOT NULL,
  `bukti` text NOT NULL,
  `jenis_klasifikasi` text DEFAULT NULL,
  `analisis` text DEFAULT NULL,
  `solusi` text DEFAULT NULL,
  `ticket` varchar(50) NOT NULL,
  `status` enum('0','1','2','3','4') NOT NULL DEFAULT '1',
  `terakhir_diupdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_verif` int(11) NOT NULL DEFAULT 0,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aduan`
--

INSERT INTO `aduan` (`id_aduan`, `id_pelapor`, `id_admin1`, `id_admin2`, `waktu_kejadian`, `waktu_laporan`, `kategori_laporan`, `judul_laporan`, `deskripsi_umum`, `lokasi_aset`, `bukti`, `jenis_klasifikasi`, `analisis`, `solusi`, `ticket`, `status`, `terakhir_diupdate`, `status_verif`, `alasan`) VALUES
(10, 22, NULL, NULL, '2022-03-07', '2022-05-24 08:31:34', '', '', 'Tetangga Saya, memiliki kesulitan Ekonomi. Tolong Dibantu Pak', 'Desa Cilebak, Kecamatan Cilebak', 'Untitled-1.png', 'Account Comoromise', NULL, NULL, 'RXMT0', '2', '2022-03-07 15:23:32', 1, NULL),
(12, 22, NULL, NULL, '2022-04-06', '2022-05-23 06:12:35', '', '', 'fdzfdsfdsfdzfdzfzfd', 'asdasda', 'Screenshot_(1)1.png', 'Aspirasi', NULL, NULL, '0RV0P', '3', '2022-04-24 18:12:19', 2, 'Karena tidak memenuhi'),
(14, 26, NULL, NULL, '2022-05-14', '2022-05-23 06:12:48', 'Sarana & Prasarana', 'Kerusakan jalan', 'uhiuhiuhiuhi', 'Desa kertawangunan', 'Curriculum_vitae20221.docx', 'Aspirasi', NULL, NULL, 'P8LNX', '2', '2022-05-14 16:24:01', 1, NULL),
(24, 22, NULL, NULL, '2022-05-21', '2022-05-21 00:35:30', 'Sarana & Prasarana', 'Kerusakan jalan', 'tserwrwr', 'Desa kertawangunan', 'compress_IMG_20220519_0901464.jpg', 'Aduan', NULL, NULL, '00NT7', '1', '2022-05-21 00:09:11', 1, ''),
(25, 22, NULL, NULL, '2022-05-20', '2022-05-21 00:33:41', 'Sarana & Prasarana', 'Kerusakan jalan', 'asdeasdasda', 'Desa kertawangunan', 'Surat_Lamaran_STAFF_IT_(Adelia_Maulidia)1.pdf', 'Aspirasi', NULL, NULL, 'OPLPN', '1', '2022-05-21 00:10:42', 0, NULL),
(26, 22, NULL, NULL, '2022-05-20', '2022-05-21 00:19:30', 'Kesehatan', 'Gizi Buruk', 'udifdsfksdfsdfs', 'sfsdfsdfsdfsd', 'Surat_Lamaran_STAFF_IT_(Adelia_Maulidia)1.pdf', 'Aspirasi', NULL, NULL, 'CB8K0', '1', '2022-05-21 00:19:30', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `balas_aduan`
--

CREATE TABLE `balas_aduan` (
  `id` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `d11` int(11) NOT NULL,
  `d12` int(11) NOT NULL,
  `d13` int(11) NOT NULL,
  `d14` int(11) NOT NULL,
  `d21` int(11) NOT NULL,
  `d22` int(11) NOT NULL,
  `d23` int(11) NOT NULL,
  `d31` int(11) NOT NULL,
  `d32` int(11) NOT NULL,
  `d33` int(11) NOT NULL,
  `p4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `balas_aduan`
--

INSERT INTO `balas_aduan` (`id`, `id_aduan`, `d11`, `d12`, `d13`, `d14`, `d21`, `d22`, `d23`, `d31`, `d32`, `d33`, `p4`) VALUES
(4, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 7, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(9, 9, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0),
(10, 10, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 11, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `id_admin1` int(11) NOT NULL,
  `id_admin2` int(11) DEFAULT NULL,
  `pelapor` int(11) DEFAULT NULL,
  `chat` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_chat` int(11) NOT NULL DEFAULT 0,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelapor`
--

CREATE TABLE `pelapor` (
  `id_pelapor` int(11) NOT NULL,
  `nama_pelapor` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `no_id` varchar(11) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelapor`
--

INSERT INTO `pelapor` (`id_pelapor`, `nama_pelapor`, `no_telp`, `email`, `password`, `no_id`, `ktp`, `alamat`, `status`) VALUES
(22, 'Muhammad Jahidin', '0891234567', 'mujahid.tib2016@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '32012121212', '', '', 1),
(24, 'asd', '789879', 'ae@asda.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '6546456', '', 'fgfhfghfg', 1),
(25, 'asddsfsfs', '789879', 'ggggg@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '4354354353', 'icon-denah-lokasi3.png', 'dsgfdsgfdg', 1),
(26, 'Nur Kholis', '089123456789', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '12312321321', '20160810129_(1)1.jpg', 'rtetdrtdrtdrt', 1),
(27, 'Nur Kholis', '789879', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '54636364364', '20160810129_(1)3.jpg', 'tydrytfytfy', 1),
(28, 'Nur Kholis', '789879', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '5654654654', '20160810129_(1)5.jpg', 'rtertge', 1),
(29, 'Nur Kholis', '789879', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '43432432432', 'WhatsApp_Image_2022-05-07_at_19_55_561.jpeg', 'fgfdgfdgd', 1),
(30, 'Nur Kholiss', '789879', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '5353454353', '20160810129_(1)7.jpg', 'gchghgvhgv', 0),
(44, 'Nur Kholiss', '789879', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '12321321321', '20160810129_(1)33.jpg', 'fxgfdgfdgdfh', 1),
(45, 'Abdul Hamid', '978937482937', 'adun.gaming@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '874632238', 'heha-ocean-view-yogyakarta1.jpg', 'waledddd', 0),
(46, 'Abdul Hamid', '324234234324', 'adun.gaming@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '32432423432', 'Screenshot_(1)1.png', '324324234234erwew', 0),
(47, 'Abdul Hamid', '324234234324', 'adun.gaming@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '32432423432', 'Screenshot_(1)3.png', '324324234234erwew', 0),
(48, 'Ilham Panji G', '089123454678', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '02123432422', 'heha-ocean-view-yogyakarta3.jpg', 'ciledug', 0),
(49, 'Ilham Panji G', '443434343434', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '34243243242', 'heha-ocean-view-yogyakarta5.jpg', '2432432432ss', 0),
(50, 'Ilham Panji G', '43253254253', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '43543543534', 'heha-ocean-view-yogyakarta7.jpg', 't543trsterte', 0),
(51, 'Ilham Panji G', '345435435', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '3543543543', 'heha-ocean-view-yogyakarta9.jpg', 'gfdgfdgdgfg', 0),
(52, 'Ilham Panji G', '345435435', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '3543543543', 'heha-ocean-view-yogyakarta11.jpg', 'gfdgfdgdgfg', 0),
(53, 'Ilham Panji G', '345435435', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '3543543543', 'heha-ocean-view-yogyakarta13.jpg', 'gfdgfdgdgfg', 0),
(54, 'Ilham Panji G', '345435435', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '3543543543', 'heha-ocean-view-yogyakarta15.jpg', 'gfdgfdgdgfg', 0),
(55, 'Ilham Panji G', '345435435', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '3543543543', 'heha-ocean-view-yogyakarta17.jpg', 'gfdgfdgdgfg', 0),
(56, 'Ilham Panji G', '567657567', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '65765765765', 'heha-ocean-view-yogyakarta19.jpg', 'dstfdsfsdfdsfdsf', 0),
(57, 'Ilham Panji G', '567657567', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '65765765765', 'heha-ocean-view-yogyakarta21.jpg', 'dstfdsfsdfdsfdsf', 0),
(58, 'Ilham Panji G', '567657567', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '65765765765', 'heha-ocean-view-yogyakarta23.jpg', 'dstfdsfsdfdsfdsf', 0),
(59, 'Ilham Panji G', '567657567', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '65765765765', 'heha-ocean-view-yogyakarta25.jpg', 'dstfdsfsdfdsfdsf', 0),
(60, 'Ilham Panji G', '567657567', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '65765765765', 'heha-ocean-view-yogyakarta27.jpg', 'dstfdsfsdfdsfdsf', 0),
(61, 'Ilham Panji G', '567657567', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '65765765765', 'heha-ocean-view-yogyakarta29.jpg', 'dstfdsfsdfdsfdsf', 0),
(62, 'Ilham Panji G', '567657567', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '65765765765', 'heha-ocean-view-yogyakarta31.jpg', 'dstfdsfsdfdsfdsf', 0),
(63, 'Ilham Panji G', '567657567', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '65765765765', 'heha-ocean-view-yogyakarta33.jpg', 'dstfdsfsdfdsfdsf', 0),
(64, 'Ilham Panji G', '453543543', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '4354353', 'heha-ocean-view-yogyakarta35.jpg', '435435435', 0),
(65, 'Ilham Panji G', '453543543', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '4354353', 'heha-ocean-view-yogyakarta37.jpg', '435435435', 0),
(66, 'Ilham Panji G', '453543543', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '4354353', 'heha-ocean-view-yogyakarta39.jpg', '435435435', 0),
(67, 'Ilham Panji G', '453543543', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '4354353', 'heha-ocean-view-yogyakarta41.jpg', '435435435', 0),
(68, 'Ilham Panji G', '453543543', 'belajar.koding98@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '4354353', 'heha-ocean-view-yogyakarta43.jpg', '435435435', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(7) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama_lengkap`, `email`, `subjek`, `pesan`) VALUES
(1, 'sdfdsfsf', 'sdfdsf@sefresfres.com', 'dsfdsfsfs', 'sadasdsad'),
(2, 'sdfdsfsf', 'sdfdsf@sefresfres.com', 'dsfdsfsfs', '111111111111111'),
(3, 'sdfdsfsf', 'sdfdsf@sefresfres.com', 'dsfdsfsfs', '222222222222'),
(4, '111111', 'sdfdsf@sefresfres.com', '1111111', '111111111111111'),
(5, '111111', 'sdfdsf@sefresfres.com', '1111111', '111111111111111'),
(6, '111111', 'sdfdsf@sefresfres.com', '1111111', '111111111111111'),
(7, '111111', 'sdfdsf@sefresfres.com', '1111111', '111111111111111'),
(8, '111111', 'sdfdsf@sefresfres.com', '1111111', '77777777777777777'),
(9, '111111', 'sdfdsf@sefresfres.com', '2222222222222', 'ewrewrewrewrew'),
(10, 'sadsadsada', 'sdfdsf@sefresfres.com', '654654654654', '546546546546546'),
(11, '99999', 'sdfdsf@sefresfres.com', '999999999', '999999999'),
(12, '6666666', 'sdfdsf@sefresfres.com', '6666666666', '6666666');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_1`
--
ALTER TABLE `admin_1`
  ADD PRIMARY KEY (`id_admin1`);

--
-- Indeks untuk tabel `admin_2`
--
ALTER TABLE `admin_2`
  ADD PRIMARY KEY (`id_admin2`);

--
-- Indeks untuk tabel `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id_aduan`),
  ADD KEY `id_pelapor` (`id_pelapor`),
  ADD KEY `id_pelapor_2` (`id_pelapor`),
  ADD KEY `id_admin1` (`id_admin1`),
  ADD KEY `id_admin1_2` (`id_admin1`),
  ADD KEY `id_admin2` (`id_admin2`);

--
-- Indeks untuk tabel `balas_aduan`
--
ALTER TABLE `balas_aduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelapor`
--
ALTER TABLE `pelapor`
  ADD PRIMARY KEY (`id_pelapor`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_1`
--
ALTER TABLE `admin_1`
  MODIFY `id_admin1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `admin_2`
--
ALTER TABLE `admin_2`
  MODIFY `id_admin2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id_aduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `balas_aduan`
--
ALTER TABLE `balas_aduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `pelapor`
--
ALTER TABLE `pelapor`
  MODIFY `id_pelapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aduan`
--
ALTER TABLE `aduan`
  ADD CONSTRAINT `aduan_ibfk_1` FOREIGN KEY (`id_pelapor`) REFERENCES `pelapor` (`id_pelapor`),
  ADD CONSTRAINT `aduan_ibfk_2` FOREIGN KEY (`id_admin2`) REFERENCES `admin_2` (`id_admin2`),
  ADD CONSTRAINT `aduan_ibfk_3` FOREIGN KEY (`id_admin1`) REFERENCES `admin_1` (`id_admin1`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
