-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2014 at 04:38 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fr_shoesstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_brand`
--

CREATE TABLE IF NOT EXISTS `ms_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `ms_brand`
--

INSERT INTO `ms_brand` (`brand_id`, `brand_name`, `brand_desc`) VALUES
(1, 'Addidas', ''),
(2, 'Airwalk', ''),
(3, 'Converse', ''),
(4, 'Nike', ''),
(5, 'Puma', ''),
(6, 'Vans', ''),
(7, 'Kael', ''),
(8, 'FadilGG', ''),
(10, 'Pierre Cardine', ''),
(11, 'Mustofa Shoes', 'Sepatu buatan Mas Mustofa'),
(12, 'Rini Shoes', 'Test'),
(20, 'Faisal Shoes', 'Online Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `ms_city`
--

CREATE TABLE IF NOT EXISTS `ms_city` (
  `city_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ms_city`
--


-- --------------------------------------------------------

--
-- Table structure for table `ms_country`
--

CREATE TABLE IF NOT EXISTS `ms_country` (
  `country_id` int(10) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `ms_country`
--

INSERT INTO `ms_country` (`country_id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Australia'),
(3, 'Amerika Serikat'),
(4, 'Arab Saudi'),
(5, 'Bahrain'),
(6, 'Belanda'),
(7, 'Inggris'),
(8, 'Spanyol'),
(9, 'Indonesia'),
(10, 'Thailand'),
(11, 'Singapura'),
(12, 'Malaysia'),
(13, 'Brunei Darussalam'),
(14, 'Myanmar'),
(15, 'Vietnam'),
(16, 'Laos'),
(17, 'Pakistan'),
(18, 'Uni Emirat Arab'),
(19, 'Bangladesh'),
(20, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `ms_customer`
--

CREATE TABLE IF NOT EXISTS `ms_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `country` varchar(20) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `post_code` int(14) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone_no` varchar(18) NOT NULL,
  `bank_account` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ms_customer`
--

INSERT INTO `ms_customer` (`customer_id`, `customer_name`, `customer_address`, `country`, `province`, `city`, `post_code`, `customer_email`, `username`, `password`, `gender`, `phone_no`, `bank_account`, `create_date`) VALUES
(4, 'Fransen T', 'Ciledug Raya 12', '', 'DKI Jakarta', 'Jakarta Selatan', 102934, 'fransen@gmail.com', 'fransen', 'fransen', 'Male', '2147483647', '', '2013-11-29 11:34:43'),
(5, 'Kunglau234', 'Priouk', '', 'DKI Jakarta', 'Jakarta Utara', 99999, 'alhusna99@ymail.com', 'kunglawasik', 'kunglawasik', 'Male', '992334456', '', '2013-11-29 11:39:08'),
(8, 'nami', 'Jalan Polisi 123', '', 'DKI Jakarta', 'Jakarta Utara', 101425, 'nam@gmail.com', 'nami', 'nami', 'Female', '2147483647', '', '2013-11-29 14:47:02'),
(9, 'jajang', 'Jl Kamasutrah 6978', '', 'DKI Jakarta', 'Jakarta Selatan', 10230, 'jajang@gmail.com', 'wowowo', 'qwerty', 'Male', '2147483647', '', '2013-12-03 14:40:57'),
(10, 'Aries Dimas Yudhistira', 'jl. warakas 4 Gg 17', 'Indonesia', 'DKI Jakarta', 'Jakarta Utara', 14130, 'alhusna_99@yahoo.co.id', 'alhusna_99', '52c69e3a57331081823331c4e69d3f2e', 'Male', '021999631', '1200965456', '2013-12-23 15:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `ms_province`
--

CREATE TABLE IF NOT EXISTS `ms_province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `ms_province`
--

INSERT INTO `ms_province` (`province_id`, `country_id`, `province`) VALUES
(1, 1, 'Kabul'),
(2, 1, 'Kandahar'),
(3, 1, 'Herat'),
(4, 9, 'DKI Jakarta'),
(5, 9, 'Jawa Barat'),
(6, 9, 'Jawa Timur'),
(7, 9, 'Jawa Tengah'),
(8, 9, 'Yogyakarta'),
(9, 9, 'Banten'),
(10, 9, 'Aceh'),
(11, 9, 'Papua'),
(12, 9, 'Kalimantan Timur'),
(13, 2, 'Carnberra'),
(14, 0, ''),
(15, 2, 'Brisbane'),
(16, 3, 'New York '),
(17, 3, 'Los Angeles'),
(18, 3, 'Washington '),
(19, 4, 'Jeddah'),
(20, 4, 'Riyadh'),
(21, 4, 'Mekkah'),
(22, 4, 'Madinah');

-- --------------------------------------------------------

--
-- Table structure for table `ms_shoes`
--

CREATE TABLE IF NOT EXISTS `ms_shoes` (
  `shoes_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `shoes_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `best_seller_flag` tinyint(11) NOT NULL,
  `publish` int(1) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`shoes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ms_shoes`
--

INSERT INTO `ms_shoes` (`shoes_id`, `brand_id`, `shoes_name`, `description`, `size`, `price`, `stock`, `best_seller_flag`, `publish`, `create_date`) VALUES
(1, 1, 'adidas Originals Samoa - Mens Comin', 'Up in the ''80s, the adidas Originals Samoa blends a mix of upper materials with the iconic colorful stripes for a look that never falls off.', '42', 700000, 16, 0, 0, '2013-11-15 00:00:00'),
(2, 1, 'adidas Originals Samba - Mens Famous ', 'For over five decades, the adidas Originals Samba celebrates it''s vintage construction this season.', '43', 730000, 34, 0, 0, '2013-11-16 00:00:00'),
(3, 4, 'Nike SB P. Rod 7 - Mens', 'A combination of perfection-minded performance and Nike innovation takes the Nike Paul Rodriguez 7 to the next level.', '44', 870000, 79, 0, 0, '2013-11-17 00:00:00'),
(4, 1, 'adidas Originals Samoa - Mens', 'Comin'' up in the ''80s, the adidas Originals Samoa blends a mix of upper materials with the iconic colorful stripes for a look that never falls off. An injected rubber outsole features the unique Trefoil tread that screams adidas style. The EVA midsole provides the cushioning you''ll love while rockin'' your swag. Be a student of the sneaker game in the adidas Originals Samoa.', '45', 680000, 47, 0, 0, '2013-11-18 00:00:00'),
(5, 6, 'Vans- Authentic Core Classics', 'Indulge in track-running nostalgia with the Vans Core Classic. This contemporary update of the Bowerman-designed classic features a basic, good-looking profile that never gets old', '45', 650000, 12, 0, 0, '2013-11-19 00:00:00'),
(6, 5, 'El Ace 3 L Sneaker Shoes', '- Sneakers\r\n- Upper material: leather\r\n- Outsole material: rubber\r\n- Warna hitam\r\n- Tali depan\r\n- Round toe', '45', 980000, 25, 0, 0, '2013-11-20 00:00:00'),
(7, 2, 'Mens The ONE- Blue Suede', 'Airwalk''s most popular heritage style of all time, the ONE was recently named Complex Magazine''s 25 Sneakers You Should Own Before You Die. Don''t miss out. ', '43', 890000, 45, 0, 0, '2013-11-21 00:00:00'),
(8, 1, 'Eminem Shoes', '', '', 200000, 20, 0, 0, '0000-00-00 00:00:00'),
(10, 1, 'google style', '', '', 500000, 155, 0, 0, '0000-00-00 00:00:00'),
(11, 7, 'Flying Dutch Sneakers', '- Canvas upper\r\n- Rubber outsole\r\n- Warna hitam\r\n- Detail tali warna kontras\r\n- Aksen stitching', '', 419000, 78, 0, 0, '2013-12-19 11:43:26'),
(12, 10, 'Pierre Cardin Black ', 'Sepatu Murah berkualitas', '0', 2000000, 12, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_shoes_image`
--

CREATE TABLE IF NOT EXISTS `ms_shoes_image` (
  `image_id` int(15) NOT NULL AUTO_INCREMENT,
  `shoes_id` int(10) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_size` int(11) NOT NULL,
  `image_type` varchar(20) NOT NULL,
  `maskot` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(15) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `ms_shoes_image`
--

INSERT INTO `ms_shoes_image` (`image_id`, `shoes_id`, `image_name`, `image_size`, `image_type`, `maskot`, `ip_address`, `datetime`) VALUES
(77, 10, 'addidas-google_style-090214023114.jpeg', 87216, 'image/jpeg', 0, '124.6.36.69', '2014-02-09 02:31:14'),
(78, 11, 'kael-flying_dutch_sneakers-090214111537.jpeg', 9640, 'image/jpeg', 0, '114.79.49.7', '2014-02-09 11:15:37'),
(79, 11, 'kael-flying_dutch_sneakers-090214111543.jpeg', 36072, 'image/jpeg', 0, '114.79.49.7', '2014-02-09 11:15:43'),
(80, 11, 'kael-flying_dutch_sneakers-090214111548.jpeg', 28628, 'image/jpeg', 0, '114.79.49.7', '2014-02-09 11:15:48'),
(81, 11, 'kael-flying_dutch_sneakers-090214111557.jpeg', 33740, 'image/jpeg', 0, '114.79.49.7', '2014-02-09 11:15:57'),
(82, 11, 'kael-flying_dutch_sneakers-090214111615.jpeg', 38182, 'image/jpeg', 1, '114.79.49.7', '2014-02-09 11:16:15'),
(83, 4, 'addidas-adidas_originals_samoa_-_mens-090214112109.jpeg', 42448, 'image/jpeg', 1, '114.79.49.7', '2014-02-09 11:21:09'),
(84, 2, 'addidas-adidas_originals_samba_-_mens_famous_-090214112434.jpeg', 21006, 'image/jpeg', 1, '114.79.49.7', '2014-02-09 11:24:34'),
(85, 2, 'addidas-adidas_originals_samba_-_mens_famous_-090214112503.jpeg', 20366, 'image/jpeg', 0, '114.79.49.7', '2014-02-09 11:25:03'),
(86, 2, 'addidas-adidas_originals_samba_-_mens_famous_-090214112807.jpeg', 29713, 'image/jpeg', 0, '114.79.49.7', '2014-02-09 11:28:07'),
(87, 2, 'addidas-adidas_originals_samba_-_mens_famous_-090214112828.jpeg', 18820, 'image/jpeg', 0, '114.79.49.7', '2014-02-09 11:28:28'),
(88, 7, 'airwalk-mens_the_one-_blue_suede-090214082547.jpeg', 87539, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:25:47'),
(89, 7, 'airwalk-mens_the_one-_blue_suede-090214082552.jpeg', 63264, 'image/jpeg', 1, '114.79.48.132', '2014-02-09 20:25:52'),
(90, 7, 'airwalk-mens_the_one-_blue_suede-090214082557.jpeg', 86500, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:25:57'),
(91, 6, 'puma-el_ace_3_l_sneaker_shoes-090214082745.jpeg', 7095, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:27:45'),
(92, 6, 'puma-el_ace_3_l_sneaker_shoes-090214082749.jpeg', 41354, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:27:49'),
(93, 6, 'puma-el_ace_3_l_sneaker_shoes-090214082754.jpeg', 72107, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:27:54'),
(94, 5, 'vans-vans-_authentic_core_classics-090214082925.jpeg', 46917, 'image/jpeg', 1, '114.79.48.132', '2014-02-09 20:29:25'),
(95, 5, 'vans-vans-_authentic_core_classics-090214082929.jpeg', 29666, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:29:29'),
(96, 5, 'vans-vans-_authentic_core_classics-090214082933.jpeg', 34779, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:29:33'),
(97, 5, 'vans-vans-_authentic_core_classics-090214082938.jpeg', 11000, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:29:38'),
(98, 3, 'nike-nike_sb_p._rod_7_-_mens-090214083100.jpeg', 15955, 'image/jpeg', 1, '114.79.48.132', '2014-02-09 20:31:00'),
(99, 3, 'nike-nike_sb_p._rod_7_-_mens-090214083105.jpeg', 20558, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:31:05'),
(100, 1, 'addidas-adidas_originals_samoa_-_mens_comin-090214083733.jpeg', 19621, 'image/jpeg', 1, '114.79.48.132', '2014-02-09 20:37:33'),
(101, 1, 'addidas-adidas_originals_samoa_-_mens_comin-090214083737.jpeg', 19082, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:37:37'),
(102, 1, 'addidas-adidas_originals_samoa_-_mens_comin-090214083741.jpeg', 23162, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:37:41'),
(103, 1, 'addidas-adidas_originals_samoa_-_mens_comin-090214083745.jpeg', 18530, 'image/jpeg', 0, '114.79.48.132', '2014-02-09 20:37:45'),
(107, 12, 'pierre_cardine-pierre_cardin_black_-110214024437.jpeg', 37778, 'image/jpeg', 0, '124.6.36.69', '2014-02-11 02:44:37'),
(109, 12, 'pierre_cardine-pierre_cardin_black_-110214102033.jpeg', 106725, 'image/jpeg', 1, '114.79.49.225', '2014-02-11 22:20:33'),
(110, 6, 'puma-el_ace_3_l_sneaker_shoes-120214111538.jpeg', 57657, 'image/jpeg', 1, '180.178.106.110', '2014-02-12 11:15:39'),
(111, 10, 'addidas-google_style-120214113231.jpeg', 825753, 'image/jpeg', 0, '180.178.106.110', '2014-02-12 11:32:31'),
(112, 10, 'addidas-google_style-120214113602.jpeg', 15902, 'image/jpeg', 1, '180.178.106.110', '2014-02-12 11:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `ms_shoes_size`
--

CREATE TABLE IF NOT EXISTS `ms_shoes_size` (
  `size_id` int(11) NOT NULL,
  `shoes_id` int(11) NOT NULL,
  `size` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_shoes_size`
--


-- --------------------------------------------------------

--
-- Table structure for table `ms_user_admin`
--

CREATE TABLE IF NOT EXISTS `ms_user_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(244) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `join_date` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ms_user_admin`
--

INSERT INTO `ms_user_admin` (`admin_id`, `admin_name`, `group_id`, `admin_address`, `admin_email`, `username_admin`, `password_admin`, `gender`, `join_date`) VALUES
(1, '', 0, '', '', '', '', '', '2014-01-07 10:19:43'),
(2, '', 0, '', '', '', '', '', '2014-01-07 10:19:43'),
(3, 'Aries Dimas yudhistira', 1, 'jl. warakas 5', 'alhusna_99@yahoo.co.id', 'admin_avaya', '52c69e3a57331081823331c4e69d3f2e', 'male', '2014-01-07 10:28:11'),
(4, 'Fadil', 2, 'bekasi ', 'fadylnilon@gmail.com', 'fadil', '52c69e3a57331081823331c4e69d3f2e', '', '2014-01-08 09:15:49'),
(5, 'admin', 1, 'babastudio permata hijau', 'garudariderbaba@gmail.com', 'admin', 'd90dd48e646b973e67e7e69569b0d53f', 'male', '2014-03-03 12:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_user_group`
--

CREATE TABLE IF NOT EXISTS `ms_user_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ms_user_group`
--

INSERT INTO `ms_user_group` (`group_id`, `group_name`, `description`, `create_date`) VALUES
(1, 'Super Admin', 'super admin bertugas untuk mendaftarkan user_admin yang lain. tidak bisa dihapus ', '0000-00-00 00:00:00'),
(2, 'Admin', 'Hanya admin biasa, tanpa bisa melakukan pendaftaran admin baru', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tr_order`
--

CREATE TABLE IF NOT EXISTS `tr_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `total_price` int(10) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tr_order`
--

INSERT INTO `tr_order` (`order_id`, `customer_id`, `total_price`, `address`, `country`, `city`, `email`, `phone`, `order_date`) VALUES
(1, 10, 1069000, 'jl. warakas 4 Gg 17', '', 'Jakarta Utara', 'alhusna_99@yahoo.co.id', '021999631', '0000-00-00 00:00:00'),
(2, 10, 1069000, 'jl. warakas 4 Gg 17', '', 'Jakarta Utara', 'alhusna_99@yahoo.co.id', '021999631', '2013-12-24 00:00:26'),
(5, 10, 3410000, 'jl. warakas 4 Gg 17', 'Indonesia', 'Jakarta Utara', 'alhusna_99@yahoo.co.id', '021999631', '2013-12-24 00:16:47'),
(7, 10, 2514000, 'jl. warakas 4 Gg 17', 'Indonesia', 'Jakarta Utara', 'alhusna_99@yahoo.co.id', '021999631', '2014-01-06 18:51:36'),
(8, 10, 4765000, 'jl. warakas 4 Gg 17', 'Indonesia', 'Jakarta Utara', 'alhusna_99@yahoo.co.id', '021999631', '2014-01-16 11:33:03'),
(9, 10, 3690000, 'jl. warakas 4 Gg 17', 'Indonesia', 'Jakarta Utara', 'alhusna_99@yahoo.co.id', '021999631', '2014-02-07 22:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `tr_order_detail`
--

CREATE TABLE IF NOT EXISTS `tr_order_detail` (
  `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `shoes_id` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  PRIMARY KEY (`order_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tr_order_detail`
--

INSERT INTO `tr_order_detail` (`order_detail_id`, `order_id`, `shoes_id`, `jumlah_barang`, `harga`, `jumlah_harga`) VALUES
(5, 5, 5, 3, 650000, 1950000),
(6, 7, 11, 6, 419000, 2514000),
(7, 8, 11, 5, 419000, 2095000),
(8, 8, 7, 3, 890000, 2670000),
(9, 9, 3, 2, 870000, 1740000),
(10, 9, 5, 3, 650000, 1950000);

-- --------------------------------------------------------

--
-- Table structure for table `tr_payment`
--

CREATE TABLE IF NOT EXISTS `tr_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `account_no` int(17) NOT NULL,
  `total_payment` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tr_payment`
--


-- --------------------------------------------------------

--
-- Table structure for table `tr_testimonial`
--

CREATE TABLE IF NOT EXISTS `tr_testimonial` (
  `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
  `shoes_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `testimonial` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tr_testimonial`
--


-- --------------------------------------------------------

--
-- Table structure for table `tr_usr_grp_access`
--

CREATE TABLE IF NOT EXISTS `tr_usr_grp_access` (
  `app_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `add_access` varchar(255) NOT NULL,
  `edit_access` varchar(255) NOT NULL,
  `delete_access` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_usr_grp_access`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
