-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 04:15 PM
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
  `submission_index` int(11) NOT NULL COMMENT 'Index of the submitted item',
  `item_index` int(11) NOT NULL,
  `user_index` int(11) NOT NULL COMMENT 'The person who submitted the lost item',
  `lost_date` date NOT NULL COMMENT 'When the item was lost',
  `lost_location` varchar(100) NOT NULL COMMENT 'Where the item was lost (e.g., library, building)',
  `status` varchar(20) NOT NULL COMMENT 'Status of the item, e.g., Lost or Found',
  `image_path` varchar(255) DEFAULT NULL COMMENT 'Path to uploaded image',
  `description` text DEFAULT NULL COMMENT 'Description of the item',
  `item_name` varchar(100) NOT NULL COMMENT 'Name or title of the item'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_submission`
--

INSERT INTO `item_submission` (`submission_index`, `item_index`, `user_index`, `lost_date`, `lost_location`, `status`, `image_path`, `description`, `item_name`) VALUES
(0, 28, 0, '2025-05-15', 'Sentrum', 'Found', 'Seventeen The8.jpg', 'Asawa ni Xy', 'Minghao'),
(0, 29, 0, '2025-05-16', 'Capilla', 'Lost', '290886ff-7116-406a-8a2c-e7e45a028704.jpg', 'Manliligaw ni Xy', 'Cheolito'),
(0, 30, 0, '2025-05-17', 'CBEAM Building', 'Lost', '630ffe08-f261-4f57-9c49-9e3ac4eed6df.jpg', 'Delusional na tiger', 'Hoshi'),
(0, 31, 0, '2025-05-18', 'Br. Benilde Building', 'Lost', '32c143f5-9444-41a3-a9bd-838950ad2b22.jpg', 'rawrrrr', 'Dino'),
(0, 32, 0, '2025-05-19', 'JRN Building', 'Found', '0d36f0d3-1582-4b34-96c9-adf3e739fbbe.jpg', 'I\'m on my worst behavior, how you like me now? Put a muzzle on me, I\'ll spit in your mouth Wake me up from this nightmare, please I\'m scarred and bruised with a black-eyed face', 'Vernon'),
(0, 33, 0, '2025-05-20', 'JRF Building', 'Lost', '55230a0d-b318-41ba-bfc9-114fe65f5013.jpg', 'Balat parang kinukuha ni lord', 'Woozi'),
(0, 34, 0, '2025-05-21', 'JRF Building', 'Found', '400bdd54-5566-4ee7-86fa-fb6d89a09316.jpg', 'mataray siya sis', 'Kwannie'),
(0, 35, 0, '2025-05-22', 'Mabini Building', 'Found', '5db48b10-7ad8-4ce0-b737-a8de0b9b52bb.jpg', 'SALUTEEEEEEEEEEEEE', 'Seokmin'),
(0, 36, 0, '2025-05-23', 'Retreat Complex', 'Lost', '695cd691-faee-415b-b8de-b2036ec9838f.jpg', 'Bestfriend ng asawa ni Xy', 'Jun'),
(0, 37, 0, '2025-05-24', 'Chez Rafael', 'Lost', '24f20ef3-381d-4619-9ba8-dab596047d67.jpg', 'si mister sunday morning', 'Joshua'),
(0, 38, 0, '2025-05-24', 'LRC', 'Lost', '85f80f3c-8bb4-4fe6-9245-2df18afc3dc8.jpg', 'si ganda \'to eh; subukan niyo lang agawin kay Cheolito', 'Hannie'),
(0, 39, 0, '2025-05-25', 'Jose Diokno Building', 'Found', 'da126325-077e-4c6b-9e88-5f9156d171f6.jpg', 'bebelabs ni mister biceps', 'Wonwoo'),
(0, 40, 0, '2025-05-26', 'Sports Complex', 'Found', 'c967e500-2824-4499-91b7-9780ae8f9b42.jpg', 'ito si mister biceps', 'Mingyu'),
(0, 41, 0, '2025-06-01', 'Student Center', 'Lost', '⋆𓉞˚˖ 𑁍ࠬܓ.jpg', 'bunso na happy pill', 'Unak'),
(0, 42, 0, '2025-06-02', 'IT Domain', 'Lost', '⋆𓉞˚˖ 𑁍ࠬܓ (1).jpg', 'kunwari astig siya', 'Taesan'),
(0, 43, 0, '2025-06-03', 'Centen Sports Plaza', 'Found', '⋆𓉞˚˖ 𑁍ࠬܓ (2).jpg', 'mama bear', 'Sungho'),
(0, 44, 0, '2025-06-04', 'Oval', 'Found', '⋆𓉞˚˖ 𑁍ࠬܓ (3).jpg', 'he\'s a lil quirky', 'Myungjae'),
(0, 45, 0, '2025-07-05', 'College Lobby', 'Found', '⋆𓉞˚˖ 𑁍ࠬܓ (4).jpg', 'bangis gumiling', 'Riu'),
(0, 46, 0, '2025-06-06', 'Sentrum', 'Lost', '☆.jpg', 'corydoras.', 'Ihan'),
(0, 47, 0, '2025-07-01', 'Sentrum', 'Lost', 'download (11).jpg', 'Nan bekkineun geol bekkineun nomeul jabadaga Hubaedeun seonbaedeun jekkineun nom Nompaengideun naega wack ideun fack Ideun yeoksareul badage saegineun nom Tto jaemido eomneun raebpeodeul saieseo Neul namdeulboda deo chaenggineun mok Jallaganeun deoge babgeureut ppaetgil Hyeongdeure shigi jiltu deoge saenggineun soeum', 'Yoongi'),
(0, 48, 0, '2025-07-02', 'Capilla', 'Lost', 'RM.jpg', '\'di marunong maghiwa ng sibuyas', 'RM'),
(0, 49, 0, '2025-07-03', 'JRN Building', 'Lost', 'download (12).jpg', 'no jams', 'Jimin'),
(0, 50, 0, '2025-07-04', 'Sports Complex', 'Found', 'download (13).jpg', 'tawa nalang kayo sa jokes niya kahit pilit', 'Jin'),
(0, 51, 0, '2025-07-05', 'IT Domain', 'Found', 'download (14).jpg', 'si boss gucci to ehhh', 'Taehyung'),
(0, 52, 0, '2025-07-06', 'LRC', 'Found', 'download (15).jpg', 'he will be doing wHAT TO YOU NIGHT AFTER NIGHT?', 'Jungkook'),
(0, 53, 0, '2025-07-07', 'Sports Complex', 'Found', 'download (16).jpg', 'hapi sunshine always yehey', 'Hobi'),
(0, 54, 0, '2025-08-01', 'LRC', 'Found', '478906434_1796973871061336_1196048458877425365_n.jpg', 'sweaty sa LoL', 'Soobin'),
(0, 55, 0, '2025-08-02', 'Student Center', 'Found', '477032937_1796973947727995_7822366551452897979_n.jpg', 'wwae wawe eawe wae awae', 'Yeonjun'),
(0, 56, 0, '2025-08-03', 'Br. Benilde Building', 'Lost', '479328362_1796973744394682_4488205551926243800_n.jpg', 'makulit yan shea', 'Beomgyu'),
(0, 57, 0, '2025-08-04', 'Retreat Complex', 'Lost', '478420880_1796973934394663_196605231675931968_n.jpg', 'terry!!!!!!!!!!!!!!!!!!!!!!!!!!', 'Terry'),
(0, 58, 0, '2025-08-05', 'Centen Sports Plaza', 'Lost', '478040058_1796973644394692_7997629872371894240_n.jpg', 'das kinda sus', 'Hyuka');

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
  ADD KEY `fk2` (`item_index`),
  ADD KEY `fk3` (`user_index`);

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
