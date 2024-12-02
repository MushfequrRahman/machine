-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 08:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `machine`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_insert`
--

CREATE TABLE `brand_insert` (
  `brandid` varchar(50) NOT NULL,
  `brandname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_insert`
--

INSERT INTO `brand_insert` (`brandid`, `brandname`) VALUES
('20240116164212', 'Western Digital'),
('20240117104145', 'None'),
('20240117105230', 'Dintek'),
('20240117105342', 'Safenet'),
('20240120115642', 'Canon'),
('20240120115732', 'A4Tech'),
('20240127121456', 'TP Link'),
('20240129101429', 'HP'),
('20240129102116', 'Lenovo'),
('20240129142825', 'Intel'),
('20240129142832', 'Samsung'),
('20240129142843', 'Asus'),
('20240129142957', 'Adata'),
('20240129143020', 'KSTAR'),
('20240129143032', 'PowerPack'),
('20240130112130', 'Value Top'),
('20240130112137', 'ASTA'),
('20240130160104', 'Toshiba'),
('20240203104959', 'MICRONET'),
('20240204102841', 'ZTeco'),
('20240204110504', 'Transcend'),
('20240204125303', 'Grandstream'),
('20240304135155', 'Power Guard'),
('20240324141234', 'Zebra'),
('20240404095504', 'DELL'),
('20240417125550', 'Godex'),
('20240513120743', 'TEMEISHENG'),
('20241002125559', 'Brothers');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptid` int(11) NOT NULL,
  `departmentname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptid`, `departmentname`) VALUES
(1, 'IT'),
(2, 'CUTTING'),
(3, 'Production'),
(4, 'RND'),
(5, 'HRD'),
(6, 'QAD'),
(7, 'PLANNING'),
(8, 'STORE'),
(9, 'Commercial'),
(10, 'CAD'),
(11, 'Sample'),
(12, 'Accounts'),
(13, 'Logistic'),
(14, 'CNF'),
(15, 'Dyeing'),
(16, 'Distribution'),
(17, 'Creadit & Legal'),
(18, 'Market Service'),
(19, 'Sales & Marketing'),
(20, 'EMS'),
(21, 'Operations'),
(22, 'Fabric Store'),
(23, 'Security'),
(24, 'Treasury'),
(25, 'Maintenance'),
(26, 'Supply Chain Management'),
(27, 'FINISHING'),
(28, 'IE'),
(29, 'Batch');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `desigid` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`desigid`, `designation`) VALUES
(2, 'Manager'),
(3, 'DGM'),
(4, 'SENIOR OFFICER'),
(5, 'DEPUTY MANAGER'),
(6, 'EXECUTIVE'),
(7, 'SENIOR MANAGER'),
(8, 'SENIOR SUPERVISOR'),
(9, 'Assistant Manager'),
(10, 'TECHNICIAN'),
(11, 'SENIOR TECHNICIAN'),
(12, 'Area Sales Manager'),
(13, 'Assistant Cutting'),
(14, 'Assistant Designer'),
(15, 'Assistant General Manager'),
(16, 'Assistant Merchandiser'),
(17, 'Assistant Officer'),
(18, 'Assistant Supervisor'),
(19, 'Attendant'),
(20, 'CEO'),
(21, 'CFO'),
(22, 'Co-Ordinator'),
(23, 'Color Master'),
(24, 'Commercial Assistant'),
(25, 'Computer Operator'),
(26, 'Content Writer'),
(27, 'COO'),
(28, 'Cutter Man'),
(29, 'Data Entry Operator'),
(30, 'Deputy General Manager'),
(31, 'Deputy Regional Sales Manager'),
(32, 'Designer'),
(33, 'Digital Marketer'),
(34, 'Director'),
(35, 'Distribution Executive'),
(36, 'Finance Controller'),
(37, 'Fire man'),
(38, 'Fire Safety Officer'),
(39, 'Garments Technologist'),
(40, 'GCEO'),
(41, 'GCFO'),
(42, 'General Manager'),
(43, 'GGM'),
(44, 'Graphics Designer'),
(45, 'Group Senior Manager'),
(46, 'Head Of Operation '),
(47, 'Head Of SCM'),
(48, 'Inspector (QA)'),
(49, 'Internee'),
(50, 'Junior Cutter Man'),
(51, 'Junior Manager'),
(52, 'Junior Officer '),
(53, 'Junior Supervisor'),
(54, 'Laser Designer'),
(55, 'Logistics Officer'),
(56, 'Management Trainee'),
(57, 'Management Trainee Officer'),
(58, 'Marchandiser'),
(59, 'Marketing Assistant'),
(60, 'Medical Assistant'),
(61, 'Office Assistant'),
(62, 'Office Attendent'),
(63, 'Officer'),
(64, 'Peramedical'),
(65, 'POLE'),
(66, 'Project Manager'),
(67, 'Quality Inspector'),
(68, 'RBDM'),
(69, 'Sales Manager'),
(70, 'Sample Man'),
(71, 'Senior Designer'),
(72, 'Senior Executive'),
(73, 'Senior Graphic Designer'),
(74, 'Senior Inspector'),
(75, 'Senior Merchandiser'),
(76, 'Senior QC'),
(77, 'Senior Sales Executive'),
(78, 'Senior Sample Man'),
(79, 'Senior Shop in Charge'),
(80, 'Shop in Charge'),
(81, 'SMO'),
(82, 'Software Engineer'),
(83, 'Supervisor'),
(84, 'Technical Services Executive'),
(85, 'Territory Executive'),
(86, 'Territory Manager'),
(87, 'Trainee'),
(88, 'Trainee Designer'),
(89, 'Trainee Merchandiser'),
(90, 'Trainee Officer'),
(91, 'Trianee Welfare Officer'),
(92, 'UI/UX Designer   '),
(93, 'Walfare Officer'),
(94, 'Wash Technician'),
(95, 'Advisor'),
(96, 'N/A'),
(97, 'Head of IE');

-- --------------------------------------------------------

--
-- Table structure for table `factory`
--

CREATE TABLE `factory` (
  `ftypeid` int(11) NOT NULL,
  `factoryid` varchar(50) NOT NULL,
  `factoryname` varchar(50) NOT NULL,
  `factory_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factory`
--

INSERT INTO `factory` (`ftypeid`, `factoryid`, `factoryname`, `factory_address`) VALUES
(2, 'AAA', 'AAA-1', 'outsider'),
(1, 'AFL', 'Aboni Fashions Ltd.', '23-24, Tetuljhora, Hemayetpur, Savar, Dhaka-1340'),
(1, 'AKL', 'Aboni Knit Wear Ltd.', '169-171, Tetulzhora, Hemayetpur, Savar, Dhaka'),
(1, 'ATL', 'Aboni Textiles Ltd.', '169-171, Tetulzhora, Hemayetpur, Savar, Dhaka'),
(1, 'BADL', 'Babylon Agro & Dairy Ltd.', 'Uttara, Dhaka'),
(1, 'BASL', 'Babylon Agri Science Ltd.', 'Uttara, Dhaka'),
(2, 'BBB', 'BBB-1', 'BBB Outside'),
(1, 'BBSL', 'Babylon Buying Services Ltd.', 'Uttara, Dhaka'),
(1, 'BCL', 'Babylon Casualwear Ltd.', '23-24, Tetulzhora, Hemayetpur, Savar, Dhaka'),
(1, 'BG', 'Babylon Group', '2-B/1, Darus Salam Road, Mirpur, Dhaka'),
(1, 'BGL', 'Babylon Garments Ltd', '2-B/1, Darus Salam Road, Mirpur, Dhaka-1216'),
(1, 'BLL', 'Babylon Logistics Ltd.', 'Holding # 30/1, 2-B/1, Darus Salam Road, Mirpur, Dhaka-1216'),
(1, 'BMV', 'Babylon Marine Venture', '2-B/1, Darus Salam Road, Mirpur, Dhaka-1216'),
(1, 'BPL', 'Babylon Printers Ltd.', 'Horindhora, Hemayetpur, Savar, Dhaka'),
(1, 'BRL', 'Babylon Resources Ltd.', 'Lalmatia, Mohammadpur, Dhaka'),
(1, 'BTL', 'Babylon Trims Ltd.', '69, Kandi Bailarpur, Horindhora, Hemayetpur, Savar, Dhaka'),
(1, 'BWL', 'Babylon Washing Ltd.', '169-171, Tetulzhora, Hemayetpur, Savar, Dhaka'),
(1, 'HO', 'HO', 'Mirpur'),
(1, 'JEL', 'Juniper Embroideries Ltd.', 'Horindhora, Hemayetpur, Savar, Dhaka'),
(1, 'NTL', 'Newgen Technology Ltd.', 'Lalmatia, Mohammadpur, Dhaka'),
(1, 'SE', 'Sabuj Enterprise', 'Hemayetpur, Savar, Dhaka'),
(1, 'Softy', 'Babylon Products', '242-243, South Shampur, Tetulzhora, Hemayetpur, Savar, Dhaka'),
(1, 'TNZ', 'Babylon Outfit Ltd. (Trendz)', 'Hemayetpur, Savar, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `factory_type`
--

CREATE TABLE `factory_type` (
  `ftypeid` int(11) NOT NULL,
  `ftype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factory_type`
--

INSERT INTO `factory_type` (`ftypeid`, `ftype`) VALUES
(1, 'Inside'),
(2, 'Outside');

-- --------------------------------------------------------

--
-- Table structure for table `machine_allocate_to_line`
--

CREATE TABLE `machine_allocate_to_line` (
  `matolid` varchar(50) NOT NULL,
  `afactoryid` varchar(10) NOT NULL,
  `minvid` varchar(50) NOT NULL,
  `macode` varchar(50) NOT NULL,
  `allocatedate` date NOT NULL,
  `allocatedatetime` time NOT NULL,
  `allocateretundate` date NOT NULL,
  `allocatereturntime` time NOT NULL,
  `slnid` varchar(50) NOT NULL,
  `allocateremarks` varchar(500) NOT NULL,
  `allocatereturnremarks` varchar(500) NOT NULL,
  `matlstatus` int(11) NOT NULL,
  `almonth` varchar(20) NOT NULL,
  `alyear` year(4) NOT NULL,
  `alrmonth` varchar(20) NOT NULL,
  `alryear` year(4) NOT NULL,
  `rminvid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `machine_asset_code`
--

CREATE TABLE `machine_asset_code` (
  `macid` varchar(50) NOT NULL,
  `macode` varchar(50) NOT NULL,
  `mafid` varchar(50) NOT NULL,
  `mcode` varchar(50) NOT NULL,
  `mtid` varchar(50) NOT NULL,
  `midnum` int(11) NOT NULL,
  `rminvid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_asset_code`
--

INSERT INTO `machine_asset_code` (`macid`, `macode`, `mafid`, `mcode`, `mtid`, `midnum`, `rminvid`) VALUES
('20241118182225', 'AFL-SEW-SNLS-AUT-1', 'AFL', 'SNLS', 'AUT', 1, '20241118182225'),
('20241118182227', 'AFL-SEW-SNLS-AUT-2', 'AFL', 'SNLS', 'AUT', 2, '20241118182227'),
('20241118182230', 'AFL-SEW-SNLS-AUT-3', 'AFL', 'SNLS', 'AUT', 3, '20241118182230'),
('20241118182234', 'AFL-SEW-SNLS-AUT-4', 'AFL', 'SNLS', 'AUT', 4, '20241118182234'),
('20241118182239', 'AFL-SEW-SNLS-AUT-5', 'AFL', 'SNLS', 'AUT', 5, '20241118182239'),
('20241118182255', 'AFL-SEW-SNLS-MAN-1', 'AFL', 'SNLS', 'MAN', 1, '20241118182255'),
('20241118182257', 'AFL-SEW-SNLS-MAN-2', 'AFL', 'SNLS', 'MAN', 2, '20241118182257'),
('20241118182260', 'AFL-SEW-SNLS-MAN-3', 'AFL', 'SNLS', 'MAN', 3, '20241118182260'),
('20241118182264', 'AFL-SEW-SNLS-MAN-4', 'AFL', 'SNLS', 'MAN', 4, '20241118182264'),
('20241118182269', 'AFL-SEW-SNLS-MAN-5', 'AFL', 'SNLS', 'MAN', 5, '20241118182269'),
('20241118182348', 'BGL-SEW-SNLS-AUT-1', 'BGL', 'SNLS', 'AUT', 1, '20241118182348'),
('20241118182350', 'BGL-SEW-SNLS-AUT-2', 'BGL', 'SNLS', 'AUT', 2, '20241118182350'),
('20241118182353', 'BGL-SEW-SNLS-AUT-3', 'BGL', 'SNLS', 'AUT', 3, '20241118182353'),
('20241118182357', 'BGL-SEW-SNLS-AUT-4', 'BGL', 'SNLS', 'AUT', 4, '20241118182357'),
('20241118182362', 'BGL-SEW-SNLS-AUT-5', 'BGL', 'SNLS', 'AUT', 5, '20241118182362'),
('20241118182413', 'BGL-SEW-SNLS-MAN-1', 'BGL', 'SNLS', 'MAN', 1, '20241118182413'),
('20241118182415', 'BGL-SEW-SNLS-MAN-2', 'BGL', 'SNLS', 'MAN', 2, '20241118182415'),
('20241118182418', 'BGL-SEW-SNLS-MAN-3', 'BGL', 'SNLS', 'MAN', 3, '20241118182418'),
('20241118182422', 'BGL-SEW-SNLS-MAN-4', 'BGL', 'SNLS', 'MAN', 4, '20241118182422'),
('20241118182427', 'BGL-SEW-SNLS-MAN-5', 'BGL', 'SNLS', 'MAN', 5, '20241118182427');

-- --------------------------------------------------------

--
-- Table structure for table `machine_disposal_insert`
--

CREATE TABLE `machine_disposal_insert` (
  `mdid` varchar(50) NOT NULL,
  `minvid` varchar(50) NOT NULL,
  `macode` varchar(50) NOT NULL,
  `cfactoryid` varchar(50) NOT NULL,
  `ddate` date NOT NULL,
  `dremarks` varchar(500) NOT NULL,
  `dstatus` int(11) NOT NULL,
  `dmonth` varchar(50) NOT NULL,
  `dyear` year(4) NOT NULL,
  `rminvid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `machine_inhouse_view`
-- (See below for the actual view)
--
CREATE TABLE `machine_inhouse_view` (
`factoryid` varchar(50)
,`pfactoryid` varchar(10)
,`cfactoryid` varchar(10)
,`mpurpose` varchar(50)
,`mname` varchar(100)
,`mtype` varchar(50)
,`mcode` varchar(15)
,`mtid` varchar(50)
,`mpid` varchar(10)
,`totalinhousemachine` bigint(21)
,`totalfreemachine` bigint(21)
,`totalmachineinline` bigint(21)
,`totalmachineinrepair` bigint(21)
,`totalmachinetransfer` bigint(21)
,`totalmachinerent` bigint(21)
,`totalmachineintransit` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `machine_inventory`
--

CREATE TABLE `machine_inventory` (
  `minvid` varchar(50) NOT NULL,
  `pfactoryid` varchar(10) NOT NULL,
  `cfactoryid` varchar(10) NOT NULL,
  `macode` varchar(50) NOT NULL,
  `mcode` varchar(15) NOT NULL,
  `mtid` varchar(50) NOT NULL,
  `monid` varchar(50) NOT NULL,
  `brandid` varchar(50) NOT NULL,
  `supplierid` varchar(50) NOT NULL,
  `miqty` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `imonth` varchar(20) NOT NULL,
  `iyear` year(4) NOT NULL,
  `price` float NOT NULL,
  `warranty` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `rentdays` int(11) NOT NULL,
  `rentdate` date NOT NULL,
  `mistatus` int(11) NOT NULL,
  `rminvid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_inventory`
--

INSERT INTO `machine_inventory` (`minvid`, `pfactoryid`, `cfactoryid`, `macode`, `mcode`, `mtid`, `monid`, `brandid`, `supplierid`, `miqty`, `pdate`, `imonth`, `iyear`, `price`, `warranty`, `description`, `rentdays`, `rentdate`, `mistatus`, `rminvid`) VALUES
('20241118182225', 'AFL', 'AFL', 'AFL-SEW-SNLS-AUT-1', 'SNLS', 'AUT', '20241003104845', '20240120115732', '5', 1, '2024-11-18', 'November', 2024, 5000, 365, '', 0, '0000-00-00', 0, '20241118182225'),
('20241118182227', 'AFL', 'AFL', 'AFL-SEW-SNLS-AUT-2', 'SNLS', 'AUT', '20241003104845', '20240120115732', '5', 1, '2024-11-18', 'November', 2024, 5000, 365, '', 0, '0000-00-00', 0, '20241118182227'),
('20241118182230', 'AFL', 'AFL', 'AFL-SEW-SNLS-AUT-3', 'SNLS', 'AUT', '20241003104845', '20240120115732', '5', 1, '2024-11-18', 'November', 2024, 5000, 365, '', 0, '0000-00-00', 0, '20241118182230'),
('20241118182234', 'AFL', 'AFL', 'AFL-SEW-SNLS-AUT-4', 'SNLS', 'AUT', '20241003104845', '20240120115732', '5', 1, '2024-11-18', 'November', 2024, 5000, 365, '', 0, '0000-00-00', 0, '20241118182234'),
('20241118182239', 'AFL', 'AFL', 'AFL-SEW-SNLS-AUT-5', 'SNLS', 'AUT', '20241003104845', '20240120115732', '5', 1, '2024-11-18', 'November', 2024, 5000, 365, '', 0, '0000-00-00', 0, '20241118182239'),
('20241118182255', 'AFL', 'AFL', 'AFL-SEW-SNLS-MAN-1', 'SNLS', 'MAN', '20241003104852', '20240417125550', '13', 1, '2024-11-18', 'November', 2024, 10000, 365, '', 0, '0000-00-00', 0, '20241118182255'),
('20241118182257', 'AFL', 'AFL', 'AFL-SEW-SNLS-MAN-2', 'SNLS', 'MAN', '20241003104852', '20240417125550', '13', 1, '2024-11-18', 'November', 2024, 10000, 365, '', 0, '0000-00-00', 0, '20241118182257'),
('20241118182260', 'AFL', 'AFL', 'AFL-SEW-SNLS-MAN-3', 'SNLS', 'MAN', '20241003104852', '20240417125550', '13', 1, '2024-11-18', 'November', 2024, 10000, 365, '', 0, '0000-00-00', 0, '20241118182260'),
('20241118182264', 'AFL', 'AFL', 'AFL-SEW-SNLS-MAN-4', 'SNLS', 'MAN', '20241003104852', '20240417125550', '13', 1, '2024-11-18', 'November', 2024, 10000, 365, '', 0, '0000-00-00', 0, '20241118182264'),
('20241118182269', 'AFL', 'AFL', 'AFL-SEW-SNLS-MAN-5', 'SNLS', 'MAN', '20241003104852', '20240417125550', '13', 1, '2024-11-18', 'November', 2024, 10000, 365, '', 0, '0000-00-00', 0, '20241118182269'),
('20241118182348', 'BGL', 'AFL', 'BGL-SEW-SNLS-AUT-1', 'SNLS', 'AUT', '20241003104845', '20240120115732', '1', 1, '2024-11-18', 'November', 2024, 7000, 365, '', 2, '2024-11-21', 1, '20241118182348'),
('20241118182350', 'BGL', 'AFL', 'BGL-SEW-SNLS-AUT-2', 'SNLS', 'AUT', '20241003104845', '20240120115732', '1', 1, '2024-11-18', 'November', 2024, 7000, 365, '', 2, '2024-11-21', 1, '20241118182350'),
('20241118182353', 'BGL', 'BGL', 'BGL-SEW-SNLS-AUT-3', 'SNLS', 'AUT', '20241003104845', '20240120115732', '1', 1, '2024-11-18', 'November', 2024, 7000, 365, '', 0, '0000-00-00', 0, '20241118182353'),
('20241118182357', 'BGL', 'AFL', 'BGL-SEW-SNLS-AUT-4', 'SNLS', 'AUT', '20241003104845', '20240120115732', '1', 1, '2024-11-18', 'November', 2024, 7000, 365, '', 2, '2024-12-01', 1, '20241118182357'),
('20241118182362', 'BGL', 'AFL', 'BGL-SEW-SNLS-AUT-5', 'SNLS', 'AUT', '20241003104845', '20240120115732', '1', 1, '2024-11-18', 'November', 2024, 7000, 365, '', 2, '2024-12-01', 1, '20241118182362'),
('20241118182413', 'BGL', 'BGL', 'BGL-SEW-SNLS-MAN-1', 'SNLS', 'MAN', '20241003104852', '20240129101429', '6', 1, '2024-11-18', 'November', 2024, 9000, 365, '', 0, '0000-00-00', 0, '20241118182413'),
('20241118182415', 'BGL', 'BGL', 'BGL-SEW-SNLS-MAN-2', 'SNLS', 'MAN', '20241003104852', '20240129101429', '6', 1, '2024-11-18', 'November', 2024, 9000, 365, '', 0, '0000-00-00', 0, '20241118182415'),
('20241118182418', 'BGL', 'BGL', 'BGL-SEW-SNLS-MAN-3', 'SNLS', 'MAN', '20241003104852', '20240129101429', '6', 1, '2024-11-18', 'November', 2024, 9000, 365, '', 0, '0000-00-00', 0, '20241118182418'),
('20241118182422', 'BGL', 'BGL', 'BGL-SEW-SNLS-MAN-4', 'SNLS', 'MAN', '20241003104852', '20240129101429', '6', 1, '2024-11-18', 'November', 2024, 9000, 365, '', 0, '0000-00-00', 0, '20241118182422'),
('20241118182427', 'BGL', 'BGL', 'BGL-SEW-SNLS-MAN-5', 'SNLS', 'MAN', '20241003104852', '20240129101429', '6', 1, '2024-11-18', 'November', 2024, 9000, 365, '', 0, '0000-00-00', 0, '20241118182427');

-- --------------------------------------------------------

--
-- Table structure for table `machine_name`
--

CREATE TABLE `machine_name` (
  `mnid` varchar(50) NOT NULL,
  `mpid` varchar(10) NOT NULL,
  `mcode` varchar(15) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `minfo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_name`
--

INSERT INTO `machine_name` (`mnid`, `mpid`, `mcode`, `mname`, `minfo`) VALUES
('20241003104734', 'SEW', 'SNLS', 'Single Needle Lock Stitch', 'Sewing'),
('20241003104822', 'SEW', 'SNV', 'SN-Vertical', ''),
('20241003131136', 'CUTT', 'CUTT', 'Cutting machine', ''),
('20241008104421', 'SEW', 'OVR', 'OverLock', 'over lock');

-- --------------------------------------------------------

--
-- Table structure for table `machine_purpose`
--

CREATE TABLE `machine_purpose` (
  `mpid` varchar(10) NOT NULL,
  `mpurpose` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_purpose`
--

INSERT INTO `machine_purpose` (`mpid`, `mpurpose`) VALUES
('CUTT', 'Cutting'),
('FIN', 'FINISHING'),
('SEW', 'Sewing'),
('TEX', 'Textile');

-- --------------------------------------------------------

--
-- Table structure for table `machine_renthistory_insert`
--

CREATE TABLE `machine_renthistory_insert` (
  `miid` varchar(50) NOT NULL,
  `rhid` varchar(50) NOT NULL,
  `minvid` varchar(50) NOT NULL,
  `macode` varchar(50) NOT NULL,
  `sfactoryid` varchar(50) NOT NULL,
  `dfactoryid` varchar(50) NOT NULL,
  `mistatus` int(11) NOT NULL,
  `rentdays` int(11) NOT NULL,
  `rentprice` float NOT NULL,
  `rentdate` date NOT NULL,
  `renttime` time NOT NULL,
  `rmonth` varchar(20) NOT NULL,
  `ryear` year(4) NOT NULL,
  `retrdate` date NOT NULL,
  `retrtime` time NOT NULL,
  `remonth` varchar(20) NOT NULL,
  `reyear` year(4) NOT NULL,
  `rentremarks` varchar(500) NOT NULL,
  `rentreturnremarks` varchar(500) NOT NULL,
  `receivedate` date NOT NULL,
  `receivetime` time NOT NULL,
  `receiveremarks` varchar(500) NOT NULL,
  `rminvid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_renthistory_insert`
--

INSERT INTO `machine_renthistory_insert` (`miid`, `rhid`, `minvid`, `macode`, `sfactoryid`, `dfactoryid`, `mistatus`, `rentdays`, `rentprice`, `rentdate`, `renttime`, `rmonth`, `ryear`, `retrdate`, `retrtime`, `remonth`, `reyear`, `rentremarks`, `rentreturnremarks`, `receivedate`, `receivetime`, `receiveremarks`, `rminvid`) VALUES
('202411181825230', '20241118182523', '20241118182348', 'BGL-SEW-SNLS-AUT-1', 'BGL', 'AFL', 0, 5, 10, '2024-11-18', '18:25:23', 'November', 2024, '2024-11-18', '18:49:23', 'November', 2024, '', '', '2024-11-18', '18:50:33', '', '20241118182348'),
('202411181825231', '20241118182523', '20241118182350', 'BGL-SEW-SNLS-AUT-2', 'BGL', 'AFL', 0, 5, 10, '2024-11-18', '18:25:23', 'November', 2024, '2024-11-18', '18:49:23', 'November', 2024, '', '', '2024-11-18', '18:50:33', '', '20241118182350'),
('202411181851140', '20241118185114', '20241118182348', 'BGL-SEW-SNLS-AUT-1', 'BGL', 'AFL', 0, 2, 2, '2024-11-18', '18:51:14', 'November', 2024, '2024-11-18', '18:53:04', 'November', 2024, '', '', '2024-11-18', '18:53:50', '', '20241118182348'),
('202411181851141', '20241118185114', '20241118182350', 'BGL-SEW-SNLS-AUT-2', 'BGL', 'AFL', 0, 2, 2, '2024-11-18', '18:51:14', 'November', 2024, '2024-11-18', '18:56:02', 'November', 2024, '', '', '2024-11-18', '18:56:45', '', '20241118182350'),
('202411211603180', '20241121160318', '20241118182348', 'BGL-SEW-SNLS-AUT-1', 'BGL', 'AFL', 1, 2, 300, '2024-11-21', '16:03:18', 'November', 2024, '0000-00-00', '00:00:00', '', 0000, '', '', '2024-11-21', '16:03:42', '', '20241118182348'),
('202411211603181', '20241121160318', '20241118182350', 'BGL-SEW-SNLS-AUT-2', 'BGL', 'AFL', 1, 2, 300, '2024-11-21', '16:03:18', 'November', 2024, '0000-00-00', '00:00:00', '', 0000, '', '', '2024-11-21', '16:03:42', '', '20241118182350'),
('202412011155280', '20241201115528', '20241118182357', 'BGL-SEW-SNLS-AUT-4', 'BGL', 'AFL', 1, 2, 52, '2024-12-01', '11:55:28', 'December', 2024, '0000-00-00', '00:00:00', '', 0000, '', '', '2024-12-01', '11:56:27', '', '20241118182357'),
('202412011155281', '20241201115528', '20241118182362', 'BGL-SEW-SNLS-AUT-5', 'BGL', 'AFL', 1, 2, 52, '2024-12-01', '11:55:28', 'December', 2024, '0000-00-00', '00:00:00', '', 0000, '', '', '2024-12-01', '11:56:27', '', '20241118182362');

-- --------------------------------------------------------

--
-- Table structure for table `machine_renthistory_insert_id`
--

CREATE TABLE `machine_renthistory_insert_id` (
  `rhid` varchar(50) NOT NULL,
  `risfactoryid` varchar(10) NOT NULL,
  `ridfactoryid` varchar(10) NOT NULL,
  `additionalcost` float NOT NULL,
  `ridate` date NOT NULL,
  `ritime` time NOT NULL,
  `rismonth` varchar(50) NOT NULL,
  `risyear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_renthistory_insert_id`
--

INSERT INTO `machine_renthistory_insert_id` (`rhid`, `risfactoryid`, `ridfactoryid`, `additionalcost`, `ridate`, `ritime`, `rismonth`, `risyear`) VALUES
('20241118182523', 'BGL', 'AFL', 300, '2024-11-18', '18:25:23', 'November', 2024),
('20241118185114', 'BGL', 'AFL', 300, '2024-11-18', '18:51:14', 'November', 2024),
('20241121160318', 'BGL', 'AFL', 300, '2024-11-21', '16:03:18', 'November', 2024),
('20241201115528', 'BGL', 'AFL', 0, '2024-12-01', '11:55:28', 'December', 2024);

-- --------------------------------------------------------

--
-- Stand-in structure for view `machine_renthistory_insert_view`
-- (See below for the actual view)
--
CREATE TABLE `machine_renthistory_insert_view` (
`miid` varchar(50)
,`minvid` varchar(50)
,`macode` varchar(50)
,`sfactoryid` varchar(50)
,`dfactoryid` varchar(50)
,`mistatus` int(11)
,`rentdays` int(11)
,`rentprice` float
,`rentdate` date
,`renttime` time
,`rmonth` varchar(20)
,`ryear` year(4)
,`retrdate` date
,`retrtime` time
,`remonth` varchar(20)
,`reyear` year(4)
,`rentremarks` varchar(500)
,`rentreturnremarks` varchar(500)
,`rminvid` varchar(50)
,`odcount` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `machine_repair_insert`
--

CREATE TABLE `machine_repair_insert` (
  `mrepid` varchar(50) NOT NULL,
  `minvid` varchar(50) NOT NULL,
  `macode` varchar(50) NOT NULL,
  `cfactoryid` varchar(50) NOT NULL,
  `rfactoryid` varchar(50) NOT NULL,
  `repairprice` float NOT NULL,
  `srepairdate` date NOT NULL,
  `srepairtime` time NOT NULL,
  `csrepairdate` date NOT NULL,
  `csrepairtime` time NOT NULL,
  `rrepairdate` date NOT NULL,
  `rrepairtime` time NOT NULL,
  `crepairremarks` varchar(500) NOT NULL,
  `rrepairremarks` varchar(500) NOT NULL,
  `mrstatus` int(11) NOT NULL,
  `repmonth` varchar(20) NOT NULL,
  `repyear` year(4) NOT NULL,
  `repremonth` varchar(20) NOT NULL,
  `repreyear` year(4) NOT NULL,
  `rminvid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `machine_requisition_insert`
--

CREATE TABLE `machine_requisition_insert` (
  `mrid` varchar(50) NOT NULL,
  `mriid` varchar(50) NOT NULL,
  `mpid` varchar(50) NOT NULL,
  `mcode` varchar(50) NOT NULL,
  `mtid` varchar(50) NOT NULL,
  `slnid` varchar(50) NOT NULL,
  `buyerid` varchar(50) NOT NULL,
  `styleid` varchar(50) NOT NULL,
  `oqty` int(11) NOT NULL,
  `idate` date NOT NULL,
  `planqty` int(11) NOT NULL,
  `inhandqty` int(11) NOT NULL,
  `fdate` date NOT NULL,
  `tdate` date NOT NULL,
  `rprice` float NOT NULL,
  `rstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_requisition_insert`
--

INSERT INTO `machine_requisition_insert` (`mrid`, `mriid`, `mpid`, `mcode`, `mtid`, `slnid`, `buyerid`, `styleid`, `oqty`, `idate`, `planqty`, `inhandqty`, `fdate`, `tdate`, `rprice`, `rstatus`) VALUES
('202411201558260', '20241120155826', 'SEW', 'SNLS', 'AUT', '20241012172413', 'H&M', 'style 1', 1000, '2024-11-21', 5, 0, '2024-11-25', '2024-11-30', 20, 0),
('202411201558261', '20241120155826', 'SEW', 'SNV', 'MAN', '20241010164028', 'Zara', 'style 2', 2000, '2024-11-23', 15, 0, '2024-11-27', '2024-12-05', 35, 0),
('202411211605440', '20241121160544', 'SEW', 'SNLS', 'AUT', '202410141131130', 'H&M', 'style 1', 2000, '2024-11-23', 2, 0, '2024-11-23', '2024-11-25', 300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `machine_requisition_insert_id`
--

CREATE TABLE `machine_requisition_insert_id` (
  `mriid` varchar(50) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `factoryid` varchar(10) NOT NULL,
  `mqrsdate` date NOT NULL,
  `rmonth` varchar(15) NOT NULL,
  `ryear` year(4) NOT NULL,
  `rremarks` varchar(500) NOT NULL,
  `ristatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_requisition_insert_id`
--

INSERT INTO `machine_requisition_insert_id` (`mriid`, `userid`, `factoryid`, `mqrsdate`, `rmonth`, `ryear`, `rremarks`, `ristatus`) VALUES
('20241120155826', 'bgltest', 'BGL', '2024-11-19', 'November', 2024, 'check', 0),
('20241121160544', 'afltest', 'AFL', '2024-11-21', 'November', 2024, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `machine_root_asset_code`
--

CREATE TABLE `machine_root_asset_code` (
  `rminvid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_root_asset_code`
--

INSERT INTO `machine_root_asset_code` (`rminvid`) VALUES
('20241118182225'),
('20241118182227'),
('20241118182230'),
('20241118182234'),
('20241118182239'),
('20241118182255'),
('20241118182257'),
('20241118182260'),
('20241118182264'),
('20241118182269'),
('20241118182348'),
('20241118182350'),
('20241118182353'),
('20241118182357'),
('20241118182362'),
('20241118182413'),
('20241118182415'),
('20241118182418'),
('20241118182422'),
('20241118182427');

-- --------------------------------------------------------

--
-- Table structure for table `machine_sell_insert`
--

CREATE TABLE `machine_sell_insert` (
  `msid` varchar(50) NOT NULL,
  `minvid` varchar(50) NOT NULL,
  `macode` varchar(50) NOT NULL,
  `sefactoryid` varchar(50) NOT NULL,
  `sdate` date NOT NULL,
  `smonth` varchar(20) NOT NULL,
  `syear` year(4) NOT NULL,
  `sstatus` int(11) NOT NULL,
  `rminvid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `machine_summary_view`
-- (See below for the actual view)
--
CREATE TABLE `machine_summary_view` (
`factoryid` varchar(50)
,`pfactoryid` varchar(10)
,`cfactoryid` varchar(10)
,`mpurpose` varchar(50)
,`mname` varchar(100)
,`mtype` varchar(50)
,`mcode` varchar(15)
,`mtid` varchar(50)
,`mpid` varchar(10)
,`totalinhousemachine` bigint(21)
,`totalfreemachine` bigint(21)
,`totalmachineinline` bigint(21)
,`totalmachineinrepair` bigint(21)
,`totalmachinetransfer` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `machine_type`
--

CREATE TABLE `machine_type` (
  `mtid` varchar(10) NOT NULL,
  `mtype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_type`
--

INSERT INTO `machine_type` (`mtid`, `mtype`) VALUES
('AUT', 'Auto'),
('ELC', 'Electric'),
('HYD', 'Hydrolic'),
('MAN', 'Manual');

-- --------------------------------------------------------

--
-- Table structure for table `model_name`
--

CREATE TABLE `model_name` (
  `monid` varchar(50) NOT NULL,
  `mnid` varchar(50) NOT NULL,
  `mcode` varchar(15) NOT NULL,
  `model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model_name`
--

INSERT INTO `model_name` (`monid`, `mnid`, `mcode`, `model`) VALUES
('20241003104845', '20241003104734', 'SNLS', '650'),
('20241003104852', '20241003104734', 'SNLS', '750'),
('20241003104859', '20241003104822', 'SNV', '650'),
('20241003131220', '20241003131136', 'CUTT', 'Cuuting Latest'),
('20241003133809', '20241003104734', 'SNLS', '950'),
('20241007122751', '20241003104734', 'SNLS', '850');

-- --------------------------------------------------------

--
-- Table structure for table `off_day_insert`
--

CREATE TABLE `off_day_insert` (
  `odid` varchar(20) NOT NULL,
  `offfactoryid` varchar(10) NOT NULL,
  `offdate` date NOT NULL,
  `offmonth` varchar(20) NOT NULL,
  `offyear` year(4) NOT NULL,
  `sdate` date NOT NULL,
  `stime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `off_day_insert`
--

INSERT INTO `off_day_insert` (`odid`, `offfactoryid`, `offdate`, `offmonth`, `offyear`, `sdate`, `stime`) VALUES
('202411161354220', 'HO', '2024-01-02', 'January', 2024, '2024-11-16', '13:54:22'),
('202411161400060', 'BGL', '2024-11-01', 'November', 2024, '2024-11-24', '12:56:59'),
('202411161400061', 'BGL', '2024-11-08', 'November', 2024, '2024-11-24', '12:56:59'),
('202411161400062', 'BGL', '2024-11-15', 'November', 2024, '2024-11-24', '12:56:59'),
('202411161400063', 'BGL', '2024-11-22', 'November', 2024, '2024-11-24', '12:56:59'),
('202411161400064', 'BGL', '2024-11-29', 'November', 2024, '2024-11-24', '12:56:59'),
('202411161401490', 'AFL', '2024-11-01', 'November', 2024, '2024-11-16', '14:01:49'),
('202411161401491', 'AFL', '2024-11-08', 'November', 2024, '2024-11-16', '14:01:49'),
('202411161401492', 'AFL', '2024-11-15', 'November', 2024, '2024-11-16', '14:01:49'),
('202411161401493', 'AFL', '2024-11-22', 'November', 2024, '2024-11-16', '14:01:49'),
('202411161401494', 'AFL', '2024-11-29', 'November', 2024, '2024-11-16', '14:01:49'),
('202411161510570', 'AFL', '2024-12-06', 'December', 2024, '2024-11-16', '15:10:57'),
('202411161510571', 'AFL', '2024-12-13', 'December', 2024, '2024-11-16', '15:10:57'),
('202411161510572', 'AFL', '2024-12-20', 'December', 2024, '2024-11-16', '15:10:57'),
('202411161510573', 'AFL', '2024-12-27', 'December', 2024, '2024-11-16', '15:10:57'),
('202411241256595', 'BGL', '2024-12-06', 'December', 2024, '2024-11-24', '12:56:59'),
('202411241256596', 'BGL', '2024-12-13', 'December', 2024, '2024-11-24', '12:56:59'),
('202411241256597', 'BGL', '2024-12-20', 'December', 2024, '2024-11-24', '12:56:59'),
('202411241256598', 'BGL', '2024-12-27', 'December', 2024, '2024-11-24', '12:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_uom_insert`
--

CREATE TABLE `product_uom_insert` (
  `puomid` int(11) NOT NULL,
  `puom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_uom_insert`
--

INSERT INTO `product_uom_insert` (`puomid`, `puom`) VALUES
(1, 'Pcs'),
(2, 'Box'),
(3, 'Set'),
(4, 'Sets'),
(5, 'Pc'),
(6, 'Dozen'),
(7, 'Meter'),
(8, 'Year/s'),
(9, 'Barcode St'),
(10, 'Roll'),
(11, 'Wireless M'),
(12, 'Unit');

-- --------------------------------------------------------

--
-- Stand-in structure for view `purchase_factory_status_view`
-- (See below for the actual view)
--
CREATE TABLE `purchase_factory_status_view` (
`factoryid` varchar(50)
,`pfactoryid` varchar(10)
,`mpurpose` varchar(50)
,`mname` varchar(100)
,`mtype` varchar(50)
,`mcode` varchar(15)
,`mtid` varchar(50)
,`mpid` varchar(10)
,`totalpurchasemachine` bigint(21)
,`totalfreemachine` bigint(21)
,`totalmachineinline` bigint(21)
,`totalmachineinrepair` bigint(21)
,`totalmachinetransfer` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `purchase_factory_status_view1`
-- (See below for the actual view)
--
CREATE TABLE `purchase_factory_status_view1` (
`factoryid` varchar(50)
,`pfactoryid` varchar(10)
,`cfactoryid` varchar(10)
,`mpurpose` varchar(50)
,`mname` varchar(100)
,`mtype` varchar(50)
,`mcode` varchar(15)
,`mtid` varchar(50)
,`mpid` varchar(10)
,`totalpurchasemachine` bigint(21)
,`totalfreemachine` bigint(21)
,`totalmachineinline` bigint(21)
,`totalmachineinrepair` bigint(21)
,`totalmachinetransfer` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rent_factory_status_view`
-- (See below for the actual view)
--
CREATE TABLE `rent_factory_status_view` (
`factoryid` varchar(50)
,`pfactoryid` varchar(10)
,`cfactoryid` varchar(10)
,`mpurpose` varchar(50)
,`mname` varchar(100)
,`mtype` varchar(50)
,`mcode` varchar(15)
,`mtid` varchar(50)
,`mpid` varchar(10)
,`totalfreemachiner` bigint(21)
,`totalmachineinliner` bigint(21)
,`totalmachineinrepairr` bigint(21)
,`totalmachinerent` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rent_factory_status_view1`
-- (See below for the actual view)
--
CREATE TABLE `rent_factory_status_view1` (
`factoryid` varchar(50)
,`pfactoryid` varchar(10)
,`cfactoryid` varchar(10)
,`mpurpose` varchar(50)
,`mname` varchar(100)
,`mtype` varchar(50)
,`mcode` varchar(15)
,`mtid` varchar(50)
,`mpid` varchar(10)
,`totalinhousemachine` bigint(21)
,`totalfreemachiner` bigint(21)
,`totalmachineinliner` bigint(21)
,`totalmachineinrepairr` bigint(21)
,`totalmachinerent` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `sewing_floor_insert`
--

CREATE TABLE `sewing_floor_insert` (
  `sfnid` varchar(50) NOT NULL,
  `factoryid` varchar(10) NOT NULL,
  `sfname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewing_floor_insert`
--

INSERT INTO `sewing_floor_insert` (`sfnid`, `factoryid`, `sfname`) VALUES
('20241010141807', 'BGL', 'Floor-1'),
('20241010144522', 'BGL', 'Floor-2'),
('20241010144534', 'AKL', 'Floor-1'),
('20241010144547', 'AKL', 'Floor-2'),
('20241012132602', 'AFL', 'Floor-1'),
('20241012164156', 'BGL', 'Floor-3'),
('20241012170224', 'BGL', 'Floor-4');

-- --------------------------------------------------------

--
-- Table structure for table `sewing_line_insert`
--

CREATE TABLE `sewing_line_insert` (
  `slnid` varchar(50) NOT NULL,
  `sfnid` varchar(50) NOT NULL,
  `slname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewing_line_insert`
--

INSERT INTO `sewing_line_insert` (`slnid`, `sfnid`, `slname`) VALUES
('20241010163955', '20241010141807', 'Line-1'),
('20241010164028', '20241010141807', 'Line-2'),
('20241010164040', '20241010144522', 'Line-1'),
('20241012132630', '20241012132602', 'line-1'),
('20241012172413', '20241010141807', 'Line-3'),
('20241012172444', '20241010141807', 'Line-4'),
('202410141121180', '20241010144522', '2nd-1'),
('202410141121181', '20241010144522', '2nd-2'),
('202410141128130', '20241012132602', 'afl-2-1'),
('202410141131130', '20241012132602', '1-1-2'),
('202410141133280', '20241012132602', '2-2-1'),
('202410141133281', '20241012132602', '2-2-2');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_insert`
--

CREATE TABLE `supplier_insert` (
  `supplierid` int(11) NOT NULL,
  `supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_insert`
--

INSERT INTO `supplier_insert` (`supplierid`, `supplier`) VALUES
(1, 'Global'),
(2, 'Computer Source'),
(3, 'Comteck Solution'),
(4, 'NA'),
(5, 'EARS N EYES'),
(6, 'Fine Solution'),
(7, 'A.R.A COROPORATION'),
(8, 'ABDULLAH TRADERS'),
(9, 'Blue Pill Limited'),
(10, 'BOK International'),
(11, 'Comptech Solutions Ltd.'),
(12, 'E-DESK LIMITED'),
(13, 'ELEVATE SOLUTIONS'),
(14, 'GLOBAL BRAND LIMITED'),
(15, 'HARDY TECH'),
(16, 'INTERNATIONAL OFFICE SOLUTION'),
(17, 'IOM'),
(18, 'NEW GULSHAN COMPUTER'),
(19, 'ONESTOP SOLUTION'),
(20, 'OPTIMAL TECHNOLOGY (PVT.) LTD.'),
(21, 'Power Source'),
(22, 'RAIN COMPUTERS'),
(23, 'RICHMAN INFORMATICS'),
(24, 'ROBOTICS BD'),
(25, 'ROBUST INTERNATIONAL'),
(26, 'ROYAL OFFICE EQUIPMENT'),
(27, 'SOLUTIONS 1 AUTOMATION'),
(28, 'UPDATE TECHNOLOGY'),
(29, 'WEKI SOLUTION'),
(30, 'Smart Technology (BD) Ltd'),
(31, 'Micro Marks Electronics '),
(32, 'Knowledge Infotech'),
(33, 'Star Tech & Engineering Ltd'),
(34, 'Sayem Enterprise'),
(35, 'Retail Technology Ltd.');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_machine_transfer_view`
-- (See below for the actual view)
--
CREATE TABLE `total_machine_transfer_view` (
`factoryid` varchar(50)
,`pfactoryid` varchar(10)
,`cfactoryid` varchar(10)
,`mpurpose` varchar(50)
,`mname` varchar(100)
,`mtype` varchar(50)
,`mcode` varchar(15)
,`mtid` varchar(50)
,`mpid` varchar(10)
,`totalpurchasemachine` bigint(21)
,`totalfreemachine` bigint(21)
,`totalmachineinline` bigint(21)
,`totalmachineinrepair` bigint(21)
,`totalmachinetransfer` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_transfer_machine_view1`
-- (See below for the actual view)
--
CREATE TABLE `total_transfer_machine_view1` (
`factoryid` varchar(50)
,`pfactoryid` varchar(10)
,`cfactoryid` varchar(10)
,`mpurpose` varchar(50)
,`mname` varchar(100)
,`mtype` varchar(50)
,`mcode` varchar(15)
,`mtid` varchar(50)
,`mpid` varchar(10)
,`totalmachinetransfer` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `transfer_factory_status_view`
-- (See below for the actual view)
--
CREATE TABLE `transfer_factory_status_view` (
`factoryid` varchar(50)
,`pfactoryid` varchar(10)
,`cfactoryid` varchar(10)
,`mpurpose` varchar(50)
,`mname` varchar(100)
,`mtype` varchar(50)
,`mcode` varchar(15)
,`mtid` varchar(50)
,`mpid` varchar(10)
,`totalmachinetransfer` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `factoryid` varchar(50) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `designationid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `ruserid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ustatus` varchar(100) NOT NULL,
  `indate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`factoryid`, `departmentid`, `designationid`, `name`, `email`, `mobile`, `user_type`, `userid`, `ruserid`, `password`, `image`, `ustatus`, `indate`) VALUES
('AFL', 28, 42, 'AFL TEST', 'afltest@test.com', '00000000000', '2', 'afltest', 'afltest', '123456', '', '1', '0000-00-00'),
('AKL', 25, 18, 'MD. Rakib Hossain', 'aklmaint@babylon-bd.com', '01981232473', '5', 'AKL41128', 'AKL41128', 'akl@41128', '', '1', '0000-00-00'),
('AKL', 25, 52, 'Tarek Rahman', 'aklmaint@babylon-bd.com', '01761340405', '3', 'AKL44304', 'AKL44304', 'akl@44304', '', '1', '0000-00-00'),
('AKL', 28, 9, 'Shakil Uzzaman', 'shakilrnd@babylon-bd.com', '01719005590', '4', 'AKL46904', 'AKL46904', 'akl@46904', '', '1', '0000-00-00'),
('AKL', 28, 42, 'AKL Test', 'test@test.com', '00000000000', '2', 'akltest', 'test', '123456', '', '1', '0000-00-00'),
('ATL', 28, 42, 'atltest', 'atltest@machine.com', '00000000000', '2', 'atltest', 'atltest', '123456', '', '1', '0000-00-00'),
('BGL', 28, 42, 'BGL Test', 'bgltest@test.com', '00000000000', '2', 'bgltest', 'bgltest', '123456', '', '1', '0000-00-00'),
('AKL', 1, 5, 'Khondakar Mashiur Rahman', 'mashiur@babylon-bd.com', '01817043086', '1', 'HO37', 'HO37', 'mashiur37', '', '1', '0000-00-00'),
('HO', 1, 2, 'Habib Motiur Rahman', '', '', '1', 'HO63', 'HO63', '123456', 'habib.jpg', '1', '0000-00-00'),
('AKL', 19, 9, 'Asaduzzaman', '', '01711 036105', '2', 'HO647', 'HO647', '', '', '1', '0000-00-00'),
('HO', 1, 2, 'MD Mushfequr Rahman', '1@email.com', '000000', '1', 'HO926', 'HO926', '123456', 'babylon7.jpg', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE `userstatus` (
  `userstatusid` int(11) NOT NULL,
  `userstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`userstatusid`, `userstatus`) VALUES
(1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertypeid` int(11) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertypeid`, `usertype`) VALUES
(1, 'Admin'),
(2, 'IE'),
(3, 'Maintenance'),
(4, 'IE Head'),
(5, 'Maintenance Head');

-- --------------------------------------------------------

--
-- Structure for view `machine_inhouse_view`
--
DROP TABLE IF EXISTS `machine_inhouse_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `machine_inhouse_view`  AS  select `factory`.`factoryid` AS `factoryid`,`machine_inventory`.`pfactoryid` AS `pfactoryid`,`machine_inventory`.`cfactoryid` AS `cfactoryid`,`machine_purpose`.`mpurpose` AS `mpurpose`,`machine_name`.`mname` AS `mname`,`machine_type`.`mtype` AS `mtype`,`machine_inventory`.`mcode` AS `mcode`,`machine_inventory`.`mtid` AS `mtid`,`machine_name`.`mpid` AS `mpid`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`mistatus` not in ('6','7','8')) AS `totalinhousemachine`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` in ('0','1') and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid`) AS `totalfreemachine`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '2' and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid`) AS `totalmachineinline`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '3' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid`) AS `totalmachineinrepair`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `factory`.`factoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachinetransfer`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` <> '8' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `factory`.`factoryid` <> `machine_inventory`.`pfactoryid`) AS `totalmachinerent`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '8' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid`) AS `totalmachineintransit` from (((((`machine_inventory` join `model_name` on(`model_name`.`monid` = `machine_inventory`.`monid`)) join `machine_type` on(`machine_type`.`mtid` = `machine_inventory`.`mtid`)) join `factory` on(`factory`.`factoryid` = `machine_inventory`.`pfactoryid`)) join `machine_name` on(`machine_name`.`mcode` = `model_name`.`mcode`)) join `machine_purpose` on(`machine_purpose`.`mpid` = `machine_name`.`mpid`)) group by `machine_name`.`mpid`,`machine_inventory`.`mtid`,`machine_inventory`.`pfactoryid`,`machine_inventory`.`mcode` ;

-- --------------------------------------------------------

--
-- Structure for view `machine_renthistory_insert_view`
--
DROP TABLE IF EXISTS `machine_renthistory_insert_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `machine_renthistory_insert_view`  AS  select `machine_renthistory_insert`.`miid` AS `miid`,`machine_renthistory_insert`.`minvid` AS `minvid`,`machine_renthistory_insert`.`macode` AS `macode`,`machine_renthistory_insert`.`sfactoryid` AS `sfactoryid`,`machine_renthistory_insert`.`dfactoryid` AS `dfactoryid`,`machine_renthistory_insert`.`mistatus` AS `mistatus`,`machine_renthistory_insert`.`rentdays` AS `rentdays`,`machine_renthistory_insert`.`rentprice` AS `rentprice`,`machine_renthistory_insert`.`rentdate` AS `rentdate`,`machine_renthistory_insert`.`renttime` AS `renttime`,`machine_renthistory_insert`.`rmonth` AS `rmonth`,`machine_renthistory_insert`.`ryear` AS `ryear`,`machine_renthistory_insert`.`retrdate` AS `retrdate`,`machine_renthistory_insert`.`retrtime` AS `retrtime`,`machine_renthistory_insert`.`remonth` AS `remonth`,`machine_renthistory_insert`.`reyear` AS `reyear`,`machine_renthistory_insert`.`rentremarks` AS `rentremarks`,`machine_renthistory_insert`.`rentreturnremarks` AS `rentreturnremarks`,`machine_renthistory_insert`.`rminvid` AS `rminvid`,count(`off_day_insert`.`odid`) AS `odcount` from (`machine_renthistory_insert` left join `off_day_insert` on(`off_day_insert`.`offdate` >= `machine_renthistory_insert`.`rentdate` and `off_day_insert`.`offdate` <= `machine_renthistory_insert`.`retrdate` and `machine_renthistory_insert`.`dfactoryid` = `off_day_insert`.`offfactoryid`)) group by `machine_renthistory_insert`.`miid` ;

-- --------------------------------------------------------

--
-- Structure for view `machine_summary_view`
--
DROP TABLE IF EXISTS `machine_summary_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `machine_summary_view`  AS  select distinct `combined`.`factoryid` AS `factoryid`,`combined`.`pfactoryid` AS `pfactoryid`,`combined`.`cfactoryid` AS `cfactoryid`,`combined`.`mpurpose` AS `mpurpose`,`combined`.`mname` AS `mname`,`combined`.`mtype` AS `mtype`,`combined`.`mcode` AS `mcode`,`combined`.`mtid` AS `mtid`,`combined`.`mpid` AS `mpid`,`combined`.`totalinhousemachine` AS `totalinhousemachine`,`combined`.`totalfreemachine` AS `totalfreemachine`,`combined`.`totalmachineinline` AS `totalmachineinline`,`combined`.`totalmachineinrepair` AS `totalmachineinrepair`,`combined`.`totalmachinetransfer` AS `totalmachinetransfer` from (select `machine_inhouse_view`.`factoryid` AS `factoryid`,`machine_inhouse_view`.`pfactoryid` AS `pfactoryid`,`machine_inhouse_view`.`cfactoryid` AS `cfactoryid`,`machine_inhouse_view`.`mpurpose` AS `mpurpose`,`machine_inhouse_view`.`mname` AS `mname`,`machine_inhouse_view`.`mtype` AS `mtype`,`machine_inhouse_view`.`mcode` AS `mcode`,`machine_inhouse_view`.`mtid` AS `mtid`,`machine_inhouse_view`.`mpid` AS `mpid`,`machine_inhouse_view`.`totalinhousemachine` AS `totalinhousemachine`,`machine_inhouse_view`.`totalfreemachine` AS `totalfreemachine`,`machine_inhouse_view`.`totalmachineinline` AS `totalmachineinline`,`machine_inhouse_view`.`totalmachineinrepair` AS `totalmachineinrepair`,`machine_inhouse_view`.`totalmachinetransfer` AS `totalmachinetransfer` from `machine_inhouse_view` union all select `rent_factory_status_view1`.`factoryid` AS `factoryid`,`rent_factory_status_view1`.`pfactoryid` AS `pfactoryid`,`rent_factory_status_view1`.`cfactoryid` AS `cfactoryid`,`rent_factory_status_view1`.`mpurpose` AS `mpurpose`,`rent_factory_status_view1`.`mname` AS `mname`,`rent_factory_status_view1`.`mtype` AS `mtype`,`rent_factory_status_view1`.`mcode` AS `mcode`,`rent_factory_status_view1`.`mtid` AS `mtid`,`rent_factory_status_view1`.`mpid` AS `mpid`,`rent_factory_status_view1`.`totalinhousemachine` AS `totalinhousemachine`,`rent_factory_status_view1`.`totalfreemachiner` AS `totalfreemachiner`,`rent_factory_status_view1`.`totalmachineinliner` AS `totalmachineinliner`,`rent_factory_status_view1`.`totalmachineinrepairr` AS `totalmachineinrepairr`,`rent_factory_status_view1`.`totalmachinerent` AS `totalmachinerent` from `rent_factory_status_view1`) `combined` group by `combined`.`factoryid`,`combined`.`pfactoryid`,`combined`.`cfactoryid`,`combined`.`mpurpose`,`combined`.`mname`,`combined`.`mtype`,`combined`.`mcode`,`combined`.`mtid`,`combined`.`mpid` ;

-- --------------------------------------------------------

--
-- Structure for view `purchase_factory_status_view`
--
DROP TABLE IF EXISTS `purchase_factory_status_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `purchase_factory_status_view`  AS  select `factory`.`factoryid` AS `factoryid`,`machine_inventory`.`pfactoryid` AS `pfactoryid`,`machine_purpose`.`mpurpose` AS `mpurpose`,`machine_name`.`mname` AS `mname`,`machine_type`.`mtype` AS `mtype`,`machine_inventory`.`mcode` AS `mcode`,`machine_inventory`.`mtid` AS `mtid`,`machine_name`.`mpid` AS `mpid`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`mistatus` not in ('6','7')) AS `totalpurchasemachine`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '0' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` = `machine_inventory`.`cfactoryid`) AS `totalfreemachine`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '2' and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` = `machine_inventory`.`cfactoryid`) AS `totalmachineinline`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '3' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` = `machine_inventory`.`cfactoryid`) AS `totalmachineinrepair`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachinetransfer` from (((((`machine_inventory` join `model_name` on(`model_name`.`monid` = `machine_inventory`.`monid`)) join `machine_type` on(`machine_type`.`mtid` = `machine_inventory`.`mtid`)) join `factory` on(`factory`.`factoryid` = `machine_inventory`.`pfactoryid`)) join `machine_name` on(`machine_name`.`mcode` = `model_name`.`mcode`)) join `machine_purpose` on(`machine_purpose`.`mpid` = `machine_name`.`mpid`)) where `machine_inventory`.`pfactoryid` = `machine_inventory`.`cfactoryid` group by `machine_name`.`mpid`,`machine_inventory`.`mtid`,`machine_inventory`.`pfactoryid`,`machine_inventory`.`mcode` ;

-- --------------------------------------------------------

--
-- Structure for view `purchase_factory_status_view1`
--
DROP TABLE IF EXISTS `purchase_factory_status_view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `purchase_factory_status_view1`  AS  select `factory`.`factoryid` AS `factoryid`,`machine_inventory`.`pfactoryid` AS `pfactoryid`,`machine_inventory`.`cfactoryid` AS `cfactoryid`,`machine_purpose`.`mpurpose` AS `mpurpose`,`machine_name`.`mname` AS `mname`,`machine_type`.`mtype` AS `mtype`,`machine_inventory`.`mcode` AS `mcode`,`machine_inventory`.`mtid` AS `mtid`,`machine_name`.`mpid` AS `mpid`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`mistatus` not in ('6','7')) AS `totalpurchasemachine`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '0' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` = `machine_inventory`.`cfactoryid`) AS `totalfreemachine`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '2' and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` = `machine_inventory`.`cfactoryid`) AS `totalmachineinline`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '3' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` = `machine_inventory`.`cfactoryid`) AS `totalmachineinrepair`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `factory`.`factoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachinetransfer` from (((((`machine_inventory` join `model_name` on(`model_name`.`monid` = `machine_inventory`.`monid`)) join `machine_type` on(`machine_type`.`mtid` = `machine_inventory`.`mtid`)) join `factory` on(`factory`.`factoryid` = `machine_inventory`.`pfactoryid`)) join `machine_name` on(`machine_name`.`mcode` = `model_name`.`mcode`)) join `machine_purpose` on(`machine_purpose`.`mpid` = `machine_name`.`mpid`)) group by `machine_name`.`mpid`,`machine_inventory`.`mtid`,`machine_inventory`.`cfactoryid`,`machine_inventory`.`mcode` ;

-- --------------------------------------------------------

--
-- Structure for view `rent_factory_status_view`
--
DROP TABLE IF EXISTS `rent_factory_status_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rent_factory_status_view`  AS  select `factory`.`factoryid` AS `factoryid`,`machine_inventory`.`pfactoryid` AS `pfactoryid`,`machine_inventory`.`cfactoryid` AS `cfactoryid`,`machine_purpose`.`mpurpose` AS `mpurpose`,`machine_name`.`mname` AS `mname`,`machine_type`.`mtype` AS `mtype`,`machine_inventory`.`mcode` AS `mcode`,`machine_inventory`.`mtid` AS `mtid`,`machine_name`.`mpid` AS `mpid`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` in ('0','1') and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalfreemachiner`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '2' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachineinliner`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '3' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachineinrepairr`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachinerent` from (((((`machine_inventory` join `model_name` on(`model_name`.`monid` = `machine_inventory`.`monid`)) join `machine_type` on(`machine_type`.`mtid` = `machine_inventory`.`mtid`)) join `factory` on(`factory`.`factoryid` = `machine_inventory`.`cfactoryid`)) join `machine_name` on(`machine_name`.`mcode` = `model_name`.`mcode`)) join `machine_purpose` on(`machine_purpose`.`mpid` = `machine_name`.`mpid`)) where `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid` group by `machine_name`.`mnid`,`machine_inventory`.`mtid`,`machine_inventory`.`cfactoryid`,`machine_inventory`.`mcode` ;

-- --------------------------------------------------------

--
-- Structure for view `rent_factory_status_view1`
--
DROP TABLE IF EXISTS `rent_factory_status_view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rent_factory_status_view1`  AS  select `factory`.`factoryid` AS `factoryid`,`machine_inventory`.`pfactoryid` AS `pfactoryid`,`machine_inventory`.`cfactoryid` AS `cfactoryid`,`machine_purpose`.`mpurpose` AS `mpurpose`,`machine_name`.`mname` AS `mname`,`machine_type`.`mtype` AS `mtype`,`machine_inventory`.`mcode` AS `mcode`,`machine_inventory`.`mtid` AS `mtid`,`machine_name`.`mpid` AS `mpid`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`mistatus` not in ('6','7')) AS `totalinhousemachine`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` in ('0','1') and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalfreemachiner`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '2' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachineinliner`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '3' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachineinrepairr`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`cfactoryid` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachinerent` from (((((`machine_inventory` join `model_name` on(`model_name`.`monid` = `machine_inventory`.`monid`)) join `machine_type` on(`machine_type`.`mtid` = `machine_inventory`.`mtid`)) join `factory` on(`factory`.`factoryid` = `machine_inventory`.`cfactoryid`)) join `machine_name` on(`machine_name`.`mcode` = `model_name`.`mcode`)) join `machine_purpose` on(`machine_purpose`.`mpid` = `machine_name`.`mpid`)) group by `machine_name`.`mnid`,`machine_inventory`.`mtid`,`machine_inventory`.`cfactoryid`,`machine_inventory`.`mcode` ;

-- --------------------------------------------------------

--
-- Structure for view `total_machine_transfer_view`
--
DROP TABLE IF EXISTS `total_machine_transfer_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_machine_transfer_view`  AS  select `factory`.`factoryid` AS `factoryid`,`machine_inventory`.`pfactoryid` AS `pfactoryid`,`machine_inventory`.`cfactoryid` AS `cfactoryid`,`machine_purpose`.`mpurpose` AS `mpurpose`,`machine_name`.`mname` AS `mname`,`machine_type`.`mtype` AS `mtype`,`machine_inventory`.`mcode` AS `mcode`,`machine_inventory`.`mtid` AS `mtid`,`machine_name`.`mpid` AS `mpid`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`mistatus` not in ('6','7')) AS `totalpurchasemachine`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '0' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` = `machine_inventory`.`cfactoryid`) AS `totalfreemachine`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '2' and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` = `machine_inventory`.`cfactoryid`) AS `totalmachineinline`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_inventory`.`mistatus` = '3' and `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` = `machine_inventory`.`cfactoryid`) AS `totalmachineinrepair`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachinetransfer` from (((((`machine_inventory` join `model_name` on(`model_name`.`monid` = `machine_inventory`.`monid`)) join `machine_type` on(`machine_type`.`mtid` = `machine_inventory`.`mtid`)) join `factory` on(`factory`.`factoryid` = `machine_inventory`.`pfactoryid`)) join `machine_name` on(`machine_name`.`mcode` = `model_name`.`mcode`)) join `machine_purpose` on(`machine_purpose`.`mpid` = `machine_name`.`mpid`)) where `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid` group by `machine_name`.`mnid`,`machine_inventory`.`mtid`,`machine_inventory`.`pfactoryid`,`machine_inventory`.`mcode` ;

-- --------------------------------------------------------

--
-- Structure for view `total_transfer_machine_view1`
--
DROP TABLE IF EXISTS `total_transfer_machine_view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_transfer_machine_view1`  AS  select `factory`.`factoryid` AS `factoryid`,`machine_inventory`.`pfactoryid` AS `pfactoryid`,`machine_inventory`.`cfactoryid` AS `cfactoryid`,`machine_purpose`.`mpurpose` AS `mpurpose`,`machine_name`.`mname` AS `mname`,`machine_type`.`mtype` AS `mtype`,`machine_inventory`.`mcode` AS `mcode`,`machine_inventory`.`mtid` AS `mtid`,`machine_name`.`mpid` AS `mpid`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachinetransfer` from (((((`machine_inventory` join `model_name` on(`model_name`.`monid` = `machine_inventory`.`monid`)) join `machine_type` on(`machine_type`.`mtid` = `machine_inventory`.`mtid`)) join `factory` on(`factory`.`factoryid` = `machine_inventory`.`pfactoryid`)) join `machine_name` on(`machine_name`.`mcode` = `model_name`.`mcode`)) join `machine_purpose` on(`machine_purpose`.`mpid` = `machine_name`.`mpid`)) where `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid` group by `machine_name`.`mnid`,`machine_inventory`.`mtid`,`machine_inventory`.`pfactoryid`,`machine_inventory`.`mcode` ;

-- --------------------------------------------------------

--
-- Structure for view `transfer_factory_status_view`
--
DROP TABLE IF EXISTS `transfer_factory_status_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transfer_factory_status_view`  AS  select `factory`.`factoryid` AS `factoryid`,`machine_inventory`.`pfactoryid` AS `pfactoryid`,`machine_inventory`.`cfactoryid` AS `cfactoryid`,`machine_purpose`.`mpurpose` AS `mpurpose`,`machine_name`.`mname` AS `mname`,`machine_type`.`mtype` AS `mtype`,`machine_inventory`.`mcode` AS `mcode`,`machine_inventory`.`mtid` AS `mtid`,`machine_name`.`mpid` AS `mpid`,(select count(`machine_inventory`.`mcode`) from `machine_inventory` where `machine_type`.`mtid` = `machine_inventory`.`mtid` and `machine_name`.`mcode` = `machine_inventory`.`mcode` and `factory`.`factoryid` = `machine_inventory`.`pfactoryid` and `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid`) AS `totalmachinetransfer` from (((((`machine_inventory` join `model_name` on(`model_name`.`monid` = `machine_inventory`.`monid`)) join `machine_type` on(`machine_type`.`mtid` = `machine_inventory`.`mtid`)) join `factory` on(`factory`.`factoryid` = `machine_inventory`.`pfactoryid`)) join `machine_name` on(`machine_name`.`mcode` = `model_name`.`mcode`)) join `machine_purpose` on(`machine_purpose`.`mpid` = `machine_name`.`mpid`)) where `machine_inventory`.`pfactoryid` <> `machine_inventory`.`cfactoryid` group by `machine_name`.`mpid`,`machine_inventory`.`mtid`,`machine_inventory`.`pfactoryid`,`machine_inventory`.`mcode` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_insert`
--
ALTER TABLE `brand_insert`
  ADD PRIMARY KEY (`brandid`) USING BTREE;

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`desigid`);

--
-- Indexes for table `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`factoryid`) USING BTREE;

--
-- Indexes for table `factory_type`
--
ALTER TABLE `factory_type`
  ADD PRIMARY KEY (`ftypeid`);

--
-- Indexes for table `machine_allocate_to_line`
--
ALTER TABLE `machine_allocate_to_line`
  ADD PRIMARY KEY (`matolid`);

--
-- Indexes for table `machine_asset_code`
--
ALTER TABLE `machine_asset_code`
  ADD PRIMARY KEY (`macid`);

--
-- Indexes for table `machine_disposal_insert`
--
ALTER TABLE `machine_disposal_insert`
  ADD PRIMARY KEY (`mdid`);

--
-- Indexes for table `machine_inventory`
--
ALTER TABLE `machine_inventory`
  ADD PRIMARY KEY (`minvid`);

--
-- Indexes for table `machine_name`
--
ALTER TABLE `machine_name`
  ADD PRIMARY KEY (`mnid`),
  ADD UNIQUE KEY `mcode` (`mcode`);

--
-- Indexes for table `machine_purpose`
--
ALTER TABLE `machine_purpose`
  ADD PRIMARY KEY (`mpid`);

--
-- Indexes for table `machine_renthistory_insert`
--
ALTER TABLE `machine_renthistory_insert`
  ADD PRIMARY KEY (`miid`);

--
-- Indexes for table `machine_renthistory_insert_id`
--
ALTER TABLE `machine_renthistory_insert_id`
  ADD PRIMARY KEY (`rhid`);

--
-- Indexes for table `machine_repair_insert`
--
ALTER TABLE `machine_repair_insert`
  ADD PRIMARY KEY (`mrepid`);

--
-- Indexes for table `machine_requisition_insert`
--
ALTER TABLE `machine_requisition_insert`
  ADD PRIMARY KEY (`mrid`);

--
-- Indexes for table `machine_requisition_insert_id`
--
ALTER TABLE `machine_requisition_insert_id`
  ADD PRIMARY KEY (`mriid`);

--
-- Indexes for table `machine_root_asset_code`
--
ALTER TABLE `machine_root_asset_code`
  ADD PRIMARY KEY (`rminvid`);

--
-- Indexes for table `machine_sell_insert`
--
ALTER TABLE `machine_sell_insert`
  ADD PRIMARY KEY (`msid`);

--
-- Indexes for table `machine_type`
--
ALTER TABLE `machine_type`
  ADD PRIMARY KEY (`mtid`);

--
-- Indexes for table `model_name`
--
ALTER TABLE `model_name`
  ADD PRIMARY KEY (`monid`);

--
-- Indexes for table `product_uom_insert`
--
ALTER TABLE `product_uom_insert`
  ADD PRIMARY KEY (`puomid`);

--
-- Indexes for table `sewing_floor_insert`
--
ALTER TABLE `sewing_floor_insert`
  ADD PRIMARY KEY (`sfnid`);

--
-- Indexes for table `sewing_line_insert`
--
ALTER TABLE `sewing_line_insert`
  ADD PRIMARY KEY (`slnid`);

--
-- Indexes for table `supplier_insert`
--
ALTER TABLE `supplier_insert`
  ADD PRIMARY KEY (`supplierid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`userstatusid`) USING BTREE;

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertypeid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `desigid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `factory_type`
--
ALTER TABLE `factory_type`
  MODIFY `ftypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_uom_insert`
--
ALTER TABLE `product_uom_insert`
  MODIFY `puomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier_insert`
--
ALTER TABLE `supplier_insert`
  MODIFY `supplierid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `userstatusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
