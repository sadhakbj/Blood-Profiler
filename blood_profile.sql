-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2014 at 03:52 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:45";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blood_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `body` text NOT NULL,
  `postedby` varchar(50) NOT NULL,
  `posted_time` datetime NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `title`, `body`, `postedby`, `posted_time`) VALUES
(34, 'nitai', '<p>pri kjakajk</p>', 'sadhakbj', '0000-00-00 00:00:00'),
(37, 'This means that I am checking bootstrap', '<p>Okay I hope my bootstrap&nbsp;<strong>à¤µà¥‹à¤°à¥à¤•à¥à¤¸&nbsp;</strong></p>', 'sadhakbj', '0000-00-00 00:00:00'),
(39, 'Its my life', '<p>we all are free to check this things</p>\r\n<p>we all are free to check this things</p>\r\n<p>we all are free to check this things</p><p>we all are free to check this things</p><p>we all are free to check this things</p><p>we all are free to check this things</p><p>we all are free to check this things</p><p>we all are free to check this things</p>', 'sadhakbj', '0000-00-00 00:00:00'),
(40, 'RBC', '<p>RBC Red Blood Cells also known as RBC are very important part of blood.</p>', 'sadhakbj', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `circles`
--

CREATE TABLE IF NOT EXISTS `circles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` varchar(50) NOT NULL,
  `user2` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `circles`
--

INSERT INTO `circles` (`id`, `user1`, `user2`) VALUES
(1, 'sadhakbj', 'prayash'),
(3, 'prayash', 'sadhakbj');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(20) NOT NULL,
  `comment` text NOT NULL,
  `commented_by` varchar(30) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `comment`, `commented_by`) VALUES
(1, 3, 'The element associated with Aries is Fire. Think action, enthusiasm and a burning desire to play the game. Aries love physicality, so they won''t sit on the sidelines for long, if at all. They''ll jump into the fray full force and will contribute much in the process. Talk about eager beavers! Sure, some of their decisions may later prove to have been hasty, but you''ll never find an Aries who regretted taking a shot.The element associated with Aries is Fire. Think action, enthusiasm and a burning desire to play the game. Aries love physicality, so they won''t sit on the sidelines for long, if at all. They''ll jump into the fray full force and will contribute much in the process. Talk about eager beavers! Sure, some of their decisions may later prove to have been hasty, but you''ll never find an Aries who regretted taking a shot.The element associated with Aries is Fire. Think action, enthusiasm and a burning desire to play the game. Aries love physicality, so they won''t sit on the sidelines for long, if at all. They''ll jump into the fray full force and will contribute much in the process. Talk about eager beavers! Sure, some of their decisions may later prove to have been hasty, but you''ll never find an Aries who regretted taking a shot.', 'sadhakbj'),
(2, 3, '<p>ho ni&nbsp;</p>', 'sadhakbj'),
(3, 3, '<p><em><strong>THis is our trial</strong></em></p>', 'sadhakbj');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(60) NOT NULL,
  `event_description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_location` varchar(60) NOT NULL,
  `start_time` varchar(20) NOT NULL,
  `end_time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_description`, `event_date`, `event_location`, `start_time`, `end_time`) VALUES
(2, 'AIDs evaluation', '<p>Checking wheather the teachers and students have AIDS or not</p>\r\n<p><strong>Program will be organized at Kathmandu University</strong></p>', '2014-07-12', 'Kathmandu University', '11:15', '16:30'),
(3, 'Blood Donation Program', '<p><strong>Red Cross Society Organizes Blood Donation Program :</strong></p>\n<p><strong>one dayed program at&nbsp;</strong><em>Kathmandu university</em></p>\n<p><em>www.facebook.com/kuredcross</em></p>', '2014-07-17', 'Kathmandu University', '10:00', '05:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE IF NOT EXISTS `event_comments` (
  `comment_id` int(20) NOT NULL AUTO_INCREMENT,
  `event_id` int(20) NOT NULL,
  `comment` text NOT NULL,
  `commented_by` varchar(20) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `event_comments`
--

INSERT INTO `event_comments` (`comment_id`, `event_id`, `comment`, `commented_by`) VALUES
(1, 2, '<p>Its very important .. we must organize such programs</p>', 'sadhakbj'),
(2, 2, '<p>i will be there to volunteer</p>', 'sadhakbj');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `sender`, `receiver`) VALUES
(1, '<p>Can u please give the contact of Red Cross Society of Banepa ??</p>', 'sadhakbj', 'prayash'),
(2, '<p>thanks for that help</p>', 'sadhakbj', 'prayash'),
(3, '<p>O kaji saap</p>\r\n<p><strong>Voli chai blodd donation chare&nbsp;</strong></p>\r\n<p>aau hai timi pani</p>', 'sadhakbj', 'prayash'),
(4, '<p>La hai&nbsp;</p>\r\n<p><strong>Voli dinu blood</strong></p>', 'sadhakbj', 'prayash'),
(11, '<p>yes</p>', 'sadhakbj', 'prayash'),
(12, '<p>yes</p>', 'sadhakbj', 'prayash');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(60) NOT NULL,
  `group` varchar(4) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `password`, `fname`, `lname`, `email`, `address`, `group`, `img`) VALUES
(12, 'sadhakbj', '243bd1ce0387f18005abfc43b001646a', 'Bijaya', 'Kuikel', 'sadhakbj@gmail.com', 'Banepa 11', 'A', 'profilepic/sadhakbj/Bijayanandaa.JPG'),
(13, 'prayash', '33ecb55622c1a16c83fedca91183f5f4', 'Prayash', 'Khatri', 'guruprayash@gmail.com', 'Panauti', 'A+', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
