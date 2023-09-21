-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 07:38 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vertual_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `cateringmenu`
--

CREATE TABLE `cateringmenu` (
  `cateringServiceid` varchar(30) DEFAULT NULL,
  `menuid` int(11) NOT NULL,
  `number_of_meals_a_day` int(11) NOT NULL,
  `subscription_fee_monthly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cateringmenu`
--

INSERT INTO `cateringmenu` (`cateringServiceid`, `menuid`, `number_of_meals_a_day`, `subscription_fee_monthly`) VALUES
('habib@gmail.com', 1, 3, 3000),
('arman@gmail.com', 2, 3, 2700);

-- --------------------------------------------------------

--
-- Table structure for table `cateringservice`
--

CREATE TABLE `cateringservice` (
  `cateringServiceid` varchar(30) NOT NULL,
  `cateringServiceName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cateringservice`
--

INSERT INTO `cateringservice` (`cateringServiceid`, `cateringServiceName`) VALUES
('arman@gmail.com', 'Armans kitchen'),
('habib@gmail.com', 'Habibs Kitchen');

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `landlordid` varchar(30) NOT NULL,
  `area` int(11) NOT NULL,
  `which_floor` int(11) DEFAULT 1,
  `number_of_rooms` int(11) DEFAULT NULL,
  `rent` int(11) NOT NULL,
  `Preference` varchar(30) DEFAULT 'Any'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`landlordid`, `area`, `which_floor`, `number_of_rooms`, `rent`, `Preference`) VALUES
('anam@gmail.com', 1500, 3, 3, 12000, 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `housekeeper`
--

CREATE TABLE `housekeeper` (
  `houseKeeperid` varchar(30) NOT NULL,
  `experience_years` varchar(30) DEFAULT NULL,
  `working_days_in_a_week` int(11) DEFAULT 7,
  `wage_weekly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `housekeeper`
--

INSERT INTO `housekeeper` (`houseKeeperid`, `experience_years`, `working_days_in_a_week`, `wage_weekly`) VALUES
('junaed@gmail.com', '1', 3, 600);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `subdistrict` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `passcode` varchar(30) NOT NULL,
  `landlordid` varchar(30) DEFAULT NULL,
  `houseKeeperid` varchar(30) DEFAULT NULL,
  `cateringServiceid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `dob`, `gender`, `marital_status`, `email`, `city`, `subdistrict`, `contact`, `passcode`, `landlordid`, `houseKeeperid`, `cateringServiceid`) VALUES
('Anam Ibn Jafar', '2011-10-19', 'male', 'single', 'anam@gmail.com', 'Dhaka', 'Boshundhara', '+8801981284756', 'Anam', 'anam@gmail.com', NULL, NULL),
('Mohammad Arman', '2006-03-21', 'male', 'Single', 'arman@gmail.com', 'Dhaka', 'Mirpur', '+8801823534532', 'Arman', NULL, NULL, 'arman@gmail.com'),
('Habib Wahid', '2004-03-10', 'male', 'Single', 'habib@gmail.com', 'Dhaka', 'Dhanmondi', '+8801871695443', 'Habib', NULL, NULL, 'habib@gmail.com'),
('Junaed Iqbal', '2003-03-05', 'male', 'Single', 'junaed@gmail.com', 'Dhaka', 'Mohammadpur', '+8801871643567', 'Junaed', NULL, 'junaed@gmail.com', NULL),
('Liu Das ', '2013-07-17', 'male', 'Single', 'liu@gmail.com', 'Dhaka', 'Mohammadpur', '+8801584938495', 'Liu', NULL, NULL, NULL),
('Nusrat Jahan', '2002-03-06', 'male', 'Married', 'nusrat@gmail.com', 'Dhaka', 'Dhanmondi', '+8801871695487', 'Nusrat', NULL, NULL, NULL),
('Shakib Khan', '2002-03-06', 'male', 'Married', 'sk@gmail.com', 'Dhaka', 'Dhanmondi', '+8801871695487', 'Shakib', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cateringmenu`
--
ALTER TABLE `cateringmenu`
  ADD PRIMARY KEY (`menuid`),
  ADD KEY `fk_menu` (`cateringServiceid`);

--
-- Indexes for table `cateringservice`
--
ALTER TABLE `cateringservice`
  ADD PRIMARY KEY (`cateringServiceid`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`landlordid`);

--
-- Indexes for table `housekeeper`
--
ALTER TABLE `housekeeper`
  ADD PRIMARY KEY (`houseKeeperid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_landlord` (`landlordid`),
  ADD KEY `fk_housekeeper` (`houseKeeperid`),
  ADD KEY `fk_cateringservice` (`cateringServiceid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cateringmenu`
--
ALTER TABLE `cateringmenu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cateringmenu`
--
ALTER TABLE `cateringmenu`
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`cateringServiceid`) REFERENCES `cateringservice` (`cateringServiceid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cateringservice`
--
ALTER TABLE `cateringservice`
  ADD CONSTRAINT `fk_cservice` FOREIGN KEY (`cateringServiceid`) REFERENCES `users` (`cateringServiceid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flats`
--
ALTER TABLE `flats`
  ADD CONSTRAINT `fk_flats` FOREIGN KEY (`landlordid`) REFERENCES `users` (`landlordid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `housekeeper`
--
ALTER TABLE `housekeeper`
  ADD CONSTRAINT `fk_keepers` FOREIGN KEY (`houseKeeperid`) REFERENCES `users` (`houseKeeperid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_cateringservice` FOREIGN KEY (`cateringServiceid`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `fk_housekeeper` FOREIGN KEY (`houseKeeperid`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `fk_landlord` FOREIGN KEY (`landlordid`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
