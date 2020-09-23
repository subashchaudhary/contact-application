-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 09:36 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(20) NOT NULL,
  `accountname` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `accountname`, `name`, `address`, `phone`, `email`, `photo`) VALUES
(1, 'subash', 'surendra somai', 'rupendehi', '9814487688', 'surendrasomai@gmail.com', 'Best-Inspirational-Quotes-Thoughtful-Quotes-365-Days-Of-Tumblr-4.jpg'),
(2, 'subash', 'prem tharu', 'parasi, nawalparasi', '9815122050', 'prem@gmail.com', '150837_146261582198103_1170926189_n - Copy.jpg'),
(4, 'subash', 'birendra gurung', 'butwal,sukkhanagar', '96687778', 'birendragurung@yahoo.com', ''),
(5, 'subash', 'aditya', 'nawalparasi', '9814429787', 'uniqueboyaditya@gmail.com', 'DSC08435.JPG'),
(6, 'suresh', 'rajan chaudhary', 'parasi', '8688787', 'rajan@gmail.com', '10566417_1510536822516166_1298159497_n.jpg'),
(7, 'suresh', 'sagar thapa', 'butwal', '07699878', 'sagarthapa12@gmail.com', ''),
(8, 'suresh', 'Aasish Chaudhary', 'parasi, nawalparasi', '123141414141', 'aasish@gmail.com', ''),
(9, 'mahesh', 'Akhil trivedi', 'anjananagar', '0977979867', 'akhildivedi@gmail.com', ''),
(10, 'subash', 'roshan sharma', 'banglore', '9877543567', 'roshansharma@gmail.com', 'blah.jpg'),
(11, 'subash', 'sachin singh', 'banglore', '9876543219', 'sachinkumarsingh.bng@gmai.com', 'blah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `username`, `images`) VALUES
(1, 'subash', '003.jpg'),
(2, 'subash', '004.jpg'),
(3, 'subash\r\n', 'img1.jpg\r\n'),
(4, 'subash', 'img2.png'),
(5, 'subash', 'prem.jpg'),
(0, 'subash', '10411599-boy-sticking-out-his-tongue-on-a-white-background-Stock-Photo-child.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(1, 'subash tharu', 'subash', 'smartysubash11@gmail.com', 'subash'),
(3, 'suresh', 'suresh', 'suresh@gmail.com', 'suresh'),
(4, 'roshan sharma', 'roshan ', 'roshansharma@gmail.com', 'roshan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
