-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 18, 2021 at 10:50 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `yachting`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) UNSIGNED NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `numbber_of_adult` int(11) DEFAULT NULL,
  `numbber_of_children` int(11) DEFAULT NULL,
  `bookable_id` int(10) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `bookable_type` varchar(50) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT '2' COMMENT 'status default pending: 2',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `reference`, `place_id`, `user_id`, `numbber_of_adult`, `numbber_of_children`, `bookable_id`, `date`, `end_date`, `name`, `email`, `phone_number`, `message`, `bookable_type`, `type`, `status`, `created_at`, `updated_at`) VALUES
(132, '131200521', NULL, 10, 1, 0, 2, '2021-05-20', '2021-05-27', 'zakaria labib', 'zakarialabib@gmail.com', '066666666', NULL, 'App\\Models\\Package', 1, 1, '2021-05-20 10:23:41', '2021-05-28 16:38:14'),
(133, '132210521', NULL, NULL, 10, 0, 1, '2021-05-21', '2021-05-24', 'zakaria', 'zakarialabib@gmail.com', '066666666', NULL, 'App\\Models\\Package', 1, 2, '2021-05-21 11:44:26', '2021-05-21 11:44:26'),
(134, '2105288672689', NULL, 10, 1, 0, 1, '2021-05-28', '2021-05-31', 'super-admin', 'k@gmail.com', '066666666', NULL, 'App\\Models\\Package', 1, 2, '2021-05-28 16:34:19', '2021-05-28 16:34:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_booking_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `user_id_booking_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
