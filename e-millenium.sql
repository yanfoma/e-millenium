-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Janvier 2017 à 00:10
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `welearn`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `mot_de_passe` char(40) NOT NULL,
  `user_phone` varchar(13) NOT NULL COMMENT 'numéro de telephone',
  `adresse_email` varchar(128) NOT NULL,
  `hash_validation` char(32) NOT NULL,
  `date_inscription` date NOT NULL,
  `user_avatar` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `user_name`, `mot_de_passe`, `user_phone`, `adresse_email`, `hash_validation`, `date_inscription`, `user_avatar`) VALUES
(7, 'justin KABORE', '7c4a8d09ca3762af61e59520943dc26494f8941b', '78285587', 'juskab01@yahoo.fr', '', '2017-01-04', ''),
(9, 'justin KABO', '7c4a8d09ca3762af61e59520943dc26494f8941b', '71277171', 'juskab02@yahoo.fr', 'ab7a3c212a3d0d61128215ffa80f1e78', '2017-01-04', ''),
(11, 'justin KABORE', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '71277172', 'juskab03@yahoo.fr', '2931364585a32482addaca7079b60518', '2017-01-04', ''),
(24, 'justin KABORES', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '78285588', 'juskab04@yahoo.fr', '46fb3c3656a1b35e5aa1d1f5d92f993b', '2017-01-04', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adresse_email` (`adresse_email`),
  ADD UNIQUE KEY `user_phone` (`user_phone`),
  ADD KEY `mot_de_passe` (`mot_de_passe`),
  ADD KEY `user_name_2` (`user_name`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
