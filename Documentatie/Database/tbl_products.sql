-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 08 jan 2015 om 09:43
-- Serverversie: 5.6.14
-- PHP-versie: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `vlambeer`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto increment, primary key, unique product ID',
  `name` varchar(40) NOT NULL COMMENT 'Product name',
  `description` longtext NOT NULL COMMENT 'Product description',
  `item_price` float NOT NULL COMMENT 'Product price',
  `tags` varchar(255) NOT NULL COMMENT 'Product tags',
  `category` varchar(60) NOT NULL COMMENT 'Product category',
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `name`, `description`, `item_price`, `tags`, `category`, `stock`) VALUES
(1, 'Luftrauser T-shirt', 'Stylish LUFTRAUSERS T-shirt designed by Amon26.', 18, '', 'Clothes', 10),
(2, 'Vlambeer T-shirt', 'T-shirt with Vlambeer logo on chest.', 18, '', 'Clothes', 10),
(3, 'Vlambeer 1st Birthday T-shirt', 'Dancing Vlambeer T-shirt.', 18, '', 'Clothes', 10),
(4, 'GUN GODZ T-shirt', 'GUN GODZ T-shirt with butt.', 18, '', 'Clothes', 10),
(5, 'Vlambeer''s Crate Box Bundle', 'Includes t-shirt, exclusive poster, Vlambeer OST, pins, most of our 2010-2012 games on custom USB-drive.', 50, '', 'Bundles', 10),
(6, 'Vlambeer OST (Physical)', 'All the music from 2010-2012 releases. Includes exclusive tracks and artwork.', 13, '', 'Music', 5),
(7, 'Vlambeer OST (Digital)', 'All the music from 2010-2012 releases. Includes exclusive tracks and artwork.', 8, '', 'Music', 9),
(8, 'Super Crate Box Re-arranged OST (Digital', 'Super Crate Box soundtrack arranged with a band.', 4, '', 'Music', 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
