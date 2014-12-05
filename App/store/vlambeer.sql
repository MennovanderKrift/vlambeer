-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 05 dec 2014 om 09:00
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

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
-- Tabelstructuur voor tabel `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_id` int(3) NOT NULL AUTO_INCREMENT,
  `invoice_nr` int(9) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_dl` varchar(255) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden geëxporteerd voor tabel `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_nr`, `invoice_date`, `invoice_dl`) VALUES
(1, 201411001, '2014-11-21', '/invoices/201411001.pdf'),
(2, 201411002, '2014-11-21', '/invoices/201411002.pdf'),
(3, 201411003, '2014-11-25', '/invoices/201411003.pdf'),
(4, 201411004, '2014-11-26', '/invoices/201411004.pdf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`) VALUES
(1, 'COD', 20),
(2, 'Counterstrike', 30);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'Mike', 'mikeo26@gmail.com', '$2y$10$GIsv5XmM8S68rlE5BkPiPeCQXmYLE0qZJWLeaGUTIz31MBgHjvjcm'),
(2, 'Mike2', 'mikeo26@gmail.com', '$2y$10$gpwBWE.Djqx0In/hRoJIT.gvn2nQV8WSqvyN6xAzNm1aKSLxnXHy6'),
(3, 'Mike4', 'mikeo26@gmail.com', '$2y$10$SInN4.6Oou6gt5hKhmjsQ.2TAFDA7biDpHhvo0/mU6Dp.eYxMvw.e'),
(4, 'Mike6', 'mike@gmail.com', '$2y$10$ReDbf5Tc3Mv8Iqd.jbUJsONPrf4Cno3yWD5bjSFFdNwln9bf5U4Fq'),
(5, 'abra', 'abra@abra.nl', '$2y$10$UD2th0ne/DKOUznoIjur/uLeiSqpP4rw0nyu4BGjA2YNDBQE8UDJ6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
