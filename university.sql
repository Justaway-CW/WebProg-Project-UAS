-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 07:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', '$2a$12$bRps4ObniQUmAtWZc2Yik.zda3viQ0YjJnmo8aIzju5qt/HrsTKuK', 'ADMIN'),
(2, 'Ardiansyah', 'ardiansyah@lecturer.umn.ac.id', '$2a$12$QwuH2pzE9IL/hYBKKOmu9.q36YIuKbvOiFyyomuxuwJJJS4VQ29Za', 'GUEST'),
(3, 'Putu', 'putu.i@gmail.com', '$2a$12$OZKyF.f95h.OTLe12SfFaeLBajkKC38qxekXwny3WyiltqRhguRuq', 'GUEST'),
(4, 'Ester Lumba', 'esterlum@gmail.com', '$2a$12$kMTDawxNsaLkMc8Muw8d6O3QcmM1fOBB47YD5O9BHfKBXMV7Vd3NG', 'GUEST'),
(5, 'Jane Doe', 'janedoe@yahoo.com', '$2a$12$Kwtxbk79AIIoaudSUqoy3e0ituPScc9TnM7tPtSrIgypxMVFZd8RG', 'MANAGEMENT');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `name`, `description`, `location`, `image`) VALUES
(1, 'Lecture Hall', 'The modern theater hall has a capacity of up to 200 people. This room is often used for seminars, workshops, lectures with guest lecturers, and UKM show (Student Activity Unit).', 'New Media Tower', 'Lecture_Hall.jfif'),
(2, 'Green Screen Studio', 'This studio is specifically designed to make films and animations. Recording a scene can be taken from 3 different angles by utilizing various facilities, such as towing (tools for lifting people), lights, costumes, point sensors motion, and green screen.', 'Tower C', 'Green_Screen.jfif'),
(3, 'Photography Studio', 'This photography studio is used for lectures, academic assignments, research, and final project. With a studio equipped with a high resolution DSLR camera attached with a zooming lens, wide lens, fixed lens and macro lens, students can explore in producin', 'Tower B', 'Photography_Studio.jfif'),
(4, 'Printing Lab', 'This laboratory facilitates UMN students to print their work using 3 mechanical engine units that includes a 3D printing machine to print three-dimensionsional buildings, a plotter machines to print paper-based or two-dimensional large-sized images up to ', 'Tower A', 'Printing_Lab.jfif'),
(5, 'Sound Lab', 'To produce high quality audio in accordance with industry standards, UMN facilitates students with the latest tools and software to support the making of audio with all of its effects. Due to the high demand, UMN has two large capacity sound laboratories.', 'Tower B', 'Sound_Lab.jfif'),
(6, 'Game Development Lab', 'This laboratory is dedicated to desktop and mobile based games. To improve the interactivity of student’s creativity, UMN provides input devices such as hand gesture recognition sensors (Leap Motion), full body movement (Kinect V2) and a head-mounted VR h', 'Tower B', 'Game_Development_Lab.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `requesterID` int(11) NOT NULL,
  `facilityID` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requesterID`, `facilityID`, `date`, `startTime`, `endTime`, `status`) VALUES
(1, 4, 2, '2021-12-08', '08:00:00', '20:00:00', 'WAITING'),
(2, 4, 1, '2021-12-06', '07:00:00', '18:00:00', 'APPROVED'),
(3, 4, 4, '2021-12-02', '10:00:00', '23:00:00', 'REJECTED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
