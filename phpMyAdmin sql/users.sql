-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 07:22 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_user_data`
--

CREATE TABLE `app_user_data` (
  `ic_num` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_user_data`
--

INSERT INTO `app_user_data` (`ic_num`, `phone`, `email`, `password`, `status_code`) VALUES
('670704105685', '0112345678', 'aiman@gmail.com', '9efa918bd3943451434dee45c983420031ef15ca', 0),
('741211105674', '01165222777', 'ali@gmail.com', '792faa46d69a0d0fc1afcdd037694d67a92590bd', 0),
('940506104564', '0133356635', 'naquibza2@gmail.com', 'f23c0c10b53142c49a5c5f9468163c245b2661c6', 0),
('970707105757', '01157578989', 'amirr@gmail.com', '2fb090b65a345537eda678c41fd3ad539e634d14', 0),
('980405764567', '01154777333', 'test@gmail.com', '75e097e6aaf7d128aedcbdf77c4c13b397a9b1a8', 0),
('980624145606', '0113425678', 'arissa@gmail.com', '371e6ffae664b83bdcf784b1011dc39a3aa304e1', 0),
('980704105686', '01152777999', 'khairunaquib@gmail.com', '371e6ffae664b83bdcf784b1011dc39a3aa304e1', 1),
('990704105685', '0123111999', 'kamal@gmail.com', '39931a201a62c90366240f4ae7204df2fe249b8b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `case_id` int(11) NOT NULL,
  `user_ic` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `covid_status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `case_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `user_ic`, `covid_status`, `case_date`) VALUES
(2, '670704105685', '1', '2021-07-09'),
(3, '', '1', '2021-07-09'),
(4, '', '1', '2021-07-09'),
(5, '', '1', '2021-07-09'),
(6, '', '1', '2021-07-09'),
(7, '670704105685', '1', '2021-07-09'),
(8, '', '1', '2021-07-09'),
(9, '970707105757', '1', '2021-07-09'),
(10, '', '0', '2021-07-09'),
(11, '', '1', '2021-07-09'),
(12, '', '1', '2021-07-09'),
(13, '', '1', '2021-07-09'),
(14, '', '1', '2021-07-09'),
(15, '', '1', '2021-07-09'),
(16, '', '1', '2021-07-09'),
(17, '', '1', '2021-07-10'),
(18, '', '1', '2021-07-10'),
(19, '', '1', '2021-07-10'),
(20, '', '1', '2021-07-10'),
(21, '', '1', '2021-07-10'),
(22, '', '1', '2021-07-10'),
(23, '', '1', '2021-07-10'),
(24, '', '1', '2021-07-10'),
(25, '', '1', '2021-07-10'),
(26, '', '1', '2021-07-10'),
(27, '', '1', '2021-07-10'),
(28, '', '0', '2021-07-10'),
(29, '', '1', '2021-07-10'),
(30, '', '0', '2021-07-10'),
(31, '', '1', '2021-07-10'),
(32, '', '1', '2021-07-10'),
(33, '', '0', '2021-07-10'),
(34, '', '1', '2021-07-10'),
(35, '', '1', '2021-07-10'),
(36, '', '0', '2021-07-10'),
(37, '', '1', '2021-07-10'),
(40, '980704105686', '1', '2021-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `covid_status`
--

CREATE TABLE `covid_status` (
  `status_code` int(11) NOT NULL,
  `status_name` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `covid_status`
--

INSERT INTO `covid_status` (`status_code`, `status_name`) VALUES
(0, 'Negative'),
(1, 'Positive');

-- --------------------------------------------------------

--
-- Table structure for table `kpm_users`
--

CREATE TABLE `kpm_users` (
  `KKM_ID` int(11) NOT NULL,
  `KKM_FName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `KKM_LName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `KKM_Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kpm_users`
--

INSERT INTO `kpm_users` (`KKM_ID`, `KKM_FName`, `KKM_LName`, `KKM_Password`) VALUES
(990088, 'Osman', 'Yaakob', '283cb4a858554277b81ac2129ea4f35d3793bc0c6612ddb10757cdfbc8d22347'),
(990099, 'Ali', 'Salim', '311339a6c86e58717f1f145db47d191d426fb0844f0400180741196c1e8f4e18');

-- --------------------------------------------------------

--
-- Table structure for table `premise`
--

CREATE TABLE `premise` (
  `premise_ID` int(255) NOT NULL,
  `premise_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `premise_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `premise_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `premise_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `premise_postcode` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `covid_status` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `premise`
--

INSERT INTO `premise` (`premise_ID`, `premise_name`, `premise_email`, `premise_password`, `premise_address`, `premise_postcode`, `covid_status`) VALUES
(10, 'Kedai Runcit', '2018440306@student.uitm.edu.my', 'b5609a7a5923a2a7c225c6740d8e07e0bdfad412b1187df30f20fa06145fb5b7', 'lot 10, jalan kedai, presint 8', '62250', '0'),
(20, 'kedai tom yam', 'tomyam@gmail.com', '5824ef5de16633a4b847f51bd4929c14ce2bf39b22c9dd46dd6d3d56f452902c', 'lot 15, jalan kedai, presint 8', '62250', '0'),
(30, 'kedai hardware', 'hardware@gmail.com', 'f93287a56a140a350d7cdfd560c295fbc71e6cf9f6e19c74214026e2e47df900', 'lot 30, jalan kedai, presint 9', '62260', '0'),
(40, 'kedai mamak', 'mamak@yahoo.com', 'ee1a67d73b6b5651c5e35725339852fae5071b3bdc995da07002312195afadf2', 'lot 40 jalan kedai, presint 9', '62260', '0');

-- --------------------------------------------------------

--
-- Table structure for table `temp_data_test`
--

CREATE TABLE `temp_data_test` (
  `id` int(11) NOT NULL,
  `premise_ID` int(255) NOT NULL,
  `premise_postcode` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `user_ic` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `temp` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Time` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `temp_data_test`
--

INSERT INTO `temp_data_test` (`id`, `premise_ID`, `premise_postcode`, `user_ic`, `temp`, `latitude`, `longitude`, `Date`, `Time`, `status_code`) VALUES
(75, 10, '62250', '980704105686', '30.63', '2.92653', '101.67962', '2021-07-09', '4:54:25', 0),
(77, 20, '62240', '980704105686', '31.07', '2.92638', '101.67961', '2021-07-09', '4:13:35', 0),
(78, 40, '62260', '741211105674', '31.15', '2.9264', '101.67959', '2021-07-09', '4:15:24', 0),
(80, 30, '62250', '940506104564', '48.75', '2.92633', '101.67958', '2021-07-10', '4:16:01', 0),
(81, 20, '62240', '970707105757', '40.51', '2.92634', '101.67958', '2021-07-09', '4:16:43', 0),
(82, 40, '62260', '980405764567', '31.11', '2.92623', '101.67962', '2021-07-09', '4:17:25', 0),
(83, 40, '62260', '970707105757', '31.21', '2.92624', '101.67962', '2021-07-08', '4:17:31', 0),
(84, 20, '62240', '980704105686', '31.27', '2.92624', '101.67962', '2021-07-08', '4:17:38', 0),
(86, 30, '62250', '670704105685', '39.29', '2.92623', '101.67962', '2021-07-08', '4:17:48', 0),
(87, 10, '62250', '970707105757', '31.35', '2.92623', '101.67962', '2021-07-10', '4:17:54', 0),
(88, 20, '62240', '980405764567', '31.21', '2.92623', '101.67962', '2021-07-08', '4:18:00', 0),
(89, 30, '62250', '980704105686', '31.45', '2.92623', '101.67962', '2021-07-08', '4:21:08', 0),
(90, 10, '62250', '970707105757', '31.64', '2.92614', '101.67937', '2021-07-10', '4:21:14', 0),
(91, 10, '62250', '970707105757', '30.85', '2.92614', '101.67937', '2021-07-10', '4:21:18', 0),
(92, 30, '62250', '990704105685', '31.24', '2.92614', '101.67937', '2021-07-11', '5:21:22', 0),
(93, 20, '62240', '970707105757', '38.70', '2.92614', '101.67937', '2021-07-11', '4:21:27', 0),
(95, 30, '62250', '980704105686', '33.17', '2.92611', '101.67943', '2021-07-11', '5:21:36', 0),
(96, 20, '62240', '980704105686', '32.57', '2.92611', '101.67943', '2021-07-11', '4:21:40', 0),
(97, 20, '62240', '940506104564', '31.88', '2.92611', '101.67943', '2021-07-11', '4:21:43', 0),
(98, 10, '62250', '980405764567', '30.87', '2.92611', '101.67943', '2021-07-10', '4:21:47', 0),
(99, 20, '62240', '990704105685', '36.57', '2.92611', '101.67943', '2021-07-11', '4:21:51', 0),
(105, 30, '62250', '980704105685', '34.76', '2.92627', '101.67967', '2021-06-27', '13:23:35', 0),
(106, 10, '62250', '970707105757', '33.33', '2.92634', '101.67969', '2021-07-10', '12:38:33', 0),
(107, 10, '62250', '970707105757', '30.23', '2.92635', '101.67969', '2021-07-10', '12:43:18', 0),
(108, 60, '43900', '970707105757', '30.56', '1.48069', '103.65228', '2021-07-10', '19:10:18', 0),
(134, 10, '62250', '980704105686', '37.71', '2.92648', '101.67972', '2021-07-26', '12:16:07', 0),
(135, 20, '62250', '990704105685', '37.19', '2.92621', '101.67963', '2021-07-26', '12:18:03', 0),
(136, 30, '62260', '990704105685', '38.27', '2.92622', '101.67963', '2021-07-26', '12:18:51', 0),
(137, 20, '62250', '980624145606', '35.05', '2.92625', '101.67964', '2021-07-26', '12:20:51', 0),
(138, 20, '62250', '980624145606', '36.55', '2.92607', '101.67969', '2021-07-26', '12:29:21', 0),
(139, 10, '62250', '980624145606', '36.33', '2.92617', '101.67968', '2021-07-26', '12:30:18', 0),
(140, 10, '62250', '990704105685', '36.23', '2.92627', '101.67969', '2021-07-26', '12:35:31', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_user_data`
--
ALTER TABLE `app_user_data`
  ADD PRIMARY KEY (`ic_num`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `covid_status`
--
ALTER TABLE `covid_status`
  ADD PRIMARY KEY (`status_code`);

--
-- Indexes for table `kpm_users`
--
ALTER TABLE `kpm_users`
  ADD PRIMARY KEY (`KKM_ID`);

--
-- Indexes for table `premise`
--
ALTER TABLE `premise`
  ADD PRIMARY KEY (`premise_ID`);

--
-- Indexes for table `temp_data_test`
--
ALTER TABLE `temp_data_test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `premise`
--
ALTER TABLE `premise`
  MODIFY `premise_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `temp_data_test`
--
ALTER TABLE `temp_data_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
