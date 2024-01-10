-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2024 at 09:55 PM
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
-- Table structure for table `epayment`
--

DROP TABLE IF EXISTS `epayment`;
CREATE TABLE IF NOT EXISTS `epayment` (
  `payid` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `amount` int NOT NULL,
  `pdate` date NOT NULL,
  `invid` varchar(25) NOT NULL,
  PRIMARY KEY (`payid`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `epayment`
--

INSERT INTO `epayment` (`payid`, `pid`, `amount`, `pdate`, `invid`) VALUES
(31, 2, 10000, '2024-01-10', 'EOJDKTSSO2XZ'),
(32, 2, 10000, '2024-01-10', '68QWESO2OIXO'),
(33, 2, 10000, '2024-01-10', '3SL51FF34Z7L'),
(34, 2, 10000, '2024-01-10', 'QH2HLD7YHQOA'),
(35, 2, 10000, '2024-01-11', 'ER8KUH6BP4SZ');

-- --------------------------------------------------------

--
-- Table structure for table `epunish`
--

DROP TABLE IF EXISTS `epunish`;
CREATE TABLE IF NOT EXISTS `epunish` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `vid` int NOT NULL,
  `fine_id` int NOT NULL,
  `offid` int NOT NULL,
  `loc` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `pic` varchar(1000) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `epunish`
--

INSERT INTO `epunish` (`pid`, `vid`, `fine_id`, `offid`, `loc`, `date`, `pic`, `status`) VALUES
(1, 1, 4, 9, 'angamaly', '2024-01-01', 'd70010241719487faeb15145da32c2e7_82de32a31ebc.jpg', 1),
(2, 2, 3, 9, 'Wayanad', '2024-01-02', 'ef19cbcbb18d4749b73b16a5ae4d7fdf_beaf25e389e22b402.jpg', 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`tid`, `fine_id`, `offence`, `amount`, `status`) VALUES
(1, 1, 'Overspeeding', '10000', 1),
(1, 2, 'Overspeeding', '10000', 1),
(1, 3, 'Disregarding the Traffic Signals', '10000', 1),
(1, 4, 'Overspeeding', '10000', 1),
(1, 5, 'Overspeeding', '10000', 1),
(2, 6, 'Overspeeding', '10000', 1),
(2, 7, 'Disregarding the Traffic Signals', '1000011', 1),
(2, 8, 'Disregarding the Traffic Signals', '10000', 2),
(1, 9, 'FDG', '2312', 2),
(1, 10, 'cfvhg', '4846', 2),
(1, 11, 'sdfwwe', '86', 2),
(2, 12, 'sdfdsd', '32434', 2),
(2, 13, 'sdfg', '213', 2),
(1, 14, 'as', '324', 2);

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
(1, 'Aswin'),
(2, 'a'),
(3, 'petrol');

-- --------------------------------------------------------

--
-- Table structure for table `missing`
--

DROP TABLE IF EXISTS `missing`;
CREATE TABLE IF NOT EXISTS `missing` (
  `mid` int NOT NULL AUTO_INCREMENT,
  `owno` int NOT NULL,
  `vid` int NOT NULL,
  `loc` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `pic` varchar(1000) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `missing`
--

INSERT INTO `missing` (`mid`, `owno`, `vid`, `loc`, `date`, `pic`, `status`) VALUES
(1, 1, 2, 'angamaly', '2024-01-04', 'ed639c5e0d81ec251b5b13ef82412f03_76eaba7125ac273fdbf1.png', 3);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`rid`, `offid`, `offuser`, `offpass`, `offimg`, `status`) VALUES
(28, 11, 'ar', 'ar123456', '032bf3174788e8c50cf6e36390530090_10f7797bb86635c8.jpg', 1),
(28, 10, 'ar', 'ar12345', '335b497eb515d49e7faf8d1f0c9d1c1f_3a647d799879.jpg', 2),
(26, 9, 'aswin', 'aswin123', '3d69e447c9a48dfbb1e4cbb53da2fb7a_2d2cead04347d.jpg', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owname`, `password`, `owno`, `email`, `phone`, `vid`) VALUES
('aswin', '1234', 1, 'aswinrajeevachu003@gmail.com', '9188320201', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payid` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `invid` varchar(25) NOT NULL,
  `amount` int NOT NULL,
  `pdate` date NOT NULL,
  PRIMARY KEY (`payid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `pid`, `invid`, `amount`, `pdate`) VALUES
(1, 1, '0JAWR6CFAIAJ', 2312, '2024-01-11'),
(2, 2, '0JAWR6CFAIAJ', 86, '2024-01-11'),
(3, 1, '1RYYHJBZE70X', 2312, '2024-01-11'),
(4, 2, '4KR1Z5FIRCDD', 86, '2024-01-11'),
(5, 2, 'WN81UFXBZHV2', 86, '2024-01-11'),
(6, 2, 'RIOZKW0RLOH0', 86, '2024-01-11'),
(7, 2, 'AL71ORYTHSDJ', 86, '2024-01-11'),
(8, 2, 'XSGP4ENSKQ8L', 86, '2024-01-11'),
(9, 2, '15KVORFS1UM4', 86, '2024-01-11'),
(10, 2, '4U37K4JXT1LT', 86, '2024-01-11'),
(11, 2, '31NUD092DDBN', 86, '2024-01-11'),
(12, 2, '0DFWU5TYNQA7', 86, '2024-01-11'),
(13, 2, 'IZZKSG7FIML5', 86, '2024-01-11'),
(14, 2, 'N0MPKV3RJCMQ', 86, '2024-01-11'),
(15, 2, 'IMW9A5SLSNPK', 86, '2024-01-11'),
(16, 2, 'IIPEPFE3BCRP', 86, '2024-01-11'),
(17, 1, 'I917X7R6TR4S', 2312, '2024-01-11'),
(18, 1, 'B57ALWK7AZ53', 2312, '2024-01-11'),
(19, 1, '1ZZ81V89UY1M', 2312, '2024-01-11'),
(20, 1, '2XO3IRH28QH0', 2312, '2024-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `punish`
--

DROP TABLE IF EXISTS `punish`;
CREATE TABLE IF NOT EXISTS `punish` (
  `date` date NOT NULL,
  `fine_id` int NOT NULL,
  `loc` varchar(30) NOT NULL,
  `offname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pid` int NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL,
  `vid` int NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `punish`
--

INSERT INTO `punish` (`date`, `fine_id`, `loc`, `offname`, `pid`, `status`, `vid`) VALUES
('2024-01-03', 9, 'aedt', 'Paisley Richards', 1, 1, 2),
('2024-01-03', 11, 'ang', 'asd', 2, 2, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rto`
--

INSERT INTO `rto` (`rid`, `regid`, `rname`, `status`) VALUES
(26, 'sdf', 'sdfg', 1),
(27, 'fds1', 'sddwwwwa', 2),
(28, 'sdf', 'sda', 1),
(29, 'fdg', 'sdf', 2),
(30, 'fdg', 'sdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `tname` varchar(30) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`tid`, `tname`) VALUES
(1, 'asd'),
(2, 'tfhgfdhgf');

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
  `vehiclename` varchar(25) NOT NULL,
  `fid` int NOT NULL,
  `color` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `rc` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`tid`, `rid`, `vid`, `vrno`, `vehiclename`, `fid`, `color`, `date`, `rc`, `status`) VALUES
(2, 27, 1, 'kl 25 d 4523', 'asad', 1, 'black', '2024-01-09', 'bee6a0061f9a10cff0df0bd66f5e9f35_cea17491edb5b2d4.jpg', 1),
(1, 27, 2, 'kl 63 d 171', 'sased', 1, 'black', '2024-01-02', '3ff6e2fc84b6d19117589c368bef2286_02569b82c6277cbe.jpeg', 1),
(1, 28, 3, 'kl 63 d 171', 'sased', 1, 'black', '2024-01-07', '9fe58350b0719527869264f55a5f4928_0ba306a2d812c618.png', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
