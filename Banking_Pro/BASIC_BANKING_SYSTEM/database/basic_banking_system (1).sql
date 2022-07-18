-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 01:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basic_banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `bal`) VALUES
(1, 'Pranoy Patra', 'pranoypatra1171999@gmail.com', 17000),
(2, 'Rohit Sharma', 'rohit123@gmail.com', 9000),
(3, 'Priyanshu Yadav', 'priyanshujdv132@gmail.com', 5700),
(4, 'Rajkumar Singha', 'rksingh2341@gmail.com', 4300),
(5, 'Kaushik Gupta', 'kgupta5222@gmail.com', 21000),
(6, 'Sudip Banarjee', 'rockstarsudip123@gmail.com', 36000),
(7, 'Priya Sukla', 'suklapriya1778@gmail.com', 6000),
(8, 'Susmita Saha', 'sahasusmita12456@gmail.com', 3000),
(9, 'Rajdeep Khan', 'rajdeepkhan2323@gmail.com', 5000),
(10, 'Probodh Sarkar', 'psarkar5674@gmail.com', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `no` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`no`, `s_id`, `r_id`, `amount`, `time`) VALUES
(1, 1, 2, 1000, '2022-06-11 21:16:30'),
(2, 2, 3, 10000, '2022-06-11 21:16:31'),
(3, 3, 1, 1200, '2022-06-11 21:16:32'),
(4, 4, 3, 900, '2022-06-11 21:16:33'),
(5, 5, 10, 11500, '2022-06-11 21:16:37'),
(6, 6, 10, 12750, '2022-06-11 21:16:40'),
(10, 2, 1, 1000, '2022-06-13 16:09:10'),
(11, 2, 1, 2000, '2022-06-13 16:17:40'),
(12, 5, 1, 1000, '2022-06-13 16:20:12'),
(13, 6, 1, 1000, '2022-06-13 16:21:48'),
(14, 6, 3, 2000, '2022-06-13 16:22:33'),
(15, 3, 4, 2300, '2022-06-16 02:08:21'),
(16, 3, 5, 1000, '2022-06-16 02:18:35'),
(17, 3, 4, 1000, '2022-06-16 02:27:05'),
(18, 6, 5, 1000, '2022-06-16 02:44:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`no`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `s_id` (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `transfers_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
