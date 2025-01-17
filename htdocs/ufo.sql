-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 01:24 PM
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
-- Database: `ufo`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `localizacion` varchar(200) NOT NULL,
  `fecha` varchar(200) NOT NULL,
  `tiempo` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `localizacion`, `fecha`, `tiempo`, `descripcion`) VALUES
(27, 'Albania', '1907-07-05', '23:45', 'Mihal Grameno a distinguished Albanian journalist, writer, and activist writes in The Albanian Uprising, \"One night, while the fighters of Çerçiz were stationed at the top of a high mountain, a shiny '),
(29, 'Australia, Clayton South', '1966-06-04', '23:10', 'Several hundred students and school faculty from Westall High School watched an object land at the nearby Grange Reserve. '),
(31, 'wales', '2008-02-06', '12:55', 'Over the Bristol Channel, a South Wales Police helicopter took evasive actions to avoid what the crew described as a saucer-shaped UFO'),
(32, 'canada, harbour mile', '2002-12-25', '22:25', 'At least three UFOs that looked like missiles but emitted no noise were spotted over Harbour Mille'),
(33, 'norway, trondelang', '2009-12-10', '02:04', 'A failed Russian missile test produced a massive spiral light in the sky, visible from the northern counties of Norway and parts of Sweden.'),
(34, 'Gold Coast', '2010-03-12', '13:30', 'A local legend gained wider attention in the 1980s when resident Charlotte Mann claimed in interviews that her father, Reverend William Huffman of the Red Star Baptist Church, had administered last rites for the dying crew of a crashed flying saucer.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(91, 'admin', 'admin', 'admin'),
(96, 'felipe', 'felipe1234', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
