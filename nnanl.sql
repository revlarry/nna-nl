-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2018 at 02:02 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nna`
--

-- --------------------------------------------------------

--
-- Table structure for table `exco_schedule`
--

DROP TABLE IF EXISTS `exco_schedule`;
CREATE TABLE IF NOT EXISTS `exco_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `incumbent` tinyint(1) DEFAULT NULL,
  `col1_pix` varchar(100) NOT NULL DEFAULT 'http://placehold.it/200x263',
  `col1_name` varchar(30) NOT NULL DEFAULT 'Name of officer',
  `col1_post` varchar(30) NOT NULL DEFAULT 'Function',
  `col2_pix` varchar(100) NOT NULL DEFAULT 'http://placehold.it/200x263',
  `col2_name` varchar(30) NOT NULL DEFAULT 'Name of officer',
  `col2_post` varchar(30) NOT NULL DEFAULT 'Function',
  `col3_pix` varchar(100) NOT NULL DEFAULT 'http://placehold.it/200x263',
  `col3_name` varchar(30) NOT NULL DEFAULT 'Name of officer ',
  `col3_post` varchar(30) NOT NULL DEFAULT 'Function',
  `start_tenure` int(4) DEFAULT '9999',
  `end_tenure` int(4) NOT NULL DEFAULT '9999',
  `iorder` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exco_schedule`
--

INSERT INTO `exco_schedule` (`id`, `incumbent`, `col1_pix`, `col1_name`, `col1_post`, `col2_pix`, `col2_name`, `col2_post`, `col3_pix`, `col3_name`, `col3_post`, `start_tenure`, `end_tenure`, `iorder`) VALUES
(31, NULL, 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer ', 'Function', 9999, 9999, NULL),
(32, NULL, 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer', 'Function', 'http://placehold.it/200x263', 'Name of officer ', 'Function', 9999, 9999, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `executives`
--

DROP TABLE IF EXISTS `executives`;
CREATE TABLE IF NOT EXISTS `executives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exconame` varchar(30) DEFAULT NULL,
  `post` varchar(30) DEFAULT NULL,
  `start_tenure` int(4) DEFAULT NULL,
  `photourl` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `executives`
--

INSERT INTO `executives` (`id`, `exconame`, `post`, `start_tenure`, `photourl`) VALUES
(6, 'Ayodeji Okele', 'Chairman ', 2014, 'images/exco/ayodeji-okele.JPG'),
(7, 'Okey Ihedigbo', 'Vice Chairman ', 2014, 'images/exco/okey-ihedigbo.jpg'),
(8, 'Evelyn Azih', 'Secretary-General ', 2014, 'images/exco/evelyn-azih.jpg'),
(9, 'Apostle Helen Ruth Dorkenoo', 'Director, Media & Publicty ', 2014, 'images/exco/apostle_helen.jpg'),
(14, 'Anita Hogan', 'Vice Chair, Working C\'ttee', 2014, 'images/exco/anita-hogan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `orgid` int(11) NOT NULL AUTO_INCREMENT,
  `orgname` varchar(200) NOT NULL DEFAULT 'organisation name',
  `contact` varchar(100) NOT NULL DEFAULT 'Mr. XY Z',
  `addressline1` varchar(150) NOT NULL DEFAULT 'xyz straat 2',
  `adressline2` varchar(150) NOT NULL,
  `postalcode` varchar(10) NOT NULL DEFAULT '1111 AX ',
  `city` varchar(150) NOT NULL DEFAULT 'Roermond',
  `country` varchar(100) NOT NULL DEFAULT 'Netherlands',
  `mobile` varchar(20) NOT NULL DEFAULT '06-123456789',
  `phone` varchar(20) DEFAULT '000-123-4567',
  `website` varchar(100) NOT NULL DEFAULT 'www.xyz.com',
  `email` varchar(100) NOT NULL DEFAULT 'john@example.com',
  `remarks` varchar(200) NOT NULL DEFAULT 'Notes ,,,,',
  PRIMARY KEY (`orgid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`orgid`, `orgname`, `contact`, `addressline1`, `adressline2`, `postalcode`, `city`, `country`, `mobile`, `phone`, `website`, `email`, `remarks`) VALUES
(1, 'Abiriba Communal Improvement Union The Netherlands', 'Ishawa', '', '', '', '', '', '', '', '', '', ''),
(2, 'Abia Union The Netherlands', 'Michael Ogidi Nwankwor', '', '', '', '', 'Netherlands', '', '', 'Www.voice.com', '', 'Notes ,,,,'),
(3, 'Accord Club of Holland', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(4, 'Afemai Care Foundation', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(5, 'Afemai Forum Netherlands', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(6, 'Akwa-Cross Association', 'Anita Hogan Mak ', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(7, 'ANION', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.theanion.org', 'john@example.com', 'Notes ,,,,'),
(8, 'Edo International Association', 'Helen Osaro Ekhator', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(9, 'Esan Community in The Netherlands', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(10, 'Idemili Progressive Union', 'Basil Okwudilichukwu Ike', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', ''),
(11, 'Igbo Cultural Association of Nigeria', ' Okey Ihedigbo and Evelyn Azih', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(12, 'Igbo Union The Netherlands', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(13, 'Nadwat-UL-Ahil Society of Nigeria', 'Wahab Ishola and Isiaka Sammy', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(14, 'Nigeria Union Breda', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(15, 'Nigerian Women Association', 'Joyce Ovunda and Victoria Wobo', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(16, 'Nigerian Women of Integrity', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(17, 'Oduduwa Descendants Association of Netherlands', 'Joseph Ola', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(18, 'Ohaneze Ndi Igbo', 'Pastor Dominic Emeh and A. Ezebuife', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(19, 'Oodua Progressive Union', 'Ayodeji Okele and Otumbabo, T.O. Larry', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(20, 'Otu-Iviedo in The Netherlands', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(21, 'Owerri People Association', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(22, 'PDP Holland Chapter', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(23, 'Stichting Orange Men\'s Club', 'Mr. XY Z', 'xyz straat 2', '', '1111 AX ', 'Roermond', 'Netherlands', '06-123456789', '000-123-4567', 'www.xyz.com', 'john@example.com', 'Notes ,,,,'),
(24, 'Pan-African Media & Development Agency', 'Apostles Helen Ruth & Larry Dorkenoo', 'Paasheuvelweg 17', '', '1105 BE', 'Amsterdam', 'Netherlands', '06-84606550', '020 3374160', 'www.radiovoiceofnaija.org', 'voiceofnaija@live.com', ''),
(25, 'Old Orlu Progressive Association ', 'Pastor Emmanuel Emeh', '', '', '', '', '', '', '', '', '', ''),
(26, 'Imo Citizens The Netherlands ', 'Ginikanwa Emeka.J.', '', '', '', '', '', '', '', '', '', ''),
(27, 'Nigerian Cultural dance Group', 'Kenneth Okorie', '', '', '', '', '', '', '', '', '', ''),
(29, 'Stichting Nigerian Women', 'Ruth Ugiagbe and A. OBANOR', '', '', '', '', '', '', '', '', '', ''),
(32, 'test', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'test', '', '', '', '', '', '', '', '', '', '', ''),
(34, 'test', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventdescrip` varchar(200) NOT NULL,
  `eventdate` date NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Events table';

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `eventdescrip`, `eventdate`, `url`) VALUES
(1, 'Business seminar', '2015-07-10', 'http://http://http://www.nnanl.org'),
(2, 'Annual Family Picnic', '2015-07-31', 'http://'),
(3, 'Retreat', '2015-08-31', 'http://'),
(4, 'Houston Convention', '2015-09-27', 'http://'),
(5, 'End-of-year Party', '2015-12-22', 'http://');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

DROP TABLE IF EXISTS `offices`;
CREATE TABLE IF NOT EXISTS `offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_desc` varchar(30) NOT NULL,
  `tenure_in` date NOT NULL,
  `tenure_out` date NOT NULL,
  `officerId` int(11) NOT NULL,
  `Incumbent` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `office_desc`, `tenure_in`, `tenure_out`, `officerId`, `Incumbent`) VALUES
(1, 'Chairperson', '2016-07-01', '2018-07-01', 1, 0),
(2, 'Treasurer', '2016-07-01', '2016-07-01', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `offices_bak`
--

DROP TABLE IF EXISTS `offices_bak`;
CREATE TABLE IF NOT EXISTS `offices_bak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ChairId` int(11) NOT NULL,
  `Vice_ChairmanId` int(11) NOT NULL,
  `Secretary_GeneralId` int(11) NOT NULL,
  `Dir_Media_PublictyId` int(11) NOT NULL,
  `Asst_Sec_GeneralId` int(11) NOT NULL,
  `TreasurerId` int(11) NOT NULL,
  `Chair_Working_CtteeId` int(11) NOT NULL,
  `Vice_Chair_Working_CtteeId` int(11) NOT NULL,
  `Financial_SecId` int(11) NOT NULL,
  `Coord_TilburgId` int(11) NOT NULL,
  `Coord_RotterdamId` int(11) NOT NULL,
  `Coord_AmsterdamId` int(11) NOT NULL,
  `Chief_ProvostId` int(11) NOT NULL,
  `Coord_Den_HaagId` int(11) NOT NULL,
  `Provost_Wkg_CtteeId` int(11) NOT NULL,
  `Sec_Wkg_CtteeId` int(11) NOT NULL,
  `Asst_Sec_Wkg_CtteeId` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Incumbent` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
