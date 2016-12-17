-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Dez-2016 às 17:55
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

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
-- Estrutura da tabela `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `front` varchar(200) NOT NULL,
  `back` varchar(200) NOT NULL,
  `lastPlay` datetime NOT NULL,
  `nextPlay` datetime NOT NULL,
  `id_deck` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `card`
--

INSERT INTO `card` (`id`, `front`, `back`, `lastPlay`, `nextPlay`, `id_deck`) VALUES
(1, 'Ã‰ um pais da Europa', 'FranÃ§a', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8),
(2, 'DadBad', 'Pai12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8),
(3, 'Mother12`', '`wekfkwef', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `deck`
--

CREATE TABLE `deck` (
  `id_deck` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `shared` tinyint(1) NOT NULL,
  `nextCardPlay` datetime DEFAULT NULL,
  `ownerId` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `deck`
--

INSERT INTO `deck` (`id_deck`, `name`, `shared`, `nextCardPlay`, `ownerId`) VALUES
(6, 'Deck1MAMA', 0, NULL, 'mama@gmail.com'),
(7, 'Deck2MAMA', 1, NULL, 'mama@gmail.com'),
(8, 'Italiano', 0, NULL, 'marcelopancotte@gmail.com2324'),
(9, 'Pasta', 0, NULL, 'meca@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `email` varchar(90) NOT NULL,
  `password` varchar(256) NOT NULL,
  `picture` varchar(36) NOT NULL,
  `userName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`email`, `password`, `picture`, `userName`) VALUES
('oir@oir', '04f5c98ab110048e3a98e3637ca47a35a04c76c9', '', '04f5c98ab110048e3a98e3637ca47a35a04c76c9'),
('oi@oi', 'ef67e0868c98e5f0b0e2fcd9b0c4a3bad808f551', '', 'ef67e0868c98e5f0b0e2fcd9b0c4a3bad808f551'),
('mama@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'userDefault.jpg', 'mama'),
('marcelopancotte@gmail.com2324', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'userDefault.jpg', 'Marcelo Acordi111'),
('meca@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'userDefault.jpg', 'meca');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `deck`
--
ALTER TABLE `deck`
  MODIFY `id_deck` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`id_deck`) REFERENCES `deck` (`id_deck`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `deck`
--
ALTER TABLE `deck`
  ADD CONSTRAINT `deck_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
