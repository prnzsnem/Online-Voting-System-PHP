-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 09:46 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `admin_id` varchar(80) NOT NULL,
  `Username` varchar(80) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(600) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact` bigint(14) NOT NULL,
  `Age` int(3) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `City` varchar(80) NOT NULL,
  `Hometown` varchar(80) NOT NULL,
  `Temporary_address` varchar(80) NOT NULL,
  `account_created_date` datetime NOT NULL,
  `last_acc_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `admin_id`, `Username`, `Email`, `password`, `fullname`, `Gender`, `Address`, `Contact`, `Age`, `user_image`, `City`, `Hometown`, `Temporary_address`, `account_created_date`, `last_acc_updated_date`) VALUES
(1, 'e01cd06821968fb172f9790c2823ec32', 'princesanem', 'princesanem@eme.com', 'c64ea9cf25c633a65c68be82b7d7b043b82c13f02ec5874b66c9ae008ea3efeda6a783b761d0e18feeda915a90a595ddfe6a7f219a00b00fb84d9ffb8095e5b7', 'Prince Sanem', 'Male', 'Washington D.C. USA', 9869010345, 22, './../Uploads/user_images/PS Logo.png', 'Washington D.C.', 'Mulpani', 'Kathmandu Nepal', '2019-09-11 12:41:06', '2020-03-04 03:41:08'),
(5, '1fa4535f29bf1561d7cc177f91c8094e', 'ambrosedean', 'dean.ambrose@eme.coom', 'afec1185d7afc9cc5c6d4e56451b0acd539330ea250e567e0f214074db9cfc3d1f63575eb8bbea9653b6ced3293b3ee5a8ecae0a5442146caa9f7b5bd1024670', 'Dean Ambrose', 'Male', 'New York City', 1234567890, 45, './../Uploads/user_images/my_shot.jpg', 'Callifornia', 'New York', 'Callifornia', '2020-05-14 11:00:52', '2020-05-17 03:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `ID` int(11) NOT NULL,
  `creator_uid` varchar(40) NOT NULL,
  `election_id` varchar(40) NOT NULL,
  `election_type` varchar(40) NOT NULL,
  `election_name` varchar(80) NOT NULL,
  `no_of_candidates` int(11) NOT NULL,
  `election_start_date` datetime NOT NULL,
  `election_end_date` datetime NOT NULL,
  `election_icon` varchar(400) NOT NULL,
  `election_created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`ID`, `creator_uid`, `election_id`, `election_type`, `election_name`, `no_of_candidates`, `election_start_date`, `election_end_date`, `election_icon`, `election_created_date`) VALUES
(1, 'e01cd06821968fb172f9790c2823ec32', '4fffa29034a844dfbc74a75b8d17f8e6', 'National', 'New Prime Minister Selection', 3, '2019-09-26 23:20:50', '2019-09-30 23:20:50', 'https://princeitsolution.000webhostapp.com/Admin CP/Uploads/election_image/national_election.png', '0000-00-00 00:00:00'),
(2, 'e01cd06821968fb172f9790c2823ec32', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'College', 'New College Leader', 4, '2019-09-21 01:10:20', '2019-09-23 01:10:20', 'https://princeitsolution.000webhostapp.com/Admin CP/Uploads/election_image/college_election.png', '0000-00-00 00:00:00'),
(3, 'e01cd06821968fb172f9790c2823ec32', '75dab1e83d0a290c546764e9fa0751d9', 'Office', 'New GM Selection', 2, '2019-09-29 01:10:20', '2019-09-30 01:10:20', 'https://princeitsolution.000webhostapp.com/Admin CP/Uploads/election_image/default_ele_img.png', '0000-00-00 00:00:00'),
(4, 'e01cd06821968fb172f9790c2823ec32', '02c75db3984f9d92789d99962dcbb562', 'School', 'Choosing CR', 2, '2019-10-04 01:10:20', '2019-10-05 01:10:20', 'https://princeitsolution.000webhostapp.com/Admin CP/Uploads/election_image/school_election.png', '0000-00-00 00:00:00'),
(6, '23dd9762f5d9593dbb01b5ec61359f53', 'e60074c0ef53b4bafdd3debd27dfdcd6', 'College', 'Test Election', 4, '2020-04-28 02:25:50', '2020-04-29 02:25:50', 'https://princeitsolution.000webhostapp.com/Admin CP/Uploads/election_image/school_election.png', '2020-04-24 01:27:48'),
(7, '23dd9762f5d9593dbb01b5ec61359f53', '3e63406da6d8b6db871e9a940203f2f8', 'Office', 'New CEO Selection', 4, '2020-04-28 05:00:00', '2020-04-30 05:00:00', 'https://princeitsolution.000webhostapp.com/Admin CP/Uploads/election_image/default_ele_img.png', '2020-04-26 07:08:58'),
(11, '098f6bcd4621d373cade4e832627b4f6', 'c1eaf0b8fb7ef1514aca0de0c85b28b4', 'General', 'Test New Election', 2, '2020-01-01 01:00:00', '2020-01-01 01:00:00', 'https://princeitsolution.000webhostapp.com/Admin CP/Uploads/election_image/default_ele_img.png', '2020-04-26 12:03:47'),
(15, '23dd9762f5d9593dbb01b5ec61359f53', '69989298df36e5c87e73cd3aa711244c', 'General', 'New General Election', 4, '2020-01-01 01:00:00', '2020-01-01 01:00:00', 'https://princeitsolution.000webhostapp.com/Admin CP/Uploads/election_image/default_ele_img.png', '2020-05-03 12:28:57'),
(17, '23dd9762f5d9593dbb01b5ec61359f53', '201abf1d399a3c01a06c1e3fd8754d68', 'Office', 'Samsung Winner', 4, '2020-01-01 01:00:00', '2020-01-01 01:00:00', 'https://princeitsolution.000webhostapp.com/Admin CP/Uploads/election_image/default_ele_img.png', '2020-05-12 11:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `election_candidates`
--

CREATE TABLE `election_candidates` (
  `ID` int(11) NOT NULL,
  `creator_uid` varchar(600) NOT NULL,
  `cand_id` varchar(100) NOT NULL,
  `election_type` varchar(40) NOT NULL,
  `election_id` varchar(100) NOT NULL,
  `election_name` varchar(100) NOT NULL,
  `cand_name` varchar(80) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(3) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `cand_photo` varchar(400) NOT NULL,
  `address` varchar(80) NOT NULL,
  `vote_symbol` varchar(400) NOT NULL,
  `obtained_votes` int(11) NOT NULL,
  `joined_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election_candidates`
--

INSERT INTO `election_candidates` (`ID`, `creator_uid`, `cand_id`, `election_type`, `election_id`, `election_name`, `cand_name`, `gender`, `age`, `party_name`, `cand_photo`, `address`, `vote_symbol`, `obtained_votes`, `joined_date`) VALUES
(1, 'e01cd06821968fb172f9790c2823ec32', '1918904bfc549f09782cd3b2a9926399', 'National', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', 'Pushpa Kamal Dahal', 'Male', 55, 'NCP Maoist', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/National Election/ic_prachanda.png', 'Baglung Kathmandu, Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/National Election/ic_maoistsign.png', 3, '0000-00-00 00:00:00'),
(2, 'e01cd06821968fb172f9790c2823ec32', '91ce12f28cbb40227f601b6320252571', 'National', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', 'Sher Badhur Deuba', 'Male', 60, 'NCP Congress', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/National Election/ic_deuba.png', 'Nawalparasi, Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/National Election/ic_congresssign.png', 4, '0000-00-00 00:00:00'),
(3, 'e01cd06821968fb172f9790c2823ec32', '8282ee87f45f0324f14b82b60925d259', 'National', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', 'Khadka Prashad Sharma Oli', 'Male', 50, 'NCP Yemale', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/National Election/ic_kpoli.png', 'Karnali Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/National Election/ic_yemalesign.png', 3, '0000-00-00 00:00:00'),
(4, 'e01cd06821968fb172f9790c2823ec32', '4c2a904bafba06591225113ad17b5cec', 'Office', '75dab1e83d0a290c546764e9fa0751d9', 'New GM Selection', 'John   Doe', 'Male', 23, 'Single Agenda Leader', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/man.png', 'Washington D.C.', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/sunflower.png', 3, '0000-00-00 00:00:00'),
(5, 'e01cd06821968fb172f9790c2823ec32', 'c2d7ebf2903344019eac78382101bc09', 'Office', '75dab1e83d0a290c546764e9fa0751d9', 'New GM Selection', 'John  Cena', 'Male', 33, 'One Man Army', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/man (1).png', 'New York', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/sauce.png', 2, '0000-00-00 00:00:00'),
(6, 'e01cd06821968fb172f9790c2823ec32', 'fee4ea21077e168613b6a83d35efdcad', 'College', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', 'Will Samulson Smith', 'Male', 44, 'Creator', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/boy.png', 'Washington D.C.', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/pilgrim.png', 2, '0000-00-00 00:00:00'),
(7, 'e01cd06821968fb172f9790c2823ec32', 'e72538d479b5bcd31e329a97376673a2', 'College', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', 'Rita  Ora', 'Female', 27, 'Fun and shake', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/girl.png', 'Florida USA', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/candles.png', 1, '0000-00-00 00:00:00'),
(8, 'e01cd06821968fb172f9790c2823ec32', '47777dfa1c0faad34339c62456c2d573', 'College', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', 'Robin  Hood', 'Male', 24, 'Computer Genus ', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/man (3).png', 'Egypt', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/002-museum.png', 4, '0000-00-00 00:00:00'),
(9, 'e01cd06821968fb172f9790c2823ec32', '87841891b7f9890dd70e234324e3f981', 'College', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', 'Jaccob  Vanindis', 'Male', 23, 'IT Persona', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/man (2).png', 'Cairo', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/028-bank.png', 3, '0000-00-00 00:00:00'),
(10, 'e01cd06821968fb172f9790c2823ec32', '52df602acc035b9dde1b477e57c810dc', 'School', '02c75db3984f9d92789d99962dcbb562', 'Choosing CR', 'Chandrakala  Smith', 'Female', 12, 'Girls', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/man (3).png', 'Mulpani', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/017-woods.png', 4, '0000-00-00 00:00:00'),
(11, 'e01cd06821968fb172f9790c2823ec32', '0edc41891dd5eed5fdd9746d2ac08ced', 'School', '02c75db3984f9d92789d99962dcbb562', 'Choosing CR', 'Situs  Ambrose', 'Male', 12, 'Boys', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/man (2).png', 'Narayantar', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/001-traffic planning.png', 2, '0000-00-00 00:00:00'),
(14, 'e01cd06821968fb172f9790c2823ec32', '4077f0fae18962d5b6c9b36fd3a54b25', 'National', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', 'Mero Name k ho', 'Male', 40, 'Hamro Dess', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/National Election/trekking.png', 'Jorpati Kathmandu, Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/National Election/fork.png', 1, '0000-00-00 00:00:00'),
(15, 'e01cd06821968fb172f9790c2823ec32', '4d3ad3cacc59411ca493847577575415', 'Competition', '4491c16c3f3d8dac72c0939e27b3ea90', 'Heros', 'I am John Cena', 'Male', 55, 'PUBG Mobile', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/running.png', 'New York, USA', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/bicycle.png', 0, '0000-00-00 00:00:00'),
(16, 'e01cd06821968fb172f9790c2823ec32', 'ffe95deed97afe27458bd2d8e53df891', 'Competition', '4491c16c3f3d8dac72c0939e27b3ea90', 'Heros', 'Michel  Tike', 'Male', 50, 'I am the BOSS', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/running-man.png', 'New York, USA', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/016-police badge.png', 0, '0000-00-00 00:00:00'),
(17, 'e01cd06821968fb172f9790c2823ec32', 'd78581e4dfe786d433755a14a6e3663c', 'Competition', '4491c16c3f3d8dac72c0939e27b3ea90', 'Heros', 'Prince  Sanem', 'Male', 20, 'I am the King', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/PS.jpg', 'Washington D.C. USA', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/Logo.png', 1, '0000-00-00 00:00:00'),
(18, '23dd9762f5d9593dbb01b5ec61359f53', 'a393c06ce3c5008ca6249903aeae3d27', 'College', 'e60074c0ef53b4bafdd3debd27dfdcd6', 'Test Election', 'Test Candidate', 'Male', 55, 'Sajah Party', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/default_icon.jpg', 'Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/vote_stamp.png', 0, '2020-05-12 05:26:58'),
(19, '23dd9762f5d9593dbb01b5ec61359f53', '88b550f64dc56b81c1d43e8021b4f79a', 'College', 'e60074c0ef53b4bafdd3debd27dfdcd6', 'Test Election', 'Test Candidate 1', 'Male', 44, 'Sahi ho bro', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/default_icon.jpg', 'Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/vote_stamp.png', 0, '2020-05-12 05:38:23'),
(20, '23dd9762f5d9593dbb01b5ec61359f53', '3ba6b5cbd06039739066b2746e6c4cdd', 'Office', '3e63406da6d8b6db871e9a940203f2f8', 'New CEO Selection', 'Lets see', 'Male', 43, 'Lets see party', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/default_icon.jpg', 'Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/vote_stamp.png', 0, '2020-05-12 07:02:53'),
(21, '23dd9762f5d9593dbb01b5ec61359f53', '3d4ad275a753c884bd48da5eb2286139', 'Office', '201abf1d399a3c01a06c1e3fd8754d68', 'Samsung Winner', 'Staff 1', 'Female', 46, 'staff1', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/default_icon.jpg', 'Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/vote_stamp.png', 0, '2020-05-12 11:45:40'),
(22, '23dd9762f5d9593dbb01b5ec61359f53', '6b00842a0954a6e20e0c1e395c98322a', 'Office', '201abf1d399a3c01a06c1e3fd8754d68', 'Samsung Winner', 'Staff2', 'Male', 23, 'staff2', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/default_icon.jpg', 'Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/vote_stamp.png', 0, '2020-05-12 11:46:32'),
(23, '23dd9762f5d9593dbb01b5ec61359f53', '92b6ae361fb6e9867f6f90cb0b770253', 'Office', '201abf1d399a3c01a06c1e3fd8754d68', 'Samsung Winner', 'Staff3', 'Male', 25, 'staf3', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/default_icon.jpg', 'Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/vote_stamp.png', 0, '2020-05-12 11:47:07'),
(24, '23dd9762f5d9593dbb01b5ec61359f53', 'f9e603f39d77eadc9254e80e95dafed1', 'Office', '201abf1d399a3c01a06c1e3fd8754d68', 'Samsung Winner', 'staff4', 'Male', 34, 'staff4', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/default_icon.jpg', 'Nepal', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/vote_stamp.png', 0, '2020-05-12 11:47:41'),
(25, '23dd9762f5d9593dbb01b5ec61359f53', '1bb6a33c0a5afd6bdfefad5d46732dbf', 'General', '69989298df36e5c87e73cd3aa711244c', 'New General Election', 'John Cena', 'Male', 44, 'wwe', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/default_icon.jpg', 'USA', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/vote_stamp.png', 0, '2020-05-12 06:53:37'),
(26, '23dd9762f5d9593dbb01b5ec61359f53', 'b399c591215afb5d5e9c333fab5305d7', 'General', '69989298df36e5c87e73cd3aa711244c', 'New General Election', 'Rey Mesterio', 'Male', 42, 'wwe wrestling', 'https://princeitsolution.000webhostapp.com/Uploads/candidate/default_icon.jpg', 'USA Florida', 'https://princeitsolution.000webhostapp.com/Uploads/party_logo/vote_stamp.png', 0, '2020-05-12 06:55:03'),
(27, '', 'b23a942e64c29c6d53197e84752c3251', 'National', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', 'Ma Ho Raja', 'Male', 40, 'Hami Aafnai Party', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/candidate/National Election/my_shot.jpg', 'Nepal', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/party_logo/National Election/bus.png', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `election_voters`
--

CREATE TABLE `election_voters` (
  `ID` int(11) NOT NULL,
  `voter_id` varchar(100) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  `address` varchar(100) NOT NULL,
  `voter_photo` varchar(200) NOT NULL,
  `citizenship_number` varchar(200) DEFAULT NULL,
  `college_id` varchar(600) DEFAULT NULL,
  `office_id` varchar(600) DEFAULT NULL,
  `school_id` varchar(600) DEFAULT NULL,
  `password` varchar(600) NOT NULL,
  `acc_created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election_voters`
--

INSERT INTO `election_voters` (`ID`, `voter_id`, `full_name`, `username`, `email`, `phone`, `gender`, `age`, `address`, `voter_photo`, `citizenship_number`, `college_id`, `office_id`, `school_id`, `password`, `acc_created_date`) VALUES
(1, '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'princesanem', 'princesanem@eme.com', '9869010345', 'Male', 22, 'Mulpani', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '', '000123345', '00012345', 'e1e44d20556e97a180b6dd3ed7ae5c465cafd553fa8747dca038fb95635b77a37318f7ddf7aec1f6c3c14bb160ba2497007decf38dd361cab199e3b8c8fe1f5c', 'c64ea9cf25c633a65c68be82b7d7b043b82c13f02ec5874b66c9ae008ea3efeda6a783b761d0e18feeda915a90a595ddfe6a7f219a00b00fb84d9ffb8095e5b7', '2019-09-26 02:57:12'),
(3, '15c041aad623e58ed0572a9c1f555a4d', 'Aashish Thapa Magar', 'aashish', 'aashish@gmail.com', '9876543211', '', 28, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '', 'bd954d3fdfc53f6ef446cb0124bd71922184a575a95ac557b71afa09a48df3b494f3c0cb52f4538013d69d702ca34451f2a0d16f66deab84dd1ace3ecaa69baa', '', '', 'a56988c2b99b2dfca2ab751a70aaf9354b2c186070aeb8f61fbae402516380cc40b23eac8b6243190525ec838c15fd1f5bbb270c661f607b6561be29e1acf46f', '2019-09-28 03:44:55'),
(4, 'ad45925cd47fb82d190499a24b88a573', 'Prem Kumar Tamang', 'premtamang', 'premeonetamang@gmail.com', '9876543210', '', 23, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '64d09d9930c8ecf79e513167a588cb75439b762ce8f9b22ea59765f32aa74ca19d2f1e97dc922a3d4954594a05062917fb24d1f8e72f2ed02a58ed7534f94d27', '985d98a5f0bd9cade08af59789bbc92eea5de6abf52f47f4eb3885f351096adcc4285df28783b0399b1fabed8525e487ba8cdaff4ab812efa0d5dafad291c289', '', '', '03d7ce949dfff2d67f3e29f713a244392dca185872d17d944c88df2b110c9e85e3605c4942e57fbadf95b7f7beb1fdac5ff1f43a919ac0e871031535a32ff2c1', '2019-09-28 03:53:08'),
(5, '4f9fecabbd77fba02d2497f880f44e6f', 'Vijay Karki', 'vijay', 'vijay@gmail.com', '9876543212', '', 26, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '21f9ff061b755faaa06d71434f31330582901810871c228a4d67f9e52f2adf82ea6b445bb4c98d49da68fb140717911e4fc5e1c49ec0becf0aadec0f7517f8bc', '', '', '', '042a55cf053c40283bb9eb03f370532c159e60facc6e79d1083cd914163e87f69c2b6622b656e9afec4e846129432bbd4e0223c51c339f807a8ebf6fbd7a0f95', '2019-09-28 04:02:40'),
(6, '1e44d0e414f07d43a2a8a2ffc1f819f2', 'Ashmita Lamichhne', 'ashmi', 'ashmi@gmail.com', '9876543221', '', 22, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '', '150756eeb12609210491b158ff431f3ac10ceb9497e319adce4c01310d6c1cc67793f57ceb9c7234bfdfaaf120835b838a937b11ce398e8214e8f9e3e388a23d', '', '', '293b95f6f5661d3a250fc9a0ae929296d62079fd4d0bc4ba1de576e5452dfbbc73e777ebd4c051b4d773677bd8a05d77ac01e614eb194bf88c9250742ede7123', '2019-09-28 04:06:41'),
(7, 'b4caefa3d450d0e36e183160d17aba24', 'Subash Budhathoki', 'subash', 'subash@gmail.com', '9871236540', '', 25, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '', '32e5509086586d01e183ce39438656d3a701a914bd77b41b100401af1d9d5562ed86a4165b629f41721294f4253dcbe54465346781dc55b495dcd91ce6730ab8', '', '', 'c551a7b2a5dc2b2d1ee7ba56bd7c1881d6841d7da3f14cdecd97544a9ed99c090650f0067cc0e8ffb6053d27966186f56901a7247ef35796aaee893cf310d330', '2019-09-28 04:12:22'),
(8, '385c1296298781e025c52fa1e8be9272', 'Pratima KC', 'pratima', 'pratima@gmail.com', '9876543241', '', 21, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '', '305afe931ac192da63941650968f424c43ee319486d62a5873faf8a849e0361b1c666c7bdf69e087af18da1ced07ecac8ae69bd3a678b9717afb53889b78200e', '', '', '748c549ee90f0d2a392b0c05d34246aecb1503e9116f9e98d43d5fe2219f1eb872976a6b55cf2cc0ef5a8447395adfe3ee47c9adc823da615bc7cd855abcb53f', '2019-09-28 04:28:59'),
(9, 'e3480a8108a815dcfacfecda86a31889', 'Pallavi Uppreti', 'pallavi', 'pallavi@gmail.com', '9876543217', '', 21, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', 'd760688da522b4dc3350e6fb68961b0934f911c7d0ff337438cabf4608789ba94ce70b6601d7e08a279ef088716c4b1913b984513fea4c557d404d0598d4f2f1', 'c24675d8020683d13b14182840b80540d93768b4fc0b4cea646a31d771056268a074b0fafd513c03834d903f8f21ca4cffb397810548b15333cc63e284b16ded', '7d6e49927bdd21d4bd76b0fa6d3afd1d5edc89d464e0e867e32b8948fc0a83a4dcef3936a325a227c77bcb5ab97e76f3f4006b97c0f8ccdeb89a24f05b505aa9', '', '6975c70cddaf73b424f7953ba8860ebe26f5a7f7027355e012bd6eb08d24f19eb6a26cb24f9545124a6bd0cf94fe592d1c654f5a6301f443bf6fa4c9b68ab09d', '2019-09-28 04:36:41'),
(10, 'b179a9ec0777eae19382c14319872e1b', 'Roman Range', 'roman', 'roman.range@gmail.com', '1234567890', '', 35, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '', '', '75d4c71a709263d7cfca05d4655b3a7c9433064fb12b0e93a44105833375dca5778a0697583776950692b16bf6150be869b0702aaea6b674cf5c97e99b15f65c', '', '6492154e7c78aa7e615fa3665876c97d23124e99f992d95227ddf3a040e9e78144327102330d69265409af352a3c84e0615f00c878b0449bd5b00cf300b1e7c1', '2019-09-28 05:14:14'),
(11, '5a9dfa5bea266077164d51f0df721b13', 'Dean Ambrose', 'deanambrose', 'deanambrose@eme.com', '1123421113', '', 32, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '', '', '', '', 'afec1185d7afc9cc5c6d4e56451b0acd539330ea250e567e0f214074db9cfc3d1f63575eb8bbea9653b6ced3293b3ee5a8ecae0a5442146caa9f7b5bd1024670', '2019-09-28 05:26:30'),
(12, '0cb1eb413b8f7cee17701a37a1d74dc3', 'Amit Yadav', 'amit', 'amit@eme.com', '980785466', '', 23, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '', 'c9286208f51b8fe0ef48c62a8b365506898dca0f3ec82c764b6062c663ee2fe1cadeedb1e52c2be5558a37a28d9b8f3e149a57d8781e72e88d8ad05b00260683', '', '', '07e9f72acbe13347fe9c6aa9ce505c4e2dcbd982b43b47ff0a9abd050d58c6502b279dbfda5db1811076ed4af60221cf869d62d6c89cba9f102c308d83aff1a8', '2019-09-28 06:20:57'),
(13, 'e3ae929a8eab755728235175f8ebd2df', 'Seth Frekin Rolins', 'sethrolin', 'sethrolin@gmail.com', '8799541236', '', 39, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '758291d2286bea0ee46d55b1e69f27505761d6ee0963770dd71f61ec42f99ac1d26fc839bab1e6691fcfaff00c679d590ab807418fa7fe67324347c4a4dcbbac', '', '', '', '93796db09cb321dc1a1d67cf4c465b3130241e5184fafe3006e3606e7e28fb5801f0bf62817a34477df3bfda29e8e3e65012671f80307a23aeeb9cc90ec9bf75', '2019-09-29 08:16:45'),
(14, '098f6bcd4621d373cade4e832627b4f6', 'Test User', 'test', 'test@eme.com', '123456789', '', 1, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '64d09d9930c8ecf79e513167a588cb75439b762ce8f9b22ea59765f32aa74ca19d2f1e97dc922a3d4954594a05062917fb24d1f8e72f2ed02a58ed7534f94d27', '00012345', '00012345', '', '9ece086e9bac491fac5c1d1046ca11d737b92a2b2ebd93f005d7b710110c0a678288166e7fbe796883a4f2e9b3ca9f484f521d0ce464345cc1aec96779149c14', '2019-10-02 11:29:55'),
(15, 'bf7a3d20b5b63c159dac6c3898788388', 'Rohan Reigns', 'gamingking', 'rohanshree66@gmail.com', '9810236103', '', 16, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '', '', '', 'f913fc45ca9fc16de98e0b9cab66cf975ed2c7c74fe8d4c182e76f4b306b5e3b272168653c9a02b29b65b4ae96e2017684938fcb7576d5d421218edc5bee758e', 'e9a75486736a550af4fea861e2378305c4a555a05094dee1dca2f68afea49cc3a50e8de6ea131ea521311f4d6fb054a146e8282f8e35ff2e6368c1a62e909716', '2019-11-25 12:48:59'),
(16, 'a2d88ceb6e9460b1b28773b8227b912d', 'San Disk', 'sandisk', 'sandisk@eme.com', '9869010345', '', 5, '', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', '0a05b98c3dc3859cf1f923b130ebb0df1ebe470365e0112bb3e1f9f61849b20e842fe0515782f51e6c04fae0ac480b7c7c1a679df806355ba42946ef0e81126e', '0a05b98c3dc3859cf1f923b130ebb0df1ebe470365e0112bb3e1f9f61849b20e842fe0515782f51e6c04fae0ac480b7c7c1a679df806355ba42946ef0e81126e', '0a05b98c3dc3859cf1f923b130ebb0df1ebe470365e0112bb3e1f9f61849b20e842fe0515782f51e6c04fae0ac480b7c7c1a679df806355ba42946ef0e81126e', '0a05b98c3dc3859cf1f923b130ebb0df1ebe470365e0112bb3e1f9f61849b20e842fe0515782f51e6c04fae0ac480b7c7c1a679df806355ba42946ef0e81126e', '64ec39c4b370174649b86b4e6b67bfb82ba7fb1e3d2fdbe79a3b88bbeb652f7de0c6c775788691300540ceafab54cb2b62f4638ace2fc12c9ba077c69124025c', '2019-12-10 11:11:06'),
(17, '367251ea82a468e242253207e2c98f27', 'Prem Kumar Tamang', 'prem', 'prem@eme.com', '9806875465', 'male', 23, '', 'https://princeitsolution.000webhostapp.com/Online Voting System/Uploads/voter_images/default_user.jpg', '', '', '', '', '03d7ce949dfff2d67f3e29f713a244392dca185872d17d944c88df2b110c9e85e3605c4942e57fbadf95b7f7beb1fdac5ff1f43a919ac0e871031535a32ff2c1', '2020-04-22 01:06:33'),
(18, '527bd5b5d689e2c32ae974c6229ff785', 'John Cena', 'john', 'john.cena@eme.com', '1154546848', 'male', 39, '', 'https://princeitsolution.000webhostapp.com/Online Voting System/Uploads/voter_images/default_user.jpg', '', '', '', '', '0430c0ebb2398fda098d1acc0372de9b4c73a0e52bad59385a691cf61520f7dcb808fd75789d7094dbf4b452c3b1c9bc8f741cd2cbde2ec354b34a22e22be745', '2020-04-22 01:18:27'),
(19, 'd780182f77b121450849c2b088a444f0', 'Michel Jaction', 'michel', 'michel@eme.com', '9784848488', 'male', 70, '', 'https://princeitsolution.000webhostapp.com/Online Voting System/Uploads/voter_images/default_user.jpg', '', '', '', '', '15fc1de4363fcfcadc7f4a3025950a82855ac62d78665193eb5a120d92fc3cac9f52fd9eead9de154b7df7c5ba943b5f2cb1109ffce82c6bef111407465a74c3', '2020-04-22 01:26:58'),
(20, 'ca921a2d0ec2198978aff61b35dc2e31', 'Rey Mesterio', 'reymes', 'rey.mesterio@eme.com', '1248757878', 'male', 44, '', 'https://princeitsolution.000webhostapp.com/Online Voting System/Uploads/voter_images/default_user.jpg', '', '', '', '', '9b4987a1136d41da6386cb5979ea4920829604170c14b33ab0c5ffd06f1db4f94c22a56f34cd642d89195149a91ba71415ba3f5f7d48f04381eefb3ce17f0409', '2020-04-22 01:29:24'),
(21, '760061f6bfde75c29af12f252d4d3345', 'Rob Vandom', 'rob', 'rob.vandom@eme.com', '1245457878', 'male', 65, '', 'https://princeitsolution.000webhostapp.com/Online Voting System/Uploads/voter_images/default_user.jpg', 'c67eb4c9eb3a8b11c6357987cc82453b9fa48d175da510906ce32fc1f348d2d1ec87965ab676e28207c3409df96fca344766e357f6dda38a9d55092eaf948fff', '', '', '', '90ea6fe19b691fdc57f53e49a990b49cfcfea18627d8e1faf41794373b8f414244df8e21040cd7bc785b394dc68a2511bdf38c5c4b31fc5b686e579595aef9ef', '2020-04-22 01:42:27'),
(22, '43c9060a762d3b7bd230f9ce40df61ce', 'Batista', 'batista', 'batista@eme.com', '9876543210', 'male', 119, '', 'https://princeitsolution.000webhostapp.com/Online Voting System/Uploads/voter_images/default_user.jpg', '1112223', '', '0123456789', '', 'd760688da522b4dc3350e6fb68961b0934f911c7d0ff337438cabf4608789ba94ce70b6601d7e08a279ef088716c4b1913b984513fea4c557d404d0598d4f2f1', '2020-05-12 11:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `obtained_votes`
--

CREATE TABLE `obtained_votes` (
  `ID` int(11) NOT NULL,
  `creator_uid` varchar(600) NOT NULL,
  `election_id` varchar(100) NOT NULL,
  `candidate_id` varchar(600) NOT NULL,
  `candidate_name` varchar(100) NOT NULL,
  `obtained_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` varchar(100) NOT NULL,
  `session_start_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session_start_time`) VALUES
('51ab4782285c521e8edf4da6e88ee640', '2020-05-17 03:11:24'),
('a550fb85efc730c2cf6652f67c623577', '2020-06-19 04:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_action_buttons`
--

CREATE TABLE `user_action_buttons` (
  `id` int(11) NOT NULL,
  `code_name` varchar(20) NOT NULL,
  `menu_icon` varchar(200) NOT NULL,
  `menu_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_action_buttons`
--

INSERT INTO `user_action_buttons` (`id`, `code_name`, `menu_icon`, `menu_name`) VALUES
(1, 'my_polls', 'https://princeitsolution.000webhostapp.com/ovs_icons/home.png', 'My Polls'),
(2, 'add_new_poll', 'https://princeitsolution.000webhostapp.com/ovs_icons/add.png', 'Add New Poll'),
(3, 'elections', 'https://princeitsolution.000webhostapp.com/ovs_icons/poll.png', 'Elections'),
(4, 'message', 'https://princeitsolution.000webhostapp.com/ovs_icons/messages.png', 'Message'),
(5, 'notification', 'https://princeitsolution.000webhostapp.com/ovs_icons/notification.png', 'Notification'),
(6, 'settings', 'https://princeitsolution.000webhostapp.com/ovs_icons/settings.png', 'Settings');

-- --------------------------------------------------------

--
-- Table structure for table `voted_voters`
--

CREATE TABLE `voted_voters` (
  `ID` int(11) NOT NULL,
  `voter_id` varchar(100) NOT NULL,
  `full_name` varchar(800) NOT NULL,
  `election_id` varchar(100) NOT NULL,
  `vote_status` varchar(10) NOT NULL,
  `vote_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voted_voters`
--

INSERT INTO `voted_voters` (`ID`, `voter_id`, `full_name`, `election_id`, `vote_status`, `vote_date`) VALUES
(1, '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2019-09-26 00:00:00'),
(2, '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', '75dab1e83d0a290c546764e9fa0751d9', 'Voted', '2019-09-27 00:00:00'),
(3, '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'Voted', '2019-09-27 00:00:00'),
(4, 'e3480a8108a815dcfacfecda86a31889', 'Pallavi Uppreti', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2019-09-28 08:43:31'),
(5, 'b179a9ec0777eae19382c14319872e1b', 'Roman Range', '75dab1e83d0a290c546764e9fa0751d9', 'Voted', '2019-09-28 09:00:15'),
(6, '0cb1eb413b8f7cee17701a37a1d74dc3', 'Amit Yadav', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'Voted', '2019-09-28 10:07:34'),
(7, 'ad45925cd47fb82d190499a24b88a573', 'Prem Kumar Tamang', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2019-09-28 10:44:14'),
(8, '1e44d0e414f07d43a2a8a2ffc1f819f2', 'Ashmita Lamichhne', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'Voted', '2019-09-28 10:26:28'),
(9, 'b4caefa3d450d0e36e183160d17aba24', 'Subash Budhathoki', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'Voted', '2019-09-28 10:29:30'),
(10, '385c1296298781e025c52fa1e8be9272', 'Pratima KC', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'Voted', '2019-09-28 12:30:29'),
(11, 'e3480a8108a815dcfacfecda86a31889', 'Pallavi Uppreti', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'Voted', '2019-09-28 12:32:29'),
(12, 'e3480a8108a815dcfacfecda86a31889', 'Pallavi Uppreti', '75dab1e83d0a290c546764e9fa0751d9', 'Voted', '2019-09-28 10:30:32'),
(13, 'e3480a8108a815dcfacfecda86a31889', 'Pallavi Uppreti', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2019-09-28 13:29:25'),
(14, 'b179a9ec0777eae19382c14319872e1b', 'Roman Range', '75dab1e83d0a290c546764e9fa0751d9', 'Voted', '2019-09-28 09:22:26'),
(15, '0cb1eb413b8f7cee17701a37a1d74dc3', 'Amit Yadav', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'Voted', '2019-09-28 12:31:29'),
(16, 'ad45925cd47fb82d190499a24b88a573', 'Prem Kumar Tamang', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2019-09-28 10:27:29'),
(17, 'e3ae929a8eab755728235175f8ebd2df', 'Seth Frekin Rolins', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2019-09-30 10:13:41'),
(18, '098f6bcd4621d373cade4e832627b4f6', 'Test User', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2019-10-02 03:18:52'),
(22, '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', '02c75db3984f9d92789d99962dcbb562', 'Voted', '2019-10-04 12:27:57'),
(23, 'bf7a3d20b5b63c159dac6c3898788388', 'Rohan Reigns', '02c75db3984f9d92789d99962dcbb562', 'Voted', '2019-11-25 05:38:00'),
(24, '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2019-12-10 03:46:29'),
(25, 'a2d88ceb6e9460b1b28773b8227b912d', 'San Disk', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2019-12-10 04:00:57'),
(26, 'a2d88ceb6e9460b1b28773b8227b912d', 'San Disk', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'Voted', '2019-12-10 04:08:05'),
(27, 'a2d88ceb6e9460b1b28773b8227b912d', 'San Disk', '75dab1e83d0a290c546764e9fa0751d9', 'Voted', '2019-12-10 04:08:37'),
(28, 'a2d88ceb6e9460b1b28773b8227b912d', 'San Disk', '02c75db3984f9d92789d99962dcbb562', 'Voted', '2019-12-10 04:09:18'),
(29, '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'Voted', '2020-04-16 11:56:49'),
(30, '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2020-04-16 12:24:17'),
(31, '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', '4491c16c3f3d8dac72c0939e27b3ea90', 'Voted', '2020-04-16 01:37:29'),
(32, '098f6bcd4621d373cade4e832627b4f6', 'Test User', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2020-04-16 07:16:23'),
(33, '098f6bcd4621d373cade4e832627b4f6', 'Test User', '75dab1e83d0a290c546764e9fa0751d9', 'Voted', '2020-05-13 07:12:20'),
(34, '098f6bcd4621d373cade4e832627b4f6', 'Test User', '4fffa29034a844dfbc74a75b8d17f8e6', 'Voted', '2020-05-13 08:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `vote_permission`
--

CREATE TABLE `vote_permission` (
  `ID` int(11) NOT NULL,
  `creator_uid` varchar(600) NOT NULL,
  `election_id` varchar(100) NOT NULL,
  `election_name` varchar(100) NOT NULL,
  `voter_id` varchar(600) NOT NULL,
  `voter_name` varchar(80) NOT NULL,
  `voter_photo` varchar(200) NOT NULL,
  `vote_permission` varchar(4) NOT NULL,
  `vote_status` varchar(10) NOT NULL,
  `voted_time` datetime NOT NULL,
  `election_join_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote_permission`
--

INSERT INTO `vote_permission` (`ID`, `creator_uid`, `election_id`, `election_name`, `voter_id`, `voter_name`, `voter_photo`, `vote_permission`, `vote_status`, `voted_time`, `election_join_date`) VALUES
(1, 'e01cd06821968fb172f9790c2823ec32', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2020-04-16 12:24:17', '2019-09-26 07:09:33'),
(2, 'e01cd06821968fb172f9790c2823ec32', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/PS.png', 'Yes', 'Voted', '2020-04-16 11:56:49', '2019-09-27 02:20:24'),
(3, 'e01cd06821968fb172f9790c2823ec32', '75dab1e83d0a290c546764e9fa0751d9', 'New GM Selection', '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-27 05:53:12', '2019-09-27 03:47:26'),
(5, 'e01cd06821968fb172f9790c2823ec32', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', '15c041aad623e58ed0572a9c1f555a4d', 'Aashish Thapa Magar', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 07:31:52', '2019-09-28 07:31:12'),
(6, 'e01cd06821968fb172f9790c2823ec32', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', 'ad45925cd47fb82d190499a24b88a573', 'Prem Kumar Tamang', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 07:40:04', '2019-09-28 07:39:21'),
(7, 'e01cd06821968fb172f9790c2823ec32', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', '4f9fecabbd77fba02d2497f880f44e6f', 'Vijay Karki', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 07:49:22', '2019-09-28 07:48:52'),
(8, 'e01cd06821968fb172f9790c2823ec32', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', '1e44d0e414f07d43a2a8a2ffc1f819f2', 'Ashmita Lamichhne', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 07:56:01', '2019-09-28 07:55:08'),
(9, 'e01cd06821968fb172f9790c2823ec32', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', 'b4caefa3d450d0e36e183160d17aba24', 'Subash Budhathoki', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 07:58:30', '2019-09-28 07:58:09'),
(10, 'e01cd06821968fb172f9790c2823ec32', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', '385c1296298781e025c52fa1e8be9272', 'Pratima KC', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 08:15:27', '2019-09-28 08:14:59'),
(11, 'e01cd06821968fb172f9790c2823ec32', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', 'e3480a8108a815dcfacfecda86a31889', 'Pallavi Uppreti', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 08:22:51', '2019-09-28 08:22:27'),
(12, 'e01cd06821968fb172f9790c2823ec32', '75dab1e83d0a290c546764e9fa0751d9', 'New GM Selection', 'e3480a8108a815dcfacfecda86a31889', 'Pallavi Uppreti', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 08:27:35', '2019-09-28 08:27:08'),
(13, 'e01cd06821968fb172f9790c2823ec32', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', 'e3480a8108a815dcfacfecda86a31889', 'Pallavi Uppreti', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 08:43:31', '2019-09-28 08:42:55'),
(14, 'e01cd06821968fb172f9790c2823ec32', '75dab1e83d0a290c546764e9fa0751d9', 'New GM Selection', 'b179a9ec0777eae19382c14319872e1b', 'Roman Range', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 09:00:15', '2019-09-28 08:59:45'),
(15, 'e01cd06821968fb172f9790c2823ec32', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', '0cb1eb413b8f7cee17701a37a1d74dc3', 'Amit Yadav', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 10:07:34', '2019-09-28 10:06:54'),
(16, 'e01cd06821968fb172f9790c2823ec32', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', 'ad45925cd47fb82d190499a24b88a573', 'Prem Kumar Tamang', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-28 10:44:14', '2019-09-28 10:43:52'),
(17, 'e01cd06821968fb172f9790c2823ec32', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', 'e3ae929a8eab755728235175f8ebd2df', 'Seth Frekin Rolins', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-09-30 10:13:41', '2019-09-29 12:20:20'),
(18, 'e01cd06821968fb172f9790c2823ec32', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', '098f6bcd4621d373cade4e832627b4f6', 'Test User', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2020-05-13 08:45:47', '2019-10-02 03:16:41'),
(19, 'e01cd06821968fb172f9790c2823ec32', '02c75db3984f9d92789d99962dcbb562', 'Choosing CR', '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-10-04 12:27:57', '2019-10-03 11:14:14'),
(20, 'e01cd06821968fb172f9790c2823ec32', '02c75db3984f9d92789d99962dcbb562', 'Choosing CR', 'bf7a3d20b5b63c159dac6c3898788388', 'Rohan Reigns', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-11-25 05:38:00', '2019-11-25 05:36:02'),
(21, 'e01cd06821968fb172f9790c2823ec32', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', 'a2d88ceb6e9460b1b28773b8227b912d', 'San Disk', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-12-10 04:00:57', '2019-12-10 03:57:59'),
(22, 'e01cd06821968fb172f9790c2823ec32', 'b307c5ec2f437b3edede3ecfee2eb2cd', 'New College Leader', 'a2d88ceb6e9460b1b28773b8227b912d', 'San Disk', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-12-10 04:08:05', '2019-12-10 04:05:42'),
(23, 'e01cd06821968fb172f9790c2823ec32', '75dab1e83d0a290c546764e9fa0751d9', 'New GM Selection', 'a2d88ceb6e9460b1b28773b8227b912d', 'San Disk', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-12-10 04:08:37', '2019-12-10 04:06:18'),
(24, 'e01cd06821968fb172f9790c2823ec32', '02c75db3984f9d92789d99962dcbb562', 'Choosing CR', 'a2d88ceb6e9460b1b28773b8227b912d', 'San Disk', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2019-12-10 04:09:18', '2019-12-10 04:06:50'),
(25, 'e01cd06821968fb172f9790c2823ec32', '4491c16c3f3d8dac72c0939e27b3ea90', 'Heros', '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'http://192.168.144.144/Online Voting System/Admin CP/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2020-04-16 01:37:29', '2020-04-16 12:24:55'),
(28, '098f6bcd4621d373cade4e832627b4f6', 'c1eaf0b8fb7ef1514aca0de0c85b28b4', 'Test New Election', '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', 'Yes', 'Not Voted', '0000-00-00 00:00:00', '2020-04-27 07:43:50'),
(29, 'e01cd06821968fb172f9790c2823ec32', '75dab1e83d0a290c546764e9fa0751d9', 'New GM Selection', '098f6bcd4621d373cade4e832627b4f6', 'Test User', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', 'Yes', 'Voted', '2020-05-13 07:12:20', '2020-04-30 11:25:45'),
(30, '098f6bcd4621d373cade4e832627b4f6', 'c1eaf0b8fb7ef1514aca0de0c85b28b4', 'Test New Election', '098f6bcd4621d373cade4e832627b4f6', 'Test User', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', 'Yes', 'Not Voted', '0000-00-00 00:00:00', '2020-05-03 05:06:04'),
(31, '23dd9762f5d9593dbb01b5ec61359f53', '4491c16c3f3d8dac72c0939e27b3ea90', 'Heros', '098f6bcd4621d373cade4e832627b4f6', 'Test User', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', 'Yes', 'Not Voted', '0000-00-00 00:00:00', '2020-05-03 05:08:44'),
(34, '23dd9762f5d9593dbb01b5ec61359f53', 'e068a7eded307ad6a47a0f313a1823d4', 'Which Is First In Comppetion', '098f6bcd4621d373cade4e832627b4f6', 'Test User', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', 'Yes', 'Not Voted', '0000-00-00 00:00:00', '2020-05-03 07:44:58'),
(35, '23dd9762f5d9593dbb01b5ec61359f53', '69989298df36e5c87e73cd3aa711244c', 'New General Election', '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', 'Yes', 'Not Voted', '0000-00-00 00:00:00', '2020-05-04 06:28:04'),
(36, '23dd9762f5d9593dbb01b5ec61359f53', 'e60074c0ef53b4bafdd3debd27dfdcd6', 'Test Election', '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', 'Yes', 'Not Voted', '0000-00-00 00:00:00', '2020-05-07 03:55:19'),
(37, '23dd9762f5d9593dbb01b5ec61359f53', '201abf1d399a3c01a06c1e3fd8754d68', 'Samsung Winner', '23dd9762f5d9593dbb01b5ec61359f53', 'Prince Sanem', 'https://princeitsolution.000webhostapp.com/Uploads/voter_images/default_user.jpg', 'Yes', 'Not Voted', '0000-00-00 00:00:00', '2020-05-12 05:34:08'),
(38, '23dd9762f5d9593dbb01b5ec61359f53', '201abf1d399a3c01a06c1e3fd8754d68', 'Samsung Winner', '43c9060a762d3b7bd230f9ce40df61ce', 'Batista', 'https://princeitsolution.000webhostapp.com/Online Voting System/Uploads/voter_images/default_user.jpg', 'Yes', 'Not Voted', '0000-00-00 00:00:00', '2020-05-12 05:40:28'),
(39, '098f6bcd4621d373cade4e832627b4f6', 'c1eaf0b8fb7ef1514aca0de0c85b28b4', 'Test New Election', '43c9060a762d3b7bd230f9ce40df61ce', 'Batista', 'https://princeitsolution.000webhostapp.com/Online Voting System/Uploads/voter_images/default_user.jpg', 'Yes', 'Not Voted', '0000-00-00 00:00:00', '2020-05-12 05:40:45'),
(40, 'e01cd06821968fb172f9790c2823ec32', '4fffa29034a844dfbc74a75b8d17f8e6', 'New Prime Minister Selection', '43c9060a762d3b7bd230f9ce40df61ce', 'Batista', 'https://princeitsolution.000webhostapp.com/Online Voting System/Uploads/voter_images/default_user.jpg', 'Yes', 'Not Voted', '0000-00-00 00:00:00', '2020-05-12 05:41:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `admin_id` (`admin_id`,`Username`,`Email`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `election_id` (`election_id`),
  ADD UNIQUE KEY `election_name` (`election_name`);

--
-- Indexes for table `election_candidates`
--
ALTER TABLE `election_candidates`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `can_id` (`cand_id`),
  ADD UNIQUE KEY `cand_id` (`cand_id`);

--
-- Indexes for table `election_voters`
--
ALTER TABLE `election_voters`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `voter_id` (`voter_id`),
  ADD UNIQUE KEY `username` (`username`,`email`,`phone`,`college_id`,`office_id`,`school_id`);

--
-- Indexes for table `obtained_votes`
--
ALTER TABLE `obtained_votes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `user_action_buttons`
--
ALTER TABLE `user_action_buttons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voted_voters`
--
ALTER TABLE `voted_voters`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `vote_permission`
--
ALTER TABLE `vote_permission`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `election_candidates`
--
ALTER TABLE `election_candidates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `election_voters`
--
ALTER TABLE `election_voters`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `obtained_votes`
--
ALTER TABLE `obtained_votes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_action_buttons`
--
ALTER TABLE `user_action_buttons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `voted_voters`
--
ALTER TABLE `voted_voters`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vote_permission`
--
ALTER TABLE `vote_permission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
