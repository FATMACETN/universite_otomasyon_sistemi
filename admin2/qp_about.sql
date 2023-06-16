-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 06 Nis 2023, 18:16:56
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `admin`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `qp_about`
--

DROP TABLE IF EXISTS `qp_about`;
CREATE TABLE IF NOT EXISTS `qp_about` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `description` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `adddate` datetime NOT NULL,
  `user_id` int NOT NULL,
  `statu` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `qp_about`
--

INSERT INTO `qp_about` (`id`, `title`, `description`, `adddate`, `user_id`, `statu`) VALUES
(12, 'fatma', 'ogrenci2', '2023-04-06 14:35:16', 1, 1),
(10, 'merve_güncellendi', 'ogrenci1', '2023-04-06 14:31:28', 1, 1),
(11, 'fatma', 'ogrenci2 _ güncellendi', '2023-04-06 14:31:40', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
