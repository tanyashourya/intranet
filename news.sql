-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 08:28 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cli`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(100) NOT NULL,
  `time` datetime NOT NULL,
  `headline` mediumtext NOT NULL,
  `news` mediumtext NOT NULL,
  `user_name` mediumtext NOT NULL,
  `image` varchar(50000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `time`, `headline`, `news`, `user_name`, `image`) VALUES
(4, '2017-05-24 12:18:07', 'csdmcs,', 'mcksdcmksd					', 'xyz', ''),
(5, '2017-05-24 12:18:47', 'headline1', '					ndknvksdn', 'xyz', ''),
(6, '2017-05-29 10:34:40', 'headline1', '					hello world!', 'admin', ''),
(7, '2017-05-29 10:36:23', 'headline10', '					hello world!!', 'admin', ''),
(8, '2017-05-29 10:37:52', 'headline10', '					hello world!!', 'admin', ''),
(9, '2017-06-02 11:07:18', 'image news', '					', 'xyz', ''),
(10, '2017-06-02 11:10:30', 'jkdj', '					', 'xyz', ''),
(11, '2017-06-02 11:13:50', 'jkdj', '					', 'xyz', ''),
(12, '2017-06-02 11:17:06', 'dk', '					', 'xyz', 'bg.png'),
(13, '2017-06-02 11:50:20', 'hxnk', '					', 'xyz', 'bg3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
