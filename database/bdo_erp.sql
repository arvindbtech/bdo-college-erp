-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2024 at 08:23 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdo_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_config`
--

DROP TABLE IF EXISTS `email_config`;
CREATE TABLE IF NOT EXISTS `email_config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `protocol` varchar(255) NOT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_user` varchar(255) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(100) DEFAULT NULL,
  `smtp_encryption` varchar(10) DEFAULT NULL,
  `branch_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`id`, `email`, `protocol`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `smtp_encryption`, `branch_id`) VALUES
(1, 'demomailmessage@gmail.com', 'smtp', 'smtp.gmail.com', 'demomailmessage@gmail.com', 'zdzrlxilfdulnfav', '587', 'tls', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

DROP TABLE IF EXISTS `student_registration`;
CREATE TABLE IF NOT EXISTS `student_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `stud_gender` varchar(15) DEFAULT NULL,
  `stud_mother_tongue` varchar(50) DEFAULT NULL,
  `stud_religion` varchar(50) DEFAULT NULL,
  `stud_caste` varchar(50) DEFAULT NULL,
  `stud_category` int NOT NULL,
  `stud_subcategory` int NOT NULL,
  `stud_city` varchar(70) DEFAULT NULL,
  `stud_district` int DEFAULT '0',
  `stud_state` varchar(100) DEFAULT NULL,
  `stud_present_add` varchar(150) DEFAULT NULL,
  `stud_permanent_add` varchar(150) DEFAULT NULL,
  `admission_year` varchar(20) DEFAULT NULL,
  `admission_sem` varchar(20) DEFAULT NULL,
  `gen_prev_roll` varchar(20) DEFAULT NULL,
  `stud_course` varchar(50) DEFAULT NULL,
  `stud_sub` int NOT NULL,
  `subject_major` int DEFAULT NULL,
  `subject_minor` int DEFAULT NULL,
  `course_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `father_name` varchar(50) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `occupation` int DEFAULT '0',
  `parent_city` varchar(70) DEFAULT NULL,
  `parent_state` varchar(100) DEFAULT NULL,
  `parent_address` varchar(150) DEFAULT NULL,
  `parent_contact` varchar(15) DEFAULT NULL,
  `parent_email` varchar(70) DEFAULT NULL,
  `bonafide` varchar(50) NOT NULL,
  `single_girl_child` varchar(50) NOT NULL,
  `income` varchar(50) NOT NULL,
  `national_state_cer` varchar(50) NOT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `ten_marksheet` varchar(100) DEFAULT NULL,
  `ten_board_name` varchar(150) NOT NULL,
  `ten_subjects` varchar(200) DEFAULT NULL,
  `ten_board_roll` varchar(50) NOT NULL,
  `ten_year_passing` varchar(5) NOT NULL,
  `ten_max_marks` double(10,2) NOT NULL,
  `ten_marks_obt` double(10,2) NOT NULL,
  `ten_percentage` double(10,2) NOT NULL,
  `twelve_marksheet` varchar(100) DEFAULT NULL,
  `twelve_board_name` varchar(150) NOT NULL,
  `twelve_subjects` varchar(200) DEFAULT NULL,
  `twelve_board_roll` varchar(50) NOT NULL,
  `twelve_month_passing` varchar(20) NOT NULL,
  `twelve_year_passing` varchar(5) NOT NULL,
  `twelve_max_marks` double(10,2) NOT NULL,
  `twelve_marks_obt` double(10,2) NOT NULL,
  `twelve_percentage` double(10,2) NOT NULL,
  `other_certificates` varchar(100) DEFAULT NULL,
  `aadhar_card` varchar(100) DEFAULT NULL,
  `pan_card` varchar(100) DEFAULT NULL,
  `character_certificates` varchar(100) DEFAULT NULL,
  `transfer_certificate` varchar(100) DEFAULT NULL,
  `is_migration` tinyint(1) NOT NULL DEFAULT '0',
  `mig_prev_year_sub` varchar(200) DEFAULT NULL,
  `mig_col_name` text,
  `mig_col_roll` varchar(20) DEFAULT NULL,
  `mig_prev_year` varchar(20) DEFAULT NULL,
  `mig_prev_year_passing` varchar(5) DEFAULT NULL,
  `mig_marksheet` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `convener_status` tinyint(1) NOT NULL DEFAULT '0',
  `convener_reason` varchar(150) DEFAULT NULL,
  `convener_date` timestamp NULL DEFAULT NULL,
  `member_status` tinyint(1) NOT NULL DEFAULT '0',
  `member_reason` varchar(150) DEFAULT NULL,
  `member_date` timestamp NULL DEFAULT NULL,
  `screening_status` tinyint(1) NOT NULL DEFAULT '0',
  `screening_reason` varchar(150) DEFAULT NULL,
  `screening_date` timestamp NULL DEFAULT NULL,
  `email_verify` date DEFAULT NULL,
  `mob_verify` date DEFAULT NULL,
  `fee_paid` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `accademic_session` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '2024-25',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NULL DEFAULT NULL,
  `urn` varchar(255) DEFAULT NULL,
  `irdp` varchar(10) DEFAULT NULL,
  `ten_migration` varchar(255) DEFAULT NULL,
  `twelve_migration` varchar(255) DEFAULT NULL,
  `pres_stud_result` varchar(255) DEFAULT NULL,
  `pres_stud_tatal_marks` decimal(10,2) DEFAULT NULL,
  `pres_stud_obtain_marks` decimal(10,2) DEFAULT NULL,
  `pres_stud_marksheet` varchar(255) DEFAULT NULL,
  `is_od_stud` tinyint(1) NOT NULL DEFAULT '0',
  `session_id` int NOT NULL DEFAULT '2',
  `category_certificate` varchar(255) DEFAULT NULL,
  `misc_certificate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `mobile` bigint NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` tinyint NOT NULL,
  `active` tinyint NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `full_name`, `email`, `mobile`, `username`, `password`, `role`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, '', '', 0, 'admin@gmail.com', '12345678', 1, 1, '2024-10-29 13:50:19', '2024-10-29 08:18:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
