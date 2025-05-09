-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 10:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27


drop database if exists hotel;
create database hotel;
use hotel;

drop user if exists 'hotel'@'localhost';
flush privileges;
CREATE USER 'hotel'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON hotel.* TO 'hotel'@'localhost' ;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `text` varchar(500) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `image`, `title`, `text`, `date`) VALUES
(1, 'news1.jpg', 'HEB', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop pu', '2022-09-30 22:00:00'),
(2, 'news2.jpg', 'Sandoz Inc', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bono', '2022-10-09 22:00:00'),
(3, 'news3.jpg', 'Jets, Sets, & Elephants Beauty Corp.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a diction', '2022-10-10 22:00:00'),
(4, 'news4.jpg', 'New Library in Town', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures,', '2022-10-10 22:00:00'),
(5, 'news5.jpg', 'Park in Closer to ├Üs', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem  reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2022-10-10 22:00:00'),
(6, 'news6.jpg', 'New Trasport System', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem I or non-characteristic words etc.', '2022-10-10 22:00:00'),
(7, 'news7.jpg', 'Massage Room', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All . It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generat', '2022-10-10 22:00:00'),
(8, 'news8.jpg', 'Swimming Pool is Now Open!', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2022-10-10 22:00:00'),
(9, 'news9.jpg', 'Cashdispenser is Now Working Again!', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in t over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from rep', '2022-10-10 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `username` varchar(50) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`username`, `news_id`) VALUES
('administrator', 1),
('administrator', 2),
('administrator', 3),
('administrator', 4),
('administrator', 5),
('administrator', 6),
('administrator', 7),
('administrator', 8),
('administrator', 9);

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `username` varchar(50) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `from_date` timestamp NULL DEFAULT NULL,
  `to_date` timestamp NULL DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `has_animal` varchar(50) DEFAULT NULL,
  `has_parking` varchar(50) DEFAULT NULL,
  `has_breakfast` varchar(50) DEFAULT NULL,
  `reserved_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_approved` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`username`, `room_id`, `from_date`, `to_date`, `price`, `has_animal`, `has_parking`, `has_breakfast`, `reserved_on`, `is_approved`) VALUES
('edison', 3, '2023-01-15 23:00:00', '2023-01-17 23:00:00', 82, '1', '1', '1', '2023-01-15 20:22:40', '1'),
('edison', 6, '2023-01-17 23:00:00', '2023-01-18 23:00:00', 19, '0', '1', '0', '2023-01-15 20:23:05', '0'),
('johny', 4, '2023-01-18 23:00:00', '2023-01-21 23:00:00', 90, '0', '1', '1', '2023-01-15 20:21:01', '1'),
('trump', 1, '2023-01-15 23:00:00', '2023-01-17 23:00:00', 124, '0', '0', '0', '2023-01-15 20:19:05', '0'),
('trump', 1, '2023-01-18 23:00:00', '2023-01-20 23:00:00', 148, '1', '0', '1', '2023-01-15 20:19:25', '0'),
('trump', 3, '2023-01-20 23:00:00', '2023-01-21 23:00:00', 41, '1', '0', '1', '2023-01-15 20:38:05', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `price`, `img`) VALUES
(1, 62, 'room1.jpg'),
(2, 38, 'room2.jpg'),
(3, 24, 'room3.jpg'),
(4, 18, 'room4.jpg'),
(5, 74, 'room5.jpg'),
(6, 14, 'room6.jpg'),
(7, 31, 'room7.jpg'),
(8, 36, 'room8.jpg'),
(9, 51, 'room9.jpg'),
(10, 20, 'room10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `first_name`, `last_name`, `email`, `gender`, `password`, `title`, `is_admin`, `is_active`) VALUES
('administrator', 'admin', 'admin', 'admin@hotel.com', 'man', '$2y$10$C6rPHEPk.4NUHoLQ/xZGJeg2CrELqAFFi6jlLjznd2QcX1qkE3M9K', 'Mr', 1, 1),
('edison', 'Tomas', 'Edison', 'edison@gmail.com', 'man', '$2y$10$hZoYVxXvKyvCcJw40XW4lOH3ZzjsnV8my4QeJAnMb.a.wSGRJuWoC', 'Mr', 0, 0),
('gates', 'Bill', 'Gates', 'gates@microsoft.com', 'man', '$2y$10$.W7zp0MdBre/oW.sUl6xHOkIdExCPYqeaNjQ02xEXDvI3rInltEne', 'Mr', 0, 1),
('Huber', 'Christian', 'Huber', 'Huber@fh.com', 'man', '$2y$10$0MtV0lldoE81U7DCTqNxFO1UNBOn8keBt1dGtaaQNyXK9Z19plMI.', 'Mr', 0, 1),
('johny', 'Johny', 'Depp', 'dep@yahoo.com', 'man', '$2y$10$UUAme34fvHWgMh1qcnqVHOM9idhEBrzLHy9tFCFhaPEf/.GASGF9y', 'Mr', 0, 1),
('joilie', 'Angelina', 'Jolie', 'jolie@hollywood.com', 'woman', '$2y$10$8Zyc3cEvJWJg5FYX1QQC5eoOxmK50Tsj72EesxSw/7E4L8tzAMhIm', 'Mr', 0, 0),
('kazem', 'Kazem', 'Gholibeigian', 'gholibeigian@gmail.com', 'man', '$2y$10$0YVSOXfuc4iklD87UXNHZ.A8BjeTI83YE5oqzrI/ACAFLfDvzRXNS', 'Mr', 1, 1),
('obama', 'Barak', 'Obama', 'obama@gmx.at', 'man', '$2y$10$Dsofp8FHA64KCyMB9BRw9uK8yi3Fn2tEfs5bZ6O2AiBrPV54AEHUm', 'Mr', 0, 0),
('Rohatsch', 'Lukas', 'Rohatsch', 'Rohatsch@fh.at', 'man', '$2y$10$0I/7g9xbuR0EZzdtZGBSFe3KYd77hvAAIRaM.QIs4eaIpIlpT.Ilq', 'Mr', 0, 1),
('Rongitsch', 'Thomas', 'Rongitsch', 'Rongitsch@fh.at', 'man', '$2y$10$tWUvEBvreW.UdGoL2E.w2ejB./bTzPRJoBn0MpTMBviS15X.Lgph6', 'Mr', 0, 1),
('trump', 'Donald', 'Trump', 'trump@trump.com', 'man', '$2y$10$ZIlNflCRPkDG3T3oeua15.8fCBm0gahcYMf/FP5GioXNmPNo4Tnm6', 'Mr', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`username`,`news_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`username`,`reserved_on`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`news_id`);

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `reserves_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
