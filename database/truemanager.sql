-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2017 at 02:34 AM
-- Server version: 5.7.16
-- PHP Version: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caffeine`
--
CREATE DATABASE IF NOT EXISTS `caffeine` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `caffeine`;

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

DROP TABLE IF EXISTS `rewards`;
CREATE TABLE IF NOT EXISTS `rewards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `title`, `description`) VALUES
(1, 'Первый старт', 'Успешно завершите свой первый проект'),
(2, 'Начинающий руководитель', 'Успешно завершите 10 проектов'),
(3, 'Бизнесмен', 'Успешно завершите 30 проектов'),
(4, 'Прирожденный управленец', 'Успешно завершите 50 проектов'),
(5, 'Мастер управления проектами', 'Успешно завершите 100 проектов'),
(6, 'Неудачник', 'Провалите хотя бы один проект'),
(7, 'Одни убытки', 'Выйдите за рамки бюджета');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `games` int(11) NOT NULL DEFAULT '0',
  `wins` int(11) NOT NULL DEFAULT '0',
  `loses` int(11) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `vcode` int(11) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `vcode` (`vcode`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role_id`, `created`, `modified`, `games`, `wins`, `loses`, `score`, `vcode`, `is_confirmed`) VALUES
(6, 'vecryd@gmail.com', 'vecryd', '$2a$10$i5LPTLzId7dRs0FbR/n7l.xPx2IB7HYRH4EPyZiNx52YFMc0DuhRS', 1, '2017-06-16 19:20:19', '2017-06-17 20:36:33', 18, 11, 7, 1450, 0, 1),
(7, 'look@yahoo.com', 'look', '$2a$10$DgNeT.0rXRjGq9pkWF/HCeW9xLRT2djfuA9T4u4TMxNdIH.eMBGsK', 2, '2017-06-16 19:47:34', '2017-06-16 19:48:58', 3, 2, 1, 250, 1, 1),
(9, 'vecryd@gmail.com', 'thorian', '$2a$10$xGzZrl87HM77TVdF9z0/5uB7CnKfKdjEh3aABINPYJ5MBzknQZNSq', 2, '2017-06-16 19:59:50', '2017-06-16 20:01:45', 0, 0, 0, 0, 1497607190, 1),
(11, 'vecryd@gmail.com', 'noob', '$2a$10$Q28XLfCy4hvvDnHAzOFKcuirvNlIj09yW03tc.2LEA0YlDVZmg8Su', 2, '2017-06-17 18:33:24', '2017-06-17 18:40:33', 0, 0, 0, 0, 1497688404, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_rewards`
--

DROP TABLE IF EXISTS `users_rewards`;
CREATE TABLE IF NOT EXISTS `users_rewards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reward_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `reward_id` (`reward_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_rewards`
--

INSERT INTO `users_rewards` (`id`, `user_id`, `reward_id`) VALUES
(7, 6, 1),
(8, 6, 2),
(9, 6, 6),
(10, 6, 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users_rewards`
--
ALTER TABLE `users_rewards`
  ADD CONSTRAINT `FK_reward` FOREIGN KEY (`reward_id`) REFERENCES `rewards` (`id`),
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
