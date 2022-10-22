-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 08:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adarsha hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(55) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`, `email`, `reg_date`, `updationdate`) VALUES
(1, 'admin', 'Admin@12345', 'admin20@gmail.com', '2020-03-17 05:52:40', '2020-03-17 05:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ID` int(225) NOT NULL,
  `username` varchar(35) NOT NULL,
  `u_comp` varchar(500) NOT NULL,
  `Posting_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`ID`, `username`, `u_comp`, `Posting_time`) VALUES
(1, 'tharun reddy', 'The fan in my room no. 101 is not working.', '2020-02-21 08:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `uemail` varchar(60) NOT NULL,
  `uph` varchar(10) NOT NULL,
  `umessage` varchar(400) NOT NULL,
  `posting_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `uname`, `uemail`, `uph`, `umessage`, `posting_time`) VALUES
(1, 'jagan', 'jagan@gmail.com', '7657332567', 'How can I join your hostel?', '2020-03-07 13:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `review` varchar(500) CHARACTER SET latin1 NOT NULL,
  `posting_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `review`, `posting_time`) VALUES
(10, 'the hostels environment will help ht ecjildern have a good grow', '2020-03-09 15:49:38'),
(18, 'the hostel is very good', '2020-03-09 16:13:46'),
(24, 'The Hostel is situated in a very good place.', '2020-04-28 06:47:56'),
(25, 'hi there the infrastructure of the hostel and ideas implemneted r very good.', '2020-04-28 06:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(255) NOT NULL,
  `seater` int(11) DEFAULT NULL,
  `room_no` int(255) DEFAULT NULL,
  `fees` varchar(8) DEFAULT NULL,
  `posting_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `posting_time`) VALUES
(1, 2, 100, '8000', '2020-03-05 12:10:48'),
(3, 3, 101, '7000', '2020-04-05 08:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `room_registration`
--

CREATE TABLE `room_registration` (
  `id` int(11) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `roomno` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `feespm` int(11) NOT NULL,
  `stayfrom` date NOT NULL,
  `duration` int(11) NOT NULL,
  `t_amount` int(11) NOT NULL,
  `posting_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_registration`
--

INSERT INTO `room_registration` (`id`, `uname`, `roomno`, `seater`, `feespm`, `stayfrom`, `duration`, `t_amount`, `posting_time`) VALUES
(1, 'tharun reddy', 101, 3, 7000, '2020-03-17', 12, 84000, '2020-03-06 14:39:32'),
(2, 'nizam', 101, 3, 7000, '2020-03-11', 10, 70000, '2020-03-06 14:40:38'),
(3, 'surya', 101, 3, 7000, '2020-02-28', 10, 70000, '2020-06-08 16:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `useraccess_log`
--

CREATE TABLE `useraccess_log` (
  `ID` int(225) NOT NULL,
  `uname` varchar(35) NOT NULL,
  `loging_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccess_log`
--

INSERT INTO `useraccess_log` (`ID`, `uname`, `loging_time`) VALUES
(1, 'tharun reddy', '2020-02-21 08:31:52'),
(1, 'tharun reddy', '2020-02-21 08:32:48'),
(1, 'tharun reddy', '2020-02-21 08:53:11'),
(1, 'tharun reddy', '2020-02-21 08:55:17'),
(1, 'tharun reddy', '2020-02-21 11:59:25'),
(2, 'nizam', '2020-02-21 12:27:09'),
(2, 'nizam', '2020-02-21 12:29:24'),
(1, 'tharun reddy', '2020-02-21 16:50:16'),
(2, 'nizam', '2020-02-21 17:02:29'),
(2, 'nizam', '2020-02-22 04:49:49'),
(1, 'tharun reddy', '2020-02-22 06:14:12'),
(3, 'surya', '2020-02-22 16:49:39'),
(1, 'tharun reddy', '2020-02-22 17:16:04'),
(2, 'nizam', '2020-02-22 17:21:09'),
(1, 'tharun reddy', '2020-02-23 11:03:30'),
(2, 'nizam', '2020-03-05 11:42:39'),
(1, 'tharun reddy', '2020-03-06 13:29:41'),
(1, 'tharun reddy', '2020-03-06 14:41:50'),
(2, 'nizam', '2020-03-06 14:43:04'),
(2, 'nizam', '2020-03-06 17:41:53'),
(2, 'nizam', '2020-03-07 11:28:21'),
(2, 'nizam', '2020-03-09 05:53:17'),
(2, 'nizam', '2020-03-09 06:09:54'),
(2, 'nizam', '2020-03-11 06:58:48'),
(2, 'nizam', '2020-03-13 05:36:36'),
(2, 'nizam', '2020-03-17 05:09:06'),
(2, 'nizam', '2020-03-17 07:05:58'),
(2, 'nizam', '2020-04-05 08:58:58'),
(2, 'nizam', '2020-04-05 13:42:18'),
(1, 'tharun reddy', '2020-04-05 13:53:16'),
(2, 'nizam', '2020-04-07 12:30:04'),
(2, 'nizam', '2020-05-08 10:46:21'),
(2, 'nizam', '2020-05-22 06:33:24'),
(2, 'nizam', '2020-05-22 06:38:55'),
(2, 'nizam', '2020-05-22 08:43:25'),
(2, 'nizam', '2020-05-30 05:01:07'),
(2, 'nizam', '2020-05-30 06:03:44'),
(2, 'nizam', '2020-05-30 06:07:09'),
(2, 'nizam', '2020-06-01 10:01:09'),
(2, 'nizam', '2020-06-01 10:19:48'),
(2, 'nizam', '2020-06-01 10:30:39'),
(2, 'nizam', '2020-06-08 16:01:11'),
(3, 'surya', '2020-06-08 16:17:36'),
(3, 'surya', '2020-06-08 16:23:36'),
(2, 'nizam', '2020-06-08 16:25:06'),
(3, 'surya', '2020-06-08 16:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `ID` int(255) NOT NULL,
  `uname` varchar(35) NOT NULL,
  `ur_psw` varchar(12) NOT NULL,
  `ur_dob` date NOT NULL,
  `gender` varchar(8) NOT NULL,
  `ur_mail` varchar(55) NOT NULL,
  `u_ph` varchar(10) NOT NULL,
  `Fn` varchar(35) NOT NULL,
  `foc` varchar(35) NOT NULL,
  `fpho` varchar(10) NOT NULL,
  `Mn` varchar(35) NOT NULL,
  `moc` varchar(35) NOT NULL,
  `mpho` varchar(10) NOT NULL,
  `adres` varchar(280) NOT NULL,
  `sta` varchar(35) NOT NULL,
  `cty` varchar(35) NOT NULL,
  `pst` varchar(7) NOT NULL,
  `u_course` varchar(50) NOT NULL,
  `u_sem` int(11) NOT NULL,
  `u_admis` varchar(15) NOT NULL,
  `u_year` varchar(4) NOT NULL,
  `photo` varbinary(300) NOT NULL,
  `Registering_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `pswUpdationTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`ID`, `uname`, `ur_psw`, `ur_dob`, `gender`, `ur_mail`, `u_ph`, `Fn`, `foc`, `fpho`, `Mn`, `moc`, `mpho`, `adres`, `sta`, `cty`, `pst`, `u_course`, `u_sem`, `u_admis`, `u_year`, `photo`, `Registering_time`, `pswUpdationTime`) VALUES
(1, 'tharun reddy', '365cS17024', '2001-03-14', 'Male', 'tharun@gmail.com', '9380193702', 'test1', 'test00', '8799871915', 'test2', 'test001', '9121154547', '#3, 12th Cross, 1st Block, R.T. Nagar, Near BDA Complex, Bengaluru', 'Karnataka', 'Bengaluru', '560064', 'Computer Science', 6, '365cs17024', '2017', 0x75706c6f6164732f6272696467655f73756e5f6265616d735f6c696768745f6d6f726e696e675f72697665725f7061726b5f66616972795f74616c655f34383337365f31333636783736385f313538323339313733322e6a7067, '2020-02-22 17:15:32', '2020-03-06 13:41:30'),
(2, 'nizam', 'NizaM70261', '1998-05-24', 'Male', 'nizam@gmail.com', '8714655212', 'test21', 'test011', '8714854651', 'test34', 'test999', '9226561444', '#3, 12th Cross, 1st Block, R.T. Nagar, Near BDA Complex, Bengaluru, Karnataka 560032', 'Karnataka', 'Bengaluru', '560032', 'Computer Science', 6, '445jbj6465', '2016', 0x75706c6f6164732f666f6767795f6d6f726e696e675f6c616e6473636170655f322d3139323078313038305f313538323339323033372e6a7067, '2020-02-22 17:20:37', '2020-02-22 17:36:32'),
(3, 'surya', 'Surya5665', '1998-10-21', 'Male', 'surya56@gmail.com', '9857453678', 'father', 'business', '7836352622', 'mother', 'housewife', '9877362550', '#3, 12th Cross, 1st Block, R.T. Nagar, Near BDA Complex, Bengaluru, Karnataka 560032', 'Karnataka', 'Bangalore', '560032', 'Computer Science', 6, '235hwy3wes', '2016', 0x75706c6f6164732f73757279615f313539313633323337332e6a7067, '2020-06-08 16:06:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `username` (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`room_no`);

--
-- Indexes for table `room_registration`
--
ALTER TABLE `room_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomno` (`roomno`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD UNIQUE KEY `uname` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_registration`
--
ALTER TABLE `room_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
