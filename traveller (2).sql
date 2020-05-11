-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 06:34 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `traveller`
--

CREATE TABLE `traveller` (
  `trvl_name` text,
  `trvl_ssn` int(11) NOT NULL,
  `trvl_mail` text,
  `trvl_phone` int(11) DEFAULT NULL,
  `trvl_numOperson` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `trvl_orderOroom` text,
  `trvl_visaORcash` text,
  `trvl_visaNum` int(11) DEFAULT NULL,
  `trvl_offer` text,
  `trvl_nationality` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traveller`
--

INSERT INTO `traveller` (`trvl_name`, `trvl_ssn`, `trvl_mail`, `trvl_phone`, `trvl_numOperson`, `date`, `trvl_orderOroom`, `trvl_visaORcash`, `trvl_visaNum`, `trvl_offer`, `trvl_nationality`) VALUES
('BAS', 1, 'bnjk@fbbn', 45667, 2, '2018-07-12', '3', 'show', 0, 'fgdhhd', 'hfgj'),
('basm', 44, 'fghjhj@gg', 56778, 7, '2018-07-03', 'suit', 'visa', 33, 'ffbbh', 'dfghg'),
('paris', 123, 'saaa@dkfd', 1234, 1234, '2018-07-03', 'second', 'cash', 1234, '12', 'egyptian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `traveller`
--
ALTER TABLE `traveller`
  ADD PRIMARY KEY (`trvl_ssn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
