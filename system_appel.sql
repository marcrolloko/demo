-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 sep. 2024 à 15:22
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `system_appel`
--

-- --------------------------------------------------------

--
-- Structure de la table `appel_offre`
--

DROP TABLE IF EXISTS `appel_offre`;
CREATE TABLE IF NOT EXISTS `appel_offre` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(300) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `date_limite` date DEFAULT NULL,
  `ID_type_ap` int DEFAULT NULL,
  `fichier` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_type_ap` (`ID_type_ap`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `appel_offre`
--

INSERT INTO `appel_offre` (`ID`, `titre`, `description`, `date_limite`, `ID_type_ap`, `fichier`) VALUES
(10, 'E-offre', '  il s\'agit de créer une application de gestion d\'appel d\'offre', '2024-10-31', NULL, ''),
(12, 'E-juriste ', '  créer une application afin de la mettre à la disposition des juristes de l\'entreprise pour une prestation efficace ', '2024-09-27', 8, ''),
(17, 'E-CNPS ', 'marc', '2024-09-29', 1, 'CV MARC OLLOKO.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `liste_creation_comptes`
--

DROP TABLE IF EXISTS `liste_creation_comptes`;
CREATE TABLE IF NOT EXISTS `liste_creation_comptes` (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_ID` int UNSIGNED NOT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `liste_creation_comptes`
--

INSERT INTO `liste_creation_comptes` (`ID`, `user_ID`, `Date`) VALUES
(1, 2, '2024-08-19 09:37:41'),
(2, 3, '2024-08-19 15:48:58'),
(3, 4, '2024-08-19 15:54:29'),
(4, 5, '2024-08-19 15:56:14'),
(5, 6, '2024-08-19 16:01:22'),
(6, 7, '2024-08-20 08:56:33');

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

DROP TABLE IF EXISTS `prestataire`;
CREATE TABLE IF NOT EXISTS `prestataire` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOM` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Prenom` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Adresse` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Telephone` int DEFAULT NULL,
  `Email` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_utilisateur` int DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`ID`, `NOM`, `Prenom`, `Adresse`, `Telephone`, `Email`, `date`, `id_utilisateur`) VALUES
(25, 'ASSALE', 'desiré', 'marcolloko15@gmail.com', 102030488, 'xssss@cccccc.ci', '2024-08-28 11:43:17', 19);

-- --------------------------------------------------------

--
-- Structure de la table `soumission`
--

DROP TABLE IF EXISTS `soumission`;
CREATE TABLE IF NOT EXISTS `soumission` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `card_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `card_number` int NOT NULL,
  `expiration_date` date NOT NULL,
  `cvv` int NOT NULL,
  `montant` int NOT NULL,
  `date_soumission` datetime DEFAULT NULL,
  `fichier` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ID_prestataire` int NOT NULL,
  `ID_appel_offre` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_prestataire` (`ID_prestataire`),
  KEY `ID_appel_offre` (`ID_appel_offre`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `soumission`
--

INSERT INTO `soumission` (`ID`, `card_name`, `card_number`, `expiration_date`, `cvv`, `montant`, `date_soumission`, `fichier`, `ID_prestataire`, `ID_appel_offre`) VALUES
(1, '', 0, '0000-00-00', 0, 5000, '2024-07-12 16:00:00', '', 3, 3),
(4, '', 0, '0000-00-00', 0, 70000, '2024-07-15 11:00:00', '', 6, 4),
(5, '', 0, '0000-00-00', 0, 65000, '2024-07-16 09:00:00', '', 7, 5),
(6, '', 0, '0000-00-00', 0, 80000, '2024-07-17 08:00:00', '', 8, 6),
(7, '', 0, '0000-00-00', 0, 75000, '2024-07-18 13:00:00', '', 9, 7),
(8, '', 0, '0000-00-00', 0, 90000, '2024-07-19 15:00:00', '', 10, 8),
(9, '', 0, '0000-00-00', 0, 85000, '2024-07-20 17:00:00', '', 1, 9),
(10, '', 0, '0000-00-00', 0, 95000, '2024-07-21 18:00:00', '', 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `type_ap`
--

DROP TABLE IF EXISTS `type_ap`;
CREATE TABLE IF NOT EXISTS `type_ap` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `libelle_AP` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_ap`
--

INSERT INTO `type_ap` (`ID`, `libelle_AP`) VALUES
(1, 'offre privé'),
(2, 'offre publique'),
(3, 'offre restreinte'),
(4, 'offre internationale'),
(5, 'offre nationale'),
(6, 'offre régionale'),
(7, 'offre locale'),
(8, 'offre sectorielle'),
(9, 'offre thématique'),
(10, 'offre personnalisée');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type_utilisateur` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`Email`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `username`, `password`, `Email`, `date`, `type_utilisateur`) VALUES
(19, 'desireolloko', '$2y$10$zdpBX0jGsu7GXqYYVGlN4.PTpQ2gDxzaOtkbhMSE.4SNrJGTFPJqa', 'xssss@cccccc.ci', '2024-08-28 11:43:17', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
