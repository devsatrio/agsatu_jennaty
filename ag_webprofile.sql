-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2020 pada 03.40
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ag_webprofile`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `level` enum('Admin','Super Admin') DEFAULT 'Admin',
  `notelp` varchar(20) DEFAULT NULL,
  `pass` text NOT NULL,
  `type` enum('admin','arsip','perpus') NOT NULL,
  `status` char(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `user`, `nama`, `level`, `notelp`, `pass`, `type`, `status`) VALUES
(6, 'jianfitri', 'jian fitri aprilia', 'Admin', '14046', '7c222fb2927d828af22f592134e8932480637c0d', 'admin', '1'),
(9, 'admin', 'admin', 'Super Admin', '01284390', '7c222fb2927d828af22f592134e8932480637c0d', 'admin', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tampil` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `judul`, `keterangan`, `gambar`, `tampil`) VALUES
(4, 'gambar 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit recusandae consequatur, autem, laboriosam quidem optio beatae veniam quas at, totam provident eligendi pariatur! Omnis doloremque magni impedit recusandae vel harum?\r\n', 'programmer.jpg', '0'),
(6, 'gambar 2', 'dsf', 'intuit_problem.png', '0'),
(7, 'gambar 3', 'asdf ', 'intuit_problem.png', '0'),
(8, 'gambar 4', 'asdf ', 'sdf.jpg', '0'),
(9, 'gambar 5', 'sadf sadf ', 'young-man-searching-for-jobs-vector.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id_halaman` int(11) NOT NULL,
  `nama_halaman` varchar(30) NOT NULL,
  `bentuk_halaman` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `nama_halaman`, `bentuk_halaman`) VALUES
(1, 'paket haji', 2),
(2, 'paket umroh', 2),
(3, 'tentang kami', 1),
(4, 'paket haji spesial', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(11, 'berita'),
(12, 'pengumuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `majemuk`
--

CREATE TABLE `majemuk` (
  `id_majemuk` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `id_halaman` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `majemuk`
--

INSERT INTO `majemuk` (`id_majemuk`, `judul`, `tanggal`, `isi`, `id_halaman`, `gambar`) VALUES
(1, 'halo', '2020-03-03', '<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur? sakdfjks aklsdfjklsadjfklasj aksdjfklsajdfklsa lksjadfklsajdfkl klsjadfklsadf</div>', 2, 'c5b8f2fb9d1cee516d5e3d1dd56ab5af.jpg'),
(2, 'halo 2', '2020-02-28', '<p>&nbsp;</p>\r\n<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur?</div>', 2, 'Capture.PNG'),
(3, 'asdfa s ', '2020-03-04', '<p>asdf asdf sdaf saf asdf</p>', 1, '74-748606_city-blur.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `id_halaman` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `id_halaman`) VALUES
(1, 'tentang kami', 3),
(2, 'paket umroh', 2),
(3, 'paket haji', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tampil` tinyint(1) NOT NULL,
  `tempat` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id_post`, `id_kategori`, `judul`, `tanggal`, `isi`, `gambar`, `tampil`, `tempat`) VALUES
(1, 12, 'coba artikel', '2020-03-21', '<p>sadf sadf asdf asdf safd asdjf sdfkjsdklf dsafj kfjsklda flksdajfklsadf lkdsajf klsadjf sdlkkfjsdakf skafjkslaf skdafjklsdfjkldsafj klsajdfklsdjfklsdjfklsa fklsadjfklsajfklsadjf klsjfklsdjfklsjdf klsdjkf </p>', '', 0, ''),
(2, 11, 'asdfsaf', '2020-03-21', '<p>cob coba</p>', 'sss.PNG', 0, ''),
(3, 12, 'sdfsadf', '2020-03-21', '<p>sadf sasdf sa</p>', 'aot_4.png', 0, ''),
(4, 12, 'dsfasd', '2020-03-24', '<p>sadf asd fas sadfsdf asdf&nbsp;</p>', 'sdf.jpg', 0, ''),
(5, 12, 'dsaf ', '2020-03-24', '<p>asdfsad fsad fsa&nbsp;</p>', 'how-to-build-a-mobile-app-from-the-ground-up.jpg', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `url_gambar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `link` text DEFAULT NULL,
  `judul` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `url_gambar`, `keterangan`, `link`, `judul`) VALUES
(2, 'aot.jpg', 'asdfsaf', 'asdf', 'asdf'),
(4, 'building-apps-app-builder.jpg', 'lorem ipsum dolor', 'http://localhost/phpmyadmin', 'slider satu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_submenu` varchar(30) NOT NULL,
  `id_halaman` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `nama_submenu`, `id_halaman`) VALUES
(1, 3, 'list paket haji', 1),
(2, 3, 'paket haji spesial', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunggal`
--

CREATE TABLE `tunggal` (
  `id_tunggal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `id_halaman` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tunggal`
--

INSERT INTO `tunggal` (`id_tunggal`, `tanggal`, `isi`, `gambar`, `id_halaman`) VALUES
(1, '2020-03-21', '', '', 1),
(2, '2020-03-21', '', '', 2),
(3, '2020-03-21', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../../tpl_admin/tinymce/plugins/image/../../../../gambar/galeri/programmer.jpg\" alt=\"\" width=\"535\" height=\"535\" /></p>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate cum qui nesciunt atque dicta deserunt debitis consectetur doloribus! Dolor mollitia, autem molestias accusamus nemo velit repudiandae tenetur nihil quo quasi! sdf sadfsad sdafs afsdf&nbsp;</p>', '', 3),
(4, '2020-03-21', '<div><img src=\"../../../tpl_admin/tinymce/plugins/image/../../../../gambar/slider/125.jpg\" alt=\"\" width=\"2088\" height=\"491\" /></div>\r\n<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur?</div>\r\n<div>\r\n<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur?</div>\r\n<div>\r\n<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur?</div>\r\n<div>\r\n<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur?</div>\r\n</div>\r\n</div>\r\n</div>', '', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `majemuk`
--
ALTER TABLE `majemuk`
  ADD PRIMARY KEY (`id_majemuk`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indeks untuk tabel `tunggal`
--
ALTER TABLE `tunggal`
  ADD PRIMARY KEY (`id_tunggal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id_halaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `majemuk`
--
ALTER TABLE `majemuk`
  MODIFY `id_majemuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tunggal`
--
ALTER TABLE `tunggal`
  MODIFY `id_tunggal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
