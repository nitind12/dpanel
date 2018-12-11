-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 06:09 AM
-- Server version: 5.6.11-log
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `ID` int(11) NOT NULL,
  `TITLE_` varchar(200) NOT NULL,
  `BRIEF_` text NOT NULL,
  `DET_PATH` varchar(100) NOT NULL,
  `PICTURE_PATH` varchar(100) NOT NULL,
  `DATE_OF_ACTIVITY` varchar(15) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS_` tinyint(1) NOT NULL,
  `USERNAME_` varchar(100) NOT NULL,
  `ACTIVITYCATEGID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`ID`, `TITLE_`, `BRIEF_`, `DET_PATH`, `PICTURE_PATH`, `DATE_OF_ACTIVITY`, `DATE_`, `STATUS_`, `USERNAME_`, `ACTIVITYCATEGID`) VALUES
(1, 'Happy Holi', 'Fly prepaid\r\nIf you are planning a vacation and fear spending the saved money elsewhere you can save up with, Lusso Trip\'s e-wallet facility. Customers generally keep a Rs 10,000 balance on their e-wallet and save up as much as Rs 1 lakh to book tickets when they want to.\r\n', '1.pdf', '1.jpg', '2018-02-01', '2018-02-09 18:45:09', 0, 'nitin', 9),
(2, 'Happy Diwali', 'Program will motivate the students to participate in live sessions projects i.e. projects from outside campus that also financially boosts them and also to participate in live events of the group of Institutes under the supervision of internal assigned experts.\r\nLive session opportunities will be provided to the dedicated/selected students in their interested projects under the experts’ supervision.\r\n', '2.jpg', '2.jpg', '2018-02-03', '2018-02-09 18:48:41', 1, 'nitin', 9),
(3, 'Testing', '2. 1 time fee if submitted then it should be removed from the particular student.\r\n3. If march invoice generated the pay fee should be shown of march not feb and pending fee should be added in march fee.\r\n\r\n4. Set withdrawl in pay fee (fix the textfield for withdrawl amount, which is to be filled by the opt), show the total paid fee in the session for detail view receipt wise.\r\n\r\n5. in case of withdrawl or leaving school invoice generated but fee not paid then cancel invoice the same., then switch class or cancel admission (in case of cancel admission status of admission should be set to 0(means disable from the software presenting canceled admission)', '3.docx', '3.JPG', '2018-05-13', '2018-05-15 15:18:06', 1, 'nitin', 9),
(4, 'one more', 'Fly prepaid If you are planning a vacation and fear spending the saved money elsewhere you can save up with, Lusso Trip\'s e-wallet facility. Customers generally keep a Rs 10,000 balance on their e-wallet and save up as much as Rs 1 lakh to book tickets when they want to. ', '4.docx', '4.jpg', '2018-05-09', '2018-05-15 15:23:39', 1, 'nitin', 9),
(5, 'switch student', 'student detail class & section wise \r\n 2. Fee detail class & section wise\r\n 3. Fee Amount head wise for all classes this month.\r\n 4. Fee Amount head wise class wise.\r\n 5. Fee due amout class wise for current invoice.\r\n 6. Total fee collected between dates class wise and also show due amount.\r\n 7. Total actual fee should be collected between dates.\r\n 8. Over all total fee collected in this session.', '5.docx', '5.jpg', '2018-05-14', '2018-09-18 16:49:42', 1, 'nitin', 9),
(6, 'Test', 'This chapter introduces parallel processing and parallel database technologies, which offer great advantages for online transaction processing and decision support applications. The administrator\'s challenge is to selectively deploy this technology to fully use its multiprocessing power.<br>\r\nParallel processing divides a large task into many smaller tasks, and executes the smaller tasks concurrently on several nodes. As a result, the larger task completes more quickly.', '6.jpg', 'sample.jpg', '2018-06-03', '2018-09-18 16:30:59', 1, 'nitin', 7);

-- --------------------------------------------------------

--
-- Table structure for table `activities_category`
--

CREATE TABLE `activities_category` (
  `ACT_CATEG_ID` int(6) NOT NULL,
  `CATEGORY` varchar(20) NOT NULL,
  `USERNAME_` varchar(40) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS_` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities_category`
--

INSERT INTO `activities_category` (`ACT_CATEG_ID`, `CATEGORY`, `USERNAME_`, `DATE_`, `STATUS_`) VALUES
(7, 'Sports & Games', 'nitin', '2018-09-17 14:47:08', 1),
(8, 'Cultural', 'nitin', '2018-09-17 14:47:13', 1),
(9, 'Others', 'nitin', '2018-09-17 14:47:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ID` int(11) NOT NULL,
  `SUBJECT` varchar(200) NOT NULL,
  `ANNOUNCEMENT` text NOT NULL,
  `PATH_ATTACH` varchar(150) NOT NULL,
  `DATE_` varchar(25) NOT NULL,
  `DATE_START` varchar(25) NOT NULL,
  `DATE_END` varchar(25) NOT NULL,
  `TIME_` varchar(25) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  `USERNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ID`, `SUBJECT`, `ANNOUNCEMENT`, `PATH_ATTACH`, `DATE_`, `DATE_START`, `DATE_END`, `TIME_`, `STATUS`, `USERNAME`) VALUES
(1, 'Walkin Interview ', 'Walk interview', '1.pdf', '08/02/2018', '2018-02-08', '2018-02-10', '03:33:22pm', 1, 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `bday_data`
--

CREATE TABLE `bday_data` (
  `BID` int(11) NOT NULL,
  `NAME_` varchar(100) NOT NULL,
  `DOB` varchar(25) NOT NULL,
  `PHOTO_` varchar(100) NOT NULL,
  `DOA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` int(11) NOT NULL,
  `USERNAME_` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bday_data`
--

INSERT INTO `bday_data` (`BID`, `NAME_`, `DOB`, `PHOTO_`, `DOA`, `STATUS`, `USERNAME_`) VALUES
(1, 'Nitin Raj', '2018-02-09', '11.JPG', '2018-02-07 09:30:36', 1, 'nitin'),
(2, 'Neeraj Pant', '2018-02-16', '2.jpg', '2018-02-15 15:40:53', 1, 'nitin'),
(3, 'Harsh Pant', '2018-02-17', '3.JPG', '2018-02-15 15:54:11', 1, 'nitin'),
(4, 'Gagan', '2018-02-16', '4.jpg', '2018-02-15 16:47:41', 1, 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `DWNLD_ID` int(11) NOT NULL,
  `TITLE` varchar(120) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `PATH_` varchar(500) NOT NULL,
  `DATE_` varchar(25) NOT NULL,
  `STATUS` int(11) NOT NULL COMMENT '0 or 1',
  `USERNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`DWNLD_ID`, `TITLE`, `DESCRIPTION`, `PATH_`, `DATE_`, `STATUS`, `USERNAME`) VALUES
(1, 'test', 'asdasd as dasd', '1.docx', '2018-06-04 20:35:18', 1, 'nitin'),
(5, 'Test 2', 'ssdsd', '5.pdf', '2018-06-04 21:42:20', 1, 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FAC_ID` int(11) NOT NULL,
  `FACULTY_NAME` varchar(255) NOT NULL,
  `DOJ` varchar(20) NOT NULL,
  `COURSE` varchar(50) NOT NULL,
  `SEQ` varchar(11) NOT NULL,
  `DESIG` varchar(50) NOT NULL,
  `DD` varchar(5) CHARACTER SET utf8 NOT NULL,
  `MM` varchar(5) CHARACTER SET utf8 NOT NULL,
  `YY` varchar(5) CHARACTER SET utf8 NOT NULL,
  `LAST_QUALIF` varchar(250) CHARACTER SET utf8 NOT NULL,
  `LQ_YEAR` varchar(5) CHARACTER SET utf8 NOT NULL,
  `ANY_ACHIEVE` text CHARACTER SET utf8 NOT NULL,
  `PHOTO_` varchar(500) CHARACTER SET utf8 NOT NULL,
  `RESUME` varchar(500) CHARACTER SET utf8 NOT NULL,
  `SUMMARY` text CHARACTER SET utf8 NOT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf8 NOT NULL,
  `MOBILE` varchar(10) CHARACTER SET utf8 NOT NULL,
  `USERNAME` varchar(250) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FAC_ID`, `FACULTY_NAME`, `DOJ`, `COURSE`, `SEQ`, `DESIG`, `DD`, `MM`, `YY`, `LAST_QUALIF`, `LQ_YEAR`, `ANY_ACHIEVE`, `PHOTO_`, `RESUME`, `SUMMARY`, `EMAIL`, `MOBILE`, `USERNAME`, `STATUS`, `DATE_`) VALUES
(1, 'Mr. Kheem Singh Bisht', 'x/x/x', 'School', 'A1', 'Principal', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(2, 'Mr. Jagdish Chandra Paragin', 'x/x/x', 'School', 'A1', 'Vice- Principal', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(3, 'Mrs. Neema Agarwal', 'x/x/x', 'School', 'A1', 'TGT [SST]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(4, 'Mr. Dinesh Chandra Panday', 'x/x/x', 'School', 'A1', 'PGT [English]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(5, 'Mr. Jagdish Chandra Upadhyay', 'x/x/x', 'School', 'A1', 'Office Staff', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(6, 'Mr. Dharmanand Kandpal', 'x/x/x', 'School', 'A1', 'TGT [Hindi]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(7, 'Mr. Hem Chandra Belwal', 'x/x/x', 'School', 'A1', 'TGT [SST]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(8, 'Mr. Mohan Chandra Sharma', 'x/x/x', 'School', 'A1', 'TGT [Sci, Computer]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(9, 'Mr. Manoj Kumar Pargain', 'x/x/x', 'School', 'A1', 'PGT [Mathematics]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(10, 'Mrs. Kavita Joshi', 'x/x/x', 'School', 'A1', 'PGT [Biology]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(11, 'Dr. Prakash Chandra Bahuguna', 'x/x/x', 'School', 'A1', 'PGT [Hindi]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(12, 'Mr. Hem Chandra Gururani', 'x/x/x', 'School', 'A1', 'TGT [Physical Edu]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(13, 'Mr. Alok Kumar Saxena', 'x/x/x', 'School', 'A1', 'TGT [Mathematics]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(14, 'Mr. Kailash Chandra Belwal', 'x/x/x', 'School', 'A1', 'PGT [Chemistry]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(15, 'Mr. Gokul Pant', 'x/x/x', 'School', 'A1', 'TGT [SST]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(16, 'Mrs. Indra Tiwari', 'x/x/x', 'School', 'A1', 'PGT [Hindi]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(17, 'Mr. Dinesh Chandra Pathak', 'x/x/x', 'School', 'A1', 'TGT [Hindi]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(18, 'Mr. Bishan Singh Rathour', 'x/x/x', 'School', 'A1', 'TGT [Mathematics]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(19, 'Mrs. Radha Bisht', 'x/x/x', 'School', 'A1', 'TGT [Science]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(20, 'Mr. Narendra Singh Rawat', 'x/x/x', 'School', 'A1', 'PGT [Mathematics]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(21, 'Mr. Jagdish Chandra Pant', 'x/x/x', 'School', 'A1', 'TGT [Sanskrit]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(22, 'Mrs. Tanuja Pandey', 'x/x/x', 'School', 'A1', 'TGT [English]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(23, 'Mr. Jeewan Chandra Sanwal', 'x/x/x', 'School', 'A1', 'TGT [Science]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(24, 'Mrs. Deepa Tiwari', 'x/x/x', 'School', 'A1', 'TGT [SST]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(25, 'Mrs. Seema Bora', 'x/x/x', 'School', 'A1', 'PGT [English]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(26, 'Mr. Neeraj Kumar Mathpal', 'x/x/x', 'School', 'A1', 'PGT [Chemistry]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(27, 'Mrs. Bhawana Mishra', 'x/x/x', 'School', 'A1', 'TGT [Computer]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(28, 'Mr. Lalit Mohan Binwal', 'x/x/x', 'School', 'A1', 'PGT [English]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(29, 'Mr. Yogesh Singh Mehra', 'x/x/x', 'School', 'A1', 'PGT [Physics]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(30, 'Mr. Abhishek Sharma', 'x/x/x', 'School', 'A1', 'PGT [Physics]', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(31, 'Mr. Vishwabandhu Joshi', 'x/x/x', 'School', 'A1', 'Office Staff', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(32, 'Mrs. Hemlata Pant', 'x/x/x', 'School', 'A1', 'Lab Assistant', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(33, 'Mrs. Pushpa Upadhyay', 'x/x/x', 'School', 'A1', 'Support Staff', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(34, 'Mr. Harish Singh Dewari', 'x/x/x', 'School', 'A1', 'Support Staff', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(35, 'Mr. Ramesh Ram', 'x/x/x', 'School', 'A1', 'Support Staff', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(36, 'Mrs. Beena Bisht', 'x/x/x', 'School', 'A1', 'Support Staff', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(37, 'Mr. Urba Dutt Melkani', 'x/x/x', 'School', 'A1', 'Driver', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16'),
(38, 'Mr. Vijay Kumar', 'x/x/x', 'School', 'A1', 'Sweeper', '0', '0', '0', 'x', 'x', 'x', 'x', 'x', 'x', 'x@gmail.com', '99', 'op1', 1, '2018-05-05 09:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `GL_ID` int(11) NOT NULL,
  `PHOTO_` varchar(250) NOT NULL,
  `TITLE_` varchar(250) NOT NULL,
  `WIDTH_` int(11) NOT NULL,
  `HEIGHT_` int(11) NOT NULL,
  `CATEG_ID` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `USERNAME_` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`GL_ID`, `PHOTO_`, `TITLE_`, `WIDTH_`, `HEIGHT_`, `CATEG_ID`, `STATUS`, `USERNAME_`) VALUES
(1, 'a1.jpg', 'x', 0, 0, 1, 1, 'nitin'),
(2, 'a4.jpg', 'x', 0, 0, 1, 1, 'nitin'),
(3, 'g1.jpg', 'x', 0, 0, 1, 1, 'nitin'),
(4, 'bann.jpg', 'x', 0, 0, 1, 1, 'nitin'),
(5, 'head1.jpg', 'x', 0, 0, 1, 1, 'nitin'),
(6, 'head3.jpg', 'x', 0, 0, 1, 1, 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_category`
--

CREATE TABLE `gallery_category` (
  `CATEG_ID` int(11) NOT NULL,
  `CATEGORY` varchar(25) NOT NULL,
  `DESC` varchar(500) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PIC` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_category`
--

INSERT INTO `gallery_category` (`CATEG_ID`, `CATEGORY`, `DESC`, `STATUS`, `DATE_`, `PIC`) VALUES
(1, 'General', 'General', 1, '2018-02-16 04:14:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `importantdates`
--

CREATE TABLE `importantdates` (
  `IMPDTID` int(11) NOT NULL,
  `IMP_DATE_EVENT` varchar(300) NOT NULL,
  `IMP_DATE` varchar(11) NOT NULL,
  `DESC_` text NOT NULL,
  `PATH_` varchar(100) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS_` tinyint(1) NOT NULL DEFAULT '1',
  `USERNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='used to store important dates';

--
-- Dumping data for table `importantdates`
--

INSERT INTO `importantdates` (`IMPDTID`, `IMP_DATE_EVENT`, `IMP_DATE`, `DESC_`, `PATH_`, `DATE_`, `STATUS_`, `USERNAME`) VALUES
(7, 'zz', '2018-09-21', 'zzz', '7.jpg', '2018-09-16 10:41:25', 0, 'nitin'),
(8, 'asd', '2018-09-20', 'asd', 'x', '2018-09-16 10:40:38', 1, 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `USERNAME_` varchar(150) NOT NULL,
  `PASSWORD_` varchar(255) NOT NULL,
  `USER_STATUS` varchar(15) NOT NULL,
  `DEPT_` varchar(200) NOT NULL DEFAULT 'The dpanel of School',
  `COURSE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`USERNAME_`, `PASSWORD_`, `USER_STATUS`, `DEPT_`, `COURSE`) VALUES
('anika_changed', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '', 'The dpanel of School', ''),
('dm', '*3FF6E4578914B586845644DA282812B64785737D', 'adm', 'The dpanel of School', 'x'),
('dm1_changed', '*3FF6E4578914B586845644DA282812B64785737D', 'adm', 'x', 'x'),
('dm2', '*3FF6E4578914B586845644DA282812B64785737D', 'adm', 'school', 'school'),
('gunjan', '*3FF6E4578914B586845644DA282812B64785737D', '', 'The dpanel of School', ''),
('hemant', '123', 'usr', 'The dpanel of School', ''),
('mom', '*3FF6E4578914B586845644DA282812B64785737D', '', 'The dpanel of School', ''),
('naveen', '*3FF6E4578914B586845644DA282812B64785737D', 'adm', 'The Sun Beam School', 'School'),
('nitin', '123', 'adm', 'The Sun Beam School', 'School'),
('nitin12', '*3FF6E4578914B586845644DA282812B64785737D', '', 'The dpanel of School', ''),
('nitin123', '123', '', 'The dpanel of School', ''),
('nitin23', '*3FF6E4578914B586845644DA282812B64785737D', '', 'The dpanel of School', ''),
('vihaan', '123', '', 'The dpanel of School', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_1`
--

CREATE TABLE `menu_1` (
  `ID_` int(11) NOT NULL,
  `PRE_ICON` varchar(150) NOT NULL,
  `MENU` varchar(30) NOT NULL,
  `PATH_` varchar(300) NOT NULL,
  `PRIORITY_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_1`
--

INSERT INTO `menu_1` (`ID_`, `PRE_ICON`, `MENU`, `PATH_`, `PRIORITY_`) VALUES
(1, 'fa fa-dropbox fa-fw', 'Dashboard', 'dashboard', 1),
(2, 'fa fa-user fa-fw', 'Faculty Profile', 'faculty', 2),
(3, 'fa fa-camera fa-fw', 'Manage Activities', 'activity', 3),
(4, 'fa fa-camera fa-fw', 'News', 'newsevents', 4),
(5, 'fa fa-camera fa-fw', 'Upcoming Events', 'upcoming', 5),
(6, 'fa fa-camera fa-fw', 'Announcements', 'announcements', 6),
(7, 'fa fa-user fa-fw', 'Faculty Sequence', 'faculty/sequence', 2),
(8, 'fa fa-camera fa-fw', 'Birthdays', 'bday/bday', 7),
(9, 'fa fa-camera fa-fw', 'TC', 'tc', 8),
(10, 'fa fa-camera fa-fw', 'Gallery', 'gallery', 8),
(12, 'fa fa-user fa-fw', 'topers', 'topper', 10),
(13, 'fa fa-user fa-fw', 'Downloads', 'downloads', 10),
(14, 'fa fa-user fa-fw', 'Imp Dates', 'importantDates', 11);

-- --------------------------------------------------------

--
-- Table structure for table `menu_user_status`
--

CREATE TABLE `menu_user_status` (
  `ST_ID` varchar(10) NOT NULL,
  `STATUS` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_user_status`
--

INSERT INTO `menu_user_status` (`ST_ID`, `STATUS`) VALUES
('adm', 'Admin'),
('ofc', 'Main Office'),
('prnpl', 'Principal'),
('tchr', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `mynews`
--

CREATE TABLE `mynews` (
  `NID` int(11) NOT NULL,
  `SUBJECT` varchar(50) NOT NULL,
  `NEWS_` varchar(300) NOT NULL,
  `ATTACH_` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mynews`
--

INSERT INTO `mynews` (`NID`, `SUBJECT`, `NEWS_`, `ATTACH_`) VALUES
(1, 'Prabandhan 2018', 'FCBM is organising theri annual meet Probandhan 2018 ', ''),
(2, 'Workshop 2018', 'FCSA organises a workshop on hybrid app development on 21st April 2018', ''),
(7, 'Workshop 2018', 'Workshop 2018				', ''),
(8, 'Testing', 'Testing', '8.docx'),
(9, 'T', 't', ''),
(10, 'news1', 'news in detail', '10.docx');

-- --------------------------------------------------------

--
-- Table structure for table `newsevents`
--

CREATE TABLE `newsevents` (
  `ID` int(11) NOT NULL,
  `SUBJECT` varchar(200) NOT NULL,
  `NEWS` text NOT NULL,
  `PATH_ATTACH` varchar(150) NOT NULL,
  `FONTJI` varchar(250) NOT NULL,
  `DATE_` varchar(25) NOT NULL,
  `DATE_START` varchar(25) NOT NULL,
  `DATE_END` varchar(25) NOT NULL,
  `TIME_` varchar(25) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  `USERNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsevents`
--

INSERT INTO `newsevents` (`ID`, `SUBJECT`, `NEWS`, `PATH_ATTACH`, `FONTJI`, `DATE_`, `DATE_START`, `DATE_END`, `TIME_`, `STATUS`, `USERNAME`) VALUES
(1, 'FACULTY DEVELOPMENT PROGRAMME', 'A Faculty Development Programme (FDP) was conducted in FCBM on 27th of January, 2018', '1.pdf', 'Arial', '07/02/2018', '2018-02-07', '2018-02-10', '02:35:01pm', 1, 'nitin'),
(2, 'Admission Process started', 'Admission process started. Please register soon.', '2.pdf', 'Arial', '04/06/2018', '2018-02-07', '2018-06-30', '11:14:09pm', 1, 'nitin'),
(3, 'ok', 'ok', 'x', 'Arial', '07/02/2018', '2018-02-07', '2018-02-17', '02:50:12pm', 1, 'nitin'),
(4, 'Experience A Good Education In Deepti Public School', 'The true essence of a school lies, not in its infrastructure of four walls but its overall purpose of imparting quality education which includes the art of shaping individual’s personality through physical, emotional, intellectual and spiritual development.', '4.docx', 'Arial', '04/06/2018', '2018-02-16', '2018-06-30', '11:13:20pm', 1, 'nitin'),
(5, 'Admission Open', 'Admssion Open. Please register soon', '5.docx', 'Arial', '08/05/2018', '2018-05-08', '2018-05-30', '09:30:57pm', 1, 'nitin'),
(6, 'Hello', 'Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello ', 'x', 'Arial', '04/06/2018', '2018-05-08', '2018-06-29', '11:15:57pm', 1, 'nitin'),
(7, 'test', 'test', '7.docx', 'Arial', '28/08/2018', '2018-08-28', '2018-08-31', '03:55:42pm', 1, 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `NID` int(11) NOT NULL,
  `TITLE_` varchar(250) NOT NULL,
  `VOLUME_` int(11) NOT NULL COMMENT 'Means edition (i.e 1,2,3,4...n) of newsletter',
  `COVER_` varchar(250) NOT NULL,
  `PATH_` varchar(250) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `YEAR_` varchar(5) NOT NULL,
  `USERNAME_` varchar(150) NOT NULL,
  `STATUS_` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `profileID` int(10) NOT NULL,
  `studentPic` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Resume` varchar(400) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fatherName` varchar(200) CHARACTER SET utf8 NOT NULL,
  `dob` varchar(20) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `emailID` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8 NOT NULL,
  `parentMobile` varchar(15) CHARACTER SET utf8 NOT NULL,
  `careerObjective` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `skills` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `summerTraining` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `PgCourse` varchar(20) CHARACTER SET utf8 NOT NULL,
  `PgSpecial` varchar(20) CHARACTER SET utf8 NOT NULL,
  `PgPercentage` varchar(10) CHARACTER SET utf8 NOT NULL,
  `PgPass` varchar(10) CHARACTER SET utf8 NOT NULL,
  `PgBacklog` varchar(500) CHARACTER SET utf8 NOT NULL,
  `gCourse` varchar(20) CHARACTER SET utf8 NOT NULL,
  `gSpecial` varchar(20) CHARACTER SET utf8 NOT NULL,
  `gPercentage` varchar(20) CHARACTER SET utf8 NOT NULL,
  `gPass` varchar(20) CHARACTER SET utf8 NOT NULL,
  `gBacklog` varchar(500) CHARACTER SET utf8 NOT NULL,
  `InterBorad` varchar(100) CHARACTER SET utf8 NOT NULL,
  `InterPass` varchar(20) CHARACTER SET utf8 NOT NULL,
  `InterPercentage` varchar(20) CHARACTER SET utf8 NOT NULL,
  `HsBorad` varchar(100) CHARACTER SET utf8 NOT NULL,
  `HsPass` varchar(20) CHARACTER SET utf8 NOT NULL,
  `HsPercentage` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`profileID`, `studentPic`, `Resume`, `name`, `fatherName`, `dob`, `gender`, `emailID`, `mobile`, `parentMobile`, `careerObjective`, `skills`, `summerTraining`, `PgCourse`, `PgSpecial`, `PgPercentage`, `PgPass`, `PgBacklog`, `gCourse`, `gSpecial`, `gPercentage`, `gPass`, `gBacklog`, `InterBorad`, `InterPass`, `InterPercentage`, `HsBorad`, `HsPass`, `HsPercentage`) VALUES
(10, '10.jpg', '10.docx', 'Mohit Biswas', 'Mr. Ravindra Biswas', '29/04/1996', 'M', 'mohitamr11@gmail.com', '8755227617', '9897909533', 'To grab an opportunity and set myself a goal where I can be innovative and attain a challenging position by exercising my interpersonal and professional skills to the fullest for the growth of the organization and mine as well.', '', '', '0', '0', '', '', '', 'BTech', 'IT', '61', '2017', '1', 'uk board', '2013', '49', 'uk board', '2011', '55'),
(12, '12.jpg', '12.docx', 'Aman Dhankhar', 'Devender Singh', '1994-06-12', 'M', 'dhankhar.aman764@gmail.com', '9540143403', '9899110450', 'A Suitable Position where the career offers challenging assignments for handling increasing responsibilities in a result oriented environment and to fully utilize my knowledge or skills for the growth and processes of the organization and myself.', 'Ability to work smoothly in all situations, meeting datelines and coping with increasing responsibility. Always eager to learn new technologies and willing to apply then to give better results and Capable of efficiently working independently as well as a team member.', '4 Weeks training in Max Industry Pvt. Ltd. ( An Integrator Of Schneider Electric). Learn about the automation process, how to automate a process and working on plc & scada systems and designing of various systems on it. I work on the Intouch & Review32 software.', '0', '0', '', '', '', 'BTech', 'EEE', '60', 'appearing', 'oops(%TH SEM)', 'RTE(le)', '2014', '57', 'CBSE', '2009', '70.4'),
(13, '13.jpg', '13.doc', 'asasf', 'asvasvs', '1987-08-08', 'M', 'ibdaicb@ibijb.kkk', '8888888888', '8888888888', 'bijbkijb', 'bibibubuib', 'i', '', '', '', '', '', '', '', '', '', '', 'bbbbb', '8888', '88', 'bkbkjb', '8888', '88'),
(14, '14.jpg', '14.doc', 'ANKIT LOHANI', 'BIMAL CHANDRA LOHANI', '1994-07-25', 'M', 'ankitlohani36@gmail.com', '8006815448', '8909951846', 'want to become entrepreneur', 'technical nand management skills', 'BSNL HALDWANI', '', '', '', '', '', 'B.Tech', 'ECE', '64.46', '2017', 'NIL', 'CBSE', '2013', '68.4', 'CBSE', '2010', '70.4'),
(15, '15.jpg', '15.doc', 'DIVAM CHAUDHARY', 'SAHDEV SINGH', '22 FEB; 1996', 'M', 'CHOUDHARY.DIVAM3@GMAIL.COM', '9536366262', '8859240580', 'To work for an organization which provides me the opportunity to improve my skills and knowledge to growth along with the organization objective.', 'MATLAB, Basic Knowledge of C, Embedded System using AVR & Robotics.', 'I did my summer training on MATLAB from CETPA Infotech Pvt. Ltd.', '', '', '', '', '', 'B.Tech', 'ECE', '69.14%', '2017', '', 'CBSE', '2013', '66.8%', 'CBSE', '2011', '8.2 (CGPA)'),
(16, 'x', 'x', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(17, 'x', 'x', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(18, '18.jpg', '18.docx', 'SUMANG ARYA', 'MR.NAVEEN CHANDRA ARYA', '1995-09-12', 'M', 'arya.sumang12@gmail.com', '8791769766', '9456189648', 'To seek as much knowledge i can and apply that on the positive side.', 'basic computer, creative , positive , intellectual ', 'POWER TRANSMISSION CORPORATION LIMITED (PTCUL) 220KV SUB-STATION  KAMALWAGANJA HALDWANI , NAINITAL, UTTARAKHAND ', '', '', '', '', '', 'B.Tech', 'EEE', '55', '2017', 'Physics , maths 2 , AIE ', 'CBSE', '2013', '62', 'CBSE', '2011', '6.6'),
(19, '19.jpg', '19.docx', 'Aakansha Adhikari', 'Shivraj Singh Adhikari', '1997-02-03', 'F', 'aakkiadhikari@gmail.com', '9756102113', '9690890067', 'To achieve a successful position as a network administrator or network enginner', 'Network administrating', 'HCL CDC ,Noida', '', '', '', '', '', 'B.Tech', 'CSE', '77', '2017', '0', 'CBSE', '2013', '78', 'CBSE', '2011', 'CGPA 10'),
(20, 'x', 'x', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(21, '21.jpg', '21.docx', 'GAURAV JOSHI', 'Mr. RAMESH CHANDRA JOSHI', '1997-01-30', 'M', 'joshigaurav618@gmail.com', '9410501150', '9917455493', 'Seeking to achieve a responsible position in a reputed Organization where I could apply all my knowledge with all my available resources and can be part in the growth of the Organization.', 'SOLAR PANEL INSTALLATION; Effective Communication, good office package work', 'Universal Comforts Products Limited( A wholly owned subsidiary of Voltas limited) IIE Pantnagar, SIDCUL, U.S. Nagar', '', '', '', '', '', 'B.Tech', 'EEE', '62.86', '2017', 'none', 'U.K. BOARD', '2013', '62.6', 'U.K. BOARD', '2011', '64.2'),
(22, '22.jpg', '22.docx', 'Shashi Niwas', 'Suresh Sahu', '1996-03-22', 'M', 'shashiniwas@rediffmail.com', '9557511757', '8145001274', 'Seeking to achieve a responsible position in a reputed Organization where I could apply all my knowledge with all my available resources and can be part in the growth of the Organization.', 'Programming in C/C++, Good at Office Packages Microsoft Word, Excel ', '4 Weeks Training at PTCUL, Kamaluaganja, Haldwani', '', '', '', '', '', 'B.Tech', 'EEE', '', '2017', '', 'CBSE', '2012', '66.83', 'CBSE', '2010', '76'),
(23, '23.jpg', '23.docx', 'ANKIT KUMAR ARYA', 'ANAND PRASAD ARYA', '1994-05-10', 'M', 'ankit2054@yahoo.in', '9639652369', '9410120196', 'To work hard with full determination and dedication to achieve organizational as well as personal goals', 'good communication skill,technical knowledge,Enthusiasm and commitment,Always eager to learn new technologies ', 'dakhs electronics pvt ltd which deal with the product of fire control safety devices', '', '', '', '', '', 'B.Tech', 'EEE', '60', '2017', '1', 'uttrakhand board of technical education (diploma in electronics)', '2013', '62.12', 'c.b.s.e', '2010', '2010'),
(24, '24.jpg', '24.docx', 'Dinesh Singh', 'Mr. Jeet Singh', '01/03/1996', 'M', 'singhdinesheee@gmail.com', '8171731041', '8193838062', 'A Suitable Position where the career offers me challenging assignments for handling increasing responsibilities in result oriented environment and to fully utilize my knowledge or skills for the growth and processes of the organization and myself.', 'Ability to work smoothly in all situations. Always eager to learn new technologies and willing to apply them to give better results and Capable of work  efficiently  independently as well as a team member.', 'PTCUL, Kamalwaganja, Haldwani', '', '', '', '', '', 'B.Tech', 'EEE', '64% (till 5th sem)', '2017', '', 'U.K. Board', '2013', '64.6%', 'U.K. Board', '2011', '71.8%'),
(25, '25.jpg', '25.docx', 'NARENDRA SINGH KORANGA', 'SADHU SINGH KORANGA', '1994-10-10', 'M', 'nskoranga.nsk@gmail.com', '9639869457', '8006016121', 'Seeking to achieve a responsible position in a reputed Organization where I could apply all my knowledge with all my available resources and can be part in the growth of the Organization', 'knowledge about PLC<SCADA & SOLAR SYSTEM', 'Training at 132 KV power substation, Kathgodam', '', '', '', '', '', 'B.Tech', 'EEE', '64', '2017', '', 'Uttarakhand', '2013', '64.8', 'Uttarakhand', '2011', '75'),
(26, '26.jpg', '26.docx', 'VISHAL YADAV', 'Mr. GORAKH NATH', '1996-08-22', 'M', 'vishalyadav1508@gmail.com', '7037436072', '9415839359', 'Looking for a challenging career which demands the best of my professional ability in terms of technical and analytical skills, and helps me in broadening and enhancing my current skill and knowledge', 'leadership quality; ', 'Mechanical Railway Workshop Gorakhpur ', '', '', '', '', '', 'B.Tech', 'EEE', '55', '2017', '2', 'U.P. Board', '2013', '76.80', 'U.P. Board', '2011', '62.83'),
(27, '27.jpg', '27.docx', 'GAURAV SINGH', 'BHUPENDRA SINGH', '1995-05-20', 'M', 'gauravsatyabola@gmail.com', '9760111343', '9719596430', '  Looking for a challenging career which demands the best of my professional ability in terms of technical and analytical skills, and helps me in broadening and enhancing my current skill and knowledge.', ' 1 month certified coarse in PLC (SIEMENS) at MSME Kaniya, Ramnagar (Nainital).', '1 month summer training in Tanakpur power station, Banbassa (Champawat).', '', '', '', '', '', 'B.Tech', 'EEE', '57', '2017', '', 'UTTARAKHAND BOARD', '2012', '62.8', 'UTTARAKHAND', '2010', '74.8'),
(28, 'x', 'x', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(29, '29.jpg', '29.docx', 'NEELAM KARKI', 'JAGAT SINGH KARKI', '22 MAY 1996', 'F', 'NKARKI496@GMAIL.COM', '7055296486', '8449772363', ' To build a successful career in the field of Network Engineering', 'Network trouble shooting', 'HCL CDC ,Noida\n The course was CCNA and we implemented all the related protocols ', '', '', '', '', '', 'B.Tech', 'CSE', '68.6', '2017', '', 'UK', '2013', '60', 'UK', '2011', '58'),
(30, '30.jpg', '30.docx', 'Yogesh Singh Aithani', 'Bhupal Singh Aithani', '1996-07-05', 'M', 'yogeshaithani96@gmail.com', '9639651835', '9411761220', 'To become a successful professional in the field of Electrical Engineering. ', 'Certificate in PLC Programming (Siemens / ABB)', '132/33 Kv substation under PTCUL Kathgodam, Haldwani', '', '', '', '', '', 'B.Tech', 'EEE', '57.86%', '', 'Maths 2, Signal and System', 'Uttrakhand Board', '2013', '54.2%', 'Uttrakhand Board', '2011', '68.6%'),
(31, 'x', 'x', 'Km. Neelam', 'Mr. Indra Lal', '1-july-1996', 'F', 'neelamarya38@gmail.com', '8923866236', '9837121894', ' A Suitable Position where the career offers challenging assignments for handling increasing responsibilities in result oriented environment and to fully utilize my knowledge or skills for the growth and processes of the organization and myself..', 'Ability to work smoothly in all situations, meeting datelines and coping with increasing responsibility. Always eager to learn new technologies and willing to apply then to give better results and Capable of efficiently working independently as well as a team member.', '4 week summer training at 33\\11KV ramnagar', '', '', '', '', '', '', '', '', '', '', 'UK', '2013', '51%', 'UK', '2011', '49.2%'),
(32, 'x', 'x', 'Km. Neelam', 'Mr. Indra Lal', '1-july-1996', 'F', 'neelamarya38@gmail.com', '8937866236', '9837121894', 'Ability to work smoothly in all situations, meeting datelines and coping with increasing responsibility. Always eager to learn new technologies and willing to apply then to give better results and Capable of efficiently working independently as well as a team member.', 'Ability to work smoothly in all situations, meeting datelines and coping with increasing responsibility. Always eager to learn new technologies and willing to apply then to give better results and Capable of efficiently working independently as well as a team member.', '4 week training at33\\11KV substaion ramnagar', '', '', '', '', '', '', '', '', '', '', 'UK', '2013', '51%', 'UK', '2011', '49.2%'),
(33, '33.jpg', '33.docx', 'DEEPAK KULYAL', 'T.S KULYAL', '1995-08-27', 'M', 'DEEPAKKULYAL@GMAIL.COM', '8755888535', '9627586326', 'TO SEEK CHALLENGING ASSIGNMENT AND RESPONSIBILITY, WITH AN OPPORTUNITY FOR GROWTH AND CAREER ADVANCEMENT AS SUCCESSFUL ACHIEVEMENTS.', 'GOOD COMMUNICATION, HARD WORKING,DISCIPLINE,LEADER-SHIP', '4 WEEK TRAINING AT 220kV POWER SUB-STATION FROM KAMALVAGANJA.', '', '', '', '', '', 'B.Tech', 'EEE', '61', '2017', 'NONE', 'C.B.S.E', '2010', '64', 'C.B.S.E', '2012', '54'),
(34, '34.jpg', '34.docx', 'TARUN KAIRA', 'MADAN MOHAN SINGH KAIRA', '1996-07-05', 'M', 'TARUNKAIRA456@GMAIL.COM', '8791253792', '9410942553', 'TO SEEK CHALLENGING ASSIGNMENT AND RESPONSIBILITY WITH AN OPPORTUNITY FOR GROWTH AND CAREER ADVANCEMENT.', 'HARDWORKING, DISCIPLINE, GOOD PEOPLE SKILLS, SOLAR PANEL INSTALLATION AND MAINTEANCE', '4 WEEKS TRAINING FROM 220KV SUB-STATION  KAMALWAGANJA HALDWANI', '', '', '', '', '', 'B.Tech', 'EEE', '63.4', '2017', 'NONE', 'C.B.S.E', '2013', '68', 'C.B.S.E.', '2011', '68.6'),
(35, 'x', 'x', 'HIMANSHU  BHATT', 'SURESH CHANDRA BHATT', '27-07-1995', 'M', 'himanshubhatt3808@gmail.com', '7037057508', '7351138808', 'To be a part of a dynamic and growing organization which offers professional with creative freedom, scientific approach and practical challenge.', 'Ability tp work smoothly in all situations,meeting datelines,and coping with increasing responsibilty.Always eager to learn new technologies and willing to apply then to give better results and Capable of efficiently working independently as well as a team member.', 'Done six week summer training at Century Pulp and Paper, Lalkuan Uttrakhand', '', '', '', '', '', 'B.Tech', 'EEE', '60.4% (till 5th seme', '2017', 'NO', 'CBSE', '2013', '53%', 'CBSE', '2010', '53%'),
(36, 'x', 'x', 'HIMANSHU BHATT', 'SURESH CHANDRA BHATT', '27-07-1995', 'M', 'himanshubhatt3808@gmail.com', '7037057508', '7351138808', 'To be a part of a dynamic and growing organization which offers professional with creative freedom, scientific approach and practical challenge.', 'Always owed with “can-do spirit”.Decision-making leadership, acceptance of responsibility and evidence of teamwork.Quick learner, resourceful, productive, and with good sense of humour.Comprehensive problem solving abilities. Hard worker while creative.Able to work independently, as a part of team, able to vaporize and grasp new things quickly.', 'Done Six week summer training from Century Pulp & Paper,Lalkuan,Uttrakhand', '', '', '', '', '', 'B.Tech', 'EEE', '60.4%(till 5th sem)', '2017', 'NO', 'CBSE', '2013', '53.3%', 'CBSE', '2010', '53%'),
(37, '37.jpg', '37.doc', 'HIMANSHU BHATT', 'SURESH CHANDRA BHATT', '27-07-1995', 'M', 'himanshubhatt3808@gmail.com', '7037057508', '7351138808', 'To be a part of a dynamic and growing organization which offers professional with creative freedom, scientific approach and practical challenge', 'Always owed with “can-do spirit”. Decision-making leadership, acceptance of responsibility and evidence of teamwork.Quick learner, resourceful, productive, and with good sense of humour.Comprehensive problem solving abilities.Hard worker while creative.Able to work independently, as a part of team, able to vaporize and grasp new things quickly.', 'Summer Training at Century Pulp and Paper, Lalkuan Uttrakhand.', '', '', '', '', '', 'B.Tech', 'EEE', '60.4%(till 5th semes', '2017', 'NO', 'CBSE', '2013', '53.3%', 'CBSE', '2010', '53%'),
(38, '38.jpg', '38.docx', 'Manisha Chuphal', 'Surendra Singh Chuphal', '01-08-1996', 'F', 'manni2943@gmail.com', '9897463896', '9761882974', 'To seek challenging assignment and responsibility, with an opportunity for growth and career advancement as successful achievements.', 'hardworking, discipline, good communication skills, attentive', '4 weeks from 220kv sub-station kamaluwaganja ', '', '', '', '', '', 'B.Tech', 'EEE', '', '2017', 'none', 'uk', '2012', '69.8', 'uk', '2010', '66.4'),
(39, '39.jpg', '39.doc', 'Deepesh Darmwal', 'Yashwant singh Darmwal', '16.6.1996', 'M', 'deepeshdmwl89@gmail.com', '9837745559', '9917252998', 'Looking for a challenging career which demands the best of  my professional ability in terms of technical and analytical skills, and helps me in broadening and enhancing my current skill and knowledge.', '• Embedded system&#40;using AVR&#41; , basic knowledge of C ', 'DELHI METRO RAIL CORPORATION LTD.\n(non-traction SCADA )', '', '', '', '', '', 'B.Tech', 'ECE', '62%', '2017', 'no', 'UK', '2013', '52.2%', 'UK', '2011', '50.2%'),
(40, '40.jpg', '40.docx', 'JITENDRA KUMAR', 'RAM AVADH', '1993-06-14', 'M', 'jitendra.gpv@gmail.com', '9917206415', '9639372700', 'To work in an organization where I can utilize my skills, educational background and ability to work well with people.', '', '132kv s/s Kichha, Uttarakhand', '', '', '', '', '', 'B.Tech', 'EEE', '64.37', '2017', 'None', 'Uttarakhand Board', '2010', '49.20', 'Uttarakhand Board', '2008', '61.20'),
(41, '41.jpg', '41.doc', 'HIMANSHU ADHIKARI', 'DALIP SINGH', '1994-12-20', 'M', 'himanshuadhikari5@gmail.com', '9690915503', '8057882328', 'I am seeking a competitive and challenging environment where I can serve your organization and establish an enjoyable career for myself.', 'Word Processing', 'Completed 1 month Summer Training in PTCUL on operation and maintenance of 132 kV substation.\n\n', '', '', '', '', '', 'B.Tech', 'ECE', '64.25', '2017', '0', 'CBSE', '2012', '65.33', 'CBSE', '2010', '9.2 CGPA'),
(42, 'x', 'x', 'KUMUD PANT', 'MR.HARI VINOD PANT', '08/12/1996', 'M', 'kumud pant', '8859358053', '9410346639', 'Looking for a challenging career which demands the best of my professional ability in terms of  technical and analytical skills and helps me in broadening and enhancing my current skill and knowledge', 'Working more efficiently and productively so that maximum out put comes.good understanding of electrical instruments ,planning of projects,erection &maintenance;', '4 week summer training from PTCUL Haldwani', '', '', '', '', '', 'B.Tech', 'EEE', '68.5%', '2017', 'no', 'uttarakhand board', '2013', '68.6%', 'uttarakhand board', '2011', '67%'),
(43, '43.JPG', '43.doc', 'kumud pant', 'mr. hari vinod pant', '08/12/1996', 'M', 'kumud.pant6@gmail.com', '8859358053', '9410346639', 'Looking  for a challenging career which demands the best of my professional ability in terms of ,technical and analytical skills,and helps me  in broadening and enhancing my current skill and knowledge', 'working more efficiently and productively so that maximum output comes', '4 week summer training from PITCUL Haldwani', '', '', '', '', '', 'B.Tech', 'EEE', '68.5%', '2017', 'no', 'uttarakhand board', '2013', '68.6%', 'uttarakhand board', '2011', '67%'),
(44, '44.jpg', '44.doc', 'kumud pant', 'Mr.Hari vinod pant', '08/12/1996', 'M', 'kumud.pant6@gmail.com', '8859358053', '9410346639', 'Looking  for a challenging career which demands the best of my professional ability in terms of ,technical and analytical skills,and helps me  in broadening and enhancing my current skill and knowledge.', 'working more efficiently and productively so that maximum output comes', '4 week industrial training in PTCUL  Haldwani ', '', '', '', '', '', 'B.Tech', 'EEE', '68.5', '2017', 'no', 'uttarakhand board', '2013', '68.6', 'uttarakhand board', '2011', '67'),
(45, '45.jpg', '45.docx', 'AMIT MATIYALI', 'G S MATIYALI', '1994-09-21', 'M', 'amitmatiyali.96@gmail.com', '8057131586', '9897400597', 'To become a Network Administrator.', 'Routing & Switching, Routing Security.', 'HCL CDC,\nC-124 A, Sector-2, Noida (U.P)', '', '', '', '', '', 'B.Tech', 'CSE', '71%', '2017', '0', 'CBSE', '2012', '72.6%', 'CBSE', '2010', 'CGPA 9.0'),
(46, '46.jpg', '46.docx', 'Km. Neelam', 'Mr. Indra Lal', '1-july-1996', 'F', 'neelamarya38@gmail.com', '8937866236', '9837121894', 'A Suitable Position where the career offers challenging assignments for handling increasing responsibilities in result oriented environment and to fully utilize my knowledge or skills for the growth and processes of the organization and myself.', 'Ability to work smoothly in all situations, meeting datelines and coping with increasing responsibility. Always eager to learn new technologies and willing to apply then to give better results and Capable of efficiently working independently as well as a team member.', '4 week summer training at 33\\11KV substation ramnagar', '', '', '', '', '', 'B.Tech', 'EEE', 'Appearing', '2011', '', 'UK', '2013', '51%', 'UK ', '2011', '49.2%'),
(47, '47.jpg', '47.doc', 'kumud pant', 'mr hari vinod pant', '08/12/1996', 'M', 'kumud.pant6@gmail.com', '8859358053', '9410346639', 'Looking  for a challenging career which demands the best of my professional ability in terms of ,technical and analytical skills,and helps me  in broadening and enhancing my current skill and knowledge.', 'Working more efficiently and productively show that maximum output comes. Good understanding of different electrical instruments,planing of projects.', '4 week industrial training in PTCUL  Haldwani ', '', '', '', 'HHJJ', '', 'B.Tech', 'EEE', '68.8', 'Persuing', 'no', 'Uttarakhand board', '2013', '68.6', 'Uttarakhand board', '2011', '67'),
(48, '48.jpg', '48.doc', 'SAURABH JOSHI', 'ISHWAR CHANDRA JOSHI', '1995-06-25', 'M', 'saurabhjoshi157@gmail.com', '8650213472', '9027933994', 'MANAGER OF AN ESTEEMED ORGANIZATION', '• Imagining new innovative and creative ideas • Keen interest to gain knowledge on emerging technologies. • Project planning and participating in competitions • Dedicated and committed towards assigned task. • Committed team player with flexible approach to work and take initiative whenever required. • Keep modular approach to attain my task', 'CENTURY PULP AND PAPER', '', '', '', '', '', 'B.Tech', 'ECE', '72.2', '2017', 'NIL', 'UTTARAKHAND BOARD', '2012', '69.8', 'UTTARAKHAND BOARD', '2010', '79.6'),
(49, '49.jpg', '49.doc', 'SAURABH JOSHI', 'ISHWAR CHANDRA JOSHI', '1995-06-25', 'M', 'saurabhjoshi157@gmail.com', '8650213472', '9027933994', 'MANAGER OF AN ESTEEMED ORGANIZATION', '• Imagining new innovative and creative ideas • Keen interest to gain knowledge on emerging technologies. • Project planning and participating in competitions • Dedicated and committed towards assigned task. • Committed team player with flexible approach to work and take initiative whenever required. • Keep modular approach to attain my task', 'CENTURY  PULP AND PAPER', '', '', '', '', '', 'B.Tech', 'ECE', '72.2', '2017', 'NIL', 'UTTARAKHAND BOARD', '2012', '69.8', 'UTTARAKHAND BOARD', '2010', '79.6'),
(50, '50.jpg', '50.docx', 'Shruti Rastogi', 'Rajeev Rastogi', '20-02-1996', 'F', 'rastogi.01shruti@gmail.com', '8533099427', '9837067992', 'To take up challenging careers and grow consistently along with the organization.', 'technical skill :- PCB Designing', 'Surya Roshni Kashipur', '', '', '', '', '', 'B.Tech', 'ECE', '68.56', '2017', '0', 'CBSE', '2013', '57', 'CBSE', '2011', 'CGPA 7.6'),
(51, 'x', 'x', 'devendra singh', 'surendra singh', '1996-03-30', 'M', 'devkanyal4@gmail.com', '8057420884', '8909035934', 'A Suitable Position where the career offers challenging assignments for handling increasing responsibilities in result oriented environment and to fully utilize my knowledge or skills for the growth and processes of the organization and myself..', 'no', '4week training at 132 kv substation kichha', '', '', '', '', '', 'B.Tech', 'EEE', 'appearing', '2013-17', 'yess', 'u.k board', '2013', '47.2', 'u.k board', '2011', '45.8'),
(52, 'x', 'x', 'devendra singh', 'surendra singh', '1996-03-30', 'M', 'devkanyal4@gmail.com', '8057420884', '8909035934', 'A Suitable Position where the career offers challenging assignments for handling increasing responsibilities in result oriented environment and to fully utilize my knowledge or skills for the growth and processes of the organization and myself..', 'no', '4week training at 132 kv substation kichha', '', '', '', '', '', 'B.Tech', 'EEE', 'appearing', '2013-17', 'yess', 'u.k board', '2013', '47.2', 'u.k board', '2011', '45.8'),
(53, '53.jpg', '53.docx', 'GEETA LOSHALI ', 'NARAYAN DUTT LOSHALI ', '24-6-1995', 'F', 'geetamahiloshaligeeta@gmail.com', '8650021173', '9719092702', 'To wok in a meaningful and challenging position that enable me to develop myself as a professional and permits scope for advancement. ', 'EMBEDDED SYSTEM&#40;AVR&#41;', 'EMBEDDED(AVR)', '', '', '', '', '', 'B.Tech', 'ECE', 'Fattabangar motinaga', '2013-2017', '1', 'UK', '2013', '70%', 'UK', '2011', '60%'),
(54, '54.jpg', '54.doc', 'Jagdish Singh', 'Kailash Singh', '1994-09-15', 'M', 'jagdishst1594@gmail.com', '8266055852', '9897049342', 'Looking for a challenging career which demands the best of my professional ability in terms of technical and analytical skills, and helps me in broadening and enhancing my current skill and knowledge to growth along with the organization objective.  ', 'Word proccesing ', 'Summer Training at Research Design And Standard Organization (RDSO), Lucknow in Signal Directorate.', '', '', '', '', '', 'B.Tech', 'ECE', '65.5', '2017', '0', 'CBSE', '2012', '71.2', 'CBSE', '2010', '7.8 CGPA'),
(55, '55.jpg', '55.docx', 'Praney Raghuvanshi', 'Anand Veer Singh Raghuvanshi', '1995-09-20', 'M', 'praney.raghuvanshi@gmail.com', '8445124396', '8859067380', 'To become a successful person in the field of Information Technology Industry.', 'Networking (Routing & Switching), C & Core Java', 'In CCNA from HCL CDC, Noida', '', '', '', '', '', 'B.Tech', 'CSE', '72.10', '2017', 'None', 'CBSE', '2013', '84.60', 'ICSE', '2011', '93.40'),
(56, '56.jpg', '56.doc', 'Sneha Bisht', 'R.S Bisht', '1996-03-09', 'F', 'snehasinghbisht2013@gmail.com', '9410348683', '9411790261', 'To achieve an honorable position in a reputed Organization to grow, both as a person and a professional, and to combine the knowledge I have with the resources available at my disposal to excel for the betterment of the Organization and my own.', 'Dedicated, Quick learner, Good Communication Skills, Hard-working, flexible, Self-motivating', 'Four Weeks Training on ‘Telecommunication’ at Bharat Sanchar Nigam Limited, Haldwani  (20 June 2016 to 17 July 2016)', '', '', '', '', '', 'B.Tech', 'ECE', '75.083', '2017', '', 'CBSE', '2012', '77.8', 'CBSE', '2010', '9.6'),
(57, '57.jpg', '57.doc', 'Harshit Khulbe', 'Rajendra Prasad Khulbe', '05,March,1993', 'M', 'khulbeharshit@gmail.com', '9012462075', '7060783452', 'To become a successful professional in the field of Electrical Engineering and take up the challenging carriers and grow consistently.', '', '1 month summer training from 33/11 KV substation, Chilkiya,Ramnagar under UPCL', '', '', '', '', '', 'B.Tech', 'EEE', '63.91', '2017', 'NIL', 'CBSE', '2013', '65', 'CBSE', '2009', '71.2'),
(58, '58.jpg', '58.doc', 'JYOTI MEHRA', 'Mr. INDER SINGH MEHRA', '1995-10-31', 'F', 'jyotimehraeee@gmail.com', '9634223263', '9634223263', 'Looking  for a challenging career which demands the best of my professional ability in terms of ,technical and analytical skills,and helps me  in broadening and enhancing my current skill and knowledge', 'solar panel installation, effective communication, leadership quality ', 'PTCUL Kamaluwaganja, haldwani', '', '', '', '', '', 'B.Tech', 'EEE', '77.85', '2017', 'none', 'cbse', '2013', '78.4', 'cbse', '2011', '10 CGPA'),
(59, 'x', 'x', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(60, '60.jpg', '60.doc', 'Lalit Darmwal', 'N S Darmwal', '06.06.1996', 'M', 'lallitdarmwal13@gmail.com', '9761320085', '9411303260', 'To obtain a position in a professional environment where my skill is valued and can benefit the organization.', 'Knows Embedded System,C language.', 'Emtech Foundation(On PIC microcontroller)', '', '', '', '', '', 'B.Tech', 'ECE', '65', '2017', 'None', 'CBSE', '2013', '82', 'CBSE', '2011', '79.8'),
(61, '61.jpg', '61.docx', 'Praveen Nath Goswami', 'Mr. Dev Nath Goswami ', '1995-01-14', 'M', 'praveengoswami9009@mail.com', '8006963046', '9927918050', 'To gain employment with a company where my leadership experience and knowledge, especially in the area of Electrical&electronics; and industrial automation, can be used effectively', 'effective communication, good leadership quality', 'PTCUL HALDWANI & CETPA NOIDA', '', '', '', '', '', 'B.Tech', 'EEE', 'appearing', '2017', 'yes', 'u.k. board', '2012', '54', 'u.k. board', '2010', '65'),
(62, '62.jpg', '62.doc', 'Pragati Bhojak', 'Mr. Pushkar Singh Bhojak', '1995-02-17', 'F', 'pragatibhojak@gmail.com', '8755324844', '9412362027', 'To contribute in the growth of an organization, to enhance my skills and add value to myself.', 'Telecommunication, core electronics', ' Bharat Sanchar Nigam Limited, Haldwani.', '', '', '', '', '', 'B.Tech', 'ECE', '64.06', '2017', 'None', 'CBSE', '2013', '57.6', 'CBSE', '2011', '81.7'),
(63, '63.jpg', '63.docx', 'NEHA JOSHI', 'RAJENDRA PRASAD JOSHI', '19-09-1997', 'F', 'JOSHINEHA19997@GMAIL.COM', '9639551733', '9837406647', 'To work for an organization which provides me an opportunity to enhance, improve & utilize my potential knowledge & skills to self-growth along with fulfilling organizational goals', 'GOOD COMMAND ON MATHEMATICS,GOOD KNOWLEDGE OF BASIC ELECTRONICS ,GOOD COMMAND ON WIRELESS NETWORKS,GOOD COMMAND ON TELECOMMUNICATIONS ,GOOD KNOWLEDGE OF COMPUTERS', '4 WEEKS VOCATIONAL TRAINING FROM BSNL HALDWANI', '', '', '', '', '', 'B.Tech', 'ECE', '73', '2017', '0', 'CBSE', '2013', '76.4', 'CBSE', '2011', '9.0 CGPA'),
(64, '64.jpg', '64.doc', 'DISHANT KUMAR', 'ANIL KUMAR', '20-01-1996', 'M', 'DISHANTLOHAN6666@GMAIL.COM', '9720166667', '9536910927', 'To be associated with a progressive organization that provides an opportunity to apply my knowledge and skills in order to keep abreast with latest trends and technologies.', 'GOOD COMMAND ON TELECOMMUNICATION ,GOOD COMMAND ON WIRELESS NETWORKS,GOOD COMMAND ON BASIC ELECTRONICS,GOOD COMMANDS ON COMPUTERS', '4 WEEKS VOCATIONAL TRAINING FROM BSNL HALDWANI', '', '', '', '', '', 'B.Tech', 'ECE', '69.3%', '2017', '0', 'CBSE', '2013', '64.2%', 'CBSE', '2011', '9.0 CGPA'),
(65, '65.jpg', '65.doc', 'Rishabh Saxena', 'A P Saxena', '1995-08-08', 'M', 'rishabh.saxena9@gmail.com', '9997338934', '9411539547', 'android application developer,web developer', 'coding and designing', 'Android Application Development course from DUCAT,Noida', '', '', '', '', '', 'B.Tech', 'CSE', '70', '2017', '0', 'CBSE', '2013', '72.4', 'CBSE', '2011', '76'),
(66, '66.jpg', '66.doc', 'Dinesh Singh Adhikari', 'Bhupal Singh Adhikari', '30-09-1994', 'M', 'dineshadhikari073@gmail.com', '8755660733', '7579140665', 'Working in an environment which can satisfactorily fullfill my desires and uses my real talent.', 'sincerity,punctuality, working in group ,logic approach ', 'Uttarakhand Power Corporation Limited', '', '', '', '', '', 'B.Tech', 'ECE', '55', '2017', '10', 'CBSE', '2011', '69.2', 'CBSE', '2009', '79.6'),
(67, '67.JPG', '67.doc', 'NEHA PANDEY', 'PARAS NH PANDEY', '1995-06-05', 'F', 'nehap3922@gmail.com', '7535968448', '9837976108', 'TO hold a responsible positive in a professionally managed company and use my ability for personal and professional satisfaction and growth.', '• Imagining new innovative and creative ideas • Keen interest to gain knowledge on emerging technologies. • Project planning and participating in competitions', 'surya roshni industry from kashipur', '', '', '', '', '', 'B.Tech', 'ECE', '65.5', '2017', 'NIL', 'UTTARAKHAND BOARD', '2012', '57.5', 'UTTARAKHAND BOARD', '2010', '64'),
(68, '68.jpg', '68.docx', 'Gaurav Goswami', 'Harak Nath Goswami', '1996-09-01', 'M', 'garvg009@gmail.com', '8393089788', '8445876725', 'To become a s/w developer', 'c,c++,java', 'Netcom, haldwani', '', '', '', '', '', 'B.Tech', 'IT', '61', '2017', '0', 'CBSE', '2013', '55', 'CBSE', '2011', '8.6 CGPA'),
(69, '69.jpg', '69.doc', 'Abhishek Srivastava', 'Sachin Chaudhary', '1995-05-22', 'M', 'abhisheksrivastava58253@gmail.com', '8791545885', '9897074518', 'Seeking a challenging career with a progressive organization that provides an opportunity to capitalize my technical skills and abilities in the field of engineering.', 'Time management skills, Quick learning skills', 'All India Radio Shimla', '', '', '', '', '', 'B.Tech', 'ECE', '67.15', '2017', '0', 'CBSE', '2013', '59.2', 'CBSE', '2011', '7.8 Cgpa'),
(70, '70.JPG', '70.docx', 'Rahul Singh Chufal', 'Mr. Pooran Singh Chufal', '1996-07-20', 'M', 'rahulchufal472@gmail.com', '9719306777', '8126933444', 'Looking for a challenging career which demands the best of my professional ability in terms of technical and analytical skills, and helps me in broadening and enhancing my current skill and knowledge.', 'C, C++, JAVA, HTML & CSS, PHP', 'Six week Summer Training In Php From HCL Cdc Noida Sec 2 ', '', '', '', '', '', 'B.Tech', 'CSE', '', '2017', '0', 'UK BOARD', '2013', '64.5', 'UK BOARD', '2011', '76.6'),
(71, '71.jpg', '71.docx', 'Harish Singh Aithani', 'Mangal Singh', '1996-05-25', 'M', 'aithaniharish8@gmail.com', '7500613730', '9808153989', 'Looking forward to an opportunity for a working in a dynamic, challenging environment where I can utilize my skills for developing my career and for the growth of organization.', 'C, Core Java, Advanced Java.', 'Done 42 days training in HCL from June 13, 2016 to July 25, 2016. ', '', '', '', '', '', 'B.Tech', 'CSE', '', '2017', '0', 'UK BOARD', '2013', '56.80', 'UK BOARD', '2011', '51.20'),
(72, '72.jpg', '72.docx', 'DISHA ANDOLA', 'M.N.ANDOLA', '1996-01-04', 'F', 'disha.andola@gmail.com', '8057116856', '9761436213', 'To build a successful career in the field of computer science Industry, utilizing my skills and fast learning abilities.', 'C, C++, java, C#,ASP, HTML,SQL Server & MS access.', ' In .net tech from SoftTech Software Pvt Ltd of 8 weeks.', '', '', '', '', '', 'B.Tech', 'CSE', '72%', '2017', '0', 'CBSE', '2013', '75.60%', 'CBSE', '2011', 'CGPA 8.8'),
(73, '73.jpg', '73.docx', 'ANKITA PAWAR', 'Mr. D.S.PAWAR', '1996-08-15', 'F', 'anki.15p@gmail.com', '8126637565', '9410907844', ' To grab an opportunity and set myself a goal where I can be innovative and attain a challenging position by exercising my interpersonal and professional skills to the fullest for the growth of the organization and mine as well .', 'Basic  Core Java, Asp.net (4.0)  Web Application (Web Forms), HTML,SQL Server & M S Access.', ' In .Net tech from SoftTech Software Pvt Ltd (Duration-8 weeks).', '', '', '', '', '', '', '', '', '', '', 'CBSE', '2013', '66.80%', 'CBSE', '2011', 'CGPA 8.8'),
(74, '74.jpg', '74.docx', 'MEENAKSHI RAWAT', 'Mr. YASHPAL SINGH RAWAT', '1996-10-09', 'F', 'meenakshirawat0096@gmail.com', '8057024115', '9756789679', 'To work for an organization which provides me the opportunity to improve my skills and knowledge to growth  along with the organization objective.', 'Basic C, Basic Core java, Ms Access, SQL Server 2008, ASP.net with C#(.net platform) & HTML.', 'In .net tech from SoftTech Software Pvt Ltd (Duration-8 weeks) .', '', '', '', '', '', 'B.Tech', 'CSE', '70%', '2017', '0', 'UK Board', '2013', '73%', 'UK Board', '2011', '82.80%'),
(75, '75.jpg', '75.docx', 'Gagandeep Singh', 'Mohan Singh', '28-12-1995', 'M', 'g2mgs4@gmail.com', '9760290144', '8126611477', 'My objective is to become associated with a company where I can utilize my skills and gain further experience while enhancing the company’s productivity and reputation.', 'C, C++, C#, Java, HTML with CSS, ASP.NET, SQL', 'Basic .NET Technologies from HCL CDC, Noida', '', '', '', '', '', 'B.Tech', 'CSE', '64%', '2017', '0', 'CBSE', '2013', '84%', 'CBSE', '2011', '8.6 CGPA'),
(76, '76.jpg', '76.docx', 'Gagandeep Singh', ' Mohan Singh', '28-12-1995', 'M', 'g2mgs4@gmail.com', '9760290144', '8126611477', 'My objective is to become associated with a company where I can utilize my skills and gain further experience while enhancing the company’s productivity and reputation.', 'C, C++, C#, Java, HTML with CSS, ASP.NET', 'Basic .NET Technologies from HCL CDC, Noida', '', '', '', '', '', 'B.Tech', 'CSE', '64%', '2017', '0', 'CBSE', '2013', '84%', 'CBSE', '2011', '8.6 CGPA'),
(77, '77.jpg', '77.docx', 'ANKITA KANDPAL', 'J B KANDPAL', '12-10-1995', 'F', 'ankitakandpal271@gmail.com', '7060395773', '7060375773', 'To associate  with an organization that promises a creative career in progressive environment so to enhance my knowledge and skills in the state of new technology and be a part of the team that excels in work towards the growth of organization.', 'c and java', 'project on book store ( library management) using swings with jDBC\ncompany Name: HCL CDC, noida', '', '', '', '', '', 'B.Tech', 'CSE', '71.9', '2017', 'none', 'CBSE', '2013', '76.8', 'CBSE', '2011', '9.4 CGPA'),
(78, 'x', 'x', 'Neeraj ', 'Narayan Dutt Kandpal ', '7-4-1996', 'M', 'nkandpal85@gmail.com ', '7895085664 ', '9910150585', 'To grab an opportunity and set myself a goal where I can be innovative and attain a challenging position by exercising my interpersonal and professional skills to the fullest for the growth of the organization and mine as well.  ', '', '', '', '', '', '', '', 'B.Tech', 'IT', '76', '2017', '0', 'CBSE', '2013', '80.6', 'CBSE', '2011', '8.2 CGPA '),
(79, 'x', 'x', 'Neeraj ', 'Narayan Dutt Kandpal ', '7-4-1996', 'M', 'nkandpal85@gmail.com ', '7895085664 ', '9910150585', 'To grab an opportunity and set myself a goal where I can be innovative and attain a challenging position by exercising my interpersonal and professional skills to the fullest for the growth of the organization and mine as well.  ', 'networking', 'In CCNA\nFrom HCL NOIDA', '', '', '', '', '', 'B.Tech', 'IT', '76', '2017', '0', 'CBSE', '2013 ', '80.6', 'CBSE', '2011 ', '8.2 cgpa'),
(80, '80.jpg', '80.docx', 'Jaideep Goyal', 'Mr. G.L. Goyal', '30-june-1995', 'M', 'Jaigoyalhld@gmail.com', '8923849167', '9012049424', 'Looking for a challenging career which demands the best of my professional ability in terms of technical and analytical skills', 'Dot.Net, C, Java, HTML, ', 'HCL-CDC, Noida', '', '', '', '', '', 'B.Tech', 'CSE', '57.8%', '2017', '1', 'CBSE', '2013', '58%', 'CBSE', '2010', 'CGPA 7.0'),
(81, 'x', 'x', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(82, '82.jpg', '82.docx', 'BRIJESH SINGH RAWAT', 'J S RAWAT', '17/04/1995', 'M', '123789b@gmail.com', '9897785145', '9555898748', 'Seeking to achieve a responsible position in a reputed Organization where I could apply all my  knowledge with all my available resources and can be part in the growth of the Organization.', 'c language, c++, core java, advance java, php, C#, Cisco Packet Tracer, HTML5, javascript , bootstrap , css3', '6  week  Summer  training  in  Networking  from  Institute  Of  Telecom  Technology  & \nManagement,  Delhi  (MTNL).    Successfully  Completed  the  Project  on  College  Network \nusing CISCO PACKET TRACER on 5th of August 2016.', '', '', '', '', '', 'B.Tech', 'CSE', '76.7', '2017', '0', 'CBSE', '2012', '74.6', 'CBSE', '2010', '79.8'),
(83, 'x', 'x', 'Neeraj ', 'Narayan Dutt Kandpal ', '7-4-1996', 'M', 'nkandpal85@gmail.com ', '7895085664 ', '9910150585', 'To grab an opportunity and set myself a goal where I can be innovative and attain a challenging position by exercising my interpersonal and professional skills to the fullest for the growth of the organization and mine as well.  ', 'networking ', 'CCNA ', '', '', '', '', '', 'B.Tech', 'IT', '76', '2017 ', '0', 'CBSE', '2013 ', '80', 'CBSE ', '2011 ', '8.2 CGPA '),
(84, 'x', 'x', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(85, '85.jpg', '85.docx', 'NEERAJ', 'NARAYAN DUTT KANDPAL', '07/04/1996', 'M', 'nkandpal85@gmail.com', '7895085664', '9910150585', 'To grab an opportunity and set myself a goal where I can be innovative and attain a challenging position by exercising my interpersonal and professional skills to the fullest for the growth of the organization and mine as well. ', 'networking', 'hcl cdc noida', '', '', '', '', '', 'B.Tech', 'IT', '76', '2017', '0', 'CBSE', '2013', '80', 'CBSE', '2011', '8.2'),
(86, 'x', 'x', ' Barkha Joshi', 'Mr. Tribhuwan chandra joshi', '05-07-1993', 'F', 'barkhajoshi654@gmail.com', '8954774766', '9917780339', 'To become a successful professional in the field of computer science and work in an innovative  and competitive world.', 'Basic C,Core java,.net', 'Softtech Software Pvt.Ltd\nGaura Complex,Laldath,Haldwani(Nainital)', '', '', '', '', '', 'B.Tech', 'CSE', '63.5%', '2017', '0', 'UK BOARD', '2011', '48%', 'UK BOARD', '2008', '59.4%'),
(87, 'x', 'x', ' Barkha Joshi', 'Mr. Tribhuwan chandra joshi', '05-07-1993', 'F', 'barkhajoshi654@gmail.com', '8954774766', '9917780339', 'To become a successful professional in the field of computer science and work in an innovative  and competitive world.', 'Basic C,Core java,.net', 'Softtech Software Pvt.Ltd\nGaura Complex,Laldath,Haldwani(Nainital)', '', '', '', '', '', 'B.Tech', 'CSE', '63.5%', '2017', '0', 'UK BOARD', '2011', '48%', 'UK BOARD', '2008', '59.4%'),
(88, '88.jpg', '88.docx', 'Barkha joshi', 'Mr. Tribhuwan chandra joshi', '1993-07-05', 'F', 'barkhajoshi654@gmail.com', '8954774766', '9917780339', 'To become a succesful professional in the field of computer science and work in an innovating and competitive world.', 'Basic C,Core java, .net', 'Softtech software pvt.ltd\nGaura complex ,Laldhath Haldwani(Nainital)', '', '', '', '', '', 'B.Tech', 'CSE', '63%', '2017', '0', 'Uk Board', '2011', '48%', 'Uk Board', '2008', '59.4%'),
(89, '89.jpg', '89.docx', 'Neha khati', 'Mr Shiv Shankar Singh Khati', '1995-06-09', 'F', 'nehakhati08@gmail.com', '7409082972', '9411520759', 'To build a successful carrier in the field of computer science industry ,Utilizing my analytical ,problem sloving and learning abilites.', 'basic java and C,.net,database-SQL', 'Oracle11gsqldevloper fundamental of sql\nSeed infotech Ltd\nBSEL Tech Park,C Wing,111to118,First Floor,Sector-30A\nOPP to Vashi Railway Station,Vashi Navi Mumbai-400703', '', '', '', '', '', 'B.Tech', 'CSE', '65.95%', '2017', '0', 'Uttrakhand board', '2011', '54.6%', 'Uttrakhand Board', '2009', '59%'),
(90, '90.jpg', '90.docx', 'Ankita Khatri ', 'Kishan Khatri ', '1995-09-18', 'F', 'ankitakhatri82@gmail.com', '9084464582', '9639101962', 'I am self motivating & ability to easily mingle with people,never dying confiidence.', '', 'HCl CDC Noida ', '', '', '', '', '', 'B.Tech', 'IT', '69', '2017', '', 'CBSE ', '2013', '70.2', 'CBSE ', '2011', '7.8'),
(91, '91.jpg', '91.docx', 'Ankita Khatri ', 'Kishan Khatri ', '1995-09-18', 'F', 'ankitakhatri82@gmail.com', '9084464582', '9639101962', 'I am self motivating & ability to easily mingle with people,never dying confiidence.', '', 'HCl CDC Noida ', '', '', '', '', '', 'B.Tech', 'IT', '69', '2017', '', 'CBSE ', '2013', '70.2', 'CBSE ', '2011', '7.8'),
(92, '92.jpg', '92.docx', 'Beena Rautela ', 'Mr. Nain Singh Rautela', '1996-04-05', 'F', 'beenarautela05@gmail.com', '9675620953', '7300743015', 'To become a successful professional in field of Information Technology and to work in an innovative and competitive world.   ', 'Basic C, Core Java, HTML, Dot net, Java Script', '2 months summer training from Soft Tech Software Pvt. Ltd. Haldwani project on student management system.   ', '', '', '', '', '', 'B.Tech', 'IT', '70', '2017', 'Physics', 'UK', '2013', '65.4', 'UK', '2011', '64.2'),
(93, '93.jpg', '93.docx', 'Abhishek Chauhan', 'Mahendra Singh Chauhan', '1996-10-30', 'M', 'abhishekchauhan1101@gmail.com', '8755256377', '8273257390', 'To become a successful professional in the field of Information Technology and to work in an innovative and competitive world.', 'Java, C, C++, Android Overview, PHP', '6 week summer training from CETPA Pvt. InfoTech Limited, Dehradun.', '', '', '', '', '', 'B.Tech', 'CSE', '63', '2017', '0', 'CBSE', '2013', '79.6', 'CBSE', '2011', '81.7'),
(94, '94.jpg', '94.docx', 'Abhishek Chauhan', 'Mahendra Singh Chauhan', '1996-10-30', 'M', 'abhishekchauhan1101@gmail.com', '8755256377', '8273257390', 'To become a successful professional in the field of Information Technology and to work in an innovative and competitive world.', 'Java, C, C++, Android Overview, PHP', '6 week summer training from CETPA Pvt. InfoTech Limited, Dehradun.', '', '', '', '', '', 'B.Tech', 'CSE', '63', '2017', '0', 'CBSE', '2013', '79.6', 'CBSE', '2011', '81.7'),
(95, '95.jpg', '95.docx', 'Priyanshi Kotlia', 'Mr Bhagwat Singh Kotlia', '1996-01-13', 'F', 'priyanshikotlia585@gmail.com', '9758467342', '9084728823', 'Seeking to achieve a responsible position in a reputed organization where i could apply all my knowledege with all my available resource and can be part in the growth of the organization .', 'C,Core java,.net', 'Netcom Computer Education Mukhani(Haldwani)', '', '', '', '', '', 'B.Tech', 'CSE', '71%', '2017', '0', 'CBSE', '2013', '76.2%', 'CBSE', '2011', '8.6CGPA'),
(96, '96.jpg', '96.docx', 'SAURABH KUMAR', 'ANIL KUMAR SINGH', '1997-01-07', 'M', 'ksaurabh736@gmail.com', '8477856657', '9808319294', 'looking for a challenging role so that i can use my capabilities through sincerely dedication and hard work to move up the graph of the organization.', 'leadership and management skill , team work ', 'Bhel  RUDRAPUR', '', '', '', '', '', 'B.Tech', 'ME', '65.42', '2017', 'NO', 'BSEB', '2013', '68.8', 'BSEB', '2011', '69.2'),
(97, '97.jpg', '97.docx', 'SAURABH KUMAR', 'ANIL KUMAR SINGH', '1997-01-07', 'M', 'ksaurabh736@gmail.com', '8477856657', '9808319294', 'looking for a challenging role so that i can use my capabilities through sincerely dedication and hard work to move up the graph of the organization.', 'leadership and management skill, team work.', 'BHEL  Rudrapur', '', '', '', '', '', 'B.Tech', 'ME', '65.42', '2017', 'NO', 'BSEB', '2013', '68.8', 'BSEB', '2011', '69.2'),
(98, '98.jpg', '98.docx', 'Rashmi Pandey', 'Triveni Chandra Pandey', '1995-03-11', 'F', 'rashmipandey1127@gmail.com', '9536302424', '9411537961', 'To cement my feet as software engineer by utilizing hard and smart work skill and implementing the knowledge grabbed at graduation and summer training.', 'Good communication, technical and interpersonal skill', 'Attented 6 week training from HCL CDC, Noida under the guidence of technical head Mr Aftab Alam. Developed a project on Northern Railways which depicts the communication between the different zones which uses different routing protocol.', '', '', '', '', '', 'B.Tech', 'IT', '75', '2017', 'Nil', 'CBSE', '2012', '68', 'CBSE', '2010', '8.4 (CGPA)'),
(99, '99.jpg', '99.docx', 'Priyanka Bhatt', 'Pooran Chandra Bhatt', '1996-02-21', 'F', 'bhattpriyanka6789@gmail.com', '9917306295', '7830094203', 'To be prominent part of an innovative team that reaches out for new horizons in computer science and to trample new grounds in technology and administration.', 'Good technical skill', 'Attended 6 week summer training from Soft ech Info tech. And developed project on Student Management System using DotNet framework.', '', '', '', '', '', 'B.Tech', 'CSE', '65', '2017', 'Nil', 'CBSE', '2013', '65', 'CBSE', '2011', '7.2 (CGPA)'),
(100, 'x', 'x', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(101, '101.jpg', '101.docx', 'SUJEET KUMAR', 'PANNALAL PRASAD', '1995-03-20', 'M', 'sujeetkumar.sk59@gmail.com', '9568671311', '9934779589', 'To achieve an excellence in my professional and personal aspiration by being an integral part of organisation with all round growth by utilizing my knowledge and skills for the achievement of desired objective and  goal of the organisation.  ', 'c, microsoft office, tally, sql ', 'BHEL RUDRAPUR', '', '', '', '', '', 'B.Tech', 'ME', '75.86', '2017', 'NO', 'BSEB', '2012', '72.8', 'BSEB', '2010', '73.8'),
(102, '102.jpg', '102.doc', 'Atul kumar sharma', 'Anil kumar sharma', '1995-07-12', 'M', 'sharmakumaraks@gmail.com', '8057698002', '9837094195', 'fresher', 'work pressure uncompromising loyalty.', ' Ess Gee  industries ,rudrapur', '', '', '', '', '', 'B.Tech', 'ME', '60', '2017', '2', 'uttarakhand board', '2012', '53%', 'uttarakhand board', '2010', '64%'),
(103, '103.jpg', '103.docx', 'Ram Navees Rana', 'Balram Singh Rana', '1995-04-15', 'M', 'ramnaveesrana@gmail.com', '9012678133', '9997496685', 'Smart work with full potential', 'Microsoft office  , c', 'U. T. C. ( Tanakpur)\nCompetent Automobile  Co. Pvt. Ltd', '', '', '', '', '', 'B.Tech', 'ME', '57.3', '2017', '2', 'C. B. S. E', '2013', '51.2', 'C. B. S. E', '2010', '58.9'),
(104, 'x', 'x', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(105, 'x', 'x', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(106, '106.jpg', '106.docx', 'RAVI SHANKAR', 'PARAS NATH GUPTA', '1995-06-30', 'M', 'er.ravishankar95@gmail.com', '8272887274', '7408261123', 'To achieve an excellence in my professional and personal aspiration by being an integral part of organisation with all round growth by utilizing my knowledge and skills for the achievement of desired objective and goal of the organisation.', 'CATIA, AUTO CAD, CNC, C-LANGUAGE, MS-OFFICE.', '1-SUMMER INTERNSHIP from HPCL (HINDUSTAN PETROLEUM COORPORATION  LIMITED) for 45 Days with stipend on the project DEVELOPMENT OF MAINTENANCE MODULE FOR RKPL.\n\n2-INPLANT TRAINING (1 month) from CENTRAL INSTITUTE OF TOOL DESIGN Hyderabad.', '', '', '', '', '', 'B.Tech', 'ME', '81.62', '2017', '', 'CBSE', '2012', '82.60', 'CBSE', '2010', '70.30');

-- --------------------------------------------------------

--
-- Table structure for table `tc_paths`
--

CREATE TABLE `tc_paths` (
  `ID` int(11) NOT NULL,
  `TCID` int(11) NOT NULL,
  `TC_NO` varchar(25) NOT NULL,
  `ATTACH_PATH` varchar(100) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS_` tinyint(1) NOT NULL,
  `USERNAME_` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tc_paths`
--

INSERT INTO `tc_paths` (`ID`, `TCID`, `TC_NO`, `ATTACH_PATH`, `DATE_`, `STATUS_`, `USERNAME_`) VALUES
(1, 1, '12', '1.PNG', '2018-06-04 15:52:48', 1, 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `toppers`
--

CREATE TABLE `toppers` (
  `SNO` int(11) NOT NULL,
  `SNAME` varchar(150) NOT NULL,
  `MERIT_NAME` varchar(250) NOT NULL DEFAULT 'x',
  `YOP` varchar(10) NOT NULL,
  `RANK` varchar(50) NOT NULL DEFAULT 'x',
  `PHOTO_` varchar(150) NOT NULL,
  `ANY_REMARK` text NOT NULL,
  `DOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` tinyint(1) NOT NULL,
  `USERNAME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `toppers`
--

INSERT INTO `toppers` (`SNO`, `SNAME`, `MERIT_NAME`, `YOP`, `RANK`, `PHOTO_`, `ANY_REMARK`, `DOC`, `STATUS`, `USERNAME`) VALUES
(1, 'Vihaan Mathur', 'XII', '2018', 'First Rank', '1.jpg', 'Marvellous Student', '2018-05-08 06:15:32', 1, 'nitin'),
(2, 'Gagan Pant', 'X', '2018', '1st Rank', '2.JPG', 'Very good', '2018-05-08 06:17:13', 1, 'nitin'),
(3, 'Faisal Khan', 'XI', '2018', '3rd Rank', '3.jpg', 'Stunning', '2018-05-08 06:17:36', 1, 'nitin'),
(4, 'John Abraham', 'XII', '2018', '10th', '4.jpg', 'good', '2018-05-08 06:18:58', 1, 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_certificate`
--

CREATE TABLE `transfer_certificate` (
  `TCID` int(11) NOT NULL,
  `TC_NO` varchar(25) NOT NULL,
  `ROLLNO` varchar(25) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `MNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `ADMISSION_DATE` varchar(25) NOT NULL,
  `ADMISSION_CLASS` varchar(10) NOT NULL,
  `LEAVING_DATE` varchar(25) NOT NULL,
  `LEAVING_CLASS` varchar(10) NOT NULL,
  `USERNAME_` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table is used to store the TC detail & fast retrieval';

--
-- Dumping data for table `transfer_certificate`
--

INSERT INTO `transfer_certificate` (`TCID`, `TC_NO`, `ROLLNO`, `FNAME`, `MNAME`, `LNAME`, `ADMISSION_DATE`, `ADMISSION_CLASS`, `LEAVING_DATE`, `LEAVING_CLASS`, `USERNAME_`) VALUES
(1, '12', '34', 'neeraj', '', 'singh', '2018-05-15', 'x', '2018-12-31', 'xii', 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming`
--

CREATE TABLE `upcoming` (
  `ID` int(11) NOT NULL,
  `SUBJECT` varchar(200) NOT NULL,
  `UPCOMING_EVENT` text NOT NULL,
  `PATH_ATTACH` varchar(150) NOT NULL,
  `DATE_` varchar(25) NOT NULL,
  `DATE_START` varchar(25) NOT NULL,
  `DATE_END` varchar(25) NOT NULL,
  `TIME_` varchar(25) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  `USERNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upcoming`
--

INSERT INTO `upcoming` (`ID`, `SUBJECT`, `UPCOMING_EVENT`, `PATH_ATTACH`, `DATE_`, `DATE_START`, `DATE_END`, `TIME_`, `STATUS`, `USERNAME`) VALUES
(1, 'Spandan 2018', 'Amrapali Institute Annual fest and function is on 23-24 Feb 2018. Please do come', '1.pdf', '08/02/2018', '2018-02-08', '2018-02-13', '03:29:21pm', 1, 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `ID` int(11) NOT NULL,
  `MENU` int(11) NOT NULL,
  `USER_` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`ID`, `MENU`, `USER_`) VALUES
(1, 1, 'adm'),
(2, 2, 'adm'),
(3, 3, 'adm'),
(4, 4, 'adm'),
(5, 5, 'adm'),
(6, 6, 'adm'),
(7, 7, 'adm'),
(8, 8, 'adm'),
(9, 9, 'adm'),
(10, 10, 'adm'),
(12, 12, 'adm'),
(13, 13, 'adm'),
(14, 14, 'adm');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `ST_ID` varchar(5) NOT NULL,
  `STATUS` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`ST_ID`, `STATUS`) VALUES
('adm', 'Administrator'),
('dir', 'Director'),
('usr', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERNAME_` (`USERNAME_`),
  ADD KEY `ACTIVITYCATEGID` (`ACTIVITYCATEGID`);

--
-- Indexes for table `activities_category`
--
ALTER TABLE `activities_category`
  ADD PRIMARY KEY (`ACT_CATEG_ID`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `STATUS` (`STATUS`);

--
-- Indexes for table `bday_data`
--
ALTER TABLE `bday_data`
  ADD PRIMARY KEY (`BID`),
  ADD KEY `USERNAME_` (`USERNAME_`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`DWNLD_ID`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FAC_ID`),
  ADD KEY `DEPT_ID` (`COURSE`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`GL_ID`),
  ADD KEY `CATEG_ID` (`CATEG_ID`);

--
-- Indexes for table `gallery_category`
--
ALTER TABLE `gallery_category`
  ADD PRIMARY KEY (`CATEG_ID`);

--
-- Indexes for table `importantdates`
--
ALTER TABLE `importantdates`
  ADD PRIMARY KEY (`IMPDTID`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`USERNAME_`),
  ADD KEY `STATUS` (`USER_STATUS`);

--
-- Indexes for table `menu_1`
--
ALTER TABLE `menu_1`
  ADD PRIMARY KEY (`ID_`);

--
-- Indexes for table `menu_user_status`
--
ALTER TABLE `menu_user_status`
  ADD PRIMARY KEY (`ST_ID`);

--
-- Indexes for table `mynews`
--
ALTER TABLE `mynews`
  ADD PRIMARY KEY (`NID`);

--
-- Indexes for table `newsevents`
--
ALTER TABLE `newsevents`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `STATUS` (`STATUS`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`NID`),
  ADD KEY `USERNAME_` (`USERNAME_`);

--
-- Indexes for table `tc_paths`
--
ALTER TABLE `tc_paths`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TCID` (`TCID`),
  ADD KEY `USERNAME_` (`USERNAME_`);

--
-- Indexes for table `toppers`
--
ALTER TABLE `toppers`
  ADD PRIMARY KEY (`SNO`),
  ADD KEY `YOP` (`YOP`);

--
-- Indexes for table `transfer_certificate`
--
ALTER TABLE `transfer_certificate`
  ADD PRIMARY KEY (`TCID`),
  ADD KEY `USERNAME_` (`USERNAME_`);

--
-- Indexes for table `upcoming`
--
ALTER TABLE `upcoming`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `STATUS` (`STATUS`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MENU` (`MENU`),
  ADD KEY `USER_` (`USER_`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`ST_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `activities_category`
--
ALTER TABLE `activities_category`
  MODIFY `ACT_CATEG_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bday_data`
--
ALTER TABLE `bday_data`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `DWNLD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `FAC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `GL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gallery_category`
--
ALTER TABLE `gallery_category`
  MODIFY `CATEG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `importantdates`
--
ALTER TABLE `importantdates`
  MODIFY `IMPDTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu_1`
--
ALTER TABLE `menu_1`
  MODIFY `ID_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `mynews`
--
ALTER TABLE `mynews`
  MODIFY `NID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `newsevents`
--
ALTER TABLE `newsevents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `NID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tc_paths`
--
ALTER TABLE `tc_paths`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `toppers`
--
ALTER TABLE `toppers`
  MODIFY `SNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transfer_certificate`
--
ALTER TABLE `transfer_certificate`
  MODIFY `TCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `upcoming`
--
ALTER TABLE `upcoming`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD CONSTRAINT `fk_mennu` FOREIGN KEY (`MENU`) REFERENCES `menu_1` (`ID_`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`USER_`) REFERENCES `menu_user_status` (`ST_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
