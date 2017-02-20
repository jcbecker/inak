-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 06:20 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inak`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `front` varchar(200) NOT NULL,
  `back` varchar(200) NOT NULL,
  `box_id` int(11) NOT NULL,
  `nextPlay` datetime NOT NULL,
  `id_deck` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `front`, `back`, `box_id`, `nextPlay`, `id_deck`) VALUES
(1, 'Ã‰ um pais da Europa', 'FranÃ§a', 0, '0000-00-00 00:00:00', 8),
(2, 'DadBad', 'Pai12', 0, '0000-00-00 00:00:00', 8),
(3, 'Mother12`', '`wekfkwef', 0, '0000-00-00 00:00:00', 8),
(4, 'pikachu', 'elÃ©trico', 0, '0000-00-00 00:00:00', 10),
(5, 'charmander', 'fogo', 0, '0000-00-00 00:00:00', 10),
(6, 'squirtle', 'agua', 0, '0000-00-00 00:00:00', 10),
(7, 'bulbasaur', 'grama', 0, '0000-00-00 00:00:00', 10),
(8, 'Pikachu', 'ElÃ©trico', 0, '0000-00-00 00:00:00', 11),
(9, 'Charmander', 'Charmeleon', 1, '2016-12-18 15:19:40', 12),
(10, 'Charmeleon', 'Charizard', 1, '2016-12-18 15:19:42', 12),
(11, 'Squirtle', 'Wartortle', 1, '2016-12-18 15:19:44', 12),
(12, 'Wartortle', 'Blastoise', 1, '2016-12-18 15:19:46', 12);

-- --------------------------------------------------------

--
-- Table structure for table `deck`
--

CREATE TABLE `deck` (
  `id_deck` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `shared` tinyint(1) NOT NULL,
  `nextCardPlay` datetime DEFAULT NULL,
  `ownerId` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deck`
--

INSERT INTO `deck` (`id_deck`, `name`, `shared`, `nextCardPlay`, `ownerId`) VALUES
(6, 'Deck1MAMA', 0, NULL, 'mama@gmail.com'),
(7, 'Deck2MAMA', 1, NULL, 'mama@gmail.com'),
(8, 'Italiano', 0, NULL, 'marcelopancotte@gmail.com2324'),
(9, 'Pasta', 0, NULL, 'meca@gmail.com'),
(10, 'perdi', 0, NULL, 'aaa@aaa'),
(11, 'PokÃ©mon', 0, NULL, 'anaelisa.puton@gmail.com'),
(12, 'PokemÃ£o', 0, NULL, 'oioi@oi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(90) NOT NULL,
  `password` varchar(256) NOT NULL,
  `picture` varchar(36) NOT NULL,
  `userName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `picture`, `userName`) VALUES
('oir@oir', '04f5c98ab110048e3a98e3637ca47a35a04c76c9', '', '04f5c98ab110048e3a98e3637ca47a35a04c76c9'),
('aaa@aaa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'userDefault.jpg', 'aaa'),
('anaelisa.puton@gmail.com', '7a0686e01448ffccd3f56670a2aa25c819c2c8be', 'userDefault.jpg', 'anaputon'),
('oi@oi', 'ef67e0868c98e5f0b0e2fcd9b0c4a3bad808f551', '', 'ef67e0868c98e5f0b0e2fcd9b0c4a3bad808f551'),
('mama@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'userDefault.jpg', 'mama'),
('marcelopancotte@gmail.com2324', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'userDefault.jpg', 'Marcelo Acordi111'),
('meca@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'userDefault.jpg', 'meca'),
('oioi@oi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'oi.jpg', 'oi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deck` (`id_deck`);

--
-- Indexes for table `deck`
--
ALTER TABLE `deck`
  ADD PRIMARY KEY (`id_deck`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `deck`
--
ALTER TABLE `deck`
  MODIFY `id_deck` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`id_deck`) REFERENCES `deck` (`id_deck`) ON DELETE CASCADE;

--
-- Constraints for table `deck`
--
ALTER TABLE `deck`
  ADD CONSTRAINT `deck_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
