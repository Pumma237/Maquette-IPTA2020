-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 08 Juin 2018 à 14:27
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ipta2020`
--

-- --------------------------------------------------------

--
-- Structure de la table `conferences`
--

CREATE TABLE `conferences` (
  `id_conference` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(60) NOT NULL,
  `countries` varchar(60) NOT NULL,
  `place_maxi` varchar(10) NOT NULL,
  `place_dispo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `conferences`
--

INSERT INTO `conferences` (`id_conference`, `name`, `city`, `countries`, `place_maxi`, `place_dispo`) VALUES
(1, 'Conference Name', 'City Field', 'Countries Field', '0', 0),
(2, 'zaaa', 'aaa', 'aaaa', '8', 6),
(3, 'aaa', 'aaa', 'aaa', '8', 3);

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `id_conference` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `participation`
--

INSERT INTO `participation` (`id_conference`, `id_user`) VALUES
(1, 4),
(3, 4),
(3, 4),
(3, 4),
(3, 4),
(3, 4),
(3, 4),
(3, 4),
(2, 4),
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type_visite` varchar(30) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `email`, `type_visite`, `admin`) VALUES
(1, 'anoinegwada@gmail.com', 'antoine', 'anoinegwada@gmail.com', '', 1),
(2, 'aaa', 'aaa', 'aaa', 'student', 0),
(3, 'aaa', 'aaa', 'aaa', 'Professional', 0),
(4, 'Antoineguadeloupe@gmail.com', 'antoine', 'Antoineguadeloupe@gmail.com', 'Visitor', 0),
(5, 'Antoineguadeloupe@gmail.com', 'antoine', 'Antoineguadeloupe@gmail.com', 'Visitor', 0),
(6, 'Antoine@gmailaaa.com', 'aereze', 'Antoine@gmailaaa.com', 'student', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id_conference`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id_conference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
