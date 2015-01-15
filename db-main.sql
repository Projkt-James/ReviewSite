-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2014 at 01:54 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db-main`
--
CREATE DATABASE `db-main` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `db-main`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(10) NOT NULL AUTO_INCREMENT,
  `adminUsername` varchar(20) NOT NULL,
  `adminPassword` varchar(64) NOT NULL,
  `adminSalt` varchar(32) NOT NULL,
  `adminFirstName` varchar(45) NOT NULL,
  `adminLastName` varchar(45) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminJoinDate` datetime NOT NULL,
  `typeID` tinyint(1) NOT NULL,
  PRIMARY KEY (`adminID`),
  KEY `typeID` (`typeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminUsername`, `adminPassword`, `adminSalt`, `adminFirstName`, `adminLastName`, `adminEmail`, `adminJoinDate`, `typeID`) VALUES
(1, 'admin', '4d26c7a40c01a3a0991e51a426d6e6c72a9068031b88353a7e589a0636a33440', 'f6abf16192b734176b5b18456f5d9bd5', 'Jesse', 'Scott', '123@gmail.com', '2014-01-13 14:00:00', 0),
(2, 'adminkt', '19612ae3ed04b7c224ba12db07be5ce0915eed3de351ccbf60508f948b476e5a', '15cec5205c9e34355287acbb4d096a08', 'Kristi ', 'Turman', 'kristi@gmail.com', '2014-01-01 09:00:00', 0),
(3, 'adminst', '0fec1e61a67e7a0fd3623e0d9d656fc765462557c2a5f5933ee37b63d9864d80', 'a1dca222c170e3d2b5dd2557d5a57090', 'Scott ', 'Turman', 'turman@telstra.com.au', '2014-01-20 14:30:00', 0),
(4, 'adminrw', '8a35fd6de1e692dfa8277c405f93bba34926176285c85a13634e54e051b576f3', '09d1fe391935b75f798053f866ee5052', 'Richard ', 'Weathers', 'richo@gmail.com', '2014-01-20 16:00:00', 0),
(5, 'adminnc', 'd54dc8e24b12ba4805777d6b6eac977094b73962a15e04f227ec40eb6ec56432', '4d069acd30e4b0c6eb5e5f36c01d1482', 'Nicholas ', 'Cutter', 'nicholas.cutter@gmail.com', '2014-01-22 13:00:00', 0),
(6, 'test', 'd98e245d4e1b23fafcbf08fa98ae9673e310623266efe7e91dee8cd4548e52cb', 'a38da95d2ad61e8d886e540ff04c9015', 'hmm', 'hmm', 'hmm@hmm.com', '2014-10-11 00:31:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(10) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(45) NOT NULL,
  `categoryDescription` text NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryDescription`) VALUES
(1, 'Drama', 'Movies belonging to the dramatic genre.'),
(2, 'Sci-Fi', 'Movies belonging to the science fiction genre.\r\n'),
(3, 'Animation', '  Movies belonging to the animation genre.\r\n'),
(4, 'Horror', 'Movies belonging to the horror genre.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` int(10) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `memberID` int(10) NOT NULL,
  `commentDate` datetime NOT NULL,
  `reviewID` int(10) NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `memberID` (`memberID`),
  KEY `reviewID` (`reviewID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `comment`, `memberID`, `commentDate`, `reviewID`) VALUES
(4, 'I wasn''t such a big fan of the Hunger Games. Maybe the next movie in the series will be better.\r\n', 3, '2014-01-20 09:00:00', 1),
(5, 'Great movie!\r\n', 12, '2014-04-02 02:30:00', 1),
(7, 'Interesting post. Thanks for the information.\r\n', 13, '2014-01-13 16:00:00', 4),
(8, 'Hunger Games is awesome!!!\r\n', 13, '2014-01-13 16:23:00', 1),
(10, 'Hahahahaha this works now :)', 1, '2014-10-01 00:28:17', 4),
(11, 'I dunno how I feel about this.', 1, '2014-10-01 01:03:10', 1),
(12, 'More comments for fun :P', 9, '2014-10-01 01:28:17', 4),
(17, 'Just another lonely comment.', 13, '2014-10-10 02:48:58', 2);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `countryID` int(10) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`countryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryID`, `country`) VALUES
(1, 'Australia'),
(2, 'Germany'),
(3, 'Russia'),
(4, 'United Kingdom'),
(5, 'United States ');

-- --------------------------------------------------------

--
-- Table structure for table `current`
--

CREATE TABLE IF NOT EXISTS `current` (
  `themeID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`themeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `current`
--

INSERT INTO `current` (`themeID`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `memberID` int(10) NOT NULL AUTO_INCREMENT,
  `memberUsername` varchar(20) NOT NULL,
  `memberPassword` varchar(64) NOT NULL,
  `memberSalt` varchar(32) NOT NULL,
  `memberFirstName` varchar(45) NOT NULL,
  `memberLastName` varchar(45) NOT NULL,
  `memberStreetNumber` varchar(10) DEFAULT NULL,
  `memberStreetName` varchar(100) DEFAULT NULL,
  `memberSuburb` varchar(100) DEFAULT NULL,
  `memberPostCode` varchar(4) NOT NULL,
  `countryID` int(10) NOT NULL,
  `memberPhone` varchar(42) DEFAULT NULL,
  `memberMobile` varchar(42) DEFAULT NULL,
  `memberEmail` varchar(255) NOT NULL,
  `memberGender` char(1) NOT NULL,
  `memberJoinDate` datetime NOT NULL,
  `memberNewsletter` char(1) NOT NULL,
  `memberImage` varchar(100) DEFAULT NULL,
  `typeID` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`memberID`),
  KEY `countryID` (`countryID`),
  KEY `typeID` (`typeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `memberUsername`, `memberPassword`, `memberSalt`, `memberFirstName`, `memberLastName`, `memberStreetNumber`, `memberStreetName`, `memberSuburb`, `memberPostCode`, `countryID`, `memberPhone`, `memberMobile`, `memberEmail`, `memberGender`, `memberJoinDate`, `memberNewsletter`, `memberImage`, `typeID`) VALUES
(1, 'natalie', '9d26a3c61c0e2ce5c980ad8c7fff13c08cf898b6f3786930c73b68e3b88ad779', '002640cb549ba08ee90cd79aee89cce7', 'Natalie', 'Goddard', '18', 'Edward St ', 'Brisbane', '4001', 1, '0738109022', '0401209638', 'ngoddard@gmail.com', 'F', '2014-01-16 14:00:00', 'Y', 'nataliegoddard.png', 1),
(2, 'yvette', '19612ae3ed04b7c224ba12db07be5ce0915eed3de351ccbf60508f948b476e5a', '15cec5205c9e34355287acbb4d096a08', 'Yvette', 'Lyons', '24', 'Avoca St', 'Yeronga', '4104', 1, '0738485782', '0413652378', 'yvette_lyon@hotmail.com', 'F', '2014-01-16 08:30:00', 'Y', NULL, 1),
(3, 'kathryn', '0fec1e61a67e7a0fd3623e0d9d656fc765462557c2a5f5933ee37b63d9864d80', 'a1dca222c170e3d2b5dd2557d5a57090', 'Kathryn ', 'Jenkinns', '1/18', 'Dexter St', 'Tennyson', '4105', 1, '0431096952', '', 'katjenkinns@iinet.net', 'F', '2014-01-20 09:00:00', 'Y', NULL, 1),
(4, 'jenny', '8a35fd6de1e692dfa8277c405f93bba34926176285c85a13634e54e051b576f3', '09d1fe391935b75f798053f866ee5052', 'Jennifer ', 'Louise', '103', 'Davis Lane', 'Brendale', '4500', 1, '0753201738', '0489459921', 'jen.L@talktalk.net', 'F', '2014-01-23 01:00:00', 'Y', 'jenniferlouise.png', 1),
(5, 'michelle', 'd54dc8e24b12ba4805777d6b6eac977094b73962a15e04f227ec40eb6ec56432', '4d069acd30e4b0c6eb5e5f36c01d1482', 'Michelle ', 'Turner', '29', 'Cascade Drive', 'Underwood', '4119', 1, '0770731334', '0447789653', 'MTurner@optusnet.com.au', 'F', '2014-04-30 03:30:00', 'Y', NULL, 1),
(6, 'bennie', '9d26a3c61c0e2ce5c980ad8c7fff13c08cf898b6f3786930c73b68e3b88ad779', '002640cb549ba08ee90cd79aee89cce7', 'Ben ', 'Hogan', NULL, NULL, NULL, '4510', 1, NULL, NULL, 'ben1972@gmail.com', 'M', '2014-02-02 17:30:00', 'Y', NULL, 1),
(7, 'natasha', '19612ae3ed04b7c224ba12db07be5ce0915eed3de351ccbf60508f948b476e5a', '15cec5205c9e34355287acbb4d096a08', 'Natasha ', 'Smith', '56', 'Ascot Court', 'Bundall', '4217', 1, '0792811317', '0415475042', 'NSmithy@tpg.com.au', 'F', '2014-02-18 09:15:00', 'Y', NULL, 1),
(8, 'court', '0fec1e61a67e7a0fd3623e0d9d656fc765462557c2a5f5933ee37b63d9864d80', 'a1dca222c170e3d2b5dd2557d5a57090', 'Courtney ', 'Gonsalves', '24/145', 'Snipe St', 'Miami', '4220', 1, '0755490087', '0454657581', 'gonsalves@iinet.net', 'F', '2014-02-12 18:00:00', 'Y', NULL, 1),
(9, 'jason', '8a35fd6de1e692dfa8277c405f93bba34926176285c85a13634e54e051b576f3', '09d1fe391935b75f798053f866ee5052', 'Jason ', 'House', '2', 'Carberry St', 'Grange', '4051', 1, '0443881263', NULL, 'man_in_the_house@talktalk.net', 'M', '2014-03-17 13:00:00', 'Y', 'jasonhouse.png', 1),
(10, 'tony', 'd54dc8e24b12ba4805777d6b6eac977094b73962a15e04f227ec40eb6ec56432', '4d069acd30e4b0c6eb5e5f36c01d1482', 'Tony ', 'House', NULL, NULL, NULL, '4509', 1, '0417286753', NULL, 'tmat@gmail.com', 'M', '2014-03-20 20:00:00', 'Y', NULL, 1),
(11, 'chrissie', '9d26a3c61c0e2ce5c980ad8c7fff13c08cf898b6f3786930c73b68e3b88ad779', '002640cb549ba08ee90cd79aee89cce7', 'Christine ', 'Howard', '128', 'Grandview Rd', 'Pullenvale', '4069', 1, '0732352904', '0412368799', 'christy043@hotmail.com', 'F', '2014-04-01 21:30:00', 'N', NULL, 1),
(12, 'julia', '19612ae3ed04b7c224ba12db07be5ce0915eed3de351ccbf60508f948b476e5a', '15cec5205c9e34355287acbb4d096a08', 'Julia ', 'Hammar', '76', 'Ontario Crescent', 'Parkinson', '4115', 1, '0739772748', '0402324857', 'julia.hammar@bigpond.com', 'F', '2014-04-02 02:30:00', 'Y', NULL, 1),
(13, 'james', '0fec1e61a67e7a0fd3623e0d9d656fc765462557c2a5f5933ee37b63d9864d80', 'a1dca222c170e3d2b5dd2557d5a57090', 'James', 'Mellons', NULL, NULL, NULL, '1234', 1, '0739217545', '0411123123', 'jamie.menon@Gmail.com', 'M', '2014-01-13 16:00:00', 'Y', '13/7217_derp.jpg', 1),
(17, 'testacc3', '1aa357344f9f07430b5445dcc78ac1fd022772ca61f767c6b4815137b148cada', '886c1516077f4097c72ac8803843d0bf', 'abcd', 'abcd', NULL, NULL, NULL, '4111', 2, NULL, NULL, '11111@www.com', 'M', '2014-09-30 03:30:40', 'Y', NULL, 1),
(18, 'Jasmine', '4d3960909c754c8a64f45899706f561759a0946b250889fb58586e6638cc4e56', '5e9ab4181d5abbcd8c04a40b53bba846', 'jasmine', 'Pratt', NULL, NULL, NULL, '4054', 3, NULL, NULL, 'idontcare@fjnnnjf.com', 'F', '2014-10-03 03:13:23', 'Y', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `reviewID` int(10) NOT NULL AUTO_INCREMENT,
  `reviewTitle` varchar(45) NOT NULL,
  `reviewContent` text NOT NULL,
  `categoryID` int(10) NOT NULL,
  `reviewDate` datetime NOT NULL,
  `reviewRating` int(1) NOT NULL,
  `reviewImage` varchar(100) DEFAULT NULL,
  `adminID` int(10) NOT NULL,
  PRIMARY KEY (`reviewID`),
  KEY `categoryID` (`categoryID`),
  KEY `adminID` (`adminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewID`, `reviewTitle`, `reviewContent`, `categoryID`, `reviewDate`, `reviewRating`, `reviewImage`, `adminID`) VALUES
(1, 'Hunger Games', '  The Hunger Games is an intriguing tale and a good start to what is sure to be a continuing franchise. There are two more books in the series which will hopefully take the series in a more original direction that will allow us to get to know the characters even better. Sure this entry is a ripoff of Battle Royale, but it''s still an entertaining ride with great casting that will more than likely please fans of the book and those who''ve never even heard of it. Needs to be longer :9\r\n', 2, '2014-10-10 23:41:47', 10, 'hungergames.jpg', 2),
(2, 'The Pirates! Band of Misfits', 'The Pirates! Band of Misfits is one of those films that most people will watch and probably never give a second thought about. That''s not necessarily because it''s bad, but because it''s just not particularly memorable in any way. It''s a very light and breezy film, which can be a good thing, but after watching this, I found myself struggling to think of anything that made it stand out or made it interesting. There were a few things, but as usual, I found that the main problem could be traced back directly to the story\n', 3, '2014-01-22 13:00:00', 6, 'pirates.jpg', 5),
(3, 'Resident Evil: Retribution', 'Milla Jovovich returns as Alice, the series'' heroine, who in the past has had superpowers and fought alongside her clones against the evil Umbrella Corporation, which sold biological weapons to the highest bidders around the globe without regard for the apocalyptic ramifications. At the start of the film, Alice finds herself within the heart of the Umbrella base, where its evil supercomputer brain, the Red Queen, continues to run massive virtual simulations of the outbreaks that it started (best not to ask why). To escape to the real world, Alice must battle her way through pseudo-video-game levels that take her through key moments from the previous films as she encounters clones of fallen team members, as well as zombies, monsters, and undead army men on dirt bikes (sometimes on fire) sporting missile launchers. Yep, Retribution is definitely a Resident Evil movie alright.\n', 4, '2014-01-20 16:30:00', 4, 'residentevil.jpg', 4),
(4, 'Star Trek Into Darkness', 'Visually the film is glorious, with director of photography Dan Mindel and production designer Scott Chambliss returning for a second round. The Apple Store look of the Enterprise''s bridge contrasts with the primary colors of the costumes, and Harrison''s all-black ensemble frames him as the classic Western villain. Futuristic San Francisco is a particular standout: part familiar terrain, part utopian dream. The film was partially shot in IMAX - certain scenes go full-screen, a stylistic choice that Christopher Nolan used in The Dark Knight - and was post-converted to 3D. Together the combination makes for a fully immersive ride, drawing the viewer in rather than pushing them away\n', 2, '2014-01-13 14:00:00', 8, 'startrekintodarkness.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `themeID` int(10) NOT NULL AUTO_INCREMENT,
  `themeTitle` varchar(50) NOT NULL,
  `themeDescription` text NOT NULL,
  `themeImage` varchar(100) NOT NULL,
  `themeCSS` varchar(100) NOT NULL,
  PRIMARY KEY (`themeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`themeID`, `themeTitle`, `themeDescription`, `themeImage`, `themeCSS`) VALUES
(1, 'Orange', 'Standard orange hero colour.', 'main.jpg', 'main.css'),
(2, 'Blue', 'A nice blue highlight for the site.', 'second.jpg', 'second.css');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `typeID` tinyint(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`typeID`),
  KEY `typeID` (`typeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typeID`, `type`) VALUES
(0, 'admin'),
(1, 'member');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`reviewID`) REFERENCES `review` (`reviewID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`countryID`) REFERENCES `country` (`countryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
