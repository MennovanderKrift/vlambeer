-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2015 at 08:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vlambeer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(6) DEFAULT 'male',
  `address` varchar(40) NOT NULL,
  `house_number` int(4) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `news_letter` tinyint(1) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `username`, `password`, `name`, `last_name`, `gender`, `address`, `house_number`, `zipcode`, `phone_number`, `email_address`, `news_letter`) VALUES
(2, 'Vlambeer', '$2y$10$vxRdXgcfryYjouteHtZjBOJFHTh25btqbpwWai1EMRD2I3AofGZYi', '', '', 'male', '', 0, '', '', 'info@vlambeer.nl', 0),
(3, 'pannekoek', '$2y$10$bRPPs/RVYeRynsBYJsOLReolB1qEsjtSSzcj.N4oENKS58xKQvchu', '', '', 'male', '', 0, '', '', 'pannekoek@vlambeer.nl', 0),
(4, 'koekwaus', '$2y$10$.Epjc.Q4HsVm2bO5EALQQ.Vq0TTldXDDy4kAH4K5AKUF.V9nf7usm', '', '', 'male', '', 0, '', '', 'koekwaus@vlambeer.nl', 0),
(5, 'flapdrol123', '$2y$10$WNoiXKeydMrRfbYZiAhLJO5Ez4l4bZSrW/L/Jw7dL3HZ/0ZarwcuO', '', '', 'male', '', 0, '', '', 'flapdrol123@vlambeer.nl', 0),
(6, 'supermario', '$2y$10$Qemk2FNuFGuTm9VcXLYmIO3Wn1uBNzio31h43rXU9NrxBzjg5mzr2', '', '', 'male', '', 0, '', '', 'supermario@nintendo.nl', 0),
(7, 'peach', '$2y$10$5FzAHr4Z00nBze81mXVl0eVNai1qTXuBmLE5fl9CCpA0VxSJWO3Jy', 'peach', 'Toadstool', 'male', '', 0, '4848aa', '0612345678', 'peach@nintendo.com', 1),
(8, 'megaman', '$2y$10$Zmf/2fwNdiGWnU6wfc7I8.Ku.nPMYEtZWHp0/fk8xRJPev1wA/8mS', '', '', 'male', '', 0, '', '', 'megaman@capcom.nl', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_games`
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
-- Table structure for table `tbl_invoice`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`invoice_id`, `product_id`, `customer_id`, `order_status`, `amount`, `payment_status`, `date`) VALUES
(1, 3, 6, 'paid', 321, 'Paid', '2015-01-24'),
(2, 6, 7, 'canceled', 123, 'Send', '2014-07-16'),
(3, 2, 2, 'send', 555, 'Send', '2016-04-07'),
(4, 1, 7, 'paid', 112, 'Paid', '1999-01-13'),
(5, 2, 4, 'paid', 7, 'Paid', '2015-01-13'),
(6, 5, 6, 'send', 99, 'Paid', '2015-01-13'),
(7, 6, 6, 'send', 6, 'Paid', '2015-01-01'),
(8, 4, 3, 'backorder', 9, 'Paid', '2014-01-13'),
(9, 2, 2, 'backorder', 8, 'Paid', '2015-01-12'),
(10, 3, 3, 'backorder', 65, 'Paid', '2015-01-07'),
(11, 4, 5, 'send', 4, 'Paid', '2015-01-26'),
(12, 4, 4, 'canceled', 4, 'Paid', '2015-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto increment, primary key, unique product ID',
  `name` varchar(255) NOT NULL COMMENT 'Product name',
  `description` longtext NOT NULL COMMENT 'Product description',
  `item_price` float NOT NULL COMMENT 'Product price',
  `size` varchar(3) NOT NULL,
  `category` varchar(60) NOT NULL COMMENT 'Product category',
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL COMMENT 'Secondary product image',
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `name`, `description`, `item_price`, `size`, `category`, `image`, `image2`, `stock`) VALUES
(1, 'Luftrauser T-shirt', '\nStylish. Deadly. Beautiful. Strong.\nThese are all words that not only describe the masterful airship that is a Luftrauser ... but this shirt adorning the ships themselves!\nWhat is that rookie? You have never piloted a Luftrauser before? Pick up LUFTRAUSERS today on PC, Mac, PlayStation 3, PSVita or Linux!', 18, '', 'Clothes', '../assets/img/tshirt-luftrausers.jpg', '', 10),
(2, 'Vlambeer T-shirt', 'T-shirt with Vlambeer logo on chest', 17.99, '', 'Clothes', '../assets/img/tshirt-vlambeer.jpg', '', 10),
(3, 'Vlambeer 1st Birthday T-shirt', 'Dancing Vlambeer T-shirt', 18, '', 'Clothes', '../assets/img/tshirt-dancing-vlambeer.jpg', '', 10),
(4, 'GUN GODZ T-shirt', 'GUN GODZ T-shirt with butt.', 18, '', 'Clothes', '../assets/img/tshirt-gungodz-butt.jpg', '', 10),
(5, 'Vlambeer''s Crate Box Bundle', 'Includes t-shirt, exclusive poster, Vlambeer OST, pins, most of our 2010-2012 games on custom USB-drive', 50, '', 'Bundles', '../assets/img/crate-box-bundle.jpg', '', 10),
(6, 'Vlambeer OST (Physical)', '\n		Few Indie Game Devs get their paws wet with as many composers and artists as Vlambeer does, and the logical conclusion is this, the Vlambeer Original Soundtrack. \n		Comprised of compositions from a variety of artists across a multitude of games, it’s the perfect collection for any gaming, music, or Vlambeer fan.\n	\n\n<ul class="list1">\n<li>1. GG Main Theme</li>										\n<li>2. RF Theme</li>\n<li>3. DZK Calm Seas</li>\n<li>4. DZK Menu Theme</li>\n<li>5. DZK Week #1</li>\n<li>6. DZK Week #2</li>\n<li>7. DZK Week #3</li>\n<li>8. DZK Night Theme</li>\n<li>9. LR Theme</li>\n<li>10. SCB Theme</li>\n<li>11. SCB Tutorial</li>\n<li>12. SCB Construction Ya</li>\n<li>13. SCB Rocket Silo</li>\n<li>14. SCB Moon Temple</li>\n<li>15. SCB Elevator Music</li>\n<li>16. LRS Demo 1</li>\n<li>17. LRS Demo 2</li>\n<li>18. LRS Demo 3</li>\n<li>19. SCB Interlude</li>\n</ul>\n<ul class="list2">\n<li>20. YH Day</li>\n<li>21. YH Night</li>\n<li>22. SS:TRE Menu Theme</li>\n<li>23. SS:TRE Desert Theme</li>\n<li>24. SS:TRE Temple Theme</li>\n<li>25. SS:TRE Pyramid Theme</li>\n<li>26. SS:TRE Boss Theme</li>\n<li>27. RF Radical Fishing</li>\n<li>28. GG Venus Supermax</li>\n<li>29. GG Sewers</li>\n<li>30. GG Boss Battle #1</li>\n<li>31. GG Basement</li>\n<li>32. GG Hotel Lobby</li>\n<li>33. GG Boss Battle #2</li>\n<li>34. SCB Early Test</li>\n<li>35. SCB Construction Yard (Kozilek Remix)</li>\n<li>36. GG Phonecall</li>\n</ul>', 12.99, '', 'Music', '../assets/img/vlambeer-ost-physical.jpg', '../assets/img/vlambeer-ost-physical-2.jpg', 10),
(7, 'Vlambeer OST (Digital)', 'Includes unlimited streaming via the free Bandcamp app, plus high-quality download in MP3, FLAC and more.\n\n<ul class="list1">\n<li>1. GUN GODZ - Main Theme</li>										\n<li>2. Ridiculios Fishing - Theme</li>\n<li>3. Ridiculios Fishing - Calm Seas</li>\n<li>4. Dinosaur Zookeeper - Menu Theme</li>\n<li>5. Dinosaur Zookeeper - Week #1</li>\n<li>6. Dinosaur Zookeeper - Week #2</li>\n<li>7. Dinosaur Zookeeper - Week #3</li>\n<li>8. Dinosaur Zookeeper - Night Theme</li>\n<li>9. LUFTRAUSERS - Theme</li>\n<li>10. Super Crate Box - Theme</li>\n<li>11. Super Crate Box - Tutorial</li>\n<li>12. Super Crate Box - Construction Yard</li>\n<li>13. Super Crate Box - Rocket Silo</li>\n<li>14. Super Crate Box - Moon Temple</li>\n<li>15. Super Crate Box - Elevator Music</li>\n<li>16. LUFTRAUSERS - Demo #1</li>\n<li>17. LUFTRAUSERS - Demo #2</li>\n<li>18. LUFTRAUSERS - Demo #3</li>\n<li>19. Super Crate Box - Interlude</li>\n<li>20. Yeti Hunter - Day</li>\n<li>21. Yeti Hunter - Night</li>\n</ul>\n\n<ul class="list2">\n<li>22. Serious Sam: The Random Encounter - Menu Theme</li>\n<li>23. Serious Sam: The Random Encounter - Desert Theme</li>\n<li>24. Serious Sam: The Random Encounter - Temple Theme</li>\n<li>25. Serious Sam: The Random Encounter - Pyramide Theme</li>\n<li>26. Serious Sam: The Random Encounter - Boss Theme</li>\n<li>27. Radical Fishing - Radical Fishing Theme</li>\n<li>28. GUN GODZ - Venus Supermax</li>\n<li>29. GUN GODZ - Sewers</li>\n<li>30. GUN GODZ - Boss Battle #1</li>\n<li>31. GUN GODZ - Basement</li>\n<li>32. GUN GODZ - Hotel Lobby</li>\n<li>33. GUN GODZ - Boss Battle #2 (Rooftop)</li>\n<li>34. Super Crate Box - Early Test</li>\n<li>35. Super Crate Box - Construction Yard (KOZILEK remix)</li>\n<li>36. GUNGODZ - Phonecall</li>\n</ul>', 6, '', 'Music', '../assets/img/vlambeer-ost-digital.jpg', '', 10),
(8, 'Super Crate Box Re-arranged OST (Digital)', 'Super Crate Box soundtrack arranged with a band\n\n<ul class="list1">\n<li>1. Tutorial</li>										\n<li>2. Menu</li>\n<li>3. Construction yard</li>\n<li>4. Rocket silo</li>\n<li>5. Rest</li>\n<li>6. Moon temple</li>\n</ul>', 4, '', 'Music', '../assets/img/super-crate-box-ost.jpg', '', 10),
(9, 'Luftrauser Limited Edition', 'Luxury LUFTRAUSERS edition incl. soundtrack, 3D printed airplane model. Only one made per LUFTRAUSERS build.', 4, '', 'Bundles', '../assets/img/luftrausers-limited-edition.jpg', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `email`, `name`, `last_name`) VALUES
(1, 'Daniel', 'daniel1234', 'daniel@vlambeer.com', 'Daniel', 'van Bavel'),
(2, 'Menno', 'admin123', 'menno@vlambeer.com', 'Menno', 'van der Krift'),
(3, 'Rick', 'admin123', 'rick@vlambeer.com', 'Rick', 'Frenken'),
(4, 'Mike', 'admin123', 'mike@vlambeer.com', 'Mike', 'Oerlemans'),
(5, 'Friso', 'friso123', 'friso@vlambeer.com', 'Friso', 'Kin'),
(6, 'Koen', 'koen123', 'koen@vlambeer.com', 'Koen', 'de Bont'),
(7, 'Regilio', 'admin123', 'info@vlambeer.com', 'Regilio', 'Dielemans'),
(8, 'Jan', 'admin123', 'jan@vlambeer.com', 'Jan', 'Adriaans');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `tbl_invoice_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`),
  ADD CONSTRAINT `tbl_invoice_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
