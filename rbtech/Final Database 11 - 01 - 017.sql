-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2017 at 03:34 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `keyur`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'a', 'a'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE IF NOT EXISTS `cart_item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cart_user_id` varchar(10) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `ptitle` varchar(1000) NOT NULL,
  `pimage` varchar(1000) NOT NULL,
  `pprice` varchar(100) NOT NULL,
  `pquantity` varchar(100) NOT NULL,
  `psubtotal` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id`, `cart_user_id`, `email`, `ptitle`, `pimage`, `pprice`, `pquantity`, `psubtotal`) VALUES
(1, '1', 'keyur@gmail.com', 'Nini''s Kitchen', 'product_images/f6265a97278ced41c5eb5475f64fafebmini.jpg', '1', '1', '1'),
(2, '2', 'dharminsuthar98@gmail.com', 'Nini''s Kitchen', 'product_images/f6265a97278ced41c5eb5475f64fafebmini.jpg', '2', '1', '2'),
(3, '3', 'dharminsuthar98@gmail.com', 'Nini''s Kitchen', 'product_images/f6265a97278ced41c5eb5475f64fafebmini.jpg', '2', '3', '6'),
(4, '4', 'amit.andipara@gmail.com', 'Oasis 10 Pulls', 'product_images/3cf2063c76f2d309851264f16b0114bbUntitled-1.jpg', '35', '1', '35'),
(5, '5', 'md@rbtechindia.com', 'Lemon', 'product_images/6d914d84cc7af534888b35960b4067f2Untitled-1.jpg', '35', '1', '35');

-- --------------------------------------------------------

--
-- Table structure for table `cart_user_details`
--

CREATE TABLE IF NOT EXISTS `cart_user_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `state` varchar(1000) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_time` varchar(100) NOT NULL,
  `read1` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cart_user_details`
--

INSERT INTO `cart_user_details` (`id`, `name`, `email`, `address`, `city`, `state`, `pincode`, `mobile`, `order_date`, `order_time`, `read1`) VALUES
(1, 'Keyur Vala', 'keyur@gmail.com', 'Jalara Nagar', 'Rajkot', 'Maharastra', '784512', '9909938381', '15/12/16', '04:12:58', 'y'),
(2, 'Dharmin Suthar', 'dharminsuthar98@gmail.com', '84, Satsang Park, Nr. Madhav School,\r\nVastral road', 'Ahmedabad', 'GA', '382418', '8401853906', '16/12/16', '12:12:49', 'y'),
(3, 'Dharmin Suthar', 'dharminsuthar98@gmail.com', '84, Satsang Park, Nr. Madhav School,\r\nVastral road', 'Ahmedabad', 'GA', '382418', '8401853906', '16/12/16', '01:12:26', 'y'),
(4, 'amit', 'amit.andipara@gmail.com', '301, giriraj-2 appartment,\r\njivraj park', 'rajkot', 'gujarat', '360005', '9925010051', '06/01/17', '04:01:25', 'n'),
(5, 'Ravi ', 'md@rbtechindia.com', '24 get\r\nchennai', 'chennai', 'tamilnadu', '387002', '9825568862', '10/01/17', '12:01:35', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `galleryphoto`
--

CREATE TABLE IF NOT EXISTS `galleryphoto` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `photo` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `galleryphoto`
--

INSERT INTO `galleryphoto` (`id`, `photo`) VALUES
(30, 'gallery_images/c5eb9c492f84d6c491feff6391fc68b8Wall mini.jpg'),
(28, 'gallery_images/f70b79ed1124964e786732747c822b2c01 ICE.jpg'),
(25, 'gallery_images/e8f4a27609ab41db812d359ccb9f9023Lemon Mini.jpg'),
(29, 'gallery_images/b65334f13f2da70acaa286f3f17b2ae3Wall Prmium copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home_description`
--

CREATE TABLE IF NOT EXISTS `home_description` (
  `home_description` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_description`
--

INSERT INTO `home_description` (`home_description`) VALUES
('<p>&nbsp;R.B.Tech Industries Ltd., a korean technology based company, is rapidly making a place for itself in the Hygiene &amp; Cleaning specialty space. What started off as a small enterprise catering to the domestic market, has today become a company with a global footprint.</p>\r\n<p>R&amp;D has always been the prime focus area of R.B.TECH As a result we have developed a variety of hygiene from single to multi packed and rolled type products lines including specialized .</p>\r\n<p>We are now looking to develop multi-function products, such as wet wipes for restaurant, baby Wipes, Special Wipes, Refreshment Wipes, Hospitality &nbsp;and other multi-purpose that also concern with hygiene and improve your life pattern.</p>\r\n<p>We aim to strengthen our position in the Health &amp; hygiene Specialty niche. Consistent product development and R&amp;D investment therefore continue to be our priority. We patent our inventions and designs, and register trademarks, thereby safeguarding ourselves against imitation products and brand erosion. We understand the importance of quality and safety in a segment such as ours. Consequently, we have worked towards ISO Certification and Safety Approval of our products.</p>\r\n<p>Our mission is to fulfil the health and hygiene needs of our customers by offering them product variety and quality, and excellent service. We will continue to work towards the perfect balance between domestic and overseas demand, while focusing on R&amp;D and product development.</p>\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE IF NOT EXISTS `main_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `main_category_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`id`, `main_category_name`) VALUES
(1, 'Oasis'),
(2, 'OEM');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pnum` int(25) NOT NULL AUTO_INCREMENT,
  `main_category_name` varchar(1000) NOT NULL,
  `sub_category_name` varchar(1000) NOT NULL,
  `sub_sub_category_name` varchar(1000) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pdescription` varchar(500) NOT NULL,
  `pfeatures` varchar(500) NOT NULL,
  `pwidth` int(25) NOT NULL,
  `pheight` int(25) NOT NULL,
  `pflavor` varchar(50) NOT NULL,
  `pibnum` int(20) NOT NULL,
  `pibtype` varchar(50) NOT NULL,
  `pobnum` int(20) NOT NULL,
  `pprice` int(50) NOT NULL,
  `pdiscounts` varchar(1000) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  PRIMARY KEY (`pnum`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pnum`, `main_category_name`, `sub_category_name`, `sub_sub_category_name`, `pname`, `pdescription`, `pfeatures`, `pwidth`, `pheight`, `pflavor`, `pibnum`, `pibtype`, `pobnum`, `pprice`, `pdiscounts`, `pimage`) VALUES
(102, 'Oasis', 'Oasis Pulls', 'Oasis Lemon', 'Lemon', 'Oasis 10 Pulls', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance Purify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 200, 'Lemon', 10, '', 180, 35, '*39', 'product_images/6d914d84cc7af534888b35960b4067f2Untitled-1.jpg'),
(22, 'Oasis', 'Oasis Mini', 'Oasis Lemon', 'Lemon', '> Hygiene Products. > Less then 30 TDS\r\n> Ultra Soft                > pH Balanced \r\n>', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'Lemon', 100, 'pcs/IB', 22, 300, '*39', 'product_images/520d87fc24ae6571e89eccdf579107d503-1.jpg'),
(23, 'Oasis', 'Oasis Mini', 'Oasis Aloevera & Cucumber', 'Aloevera & Cucumber', 'Oasis Aloevera & Cucumber', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'Aloevera & Cucumber Mix', 100, 'pcs/IB', 22, 300, '*39', 'product_images/e8845096510c63ded20a29e838a53df902.jpg'),
(24, 'Oasis', 'Oasis Mini', 'Oasis Lavender', ' Lavender', 'Oasis Lavender', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, '', 100, 'pcs/IB', 22, 300, '*39', 'product_images/3f9923a2ce83febc0c690de9cbf17ec301.jpg'),
(43, 'OEM', 'Hotels and Restaurant', '', 'Hotels And Restaurant', 'Hotels And Restaurant', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/8c1b79affa4cfcbd8638eca46c4a52a106.jpg'),
(42, 'OEM', 'Hotels and Restaurant', '', 'Hotels And Restaurant', 'Hotels And Restaurant', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '*39', 'product_images/675e5dd24b3ffb4d37f17d2c46177a0405.jpg'),
(27, 'Oasis', 'Oasis Premium', 'Oasis Lemon', 'Lemon', 'Oasis Lemon', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 200, 'Aloevera & Cucumber Mix', 25, 'pcs/IB', 48, 99, '*39', 'product_images/49dc547f1d9d2807d290c3692815f0b401.jpg'),
(28, 'Oasis', 'Oasis Premium', 'Oasis Aloevera & Cucumber', 'Aloevera & Cucumber', 'Oasis Aloevera & Cucumber', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 200, 'Lavender', 25, 'pcs/IB', 48, 99, '*39', 'product_images/99937c355b5b893d70c11fe31554ff7802.jpg'),
(29, 'Oasis', 'Oasis Premium', 'Oasis Lavender', 'Lavender', 'Oasis Lavender', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 200, 'Lemon', 25, 'pcs/IB', 48, 99, '*39', 'product_images/9178d345a44515be3e19cdcfd375069303.jpg'),
(104, 'Oasis', 'Oasis Pulls', 'Oasis Aloevera & Cucumber', 'Aloevera & Cucumber', 'Oasis 10 Pulls', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance Purify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 200, 'Aloevera & Cucumber Mix', 10, 'pcs/IB', 180, 35, '*39', 'product_images/9da1e0183faa0d75d84fcb7b3cb8e64eSingle 2 jpg.jpg'),
(39, 'OEM', 'Hotels and Restaurant', '', 'Hotels And Restaurant', 'Hotels And Restaurant', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'As Per Requirement', 100, 'pcs/IB', 22, 300, '*39', 'product_images/7906688122919c820ab4217fbe3130fa02.jpg'),
(38, 'OEM', 'Hotels and Restaurant', '', 'Hotels And Restaurant', 'Hotels And Restaurant', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'As Per Requirement', 100, 'pcs/IB', 22, 300, '*39', 'product_images/993cb2f9f1482596a6f316d03606694c01.jpg'),
(106, 'Oasis', 'Oasis Spa and Salons', '', 'Spa & Salon (Women)', 'Spa & Salon (Women)', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance Purify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'As Per Requirement', 50, 'pcs/IB', 2200, 150, '*39', 'product_images/dfdbf8ef9537ebf83b52848b4fac49fd02-02.jpg'),
(41, 'OEM', 'Hotels and Restaurant', '', 'Hotels And Restaurant', 'Hotels And Restaurant', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'As Per Requirement', 100, 'pcs/IB', 22, 300, '*39', 'product_images/fa1fe56c5f5a7a5d2ea48dcb3691ba8f04.jpg'),
(44, 'OEM', 'Hotels and Restaurant', '', 'Hotels And Restaurant', 'hotels', 'hotels', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/14d59596f135c579ed7e345b61afb65f07.jpg'),
(45, 'OEM', 'Hotels and Restaurant', '', 'Hotels And Restaurant', 'hotels', 'hotels', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/2c726e104b0009de8087ae3c8e5cdfc008.jpg'),
(46, 'OEM', 'Hotels and Restaurant', '', 'Hotels And Restaurant', 'hotels', 'hotels', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '*39', 'product_images/312aa5969b8d73ac1d86a4fa23bdd1f509.jpg'),
(47, 'OEM', 'Hotels and Restaurant', '', 'Hotels And Restaurant', 'hotels', 'hotels', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/4cf78edd65a7a255e1e05f8ad571ee4310.jpg'),
(48, 'OEM', 'Hotels and Restaurant', '', 'Hotels And Restaurant', 'hotels', 'hotels', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '*39', 'product_images/ff40af6714abaaa30315f2a340f7984311.jpg'),
(49, 'OEM', 'Dispossible', '', 'Dispossible', 'Dispossible', 'Dispossible', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/7f52ac2ca3acfdcf17eb39d7ac5373dc01.jpg'),
(50, 'OEM', 'Dispossible', '', 'Dispossible', 'Dispossible', 'Dispossible', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/260b89b89fbbf42960a653387d9d4cb902.jpg'),
(51, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/e9f914c0f4bd52736c885d7fef8dad5201.jpg'),
(52, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/c25c268e92cb74f64ca2edabc79cae4a02.jpg'),
(53, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/3198256e5264e4391ffc5ffa7cb59fa403.jpg'),
(54, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/38795441c441e0b760bd6284864b2cb204.jpg'),
(55, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/6a9f265a021fcd1ad04f296566b43fa005.jpg'),
(56, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/2efe6e5caf4aaac919eb6fee1440dd5506.jpg'),
(57, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/117969bd51f8ce1b12a3b5eff4cbcfe107.jpg'),
(58, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/ae9092c13f6fb2104f9c1705dd9261e908.jpg'),
(59, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/16f21c167ca6096e9222a44f74024d6609.jpg'),
(60, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'Aloevera & Cucumber Mix', 1, 'pcs/IB', 1, 1, '1', 'product_images/219b83efa49cb84f1569c857d401060f10.jpg'),
(61, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/80d342b50d26aa95868da2150d6a293011.jpg'),
(62, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/d42203b36fb47615ee5ff4c7dbaefd9d12.jpg'),
(63, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/335a2563c9bca1def5096a654795acf313.jpg'),
(64, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/38b9275d8dea24348b781402bc6c505814.jpg'),
(65, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/b01b1983a407f323ca673ea56d983efc15.jpg'),
(66, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/0af46968c5986eb84e63929b1092112216.jpg'),
(67, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/aa5ac160e583cefdaabc70978bba27d417.jpg'),
(68, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/4ee09764091d7ae3d5cd691f5a4983cd18.jpg'),
(69, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/5f3916e5add68f58dc2007fc27b9a28d19.jpg'),
(70, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/702184f9a0bbf592b7f0d684435c7cd920.jpg'),
(71, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/a2e3dd061577eef8c5b15cf1b3005c0521.jpg'),
(72, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/8019f395aa9f3ccb1a1bdd4bcd2ff76d22.jpg'),
(73, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/bag', 1, 1, '1', 'product_images/24c08f17809c9654ccd45b7c7ab6c2be23.jpg'),
(74, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, '', 1, 'pcs/IB', 1, 1, '1', 'product_images/6afec2be659819976861dd6c263aa95324.jpg'),
(75, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/49095fd643215156afd77d246badc5a725.jpg'),
(76, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'Lemon', 1, 'pcs/IB', 1, 1, '1', 'product_images/05e4e6e90fb1118d3ea208856b2e4e8626.jpg'),
(77, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'As Per Requirement', 1, 'Pkts/IB', 1, 1, '1', 'product_images/843d2faa1c7d1a4207bd1b0e4e87bc5927.jpg'),
(78, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'Lavender', 1, 'pcs/IB', 1, 1, '1', 'product_images/ddda189e983d85a568f7dce309cba96c28.jpg'),
(79, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'Aloevera & Cucumber Mix', 1, 'pcs/IB', 1, 1, '1', 'product_images/bdec9794874a4a17af8bf51423730c3b29.jpg'),
(80, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'Lemon', 1, 'pcs/IB', 1, 1, '1', 'product_images/b7865359e4c70ea99274d14085ea9a1e30.jpg'),
(81, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'Lemon', 1, 'pcs/IB', 1, 1, '1', 'product_images/942942fee337d89d29620bbbca759ff231.jpg'),
(82, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'Lavender', 1, 'Pkts/IB', 1, 1, '1', 'product_images/2f409b885ff4d9b8e871387135c1de6e32.jpg'),
(83, 'OEM', 'Corporate', '', 'Corporate', 'Corporate', 'Corporate', 150, 150, 'Lemon', 1, 'Pkts/IB', 1, 1, '1', 'product_images/f49613b8f1b3aa64d888a401b49192a033.jpg'),
(84, 'OEM', 'Pharma', '', 'Pharma', 'Pharma', 'Pharma', 150, 150, 'As Per Requirement', 1, 'pcs/IB', 1, 1, '1', 'product_images/f7eb9fd4ae1c98811460e75a0ae5cfc301.jpg'),
(85, 'OEM', 'Pharma', '', 'Pharma', 'Pharma', 'Pharma', 150, 150, 'Lavender', 1, 'Pkts/IB', 1, 1, '1', 'product_images/131ee0b62d64b86cd04d3e3e51f3670c02.jpg'),
(86, 'OEM', 'Pharma', '', 'Pharma', 'Pharma', 'Pharma', 150, 150, 'Lavender', 1, 'pcs/IB', 1, 1, '1', 'product_images/bffbbdc3487572e0342a2fe573d52d8f03.jpg'),
(87, 'OEM', 'Pharma', '', 'Pharma', 'Pharma', 'Pharma', 150, 150, 'Aloevera & Cucumber Mix', 1, 'pcs/IB', 1, 1, '1', 'product_images/1bf8ab537b345b89fe342437baf9aa6c04.jpg'),
(88, 'OEM', 'Pharma', '', 'Pharma', 'Pharma', 'Pharma', 150, 150, 'Lemon', 1, 'Pkts/IB', 1, 1, '1', 'product_images/7b971248fe2b445ac09979a2bde2d0da05.jpg'),
(89, 'OEM', 'Pharma', '', 'Pharma', 'Pharma', 'Pharma', 150, 150, 'Lemon', 1, 'pcs/IB', 1, 1, '1', 'product_images/569f770f6dd8ac944b9b85c6dfbcf6eb06.jpg'),
(90, 'OEM', 'Pharma', '', 'Pharma', 'Pharma', 'Pharma', 150, 150, 'Aloevera & Cucumber Mix', 1, 'pcs/IB', 1, 1, '1', 'product_images/fbf1c5401b384d27193893df566c1ba207.jpg'),
(91, 'OEM', 'Pharma', '', 'Pharma', 'Pharma', 'Pharma', 150, 150, 'Lavender', 1, 'pcs/IB', 1, 1, '1', 'product_images/2d4a26fef25cc2a0a0f2849dd4ed59ca08.jpg'),
(96, 'Oasis', 'Oasis Regular', '', 'Oasis Regular', 'Oasis Regular', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 200, 220, 'Lemon', 25, 'pcs/IB', 48, 125, '*39', 'product_images/51a22abddd7a9f52e84fdbdf872d79be01.jpg'),
(105, 'Oasis', 'Oasis Spa and Salons', '', 'Spa & Salon (Men)', ' Spa & Salon (Men)', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance Purify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'As Per Requirement', 50, 'pcs/IB', 2200, 150, '*39', 'product_images/3daad1c8a5ceca45f417af2130cbfce301-01.jpg'),
(103, 'Oasis', 'Oasis Pulls', 'Oasis Lavender', 'Lavender', 'Oasis 10 Pulls', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance Purify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 200, 'Lavender', 10, 'pcs/IB', 180, 35, '*39', 'product_images/23fc54cbb2e3fd340d48f5770df5f643Single 1 jpg.jpg'),
(97, 'Oasis', 'Oasis Regular', '', 'Oasis Regular', 'Oasis Regular', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 200, 200, 'As Per Requirement', 25, 'pcs/IB', 48, 125, '*39', 'product_images/b2def0ed8eb144f7f09552fddf9e1f17Orange with box.jpg'),
(98, 'OEM', 'Spa and Salons', '', 'Spa & Salons (Men)', 'Oasis Spa & Salons', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'As Per Requirement', 50, 'pcs/IB', 2200, 150, '*39', 'product_images/bf7b6d34b172d7becad3ab7177bade7a01-01.jpg'),
(99, 'OEM', 'Spa and Salons', '', 'Spa & Salons (Women)', 'Oasis Spa & Salons', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'As Per Requirement', 50, 'pcs/IB', 2200, 150, '*39', 'product_images/981fde4c8252a3223c0d8e04e0b1945402-02.jpg'),
(100, 'Oasis', 'Oasis Ceremoney', 'Wedding', 'Wedding', 'Oasis Wedding', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'As Per Requirement', 100, 'pcs/IB', 22, 300, '*39', 'product_images/709387244bf5116ed4fe409ae7ae53e5PHTO9595.jpeg'),
(101, 'Oasis', 'Oasis Ceremoney', 'Birthday', 'Birthday', 'Oasis Birthday', 'High Quality, Ultra soft Texture, Alcohol Free, Easy & Quick Clean most stains, Refreshing Fragrance\r\nPurify Water <= 30td, Ideal for all skin types, excellent for face and hands.', 150, 160, 'As Per Requirement', 100, 'pcs/IB', 22, 300, '*39', 'product_images/260e724adc06317df24f93922ae9bbdbPHTO9602.jpeg'),
(108, 'OEM', 'Spa and Salons', '', 'Spa & Salons', 'Spa & Salons', 'Spa & Salons', 150, 160, 'As Per Requirement', 10, 'pcs/IB', 10, 300, '*39', 'product_images/f7d6a146555e6ccf088646b326cf9907Love jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `main_category_id` int(10) NOT NULL,
  `sub_category_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `main_category_id`, `sub_category_name`) VALUES
(25, 2, 'Spa and Salons'),
(2, 1, 'Oasis Mini '),
(3, 1, 'Oasis Premium'),
(4, 1, 'Oasis Regular'),
(5, 1, 'Oasis Pulls'),
(15, 1, 'Oasis Spa and Salons'),
(17, 2, 'Hotels and Restaurant'),
(18, 2, 'Dispossible'),
(22, 2, 'Corporate'),
(20, 2, 'Pharma'),
(26, 1, 'Oasis Ceremoney'),
(27, 2, 'All Products');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_sub_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `main_category_id` int(10) NOT NULL,
  `sub_category_id` int(10) NOT NULL,
  `sub_sub_category_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `sub_sub_category`
--

INSERT INTO `sub_sub_category` (`id`, `main_category_id`, `sub_category_id`, `sub_sub_category_name`) VALUES
(3, 1, 2, 'Oasis Lemon '),
(4, 1, 2, 'Oasis Aloevera & Cucumber'),
(5, 1, 2, 'Oasis Lavender'),
(6, 1, 3, 'Oasis Lemon'),
(7, 1, 3, 'Oasis Aloevera & Cucumber'),
(8, 1, 3, 'Oasis Lavender'),
(19, 1, 5, 'Oasis Lemon'),
(20, 1, 5, 'Oasis Aloevera & Cucumber'),
(21, 1, 5, 'Oasis Lavender'),
(18, 1, 26, 'Wedding'),
(17, 1, 26, 'Birthday');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `state` varchar(1000) NOT NULL,
  `pincode` varchar(1000) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `name`, `email`, `password`, `address`, `city`, `state`, `pincode`, `mobile`) VALUES
(1, 'Rachit1', 'rachit@gmail.com1', 'rachit', 'rajkot1', 'Rajkot1', 'Gujarat1', '3600051', '98989898981'),
(6, 'Keyur Vala', 'keyur@gmail.com', 'd5a8288e95e5ebdd3398098a3e777333', 'Jalara Nagar', 'Rajkot', 'Maharastra', '784512', '9909938381'),
(4, 'Amit', 'amit@gmail.com', '0cb1eb413b8f7cee17701a37a1d74dc3', 'rajkot', 'Rajkot', 'Gujarat', '360490', '4587655465'),
(7, 'Rambhai', 'rambhai@gmail.com', 'e418090b8938eafbcd5f2c59af35e7a3', 'leela gali', 'Bhayavadar', 'Gujarat', '360490', '987845678'),
(8, 'Leelaben', 'leela@gmail.com', '06d778aa57cb002fe849bf880324d2ad', 'rambhai ni gali', 'Ghoghavadar', 'Gujarat', '364754', '845326545'),
(9, 'amit', 'amit.andipara@gmail.com', 'd2b3f63948406cb893544cee035531d3', '301, giriraj-2 appartment,\r\njivraj park', 'rajkot', 'gujarat', '360005', '9925010051'),
(10, 'ABV', 'aa@a.cc', '162527b0d84192f1e191d066f1bfa3b8', 'asd', 'a', 'a', '123456', '123456'),
(11, 'babulal', 'babulal@gmail.com', '3557a2c3f2caf6f9f26d4eafa490d2b2', 'bhikha gali', 'lilanagar', 'ramrajya', '345467', '5421562312'),
(12, 'Rachit Mangi', 'rachitmangi94@gmail.com', 'f5c1292986d0d51a89a9ea328bb387f7', 'jamnagar', 'Jamnagar', 'Jamnagar', '361005', '9887546521'),
(14, 'dzcdsf', 'hranihetal007@gmail.com', '704debc869ac60068f8168138bc3bbaf', 'cfsdfcddfdsa', 'fd', 'sadsasa', '654823', '9157040043'),
(15, 'Dharmin Suthar', 'dharminsuthar98@gmail.com', '5ec919e8d3e5672f7501245564588a60', '84, Satsang Park, Nr. Madhav School,\r\nVastral road', 'Ahmedabad', 'GA', '382418', '8401853906'),
(16, 'Ravi ', 'md@rbtechindia.com', '25d55ad283aa400af464c76d713c07ad', '24 get\r\nchennai', 'chennai', 'tamilnadu', '387002', '9825568862');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
