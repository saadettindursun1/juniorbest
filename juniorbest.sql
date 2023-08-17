-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Ağu 2023, 21:58:49
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `juniorbest`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `user_last_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `user_mail` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `user_login_type` varchar(1) COLLATE utf8_turkish_ci NOT NULL,
  `user_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`user_info`)),
  `user_register_date` date NOT NULL,
  `user_veritification` tinyint(1) NOT NULL,
  `user_veritification_code` varchar(6) COLLATE utf8_turkish_ci NOT NULL,
  `user_veritification_validity` datetime NOT NULL,
  `user_veritification_try` varchar(1) COLLATE utf8_turkish_ci NOT NULL,
  `user_nickname` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  `user_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_mail`, `user_password`, `user_login_type`, `user_info`, `user_register_date`, `user_veritification`, `user_veritification_code`, `user_veritification_validity`, `user_veritification_try`, `user_nickname`, `user_deleted`) VALUES
(30, 'Saadettin', 'Dursun', 'eNLLeuZWnuOydQepNoo9M9u8Lsi+sQfsKhG7', 'OYGYLLEQ2Lju', '0', '{\"null\":\"null\"}', '2023-08-17', 1, '135322', '2023-08-17 04:22:17', '3', 'nickname', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
