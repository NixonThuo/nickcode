-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 12:05 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kawa_chama_group`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `id_number` int(100) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `second_name`, `id_number`, `mobile`) VALUES
(1, 'Nixon', 'Thuo', 12345, '23356765'),
(2, 'Richard', 'Murimi', 314587, '0720256897'),
(3, 'John', 'Ndungu', 789632, '0720256897'),
(5, 'heze', 'wanjo', 12589963, '0720256897'),
(6, 'Samuel', 'Wanyoike', 88996625, '0720256897'),
(7, 'Janet', 'Mbugua', 78963245, '0720256897'),
(8, 'Carol', 'Maina', 52147896, '0720256897'),
(10, 'Irene', 'Munene', 85963214, '0720256897'),
(11, 'Munene', 'Munene', 2147483647, '0754896325'),
(12, 'Charles', 'jomo', 2569847, '0754896325'),
(13, 'Gavid', 'Owino', 2147483647, '0754896325');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `amount_saved` varchar(30) NOT NULL,
  `extra_savings` varchar(30) NOT NULL,
  `date_paid` date DEFAULT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `member_id`, `amount_saved`, `extra_savings`, `date_paid`, `date_recorded`) VALUES
(1, NULL, '344', '200', '2017-06-30', '2017-06-30 05:52:42'),
(2, NULL, '344', '200', '2017-06-30', '2017-06-30 06:27:12'),
(3, 7, '344', '200', '2017-06-30', '2017-06-30 06:37:56'),
(4, 1, '1000', '200', '2017-06-03', '2017-06-30 06:39:07'),
(5, 5, '700', '300', '2017-06-30', '2017-06-30 07:38:39'),
(6, 3, '700', '1300', '2017-06-01', '2017-06-30 07:39:53'),
(7, 3, '700', '50', '2017-06-30', '2017-06-30 07:44:59'),
(8, 8, '700', '1', '2017-06-30', '2017-06-30 07:48:04'),
(9, 2, '700', '100', '2017-06-30', '2017-06-30 07:59:45'),
(10, 2, '700', '1300', '2017-06-30', '2017-06-30 08:11:29'),
(11, 6, '700', '1', '2017-06-30', '2017-06-30 09:11:59'),
(12, 2, '700', '0', '2017-06-30', '2017-06-30 09:20:43'),
(13, 7, '700', '0', '2017-06-30', '2017-06-30 09:20:57'),
(14, 8, '700', '0', '2017-06-30', '2017-06-30 09:24:03'),
(15, 7, '700', '0', '2017-06-30', '2017-06-30 09:24:40'),
(16, 3, '700', '300', '2017-06-30', '2017-06-30 09:24:50'),
(17, 2, '700', '0', '2017-06-30', '2017-06-30 09:25:10'),
(18, 1, '700', '2300', '2017-06-30', '2017-06-30 09:25:22'),
(19, 10, '700', '100', '2017-06-30', '2017-06-30 10:21:16'),
(20, 1, '700', '0', '2017-06-30', '2017-06-30 11:26:28'),
(21, 10, '700', '0', '2017-06-30', '2017-06-30 13:20:17'),
(22, 10, '700', '0', '2017-07-01', '2017-07-01 06:22:13'),
(23, 10, '700', '300', '2017-07-01', '2017-07-01 06:22:39'),
(24, 5, '700', '300', '2017-07-01', '2017-07-01 06:27:08'),
(25, 11, '700', '150', '2017-07-01', '2017-07-01 07:05:05'),
(26, 12, '700', '300', '2017-07-02', '2017-07-02 09:13:54'),
(27, 13, '700', '800', '2017-07-02', '2017-07-02 09:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `clerkID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`clerkID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(3, 'clerk', '$2y$10$GOjOpAVFnKL5LiK9vhmcvOi4IsYGQ1.md7WwBPWGwYqyLhEdM6Hwe', 'clerk@gmail.com', 'Yes', NULL, 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`clerkID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `clerkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `savings`
--
ALTER TABLE `savings`
  ADD CONSTRAINT `savings_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
