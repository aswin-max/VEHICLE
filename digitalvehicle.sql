-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2022 at 10:25 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalvehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dcmnt`
--

DROP TABLE IF EXISTS `dcmnt`;
CREATE TABLE IF NOT EXISTS `dcmnt` (
  `docid` int(11) NOT NULL AUTO_INCREMENT,
  `license` varchar(200) NOT NULL,
  `rc` varchar(200) NOT NULL,
  `insrns` varchar(200) NOT NULL,
  `polltn` varchar(200) NOT NULL,
  `fp` varchar(200) NOT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(30) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`did`, `dname`, `status`) VALUES
(1, 'Thiruvananthapuram', 1),
(2, 'Kollam', 1),
(3, 'Pathanamthitta', 1),
(4, 'Alappuzha', 1),
(5, 'Kottayam', 1),
(6, 'Idukki', 1),
(7, 'Ernakulam', 1),
(8, 'Thrissur', 1),
(9, 'Palakkad', 1),
(10, 'Malappuram', 1),
(11, 'Kozhikode', 1),
(12, 'Wayanad', 1),
(13, 'Kannur', 1),
(14, 'Kasaragod', 1),
(16, 'muyikw', 2),
(17, 'adfgh', 2),
(18, 'asdfghj', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

DROP TABLE IF EXISTS `fee`;
CREATE TABLE IF NOT EXISTS `fee` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(50) NOT NULL,
  `fee` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`fid`, `service`, `fee`, `charge`, `status`) VALUES
(1, 'Learners LicenseTest', 150, 60, 2),
(2, 'IssueofDrivingLicense', 200, 0, 1),
(3, 'Issue of Learners License for each class g', 155, 60, 2),
(4, 'sdfghj', 150, 60, 2),
(5, 'Issue of Driving Licensew', 150, 60, 2),
(6, 'Issue of Driving Licensesd', 150, 60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offence`
--

DROP TABLE IF EXISTS `offence`;
CREATE TABLE IF NOT EXISTS `offence` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `oname` varchar(200) NOT NULL,
  `oamount` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offence`
--

INSERT INTO `offence` (`oid`, `oname`, `oamount`, `status`) VALUES
(1, 'Allowing yours vehicle to be driven by another person who does not hold a valid driving license', 5000, 1),
(2, 'Driving without a valid driving license', 5000, 1),
(3, 'Driving without valid motor insurance', 2000, 1),
(4, 'Vehicle without registration certificate', 5000, 1),
(5, 'Driving without valid vehicle fitness certificate', 5000, 2),
(6, 'gdfhfjwa', 200, 2),
(7, 'ryfgheriojfopergkw', 2000, 2),
(8, 'ryfgheri ojfopergk', 2000, 2),
(9, 'ryfgheriojfopergk', 2000, 2),
(10, 'ryfgheriojfopergkwertg', 2000, 2),
(11, 'ryfgheriojfopergkrg', 2000, 2),
(12, 'ryfgheriojfopergkwwwqw', 2000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

DROP TABLE IF EXISTS `pic`;
CREATE TABLE IF NOT EXISTS `pic` (
  `picid` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(50) NOT NULL,
  PRIMARY KEY (`picid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `policelogin`
--

DROP TABLE IF EXISTS `policelogin`;
CREATE TABLE IF NOT EXISTS `policelogin` (
  `poid` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `punishment`
--

DROP TABLE IF EXISTS `punishment`;
CREATE TABLE IF NOT EXISTS `punishment` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `vehicleno` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `oid` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pdate` date DEFAULT NULL,
  `ldate` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `punishment`
--

INSERT INTO `punishment` (`pid`, `vehicleno`, `location`, `oid`, `amount`, `email`, `pdate`, `ldate`, `status`) VALUES
(1, 'KL10/12/123', 'MALA', '2', 2000, 'nithusafeetha@depaul.edu.in', '2022-06-07', '2022-06-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `regid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`regid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `fname`, `lname`, `phone`, `email`, `password`, `status`) VALUES
(1, 'Nithu', 'Safeetha', '9946788011', 'nithusafeetha@depaul.edu.in', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rto`
--

DROP TABLE IF EXISTS `rto`;
CREATE TABLE IF NOT EXISTS `rto` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(30) NOT NULL,
  `raddress` varchar(100) NOT NULL,
  `did` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rto`
--

INSERT INTO `rto` (`rid`, `rname`, `raddress`, `did`, `status`) VALUES
(1, 'Angamaly', 'dfbwui', 11, 2),
(2, 'Angamalyad', 'ewretyuiopo[', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `speed`
--

DROP TABLE IF EXISTS `speed`;
CREATE TABLE IF NOT EXISTS `speed` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle` varchar(20) NOT NULL,
  `school` int(11) NOT NULL,
  `ghat` int(11) NOT NULL,
  `corporation` int(11) NOT NULL,
  `national` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `fourline` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speed`
--

INSERT INTO `speed` (`sid`, `vehicle`, `school`, `ghat`, `corporation`, `national`, `state`, `fourline`, `other`, `status`) VALUES
(1, 'Motor Cycle', 30, 45, 50, 60, 50, 70, 50, 1),
(2, 'VESPA', 20, 30, 50, 20, 30, 71, 50, 1),
(3, 'VESPArty', 20, 30, 50, 20, 30, 71, 50, NULL),
(4, 'Motor Cyclee', 20, 30, 50, 20, 30, 71, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicledetails`
--

DROP TABLE IF EXISTS `vehicledetails`;
CREATE TABLE IF NOT EXISTS `vehicledetails` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `regvehicle` varchar(30) NOT NULL,
  `rid` int(11) NOT NULL,
  `regowner` varchar(30) NOT NULL,
  `owneraddress` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `vehicle` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `fuel` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `mdate` date DEFAULT NULL,
  `taxno` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `regdate` date DEFAULT NULL,
  `regvalidityfrom` date DEFAULT NULL,
  `regvalidityto` date DEFAULT NULL,
  `rc` varchar(100) DEFAULT NULL,
  `insrns` varchar(100) DEFAULT NULL,
  `poltn` varchar(100) DEFAULT NULL,
  `fp` varchar(100) DEFAULT NULL,
  `pan` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `addressproof` varchar(100) DEFAULT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `img` varchar(300) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicledetails`
--

INSERT INTO `vehicledetails` (`vid`, `regvehicle`, `rid`, `regowner`, `owneraddress`, `email`, `vehicle`, `type`, `fuel`, `color`, `mdate`, `taxno`, `amount`, `regdate`, `regvalidityfrom`, `regvalidityto`, `rc`, `insrns`, `poltn`, `fp`, `pan`, `dob`, `addressproof`, `tax`, `img`, `status`) VALUES
(2, 'KL10/12/123', 1, 'NITHU', 'MULLATH', 'nithusafeetha@depaul.edu.in', 'VESPA', 'SOLO', 'PETROL', 'YELLOW', '2022-06-06', 1234567890, 2000, '2022-06-06', '2022-06-06', '2037-06-06', 'a175d138337be09454231dd81e50e1bd_653674dd7b1b8f9d5af.pdf', '623c6e218958b189a5554a613aef09e6_2790bbd229865030c8.pdf', '43d679b058627c83d66078ec8bb537a4_d178d8e080e4537.docx', 'd5dd838934d98f0872b54bcc32251d18_e63776ae96be49c9b7e.pdf', 'cbaf48688acc73a87e98a317172dc7f4_f13a7a21c058e08.pdf', '9dd956ef8944c574ff8e6f65aec66217_1d336f48906.docx', '6e04b26c71b2df61066fc6aca50eafa5_60474f357070bca67.docx', '73dd0d287bb10ce16a4f6bc63dd26985_d33ed8a730277a3065fb.docx', '6855e241577d0d73924cf930e5aa4564_7b938f91fb38c51.jpg', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
