-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2020 at 07:05 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `airplane`
--

CREATE TABLE IF NOT EXISTS `airplane` (
  `aid` int(11) NOT NULL,
  `pname` varchar(40) NOT NULL,
  `pnumber` int(11) NOT NULL,
  `eseats` int(11) NOT NULL,
  `bseats` int(11) NOT NULL,
  `tdate` date NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airplane`
--

INSERT INTO `airplane` (`aid`, `pname`, `pnumber`, `eseats`, `bseats`, `tdate`, `rdate`) VALUES
(1, 'Boeing', 1, 100, 10, '2020-08-21', '0000-00-00'),
(2, 'De Havilland Dash', 2, 100, 10, '2020-08-21', '0000-00-00'),
(3, 'Boeing', 3, 200, 400, '2020-08-21', '2020-08-22'),
(4, 'Airbus', 4, 300, 20, '2020-08-21', '2020-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `flightype` varchar(40) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `rdate` date NOT NULL,
  `fnumber` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `classtype` varchar(40) NOT NULL,
  `paid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `flightype`, `time`, `date`, `rdate`, `fnumber`, `username`, `classtype`, `paid`) VALUES
(7, 'One Way', '02:04:05', '2020-08-21', '0000-00-00', 1, 'sami', 'Business', 0),
(8, 'Round Trip', '02:04:25', '2020-08-21', '2020-08-22', 4, 'sami', 'Business', 0);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `fnumber` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `classname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`fnumber`, `capacity`, `price`, `classname`) VALUES
(1, 100, 10000, 'Economy'),
(1, 10, 10000, 'Business'),
(2, 100, 10000, 'Economy'),
(2, 10, 10000, 'Business'),
(3, 200, 2000, 'Economy'),
(3, 400, 4000, 'Business'),
(4, 300, 4000, 'Economy'),
(4, 20, 5000, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `onewayflights`
--

CREATE TABLE IF NOT EXISTS `onewayflights` (
  `fnumber` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `todate` date NOT NULL,
  `dairport` varchar(40) NOT NULL,
  `dtime` time NOT NULL,
  `aairport` varchar(40) NOT NULL,
  `atime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onewayflights`
--

INSERT INTO `onewayflights` (`fnumber`, `aid`, `todate`, `dairport`, `dtime`, `aairport`, `atime`) VALUES
(1, 1, '2020-08-21', 'Addis Ababa', '19:00:00', 'Bahirdar', '19:00:00'),
(2, 2, '2020-08-21', 'Gondar', '19:00:00', 'Mekele', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `passanger`
--

CREATE TABLE IF NOT EXISTS `passanger` (
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `confpass` varchar(40) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `passport` int(11) NOT NULL,
  `homenum` int(11) NOT NULL,
  `street` int(11) NOT NULL,
  `city` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passanger`
--

INSERT INTO `passanger` (`fname`, `lname`, `username`, `password`, `confpass`, `sex`, `age`, `email`, `phone`, `passport`, `homenum`, `street`, `city`) VALUES
('samuel', 'tilahun', 'sami', '4385695633f8c6c8ab52592092cecf04', '4f8de24d6093ac5d25c7cfafc474d49f', 'male', 20, 'samueltiahun991@gmail.com', 911201022, 123123, 2002, 0, 'gondar');

-- --------------------------------------------------------

--
-- Table structure for table `roundflights`
--

CREATE TABLE IF NOT EXISTS `roundflights` (
  `fnumber` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `gdate` date NOT NULL,
  `rdate` date NOT NULL,
  `airport1` varchar(40) NOT NULL,
  `dtime` time NOT NULL,
  `airport2` varchar(40) NOT NULL,
  `atime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roundflights`
--

INSERT INTO `roundflights` (`fnumber`, `aid`, `gdate`, `rdate`, `airport1`, `dtime`, `airport2`, `atime`) VALUES
(3, 3, '2020-08-21', '2020-08-22', 'Markos', '19:01:00', 'Jimma', '19:01:00'),
(4, 4, '2020-08-21', '2020-08-22', 'Axum', '19:02:00', 'Adama', '19:03:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
