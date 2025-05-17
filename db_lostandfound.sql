-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 04:48 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `item_retrieval`
--

CREATE TABLE `item_retrieval` (
  `submission_index` int(11) NOT NULL,
  `item_index` int(11) NOT NULL,
  `user_index` int(11) NOT NULL,
  `retrieval_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `status` varchar(20) NOT NULL COMMENT 'Status of the item, e.g., Lost or Found'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_submission`
--

INSERT INTO `item_submission` (`item_index`, `user_submit_index`, `image_path`, `item_name`, `description`, `lost_location`, `lost_date`, `user_retrieve_index`, `retrieval_date`, `status`) VALUES
(28, 0, 'Seventeen The8.jpg', 'Minghao', 'Asawa ni Xy', 'Sentrum', '2025-05-15', 0, NULL, 'Found'),
(29, 0, '290886ff-7116-406a-8a2c-e7e45a028704.jpg', 'Cheolito', 'Manliligaw ni Xy', 'Capilla', '2025-05-16', 0, NULL, 'Lost'),
(30, 0, '630ffe08-f261-4f57-9c49-9e3ac4eed6df.jpg', 'Hoshi', 'Delusional na tiger', 'CBEAM Building', '2025-05-17', 0, NULL, 'Lost'),
(31, 0, '32c143f5-9444-41a3-a9bd-838950ad2b22.jpg', 'Dino', 'rawrrrr', 'Br. Benilde Building', '2025-05-18', 0, NULL, 'Lost'),
(32, 0, '0d36f0d3-1582-4b34-96c9-adf3e739fbbe.jpg', 'Vernon', 'I\'m on my worst behavior, how you like me now? Put a muzzle on me, I\'ll spit in your mouth Wake me up from this nightmare, please I\'m scarred and bruised with a black-eyed face', 'JRN Building', '2025-05-19', 0, NULL, 'Found'),
(33, 0, '55230a0d-b318-41ba-bfc9-114fe65f5013.jpg', 'Woozi', 'Balat parang kinukuha ni lord', 'JRF Building', '2025-05-20', 0, NULL, 'Lost'),
(34, 0, '400bdd54-5566-4ee7-86fa-fb6d89a09316.jpg', 'Kwannie', 'mataray siya sis', 'JRF Building', '2025-05-21', 0, NULL, 'Found'),
(35, 0, '5db48b10-7ad8-4ce0-b737-a8de0b9b52bb.jpg', 'Seokmin', 'SALUTEEEEEEEEEEEEE', 'Mabini Building', '2025-05-22', 0, NULL, 'Found'),
(36, 0, '695cd691-faee-415b-b8de-b2036ec9838f.jpg', 'Jun', 'Bestfriend ng asawa ni Xy', 'Retreat Complex', '2025-05-23', 0, NULL, 'Lost'),
(37, 0, '24f20ef3-381d-4619-9ba8-dab596047d67.jpg', 'Joshua', 'si mister sunday morning', 'Chez Rafael', '2025-05-24', 0, NULL, 'Lost'),
(38, 0, '85f80f3c-8bb4-4fe6-9245-2df18afc3dc8.jpg', 'Hannie', 'si ganda \'to eh; subukan niyo lang agawin kay Cheolito', 'LRC', '2025-05-24', 0, NULL, 'Lost'),
(39, 0, 'da126325-077e-4c6b-9e88-5f9156d171f6.jpg', 'Wonwoo', 'bebelabs ni mister biceps', 'Jose Diokno Building', '2025-05-25', 0, NULL, 'Found'),
(40, 0, 'c967e500-2824-4499-91b7-9780ae8f9b42.jpg', 'Mingyu', 'ito si mister biceps', 'Sports Complex', '2025-05-26', 0, NULL, 'Found'),
(41, 0, '⋆𓉞˚˖ 𑁍ࠬܓ.jpg', 'Unak', 'bunso na happy pill', 'Student Center', '2025-06-01', 0, NULL, 'Lost'),
(42, 0, '⋆𓉞˚˖ 𑁍ࠬܓ (1).jpg', 'Taesan', 'kunwari astig siya', 'IT Domain', '2025-06-02', 0, NULL, 'Lost'),
(43, 0, '⋆𓉞˚˖ 𑁍ࠬܓ (2).jpg', 'Sungho', 'mama bear', 'Centen Sports Plaza', '2025-06-03', 0, NULL, 'Found'),
(44, 0, '⋆𓉞˚˖ 𑁍ࠬܓ (3).jpg', 'Myungjae', 'he\'s a lil quirky', 'Oval', '2025-06-04', 0, NULL, 'Found'),
(45, 0, '⋆𓉞˚˖ 𑁍ࠬܓ (4).jpg', 'Riu', 'bangis gumiling', 'College Lobby', '2025-07-05', 0, NULL, 'Found'),
(46, 0, '☆.jpg', 'Ihan', 'corydoras.', 'Sentrum', '2025-06-06', 0, NULL, 'Lost'),
(47, 0, 'download (11).jpg', 'Yoongi', 'Nan bekkineun geol bekkineun nomeul jabadaga Hubaedeun seonbaedeun jekkineun nom Nompaengideun naega wack ideun fack Ideun yeoksareul badage saegineun nom Tto jaemido eomneun raebpeodeul saieseo Neul namdeulboda deo chaenggineun mok Jallaganeun deoge babgeureut ppaetgil Hyeongdeure shigi jiltu deoge saenggineun soeum', 'Sentrum', '2025-07-01', 0, NULL, 'Lost'),
(48, 0, 'RM.jpg', 'RM', '\'di marunong maghiwa ng sibuyas', 'Capilla', '2025-07-02', 0, NULL, 'Lost'),
(49, 0, 'download (12).jpg', 'Jimin', 'no jams', 'JRN Building', '2025-07-03', 0, NULL, 'Lost'),
(50, 0, 'download (13).jpg', 'Jin', 'tawa nalang kayo sa jokes niya kahit pilit', 'Sports Complex', '2025-07-04', 0, NULL, 'Found'),
(51, 0, 'download (14).jpg', 'Taehyung', 'si boss gucci to ehhh', 'IT Domain', '2025-07-05', 0, NULL, 'Found'),
(52, 0, 'download (15).jpg', 'Jungkook', 'he will be doing wHAT TO YOU NIGHT AFTER NIGHT?', 'LRC', '2025-07-06', 0, NULL, 'Found'),
(53, 0, 'download (16).jpg', 'Hobi', 'hapi sunshine always yehey', 'Sports Complex', '2025-07-07', 0, NULL, 'Found'),
(54, 0, '478906434_1796973871061336_1196048458877425365_n.jpg', 'Soobin', 'sweaty sa LoL', 'LRC', '2025-08-01', 0, NULL, 'Found'),
(55, 0, '477032937_1796973947727995_7822366551452897979_n.jpg', 'Yeonjun', 'wwae wawe eawe wae awae', 'Student Center', '2025-08-02', 0, NULL, 'Found'),
(56, 0, '479328362_1796973744394682_4488205551926243800_n.jpg', 'Beomgyu', 'makulit yan shea', 'Br. Benilde Building', '2025-08-03', 0, NULL, 'Lost'),
(57, 0, '478420880_1796973934394663_196605231675931968_n.jpg', 'Terry', 'terry!!!!!!!!!!!!!!!!!!!!!!!!!!', 'Retreat Complex', '2025-08-04', 0, NULL, 'Lost'),
(58, 0, '478040058_1796973644394692_7997629872371894240_n.jpg', 'Hyuka', 'das kinda sus', 'Centen Sports Plaza', '2025-08-05', 0, NULL, 'Lost');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_index` int(11) NOT NULL,
  `dept_index` int(11) NOT NULL,
  `program_code` varchar(20) NOT NULL,
  `program_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_index` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `program_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_index` int(11) NOT NULL,
  `user_index` int(11) NOT NULL,
  `student_number` varchar(255) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `year_level` int(1) NOT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_index` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_index`);

--
-- Indexes for table `item_retrieval`
--
ALTER TABLE `item_retrieval`
  ADD PRIMARY KEY (`submission_index`),
  ADD KEY `fk5` (`item_index`),
  ADD KEY `fk6` (`user_index`);

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
  ADD KEY `dept_index` (`dept_index`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_index`),
  ADD KEY `program_fk` (`program_index`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_index`) USING BTREE,
  ADD KEY `student_user` (`user_index`),
  ADD KEY `student_section` (`section_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_index`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_submission`
--
ALTER TABLE `item_submission`
  MODIFY `item_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
