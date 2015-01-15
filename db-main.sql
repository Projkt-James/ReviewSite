-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2015 at 04:48 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminUsername`, `adminPassword`, `adminSalt`, `adminFirstName`, `adminLastName`, `adminEmail`, `adminJoinDate`, `typeID`) VALUES
(1, 'admin', '4d26c7a40c01a3a0991e51a426d6e6c72a9068031b88353a7e589a0636a33440', 'f6abf16192b734176b5b18456f5d9bd5', 'Admin', 'User', 'admin@indevspace.org', '2014-01-13 14:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(10) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(45) NOT NULL,
  `categoryDescription` text NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

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
(17, 'Just another lonely comment.', 13, '2014-10-10 02:48:58', 2),
(18, 'I am a god ah!', 20, '2014-10-13 13:39:05', 4),
(19, 'I am a god ah!', 20, '2014-10-13 13:39:06', 4),
(20, 'hmmm', 1, '2014-10-13 15:01:08', 14),
(21, 'This is a comment, I have the default profile picture.', 27, '2014-10-13 15:28:54', 14),
(22, 'Dam this movie was crap\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\ntest', 20, '2014-10-14 00:42:57', 4),
(23, 'Comment', 20, '2014-10-14 02:12:48', 4),
(24, 'Great movie 10/10 from me.', 20, '2014-10-23 22:49:43', 13);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `countryID` int(10) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`countryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `memberUsername`, `memberPassword`, `memberSalt`, `memberFirstName`, `memberLastName`, `memberStreetNumber`, `memberStreetName`, `memberSuburb`, `memberPostCode`, `countryID`, `memberPhone`, `memberMobile`, `memberEmail`, `memberGender`, `memberJoinDate`, `memberNewsletter`, `memberImage`, `typeID`) VALUES
(27, 'Sample', '5c3ce17e8abb45b450d8e14dd2a9aa4841ac8cdb0c682e6f61c9212085dfe3a0', 'f69b19ddf99ac367cb5dfb4ce10aae0e', 'Sample', 'User', NULL, NULL, NULL, '4011', 1, NULL, NULL, 'sample@Sample.com', 'M', '2014-10-13 15:23:11', 'Y', NULL, 1),
(26, 'Mila', '440568f9191be326af908dbcac98ac1db3e8aa9b96594b5e04c4c48ac1209df6', 'b1bdd921dd0b03b51c173582620eb48e', 'Mila', 'Kunis', NULL, NULL, NULL, '1111', 5, NULL, NULL, 'Mila@Kunis.com', 'F', '2014-10-13 14:20:13', 'Y', '26/5346_mila.jpg', 1),
(21, 'Beyonce', '98dc7313e19cdd07bb7cfa26dfec2bea6a5d8f6c35bc6acb7e92d2a7767a4e1f', '03d54442bd8863225229b7061ee4d215', 'Beyonce', 'Knowles', NULL, NULL, NULL, '1234', 5, NULL, NULL, 'Knowles@gmail.com', 'F', '2014-10-13 13:41:16', 'Y', '21/8616_beyonce.jpg', 1),
(19, 'JayZ', 'a5765366a294dd6631e71ec3ae3d214adcfa462bbc766c8fd4c9c75845f51832', 'b8a8b744ace825dc7ebfa29d2a5e50c1', 'Jay', 'Z', NULL, NULL, NULL, '1337', 5, NULL, NULL, 'Jayz@jayz.com', 'M', '2014-10-13 10:24:20', 'Y', '19/3704_jay-z.jpg', 1),
(20, 'Kanye', '335106dd1b001c3658076445307a29c693afb2c05d81e6f2e85397ff3afafb35', '17d573090ea992b8601c19510d82822d', 'Kanye', 'Pest', NULL, NULL, NULL, '1337', 5, NULL, NULL, 'Kanye@pest.com', 'M', '2014-10-13 11:27:39', 'Y', '20/1326_kanye-west.jpeg', 1),
(25, 'Emma', 'd78d4d07b1ea3fe1d11d7e7a5dcd7e124f11e1a16151699fe5f2835daef3ba12', '0bd22f845caab32135df5eb1c64d17bc', 'Emma', 'Stone', NULL, NULL, NULL, '4111', 5, NULL, NULL, 'Emma@Stone.com', 'F', '2014-10-13 14:12:29', 'Y', '25/7856_emma.jpeg', 1),
(24, 'Drake', 'ff32b5419a862aed18fb281c81aea618d8597c1ad4c6906fb565c18cb77424df', '175256aa645027616af611e434407785', 'Drake', 'Graham', NULL, NULL, NULL, '4001', 5, NULL, NULL, 'drake@drake', 'M', '2014-10-13 14:02:11', 'Y', '24/5892_drake.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `reviewID` int(10) NOT NULL AUTO_INCREMENT,
  `reviewTitle` varchar(45) NOT NULL,
  `reviewSubTitle` varchar(255) NOT NULL,
  `reviewContent` text NOT NULL,
  `categoryID` int(10) NOT NULL,
  `reviewDate` datetime NOT NULL,
  `reviewRating` int(1) NOT NULL,
  `reviewImage` varchar(100) DEFAULT NULL,
  `adminID` int(10) NOT NULL,
  PRIMARY KEY (`reviewID`),
  KEY `categoryID` (`categoryID`),
  KEY `adminID` (`adminID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewID`, `reviewTitle`, `reviewSubTitle`, `reviewContent`, `categoryID`, `reviewDate`, `reviewRating`, `reviewImage`, `adminID`) VALUES
(1, 'Hunger Games', 'Sub title for hunger games', '  The Hunger Games is an intriguing tale and a good start to what is sure to be a continuing franchise. There are two more books in the series which will hopefully take the series in a more original direction that will allow us to get to know the characters even better. Sure this entry is a ripoff of Battle Royale, but it''s still an entertaining ride with great casting that will more than likely please fans of the book and those who''ve never even heard of it. Needs to be longer :9\r\n', 2, '2014-03-10 23:41:47', 10, 'hungergames.jpg', 1),
(13, 'Avengers 2', 'Marvel releases yet another epic movie', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui.<br /><br />\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui.', 2, '2014-10-13 14:52:07', 9, 'avengers.png', 1),
(3, 'Resident Evil: Retribution', 'This movie shouldn''t have been made', 'Milla Jovovich returns as Alice, the series'' heroine, who in the past has had superpowers and fought alongside her clones against the evil Umbrella Corporation, which sold biological weapons to the highest bidders around the globe without regard for the apocalyptic ramifications. At the start of the film, Alice finds herself within the heart of the Umbrella base, where its evil supercomputer brain, the Red Queen, continues to run massive virtual simulations of the outbreaks that it started (best not to ask why). To escape to the real world, Alice must battle her way through pseudo-video-game levels that take her through key moments from the previous films as she encounters clones of fallen team members, as well as zombies, monsters, and undead army men on dirt bikes (sometimes on fire) sporting missile launchers. Yep, Retribution is definitely a Resident Evil movie alright.\n', 4, '2014-01-20 16:30:00', 4, 'residentevil.jpg', 1),
(4, 'Star Trek Into Darkness', 'Yet another failed Star Wars wannabe', 'Visually the film is glorious, with director of photography Dan Mindel and production designer Scott Chambliss returning for a second round. The Apple Store look of the Enterprise''s bridge contrasts with the primary colors of the costumes, and Harrison''s all-black ensemble frames him as the classic Western villain. Futuristic San Francisco is a particular standout: part familiar terrain, part utopian dream. The film was partially shot in IMAX - certain scenes go full-screen, a stylistic choice that Christopher Nolan used in The Dark Knight - and was post-converted to 3D. Together the combination makes for a fully immersive ride, drawing the viewer in rather than pushing them away\n', 2, '2014-04-13 14:00:00', 8, 'startrekintodarkness.jpg', 1),
(14, 'Guardians Of The Galaxy ', 'Could this be the best movie of 2014?', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui.', 2, '2014-10-13 14:54:35', 10, 'gotg.jpg', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typeID`, `type`) VALUES
(0, 'admin'),
(1, 'member');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
