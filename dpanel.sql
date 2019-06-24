-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2019 at 01:09 PM
-- Server version: 5.7.26-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doonconv_dpanel`
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
(12, '1.jpg', 'x', 0, 0, 3, 1, 'op1'),
(13, '3.jpg', 'x', 0, 0, 3, 1, 'op1'),
(14, '4.jpg', 'x', 0, 0, 3, 1, 'op1'),
(15, '5.jpg', 'x', 0, 0, 3, 1, 'op1'),
(16, '6.jpg', 'x', 0, 0, 3, 1, 'op1'),
(17, '7.jpg', 'x', 0, 0, 3, 1, 'op1'),
(18, 'building1.jpg', 'x', 0, 0, 4, 1, 'op1'),
(19, 'building2.jpg', 'x', 0, 0, 4, 1, 'op1'),
(20, 'classroom.jpg', 'x', 0, 0, 4, 1, 'op1'),
(21, 'lab1.jpg', 'x', 0, 0, 4, 1, 'op1'),
(22, 'lab2.jpg', 'x', 0, 0, 4, 1, 'op1'),
(23, 'lab4.png', 'x', 0, 0, 4, 1, 'op1'),
(24, 'lab5.png', 'x', 0, 0, 4, 1, 'op1'),
(25, 'staff.JPG', 'x', 0, 0, 4, 1, 'op1');

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
(3, 'GENERAL', 'GENERAL', 1, '2019-06-16 12:58:10', ''),
(4, 'INFRASTRUCTURE', 'INFRASTRUCTURE', 1, '2019-06-16 12:58:24', '');

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
('nitin', '123', 'adm', 'The dpanel of School', 'School'),
('op1', 'op1$#123', 'usr', 'The dpanel of School', '');

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
(9, 'fa fa-camera fa-fw', 'TC', 'TC', 8),
(10, 'fa fa-camera fa-fw', 'Gallery', 'gallery', 8),
(12, 'fa fa-user fa-fw', 'topers', 'topper', 10),
(13, 'fa fa-user fa-fw', 'Downloads', 'downloads', 10),
(14, 'fa fa-user fa-fw', 'Imp Dates', 'importantDates', 11),
(15, 'fa fa-camera fa-fw', 'Offers', 'offers', 4),
(16, 'fa fa-camera fa-fw', 'Online TC', 'excel_/importTCData', 8);

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
(13, 'Katha Writers Workshop', 'Calling all young writers to enroll for Katha Club. Last date to enroll is 15/07/2016 ', 'x', 'Arial', '16/06/2019', '2019-06-16', '2022-06-30', '06:15:21pm', 1, 'op1'),
(14, 'UDAAN Scholarship', 'Students of class XI are requested to enroll for CBSE - UDAAN scholarship initiative. Last date for applying online is 13/07/2016 ', 'x', 'Arial', '16/06/2019', '2019-06-16', '2022-06-16', '06:16:07pm', 1, 'op1'),
(15, 'Elocution Competition for Classes 4 to 8', 'Get ready students to showcase your talent at the Elocution Competition to be held on 16/07/2016 ', 'x', 'Arial', '16/06/2019', '2019-06-16', '2022-06-16', '06:16:34pm', 1, 'op1'),
(16, 'Vision', 'The highest education is that which does not merely give us information but makes our life in harmony with all existence.', 'x', 'Arial', '16/06/2019', '2019-06-16', '2022-06-16', '06:17:03pm', 0, 'op1'),
(17, 'Infrastructure', 'Doon Convent School (D.C.S) comprises of 2 three-storeyed buildings with theme based class-rooms', 'x', 'Arial', '16/06/2019', '2019-06-16', '2022-06-16', '06:17:36pm', 0, 'op1'),
(18, 'About', 'Doon Convent School (D.C.S) was established in 1994. It is located in Haldwani, the foothills of Nainital.', 'x', 'Arial', '16/06/2019', '2019-06-16', '2022-06-16', '06:17:57pm', 0, 'op1');

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
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `ID` int(11) NOT NULL,
  `SUBJECT` varchar(200) NOT NULL,
  `OFFERS` text NOT NULL,
  `PATH_ATTACH` varchar(150) NOT NULL,
  `FONTJI` varchar(250) NOT NULL,
  `DATE_` varchar(25) NOT NULL,
  `DATE_START` varchar(25) NOT NULL,
  `DATE_END` varchar(25) NOT NULL,
  `TIME_` varchar(25) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  `USERNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school_profile`
--

CREATE TABLE `school_profile` (
  `SCH_ID` int(5) NOT NULL,
  `SCH_LOGO` varchar(50) NOT NULL,
  `SCH_NAME` varchar(100) NOT NULL,
  `SCH_CONTACT` varchar(65) NOT NULL,
  `SCH_EMAIL` varchar(50) NOT NULL,
  `SCH_ADD` varchar(200) NOT NULL,
  `SCH_CITY` varchar(100) NOT NULL,
  `SCH_DISITT` varchar(100) NOT NULL,
  `SCH_STATE` varchar(100) NOT NULL,
  `SCH_COUNTRY` varchar(100) NOT NULL,
  `AFFILIATION` varchar(1000) NOT NULL,
  `WEBSITE` varchar(200) NOT NULL,
  `REMARK` varchar(1000) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USERNAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_profile`
--

INSERT INTO `school_profile` (`SCH_ID`, `SCH_LOGO`, `SCH_NAME`, `SCH_CONTACT`, `SCH_EMAIL`, `SCH_ADD`, `SCH_CITY`, `SCH_DISITT`, `SCH_STATE`, `SCH_COUNTRY`, `AFFILIATION`, `WEBSITE`, `REMARK`, `DATE_`, `USERNAME`) VALUES
(1, 'logo.png', 'Doon Convent School', '(05946) - 245045', 'doonconventschool@gmail.com', 'Gaujajali (Uttar) , Near Old ITI, Bareilly Road', 'Haldwani', 'Nainital', 'Uttarakhand', 'INDIA', 'CBSE', 'www.doonconventschool.edu.in', 'x', '2019-06-23 20:15:41', 'nitin');

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

-- --------------------------------------------------------

--
-- Table structure for table `tc_detail`
--

CREATE TABLE `tc_detail` (
  `TCID` int(11) NOT NULL,
  `SCHOOL_NO` varchar(11) NOT NULL DEFAULT 'NA',
  `BOOK_NO` varchar(11) NOT NULL DEFAULT 'NA',
  `SNO` varchar(25) NOT NULL DEFAULT 'NA',
  `ADMISSION_NO` varchar(11) NOT NULL DEFAULT 'NA',
  `AFFILIATION_NO` varchar(25) NOT NULL,
  `REGNO_OF_CANDIDATE` varchar(20) NOT NULL DEFAULT 'NA',
  `CANDIDATE_NAME` varchar(100) NOT NULL,
  `MOTHERS_NAME` varchar(100) NOT NULL,
  `FATHERS_NAME` varchar(100) NOT NULL,
  `NATIONALITY` varchar(15) NOT NULL DEFAULT 'NA',
  `DOB_IN_WORDS` varchar(250) NOT NULL DEFAULT 'NA',
  `SC_ST_OBC_GEN_CATEGORY` varchar(15) NOT NULL DEFAULT 'GEN',
  `STUDENT_FAILED` varchar(5) NOT NULL DEFAULT 'NA',
  `SUBJECT_OFFERED` text NOT NULL,
  `LAST_STUDIED_CLASS` varchar(25) NOT NULL,
  `SCHOOL_OR_BOARD` varchar(25) NOT NULL COMMENT 'school/Board annual examination last taken with result',
  `PROMOTED` varchar(3) NOT NULL COMMENT 'YES/NO',
  `DUES_PAID` varchar(3) NOT NULL COMMENT 'YES/NO',
  `ANY_CONSESSION` varchar(3) NOT NULL DEFAULT 'NA' COMMENT 'YES/NO',
  `NCC_SCOUT_GUIDE` varchar(15) NOT NULL DEFAULT 'NA' COMMENT 'NCC Cadet/Boy Scout/ Girl guide (detail if any)',
  `DATE_OF_CUTTING_NAME` varchar(25) NOT NULL,
  `REASON_OF_LEAVING_SCHOOL` text NOT NULL,
  `NO_OF_MEETING_UPTODATE` varchar(11) NOT NULL,
  `SCHOOL_DAYS_ATTENDED` varchar(11) NOT NULL,
  `GENERAL_CONDUCT_OF_STUDENT` varchar(25) NOT NULL,
  `REMARKS_IF_ANY` text NOT NULL,
  `DATE_OF_ISSUE` varchar(25) NOT NULL,
  `USERNAME` varchar(40) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` tinyint(1) NOT NULL DEFAULT '1',
  `SESSION_` varchar(25) NOT NULL,
  `CLASS_` varchar(15) NOT NULL,
  `ORIGINAL` tinyint(1) NOT NULL DEFAULT '0',
  `TERMS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='store issued TCs';

-- --------------------------------------------------------

--
-- Table structure for table `tc_issued`
--

CREATE TABLE `tc_issued` (
  `ISTID` int(11) NOT NULL,
  `TCID` int(11) NOT NULL,
  `DATE_OF_ISSUE` varchar(25) NOT NULL,
  `TERMS` text NOT NULL,
  `REMARKS` text NOT NULL,
  `USERNAME` varchar(40) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='used to store issued TCs';

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
(14, 14, 'adm'),
(15, 15, 'adm'),
(20, 4, 'usr'),
(21, 8, 'usr'),
(22, 9, 'usr'),
(23, 10, 'usr'),
(24, 13, 'usr'),
(25, 16, 'adm'),
(26, 16, 'usr');

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
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `school_profile`
--
ALTER TABLE `school_profile`
  ADD PRIMARY KEY (`SCH_ID`);

--
-- Indexes for table `tc_detail`
--
ALTER TABLE `tc_detail`
  ADD PRIMARY KEY (`TCID`);

--
-- Indexes for table `tc_issued`
--
ALTER TABLE `tc_issued`
  ADD PRIMARY KEY (`ISTID`);

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
  MODIFY `DWNLD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `FAC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `GL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `gallery_category`
--
ALTER TABLE `gallery_category`
  MODIFY `CATEG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `importantdates`
--
ALTER TABLE `importantdates`
  MODIFY `IMPDTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_1`
--
ALTER TABLE `menu_1`
  MODIFY `ID_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mynews`
--
ALTER TABLE `mynews`
  MODIFY `NID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `newsevents`
--
ALTER TABLE `newsevents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `NID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_profile`
--
ALTER TABLE `school_profile`
  MODIFY `SCH_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tc_detail`
--
ALTER TABLE `tc_detail`
  MODIFY `TCID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tc_issued`
--
ALTER TABLE `tc_issued`
  MODIFY `ISTID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD CONSTRAINT `fk_mennu` FOREIGN KEY (`MENU`) REFERENCES `menu_1` (`ID_`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_menu_ibfk_1` FOREIGN KEY (`USER_`) REFERENCES `user_status` (`ST_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
