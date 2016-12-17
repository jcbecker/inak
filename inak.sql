-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 20/09/2016 às 14:57
-- Versão do servidor: 5.5.50-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `inak`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `front` varchar(200) NOT NULL,
  `back` varchar(200) NOT NULL,
  `lastPlay` datetime NOT NULL,
  `nextPlay` datetime NOT NULL,
  `id_deck` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deck` (`deck`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `deck`
--

CREATE TABLE IF NOT EXISTS `deck` (
  `id_deck` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `shared` tinyint(1) NOT NULL,
  `nextCardPlay` datetime DEFAULT NULL,
  `ownerId` varchar(90) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(90) NOT NULL,
  `password` varchar(256) NOT NULL,
  `picture` varchar(36) NOT NULL,
  `userName` varchar(40) NOT NULL,
  PRIMARY KEY (`userName`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `user`
--

INSERT INTO `user` (`email`, `password`, `picture`, `userName`) VALUES
('oir@oir', '04f5c98ab110048e3a98e3637ca47a35a04c76c9', '', '04f5c98ab110048e3a98e3637ca47a35a04c76c9'),
('oi@oi', 'ef67e0868c98e5f0b0e2fcd9b0c4a3bad808f551', '', 'ef67e0868c98e5f0b0e2fcd9b0c4a3bad808f551');

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`deck`) REFERENCES `deck` (`id_deck`) ON DELETE CASCADE;

--
-- Restrições para tabelas `deck`
--
ALTER TABLE `deck`
  ADD CONSTRAINT `deck_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
