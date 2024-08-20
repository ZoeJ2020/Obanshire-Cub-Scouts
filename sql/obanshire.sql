-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 31, 2023 at 06:27 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obanshire`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `brief` varchar(20) NOT NULL,
  `equipment` varchar(200) NOT NULL,
  `instructions` varchar(300) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `title`, `brief`, `equipment`, `instructions`, `published`) VALUES
(9, 'Making a Campfire', 'Step-by-step guide', 'Firewood, matches', 'Stack the firewood ontop of one another and light a match. Carefully place the match within the firewood and keep a safe distance. Soon the firewood should burn and a campfire is made!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `fk_ava_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `description`, `fk_ava_user_id`) VALUES
(14, 'sdsdg', 49);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(132) NOT NULL,
  `blog_content` varchar(644) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog_content`, `created_on`, `published`) VALUES
(31, 'Obanshire Camping Trip: Applications Now Open!', '            Applications are now open for the annual Obanshire Cub Scouts camping trip!\r\n\r\nThe annual Obanshire camping trip takes place over a week starting Saturday 20th May.\r\n\r\nThroughout the trip, scouts will be taken through Obanshire’s beautiful scenic forests, learning wildlife survival techniques and discovering the wonders of nature.\r\n\r\nThis trip is for Cubs-level cub scouts and below (4-10yo). You can register to be a part of the event via our Upcoming Events.\r\n\r\nSpaces are limited, so register early to avoid disappointment.            ', '2023-05-30 19:54:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `disclosure`
--

CREATE TABLE `disclosure` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `fk_dis_user_id` int(11) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(30) NOT NULL,
  `requirements` varchar(200) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `date`, `location`, `requirements`, `published`) VALUES
(5, 'Scouts Camping Trip', '2023-06-30', 'Obanshire Cub Scouts Centre', 'Change of clothes, food, water, map', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `date_uploaded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_name` varchar(100) NOT NULL,
  `fk_gallery_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `date_uploaded`, `file_name`, `fk_gallery_user_id`) VALUES
(16, '2023-05-30 21:15:32', 'group-map.png', 47),
(17, '2023-05-30 21:16:05', 'quote-brian.png', 47),
(18, '2023-05-30 21:16:11', 'group-map.png', 47);

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `id` int(11) NOT NULL,
  `fk_reg_event_id` int(11) NOT NULL,
  `fk_reg_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(264) NOT NULL,
  `type` varchar(11) NOT NULL,
  `phone1` int(20) DEFAULT NULL,
  `phone2` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `phone1`, `phone2`) VALUES
(47, 'staff', '$2y$10$kcTPn6U6uqIRqP/k4PmpQewfcLbsGAerAdG1CsNDTjW3qQq8IRaEa', 'staff', NULL, NULL),
(48, 'Johnny', '$2y$10$aRduFZndsXWB0EuqfDkPcOKh2Aq4op.CdVCYLbc7iumqimF10PD6i', 'learner', 0, 0),
(49, 'JohnnyMother', '$2y$10$m6rL5jNGCDtzNkIIEB7VtOLdrAh4zRL5V9/w658kBkFyZG3KTCt5m', 'parent', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ava_user_id` (`fk_ava_user_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disclosure`
--
ALTER TABLE `disclosure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dis_user_id` (`fk_dis_user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_album_poster_id` (`fk_gallery_user_id`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reg_event_id` (`fk_reg_event_id`),
  ADD KEY `fk_reg_user_id` (`fk_reg_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `disclosure`
--
ALTER TABLE `disclosure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `registered`
--
ALTER TABLE `registered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `fk_ava_user_id` FOREIGN KEY (`fk_ava_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `disclosure`
--
ALTER TABLE `disclosure`
  ADD CONSTRAINT `fk_dis_user_id` FOREIGN KEY (`fk_dis_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_album_poster_id` FOREIGN KEY (`fk_gallery_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `registered`
--
ALTER TABLE `registered`
  ADD CONSTRAINT `fk_reg_event_id` FOREIGN KEY (`fk_reg_event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `fk_reg_user_id` FOREIGN KEY (`fk_reg_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
