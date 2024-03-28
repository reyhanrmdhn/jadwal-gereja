-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2024 at 04:08 PM
-- Server version: 8.0.30
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs_jadwal-gereja`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE `home_banner` (
  `id` int NOT NULL,
  `banner_title` varchar(128) NOT NULL,
  `banner_subtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(256) NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `home_banner`
--

INSERT INTO `home_banner` (`id`, `banner_title`, `banner_subtitle`, `image`, `sort_order`) VALUES
(1, 'EXPERIENCE GOD\'S', 'UNCEASING PROVISION', 'assets/img/church-mountain-bg.jpg', 0),
(2, 'Waves of Grace', 'Receive the unceasing wave after wave, after wave, after wave of Grace God has for you.', 'assets/img/church-man-sea.jpg', 0),
(3, 'Grace and Truth', 'For God did not send his Son into the world to condemn the world, but to save the world through him. &lt;em&gt;John 3:17&lt;/em&gt;', 'assets/img/church-man-hope.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int NOT NULL,
  `nama_kegiatan` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `hari` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `pelayan` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama_kegiatan`, `hari`, `tanggal`, `pelayan`) VALUES
(1, 'Ibadah Pemuda/i', 'Friday', '2024-03-01', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Intan Riski\"],\"Pemain Musik\":[\"Kukut Harimasta\",\"Iman\",\"Rajak Djikarta \",\"Petrus\"],\"Kantong Kolekte\":[\"Eli\"]}'),
(2, 'Sabtu Gembira', 'Saturday', '2024-03-02', '{\"Pemain Musik\":[\"Buyung\",\"Sudirman\",\"Maro\",\"Wawan\"],\"Kantong Kolekte\":[\"Ayu\"],\"Mentor\":[\"Mentor\"]}'),
(3, 'Ibadah Minggu Sesi 1', 'Sunday', '2024-03-03', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Rahel\"],\"Pemain Musik\":[\"Rony\",\"Donot\",\"Momo\",\"Bombot\"],\"Kantong Kolekte\":[\"Sulian\",\"Dede\",\"Oktavians Nabo\"],\"Singer\":[\"Winda\",\"Hesta\",\"Yeni\",\"Chelsi\",\"Jennie\"],\"Penari Thamborin\":[\"Bella\",\"Marta\",\"Anggi\",\"Kris\",\"Delia\"],\"Pembaca Nabuatan\":[\"Vina\",\"Aje\"],\"Operator Slide\":[\"Kelvin\"]}'),
(4, 'Ibadah Minggu Sesi 2', 'Sunday', '2024-03-03', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Hesti\"],\"Pemain Musik\":[\"Petrus Tanto\",\"Indra Kusuma\",\"Aga\",\"Billy\"],\"Kantong Kolekte\":[\"Eli\",\"Ayu\",\"Sulian\"],\"Singer\":[\"Asa Gloria\",\"Nanda\",\"Lita\",\"Ratna\",\"Sheril\"],\"Penari Thamborin\":[\"Marshanda\",\"Levina\",\"Tiara\",\"Lia \",\"Indah\"],\"Pembaca Nabuatan\":[\"Ogi\",\"Anjas\"],\"Operator Slide\":[\"Candra Gusti\"]}'),
(5, 'Ibadah Keluarga', 'Thursday', '2024-03-07', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Yeremia\"],\"Pemain Musik\":[\"Langko\",\"Tanto\"]}'),
(6, 'Ibadah Pemuda/i', 'Friday', '2024-03-08', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Soya\"],\"Pemain Musik\":[\"Kukut Harimasta\",\"Iman\",\"Rajak Djikarta \",\"Petrus\"],\"Kantong Kolekte\":[\"Dede\"]}'),
(7, 'Sabtu Gembira', 'Saturday', '2024-03-09', '{\"Pemain Musik\":[\"Buyung\",\"Sudirman\",\"Maro\",\"Wawan\"],\"Kantong Kolekte\":[\"Oktavians Nabo\"],\"Mentor\":[\"Mentor\"]}'),
(8, 'Ibadah Minggu Sesi 1', 'Sunday', '2024-03-10', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Intan Riski\"],\"Pemain Musik\":[\"Rony\",\"Donot\",\"Momo\",\"Bombot\"],\"Kantong Kolekte\":[\"Eli\",\"Ayu\",\"Sulian\"],\"Singer\":[\"Winda\",\"Hesta\",\"Yeni\",\"Chelsi\",\"Jennie\"],\"Penari Thamborin\":[\"Bella\",\"Marta\",\"Anggi\",\"Kris\",\"Delia\"],\"Pembaca Nabuatan\":[\"Erdi\",\"Vina\"],\"Operator Slide\":[\"Steven\"]}'),
(9, 'Ibadah Minggu Sesi 2', 'Sunday', '2024-03-10', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Rahel\"],\"Pemain Musik\":[\"Petrus Tanto\",\"Indra Kusuma\",\"Aga\",\"Billy\"],\"Kantong Kolekte\":[\"Dede\",\"Oktavians Nabo\",\"Eli\"],\"Singer\":[\"Asa Gloria\",\"Nanda\",\"Lita\",\"Ratna\",\"Sheril\"],\"Penari Thamborin\":[\"Marshanda\",\"Levina\",\"Tiara\",\"Lia \",\"Indah\"],\"Pembaca Nabuatan\":[\"Aje\",\"Ogi\"],\"Operator Slide\":[\"Malinus\"]}'),
(10, 'Ibadah Keluarga', 'Thursday', '2024-03-14', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Hesti\"],\"Pemain Musik\":[\"Langko\",\"Tanto\"]}'),
(11, 'Ibadah Pemuda/i', 'Friday', '2024-03-15', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Yeremia\"],\"Pemain Musik\":[\"Kukut Harimasta\",\"Iman\",\"Rajak Djikarta \",\"Petrus\"],\"Kantong Kolekte\":[\"Ayu\"]}'),
(12, 'Sabtu Gembira', 'Saturday', '2024-03-16', '{\"Pemain Musik\":[\"Buyung\",\"Sudirman\",\"Maro\",\"Wawan\"],\"Kantong Kolekte\":[\"Sulian\"],\"Mentor\":[\"Mentor\"]}'),
(13, 'Ibadah Minggu Sesi 1', 'Sunday', '2024-03-17', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Soya\"],\"Pemain Musik\":[\"Rony\",\"Donot\",\"Momo\",\"Bombot\"],\"Kantong Kolekte\":[\"Dede\",\"Oktavians Nabo\",\"Eli\"],\"Singer\":[\"Winda\",\"Hesta\",\"Yeni\",\"Chelsi\",\"Jennie\"],\"Penari Thamborin\":[\"Bella\",\"Marta\",\"Anggi\",\"Kris\",\"Delia\"],\"Pembaca Nabuatan\":[\"Anjas\",\"Erdi\"],\"Operator Slide\":[\"Tono\"]}'),
(14, 'Ibadah Minggu Sesi 2', 'Sunday', '2024-03-17', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Intan Riski\"],\"Pemain Musik\":[\"Petrus Tanto\",\"Indra Kusuma\",\"Aga\",\"Billy\"],\"Kantong Kolekte\":[\"Ayu\",\"Sulian\",\"Dede\"],\"Singer\":[\"Asa Gloria\",\"Nanda\",\"Lita\",\"Ratna\",\"Sheril\"],\"Penari Thamborin\":[\"Marshanda\",\"Levina\",\"Tiara\",\"Lia \",\"Indah\"],\"Pembaca Nabuatan\":[\"Vina\",\"Aje\"],\"Operator Slide\":[\"Kelvin\"]}'),
(15, 'Ibadah Keluarga', 'Thursday', '2024-03-21', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Rahel\"],\"Pemain Musik\":[\"Langko\",\"Tanto\"]}'),
(16, 'Ibadah Pemuda/i', 'Friday', '2024-03-22', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Hesti\"],\"Pemain Musik\":[\"Kukut Harimasta\",\"Iman\",\"Rajak Djikarta \",\"Petrus\"],\"Kantong Kolekte\":[\"Oktavians Nabo\"]}'),
(17, 'Sabtu Gembira', 'Saturday', '2024-03-23', '{\"Pemain Musik\":[\"Buyung\",\"Sudirman\",\"Maro\",\"Wawan\"],\"Kantong Kolekte\":[\"Eli\"],\"Mentor\":[\"Mentor\"]}'),
(18, 'Ibadah Minggu Sesi 1', 'Sunday', '2024-03-24', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Yeremia\"],\"Pemain Musik\":[\"Rony\",\"Donot\",\"Momo\",\"Bombot\"],\"Kantong Kolekte\":[\"Ayu\",\"Sulian\",\"Dede\"],\"Singer\":[\"Winda\",\"Hesta\",\"Yeni\",\"Chelsi\",\"Jennie\"],\"Penari Thamborin\":[\"Bella\",\"Marta\",\"Anggi\",\"Kris\",\"Delia\"],\"Pembaca Nabuatan\":[\"Ogi\",\"Anjas\"],\"Operator Slide\":[\"Candra Gusti\"]}'),
(19, 'Ibadah Minggu Sesi 2', 'Sunday', '2024-03-24', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Soya\"],\"Pemain Musik\":[\"Petrus Tanto\",\"Indra Kusuma\",\"Aga\",\"Billy\"],\"Kantong Kolekte\":[\"Oktavians Nabo\",\"Eli\",\"Ayu\"],\"Singer\":[\"Asa Gloria\",\"Nanda\",\"Lita\",\"Ratna\",\"Sheril\"],\"Penari Thamborin\":[\"Marshanda\",\"Levina\",\"Tiara\",\"Lia \",\"Indah\"],\"Pembaca Nabuatan\":[\"Erdi\",\"Vina\"],\"Operator Slide\":[\"Steven\"]}'),
(20, 'Ibadah Keluarga', 'Thursday', '2024-03-28', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Intan Riski\"],\"Pemain Musik\":[\"Langko\",\"Tanto\"]}'),
(21, 'Ibadah Pemuda/i', 'Friday', '2024-03-29', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Rahel\"],\"Pemain Musik\":[\"Kukut Harimasta\",\"Iman\",\"Rajak Djikarta \",\"Petrus\"],\"Kantong Kolekte\":[\"Sulian\"]}'),
(22, 'Sabtu Gembira', 'Saturday', '2024-03-30', '{\"Pemain Musik\":[\"Buyung\",\"Sudirman\",\"Maro\",\"Wawan\"],\"Kantong Kolekte\":[\"Dede\"],\"Mentor\":[\"Mentor\"]}'),
(23, 'Ibadah Minggu Sesi 1', 'Sunday', '2024-03-31', '{\"Khotbah\":[\"Pdt.Dody Kurniawan\"],\"Pembawa Acara\":[\"Hesti\"],\"Pemain Musik\":[\"Rony\",\"Donot\",\"Momo\",\"Bombot\"],\"Kantong Kolekte\":[\"Oktavians Nabo\",\"Eli\",\"Ayu\"],\"Singer\":[\"Winda\",\"Hesta\",\"Yeni\",\"Chelsi\",\"Jennie\"],\"Penari Thamborin\":[\"Bella\",\"Marta\",\"Anggi\",\"Kris\",\"Delia\"],\"Pembaca Nabuatan\":[\"Aje\",\"Ogi\"],\"Operator Slide\":[\"Malinus\"]}'),
(24, 'Ibadah Minggu Sesi 2', 'Sunday', '2024-03-31', '{\"Khotbah\":[\"Pdt. Toni Laman\"],\"Pembawa Acara\":[\"Yeremia\"],\"Pemain Musik\":[\"Petrus Tanto\",\"Indra Kusuma\",\"Aga\",\"Billy\"],\"Kantong Kolekte\":[\"Sulian\",\"Dede\",\"Oktavians Nabo\"],\"Singer\":[\"Asa Gloria\",\"Nanda\",\"Lita\",\"Ratna\",\"Sheril\"],\"Penari Thamborin\":[\"Marshanda\",\"Levina\",\"Tiara\",\"Lia \",\"Indah\"],\"Pembaca Nabuatan\":[\"Anjas\",\"Erdi\"],\"Operator Slide\":[\"Tono\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_rules`
--

CREATE TABLE `jadwal_rules` (
  `id` int NOT NULL,
  `nama_kegiatan` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `hari` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `pelayan` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_rules`
--

INSERT INTO `jadwal_rules` (`id`, `nama_kegiatan`, `hari`, `jam_mulai`, `jam_selesai`, `deskripsi`, `pelayan`) VALUES
(2, 'Ibadah Keluarga', 'Thursday', '13:00:00', '15:00:00', 'Ibadah Keluarga adalah ibadah yang dilaksanakan di hari kamis', '[{\"pelayan\":\"Khotbah\",\"jumlah\":\"1\"},{\"pelayan\":\"Pembawa Acara\",\"jumlah\":\"1\"},{\"pelayan\":\"Pemain Musik\",\"jumlah\":\"2\"},{\"pelayan\":\"Kantong Kolekte\",\"jumlah\":\"0\"},{\"pelayan\":\"Mentor\",\"jumlah\":\"0\"},{\"pelayan\":\"Singer\",\"jumlah\":\"0\"},{\"pelayan\":\"Penari Thamborin\",\"jumlah\":\"0\"},{\"pelayan\":\"Pembaca Nabuatan\",\"jumlah\":\"0\"},{\"pelayan\":\"Operator Slide\",\"jumlah\":\"0\"}]'),
(4, 'Ibadah Pemuda/i', 'Friday', '13:00:00', '15:00:00', 'Ibadah Pemuda/i adalah ibadah yang dilaksanakan di hari sabtu', '[{\"pelayan\":\"Khotbah\",\"jumlah\":\"1\"},{\"pelayan\":\"Pembawa Acara\",\"jumlah\":\"1\"},{\"pelayan\":\"Pemain Musik\",\"jumlah\":\"4\"},{\"pelayan\":\"Kantong Kolekte\",\"jumlah\":\"1\"},{\"pelayan\":\"Mentor\",\"jumlah\":\"0\"},{\"pelayan\":\"Singer\",\"jumlah\":\"0\"},{\"pelayan\":\"Penari Thamborin\",\"jumlah\":\"0\"},{\"pelayan\":\"Pembaca Nabuatan\",\"jumlah\":\"0\"},{\"pelayan\":\"Operator Slide\",\"jumlah\":\"0\"}]'),
(5, 'Sabtu Gembira', 'Saturday', '07:00:00', '09:00:00', 'Ibadah sabtu gembira di hari sabtu', '[{\"pelayan\":\"Khotbah\",\"jumlah\":\"0\"},{\"pelayan\":\"Pembawa Acara\",\"jumlah\":\"0\"},{\"pelayan\":\"Pemain Musik\",\"jumlah\":\"4\"},{\"pelayan\":\"Kantong Kolekte\",\"jumlah\":\"1\"},{\"pelayan\":\"Mentor\",\"jumlah\":\"1\"},{\"pelayan\":\"Singer\",\"jumlah\":\"0\"},{\"pelayan\":\"Penari Thamborin\",\"jumlah\":\"0\"},{\"pelayan\":\"Pembaca Nabuatan\",\"jumlah\":\"0\"},{\"pelayan\":\"Operator Slide\",\"jumlah\":\"0\"}]'),
(6, 'Ibadah Minggu Sesi 1', 'Sunday', '06:00:00', '09:00:00', 'Ibadah minggu di sesi 1', '[{\"pelayan\":\"Khotbah\",\"jumlah\":\"1\"},{\"pelayan\":\"Pembawa Acara\",\"jumlah\":\"1\"},{\"pelayan\":\"Pemain Musik\",\"jumlah\":\"4\"},{\"pelayan\":\"Kantong Kolekte\",\"jumlah\":\"3\"},{\"pelayan\":\"Mentor\",\"jumlah\":\"0\"},{\"pelayan\":\"Singer\",\"jumlah\":\"5\"},{\"pelayan\":\"Penari Thamborin\",\"jumlah\":\"5\"},{\"pelayan\":\"Pembaca Nabuatan\",\"jumlah\":\"2\"},{\"pelayan\":\"Operator Slide\",\"jumlah\":\"1\"}]'),
(7, 'Ibadah Minggu Sesi 2', 'Sunday', '15:00:00', '17:00:00', 'Ibadah minggu di sesi 2', '[{\"pelayan\":\"Khotbah\",\"jumlah\":\"1\"},{\"pelayan\":\"Pembawa Acara\",\"jumlah\":\"1\"},{\"pelayan\":\"Pemain Musik\",\"jumlah\":\"4\"},{\"pelayan\":\"Kantong Kolekte\",\"jumlah\":\"3\"},{\"pelayan\":\"Mentor\",\"jumlah\":\"0\"},{\"pelayan\":\"Singer\",\"jumlah\":\"5\"},{\"pelayan\":\"Penari Thamborin\",\"jumlah\":\"5\"},{\"pelayan\":\"Pembaca Nabuatan\",\"jumlah\":\"2\"},{\"pelayan\":\"Operator Slide\",\"jumlah\":\"1\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `majelis`
--

CREATE TABLE `majelis` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_failed_login` datetime DEFAULT NULL,
  `failed_login_count` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majelis`
--

INSERT INTO `majelis` (`id`, `name`, `email`, `password`, `image`, `date_created`, `first_failed_login`, `failed_login_count`) VALUES
(1, 'adminn', 'demo@demo.com', '$2y$10$sCiRR7yly84CNt/GvrzbJenKdBnnMSaruiEaJH0leSzgCUOA6yTGW', 'https://portfolio_victor.test/assets/img/portfolio/details/profile.jpg', '2023-03-27 05:08:02', '2024-03-28 11:08:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelayan`
--

CREATE TABLE `pelayan` (
  `id` int NOT NULL,
  `id_pelayan_category` int NOT NULL,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Kaum Ayah','Kaum Ibu','Pemuda/i','Anak-anak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelayan`
--

INSERT INTO `pelayan` (`id`, `id_pelayan_category`, `nama`, `jenis_kelamin`, `status`) VALUES
(1, 1, 'Pdt. Toni Laman', 'Laki-laki', 'Kaum Ayah'),
(2, 1, 'Pdt.Dody Kurniawan', 'Laki-laki', 'Pemuda/i'),
(3, 2, 'Intan Riski', 'Perempuan', 'Pemuda/i'),
(4, 2, 'Rahel', 'Perempuan', 'Pemuda/i'),
(5, 2, 'Hesti', 'Perempuan', 'Pemuda/i'),
(6, 2, 'Yeremia', 'Laki-laki', 'Pemuda/i'),
(7, 2, 'Soya', 'Laki-laki', 'Pemuda/i'),
(8, 3, 'Kukut Harimasta', 'Laki-laki', 'Pemuda/i'),
(9, 3, 'Iman', 'Laki-laki', 'Pemuda/i'),
(10, 3, 'Rajak Djikarta ', 'Laki-laki', 'Pemuda/i'),
(11, 3, 'Petrus', 'Laki-laki', 'Pemuda/i'),
(12, 3, 'Buyung', 'Laki-laki', 'Pemuda/i'),
(13, 3, 'Sudirman', 'Laki-laki', 'Kaum Ayah'),
(14, 3, 'Maro', 'Laki-laki', 'Kaum Ayah'),
(15, 3, 'Wawan', 'Laki-laki', 'Kaum Ayah'),
(16, 3, 'Rony', 'Laki-laki', 'Pemuda/i'),
(17, 3, 'Donot', 'Laki-laki', 'Pemuda/i'),
(18, 3, 'Momo', 'Laki-laki', 'Pemuda/i'),
(19, 3, 'Bombot', 'Laki-laki', 'Pemuda/i'),
(20, 3, 'Petrus Tanto', 'Laki-laki', 'Pemuda/i'),
(21, 3, 'Indra Kusuma', 'Laki-laki', 'Pemuda/i'),
(22, 3, 'Aga', 'Laki-laki', 'Pemuda/i'),
(23, 3, 'Billy', 'Laki-laki', 'Pemuda/i'),
(24, 3, 'Langko', 'Laki-laki', 'Pemuda/i'),
(25, 3, 'Tanto', 'Laki-laki', 'Pemuda/i'),
(26, 4, 'Eli', 'Perempuan', 'Kaum Ibu'),
(27, 4, 'Ayu', 'Perempuan', 'Kaum Ibu'),
(28, 4, 'Sulian', 'Perempuan', 'Kaum Ibu'),
(29, 4, 'Dede', 'Laki-laki', 'Pemuda/i'),
(30, 4, 'Oktavians Nabo', 'Laki-laki', 'Pemuda/i'),
(31, 5, 'Mentor', 'Laki-laki', 'Pemuda/i'),
(32, 6, 'Winda', 'Perempuan', 'Pemuda/i'),
(33, 6, 'Hesta', 'Perempuan', 'Pemuda/i'),
(34, 6, 'Yeni', 'Perempuan', 'Pemuda/i'),
(35, 6, 'Chelsi', 'Perempuan', 'Pemuda/i'),
(36, 6, 'Jennie', 'Perempuan', 'Pemuda/i'),
(37, 6, 'Asa Gloria', 'Perempuan', 'Pemuda/i'),
(38, 6, 'Nanda', 'Perempuan', 'Pemuda/i'),
(39, 6, 'Lita', 'Perempuan', 'Pemuda/i'),
(40, 6, 'Ratna', 'Perempuan', 'Pemuda/i'),
(41, 6, 'Sheril', 'Perempuan', 'Pemuda/i'),
(42, 7, 'Bella', 'Perempuan', 'Pemuda/i'),
(43, 7, 'Marta', 'Perempuan', 'Pemuda/i'),
(44, 7, 'Anggi', 'Perempuan', 'Pemuda/i'),
(45, 7, 'Kris', 'Perempuan', 'Pemuda/i'),
(46, 7, 'Delia', 'Perempuan', 'Pemuda/i'),
(47, 7, 'Marshanda', 'Perempuan', 'Pemuda/i'),
(48, 7, 'Levina', 'Perempuan', 'Pemuda/i'),
(49, 7, 'Tiara', 'Perempuan', 'Pemuda/i'),
(50, 7, 'Lia ', 'Perempuan', 'Pemuda/i'),
(51, 7, 'Indah', 'Perempuan', 'Pemuda/i'),
(52, 8, 'Vina', 'Perempuan', 'Pemuda/i'),
(53, 8, 'Aje', 'Perempuan', 'Pemuda/i'),
(54, 8, 'Ogi', 'Laki-laki', 'Pemuda/i'),
(55, 8, 'Anjas', 'Laki-laki', 'Pemuda/i'),
(56, 8, 'Erdi', 'Laki-laki', 'Pemuda/i'),
(57, 9, 'Kelvin', 'Laki-laki', 'Pemuda/i'),
(58, 9, 'Candra Gusti', 'Laki-laki', 'Pemuda/i'),
(59, 9, 'Steven', 'Laki-laki', 'Pemuda/i'),
(60, 9, 'Malinus', 'Laki-laki', 'Kaum Ayah'),
(61, 9, 'Tono', 'Laki-laki', 'Kaum Ayah');

-- --------------------------------------------------------

--
-- Table structure for table `pelayan_category`
--

CREATE TABLE `pelayan_category` (
  `id` int NOT NULL,
  `category` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelayan_category`
--

INSERT INTO `pelayan_category` (`id`, `category`, `sort_order`) VALUES
(1, 'Khotbah', 0),
(2, 'Pembawa Acara', 0),
(3, 'Pemain Musik', 0),
(4, 'Kantong Kolekte', 0),
(5, 'Mentor', 0),
(6, 'Singer', 0),
(7, 'Penari Thamborin', 0),
(8, 'Pembaca Nabuatan', 0),
(9, 'Operator Slide', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_rules`
--
ALTER TABLE `jadwal_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majelis`
--
ALTER TABLE `majelis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelayan`
--
ALTER TABLE `pelayan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelayan_category`
--
ALTER TABLE `pelayan_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jadwal_rules`
--
ALTER TABLE `jadwal_rules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `majelis`
--
ALTER TABLE `majelis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelayan`
--
ALTER TABLE `pelayan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pelayan_category`
--
ALTER TABLE `pelayan_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
