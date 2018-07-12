-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 12 juil. 2018 à 16:30
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum3`
--

-- --------------------------------------------------------

--
-- Structure de la table `f_categories`
--

DROP TABLE IF EXISTS `f_categories`;
CREATE TABLE IF NOT EXISTS `f_categories` (
  `id_categories` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categories`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `f_membres`
--

DROP TABLE IF EXISTS `f_membres`;
CREATE TABLE IF NOT EXISTS `f_membres` (
  `id_membres` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motdepasse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_membres`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `f_membres`
--

INSERT INTO `f_membres` (`id_membres`, `mail`, `motdepasse`, `pseudo`) VALUES
(6, 'aa1@gmail.com', '9ab263b1ad3d74d8b74da0e2a52cdb9eb2ce3737', 'AA2'),
(7, 'alexis1@gmail.com', '1df56c06834633d16e6cddd461e99c30de0da05e', 'alexis');

-- --------------------------------------------------------

--
-- Structure de la table `f_message`
--

DROP TABLE IF EXISTS `f_message`;
CREATE TABLE IF NOT EXISTS `f_message` (
  `id_messages` int(11) NOT NULL AUTO_INCREMENT,
  `date_heure_post` timestamp NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_topic` int(11) NOT NULL,
  PRIMARY KEY (`id_messages`),
  KEY `f_message_f_topic_FK` (`id_topic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `f_topic`
--

DROP TABLE IF EXISTS `f_topic`;
CREATE TABLE IF NOT EXISTS `f_topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `titre_topic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_topic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_membres` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `f_topic_f_membres_FK` (`id_membres`),
  KEY `f_topic_f_categories0_FK` (`id_categories`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `f_message`
--
ALTER TABLE `f_message`
  ADD CONSTRAINT `f_message_f_topic_FK` FOREIGN KEY (`id_topic`) REFERENCES `f_topic` (`id_topic`);

--
-- Contraintes pour la table `f_topic`
--
ALTER TABLE `f_topic`
  ADD CONSTRAINT `f_topic_f_categories0_FK` FOREIGN KEY (`id_categories`) REFERENCES `f_categories` (`id_categories`),
  ADD CONSTRAINT `f_topic_f_membres_FK` FOREIGN KEY (`id_membres`) REFERENCES `f_membres` (`id_membres`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
