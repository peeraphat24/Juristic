-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2019 at 05:43 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `action_id` int(10) NOT NULL,
  `emp_id` int(5) DEFAULT NULL,
  `repair_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brand_car`
--

CREATE TABLE `brand_car` (
  `brand_id` int(4) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand_car`
--

INSERT INTO `brand_car` (`brand_id`, `brand_name`) VALUES
(8001, 'AC'),
(8002, 'Acura'),
(8003, 'Aixam'),
(8004, 'Alfa Romeo'),
(8005, 'Aston Martin'),
(8006, 'Audi'),
(8007, 'Dacia'),
(8008, 'Bentley'),
(8009, 'BMW'),
(8010, 'Bufori'),
(8011, 'Bugatti'),
(8012, 'Buick'),
(8013, 'Cadillac'),
(8014, 'Chevrolet'),
(8015, 'Chrysler'),
(8016, 'Citroen'),
(8017, 'Audi'),
(8018, 'Daihatsu'),
(8019, 'Dodge'),
(8020, 'DR Motor'),
(8021, 'Ferrari'),
(8022, 'Fiat'),
(8023, 'Fisker'),
(8024, 'Ford'),
(8025, 'GMC'),
(8026, 'Holden'),
(8027, 'Honda'),
(8028, 'Hyundai'),
(8029, 'Infiniti'),
(8030, 'Jaguar'),
(8031, 'Jeep'),
(8032, 'Kia'),
(8033, 'Koenigsegg'),
(8034, 'Lada'),
(8035, 'Lamborghini'),
(8036, 'Lancia'),
(8037, 'Land Rover'),
(8038, 'Lexus'),
(8039, 'Lincoln'),
(8040, 'Lobini'),
(8041, 'Lotus'),
(8042, 'Marcos'),
(8043, 'Marussia'),
(8044, 'Maserati'),
(8045, 'Mastretta'),
(8046, 'Maybach'),
(8047, 'Mazda'),
(8048, 'Mercedes-Benz'),
(8049, 'MG'),
(8050, 'Mini'),
(8051, 'Mitsubishi'),
(8052, 'Morgan'),
(8053, 'Nissan'),
(8054, 'Noble'),
(8055, 'Opel'),
(8056, 'Pagani'),
(8057, 'Perodua'),
(8058, 'Peugeot'),
(8059, 'Porsche'),
(8060, 'Proton'),
(8061, 'Renault'),
(8062, 'Rolls Royce'),
(8063, 'Rover'),
(8064, 'Scion'),
(8065, 'SEAT'),
(8066, 'Skoda Auto'),
(8067, 'Spyker'),
(8068, 'SsangYong'),
(8069, 'Subaru'),
(8070, 'Suzuki'),
(8071, 'TAC Motors'),
(8072, 'Tesla'),
(8073, 'Toyota'),
(8074, 'Vauxhall'),
(8075, 'Volkswagen'),
(8076, 'Volvo');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `build_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `member_id` int(5) NOT NULL,
  `m_address` varchar(150) NOT NULL,
  `build_startdate` date NOT NULL,
  `build_enddate` date NOT NULL,
  `date` date NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `b_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`build_id`, `member_id`, `m_address`, `build_startdate`, `build_enddate`, `date`, `telephone`, `b_status`) VALUES
(0000000001, 10001, '321', '2019-03-07', '2019-03-08', '2019-03-09', '0831220265', 0),
(0000000002, 10001, '80/87', '2019-03-08', '2019-03-27', '2019-03-04', '0831220265', 0);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(5) NOT NULL,
  `car_number` varchar(7) NOT NULL,
  `member_id` int(5) NOT NULL,
  `brand_id` int(4) NOT NULL,
  `car_color` varchar(30) NOT NULL,
  `province_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_number`, `member_id`, `brand_id`, `car_color`, `province_id`) VALUES
(40001, 'กข1110', 10002, 0, 'ทอง', 1),
(40002, 'กด 1234', 10002, 0, 'ขาว', 2),
(40004, 'กข1110', 10002, 0, 'ทอง', 1),
(40005, 'กด 1234', 10002, 0, 'ขาว', 2);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_addr` varchar(255) DEFAULT NULL,
  `company_telephone` varchar(255) DEFAULT NULL,
  `recieve_name` varchar(255) DEFAULT NULL,
  `report_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(5) NOT NULL,
  `emp_firstname` varchar(30) NOT NULL,
  `emp_lastname` varchar(30) NOT NULL,
  `job_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `emp_addr` varchar(100) NOT NULL,
  `emp_tel` varchar(10) NOT NULL,
  `emp_birthday` date NOT NULL,
  `emp_start` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_firstname`, `emp_lastname`, `job_id`, `emp_addr`, `emp_tel`, `emp_birthday`, `emp_start`) VALUES
(20001, 'PhanuThep', 'Oupachant', 2001, '80/87', '02555555', '2018-04-04', '2018-04-05'),
(20002, 'ชวัลนุช', 'อุปจันทร์', 2002, '80/88', '029257107', '2018-04-04', '2018-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `job_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_name`) VALUES
(2001, 'ประธาน'),
(2002, 'รองประธาน'),
(2003, 'คนทำความสะอาด'),
(2004, 'คนทำสวน'),
(2005, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meet_id` int(10) NOT NULL,
  `meet_detail` varchar(1000) NOT NULL,
  `place` varchar(255) NOT NULL,
  `date_start` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `files` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meet_id`, `meet_detail`, `place`, `date_start`, `start_time`, `end_time`, `files`) VALUES
(1000000001, '123456', '123456', '2019-03-14', '10:00:00', '15:00:00', '8813172-hd-nature-wallpapers-26782.jpg'),
(1000000002, '1234', '1234', '2019-03-23', '10:00:00', '16:00:00', '1234.docx'),
(1000000003, '32123', '213213454', '2019-03-26', '08:08:00', '16:50:00', '532012.pdf'),
(1000000004, '33333', '4444444', '2019-03-31', '05:00:00', '16:00:00', '5706021622141.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `meetmember`
--

CREATE TABLE `meetmember` (
  `meet_id` int(10) NOT NULL,
  `member_id` int(5) NOT NULL,
  `emp_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(5) NOT NULL,
  `numbertitle` int(6) NOT NULL,
  `m_firstname` varchar(60) CHARACTER SET utf8 NOT NULL,
  `m_lastname` varchar(60) CHARACTER SET utf8 NOT NULL,
  `type_id` int(4) NOT NULL,
  `identify_id` varchar(13) DEFAULT NULL,
  `m_address` varchar(150) CHARACTER SET utf8 NOT NULL,
  `m_tel` varchar(10) CHARACTER SET utf8 NOT NULL,
  `m_birthday` date NOT NULL,
  `m_in` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `numbertitle`, `m_firstname`, `m_lastname`, `type_id`, `identify_id`, `m_address`, `m_tel`, `m_birthday`, `m_in`, `status`) VALUES
(10001, 123456, 'Phanupong', 'Oupachant', 3001, '1102900022123', '80/87', '0831220265', '1996-06-06', '2018-06-03', 1),
(10002, 111112, 'ชวัลนุช', 'อุปจันทร์', 3001, '1102900022124', '80/86', '029257107', '2017-12-19', '2017-12-01', 0),
(10003, 1234, 'ภาณุเทพ', 'อุปจันทร์', 3001, '1102900022125', '80/87', '029257107', '2018-04-09', '2018-04-02', 0),
(10006, 123456, 'ศุภวิชญ์', 'นาคยศ', 3001, '1102900022126', '102/652', '0831220265', '2018-06-07', '2018-06-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `move`
--

CREATE TABLE `move` (
  `move_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `member_id` int(5) NOT NULL,
  `move_detail` varchar(255) NOT NULL,
  `amount` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `place` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `permission` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `move`
--

INSERT INTO `move` (`move_id`, `member_id`, `move_detail`, `amount`, `start_date`, `end_date`, `place`, `note`, `permission`) VALUES
(00000001, 10002, '1234', 5, '2019-01-02', '2019-01-03', '123456', '1234', 0),
(00000002, 10002, '123', 1234, '2019-01-06', '2019-01-06', '80/86', '123', 0),
(00000003, 10001, 'reww', 12, '2019-02-11', '2019-02-11', '80/87', '1234', 0),
(00000004, 10001, '123', 20, '2019-02-14', '2019-02-14', '80/87', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `member_id` int(5) NOT NULL,
  `place_name` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `place_topic_name` varchar(200) NOT NULL,
  `place_detail` varchar(200) NOT NULL,
  `permission` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `member_id`, `place_name`, `start_date`, `end_date`, `place_topic_name`, `place_detail`, `permission`) VALUES
(00000001, 10001, 'TEST', '2019-01-20', '2019-01-21', 'TEST1', 'TEST2', 1),
(00000002, 10002, 'โปรดเลือกสถานที่', '2019-01-05', '2019-01-13', '1234', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `PROVINCE_ID` int(5) NOT NULL,
  `PROVINCE_NAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`PROVINCE_ID`, `PROVINCE_NAME`) VALUES
(1, 'กรุงเทพมหานคร'),
(2, 'สมุทรปราการ   '),
(3, 'นนทบุรี   '),
(4, 'ปทุมธานี   '),
(5, 'พระนครศรีอยุธยา   '),
(6, 'อ่างทอง   '),
(7, 'ลพบุรี   '),
(8, 'สิงห์บุรี   '),
(9, 'ชัยนาท   '),
(10, 'สระบุรี'),
(11, 'ชลบุรี   '),
(12, 'ระยอง   '),
(13, 'จันทบุรี   '),
(14, 'ตราด   '),
(15, 'ฉะเชิงเทรา   '),
(16, 'ปราจีนบุรี   '),
(17, 'นครนายก   '),
(18, 'สระแก้ว   '),
(19, 'นครราชสีมา   '),
(20, 'บุรีรัมย์   '),
(21, 'สุรินทร์   '),
(22, 'ศรีสะเกษ   '),
(23, 'อุบลราชธานี   '),
(24, 'ยโสธร   '),
(25, 'ชัยภูมิ   '),
(26, 'อำนาจเจริญ   '),
(27, 'หนองบัวลำภู   '),
(28, 'ขอนแก่น   '),
(29, 'อุดรธานี   '),
(30, 'เลย   '),
(31, 'หนองคาย   '),
(32, 'มหาสารคาม   '),
(33, 'ร้อยเอ็ด   '),
(34, 'กาฬสินธุ์   '),
(35, 'สกลนคร   '),
(36, 'นครพนม   '),
(37, 'มุกดาหาร   '),
(38, 'เชียงใหม่   '),
(39, 'ลำพูน   '),
(40, 'ลำปาง   '),
(41, 'อุตรดิตถ์   '),
(42, 'แพร่   '),
(43, 'น่าน   '),
(44, 'พะเยา   '),
(45, 'เชียงราย   '),
(46, 'แม่ฮ่องสอน   '),
(47, 'นครสวรรค์   '),
(48, 'อุทัยธานี   '),
(49, 'กำแพงเพชร   '),
(50, 'ตาก   '),
(51, 'สุโขทัย   '),
(52, 'พิษณุโลก   '),
(53, 'พิจิตร   '),
(54, 'เพชรบูรณ์   '),
(55, 'ราชบุรี   '),
(56, 'กาญจนบุรี   '),
(57, 'สุพรรณบุรี   '),
(58, 'นครปฐม   '),
(59, 'สมุทรสาคร   '),
(60, 'สมุทรสงคราม   '),
(61, 'เพชรบุรี   '),
(62, 'ประจวบคีรีขันธ์   '),
(63, 'นครศรีธรรมราช   '),
(64, 'กระบี่   '),
(65, 'พังงา   '),
(66, 'ภูเก็ต   '),
(67, 'สุราษฎร์ธานี   '),
(68, 'ระนอง   '),
(69, 'ชุมพร   '),
(70, 'สงขลา   '),
(71, 'สตูล   '),
(72, 'ตรัง   '),
(73, 'พัทลุง   '),
(74, 'ปัตตานี   '),
(75, 'ยะลา   '),
(76, 'นราธิวาส   '),
(77, 'บึงกาฬ');

-- --------------------------------------------------------

--
-- Table structure for table `referee`
--

CREATE TABLE `referee` (
  `ref_id` int(5) NOT NULL,
  `member_id` varchar(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` text NOT NULL,
  `job_id` int(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `referee`
--

INSERT INTO `referee` (`ref_id`, `member_id`, `start_date`, `end_date`, `job_id`) VALUES
(30001, '10001', '2018-06-26', '25/06/2022', 2001);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `repair_id` int(5) NOT NULL,
  `emp_id` int(5) DEFAULT NULL,
  `repair_name` varchar(255) DEFAULT NULL,
  `repair_status` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `report_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `repair_detail` varchar(255) DEFAULT NULL,
  `company_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `
responsible` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `replay`
--

CREATE TABLE `replay` (
  `replay_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `house_number` varchar(7) NOT NULL,
  `re_firstname` varchar(30) NOT NULL,
  `re_lastname` varchar(30) NOT NULL,
  `re_detail` varchar(200) NOT NULL,
  `re_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replay`
--

INSERT INTO `replay` (`replay_id`, `house_number`, `re_firstname`, `re_lastname`, `re_detail`, `re_date`) VALUES
(0000000001, '80/87', 'ภาณุพงศ์', 'อุปจันทร์', 'ข้างบ้านทะเลาะเสียงดัง', '2017-12-08'),
(0000000002, '80/87', 'ภาณุพงศ์', 'อุปจันทร์', 'ท่อระบายน้ำตัน', '2017-12-09'),
(0000000003, '80/86', 'ชวัลนุช', 'อุปจันทร์', 'ข้างบ้านเสียงดังรบกวน', '2017-12-10'),
(0000000004, '80/87', 'ภาณุพงศ์', 'อุปจันทร์', 'ขโมยขึ้นบ้าน', '2017-12-11'),
(0000000005, '80/86', 'ชวัลนุช', 'อุปจันทร์', '1', '2018-04-11'),
(0000000006, '80/86', 'ชวัลนุช', 'อุปจันทร์', '25', '2018-04-11'),
(0000000007, '80/86', 'ชวัลนุช', 'อุปจันทร์', '43', '2018-04-11'),
(0000000008, '80/87', 'ภาณุเทพ', 'อุปจันทร์', '123', '2018-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `member_id` varchar(5) NOT NULL,
  `re_title` text NOT NULL,
  `re_detail` varchar(200) NOT NULL,
  `re_date` date NOT NULL,
  `re_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `member_id`, `re_title`, `re_detail`, `re_date`, `re_status`) VALUES
(0000000010, '10002', 'นกมาทำรัง', 'นกมาทำรัง', '2018-05-08', 2),
(0000000011, '10001', 'ข้างบ้านเสียงดัง', 'ข้างบ้านเสียงดัง', '2018-06-11', 1),
(0000000012, '10002', 'ไฟทางดับหน้าบ้าน', 'ไฟทางดับหน้าบ้าน', '2018-06-11', 3),
(0000000013, '10002', '12', '212', '2018-09-17', 1),
(0000000014, '10002', '32', '32', '2018-09-17', 1),
(0000000017, '10001', '1234', '12345', '2019-01-19', 3),
(0000000018, '10002', 'TEST', 'TEST1', '2019-01-21', 1),
(0000000019, '10001', '1234', '1234', '2019-01-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_repair`
--

CREATE TABLE `report_repair` (
  `report_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `member_id` int(5) NOT NULL,
  `report_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `repair_sdate` date DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_repair`
--

INSERT INTO `report_repair` (`report_id`, `member_id`, `report_name`, `address`, `repair_sdate`, `note`) VALUES
(0000000001, 10001, '1234', '1234', '2019-03-11', NULL),
(0000000002, 10001, '1321', '321321', '2019-03-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resultmeet`
--

CREATE TABLE `resultmeet` (
  `result_id` int(10) NOT NULL,
  `result_detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `repair_id` int(5) NOT NULL,
  `tools_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `termmeet`
--

CREATE TABLE `termmeet` (
  `term_id` int(10) NOT NULL,
  `meet_id` int(10) NOT NULL,
  `result_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `tools_id` int(5) NOT NULL,
  `type_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `tools_name` varchar(60) NOT NULL,
  `tools_amount` int(4) NOT NULL,
  `unit_id` int(5) NOT NULL,
  `tools_get` date NOT NULL,
  `tools_status` varchar(20) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tools_id`, `type_id`, `tools_name`, `tools_amount`, `unit_id`, `tools_get`, `tools_status`, `note`) VALUES
(60001, 5002, 'Chainsaw', 26, 1, '2018-06-04', 'ใช้งานได้', ''),
(60002, 5002, 'Axe', 10, 1, '2018-06-06', 'ใช้งานได้', ''),
(60003, 5002, 'สว่าน', 2, 2, '2018-06-25', 'ใช้งานได้', ''),
(60004, 5002, 'สายไฟ', 2, 2, '2018-06-25', 'ใช้งานได้', '');

-- --------------------------------------------------------

--
-- Table structure for table `typeact`
--

CREATE TABLE `typeact` (
  `type_id` varchar(4) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typeact`
--

INSERT INTO `typeact` (`type_id`, `type_name`) VALUES
('7001', 'กิจกรรมของหมู่บ้าน'),
('7002', 'กิจกรรมของ อบต.');

-- --------------------------------------------------------

--
-- Table structure for table `typemember`
--

CREATE TABLE `typemember` (
  `type_id` int(4) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typemember`
--

INSERT INTO `typemember` (`type_id`, `type_name`) VALUES
(3001, 'เจ้าของบ้าน'),
(3002, 'ผู้เช่า'),
(3003, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `typepay`
--

CREATE TABLE `typepay` (
  `type_id` varchar(4) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typepay`
--

INSERT INTO `typepay` (`type_id`, `type_name`) VALUES
('4001', 'จ่าย'),
('4002', 'ยังไม่จ่าย'),
('4003', 'ค้างจ่าย'),
('4004', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `typetools`
--

CREATE TABLE `typetools` (
  `type_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `type_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typetools`
--

INSERT INTO `typetools` (`type_id`, `type_name`) VALUES
(5001, 'ใช้แล้วหมดไป'),
(5002, 'เครื่องมือช่าง'),
(5003, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(5) NOT NULL,
  `unit_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'ตัว'),
(2, 'อัน');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `work_id` varchar(4) NOT NULL,
  `work_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`work_id`, `work_name`) VALUES
('6001', 'ตัดหญ้า'),
('6002', 'จัดสวน'),
('6003', 'เปลี่ยนน้ำในสระ'),
('6004', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `emp` (`emp_id`),
  ADD KEY `repair` (`repair_id`);

--
-- Indexes for table `brand_car`
--
ALTER TABLE `brand_car`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`build_id`),
  ADD KEY `memeber_id` (`member_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meet_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `move`
--
ALTER TABLE `move`
  ADD PRIMARY KEY (`move_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`PROVINCE_ID`);

--
-- Indexes for table `referee`
--
ALTER TABLE `referee`
  ADD PRIMARY KEY (`ref_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`repair_id`),
  ADD KEY `employee` (`emp_id`),
  ADD KEY `report` (`report_id`),
  ADD KEY `company` (`company_id`);

--
-- Indexes for table `replay`
--
ALTER TABLE `replay`
  ADD PRIMARY KEY (`replay_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `report_repair`
--
ALTER TABLE `report_repair`
  ADD PRIMARY KEY (`report_id`) USING BTREE,
  ADD KEY `member` (`member_id`);

--
-- Indexes for table `resultmeet`
--
ALTER TABLE `resultmeet`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `termmeet`
--
ALTER TABLE `termmeet`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`tools_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `typemember`
--
ALTER TABLE `typemember`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `typepay`
--
ALTER TABLE `typepay`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `typetools`
--
ALTER TABLE `typetools`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `build_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40006;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meet_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000010;
--
-- AUTO_INCREMENT for table `move`
--
ALTER TABLE `move`
  MODIFY `move_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `PROVINCE_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `repair_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `report_repair`
--
ALTER TABLE `report_repair`
  MODIFY `report_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `resultmeet`
--
ALTER TABLE `resultmeet`
  MODIFY `result_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `termmeet`
--
ALTER TABLE `termmeet`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `emp` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `repair` FOREIGN KEY (`repair_id`) REFERENCES `repair` (`repair_id`);

--
-- Constraints for table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `province` (`PROVINCE_ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `typemember` (`type_id`);

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `referee`
--
ALTER TABLE `referee`
  ADD CONSTRAINT `referee_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Constraints for table `repair`
--
ALTER TABLE `repair`
  ADD CONSTRAINT `company` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `employee` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `report` FOREIGN KEY (`report_id`) REFERENCES `report_repair` (`report_id`);

--
-- Constraints for table `report_repair`
--
ALTER TABLE `report_repair`
  ADD CONSTRAINT `member` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `tools`
--
ALTER TABLE `tools`
  ADD CONSTRAINT `tools_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `typetools` (`type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
