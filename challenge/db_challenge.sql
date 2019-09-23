-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 04:56 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_challenge`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE `tbl_album` (
  `ab_id` int(11) NOT NULL,
  `ab_title` varchar(200) NOT NULL,
  `ab_des` longtext NOT NULL,
  `ab_status` int(3) NOT NULL DEFAULT '1' COMMENT '0=not,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`ab_id`, `ab_title`, `ab_des`, `ab_status`) VALUES
(1, 'Album 1', 'Malayalam Movie Actors', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1' COMMENT '0=not,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `username`, `password`, `user_type`, `status`) VALUES
(1, 'admin', 'd52fe16e040eb94bb25bb9d594f1154c11d9d954', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medias`
--

CREATE TABLE `tbl_medias` (
  `id` int(15) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `type` varchar(5) NOT NULL,
  `file` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_medias`
--

INSERT INTO `tbl_medias` (`id`, `ref`, `ref_id`, `type`, `file`, `title`) VALUES
(1, 'album', 1, 'image', '156536116514699.jpg', 'Album 1'),
(2, 'gallery', 1, 'image', '156536116573797.jpg', 'Album 1'),
(3, 'gallery', 1, 'image', '156536116528470.jpg', 'Album 1'),
(4, 'gallery', 1, 'image', '156536116581438.jpg', 'Album 1'),
(5, 'gallery', 1, 'image', '156536116576651.jpg', 'Album 1'),
(6, 'gallery', 1, 'image', '156536116582180.jpg', 'Album 1'),
(7, 'gallery', 1, 'image', '156536116525295.jpg', 'Album 1'),
(8, 'gallery', 1, 'image', '156536116555983.jpg', 'Album 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_medias`
--
ALTER TABLE `tbl_medias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_medias`
--
ALTER TABLE `tbl_medias`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
