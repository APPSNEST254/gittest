-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 09:59 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miliki`
--

-- --------------------------------------------------------

--
-- Table structure for table `advancerent`
--

CREATE TABLE `advancerent` (
  `invoiceno` varchar(25) NOT NULL,
  `propertyid` varchar(10) NOT NULL,
  `unitid` varchar(10) NOT NULL,
  `tenantid` varchar(25) NOT NULL,
  `paymentdate` date NOT NULL,
  `advancepayment` int(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advancerent`
--

INSERT INTO `advancerent` (`invoiceno`, `propertyid`, `unitid`, `tenantid`, `paymentdate`, `advancepayment`, `status`) VALUES
('103B-1B-09-2021', '103B', '1B', '2655533', '2021-09-13', -5150, 'ADVANCE'),
('103B-1A-08-2021', '', '', '', '2021-09-14', -2000, ''),
('103B-3A-08-2021', '103B', '3A', '26555355', '2021-09-14', -2000, 'ADVANCE'),
('105-1A-09-2021', '105', '1A', '34567890', '2021-09-16', -2700, 'ADVANCE'),
('112-1A-09-2021', '112', '1A', '23456789', '2021-09-21', -4000, 'ADVANCE'),
('113B-2B-09-2021', '113B', '2B', '24564545', '2021-09-21', -3550, 'ADVANCE'),
('118-1-09-2021', '118', '1', '23456789', '2021-09-27', -3800, 'ADVANCE');

-- --------------------------------------------------------

--
-- Table structure for table `agencybank`
--

CREATE TABLE `agencybank` (
  `bankmodeid` int(25) NOT NULL,
  `agencyid` int(25) NOT NULL,
  `bankname` varchar(25) NOT NULL,
  `accountname` varchar(25) NOT NULL,
  `accountno` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencybank`
--

INSERT INTO `agencybank` (`bankmodeid`, `agencyid`, `bankname`, `accountname`, `accountno`) VALUES
(1, 1244, 'EQUITY', 'Miliki Commercial Agency', '32134#A');

-- --------------------------------------------------------

--
-- Table structure for table `agencycounter`
--

CREATE TABLE `agencycounter` (
  `count` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencycounter`
--

INSERT INTO `agencycounter` (`count`) VALUES
(1244);

-- --------------------------------------------------------

--
-- Table structure for table `agencyfee`
--

CREATE TABLE `agencyfee` (
  `agencyid` int(10) NOT NULL,
  `agencyfeetype` int(5) NOT NULL,
  `agencyfee` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencyfee`
--

INSERT INTO `agencyfee` (`agencyid`, `agencyfeetype`, `agencyfee`) VALUES
(1244, 1, 700);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agentid` int(25) NOT NULL,
  `agencyid` int(25) NOT NULL,
  `agencyshortname` varchar(25) NOT NULL,
  `agencyfullname` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phoneno` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `county` varchar(25) NOT NULL,
  `box` int(10) NOT NULL,
  `postalcode` varchar(10) NOT NULL,
  `town` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL,
  `currency` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regdate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agentid`, `agencyid`, `agencyshortname`, `agencyfullname`, `email`, `phoneno`, `address`, `address1`, `county`, `box`, `postalcode`, `town`, `username`, `firstname`, `lastname`, `level`, `currency`, `password`, `regdate`) VALUES
(1, 1244, 'Miliki', 'Miliki Commercial Agency', 'admin@milikiagency.co.ke', '0722444555', 'Masters Plaza, Rm A015, Grnd Flr', 'Kenyatta Avenue, Near Absa Bank', 'NAKURU', 124, '20100', 'NAKURU', 'admin', 'Sarah', 'Muthoni', '1', '79', '21232f297a57a5a743894a0e4a801fc3', '21-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `amountdue`
--

CREATE TABLE `amountdue` (
  `propertyid` int(5) NOT NULL,
  `unitid` varchar(5) NOT NULL,
  `idno` int(5) NOT NULL,
  `rentbalance` int(5) NOT NULL,
  `depositbalance` int(5) NOT NULL,
  `waterdepbal` int(10) NOT NULL,
  `waterbalance` int(5) NOT NULL,
  `electricitydepbalance` int(5) NOT NULL,
  `electricitybal` int(5) NOT NULL,
  `penaltyfeebal` int(5) NOT NULL,
  `damagesfeebal` int(5) NOT NULL,
  `agencyfeebal` int(5) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amountdue`
--

INSERT INTO `amountdue` (`propertyid`, `unitid`, `idno`, `rentbalance`, `depositbalance`, `waterdepbal`, `waterbalance`, `electricitydepbalance`, `electricitybal`, `penaltyfeebal`, `damagesfeebal`, `agencyfeebal`, `total`) VALUES
(1011, '3', 2856565, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '2', 5275993, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1007, '5', 8044782, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '7', 8167812, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '12', 9715827, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '1', 12663301, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '10', 13448256, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1007, '2', 13646743, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '9', 14561530, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '7', 20400579, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '3', 20554669, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '22', 20926826, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '18', 21270548, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '18', 21926440, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '9', 21926516, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '17', 21956408, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1007, '4', 23136397, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '11', 23147424, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1002, '5', 23232323, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '6', 23401882, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '11', 23704020, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1007, '6', 23891270, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1010, '3', 24078421, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '1', 24181706, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '14', 24263821, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '3', 24273298, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '9', 24556778, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '12', 25069075, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1001, '2', 25093632, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '1', 25322331, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '5', 25443775, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1002, '7', 26958927, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '5', 27090973, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1001, '5', 27098871, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '8', 27923609, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '7', 28090457, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '3', 28255899, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '21', 28359999, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1001, '1', 28414909, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '12', 28472720, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1002, '10', 28500264, 0, 0, 1500, 0, 0, 0, 0, 0, 0, 1500),
(1003, '6', 28501802, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1001, '8', 28903851, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1001, '4', 28907645, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '6', 29006655, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '13', 29076654, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1001, '3', 29170136, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '19', 29391564, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '13', 29676445, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1001, '6', 29865456, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '10', 29886734, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '16', 29947113, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '14', 30243072, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '10', 30250124, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '4', 30356879, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1010, '4', 30394829, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '8', 30546523, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '11', 30557823, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1001, '7', 30577942, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '15', 30667554, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '14', 30667843, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '2', 30925789, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '13', 30990971, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '15', 31219030, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '1', 31542699, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1007, '6', 32497786, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1005, '4', 33044178, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1007, '1', 33053210, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1011, '1', 33334343, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '4', 33445678, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1006, '16', 34291387, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1010, '2', 35561522, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1010, '1', 35561664, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1011, '2', 35612454, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1003, '16', 36556786, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `invoiceno` varchar(25) NOT NULL,
  `propertyid` varchar(25) NOT NULL,
  `unitid` varchar(10) NOT NULL,
  `tenantid` varchar(25) NOT NULL,
  `paymentdate` varchar(25) NOT NULL,
  `dueamount` int(10) NOT NULL,
  `paidamount` int(10) NOT NULL,
  `balancecf` int(10) NOT NULL,
  `rno` int(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`invoiceno`, `propertyid`, `unitid`, `tenantid`, `paymentdate`, `dueamount`, `paidamount`, `balancecf`, `rno`, `status`) VALUES
('118-1B-09-2021', '118', '1B', '23456789', '21-09-27', 18200, 16200, 2000, 0, 'DUE'),
('118-2A-09-2021', '118', '2A', '34544646', '21-09-27', 12200, 8000, 4200, 0, 'DUE');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `title` text NOT NULL,
  `firstname` text NOT NULL,
  `suname` text NOT NULL,
  `middlename` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `idno` int(8) NOT NULL,
  `mobileno` int(10) NOT NULL,
  `propertyid` int(5) NOT NULL,
  `unitid` varchar(5) NOT NULL,
  `bookdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `county` text NOT NULL,
  `building` text NOT NULL,
  `locationdep` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `town` text NOT NULL,
  `tel` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`county`, `building`, `locationdep`, `address`, `town`, `tel`, `email`, `name`, `regdate`) VALUES
('NAKURU', 'KFA HEAD OFFICE', 'OPP NAKUMATT NAKURU', '4455', 'NAKURU', 701122474, 'info@accessmetrohomes.co.ke', 'ACCESS METRO HOMES NAKURU', '2017-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `propertyid` int(8) NOT NULL,
  `title` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `suname` text NOT NULL,
  `idno` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileno` int(10) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `town` text NOT NULL,
  `bankname` text NOT NULL,
  `accountname` text NOT NULL,
  `accountnumber` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientspayments`
--

CREATE TABLE `clientspayments` (
  `sno` int(10) NOT NULL,
  `propertyid` int(10) NOT NULL,
  `amountpaid` int(10) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(10) NOT NULL,
  `mode` text NOT NULL,
  `trscode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `count` int(5) NOT NULL,
  `counterid` varchar(25) NOT NULL,
  `month` varchar(25) NOT NULL,
  `propertyid` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`count`, `counterid`, `month`, `propertyid`) VALUES
(1, '1001-08-2021', '08-2021', 1001),
(9, '1001-09-2021', '09-2021', 1001),
(17, '5004-09-2021', '09-2021', 5004),
(18, '5004-10-2021', '10-2021', 5004),
(19, '1007-08-2021', '08-2021', 1007),
(20, '1007-10-2021', '10-2021', 1007),
(21, '5007TS-09-2021', '09-2021', 5007),
(24, '5007TS-10-2021', '10-2021', 5007),
(27, '1008-10-2021', '10-2021', 1008),
(29, '1008-08-2021', '08-2021', 1008),
(31, '1008-11-2021', '11-2021', 1008),
(33, '1008-12-2021', '12-2021', 1008),
(35, '103B-08-2021', '08-2021', 103),
(39, '103B-09-2021', '09-2021', 103),
(43, '105-07-2021', '07-2021', 105),
(45, '105-08-2021', '08-2021', 105),
(47, '105-10-2021', '10-2021', 105),
(48, '105-11-2021', '11-2021', 105),
(49, '105-12-2021', '12-2021', 105),
(50, '105-01-2022', '01-2022', 105),
(51, '105-02-2022', '02-2022', 105),
(52, '112-10-2021', '10-2021', 112),
(53, '112-08-2021', '08-2021', 112);

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `name`, `code`) VALUES
(1, 'Mombasa', 1),
(2, 'Kwale', 2),
(3, 'Kilifi', 3),
(4, 'Tana River', 4),
(5, 'Lamu', 5),
(6, 'Taita-Taveta', 6),
(7, 'Garissa', 7),
(8, 'Wajir', 8),
(9, 'Mandera', 9),
(10, 'Marsabit', 10),
(11, 'Isiolo', 11),
(12, 'Meru', 12),
(13, 'Tharaka-Nithi', 13),
(14, 'Embu', 14),
(15, 'Kitui', 15),
(16, 'Machakos', 16),
(17, 'Makueni', 17),
(18, 'Nyandarua', 18),
(19, 'Nyeri', 19),
(20, 'Kirinyaga', 20),
(21, 'Muranga', 21),
(22, 'Kiambu', 22),
(23, 'Turkana', 23),
(24, 'West Pokot', 24),
(25, 'Samburu', 25),
(26, 'Trans Nzoia', 26),
(27, 'Uasin Gishu', 27),
(28, 'Elgeyo-Marakwet', 28),
(29, 'Nandi', 29),
(30, 'Baringo', 30),
(31, 'Laikipia', 31),
(32, 'Nakuru', 32),
(33, 'Narok', 33),
(34, 'Kajiado', 34),
(35, 'Kericho', 35),
(36, 'Bomet', 36),
(37, 'Kakamega', 37),
(38, 'Vihiga', 38),
(39, 'Bungoma', 39),
(40, 'Busia', 40),
(41, 'Siaya', 41),
(42, 'Kisumu', 42),
(43, 'Homa Bay', 43),
(44, 'Migori', 44),
(45, 'Kisii', 45),
(46, 'Nyamira', 46),
(47, 'Nairobi', 47);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_code` varchar(3) NOT NULL,
  `currency_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_code`, `currency_name`) VALUES
(1, 'AFA', 'Afghan Afghani'),
(2, 'ALL', 'Albanian Lek'),
(3, 'DZD', 'Algerian Dinar'),
(4, 'AOA', 'Angolan Kwanza'),
(5, 'ARS', 'Argentine Peso'),
(6, 'AMD', 'Armenian Dram'),
(7, 'AWG', 'Aruban Florin'),
(8, 'AUD', 'Australian Dollar'),
(9, 'AZN', 'Azerbaijani Manat'),
(10, 'BSD', 'Bahamian Dollar'),
(11, 'BHD', 'Bahraini Dinar'),
(12, 'BDT', 'Bangladeshi Taka'),
(13, 'BBD', 'Barbadian Dollar'),
(14, 'BYR', 'Belarusian Ruble'),
(15, 'BEF', 'Belgian Franc'),
(16, 'BZD', 'Belize Dollar'),
(17, 'BMD', 'Bermudan Dollar'),
(18, 'BTN', 'Bhutanese Ngultrum'),
(19, 'BTC', 'Bitcoin'),
(20, 'BOB', 'Bolivian Boliviano'),
(21, 'BAM', 'Bosnia-Herzegovina Convertible Mark'),
(22, 'BWP', 'Botswanan Pula'),
(23, 'BRL', 'Brazilian Real'),
(24, 'GBP', 'British Pound Sterling'),
(25, 'BND', 'Brunei Dollar'),
(26, 'BGN', 'Bulgarian Lev'),
(27, 'BIF', 'Burundian Franc'),
(28, 'KHR', 'Cambodian Riel'),
(29, 'CAD', 'Canadian Dollar'),
(30, 'CVE', 'Cape Verdean Escudo'),
(31, 'KYD', 'Cayman Islands Dollar'),
(32, 'XOF', 'CFA Franc BCEAO'),
(33, 'XAF', 'CFA Franc BEAC'),
(34, 'XPF', 'CFP Franc'),
(35, 'CLP', 'Chilean Peso'),
(36, 'CNY', 'Chinese Yuan'),
(37, 'COP', 'Colombian Peso'),
(38, 'KMF', 'Comorian Franc'),
(39, 'CDF', 'Congolese Franc'),
(40, 'CRC', 'Costa Rican ColÃ³n'),
(41, 'HRK', 'Croatian Kuna'),
(42, 'CUC', 'Cuban Convertible Peso'),
(43, 'CZK', 'Czech Republic Koruna'),
(44, 'DKK', 'Danish Krone'),
(45, 'DJF', 'Djiboutian Franc'),
(46, 'DOP', 'Dominican Peso'),
(47, 'XCD', 'East Caribbean Dollar'),
(48, 'EGP', 'Egyptian Pound'),
(49, 'ERN', 'Eritrean Nakfa'),
(50, 'EEK', 'Estonian Kroon'),
(51, 'ETB', 'Ethiopian Birr'),
(52, 'EUR', 'Euro'),
(53, 'FKP', 'Falkland Islands Pound'),
(54, 'FJD', 'Fijian Dollar'),
(55, 'GMD', 'Gambian Dalasi'),
(56, 'GEL', 'Georgian Lari'),
(57, 'DEM', 'German Mark'),
(58, 'GHS', 'Ghanaian Cedi'),
(59, 'GIP', 'Gibraltar Pound'),
(60, 'GRD', 'Greek Drachma'),
(61, 'GTQ', 'Guatemalan Quetzal'),
(62, 'GNF', 'Guinean Franc'),
(63, 'GYD', 'Guyanaese Dollar'),
(64, 'HTG', 'Haitian Gourde'),
(65, 'HNL', 'Honduran Lempira'),
(66, 'HKD', 'Hong Kong Dollar'),
(67, 'HUF', 'Hungarian Forint'),
(68, 'ISK', 'Icelandic KrÃ³na'),
(69, 'INR', 'Indian Rupee'),
(70, 'IDR', 'Indonesian Rupiah'),
(71, 'IRR', 'Iranian Rial'),
(72, 'IQD', 'Iraqi Dinar'),
(73, 'ILS', 'Israeli New Sheqel'),
(74, 'ITL', 'Italian Lira'),
(75, 'JMD', 'Jamaican Dollar'),
(76, 'JPY', 'Japanese Yen'),
(77, 'JOD', 'Jordanian Dinar'),
(78, 'KZT', 'Kazakhstani Tenge'),
(79, 'KES', 'Kenyan Shilling'),
(80, 'KWD', 'Kuwaiti Dinar'),
(81, 'KGS', 'Kyrgystani Som'),
(82, 'LAK', 'Laotian Kip'),
(83, 'LVL', 'Latvian Lats'),
(84, 'LBP', 'Lebanese Pound'),
(85, 'LSL', 'Lesotho Loti'),
(86, 'LRD', 'Liberian Dollar'),
(87, 'LYD', 'Libyan Dinar'),
(88, 'LTL', 'Lithuanian Litas'),
(89, 'MOP', 'Macanese Pataca'),
(90, 'MKD', 'Macedonian Denar'),
(91, 'MGA', 'Malagasy Ariary'),
(92, 'MWK', 'Malawian Kwacha'),
(93, 'MYR', 'Malaysian Ringgit'),
(94, 'MVR', 'Maldivian Rufiyaa'),
(95, 'MRO', 'Mauritanian Ouguiya'),
(96, 'MUR', 'Mauritian Rupee'),
(97, 'MXN', 'Mexican Peso'),
(98, 'MDL', 'Moldovan Leu'),
(99, 'MNT', 'Mongolian Tugrik'),
(100, 'MAD', 'Moroccan Dirham'),
(101, 'MZM', 'Mozambican Metical'),
(102, 'MMK', 'Myanmar Kyat'),
(103, 'NAD', 'Namibian Dollar'),
(104, 'NPR', 'Nepalese Rupee'),
(105, 'ANG', 'Netherlands Antillean Guilder'),
(106, 'TWD', 'New Taiwan Dollar'),
(107, 'NZD', 'New Zealand Dollar'),
(108, 'NIO', 'Nicaraguan CÃ³rdoba'),
(109, 'NGN', 'Nigerian Naira'),
(110, 'KPW', 'North Korean Won'),
(111, 'NOK', 'Norwegian Krone'),
(112, 'OMR', 'Omani Rial'),
(113, 'PKR', 'Pakistani Rupee'),
(114, 'PAB', 'Panamanian Balboa'),
(115, 'PGK', 'Papua New Guinean Kina'),
(116, 'PYG', 'Paraguayan Guarani'),
(117, 'PEN', 'Peruvian Nuevo Sol'),
(118, 'PHP', 'Philippine Peso'),
(119, 'PLN', 'Polish Zloty'),
(120, 'QAR', 'Qatari Rial'),
(121, 'RON', 'Romanian Leu'),
(122, 'RUB', 'Russian Ruble'),
(123, 'RWF', 'Rwandan Franc'),
(124, 'SVC', 'Salvadoran ColÃ³n'),
(125, 'WST', 'Samoan Tala'),
(126, 'SAR', 'Saudi Riyal'),
(127, 'RSD', 'Serbian Dinar'),
(128, 'SCR', 'Seychellois Rupee'),
(129, 'SLL', 'Sierra Leonean Leone'),
(130, 'SGD', 'Singapore Dollar'),
(131, 'SKK', 'Slovak Koruna'),
(132, 'SBD', 'Solomon Islands Dollar'),
(133, 'SOS', 'Somali Shilling'),
(134, 'ZAR', 'South African Rand'),
(135, 'KRW', 'South Korean Won'),
(136, 'XDR', 'Special Drawing Rights'),
(137, 'LKR', 'Sri Lankan Rupee'),
(138, 'SHP', 'St. Helena Pound'),
(139, 'SDG', 'Sudanese Pound'),
(140, 'SRD', 'Surinamese Dollar'),
(141, 'SZL', 'Swazi Lilangeni'),
(142, 'SEK', 'Swedish Krona'),
(143, 'CHF', 'Swiss Franc'),
(144, 'SYP', 'Syrian Pound'),
(145, 'STD', 'São Tomé and Príncipe Dobra'),
(146, 'TJS', 'Tajikistani Somoni'),
(147, 'TZS', 'Tanzanian Shilling'),
(148, 'THB', 'Thai Baht'),
(149, 'TOP', 'Tongan pa\'anga'),
(150, 'TTD', 'Trinidad & Tobago Dollar'),
(151, 'TND', 'Tunisian Dinar'),
(152, 'TRY', 'Turkish Lira'),
(153, 'TMT', 'Turkmenistani Manat'),
(154, 'UGX', 'Ugandan Shilling'),
(155, 'UAH', 'Ukrainian Hryvnia'),
(156, 'AED', 'United Arab Emirates Dirham'),
(157, 'UYU', 'Uruguayan Peso'),
(158, 'USD', 'US Dollar'),
(159, 'UZS', 'Uzbekistan Som'),
(160, 'VUV', 'Vanuatu Vatu'),
(161, 'VEF', 'Venezuelan BolÃ­var'),
(162, 'VND', 'Vietnamese Dong'),
(163, 'YER', 'Yemeni Rial'),
(164, 'ZMK', 'Zambian Kwacha');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `idno` varchar(25) NOT NULL,
  `invoiceno` varchar(25) NOT NULL,
  `propertyid` varchar(25) NOT NULL,
  `unitid` varchar(10) NOT NULL,
  `deposit` int(10) NOT NULL,
  `paydate` date NOT NULL,
  `agencyfee` int(10) DEFAULT NULL,
  `waterdeposit` int(10) DEFAULT NULL,
  `electricitydeposit` int(10) DEFAULT NULL,
  `total` int(10) NOT NULL,
  `status` text DEFAULT NULL,
  `lanlord` text NOT NULL,
  `rno` int(10) NOT NULL,
  `landlordrefund` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`idno`, `invoiceno`, `propertyid`, `unitid`, `deposit`, `paydate`, `agencyfee`, `waterdeposit`, `electricitydeposit`, `total`, `status`, `lanlord`, `rno`, `landlordrefund`) VALUES
('23456789', '118-1-09-2021', '118', '1', 6500, '0000-00-00', 700, 500, 1000, 0, 'ACTIVE', '', 0, ''),
('34544646', '118-2A-09-2021', '118', '2A', 5000, '0000-00-00', 700, 500, 1000, 0, 'ACTIVE', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `estate`
--

CREATE TABLE `estate` (
  `abbriviation` varchar(25) NOT NULL,
  `estatename` varchar(25) NOT NULL,
  `county` varchar(25) NOT NULL,
  `town` varchar(25) NOT NULL,
  `agencyid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estate`
--

INSERT INTO `estate` (`abbriviation`, `estatename`, `county`, `town`, `agencyid`) VALUES
('EMG', 'EGERTON MAIN GATE', 'NAKURU', ' EGERTON', '1244'),
('KWRT', 'KWA WRIGHT', 'NAKURU', ' EGERTON', '1244'),
('NGD', 'NGONDU', 'NAKURU', ' EGERTON', '1244'),
('NJKR', 'NJOKERIO', 'NAKURU', ' EGERTON', '1244'),
('NJR', 'NJORO', 'NAKURU', ' EGERTON', '1244');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `propertyid` int(11) NOT NULL,
  `expenditures` text NOT NULL,
  `description` text NOT NULL,
  `datepaid` date NOT NULL,
  `month` varchar(10) NOT NULL,
  `amount` int(5) NOT NULL,
  `mode` text NOT NULL,
  `trscode` varchar(50) NOT NULL,
  `agentid` int(5) NOT NULL,
  `agentname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `landlord`
--

CREATE TABLE `landlord` (
  `propertyid` varchar(25) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `phoneno` int(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `box` int(25) NOT NULL,
  `town` text NOT NULL,
  `postalcode` int(25) NOT NULL,
  `bankname` varchar(25) NOT NULL,
  `accountname` varchar(25) NOT NULL,
  `accountno` varchar(25) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `landlord`
--

INSERT INTO `landlord` (`propertyid`, `firstname`, `lastname`, `email`, `phoneno`, `address`, `box`, `town`, `postalcode`, `bankname`, `accountname`, `accountno`, `regdate`) VALUES
('114A', 'David', 'Huria', 'daniel@gmail.com', 754365676, 'Egerton University Main G', 454, ' Egerton', 20115, 'KCB', 'David Huria', '2345432648', '2021-09-27'),
('115 BLOCK A', 'William', 'Kamau', 'william@gmail.com', 754323456, 'Egerton University Main G', 345, ' Egerton', 20115, 'EQUITY', 'William Kamau', '213124445', '2021-09-27'),
('115B BLOCK B', 'William', 'Kamau', 'walter@gmail.com', 745678435, 'Egerton University Main G', 456, ' Egerton', 20115, 'EQUITY', 'William Kamau', '2342353453', '2021-09-27'),
('116A BLOCK AB', 'William', 'Kamau', 'walter@gmail.com', 734555666, 'Egerton University Main G', 456, ' Egerton', 20115, 'EQUITY', 'William Kamau', '4344587998', '2021-09-27'),
('117A', 'William', 'Kamau', 'william@gmail.com', 723444555, 'Egerton University Main G', 234, ' Egerton', 20115, 'EQUITY', 'William Kamau', '123456789', '2021-09-27'),
('117B', 'William', 'Kamau', 'william@gmail.com', 722333444, 'Egerton University Main G', 234, ' Egerton', 20115, 'EQUITY', 'William Kamau', '123456789', '2021-09-27'),
('118', 'Sarah', 'Wanjiru', 'sarah@gmail.com', 745678435, 'Egerton University Main G', 123, ' Egerton', 20115, 'EQUITY', 'Sarah Wanjiru', '423556345', '2021-09-27'),
('119A', 'Ellen', 'Waweru', 'ellen@gmail.com', 743534435, 'Egerton University Main G', 233, ' Egerton', 20115, 'KCB', 'Ellen Waweru', '4584367890', '2021-09-27'),
('120', 'Eric', 'Wanaina', 'erick@gmail.com', 787236765, 'Egerton University Main G', 234, ' Egerton', 20115, 'SELECT BANK', 'Erick Wanaina', '123456467', '2021-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `landlordadvance`
--

CREATE TABLE `landlordadvance` (
  `rno` int(10) NOT NULL,
  `propertyid` varchar(10) NOT NULL,
  `advanceamount` int(10) NOT NULL,
  `paymentdate` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `landlordbalances`
--

CREATE TABLE `landlordbalances` (
  `invoiceno` varchar(25) NOT NULL,
  `propertyid` varchar(10) NOT NULL,
  `paymentdate` date NOT NULL,
  `invoicedamount` int(10) NOT NULL,
  `paidamount` int(10) NOT NULL,
  `balancecf` int(10) NOT NULL,
  `rno` int(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `landlordinvoices`
--

CREATE TABLE `landlordinvoices` (
  `invoiceno` varchar(25) NOT NULL,
  `propertyid` varchar(10) NOT NULL,
  `month` date NOT NULL,
  `vacantunits` int(10) NOT NULL,
  `occupiedunits` int(10) NOT NULL,
  `dategenerated` date NOT NULL,
  `duedate` date NOT NULL,
  `paymentdate` date NOT NULL,
  `balancebf` int(10) NOT NULL,
  `invoicedamount` int(10) NOT NULL,
  `paidanount` int(10) NOT NULL,
  `balancecf` int(10) NOT NULL,
  `rno` int(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `agencyid` varchar(25) NOT NULL,
  `logoname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`agencyid`, `logoname`) VALUES
('1244', 'uploads/icon@3x.png');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa`
--

CREATE TABLE `mpesa` (
  `mpesaid` int(25) NOT NULL,
  `agencyid` int(25) NOT NULL,
  `mpesamode` varchar(25) NOT NULL,
  `bisinessname` varchar(25) NOT NULL,
  `accountno` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mpesa`
--

INSERT INTO `mpesa` (`mpesaid`, `agencyid`, `mpesamode`, `bisinessname`, `accountno`) VALUES
(1, 1244, 'PAYBILL', '344555', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `sno` varchar(50) NOT NULL,
  `rno` int(50) NOT NULL,
  `idno` int(10) NOT NULL,
  `name` text NOT NULL,
  `sn` varchar(100) NOT NULL,
  `propertyid` int(5) NOT NULL,
  `unitid` varchar(5) NOT NULL,
  `month` text NOT NULL,
  `paymentdate` date NOT NULL,
  `rent` int(5) DEFAULT NULL,
  `electricitybill` int(5) DEFAULT NULL,
  `waterbill` int(5) DEFAULT NULL,
  `penaltyfee` int(5) DEFAULT NULL,
  `damages` int(5) DEFAULT NULL,
  `totalpay` int(6) NOT NULL,
  `mode` text NOT NULL,
  `trscode` varchar(50) DEFAULT NULL,
  `admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penaltyfee`
--

CREATE TABLE `penaltyfee` (
  `agencyid` int(10) NOT NULL,
  `penaltyfeetype` int(5) NOT NULL,
  `penaltyfee` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penaltyfee`
--

INSERT INTO `penaltyfee` (`agencyid`, `penaltyfeetype`, `penaltyfee`) VALUES
(1244, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `propertyid` varchar(10) NOT NULL,
  `propertyname` text NOT NULL,
  `type` text NOT NULL,
  `estatename` text NOT NULL,
  `commission` int(2) NOT NULL,
  `depositto` text NOT NULL,
  `waterdeposit` int(5) NOT NULL,
  `electricitydeposit` int(5) NOT NULL,
  `waterbill` text NOT NULL,
  `electricitybill` text NOT NULL,
  `sanitationbill` text NOT NULL,
  `regdate` date NOT NULL,
  `agencyid` int(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyid`, `propertyname`, `type`, `estatename`, `commission`, `depositto`, `waterdeposit`, `electricitydeposit`, `waterbill`, `electricitybill`, `sanitationbill`, `regdate`, `agencyid`, `status`) VALUES
('114A', 'BOSTON APPATMENTS', 'RESIDENTIAL', 'KWA WRIGHT', 10, 'LANDLORD', 1000, 500, 'METERED', 'METERED', 'N/A', '2021-09-27', 1244, 'ACTIVE'),
('117A', '117 BLOCK A', 'RESIDENTIAL', 'EGERTON MAIN GATE', 10, 'LANDLORD', 0, 0, 'METERED', 'SHARED', 'FIXED', '2021-09-27', 1244, 'ACTIVE'),
('117B', '117 BLOCK B', 'RESIDENTIAL', 'EGERTON MAIN GATE', 10, 'LANDLORD', 250, 1000, 'METERED', 'METERED', 'SHARED', '2021-09-27', 1244, 'ACTIVE'),
('118', 'HILTOP APPATMENTS', 'RESIDENTIAL', 'EGERTON MAIN GATE', 10, 'LANDLORD', 500, 1000, 'SHARED', 'METERED', 'FIXED', '2021-09-27', 1244, 'ACTIVE'),
('119A', 'BINTI HOUSE', 'RESIDENTIAL', 'NJOKERIO', 10, 'Landlord', 250, 500, 'METERED', 'METERED', 'FIXED', '2021-09-27', 1244, 'ACTIVE'),
('120', 'SUNRISE APPATMENTS', 'RESIDENTIAL', 'EGERTON MAIN GATE', 10, 'LANDLORD', 200, 1000, 'METERED', 'METERED', 'FIXED', '2021-09-27', 1244, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `propertycounter`
--

CREATE TABLE `propertycounter` (
  `id` int(5) NOT NULL,
  `propertyid` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertycounter`
--

INSERT INTO `propertycounter` (`id`, `propertyid`) VALUES
(1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `propertypayments`
--

CREATE TABLE `propertypayments` (
  `propertyid` int(10) NOT NULL,
  `deposit` text NOT NULL,
  `waterdeposit` int(10) NOT NULL,
  `electricitydeposit` int(10) NOT NULL,
  `waterbill` text NOT NULL,
  `electricitybill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rno`
--

CREATE TABLE `rno` (
  `rno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rno`
--

INSERT INTO `rno` (`rno`) VALUES
(133);

-- --------------------------------------------------------

--
-- Table structure for table `sharedwaterbill`
--

CREATE TABLE `sharedwaterbill` (
  `billno` int(10) NOT NULL,
  `billid` varchar(25) NOT NULL,
  `rno` varchar(10) NOT NULL,
  `propertyid` varchar(10) NOT NULL,
  `unitid` varchar(10) NOT NULL,
  `tenantid` varchar(25) NOT NULL,
  `month` varchar(25) NOT NULL,
  `totalamout` int(11) NOT NULL,
  `tenantamount` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tenantinvoices`
--

CREATE TABLE `tenantinvoices` (
  `invoiceid` int(25) NOT NULL,
  `invoiceno` varchar(25) NOT NULL,
  `propertyid` varchar(10) NOT NULL,
  `unitid` varchar(25) NOT NULL,
  `tenantid` varchar(25) NOT NULL,
  `month` varchar(25) NOT NULL,
  `duedate` date NOT NULL,
  `dategenerated` date NOT NULL,
  `time` varchar(30) NOT NULL,
  `balancebf` int(25) NOT NULL,
  `rent` int(25) NOT NULL,
  `balancecf` int(25) NOT NULL,
  `paydate` date NOT NULL,
  `penaltyfee` int(25) NOT NULL,
  `waterbill` int(25) NOT NULL,
  `electricitybill` int(25) NOT NULL,
  `sanitationbill` int(25) NOT NULL,
  `damagesfee` int(25) NOT NULL,
  `othercharges` int(25) NOT NULL,
  `mode` varchar(25) NOT NULL,
  `modename` text NOT NULL,
  `acctname` varchar(25) NOT NULL,
  `acctno` varchar(25) NOT NULL,
  `trscode` varchar(25) NOT NULL,
  `admin` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `invoicedamount` int(10) NOT NULL,
  `rno` int(10) NOT NULL,
  `paid` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenantinvoices`
--

INSERT INTO `tenantinvoices` (`invoiceid`, `invoiceno`, `propertyid`, `unitid`, `tenantid`, `month`, `duedate`, `dategenerated`, `time`, `balancebf`, `rent`, `balancecf`, `paydate`, `penaltyfee`, `waterbill`, `electricitybill`, `sanitationbill`, `damagesfee`, `othercharges`, `mode`, `modename`, `acctname`, `acctno`, `trscode`, `admin`, `status`, `invoicedamount`, `rno`, `paid`) VALUES
(1, '118-1-09-2021', '118', '1', '23456789', '09-2021', '2021-09-27', '2021-09-27', 'September 27, 2021, 12:02 pm', 0, 6500, -3800, '2021-09-27', 0, 0, 0, 0, 0, 0, 'MPESA', 'PAYBILL', '344555', '118-1-09-2021', 'PDQR123M', '1', 'PAID', 15200, 131, 19000),
(2, '118-1B-09-2021', '118', '1B', '23456789', '09-2021', '2021-09-27', '2021-09-27', 'September 27, 2021, 12:16 pm', 0, 8000, 2000, '2021-09-27', 0, 0, 0, 0, 0, 0, 'BANK', 'EQUITY', 'Miliki Commercial Agency', '32134#A', '475876786', '1', 'PAID', 18200, 132, 16200),
(3, '118-2A-09-2021', '118', '2A', '34544646', '09-2021', '2021-09-27', '2021-09-27', 'September 27, 2021, 3:36 pm', 0, 5000, 4200, '2021-09-27', 0, 0, 0, 0, 0, 0, 'CASH', '', '', '', '', '1', 'PAID', 12200, 133, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `entryid` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `firstname` text NOT NULL,
  `suname` text NOT NULL,
  `middlename` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `idno` int(25) NOT NULL,
  `regdate` date NOT NULL,
  `mobileno` int(30) NOT NULL,
  `altno` int(10) NOT NULL,
  `propertyid` varchar(10) NOT NULL,
  `unitid` varchar(10) NOT NULL,
  `occupation` text DEFAULT NULL,
  `company` text DEFAULT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`entryid`, `title`, `firstname`, `suname`, `middlename`, `email`, `idno`, `regdate`, `mobileno`, `altno`, `propertyid`, `unitid`, `occupation`, `company`, `fromdate`, `todate`, `status`) VALUES
('11812345678921-09-27', 'Mr', 'MOSES', 'MOSETI', 'M', 'moses@gmail.com', 23456789, '0000-00-00', 745677800, 745677800, '118', '1', 'Staff', 'Egerton University Njoro', '2020-10-21', '0000-00-00', 'CHECKED-IN'),
('1181B2345678921-09-27', 'Mr', 'MOSES', 'MOSETI', 'M', 'moses@gmail.com', 23456789, '0000-00-00', 745677800, 745677801, '118', '1B', 'Staff', 'Egerton University Njoro', '2021-09-28', '0000-00-00', 'CHECKED-IN'),
('1182A3454464621-09-27', 'Prof', 'Walter', 'Wanjala', 'W', 'walter@gmail.com', 34544646, '0000-00-00', 756547637, 726547637, '118', '2A', 'Student', 'Egerton University Njoro', '2021-09-27', '0000-00-00', 'CHECKED-IN');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(25) NOT NULL,
  `title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `title`) VALUES
(1, 'Mr'),
(2, 'Mrs'),
(3, 'Miss'),
(4, 'Dr'),
(5, 'Prof');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unitcode` varchar(20) NOT NULL,
  `propertyid` varchar(10) NOT NULL,
  `unitid` varchar(10) NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL,
  `areasq` varchar(10) NOT NULL,
  `features` text NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unitcode`, `propertyid`, `unitid`, `type`, `status`, `areasq`, `features`, `price`) VALUES
('1181', '118', '1', 'ONE BED ROOM', 'OCCUPIED', '200', '', '6500'),
('1181B', '118', '1B', 'BED SITTER', 'OCCUPIED', '200', '', '8000'),
('1182A', '118', '2A', 'BED SITTER', 'OCCUPIED', '200', '', '5000'),
('1183A', '118', '3A', 'TWO BED ROOM', 'UNOCCUPIED', '200', '', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `adminid` int(8) NOT NULL,
  `username` varchar(100) NOT NULL,
  `idno` int(8) NOT NULL,
  `firstname` text NOT NULL,
  `suname` text NOT NULL,
  `middlename` text NOT NULL,
  `dob` date NOT NULL,
  `regdate` date NOT NULL,
  `branch` text NOT NULL,
  `jobtitle` text NOT NULL,
  `sallary` int(5) NOT NULL,
  `mobilecontacts` int(10) NOT NULL,
  `altcontacts` int(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`adminid`, `username`, `idno`, `firstname`, `suname`, `middlename`, `dob`, `regdate`, `branch`, `jobtitle`, `sallary`, `mobilecontacts`, `altcontacts`, `password`) VALUES
(3004, 'robert@acessmetro.co.ke', 30043915, 'ROBERT', 'KIMOSOP', '', '2017-04-11', '2017-04-11', 'ACCESS METRO HOMES NAKURU', 'CEO', 20000, 701122474, 788845037, '0e47422cde4568f0810bd850b7e19b57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencybank`
--
ALTER TABLE `agencybank`
  ADD PRIMARY KEY (`bankmodeid`),
  ADD UNIQUE KEY `agencyid` (`agencyid`);

--
-- Indexes for table `agencycounter`
--
ALTER TABLE `agencycounter`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `agencyfee`
--
ALTER TABLE `agencyfee`
  ADD PRIMARY KEY (`agencyid`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agentid`),
  ADD UNIQUE KEY `agencyshortname` (`agencyshortname`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `agencyid` (`agencyid`);

--
-- Indexes for table `amountdue`
--
ALTER TABLE `amountdue`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`invoiceno`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idno`),
  ADD UNIQUE KEY `email` (`email`,`mobileno`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`tel`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`propertyid`);

--
-- Indexes for table `clientspayments`
--
ALTER TABLE `clientspayments`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`count`),
  ADD UNIQUE KEY `counterid` (`counterid`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`idno`),
  ADD UNIQUE KEY `rno` (`invoiceno`);

--
-- Indexes for table `estate`
--
ALTER TABLE `estate`
  ADD PRIMARY KEY (`abbriviation`);

--
-- Indexes for table `landlord`
--
ALTER TABLE `landlord`
  ADD PRIMARY KEY (`propertyid`);

--
-- Indexes for table `landlordadvance`
--
ALTER TABLE `landlordadvance`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `landlordinvoices`
--
ALTER TABLE `landlordinvoices`
  ADD PRIMARY KEY (`invoiceno`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`agencyid`);

--
-- Indexes for table `mpesa`
--
ALTER TABLE `mpesa`
  ADD PRIMARY KEY (`mpesaid`),
  ADD UNIQUE KEY `agencyid` (`agencyid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `sn` (`sn`),
  ADD UNIQUE KEY `rno` (`rno`);

--
-- Indexes for table `penaltyfee`
--
ALTER TABLE `penaltyfee`
  ADD PRIMARY KEY (`agencyid`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propertyid`);

--
-- Indexes for table `propertycounter`
--
ALTER TABLE `propertycounter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `propertyid` (`propertyid`);

--
-- Indexes for table `propertypayments`
--
ALTER TABLE `propertypayments`
  ADD PRIMARY KEY (`propertyid`);

--
-- Indexes for table `rno`
--
ALTER TABLE `rno`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `tenantinvoices`
--
ALTER TABLE `tenantinvoices`
  ADD PRIMARY KEY (`invoiceid`),
  ADD UNIQUE KEY `invoiceno` (`invoiceno`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`entryid`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unitcode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `username` (`username`,`idno`,`mobilecontacts`,`altcontacts`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencybank`
--
ALTER TABLE `agencybank`
  MODIFY `bankmodeid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `agentid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `count` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `mpesa`
--
ALTER TABLE `mpesa`
  MODIFY `mpesaid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `propertycounter`
--
ALTER TABLE `propertycounter`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenantinvoices`
--
ALTER TABLE `tenantinvoices`
  MODIFY `invoiceid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `adminid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
