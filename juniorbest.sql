-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Ağu 2023, 15:05:22
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

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
-- Tablo için tablo yapısı `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `chat_type` char(1) NOT NULL,
  `chat_sender` int(11) NOT NULL,
  `chat_send` int(11) NOT NULL,
  `chat_date` date NOT NULL,
  `chat_content` varchar(200) NOT NULL,
  `chat_view` char(1) NOT NULL,
  `chat_content_type` char(1) NOT NULL,
  `chat_deleted` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `follow`
--

CREATE TABLE `follow` (
  `follow_sender` int(11) NOT NULL,
  `follow_send` int(11) NOT NULL,
  `follow_status` char(1) NOT NULL,
  `follow_date` date NOT NULL,
  `follow_accept_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE `members` (
  `member_project_id` int(11) NOT NULL,
  `member_user_id` int(11) NOT NULL,
  `member_status` char(1) NOT NULL,
  `member_type` varchar(55) NOT NULL,
  `member_deleted` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_builder_id` int(11) NOT NULL,
  `post_description` varchar(200) NOT NULL,
  `post_photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`post_photos`)),
  `post_type` char(1) NOT NULL,
  `post_date` date NOT NULL,
  `post_deleted` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_comment`
--

CREATE TABLE `post_comment` (
  `post_comment_id` int(11) NOT NULL,
  `post_comment_post_id` int(11) NOT NULL,
  `post_comment_user` int(11) NOT NULL,
  `post_comment_comment` varchar(200) NOT NULL,
  `post_comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_like`
--

CREATE TABLE `post_like` (
  `post_like_id` int(11) NOT NULL,
  `post_like_user` int(11) NOT NULL,
  `post_like_post_id` int(11) NOT NULL,
  `post_like_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(55) NOT NULL,
  `project_builder` varchar(55) NOT NULL,
  `project_description` varchar(200) NOT NULL,
  `project_type` varchar(55) NOT NULL,
  `project_date` date NOT NULL,
  `project_deleted` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_login_type` varchar(1) NOT NULL,
  `user_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`user_info`)),
  `user_register_date` date NOT NULL,
  `user_veritification` tinyint(1) NOT NULL,
  `user_veritification_code` varchar(6) NOT NULL,
  `user_veritification_validity` datetime NOT NULL,
  `user_veritification_try` varchar(1) NOT NULL,
  `user_nickname` varchar(55) NOT NULL,
  `user_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_mail`, `user_password`, `user_login_type`, `user_info`, `user_register_date`, `user_veritification`, `user_veritification_code`, `user_veritification_validity`, `user_veritification_try`, `user_nickname`, `user_deleted`) VALUES
(30, 'Saadettin', 'Dursun', 'eNLLeuZWnuOydQepNoo9M9u8Lsi+sQfsKhG7', 'OYGYLLEQ2Lju', '0', '{\"null\":\"null\"}', '2023-08-17', 1, '135322', '2023-08-17 04:22:17', '3', 'nickname', 0),
(31, 'Metincan', 'Çakmak', 'edbScuZQmuuyISO7KZghMcSfJsg=', 'OoGZKrYU3bLl', '2', '{\"null\":\"null\"}', '2023-08-19', 1, '625081', '2023-08-19 01:12:28', '2', 'Rexler', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `voting`
--

CREATE TABLE `voting` (
  `voting_project_id` int(11) NOT NULL,
  `voting_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Tablo için indeksler `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`follow_sender`);

--
-- Tablo için indeksler `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_project_id`);

--
-- Tablo için indeksler `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Tablo için indeksler `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`post_comment_id`);

--
-- Tablo için indeksler `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`post_like_id`);

--
-- Tablo için indeksler `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`voting_project_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `follow`
--
ALTER TABLE `follow`
  MODIFY `follow_sender` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `members`
--
ALTER TABLE `members`
  MODIFY `member_project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `post_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `post_like`
--
ALTER TABLE `post_like`
  MODIFY `post_like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `voting`
--
ALTER TABLE `voting`
  MODIFY `voting_project_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
