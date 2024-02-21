-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 12:40 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbuniverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblair`
--

CREATE TABLE `tblair` (
  `ID` int(250) NOT NULL,
  `DateMonitored` date NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `UniqID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblccoic`
--

CREATE TABLE `tblccoic` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `PermitNumber` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblccorc`
--

CREATE TABLE `tblccorc` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `PermitNumber` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcdo`
--

CREATE TABLE `tblcdo` (
  `ID` int(250) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `UniqID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbldp`
--

CREATE TABLE `tbldp` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `WWDPCode` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbleia`
--

CREATE TABLE `tbleia` (
  `ID` int(250) NOT NULL,
  `DateMonitored` date NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `UniqID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `ID` int(100) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `NameExtension` varchar(50) NOT NULL,
  `Division` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Userpass` varchar(255) NOT NULL,
  `UserType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`ID`, `LastName`, `FirstName`, `MiddleName`, `NameExtension`, `Division`, `Section`, `Username`, `Userpass`, `UserType`) VALUES
(1, 'Horca', 'Jann Vincent', 'Allawan', '', '2', '7', 'admin', '$2y$10$Ol1pOKMhWNlrWeVrCX6YXOq10P3nNEZ71POYq.RYINhpazmK4VyHq', 'a'),
(17, 'Suyom', 'Floramae', 'X', '', '2', '8', 'fxsuyom', '$2y$10$/zNtsl4eLOxc15JcqI/rTeCPH4gFudtKkaQelGysShdImfKCiLfDu', 'u'),
(18, 'Saceda', 'Recah Jule', 'C', '', '2', '7', 'rcsaceda', '$2y$10$A3u/Z0q8PE0nubUXaR1b9OzeuYHrzxuXdHt/izDc2VvyNDejeCVT.', 'a'),
(19, 'Nacario', 'Larry', 'Z', '', '2', '7', 'lznacario', '$2y$10$iCqPM.okNH.CtQKB2L6NPe/fBWM3ufzMBJqisO3dF98EEeRsFQSgC', 'a'),
(20, 'Avestruz', 'Sherwin Gil', 'A', '', '2', '8', 'saavestruz', '$2y$10$L.yIwUHIjp.hVytW94cruOaDAHSZT5ZvYprhby1flmDci6lX9AHy2', 'u'),
(21, 'Nielo', 'Dave Eden', 'C', '', '0', '1', 'dcnielo', '$2y$10$kQArkxP7TZ03OFk/DJbzOOqyLs/H9GJOEE71P3S9Mv9cS.6FXp/lC', 'u'),
(22, 'Fuentes', 'Josephine', 'L.', '', '2', '9', 'jlfuentes', '$2y$10$hQQeZMJb.stvCjLwWdeZ6eV4O9aZE58oBdpnmZC92Rg7JdRIBzEC2', 'u'),
(23, 'Suan', 'Eduardo', 'E', '', '0', '1', 'eesuan', '$2y$10$rVLFgmdtvF5whMtmXaS5M.CQ/rPAVAks.HHSVhHXr/v2ifhP346dC', 'u'),
(24, 'Hayag', 'Hennency', 'G', '', '0', '0', 'hghayag', '$2y$10$OAOQNo4mxxpx9MuhX5xFnumGY4VgkY4R9um8Q8H5Bo1QNB7F1OMAC', 'u'),
(25, 'Cayanong', 'Carlos', 'A', '', '1', '3', 'cacayanong', '$2y$10$Nbaa9cCvrhq.nqqG7YvwE.hUxtwXpalu2eyJRRU.DXz1JdXx6Gspq', 'u'),
(26, 'Tan', 'Liza', 'A', '', '1', '6', 'latan', '$2y$10$WvQzTgMp.JBRhkZ/zqFEYeTokHBq/YZWSxapm018qpauHcQUTVxju', 'u'),
(27, 'Dupio', 'Armando', 'S', 'Jr.', '0', '1', 'asdupio', '$2y$10$oXoOcsyW6eRerH360dQGY.luRyD8W2iExp3JI.u2QtPUQiZL9.ueC', 'u'),
(28, 'Yodico', 'Rodolfo', 'A', 'II', '2', '8', 'rayodico', '$2y$10$9WI5Bq1K4sFWpzpRu7SWQ.EsSCCNni.9ADe1TUgfit1edGPD3INCG', 'u'),
(29, 'Vinegas', 'Rowena', 'P', '', '2', '7', 'rpvinegas', '$2y$10$DicB8FwKYjDu8SN4/BqR2OmSVbpWgxzoRGso6VCof6IjP13WwzVlS', 'u'),
(30, 'Polea', 'Janet', 'T', '', '1', '3', 'jtpolea', '$2y$10$OeOipkmIO/cVo2m4rTJ.TOEddFKEFZxAOnpo80H50ws3HW/zSqLYK', 'u'),
(31, 'Denzon', 'Laurence', 'G', '', '0', '0', 'lgdenzon', '$2y$10$pi0D3FP8sLc15xTipgM5B.cjWZSpzN3MZA/SvXguRk3wAKMenUmxq', 'u'),
(33, 'Yubal', 'Ledane Joy', 'M', '', '1', '3', 'lmyubal', '$2y$10$Wjc0AUU7yv0opeft2jZa3eRkRXt/Lu/cfeq4tQ..Kflfnyv/6z12m', 'u'),
(34, 'Silleza', 'Sharmaine', 'I', '', '1', '3', 'sisilleza', '$2y$10$wewJzuqDwUoLJ6l40F35TukznbMWFwpEzRKOVzIo33xjOmdAQHZ8.', 'u'),
(35, 'Bobon', 'Julius Catalino', 'P', '', '0', '2', 'jpbobon', '$2y$10$iZzgOstlxJeVbX1rfWXIROAKY.36nx0mEB3a/VBqUANRsdhRD0Aby', 'u'),
(36, 'Ripalda', 'Almira', 'O', '', '1', '6', 'aoripalda', '$2y$10$ROIma1pk0hInV5/reawP1Owjf8g0Ezpvv4gAw45X4TcbsrnsYJqLS', 'u'),
(40, 'Dañal', 'Jo Anne Joy', 'M', '', '1', '3', 'jmdañal', '$2y$10$YNEdjopabN06okK0KMcWeuEs/83Oc57jYZ0cgDSegiZtSVB0H0NNK', 'u'),
(41, 'Fabillo', 'Vilma', 'C', '', '1', '3', 'vcfabillo', '$2y$10$IIa9yoQ9mVOZ8o4r5Km2SeTrVe9AxEuIhGiBfGdhzDuIy1i0qZ89W', 'u'),
(42, 'Alejandre', 'Sarahster', 'A', '', '1', '3', 'saalejandre', '$2y$10$ZYYAvEUlGqU6k8FPsIbu0eHFYrHRY3WOSO4WOuYvuvLCfVeitKyAq', 'u'),
(43, 'Pabia', 'Rowena', 'B', '', '2', '9', 'rbpabia', '$2y$10$0dUWMar/0ofOyQR8GwrRz.Ozl1UGT0X5uoyxbMFY8Fmyv38Tc3zp2', 'u'),
(44, 'Badeo', 'Cyril Ann', 'B', '', '2', '9', 'cbbadeo', '$2y$10$ll3hGODAEn3R4002GNihFeN5sLERWrgpIVr4N4I4LMy7b.yIu6dNW', 'u'),
(45, 'Loreto', 'Zeus Bryan', 'B', '', '2', '9', 'zbloreto', '$2y$10$PPDafZd09ioxTxi8fJIJSOGQbaqIe8hNO5OrhZIavuZFLH9cTijwe', 'u'),
(46, 'Tabaoda', 'Roy Alexander', 'H', '', '2', '9', 'rhtabaoda', '$2y$10$eK9ipX8GPuVji68JG80roeiDiZ4xa2Y9epLnnp1NC2DrKepUaUXF.', 'u');

-- --------------------------------------------------------

--
-- Table structure for table `tblhazwaste`
--

CREATE TABLE `tblhazwaste` (
  `ID` int(250) NOT NULL,
  `DateMonitored` date NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `UniqID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblhwgid`
--

CREATE TABLE `tblhwgid` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `PermitNumber` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `ID` int(255) NOT NULL,
  `ProjectID` int(250) NOT NULL,
  `Notice` varchar(50) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `Filename` varchar(255) NOT NULL,
  `TargetPath` varchar(255) NOT NULL,
  `Law` varchar(50) NOT NULL,
  `Commitment` int(50) NOT NULL,
  `Compliance` int(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `UniqID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblods`
--

CREATE TABLE `tblods` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `PermitNumber` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpcb`
--

CREATE TABLE `tblpcb` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `PermitNumber` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpco`
--

CREATE TABLE `tblpco` (
  `ID` int(255) NOT NULL,
  `ForeignKey` varchar(250) NOT NULL,
  `PCOCode` varchar(150) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `PCOName` varchar(250) NOT NULL,
  `ContactNo` varchar(150) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblprojects`
--

CREATE TABLE `tblprojects` (
  `ID` int(255) NOT NULL,
  `PEISS` varchar(25) NOT NULL,
  `ReferenceNo` varchar(50) NOT NULL,
  `ECCStatus` varchar(50) NOT NULL,
  `DateApproved` date NOT NULL,
  `Region` varchar(50) NOT NULL,
  `PSICCode` varchar(50) NOT NULL,
  `ProjectName` varchar(255) NOT NULL,
  `Proponent` varchar(255) NOT NULL,
  `ProjectType` varchar(50) NOT NULL,
  `ProjectSubtype` varchar(50) NOT NULL,
  `ProjectSpecificType` varchar(50) NOT NULL,
  `ProjectSpecificSubtype` varchar(50) NOT NULL,
  `SpecificAddress` varchar(255) NOT NULL,
  `Municipality` varchar(150) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `Latitude` varchar(50) NOT NULL,
  `Longitude` varchar(50) NOT NULL,
  `RA8749` varchar(50) NOT NULL,
  `RA9275` varchar(50) NOT NULL,
  `RA6969` varchar(50) NOT NULL,
  `ForeignKey` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpto`
--

CREATE TABLE `tblpto` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `PTOCode` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblptt`
--

CREATE TABLE `tblptt` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `PermitNumber` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsqi`
--

CREATE TABLE `tblsqi` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `PermitNumber` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbltoxic`
--

CREATE TABLE `tbltoxic` (
  `ID` int(250) NOT NULL,
  `DateMonitored` date NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `UniqID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbltrc`
--

CREATE TABLE `tbltrc` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `PermitNumber` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbltsd`
--

CREATE TABLE `tbltsd` (
  `ID` int(250) NOT NULL,
  `ForeignKey` varchar(150) NOT NULL,
  `PermitNumber` varchar(100) NOT NULL,
  `IssuanceDate` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblwater`
--

CREATE TABLE `tblwater` (
  `ID` int(250) NOT NULL,
  `DateMonitored` date NOT NULL,
  `TargetPath` varchar(250) NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `UniqID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblair`
--
ALTER TABLE `tblair`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblccoic`
--
ALTER TABLE `tblccoic`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblccorc`
--
ALTER TABLE `tblccorc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcdo`
--
ALTER TABLE `tblcdo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldp`
--
ALTER TABLE `tbldp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbleia`
--
ALTER TABLE `tbleia`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblhazwaste`
--
ALTER TABLE `tblhazwaste`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblhwgid`
--
ALTER TABLE `tblhwgid`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblods`
--
ALTER TABLE `tblods`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpcb`
--
ALTER TABLE `tblpcb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpco`
--
ALTER TABLE `tblpco`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblprojects`
--
ALTER TABLE `tblprojects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpto`
--
ALTER TABLE `tblpto`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblptt`
--
ALTER TABLE `tblptt`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsqi`
--
ALTER TABLE `tblsqi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltoxic`
--
ALTER TABLE `tbltoxic`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltrc`
--
ALTER TABLE `tbltrc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltsd`
--
ALTER TABLE `tbltsd`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblwater`
--
ALTER TABLE `tblwater`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblair`
--
ALTER TABLE `tblair`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblccoic`
--
ALTER TABLE `tblccoic`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblccorc`
--
ALTER TABLE `tblccorc`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcdo`
--
ALTER TABLE `tblcdo`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbldp`
--
ALTER TABLE `tbldp`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbleia`
--
ALTER TABLE `tbleia`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tblhazwaste`
--
ALTER TABLE `tblhazwaste`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblhwgid`
--
ALTER TABLE `tblhwgid`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblods`
--
ALTER TABLE `tblods`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpcb`
--
ALTER TABLE `tblpcb`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpco`
--
ALTER TABLE `tblpco`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblprojects`
--
ALTER TABLE `tblprojects`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpto`
--
ALTER TABLE `tblpto`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblptt`
--
ALTER TABLE `tblptt`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsqi`
--
ALTER TABLE `tblsqi`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltoxic`
--
ALTER TABLE `tbltoxic`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltrc`
--
ALTER TABLE `tbltrc`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltsd`
--
ALTER TABLE `tbltsd`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblwater`
--
ALTER TABLE `tblwater`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
