-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2017 at 03:26 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `localstar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `password` varchar(25) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `create_user` varchar(1) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`password`, `name`, `address`, `contact`, `experience`, `create_user`, `uid`, `email`) VALUES
('87654321', 'Hemang Patel', 'Visnagar', '8765432109', '1', '0', '4GOH190PC8359IY', 'abc@gmail.com'),
('87654321', 'Jay', 'Visnagar', '8765493210', '0', '0', '6_O_GLU_NI2JBPY', 'jay@gmail.com'),
('87654321', 'Trupal', 'Visnagar', '7600404144', '0', '1', 'PWK022FD4QOTC96', 'trupalpatel64@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `e_name` varchar(20) NOT NULL,
  `e_id` varchar(20) NOT NULL,
  `e_date` date NOT NULL,
  `e_description` varchar(1000) NOT NULL,
  `e_address` varchar(200) NOT NULL,
  `e_manager_email` varchar(50) NOT NULL,
  `mul_event` varchar(2) NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_name`, `e_id`, `e_date`, `e_description`, `e_address`, `e_manager_email`, `mul_event`, `img`) VALUES
('Spectrum', 'BFJ.33B8EH6BY50', '2017-12-14', 'SK Function', 'Visnagar', 'abc@gmail.com', '1', ''),
('Navratri', 'JO8NHS6_H7_6AZX', '2017-11-08', 'Garba Night', 'Visnagar', 'abc@gmail.com', '', ''),
('Football', 'TP8GTKTYKSOQ_1Q', '2017-12-31', 'Sk Campus', 'Visnagar', 'abc@gmail.com', '0', 'bulb.png'),
('Cricket', 'W8YECX9F8CAREHY', '2017-12-01', 'dshbsdkj', 'Visnagar', 'jay@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `g_id` varchar(20) NOT NULL,
  `g_file` varchar(20) NOT NULL,
  `g_event` varchar(20) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `g_file`, `g_event`) VALUES
('2NDDMXRLI.30BXN', 'chemistry_2.png', 'JO8NHS6_H7_6AZX'),
('JHSLU34558SW9K_', 'create_thumb.png', 'JO8NHS6_H7_6AZX');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `p_id` varchar(50) NOT NULL,
  `e_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`p_id`, `e_id`) VALUES
('trupalpatel64@gmail.com', 'TP8GTKTYKSOQ_1Q'),
('mogo@gmail.com', 'JO8NHS6_H7_6AZX'),
('mogo@gmail.com', 'TP8GTKTYKSOQ_1Q'),
('trupalpatel64@gmail.com', 'BFJ.33B8EH6BY50');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE IF NOT EXISTS `performance` (
  `e_name` varchar(50) NOT NULL,
  `e_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`e_name`, `e_id`) VALUES
('Dance', 'BFJ.33B8EH6BY50'),
('Singing', 'BFJ.33B8EH6BY50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `age` varchar(10) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `password`, `age`, `contact`, `address`) VALUES
('trupal', 'mogo@gmail.com', '87654321', '20', '7600404144', 'visnagar'),
('Trupal Patel', 'trupalpatel64@gmail.com', '87654321', '10', '7600404144', 'Visnagar');
