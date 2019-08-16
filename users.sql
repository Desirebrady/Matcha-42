-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2019 at 06:00 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matcha`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(100) NOT NULL DEFAULT 'eg Alex',
  `lastname` varchar(100) DEFAULT 'eg Hook',
  `age` int(11) NOT NULL DEFAULT '0',
  `gender` varchar(100) NOT NULL DEFAULT 'Unknown',
  `bio` varchar(100) NOT NULL DEFAULT 'eg Hi i love romcom and Horror',
  `profile_pic` varchar(100) NOT NULL DEFAULT 'defualt.jpeg',
  `location` varchar(100) NOT NULL DEFAULT 'Earth',
  `lat` float NOT NULL DEFAULT '0',
  `lon` float NOT NULL DEFAULT '0',
  `fame` int(11) NOT NULL DEFAULT '0',
  `lastseen` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tag1` varchar(100) NOT NULL DEFAULT 'Unknown',
  `tag2` varchar(100) NOT NULL DEFAULT 'Unknown',
  `tag3` varchar(100) NOT NULL DEFAULT 'Unknown',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `online` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `token`, `password`, `firstname`, `lastname`, `age`, `gender`, `bio`, `profile_pic`, `location`, `lat`, `lon`, `fame`, `lastseen`, `tag1`, `tag2`, `tag3`, `verified`, `online`) VALUES
(1, 'Bradsyee', 'xivikamin@voemail.com', '2fab403a510cc1dde7f830040ba85c36f8b583a14b7c36598ca0cac0a4b658525d8ce281bc40229381dbf922e104642c1fbb', '$2y$10$WQvCy9evdrqFFE0Wdch.POK7YwUMGQQMbABihloPMhHEKFC4S5ExW', 'Bradsyee', 'Brad', 20, 'Male', 'heya ', '654.jpg', 'Gauteng', -26.2167, 28.25, 15, '2019-06-24 09:39:17', 'Music', 'food', 'game', 1, 0),
(3, 'Anna', 'dshumba@2emailock.com', 'f190c138a9409f0632840fda23d2a26ba657c190bb84a97fe0c67c43cf6fd4a8440d43b993ea0a0f1139618b6298675f8cf9', '$2y$10$oEaubwGcaX2DS.q2OIzACOTreu9q0fAvr.U14pvcoKFWBuvckkfQ2', 'Anna', 'Anne', 18, 'Female', 'hy', 'lee.png', 'Gauteng', -26.2167, 28.25, 20, '2019-06-24 09:48:12', 'Music', 'food', 'game', 1, 0),
(4, 'justine', 'pumafeg@five-club.com', '68bab286d2a994aa7efe20cddae8946fe6651949dfc03557731f9f71a61ac1f66b4f9c3a391362177aacba641395b0cf8448', '$2y$10$KCvACi.wwWQtQdW5X2OLZ.fPv.HX9M63Ii.Svc.dKZhq6uD6RJ9LC', 'Just', 'boyer', 23, 'Female', 'hey heya', 'defualt.jpeg', 'Gauteng', -26.2167, 28.25, 5, '2019-08-16 11:31:11', 'food', 'food', 'food', 1, 0),
(10, 'gab', 'dshumba@vimail24.com', '13061f73987b3ba9d838968809b63f8feeeed11b07a33ec64a408e2ea38f432de68c14a9762de3dca2bc13a699754e91963a', '$2y$10$O./dhkBdqn7MS/Wakzz.fOTQmbCanZNc32LNhVkF/bvlTgobJbjBC', 'eg Alex', 'eg Hook', 0, 'Unknown', 'eg Hi i love romcom and Horror', 'defualt.jpeg', 'Earth', 0, 0, 0, '2019-08-16 13:58:33', 'Unknown', 'Unknown', 'Unknown', 1, 0),
(11, 'Njabulo', 'njabulo@vimail24.com', '67ce7708ee6c72628bb231392ecec658cb9c12f780db2c43308053d1841378974fb4f28552b35c7d9f293fc0e912cde6918e', '$2y$10$2/ROlzmR3fZcyikaFYbMaO4WAslKNdUwINuQIfu30iSZSJYpWmR/S', 'NJabulo', 'blh', 21, 'Male', 'kjshdjdb sd uskdks dhskd', '50993735.jpg', 'Gauteng', -26.2167, 28.25, 0, '2019-08-16 14:41:32', 'Music', 'porn', 'food', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
