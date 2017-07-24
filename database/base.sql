-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 Nis 2016, 17:31:08
-- Sunucu sürümü: 5.5.47-0ubuntu0.14.04.1
-- PHP Sürümü: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `basecdn`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `phone`, `topic`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Süleyman', 'aydoslu', 'salih@gmail.com', '5548156880', 'dene', 'asdx', '2016-03-31 13:39:24', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `view` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `is_stocked` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `keywords`, `description`, `view`, `content`, `is_stocked`, `created_at`, `updated_at`) VALUES
(1, 'Anasayfa', 'anasayfa', 'bla', 'bla', 'default/home.tpl', 'anasayfa', 1, '2016-03-11 00:00:00', '2016-03-18 11:17:17'),
(2, 'Deneme', 'deneme', 'bla', 'bla', 'default/pages/basic.tpl', 'denemeceler', 0, '2016-04-06 00:00:00', '2016-04-06 14:45:23'),
(3, 'deneme', 'deneme_Ux', 'de', 'de', 'default/pages/basic.tpl', '<p>asdx</p>\n', 0, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `title`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Banner (Üst Görsel)', 'banner', 'assets/img/banner.png', '2016-03-17 00:00:00', '2016-03-17 17:39:23'),
(2, 'Site alt metni', 'footer_yazi', 'Bu web sitesi Avrupa Birliği ve Türkiye Cumhuriyeti''nin mali katkısıyla hazırlanmıştır. Bu yayının içeriğinden Bağcılar Mesleki ve Teknik Anadolu Lisesi sorumludur ve bu içerik hiçbir şekilde Avrupa Birliği veya Türkiye Cumhuriyeti''nin görüş ve tutumunu yansıtmamaktadır.', '0000-00-00 00:00:00', '2016-03-17 17:27:42'),
(3, 'Facebook Adresi', 'facebook_url', 'http://www.facebook.com/asd', '2016-03-17 00:00:00', '2016-03-17 17:45:38'),
(4, 'Twitter Adresi', 'twitter_url', 'http://www.twitter.com/asd', '2016-03-17 00:00:00', '2016-03-17 17:45:33'),
(5, 'Instagram Adresi', 'instagram_url', 'http://www.instagram.com/asd', '2016-03-17 00:00:00', '2016-03-17 17:45:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`, `type`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'süleyman', 'aydoslu', 'admin@admin.com', '5548156880', '1d541b213a486690de6641e3a98f64720dd6f7a4', 2, NULL, '2016-03-02 10:00:00', '2016-03-04 18:19:56'),
(2, 'serpil', 'türk', 'serpilturk@gmail.com', '5548156880', '1d541b213a486690de6641e3a98f64720dd6f7a4', 1, NULL, '2016-03-17 16:25:16', '2016-03-17 17:59:12'),
(3, 'Süleyman', 'aydoslu', 'suleymanaydoslu@hotmail.com', '5548156880', '1d541b213a486690de6641e3a98f64720dd6f7a4', 1, NULL, '2016-03-25 09:31:21', '2016-04-06 14:44:27'),
(4, 'Scarlet', 'Nelson', 'focyjoly@hotmail.com', '+716-22-5416385', '1d541b213a486690de6641e3a98f64720dd6f7a4', 2, NULL, '2016-04-06 17:30:56', '2016-04-06 17:30:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
