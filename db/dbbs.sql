-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 02:13 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbguesthouse`
--

CREATE TABLE `tbguesthouse` (
  `itemid` int(10) NOT NULL,
  `itemname` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `itemtype` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbguesthouse`
--

INSERT INTO `tbguesthouse` (`itemid`, `itemname`, `details`, `img`, `itemtype`) VALUES
(1, 'test 2 fgfhfghg', 'sdfsfsdgf 2 fdgfgf', 'product-5-720x480.jpg  ', 1),
(2, 'hjhhjkjh', 'hjkjhljkl', 'product-6-720x480.jpg  ', 1),
(3, 'abc guest house', 'dfdgdfghfhfg', 'g1.jpg  ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbguesthouseimg`
--

CREATE TABLE `tbguesthouseimg` (
  `guestid` int(10) NOT NULL,
  `imagename` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `autoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbguesthouseimg`
--

INSERT INTO `tbguesthouseimg` (`guestid`, `imagename`, `autoid`) VALUES
(1, 'product-5-720x480.jpg  ', 9),
(1, 'blog-5-720x480.jpg  ', 10),
(2, 'product-6-720x480.jpg  ', 21),
(2, 'product-3-720x480.jpg  ', 22),
(3, 'g1.jpg  ', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tblhotel`
--

CREATE TABLE `tblhotel` (
  `itemid` int(10) NOT NULL,
  `itemname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tel1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email1` varchar(205) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblhotel`
--

INSERT INTO `tblhotel` (`itemid`, `itemname`, `tel1`, `tel2`, `email1`, `details`, `img`) VALUES
(1, 'praza hotel', '', '', '', 'best hotel in vte', 'product-5-720x480.jpg  '),
(3, 'abc hotel up 34vbvnbvn', '', '', '', '3 statr uop34 fbgfhgfhjgjhgjhkhjk', 'product-3-720x480.jpg  '),
(4, 'MODEL NEW TON HOTEL in vte', '', '', '', 'MODEL NEW TON HOTEL', 'product-4-720x480.jpg  ');

-- --------------------------------------------------------

--
-- Table structure for table `tblhotelimg`
--

CREATE TABLE `tblhotelimg` (
  `hotelid` int(11) NOT NULL,
  `imagename` varchar(550) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblhotelimg`
--

INSERT INTO `tblhotelimg` (`hotelid`, `imagename`) VALUES
(2, 'blog-fullscreen-1-1920x700.jpg  '),
(2, 'comment-author-03.jpg  '),
(3, 'product-3-720x480.jpg  '),
(3, 'product-4-720x480.jpg  '),
(1, 'product-5-720x480.jpg  '),
(1, 'product-6-720x480.jpg  '),
(1, 'product-1-720x480.jpg  '),
(4, 'product-4-720x480.jpg  '),
(4, 'product-5-720x480.jpg  '),
(4, 'product-6-720x480.jpg  '),
(4, 'blog-4-720x480'),
(4, 'blog-1-720x480.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblhouse`
--

CREATE TABLE `tblhouse` (
  `itemid` int(10) NOT NULL,
  `itemname` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(550) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblhouse`
--

INSERT INTO `tblhouse` (`itemid`, `itemname`, `details`, `img`) VALUES
(2, 'bgnhgjhkjhkhj', 'hjkjhkfghfhfghgjhgjkhg', 'download.jfif  ');

-- --------------------------------------------------------

--
-- Table structure for table `tblhouseimg`
--

CREATE TABLE `tblhouseimg` (
  `houseid` int(10) NOT NULL,
  `imagename` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `autoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblhouseimg`
--

INSERT INTO `tblhouseimg` (`houseid`, `imagename`, `autoid`) VALUES
(2, 'download.jfif  ', 3),
(2, 'blog-6-720x480.jpg  ', 4),
(2, 'product-1-720x480.jpg  ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbllanguage`
--

CREATE TABLE `tbllanguage` (
  `lanid` int(10) NOT NULL,
  `namelao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nameeng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `statusid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbllanguage`
--

INSERT INTO `tbllanguage` (`lanid`, `namelao`, `nameeng`, `statusid`) VALUES
(1, 'ລາວ', 'Lao', 1),
(2, 'ອັງກີດ', 'English', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblroom`
--

CREATE TABLE `tblroom` (
  `itemid` int(10) NOT NULL,
  `itemname` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(550) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblroom`
--

INSERT INTO `tblroom` (`itemid`, `itemname`, `details`, `img`) VALUES
(1, 'room1', 'sdsfsdgdfgfgh', 'images (1).jfif  '),
(2, 'room2', 'fgfhfhgjh sdsfsfdfgdg', 'g1.jpg  ');

-- --------------------------------------------------------

--
-- Table structure for table `tblroomimg`
--

CREATE TABLE `tblroomimg` (
  `roomid` int(10) NOT NULL,
  `imagename` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `autoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblroomimg`
--

INSERT INTO `tblroomimg` (`roomid`, `imagename`, `autoid`) VALUES
(1, 'images (1).jfif  ', 1),
(1, 'images.jfif  ', 2),
(2, 'g1.jpg  ', 4),
(2, 'images.jfif  ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userid` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `statusid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userid`, `username`, `pwd`, `statusid`) VALUES
(1, 'admin', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `name`) VALUES
(17, '1.jpg'),
(18, '2021091611548-PNOTKS100001.jpg'),
(19, '2021091611548-PNOTKS100001.jpg'),
(20, '4gnsjowvc7gtn567ep1sib.jpg'),
(21, 'default_user.png'),
(22, 'WhatsApp Image 2021-06-10 at 08.25.32.jpeg'),
(23, 'SF logo-01.png'),
(24, 'last.jfif'),
(25, '238830605_356696722757668_4300267124786445011_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbguesthouseimg`
--
ALTER TABLE `tbguesthouseimg`
  ADD PRIMARY KEY (`autoid`);

--
-- Indexes for table `tblhotel`
--
ALTER TABLE `tblhotel`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `tblhouseimg`
--
ALTER TABLE `tblhouseimg`
  ADD PRIMARY KEY (`autoid`);

--
-- Indexes for table `tblroomimg`
--
ALTER TABLE `tblroomimg`
  ADD PRIMARY KEY (`autoid`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbguesthouseimg`
--
ALTER TABLE `tbguesthouseimg`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tblhouseimg`
--
ALTER TABLE `tblhouseimg`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblroomimg`
--
ALTER TABLE `tblroomimg`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
