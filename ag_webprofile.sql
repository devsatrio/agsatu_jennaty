-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Mar 2020 pada 04.57
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
  `tampil` char(1) DEFAULT NULL,
  `website` enum('1','0') NOT NULL DEFAULT '0' COMMENT 'value 0 untuk website haji, 1 untuk website travel'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `judul`, `keterangan`, `gambar`, `tampil`, `website`) VALUES
(12, 'gambar 1', 'lorem ipsum', '1.jpg', '0', '0'),
(13, 'gambar 2', 'lorem ipsum', '2.jpg', '0', '0'),
(14, 'gambar 3', 'lorem ipsum', '4.jpg', '0', '0'),
(15, 'gambar 5', 'lorem ipsum', '5.jpg', '0', '1'),
(16, 'gambar 6', 'lorem ipsum', '12.jpg', '0', '1'),
(17, 'gambar 7', 'lorem ipsum', '10.jpg', '0', '1'),
(18, 'gambar 7', 'lorem ipsum', '9.jpg', '0', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id_halaman` int(11) NOT NULL,
  `nama_halaman` varchar(30) NOT NULL,
  `bentuk_halaman` tinyint(1) NOT NULL,
  `website` enum('0','1') DEFAULT '0' COMMENT '0 untuk website haji, 1 untuk website travel'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `nama_halaman`, `bentuk_halaman`, `website`) VALUES
(1, 'paket haji', 2, '0'),
(2, 'paket umroh', 2, '0'),
(3, 'tentang kami', 1, '0'),
(4, 'paket haji spesial', 1, '0'),
(6, 'profil travel', 1, '1'),
(7, 'paket wisata', 2, '1'),
(8, 'daftar cabang kami', 1, '1'),
(9, 'sewa mobil', 2, '1'),
(10, 'sewa bus', 2, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `website` enum('0','1') DEFAULT '0' COMMENT '0 untuk website haji, 1 untuk website travel'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `website`) VALUES
(16, 'berita', '0'),
(17, 'pengumuman', '0'),
(18, 'destinasi rekomendasi', '1');

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
  `gambar` varchar(100) NOT NULL,
  `website` enum('0','1') DEFAULT '0' COMMENT '0 untuk website haji, 1 untuk website travel'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `majemuk`
--

INSERT INTO `majemuk` (`id_majemuk`, `judul`, `tanggal`, `isi`, `id_halaman`, `gambar`, `website`) VALUES
(1, 'halo', '2020-03-03', '<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur? sakdfjks aklsdfjklsadjfklasj aksdjfklsajdfklsa lksjadfklsajdfkl klsjadfklsadf</div>', 2, 'c5b8f2fb9d1cee516d5e3d1dd56ab5af.jpg', '0'),
(2, 'halo 2', '2020-02-28', '<p>&nbsp;</p>\r\n<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur?</div>', 2, 'Capture.PNG', '0'),
(3, 'asdfa s ', '2020-03-04', '<p>asdf asdf sdaf saf asdf</p>', 1, '74-748606_city-blur.jpg', '0'),
(4, 'lorem ipsum', '2020-03-31', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>', 7, 'cat-post-1.jpg', '0'),
(5, 'lorem ipsum dolor', '2020-03-31', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>', 7, 'cat-post-3.jpg', '0'),
(7, 'lorem ipsum dolor sir amet ', '2020-03-13', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>', 7, 'causes-1.jpg', '0'),
(8, 'mobil satu', '2020-03-31', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>', 9, 'product6.png', '0'),
(9, 'mobil dua', '2020-03-31', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>', 9, 'product5.png', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `id_halaman` int(11) NOT NULL,
  `website` enum('0','1') DEFAULT '0' COMMENT '0 untuk website haji, 1 untuk website travel'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `id_halaman`, `website`) VALUES
(1, 'tentang kami', 3, '0'),
(2, 'paket umroh', 2, '0'),
(3, 'paket haji', 0, '0'),
(9, 'paket wisata', 7, '1'),
(8, 'tentang kami', 0, '1'),
(10, 'sewa mobil / bus', 0, '1');

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
  `website` enum('0','1') DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id_post`, `id_kategori`, `judul`, `tanggal`, `isi`, `gambar`, `tampil`, `website`) VALUES
(8, 16, 'artikel 1', '2020-03-30', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae sed, accusamus nemo quasi saepe asperiores expedita ut voluptatibus cum ipsum, amet assumenda. Similique, cum reiciendis expedita eum harum provident iste.&nbsp;Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae sed, accusamus nemo quasi saepe asperiores expedita ut voluptatibus cum ipsum, amet assumenda. Similique, cum reiciendis expedita eum harum provident iste.</p>', 'blog1.png', 0, '0'),
(9, 17, 'artikel 2', '2020-03-30', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae sed, accusamus nemo quasi saepe asperiores expedita ut voluptatibus cum ipsum, amet assumenda. Similique, cum reiciendis expedita eum harum provident iste.&nbsp;Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae sed, accusamus nemo quasi saepe asperiores expedita ut voluptatibus cum ipsum, amet assumenda. Similique, cum reiciendis expedita eum harum provident iste.</p>', 'blog2.png', 0, '0'),
(10, 18, 'artikel 1 travel', '2020-03-30', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae sed, accusamus nemo quasi saepe asperiores expedita ut voluptatibus cum ipsum, amet assumenda. Similique, cum reiciendis expedita eum harum provident iste.&nbsp;Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae sed, accusamus nemo quasi saepe asperiores expedita ut voluptatibus cum ipsum, amet assumenda. Similique, cum reiciendis expedita eum harum provident iste.</p>', 'blog3.png', 0, '1'),
(11, 18, 'artikel travel', '2020-03-31', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>', 'blog_1.jpg', 0, '1'),
(12, 18, 'artikel travel lagi', '2020-03-31', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>', 'about_1.png', 0, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `url_gambar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `link` text DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `website` enum('0','1') DEFAULT '0' COMMENT '0 untuk website haji, 1 untuk website travel'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `url_gambar`, `keterangan`, `link`, `judul`, `website`) VALUES
(6, 'aot_10.png', 'kasdf asdfj askdf', '', 'travel mantab jiwa', '1'),
(7, 'building-apps-app-builder.jpg', 'Lorem ipsum dolor sit amet consectetur, sit amet consectetur', '', 'Haji jadi makin berkah', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_submenu` varchar(30) NOT NULL,
  `id_halaman` int(11) NOT NULL,
  `website` enum('0','1') DEFAULT '0' COMMENT '0 untuk website haji, 1 untuk website travel'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `nama_submenu`, `id_halaman`, `website`) VALUES
(1, 3, 'list paket haji', 1, '0'),
(2, 3, 'paket haji spesial', 4, '0'),
(6, 8, 'tentang kami', 6, '1'),
(7, 8, 'daftar cabang kami', 8, '1'),
(8, 10, 'sewa mobil', 9, '1'),
(9, 10, 'sewa bus', 10, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunggal`
--

CREATE TABLE `tunggal` (
  `id_tunggal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `id_halaman` int(11) NOT NULL,
  `website` enum('0','1') DEFAULT NULL COMMENT '0 untuk website haji, 1 untuk website travel'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tunggal`
--

INSERT INTO `tunggal` (`id_tunggal`, `tanggal`, `isi`, `gambar`, `id_halaman`, `website`) VALUES
(1, '2020-03-21', '', '', 1, NULL),
(2, '2020-03-21', '', '', 2, NULL),
(3, '2020-03-21', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../../tpl_admin/tinymce/plugins/image/../../../../gambar/slider/aot_10.png\" alt=\"\" width=\"818\" height=\"413\" /></p>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt fugit optio sunt, iure ratione sint ut nemo harum voluptatum in velit quod officiis tenetur consequuntur nobis illo architecto asperiores assumenda?&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt fugit optio sunt, iure ratione sint ut nemo harum voluptatum in velit quod officiis tenetur consequuntur nobis illo architecto asperiores assumenda?&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt fugit optio sunt, iure ratione sint ut nemo harum voluptatum in velit quod officiis tenetur consequuntur nobis illo architecto asperiores assumenda?</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt fugit optio sunt, iure ratione sint ut nemo harum voluptatum in velit quod officiis tenetur consequuntur nobis illo architecto asperiores assumenda?&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt fugit optio sunt, iure ratione sint ut nemo harum voluptatum in velit quod officiis tenetur consequuntur nobis illo architecto asperiores assumenda?</p>', '', 3, NULL),
(4, '2020-03-21', '<div><img src=\"../../../tpl_admin/tinymce/plugins/image/../../../../gambar/slider/125.jpg\" alt=\"\" width=\"2088\" height=\"491\" /></div>\r\n<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur?</div>\r\n<div>\r\n<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur?</div>\r\n<div>\r\n<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur?</div>\r\n<div>\r\n<div>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Incidunt,&nbsp;quae&nbsp;illum&nbsp;libero&nbsp;quos&nbsp;at,&nbsp;vero&nbsp;provident&nbsp;architecto&nbsp;obcaecati&nbsp;amet&nbsp;quam&nbsp;enim&nbsp;magni&nbsp;modi&nbsp;eum.&nbsp;A&nbsp;ut&nbsp;accusamus&nbsp;beatae&nbsp;esse&nbsp;consectetur?</div>\r\n</div>\r\n</div>\r\n</div>', '', 4, NULL),
(5, '2020-03-27', '', '', 5, NULL),
(6, '2020-03-30', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../../tpl_admin/tinymce/plugins/image/../../../../gambar/post/blog2.png\" alt=\"\" width=\"487\" height=\"338\" /></p>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>', '', 6, NULL),
(7, '2020-03-31', '', '', 7, NULL),
(8, '2020-03-31', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fuga odio! Nisi, impedit ducimus! Ipsum incidunt error aliquid tempora nemo ab vel voluptate iure laudantium neque, distinctio nisi amet itaque.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>lorem ipsum</li>\r\n<li>lorem ipsum</li>\r\n<li>lorem ipsum</li>\r\n</ul>', '', 8, NULL),
(9, '2020-03-31', '', '', 9, NULL),
(10, '2020-03-31', '', '', 10, NULL);

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
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id_halaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `majemuk`
--
ALTER TABLE `majemuk`
  MODIFY `id_majemuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tunggal`
--
ALTER TABLE `tunggal`
  MODIFY `id_tunggal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
