-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2025 at 12:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_job_portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','jobseeker','jobprovider') NOT NULL DEFAULT 'admin',
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `role`, `status`, `created_at`) VALUES
(37, 'SANA  SATTAR', 'fd@gmail.com', '$2y$10$LaagzLKdCPSTENHlT8rl5.L5yWz7CgVsF..Awri6Ks10q9HO.g8S2', 'admin', 'Active', '2025-09-12 13:31:11'),
(44, 'SANA  SATTAR', 'admin1@gmail.com', '$2y$10$BNMsY1V50fJogb3PX9xI9.C85zrLJ180qkhurrP.WziKVq3DCeC8y', 'admin', 'Active', '2025-09-12 16:39:21'),
(45, 'SANA  SATTAR', 'irzahh@gmail.com', '$2y$10$6xeL6rDD8ce2LHt9j5Amnu8W12MB4/Pyztt3WVpshSw6IQMYs5JwS', 'admin', 'Active', '2025-09-14 10:57:51'),
(46, 'Javeria', 'javeria@gmail.com', '$2y$10$Evb4D1ZPeFjkDgo7UH8dh.BRR4In15O1lF9INed7xBP.v6VenDKca', 'admin', 'Active', '2025-09-27 10:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin_blogs`
--

CREATE TABLE `admin_blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `blog_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_blogs`
--

INSERT INTO `admin_blogs` (`id`, `title`, `content`, `image`, `blog_date`, `created_at`) VALUES
(1, 'gfdsa', 'GFDSqa', 'uploads/admin_blogs/1757508919_WhatsApp Image 2025-05-25 at 07.42.23_10f205e6.jpg', '2025-09-10', '2025-09-10 12:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `admin_career_levels`
--

CREATE TABLE `admin_career_levels` (
  `id` int(11) NOT NULL,
  `language` varchar(100) NOT NULL,
  `career_level` varchar(150) NOT NULL,
  `status` enum('Active','Inactive','Pending') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_career_levels`
--

INSERT INTO `admin_career_levels` (`id`, `language`, `career_level`, `status`, `created_at`) VALUES
(1, 'English', 'fds', 'Active', '2025-09-10 15:08:21'),
(2, 'English', 'gfd', 'Active', '2025-09-10 16:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `admin_companies`
--

CREATE TABLE `admin_companies` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `website` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` enum('Active','Inactive','Pending') DEFAULT 'Active',
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_companies`
--

INSERT INTO `admin_companies` (`id`, `name`, `industry`, `contact_person`, `email`, `phone`, `website`, `address`, `status`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Multimedia Design', 'Laboriosam quis est', 'Sana  Sattar', 'sanasattar057@gmail.com', '03367610382', 'http://www.comapnydomain.com', 'House No:24 ,11MPR,Gailly wala Lodhran, Punjab, Pakistan', 'Active', '1757507520_logo.jpg', '2025-09-10 12:32:00', '2025-09-10 12:34:21'),
(4, 'Multimedia Design', 'Laboriosam quis est', 'Sana  Sattar', 'sanasattar05@gmail.com', '03367610382', 'http://www.comapnydomain.com', 'House No:24 ,11MPR,Gailly wala Lodhran, Punjab, Pakistan', 'Pending', '1757507834_logo.jpg', '2025-09-10 12:37:14', '2025-09-10 12:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `admin_countries`
--

CREATE TABLE `admin_countries` (
  `id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `iso_code` varchar(10) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_degree_levels`
--

CREATE TABLE `admin_degree_levels` (
  `id` int(11) NOT NULL,
  `degree_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_degree_levels`
--

INSERT INTO `admin_degree_levels` (`id`, `degree_name`, `description`, `status`) VALUES
(1, 'gfds', ' bvcxz', 0),
(3, 'cxzxz', 'dsa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_degree_types`
--

CREATE TABLE `admin_degree_types` (
  `id` int(11) NOT NULL,
  `degree_type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_employer_packages`
--

CREATE TABLE `admin_employer_packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(150) NOT NULL,
  `job_posts` int(11) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `highlight` tinyint(1) DEFAULT 0,
  `urgent` tinyint(1) DEFAULT 0,
  `support` tinyint(1) DEFAULT 0,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_employer_packages`
--

INSERT INTO `admin_employer_packages` (`id`, `package_name`, `job_posts`, `duration`, `price`, `highlight`, `urgent`, `support`, `status`, `created_at`) VALUES
(1, 'ds', 32, '12 Days', 432.00, 0, 1, 0, 'Active', '2025-09-10 14:35:37'),
(2, 'fdsa', 4321, '12 Days', 432.00, 0, 1, 0, 'Active', '2025-09-10 14:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_faqs`
--

CREATE TABLE `admin_faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_faqs`
--

INSERT INTO `admin_faqs` (`id`, `question`, `answer`, `last_updated`) VALUES
(2, '<p>hgfdsaq&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>HGFDSA</p>', '2025-09-10 12:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `admin_functional_areas`
--

CREATE TABLE `admin_functional_areas` (
  `id` int(11) NOT NULL,
  `functional_area` varchar(150) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_functional_areas`
--

INSERT INTO `admin_functional_areas` (`id`, `functional_area`, `status`, `created_at`) VALUES
(2, 'Information Technology', 'Inactive', '2025-09-10 16:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `admin_genders`
--

CREATE TABLE `admin_genders` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_genders`
--

INSERT INTO `admin_genders` (`id`, `gender_name`, `status`, `created_at`) VALUES
(1, 'Male', 0, '2025-09-10 16:36:05'),
(2, 'Male', 1, '2025-09-10 16:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_industries`
--

CREATE TABLE `admin_industries` (
  `id` int(11) NOT NULL,
  `industry_name` varchar(150) NOT NULL,
  `industry_desc` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_industries`
--

INSERT INTO `admin_industries` (`id`, `industry_name`, `industry_desc`, `status`, `created_at`) VALUES
(3, 'gfdsad', 'dfgh', 1, '2025-09-10 17:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `admin_job_attributes`
--

CREATE TABLE `admin_job_attributes` (
  `id` int(11) NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `attribute_value` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_job_attributes`
--

INSERT INTO `admin_job_attributes` (`id`, `attribute_name`, `attribute_value`, `status`, `created_at`) VALUES
(2, 'fd', 'fdsa', 1, '2025-09-10 14:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `admin_job_experience`
--

CREATE TABLE `admin_job_experience` (
  `id` int(11) NOT NULL,
  `experience_title` varchar(255) NOT NULL,
  `experience_desc` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_job_experience`
--

INSERT INTO `admin_job_experience` (`id`, `experience_title`, `experience_desc`, `status`, `created_at`) VALUES
(2, 'hgfds', 'jhgfds', 0, '2025-09-10 17:16:22'),
(3, 'hgfds', 'jhgfds', 1, '2025-09-10 17:16:32'),
(4, 'trer', 'tre', 1, '2025-09-10 17:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_job_shifts`
--

CREATE TABLE `admin_job_shifts` (
  `id` int(11) NOT NULL,
  `shift_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_job_shifts`
--

INSERT INTO `admin_job_shifts` (`id`, `shift_name`, `status`, `created_at`) VALUES
(4, 'fgh', 1, '2025-09-10 18:36:25'),
(5, 'cxzCXZ', 0, '2025-09-10 18:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `admin_job_skills`
--

CREATE TABLE `admin_job_skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_job_skills`
--

INSERT INTO `admin_job_skills` (`id`, `skill_name`, `category`, `status`, `created_at`) VALUES
(1, 'gfdsfds', 'Frontend', 0, '2025-09-10 17:26:42'),
(2, 'gfdsfds', 'Frontend', 1, '2025-09-10 17:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `admin_job_titles`
--

CREATE TABLE `admin_job_titles` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_job_titles`
--

INSERT INTO `admin_job_titles` (`id`, `job_title`, `industry`, `status`, `created_at`) VALUES
(2, 'bgfvdcgfds', 'bvcxzc', 1, '2025-09-10 17:35:41'),
(3, 'hgfds', 'hgfdess', 0, '2025-09-10 17:41:53'),
(4, 'GFH', 'fgh', 0, '2025-09-10 17:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `admin_job_types`
--

CREATE TABLE `admin_job_types` (
  `id` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_job_types`
--

INSERT INTO `admin_job_types` (`id`, `job_type`, `description`, `status`) VALUES
(2, 'gfds', 'dwsa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_language_levels`
--

CREATE TABLE `admin_language_levels` (
  `id` int(11) NOT NULL,
  `language_code` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_language_levels`
--

INSERT INTO `admin_language_levels` (`id`, `language_code`, `level`, `status`, `created_at`) VALUES
(1, 'gfdsgfddsa', 'gfds', 1, '2025-09-10 15:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin_major_subjects`
--

CREATE TABLE `admin_major_subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_major_subjects`
--

INSERT INTO `admin_major_subjects` (`id`, `subject_name`, `description`, `status`, `created_at`) VALUES
(2, 'fvdcxsz', 'fdsa', 0, '2025-09-10 19:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `admin_manage_location`
--

CREATE TABLE `admin_manage_location` (
  `id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `iso_code` varchar(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_manage_location`
--

INSERT INTO `admin_manage_location` (`id`, `country`, `iso_code`, `state`, `city`, `status`) VALUES
(6, 'Pakistan', 'PAK', 'lfgh', 'Lodhran', 'Active'),
(7, 'Pakistan', 'PAK', 'l', 'Lodhran', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_marital_status`
--

CREATE TABLE `admin_marital_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `type` enum('job_post','other') DEFAULT 'job_post',
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_portal_users`
--

CREATE TABLE `admin_portal_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','jobseeker','jobprovider') NOT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_portal_users`
--

INSERT INTO `admin_portal_users` (`id`, `name`, `email`, `password`, `role`, `status`, `created_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', '123', 'admin', 'active', '2025-09-12 12:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `admin_result_grades`
--

CREATE TABLE `admin_result_grades` (
  `id` int(11) NOT NULL,
  `grade_name` varchar(10) NOT NULL,
  `min_percent` int(11) NOT NULL,
  `max_percent` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_result_grades`
--

INSERT INTO `admin_result_grades` (`id`, `grade_name`, `min_percent`, `max_percent`, `description`, `status`, `created_at`) VALUES
(5, 'rewqfg', 543, 5432, '543', 1, '2025-09-10 20:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `admin_seo_pages`
--

CREATE TABLE `admin_seo_pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_seo_pages`
--

INSERT INTO `admin_seo_pages` (`id`, `page_name`, `slug`, `meta_title`, `meta_description`, `keywords`, `last_updated`) VALUES
(4, 'hgfdsahgfdsa', 'jhgfdsa', 'gfdsa', 'hgfdsa', 'gfdsa', '2025-09-10 12:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `admin_site_languages`
--

CREATE TABLE `admin_site_languages` (
  `id` int(11) NOT NULL,
  `language_name` varchar(100) NOT NULL,
  `language_code` varchar(10) NOT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_site_languages`
--

INSERT INTO `admin_site_languages` (`id`, `language_name`, `language_code`, `flag`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ngfds', 'mbnfds', 'uploads/flags/1757511725.png', 'Active', '2025-09-10 13:42:05', '2025-09-10 13:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `admin_system_users`
--

CREATE TABLE `admin_system_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','jobseeker','jobprovider') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_system_users`
--

INSERT INTO `admin_system_users` (`id`, `name`, `email`, `password`, `role`, `status`, `created_at`) VALUES
(33, 'Sana Sattar', 'admin123@gmail.com', '$2y$10$jPD.Cgl3OIJti7C5hAfry.qswxQwRrk5.AFy0rz5k9Tw7.Cwm1UlK', 'admin', 'Active', '2025-09-16 06:46:50'),
(34, 'Sana', 'admin@gmail.com', '$2y$10$G1ouPuwPVPW3gUo8QbIyd.YvXx6dweKA8A9HfT37MVUfD.VtEmm6S', 'admin', 'Inactive', '2025-09-16 06:50:08'),
(37, 'JobProvider', 'provider123@gmail.com', '$2y$10$LjJxr7muE51Ar1Jng6.9NuvL9nJCBrcs7syhWDD26D69k25RPma5m', 'jobprovider', 'Active', '2025-09-16 06:57:15'),
(38, 'seeker', 'seeker123@gmail.com', '$2y$10$/S4ZHD9gWRO3n/fAp8N64uVQ1mSfKvipd13VUhVsGCanLd59qfIjK', 'jobseeker', 'Active', '2025-09-16 06:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `admin_testimonials`
--

CREATE TABLE `admin_testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `review` text NOT NULL,
  `review_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_testimonials`
--

INSERT INTO `admin_testimonials` (`id`, `name`, `image`, `review`, `review_date`) VALUES
(4, 'jhgfdsagfdsafvdcZXA', '1757510949_13.png', 'JHGFDSAq', '2025-09-12');

-- --------------------------------------------------------

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_blogs`
--
ALTER TABLE `admin_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_career_levels`
--
ALTER TABLE `admin_career_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_companies`
--
ALTER TABLE `admin_companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_countries`
--
ALTER TABLE `admin_countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country` (`country`);

--
-- Indexes for table `admin_degree_levels`
--
ALTER TABLE `admin_degree_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_degree_types`
--
ALTER TABLE `admin_degree_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_employer_packages`
--
ALTER TABLE `admin_employer_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_faqs`
--
ALTER TABLE `admin_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_functional_areas`
--
ALTER TABLE `admin_functional_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_genders`
--
ALTER TABLE `admin_genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_industries`
--
ALTER TABLE `admin_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_jobs`
--
ALTER TABLE `admin_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_job_attributes`
--
ALTER TABLE `admin_job_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_job_experience`
--
ALTER TABLE `admin_job_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_job_shifts`
--
ALTER TABLE `admin_job_shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_job_skills`
--
ALTER TABLE `admin_job_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_job_titles`
--
ALTER TABLE `admin_job_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_job_types`
--
ALTER TABLE `admin_job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_language_levels`
--
ALTER TABLE `admin_language_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_major_subjects`
--
ALTER TABLE `admin_major_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_manage_location`
--
ALTER TABLE `admin_manage_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_marital_status`
--
ALTER TABLE `admin_marital_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Indexes for table `admin_portal_users`
--
ALTER TABLE `admin_portal_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_result_grades`
--
ALTER TABLE `admin_result_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_seo_pages`
--
ALTER TABLE `admin_seo_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `admin_site_languages`
--
ALTER TABLE `admin_site_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_system_users`
--
ALTER TABLE `admin_system_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_testimonials`
--
ALTER TABLE `admin_testimonials`
  ADD PRIMARY KEY (`id`);



--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `career_levels`
--
ALTER TABLE `career_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degree_levels`
--
ALTER TABLE `degree_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `degree_types`
--
ALTER TABLE `degree_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employer_packages`
--
ALTER TABLE `employer_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `functional_areas`
--
ALTER TABLE `functional_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `job_attributes`
--
ALTER TABLE `job_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_experience`
--
ALTER TABLE `job_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_shifts`
--
ALTER TABLE `job_shifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `language_levels`
--
ALTER TABLE `language_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `major_subjects`
--
ALTER TABLE `major_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manage_location`
--
ALTER TABLE `manage_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portal_users`
--
ALTER TABLE `portal_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result_grades`
--
ALTER TABLE `result_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seo_pages`
--
ALTER TABLE `seo_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_languages`
--
ALTER TABLE `site_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`provider_id`) REFERENCES `system_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
