-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2017 at 12:10 PM
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
(10, 'Irene', 'Munene', 85963214, '0720256897');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- Database: `kawa_chama_group`


CREATE TABLE savings (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  member_id INT references members(id),
  amount_saved VARCHAR(30) NOT NULL,
  extra_savings VARCHAR(30) NOT NULL,
  date_paid DATE ,
  date_recorded TIMESTAMP
);

ALTER TABLE members ENGINE=InnoDB;

CREATE TABLE Orders (
    OrderID int NOT NULL,
    OrderNumber int NOT NULL,
    PersonID int,
    PRIMARY KEY (OrderID),
    CONSTRAINT FK_PersonOrder FOREIGN KEY (PersonID)
    REFERENCES Persons(PersonID)
);