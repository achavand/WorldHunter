-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 nov. 2022 à 19:57
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `worldhunter`
--

-- --------------------------------------------------------

--
-- Structure de la table `cell`
--

DROP TABLE IF EXISTS `cell`;
CREATE TABLE IF NOT EXISTS `cell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_change` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `value_to_change` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `disconnected_presentation`
--

DROP TABLE IF EXISTS `disconnected_presentation`;
CREATE TABLE IF NOT EXISTS `disconnected_presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_fr` longtext COLLATE utf8mb4_unicode_ci,
  `description_en` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `disconnected_presentation`
--

INSERT INTO `disconnected_presentation` (`id`, `title`, `description_fr`, `description_en`) VALUES
(1, NULL, '<div>Il existe un artefact permettant de voyager dans le multivers.<br>Grâce à cela, de nombreuses personnes se sont mise à voyager afin de trouver de précieux trésor dans les différents univers. Ces voyageurs sont appelés chasseurs.<br>Au fils du temps, des guerres ont éclatées et de nombreux conflits ont lieu à chaque instant.&nbsp; Sauras-tu tirer gloire et pouvoir au sein du multivers ?</div>', '<div>There is an artifact to travel in the multiverse.<br>Thanks to this, many people began to travel in order to find precious treasures in the different universes. These travelers are called hunters.<br>Over time, wars have erupted and many conflicts take place at every moment.&nbsp; Can you draw glory and power within the multiverse?</div>');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221026085032', '2022-10-31 11:44:31', 7937),
('DoctrineMigrations\\Version20221026085554', '2022-10-31 11:44:39', 757),
('DoctrineMigrations\\Version20221026093453', '2022-10-31 11:44:39', 292);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_change` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `value_to_change` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

DROP TABLE IF EXISTS `personnage`;
CREATE TABLE IF NOT EXISTS `personnage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_personnage_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `talent_id` int(11) DEFAULT NULL,
  `serveur` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `current_xp` int(11) NOT NULL,
  `total_xp` int(11) NOT NULL,
  `current_lp` int(11) NOT NULL,
  `total_lp` int(11) NOT NULL,
  `current_pm` int(11) NOT NULL,
  `total_pm` int(11) NOT NULL,
  `physical_atk` int(11) NOT NULL,
  `magical_atk` int(11) NOT NULL,
  `physical_def` int(11) NOT NULL,
  `magical_def` int(11) NOT NULL,
  `agility` int(11) NOT NULL,
  `vitality` int(11) NOT NULL,
  `stat_point` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6AEA486D712520F3` (`wallet_id`),
  KEY `IDX_6AEA486DB0BFFE12` (`user_personnage_id`),
  KEY `IDX_6AEA486D18777CEF` (`talent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnage`
--

INSERT INTO `personnage` (`id`, `user_personnage_id`, `wallet_id`, `talent_id`, `serveur`, `name`, `level`, `current_xp`, `total_xp`, `current_lp`, `total_lp`, `current_pm`, `total_pm`, `physical_atk`, `magical_atk`, `physical_def`, `magical_def`, `agility`, `vitality`, `stat_point`) VALUES
(5, 8, 5, NULL, 1, 'PersonnageDeTest', 12, 0, 100, 100, 100, 50, 50, 10, 10, 10, 10, 20, 10, 0),
(6, 1, 6, NULL, 1, 'HELLLLLL', 19, 2442, 12645, 100, 100, 50, 50, 12, 11, 12, 11, 11, 13, 0),
(7, 9, 7, NULL, 1, 'Root3EtOui', 7, 0, 100, 100, 100, 50, 50, 10, 19, 10, 11, 10, 10, 0),
(8, 10, 8, NULL, 1, 'RootageSecondary', 39, 0, 100, 100, 100, 50, 50, 10, 10, 10, 10, 10, 20, 0),
(9, 11, 9, NULL, 1, 'SungJingWoo', 15, 0, 100, 100, 100, 50, 50, 16, 14, 10, 10, 10, 10, 0),
(10, 12, 10, NULL, 1, 'CrownJewel', 1, 72, 100, 100, 100, 50, 50, 10, 10, 10, 10, 20, 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `races`
--

DROP TABLE IF EXISTS `races`;
CREATE TABLE IF NOT EXISTS `races` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_image_male` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_image_female` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_male_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_female_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `racial_advantages` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `name_male_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_female_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `races`
--

INSERT INTO `races` (`id`, `url_image_male`, `url_image_female`, `name_male_fr`, `name_female_fr`, `description`, `racial_advantages`, `name_male_en`, `name_female_en`, `description_en`) VALUES
(1, 'assets\\images\\characters-icons\\temp-male-character.png', 'assets\\images\\characters-icons\\temp-female-character.png', 'Race 1 male fr', 'Race 1 female fr', 'R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / ', '', 'Race 1 male en', 'Race 1 female en', 'R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / '),
(2, 'assets\\images\\characters-icons\\temp-male-character.png', 'assets\\images\\characters-icons\\temp-female-character.png', 'Race 2 male fr', 'Race 2 female fr', 'R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / R2 FR / ', '', 'Race 2 male en', 'Race 2 female en', 'R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / R2 EN / '),
(3, 'assets\\images\\characters-icons\\temp-male-character.png', 'assets\\images\\characters-icons\\temp-female-character.png', 'Race 3 male fr', 'Race 3 female fr', 'R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / ', '', 'Race 3 male en', 'Race 3 female en', 'R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / '),
(4, 'assets\\images\\characters-icons\\temp-male-character.png', 'assets\\images\\characters-icons\\temp-female-character.png', 'Race 4 male fr', 'Race 4 female fr', 'R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / ', '', 'Race 4 male en', 'Race 4 female en', 'R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / ');

-- --------------------------------------------------------

--
-- Structure de la table `racial_advantage`
--

DROP TABLE IF EXISTS `racial_advantage`;
CREATE TABLE IF NOT EXISTS `racial_advantage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `races_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_58C3F53299AE984C` (`races_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `racial_advantage`
--

INSERT INTO `racial_advantage` (`id`, `races_id`, `name`, `description`) VALUES
(1, 1, 'Avantage 1', 'Avantage 1 de la race 1'),
(2, 1, 'Avantage 2', 'Avantage 2 de la race 1'),
(3, 2, 'Avantage 1', 'Avantage 1 de la race 2'),
(4, 2, 'Avantage 2', 'Avantage 2 de la race 2'),
(5, 3, 'Avantage 1', 'Avantage 1 de la race 3'),
(6, 3, 'Avantage 2', 'Avantage 2 de la race 3'),
(7, 4, 'Avantage 1', 'Avantage 1 de la race 4'),
(8, 4, 'Avantage 2', 'Avantage 2 de la race 4');

-- --------------------------------------------------------

--
-- Structure de la table `talent`
--

DROP TABLE IF EXISTS `talent`;
CREATE TABLE IF NOT EXISTS `talent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `stat_to_change` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `value_to_change` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_date` datetime NOT NULL,
  `is_banned` tinyint(1) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `register_date`, `is_banned`, `username`) VALUES
(1, 'rootage@root.root', '[\"ROLE_USER\", \"ROLE_ADMIN\"]', '$2y$13$L/jadkueNsC0poBjKcmkcucjKv42EOu9V6w9yQQgKUl05mkTXfrBS', '2022-10-31 12:03:04', 0, 'rooterdeSymfo'),
(8, 'root@root.root', '[\"ROLE_USER\"]', '$2y$13$VaO4S2/P6f3Zr3iUJfuCVuK/chQYFOLNrugm72wcJ2IhB89jtu9gW', '2022-10-31 14:29:50', 0, 'rootroot'),
(9, 'root@root.fr', '[\"ROLE_USER\"]', '$2y$13$w44i3I6ipf/loXVaMQet.exAe9pNCBx/kZsLAq/nEHP/xs/kefVN2', '2022-10-31 15:21:44', 0, 'rootFRFR'),
(10, 'rootage@root.fr', '[\"ROLE_USER\"]', '$2y$13$DgBZujZlPMo4EjhCu/EB8O7EI7w.FQW1BqczCNWoNR9YUFk6l7tCq', '2022-10-31 15:22:38', 0, 'rootageSecondary'),
(11, 'sungJinWoo@root.root', '[\"ROLE_USER\"]', '$2y$13$.UTp.b3QcEdaFC9pZE9fOeqc0U3XeLDtkHmHOr2NChXnyBPrNNi5C', '2022-10-31 15:23:49', 0, 'jinWoo'),
(12, 'test@test.fr', '[\"ROLE_USER\"]', '$2y$13$v.cNlLGybQB1.s5ODGuvIeyfltgqhncCeVLY8agLNMsmuqSTHeqg.', '2022-11-03 17:59:22', 0, 'JeSuisUnTest');

-- --------------------------------------------------------

--
-- Structure de la table `user_race`
--

DROP TABLE IF EXISTS `user_race`;
CREATE TABLE IF NOT EXISTS `user_race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `racial_advantage_id` int(11) DEFAULT NULL,
  `personnage_id` int(11) DEFAULT NULL,
  `url_img` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_race_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_race_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fr` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A0EEF7665E315342` (`personnage_id`),
  KEY `IDX_A0EEF7662A087264` (`racial_advantage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_race`
--

INSERT INTO `user_race` (`id`, `racial_advantage_id`, `personnage_id`, `url_img`, `name_race_fr`, `name_race_en`, `description_fr`, `description_en`) VALUES
(5, NULL, 5, 'assets\\images\\characters-icons\\temp-male-character.png', 'R4 male fr', 'R4 male en', 'R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / ', 'R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / '),
(6, NULL, 6, 'assets\\images\\characters-icons\\temp-female-character.png', 'R4 female fr', 'R4 female en', 'R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / ', 'R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / '),
(7, NULL, 7, 'assets\\images\\characters-icons\\temp-male-character.png', 'R3 male fr', 'R3 male en', 'R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / R3 FR / ', 'R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / R3 EN / '),
(8, NULL, 8, 'assets\\images\\characters-icons\\temp-female-character.png', 'R1 female fr', 'R1 female en', 'R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / R1 FR / ', 'R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / R1 EN / '),
(9, NULL, 9, 'assets\\images\\characters-icons\\temp-male-character.png', 'R4 male fr', 'R4 male en', 'R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / ', 'R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / '),
(10, NULL, 10, 'assets\\images\\characters-icons\\temp-male-character.png', 'R4 male fr', 'R4 male en', 'R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / R4 FR / ', 'R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / R4 EN / ');

-- --------------------------------------------------------

--
-- Structure de la table `wallet`
--

DROP TABLE IF EXISTS `wallet`;
CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gold` int(11) NOT NULL,
  `silver` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `wallet`
--

INSERT INTO `wallet` (`id`, `gold`, `silver`) VALUES
(5, 100, 1000),
(6, 100, 1000),
(7, 100, 1000),
(8, 100, 1000),
(9, 100, 1000),
(10, 100, 1000);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD CONSTRAINT `FK_6AEA486D18777CEF` FOREIGN KEY (`talent_id`) REFERENCES `talent` (`id`),
  ADD CONSTRAINT `FK_6AEA486D712520F3` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`id`),
  ADD CONSTRAINT `FK_6AEA486DB0BFFE12` FOREIGN KEY (`user_personnage_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `racial_advantage`
--
ALTER TABLE `racial_advantage`
  ADD CONSTRAINT `FK_58C3F53299AE984C` FOREIGN KEY (`races_id`) REFERENCES `races` (`id`);

--
-- Contraintes pour la table `user_race`
--
ALTER TABLE `user_race`
  ADD CONSTRAINT `FK_A0EEF7662A087264` FOREIGN KEY (`racial_advantage_id`) REFERENCES `racial_advantage` (`id`),
  ADD CONSTRAINT `FK_A0EEF7665E315342` FOREIGN KEY (`personnage_id`) REFERENCES `personnage` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
