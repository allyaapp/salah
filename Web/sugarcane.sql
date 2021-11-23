-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2021 pada 23.57
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sugarcane`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admindetail`
--

CREATE TABLE `admindetail` (
  `id_admin` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admindetail`
--

INSERT INTO `admindetail` (`id_admin`, `fullname`, `no_hp`, `alamat`, `username`, `password`, `role`) VALUES
(1, 'Vasyilla Kautsar', '089665566774', 'dfjabjbahfljahf', 'syilla', 'syilla', 1),
(2, 'Nanda Arsya', '081251728192', 'Jl.Manggar Gg. Tugu', 'dzikri', 'dzikri', 2),
(3, 'Sofia Ufaira', '088898765676', 'dfahgfkjad', 'sofia', 'sofia', 2),
(4, 'Dzikri Abyudzaky', '088821345162', 'jfkjafkfkaj', 'dzikri', 'dzikri', 2),
(5, 'Naila Khansa', '081627391527', 'Jl.Branjangan Semenggu', 'naila', 'naila', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `varian` enum('Coklat','Strawberry','Vanilla Oreo','') NOT NULL,
  `ukuran` enum('Small','Large') NOT NULL,
  `id_detailbarang` int(1) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `varian`, `ukuran`, `id_detailbarang`, `stok`) VALUES
(1, 'Coklat', 'Small', 1, 100),
(2, 'Coklat', 'Small', 2, 75),
(3, 'Coklat', 'Small', 3, 80),
(4, 'Coklat', 'Small', 4, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailbarang`
--

CREATE TABLE `detailbarang` (
  `id_detailbarang` int(1) NOT NULL,
  `varianukuran` varchar(4) NOT NULL,
  `harga` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailbarang`
--

INSERT INTO `detailbarang` (`id_detailbarang`, `varianukuran`, `harga`) VALUES
(1, '2 oz', 3000),
(2, '4 oz', 4000),
(3, '5 oz', 5000),
(4, '8 oz', 8000),
(5, '12 o', 10000),
(6, '16 o', 18000),
(7, '26oz', 28000),
(8, '32oz', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpemesanan`
--

CREATE TABLE `detailpemesanan` (
  `id_detailpesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_detailpesanan` int(5) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `total` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `alamat`, `no_hp`, `username`, `password`) VALUES
(1, 'Nur Allya', 'Bali', '08123456789', 'allya', 'allya');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admindetail`
--
ALTER TABLE `admindetail`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_detailbarang` (`id_detailbarang`);

--
-- Indeks untuk tabel `detailbarang`
--
ALTER TABLE `detailbarang`
  ADD PRIMARY KEY (`id_detailbarang`);

--
-- Indeks untuk tabel `detailpemesanan`
--
ALTER TABLE `detailpemesanan`
  ADD PRIMARY KEY (`id_detailpesanan`),
  ADD KEY `id_user` (`id_user`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_detailpesanan` (`id_detailpesanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admindetail`
--
ALTER TABLE `admindetail`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_detailbarang`) REFERENCES `detailbarang` (`id_detailbarang`);

--
-- Ketidakleluasaan untuk tabel `detailpemesanan`
--
ALTER TABLE `detailpemesanan`
  ADD CONSTRAINT `detailpemesanan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `detailpemesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_detailpesanan`) REFERENCES `detailpemesanan` (`id_detailpesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
