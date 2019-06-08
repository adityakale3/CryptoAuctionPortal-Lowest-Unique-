-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2019 at 07:18 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faucet`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidgame`
--

CREATE TABLE `bidgame` (
  `ID` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `bidamount` varchar(500) NOT NULL,
  `vel` varchar(100) NOT NULL,
  `bidid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidgame`
--

INSERT INTO `bidgame` (`ID`, `username`, `bidamount`, `vel`, `bidid`) VALUES
(0, 'adik', '00.02', '1559970481', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `ID` int(50) NOT NULL,
  `bidid` varchar(100) NOT NULL,
  `bidvalue` varchar(100) NOT NULL,
  `bidamount` varchar(100) NOT NULL,
  `bidtime` varchar(100) NOT NULL,
  `endtime` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'live'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`ID`, `bidid`, `bidvalue`, `bidamount`, `bidtime`, `endtime`, `status`) VALUES
(1, '1', '0.005', '0.05', '1559864362', '1565221162', 'live');

-- --------------------------------------------------------

--
-- Table structure for table `onrefer`
--

CREATE TABLE `onrefer` (
  `ID` int(12) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onrefer`
--

INSERT INTO `onrefer` (`ID`, `amount`, `status`) VALUES
(1, '100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `balance` varchar(50) NOT NULL,
  `withbalance` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `btc` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `refad` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `balance`, `withbalance`, `email`, `btc`, `username`, `status`, `ref`, `refad`) VALUES
(1, '4999.995', '0.00003', 'adityakale3@gmail.com', '1AaiNRkEgSxAZQrxdRPTi55MEGuwGHeCAK', 'adik', '1', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `onrefer`
--
ALTER TABLE `onrefer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `onrefer`
--
ALTER TABLE `onrefer`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
