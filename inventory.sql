-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 07:42 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--
DROP DATABASE IF EXISTS `inventory`;
CREATE DATABASE IF NOT EXISTS `inventory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventory`;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE IF NOT EXISTS `manufacturers` (
  `manufacturer_id` int(4) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `state` char(2) NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `mname`, `state`) VALUES
(1001, 'HP', 'CA'),
(1002, 'Canon', 'NY'),
(1003, 'Xerox', 'CT'),
(1004, 'Epson', 'CA'),
(1005, 'Dell', 'TX'),
(1006, 'Brother', 'JP');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` int(7) NOT NULL,
  `manufacturer_id` int(4) NOT NULL,
  `image` varchar(120) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `manufacturer_id` (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `manufacturer_id`, `image`, `description`) VALUES
(1, 'HP LaserJet Pro', '429.99', 500, 1001, 'https://images-na.ssl-images-amazon.com/images/I/71iebDfS6lL._AC_SL1500_.jpg', 'It\'s built to keep your business moving forward - the HP LaserJet Pro M404dn keeps up with how you actually work, collaborate, and get things done. With fast print speeds, best-in-class security, and built-in Ethernet capabilities, This monochrome laser printer is designed to let you focus your time on growing your business and staying ahead of the competition. This black and White laser printer is also designed with the environment in mind; save up to 18% energy over prior products with HP Eco Smart black Toner, and help save paper right out of the box with the default paper savings mode.\r\n\r\n'),
(2, 'Canon Pixma', '39.99', 250, 1002, 'https://images-na.ssl-images-amazon.com/images/I/81qAy8skVEL._AC_SL1500_.jpg', 'Wireless All In One Printer with Scanner and Copier: Mobile and Tablet Printing with Airprint and Google Cloud Print compatible'),
(3, 'Epson Expression ET-2550', '269.99', 300, 1004, 'https://images-na.ssl-images-amazon.com/images/I/71lBtJkqIWL._AC_SL1500_.jpg', 'The 5-color Expression Premium XP-7100 wireless Small-in-One printer delivers superior photo quality and versatility, ideal for productive, creative families. Save time with a 30-page Auto Document Feeder and auto 2-sided printing, copying and scanning. Print vivid, borderless photos up to 8\" x 10\", or on specialty paper (1) and DVDs. The intuitive 4.3\" touchscreen allows you to view, edit and print photos, directly from a USB or card slot (2). And, you can easily print from your tablet or smartphone (3) — with or without a router — at home or on the go. Plus, print 4\" x 6\" photos in as fast as 12 seconds (5), as well as custom projects with the Creative Print App.\r\n\r\n'),
(4, 'Epson Workforce Pro', '129.99', 235, 1004, 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/5732/5732906_sd.jpg;maxHeight=1000;maxWidth=1000', 'Powered by PrecisionCore, the WorkForce WF-7710 wide-format all-in-one printer quickly produces print-shop-quality borderless prints up to 13\" x 19\" and scans up to 11\" x 17\". A versatile inkjet, it features a 250-sheet tray, plus a rear feed for specialty paper, ensuring added productivity for any office. It also includes auto 2-sided print, copy, scan and fax, plus a 35-page Auto Document Feeder. Use the 4.3\" color touchscreen for easy navigation and control.'),
(5, 'HP LaserJet Enterprise', '599.99', 55, 1001, 'https://images-na.ssl-images-amazon.com/images/I/51uycaCzskL._SX679_.jpg', 'Redefine long-term expectations with the HP LaserJet Enterprise M507n. This monochrome laser printer is designed to keep up with the demands ofgrowing business, with the world\'s most secure printing and technology that saves up to 29% energy over prior products with HP JetIntelligencetoner. Help get more control with easy-to-use features, a robust management system, and solutions that keep business moving.'),
(6, 'Brother RuggedJet Printer', '699.99', 20, 1006, 'https://images-na.ssl-images-amazon.com/images/I/8109RXJfugL._SL1500_.jpg', ' This high-performance office solution keeps moving at the pace of your business by offering a lightning-quick speeds of up to 48 pages per minute without compromising quality. With crisp text and excellent graphics, the HL-L6300DW is a perfect laser printer for creating professional reports, spreadsheets, correspondence, and other important business documents.'),
(12, 'MK5 Pencil', '13.55', 350, 1001, 'https://images-na.ssl-images-amazon.com/images/I/31VKQWR9WmL._SX355_.jpg', 'Slick Pencil made by Canon'),
(13, 'GeForce Pen', '30.99', 300, 1006, 'https://cdn.shopify.com/s/files/1/1208/1150/products/IMG_3048_2000x.JPG?v=1497479774', 'Can create a 3D Space'),
(14, 'Dunder Mifflin Paper', '30.99', 760, 1003, 'http://photos.prnewswire.com/prn/20111128/CG13237', 'The best quality paper that you can afford for your company. Don&#39;t miss out on having this!'),
(15, 'Lightsaber Pen', '540.99', 5, 1005, 'https://hottopic.scene7.com/is/image/HotTopic/11148229_hi?$pdp_hero_standard$', 'Cut through solid metal with this amazing pen which can also function like a pen!'),
(16, 'Logic Paper Shredder', '225.99', 300, 1004, 'https://images-na.ssl-images-amazon.com/images/I/812rZCV%2BcXL._SX466_.jpg', 'This paper shred is powered by AI and can shred through the toughest of paper in a jiffy'),
(17, 'DXRacer Chair', '349.99', 25, 1006, 'https://images-na.ssl-images-amazon.com/images/I/51c9A5Cl7kL._SX466_.jpg', 'This chair is made for sitting for long periods making suitable for office work and gaming alike'),
(18, 'Axiom 3D Printer', '749.99', 4, 1005, 'https://images-na.ssl-images-amazon.com/images/I/41W9hhi-yVL._SX342_.jpg', 'Print 3D objects with this amazing printer! Fun for the work place and great for the kids!'),
(19, 'Overwatch Camera', '244.99', 50, 1002, 'https://www.lorextechnology.com/images/products/4KHDIP3232/V2/4KHDIP3232-L1.png', 'This camera can keep a watchful eye over the office in the case of thieves and computer bandits'),
(20, 'Premium Series Toner 200', '99.99', 5, 1003, 'https://images-na.ssl-images-amazon.com/images/I/61Nfv%2BxwzRL._SY355_.jpg', 'One of the best printer toners in the world. They say you can really visit the whatever you&#39;re printing through its color');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `role`) VALUES
(1, 'Creator', 'Admin', 'admin', 'password', 1),
(3, 'Jeanmarc', 'Duong', 'Jduong', 'password', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`manufacturer_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
