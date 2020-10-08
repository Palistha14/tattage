-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 03:27 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tattoo_heritage`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` int(11) NOT NULL,
  `b_date` date NOT NULL,
  `b_design` varchar(500) NOT NULL,
  `b_time` int(10) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `e_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `b_date`, `b_design`, `b_time`, `c_id`, `d_id`, `e_id`) VALUES
(1, '2019-08-10', 'watch.jpg', 9, 3, NULL, 2),
(19, '2019-08-15', 'swayambhunath.jpg', 20, 3, NULL, 1),
(22, '2019-08-22', 'rose.jpg', 15, 4, NULL, 2),
(23, '2019-08-25', '', 12, 3, 8, 2),
(25, '2019-08-29', '', 20, 4, 14, 2),
(26, '2019-08-31', 'actor.png', 9, 1, NULL, 1),
(27, '2019-08-31', 'o.gif', 15, 1, NULL, 2),
(29, '2019-09-01', 'gg.jpg', 17, 1, NULL, 3),
(36, '2019-09-02', '', 12, 5, 4, 1),
(37, '2019-09-12', 'fourth.jpg', 16, 4, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `co_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`co_id`, `name`, `phone`, `email`, `message`) VALUES
(5, '', '', '', ''),
(6, '', '', '', ''),
(7, 'zv', '9841235689', 'caroze20@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_fname` varchar(30) NOT NULL,
  `c_lname` varchar(30) NOT NULL,
  `c_age` int(11) DEFAULT NULL,
  `c_address` varchar(30) DEFAULT NULL,
  `c_phone` varchar(30) DEFAULT NULL,
  `c_gender` varchar(30) DEFAULT NULL,
  `c_email` varchar(30) DEFAULT NULL,
  `c_username` varchar(30) DEFAULT NULL,
  `c_password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_fname`, `c_lname`, `c_age`, `c_address`, `c_phone`, `c_gender`, `c_email`, `c_username`, `c_password`) VALUES
(1, 'ram', 'bahadur', 25, 'kohity', '9841111111', 'Male', 'ram@gmail.com', 'ram25', '111111'),
(2, 'shyam', 'gopal', 25, 'teku', '9841222222', 'Male', 'shyam@gmail.com', 'shyam25', '22222'),
(3, 'siya', 'ram', 36, 'teku', '9841333333', 'Female', 'siyaram@gmail.com', 'siyaram36', '333333'),
(4, 'tina', 'raichan', 22, 'patna', '9843444444', 'Female', 'tinchan@gmail.com', 'tina22', '444444'),
(5, 'kartik', 'singh', 27, 'mumbai', '9860555555', 'Male', 'kartiks@gmail.com', 'kartik27', '555555');

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(30) NOT NULL,
  `d_photo` varchar(500) NOT NULL,
  `e_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`d_id`, `d_name`, `d_photo`, `e_id`) VALUES
(1, 'Kali Tattoo', 'design/kali.jpg', 1),
(2, 'Buddha tattoo', 'design/buddha.jpg', 1),
(3, 'Bajra Tattoo', 'design/bajra.jpg', 3),
(4, 'Diamond Tattoo', 'design/diamond.jpg', 3),
(5, 'Endless Knot', 'design/endlessknot.jpg', 3),
(6, 'Lion Tattoo', 'design/liontattoo.jpg', 2),
(7, 'Phoenix Tattoo', 'design/phoenix.jpg', 3),
(8, 'Pinkfloyd Tattoo', 'design/pinkfloyd.jpg', 2),
(9, 'Portrait Tattoo', 'design/portrait.jpg', 1),
(10, 'Portrait Tattoo', 'design/portrait1.jpg', 1),
(11, 'ShakyaMuni ', 'design/shakyamuni.jpg', 2),
(12, 'Tiger Tattoo', 'design/tiger.jpg', 3),
(13, 'Temple Tattoo', 'design/temple.jpg', 1),
(14, 'Lotus Tattoo', 'design/second.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_message` varchar(400) NOT NULL,
  `f_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_message`, `f_email`) VALUES
(1, 'asdaf', 'gopal@gmail.com'),
(8, 'easy for booking', 'caroze@gmail.com'),
(9, 'good', 'cara@gmail.com'),
(10, 'nice', 'hari@gmail.com'),
(11, 'add more attractive things so that people wants to visit ', 'radhashyam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tattoo_artist`
--

CREATE TABLE `tattoo_artist` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(40) NOT NULL,
  `e_phone` varchar(15) NOT NULL,
  `e_email` varchar(40) NOT NULL,
  `e_photo` varchar(500) NOT NULL,
  `e_username` varchar(40) NOT NULL,
  `e_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tattoo_artist`
--

INSERT INTO `tattoo_artist` (`e_id`, `e_name`, `e_phone`, `e_email`, `e_photo`, `e_username`, `e_password`) VALUES
(1, 'Aviseq Shakya', '9841124452', 'aviseqshakya@gmail.com', 'artist/aviseq.jpg', 'aviseq12', 'aviseq12'),
(2, 'Bikki Deshar', '9841230015', 'bekeymaggot@gmail.com', 'artist/bikki.jpg', 'bikki45', 'bikki45'),
(3, 'Rujen Shakya', '9843206142', 'shakyarujen0@gmail.com', 'artist/rujen.jpg', 'rujen20', 'rujen20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tattoo_artist`
--
ALTER TABLE `tattoo_artist`
  ADD PRIMARY KEY (`e_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tattoo_artist`
--
ALTER TABLE `tattoo_artist`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
