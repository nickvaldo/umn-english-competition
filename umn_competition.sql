-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 11:52 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umn_competition`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$/RHovbe8JZ5iOzSQ3jeq3.EhL/lL.YJGnG4NS4NHMVZjY8PzqaeLC', 'Accounting', 'Week', 'Administrator', 'christina.carter@example.org', '2018-09-07 09:51:02', '2018-09-07 09:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `educational_stages`
--

CREATE TABLE `educational_stages` (
  `id` int(10) UNSIGNED NOT NULL,
  `educational_stage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educational_stages`
--

INSERT INTO `educational_stages` (`id`, `educational_stage`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'SMA/SMK', 0, '2018-09-07 09:51:03', '2018-09-07 09:51:03'),
(2, 'Universitas', 0, '2018-09-07 09:51:03', '2018-09-07 09:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `educational_stage_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` double(8,2) NOT NULL DEFAULT '0.00',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `term_id`, `educational_stage_id`, `username`, `password`, `team_name`, `institution_name`, `institution_address`, `points`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'first_institution', '$2y$10$5xygx2IpijxA0L/lLfRjZudvWTDWtp0jLOjS3hProErtuho/a5mGa', 'The Free Louses', 'Hawking Academy', '948 Peninsula Drive Ringgold, GA 30736', 0.00, 0, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(2, 1, 1, 'second_institution', '$2y$10$ZJcGJmW.YxFaPozZ/OQZ1uTtN2IhBhw.DwR.JgxEqoLo.yz2EnF.e', 'The Afraid Monkeys', 'Summerfield Academy', '9757 Carson Dr.Saint Paul, MN 55104', 0.00, 0, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(3, 2, 2, 'third_institution', '$2y$10$QH08Zs.a0yisxQPyVZlFW.6G4TfxHk4s9hHei7WkhCgZ/v01jHTHW', 'The Racial Lobsters', 'Oakland School of Fine Arts', '33 East Rockcrest Lane Wellington, FL 33414', 0.00, 0, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(4, 2, 2, 'fourth_institution', '$2y$10$0ScGkkW9dV.5IdFE4CES3Oikr8rRofcAjQ0Co/w0foV0qtSaJpI.a', 'The Motionless Flys', 'Grapevine University', '9691 Ocean Lane Elkridge, MD 21075', 0.00, 0, '2018-09-07 09:51:04', '2018-09-07 09:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `login_sessions`
--

CREATE TABLE `login_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `institution_id` int(10) UNSIGNED NOT NULL,
  `active_at` timestamp NULL DEFAULT NULL,
  `active_device` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_sessions`
--

INSERT INTO `login_sessions` (`id`, `institution_id`, `active_at`, `active_device`, `created_at`, `updated_at`) VALUES
(1, 1, '1989-12-31 17:00:00', NULL, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(2, 2, '1989-12-31 17:00:00', NULL, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(3, 3, '1989-12-31 17:00:00', NULL, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(4, 4, '1989-12-31 17:00:00', NULL, '2018-09-07 09:51:04', '2018-09-07 09:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternative_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `alternative_description`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'assets/upload/logo/omzO7yZQbdg7sLeWVQu6Mu07yW2lQSLQnsvMLnva.png', 'Logo Universitas Multimedia Nusantara', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(2, 'assets/upload/logo/lNN5g8qCZMFowkJera3B78duSK2ZNH34FrTeKiAD.png', 'Logo HIMTARA Universitas Multimedia Nusantara', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(3, 'assets/upload/logo/qFakzZjyVO43wXpXgUlzb2Zy1ZgeP7yy2fyPW7QU.jpeg', 'Logo Accounting Week 2015 Universitas Multimedia Nusantara', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_05_16_062020_create_periods_table', 1),
(2, '2018_05_16_062729_create_educational_stages_table', 1),
(3, '2018_05_16_062841_create_terms_table', 1),
(4, '2018_05_16_063841_create_institutions_table', 1),
(5, '2018_05_16_064700_create_students_table', 1),
(6, '2018_05_16_065849_create_login_sessions_table', 1),
(7, '2018_05_16_070125_create_questions_table', 1),
(8, '2018_05_16_070835_create_slides_table', 1),
(9, '2018_05_16_070929_create_logos_table', 1),
(10, '2018_05_16_071007_create_rules_table', 1),
(11, '2018_05_16_071128_create_titles_table', 1),
(12, '2018_05_30_082710_create_admin_table', 1),
(13, '2018_09_05_150345_create_tr_question_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `year`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 2017, 0, '2018-09-07 09:51:03', '2018-09-07 09:51:03'),
(2, 2018, 0, '2018-09-07 09:51:03', '2018-09-07 09:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `educational_stage_id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fourth_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` enum('A','B','C','D') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `term_id`, `educational_stage_id`, `question`, `first_option`, `second_option`, `third_option`, `fourth_option`, `answer`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(2, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(3, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(4, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(5, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(6, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:04', '2018-09-07 09:51:04'),
(7, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(8, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(9, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(10, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(11, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(12, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(13, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(14, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(15, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(16, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(17, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(18, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(19, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05'),
(20, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'vILRU8UHZEhOflgWz9Yx', 'I0Z1a2GNt3UFZjcS5gSJ', 't53IFUP5zakjgMnQlKgu', 'k9zKUqJZi7QDQZtoZhvw', 'A', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `title`, `description`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'PRE Elimination Test Accounting Week 5 Rule', 'Default Rule', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `institution_id` int(10) UNSIGNED NOT NULL,
  `identity_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_type` enum('KTP','SIM A','SIM B','SIM C','Passport') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `period_id` int(10) UNSIGNED NOT NULL,
  `educational_stage_id` int(10) UNSIGNED NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_question` int(11) NOT NULL DEFAULT '100',
  `login_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `test_datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tolerance_datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `period_id`, `educational_stage_id`, `term`, `number_of_question`, `login_datetime`, `test_datetime`, `tolerance_datetime`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'SMA/SMK PRE Elimination Test 2017', 100, '2018-09-07 01:00:00', '2018-09-07 02:00:00', '2018-09-07 04:00:00', 0, '2018-09-07 09:51:03', '2018-09-07 09:51:03'),
(2, 1, 2, 'Universitas PRE Elimination Test 2017', 100, '2018-09-07 05:00:00', '2018-09-07 06:00:00', '2018-09-07 08:00:00', 0, '2018-09-07 09:51:03', '2018-09-07 09:51:03'),
(3, 2, 1, 'SMA/SMK PRE Elimination Test 2018', 100, '2018-09-07 01:00:00', '2018-09-07 02:00:00', '2018-09-07 04:00:00', 0, '2018-09-07 09:51:03', '2018-09-07 09:51:03'),
(4, 2, 2, 'Universitas PRE Elimination Test 2018', 100, '2018-09-07 05:00:00', '2018-09-07 06:00:00', '2018-09-07 08:00:00', 0, '2018-09-07 09:51:03', '2018-09-07 09:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'PRE Elimination Test Accounting Week 5', 0, '2018-09-07 09:51:05', '2018-09-07 09:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `tr_question`
--

CREATE TABLE `tr_question` (
  `id` int(10) UNSIGNED NOT NULL,
  `soal_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_opt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_opt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_opt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forth_opt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mod_soal` int(10) UNSIGNED NOT NULL,
  `answer_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_close` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_stages`
--
ALTER TABLE `educational_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `institutions_username_unique` (`username`),
  ADD KEY `institutions_term_id_foreign` (`term_id`),
  ADD KEY `institutions_educational_stage_id_foreign` (`educational_stage_id`);

--
-- Indexes for table `login_sessions`
--
ALTER TABLE `login_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_sessions_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_term_id_foreign` (`term_id`),
  ADD KEY `questions_educational_stage_id_foreign` (`educational_stage_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_period_id_foreign` (`period_id`),
  ADD KEY `terms_educational_stage_id_foreign` (`educational_stage_id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_question`
--
ALTER TABLE `tr_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tr_question_soal_id_foreign` (`soal_id`),
  ADD KEY `tr_question_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `educational_stages`
--
ALTER TABLE `educational_stages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login_sessions`
--
ALTER TABLE `login_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tr_question`
--
ALTER TABLE `tr_question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `institutions`
--
ALTER TABLE `institutions`
  ADD CONSTRAINT `institutions_educational_stage_id_foreign` FOREIGN KEY (`educational_stage_id`) REFERENCES `educational_stages` (`id`),
  ADD CONSTRAINT `institutions_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`);

--
-- Constraints for table `login_sessions`
--
ALTER TABLE `login_sessions`
  ADD CONSTRAINT `login_sessions_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_educational_stage_id_foreign` FOREIGN KEY (`educational_stage_id`) REFERENCES `educational_stages` (`id`),
  ADD CONSTRAINT `questions_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`);

--
-- Constraints for table `terms`
--
ALTER TABLE `terms`
  ADD CONSTRAINT `terms_educational_stage_id_foreign` FOREIGN KEY (`educational_stage_id`) REFERENCES `educational_stages` (`id`),
  ADD CONSTRAINT `terms_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`);

--
-- Constraints for table `tr_question`
--
ALTER TABLE `tr_question`
  ADD CONSTRAINT `tr_question_soal_id_foreign` FOREIGN KEY (`soal_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `tr_question_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `institutions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
