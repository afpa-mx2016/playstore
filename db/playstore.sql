-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2016 at 10:04 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `description` text,
  `picture` varchar(256) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `name`, `description`, `picture`, `user_id`) VALUES
(1, 'metal', 'truc qui va bien', 'metal.png', 1),
(2, 'dark ambient', 'truc qui va bien aussi', 'dark_ambient.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `playlist_track`
--

CREATE TABLE `playlist_track` (
  `playlist_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL,
  `order` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `playlist_track`
--

INSERT INTO `playlist_track` (`playlist_id`, `track_id`, `order`) VALUES
(1, 1, NULL),
(1, 3, NULL),
(1, 15, NULL),
(1, 25, NULL),
(2, 1, NULL),
(2, 2, NULL),
(2, 3, NULL),
(2, 10, NULL),
(2, 11, NULL),
(2, 15, NULL),
(2, 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `title` text NOT NULL,
  `duration` int(3) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `author` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`title`, `duration`, `id`, `author`) VALUES
('kikou des bois', 125, 1, 'Toto'),
('ma track 2 le retour', 120, 2, 'Toto des zozos'),
('kikou track', 125, 3, 'zozo des troupaillons888'),
('kikou des loulous', 125, 10, 'Alouater Zozo zouiiii'),
('zonote', 125, 11, 'kikakou'),
('zozozo', 122, 15, 'talui'),
('ff', 152, 22, 'dddd8888'),
('zozoz', 125, 26, 'kikou des iles');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `passwd`, `email`) VALUES
(1, 'lio', '$2y$10$f.2KCpzctju2/eHHSIthTeXHysN7gYaQ3ZCFG6w2hwzur0EaIk41S', 'fake@fake.com'),
(2, 'admin', '$2y$10$rkNXCruCMbf.hXHlrbbX5u0s4wOwOmA4Hptx.BlCYLO5O7Hu4YdNq', 'fake@fake.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_userid` (`user_id`);

--
-- Indexes for table `playlist_track`
--
ALTER TABLE `playlist_track`
  ADD PRIMARY KEY (`playlist_id`,`track_id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
