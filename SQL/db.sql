# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.0.51b-community-nt
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2012-05-27 20:46:28
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for digitalprofile
DROP DATABASE IF EXISTS `digitalprofile`;
CREATE DATABASE IF NOT EXISTS `digitalprofile` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `digitalprofile`;


# Dumping structure for table digitalprofile.tbladmin
DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `AdminID` int(10) unsigned NOT NULL,
  `AdminUUID` int(10) unsigned NOT NULL,
  `AdminName` varchar(255) NOT NULL,
  `AdminPassword` char(40) NOT NULL,
  `AdminEmail` varchar(255) NOT NULL,
  `UserIDLocked` int(10) NOT NULL,
  `DateInserted` datetime NOT NULL,
  `DateUpdated` datetime NOT NULL,
  `DateLocked` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Dumping data for table digitalprofile.tbladmin: 1 rows
DELETE FROM `tbladmin`;
/*!40000 ALTER TABLE `tbladmin` DISABLE KEYS */;
INSERT INTO `tbladmin` (`AdminID`, `AdminUUID`, `AdminName`, `AdminPassword`, `AdminEmail`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(1, 0, 'Admin eProfile', '8be3c943b1609fffbfc51aad666d0a04adf83c9d', 'admin@ems.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbladmin` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblapi
DROP TABLE IF EXISTS `tblapi`;
CREATE TABLE IF NOT EXISTS `tblapi` (
  `ApiID` int(11) unsigned NOT NULL auto_increment,
  `Action` varchar(100) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProfileID` int(11) NOT NULL,
  `IsActive` int(2) NOT NULL,
  `Position` varchar(100) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ExampleOfLink` varchar(100) NOT NULL,
  `Fromm` varchar(50) NOT NULL,
  `Current` varchar(50) NOT NULL,
  `Too` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `EducationID` int(11) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `CourseName` varchar(100) NOT NULL,
  `Term` varchar(100) NOT NULL,
  `Grade` varchar(100) NOT NULL,
  `CustomareaID` int(11) NOT NULL,
  `NameOfTemplate` varchar(100) NOT NULL,
  `NoOfTemplate` int(10) NOT NULL,
  `Subtitle` varchar(100) NOT NULL,
  `DocName` varchar(100) NOT NULL,
  `Doctype` varchar(255) NOT NULL,
  `RegisterFirstName` varchar(100) NOT NULL,
  `RegisterLastName` varchar(100) NOT NULL,
  `RegisterEmail` varchar(100) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `VarifyCode` varchar(100) NOT NULL,
  `RegisterDate` datetime NOT NULL,
  `UserInfoID` int(10) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `StateProvince` varchar(50) NOT NULL,
  `ZipPostal` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Fax` varchar(20) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Summary` text NOT NULL,
  `Photo` varchar(100) NOT NULL,
  `Video` varchar(100) NOT NULL,
  `RecommendID` int(11) NOT NULL,
  `GuestID` int(11) NOT NULL,
  `MessageRecommend` text NOT NULL,
  `RecommendDate` datetime NOT NULL,
  `ProvideFeedbackID` int(11) NOT NULL,
  `FeedbackDate` datetime NOT NULL,
  `ProfileName` varchar(100) NOT NULL,
  `ProfileSummary` text NOT NULL,
  `IsActiveShowPhoto` int(2) NOT NULL,
  `IsActiveShowVideo` int(2) NOT NULL,
  `IsActiveShowBoth` int(2) NOT NULL,
  `IsActiveWorkHistory` int(2) NOT NULL,
  `IsActiveTraining` int(2) NOT NULL,
  `IsActiveEducation` int(2) NOT NULL,
  `ProfileIDID` int(2) NOT NULL,
  `GuestName` varchar(100) NOT NULL,
  `GuestEmail` varchar(100) NOT NULL,
  `GuestPhone` int(50) NOT NULL,
  `GuestMessage` text NOT NULL,
  `GuestInDate` datetime NOT NULL,
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(100) NOT NULL,
  `AdminPassword` char(50) NOT NULL,
  `IsRead` int(5) NOT NULL,
  PRIMARY KEY  (`ApiID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

# Dumping data for table digitalprofile.tblapi: 24 rows
DELETE FROM `tblapi`;
/*!40000 ALTER TABLE `tblapi` DISABLE KEYS */;
INSERT INTO `tblapi` (`ApiID`, `Action`, `UserID`, `ProfileID`, `IsActive`, `Position`, `CompanyName`, `Title`, `ExampleOfLink`, `Fromm`, `Current`, `Too`, `Description`, `EducationID`, `Subject`, `CourseName`, `Term`, `Grade`, `CustomareaID`, `NameOfTemplate`, `NoOfTemplate`, `Subtitle`, `DocName`, `Doctype`, `RegisterFirstName`, `RegisterLastName`, `RegisterEmail`, `Password`, `VarifyCode`, `RegisterDate`, `UserInfoID`, `FirstName`, `MiddleName`, `LastName`, `Email`, `AddressLine1`, `City`, `StateProvince`, `ZipPostal`, `Country`, `Phone`, `Fax`, `Mobile`, `Summary`, `Photo`, `Video`, `RecommendID`, `GuestID`, `MessageRecommend`, `RecommendDate`, `ProvideFeedbackID`, `FeedbackDate`, `ProfileName`, `ProfileSummary`, `IsActiveShowPhoto`, `IsActiveShowVideo`, `IsActiveShowBoth`, `IsActiveWorkHistory`, `IsActiveTraining`, `IsActiveEducation`, `ProfileIDID`, `GuestName`, `GuestEmail`, `GuestPhone`, `GuestMessage`, `GuestInDate`, `AdminID`, `AdminName`, `AdminPassword`, `IsRead`) VALUES
	(1, 'WorkHistory', 100, 99, 1, 'Position 1', 'Company 1', 'Programmar', 'www.hassan.com', '20 may', '', '30may', 'description', 0, '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(2, 'WorkHistory', 100, 99, 1, 'Position 2', 'Company 2', 'Programmar', 'www.hassan.com', '20 may', '', '30may', 'description', 0, '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(3, 'Training', 100, 99, 1, 'Position 1', 'Company 1', 'Programmar', 'www.hassan.com', '20 may', '', '30may', 'description', 0, '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(4, 'Training', 100, 99, 1, 'Position 2', 'Company 2', 'Programmar', 'www.hassan.com', '20 may', '', '30may', 'description', 0, '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(5, 'Education', 100, 99, 1, 'Position 2', 'Company 2', 'Programmar', 'www.hassan.com', '20 may', '', '30may', 'description', 0, 'Subject 1', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(6, 'Education', 100, 99, 1, 'Position 2', 'Company 2', 'Programmar', 'www.hassan.com', '20 may', '', '30may', 'description', 0, 'Subject 2', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(7, 'Course', 100, 99, 1, '', '', '', '', '', '', '', 'description', 1, '', 'Course name 1', 'Term 1', 'Grade 1', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(8, 'Course', 100, 99, 1, '', '', '', '', '', '', '', 'description', 1, '', 'Course name 2', 'term 2', 'grade 2', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(9, 'CustomArea', 0, 99, 1, '', '', '', '', '', '', '', '', 1, '', '', '', '', 12, 'New template from api', 1, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(10, 'CustomArea', 0, 99, 1, '', '', '', '', '', '', '', '', 1, '', '', '', '', 13, 'New template from api 2', 2, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(11, 'Template1', 0, 99, 1, '', '', '1 Title of template 1', '', '10 may ', '', '20 may', 'description', 0, '', '', '', '', 9, '', 0, 'Sub title 1', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(12, 'Template1', 0, 99, 1, '', '', '2 Title of template 1', '', '11 may ', '', '33 may ', 'description asd', 0, '', '', '', '', 10, '', 0, 'Sub title 2', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(13, 'Template2', 0, 99, 1, '', '', '', '', '', '', '', 'description asd', 0, '', '', '', '', 11, '', 0, '', 'Doc Name 1', 'document.txt', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(14, 'Template2', 0, 99, 1, '', '', '', '', '', '', '', 'description asd', 0, '', '', '', '', 12, '', 0, '', 'Doc Name 2', 'document.txt', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(15, 'Template3', 0, 99, 1, '', '', '', '', '30 may', '', '', '1  desc template 3', 0, '', '', '', '', 12, '', 0, '', ' doc name 3 1', '7 document.txt', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(16, 'Template3', 0, 99, 1, '', '', '', '', '31 may', '', '', '1  desc template 3', 0, '', '', '', '', 14, '', 0, '', 'Doc Name 3 2\r\n', '8 document.txt', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(17, 'Template4', 0, 99, 1, '', '', 'Title of template 4 1', '', '4 may', '', '', '1  desc template 3', 0, '', '', '', '', 14, '', 0, '', 'Doc Name 3 2\r\n', '8 document.txt', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(18, 'Template4', 0, 99, 1, '', '', 'Title of template 4 2', '', '2 may', '', '', '1  desc template 3', 0, '', '', '', '', 14, '', 0, '', 'Doc Name 3 2\r\n', '8 document.txt', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(19, 'Photo', 0, 99, 1, '', '', '', '', '', '', '', '', 0, '', '', '', '', 14, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'photo', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(20, 'Photo', 0, 99, 1, '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'MyPhoto.jpg', '', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(21, 'Video', 0, 99, 1, '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Video 1', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(22, 'Video', 0, 99, 1, '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Video 2', 0, 0, '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(23, 'User', 0, 0, 1, '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', 0, '', '', '', 'Register first name ', 'Register last name ', 'Register email', 'register pass', 'ryu', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2012-05-23 18:17:34', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1),
	(25, 'User', 0, 0, 1, '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', 0, '', '', '', 'Register first name ', 'Register last name ', 'Register email k', 'register pass', 'varify code', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '2012-05-23 18:17:34', 0, '0000-00-00 00:00:00', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '0000-00-00 00:00:00', 0, '', '', 1);
/*!40000 ALTER TABLE `tblapi` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblbanner
DROP TABLE IF EXISTS `tblbanner`;
CREATE TABLE IF NOT EXISTS `tblbanner` (
  `BannerID` int(11) unsigned NOT NULL auto_increment,
  `BannerUUID` varchar(255) default NULL,
  `Name` varchar(255) default NULL,
  `ImageName` varchar(255) default NULL,
  `Position` varchar(255) default NULL,
  `BannerIsActive` int(11) default NULL,
  `UserIDInserted` int(11) default '0',
  `UserIDUpdated` int(11) default '0',
  `UserIDLocked` int(11) default '0',
  `DateInserted` datetime default '0000-00-00 00:00:00',
  `DateUpdated` datetime default '0000-00-00 00:00:00',
  `DateLocked` datetime default '0000-00-00 00:00:00',
  PRIMARY KEY  (`BannerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblbanner: 0 rows
DELETE FROM `tblbanner`;
/*!40000 ALTER TABLE `tblbanner` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblbanner` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblcaclassic
DROP TABLE IF EXISTS `tblcaclassic`;
CREATE TABLE IF NOT EXISTS `tblcaclassic` (
  `ClassicID` int(11) unsigned NOT NULL auto_increment,
  `ClassicUUID` varchar(100) NOT NULL,
  `CustomareaID` int(11) NOT NULL,
  `ProfileID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `IsActive` tinyint(4) NOT NULL default '0',
  `UserIDLocked` int(11) unsigned NOT NULL default '0',
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`ClassicID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblcaclassic: 2 rows
DELETE FROM `tblcaclassic`;
/*!40000 ALTER TABLE `tblcaclassic` DISABLE KEYS */;
INSERT INTO `tblcaclassic` (`ClassicID`, `ClassicUUID`, `CustomareaID`, `ProfileID`, `Title`, `Description`, `Duration`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(1, '', 14, 99, 'Title of template 4 1', '1  desc template 3', '4 may', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, '', 14, 99, 'Title of template 4 2', '1  desc template 3', '2 may', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblcaclassic` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblcadocumentvideoa
DROP TABLE IF EXISTS `tblcadocumentvideoa`;
CREATE TABLE IF NOT EXISTS `tblcadocumentvideoa` (
  `DocumentVideoAID` int(11) unsigned NOT NULL auto_increment,
  `DocumentVideoBUUID` varchar(100) NOT NULL,
  `CustomareaID` int(11) NOT NULL,
  `ProfileID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `DocType` varchar(255) NOT NULL,
  `IsActive` tinyint(4) NOT NULL default '0',
  `UserIDLocked` int(11) unsigned NOT NULL default '0',
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`DocumentVideoAID`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblcadocumentvideoa: 3 rows
DELETE FROM `tblcadocumentvideoa`;
/*!40000 ALTER TABLE `tblcadocumentvideoa` DISABLE KEYS */;
INSERT INTO `tblcadocumentvideoa` (`DocumentVideoAID`, `DocumentVideoBUUID`, `CustomareaID`, `ProfileID`, `Name`, `Description`, `DocType`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(26, '', 0, 0, 'Doc Name 2', '', 'document.txt', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(29, '', 11, 99, 'Doc Name 1', 'description asd', 'document.txt', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(30, '', 12, 99, 'Doc Name 2', 'description asd', 'document.txt', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblcadocumentvideoa` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblcadocumentvideob
DROP TABLE IF EXISTS `tblcadocumentvideob`;
CREATE TABLE IF NOT EXISTS `tblcadocumentvideob` (
  `DocumentVideoBID` int(11) unsigned NOT NULL auto_increment,
  `DocumentVideoAUUID` varchar(100) NOT NULL,
  `CustomareaID` int(11) NOT NULL,
  `ProfileID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `DocType` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `IsActive` tinyint(4) NOT NULL default '0',
  `UserIDLocked` int(11) unsigned NOT NULL default '0',
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`DocumentVideoBID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblcadocumentvideob: 2 rows
DELETE FROM `tblcadocumentvideob`;
/*!40000 ALTER TABLE `tblcadocumentvideob` DISABLE KEYS */;
INSERT INTO `tblcadocumentvideob` (`DocumentVideoBID`, `DocumentVideoAUUID`, `CustomareaID`, `ProfileID`, `Name`, `Date`, `DocType`, `Description`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(1, '', 12, 99, ' doc name 3 1', '30 may', '7 document.txt', '1  desc template 3', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, '', 14, 99, 'Doc Name 3 2\r\n', '31 may', '8 document.txt', '1  desc template 3', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblcadocumentvideob` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblcaworkhistorystyle
DROP TABLE IF EXISTS `tblcaworkhistorystyle`;
CREATE TABLE IF NOT EXISTS `tblcaworkhistorystyle` (
  `WorkHistoryStyleID` int(11) unsigned NOT NULL auto_increment,
  `WorkHistoryStyleUUID` varchar(100) NOT NULL,
  `CustomareaID` int(11) NOT NULL,
  `ProfileID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `SubTitle` varchar(255) NOT NULL,
  `Form` varchar(255) NOT NULL,
  `Too` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `IsActive` tinyint(4) NOT NULL default '0',
  `UserIDLocked` int(11) unsigned NOT NULL default '0',
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`WorkHistoryStyleID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblcaworkhistorystyle: 9 rows
DELETE FROM `tblcaworkhistorystyle`;
/*!40000 ALTER TABLE `tblcaworkhistorystyle` DISABLE KEYS */;
INSERT INTO `tblcaworkhistorystyle` (`WorkHistoryStyleID`, `WorkHistoryStyleUUID`, `CustomareaID`, `ProfileID`, `Title`, `SubTitle`, `Form`, `Too`, `Description`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(1, '', 8, 5, 'sdf', 'sdf', '05/01/2012', '05/17/2012', 'sdf', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, '', 9, 99, '1 Title of template 1', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, '', 10, 99, '2 Title of template 1', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, '', 9, 99, '1 Title of template 1', 'Sub title 1', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, '', 10, 99, '2 Title of template 1', 'Sub title 2', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, '', 9, 99, '1 Title of template 1', 'Sub title 1', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, '', 10, 99, '2 Title of template 1', 'Sub title 2', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, '', 9, 99, '1 Title of template 1', 'Sub title 1', '10 may ', '20 may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, '', 10, 99, '2 Title of template 1', 'Sub title 2', '11 may ', '33 may ', 'description asd', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblcaworkhistorystyle` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblcourse
DROP TABLE IF EXISTS `tblcourse`;
CREATE TABLE IF NOT EXISTS `tblcourse` (
  `CourseID` int(11) unsigned NOT NULL auto_increment,
  `CourseUUID` varchar(100) NOT NULL,
  `EducationID` varchar(100) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Term` varchar(200) NOT NULL default '0',
  `Grade` varchar(200) NOT NULL default '0',
  `IsActive` tinyint(4) NOT NULL default '0',
  `UserIDLocked` int(11) unsigned NOT NULL default '0',
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`CourseID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblcourse: 5 rows
DELETE FROM `tblcourse`;
/*!40000 ALTER TABLE `tblcourse` DISABLE KEYS */;
INSERT INTO `tblcourse` (`CourseID`, `CourseUUID`, `EducationID`, `CourseName`, `Description`, `Term`, `Grade`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(1, '', '1', 'Course name', 'description', 'term', 'grade', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, '', '1', 'Course name 1', 'description', 'Term 1', 'Grade 1', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, '', '1', 'Course name 2', 'description', 'term 2', 'grade 2', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, '', '1', 'Course name 1', 'description', 'Term 1', 'Grade 1', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, '', '1', 'Course name 2', 'description', 'term 2', 'grade 2', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblcourse` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblcustomarea
DROP TABLE IF EXISTS `tblcustomarea`;
CREATE TABLE IF NOT EXISTS `tblcustomarea` (
  `CustomareaID` int(11) unsigned NOT NULL auto_increment,
  `CustomareaUUID` varchar(100) NOT NULL,
  `ProfileID` varchar(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Template` varchar(255) NOT NULL,
  `IsActive` tinyint(4) NOT NULL default '0',
  `UserIDLocked` int(11) unsigned NOT NULL default '0',
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`CustomareaID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblcustomarea: 9 rows
DELETE FROM `tblcustomarea`;
/*!40000 ALTER TABLE `tblcustomarea` DISABLE KEYS */;
INSERT INTO `tblcustomarea` (`CustomareaID`, `CustomareaUUID`, `ProfileID`, `Name`, `Template`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(10, '', '5', 'template 3', '3', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, '', '5', 'template 4', '4', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, '', '5', 'Template 1', '1', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, '', '4', 'ty', '1', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, '', '5', 'template 2', '2', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, '', '99', 'New template from api', '1', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, '', '99', 'New template from api 2', '2', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, '', '99', 'New template from api', '1', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, '', '99', 'New template from api 2', '2', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblcustomarea` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tbleducation
DROP TABLE IF EXISTS `tbleducation`;
CREATE TABLE IF NOT EXISTS `tbleducation` (
  `EducationID` int(11) unsigned NOT NULL auto_increment,
  `EducationUUID` varchar(100) NOT NULL,
  `ProfileID` varchar(100) NOT NULL,
  `UserID` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Fromm` varchar(100) NOT NULL,
  `Current` varchar(100) NOT NULL,
  `Too` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `IsActive` tinyint(4) NOT NULL default '0',
  `UserIDLocked` int(11) NOT NULL default '0',
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`EducationID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tbleducation: 5 rows
DELETE FROM `tbleducation`;
/*!40000 ALTER TABLE `tbleducation` DISABLE KEYS */;
INSERT INTO `tbleducation` (`EducationID`, `EducationUUID`, `ProfileID`, `UserID`, `Title`, `Subject`, `Fromm`, `Current`, `Too`, `Description`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(1, '', '5', '55', 'title', 'subject', '05/01/2012', 'till present', '', 'asdf', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, '', '99', '100', 'Programmar', 'Subject 1', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, '', '99', '100', 'Programmar', 'Subject 2', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, '', '99', '100', 'Programmar', 'Subject 1', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, '', '99', '100', 'Programmar', 'Subject 2', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbleducation` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblguestinfo
DROP TABLE IF EXISTS `tblguestinfo`;
CREATE TABLE IF NOT EXISTS `tblguestinfo` (
  `GuestID` int(11) unsigned NOT NULL auto_increment,
  `GuestUUID` varchar(100) NOT NULL,
  `ProfileIDID` int(11) unsigned NOT NULL,
  `GuestName` varchar(255) NOT NULL,
  `GuestEmail` varchar(255) NOT NULL,
  `GuestPhone` varchar(255) NOT NULL,
  `GuestMessage` text NOT NULL,
  `Date` varchar(255) NOT NULL,
  `IsActiveGuest` varchar(255) NOT NULL,
  `UserIDLocked` int(11) unsigned NOT NULL,
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`GuestID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblguestinfo: 5 rows
DELETE FROM `tblguestinfo`;
/*!40000 ALTER TABLE `tblguestinfo` DISABLE KEYS */;
INSERT INTO `tblguestinfo` (`GuestID`, `GuestUUID`, `ProfileIDID`, `GuestName`, `GuestEmail`, `GuestPhone`, `GuestMessage`, `Date`, `IsActiveGuest`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(1, '', 5, 'dsfg', 'james@james.com', 'dsfg', 'dsfg', '2012-05-23 19:59:06', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, '', 5, 'mizan', 'mizan@gmail.com', '5677', 'ads', '2012-05-24 18:14:18', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, '', 5, 'sdfg', 'sdfg@sdf.ads', 'sdfg', 'asdf', '2012-05-24 18:39:55', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, '', 5, 'hy', 'mizan@gmail.com', 'a', 'a', '2012-05-24 18:51:18', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, '', 5, 'sdfg', 'sdfg@sdf.ads', 'sdfgsdf', 'asdf', '2012-05-24 18:52:03', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblguestinfo` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblphoto
DROP TABLE IF EXISTS `tblphoto`;
CREATE TABLE IF NOT EXISTS `tblphoto` (
  `PhotoID` int(11) unsigned NOT NULL auto_increment,
  `PhotoUUID` varchar(100) NOT NULL,
  `ProfileID` varchar(100) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `IsActive` varchar(255) NOT NULL,
  `UserIDLocked` int(11) unsigned NOT NULL,
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`PhotoID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblphoto: 25 rows
DELETE FROM `tblphoto`;
/*!40000 ALTER TABLE `tblphoto` DISABLE KEYS */;
INSERT INTO `tblphoto` (`PhotoID`, `PhotoUUID`, `ProfileID`, `Photo`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(9, '', '4', '1337681528ry.png', '0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, '', '4', '13376814821.png', '0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, '', '5', '13378342191.png', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, '', '5', '1337834226ry.png', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, '', '5', '1337834263.png', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, '', '5', '1337834280ive_video.png', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, '', '5', '1337834294mark.png', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, '', '5', '1337834954Selector.png', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, '', '5', '1337834962AndVideoBg1.png', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, '', '5', '1337834975.png', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(18, '', '5', '1337834986.png', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(19, '', '5', '13380382191.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(20, '', '5', '1338040747ry.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(21, '', '5', '13380409241.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(22, '', '5', '1338040950ry.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, '', '5', '1338041026rd.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(24, '', '5', '13380415111.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(25, '', '5', '1338043468.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(26, '', '5', '1338043787ry.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(27, '', '5', '1338043952ry.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(28, '', '5', '13380441201.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(29, '', '5', '13380443431.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(30, '', '5', '1338044428ry.png', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(31, '', '99', 'photo', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(32, '', '99', 'MyPhoto.jpg', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblphoto` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblprofile
DROP TABLE IF EXISTS `tblprofile`;
CREATE TABLE IF NOT EXISTS `tblprofile` (
  `ProfileID` int(11) unsigned NOT NULL auto_increment,
  `ProfileUUID` varchar(100) NOT NULL,
  `UserID` varchar(100) NOT NULL,
  `ProfileName` varchar(100) NOT NULL,
  `ProfileSummary` text NOT NULL,
  `IsActiveShowPhoto` tinyint(4) NOT NULL,
  `IsActiveShowVideo` tinyint(4) NOT NULL,
  `IsActiveShowBoths` tinyint(4) NOT NULL,
  `IsActiveWorkHistory` tinyint(1) NOT NULL,
  `IsActiveTraining` tinyint(1) NOT NULL,
  `IsActiveEducation` tinyint(1) NOT NULL,
  `UserIDLocked` int(11) unsigned NOT NULL default '0',
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`ProfileID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblprofile: 4 rows
DELETE FROM `tblprofile`;
/*!40000 ALTER TABLE `tblprofile` DISABLE KEYS */;
INSERT INTO `tblprofile` (`ProfileID`, `ProfileUUID`, `UserID`, `ProfileName`, `ProfileSummary`, `IsActiveShowPhoto`, `IsActiveShowVideo`, `IsActiveShowBoths`, `IsActiveWorkHistory`, `IsActiveTraining`, `IsActiveEducation`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(4, '', '31', 'hyj', '', 1, 1, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, '', '55', 'wre', '', 1, 1, 1, 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, '', '55', 'new', '', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, '', '55', 'training', '', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblprofile` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblprovidefeedback
DROP TABLE IF EXISTS `tblprovidefeedback`;
CREATE TABLE IF NOT EXISTS `tblprovidefeedback` (
  `providefeedbackID` int(11) unsigned NOT NULL auto_increment,
  `ProvidefeedbackUUID` int(11) NOT NULL,
  `ProfileID` int(11) NOT NULL,
  `GuestID` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `IsActive` int(11) NOT NULL,
  `UserIDLocked` int(11) unsigned NOT NULL,
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`providefeedbackID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblprovidefeedback: 9 rows
DELETE FROM `tblprovidefeedback`;
/*!40000 ALTER TABLE `tblprovidefeedback` DISABLE KEYS */;
INSERT INTO `tblprovidefeedback` (`providefeedbackID`, `ProvidefeedbackUUID`, `ProfileID`, `GuestID`, `message`, `date`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(21, 0, 5, 1, 'template 2', '2012-05-26 14:09:51', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(20, 0, 0, 2, '', '2012-05-26 14:06:56', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 0, 5, 3, '', '2012-05-24 18:28:59', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 0, 5, 4, 'asdf', '2012-05-24 19:16:45', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, 0, 5, 5, 'asdfasdf asdf', '2012-05-24 19:18:33', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(18, 0, 5, 0, 'fdgsdfg', '2012-05-24 19:19:46', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(19, 0, 5, 0, 'template 1', '2012-05-26 13:20:31', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(22, 0, 5, 0, 'template 3', '2012-05-26 14:25:26', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, 0, 5, 0, 'template 4', '2012-05-26 14:34:31', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblprovidefeedback` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblrecommend
DROP TABLE IF EXISTS `tblrecommend`;
CREATE TABLE IF NOT EXISTS `tblrecommend` (
  `RecommendID` int(11) unsigned NOT NULL auto_increment,
  `RecommendUUID` int(11) NOT NULL,
  `ProfileID` int(11) NOT NULL,
  `GuestID` int(11) NOT NULL,
  `message` text NOT NULL,
  `RecommendDate` datetime NOT NULL,
  `IsActive` int(4) NOT NULL,
  `UserIDLocked` int(11) unsigned NOT NULL,
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`RecommendID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblrecommend: 6 rows
DELETE FROM `tblrecommend`;
/*!40000 ALTER TABLE `tblrecommend` DISABLE KEYS */;
INSERT INTO `tblrecommend` (`RecommendID`, `RecommendUUID`, `ProfileID`, `GuestID`, `message`, `RecommendDate`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(9, 0, 5, 5, '', '2012-05-24 19:07:46', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 0, 5, 5, '', '2012-05-24 19:07:59', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, 0, 5, 5, '', '2012-05-24 19:08:25', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, 0, 5, 5, '', '2012-05-24 19:08:53', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 0, 5, 5, 'dfh', '2012-05-24 19:11:01', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 0, 5, 0, 'asdfsadf asdf', '2012-05-26 16:29:20', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblrecommend` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tbltokenid
DROP TABLE IF EXISTS `tbltokenid`;
CREATE TABLE IF NOT EXISTS `tbltokenid` (
  `ID` int(11) NOT NULL auto_increment,
  `UserID` varchar(100) NOT NULL,
  `TokenID` int(20) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

# Dumping data for table digitalprofile.tbltokenid: 2 rows
DELETE FROM `tbltokenid`;
/*!40000 ALTER TABLE `tbltokenid` DISABLE KEYS */;
INSERT INTO `tbltokenid` (`ID`, `UserID`, `TokenID`) VALUES
	(1, '1', 158081),
	(2, '19', 4041079);
/*!40000 ALTER TABLE `tbltokenid` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tbltraining
DROP TABLE IF EXISTS `tbltraining`;
CREATE TABLE IF NOT EXISTS `tbltraining` (
  `TrainingID` int(11) unsigned NOT NULL auto_increment,
  `TrainingUUID` varchar(100) NOT NULL,
  `ProfileID` varchar(100) NOT NULL,
  `UserID` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ExampleOfLink` varchar(200) NOT NULL,
  `Fromm` varchar(100) NOT NULL,
  `Current` varchar(100) NOT NULL,
  `Too` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `IsActive` tinyint(4) NOT NULL default '0',
  `UserIDLocked` int(11) unsigned NOT NULL default '0',
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`TrainingID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tbltraining: 5 rows
DELETE FROM `tbltraining`;
/*!40000 ALTER TABLE `tbltraining` DISABLE KEYS */;
INSERT INTO `tbltraining` (`TrainingID`, `TrainingUUID`, `ProfileID`, `UserID`, `Title`, `ExampleOfLink`, `Fromm`, `Current`, `Too`, `Description`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(1, '', '5', '55', 'title', 'www.mizanbdweb.com', '05/01/2012', 'till present', '', 'desc', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, '', '99', '100', 'Programmar', 'www.hassan.com', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, '', '99', '100', 'Programmar', 'www.hassan.com', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, '', '99', '100', 'Programmar', 'www.hassan.com', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, '', '99', '100', 'Programmar', 'www.hassan.com', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbltraining` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tbluser
DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `UserID` int(11) unsigned NOT NULL auto_increment,
  `UserUUID` varchar(100) NOT NULL,
  `RegisterFirstName` varchar(255) NOT NULL,
  `RegisterLastName` varchar(255) NOT NULL,
  `RegisterEmail` varchar(255) NOT NULL,
  `Password` char(40) NOT NULL,
  `VarifyCode` varchar(255) default NULL,
  `IsActive` varchar(255) NOT NULL,
  `RegisterDate` datetime NOT NULL,
  `UserIDLocked` int(11) unsigned NOT NULL,
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`UserID`),
  UNIQUE KEY `RegisterEmail` (`RegisterEmail`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tbluser: 3 rows
DELETE FROM `tbluser`;
/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` (`UserID`, `UserUUID`, `RegisterFirstName`, `RegisterLastName`, `RegisterEmail`, `Password`, `VarifyCode`, `IsActive`, `RegisterDate`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(60, '', 'Register first name ', 'Register last name ', 'Register email k', 'register pass', 'varify code', '1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(59, '', 'Register first name ', 'Register last name ', 'Register email', 'register pass', 'ryu', '1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(55, '', 'Mizanur', 'Rahman', 'mizan92cse@gmail.com', 'd6d3ccaa384a65532061e26836842adc48d43df4', NULL, '1', '2012-05-23 18:17:34', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tbluserinfo
DROP TABLE IF EXISTS `tbluserinfo`;
CREATE TABLE IF NOT EXISTS `tbluserinfo` (
  `UserInfoID` int(11) unsigned NOT NULL auto_increment,
  `UserinfoUUID` varchar(100) NOT NULL,
  `ProfileID` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `AddressLine1` varchar(200) NOT NULL,
  `City` varchar(100) NOT NULL,
  `StateProvince` varchar(100) NOT NULL,
  `ZipPostal` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Fax` varchar(100) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Summary` text NOT NULL,
  `IsActive` varchar(255) NOT NULL,
  `RegisterDate` datetime NOT NULL,
  `UserIDLocked` int(11) unsigned NOT NULL,
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`UserInfoID`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tbluserinfo: 4 rows
DELETE FROM `tbluserinfo`;
/*!40000 ALTER TABLE `tbluserinfo` DISABLE KEYS */;
INSERT INTO `tbluserinfo` (`UserInfoID`, `UserinfoUUID`, `ProfileID`, `FirstName`, `MiddleName`, `LastName`, `Email`, `AddressLine1`, `City`, `StateProvince`, `ZipPostal`, `Country`, `Phone`, `Fax`, `Mobile`, `Summary`, `IsActive`, `RegisterDate`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(95, '', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(92, '', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(93, '', '5', '', '', '', 'mizan92cse@gmail.com', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(94, '', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbluserinfo` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblvideo
DROP TABLE IF EXISTS `tblvideo`;
CREATE TABLE IF NOT EXISTS `tblvideo` (
  `VideoID` int(11) unsigned NOT NULL auto_increment,
  `VideoUUID` varchar(100) NOT NULL,
  `ProfileID` varchar(100) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `IsActive` varchar(255) NOT NULL,
  `UserIDLocked` int(11) unsigned NOT NULL,
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`VideoID`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblvideo: 15 rows
DELETE FROM `tblvideo`;
/*!40000 ALTER TABLE `tblvideo` DISABLE KEYS */;
INSERT INTO `tblvideo` (`VideoID`, `VideoUUID`, `ProfileID`, `Video`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(54, '', '5', '1338040936_of_Pandaria_Be.mp4', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(53, '', '5', '1338038460_of_Pandaria_Be.mp4', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(52, '', '5', '1337839420_of_Pandaria_Be.mp4', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(51, '', '5', '1337839410Lane_-_The_Slide.mp4', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(49, '', '5', '1337839390ve__Royal_Ballet_LIVE.mp4', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(50, '', '5', '1337839398el_Pietrus_taken_off_court_on_stretcher_after_fall_Bost.mp4', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(48, '', '5', '1337839376_of_Pandaria_Be.mp4', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(47, '', '4', '1337681555ve__Royal_Ballet_LIVE.mp4', '0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(55, '', '5', '1338041502_of_Pandaria_Be.mp4', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(56, '', '5', '1338043432_of_Pandaria_Be.mp4', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(57, '', '5', '1338043941_of_Pandaria_Be.mp4', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(58, '', '5', '1338044107_of_Pandaria_Be.mp4', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(59, '', '5', '1338044417_of_Pandaria_Be.mp4', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(60, '', '99', 'Video 1', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(61, '', '99', 'Video 2', '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblvideo` ENABLE KEYS */;


# Dumping structure for table digitalprofile.tblworkhistory
DROP TABLE IF EXISTS `tblworkhistory`;
CREATE TABLE IF NOT EXISTS `tblworkhistory` (
  `WorkHistoryID` int(11) unsigned NOT NULL auto_increment,
  `WorkHistoryUUID` varchar(100) NOT NULL,
  `ProfileID` varchar(100) NOT NULL,
  `UserID` varchar(100) NOT NULL,
  `Empolyer` varchar(200) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ExampleOfLink` varchar(200) NOT NULL default '0',
  `Fromm` varchar(100) NOT NULL,
  `Current` varchar(100) NOT NULL,
  `Too` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `IsActive` tinyint(4) NOT NULL default '0',
  `UserIDLocked` int(11) unsigned NOT NULL default '0',
  `DateInserted` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL default '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`WorkHistoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table digitalprofile.tblworkhistory: 5 rows
DELETE FROM `tblworkhistory`;
/*!40000 ALTER TABLE `tblworkhistory` DISABLE KEYS */;
INSERT INTO `tblworkhistory` (`WorkHistoryID`, `WorkHistoryUUID`, `ProfileID`, `UserID`, `Empolyer`, `Title`, `ExampleOfLink`, `Fromm`, `Current`, `Too`, `Description`, `IsActive`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
	(1, '', '5', '55', 'Position', 'Company name', 'company link', '05/01/2012', 'till present', '', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, '', '99', '100', 'Position 1', 'Company 1', 'www.hassan.com', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, '', '99', '100', 'Position 2', 'Company 2', 'www.hassan.com', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, '', '99', '100', 'Position 2', 'Company 2', 'www.hassan.com', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, '', '99', '100', 'Position 1', 'Company 1', 'www.hassan.com', '20 may', '', '30may', 'description', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblworkhistory` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
