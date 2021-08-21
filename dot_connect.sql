-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 10:24 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dot_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `banned_message`
--

CREATE TABLE `banned_message` (
  `id` int(11) NOT NULL,
  `message` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banned_message`
--

INSERT INTO `banned_message` (`id`, `message`) VALUES
(1, 'banned1');

-- --------------------------------------------------------

--
-- Table structure for table `block_friend`
--

CREATE TABLE `block_friend` (
  `id` int(11) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `blocked_user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(1000) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company_data`
--

CREATE TABLE `company_data` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_tagline` varchar(220) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_website` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_logo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_address` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `country_id` int(11) NOT NULL COMMENT 'country_id will come from country table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `status`) VALUES
(1, 'Bangladesh', 1),
(5, 'India', 1),
(8, 'Testtt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `accept` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `accepted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_data`
--

CREATE TABLE `job_data` (
  `job_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `job_description` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `job_type` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Full Time, Part Time',
  `vacancy` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `expire_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_response`
--

CREATE TABLE `job_response` (
  `response_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(225) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `registration_datetime` datetime NOT NULL,
  `last_login_datetime` datetime DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT 0,
  `user_type` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'individual, company, admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `password`, `registration_datetime`, `last_login_datetime`, `active`, `user_type`) VALUES
(3, 'user1@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-07-03 13:48:55', '0000-00-00 00:00:00', 1, 'individual'),
(4, 'user2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2021-07-03 16:10:36', '2021-07-04 16:02:33', 1, 'individual'),
(5, 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', '2021-07-03 21:07:06', '2021-07-08 04:47:56', 1, 'admin'),
(6, 'test@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2021-07-03 21:07:55', '2021-07-04 21:17:01', 1, 'admin'),
(7, 'user3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2021-07-04 16:26:15', NULL, 1, 'individual');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `notice_text` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `notice_for` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `notice_text`, `notice_for`, `created_at`) VALUES
(1, 'Demo Title 1', 'testings......', 3, '2021-07-03 18:36:02'),
(3, 'Title one', 'kjbkk', 0, '2021-07-03 20:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_text` varchar(300) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `setting_key` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `setting_value` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_key`, `setting_value`) VALUES
(1, 'privacy_policy', '<h1>Privacy Policy</h1>\r\n<p>5 July 2020</p>\r\n<h3>Demos Privacy Policy</h3>\r\n<p><img style=\"float: right;\" src=\"https://pbs.twimg.com/media/EvANp9DVkAEpDPc?format=jpg&amp;name=large\" alt=\"Rokan Chowdhury Onick\" width=\"250\" height=\"313\" /></p>\r\n<p>Demos follows the relevant legal requirements and takes all reasonable precautions to safeguard personal information.</p>\r\n<ol>\r\n<li>INTRODUCTION</li>\r\n</ol>\r\n<p>Demos is committed to protecting your privacy and security. This policy explains how and why we use your personal data, to ensure you remain informed and in control of your information.</p>\r\n<p>You can decide not to receive communications or change how we contact you at any time. If you wish to do so please contact us by emailing&nbsp;hello@demos.co.uk, writing to 76 Vincent Square, London, SW1 2PD or 020 3878 3955 (Lines open 9.30am &ndash; 6pm, Mon &ndash; Fri).</p>\r\n<p>We will never sell your personal data, and will only ever share it with organisations we work with where necessary and if its privacy and security are guaranteed. Personal information submitted to Demos is only used to contact you regarding Demos activities.&nbsp;</p>\r\n<p>Information about visitors to the Demos website domain is automatically logged for the purposes of statistical analysis. Such information includes the IP address from which you visit, referral address, and other technical information such as browser type and operating system. Your email address is not automatically logged without your knowledge.</p>\r\n<p>We will not distribute, sell, trade or rent your personal information to third parties. Demos may provide aggregate statistics about our website&rsquo;s users, traffic patterns and related site information to reputable third-parties such as Demos&rsquo;s funding bodies or potential partners. Such statistical information will not include personally identifying information.</p>\r\n<p>Questions?</p>\r\n<p>Any questions you have in relation to this policy or how we use your personal data should be sent to&nbsp;hello@demos.co.uk&nbsp;for the attention of Demos&rsquo; Head of External Affairs.</p>\r\n<ol>\r\n<li>ABOUT US</li>\r\n</ol>\r\n<p>Your personal data (i.e. any information which identifies you, or which can be identified as relating to you personally) will be collected and used by Demos (charity no:1042046,&nbsp; company registration no: 2977740).</p>\r\n<ol>\r\n<li>THE INFORMATION WE COLLECT</li>\r\n</ol>\r\n<p>Personal data you provide</p>\r\n<p>We collect data you provide to us. This includes information you give when joining as a member or signing up to our newsletter, placing an order or communicating with us. For example:</p>\r\n<ul>\r\n<li>personal details (name, job title, organisation and email) when you sign up to our newsletter and / or events.</li>\r\n</ul>\r\n<ul>\r\n<li>financial information (payment information such as credit/debit card or direct debit details, when making donations or paying for a service. Please see section 8 for more information on payment security); and</li>\r\n</ul>\r\n<ul>\r\n<li>details of Demos events you have attended.</li>\r\n</ul>\r\n<p>Sensitive personal data</p>\r\n<p>We do not normally collect or store sensitive personal data (such as information relating to health, beliefs or political affiliation) about those signed up to Demos&rsquo;s newsletter. However there are some situations where this will occur (e.g. if you have an accident on one of our events). If this does occur, we&rsquo;ll take extra care to ensure your privacy rights are protected.</p>\r\n<p>Accidents or incidents</p>\r\n<p>If an accident or incident occurs on our property, at one of our events or involving one of our staff then we&rsquo;ll keep a record of this (which may include personal data and sensitive personal data).</p>');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_data_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL COMMENT 'login id will come from login table',
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Male, Female',
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL COMMENT 'country_id will come from country table',
  `phone` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `about_me` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `profile_photo` varchar(220) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `cover_photo` varchar(220) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `user_cv` varchar(220) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_data_id`, `login_id`, `name`, `dob`, `gender`, `address`, `country_id`, `phone`, `about_me`, `profile_photo`, `cover_photo`, `user_cv`) VALUES
(3, 3, 'User One', NULL, NULL, NULL, 1, '01919820106', NULL, NULL, NULL, NULL),
(4, 4, 'User Two', NULL, NULL, NULL, NULL, '099992111', NULL, NULL, NULL, NULL),
(5, 5, 'Md. Rokan Chowdhury Onick', NULL, NULL, NULL, -1, '01771891512', NULL, NULL, NULL, NULL),
(6, 6, 'Test Admin', NULL, NULL, NULL, NULL, '0199999999', NULL, NULL, NULL, NULL),
(7, 7, 'User Three', NULL, 'Male', NULL, 5, '0188888888', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_report`
--

CREATE TABLE `user_report` (
  `id` int(11) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `reported_user_id` int(11) NOT NULL,
  `report_reason` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banned_message`
--
ALTER TABLE `banned_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_friend`
--
ALTER TABLE `block_friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `company_data`
--
ALTER TABLE `company_data`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_data`
--
ALTER TABLE `job_data`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_response`
--
ALTER TABLE `job_response`
  ADD PRIMARY KEY (`response_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_data_id`);

--
-- Indexes for table `user_report`
--
ALTER TABLE `user_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banned_message`
--
ALTER TABLE `banned_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `block_friend`
--
ALTER TABLE `block_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_data`
--
ALTER TABLE `company_data`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_data`
--
ALTER TABLE `job_data`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_response`
--
ALTER TABLE `job_response`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_report`
--
ALTER TABLE `user_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
