-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2023 at 08:32 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

DROP TABLE IF EXISTS `fine`;
CREATE TABLE IF NOT EXISTS `fine` (
  `tid` int NOT NULL,
  `fine_id` int NOT NULL AUTO_INCREMENT,
  `offence` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `amount` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`fine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`tid`, `fine_id`, `offence`, `amount`, `status`) VALUES
(1, 1, 'NO HELMET', '500', 1),
(1, 2, 'NO DL', '5000', 1),
(2, 3, 'NO SEATBELT', '1000', 1),
(2, 4, 'OVERSPEEDING', '2000', 1),
(3, 5, 'WITHOUT NUMBER PLATE', '1500', 1),
(3, 6, 'USING MOBILE WHILE DRIVING', '3000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

DROP TABLE IF EXISTS `fuel`;
CREATE TABLE IF NOT EXISTS `fuel` (
  `fid` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`fid`, `fname`) VALUES
(1, 'PETROL'),
(2, 'DIESEL'),
(3, 'ELECTRIC');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

DROP TABLE IF EXISTS `officer`;
CREATE TABLE IF NOT EXISTS `officer` (
  `rid` int NOT NULL,
  `offid` int NOT NULL AUTO_INCREMENT,
  `offuser` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `offpass` varchar(14) NOT NULL,
  `offimg` varchar(1000) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`offid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`rid`, `offid`, `offuser`, `offpass`, `offimg`, `status`) VALUES
(1, 1, 'Paisley Richards', 'Paisley467', '67c00387f075112ff81b8ed9b4783bf5_64fd687d73b.jpg', 1),
(2, 2, 'Cataleya Hinton', 'Cataleya584', 'f5bfb98d0760a329d56b44db26fda877_d843be032983f976.jpg', 1),
(3, 3, 'Athena Cain', 'Athena854', '2460775dc303511daafbf7930a1ff645_311df6cb14c.jpg', 1),
(4, 4, 'Siena Rivers', 'Siena781', '4efd1f3f08fcc7f2713485d73f767233_86b5eb8ebeb1.jpg', 1),
(5, 5, 'Frankie Berry', 'Frankie598', 'e7448318e74288526281b585a4df6bb1_09ec60d0dbac7bf6.jpg', 1),
(6, 6, 'Devon Harris', 'Devon968', 'cd7722a4a0be7a6dc3f7a66c11d91465_96eeaf97e45bcdcafd.jpg', 1),
(7, 7, 'Julien Roth', 'Julien654', '56fcbeda1aa14d36dfb04915cb14a0a5_f89e74647d.jpg', 1),
(8, 8, 'Allen Butler', 'Allen287', '1c1ebd688ca3816bcf95ba37f4b31331_d0f06a58f33b26b35.jpg', 1),
(9, 9, 'Jon Buchanan', 'Jon384', 'f6fc0fb59319086c9e9be2b7e778d8fd_7ddfe82976ed6587.jpg', 1),
(10, 10, 'Maryam Flowers', 'Maryam902', 'f8bad5e75a7ba018e5e9fa0bfb87cf45_f79f9ee28d825f4.jpg', 1),
(11, 11, 'Andres Scott', 'Andres271', 'aa3ea1759a2befc981f513c6cae72c33_728bd87c6851ff1aef50.jpg', 1),
(12, 12, 'Angelina Walter', 'Angelina234', 'a6ade0464cce2f0a6f2e36d3ce628eeb_b5acf49faf932fede.jpg', 1),
(13, 13, 'Raina Blair', 'Raina672', 'ada1c0d7767c921e7e0bdb82fb5ea17b_7841672b8e0f1ca3e55.jpg', 1),
(14, 14, 'Cory Sierra', 'Cory321', '1b35428117c753d5c1b385c149bb2189_329c61ff1af30a3ef74.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `owname` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `owno` int NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `phone` char(10) NOT NULL,
  `vid` int NOT NULL,
  PRIMARY KEY (`owno`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owname`, `password`, `owno`, `email`, `phone`, `vid`) VALUES
('Mara Dunn', 'Mara758', 1, 'MaraDunn@gmail.com', '6719540250', 2),
('Dawson Medrano', 'Dawson116', 2, 'DawsonMedrano@gmail.com', '8912904168', 1),
('Van Rhodes', 'Van076', 3, 'VanRhodes@gmail.com', '6719462365', 8),
('Will Cortes', 'Will085', 4, 'WillCortes@gmail.com', '6127930838', 7),
('Halo Kim', 'Halo009', 5, 'HaloKim@gmail.com', '9853647125', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payid` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `amount` int NOT NULL,
  `pdate` date NOT NULL,
  PRIMARY KEY (`payid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `punish`
--

DROP TABLE IF EXISTS `punish`;
CREATE TABLE IF NOT EXISTS `punish` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `vid` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fine_id` int NOT NULL,
  `offid` int NOT NULL,
  `loc` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `pic` varchar(1000) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `punish`
--

INSERT INTO `punish` (`pid`, `vid`, `fine_id`, `offid`, `loc`, `date`, `pic`, `status`) VALUES
(1, '1', 1, 1, 'Kovalam', '2023-10-02', 'a9e1ad01132cf8836776f4b14894bfe2_26d96f039209c5160c5.jpg', 1),
(2, '2', 2, 2, 'Varkala', '2023-10-07', '16134812d26a08f87a5479120831fda5_dbece8a2c0b.jpg', 1),
(3, '3', 3, 3, 'Kumarakom', '2023-10-10', 'dea968ac57e1878273585e48194b437f_231bc94bb6c376820732.jpg', 1),
(4, '4', 4, 4, 'Fort Kochi', '2023-10-11', '21f3d7478ef6ef8f7d4b00d041898453_54577abcc54ba.jpg', 1),
(5, '5', 5, 5, 'Poovar', '2023-10-27', '3995f3aa26ede5f0619456b66e718671_38e16ba1e3d.jpg', 1),
(6, '6', 6, 6, 'Munnar', '2023-10-23', '211af886a01b563e910c465596ccab18_41e457714ae811bb2db.jpg', 1),
(7, '7', 1, 7, 'Kochi', '2023-10-25', '94fe2df44985cafdeea750182d9ab7fd_7f602d3b9486e7464f.jpg', 1),
(8, '8', 2, 8, 'Guruvayur', '2023-10-12', 'f65abcbe72e856ce578763d58b0206a3_7ee890c768fd219b84b.jpg', 1),
(9, '2', 4, 9, 'Palakkad', '2023-10-03', '3ad75482d7f4965a94dae8e4eb6295e1_328d41408a6.jpg', 1),
(10, '3', 3, 10, 'Kozhikode', '2023-10-05', '9a14ed0e8e14fb6b87115d768fea0df8_419bee8c9dcd5191ab.jpg', 1),
(11, '6', 5, 11, 'Vythiri', '2023-10-17', 'ee6a81fcac9f9fe44d257dfac05228e8_7e5fcc4ec71d.jpg', 1),
(12, '4', 6, 12, 'Wayanad', '2023-10-13', '69122e5f31f1feb08da734f63bb756d6_a909ddd3e9d3d0.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rto`
--

DROP TABLE IF EXISTS `rto`;
CREATE TABLE IF NOT EXISTS `rto` (
  `rid` int NOT NULL AUTO_INCREMENT,
  `regid` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rname` varchar(30) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rto`
--

INSERT INTO `rto` (`rid`, `regid`, `rname`, `status`) VALUES
(1, 'KL 01', 'THIRUVANANTHAPURAM', 1),
(2, 'KL 02', 'KOLLAM', 1),
(3, 'KL 03', 'PATHANAMTHITTA', 1),
(4, 'KL 04', 'ALAPPUZHA', 1),
(5, 'KL 05', 'KOTTAYAM', 1),
(6, 'KL 06', 'IDUKKI', 1),
(7, 'KL 07', 'ERNAKULAM', 1),
(8, 'KL 08', 'THRISSUR', 1),
(9, 'KL 09', 'PALAKKAD', 1),
(10, 'KL 10', 'MALAPPURAM', 1),
(11, 'KL 11', 'KOZHIKODE', 1),
(12, 'KL 12', 'WAYANAD', 1),
(13, 'KL 13', 'KANNUR', 1),
(14, 'KL 14', 'KASARAGOD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `tname` varchar(30) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`tid`, `tname`) VALUES
(1, 'LMV'),
(2, 'MCWG'),
(3, 'HMV');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `tid` int NOT NULL,
  `rid` int NOT NULL,
  `vid` int NOT NULL AUTO_INCREMENT,
  `vrno` varchar(15) NOT NULL,
  `vname` varchar(30) NOT NULL,
  `vehiclename` varchar(25) NOT NULL,
  `fid` int NOT NULL,
  `color` varchar(30) NOT NULL,
  `dor` date NOT NULL,
  `rc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`tid`, `rid`, `vid`, `vrno`, `vname`, `vehiclename`, `fid`, `color`, `dor`, `rc`, `status`) VALUES
(1, 12, 1, 'KL 12 A 4567', '', 'Thunderbolt', 1, 'Silver', '2003-11-08', '16da9ade1dd4b4759a3ba2277b1303ec_18140a73daa6aa.jpg', 1),
(2, 5, 2, 'KL 5 B 7890', '', 'Explorer', 2, 'Blue', '2007-06-27', 'e2182365f4ba333852458fad479cf843_3a267648fd.jpg', 1),
(3, 9, 3, 'KL 9 C 2345', '', 'Firestorm', 3, 'Red', '2011-04-15', 'f8543aca7a319055cbd3044ceff20db9_e7e7938374.jpg', 1),
(1, 14, 4, 'KL 14 D 6789', '', 'Phantom', 3, 'Black', '2005-09-30', '605c503f6a37a104159aa6e1465b47d2_6d0a399ad59f8b.jpg', 1),
(2, 8, 5, 'KL 8 E 1234', '', 'Voyager', 2, 'White', '2018-12-07', 'e7f69dbe053b61c542aa571471f35b87_082e353d96.jpg', 1),
(3, 2, 6, 'KL 2 F 5678', '', 'Avalanche', 1, 'Green', '2015-07-22', '971c5644261963110a575f6e7499b07f_8a8dd0b7f5bc53.jpg', 1),
(1, 3, 7, 'KL 3 G 9012', '', 'Cyclone', 2, 'Gray', '2009-03-18', '74546ad0e9752ea51d3a3e13a50cb0ab_b96485641e3fc391f1e0.jpg', 1),
(2, 7, 8, 'KL 7 H 3456', '', 'Mirage', 1, 'Yellow', '2014-11-14', '3a8a2cd8cf62b98dac90d747415d1ff0_d4fe02c282af8.jpg', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
