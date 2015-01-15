-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 15 jan 2015 om 09:19
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
-- Tabelstructuur voor tabel `tbl_customers`
--

CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `house_number` int(4) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `news_letter` tinyint(1) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `username`, `password`, `name`, `last_name`, `address`, `house_number`, `zipcode`, `phone_number`, `email_address`, `news_letter`) VALUES
(2, 'Vlambeer', '$2y$10$vxRdXgcfryYjouteHtZjBOJFHTh25btqbpwWai1EMRD2I3AofGZYi', '', '', '', 0, '', '', 'info@vlambeer.nl', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_games`
--

CREATE TABLE IF NOT EXISTS `tbl_games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto increment, primary key, unique game id',
  `title` varchar(40) NOT NULL COMMENT 'Game title',
  `description` longtext NOT NULL COMMENT 'Game description',
  `category` varchar(40) NOT NULL COMMENT 'Game category. Example: Horror, Shooter, Fighter, Platform, 2D, 3D, Retro style etc.',
  `release_date` date NOT NULL COMMENT 'Release date for game',
  `platform` varchar(40) NOT NULL COMMENT 'On what platform the game is available in. Example: PS3, Xbox One, Wii U',
  PRIMARY KEY (`game_id`),
  UNIQUE KEY `game_id` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_invoice`
--

CREATE TABLE IF NOT EXISTS `tbl_invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto increment, primary key, unique invoice ID',
  `product_id` int(11) NOT NULL COMMENT 'Foreign key, product ID',
  `customer_id` int(11) NOT NULL COMMENT 'Foreign key, customer ID',
  `order_status` varchar(40) NOT NULL COMMENT 'Status of the order',
  `amount` int(2) NOT NULL COMMENT 'The amount of items from a product',
  `payment_status` varchar(40) NOT NULL COMMENT 'Payment status of linked order/invoice',
  `date` date NOT NULL COMMENT 'The date on which the order was made',
  PRIMARY KEY (`invoice_id`),
  UNIQUE KEY `invoice_id` (`invoice_id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(6, 'Vlambeer OST (Physical)', 'All the music from 2010-2012 releases. Includes exclusive tracks and artwork.', 13, '', 'Music', 10),
(7, 'Vlambeer OST (Digital)', 'All the music from 2010-2012 releases. Includes exclusive tracks and artwork.', 8, '', 'Music', 10),
(8, 'Super Crate Box Re-arranged OST (Digital', 'Super Crate Box soundtrack arranged with a band.', 4, '', 'Music', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto increment, primary key, unique user ID',
  `username` varchar(255) NOT NULL COMMENT 'User username, used to log in',
  `password` varchar(255) NOT NULL COMMENT 'User password, used to log in',
  `email` varchar(80) NOT NULL,
  `name` varchar(40) NOT NULL COMMENT 'User first name',
  `last_name` varchar(40) NOT NULL COMMENT 'User last name',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `email`, `name`, `last_name`) VALUES
(1, 'Daniel', 'daniel1234', 'info@vlambeer.com', 'Daniel', 'van Bavel');

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `tbl_invoice_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`),
  ADD CONSTRAINT `tbl_invoice_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
