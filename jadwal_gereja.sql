-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Jun 2024 pada 15.13
-- Versi server: 10.6.18-MariaDB-cll-lve
-- Versi PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjadwa_db2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(128) NOT NULL,
  `hari` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `pelayan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama_kegiatan`, `hari`, `tanggal`, `pelayan`) VALUES
(1, 'Ibadah Pemuda/i', 'Saturday', '2024-06-01', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Intan Riski\"],\"Pemain Musik\":[\"Kukut Harimasta\",\"Iman\",\"Rajak Djikarta \",\"Petrus\"],\"Kantong Kolekte\":[\"Eli\"]}'),
(2, 'Ibadah Hari Minggu Sesi 2', 'Sunday', '2024-06-02', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Rahel\"],\"Pemain Musik\":[\"Buyung\",\"Sudirman\",\"Maro\",\"Wawan\"],\"Kantong Kolekte\":[\"Ayu\",\"Sulian\",\"Dede\"],\"Singer\":[\"Winda\",\"Hesta\",\"Yeni\",\"Chelsi\",\"Jennie\"],\"Penari Thamborin\":[\"Bella\",\"Marta\",\"Anggi\",\"Kris\",\"Delia\"],\"Pembaca Nabuatan\":[\"Vina\",\"Aje\"],\"Operator Slide\":[\"Kelvin\"]}'),
(3, 'Ibadah Hari Minggu Sesi 1', 'Sunday', '2024-06-02', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Hesti\"],\"Pemain Musik\":[\"Rony\",\"Donot\",\"Momo\",\"Bombot\"],\"Kantong Kolekte\":[\"Oktavians Nabo\",\"Eli\",\"Ayu\"],\"Singer\":[\"Asa Gloria\",\"Nanda\",\"Lita\",\"Ratna\",\"Sheril\"],\"Penari Thamborin\":[\"Marshanda\",\"Levina\",\"Tiara\",\"Lia \",\"Indah\"],\"Pembaca Nabuatan\":[\"Ogi\",\"Anjas\"],\"Operator Slide\":[\"Candra Gusti\"]}'),
(4, 'Waktu Gembira', 'Thursday', '2024-06-06', '{\"Pemain Musik\":[\"Petrus Tanto\",\"Indra Kusuma\",\"Aga\",\"Billy\"],\"Kantong Kolekte\":[\"Sulian\"],\"Operator Slide\":[\"Steven\"],\"Mentor\":[\"Mentor\"]}'),
(5, 'Ibadah Keluarga', 'Friday', '2024-06-07', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Yeremia\"],\"Pemain Musik\":[\"Langko\",\"Tanto\"]}'),
(6, 'Ibadah Pemuda/i', 'Saturday', '2024-06-08', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Soya\"],\"Pemain Musik\":[\"Kukut Harimasta\",\"Iman\",\"Rajak Djikarta \",\"Petrus\"],\"Kantong Kolekte\":[\"Dede\"]}'),
(7, 'Ibadah Hari Minggu Sesi 2', 'Sunday', '2024-06-09', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Intan Riski\"],\"Pemain Musik\":[\"Buyung\",\"Sudirman\",\"Maro\",\"Wawan\"],\"Kantong Kolekte\":[\"Oktavians Nabo\",\"Eli\",\"Ayu\"],\"Singer\":[\"Winda\",\"Hesta\",\"Yeni\",\"Chelsi\",\"Jennie\"],\"Penari Thamborin\":[\"Bella\",\"Marta\",\"Anggi\",\"Kris\",\"Delia\"],\"Pembaca Nabuatan\":[\"Erdi\",\"Vina\"],\"Operator Slide\":[\"Malinus\"]}'),
(8, 'Ibadah Hari Minggu Sesi 1', 'Sunday', '2024-06-09', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Rahel\"],\"Pemain Musik\":[\"Rony\",\"Donot\",\"Momo\",\"Bombot\"],\"Kantong Kolekte\":[\"Sulian\",\"Dede\",\"Oktavians Nabo\"],\"Singer\":[\"Asa Gloria\",\"Nanda\",\"Lita\",\"Ratna\",\"Sheril\"],\"Penari Thamborin\":[\"Marshanda\",\"Levina\",\"Tiara\",\"Lia \",\"Indah\"],\"Pembaca Nabuatan\":[\"Aje\",\"Ogi\"],\"Operator Slide\":[\"Tono\"]}'),
(9, 'Waktu Gembira', 'Thursday', '2024-06-13', '{\"Pemain Musik\":[\"Petrus Tanto\",\"Indra Kusuma\",\"Aga\",\"Billy\"],\"Kantong Kolekte\":[\"Eli\"],\"Operator Slide\":[\"Kelvin\"],\"Mentor\":[\"Mentor\"]}'),
(10, 'Ibadah Keluarga', 'Friday', '2024-06-14', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Hesti\"],\"Pemain Musik\":[\"Langko\",\"Tanto\"]}'),
(11, 'Ibadah Pemuda/i', 'Saturday', '2024-06-15', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Yeremia\"],\"Pemain Musik\":[\"Kukut Harimasta\",\"Iman\",\"Rajak Djikarta \",\"Petrus\"],\"Kantong Kolekte\":[\"Ayu\"]}'),
(12, 'Ibadah Hari Minggu Sesi 2', 'Sunday', '2024-06-16', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Soya\"],\"Pemain Musik\":[\"Buyung\",\"Sudirman\",\"Maro\",\"Wawan\"],\"Kantong Kolekte\":[\"Sulian\",\"Dede\",\"Oktavians Nabo\"],\"Singer\":[\"Winda\",\"Hesta\",\"Yeni\",\"Chelsi\",\"Jennie\"],\"Penari Thamborin\":[\"Bella\",\"Marta\",\"Anggi\",\"Kris\",\"Delia\"],\"Pembaca Nabuatan\":[\"Anjas\",\"Erdi\"],\"Operator Slide\":[\"Candra Gusti\"]}'),
(13, 'Ibadah Hari Minggu Sesi 1', 'Sunday', '2024-06-16', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Intan Riski\"],\"Pemain Musik\":[\"Rony\",\"Donot\",\"Momo\",\"Bombot\"],\"Kantong Kolekte\":[\"Eli\",\"Ayu\",\"Sulian\"],\"Singer\":[\"Asa Gloria\",\"Nanda\",\"Lita\",\"Ratna\",\"Sheril\"],\"Penari Thamborin\":[\"Marshanda\",\"Levina\",\"Tiara\",\"Lia \",\"Indah\"],\"Pembaca Nabuatan\":[\"Vina\",\"Aje\"],\"Operator Slide\":[\"Steven\"]}'),
(14, 'Waktu Gembira', 'Thursday', '2024-06-20', '{\"Pemain Musik\":[\"Petrus Tanto\",\"Indra Kusuma\",\"Aga\",\"Billy\"],\"Kantong Kolekte\":[\"Dede\"],\"Operator Slide\":[\"Malinus\"],\"Mentor\":[\"Mentor\"]}'),
(15, 'Ibadah Keluarga', 'Friday', '2024-06-21', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Rahel\"],\"Pemain Musik\":[\"Langko\",\"Tanto\"]}'),
(16, 'Ibadah Pemuda/i', 'Saturday', '2024-06-22', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Hesti\"],\"Pemain Musik\":[\"Kukut Harimasta\",\"Iman\",\"Rajak Djikarta \",\"Petrus\"],\"Kantong Kolekte\":[\"Oktavians Nabo\"]}'),
(17, 'Ibadah Hari Minggu Sesi 2', 'Sunday', '2024-06-23', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Yeremia\"],\"Pemain Musik\":[\"Buyung\",\"Sudirman\",\"Maro\",\"Wawan\"],\"Kantong Kolekte\":[\"Eli\",\"Ayu\",\"Sulian\"],\"Singer\":[\"Winda\",\"Hesta\",\"Yeni\",\"Chelsi\",\"Jennie\"],\"Penari Thamborin\":[\"Bella\",\"Marta\",\"Anggi\",\"Kris\",\"Delia\"],\"Pembaca Nabuatan\":[\"Ogi\",\"Anjas\"],\"Operator Slide\":[\"Tono\"]}'),
(18, 'Ibadah Hari Minggu Sesi 1', 'Sunday', '2024-06-23', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Soya\"],\"Pemain Musik\":[\"Rony\",\"Donot\",\"Momo\",\"Bombot\"],\"Kantong Kolekte\":[\"Dede\",\"Oktavians Nabo\",\"Eli\"],\"Singer\":[\"Asa Gloria\",\"Nanda\",\"Lita\",\"Ratna\",\"Sheril\"],\"Penari Thamborin\":[\"Marshanda\",\"Levina\",\"Tiara\",\"Lia \",\"Indah\"],\"Pembaca Nabuatan\":[\"Erdi\",\"Vina\"],\"Operator Slide\":[\"Kelvin\"]}'),
(19, 'Waktu Gembira', 'Thursday', '2024-06-27', '{\"Pemain Musik\":[\"Petrus Tanto\",\"Indra Kusuma\",\"Aga\",\"Billy\"],\"Kantong Kolekte\":[\"Ayu\"],\"Operator Slide\":[\"Candra Gusti\"],\"Mentor\":[\"Mentor\"]}'),
(20, 'Ibadah Keluarga', 'Friday', '2024-06-28', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Intan Riski\"],\"Pemain Musik\":[\"Langko\",\"Tanto\"]}'),
(21, 'Ibadah Pemuda/i', 'Saturday', '2024-06-29', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Rahel\"],\"Pemain Musik\":[\"Kukut Harimasta\",\"Iman\",\"Rajak Djikarta \",\"Petrus\"],\"Kantong Kolekte\":[\"Sulian\"]}'),
(22, 'Ibadah Hari Minggu Sesi 2', 'Sunday', '2024-06-30', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Hesti\"],\"Pemain Musik\":[\"Buyung\",\"Sudirman\",\"Maro\",\"Wawan\"],\"Kantong Kolekte\":[\"Dede\",\"Oktavians Nabo\",\"Eli\"],\"Singer\":[\"Winda\",\"Hesta\",\"Yeni\",\"Chelsi\",\"Jennie\"],\"Penari Thamborin\":[\"Bella\",\"Marta\",\"Anggi\",\"Kris\",\"Delia\"],\"Pembaca Nabuatan\":[\"Aje\",\"Ogi\"],\"Operator Slide\":[\"Steven\"]}'),
(23, 'Ibadah Hari Minggu Sesi 1', 'Sunday', '2024-06-30', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Yeremia\"],\"Pemain Musik\":[\"Rony\",\"Donot\",\"Momo\",\"Bombot\"],\"Kantong Kolekte\":[\"Ayu\",\"Sulian\",\"Dede\"],\"Singer\":[\"Asa Gloria\",\"Nanda\",\"Lita\",\"Ratna\",\"Sheril\"],\"Penari Thamborin\":[\"Marshanda\",\"Levina\",\"Tiara\",\"Lia \",\"Indah\"],\"Pembaca Nabuatan\":[\"Anjas\",\"Erdi\"],\"Operator Slide\":[\"Malinus\"]}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_rules`
--

CREATE TABLE `jadwal_rules` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(128) NOT NULL,
  `hari` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `deskripsi` text NOT NULL,
  `pelayan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_rules`
--

INSERT INTO `jadwal_rules` (`id`, `nama_kegiatan`, `hari`, `jam_mulai`, `jam_selesai`, `deskripsi`, `pelayan`) VALUES
(30, 'Ibadah Hari Minggu Sesi 2', 'Sunday', '09:00:00', '12:00:00', 'Ibadah Hari Minggu', '[{\"pelayan\":\"Khotbah\",\"jumlah\":\"1\"},{\"pelayan\":\"Pembawa Acara\",\"jumlah\":\"1\"},{\"pelayan\":\"Pemain Musik\",\"jumlah\":\"4\"},{\"pelayan\":\"Kantong Kolekte\",\"jumlah\":\"3\"},{\"pelayan\":\"Singer\",\"jumlah\":\"5\"},{\"pelayan\":\"Penari Thamborin\",\"jumlah\":\"5\"},{\"pelayan\":\"Pembaca Nabuatan\",\"jumlah\":\"2\"},{\"pelayan\":\"Operator Slide\",\"jumlah\":\"1\"},{\"pelayan\":\"Mentor\",\"jumlah\":\"0\"}]'),
(31, 'Ibadah Hari Minggu Sesi 1', 'Sunday', '13:00:00', '15:00:00', 'Ibadah Hari Minggu Sesi 1', '[{\"pelayan\":\"Khotbah\",\"jumlah\":\"1\"},{\"pelayan\":\"Pembawa Acara\",\"jumlah\":\"1\"},{\"pelayan\":\"Pemain Musik\",\"jumlah\":\"4\"},{\"pelayan\":\"Kantong Kolekte\",\"jumlah\":\"3\"},{\"pelayan\":\"Singer\",\"jumlah\":\"5\"},{\"pelayan\":\"Penari Thamborin\",\"jumlah\":\"5\"},{\"pelayan\":\"Pembaca Nabuatan\",\"jumlah\":\"2\"},{\"pelayan\":\"Operator Slide\",\"jumlah\":\"1\"},{\"pelayan\":\"Mentor\",\"jumlah\":\"0\"}]'),
(32, 'Ibadah Pemuda/i', 'Saturday', '19:00:00', '21:00:00', 'Ibadah Pemuda/i', '[{\"pelayan\":\"Khotbah\",\"jumlah\":\"1\"},{\"pelayan\":\"Pembawa Acara\",\"jumlah\":\"1\"},{\"pelayan\":\"Pemain Musik\",\"jumlah\":\"4\"},{\"pelayan\":\"Kantong Kolekte\",\"jumlah\":\"1\"},{\"pelayan\":\"Singer\",\"jumlah\":\"0\"},{\"pelayan\":\"Penari Thamborin\",\"jumlah\":\"0\"},{\"pelayan\":\"Pembaca Nabuatan\",\"jumlah\":\"0\"},{\"pelayan\":\"Operator Slide\",\"jumlah\":\"0\"},{\"pelayan\":\"Mentor\",\"jumlah\":\"0\"}]'),
(33, 'Ibadah Keluarga', 'Friday', '19:00:00', '20:00:00', 'Ibadah Keluarga', '[{\"pelayan\":\"Khotbah\",\"jumlah\":\"1\"},{\"pelayan\":\"Pembawa Acara\",\"jumlah\":\"1\"},{\"pelayan\":\"Pemain Musik\",\"jumlah\":\"2\"},{\"pelayan\":\"Kantong Kolekte\",\"jumlah\":\"0\"},{\"pelayan\":\"Singer\",\"jumlah\":\"0\"},{\"pelayan\":\"Penari Thamborin\",\"jumlah\":\"0\"},{\"pelayan\":\"Pembaca Nabuatan\",\"jumlah\":\"0\"},{\"pelayan\":\"Operator Slide\",\"jumlah\":\"0\"},{\"pelayan\":\"Mentor\",\"jumlah\":\"0\"}]'),
(34, 'Waktu Gembira', 'Thursday', '15:00:00', '17:00:00', 'Waktu Gembira', '[{\"pelayan\":\"Khotbah\",\"jumlah\":\"0\"},{\"pelayan\":\"Pembawa Acara\",\"jumlah\":\"0\"},{\"pelayan\":\"Pemain Musik\",\"jumlah\":\"4\"},{\"pelayan\":\"Kantong Kolekte\",\"jumlah\":\"1\"},{\"pelayan\":\"Singer\",\"jumlah\":\"0\"},{\"pelayan\":\"Penari Thamborin\",\"jumlah\":\"0\"},{\"pelayan\":\"Pembaca Nabuatan\",\"jumlah\":\"0\"},{\"pelayan\":\"Operator Slide\",\"jumlah\":\"1\"},{\"pelayan\":\"Mentor\",\"jumlah\":\"1\"}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `majelis`
--

CREATE TABLE `majelis` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `first_failed_login` datetime DEFAULT NULL,
  `failed_login_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `majelis`
--

INSERT INTO `majelis` (`id`, `name`, `email`, `password`, `image`, `date_created`, `first_failed_login`, `failed_login_count`) VALUES
(1, 'adminn', 'demo@demo.com', '$2y$10$sCiRR7yly84CNt/GvrzbJenKdBnnMSaruiEaJH0leSzgCUOA6yTGW', 'https://penjadwalan-ibadah-gereja.my.id/assets/img/1711642320604.png', '2023-03-27 05:08:02', NULL, 0),
(4, 'admin2', 'diegoiman60@gmail.com', '$2y$10$Cb/rBhqphdlvrB4MreMzjeuq8q1ho1VMLItEGr4Czd37nKghK3jAO', 'assets/img/1711648666089.jpg', '2024-04-25 08:18:04', '2024-05-30 08:09:15', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayan`
--

CREATE TABLE `pelayan` (
  `id` int(11) NOT NULL,
  `id_pelayan_category` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `status` enum('Kaum Ayah','Kaum Ibu','Pemuda/i','Anak-anak') NOT NULL,
  `list_jadwal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelayan`
--

INSERT INTO `pelayan` (`id`, `id_pelayan_category`, `nama`, `jenis_kelamin`, `status`, `list_jadwal`) VALUES
(1, 1, 'Pdt. Toni Laman', 'Laki-laki', 'Kaum Ayah', '01,02,08,09,15,16,22,23,29,30'),
(2, 1, 'Pdt.Dody Kurniawan', 'Laki-laki', 'Pemuda/i', '02,07,09,14,16,21,23,28,30'),
(3, 2, 'Intan Riski', 'Perempuan', 'Pemuda/i', '01,09,16,28'),
(4, 2, 'Rahel', 'Perempuan', 'Pemuda/i', '02,09,21,29'),
(5, 2, 'Hesti', 'Perempuan', 'Pemuda/i', '02,14,22,30'),
(6, 2, 'Yeremia', 'Laki-laki', 'Pemuda/i', '07,15,23,30'),
(7, 2, 'Soya', 'Laki-laki', 'Pemuda/i', '08,16,23'),
(8, 3, 'Kukut Harimasta', 'Laki-laki', 'Pemuda/i', '01,08,15,22,29'),
(9, 3, 'Iman', 'Laki-laki', 'Pemuda/i', '01,08,15,22,29'),
(10, 3, 'Rajak Djikarta ', 'Laki-laki', 'Pemuda/i', '01,08,15,22,29'),
(11, 3, 'Petrus', 'Laki-laki', 'Pemuda/i', '01,08,15,22,29'),
(12, 3, 'Buyung', 'Laki-laki', 'Pemuda/i', '02,09,16,23,30'),
(13, 3, 'Sudirman', 'Laki-laki', 'Kaum Ayah', '02,09,16,23,30'),
(14, 3, 'Maro', 'Laki-laki', 'Kaum Ayah', '02,09,16,23,30'),
(15, 3, 'Wawan', 'Laki-laki', 'Kaum Ayah', '02,09,16,23,30'),
(16, 3, 'Rony', 'Laki-laki', 'Pemuda/i', '02,09,16,23,30'),
(17, 3, 'Donot', 'Laki-laki', 'Pemuda/i', '02,09,16,23,30'),
(18, 3, 'Momo', 'Laki-laki', 'Pemuda/i', '02,09,16,23,30'),
(19, 3, 'Bombot', 'Laki-laki', 'Pemuda/i', '02,09,16,23,30'),
(20, 3, 'Petrus Tanto', 'Laki-laki', 'Pemuda/i', '06,13,20,27'),
(21, 3, 'Indra Kusuma', 'Laki-laki', 'Pemuda/i', '06,13,20,27'),
(22, 3, 'Aga', 'Laki-laki', 'Pemuda/i', '06,13,20,27'),
(23, 3, 'Billy', 'Laki-laki', 'Pemuda/i', '06,13,20,27'),
(24, 3, 'Langko', 'Laki-laki', 'Pemuda/i', '07,14,21,28'),
(25, 3, 'Tanto', 'Laki-laki', 'Pemuda/i', '07,14,21,28'),
(26, 4, 'Eli', 'Perempuan', 'Kaum Ibu', '01,02,09,13,16,23,23,30'),
(27, 4, 'Ayu', 'Perempuan', 'Kaum Ibu', '02,02,09,15,16,23,27,30'),
(28, 4, 'Sulian', 'Perempuan', 'Kaum Ibu', '02,06,09,16,16,23,29,30'),
(29, 4, 'Dede', 'Laki-laki', 'Pemuda/i', '02,08,09,16,20,23,30,30'),
(30, 4, 'Oktavians Nabo', 'Laki-laki', 'Pemuda/i', '02,09,09,16,22,23,30'),
(32, 6, 'Winda', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(33, 6, 'Hesta', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(34, 6, 'Yeni', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(35, 6, 'Chelsi', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(36, 6, 'Jennie', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(37, 6, 'Asa Gloria', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(38, 6, 'Nanda', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(39, 6, 'Lita', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(40, 6, 'Ratna', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(41, 6, 'Sheril', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(42, 7, 'Bella', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(43, 7, 'Marta', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(44, 7, 'Anggi', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(45, 7, 'Kris', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(46, 7, 'Delia', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(47, 7, 'Marshanda', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(48, 7, 'Levina', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(49, 7, 'Tiara', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(50, 7, 'Lia ', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(51, 7, 'Indah', 'Perempuan', 'Pemuda/i', '02,09,16,23,30'),
(52, 8, 'Vina', 'Perempuan', 'Pemuda/i', '02,09,16,23'),
(53, 8, 'Aje', 'Perempuan', 'Pemuda/i', '02,09,16,30'),
(54, 8, 'Ogi', 'Laki-laki', 'Pemuda/i', '02,09,23,30'),
(55, 8, 'Anjas', 'Laki-laki', 'Pemuda/i', '02,16,23,30'),
(56, 8, 'Erdi', 'Laki-laki', 'Pemuda/i', '09,16,23,30'),
(57, 9, 'Kelvin', 'Laki-laki', 'Pemuda/i', '02,13,23'),
(58, 9, 'Candra Gusti', 'Laki-laki', 'Pemuda/i', '02,16,27'),
(59, 9, 'Steven', 'Laki-laki', 'Pemuda/i', '06,16,30'),
(60, 9, 'Malinus', 'Laki-laki', 'Kaum Ayah', '09,20,30'),
(61, 9, 'Tono', 'Laki-laki', 'Kaum Ayah', '09,23'),
(69, 16, 'Mentor', 'Laki-laki', 'Kaum Ayah', '06,13,20,27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayan_category`
--

CREATE TABLE `pelayan_category` (
  `id` int(11) NOT NULL,
  `category` varchar(128) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelayan_category`
--

INSERT INTO `pelayan_category` (`id`, `category`, `sort_order`) VALUES
(1, 'Khotbah', 1),
(2, 'Pembawa Acara', 2),
(3, 'Pemain Musik', 3),
(4, 'Kantong Kolekte', 4),
(6, 'Singer', 5),
(7, 'Penari Thamborin', 6),
(8, 'Pembaca Nabuatan', 7),
(9, 'Operator Slide', 8),
(16, 'Mentor', 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_rules`
--
ALTER TABLE `jadwal_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `majelis`
--
ALTER TABLE `majelis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelayan`
--
ALTER TABLE `pelayan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelayan_category`
--
ALTER TABLE `pelayan_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `jadwal_rules`
--
ALTER TABLE `jadwal_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `majelis`
--
ALTER TABLE `majelis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelayan`
--
ALTER TABLE `pelayan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `pelayan_category`
--
ALTER TABLE `pelayan_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
