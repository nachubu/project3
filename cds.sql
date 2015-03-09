-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 14, 2014 at 07:33 PM
-- Server version: 5.5.35
-- PHP Version: 5.4.31-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cds`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `postalcode` varchar(45) DEFAULT NULL,
  `district` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `houseno` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `emailaddress` varchar(45) DEFAULT NULL,
  `region_id` int(10) unsigned DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_address_region1_idx` (`region_id`),
  KEY `fk_address_company1_idx` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `postalcode`, `district`, `telephone`, `mobile`, `houseno`, `street`, `emailaddress`, `region_id`, `latitude`, `longitude`, `name`, `company_id`) VALUES
(1, '12334', 'Kinondoni', '25572718282', '232423', 'KN/1223', 'Kindoroko', 'freddy@gmail.com', 11, NULL, NULL, 'Fatma Kamali', 1),
(2, '234344', 'Ilala', '2342322', '437684874', 'MW/MSS/132', 'MSISIRI B', 'fredy@gmail.com', 16, NULL, NULL, 'Mwajuma Ali', 2),
(3, '12334', 'Kinondoni', '255755383', 'tr3yttdf7', 'KN/1223', 'Kindoroko', 'fatma@gmail.com', 1, NULL, NULL, 'Fatma Kamali', 1),
(4, '234344', 'Ilala', '2342322', '255446373889', 'MW/MSS/132', 'MSISIRI B', 'fredy@gmail.com', 7, NULL, NULL, '', 2),
(5, '', '', '', '', '', '', '', 0, NULL, NULL, '', 0),
(6, '', '', '', '', '', '', '', 0, NULL, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE IF NOT EXISTS `checklist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `shipment_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_checklist_shipment1_idx` (`shipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'Vodacom'),
(2, 'Boa'),
(3, 'Airtel'),
(4, 'CRDB Bank');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE IF NOT EXISTS `courier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transport_plate_no` varchar(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`id`, `transport_plate_no`, `name`, `mobile`) VALUES
(1, 'T 234 BXT', 'cds ', '23356'),
(2, 'T 102 BXT', 'Godi Kajunju', '2555748457');

-- --------------------------------------------------------

--
-- Table structure for table `courier_has_waybill`
--

CREATE TABLE IF NOT EXISTS `courier_has_waybill` (
  `courier_id` int(10) unsigned NOT NULL,
  `waybill_id` int(10) unsigned NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `reasons` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`courier_id`,`waybill_id`),
  KEY `fk_courier_has_waybill_waybill1_idx` (`waybill_id`),
  KEY `fk_courier_has_waybill_courier1_idx` (`courier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courier_has_waybill`
--

INSERT INTO `courier_has_waybill` (`courier_id`, `waybill_id`, `date`, `type`, `reasons`, `quantity`) VALUES
(1, 3, NULL, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `packing` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `dimension_height` varchar(45) DEFAULT NULL,
  `dimension_width` varchar(45) DEFAULT NULL,
  `dimension_length` varchar(45) DEFAULT NULL,
  `pieces` varchar(45) DEFAULT NULL,
  `waybill_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_package_waybill1_idx` (`waybill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `description`, `quantity`, `packing`, `weight`, `dimension_height`, `dimension_width`, `dimension_length`, `pieces`, `waybill_id`) VALUES
(1, 'Box', '3', 'not', '12', '', '', '', '', 1),
(2, 'box\r\npacej', '3\r\n4', 'in one box', '45', '8', '2', '4', '3', 2),
(3, '', '', '', '100', '', '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_07_23_195430_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'Dar'),
(2, 'Arusha'),
(3, 'Mwanza'),
(4, 'Kigoma'),
(5, 'Kilimanjaro'),
(6, 'Tanga'),
(7, 'Dodoma'),
(8, 'Morogoro'),
(9, 'Singida'),
(10, 'Tabora'),
(11, 'Iringa'),
(12, 'Mbeya'),
(13, 'Shinyanga'),
(14, 'Ruvuma'),
(15, 'Rukwa'),
(16, 'Mara'),
(17, 'Bukoba'),
(18, 'Manyara'),
(19, 'Pwani');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `type`) VALUES
(1, 'Standard'),
(2, 'Very Agent'),
(3, 'Special'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transporter` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `courier_delivery` int(10) unsigned NOT NULL,
  `courier_pickup` int(10) unsigned NOT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `box` varchar(45) DEFAULT NULL,
  `parcel` varchar(45) DEFAULT NULL,
  `region_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shipment_courier1_idx` (`courier_delivery`),
  KEY `fk_shipment_courier2_idx` (`courier_pickup`),
  KEY `fk_shipment_region1_idx` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tarrif`
--

CREATE TABLE IF NOT EXISTS `tarrif` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `origin` varchar(45) NOT NULL,
  `destination` varchar(45) NOT NULL,
  `cost` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tarrif`
--

INSERT INTO `tarrif` (`id`, `origin`, `destination`, `cost`) VALUES
(1, '1', '7', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(120) NOT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `remember_token`, `role`) VALUES
(8, 'user1@cds.com', '$2y$10$.A7of4AmkhO.0.Y.PfbHcuZIoydTy32qgQ6p0wY56Fk04xSvPG5yu', '', 'receiver'),
(9, 'user2@cds.com', '$2y$10$Jt3PVZBgdJsIxalx1Llc1.baIiBxQrmrQ9i8X5yOLd64MKYY9TkYa', 'pMxAxTCcKO7lNj18u3Hi9ynuMLygM13wyMb1uNR2FwubUrU33aJ8WZjeHPel', 'approver'),
(10, 'admin@cds.com', '$2y$10$ZdSVlpDjUBJF/V34IHc6neZSh1AmWk4Q1iLj1c0CCdA6vmqAZ4/.u', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `waybilCode`
--

CREATE TABLE IF NOT EXISTS `waybilCode` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `code` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `waybill`
--

CREATE TABLE IF NOT EXISTS `waybill` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(45) DEFAULT NULL,
  `date_pickup` varchar(45) DEFAULT NULL,
  `date_delivery` varchar(45) DEFAULT NULL,
  `is_verified` bit(1) NOT NULL,
  `service_id` int(11) NOT NULL,
  `charge_cost` varchar(45) DEFAULT NULL,
  `charge_insurance` varchar(45) DEFAULT NULL,
  `charge_other` varchar(45) DEFAULT NULL,
  `charge_vat` varchar(45) DEFAULT NULL,
  `is_paid` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `address_sender` int(10) unsigned NOT NULL,
  `address_receiver` int(10) unsigned NOT NULL,
  `receiver_name` varchar(45) DEFAULT NULL,
  `receiver_contact` varchar(45) DEFAULT NULL,
  `checklist_id` int(10) unsigned DEFAULT NULL,
  `origin` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_waybill_service1_idx` (`service_id`),
  KEY `fk_waybill_address1_idx` (`address_sender`),
  KEY `fk_waybill_address2_idx` (`address_receiver`),
  KEY `fk_waybill_checklist1_idx` (`checklist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `waybill`
--

INSERT INTO `waybill` (`id`, `payment_type`, `date_pickup`, `date_delivery`, `is_verified`, `service_id`, `charge_cost`, `charge_insurance`, `charge_other`, `charge_vat`, `is_paid`, `code`, `address_sender`, `address_receiver`, `receiver_name`, `receiver_contact`, `checklist_id`, `origin`, `destination`) VALUES
(1, 'Cash', '08/14/2014', '23/3/2002', b'0', 1, '12000', '', '', NULL, NULL, '11111', 1, 2, 'Mwajuma Ali', '255255255', NULL, 1, 7),
(2, 'Cash', '08/06/2014', '', b'0', 1, '45000', '', '', NULL, NULL, '45453', 3, 4, '', '', NULL, 1, 7),
(3, 'Cash', '', '', b'0', 1, '100000', '', '', NULL, NULL, '67676', 5, 6, '', '', NULL, 1, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
