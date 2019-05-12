-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2019 pada 02.33
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin123', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `jenis`, `harga`, `foto`) VALUES
(1, 'Tanderloin Steak', 'Steak ', '42.500', ''),
(2, 'Sirloin Steak', 'Steak', '30000', ''),
(3, 'Rool-Beef Steak', 'Steak', '40000', ''),
(4, 'Dory Steak Original', 'Steak', '39000', ''),
(5, 'Dory Steak Crispy', 'Steak', '28000', ''),
(6, 'Chicken Steak Mozarella', 'Steak', '36000', ''),
(7, 'Chicken Steak Original ', 'Steak', '31000', ''),
(8, 'Chicken Chop', 'steak', '29000', ''),
(9, 'Kere Steak', 'Steak', '22500', ''),
(10, 'Rice Beef Black Pepper', 'Hotplate', '26500', ''),
(11, 'Rice Chicken Black Pepper', 'Hotplate', '23500', ''),
(12, 'Rice Dory Black Pepper', 'Hotplate', '26500', ''),
(13, 'Noodle Beef Black Pepper', 'Hotplate', '26500', ''),
(14, 'Noodle Chicken Black Pepper', 'Hotplate', '23500', ''),
(15, 'Noodle Black Pepper', 'Hotplate', '18000', ''),
(16, 'Nasi Goreng Kampung', 'Nasgor', '18000', ''),
(17, 'Nasi Goreng Butir Emas', 'Nasgor', '18000', ''),
(18, 'Nasi Goreng Ndoweah ', 'Nasgor', '18000', ''),
(19, 'Nasi Goreng Rendang', 'Nasgor', '22000', ''),
(20, 'Nasi Goreng Telur Asin', 'Nasgor', '25000', ''),
(21, 'Nasi Goreng Ikan Asin', 'Nasgor', '20000', ''),
(22, 'Nasi Goreng Yongchow', 'Nasgor', '22000', ''),
(23, 'Nasi Goreng Hijau', 'Nasgor', '20000', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `judul_promo` varchar(200) NOT NULL,
  `detail_promo` varchar(10000) NOT NULL,
  `gambar_promo` varchar(200) NOT NULL,
  `code_promo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_listmenu`
--

CREATE TABLE `tb_listmenu` (
  `id_listmenu` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_listmenu`
--

INSERT INTO `tb_listmenu` (`id_listmenu`, `gambar`) VALUES
(1, 'steak.png'),
(2, 'hotplate.png'),
(3, 'nasgor.png'),
(4, 'mie.png'),
(5, 'bakar.png'),
(6, 'soup.png'),
(7, 'rp.png'),
(8, 'snack.png'),
(9, 'drink.png'),
(10, 'milkshake.png'),
(11, 'coffe.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `Alamat` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `Alamat`, `phone`, `email`, `salt`) VALUES
(1, 'Karina', '171017', 'jl.kayun01', '085335911590', 'nandaryza@gmail.com', ''),
(2, 'admin', 'admin', 'kayun', '085335911590', '', ''),
(3, 'admin', 'admin', 'kayun', '085335911590', '', ''),
(4, 'admin', '', 'kayun', '085335911590', '', ''),
(5, '', '', '', '', '', ''),
(6, '', '', '', '', '', ''),
(7, '', '', '', '', '', ''),
(8, 'nana', '221297', 'benowo', '09847448t5', 'nana@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_listmenu`
--
ALTER TABLE `tb_listmenu`
  ADD PRIMARY KEY (`id_listmenu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_listmenu`
--
ALTER TABLE `tb_listmenu`
  MODIFY `id_listmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
