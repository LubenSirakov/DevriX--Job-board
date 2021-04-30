-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 12:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joblister`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `job_description` varchar(1000) NOT NULL,
  `company` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `job_description`, `company`, `salary`) VALUES
(1, 'Front End Developer', 'Our band of superheroes are looking for a self-driven, highly organised individual who will join the team in creating our most important products.\r\n\r\nLocation is unimportant, as long as you are available, enthusiastic, committed, passionate, and know your stuff.\r\n\r\nFor this role, we need a superhero who will take on the challenges of working in one of the leading WordPress companies, enhancing our website, products, and services, backed by a quality team of pros.\r\n\r\nResponsibilities\r\nYou’ll be part of a development team working on our flagship products. It’s going to be epic!', 'Company Awesome Ltd. ', '3000 - 4000'),
(2, 'Back End Developer', 'Job Description', 'Company Awesome Ltd. 2021', '3000 - 4000'),
(13, 'PHP Internship', 'This project would be a simple job board project listing website similar to jobs.bg, but a simplified version, of course. The project would have a landing page listing all jobs, simple admin area for editing jobs submissions.', 'Devrix', '1500 - 2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
