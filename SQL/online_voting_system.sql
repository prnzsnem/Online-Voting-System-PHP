-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 03:29 PM
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
  `password` varchar(255) NOT NULL,
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
(1, 'e01cd06821968fb172f9790c2823ec32', 'princesanem', 'princesanem@eme.com', '7ccd70b7acd8ccfe5662c939b18093f6', 'Prince Sanem', 'Male', 'Mulpani', 9869010345, 22, './../Uploads/user_images/Different PS Logo.jpg', 'Kathmandu', 'Kathmandu', 'Mulpani', '2019-08-16 01:50:39', '2019-08-16 03:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_info`
--

CREATE TABLE `candidate_info` (
  `ID` int(11) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `candidate_image` varchar(255) NOT NULL,
  `vote_symbol` varchar(100) NOT NULL,
  `obtained_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_info`
--

INSERT INTO `candidate_info` (`ID`, `full_name`, `party_name`, `candidate_image`, `vote_symbol`, `obtained_votes`) VALUES
(1, 'Sher Badhur Deuba', 'Congress', './../Uploads/candidate/National Election/ic_deuba.png', './../Uploads/party_logo/National Election/ic_congresssign.png', 3),
(2, 'Khadka Parsad Sharma Oli', 'NCP Yemale', './../Uploads/candidate/National Election/ic_kpoli.png', './../Uploads/party_logo/National Election/ic_yemalesign.png', 1),
(3, 'Puspa Kamal Dahal', 'NCP Maoist', './../Uploads/candidate/National Election/ic_prachanda.png', './../Uploads/party_logo/National Election/ic_maoistsign.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `ID` int(255) NOT NULL,
  `Name` varchar(800) NOT NULL,
  `Citizenship_Number` varchar(800) NOT NULL,
  `Vote_Status` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`ID`, `Name`, `Citizenship_Number`, `Vote_Status`) VALUES
(1, 'c56e27145c45fe5474731d47a9b45d1628da8957cdd169c1cdd8b2354d07e4eb37d30f886b316aa35bcbb727646681af7b671835e3dae557232804ec430693b3', '09c09e9c01d610fc1d96968aae2eaeea06367a7aeb63a9d9e97d46385c7aabfae6c772b93f9644ee94f870d177024ff2ebcf2fd8227f9d46823964fd8458afc2', 'Not Voted'),
(6, 'db148fdad9ccd481499ae2df4e99b8b857ac76a37d38c74b4b4e8a8a0aed9023007f84cda1790a11cec09614b36c50837a1e3f427c391cfe3c7f2640e5a94863', '29b2e1681dfd73239c8e43c8389ec3c9e04ad8c6dc584746cd660026753940f119c656d8b5b3473cdb02de00d86d7dec62ea70c5e440a9e767ffba126154e378', 'Not Voted'),
(49, '901b22203e8d398805c7b1aedd7813be16b7f11078fcbee168f1f38bdb5057e8762b8c719e640ff47efba07b6d2f6d3d43d66df0be41f8980e460c892b4f0934', '2cc577dfe3e46114c02221406af5937cb6813274aaf9c7a029d58b695785b29d3f69299958d64784aae74298f82a913b855f3f065aaf5f82df0a41e45c7b778f', 'Not Voted'),
(2, '5cb95358788083d70ef96f2fad3a50ab2213413ce55e513677f62aa64beda6363d7c4d569d64a0f06fde5340d6623d4afafec98491fbf0fe0c81eb15383bcdfa', '2f773d30d3467234a03dfed290b51ce1fdff07865275307de2a94a6ad12aaa967012e9c428245afb1411480a9cca7c5c7712bbb2bf34f959f8bd42e7c5b387cb', 'Not Voted'),
(5, '6cd687b8796402d94748cb3ab8e5fefacd0e126096472ef4c2385a29f2ca211ff31812409ebfb46afc3193d328e447209cb7c6e6b5b33bceb5c8e6ed191bc132', '31e7ba4696b55c2d44784c5ce9714803939a00a982dbb94773b2df4d1d51de2b0f5f2a1311067d17b6682ab32d89d0c8f2da4b6120e9bc09cf4c62ff87681bce', 'Not Voted'),
(51, '659e325948edd91ac762688bcb433a9192e4dfc978e74a02b1f9cf8b4ba1caa54952499d744d84eed074ef90c5cc2fd8e3e7781ceecbe8c3278dc5add69145da', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', 'Not Voted'),
(53, 'f9f7acaffd6a1c3787f1d746cb99b2c726a0a35cae7b4738e5d8ca4196ddadf9e43b1adeaaf6f3b45b9c4a6e8b7f94fe71fce7d1a57898e6a0b51214588e107e', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Not Voted'),
(52, '5bef556d433e78e1fd585af82aacf3778d447bfbff506d34a50964fd742093a6970fa93e35257d96ef397198a049ab6f56b3e2746d9db89227812024d862a8ba', '4c1afdfd95411e41ff3d93a6c2a112cdd9671736afad34926a298d40d803884992f4320c6d0ed188d6f4026f659f717078b1b33edd288c31ec99f4ea3b3b47a9', 'Voted'),
(7, '48d43defa231887b8c98e2f90c253ecf48c4786dfc2788ea9f89634753d8ee7ca5721420913199568ad1d3cb385e74f1caee2d629290de27768708ecefdbef91', '642cff2cb7c9c856658dcf64a453c3dc3b6b38fbe62c363c544abd61060b9912a0c3ff2911c2b92711be5a0743a4b6287377698507e52fe7d48bbe7609170433', 'Not Voted'),
(48, 'fbeb38f0a14353f57ee782939e3fc8e18be36d297044d686f1c4aa32f1ed8d9117113417700b655e2acb15ddcedb881609722ab39471b7495e2bc35b0884b7b3', '6c130bebc6900d0c77f99a93106f56d0d87f70be44d87946534f2c9c4242f6fbc5b0cb817bc8ff971542397f2b4a75a81289eaf85c21cdd2286659138bcfcacc', 'Not Voted'),
(50, '963d94cc57186aa61a0fdb91d78e595efd04609e59bbba57bf4b3dd58566c1a3f7091f4f0d612dc73465f1a448d3fec50a8fd1357e8880044402118241732084', 'a7de78f5b4d7b66b6424f7ee3503095a97d3a432dcc3834d14431b3afed198e73a32d3d92a813747d0691326c5c677159a1184deb5912eeaf3af9fa6fc9ec70b', 'Not Voted'),
(54, 'c56e27145c45fe5474731d47a9b45d1628da8957cdd169c1cdd8b2354d07e4eb37d30f886b316aa35bcbb727646681af7b671835e3dae557232804ec430693b3', 'b67c89819166b98c410f6337c252584d242f2eccc07a2a7243a9c243f53024834c4e46c7e51148461dda0457fbb6ee3eb7bfe55c2cda4e6fa7434657cae5f7af', 'Voted'),
(8, 'c6ee9e33cf5c6715a1d148fd73f7318884b41adcb916021e2bc0e800a5c5dd97f5142178f6ae88c8fdd98e1afb0ce4c8d2c54b5f37b30b7da1997bb33b0b8a31', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Voted'),
(18, '6aa299ec3978caabeed64252e1eb6ee9f6c912b269f9a360aa35ae5a77467f69bea0c33c047fe55405da3af11b7442ba91cad3f20441cc761c4e2c7db5ef96d8', 'eb5661b300114243379c265744b7ba0a01a346d8053cc7a358656f41a35b9f09cd78cc4d6361c6c02b6958fcc96f69d6b04c3359e21ef1c8b6c6296043999571', 'Not Voted'),
(3, '5113a8a3d69eed98bfe0160ce1022c9633c2b8c3d6f77c5e76b535c5841fbaf17f5946f7a4f59f33f1064822a428fc3cdcc2ee3a339f4b7e19c0cfbf6d9e4bd4', 'f25d2ae37abbc6ec30fdda8eed85b7ad3b23f16de5bff8fbfc185aa35612ce9dfb88c7d14c8902ed7b330785d74d905a9b40202189229bdd4d3081ed8c56496a', 'Not Voted');

-- --------------------------------------------------------

--
-- Table structure for table `citizens_fingerprint`
--

CREATE TABLE `citizens_fingerprint` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `citizenship_number` int(255) NOT NULL,
  `fingerprint_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citizens_fingerprint`
--

INSERT INTO `citizens_fingerprint` (`ID`, `Name`, `citizenship_number`, `fingerprint_data`) VALUES
(1, 'Prince Sanem', 1, 'fe44sdf324');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `ID` int(11) NOT NULL,
  `election_id` varchar(40) NOT NULL,
  `election_type` varchar(40) NOT NULL,
  `election_name` varchar(80) NOT NULL,
  `no_of_candidates` int(11) NOT NULL,
  `election_start_date` datetime NOT NULL,
  `election_end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`ID`, `election_id`, `election_type`, `election_name`, `no_of_candidates`, `election_start_date`, `election_end_date`) VALUES
(1, 'natele2075', 'National', 'National Election', 3, '2019-08-21 11:23:33', '2019-08-25 09:35:29'),
(2, '0db377921f4ce762c62526131097968f', 'General', 'Test', 2, '2019-08-13 00:00:00', '2019-08-07 00:00:00'),
(3, '2806259c227f694c678ec9444aec2042', 'College', 'College Election', 3, '2019-08-21 00:00:00', '2019-08-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ne_votes`
--

CREATE TABLE `ne_votes` (
  `ID` int(10) NOT NULL,
  `Congress_Vote` int(10) NOT NULL,
  `Maoist_Vote` int(10) NOT NULL,
  `Yemale_Vote` int(10) NOT NULL,
  `Total_Votes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ne_votes`
--

INSERT INTO `ne_votes` (`ID`, `Congress_Vote`, `Maoist_Vote`, `Yemale_Vote`, `Total_Votes`) VALUES
(1, 2, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `other_election_candidate_info`
--

CREATE TABLE `other_election_candidate_info` (
  `ID` int(11) NOT NULL,
  `cand_id` varchar(40) NOT NULL,
  `election_type` varchar(40) NOT NULL,
  `election_name` varchar(40) NOT NULL,
  `cand_name` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `party_name` varchar(40) NOT NULL,
  `cand_photo` varchar(100) NOT NULL,
  `address` varchar(80) NOT NULL,
  `vote_symbol` varchar(100) NOT NULL,
  `obtained_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_election_candidate_info`
--

INSERT INTO `other_election_candidate_info` (`ID`, `cand_id`, `election_type`, `election_name`, `cand_name`, `gender`, `age`, `party_name`, `cand_photo`, `address`, `vote_symbol`, `obtained_votes`) VALUES
(1, '6336bad38097e3b213644d85f066d7fc', 'General', 'Test Election', 'Ramae bdr shyame', 'Male', 90, 'Hamro party', './../Uploads/user_images/IMG20190203101007.jpg', 'candAddress', './../Uploads/candidate/Other Election/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ovs_users`
--

CREATE TABLE `ovs_users` (
  `ID` int(11) NOT NULL,
  `user_id` varchar(80) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `ID` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `session_start_time` datetime NOT NULL,
  `session_end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`ID`, `session_id`, `session_start_time`, `session_end_time`) VALUES
(25, 'a29096a85c678b6bf0693a5b681061dd', '2019-08-16 01:46:13', '0000-00-00 00:00:00'),
(1, 'a550fb85efc730c2cf6652f67c623577', '2019-08-16 08:49:17', '0000-00-00 00:00:00'),
(23, 'b4b31baecd009efd9efed693becc8382', '2019-08-16 01:43:31', '0000-00-00 00:00:00'),
(20, 'bb4c46bc141bf4a986232e6929a26b37', '2019-08-16 01:29:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `ID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `ID` int(255) NOT NULL,
  `Full_Name` varchar(800) NOT NULL,
  `Citizenship_No` varchar(800) NOT NULL,
  `Vote_Status` varchar(10) NOT NULL,
  `Vote_Date` date NOT NULL,
  `Vote_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`ID`, `Full_Name`, `Citizenship_No`, `Vote_Status`, `Vote_Date`, `Vote_Time`) VALUES
(1, '5bef556d433e78e1fd585af82aacf3778d447bfbff506d34a50964fd742093a6970fa93e35257d96ef397198a049ab6f56b3e2746d9db89227812024d862a8ba', '4c1afdfd95411e41ff3d93a6c2a112cdd9671736afad34926a298d40d803884992f4320c6d0ed188d6f4026f659f717078b1b33edd288c31ec99f4ea3b3b47a9', 'Voted', '2019-08-15', '01:17:42'),
(3, 'c56e27145c45fe5474731d47a9b45d1628da8957cdd169c1cdd8b2354d07e4eb37d30f886b316aa35bcbb727646681af7b671835e3dae557232804ec430693b3', 'b67c89819166b98c410f6337c252584d242f2eccc07a2a7243a9c243f53024834c4e46c7e51148461dda0457fbb6ee3eb7bfe55c2cda4e6fa7434657cae5f7af', 'Voted', '2019-08-15', '03:20:31'),
(2, 'c6ee9e33cf5c6715a1d148fd73f7318884b41adcb916021e2bc0e800a5c5dd97f5142178f6ae88c8fdd98e1afb0ce4c8d2c54b5f37b30b7da1997bb33b0b8a31', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Voted', '2019-08-15', '01:08:41');

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
-- Indexes for table `candidate_info`
--
ALTER TABLE `candidate_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`Citizenship_Number`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `citizens_fingerprint`
--
ALTER TABLE `citizens_fingerprint`
  ADD PRIMARY KEY (`citizenship_number`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `election_id` (`election_id`);

--
-- Indexes for table `ne_votes`
--
ALTER TABLE `ne_votes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `other_election_candidate_info`
--
ALTER TABLE `other_election_candidate_info`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `can_id` (`cand_id`),
  ADD UNIQUE KEY `cand_id` (`cand_id`);

--
-- Indexes for table `ovs_users`
--
ALTER TABLE `ovs_users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`,`username`,`phone`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`Citizenship_No`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidate_info`
--
ALTER TABLE `candidate_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `citizens`
--
ALTER TABLE `citizens`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `other_election_candidate_info`
--
ALTER TABLE `other_election_candidate_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `ovs_users`
--
ALTER TABLE `ovs_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
