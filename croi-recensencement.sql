-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 04 août 2021 à 11:06
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
-- Base de données : `croi-recensencement`
--

-- --------------------------------------------------------

--
-- Structure de la table `commity`
--

DROP TABLE IF EXISTS `commity`;
CREATE TABLE IF NOT EXISTS `commity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_famille` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_famille` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_voyage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `situation_marital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabligh_id` int(11) DEFAULT NULL,
  `situation_familiale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_53F22D6EEA936F25` (`tabligh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commity`
--

INSERT INTO `commity` (`id`, `nom_famille`, `prenom_famille`, `sexe`, `date_naissance`, `lieu_naissance`, `nationalite`, `document_voyage`, `numero_passport`, `numero_cin`, `situation_marital`, `numero_phone`, `adresse_email`, `photo`, `tabligh_id`, `situation_familiale`) VALUES
(1, 'Hanja', 'Rasolofo', 'masculin', '2016-04-08', 'hjra', 'Malagasy', 'passeportDiplomatique', '111111111111111111111', '2222222222222222', 'Marié', '222222222222222222', 'hanja@gmail.com', 'null', NULL, 'pere'),
(3, 'Ginah', 'Rakoto', 'feminin', '2017-11-19', 'hjra', 'Malagasy', 'passeportOfficier', '111111111111111111111', '2222222222222222', 'Marié', '222222222222222222', 'ginah@gmail.com', 'null', NULL, 'mere'),
(4, 'Ilo', 'test', 'feminin', '2016-06-01', 'hjra', 'Malagasy', 'passeportOfficier', '555555555555555', '6666666666666', 'célibataire', '333333333333', 'ilo@test.com', 'null', NULL, 'enfant');

-- --------------------------------------------------------

--
-- Structure de la table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ecole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_universite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carte_etudiant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_ecole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_universite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fokotany` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveau_etude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aide` tinyint(1) DEFAULT NULL,
  `autre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DB0A5ED25791EA96` (`commity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_enfant` int(11) DEFAULT NULL,
  `commity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_34B70CA25791EA96` (`commity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse_permanente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_temporaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fokotany` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montant_loyer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montant_syndic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F0FD44575791EA96` (`commity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mariage`
--

DROP TABLE IF EXISTS `mariage`;
CREATE TABLE IF NOT EXISTS `mariage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_mariage` date DEFAULT NULL,
  `commity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2FE8EC225791EA96` (`commity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

DROP TABLE IF EXISTS `profession`;
CREATE TABLE IF NOT EXISTS `profession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine_activite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salaire` int(11) DEFAULT NULL,
  `prime` int(11) DEFAULT NULL,
  `loyer` int(11) DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proprietaire` tinyint(1) DEFAULT NULL,
  `personnel` int(11) DEFAULT NULL,
  `commity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BA930D695791EA96` (`commity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sante`
--

DROP TABLE IF EXISTS `sante`;
CREATE TABLE IF NOT EXISTS `sante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupe_sanguin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `maladie_chronique` tinyint(1) DEFAULT NULL,
  `maladie_cardiaque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tailles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation` tinyint(1) DEFAULT NULL,
  `chose_porte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intervention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `traitement` tinyint(1) DEFAULT NULL,
  `type_maladie` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `frequentation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bilan_sanguin` tinyint(1) DEFAULT NULL,
  `pays_chirurgie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `nom_medicament` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maladie_relative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sante_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CF08326BC1683D7D` (`sante_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `social`
--

DROP TABLE IF EXISTS `social`;
CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aide_nourriture` tinyint(1) DEFAULT NULL,
  `aide_education` tinyint(1) DEFAULT NULL,
  `aide_social` tinyint(1) DEFAULT NULL,
  `aide_sante` tinyint(1) DEFAULT NULL,
  `aide_travail` tinyint(1) DEFAULT NULL,
  `commity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7161E1875791EA96` (`commity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pratique_sport` tinyint(1) DEFAULT NULL,
  `quel_sport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quel_frequence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pratique_loisir` tinyint(1) DEFAULT NULL,
  `quel_loisir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1A85EFD25791EA96` (`commity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tabligh`
--

DROP TABLE IF EXISTS `tabligh`;
CREATE TABLE IF NOT EXISTS `tabligh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_madressa` tinyint(1) DEFAULT NULL,
  `classe` int(11) DEFAULT NULL,
  `frequent_madressa` tinyint(1) DEFAULT NULL,
  `frequentation_mosque` tinytext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `question_mosque` tinyint(1) NOT NULL,
  `idee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FA327F8A5791EA96` (`commity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom_route`, `fname`, `lname`, `image`, `unique_id`, `status`) VALUES
(1, 'admin@gmail.com', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', '$2y$13$dJ4CDerjbfe23Gy8.7ht5.omqf2M7vHJ2U5PUUKeWShMc1733ihWi', 'app_dashboard_home', 'Zhoo', 'Abel', '', 1233355, 'Online');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commity`
--
ALTER TABLE `commity`
  ADD CONSTRAINT `FK_53F22D6EEA936F25` FOREIGN KEY (`tabligh_id`) REFERENCES `tabligh` (`id`);

--
-- Contraintes pour la table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `FK_DB0A5ED25791EA96` FOREIGN KEY (`commity_id`) REFERENCES `commity` (`id`);

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `FK_34B70CA25791EA96` FOREIGN KEY (`commity_id`) REFERENCES `commity` (`id`);

--
-- Contraintes pour la table `logement`
--
ALTER TABLE `logement`
  ADD CONSTRAINT `FK_F0FD44575791EA96` FOREIGN KEY (`commity_id`) REFERENCES `commity` (`id`);

--
-- Contraintes pour la table `mariage`
--
ALTER TABLE `mariage`
  ADD CONSTRAINT `FK_2FE8EC225791EA96` FOREIGN KEY (`commity_id`) REFERENCES `commity` (`id`);

--
-- Contraintes pour la table `profession`
--
ALTER TABLE `profession`
  ADD CONSTRAINT `FK_BA930D695791EA96` FOREIGN KEY (`commity_id`) REFERENCES `commity` (`id`);

--
-- Contraintes pour la table `sante`
--
ALTER TABLE `sante`
  ADD CONSTRAINT `FK_CF08326BC1683D7D` FOREIGN KEY (`sante_id`) REFERENCES `commity` (`id`);

--
-- Contraintes pour la table `social`
--
ALTER TABLE `social`
  ADD CONSTRAINT `FK_7161E1875791EA96` FOREIGN KEY (`commity_id`) REFERENCES `commity` (`id`);

--
-- Contraintes pour la table `sport`
--
ALTER TABLE `sport`
  ADD CONSTRAINT `FK_1A85EFD25791EA96` FOREIGN KEY (`commity_id`) REFERENCES `commity` (`id`);

--
-- Contraintes pour la table `tabligh`
--
ALTER TABLE `tabligh`
  ADD CONSTRAINT `FK_FA327F8A5791EA96` FOREIGN KEY (`commity_id`) REFERENCES `commity` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
