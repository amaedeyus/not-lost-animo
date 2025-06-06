-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2025 at 10:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lostandfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_index` int(11) NOT NULL,
  `dept_code` varchar(255) DEFAULT NULL,
  `dept_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_index`, `dept_code`, `dept_title`) VALUES
(1, 'CBEAM', 'College of Business, Economics, Accountancy and Management'),
(2, 'CEAS', 'College of Education, Arts and Sciences'),
(3, 'CIHTM', 'College of International Hospitality and Tourism Management'),
(4, 'CITE', 'College of Information Technology and Engineering'),
(5, 'CON', 'College of Nursing'),
(6, 'COL', 'College of Law');

-- --------------------------------------------------------

--
-- Table structure for table `item_submission`
--

CREATE TABLE `item_submission` (
  `item_index` int(11) NOT NULL,
  `user_submit_index` int(11) NOT NULL COMMENT 'The person who submitted the lost item',
  `image_path` varchar(255) DEFAULT NULL COMMENT 'Path to uploaded image',
  `item_name` varchar(100) NOT NULL COMMENT 'Name or title of the item',
  `description` text DEFAULT NULL COMMENT 'Description of the item',
  `lost_location` varchar(100) NOT NULL COMMENT 'Where the item was lost (e.g., library, building)',
  `lost_date` date NOT NULL COMMENT 'When the item was lost',
  `user_retrieve_index` int(11) NOT NULL,
  `retrieval_date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL COMMENT 'Status of the item, e.g., Lost or Found',
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_submission`
--

INSERT INTO `item_submission` (`item_index`, `user_submit_index`, `image_path`, `item_name`, `description`, `lost_location`, `lost_date`, `user_retrieve_index`, `retrieval_date`, `status`, `approved`) VALUES
(81, 37, 'item-image/630ffe08-f261-4f57-9c49-9e3ac4eed6df.jpg', 'hoshi', 'horangi', 'JRN Building', '2025-06-18', 0, NULL, 'Returned', 1),
(83, 37, 'item-image/RM.jpg', 'sdfsdf', 'dfsdfdf', 'LRC', '2025-06-26', 0, NULL, 'Pending', 0),
(85, 37, 'item-image/☆.jpg', 'Sungho', 'dfgdfg', 'Mabini Building', '2025-06-28', 0, NULL, 'Pending', 0),
(86, 37, 'item-image/Seventeen The8.jpg', 'Minghao', 'asawa ni Xy', 'JRF Building', '2025-06-05', 0, NULL, 'Returned', 1),
(87, 1, 'item-image/download (13).jpg', 'Jin', 'Jin', 'Jose Diokno Building', '2025-06-26', 0, NULL, 'Lost', 1),
(88, 1, 'item-image/477032937_1796973947727995_7822366551452897979_n.jpg', 'Yeonjun', 'ggum', 'JRF Building', '2025-05-29', 0, NULL, 'Lost', 1),
(89, 37, 'item-image/download (15).jpg', 'jungkook', 'asdasd', 'Mabini Building', '2025-06-05', 0, NULL, 'Pending', 0),
(90, 1, 'item-image/Seventeen The8.jpg', 'Minghao', '你爱我 我爱你 蜜雪冰城甜蜜蜜 你爱我 我爱你 蜜雪冰城甜蜜蜜 你爱我呀 我爱你 你爱我 我爱你 蜜雪冰城甜蜜蜜', 'Sentrum', '2025-06-06', 0, NULL, 'Lost', 1),
(91, 1, 'item-image/290886ff-7116-406a-8a2c-e7e45a028704.jpg', 'Seungcheol', 'melon pan', 'CBEAM Building', '2025-06-02', 0, NULL, 'Lost', 1),
(92, 1, 'item-image/630ffe08-f261-4f57-9c49-9e3ac4eed6df.jpg', 'Hoshi', 'horangi', 'Sports Complex', '2025-05-14', 0, NULL, 'Lost', 1),
(93, 1, 'item-image/32c143f5-9444-41a3-a9bd-838950ad2b22.jpg', 'Dino', 'ichan', 'IT Domain', '2025-06-01', 0, NULL, 'Returned', 1),
(94, 1, 'item-image/0d36f0d3-1582-4b34-96c9-adf3e739fbbe.jpg', 'Vernon', 'I\'m on my worst behavior, how you like me now? Put a muzzle on me, I\'ll spit in your mouth Wake me up from this nightmare, please I\'m scarred and bruised with a black-eyed face', 'Oval', '2025-06-01', 0, NULL, 'Lost', 1),
(95, 1, 'item-image/55230a0d-b318-41ba-bfc9-114fe65f5013.jpg', 'Woozi', 'pink underwear', 'Sports Complex', '2025-05-28', 0, NULL, 'Returned', 1),
(96, 1, 'item-image/400bdd54-5566-4ee7-86fa-fb6d89a09316.jpg', 'Seungkwan', 'hajimalago', 'JRF Building', '2025-05-06', 0, NULL, 'Lost', 1),
(97, 1, 'item-image/5db48b10-7ad8-4ce0-b737-a8de0b9b52bb.jpg', 'DK', 'SALUTEEEEEEEEEEEEE', 'Sentrum', '2025-06-06', 0, NULL, 'Lost', 1),
(98, 1, 'item-image/695cd691-faee-415b-b8de-b2036ec9838f.jpg', 'Jun', 'psycho', 'LRC', '2025-06-01', 0, NULL, 'Lost', 1),
(99, 1, 'item-image/24f20ef3-381d-4619-9ba8-dab596047d67.jpg', 'Joshua', 'sunday morning', 'Mabini Building', '2025-05-31', 0, NULL, 'Lost', 1),
(100, 1, 'item-image/85f80f3c-8bb4-4fe6-9245-2df18afc3dc8.jpg', 'Jeonghan', 'si ganda', 'Chez Rafael', '2025-05-22', 0, NULL, 'Lost', 1),
(101, 1, 'item-image/da126325-077e-4c6b-9e88-5f9156d171f6.jpg', 'Wonwoo', 'wonu wonu wonu wonu', 'Capilla', '2025-04-21', 0, NULL, 'Lost', 1),
(102, 1, 'item-image/c967e500-2824-4499-91b7-9780ae8f9b42.jpg', 'Mingyu', 'biceps grrrr', 'Retreat Complex', '2025-05-15', 0, NULL, 'Lost', 1),
(103, 1, 'item-image/478906434_1796973871061336_1196048458877425365_n.jpg', 'Soobin', 'LoL sweat', 'College Lobby', '2025-05-30', 0, NULL, 'Lost', 1),
(104, 1, 'item-image/477032937_1796973947727995_7822366551452897979_n.jpg', 'Yeonjun', 'soobin? yk soobin yk', 'College Lobby', '2025-06-03', 0, NULL, 'Returned', 1),
(105, 1, 'item-image/479328362_1796973744394682_4488205551926243800_n.jpg', 'Beomgyu', 'bear', 'IT Domain', '2025-05-03', 0, NULL, 'Lost', 1),
(106, 1, 'item-image/478420880_1796973934394663_196605231675931968_n.jpg', 'Taehyun', 'terry!!!!!!!!!!!!!!!!!!!!!!!!!!', 'Sports Complex', '2025-03-12', 0, NULL, 'Returned', 1),
(107, 1, 'item-image/478040058_1796973644394692_7997629872371894240_n.jpg', 'Huening Kai', 'hyuka', 'IT Domain', '2025-06-05', 0, NULL, 'Lost', 1),
(108, 1, 'item-image/download (16).jpg', 'Hoseok', 'sunshine ng lahat', 'Chez Rafael', '2025-06-03', 0, NULL, 'Lost', 1),
(109, 1, 'item-image/RM.jpg', 'Namjoon', '\'di marunong maghiwa ng sibuyas', 'CBEAM Building', '2025-06-04', 0, NULL, 'Lost', 1),
(110, 37, 'item-image/download (11).jpg', 'Yoongi', 'Nan bekkineun geol bekkineun nomeul jabadaga Hubaedeun seonbaedeun jekkineun nom Nompaengideun naega wack ideun fack Ideun yeoksareul badage saegineun nom Tto jaemido eomneun raebpeodeul saieseo Neul namdeulboda deo chaenggineun mok Jallaganeun deoge babgeureut ppaetgil Hyeongdeure shigi jiltu deoge saenggineun soeum', 'Capilla', '2025-06-03', 0, NULL, 'Pending', 0),
(111, 37, 'item-image/download (12).jpg', 'Jimin', 'no jams', 'Jose Diokno Building', '2025-06-02', 0, NULL, 'Pending', 0),
(112, 37, 'item-image/download (13).jpg', 'Seokjin', 'Jin', 'Oval', '2025-05-23', 0, NULL, 'Pending', 0),
(113, 37, 'item-image/download (14).jpg', 'Taehyung', 'bwi', 'Centen Sports Plaza', '2025-06-06', 0, NULL, 'Pending', 0),
(114, 37, 'item-image/download (15).jpg', 'Jungkook', 'he will be doing wHAT TO YOU NIGHT AFTER NIGHT?', 'Capilla', '2025-04-07', 0, NULL, 'Pending', 0),
(115, 37, 'item-image/⋆𓉞˚˖ 𑁍ࠬܓ.jpg', 'Woonhak', 'unagi', 'Sports Complex', '2025-05-23', 0, NULL, 'Pending', 0),
(116, 37, 'item-image/⋆𓉞˚˖ 𑁍ࠬܓ (1).jpg', 'Taesan', 'emo', 'Sports Complex', '2025-05-20', 0, NULL, 'Pending', 0),
(117, 37, 'item-image/☆.jpg', 'Leehan', 'corydoras.', 'Centen Sports Plaza', '2025-05-02', 0, NULL, 'Pending', 0),
(118, 37, 'item-image/⋆𓉞˚˖ 𑁍ࠬܓ (4).jpg', 'Riwoo', 'dance machine', 'CBEAM Building', '2025-05-12', 0, NULL, 'Pending', 0),
(119, 37, 'item-image/⋆𓉞˚˖ 𑁍ࠬܓ (3).jpg', 'Jaehyun', 'manners maketh man', 'IT Domain', '2025-06-04', 0, NULL, 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_index` int(11) NOT NULL,
  `dept_index` int(11) NOT NULL,
  `program_code` varchar(20) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `counselor_index` int(11) DEFAULT NULL COMMENT 'References the assigned counselor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_index`, `dept_index`, `program_code`, `program_name`, `counselor_index`) VALUES
(1, 1, 'BSA', 'Bachelor of Science in Accountancy', NULL),
(2, 1, 'BSAIS', 'Bachelor of Science in Accounting Information Systems', NULL),
(3, 1, 'BSLM', 'Bachelor of Science in Legal Management', NULL),
(4, 1, 'BSE', 'Bachelor of Science in Entrepreneurship', NULL),
(5, 1, 'BSMT', 'Bachelor of Science in Management Technology', NULL),
(6, 1, 'BSBA-FM', 'Bachelor of Science in Business Administration major in Financial Management', NULL),
(7, 1, 'BSBA-MM', 'Bachelor of Science in Business Administration major in Marketing Management', NULL),
(8, 1, 'CE', 'Certificate in Entrepreneurship', NULL),
(9, 2, 'BEED', 'Bachelor of Elementary Education', 1),
(10, 2, 'BSED', 'Bachelor of Secondary Education', NULL),
(11, 2, 'AB COM', 'Bachelor of Arts in Communication', 1),
(12, 2, 'BMMA', 'Bachelor of Multimedia Arts', NULL),
(13, 2, 'BS BIO', 'Bachelor of Science in Biology', NULL),
(14, 2, 'BSFS', 'Bachelor of Science in Forensic Science', NULL),
(15, 2, 'BS MATH', 'Bachelor of Science in Mathematics', NULL),
(16, 2, 'BS PSYCH', 'Bachelor of Science in Psychology', NULL),
(17, 3, 'BSHM', 'Bachelor of Science in Hospitality Management', NULL),
(18, 3, 'BSTM', 'Bachelor of Science in Tourism Management', NULL),
(19, 3, 'CCA', 'Certificate in Culinary Arts', NULL),
(20, 4, 'BS ARCHI', 'Bachelor of Science in Architecture', NULL),
(21, 4, 'BS CpE', 'Bachelor of Science in Computer Engineering', NULL),
(22, 4, 'BSCS', 'Bachelor of Science in Computer Science', NULL),
(23, 4, 'BSEE', 'Bachelor of Science in Electrical Engineering', NULL),
(24, 4, 'BSECE', 'Bachelor of Science in Electronics Engineering', NULL),
(25, 4, 'BSEMC', 'Bachelor of Science in Entertainment and Multimedia Computing', NULL),
(26, 4, 'BSIE', 'Bachelor of Science in Industrial Engineering', NULL),
(27, 4, 'BSIT', 'Bachelor of Science in Information Technology', NULL),
(28, 4, 'ACT', 'Associate in Computer Technology', 1),
(29, 5, 'BSN', 'Bachelor of Science in Nursing', NULL),
(30, 6, 'JD', 'Juris Doctor', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_index` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `program_index` int(11) NOT NULL,
  `year_level` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_index`, `section_name`, `program_index`, `year_level`) VALUES
(1, 'BSA-1A', 1, '1'),
(2, 'BSA-1B', 1, '1'),
(3, 'BSAIS-1A', 2, '1'),
(4, 'BSAIS-1B', 2, '1'),
(5, 'BSLM-1A', 3, '1'),
(6, 'BSLM-1B', 3, '1'),
(7, 'BSE-1A', 4, '1'),
(8, 'BSE-1B', 4, '1'),
(9, 'BSMT-1A', 5, '1'),
(10, 'BSMT-1B', 5, '1'),
(11, 'BSBA-FM-1A', 6, '1'),
(12, 'BSBA-FM-1B', 6, '1'),
(13, 'BSBA-MM-1A', 7, '1'),
(14, 'BSBA-MM-1B', 7, '1'),
(15, 'CE-1A', 8, '1'),
(16, 'CE-1B', 8, '1'),
(17, 'BEED-1A', 9, '1'),
(18, 'BEED-1B', 9, '1'),
(19, 'BSED-1A', 10, '1'),
(20, 'BSED-1B', 10, '1'),
(21, 'ABCOM-1A', 11, '1'),
(22, 'ABCOM-1B', 11, '1'),
(23, 'BMMA-1A', 12, '1'),
(24, 'BMMA-1B', 12, '1'),
(25, 'BSBIO-1A', 13, '1'),
(26, 'BSBIO-1B', 13, '1'),
(27, 'BSFS-1A', 14, '1'),
(28, 'BSFS-1B', 14, '1'),
(29, 'BSMATH-1A', 15, '1'),
(30, 'BSMATH-1B', 15, '1'),
(31, 'BSPSYCH-1A', 16, '1'),
(32, 'BSPSYCH-1B', 16, '1'),
(33, 'BSHM-1A', 17, '1'),
(34, 'BSHM-1B', 17, '1'),
(35, 'BSTM-1A', 18, '1'),
(36, 'BSTM-1B', 18, '1'),
(37, 'CCA-1A', 19, '1'),
(38, 'CCA-1B', 19, '1'),
(39, 'BSARCHI-1A', 20, '1'),
(40, 'BSARCHI-1B', 20, '1'),
(41, 'BSCpE-1A', 21, '1'),
(42, 'BSCpE-1B', 21, '1'),
(43, 'BSCS-1A', 22, '1'),
(44, 'BSCS-1B', 22, '1'),
(45, 'BSEE-1A', 23, '1'),
(46, 'BSEE-1B', 23, '1'),
(47, 'BSECE-1A', 24, '1'),
(48, 'BSECE-1B', 24, '1'),
(49, 'BSEMC-1A', 25, '1'),
(50, 'BSEMC-1B', 25, '1'),
(51, 'BSIE-1A', 26, '1'),
(52, 'BSIE-1B', 26, '1'),
(53, 'BSIT-1A', 27, '1'),
(54, 'BSIT-1B', 27, '1'),
(55, 'ACT-1A', 28, '1'),
(56, 'ACT-1B', 28, '1'),
(57, 'BSN-1A', 29, '1'),
(58, 'BSN-1B', 29, '1'),
(59, 'JD-1A', 30, '1'),
(60, 'JD-1B', 30, '1'),
(61, 'BSA-2A', 1, '2'),
(62, 'BSA-2B', 1, '2'),
(63, 'BSAIS-2A', 2, '2'),
(64, 'BSAIS-2B', 2, '2'),
(65, 'BSLM-2A', 3, '2'),
(66, 'BSLM-2B', 3, '2'),
(67, 'BSE-2A', 4, '2'),
(68, 'BSE-2B', 4, '2'),
(69, 'BSMT-2A', 5, '2'),
(70, 'BSMT-2B', 5, '2'),
(71, 'BSBA-FM-2A', 6, '2'),
(72, 'BSBA-FM-2B', 6, '2'),
(73, 'BSBA-MM-2A', 7, '2'),
(74, 'BSBA-MM-2B', 7, '2'),
(75, 'CE-2A', 8, '2'),
(76, 'CE-2B', 8, '2'),
(77, 'BEED-2A', 9, '2'),
(78, 'BEED-2B', 9, '2'),
(79, 'BSED-2A', 10, '2'),
(80, 'BSED-2B', 10, '2'),
(81, 'ABCOM-2A', 11, '2'),
(82, 'ABCOM-2B', 11, '2'),
(83, 'BMMA-2A', 12, '2'),
(84, 'BMMA-2B', 12, '2'),
(85, 'BSBIO-2A', 13, '2'),
(86, 'BSBIO-2B', 13, '2'),
(87, 'BSFS-2A', 14, '2'),
(88, 'BSFS-2B', 14, '2'),
(89, 'BSMATH-2A', 15, '2'),
(90, 'BSMATH-2B', 15, '2'),
(91, 'BSPSYCH-2A', 16, '2'),
(92, 'BSPSYCH-2B', 16, '2'),
(93, 'BSHM-2A', 17, '2'),
(94, 'BSHM-2B', 17, '2'),
(95, 'BSTM-2A', 18, '2'),
(96, 'BSTM-2B', 18, '2'),
(97, 'CCA-2A', 19, '2'),
(98, 'CCA-2B', 19, '2'),
(99, 'A2A', 20, '2'),
(100, 'A2B', 20, '2'),
(101, 'O2A', 21, '2'),
(102, 'O2B', 21, '2'),
(103, 'C2A', 22, '2'),
(104, 'C2B', 22, '2'),
(105, 'V2A', 23, '2'),
(106, 'V2B', 23, '2'),
(107, 'T2A', 24, '2'),
(108, 'T2B', 24, '2'),
(109, 'EMC2A', 25, '2'),
(110, 'EMC2B', 25, '2'),
(111, 'D2A', 26, '2'),
(112, 'D2B', 26, '2'),
(113, 'IT2A', 27, '2'),
(114, 'IT2B', 27, '2'),
(115, 'I2A', 28, '2'),
(116, 'I2B', 28, '2'),
(117, 'G2A', 29, '2'),
(118, 'G2B', 29, '2'),
(119, 'JD-2A', 30, '2'),
(120, 'JD-2B', 30, '2'),
(121, 'BSA-3A', 1, '3'),
(122, 'BSA-3B', 1, '3'),
(123, 'BSAIS-3A', 2, '3'),
(124, 'BSAIS-3B', 2, '3'),
(125, 'BSLM-3A', 3, '3'),
(126, 'BSLM-3B', 3, '3'),
(127, 'BSE-3A', 4, '3'),
(128, 'BSE-3B', 4, '3'),
(129, 'BSMT-3A', 5, '3'),
(130, 'BSMT-3B', 5, '3'),
(131, 'BSBA-FM-3A', 6, '3'),
(132, 'BSBA-FM-3B', 6, '3'),
(133, 'BSBA-MM-3A', 7, '3'),
(134, 'BSBA-MM-3B', 7, '3'),
(135, 'CE-3A', 8, '3'),
(136, 'CE-3B', 8, '3'),
(137, 'BEED-3A', 9, '3'),
(138, 'BEED-3B', 9, '3'),
(139, 'BSED-3A', 10, '3'),
(140, 'BSED-3B', 10, '3'),
(141, 'ABCOM-3A', 11, '3'),
(142, 'ABCOM-3B', 11, '3'),
(143, 'BMMA-3A', 12, '3'),
(144, 'BMMA-3B', 12, '3'),
(145, 'BSBIO-3A', 13, '3'),
(146, 'BSBIO-3B', 13, '3'),
(147, 'BSFS-3A', 14, '3'),
(148, 'BSFS-3B', 14, '3'),
(149, 'BSMATH-3A', 15, '3'),
(150, 'BSMATH-3B', 15, '3'),
(151, 'BSPSYCH-3A', 16, '3'),
(152, 'BSPSYCH-3B', 16, '3'),
(153, 'BSHM-3A', 17, '3'),
(154, 'BSHM-3B', 17, '3'),
(155, 'BSTM-3A', 18, '3'),
(156, 'BSTM-3B', 18, '3'),
(157, 'CCA-3A', 19, '3'),
(158, 'CCA-3B', 19, '3'),
(159, 'A3A', 20, '3'),
(160, 'A3B', 20, '3'),
(161, 'O3A', 21, '3'),
(162, 'O3B', 21, '3'),
(163, 'C3A', 22, '3'),
(164, 'C3B', 22, '3'),
(165, 'V3A', 23, '3'),
(166, 'V3B', 23, '3'),
(167, 'T3A', 24, '3'),
(168, 'T3B', 24, '3'),
(169, 'EMC3A', 25, '3'),
(170, 'EMC3B', 25, '3'),
(171, 'D3A', 26, '3'),
(172, 'D3B', 26, '3'),
(173, 'IT3A', 27, '3'),
(174, 'IT3B', 27, '3'),
(175, 'I3A', 28, '3'),
(176, 'I3B', 28, '3'),
(177, 'G3A', 29, '3'),
(178, 'G3B', 29, '3'),
(179, 'JD-3A', 30, '3'),
(180, 'JD-3B', 30, '3'),
(181, 'BSA-4A', 1, '4'),
(182, 'BSA-4B', 1, '4'),
(183, 'BSAIS-4A', 2, '4'),
(184, 'BSAIS-4B', 2, '4'),
(185, 'BSLM-4A', 3, '4'),
(186, 'BSLM-4B', 3, '4'),
(187, 'BSE-4A', 4, '4'),
(188, 'BSE-4B', 4, '4'),
(189, 'BSMT-4A', 5, '4'),
(190, 'BSMT-4B', 5, '4'),
(191, 'BSBA-FM-4A', 6, '4'),
(192, 'BSBA-FM-4B', 6, '4'),
(193, 'BSBA-MM-4A', 7, '4'),
(194, 'BSBA-MM-4B', 7, '4'),
(195, 'CE-4A', 8, '4'),
(196, 'CE-4B', 8, '4'),
(197, 'BEED-4A', 9, '4'),
(198, 'BEED-4B', 9, '4'),
(199, 'BSED-4A', 10, '4'),
(200, 'BSED-4B', 10, '4'),
(201, 'ABCOM-4A', 11, '4'),
(202, 'ABCOM-4B', 11, '4'),
(203, 'BMMA-4A', 12, '4'),
(204, 'BMMA-4B', 12, '4'),
(205, 'BSBIO-4A', 13, '4'),
(206, 'BSBIO-4B', 13, '4'),
(207, 'BSFS-4A', 14, '4'),
(208, 'BSFS-4B', 14, '4'),
(209, 'BSMATH-4A', 15, '4'),
(210, 'BSMATH-4B', 15, '4'),
(211, 'BSPSYCH-4A', 16, '4'),
(212, 'BSPSYCH-4B', 16, '4'),
(213, 'BSHM-4A', 17, '4'),
(214, 'BSHM-4B', 17, '4'),
(215, 'BSTM-4A', 18, '4'),
(216, 'BSTM-4B', 18, '4'),
(217, 'CCA-4A', 19, '4'),
(218, 'CCA-4B', 19, '4'),
(219, 'A4A', 20, '4'),
(220, 'A4B', 20, '4'),
(221, 'O4A', 21, '4'),
(222, 'O4B', 21, '4'),
(223, 'C4A', 22, '4'),
(224, 'C4B', 22, '4'),
(225, 'V4A', 23, '4'),
(226, 'V4B', 23, '4'),
(227, 'T4A', 24, '4'),
(228, 'T4B', 24, '4'),
(229, 'EMC4A', 25, '4'),
(230, 'EMC4B', 25, '4'),
(231, 'D4A', 26, '4'),
(232, 'D4B', 26, '4'),
(233, 'IT4A', 27, '4'),
(234, 'IT4B', 27, '4'),
(235, 'I4A', 28, '4'),
(236, 'I4B', 28, '4'),
(237, 'G4A', 29, '4'),
(238, 'G4B', 29, '4'),
(239, 'JD-4A', 30, '4'),
(240, 'JD-4B', 30, '4');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_index` int(11) NOT NULL,
  `user_index` int(11) DEFAULT NULL,
  `image_path` varchar(200) NOT NULL COMMENT 'Profile picture of the student',
  `student_number` varchar(255) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL COMMENT 'phone number of the student',
  `year_level` int(1) NOT NULL,
  `section_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_index`, `user_index`, `image_path`, `student_number`, `last_name`, `first_name`, `contact_number`, `year_level`, `section_index`) VALUES
(1, 2, '', '321421321', 'AGUSTIN', 'JOHN ANDREI', '9832918931', 1, 1),
(2, 3, '', '2023360151', 'ALCANTARA', 'JANNA MIKHAELA', '9457153265', 1, 1),
(3, 4, '', '213214', 'ALONZO', 'ENJEY KASHLEE', '9278558558', 1, 2),
(4, 5, '', '2023363891', 'ALONZO', 'JHENELLE', '9321389210', 1, 2),
(5, 6, '', '2023351801', 'BALION', 'ANGEL AMAYA', '9155167138', 1, 45),
(6, 7, '', '2021310121', 'BARTE', 'ALFONSO RAFAEL', '9953011635', 1, 3),
(7, 8, '', '812180', 'CADELIŇA', 'REGINA ANGELI', '9387882631', 1, 4),
(8, 9, '', '312421', 'CATIBOG', 'DJAN MATTHEW', '9155141440', 1, 4),
(9, 10, '../public/Media/uploads/profile_683bc7cf06a02.jpg', '2023350761', 'DEL ROSARIO', 'RENZ ANDREI', '9321421312', 1, 54),
(10, 11, '', '2023360611', 'DELA PEŇA', 'MARC LAWRENCE', '9395720600', 1, 5),
(11, 12, '', '2023350511', 'DELA VEGA', 'PRINCESS MIHAELA', '9471091401', 1, 6),
(12, 13, '', '2023352471', 'DOCTOLERO', 'LYRUS LEI', '9686269099', 1, 6),
(13, 14, '', '2023359741', 'DONES', 'KYLE GABRIEL', '09954010556', 1, 7),
(14, 15, '', '2023348471', 'ESTRELLA', 'JUAN BENJO', '09771549349', 1, 7),
(15, 16, '', '35152231', 'FEDELICIO', 'LENARD LANCE', '09533599052', 1, 8),
(16, 17, '', '2023362151', 'GARCIA', 'HARRY', '09566224682', 1, 8),
(17, 18, '', '2023362381', 'JAURIGUE', 'IVAN JOSEPH', '9568379291', 1, 9),
(18, 19, '', '2023347681', 'KINCHASAN', 'MARK JEROME', '9667531028', 1, 9),
(19, 20, '', '2023363211', 'LIQUE', 'JERIC', '9219979430', 1, 10),
(20, 21, '', '2023364851', 'LIRIO', 'SEAN CALVIN THEO', '9923142591', 1, 10),
(21, 22, '', '2023362901', 'LIWANAG', 'KATHERINE ANNE', '9617739701', 1, 11),
(22, 23, '', '2023364391', 'MACALINTAL', 'CHESTER BORIZ', '9952071990', 1, 11),
(23, 24, '', '2023352051', 'MACASAET', 'JOHN RAFHAEL STEVEN', '9202784081', 1, 12),
(24, 25, '', '1500017172', 'MAGBUHAT', 'ALEXIE CHYLE', '9984264195', 1, 12),
(25, 26, '', '2023361281', 'MANALO', 'JOHN AARON', '9674326323', 1, 13),
(26, 27, '', '2023351631', 'MANIMTIM', 'IAN KARVEY', '9770494572', 1, 13),
(27, 28, '', '2023350751', 'MARQUINEZ', 'ISIAH JOSEPH', '9473450276', 1, 14),
(28, 29, '', '5124214', 'MEER', 'SEBASTIAN ANGELO', '9321984921', 1, 14),
(29, 30, '', '2023365041', 'MENDEZ', 'WYETH IRISH', '9302193221', 1, 15),
(30, 31, '', '811870', 'NARIO', 'JAN ERNEST PACEY', '9552861753', 1, 15),
(31, 32, '', '2023362191', 'NARIO', 'KEITH JUSTIN', '9774696570', 1, 16),
(32, 33, '', '1700020669', 'PANUELA', 'MICHAEL JOSH', '9566322071', 1, 16),
(33, 34, '', '2023362341', 'PARAY', 'JANE ALLYSON', '9293410108', 1, 17),
(34, 35, '', '2023358411', 'SAHAGUN', 'DANIEL LUIS', '9298657375', 1, 17),
(35, 36, '', '2023364651', 'SIMAN', 'THOMAS ALEXANDRE', '9760811239', 1, 18),
(36, 37, '../public/Media/uploads/profile_684286c236eae.jpg', '2023359771', 'TALENS', 'XYRELLE DOMINIQUE', '9605365864', 1, 18),
(37, 38, '', '2023352411', 'TENORIO', 'JHON PAULO', '9912217223', 1, 19),
(38, 39, '', '1700019578', 'TORRES', 'KYAN PRINCE', '9561998634', 1, 19),
(39, NULL, '', '2021234567', 'SEUNGCHEOL', 'CHOI', '09123456789', 1, 20),
(40, NULL, '', '2022345678', 'JEONGHAN', 'YOON', '09234567890', 1, 20),
(41, NULL, '', '2023456789', 'JOSHUA', 'HONG', '09345678901', 1, 21),
(42, NULL, '', '2024567890', 'JUN', 'WEN', '09456789012', 1, 21),
(43, NULL, '', '2025678901', 'HOSHI', 'KWON', '09567890123', 1, 22),
(44, NULL, '', '2026789012', 'WONWOO', 'JEON', '09678901234', 1, 22),
(45, NULL, '', '2027890123', 'WOOZI', 'LEE', '09789012345', 1, 23),
(46, NULL, '', '2028901234', 'DOKYEOM', 'LEE', '09890123456', 1, 23),
(47, NULL, '', '2029012345', 'MINGYU', 'KIM', '09901234567', 1, 24),
(48, NULL, '', '2020123456', 'MINGHAO', 'XU', '09123456780', 1, 24),
(49, NULL, '', '2021357924', 'SEUNGKWAN', 'BOO', '09234567891', 1, 25),
(50, NULL, '', '2022468135', 'VERNON', 'CHWE', '09345678902', 1, 25),
(51, NULL, '', '2023579246', 'DINO', 'LEE', '09456789013', 1, 26),
(52, NULL, '', '2024681357', 'NAM', 'YEJUN', '09123456789', 1, 26),
(53, NULL, '', '2025792468', 'YU', 'HAMIN', '09234567890', 1, 27),
(54, NULL, '', '2026803579', 'CHAE', 'BONGGU', '09345678901', 1, 27),
(55, NULL, '', '2027914680', 'DO', 'EUNHO', '09456789012', 1, 28),
(56, NULL, '', '2028025791', 'HAN', 'NOAH', '09567890123', 1, 28),
(57, NULL, '', '2029136802', 'NAYEON', 'CHAE', '09678901234', 1, 29),
(58, NULL, '', '2020247913', 'JIHYO', 'JUNG', '09789012345', 1, 29),
(59, NULL, '', '2021368024', 'MOMO', 'IM', '09890123456', 1, 30),
(60, NULL, '', '2022479135', 'DAHYUN', 'KIM', '09901234567', 1, 30),
(61, NULL, '', '2023590246', 'CHAEYOUNG', 'KIM', '09123456780', 1, 31),
(62, NULL, '', '2024601357', 'TZUYU', 'CHU', '09234567891', 1, 31),
(63, NULL, '', '2025712468', 'MINA', 'KIM', '09345678902', 1, 32),
(64, NULL, '', '2026823579', 'JEONGYEON', 'KIM', '09456789013', 1, 32),
(65, NULL, '', '2027934680', 'JISOO', 'KIM', '09567890124', 1, 33),
(66, NULL, '', '2028045791', 'JENNIE', 'HAN', '09678901235', 1, 33),
(67, NULL, '', '2029156802', 'ROSÉ', 'PARK', '09789012346', 1, 34),
(68, NULL, '', '2020267913', 'LISA', 'MANOBAN', '09890123457', 1, 34),
(69, NULL, '', '2021378024', 'RM', 'KIM', '09901234568', 1, 35),
(70, NULL, '', '2022489135', 'JIN', 'GUZMAN', '09123456781', 1, 35),
(71, NULL, '', '2023500246', 'SUGA', 'MIN', '09234567892', 1, 36),
(72, NULL, '', '2024611357', 'J-HOPE', 'CHOI', '09345678903', 1, 36),
(73, NULL, '', '2025722468', 'PO', 'HO-SEOK', '09456789014', 1, 37),
(74, NULL, '', '2026833579', 'JUNGKOOK', 'KIM', '09567890125', 1, 37),
(75, NULL, '', '2027944680', 'SOOBIN', 'HWANG', '09678901236', 1, 38),
(76, NULL, '', '2028055791', 'BEOMGYU', 'LEE', '09789012347', 1, 38),
(77, NULL, '', '2029166802', 'YEONJUN', 'SEOL', '09890123458', 1, 39),
(78, NULL, '', '2020277913', 'KAI', 'HUENING', '09901234569', 1, 39),
(79, NULL, '', '2021388024', 'TAEHYUN', 'KIM', '09123456782', 1, 40),
(80, NULL, '', '2022499135', 'JAEHYUN', 'MYUNG', '09234567893', 1, 40),
(81, NULL, '', '2023510246', 'DONGHYUN', 'LEE', '09345678904', 1, 41),
(82, NULL, '', '2024621357', 'RIWOO', 'LEE', '09456789015', 1, 41),
(83, NULL, '', '2025732468', 'KIM CHAEWON', 'KIM', '09567890126', 1, 42),
(84, NULL, '', '2026843579', 'YUQI', 'ZHANG', '09678901237', 1, 42),
(85, NULL, '', '2027954680', 'SERGI', 'HAN', '09789012348', 1, 43),
(86, NULL, '', '2028065791', 'XIAOXUAN', 'LI', '09890123459', 1, 43),
(87, NULL, '', '2029176802', 'YOUNG K', 'KANG', '09901234570', 1, 44),
(88, NULL, '', '2020287913', 'CHANGBIN', 'LEE', '09123456783', 1, 44),
(89, NULL, '', '2021398024', 'JAE', 'HYUN', '09234567894', 1, 45),
(90, NULL, '', '2022509135', 'YOUNG KWON', 'LEE', '09345678905', 1, 45),
(91, NULL, '', '2023620246', 'SUNGJAE', 'LEE', '09456789016', 1, 46),
(92, NULL, '', '2024731357', 'GDRAGON', 'KWON', '09567890127', 1, 46),
(93, NULL, '', '2025842468', 'TAEYANG', 'YANG', '09678901238', 1, 47),
(94, NULL, '', '2026953579', 'TOP', 'SEUNGYOON', '09789012349', 1, 47),
(95, NULL, '', '2027064680', 'DAESUNG', 'KIM', '09890123460', 1, 48),
(96, NULL, '', '2028175791', 'HEESEUNG', 'PARK', '09901234571', 1, 48),
(97, NULL, '', '2029286802', 'NIKI', 'KIM', '09123456784', 1, 49),
(98, NULL, '', '2020397913', 'JAY', 'PARK', '09234567895', 1, 49),
(99, NULL, '', '2021408024', 'JUNGWON', 'JI', '09345678906', 1, 50),
(100, NULL, '', '2022519135', 'EUIJIN', 'KIM', '09456789017', 1, 50),
(101, NULL, '', '2023630246', 'SUNGHOON', 'JUNG', '09567890128', 1, 51),
(102, NULL, '', '2024741357', 'TAEYONG', 'LEE', '09678901239', 1, 51),
(103, NULL, '', '2025852468', 'JAEHYUN', 'JUNG', '09789012350', 1, 52),
(104, NULL, '', '2026963579', 'MARK', 'TUAN', '09890123461', 1, 52),
(105, NULL, '', '2027074680', 'WINWIN', 'LEE', '09901234572', 1, 53),
(106, NULL, '', '2028185791', 'JOHNNY', 'JUNG', '09123456785', 1, 53),
(107, NULL, '', '2029296802', 'BAEKHYUN', 'OH', '09234567896', 1, 54),
(108, NULL, '', '2020407913', 'SUHO', 'KIM', '09345678907', 1, 54),
(109, NULL, '', '2021418024', 'LAY', 'ZHENHUA', '09456789018', 1, 55),
(110, NULL, '', '2022529135', 'CHEN', 'XINGTAO', '09567890129', 1, 55),
(111, NULL, '', '2023640246', 'DO', 'KYUNGSOO', '09678901240', 1, 56),
(112, NULL, '', '2024751357', 'HYEIN', 'LEE', '09789012351', 1, 56),
(113, NULL, '', '2025862468', 'MINJI', 'KIM', '09890123462', 1, 57),
(114, NULL, '', '2026973579', 'HAERIN', 'KIM', '09901234573', 1, 57),
(115, NULL, '', '2027084680', 'DANBI', 'LEE', '09123456786', 1, 58),
(116, NULL, '', '2028195791', 'RENNA', 'KIM', '09234567897', 1, 58),
(117, NULL, '', '2029306802', 'SOPHIA', 'GRACE', '09345678908', 1, 59),
(118, NULL, '', '2023355555', 'LARA', 'RAJAGOPALAN', '09456789019', 1, 59),
(119, NULL, '', '2025123456', 'SEO', 'JOON', '09123456789', 1, 60),
(120, NULL, '', '2025234567', 'KIM', 'JAEHYUN', '09234567890', 1, 60),
(121, NULL, '', '2025345678', 'LEE', 'SEUNGCHAN', '09345678901', 2, 61),
(122, NULL, '', '2025456789', 'SONG', 'MINHO', '09456789012', 2, 61),
(123, NULL, '', '2025567890', 'PARK', 'SUNGWOON', '09567890123', 2, 62),
(124, NULL, '', '2025678901', 'CHOI', 'YONGSEOK', '09678901234', 2, 62),
(125, NULL, '', '2025789012', 'HAN', 'JIWOO', '09789012345', 2, 63),
(126, NULL, '', '2025890123', 'JEONG', 'JINWOO', '09890123456', 2, 63),
(127, NULL, '', '2025901234', 'HWANG', 'YOONJAE', '09901234567', 2, 64),
(128, NULL, '', '2026012345', 'KIM', 'JUNGHAN', '09123456789', 2, 64),
(129, NULL, '', '2026123456', 'YU', 'YEONJUN', '09234567890', 2, 65),
(130, NULL, '', '2026234567', 'CHAE', 'BORA', '09345678901', 2, 65),
(131, NULL, '', '2026345678', 'OH', 'HAZEL', '09456789012', 2, 66),
(132, NULL, '', '2026456789', 'SON', 'SOOJIN', '09567890123', 2, 66),
(133, NULL, '', '2026567890', 'KIM', 'HAYOON', '09678901234', 2, 67),
(134, NULL, '', '2026678901', 'YU', 'SUHYEON', '09789012345', 2, 67),
(135, NULL, '', '2026789012', 'LEE', 'HYUNJIN', '09890123456', 2, 68),
(136, NULL, '', '2026890123', 'PARK', 'SIHEON', '09901234567', 2, 68),
(137, NULL, '', '2026901234', 'CHOI', 'HAEUN', '09123456789', 2, 69),
(138, NULL, '', '2027012345', 'JANG', 'YERIN', '09234567890', 2, 69),
(139, NULL, '', '2027123456', 'KIM', 'HYUNWOO', '09345678901', 2, 70),
(140, NULL, '', '2027234567', 'SONG', 'HAECHAN', '09456789012', 2, 70),
(141, NULL, '', '2027345678', 'LEE', 'CHANYEONG', '09567890123', 2, 71),
(142, NULL, '', '2027456789', 'KIM', 'DAMI', '09678901234', 2, 71),
(143, NULL, '', '2027567890', 'PARK', 'MINJUN', '09789012345', 2, 72),
(144, NULL, '', '2027678901', 'CHOI', 'YOSEOP', '09890123456', 2, 72),
(145, NULL, '', '2027789012', 'KIM', 'GYUJIN', '09901234567', 2, 73),
(146, NULL, '', '2027890123', 'LEE', 'JUNHO', '09123456789', 2, 73),
(147, NULL, '', '2027901234', 'PARK', 'SEOHAM', '09234567890', 2, 74),
(148, NULL, '', '2028012345', 'SONG', 'YOONAH', '09345678901', 2, 74),
(149, NULL, '', '2028123456', 'KIM', 'SOOJIN', '09456789012', 2, 75),
(150, NULL, '', '2028234567', 'LEE', 'SOOJIN', '09567890123', 2, 75),
(151, NULL, '', '2028345678', 'CHOI', 'SOOJIN', '09678901234', 2, 76),
(152, NULL, '', '2028456789', 'PARK', 'SOOJIN', '09789012345', 2, 76),
(153, NULL, '', '2028567890', 'KIM', 'YERIN', '09890123456', 2, 77),
(154, NULL, '', '2028678901', 'SONG', 'YERIN', '09901234567', 2, 77),
(155, NULL, '', '2028789012', 'LEE', 'YERIN', '09123456789', 2, 78),
(156, NULL, '', '2028890123', 'CHOI', 'YERIN', '09234567890', 2, 78),
(157, NULL, '', '2028901234', 'PARK', 'YERIN', '09345678901', 2, 79),
(158, NULL, '', '2029012345', 'KIM', 'DAHYUN', '09456789012', 2, 79),
(159, NULL, '', '2029123456', 'SONG', 'DAHYUN', '09567890123', 2, 80),
(160, NULL, '', '2029234567', 'LEE', 'DAHYUN', '09678901234', 2, 80),
(161, NULL, '', '2029345678', 'CHOI', 'DAHYUN', '09789012345', 2, 81),
(162, NULL, '', '2029456789', 'PARK', 'DAHYUN', '09890123456', 2, 81),
(163, NULL, '', '2029567890', 'KIM', 'SOOMIN', '09901234567', 2, 82),
(164, NULL, '', '2029678901', 'SONG', 'SOOMIN', '09123456789', 2, 82),
(165, NULL, '', '2029789012', 'LEE', 'SOOMIN', '09234567890', 2, 83),
(166, NULL, '', '2029890123', 'CHOI', 'SOOMIN', '09345678901', 2, 83),
(167, NULL, '', '2029901234', 'PARK', 'SOOMIN', '09456789012', 2, 84),
(168, NULL, '', '2020012345', 'KIM', 'YOUNGMIN', '09567890123', 2, 84),
(169, NULL, '', '2020123456', 'SONG', 'YOUNGMIN', '09678901234', 2, 85),
(170, NULL, '', '2020234567', 'LEE', 'YOUNGMIN', '09789012345', 2, 85),
(171, NULL, '', '2020345678', 'CHOI', 'YOUNGMIN', '09890123456', 2, 86),
(172, NULL, '', '2020456789', 'PARK', 'YOUNGMIN', '09901234567', 2, 86),
(173, NULL, '', '2020567890', 'KIM', 'KYUNGSOO', '09123456789', 2, 87),
(174, NULL, '', '2020678901', 'SONG', 'KYUNGSOO', '09234567890', 2, 87),
(175, NULL, '', '2020789012', 'LEE', 'KYUNGSOO', '09345678901', 2, 88),
(176, NULL, '', '2020890123', 'CHOI', 'KYUNGSOO', '09456789012', 2, 88),
(177, NULL, '', '2020901234', 'PARK', 'KYUNGSOO', '09567890123', 2, 89),
(178, NULL, '', '2021012345', 'KIM', 'MINGYU', '09678901234', 2, 89),
(179, NULL, '', '2021123456', 'SONG', 'MINGYU', '09789012345', 2, 90),
(180, NULL, '', '2021234567', 'LEE', 'MINGYU', '09890123456', 2, 90),
(181, NULL, '', '2021345678', 'CHOI', 'MINGYU', '09901234567', 2, 91),
(182, NULL, '', '2021456789', 'PARK', 'MINGYU', '09123456789', 2, 91),
(183, NULL, '', '2021567890', 'KIM', 'SEUNGMIN', '09234567890', 2, 92),
(184, NULL, '', '2021678901', 'SONG', 'SEUNGMIN', '09345678901', 2, 92),
(185, NULL, '', '2021789012', 'LEE', 'SEUNGMIN', '09456789012', 2, 93),
(186, NULL, '', '2021890123', 'CHOI', 'SEUNGMIN', '09567890123', 2, 93),
(187, NULL, '', '2021901234', 'PARK', 'SEUNGMIN', '09678901234', 2, 94),
(188, NULL, '', '2022012345', 'KIM', 'SOOJIN', '09789012345', 2, 94),
(189, NULL, '', '2022123456', 'SONG', 'SOOJIN', '09890123456', 2, 95),
(190, NULL, '', '2022234567', 'LEE', 'SOOJIN', '09901234567', 2, 95),
(191, NULL, '', '2022345678', 'CHOI', 'SOOJIN', '09123456789', 2, 96),
(192, NULL, '', '2022456789', 'PARK', 'SOOJIN', '09234567890', 2, 96),
(193, NULL, '', '2022567890', 'KIM', 'SOOJIN', '09345678901', 2, 97),
(194, NULL, '', '2022678901', 'SONG', 'SOOJIN', '09456789012', 2, 97),
(195, NULL, '', '2022789012', 'SMITH', 'JOHN', '09567890123', 2, 98),
(196, NULL, '', '2022890123', 'JOHNSON', 'EMILY', '09678901234', 2, 98),
(197, NULL, '', '2022901234', 'WILLIAMS', 'MICHAEL', '09789012345', 2, 99),
(198, NULL, '', '2023012345', 'BROWN', 'JESSICA', '09890123456', 2, 99),
(199, NULL, '', '2023123456', 'JONES', 'WILLIAM', '09901234567', 2, 100),
(200, NULL, '', '2023234567', 'GARCIA', 'OLIVIA', '09123456789', 2, 100),
(201, NULL, '', '2023345678', 'MILLER', 'DAVID', '09234567890', 2, 101),
(202, NULL, '', '2023456789', 'DAVIS', 'SOPHIA', '09345678901', 2, 101),
(203, NULL, '', '2023567890', 'RODRIQUEZ', 'MATTHEW', '09456789012', 2, 102),
(204, NULL, '', '2023678901', 'MARTINEZ', 'ISABELLA', '09567890123', 2, 102),
(205, NULL, '', '2023789012', 'ANDERSON', 'JAMES', '09678901234', 2, 103),
(206, NULL, '', '2023890123', 'THOMAS', 'LUCAS', '09789012345', 2, 103),
(207, NULL, '', '2023901234', 'TAYLOR', 'CHARLES', '09890123456', 2, 104),
(208, NULL, '', '2024012345', 'MOORE', 'THOMAS', '09901234567', 2, 104),
(209, NULL, '', '2024123456', 'WHITE', 'JOSEPH', '09123456789', 2, 105),
(210, NULL, '', '2024234567', 'HARRIS', 'ALEXANDER', '09234567890', 2, 105),
(211, NULL, '', '2024345678', 'CLARK', 'BENJAMIN', '09345678901', 2, 106),
(212, NULL, '', '2024456789', 'LEWIS', 'DANIEL', '09456789012', 2, 106),
(213, NULL, '', '2024567890', 'ROBINSON', 'ETHAN', '09567890123', 2, 107),
(214, NULL, '', '2024678901', 'WALKER', 'JACOB', '09678901234', 2, 107),
(215, NULL, '', '2024789012', 'ALLEN', 'ANTHONY', '09789012345', 2, 108),
(216, NULL, '', '2024890123', 'KING', 'FREDERICK', '09890123456', 2, 108),
(217, NULL, '', '2024901234', 'SCOTT', 'GEORGE', '09901234567', 2, 109),
(218, NULL, '', '2025012345', 'ADAMS', 'JORDAN', '09123456789', 2, 109),
(219, NULL, '', '2025123456', 'BAKER', 'NATHAN', '09234567890', 2, 110),
(220, NULL, '', '2025234567', 'GARDNER', 'RILEY', '09345678901', 2, 110),
(221, NULL, '', '2025345678', 'EVANS', 'NOAH', '09456789012', 2, 111),
(222, NULL, '', '2025456789', 'HALL', 'LIAM', '09567890123', 2, 111),
(223, NULL, '', '2025567890', 'COOPER', 'JASON', '09678901234', 2, 112),
(224, NULL, '', '2025678901', 'REED', 'BRANDON', '09789012345', 2, 112),
(225, NULL, '', '2025789012', 'MITCHELL', 'JUSTIN', '09890123456', 2, 113),
(226, NULL, '', '2025890123', 'PETERSON', 'CAMERON', '09901234567', 2, 113),
(227, NULL, '', '2025901234', 'GRANT', 'BRADLEY', '09123456789', 2, 114),
(228, NULL, '', '2026012345', 'HUNTER', 'MATTHEW', '09234567890', 2, 114),
(229, NULL, '', '2026123456', 'STEWART', 'CALEB', '09345678901', 2, 115),
(230, NULL, '', '2026234567', 'PORTER', 'JACKSON', '09456789012', 2, 115),
(231, NULL, '', '2026345678', 'FOSTER', 'LOGAN', '09567890123', 2, 116),
(232, NULL, '', '2026456789', 'GRAY', 'OWEN', '09678901234', 2, 116),
(233, NULL, '', '2026567890', 'HAYES', 'AARON', '09789012345', 2, 117),
(234, NULL, '', '2026678901', 'FLETCHER', 'ERIC', '09890123456', 2, 117),
(235, NULL, '', '2026789012', 'LYMAN', 'JUAN', '09901234567', 2, 118),
(236, NULL, '', '2026890123', 'WEBB', 'JULIAN', '09123456789', 2, 118),
(237, NULL, '', '2026901234', 'CARPENTER', 'ADRIAN', '09234567890', 2, 119),
(238, NULL, '', '2027012345', 'COLE', 'GABRIEL', '09345678901', 2, 119),
(239, NULL, '', '2027123456', 'FIELDS', 'BRADLEY', '09456789012', 2, 120),
(240, NULL, '', '2027234567', 'HAWKINS', 'MAXWELL', '09567890123', 2, 120),
(241, NULL, '', '2027345678', 'BUTLER', 'HENRY', '09678901234', 3, 121),
(242, NULL, '', '2027456789', 'FISHER', 'SIMON', '09789012345', 3, 121),
(243, NULL, '', '2027567890', 'BROOKS', 'SEBASTIAN', '09890123456', 3, 122),
(244, NULL, '', '2027678901', 'BARNES', 'JAYDEN', '09901234567', 3, 122),
(245, NULL, '', '2027789012', 'HENDRICKS', 'NICHOLAS', '09123456789', 3, 123),
(246, NULL, '', '2027890123', 'HENDERSON', 'SAMUEL', '09234567890', 3, 123),
(247, NULL, '', '2027901234', 'HAYNES', 'JEREMY', '09345678901', 3, 124),
(248, NULL, '', '2028012345', 'HUNT', 'ADAM', '09456789012', 3, 124),
(249, NULL, '', '2028123456', 'HODGES', 'JONATHAN', '09567890123', 3, 125),
(250, NULL, '', '2028234567', 'HOWARD', 'ISAIAH', '09678901234', 3, 125),
(251, NULL, '', '2028901234', 'GIBSON', 'NATHANIEL', '09789012345', 3, 126),
(252, NULL, '', '2029012345', 'REED', 'BENJAMIN', '09890123456', 3, 126),
(253, NULL, '', '2029123456', 'MORRIS', 'DANNY', '09901234567', 3, 127),
(254, NULL, '', '2029234567', 'COLEMAN', 'VINCENT', '09123456789', 3, 127),
(255, NULL, '', '2029345678', 'WELLS', 'ALAN', '09234567890', 3, 128),
(256, NULL, '', '2029456789', 'FORD', 'TANNER', '09345678901', 3, 128),
(257, NULL, '', '2029567890', 'DEAN', 'AIDEN', '09456789012', 3, 129),
(258, NULL, '', '2029678901', 'WARD', 'KAYDEN', '09567890123', 3, 129),
(259, NULL, '', '2029789012', 'WEBSTER', 'CARTER', '09678901234', 3, 130),
(260, NULL, '', '2029890123', 'PATTERSON', 'LANDON', '09789012345', 3, 130),
(261, NULL, '', '2029901234', 'GRAYSON', 'COLIN', '09890123456', 3, 131),
(262, NULL, '', '2020012345', 'RAMSEY', 'LANDON', '09901234567', 3, 131),
(263, NULL, '', '2020123456', 'SHELTON', 'GAVIN', '09123456789', 3, 132),
(264, NULL, '', '2020234567', 'BROOKS', 'SOOJIN', '09234567890', 3, 132),
(265, NULL, '', '2020345678', 'BARNETT', 'JASPER', '09345678901', 3, 133),
(266, NULL, '', '2020456789', 'CARSON', 'BRAXTON', '09456789012', 3, 133),
(267, NULL, '', '2020567890', 'LLOYD', 'XAVIER', '09567890123', 3, 134),
(268, NULL, '', '2020678901', 'MCKINNEY', 'GIDEON', '09678901234', 3, 134),
(269, NULL, '', '2020789012', 'JOYCE', 'JASPER', '09789012345', 3, 135),
(270, NULL, '', '2020890123', 'HARVEY', 'BECKETT', '09890123456', 3, 135),
(271, NULL, '', '2020901234', 'BUTLER', 'MILES', '09901234567', 3, 136),
(272, NULL, '', '2021012345', 'FLETCHER', 'ANDREW', '09123456789', 3, 136),
(273, NULL, '', '2021123456', 'ELLIS', 'JACOB', '09234567890', 3, 137),
(274, NULL, '', '2021234567', 'HARRISON', 'DUSTIN', '09345678901', 3, 137),
(275, NULL, '', '2021345678', 'LYONS', 'MATTHEW', '09456789012', 3, 138),
(276, NULL, '', '2021456789', 'BRODERICK', 'LIAM', '09567890123', 3, 138),
(277, NULL, '', '2021567890', 'WATSON', 'NOAH', '09678901234', 3, 139),
(278, NULL, '', '2021678901', 'BOWMAN', 'ETHAN', '09789012345', 3, 139),
(279, NULL, '', '2021789012', 'DAWSON', 'LUKE', '09890123456', 3, 140),
(280, NULL, '', '2021890123', 'STANTON', 'JORDAN', '09901234567', 3, 140),
(281, NULL, '', '2021901234', 'SHERMAN', 'ALEX', '09123456789', 3, 141),
(282, NULL, '', '2022012345', 'GARDNER', 'RILEY', '09234567890', 3, 141),
(283, NULL, '', '2022123456', 'EVANS', 'NOAH', '09345678901', 3, 142),
(284, NULL, '', '2022234567', 'HALL', 'LIAM', '09456789012', 3, 142),
(285, NULL, '', '2022345678', 'COOPER', 'JASON', '09567890123', 3, 143),
(286, NULL, '', '2022456789', 'REED', 'BRANDON', '09678901234', 3, 143),
(287, NULL, '', '2022567890', 'MITCHELL', 'JUSTIN', '09789012345', 3, 144),
(288, NULL, '', '2022678901', 'PETERSON', 'CAMERON', '09890123456', 3, 144),
(289, NULL, '', '2022789012', 'GRANT', 'BRADLEY', '09901234567', 3, 145),
(290, NULL, '', '2022890123', 'HUNTER', 'MATTHEW', '09123456789', 3, 145),
(291, NULL, '', '2022901234', 'STEWART', 'CALEB', '09234567890', 3, 146),
(292, NULL, '', '2023012345', 'PORTER', 'JACKSON', '09345678901', 3, 146),
(293, NULL, '', '2023123456', 'FOSTER', 'LOGAN', '09456789012', 3, 147),
(294, NULL, '', '2023234567', 'GRAY', 'OWEN', '09567890123', 3, 147),
(295, NULL, '', '2023345678', 'FIELDS', 'BRADLEY', '09678901234', 3, 148),
(296, NULL, '', '2023456789', 'HAWKINS', 'MAXWELL', '09789012345', 3, 148),
(297, NULL, '', '2023567890', 'CARPENTER', 'SEBASTIAN', '09890123456', 3, 149),
(298, NULL, '', '2023678901', 'COLE', 'GABRIEL', '09901234567', 3, 149),
(299, NULL, '', '2023789012', 'BUTLER', 'HENRY', '09123456789', 3, 150),
(300, NULL, '', '2023890123', 'FLETCHER', 'SIMON', '09234567890', 3, 150),
(301, NULL, '', '2023901234', 'WEBSTER', 'FRANKLIN', '09345678901', 3, 151),
(302, NULL, '', '2024012345', 'PATTERSON', 'JULIAN', '09456789012', 3, 151),
(303, NULL, '', '2024123456', 'GRAYSON', 'NATHAN', '09567890123', 3, 152),
(304, NULL, '', '2024234567', 'RAMSEY', 'RILEY', '09678901234', 3, 152),
(305, NULL, '', '2024345678', 'SHELTON', 'NICHOLAS', '09789012345', 3, 153),
(306, NULL, '', '2024456789', 'BROOKS', 'KENNETH', '09890123456', 3, 153),
(307, NULL, '', '2024567890', 'BARNES', 'MARCUS', '09901234567', 3, 154),
(308, NULL, '', '2024678901', 'HENDRICKS', 'MALCOLM', '09123456789', 3, 154),
(309, NULL, '', '2024789012', 'HENDERSON', 'MADDEN', '09234567890', 3, 155),
(310, NULL, '', '2024890123', 'HAYNES', 'MARSHALL', '09345678901', 3, 155),
(311, NULL, '', '2024901234', 'HUNT', 'MICHAEL', '09456789012', 3, 156),
(312, NULL, '', '2025012345', 'HODGES', 'WILLIAM', '09567890123', 3, 156),
(313, NULL, '', '2025123456', 'ANDERSON', 'JAMES', '09678901234', 3, 157),
(314, NULL, '', '2025234567', 'THOMAS', 'CHARLES', '09789012345', 3, 157),
(315, NULL, '', '2025345678', 'TAYLOR', 'THOMAS', '09890123456', 3, 158),
(316, NULL, '', '2025456789', 'MOORE', 'ANTHONY', '09901234567', 3, 158),
(317, NULL, '', '2025567890', 'WHITE', 'JUAN', '09123456789', 3, 159),
(318, NULL, '', '2025678901', 'HARRIS', 'JULIAN', '09234567890', 3, 159),
(319, NULL, '', '2025789012', 'CLARK', 'ADRIAN', '09345678901', 3, 160),
(320, NULL, '', '2025890123', 'LEWIS', 'ERIC', '09456789012', 3, 160),
(321, NULL, '', '2025901234', 'ROBINSON', 'AARON', '09567890123', 3, 161),
(322, NULL, '', '2026012345', 'WALKER', 'RICHARD', '09678901234', 3, 161),
(323, NULL, '', '2026123456', 'ALLEN', 'STEPHEN', '09789012345', 3, 162),
(324, NULL, '', '2026234567', 'KING', 'JEREMIAH', '09890123456', 3, 162),
(325, NULL, '', '2026345678', 'SCOTT', 'JEROME', '09901234567', 3, 163),
(326, NULL, '', '2026456789', 'ADAMS', 'CASEY', '09123456789', 3, 163),
(327, NULL, '', '2026567890', 'BAKER', 'GREGORY', '09234567890', 3, 164),
(328, NULL, '', '2026678901', 'GARDNER', 'FELIX', '09345678901', 3, 164),
(329, NULL, '', '2026789012', 'EVANS', 'THEODORE', '09456789012', 3, 165),
(330, NULL, '', '2026890123', 'HALL', 'GABRIEL', '09567890123', 3, 165),
(331, NULL, '', '2026901234', 'COOPER', 'DOMINIC', '09678901234', 3, 166),
(332, NULL, '', '2027012345', 'REED', 'JORDAN', '09789012345', 3, 166),
(333, NULL, '', '2027123456', 'MITCHELL', 'JUAN', '09890123456', 3, 167),
(334, NULL, '', '2027234567', 'PETERSON', 'DARIUS', '09901234567', 3, 167),
(335, NULL, '', '2027345678', 'GRANT', 'BRODY', '09123456789', 3, 168),
(336, NULL, '', '2027456789', 'HUNTER', 'JOSIAH', '09234567890', 3, 168),
(337, NULL, '', '2027567890', 'STEWART', 'JASPER', '09345678901', 3, 169),
(338, NULL, '', '2027678901', 'PORTER', 'QUINCY', '09456789012', 3, 169),
(339, NULL, '', '2027789012', 'FOSTER', 'JOSHUA', '09567890123', 3, 170),
(340, NULL, '', '2027890123', 'GRAY', 'NATHANIEL', '09678901234', 3, 170),
(341, NULL, '', '2027901234', 'FIELDS', 'MATTHEW', '09789012345', 3, 171),
(342, NULL, '', '2028012345', 'HAYES', 'LIAM', '09890123456', 3, 171),
(343, NULL, '', '2028123456', 'FLETCHER', 'OWEN', '09901234567', 3, 172),
(344, NULL, '', '2028234567', 'LYMAN', 'MAXWELL', '09123456789', 3, 172),
(345, NULL, '', '2028345678', 'WEBB', 'JULIAN', '09234567890', 3, 173),
(346, NULL, '', '2028456789', 'CARPENTER', 'GABE', '09345678901', 3, 173),
(347, NULL, '', '2028567890', 'COLE', 'MARCUS', '09456789012', 3, 174),
(348, NULL, '', '2028678901', 'FIELDS', 'BENJAMIN', '09567890123', 3, 174),
(349, NULL, '', '2028789012', 'LYONS', 'CALEB', '09678901234', 3, 175),
(350, NULL, '', '2028890123', 'BRODERICK', 'DANNY', '09789012345', 3, 175),
(351, NULL, '', '2028901234', 'WELLS', 'VINCENT', '09890123456', 3, 176),
(352, NULL, '', '2029012345', 'WARD', 'GIDEON', '09901234567', 3, 176),
(353, NULL, '', '2029123456', 'WEBSTER', 'ISAIAH', '09123456789', 3, 177),
(354, NULL, '', '2029234567', 'PATTERSON', 'NATHAN', '09234567890', 3, 177),
(355, NULL, '', '2029345678', 'GRAYSON', 'SIMON', '09345678901', 3, 178),
(356, NULL, '', '2029456789', 'RAMSEY', 'CARTER', '09456789012', 3, 178),
(357, NULL, '', '2029567890', 'SHELTON', 'LANDON', '09567890123', 3, 179),
(358, NULL, '', '2029678901', 'BROOKS', 'BECKETT', '09678901234', 3, 179),
(359, NULL, '', '2029789012', 'BARNETT', 'JASPER', '09789012345', 3, 180),
(360, NULL, '', '2029890123', 'CARSON', 'BRAXTON', '09890123456', 3, 180),
(361, NULL, '', '2029901234', 'LLOYD', 'XAVIER', '09901234567', 4, 181),
(362, NULL, '', '2020012345', 'MCKINNEY', 'GIDEON', '09123456789', 4, 181),
(363, NULL, '', '2020123456', 'JOYCE', 'JASPER', '09234567890', 4, 182),
(364, NULL, '', '2020234567', 'HARVEY', 'BECKETT', '09345678901', 4, 182),
(365, NULL, '', '2020345678', 'BUTLER', 'MILES', '09456789012', 4, 183),
(366, NULL, '', '2020456789', 'FLETCHER', 'ANDREW', '09567890123', 4, 183),
(367, NULL, '', '2020567890', 'ELLIS', 'JACOB', '09678901234', 4, 184),
(368, NULL, '', '2020678901', 'HARRISON', 'DUSTIN', '09789012345', 4, 184),
(369, NULL, '', '2020789012', 'LYONS', 'MATTHEW', '09890123456', 4, 185),
(370, NULL, '', '2020890123', 'BRODERICK', 'LIAM', '09901234567', 4, 185),
(371, NULL, '', '2020901234', 'WATSON', 'NOAH', '09123456789', 4, 186),
(372, NULL, '', '2021012345', 'BOWMAN', 'ETHAN', '09234567890', 4, 186),
(373, NULL, '', '2021123456', 'DAWSON', 'LUKE', '09345678901', 4, 187),
(374, NULL, '', '2021234567', 'STANTON', 'JORDAN', '09456789012', 4, 187),
(375, NULL, '', '2021345678', 'SHERMAN', 'ALEX', '09567890123', 4, 188),
(376, NULL, '', '2021456789', 'GARDNER', 'RILEY', '09678901234', 4, 188),
(377, NULL, '', '2021567890', 'EVANS', 'NOAH', '09789012345', 4, 189),
(378, NULL, '', '2021678901', 'HALL', 'LIAM', '09890123456', 4, 189),
(379, NULL, '', '2021789012', 'COOPER', 'JASPER', '09901234567', 4, 190),
(380, NULL, '', '2021890123', 'REED', 'BRAXTON', '09123456789', 4, 190),
(381, NULL, '', '2021901234', 'MITCHELL', 'KENNETH', '09234567890', 4, 191),
(382, NULL, '', '2022012345', 'PETERSON', 'MARCUS', '09345678901', 4, 191),
(383, NULL, '', '2022123456', 'GRANT', 'MALCOLM', '09456789012', 4, 192),
(384, NULL, '', '2022234567', 'HUNTER', 'MADDEN', '09567890123', 4, 192),
(385, NULL, '', '2022345678', 'STEWART', 'MARSHALL', '09678901234', 4, 193),
(386, NULL, '', '2022456789', 'PORTER', 'GIDEON', '09789012345', 4, 193),
(387, NULL, '', '2022567890', 'FOSTER', 'JASPER', '09890123456', 4, 194),
(388, NULL, '', '2022678901', 'GRAY', 'BECKETT', '09901234567', 4, 194),
(389, NULL, '', '2022789012', 'FIELDS', 'JACKSON', '09123456789', 4, 195),
(390, NULL, '', '2022890123', 'HAYES', 'MAX', '09234567890', 4, 195),
(391, NULL, '', '2022901234', 'FLETCHER', 'QUINCY', '09345678901', 4, 196),
(392, NULL, '', '2023012345', 'LYMAN', 'JUAN', '09456789012', 4, 196),
(393, NULL, '', '2023123456', 'WEBB', 'JULIAN', '09567890123', 4, 197),
(394, NULL, '', '2023234567', 'CARPENTER', 'SEBASTIAN', '09678901234', 4, 197),
(395, NULL, '', '2023345678', 'COLE', 'VINCENT', '09789012345', 4, 198),
(396, NULL, '', '2023456789', 'FIELDS', 'AIDEN', '09890123456', 4, 198),
(397, NULL, '', '2023567890', 'LYONS', 'KAYDEN', '09901234567', 4, 199),
(398, NULL, '', '2023678901', 'BRODERICK', 'NATHANIEL', '09123456789', 4, 199),
(399, NULL, '', '2023789012', 'WELLS', 'JORDAN', '09234567890', 4, 200),
(400, NULL, '', '2023890123', 'WARD', 'ISAIAH', '09345678901', 4, 200),
(401, NULL, '', '2023901234', 'WEBSTER', 'GIDEON', '09456789012', 4, 201),
(402, NULL, '', '2024012345', 'PATTERSON', 'FELIX', '09567890123', 4, 201),
(403, NULL, '', '2024123456', 'GRAYSON', 'THEODORE', '09678901234', 4, 202),
(404, NULL, '', '2024234567', 'RAMSEY', 'GAVIN', '09789012345', 4, 202),
(405, NULL, '', '2024345678', 'SHELTON', 'MILES', '09890123456', 4, 203),
(406, NULL, '', '2024456789', 'BROOKS', 'NATHAN', '09901234567', 4, 203),
(407, NULL, '', '2024567890', 'BARNETT', 'SIMON', '09123456789', 4, 204),
(408, NULL, '', '2024678901', 'CARSON', 'CARTER', '09234567890', 4, 204),
(409, NULL, '', '2024789012', 'LLOYD', 'LANDON', '09345678901', 4, 205),
(410, NULL, '', '2024890123', 'MCKINNEY', 'BECKETT', '09456789012', 4, 205),
(411, NULL, '', '2024901234', 'JOYCE', 'BRADLEY', '09567890123', 4, 206),
(412, NULL, '', '2025012345', 'HARVEY', 'JASPER', '09678901234', 4, 206),
(413, NULL, '', '2025123456', 'BUTLER', 'MAXWELL', '09789012345', 4, 207),
(414, NULL, '', '2025234567', 'FLETCHER', 'ETHAN', '09890123456', 4, 207),
(415, NULL, '', '2025345678', 'ELLIS', 'NOAH', '09901234567', 4, 208),
(416, NULL, '', '2025456789', 'HARRISON', 'LIAM', '09123456789', 4, 208),
(417, NULL, '', '2025567890', 'LYONS', 'JACOB', '09234567890', 4, 209),
(418, NULL, '', '2025678901', 'BRODERICK', 'DUSTIN', '09345678901', 4, 209),
(419, NULL, '', '2025789012', 'WATSON', 'DANNY', '09456789012', 4, 210),
(420, NULL, '', '2025890123', 'BOWMAN', 'GABE', '09567890123', 4, 210),
(421, NULL, '', '2025901234', 'DAWSON', 'SEBASTIAN', '09678901234', 4, 211),
(422, NULL, '', '2026012345', 'STANTON', 'JULIAN', '09789012345', 4, 211),
(423, NULL, '', '2026123456', 'SHERMAN', 'FRANKLIN', '09890123456', 4, 212),
(424, NULL, '', '2026234567', 'GARDNER', 'JEREMY', '09901234567', 4, 212),
(425, NULL, '', '2026345678', 'EVANS', 'JEREMIAH', '09123456789', 4, 213),
(426, NULL, '', '2026456789', 'HALL', 'JORDAN', '09234567890', 4, 213),
(427, NULL, '', '2026567890', 'COOPER', 'CASEY', '09345678901', 4, 214),
(428, NULL, '', '2026678901', 'REED', 'GREGORY', '09456789012', 4, 214),
(429, NULL, '', '2026789012', 'MITCHELL', 'MARCUS', '09567890123', 4, 215),
(430, NULL, '', '2026890123', 'PETERSON', 'KENNETH', '09678901234', 4, 215),
(431, NULL, '', '2026901234', 'GRANT', 'BRADEN', '09789012345', 4, 216),
(432, NULL, '', '2027012345', 'HUNTER', 'BRODY', '09890123456', 4, 216),
(433, NULL, '', '2027123456', 'STEWART', 'NATHAN', '09901234567', 4, 217),
(434, NULL, '', '2027234567', 'PORTER', 'SIMON', '09123456789', 4, 217),
(435, NULL, '', '2027345678', 'FOSTER', 'JASPER', '09234567890', 4, 218),
(436, NULL, '', '2027456789', 'GRAY', 'BRAXTON', '09345678901', 4, 218),
(437, NULL, '', '2027567890', 'FIELDS', 'MAXWELL', '09456789012', 4, 219),
(438, NULL, '', '2027678901', 'HAYES', 'GIDEON', '09567890123', 4, 219),
(439, NULL, '', '2027789012', 'FLETCHER', 'JUAN', '09678901234', 4, 220),
(440, NULL, '', '2027890123', 'LYMAN', 'JULIAN', '09789012345', 4, 220),
(441, NULL, '', '2027901234', 'WEBB', 'MARSHALL', '09890123456', 4, 221),
(442, NULL, '', '2028012345', 'CARPENTER', 'GIDEON', '09901234567', 4, 221),
(443, NULL, '', '2028123456', 'COLE', 'JASPER', '09123456789', 4, 222),
(444, NULL, '', '2028234567', 'FIELDS', 'BRADLEY', '09234567890', 4, 222),
(445, NULL, '', '2028345678', 'LYONS', 'KENNETH', '09345678901', 4, 223),
(446, NULL, '', '2028456789', 'BRODERICK', 'NATHANIEL', '09456789012', 4, 223),
(447, NULL, '', '2028567890', 'WELLS', 'MARCUS', '09567890123', 4, 224),
(448, NULL, '', '2028678901', 'WARD', 'VINCENT', '09678901234', 4, 224),
(449, NULL, '', '2028789012', 'WEBSTER', 'MADDEN', '09789012345', 4, 225),
(450, NULL, '', '2028890123', 'PATTERSON', 'MALCOLM', '09890123456', 4, 225),
(451, NULL, '', '2028901234', 'GRAYSON', 'MARSHALL', '09901234567', 4, 226),
(452, NULL, '', '2029012345', 'RAMSEY', 'GIDEON', '09123456789', 4, 226),
(453, NULL, '', '2029123456', 'SHELTON', 'JASPER', '09234567890', 4, 227),
(454, NULL, '', '2029234567', 'BROOKS', 'BRAXTON', '09345678901', 4, 227),
(455, NULL, '', '2029345678', 'BARNETT', 'KENNETH', '09456789012', 4, 228),
(456, NULL, '', '2029456789', 'CARSON', 'SIMON', '09567890123', 4, 228),
(457, NULL, '', '2029567890', 'LLOYD', 'QUINCY', '09678901234', 4, 229),
(458, NULL, '', '2029678901', 'MCKINNEY', 'JULIAN', '09789012345', 4, 229),
(459, NULL, '', '2029789012', 'JOYCE', 'JUAN', '09890123456', 4, 230),
(460, NULL, '', '2029890123', 'HARVEY', 'GREGORY', '09901234567', 4, 230),
(461, NULL, '', '2029901234', 'BUTLER', 'THEODORE', '09123456789', 4, 231),
(462, NULL, '', '2020012345', 'FLETCHER', 'FELIX', '09234567890', 4, 231),
(463, NULL, '', '2020123456', 'WEBSTER', 'JASPER', '09345678901', 4, 232),
(464, NULL, '', '2020234567', 'PATTERSON', 'BRADLEY', '09456789012', 4, 232),
(465, NULL, '', '2020345678', 'GRAYSON', 'JEREMY', '09567890123', 4, 233),
(466, NULL, '', '2020456789', 'RAMSEY', 'JEREMIAH', '09678901234', 4, 233),
(467, NULL, '', '2020567890', 'SHELTON', 'JORDAN', '09789012345', 4, 234),
(468, NULL, '', '2020678901', 'BROOKS', 'CASEY', '09890123456', 4, 234),
(469, NULL, '', '2020789012', 'BARNETT', 'GABE', '09901234567', 4, 235),
(470, NULL, '', '2020890123', 'CARSON', 'MARCUS', '09123456789', 4, 235),
(471, NULL, '', '2020901234', 'LLOYD', 'VINCENT', '09234567890', 4, 236),
(472, NULL, '', '2021012345', 'MCKINNEY', 'DANNY', '09345678901', 4, 236),
(473, NULL, '', '2021123456', 'JOYCE', 'MAXWELL', '09456789012', 4, 237),
(474, NULL, '', '2021234567', 'HARVEY', 'GIDEON', '09567890123', 4, 237),
(475, NULL, '', '2021345678', 'STEWART', 'JUAN', '09678901234', 4, 238),
(476, NULL, '', '2021456789', 'PORTER', 'JULIAN', '09789012345', 4, 238),
(477, NULL, '', '2021567890', 'FOSTER', 'FRANKLIN', '09890123456', 4, 239),
(478, NULL, '', '2021678901', 'GRAY', 'JEREMY', '09901234567', 4, 239),
(479, NULL, '', '2021789012', 'FIELDS', 'JEREMIAH', '09123456789', 4, 240),
(480, NULL, '', '2021890123', 'HAYES', 'JASPER', '09234567890', 4, 240);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_index` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_index`, `email`, `password`, `type`, `created_at`) VALUES
(1, 'amybalion533@gmail.com', '$2y$10$JfEL/xtKAXCWWA/IFsQlv.pJ39dlOjSxShMC/nJexZbqE/gEgcplm', 'staff', '2025-04-30 07:34:49'),
(2, 'john_andrei_agustin@dlsl.edu.ph', '$2y$10$IfKXZxjTDfsOx2ac7DbliuGt/FB2z4bOgnjMpn.XEgQYYxnkRFgn2', 'student', '2025-05-21 14:08:04'),
(3, 'janna_mikhaela_alcantara@dlsl.edu.ph', '$2y$10$DSTo2wsafCp7tUbsl6ho6uamAIgRlwbHyl0Ucwd1W1Abj1w1J3KRS', 'student', '2025-05-21 14:08:04'),
(4, 'enjey_kashlee_alonzo@dlsl.edu.ph', '$2y$10$5VFKdSCYn47oG1MtnR.uN.gtP.ZcXHXDsSEGb0I6RMC.Cz7KgSCfS', 'student', '2025-05-21 14:08:04'),
(5, 'jhenelle_alonzo@dlsl.edu.ph', '$2y$10$RPaBZZHwP1s1RkYy7xU2nOHqXitcmJo1w7BweAWyq7SOlw8j246k6', 'student', '2025-05-21 14:08:04'),
(6, 'balionamaya01@gmail.com', '$2y$10$hKuEIN7731797elcOd8LRuZXa8IuXxTGl6CA4ga1LmSpGCU43Pyi.', 'student', '2025-05-21 14:08:04'),
(7, 'alfonso_rafael_barte@dlsl.edu.ph', '$2y$10$BUhHo1FlpS1xAVfAoS8hFOE3.WQx8acrFA6Hxno5DD2rG2OwaLYd6', 'student', '2025-05-21 14:08:04'),
(8, 'regina_angeli_cadelina@dlsl.edu.ph', '$2y$10$pUB5g.xMPRVaZp9iMrTUluZ7MlRV1xFjvmAUuJtkWFTj6KhMiAe3y', 'student', '2025-05-21 14:08:04'),
(9, 'djan_matthew_catibog@dlsl.edu.ph', '$2y$10$zl3QBEmvnmFPxCv/yUiFeO0I5HquLFB.yOiwNCS2ndJYSnA5d5Z3i', 'student', '2025-05-21 14:08:04'),
(10, 'renz_andrei_delrosario@dlsl.edu.ph', '$2y$10$SgYxNE.KhkO4eb0UCeCaV.NFLeiP2B.Q6TTO02B5TyGUaWAcjJABS', 'student', '2025-05-21 14:08:04'),
(11, 'marc_lawrence_delapena@dlsl.edu.ph', '$2y$10$yr0APo2tZym4EQo2B9noxuOBcEnjkV1w543mIs49M0nAcM1GKIvyy', 'student', '2025-05-21 14:08:04'),
(12, 'princess_mihaela_delavega@dlsl.edu.ph', '$2y$10$HxmyyCeurXZ3xsatFL/x4eRX3DZaYSCv3XxVxHg1v5YscmsiwFsLC', 'student', '2025-05-21 14:08:04'),
(13, 'lyrus_lei_doctolero@dlsl.edu.ph', '$2y$10$F7vOn957rN/op.OTpdlbpOjXwl.DjNPvUkMe7b97YpJeT7nPahKi6', 'student', '2025-05-21 14:08:04'),
(14, 'kyle_gabriel_dones@dlsl.edu.ph', '$2y$10$0eQy2.9hAuDt5HWpKIMjH.8uFIzSspoYZ61mr2nyh/K5G36vZ3kAO', 'student', '2025-05-21 14:08:04'),
(15, 'juan_benjo_estrella@dlsl.edu.ph', '$2y$10$Silj.7XO0aHoIEp.evS.YOg.DNcECe6tM3oIKFUh9l7Yi.MncqjNm', 'student', '2025-05-21 14:08:04'),
(16, 'lenard_lance_fedelicio@dlsl.edu.ph', '$2y$10$uRmN.mJyo.rHvKo/L592S.TKbQePLpYIjREQHidyeJCC9PWgb6ls6', 'student', '2025-05-21 14:08:04'),
(17, 'harry_garcia@dlsl.edu.ph', '$2y$10$GfunqhFqYnb7ZpWJgoGWauATxZs4asc95S24D5rGp4FtI6pp37JaC', 'student', '2025-05-21 14:08:04'),
(18, 'ivan_joseph_jaurigue@dlsl.edu.ph', '$2y$10$VeR50O93IwjapQrhlz2f6Ofg3BywBw2y0imRn/Xy2.aYANvTeyM66', 'student', '2025-05-21 14:08:04'),
(19, 'mark_jerome_kinchasan@dlsl.edu.ph', '$2y$10$zxl2Cg8aEk2Q99MD0BoSP.aHid3E3Nd.OaRgPGyrwFfE/6s8QcbN2', 'student', '2025-05-21 14:08:04'),
(20, 'jeric_lique@dls.edu.ph', '$2y$10$orUkNKTUtxb/BuQvLmKFduN5lP2s.9IbaOeMlS4HW5dPhSMfK/0S6', 'student', '2025-05-21 14:08:04'),
(21, 'sean_calvin_theo_lirio@dlsl.edu.ph', '$2y$10$OpCb5aqwk8tj43TPIwLbBuEeHC9khitjI6lxWwwcYpwqei.OaHIIK', 'student', '2025-05-21 14:08:04'),
(22, 'katherine_anne_liwanag@dlsl.edu.ph', '$2y$10$S2b/nvdF1h8mozS9FkfHguQ9RUEbztQNAu7Gin6yuco/vdX.SCvVS', 'student', '2025-05-21 14:08:04'),
(23, 'chester_boriz_macalintal@dlsl.edu.ph', '$2y$10$QXmw6RmxHRZfZ7GJzaAPpuBN7Zzvfrv6xVFgyyUbSQv9FNmSHFkTm', 'student', '2025-05-21 14:08:04'),
(24, 'john_rafhael_steven_macasaet@dlsl.edu.ph', '$2y$10$ZPthA56sBUitJDCWmWwFeuM.W5Ac1PbToZIcdGSikvX5HuIlHPNMe', 'student', '2025-05-21 14:08:04'),
(25, 'alexie_chyle_magbuhat@dlsl.edu.ph', '$2y$10$yh2KGb9z2v/ghqeBYu52LuBi8g1/rjpqmAJzojHx8cHFh4lXJxUAm', 'student', '2025-05-21 14:08:04'),
(26, 'john_aaron_manalo@dlsl.edu.ph', '$2y$10$18UBw8Wb3YLkvMAntdXAvemUp5AXKx/uKn8YvZKurkjSM7kDEho5W', 'student', '2025-05-21 14:08:04'),
(27, 'ian_karvey_manimtim@dlsl.edu.ph', '$2y$10$coFT86cOqRf0few9pGm5OOnB7J/dpyOfn70VPz5h6lIeei3USf4Cu', 'student', '2025-05-21 14:08:04'),
(28, 'isiah_joseph_marquinez@dlsl.edu.ph', '$2y$10$Xd26uhc/UoJMsWJ1GUAQCuyHcDcTAnSfbtKvE40eolTJUk5kydSOe', 'student', '2025-05-21 14:08:04'),
(29, 'sebastian_angelo_meer@dlsl.edu.ph', '$2y$10$IC7qDEauxzyDT0riJBmFzun.gCH8fGLBrlxaGTmHzDMf5sKzGeq3S', 'student', '2025-05-21 14:08:04'),
(30, 'wyeth_irish_mendez@dlsl.edu.ph', '$2y$10$ENGFpX5ri8kHWw/FUzlp5uQzh0cJ7A7aXc9VwPNohEuQJIr4bVKoK', 'student', '2025-05-21 14:08:04'),
(31, 'jan_ernest_pacey_nario@dlsl.edu.ph', '$2y$10$yLTJNInibQTsV0lY6JYgYOgR1gOcNSEv4xS.PkJAZqHfR5J.HKy5O', 'student', '2025-05-21 14:08:04'),
(32, 'keith_justin_nario@dlsl.edu.ph', '$2y$10$7oJVqHKmzj1VB2pyOSxDJefxiGKyadYUoRLfXFaWiC3IzMSwWgeHm', 'student', '2025-05-21 14:08:04'),
(33, 'michael_josh_panuela@dlsl.edu.ph', '$2y$10$a2ivsiOyQoiPUbzMQKiXjOVyLpqWTO0gmNIGHfYhY1WWsIJ78sDhG', 'student', '2025-05-21 14:08:04'),
(34, 'jane_allyson_paray@dlsl.edu.ph', '$2y$10$1sB63FEh3SOFTa/I4wuZs.PcZ3ThtVV2HOmuEkhqytlrSwEsHSNBa', 'student', '2025-05-21 14:08:04'),
(35, 'daniel_luis_sahagun@dlsl.edu.ph', '$2y$10$ph0LGK3yCejg5CAP4G65f.QYPMtduRqUkkQSSJClsiYUccc0/PySS', 'student', '2025-05-21 14:08:04'),
(36, 'thomas_alexandre_siman@dlsl.edu.ph', '$2y$10$5kREJq9AfjvXenR9ofl4h.p28YZcS0TcDgNScx5InRNWGAZ/7rlYa', 'student', '2025-05-21 14:08:04'),
(37, 'xyrelle_dominique_talens@dlsl.edu.ph', '$2y$10$L11qAVZF9fFA7pIn70AYrOj9.Xp7ZNonVt5FftsmskB4QmBCV0mOy', 'student', '2025-05-21 14:08:04'),
(38, 'jhon_paulo_tenorio@dlsl.edu.ph', '$2y$10$Z.j6Uin5x8.g7TOweygODuaWKw1CYgWUn/Wk/wfK9eVsv/U/H9fs.', 'student', '2025-05-21 14:08:04'),
(39, 'kyan_prince_torres@dlsl.edu.ph', '$2y$10$Plkf7Flr.mkg/Gv5KLVygOO4BW7e25deeuLpff00dc5PoVpwQsH0W', 'student', '2025-05-21 14:08:04'),
(40, 'angel_amaya_balion@dlsl.edu.ph', '$2y$10$oruFH6IQ9LvWbRCTFDG3ouK3VTo3t3efKj9mkhBpZP11xrPFt1Tmm', 'counselor', '2025-05-27 05:02:54'),
(41, 'juan.dela.cruz@dlsl.edu.ph', '$2y$10$oruFH6IQ9LvWbRCTFDG3ouK3VTo3t3efKj9mkhBpZP11xrPFt1Tmm', 'counselor', '2025-05-27 05:25:25'),
(42, 'maria.santos@dlsl.edu.ph', '$2y$10$oruFH6IQ9LvWbRCTFDG3ouK3VTo3t3efKj9mkhBpZP11xrPFt1Tmm', 'counselor', '2025-05-27 05:25:25'),
(43, 'antonio.lim@dlsl.edu.ph', '$2y$10$oruFH6IQ9LvWbRCTFDG3ouK3VTo3t3efKj9mkhBpZP11xrPFt1Tmm', 'counselor', '2025-05-27 05:25:25'),
(44, 'sofia.reyes@dlsl.edu.ph', '$2y$10$oruFH6IQ9LvWbRCTFDG3ouK3VTo3t3efKj9mkhBpZP11xrPFt1Tmm', 'counselor', '2025-05-27 05:25:25'),
(45, 'carlos.gonzales@dlsl.edu.ph', '$2y$10$oruFH6IQ9LvWbRCTFDG3ouK3VTo3t3efKj9mkhBpZP11xrPFt1Tmm', 'counselor', '2025-05-27 05:25:25'),
(46, 'lucia.ramirez@dlsl.edu.ph', '$2y$10$oruFH6IQ9LvWbRCTFDG3ouK3VTo3t3efKj9mkhBpZP11xrPFt1Tmm', 'counselor', '2025-05-27 05:25:25'),
(47, 'fernando.tan@dlsl.edu.ph', '$2y$10$oruFH6IQ9LvWbRCTFDG3ouK3VTo3t3efKj9mkhBpZP11xrPFt1Tmm', 'counselor', '2025-05-27 05:25:25'),
(48, 'isabela.garcia@dlsl.edu.ph', '$2y$10$oruFH6IQ9LvWbRCTFDG3ouK3VTo3t3efKj9mkhBpZP11xrPFt1Tmm', 'counselor', '2025-05-27 05:25:25'),
(49, 'renz.andrei.delrosario@dlsl.edu.ph', '$2y$10$E5bQo2ZVNbL.G85IBAURmu32J9vv6JTrnr/9FjMPggHtldOid1HkW', 'admin', '2025-05-27 12:20:42'),
(50, 'xyrelle.dominique.talens@dlsl.edu.ph', '$2y$10$E5bQo2ZVNbL.G85IBAURmu32J9vv6JTrnr/9FjMPggHtldOid1HkW', 'admin', '2025-05-27 12:48:40'),
(51, 'lyrus.lei.doctolero@dlsl.edu.ph', '$2y$10$E5bQo2ZVNbL.G85IBAURmu32J9vv6JTrnr/9FjMPggHtldOid1HkW', 'admin', '2025-05-27 12:52:59'),
(52, 'lyrusdoc2@gmail.com', '$2y$10$E5bQo2ZVNbL.G85IBAURmu32J9vv6JTrnr/9FjMPggHtldOid1HkW', 'admin', '2025-05-27 12:54:21'),
(53, 'renzandreidelrosario@gmail.com', '$2y$10$E5bQo2ZVNbL.G85IBAURmu32J9vv6JTrnr/9FjMPggHtldOid1HkW', 'admin', '2025-05-27 12:54:21'),
(54, 'deleonfuego@gmail.com', '$2y$10$E5bQo2ZVNbL.G85IBAURmu32J9vv6JTrnr/9FjMPggHtldOid1HkW', 'admin', '2025-05-27 12:54:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_index`);

--
-- Indexes for table `item_submission`
--
ALTER TABLE `item_submission`
  ADD PRIMARY KEY (`item_index`),
  ADD KEY `fk3` (`user_submit_index`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_index`),
  ADD UNIQUE KEY `program_code` (`program_code`),
  ADD KEY `dept_index` (`dept_index`),
  ADD KEY `fk_programs_counselors` (`counselor_index`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_index`),
  ADD KEY `program_id` (`program_index`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_index`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_index`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_submission`
--
ALTER TABLE `item_submission`
  MODIFY `item_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`program_index`) REFERENCES `programs` (`program_index`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
