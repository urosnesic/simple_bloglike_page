-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2016 at 03:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `message`, `created`, `user_id`, `title`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dapibus blandit diam. Nulla est sem, aliquam sed hendrerit at, congue id augue. Ut mollis tincidunt ullamcorper. Curabitur hendrerit nulla nulla, at eleifend ante blandit id. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam euismod lobortis nulla eu venenatis.', '2016-10-31 15:14:50', 1, 'First Post'),
(2, 'Aliquam lobortis velit id tempus volutpat. Mauris semper, eros eu semper congue, dolor dui faucibus ipsum, et ultrices felis tellus et sem. Vestibulum posuere metus risus, vel molestie augue vulputate eu. Vivamus eget velit ornare, finibus dui vitae, luctus risus. Cras volutpat turpis felis, placerat consectetur arcu hendrerit ac. Aenean id justo gravida, mollis dolor quis, interdum eros. Morbi dictum scelerisque lacus, sit amet dapibus nisl hendrerit eu. Vivamus sed risus sit amet purus volutpat dictum. Suspendisse potenti.', '2016-10-31 15:15:28', 1, 'Second Post'),
(3, 'Cras aliquet leo quis lectus posuere commodo. Proin lacinia mattis condimentum. Nulla sagittis pellentesque condimentum. Donec nec justo pellentesque, placerat mi nec, sollicitudin sem. Phasellus dictum vitae nulla et suscipit. Morbi in orci risus. Aenean magna diam, lobortis et interdum et, faucibus ac nisi.', '2016-10-31 15:17:15', 2, '3rd post'),
(4, 'Kada se korisnik loguje vidce samo poslednjih 20 poruka koje su postavljene do tada.', '2016-10-31 15:23:17', 1, 'next post'),
(5, 'Hello, this is my first post on this "site".', '2016-10-31 15:27:52', 3, 'Hello to all!'),
(6, 'Aenean efficitur eget massa at commodo. Aliquam vel sapien pretium, suscipit risus sed, faucibus orci. Maecenas ac est molestie, dictum velit id, euismod nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec diam turpis, porttitor eu nibh in, rutrum vehicula nulla. Phasellus ac accumsan nisi.', '2016-10-31 15:29:23', 2, 'one more');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `joined` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `joined`) VALUES
(1, 'Uros Nesic', 'Uros', '123', '2016-10-31'),
(2, 'Petar Petrovic', 'Pera', '123', '2016-10-31'),
(3, 'James', 'James', '123', '2016-10-31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
