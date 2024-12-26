-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 28, 2024 at 05:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(5) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'admin', 'Admin', 757846033, 'ihshan123@gmail.com', 'bcf1511ddce862643d83d7069e36cea6', '2021-03-02 20:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(11) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `VehicleCat`) VALUES
(18, 'Bus'),
(11, 'Car'),
(17, 'Container'),
(9, 'Modorbike'),
(16, 'Ten Weal'),
(2, 'Three Wheeler'),
(1, 'Two Wheeler'),
(12, 'Van');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `ID` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `EnquiryNumber` varchar(120) NOT NULL,
  `EnquiryType` varchar(120) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `EnquiryDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminResponse` varchar(250) DEFAULT NULL,
  `AdminStatus` int(11) DEFAULT NULL,
  `AdminRemarkdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`ID`, `UserId`, `EnquiryNumber`, `EnquiryType`, `Description`, `EnquiryDate`, `AdminResponse`, `AdminStatus`, `AdminRemarkdate`) VALUES
(1, 10, '320977403', 'Service Related Enquiry', 'I want service my bike can u please give me price.', '2021-03-07 05:33:46', 'Prices of servicing bike given below.', 1, '2021-03-07 06:33:19'),
(2, 9, '612700713', 'Parts Related Enquiry', 'Can you change ggjhg parts of my bike and how much its cost', '2021-03-08 05:33:44', 'Yes we can. its cost is 8500 rs', 1, '2021-03-08 05:33:44'),
(3, 11, '467395787', 'Service Related Enquiry', 'I want to know cost of spares parts of maruti suzuki car.', '2021-03-15 04:33:08', 'Dear Mayank,\r\nThere is different spare of different company and price dependent on that so please visit to our service centre so we can assist you better.', 1, '2021-03-15 04:33:08'),
(4, 7, '368658342', 'Price Related Enquiry', 'I want to know the price of servicing three-wheeler.', '2021-03-25 00:33:26', 'This is sample text for testing.', 1, '2021-03-25 00:33:26'),
(5, 13, '425316470', 'Service Related Enquiry', 'I want to know the price of four wheeler service', '2021-04-04 05:34:47', 'This is sample remark for testing', 1, '2021-04-04 05:34:47'),
(6, 14, '364765545', 'Price Related Enquiry', 'kjljlkjkjj', '2021-12-24 03:42:35', '', 0, '2021-12-24 03:42:35'),
(7, 15, '322007242', 'Other Enquiry', 'This is for testing.', '2021-12-24 16:59:47', 'Hi, How ca I Help you', 1, '2021-12-24 16:59:47'),
(8, 23, '946952077', 'Parts Related Enquiry', 'damage the engine', '2024-07-25 15:08:08', 'ok i will support you come our service center', 1, '2024-07-25 15:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquirytype`
--

CREATE TABLE `tblenquirytype` (
  `ID` int(11) NOT NULL,
  `EnquiryType` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblenquirytype`
--

INSERT INTO `tblenquirytype` (`ID`, `EnquiryType`) VALUES
(4, 'Other Enquiry'),
(3, 'Parts Related Enquiry'),
(2, 'Price Related Enquiry'),
(1, 'Service Related Enquiry');

-- --------------------------------------------------------

--
-- Table structure for table `tblmechanics`
--

CREATE TABLE `tblmechanics` (
  `ID` int(11) NOT NULL,
  `FullName` text DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Address` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblmechanics`
--

INSERT INTO `tblmechanics` (`ID`, `FullName`, `MobileNumber`, `Email`, `Address`) VALUES
(2, 'Naveen', 7967890288, 'munna@gmail.com', '6790 Plot, Delhi'),
(3, 'Rashid', 5399365859, 'rashid@gmail.com', '45-A, gali no 50, new colony new delhi'),
(10, 'Akram', 754878965, 'akram123@gmail.com', 'Trincomalee'),
(11, 'Asmeer', 757844033, 'asmeer123@gmail.com', 'Horavapathana');

-- --------------------------------------------------------

--
-- Table structure for table `tblservicerequest`
--

CREATE TABLE `tblservicerequest` (
  `ID` int(10) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ServiceNumber` char(20) NOT NULL,
  `Category` varchar(120) DEFAULT NULL,
  `VehicleName` varchar(120) DEFAULT NULL,
  `EngineNumber` varchar(20) DEFAULT NULL,
  `VehicleBrand` varchar(120) DEFAULT NULL,
  `VehicleRegno` varchar(120) DEFAULT NULL,
  `ServiceDate` date DEFAULT NULL,
  `ServiceTime` varchar(100) DEFAULT NULL,
  `DeliveryType` varchar(120) DEFAULT NULL,
  `PickupAddress` varchar(120) DEFAULT NULL,
  `ServicerequestDate` timestamp NULL DEFAULT current_timestamp(),
  `ServiceBy` varchar(120) DEFAULT NULL,
  `ServiceCharge` int(10) DEFAULT NULL,
  `PartsCharge` int(10) DEFAULT NULL,
  `OtherCharge` int(10) DEFAULT NULL,
  `AdminRemark` varchar(120) DEFAULT NULL,
  `AdminStatus` varchar(120) DEFAULT NULL,
  `AdminRemarkdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblservicerequest`
--

INSERT INTO `tblservicerequest` (`ID`, `UserId`, `ServiceNumber`, `Category`, `VehicleName`, `EngineNumber`, `VehicleBrand`, `VehicleRegno`, `ServiceDate`, `ServiceTime`, `DeliveryType`, `PickupAddress`, `ServicerequestDate`, `ServiceBy`, `ServiceCharge`, `PartsCharge`, `OtherCharge`, `AdminRemark`, `AdminStatus`, `AdminRemarkdate`) VALUES
(1, 7, '530203057', 'Two Wheeler', 'Activa Scooter', '3G', 'Honda', 'DL3C AR-4851', '2021-04-24', '00:00:00', 'pickupservice', 'Mayur Vihar Phase 1 New Delhi', '2021-04-03 04:34:44', 'Harish Singh', 1234, 500, 0, 'This sample text for testing.', '3', '2021-12-24 04:42:33'),
(2, 7, '300012550', 'Two Wheeler', 'Pulsor ', '220CC', 'Bajaj', 'UP13 AB3111', '2021-04-04', '13:11', 'dropservice', '', '2021-04-03 04:34:09', '', 0, 0, 0, '', '2', '2021-12-24 04:42:33'),
(3, 13, '826535329', 'Two Wheeler', 'Activa', '3g', 'Honda', 'DL3C AR 4861', '2021-04-09', '12:30', 'pickupservice', 'Mayur Vihar Phase 1 Delhi', '2021-04-04 05:34:58', 'Naveen', 1200, 1100, 100, 'Service done', '3', '2021-12-24 04:42:33'),
(4, 14, '293257314', 'Four Wheeler', 'Maruti Suziki', '7894', 'Maruti', 'DL-98776', '2021-12-26', '09:57', 'pickupservice', 'Testjhgjhgjhg', '2021-12-24 03:42:22', 'Rahul Kumar', 1200, 890, 123, 'Your service car service is in progress', '3', '2021-12-24 04:42:33'),
(5, 14, '856784543', 'Two Wheeler', 'khkhjk', 'hkjhkj', 'hkjhkjh', 'hkjhkj', '2021-12-25', '14:01', 'pickupservice', ';lkk;l;k', '2021-12-24 04:42:37', '', 0, 0, 0, '', '1', '2021-12-24 04:42:33'),
(6, 15, '976606276', 'Two Wheeler', 'Activa', '4G', 'Honda', 'UP78AG7890', '2021-12-26', '12:31', 'pickupservice', 'Ghaziabad 201017', '2021-12-24 17:02:14', 'Rashid', 845, 120, 120, 'Service Done', '3', '2021-12-24 17:03:22'),
(7, 13, '296925564', '3 wheeler Auto', 'auto', 'auto', 'auto', 'tnt1234', '2024-12-31', '09:46', 'dropservice', '', '2024-06-07 16:16:20', NULL, NULL, NULL, NULL, NULL, '2', '2024-06-07 16:17:25'),
(8, 13, '109556266', 'Two Wheeler', 'bike', 'bike', 'bike', 'abc123', '4554-07-08', '00:34', 'dropservice', '', '2024-06-07 16:27:54', 'Shonaya', 1234, 123234, 1234, 'this will be done in a week', '3', '2024-06-07 16:29:23'),
(9, 13, '330062317', '4 Wheeler Tractor', 'tract', 'trac', 'trac', 'abc1234', '5346-03-24', '00:34', 'dropservice', '', '2024-06-07 16:30:32', NULL, NULL, NULL, NULL, NULL, '3', '2024-06-07 16:34:00'),
(10, 13, '859615711', 'Two Wheeler', '2wh', '2wh', '2wh', 'abc123', '2345-02-23', '02:03', 'dropservice', '', '2024-06-07 16:55:29', 'Naveen', 1234, 21334, 2334, 'asdgfasdgsdg', '3', '2024-06-07 16:57:49'),
(11, 13, '668161992', 'Three Wheeler', 'asdf', 'asdf', 'asdg', '2134ads', '3342-03-04', '02:35', 'dropservice', '', '2024-06-07 16:58:52', NULL, NULL, NULL, NULL, NULL, '2', '2024-06-07 16:59:07'),
(12, 17, '505135679', 'Modorbike', 'Pulsar', 'NS200', 'Bajaj', 'BIG3421', '2024-06-08', '20:10', 'pickupservice', 'Andankulam,Trincomalee', '2024-06-08 14:39:13', 'amit singh', 800, 8000, 88, 'Also completed', '3', '2024-06-08 14:46:50'),
(13, 18, '230481505', 'Modorbike', 'Pulsar', 'NS200', 'Bajaj', 'BIG3421', '2024-06-11', '14:10', 'dropservice', '', '2024-06-11 08:35:30', 'Shonaya', 450, 5000, 550, 'finished', '3', '2024-06-11 08:37:53'),
(14, 18, '490419865', 'Modorbike', 'Pulsar', 'EG2345E', 'Bajaj', 'BIG3421', '2024-06-11', '14:32', 'dropservice', '', '2024-06-11 08:59:57', 'Rashid', 780, 8900, 560, 'finished', '3', '2024-06-11 09:02:51'),
(15, 20, '212594578', 'Two Wheeler', 'bajaj', '555251551mj3', 'yamaha', 'BVX2522', '2024-07-21', '14:50', 'dropservice', '', '2024-07-21 09:19:36', 'Akram', 1500, 14000, 570, 'Almost done pick up your vehicle', '3', '2024-07-21 09:27:30'),
(16, 21, '260743855', 'Modorbike', 'R15', '555251551mj3', 'yamaha', 'BVX2522', '2024-07-23', '10:12', 'pickupservice', 'no,548,samagimawatha,Andanklam,Trincomlaee', '2024-07-23 16:40:33', 'Akram', 4500, 5500, 500, 'Almost Done Collect Your Vehicle', '3', '2024-07-25 08:01:58'),
(17, 22, '487776258', 'Modorbike', 'Pulser', '457B47GFD4', 'Bajaj', 'BUI2345', '2024-07-25', '13:31', 'pickupservice', 'No 23, Thoppur main Streat', '2024-07-25 07:53:50', 'Naveen', 7800, 15000, 1250, 'Almost Done collect Your Vehicle', '3', '2024-07-25 08:03:54'),
(18, 23, '630707969', 'Modorbike', 'Pulser', '457B47GFD4', 'Bajaj', 'BUI2345', '2024-07-25', '20:34', 'pickupservice', 'No 23, Thoppur main Streat', '2024-07-25 15:01:26', 'Naveen', 4500, 5600, 650, 'Your vehicle service is completed  pick up your vehicle', '3', '2024-07-25 15:06:31'),
(19, 23, '625051231', 'Car', 'Audi', '457B47GFD4', 'Audi Brand', 'BVX2522', '2024-07-25', '20:46', 'dropservice', '', '2024-07-25 15:13:26', NULL, NULL, NULL, NULL, NULL, '2', '2024-07-25 15:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) NOT NULL,
  `FullName` text DEFAULT NULL,
  `MobileNo` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNo`, `Email`, `Password`, `RegDate`) VALUES
(16, 'Mohamed Ihshan', 767939108, 'ihshanaushad2732@gmail.com', 'd683765eb81e8f9ed6bef1cb612ef17d', '2024-06-08 14:07:45'),
(17, 'Sathu', 748956321, 'sathu123@gmail.com', 'd63b04301101c8fa02427785f1be1c6a', '2024-06-08 14:14:55'),
(18, 'Ashik', 758957486, 'as123@gmail.com', 'f47bac792d4636434b7f665140a683f9', '2024-06-11 08:33:17'),
(19, 'Faris', 754878965, 'faris123@gmail.com', '95ca0b5dcd9eabc7042ff0444cd95dc2', '2024-07-11 15:51:29'),
(20, 'mohamad akram', 763064721, 'ma9905602@gmail.com', '88522cdb9ac262d0a2ff25c4c7d9175b', '2024-07-21 09:17:12'),
(21, 'AKEEL', 764040165, 'akeel@gmail.com', '84636a274aeb5d1b886cb29de6e9d46f', '2024-07-23 16:38:10'),
(22, 'Ashik', 748956821, 'ashik123@gmail.com', 'e4de2c98a2eb1b25f1602acaecfcafb4', '2024-07-25 07:48:49'),
(23, 'Ss', 754896531, 'S123@gmail.com', '7049464c486cf189daf6caa9be687269', '2024-07-25 14:58:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VehicleCat` (`VehicleCat`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `eqtype` (`EnquiryType`);

--
-- Indexes for table `tblenquirytype`
--
ALTER TABLE `tblenquirytype`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EnquiryType` (`EnquiryType`);

--
-- Indexes for table `tblmechanics`
--
ALTER TABLE `tblmechanics`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FullName` (`FullName`(3072));

--
-- Indexes for table `tblservicerequest`
--
ALTER TABLE `tblservicerequest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblenquirytype`
--
ALTER TABLE `tblenquirytype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblmechanics`
--
ALTER TABLE `tblmechanics`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblservicerequest`
--
ALTER TABLE `tblservicerequest`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD CONSTRAINT `eqtype` FOREIGN KEY (`EnquiryType`) REFERENCES `tblenquirytype` (`EnquiryType`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
