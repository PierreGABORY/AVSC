-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 08 jan. 2019 à 10:15
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `avsc`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `verified`, `token`, `password`) VALUES
(3, 'pierregabory@hotmail.fr', 1, 'cd92bfc2db5eac6f62ef226e4def2996059a7560f385e33d269edd27c1f47dcc9b5cf74524b8595be006a030b5e024c9ac58', '$2y$10$X1bq/OeVG57JPDad6gs11uCwuBFH7eutScfxhyaG98kuF4IoNWpGi'),
(7, 'gabory.pierreg@gmail.com', 0, 'f2a4164d51c8ce5f67216ac562e883dd222e35cf7416a40cc362eefcf9a22ec9a71fb578873b5b4693f1c626bd766cb7005f', '$2y$10$sVPxcz/9d.D6pN6YAlQFDeDGWhjpxZVCRa6iwZVNnBIMcuKJH8EXy'),
(8, 'pierre.gabory1@etu.univ-nantes.fr', 0, 'b4c4ee7eebced80bdc395b3a71287e108f5b6dbfa9b4d8b5e6f11b789690893d17ed0f5c843214278a65673ba57143455031', '$2y$10$ByRn2q6WIjMEGCaR6QtX6u1UeZPb3W1UPAvMh44wbsmJF.fBTjoxW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
