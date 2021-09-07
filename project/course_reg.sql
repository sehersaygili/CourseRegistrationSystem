-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 13 Ağu 2021, 00:14:12
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `course_reg`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `classroom`
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE IF NOT EXISTS `classroom` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `classroom_nm` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `classroom`
--

INSERT INTO `classroom` (`id`, `classroom_nm`) VALUES
(1, '1.Sınıf'),
(2, '2.Sınıf');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `level_id` int(11) NOT NULL,
  `akts` varchar(75) NOT NULL,
  `credit` varchar(75) NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `courses`
--

INSERT INTO `courses` (`id`, `code`, `course_name`, `level_id`, `akts`, `credit`, `user_id`) VALUES
(1, 'SYC504', 'English', 2, '2', '2', 1),
(10, 'SYC606', 'Mat', 1, '4', '2', 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(125) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(259) COLLATE utf8_turkish_ci NOT NULL,
  `pass_hash` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `usr_type` tinyint(1) NOT NULL,
  `dep` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `pass_hash`, `usr_type`, `dep`, `created_at`) VALUES
(1, 'Mertcan Taş', 'sehersygl111@gmail.com', '049e923758d2a58bfd153ea5a5df7f8d', 1, 'Bilişim', '2021-08-12 16:41:18'),
(2, 'Sidelya Deniz Kaya', 'sdeniz.kaya@gmail.com', '049e923758d2a58bfd153ea5a5df7f8d', 0, 'Bilişim', '2021-08-12 22:04:23'),
(5, 'nermin yılmaz', 'nermin@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 'Makine Mühendisliği', '2021-08-13 02:01:26'),
(7, 'merve akyüz', 'merve@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 'Computer Engineering', '2021-08-13 02:25:42'),
(8, 'Fatma Bülbül', 'Fatma@gmail.com', '698d51a19d8a121ce581499d7b701668', 0, 'Computer Engineering', '2021-08-13 02:26:00'),
(9, 'Ali Aksöz', 'ali@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 'Makine Mühendisliği', '2021-08-13 02:26:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
