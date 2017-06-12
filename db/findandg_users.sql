-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2017 at 02:35 AM
-- Server version: 10.0.30-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findandg_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id`               INT(11)     NOT NULL,
  `name`             VARCHAR(50) NOT NULL,
  `email`            VARCHAR(50) NOT NULL,
  `phone_number`     VARCHAR(10) NOT NULL,
  `gender`           VARCHAR(6)  NOT NULL,
  `image_url`        VARCHAR(200)         DEFAULT '0',
  `user_latitude`    VARCHAR(50) NOT NULL DEFAULT '0',
  `user_longitude`   VARCHAR(50) NOT NULL DEFAULT '0',
  `phone_visibility` TINYINT(1)           DEFAULT '0'
)
  ENGINE = MyISAM
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `phone_number`, `gender`, `image_url`, `user_latitude`, `user_longitude`, `phone_visibility`)
VALUES
  (1, 'Gaurav Bordoloi', 'gmonetix@gmail.com', '7478870112', 'MALE',
   'http://www.findandgo.in/server/profile/7478870112.png', '26.0242079', '89.9744921', 1),
  (2, 'Bela Rani Bordoloi', 'belabordoloi@gmail.com', '8486900180', 'FEMALE', 'http://www.findandgo.in/server/profile/8486900180.png', '26.255333', '92.737044', 1),
  (3, 'subham kumar', 'subhamkr@gmail.com', '8404017253', 'MALE', 'http://www.findandgo.in/server/profile/8404017253.png', '26.458005', '91.455652', 0),
  (4, 'Manish Kumar', 'mnsh.kumr7@gmail.com', '7547041092', 'MALE', 'http://www.findandgo.in/server/profile/7547041092.png', '26.258235', '91.695563', 1),
  (5, 'Shekhar Sharma', 'shekhar@gmail.com', '7896541230', 'MALE', '0', '23.412953', '87.523428', 1),
  (6, 'Aniket Dhar', 'aniketdhar@gmail.com', '4563210789', 'FEMALE', '0', '24.215456', '87.557916', 0),
  (7, 'Bijit Das', 'beatjit@gmail.com', '7475362102', 'MALE', '0', '26.085831', '89.918822', 0),
  (8, 'AKash Ghosh', 'akash@gmail.com', '1563240159', 'MALE', '0', '26.149918', '89.811606', 0),
  (9, 'Ronojit DAs', 'rono@fucker.com', '8401593246', 'MALE', '0', '26.178615', '90.080370', 0),
  (10, 'Naveen Prasasd', 'naveen@gmail.com', '7478512364', 'MALE', '0', '25.242147', '86.638776', 0),
  (11, 'KAKHLARI MISRA', 'misra@misra.com', '1254632513', 'MALE', '0', '26.417576', '90.168192', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`, `phone_number`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 12;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
