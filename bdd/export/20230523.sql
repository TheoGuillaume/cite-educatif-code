-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Host: agoracgagoracity.mysql.db
-- Generation Time: May 30, 2023 at 01:14 PM
-- Server version: 5.7.42-log
-- PHP Version: 7.4.33
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cityeduc_20230523`
--

CREATE DATABASE IF NOT EXISTS `cityeduc_20230523` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cityeduc_20230523`;

-- --------------------------------------------------------

--
-- Table structure for table `actualite`
--

CREATE TABLE `actualite` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `brochure` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actualite`
--

INSERT INTO `actualite` (`id`, `description`, `img`, `brochure`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(1, 'Grand RDV de l\'Orientation du réseau Lyli ce 23 mars 2022 à partir de 14h. \r\nLieu : Lorem ipsum dolor sit met consectetur.', 'actu.jpg', NULL, NULL, '2023-05-26 12:12:19', 1, NULL),
(2, 'Ouverture du PAEJ les lundi et mercredi à partir du 27 Mars 2023. Venez nombreux! Brochure téléchargable disponible.', 'arton2370-ae7c1.png', '16-9.pdf', '2023-05-26 11:25:34', '2023-05-26 11:25:34', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ca_acteur`
--

CREATE TABLE `ca_acteur` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `tel_acteur` varchar(55) NOT NULL,
  `photo_profil` varchar(50) DEFAULT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ca_acteur`
--

INSERT INTO `ca_acteur` (`id`, `id_utilisateur`, `nom`, `prenom`, `poste`, `tel_acteur`, `photo_profil`, `date_ins`, `etat`) VALUES
(4, 84, 'Rakotoarimalala', 'Tsiory', 'CEO', '03 48 74 02 07', '', '2023-05-26 11:29:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cs_antenne`
--

CREATE TABLE `cs_antenne` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `adresse_principale` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs_antenne_jour_horaire`
--

CREATE TABLE `cs_antenne_jour_horaire` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_rang` int(11) DEFAULT NULL,
  `matin` varchar(50) DEFAULT NULL,
  `midi` varchar(50) DEFAULT NULL,
  `soir` varchar(50) DEFAULT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `vacances` text,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs_categorie`
--

CREATE TABLE `cs_categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `desc_cat` varchar(100) DEFAULT NULL,
  `image_cat` varchar(80) DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_categorie`
--

INSERT INTO `cs_categorie` (`id`, `nom`, `desc_cat`, `image_cat`, `etat`) VALUES
(1, 'Action Sociale', 'Structures issues du champ social avec ou sans hébergement, etc', 'static/illustrations/categories/action-sociale.png', 1),
(2, 'Administration', 'Services administratifs ou supports', 'static/illustrations/categories/administration.png', 1),
(3, 'Orientation/insertion', 'Découverte des métiers, formations, etc', 'static/illustrations/categories/orientation-insertion.png', 1),
(4, 'Prévention/citoyenneté', 'Discrimination, sensibilisation, etc', 'static/illustrations/categories/prevention-citoyennete.png', 1),
(5, 'Santé', 'Soin, santé mentale, prévention-santé, etc', 'static/illustrations/categories/Sante.png', 1),
(6, 'Scolarité', 'Etablissement scolaire, services de l\'Education nationale, cours du soir, etc', 'static/illustrations/categories/scolarite.png', 1),
(7, 'Socio-educatif', 'Culture, sport, loisirs, etc', 'static/illustrations/categories/Socio-educatif.png', 1),
(8, 'Vie locale', 'Structures de proximités, participation à la vie locale, etc', 'static/illustrations/categories/vie-locale.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cs_champ_action`
--

CREATE TABLE `cs_champ_action` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_champ_action`
--

INSERT INTO `cs_champ_action` (`id`, `nom`, `etat`) VALUES
(1, 'Accès aux droits', 1),
(2, 'Parentalité et coéducation', 1),
(3, 'Accompagnement des victimes', 1),
(4, 'Accompagnement du projet professionnel', 1),
(5, 'Accompagnement thérapeutique', 1),
(7, 'Activité physique et sportive', 1),
(8, 'Aide juridictionnelle', 1),
(9, 'Animation de la vie locale', 1),
(10, 'Aide et accompagnement social', 1),
(13, 'Education artistique et culturelle', 1),
(14, 'Enseignement général', 1),
(15, 'Enseignement spécialisé', 1),
(16, 'Enseignement professionnel', 1),
(17, 'Espace d\'écoute', 1),
(18, 'Espace d\'information et de ressources', 1),
(19, 'Inclusion et éducation spécialisée', 1),
(20, 'Inclusion', 1),
(21, 'Médiation sociale et familiale', 1),
(22, 'Participation citoyenne des habitants', 1),
(23, 'Prévention santé et santé mentale', 1),
(25, 'Soutien aux professionnels et aux pratiques interacteurs', 1),
(26, 'Urgence sociale', 1),
(53, 'Projet professionnel/orientation', 1),
(54, 'Accompagnement vers l\'emploi', 1),
(55, 'Urgence médicale', 1),
(56, 'Inclusion et éducation spécialisée', 1);

-- --------------------------------------------------------
-- Mbolatiana 20230230
INSERT INTO cs_champ_action (nom, etat) VALUES
('Accompagnement des enfants en situation de handicap', 1),
('Education populaire et activités de loisirs', 1),
('Apaisement du climat social', 1),
('Formation et enseignement professionnel', 1);

-- etat=2
UPDATE cs_champ_action SET nom='Accompagnement médicale et thérapeutique', etat=2 WHERE id=5;
-- etat=0
UPDATE cs_champ_action SET nom='Accompagnement des victimes', etat=0 WHERE id=3;
UPDATE cs_champ_action SET nom='Accompagnement du projet professionnel', etat=0 WHERE id=4;
UPDATE cs_champ_action SET nom='Aide juridictionnelle', etat=0 WHERE id=8;
UPDATE cs_champ_action SET nom='Enseignement professionnel', etat=0 WHERE id=16;
UPDATE cs_champ_action SET nom='Inclusion', etat=0 WHERE id=20;
UPDATE cs_champ_action SET nom='Médiation sociale et familiale', etat=0 WHERE id=21;
UPDATE cs_champ_action SET nom='Participation citoyenne des habitants', etat=0 WHERE id=22;
UPDATE cs_champ_action SET nom='Inclusion et éducation spécialisée', etat=0 WHERE id=56;
UPDATE cs_champ_action SET nom='Inclusion et éducation spécialisée', etat=0 WHERE id=19;

--
-- Table structure for table `cs_jour`
--

CREATE TABLE `cs_jour` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `rang` int(11) NOT NULL DEFAULT '1',
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs_jour_horaire`
--

CREATE TABLE `cs_jour_horaire` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_rang` int(11) DEFAULT NULL,
  `matin` varchar(50) DEFAULT NULL,
  `midi` varchar(50) DEFAULT NULL,
  `soir` varchar(50) DEFAULT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `vacances` text,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_jour_horaire`
--

INSERT INTO `cs_jour_horaire` (`id`, `id_utilisateur`, `id_rang`, `matin`, `midi`, `soir`, `date_ins`, `vacances`, `etat`) VALUES
(1, 55, 1, 'matin', NULL, NULL, '2023-04-18 12:02:25', NULL, 1),
(2, 55, 2, 'matin', NULL, NULL, '2023-04-18 12:02:25', NULL, 1),
(3, 55, 3, 'matin', NULL, NULL, '2023-04-18 12:02:25', NULL, 1),
(13, 59, 1, 'matin', 'midi', NULL, '2023-04-22 11:05:11', NULL, 1),
(14, 59, 0, NULL, NULL, NULL, '2023-04-22 11:05:11', NULL, 1),
(15, 59, 3, 'matin', 'midi', NULL, '2023-04-22 11:05:11', NULL, 1),
(16, 62, 1, 'matin', 'midi', NULL, '2023-04-28 07:57:11', NULL, 1),
(17, 62, 0, NULL, NULL, NULL, '2023-04-28 07:57:11', NULL, 1),
(18, 62, 3, 'matin', 'midi', NULL, '2023-04-28 07:57:11', NULL, 1),
(19, 65, 1, 'matin', 'midi', NULL, '2023-05-08 05:55:42', NULL, 1),
(20, 65, 2, 'matin', NULL, 'soir', '2023-05-08 05:55:42', NULL, 1),
(21, 65, 3, 'matin', NULL, 'soir', '2023-05-08 05:55:42', NULL, 1),
(22, 58, 1, NULL, 'midi', NULL, '2023-05-10 05:35:27', NULL, 1),
(23, 58, 2, 'matin', 'midi', 'soir', '2023-05-10 05:35:27', NULL, 1),
(24, 58, 0, NULL, NULL, NULL, '2023-05-10 05:35:27', NULL, 1),
(25, 14, 1, 'matin', 'midi', NULL, '2023-05-12 12:42:47', NULL, 1),
(26, 14, 0, NULL, NULL, NULL, '2023-05-12 12:42:47', NULL, 1),
(27, 14, 0, NULL, NULL, NULL, '2023-05-12 12:42:47', NULL, 1),
(28, 52, 1, 'matin', 'midi', NULL, '2023-05-17 13:31:16', NULL, 1),
(29, 52, 0, NULL, NULL, NULL, '2023-05-17 13:31:16', NULL, 1),
(30, 52, 3, 'matin', 'midi', NULL, '2023-05-17 13:31:16', NULL, 1),
(34, 69, 1, 'matin', NULL, NULL, '2023-05-17 14:23:43', NULL, 1),
(35, 69, 0, NULL, NULL, NULL, '2023-05-17 14:23:43', NULL, 1),
(36, 69, 0, NULL, NULL, NULL, '2023-05-17 14:23:43', NULL, 1),
(37, 70, 1, 'matin', 'midi', NULL, '2023-05-18 10:40:28', NULL, 1),
(38, 70, 0, NULL, NULL, NULL, '2023-05-18 10:40:28', NULL, 1),
(39, 70, 3, 'matin', NULL, NULL, '2023-05-18 10:40:28', NULL, 1),
(40, 2, 1, 'matin', 'midi', NULL, '2023-05-19 05:15:00', NULL, 1),
(41, 2, 0, NULL, NULL, NULL, '2023-05-19 05:15:00', NULL, 1),
(42, 2, 0, NULL, NULL, NULL, '2023-05-19 05:15:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cs_modalite`
--

CREATE TABLE `cs_modalite` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `desc_modalite` text,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_modalite`
--

INSERT INTO `cs_modalite` (`id`, `nom`, `desc_modalite`, `etat`) VALUES
(1, 'Sur adhésion', NULL, 1),
(2, 'Sur prise de rendez-vous', NULL, 1),
(3, 'Uniquement sur libre adhésion', NULL, 1),
(4, 'Via mentorat', NULL, 1),
(5, 'Accueil libre et ouvert à tous', NULL, 1),
(6, 'Participation financière nécessaire', NULL, 1),
(7, 'Uniquement des publics adressés par d\'autre acteur', NULL, 1);

-- --------------------------------------------------------
-- Mbolatiana 20230230
INSERT INTO cs_modalite (`id`, `nom`, `desc_modalite`, `etat`) VALUES
('8', 'Sur inscription gratuite', NULL, 1),
('9','Sur inscription payante', NULL, 1);

UPDATE cs_modalite SET nom='Participation financière occasionnelle', desc_modalite=NULL, etat=1 WHERE id=6;
UPDATE cs_modalite SET nom='Sur adhésion', desc_modalite=NULL, etat=0 WHERE id=1;
UPDATE cs_modalite SET nom='Uniquement sur libre adhésion', desc_modalite=NULL, etat=0 WHERE id=3;
UPDATE cs_modalite SET nom='Via mentorat', desc_modalite=NULL, etat=0 WHERE id=4;

--
-- Table structure for table `cs_particularite_action`
--

CREATE TABLE `cs_particularite_action` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `desc_action` text,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_particularite_action`
--

INSERT INTO `cs_particularite_action` (`id`, `nom`, `desc_action`, `etat`) VALUES
(1, 'Accompagnement individuel', NULL, 1),
(2, 'Actions réservées au temps scolaire', NULL, 1),
(3, 'Actions uniquement hors temps scolaire', NULL, 1),
(4, 'Animation collective', NULL, 1),
(5, 'Sur inscription payante', NULL, 1),
(6, 'Personne en situation de handicap', NULL, 1),
(7, 'Personne en situation de précarité', NULL, 1),
(8, 'Personne isolée', NULL, 1),
(9, 'Personne rencontrant des difficultés scolaires', NULL, 1),
(10, 'Primo arrivant', NULL, 1),
(11, 'Programme de politiques éducatives ou dipositif', NULL, 1),
(23, 'Sur inscription gratuite', NULL, 1);

-- --------------------------------------------------------
-- Mbolatiana 20230530
UPDATE cs_particularite_action SET nom='Accompagnement individuel', desc_action=NULL, etat=1 WHERE id=1;
UPDATE cs_particularite_action SET nom='Sur inscription gratuite', desc_action=NULL, etat=0 WHERE id=23;
UPDATE cs_particularite_action SET nom='Sur inscription payante', desc_action=NULL, etat=0 WHERE id=5;

--
-- Table structure for table `cs_public`
--

CREATE TABLE `cs_public` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_public`
--

INSERT INTO `cs_public` (`id`, `nom`, `etat`) VALUES
(1, 'Jeune enfant', 1),
(2, 'Enfant', 1),
(3, 'Pré-ado', 1),
(4, 'Ado', 1),
(5, 'Jeune adulte', 1),
(6, 'Adulte', 1),
(7, 'Famille/parent', 1),
(8, 'Professionel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cs_referent`
--

CREATE TABLE `cs_referent` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs_struct`
--

CREATE TABLE `cs_struct` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `nom_social` varchar(500) NOT NULL,
  `sigle` varchar(50) NOT NULL,
  `siren` varchar(50) NOT NULL,
  `adresse_siege` varchar(50) NOT NULL,
  `adresse_principale` varchar(50) NOT NULL,
  `email_siege` varchar(50) NOT NULL,
  `tel_siege` varchar(50) NOT NULL,
  `site_web` varchar(50) DEFAULT NULL,
  `desc_horaire_ouverture` text,
  `desc_mission` text,
  `exemples_action` text,
  `photo_logo` varchar(100) DEFAULT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_struct`
--

INSERT INTO `cs_struct` (`id`, `id_utilisateur`, `id_categorie`, `nom_social`, `sigle`, `siren`, `adresse_siege`, `adresse_principale`, `email_siege`, `tel_siege`, `site_web`, `desc_horaire_ouverture`, `desc_mission`, `exemples_action`, `photo_logo`, `date_ins`, `etat`) VALUES
(2, 2, 2, 'Cité éducative d\'Argenteuil', '', '219500188', '', 'hôtel de ville, 12-14 boulevard Léon Feix, 95100 A', 'cite.educative@ville-argenteuil.fr', '0134234296', NULL, '', 'Programme de la politique de la ville porté par la Préfecture du Val d\'Oise,  la DSDEN 95 et la Ville d\'Agenteuil, visant à outiller les acteurs éducatifs dans leur action auprès des 0-25ans.                              ', 'Plan d\'action pour les établissements éducatifs. \r\nPlan de formation pour les professionnels. \r\nFina', '1684480332_bbef80b1bd3b8f371cc6.png', '2023-04-11 12:27:24', 1),
(4, 3, 6, 'COLLEGE LUCIE AUBRAC', 'Collège Public', '199 513 565', '', '', 'ce.0951156h@ac-versailles.fr', '0139989600', NULL, '', NULL, NULL, NULL, '2023-04-11 13:04:31', 1),
(5, 5, 3, 'Lycée des Métiers Cognacq-Jay', 'Lycée ', '34106769202784', '', '', 'administration@lycee-cognacq-jay.fr', '0139610287', NULL, '8h30-18h ', NULL, NULL, NULL, '2023-04-11 13:05:04', 1),
(6, 13, 6, 'CIO ', 'CIO ARGENTEUIL', '17950431100566', '', '', 'cio-argenteuil@ac-versailles.fr', '01 39 98 02 79', NULL, 'Le CIO est ouvert le samedi matin et pendant les congés scolaires.\r\nFermeture du CIO pendant les congés d’été du 19 juillet au 22 août 2023.\r\nOuverture du CIO le mercredi 23 août 2023.', NULL, NULL, NULL, '2023-04-11 13:08:22', 1),
(7, 15, 2, 'Direction de l\'Éducation et de l\'Enfance - Service Scolaire', 'Ville d\'Argenteuil', '219500188', '', '', 'Bruno.GRANGER@ville-argenteuil.fr', '0786825922', NULL, '', NULL, NULL, NULL, '2023-04-11 13:09:09', 1),
(9, 12, 6, 'Inspection Argenteuil-Bezons', 'IEN Argenteuil-Bezons', '219500188', '', '', '0951023w@ac-versailles.fr', '0139980342', NULL, '', NULL, NULL, NULL, '2023-04-11 13:10:11', 1),
(10, 8, 2, 'Cité éducative d\'Argenteuil', '', '219500188', '', '', 'cite.educative@ville-argenteuil.fr', '0134234296', NULL, '', NULL, NULL, NULL, '2023-04-11 13:11:27', 1),
(11, 14, 1, ' Institut Danielle CASANOVA - Les PEP Grand Oise', 'Institut Danielle CASANOVA', '77562808400151', '', '22/26 rue de picardie 95100 Argenteuil', 'agnes.lang@lespepgrandoise.org', '0139984260', NULL, 'FERMETURE LA 2 EME SEMAINE DES VACANCES et l\'été', '                        ', NULL, '1683902627_331260f05d57e8af73ae.jpg', '2023-04-11 13:11:27', 1),
(12, 18, 8, 'Médiathèque Robert-Desnos', '', '219500188', '', '', 'mediatheque.desnos@ville-argenteuil.fr', '01 34234999', NULL, 'Mardi : 14h-18h\r\nMercredi : 10h-18h\r\nVendredi : 14h-19h\r\nSamedi : 10h-18h', NULL, NULL, NULL, '2023-04-11 13:11:35', 1),
(13, 10, 6, 'Collège Paul VAILLANT-COUTURIER', '', '199510942', '', '', '0951094y@ac-versailles.fr', '0134343900', NULL, '7 h 30 - 18 h 30', NULL, NULL, NULL, '2023-04-11 13:11:51', 1),
(14, 9, 7, 'Service Animation et Education Sportive et Patinoire', 'AES-P', '219500188', '', '', 'direction.sports@ville-argenteuil.fr', '03 25 86 54 26', NULL, '', NULL, NULL, NULL, '2023-04-11 13:13:26', 1),
(15, 20, 1, 'Kaki Agency', '', '881750657', '', '', 'contact@kakiagency.com', '0770406549', NULL, '', NULL, NULL, NULL, '2023-04-11 13:14:17', 1),
(16, 11, 8, 'Maison de quartier du Val d\'argent sud', '', '219500188', '', '', 'val.argent.sud@ville-argenteuil.fr', '01 23 45 67 89', NULL, '', NULL, NULL, NULL, '2023-04-11 13:15:15', 1),
(17, 16, 3, 'Association  Le Valdocco ', 'Valdocco Formation ', '403944556', '', '', 'valdocco.formation@levaldocco.fr', '0478590442', NULL, '9h - 12h30\r\n13h30 - 17h00', NULL, NULL, NULL, '2023-04-11 13:15:28', 1),
(18, 4, 7, 'L\'imagerie', '', '80974272900019', '', '', 'valerie@limagerie.fr', '0175403912', NULL, 'Du lundi au samedi\r\n10h?>?19h', NULL, NULL, NULL, '2023-04-11 13:16:37', 1),
(19, 17, 6, 'Collège Claude Monet', '', '199 508 862 ', '', '', 'ce.0950886x@ac-versailles.fr', '01 39 82 23 90', NULL, '8h15-12h30\r\n14h-18h15\r\n', NULL, NULL, NULL, '2023-04-11 13:21:38', 1),
(20, 22, 2, 'Le Pôle ressources ville et developpement social', '', '421153099', '', '', 'contact@lepoleressources.fr', '01 34051717', NULL, 'Le Pôle ressources ville et developpement social est ouvert toute l\'année pour les acteurs de la Politique de la ville. ', NULL, NULL, NULL, '2023-04-11 13:34:28', 1),
(21, 24, 6, 'Collège', 'Jean-Jacques ROUSSEAU', '199511387', '', '', 'ce.0951138w@ac-versailles.fr', '0139829882', NULL, 'Matin : 08h00-12h00\r\nA-M : 13h30-17h30', NULL, NULL, '1681725027_546a874c8fc09524a11e.jpg', '2023-04-12 05:40:18', 1),
(23, 26, 4, 'Association Contact', '', '781618194', '', '', 'maxime@contacteaj.fr', '0950167287', NULL, '', NULL, NULL, '1681830382_05909c0bb17812610532.jpg', '2023-04-12 08:45:12', 1),
(25, 29, 1, 'Association Nadiasina', 'Nadiasina Magasin', '1111112222', '', 'Fianarantsoa', 'nadiasinadera@gmail.com', '0342345632', NULL, '', NULL, NULL, '1681476587_003c5a5a4ffd17e6fdb0.jpg', '2023-04-12 10:48:24', 0),
(26, 30, 1, 'Andao Company', '', '123456789', '', '', 'contact@andao-company.com', '0102030405', NULL, 'eget est lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas integer eget aliquet nibh praesent tristique magna sit amet purus gravida quis blandit turpis cursus in hac habitasse platea dictumst quisque sagittis purus sit amet volutpat consequat mauris nunc congue nisi vitae suscipit tellus mauris a diam maecenas sed enim ut sem viverra aliquet eget sit amet tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra magna ac placerat vestibulum lectus mauris ultrices eros in cursus turpis massa tincidunt dui ut ornare lectus sit amet est', NULL, NULL, '1681398383_e5e9b0772421b8d7653f.png', '2023-04-13 12:40:21', 1),
(27, 31, 2, 'Le Pole Ressources ville et développement social', '', '421153099', '', '', 'contact@lepoleressources.fr', '06 72 85 86 71', NULL, '', NULL, NULL, '1681471211_227a34325c4801aa6562.png', '2023-04-14 09:15:15', 1),
(30, 33, 3, 'KakiAgency', '', '123456789', '', '', 'contact@kakiagency.com', '0708091011', NULL, '', NULL, NULL, '1681665511_a5d09de970640f477bfd.png', '2023-04-16 15:18:31', 1),
(31, 36, 3, 'Association Crée Ton Avenir !!! - France', '', '797779550', '', '', 'contact@cree-ton-avnir.fr', '0950307924', NULL, '', NULL, NULL, '1681725516_7c0b6a0edf46fa98144d.png', '2023-04-17 07:58:36', 1),
(32, 42, NULL, 'Collège Irène Joliot-Curie ', 'Clg Joliot-Curie ', '199508854', '', '', 'ce.0950885w@ac-versailles.fr', '0134104078', NULL, 'lundi mardi jeudi vendredi 8h-17h15\r\nMercredi 8h-12h15', NULL, NULL, NULL, '2023-04-17 08:00:42', 1),
(33, 34, 4, 'Jeune et Engagé ', 'J&E ', '823066816', '', '', 'contact@jeuneetengage.org', '682946058', NULL, '8h00-18h00', NULL, NULL, '1681725716_765756b1ede9b2e6aa26.jpg', '2023-04-17 08:01:52', 1),
(37, 48, NULL, 'la Maison Pour Tous du Val d’Argent', 'Mpt val nord', '35307893400026', '', '', 'accueil-mpt-95100@orange.fr', '0139822061', NULL, '', NULL, NULL, NULL, '2023-04-17 08:05:18', 1),
(38, 39, NULL, 'ville d\'Argenteuil', 'Mission Emploi', '219500188', '', '', 'mission-emploi@ville-argenteuil.fr', '0134234950', NULL, 'Lundi,mardi, jeudi : 9h-12h30 /13h30-17h30\r\nMercredi, vendredi : 9h-12h30 /13h30-17h\r\nFermeture : jeudi matin', NULL, NULL, NULL, '2023-04-17 08:06:06', 1),
(39, 38, 4, 'Association', 'LUDIKACCESS', '84202825000012', '', '', 'ludikaccess@gmail.com', '0766162844', NULL, '', NULL, NULL, '1681726006_a22d52d1fa00fd4b48e7.jpg', '2023-04-17 08:06:46', 1),
(40, 50, 7, 'Accueil de loisirs ', 'Clm Carnot', '219500188', '', '', 'clm.carnot@ville-argenteuil.fr', '0134264471 ', NULL, 'Fermé les mercredis et vacances ', NULL, NULL, '1681726134_0594476659230609453d.jpg', '2023-04-17 08:08:54', 1),
(41, 37, 3, 'Face Val d\'Oise', '', '814143442', '', '', 'clubfacevaldoise@gmail.com', '0760113470', NULL, '', NULL, NULL, '1681726161_61a09f5335d94edfb351.png', '2023-04-17 08:09:21', 1),
(43, 40, 6, 'Etude Plus Argenteuil', '', '517680450', '', '', 'etudeplus.argenteuil@gmail.com', '09 54 76 34 02 ', NULL, 'Nous sommes ouverts tous les jours de 10h00 à 17h00.\r\nLes week-ends aussi de 10h00 à 17h00.\r\nDurant les vacances scolaires, uniquement en semaine de 10h00 à 17h00.', NULL, NULL, '1681726350_9243c1c3e42d454d95dd.jpg', '2023-04-17 08:11:10', 1),
(44, 52, 2, 'Pôle ressources Ville et développement social', '', '421153099', '', '39 rue des bussys 95600 Eaubonne', 'contact@lepoleressources.fr', '0134051717', NULL, '9h à 12h30 et 14h00 à 17h00.', 'Le Pôle ressources est une structure ressource pour les acteurs de la Politique de la ville et du développement social dans les départements du Val d\'Oise, des Yvelines et des Hauts-de-Seine.\r\nL\'assocation qualifie, informe, met en réseau et accompagne les expérimentations des acteurs :\r\n- groupes de travail, \r\n- recherches actions,\r\n- publications,\r\n- séminaires\r\n...', NULL, '1681726454_32ee9d85ec1e9e4ac8ba.png', '2023-04-17 08:14:14', 1),
(45, 44, NULL, 'Circonscription Argenteuil Sud', '', '219500188', '', '', '0951243k@ac-versailles.fr', '0139807110', NULL, 'Les lundis, mardis, jeudis et vendredis de 8h à 17h15 ', NULL, NULL, NULL, '2023-04-17 08:15:55', 1),
(46, 46, NULL, 'Mission de Lutte contre le Decochage Scolaire', 'MLDS', '199506411', '', '', 'remi.sraiki@ac-versailles.fr', '0623921493', NULL, '', NULL, NULL, NULL, '2023-04-17 08:20:14', 1),
(49, 45, NULL, 'Accueil de loisirs ', 'Clm/clp PVC', '219500188', '', '', 'Clm.pvc@ville-argenteuil.fr', '0130258415', NULL, 'Peri-scolaire 7h-8h45\r\n                        16h30-19h\r\nMercredi et vacances 7h-19h\r\n', NULL, NULL, NULL, '2023-04-17 08:22:01', 1),
(53, 51, NULL, 'Collectif d\'initiative pour la Vie Citoyenne', 'CIVIC', '904603164', '', '', 'ali.romdhane@neuf.fr', '0685725835', NULL, '', NULL, NULL, NULL, '2023-04-17 08:27:02', 1),
(56, 55, 2, 'Manalina', 'RNM', '123456789', 'Lot 64', '', 'mrajaona@gmail.com', '03 43 19 26 57', NULL, 'Aucune précision Blablabla ', '', NULL, '1681826545_27b980d20e634e2ba48e.jpg', '2023-04-18 12:02:25', 0),
(59, 58, 1, 'Theo Association', 'Siren', '235467892', 'Andoharanofotsy', 'Lot IAV 305K iavoloha', 'guillaumetheo92@gmail.com', '03 46 83 51 68', 'getbootstrap.com', 'Matin midi ', 'Structure Test', 'Aide pour les jeunes,pour les porsonnes handicappés            ', '1684755379_0b8281ab71a90830e1ae.png', '2023-04-20 09:45:12', 0),
(60, 59, 2, 'Pôle Ressources à effacer', '', '094532103', '39 rue des bussys 95600 Eaubonne', '', 'guill.dejardin@gmail.com', '06 30 64 27 01', NULL, '', 'Informer, Qualifier, mettre en réseau les acteurs de la Politique de la ville des Yvelines, Hauts de Seine et du Val d\'Oise. ', 'Formations, Études, Evaluation des politiques publiques, Intelligence collective, Méthode participat', '1682168711_0f76a07e3920c902f1ff.png', '2023-04-22 11:05:11', 1),
(61, 62, 4, 'La Case', '', '413633108', '1 rue Jean Bullant 95400 Villiers-le-bel', '1 rue jean bullant, 95400 Villiers-le-bel', 'contact@lacase.org', '01 39 92 57 32', NULL, '', 'Education populaire. Ateliers de sensibilisation aux dispositifs de mobilité internationale et d\'engagement volontaire, pour tout public de 15 à 30 ans. Centre de ressources et d\'information sur la citoyenneté, la solidarité international et l\'environnement.', 'Ateliers de sensibilisation et permanences sur la mobilité internationale / l\'engagement volontaire,', '1682675831_581bc26a4cef0f618962.png', '2023-04-28 07:57:11', 1),
(62, 65, 4, 'Mada Haisoa', 'Sigle', '123456789', 'Andoharanofotsy', 'Ankatso', 'guillaumetheo92@gmail.com', '03 46 83 52 55', NULL, '', '', '', '1683532542_e70ea7890a8f0b548bd1.png', '2023-05-08 05:55:42', 1),
(63, 69, 6, 'Jaichangédenom', 'E Test', '123456789', '12 Rue Auguste Renoir ', '12 Rue Auguste Renoir, Aulnay-Sous-Bois, 93600', 'accueil@test.fr', '07 70 40 65 49', NULL, '123456789876543234567898765432345678987651234567898765432345678987654323456789876512345678987654323456789876543234567898765123456789876543234567898765', 'JeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJeanJe', 'SophieSophieSophieSophieSophieSophieSophieSophieSophieSophieSophieSophieSophieSophieSophieSophieSoph', '1684340690_14cf2bd927013b6a322c.jpg', '2023-05-17 14:05:57', 1),
(65, 83, NULL, 'Machine', 'Mch', '123456789', 'Argenteuil | 95, Val-d\'Oise, Île-de-France | Boule', 'Aucune', 'contact@test.org', '06 07 08 09 67', NULL, 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem ', NULL, NULL, NULL, '2023-05-23 13:33:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cs_territoire`
--

CREATE TABLE `cs_territoire` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_territoire`
--

INSERT INTO `cs_territoire` (`id`, `nom`, `etat`) VALUES
(1, 'Val d\'Argent-Nord', 1),
(2, 'Val d\'Argent-Sud', 1),
(3, 'Centre-Ville', 1),
(4, 'Coteaux', 1),
(5, 'Val-Notre-Dame', 1),
(6, 'Orgemont', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cs_thematique`
--

CREATE TABLE `cs_thematique` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_thematique`
--

INSERT INTO `cs_thematique` (`id`, `nom`, `etat`) VALUES
(1, 'Accompagnement des victimes de violences', 1),
(2, 'Addiction', 1),
(3, 'Animation de réseau interacteurs', 1),
(4, 'Apprentissage des savoirs fondamentaux', 1),
(5, 'Climat scolaire', 1),
(6, 'Compétences psychosociales', 1),
(7, 'Education au développement durable', 1),
(8, 'Education aux médias', 1),
(9, 'Egalité fille-garçon', 1),
(10, 'Interculturalité', 1),
(11, 'Langues étrangères', 1),
(12, 'Lecture et langue française', 1),
(13, 'Lutte contre le décrochage scolaire', 1),
(14, 'Lutte contre le harcèlement', 1),
(15, 'Lutte contre les discriminations', 1),
(16, 'Mobilité internationale', 1),
(17, 'Nutrition', 1),
(18, 'Réduction des inégalités des chances', 1),
(19, 'Sciences et technologies', 1),
(20, 'Vie affective et sexuelle', 1),
(21, 'Vie numérique', 1),
(43, 'Bien-être et confiance en soi', 1);

-- --------------------------------------------------------
-- Mbolatiana 20230230
INSERT INTO cs_thematique (nom, etat) VALUES
('Aide juridictionnelle', 1),
('Participation citoyenne des habitants', 1),
('Médiation sociale et familiale', 1),
('Accompagnement des victimes', 1),
('Animation de réseau interacteurs', 1);

UPDATE cs_thematique SET nom='Accompagnement des victimes de violences', etat=0 WHERE id=1;
UPDATE cs_thematique SET nom='Animation de réseau interacteurs', etat=0 WHERE id=48;


--
-- Table structure for table `c_acteur_struct`
--

CREATE TABLE `c_acteur_struct` (
  `id` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_struct` int(11) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_acteur_struct`
--

INSERT INTO `c_acteur_struct` (`id`, `id_acteur`, `id_struct`, `date_ins`, `etat`) VALUES
(4, 4, 59, '2023-05-26 11:29:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `c_file_type`
--

CREATE TABLE `c_file_type` (
  `id` int(11) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_notification`
--

CREATE TABLE `c_notification` (
  `id` int(11) NOT NULL,
  `id_envoyeur` int(11) NOT NULL,
  `id_recepteur` int(11) NOT NULL,
  `lu` int(11) NOT NULL DEFAULT '0',
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_notification`
--

INSERT INTO `c_notification` (`id`, `id_envoyeur`, `id_recepteur`, `lu`, `date_ins`, `etat`) VALUES
(5, 84, 58, 1, '2023-05-26 11:29:46', 1),
(6, 58, 84, 1, '2023-05-26 11:30:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c_utilisateur`
--

CREATE TABLE `c_utilisateur` (
  `id` int(11) NOT NULL,
  `id_utilisateur_categorie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp_1` varchar(500) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1',
  `nombre_de_passages` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_utilisateur`
--

INSERT INTO `c_utilisateur` (`id`, `id_utilisateur_categorie`, `nom`, `email`, `mdp_1`, `date_ins`, `etat`, `nombre_de_passages`) VALUES
(2, 2, 'User', 'cite.educative@ville-argenteuil.fr', '$2y$10$U5FakbIeGV.4RATv.zm7mekZDAjFpGpall8EoBPPddJGeEYQHljVm', '2023-04-11 12:19:20', 1, 2),
(3, 2, 'User', 'ce.0951356h@ac-versailles.fr', '$2y$10$cEzIgn7uRfoyougIK1KFLuQmKBhNglhupsixSDFpcRdGxb6deC2BO', '2023-04-11 12:48:59', 1, 0),
(4, 2, 'User', 'valerie@limagerie.fr', '$2y$10$6aqeYEDWBPMjErb9q3flVe9bkjjSQDF0ckEPE8wrdEEkj9ZxDAlUW', '2023-04-11 12:49:36', 1, 0),
(5, 2, 'User', 'isabelle.lamadon@lycee-cognacq-jay.fr', '$2y$10$RfLsZFZ7ERiZfiCRsl1zsOjTvRS4HaDIRPjtQ0I6EXuRpOhUbnIGK', '2023-04-11 12:50:37', 1, 0),
(6, 3, 'User', 'jerome.peyr@ville-argenteuil.fr', '$2y$10$kfFwIWv6z5JybZLz2/kTIeCruJJCGniR5L1fjE7FUO5RrGQ/16tGm', '2023-04-11 12:50:53', 1, 0),
(7, 2, 'User', 'contact@alterego-formation.fr', '$2y$10$PEW9wTN09v.U3zcnfBjQlurUhF33XzP6QKZqeqqftjqGJbjm1Qkna', '2023-04-11 12:51:21', 1, 0),
(8, 2, 'User', 'lea.bernard@ville-argenteuil.fr', '$2y$10$s9KbyHatB9xEiC06yhdV8.EE9uZBFLoRCewmbNW/NNjUCr2JqUxBe', '2023-04-11 12:51:32', 1, 0),
(9, 2, 'User', 'guillaume.lefebvre@ville-argenteuil.fr', '$2y$10$yjg7VBPtEK3oid2MfpRonule4c6xbF4su8KHoWvmkhpHWH1VB0.JK', '2023-04-11 12:51:45', 1, 0),
(10, 2, 'User', '0951094y@ac-versailles.fr', '$2y$10$FPFQijhI208UK5jhWwUV6eSiMsVdKNv2CxMO/Hy.81aZ0OC.LokRu', '2023-04-11 12:51:58', 1, 0),
(11, 2, 'User', 'val.argent.sud@ville-argenteuil.fr', '$2y$10$NNvWChdwckLPe9KMhUIP2uvNdEsMxQp6GEU26MedbkUjTQ4o8AbGu', '2023-04-11 12:53:23', 1, 0),
(12, 2, 'User', '0951023w@ac-versailles.fr', '$2y$10$0tux/00K82JTXqXvrTfmf.vVlhlZ.irigwGIox6J9ETozTW1eo77a', '2023-04-11 12:53:52', 1, 0),
(13, 2, 'User', 'cio-argenteuil@ac-versailles.fr', '$2y$10$b13Snyz26th4cs159bGOveZRQTOVII0r6YsPIHRohc4IYsI3gOMwW', '2023-04-11 12:54:59', 1, 0),
(14, 2, 'User', 'contact-idc@lespepgrandoise.org', '$2y$10$IwQ2BEz8uxYGPn/1GsOuNOvUNA3HRPVbRB1cZuAXxqg3YlqU2FNma', '2023-04-11 12:55:49', 1, 0),
(15, 2, 'User', 'Bruno.GRANGER@ville-argenteuil.fr', '$2y$10$NlzxcBkjualhtaW9gvbho.u8.Q82GNuNtcCzozr9R4d/jh5u3rE1.', '2023-04-11 12:55:56', 1, 0),
(16, 2, 'User', 'direction.formation@levaldocco.fr', '$2y$10$.AFsnvXxKysHVa2QRVLTcukZIUriuR4v9RlhWVEI29fctBhyo1Dc.', '2023-04-11 12:57:34', 1, 0),
(17, 2, 'User', 'ce.0950886x@ac-versailles.fr', '$2y$10$oQ/nTe2XW9GqiqS.74oGkeIb7746Rh3C644cZdf1e7Yz5ViR9Ktom', '2023-04-11 12:57:59', 1, 0),
(18, 2, 'User', 'mediatheque.desnos@ville-argenteuil.fr', '$2y$10$q2m3Y69ncRB3LRzvVZ9zcOyMIrFzamc/1BGWRYRTgYMGa1pWv30x6', '2023-04-11 12:58:26', 1, 0),
(19, 2, 'User', 'deborah.ravohitra@ville-argenteuil.fr', '$2y$10$r8tLp7feFdOOFGLxbJfWCOPgkviibvhThRRHTd8JZUIWC068n6S/q', '2023-04-11 13:06:12', 1, 0),
(20, 2, 'User', 'zina.raminosona@kakiagency.com', '$2y$10$F8ade5voBvLqbCgFkhC4F.o9WfXOehMh4j4k.SyV1gnKWmDV4rNFa', '2023-04-11 13:11:09', 1, 0),
(21, 2, 'User', 'afev95@afev.org', '$2y$10$gldTmNGyItffVpgYjjMpb.UMbT2t23HTsiIpBbQIVYUPBRHRdI29C', '2023-04-11 13:16:51', 1, 0),
(22, 2, 'User', 'contact@lepoleresources.fr', '$2y$10$c9TFUs53nEnRqtaxd33.YOMWpJRciCajJ2pvwqK2n2hjlB58.pK2q', '2023-04-11 13:19:30', 1, 0),
(23, 2, 'User', '0950585v@ac-versailles.fr', '$2y$10$kKVefvAgVdMvh5psKrBi/.yUDMMPmE6F15pTSPUFwL.OVVCHygwAG', '2023-04-11 13:42:03', 1, 0),
(24, 2, 'User', 'ce.0951138w@ac-versailles.fr', '$2y$10$fbb6OfGEutClkawpRl4cCeQ3Re57uDmpwl.j.j3XQ8Wjef7uGfb..', '2023-04-12 05:26:44', 1, 0),
(26, 2, 'User', 'maxime@contacteaj.fr', '$2y$10$8eA0VXCigrUNFkgR34iy4uUTremw9DFH0TVjBOjx4gA66gBC926MG', '2023-04-12 08:24:17', 1, 0),
(27, 3, 'User', 'carine.mira5@gmail.com', '$2y$10$tHnHXYNS6OEhR9ObBjY3fenRIAs8rgoDt98/bsfFDRtQqY9tUJAre', '2023-04-12 08:25:41', 1, 0),
(29, 2, 'User', 'nadiasinanicodev4@gmail.com', '$2y$10$R6SfbC3n0.d3BJ.huLZz3eYJEsBgbMlzcd9q2oN6HbjWVvFzDumOS', '2023-04-12 10:42:33', 1, 0),
(30, 2, 'User', 'zina@andao-company.com', '$2y$10$I.m8vv2vQh3BJ3Z8wPxrYes1Ei52sH/IZjImf9tLQA1rBVs.Ah70y', '2023-04-13 12:08:59', 1, 0),
(31, 2, 'User', 'marie.gourgouillon@lepoleressources.fr', '$2y$10$1VWRtmmnztq56iYKsxz7euJEsEy6PanjDBjSj1Mc.SV63CemOwT0O', '2023-04-14 09:01:10', 1, 0),
(33, 2, 'User', 'contact@kakiagency.com', '$2y$10$sV/QzNErnVyeMOKntW/pzuiWna4K4Zi157U2zK3Z492l9DCFQLtW2', '2023-04-16 15:01:16', 1, 0),
(34, 2, 'User', 'florence.fitoussi@jeuneetengage.org', '$2y$10$IQdVJjgCq7xD72bAKPz/9eDXyntXbopmPmj.NWA7r2f6GxyVba/Xu', '2023-04-17 07:45:23', 1, 0),
(35, 2, 'User', 'valerie.torossian@ac-versailles.fr', '$2y$10$dGi2dZ9Z7J9BWobjEUz4CeABzakw0Kvt/CI1n6n300e1jYYC7CGQa', '2023-04-17 07:45:51', 1, 0),
(36, 2, 'User', 'cdelafosse@cree-ton-avenir.fr', '$2y$10$Fa2/oD0i7i3mHfCe7iCJ7enA03UKFVzk3G2Ck3UsuxbV62AqRQMr2', '2023-04-17 07:46:03', 1, 0),
(37, 2, 'User', 'l.pierquin@fondationface.org', '$2y$10$bziTo7ejHLs/4oqv3FmH4uT3IbHHMOcGseF/.82tjX8uEK08QRpx6', '2023-04-17 07:46:19', 1, 0),
(38, 2, 'User', 'ludikaccess@gmail.com', '$2y$10$TvbtJYoG/o3HSIX7Lw4MrO9xLvRP2gDMnXoM.ck.DXuFIuYrG0gBq', '2023-04-17 07:46:22', 1, 0),
(39, 2, 'User', 'sabrina.favre@ville-argenteuil.fr', '$2y$10$Uy2uqyWl1tp7uFZxe8DQj.SggjEmvlL79.zCnCkVnXRrdqV6Mmyu6', '2023-04-17 07:46:23', 1, 0),
(40, 2, 'User', 'etudeplus.argenteuil@gmail.com', '$2y$10$mx9uSg1zj12/vlYKJc9VUeOCoV1D3B50J4f9CbLXwmy1DuTyxd6vq', '2023-04-17 07:46:27', 1, 0),
(41, 2, 'User', 'i.joliotcurie_95100@citeo.org', '$2y$10$8JGocKDgIsYS8NnGOWREHuKCs29FiSHmFidSOVEJicStPItKW5u7S', '2023-04-17 07:46:41', 1, 0),
(42, 2, 'User', 'ce.0950885w@ac-versailles.fr', '$2y$10$99n.g9LZa1MSEM/DbmqFQOUBMwnff4KtBxQhzxhGVuCk9949Xmylq', '2023-04-17 07:46:52', 1, 0),
(43, 2, 'User', 'c.daoui@udaf95.fr', '$2y$10$6Z9VtzuKyrObxNDVOFlxH.nGSMu6caocw2lUqvxJtZYx1Oyyqv4ru', '2023-04-17 07:47:41', 1, 0),
(44, 2, 'User', '0951243k@ac-versailles.fr', '$2y$10$K78IFeFrxIeeTizrycBO6ubsCzTNRxBbsc4c7MTOCtVHPZYbiMu/K', '2023-04-17 07:47:57', 1, 0),
(45, 2, 'User', 'Clm.pvc@ville-argenteuil.fr', '$2y$10$rhHBKD2iLz89eD9WwjecqOIHRz5jg83DE9uhGFvn/Qw2sysHU67gG', '2023-04-17 07:48:11', 1, 0),
(46, 2, 'User', 'remi.sraiki@ac-versailles.fr', '$2y$10$vMTrW7e/aOSQPolufZc6AOO40xQ5f4oXivjZlvivdHnLzi.xAkbD2', '2023-04-17 07:48:44', 1, 0),
(47, 3, 'User', 'muriel.lefeuvre@gmail.com', '$2y$10$Ryc7D/Fds9iYA/fcdQWgiefqLJU7zVTQLZ2Ewydaut2nRs4gPAOKu', '2023-04-17 07:50:52', 1, 0),
(48, 2, 'User', 'maisonpourtousarg@wanadoo.fr', '$2y$10$8qzMCUwtCThqyC8JeLR3HOrwfgP8QA1hcfiDlKeEQ8/UR8SmvjqSG', '2023-04-17 07:51:14', 1, 0),
(49, 2, 'User', 'miguelangelo.canelha@ville-argenteuil.fr', '$2y$10$xM4fi0Ztf6L1Yg41ylJ0I.lZisqBEebr9USb9mCrlCGBFheDz./6G', '2023-04-17 07:51:24', 1, 0),
(50, 2, 'User', 'clm.carnot@ville-argenteuil.fr', '$2y$10$87Acw5Kz3rgxWppL4Rge9ukUz6ZMG8joCy9bUHomS2GdcaS6fhenm', '2023-04-17 07:52:20', 1, 0),
(51, 2, 'User', 'civic.philo@gmai.com', '$2y$10$gKk/qVsNYkUinlyE/e0BmeOQCfXcuL0KiKIa/8hr63OQdIfQbxuTK', '2023-04-17 07:52:30', 1, 0),
(52, 2, 'User', 'contact@lepoleressources.fr', '$2y$10$.OlT.EEdpSWktNJQ49dGFOEjmjEgRs2seeWoiEaosDPyf2yuX8VwG', '2023-04-17 07:59:31', 1, 1),
(53, 3, 'User', 'l.aubrac_95100@citeo.org', '$2y$10$5A72LgDUZ.JuJmJG4QZCSegylRbybqdpyCBi5WHFFWf.3qgrEuyFS', '2023-04-17 08:11:15', 1, 0),
(54, 3, 'User', 'guillaume.dejardin@lepoleressources.fr', '$2y$10$YZlV7pzE56ZcWnzCkjvs6Ob66N2rJYu2YqdUsTovxe7G1HqRsLCI.', '2023-04-17 08:25:46', 1, 0),
(55, 2, 'User', 'manalina@gmail.com', '$2y$10$jMUji9FnhJ6gz5s9OQqEfe4KH9MKUFPDACCaM6zdTcpC6h3LkbnQq', '2023-04-18 11:55:05', 1, 0),
(58, 2, 'User', 'guillaume.haisoa@gmail.com', '$2y$10$6gs0Bp/J9/9gviHqcihM9.FGfFoNt9lBcP64H5vgf9e/02.RmfdXG', '2023-04-20 09:41:11', 1, 9),
(59, 2, 'User', 'guill.dejardin@gmail.com', '$2y$10$lDnZJ9OSb62rdpe4yDkaEeqRV212IaVKkREUGDD8sAlKcvoQZIn4S', '2023-04-22 10:58:26', 1, 0),
(60, 3, 'Theo Acteur2', 'guillaumetho99@gmail.com', '$2y$10$lkJRGdu43fzD2TCPSdEX8O10UD3cINdvfKG7Bn.bPgnM8YiDdXEnK', '2023-04-26 05:40:52', 1, 0),
(61, 3, 'Nico Maradonance', 'nadiasinanicodev3@gmail.com', '$2y$10$4Zq43eQhaOQ3Ty9y0PvtLOK50h4SBXCLkX6oFt45KsdYHJHFlyy3m', '2023-04-26 05:54:31', 1, 0),
(62, 2, 'User', 'contact@lacase.org', '$2y$10$oB165bxOUdqmlya96nXpI.zijMJqCgsLhpdNUa29p3VaIFlwPYdee', '2023-04-28 07:47:26', 1, 0),
(63, 2, 'User', 'mrajaona@gmail.com', '$2y$10$z1PE3ZHP.6vfds/7kyd0.e9s4GeIPW95j2GbwIT/Q1EzFekbEbr7i', '2023-05-04 04:08:04', 1, 0),
(64, 2, 'User', 'noemie.siefert@lepoleressources.fr', '$2y$10$uuTMzeg/6NV1ufuvJiXRYewuw66e5DuPEGMuxbtJcj6FROevlJ9km', '2023-05-05 05:59:36', 1, 0),
(65, 2, 'User', 'test@gmail.com', '$2y$10$IQ76AiPOWWpqFgvmniEJgeQSElkZp72oav8uaivrlXgTcdA7YJD86', '2023-05-08 05:47:14', 0, 0),
(67, 2, 'User', 'andrana@andrana.com', '$2y$10$ZKh7C47zq4CkeBr5ZWgZ7OQ/2xvZcw3nZiLfWWWT6a3rn7pi.1Nya', '2023-05-11 06:41:57', 1, 0),
(68, 2, 'User', 'zinaharentsoa@yahoo.fr', '$2y$10$ZDmWhwxm5KK0u2CX4o.D8eoO5kQvLrmRqiDKuCX9wdcNfUvZS1SE6', '2023-05-17 13:02:26', 1, 0),
(69, 2, 'User', 'test@test.fr', '$2y$10$tLH1mniErVwe.PMQrfj8S.T49wcBO1SwKaCqy3DZk3KXsddx/habm', '2023-05-17 13:46:57', 1, 0),
(70, 2, 'User', 'structuretest@gmail.com', '$2y$10$j9Mz.5YWb3kaVmtpqjKDoucbturlTQch.I0sTK7j5XjIYEZAguHfa', '2023-05-18 10:33:41', 1, 0),
(71, 2, 'User', 'guillaume.haisoa2@gmail.com', '$2y$10$5ix0H4UL2GdrIsZ7KKb/0OEORBrkxuSbsg.dzerZSsqB3CUHZVwVa', '2023-05-19 08:30:20', 1, 0),
(74, 3, 'User', 'guillaume.acteur@gmail.com', '$2y$10$LGu5Lks.uR9gL.5BVOmiEu3XEHUPjEdfqNrQDN9drNnFMLaocCTU.', '2023-05-22 08:58:52', 1, 2),
(75, 3, 'User', 'nadiasina@gmail.com', '$2y$10$4Tw2hlqLnaWOhueNOmzV1edXJEEXd7o0duR5fP2IvaOxO/6exvsz6', '2023-05-22 10:08:52', 1, 0),
(76, 3, 'User', 'manalina@manalina.com', '$2y$10$1TR0I/d8pFXbtx7j3KdG1ultsZ.dsmwT158tAZhzi56XP7V3OKhdC', '2023-05-22 10:32:35', 1, 0),
(77, 2, 'User', 'manalina@test.mg', '$2y$10$s6SCcI28rzJBOu8Ba.jPxOBDXMiZHqPwiPVSoj/E9rPOx8PJ9tp.C', '2023-05-22 12:29:50', 1, 0),
(78, 2, 'User', 'manalina@another.fr', '$2y$10$jR/jFhLaIvy/LGrTMtTsyO4Q4Wu9bd6b.hKA4wIGjmAFP2Jd5wM.q', '2023-05-22 13:20:36', 1, 0),
(79, 3, 'User', 'manalina@test.fr', '$2y$10$uvH2d2cc.Du/cCFncRxT8.TdBW9jAOkvf7i5P.nT4bSzoL0CecopK', '2023-05-22 13:29:53', 1, 0),
(80, 2, 'User', 'gilles@assise.fr', '$2y$10$GCJ8GjclVgkMj.i3nHcO7.MXiC4jbjZw.nhvLIsrIBEvZlms5zi5W', '2023-05-22 13:30:58', 1, 0),
(81, 1, 'admin', 'admin@gmail.com', '$2y$10$VreL9KVcQeZTEvyn263yaOIBCSv0s.6xBNEmS2cqAY/2QxQzNNt9S', '2023-05-22 13:33:21', 1, 0),
(82, 3, 'User', 'nicodevacteur@gmail.com', '$2y$10$mhUC2VuKiIlOuvC8wWc4yeLERcjz8N2.xSjca6GMmLfBpMRXxouBa', '2023-05-22 13:59:00', 1, 0),
(83, 2, 'User', 'machine@test.org', '$2y$10$K/BknEF9D3pQ3hpoHr/p2.RS2sGdU4oBNqy/nyw9TEdgvkXoCVKxq', '2023-05-23 13:26:45', 1, 0),
(84, 3, 'User', 'tsioryrovantsoa@gmail.com', '$2y$10$i/EqD5kDt1ULxDSuGRdapu4he3cAdUtvX/WXEcC/AI9d6IpX6Dx4K', '2023-05-26 11:28:43', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `c_utilisateur_categorie`
--

CREATE TABLE `c_utilisateur_categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `rang` int(11) DEFAULT '1',
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_utilisateur_categorie`
--

INSERT INTO `c_utilisateur_categorie` (`id`, `nom`, `rang`, `etat`) VALUES
(1, 'Admine', 1, 1),
(2, 'Strucure', 1, 1),
(3, 'Acteur', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `c_utilisateur_champ_action`
--

CREATE TABLE `c_utilisateur_champ_action` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_champ_action` int(11) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_utilisateur_champ_action`
--

INSERT INTO `c_utilisateur_champ_action` (`id`, `id_utilisateur`, `id_champ_action`, `date_ins`, `etat`) VALUES
(8, 5, 3, '2023-04-11 12:59:22', 1),
(9, 5, 4, '2023-04-11 12:59:22', 1),
(10, 5, 16, '2023-04-11 12:59:22', 1),
(11, 3, 14, '2023-04-11 13:00:26', 1),
(12, 10, 2, '2023-04-11 13:02:08', 1),
(13, 10, 13, '2023-04-11 13:02:08', 1),
(14, 10, 14, '2023-04-11 13:02:08', 1),
(15, 8, 19, '2023-04-11 13:02:51', 1),
(16, 8, 25, '2023-04-11 13:02:51', 1),
(17, 18, 9, '2023-04-11 13:04:01', 1),
(18, 18, 13, '2023-04-11 13:04:01', 1),
(19, 18, 18, '2023-04-11 13:04:01', 1),
(23, 15, 19, '2023-04-11 13:04:53', 1),
(24, 15, 25, '2023-04-11 13:04:53', 1),
(25, 13, 4, '2023-04-11 13:05:31', 1),
(26, 13, 18, '2023-04-11 13:05:31', 1),
(27, 9, 3, '2023-04-11 13:05:42', 1),
(28, 9, 7, '2023-04-11 13:05:42', 1),
(29, 9, 17, '2023-04-11 13:05:42', 1),
(30, 8, 25, '2023-04-11 13:06:40', 1),
(31, 12, 14, '2023-04-11 13:07:47', 1),
(32, 8, 25, '2023-04-11 13:08:10', 1),
(33, 11, 2, '2023-04-11 13:08:18', 1),
(34, 11, 9, '2023-04-11 13:08:18', 1),
(35, 11, 25, '2023-04-11 13:08:18', 1),
(36, 4, 2, '2023-04-11 13:09:04', 1),
(37, 4, 9, '2023-04-11 13:09:04', 1),
(38, 4, 13, '2023-04-11 13:09:04', 1),
(39, 16, 21, '2023-04-11 13:09:22', 1),
(40, 16, 17, '2023-04-11 13:09:22', 1),
(41, 16, 25, '2023-04-11 13:09:22', 1),
(42, 20, 1, '2023-04-11 13:13:38', 1),
(43, 20, 2, '2023-04-11 13:13:38', 1),
(44, 20, 3, '2023-04-11 13:13:38', 1),
(45, 17, 14, '2023-04-11 13:17:53', 1),
(46, 22, 18, '2023-04-11 13:29:36', 1),
(47, 24, 14, '2023-04-12 05:33:35', 1),
(48, 24, 15, '2023-04-12 05:33:35', 1),
(49, 24, 20, '2023-04-12 05:33:35', 1),
(53, 26, 10, '2023-04-12 08:31:45', 1),
(57, 29, 2, '2023-04-12 10:46:37', 1),
(58, 29, 3, '2023-04-12 10:46:37', 1),
(59, 29, 4, '2023-04-12 10:46:37', 1),
(60, 30, 7, '2023-04-13 12:30:27', 1),
(61, 30, 10, '2023-04-13 12:30:27', 1),
(62, 30, 13, '2023-04-13 12:30:27', 1),
(63, 31, 10, '2023-04-14 09:08:22', 1),
(67, 33, 1, '2023-04-16 15:07:16', 1),
(68, 33, 8, '2023-04-16 15:07:16', 1),
(69, 33, 17, '2023-04-16 15:07:16', 1),
(70, 36, 4, '2023-04-17 07:53:30', 1),
(71, 36, 53, '2023-04-17 07:53:30', 1),
(72, 42, 14, '2023-04-17 07:53:49', 1),
(73, 34, 1, '2023-04-17 07:54:32', 1),
(74, 34, 17, '2023-04-17 07:54:32', 1),
(75, 34, 3, '2023-04-17 07:54:32', 1),
(76, 39, 4, '2023-04-17 07:54:33', 1),
(77, 39, 53, '2023-04-17 07:54:33', 1),
(78, 39, 54, '2023-04-17 07:54:33', 1),
(79, 45, 7, '2023-04-17 07:56:47', 1),
(80, 45, 13, '2023-04-17 07:56:47', 1),
(81, 43, 5, '2023-04-17 07:57:07', 1),
(82, 43, 17, '2023-04-17 07:57:07', 1),
(83, 43, 23, '2023-04-17 07:57:07', 1),
(84, 38, 2, '2023-04-17 07:57:11', 1),
(85, 38, 3, '2023-04-17 07:57:11', 1),
(86, 38, 19, '2023-04-17 07:57:11', 1),
(87, 37, 4, '2023-04-17 07:58:41', 1),
(88, 37, 53, '2023-04-17 07:58:41', 1),
(89, 37, 54, '2023-04-17 07:58:41', 1),
(90, 50, 19, '2023-04-17 08:00:01', 1),
(91, 48, 2, '2023-04-17 08:01:12', 1),
(92, 48, 9, '2023-04-17 08:01:12', 1),
(93, 48, 22, '2023-04-17 08:01:12', 1),
(94, 39, 4, '2023-04-17 08:01:48', 1),
(95, 39, 53, '2023-04-17 08:01:48', 1),
(96, 39, 54, '2023-04-17 08:01:48', 1),
(97, 45, 7, '2023-04-17 08:04:05', 1),
(98, 45, 13, '2023-04-17 08:04:05', 1),
(99, 40, 2, '2023-04-17 08:04:38', 1),
(100, 40, 14, '2023-04-17 08:04:38', 1),
(101, 40, 53, '2023-04-17 08:04:38', 1),
(102, 44, 3, '2023-04-17 08:10:03', 1),
(103, 44, 14, '2023-04-17 08:10:03', 1),
(104, 44, 23, '2023-04-17 08:10:03', 1),
(105, 52, 18, '2023-04-17 08:10:54', 1),
(106, 52, 19, '2023-04-17 08:10:54', 1),
(107, 45, 7, '2023-04-17 08:11:51', 1),
(108, 45, 13, '2023-04-17 08:11:51', 1),
(109, 46, 14, '2023-04-17 08:13:55', 1),
(110, 46, 16, '2023-04-17 08:13:55', 1),
(111, 43, 5, '2023-04-17 08:14:32', 1),
(112, 43, 17, '2023-04-17 08:14:32', 1),
(113, 43, 23, '2023-04-17 08:14:32', 1),
(114, 51, 17, '2023-04-17 08:19:21', 1),
(115, 51, 13, '2023-04-17 08:19:21', 1),
(116, 51, 22, '2023-04-17 08:19:21', 1),
(117, 55, 1, '2023-04-18 11:59:10', 1),
(118, 55, 8, '2023-04-18 11:59:10', 1),
(128, 59, 19, '2023-04-22 11:02:14', 1),
(132, 62, 18, '2023-04-28 07:53:48', 1),
(133, 62, 53, '2023-04-28 07:53:48', 1),
(134, 58, 2, '2023-04-29 06:41:59', 1),
(135, 58, 3, '2023-04-29 06:41:59', 1),
(136, 58, 14, '2023-04-29 06:41:59', 1),
(137, 2, 18, '2023-05-04 05:26:30', 1),
(138, 2, 25, '2023-05-04 05:26:30', 1),
(139, 65, 1, '2023-05-08 05:55:42', 1),
(140, 65, 2, '2023-05-08 05:55:42', 1),
(141, 65, 3, '2023-05-08 05:55:42', 1),
(142, 14, 5, '2023-05-12 12:48:02', 1),
(143, 14, 15, '2023-05-12 12:48:02', 1),
(144, 14, 19, '2023-05-12 12:48:02', 1),
(145, 69, 10, '2023-05-17 14:05:57', 1),
(146, 70, 13, '2023-05-18 10:40:28', 1),
(147, 70, 14, '2023-05-18 10:40:28', 1),
(148, 70, 20, '2023-05-18 10:40:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c_utilisateur_file`
--

CREATE TABLE `c_utilisateur_file` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_file_type` int(11) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_utilisateur_files`
--

CREATE TABLE `c_utilisateur_files` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `nom_file` varchar(50) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_utilisateur_files`
--

INSERT INTO `c_utilisateur_files` (`id`, `id_utilisateur`, `nom_file`, `date_ins`, `etat`) VALUES
(1, 58, '1682428266_a66331ef2af2074ecd48.pdf', '2023-04-25 11:11:06', 1),
(2, 58, '1682428344_754ea816c30748d09285.pdf', '2023-04-25 11:12:24', 1),
(3, 62, '1682675831_620aa08ecb6592af83ec.pdf', '2023-04-28 07:57:11', 1),
(4, 65, '1683532542_cdb2f36c06e5d507170b.pdf', '2023-05-08 05:55:42', 1),
(5, 69, '1684339557_5d12854b85351d6fd1f7.pdf', '2023-05-17 14:05:57', 1),
(6, 69, '1684339557_f8614d0bc70de498891b.pdf', '2023-05-17 14:05:57', 1),
(7, 69, '1684339557_38b78288e156875a7d60.pdf', '2023-05-17 14:05:57', 1),
(8, 70, '1684413628_85f6466b2f2acbe89d5c.jpg', '2023-05-18 10:40:28', 1),
(9, 2, '1684480480_346662da6a1696a2c01c.pdf', '2023-05-19 05:14:40', 1),
(10, 58, '1684755669_66341cbd1b82e2cdd27a.pdf', '2023-05-22 11:41:09', 1),
(11, 83, '1684848839_fae0caa650d54c10e333.pdf', '2023-05-23 13:33:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c_utilisateur_modalite`
--

CREATE TABLE `c_utilisateur_modalite` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_modalite` int(11) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_utilisateur_modalite`
--

INSERT INTO `c_utilisateur_modalite` (`id`, `id_utilisateur`, `id_modalite`, `date_ins`, `etat`) VALUES
(5, 2, 3, '2023-04-11 12:26:56', 1),
(6, 5, 1, '2023-04-11 13:02:40', 1),
(7, 3, 2, '2023-04-11 13:03:58', 1),
(8, 10, 1, '2023-04-11 13:04:48', 1),
(9, 13, 2, '2023-04-11 13:08:07', 1),
(10, 13, 5, '2023-04-11 13:08:07', 1),
(11, 15, 5, '2023-04-11 13:08:41', 1),
(12, 12, 5, '2023-04-11 13:10:01', 1),
(14, 18, 5, '2023-04-11 13:11:03', 1),
(15, 8, 7, '2023-04-11 13:11:09', 1),
(16, 9, 2, '2023-04-11 13:12:55', 1),
(17, 9, 5, '2023-04-11 13:12:55', 1),
(18, 9, 6, '2023-04-11 13:12:55', 1),
(19, 11, 5, '2023-04-11 13:13:04', 1),
(20, 20, 4, '2023-04-11 13:14:05', 1),
(21, 16, 7, '2023-04-11 13:14:35', 1),
(22, 4, 1, '2023-04-11 13:16:03', 1),
(23, 4, 2, '2023-04-11 13:16:03', 1),
(24, 4, 6, '2023-04-11 13:16:03', 1),
(25, 17, 2, '2023-04-11 13:20:16', 1),
(26, 22, 2, '2023-04-11 13:34:01', 1),
(27, 24, 5, '2023-04-12 05:38:56', 1),
(30, 26, 2, '2023-04-12 08:37:36', 1),
(31, 26, 3, '2023-04-12 08:37:36', 1),
(32, 26, 5, '2023-04-12 08:37:36', 1),
(35, 29, 3, '2023-04-12 10:48:08', 1),
(36, 29, 5, '2023-04-12 10:48:08', 1),
(37, 30, 7, '2023-04-13 12:34:54', 1),
(38, 31, 1, '2023-04-14 09:14:55', 1),
(41, 33, 2, '2023-04-16 15:17:26', 1),
(42, 33, 5, '2023-04-16 15:17:26', 1),
(43, 33, 6, '2023-04-16 15:17:26', 1),
(44, 36, 6, '2023-04-17 07:56:32', 1),
(45, 36, 7, '2023-04-17 07:56:32', 1),
(46, 42, 2, '2023-04-17 07:59:08', 1),
(47, 43, 3, '2023-04-17 07:59:13', 1),
(48, 43, 5, '2023-04-17 07:59:13', 1),
(49, 34, 2, '2023-04-17 07:59:14', 1),
(50, 34, 5, '2023-04-17 07:59:14', 1),
(51, 38, 5, '2023-04-17 08:00:01', 1),
(52, 48, 1, '2023-04-17 08:04:59', 1),
(53, 48, 5, '2023-04-17 08:04:59', 1),
(54, 39, 2, '2023-04-17 08:05:18', 1),
(55, 39, 5, '2023-04-17 08:05:18', 1),
(56, 50, 1, '2023-04-17 08:05:27', 1),
(57, 37, 2, '2023-04-17 08:05:50', 1),
(58, 40, 2, '2023-04-17 08:09:24', 1),
(59, 40, 5, '2023-04-17 08:09:24', 1),
(60, 40, 6, '2023-04-17 08:09:24', 1),
(61, 52, 5, '2023-04-17 08:12:10', 1),
(62, 43, 3, '2023-04-17 08:14:45', 1),
(63, 43, 5, '2023-04-17 08:14:45', 1),
(64, 44, 2, '2023-04-17 08:14:57', 1),
(65, 46, 5, '2023-04-17 08:17:29', 1),
(66, 45, 6, '2023-04-17 08:20:42', 1),
(67, 45, 1, '2023-04-17 08:21:46', 1),
(68, 45, 6, '2023-04-17 08:21:46', 1),
(69, 51, 1, '2023-04-17 08:24:01', 1),
(70, 51, 3, '2023-04-17 08:24:01', 1),
(71, 51, 5, '2023-04-17 08:24:01', 1),
(72, 51, 6, '2023-04-17 08:24:01', 1),
(73, 51, 1, '2023-04-17 08:27:47', 1),
(74, 51, 3, '2023-04-17 08:27:47', 1),
(75, 51, 5, '2023-04-17 08:27:47', 1),
(76, 51, 6, '2023-04-17 08:27:47', 1),
(77, 55, 2, '2023-04-18 12:01:46', 1),
(78, 55, 4, '2023-04-18 12:01:46', 1),
(79, 55, 5, '2023-04-18 12:01:46', 1),
(80, 55, 7, '2023-04-18 12:01:46', 1),
(88, 59, 2, '2023-04-22 11:04:35', 1),
(89, 62, 2, '2023-04-28 07:56:25', 1),
(90, 58, 1, '2023-05-02 07:03:39', 1),
(91, 58, 4, '2023-05-02 07:03:39', 1),
(92, 58, 5, '2023-05-02 07:03:39', 1),
(93, 65, 1, '2023-05-08 05:55:42', 1),
(94, 65, 3, '2023-05-08 05:55:42', 1),
(95, 65, 5, '2023-05-08 05:55:42', 1),
(96, 14, 7, '2023-05-12 12:50:50', 1),
(97, 69, 1, '2023-05-17 14:05:57', 1),
(98, 69, 2, '2023-05-17 14:05:57', 1),
(99, 69, 3, '2023-05-17 14:05:57', 1),
(100, 70, 1, '2023-05-18 10:40:28', 1),
(101, 70, 5, '2023-05-18 10:40:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c_utilisateur_particularite_action`
--

CREATE TABLE `c_utilisateur_particularite_action` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_particularite_action` int(11) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_utilisateur_particularite_action`
--

INSERT INTO `c_utilisateur_particularite_action` (`id`, `id_utilisateur`, `id_particularite_action`, `date_ins`, `etat`) VALUES
(5, 5, 2, '2023-04-11 13:01:51', 1),
(6, 5, 4, '2023-04-11 13:01:51', 1),
(7, 5, 9, '2023-04-11 13:01:51', 1),
(8, 3, 1, '2023-04-11 13:02:33', 1),
(9, 3, 2, '2023-04-11 13:02:33', 1),
(10, 3, 5, '2023-04-11 13:02:33', 1),
(11, 3, 6, '2023-04-11 13:02:33', 1),
(12, 3, 9, '2023-04-11 13:02:33', 1),
(13, 3, 10, '2023-04-11 13:02:33', 1),
(14, 8, 11, '2023-04-11 13:04:02', 1),
(15, 10, 1, '2023-04-11 13:04:14', 1),
(16, 10, 2, '2023-04-11 13:04:14', 1),
(17, 10, 3, '2023-04-11 13:04:14', 1),
(18, 10, 4, '2023-04-11 13:04:14', 1),
(19, 10, 5, '2023-04-11 13:04:14', 1),
(20, 10, 6, '2023-04-11 13:04:14', 1),
(21, 10, 9, '2023-04-11 13:04:14', 1),
(22, 10, 10, '2023-04-11 13:04:14', 1),
(23, 10, 11, '2023-04-11 13:04:14', 1),
(24, 15, 2, '2023-04-11 13:06:23', 1),
(25, 13, 1, '2023-04-11 13:07:32', 1),
(26, 13, 2, '2023-04-11 13:07:32', 1),
(27, 13, 9, '2023-04-11 13:07:32', 1),
(28, 13, 10, '2023-04-11 13:07:32', 1),
(29, 12, 9, '2023-04-11 13:08:54', 1),
(30, 12, 2, '2023-04-11 13:08:54', 1),
(31, 9, 3, '2023-04-11 13:09:24', 1),
(32, 9, 4, '2023-04-11 13:09:24', 1),
(33, 9, 6, '2023-04-11 13:09:24', 1),
(34, 9, 1, '2023-04-11 13:09:24', 1),
(35, 9, 2, '2023-04-11 13:09:24', 1),
(36, 9, 4, '2023-04-11 13:09:24', 1),
(37, 9, 11, '2023-04-11 13:09:24', 1),
(46, 18, 1, '2023-04-11 13:10:35', 1),
(47, 18, 2, '2023-04-11 13:10:35', 1),
(48, 18, 4, '2023-04-11 13:10:35', 1),
(49, 18, 6, '2023-04-11 13:10:35', 1),
(50, 18, 7, '2023-04-11 13:10:35', 1),
(51, 18, 8, '2023-04-11 13:10:35', 1),
(52, 18, 9, '2023-04-11 13:10:35', 1),
(53, 18, 11, '2023-04-11 13:10:35', 1),
(54, 8, 11, '2023-04-11 13:11:01', 1),
(55, 11, 1, '2023-04-11 13:12:38', 1),
(56, 11, 4, '2023-04-11 13:12:38', 1),
(57, 11, 11, '2023-04-11 13:12:38', 1),
(58, 16, 11, '2023-04-11 13:13:36', 1),
(59, 20, 1, '2023-04-11 13:13:55', 1),
(60, 20, 2, '2023-04-11 13:13:55', 1),
(61, 20, 3, '2023-04-11 13:13:55', 1),
(62, 4, 2, '2023-04-11 13:14:40', 1),
(63, 4, 4, '2023-04-11 13:14:40', 1),
(64, 4, 9, '2023-04-11 13:14:40', 1),
(65, 4, 10, '2023-04-11 13:14:40', 1),
(66, 4, 11, '2023-04-11 13:14:40', 1),
(67, 17, 2, '2023-04-11 13:19:45', 1),
(68, 17, 11, '2023-04-11 13:19:45', 1),
(69, 22, 11, '2023-04-11 13:32:38', 1),
(70, 24, 1, '2023-04-12 05:37:09', 1),
(71, 24, 2, '2023-04-12 05:37:09', 1),
(72, 24, 6, '2023-04-12 05:37:09', 1),
(73, 24, 10, '2023-04-12 05:37:09', 1),
(77, 26, 1, '2023-04-12 08:36:07', 1),
(78, 26, 2, '2023-04-12 08:36:07', 1),
(79, 26, 3, '2023-04-12 08:36:07', 1),
(80, 26, 4, '2023-04-12 08:36:07', 1),
(84, 29, 4, '2023-04-12 10:47:51', 1),
(85, 29, 6, '2023-04-12 10:47:51', 1),
(86, 29, 7, '2023-04-12 10:47:51', 1),
(87, 30, 3, '2023-04-13 12:32:08', 1),
(88, 30, 6, '2023-04-13 12:32:08', 1),
(89, 30, 7, '2023-04-13 12:32:08', 1),
(90, 31, 4, '2023-04-14 09:12:40', 1),
(92, 33, 1, '2023-04-16 15:11:38', 1),
(93, 33, 2, '2023-04-16 15:11:38', 1),
(94, 33, 3, '2023-04-16 15:11:38', 1),
(95, 36, 2, '2023-04-17 07:55:40', 1),
(96, 36, 4, '2023-04-17 07:55:40', 1),
(97, 34, 1, '2023-04-17 07:57:27', 1),
(98, 34, 2, '2023-04-17 07:57:27', 1),
(99, 34, 9, '2023-04-17 07:57:27', 1),
(100, 42, 1, '2023-04-17 07:58:14', 1),
(101, 42, 2, '2023-04-17 07:58:14', 1),
(102, 43, 1, '2023-04-17 07:58:44', 1),
(103, 43, 4, '2023-04-17 07:58:44', 1),
(104, 43, 9, '2023-04-17 07:58:44', 1),
(105, 38, 6, '2023-04-17 07:59:36', 1),
(106, 38, 9, '2023-04-17 07:59:36', 1),
(107, 39, 1, '2023-04-17 08:04:03', 1),
(108, 48, 3, '2023-04-17 08:04:18', 1),
(109, 48, 4, '2023-04-17 08:04:18', 1),
(110, 48, 9, '2023-04-17 08:04:18', 1),
(111, 37, 1, '2023-04-17 08:04:35', 1),
(112, 37, 2, '2023-04-17 08:04:35', 1),
(113, 37, 3, '2023-04-17 08:04:35', 1),
(114, 37, 4, '2023-04-17 08:04:35', 1),
(115, 37, 5, '2023-04-17 08:04:35', 1),
(116, 37, 6, '2023-04-17 08:04:35', 1),
(117, 37, 7, '2023-04-17 08:04:35', 1),
(118, 37, 8, '2023-04-17 08:04:35', 1),
(119, 37, 9, '2023-04-17 08:04:35', 1),
(120, 50, 3, '2023-04-17 08:04:56', 1),
(121, 50, 4, '2023-04-17 08:04:56', 1),
(122, 40, 1, '2023-04-17 08:07:58', 1),
(123, 40, 3, '2023-04-17 08:07:58', 1),
(124, 40, 10, '2023-04-17 08:07:58', 1),
(125, 52, 11, '2023-04-17 08:11:55', 1),
(126, 44, 2, '2023-04-17 08:13:16', 1),
(127, 43, 1, '2023-04-17 08:14:41', 1),
(128, 43, 4, '2023-04-17 08:14:41', 1),
(129, 43, 9, '2023-04-17 08:14:41', 1),
(130, 46, 2, '2023-04-17 08:15:53', 1),
(131, 45, 3, '2023-04-17 08:16:36', 1),
(132, 51, 2, '2023-04-17 08:22:13', 1),
(133, 51, 3, '2023-04-17 08:22:13', 1),
(134, 51, 11, '2023-04-17 08:22:13', 1),
(135, 55, 1, '2023-04-18 12:00:50', 1),
(136, 55, 7, '2023-04-18 12:00:50', 1),
(137, 55, 9, '2023-04-18 12:00:50', 1),
(138, 55, 10, '2023-04-18 12:00:50', 1),
(145, 59, 11, '2023-04-22 11:04:06', 1),
(146, 62, 2, '2023-04-28 07:56:06', 1),
(147, 62, 3, '2023-04-28 07:56:06', 1),
(148, 62, 4, '2023-04-28 07:56:06', 1),
(152, 58, 7, '2023-04-28 11:37:47', 1),
(153, 58, 8, '2023-04-28 11:37:47', 1),
(154, 58, 9, '2023-04-28 11:37:47', 1),
(155, 2, 11, '2023-05-04 05:28:02', 1),
(156, 65, 7, '2023-05-08 05:55:42', 1),
(157, 65, 8, '2023-05-08 05:55:42', 1),
(158, 65, 9, '2023-05-08 05:55:42', 1),
(159, 14, 1, '2023-05-12 12:50:37', 1),
(160, 14, 1, '2023-05-12 12:50:37', 1),
(161, 14, 6, '2023-05-12 12:50:37', 1),
(162, 14, 6, '2023-05-12 12:50:37', 1),
(163, 14, 10, '2023-05-12 12:50:37', 1),
(164, 14, 10, '2023-05-12 12:50:37', 1),
(165, 14, 11, '2023-05-12 12:50:37', 1),
(166, 14, 11, '2023-05-12 12:50:37', 1),
(167, 69, 1, '2023-05-17 14:05:57', 1),
(168, 69, 2, '2023-05-17 14:05:57', 1),
(169, 69, 3, '2023-05-17 14:05:57', 1),
(170, 70, 4, '2023-05-18 10:40:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c_utilisateur_public`
--

CREATE TABLE `c_utilisateur_public` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_public` int(11) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_utilisateur_public`
--

INSERT INTO `c_utilisateur_public` (`id`, `id_utilisateur`, `id_public`, `date_ins`, `etat`) VALUES
(33, 5, 4, '2023-04-11 13:00:13', 1),
(34, 5, 5, '2023-04-11 13:00:13', 1),
(35, 5, 8, '2023-04-11 13:00:13', 1),
(36, 3, 3, '2023-04-11 13:01:34', 1),
(37, 3, 4, '2023-04-11 13:01:34', 1),
(38, 3, 7, '2023-04-11 13:01:34', 1),
(39, 10, 3, '2023-04-11 13:03:32', 1),
(40, 10, 4, '2023-04-11 13:03:32', 1),
(41, 8, 1, '2023-04-11 13:03:35', 1),
(42, 8, 2, '2023-04-11 13:03:35', 1),
(43, 8, 3, '2023-04-11 13:03:35', 1),
(44, 8, 4, '2023-04-11 13:03:35', 1),
(45, 8, 5, '2023-04-11 13:03:35', 1),
(46, 8, 6, '2023-04-11 13:03:35', 1),
(47, 8, 7, '2023-04-11 13:03:35', 1),
(48, 8, 8, '2023-04-11 13:03:35', 1),
(49, 8, 1, '2023-04-11 13:03:35', 1),
(50, 8, 2, '2023-04-11 13:03:35', 1),
(51, 8, 3, '2023-04-11 13:03:35', 1),
(52, 8, 4, '2023-04-11 13:03:35', 1),
(53, 8, 5, '2023-04-11 13:03:35', 1),
(54, 8, 6, '2023-04-11 13:03:35', 1),
(55, 8, 7, '2023-04-11 13:03:35', 1),
(56, 8, 8, '2023-04-11 13:03:35', 1),
(57, 8, 8, '2023-04-11 13:03:54', 1),
(58, 15, 2, '2023-04-11 13:06:08', 1),
(59, 15, 7, '2023-04-11 13:06:08', 1),
(60, 13, 3, '2023-04-11 13:06:43', 1),
(61, 13, 4, '2023-04-11 13:06:43', 1),
(62, 13, 5, '2023-04-11 13:06:43', 1),
(63, 13, 6, '2023-04-11 13:06:43', 1),
(64, 13, 7, '2023-04-11 13:06:43', 1),
(65, 13, 8, '2023-04-11 13:06:43', 1),
(66, 18, 1, '2023-04-11 13:07:19', 1),
(67, 18, 2, '2023-04-11 13:07:19', 1),
(68, 18, 3, '2023-04-11 13:07:19', 1),
(69, 18, 4, '2023-04-11 13:07:19', 1),
(70, 18, 5, '2023-04-11 13:07:19', 1),
(71, 18, 6, '2023-04-11 13:07:19', 1),
(72, 18, 7, '2023-04-11 13:07:19', 1),
(73, 18, 8, '2023-04-11 13:07:19', 1),
(74, 18, 1, '2023-04-11 13:07:19', 1),
(75, 18, 2, '2023-04-11 13:07:19', 1),
(76, 18, 3, '2023-04-11 13:07:19', 1),
(77, 18, 4, '2023-04-11 13:07:19', 1),
(78, 18, 5, '2023-04-11 13:07:19', 1),
(79, 18, 6, '2023-04-11 13:07:19', 1),
(80, 18, 7, '2023-04-11 13:07:19', 1),
(81, 18, 8, '2023-04-11 13:07:19', 1),
(82, 9, 1, '2023-04-11 13:07:39', 1),
(83, 9, 2, '2023-04-11 13:07:39', 1),
(84, 9, 3, '2023-04-11 13:07:39', 1),
(85, 9, 4, '2023-04-11 13:07:39', 1),
(86, 9, 5, '2023-04-11 13:07:39', 1),
(87, 9, 6, '2023-04-11 13:07:39', 1),
(88, 9, 7, '2023-04-11 13:07:39', 1),
(89, 9, 8, '2023-04-11 13:07:39', 1),
(90, 9, 1, '2023-04-11 13:07:39', 1),
(91, 9, 2, '2023-04-11 13:07:39', 1),
(92, 9, 3, '2023-04-11 13:07:39', 1),
(93, 9, 4, '2023-04-11 13:07:39', 1),
(94, 9, 5, '2023-04-11 13:07:39', 1),
(95, 9, 6, '2023-04-11 13:07:39', 1),
(96, 9, 7, '2023-04-11 13:07:39', 1),
(97, 9, 8, '2023-04-11 13:07:39', 1),
(98, 12, 1, '2023-04-11 13:08:27', 1),
(99, 12, 2, '2023-04-11 13:08:27', 1),
(107, 8, 8, '2023-04-11 13:10:39', 1),
(108, 11, 1, '2023-04-11 13:11:52', 1),
(109, 11, 2, '2023-04-11 13:11:52', 1),
(110, 11, 3, '2023-04-11 13:11:52', 1),
(111, 11, 4, '2023-04-11 13:11:52', 1),
(112, 11, 5, '2023-04-11 13:11:52', 1),
(113, 11, 6, '2023-04-11 13:11:52', 1),
(114, 11, 7, '2023-04-11 13:11:52', 1),
(115, 11, 8, '2023-04-11 13:11:52', 1),
(116, 11, 1, '2023-04-11 13:11:52', 1),
(117, 11, 2, '2023-04-11 13:11:52', 1),
(118, 11, 3, '2023-04-11 13:11:52', 1),
(119, 11, 4, '2023-04-11 13:11:52', 1),
(120, 11, 5, '2023-04-11 13:11:52', 1),
(121, 11, 6, '2023-04-11 13:11:52', 1),
(122, 11, 7, '2023-04-11 13:11:52', 1),
(123, 11, 8, '2023-04-11 13:11:52', 1),
(124, 16, 6, '2023-04-11 13:12:08', 1),
(125, 16, 8, '2023-04-11 13:12:08', 1),
(126, 20, 1, '2023-04-11 13:13:48', 1),
(127, 4, 1, '2023-04-11 13:13:48', 1),
(128, 4, 2, '2023-04-11 13:13:48', 1),
(129, 4, 3, '2023-04-11 13:13:48', 1),
(130, 4, 4, '2023-04-11 13:13:48', 1),
(131, 4, 5, '2023-04-11 13:13:48', 1),
(132, 4, 6, '2023-04-11 13:13:48', 1),
(133, 4, 7, '2023-04-11 13:13:48', 1),
(134, 4, 8, '2023-04-11 13:13:48', 1),
(135, 4, 1, '2023-04-11 13:13:48', 1),
(136, 4, 2, '2023-04-11 13:13:48', 1),
(137, 4, 3, '2023-04-11 13:13:48', 1),
(138, 4, 4, '2023-04-11 13:13:48', 1),
(139, 4, 5, '2023-04-11 13:13:48', 1),
(140, 4, 6, '2023-04-11 13:13:48', 1),
(141, 4, 7, '2023-04-11 13:13:48', 1),
(142, 4, 8, '2023-04-11 13:13:48', 1),
(143, 17, 3, '2023-04-11 13:19:10', 1),
(144, 17, 7, '2023-04-11 13:19:10', 1),
(145, 17, 8, '2023-04-11 13:19:10', 1),
(146, 22, 8, '2023-04-11 13:30:32', 1),
(147, 24, 3, '2023-04-12 05:35:43', 1),
(148, 24, 4, '2023-04-12 05:35:43', 1),
(149, 24, 7, '2023-04-12 05:35:43', 1),
(153, 26, 3, '2023-04-12 08:34:09', 1),
(154, 26, 4, '2023-04-12 08:34:09', 1),
(155, 26, 5, '2023-04-12 08:34:09', 1),
(156, 26, 7, '2023-04-12 08:34:09', 1),
(160, 29, 1, '2023-04-12 10:47:36', 1),
(161, 29, 2, '2023-04-12 10:47:36', 1),
(162, 29, 5, '2023-04-12 10:47:36', 1),
(163, 30, 1, '2023-04-13 12:31:51', 1),
(164, 30, 2, '2023-04-13 12:31:51', 1),
(165, 30, 3, '2023-04-13 12:31:51', 1),
(166, 30, 4, '2023-04-13 12:31:51', 1),
(167, 30, 5, '2023-04-13 12:31:51', 1),
(168, 30, 6, '2023-04-13 12:31:51', 1),
(169, 30, 7, '2023-04-13 12:31:51', 1),
(170, 30, 8, '2023-04-13 12:31:51', 1),
(171, 31, 8, '2023-04-14 09:11:35', 1),
(180, 33, 6, '2023-04-16 15:11:31', 1),
(181, 36, 3, '2023-04-17 07:54:45', 1),
(182, 36, 4, '2023-04-17 07:54:45', 1),
(183, 36, 7, '2023-04-17 07:54:45', 1),
(184, 36, 8, '2023-04-17 07:54:45', 1),
(185, 42, 3, '2023-04-17 07:55:56', 1),
(186, 42, 4, '2023-04-17 07:55:56', 1),
(187, 34, 2, '2023-04-17 07:57:01', 1),
(188, 34, 3, '2023-04-17 07:57:01', 1),
(189, 34, 4, '2023-04-17 07:57:01', 1),
(190, 43, 3, '2023-04-17 07:58:23', 1),
(191, 43, 4, '2023-04-17 07:58:23', 1),
(192, 43, 5, '2023-04-17 07:58:23', 1),
(193, 43, 6, '2023-04-17 07:58:23', 1),
(194, 38, 1, '2023-04-17 07:58:57', 1),
(195, 38, 2, '2023-04-17 07:58:57', 1),
(196, 38, 3, '2023-04-17 07:58:57', 1),
(197, 38, 4, '2023-04-17 07:58:57', 1),
(198, 38, 5, '2023-04-17 07:58:57', 1),
(199, 38, 6, '2023-04-17 07:58:57', 1),
(200, 38, 7, '2023-04-17 07:58:57', 1),
(201, 38, 8, '2023-04-17 07:58:57', 1),
(202, 39, 5, '2023-04-17 08:02:40', 1),
(203, 39, 6, '2023-04-17 08:02:40', 1),
(204, 48, 2, '2023-04-17 08:03:10', 1),
(205, 48, 3, '2023-04-17 08:03:10', 1),
(206, 48, 4, '2023-04-17 08:03:10', 1),
(207, 48, 6, '2023-04-17 08:03:10', 1),
(208, 48, 7, '2023-04-17 08:03:10', 1),
(209, 37, 3, '2023-04-17 08:04:08', 1),
(210, 37, 4, '2023-04-17 08:04:08', 1),
(211, 37, 5, '2023-04-17 08:04:08', 1),
(212, 37, 6, '2023-04-17 08:04:08', 1),
(213, 37, 7, '2023-04-17 08:04:08', 1),
(214, 37, 8, '2023-04-17 08:04:08', 1),
(215, 50, 2, '2023-04-17 08:04:42', 1),
(216, 40, 2, '2023-04-17 08:06:57', 1),
(217, 40, 3, '2023-04-17 08:06:57', 1),
(218, 40, 4, '2023-04-17 08:06:57', 1),
(219, 40, 5, '2023-04-17 08:06:57', 1),
(220, 40, 6, '2023-04-17 08:06:57', 1),
(221, 40, 7, '2023-04-17 08:06:57', 1),
(222, 52, 8, '2023-04-17 08:11:26', 1),
(223, 44, 2, '2023-04-17 08:11:40', 1),
(224, 44, 7, '2023-04-17 08:11:40', 1),
(225, 44, 8, '2023-04-17 08:11:40', 1),
(226, 43, 3, '2023-04-17 08:14:38', 1),
(227, 43, 4, '2023-04-17 08:14:38', 1),
(228, 43, 5, '2023-04-17 08:14:38', 1),
(229, 43, 6, '2023-04-17 08:14:38', 1),
(230, 46, 4, '2023-04-17 08:14:56', 1),
(231, 46, 5, '2023-04-17 08:14:56', 1),
(232, 45, 1, '2023-04-17 08:15:48', 1),
(233, 45, 2, '2023-04-17 08:15:48', 1),
(234, 51, 1, '2023-04-17 08:21:13', 1),
(235, 51, 2, '2023-04-17 08:21:13', 1),
(236, 51, 3, '2023-04-17 08:21:13', 1),
(237, 51, 4, '2023-04-17 08:21:13', 1),
(238, 51, 5, '2023-04-17 08:21:13', 1),
(239, 51, 6, '2023-04-17 08:21:13', 1),
(240, 51, 7, '2023-04-17 08:21:13', 1),
(241, 51, 8, '2023-04-17 08:21:13', 1),
(242, 55, 1, '2023-04-18 12:00:08', 1),
(243, 55, 2, '2023-04-18 12:00:08', 1),
(244, 55, 3, '2023-04-18 12:00:08', 1),
(245, 55, 4, '2023-04-18 12:00:08', 1),
(246, 55, 5, '2023-04-18 12:00:08', 1),
(247, 55, 6, '2023-04-18 12:00:08', 1),
(248, 55, 7, '2023-04-18 12:00:08', 1),
(249, 55, 8, '2023-04-18 12:00:08', 1),
(265, 59, 8, '2023-04-22 11:02:46', 1),
(266, 62, 1, '2023-04-28 07:54:32', 1),
(267, 62, 2, '2023-04-28 07:54:32', 1),
(268, 62, 3, '2023-04-28 07:54:32', 1),
(269, 62, 4, '2023-04-28 07:54:32', 1),
(270, 62, 5, '2023-04-28 07:54:32', 1),
(271, 62, 6, '2023-04-28 07:54:32', 1),
(272, 62, 7, '2023-04-28 07:54:32', 1),
(273, 62, 8, '2023-04-28 07:54:32', 1),
(282, 58, 1, '2023-04-28 10:20:35', 1),
(283, 58, 2, '2023-04-28 10:20:35', 1),
(284, 58, 3, '2023-04-28 10:20:35', 1),
(285, 58, 4, '2023-04-28 10:20:35', 1),
(286, 58, 5, '2023-04-28 10:20:35', 1),
(287, 2, 7, '2023-05-04 05:27:39', 1),
(288, 2, 8, '2023-05-04 05:27:40', 1),
(289, 65, 1, '2023-05-08 05:55:42', 1),
(290, 65, 2, '2023-05-08 05:55:42', 1),
(291, 65, 3, '2023-05-08 05:55:42', 1),
(292, 14, 1, '2023-05-12 12:46:05', 1),
(293, 14, 2, '2023-05-12 12:46:05', 1),
(294, 14, 3, '2023-05-12 12:46:05', 1),
(295, 14, 4, '2023-05-12 12:46:05', 1),
(296, 14, 5, '2023-05-12 12:46:05', 1),
(297, 14, 7, '2023-05-12 12:46:05', 1),
(298, 14, 8, '2023-05-12 12:46:05', 1),
(299, 69, 6, '2023-05-17 14:05:57', 1),
(300, 70, 1, '2023-05-18 10:40:28', 1),
(301, 70, 2, '2023-05-18 10:40:28', 1),
(302, 70, 3, '2023-05-18 10:40:28', 1),
(303, 70, 4, '2023-05-18 10:40:28', 1),
(304, 70, 5, '2023-05-18 10:40:28', 1),
(305, 70, 6, '2023-05-18 10:40:28', 1),
(306, 70, 7, '2023-05-18 10:40:28', 1),
(307, 70, 8, '2023-05-18 10:40:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c_utilisateur_territoire`
--

CREATE TABLE `c_utilisateur_territoire` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_territoire` int(11) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_utilisateur_territoire`
--

INSERT INTO `c_utilisateur_territoire` (`id`, `id_utilisateur`, `id_territoire`, `date_ins`, `etat`) VALUES
(20, 5, 3, '2023-04-11 13:02:05', 1),
(21, 3, 1, '2023-04-11 13:03:13', 1),
(22, 8, 1, '2023-04-11 13:04:06', 1),
(23, 8, 2, '2023-04-11 13:04:06', 1),
(24, 8, 3, '2023-04-11 13:04:06', 1),
(25, 8, 4, '2023-04-11 13:04:06', 1),
(26, 8, 5, '2023-04-11 13:04:06', 1),
(27, 8, 6, '2023-04-11 13:04:06', 1),
(28, 8, 1, '2023-04-11 13:04:06', 1),
(29, 8, 2, '2023-04-11 13:04:06', 1),
(30, 8, 3, '2023-04-11 13:04:06', 1),
(31, 8, 4, '2023-04-11 13:04:06', 1),
(32, 8, 5, '2023-04-11 13:04:06', 1),
(33, 8, 6, '2023-04-11 13:04:06', 1),
(34, 10, 3, '2023-04-11 13:04:21', 1),
(35, 15, 1, '2023-04-11 13:06:30', 1),
(36, 15, 2, '2023-04-11 13:06:30', 1),
(37, 15, 3, '2023-04-11 13:06:30', 1),
(38, 15, 4, '2023-04-11 13:06:30', 1),
(39, 15, 5, '2023-04-11 13:06:30', 1),
(40, 15, 6, '2023-04-11 13:06:30', 1),
(41, 15, 1, '2023-04-11 13:06:30', 1),
(42, 15, 2, '2023-04-11 13:06:30', 1),
(43, 15, 3, '2023-04-11 13:06:30', 1),
(44, 15, 4, '2023-04-11 13:06:30', 1),
(45, 15, 5, '2023-04-11 13:06:30', 1),
(46, 15, 6, '2023-04-11 13:06:30', 1),
(47, 13, 1, '2023-04-11 13:07:49', 1),
(48, 13, 2, '2023-04-11 13:07:49', 1),
(49, 13, 3, '2023-04-11 13:07:49', 1),
(50, 13, 4, '2023-04-11 13:07:49', 1),
(51, 13, 5, '2023-04-11 13:07:49', 1),
(52, 13, 6, '2023-04-11 13:07:49', 1),
(53, 9, 1, '2023-04-11 13:09:37', 1),
(54, 9, 2, '2023-04-11 13:09:37', 1),
(55, 9, 3, '2023-04-11 13:09:37', 1),
(56, 9, 4, '2023-04-11 13:09:37', 1),
(57, 9, 5, '2023-04-11 13:09:37', 1),
(58, 9, 6, '2023-04-11 13:09:37', 1),
(59, 9, 1, '2023-04-11 13:09:37', 1),
(60, 9, 2, '2023-04-11 13:09:37', 1),
(61, 9, 3, '2023-04-11 13:09:37', 1),
(62, 9, 4, '2023-04-11 13:09:37', 1),
(63, 9, 5, '2023-04-11 13:09:37', 1),
(64, 9, 6, '2023-04-11 13:09:37', 1),
(65, 12, 2, '2023-04-11 13:09:42', 1),
(66, 14, 1, '2023-04-11 13:10:04', 1),
(67, 14, 2, '2023-04-11 13:10:04', 1),
(68, 14, 3, '2023-04-11 13:10:04', 1),
(69, 14, 4, '2023-04-11 13:10:04', 1),
(70, 14, 5, '2023-04-11 13:10:04', 1),
(71, 14, 6, '2023-04-11 13:10:04', 1),
(72, 14, 1, '2023-04-11 13:10:04', 1),
(73, 14, 2, '2023-04-11 13:10:04', 1),
(74, 14, 3, '2023-04-11 13:10:04', 1),
(75, 14, 4, '2023-04-11 13:10:04', 1),
(76, 14, 5, '2023-04-11 13:10:04', 1),
(77, 14, 6, '2023-04-11 13:10:04', 1),
(78, 18, 1, '2023-04-11 13:10:50', 1),
(79, 18, 2, '2023-04-11 13:10:50', 1),
(80, 18, 4, '2023-04-11 13:10:50', 1),
(81, 8, 1, '2023-04-11 13:11:05', 1),
(82, 8, 2, '2023-04-11 13:11:05', 1),
(83, 8, 3, '2023-04-11 13:11:05', 1),
(84, 8, 4, '2023-04-11 13:11:05', 1),
(85, 8, 5, '2023-04-11 13:11:05', 1),
(86, 8, 6, '2023-04-11 13:11:05', 1),
(87, 8, 1, '2023-04-11 13:11:05', 1),
(88, 8, 2, '2023-04-11 13:11:05', 1),
(89, 8, 3, '2023-04-11 13:11:05', 1),
(90, 8, 4, '2023-04-11 13:11:05', 1),
(91, 8, 5, '2023-04-11 13:11:05', 1),
(92, 8, 6, '2023-04-11 13:11:05', 1),
(93, 11, 2, '2023-04-11 13:12:49', 1),
(94, 16, 1, '2023-04-11 13:13:50', 1),
(95, 16, 2, '2023-04-11 13:13:50', 1),
(96, 16, 3, '2023-04-11 13:13:50', 1),
(97, 16, 4, '2023-04-11 13:13:50', 1),
(98, 16, 5, '2023-04-11 13:13:50', 1),
(99, 16, 6, '2023-04-11 13:13:50', 1),
(100, 16, 1, '2023-04-11 13:13:50', 1),
(101, 16, 2, '2023-04-11 13:13:50', 1),
(102, 16, 3, '2023-04-11 13:13:50', 1),
(103, 16, 4, '2023-04-11 13:13:50', 1),
(104, 16, 5, '2023-04-11 13:13:50', 1),
(105, 16, 6, '2023-04-11 13:13:50', 1),
(106, 20, 3, '2023-04-11 13:13:59', 1),
(107, 4, 1, '2023-04-11 13:14:45', 1),
(108, 4, 2, '2023-04-11 13:14:45', 1),
(109, 4, 3, '2023-04-11 13:14:45', 1),
(110, 4, 4, '2023-04-11 13:14:45', 1),
(111, 4, 5, '2023-04-11 13:14:45', 1),
(112, 4, 6, '2023-04-11 13:14:45', 1),
(113, 4, 1, '2023-04-11 13:14:45', 1),
(114, 4, 2, '2023-04-11 13:14:45', 1),
(115, 4, 3, '2023-04-11 13:14:45', 1),
(116, 4, 4, '2023-04-11 13:14:45', 1),
(117, 4, 5, '2023-04-11 13:14:45', 1),
(118, 4, 6, '2023-04-11 13:14:45', 1),
(119, 17, 1, '2023-04-11 13:19:55', 1),
(120, 22, 1, '2023-04-11 13:33:29', 1),
(121, 22, 2, '2023-04-11 13:33:29', 1),
(122, 22, 3, '2023-04-11 13:33:29', 1),
(123, 22, 4, '2023-04-11 13:33:29', 1),
(124, 22, 5, '2023-04-11 13:33:29', 1),
(125, 22, 6, '2023-04-11 13:33:29', 1),
(126, 22, 1, '2023-04-11 13:33:29', 1),
(127, 22, 2, '2023-04-11 13:33:29', 1),
(128, 22, 3, '2023-04-11 13:33:29', 1),
(129, 22, 4, '2023-04-11 13:33:29', 1),
(130, 22, 5, '2023-04-11 13:33:29', 1),
(131, 22, 6, '2023-04-11 13:33:29', 1),
(132, 24, 2, '2023-04-12 05:38:12', 1),
(135, 26, 2, '2023-04-12 08:36:26', 1),
(136, 26, 3, '2023-04-12 08:36:26', 1),
(140, 29, 1, '2023-04-12 10:47:56', 1),
(141, 29, 3, '2023-04-12 10:47:56', 1),
(142, 29, 6, '2023-04-12 10:47:56', 1),
(143, 30, 1, '2023-04-13 12:33:17', 1),
(144, 30, 2, '2023-04-13 12:33:17', 1),
(145, 30, 3, '2023-04-13 12:33:17', 1),
(146, 30, 4, '2023-04-13 12:33:17', 1),
(147, 30, 5, '2023-04-13 12:33:17', 1),
(148, 30, 6, '2023-04-13 12:33:17', 1),
(149, 31, 1, '2023-04-14 09:14:37', 1),
(150, 31, 2, '2023-04-14 09:14:37', 1),
(151, 31, 3, '2023-04-14 09:14:37', 1),
(152, 31, 4, '2023-04-14 09:14:37', 1),
(153, 31, 5, '2023-04-14 09:14:37', 1),
(154, 31, 6, '2023-04-14 09:14:37', 1),
(162, 33, 1, '2023-04-16 15:16:10', 1),
(163, 33, 1, '2023-04-16 15:16:10', 1),
(164, 33, 2, '2023-04-16 15:16:10', 1),
(165, 33, 3, '2023-04-16 15:16:10', 1),
(166, 33, 4, '2023-04-16 15:16:10', 1),
(167, 33, 5, '2023-04-16 15:16:10', 1),
(168, 33, 6, '2023-04-16 15:16:10', 1),
(169, 36, 1, '2023-04-17 07:56:16', 1),
(170, 36, 2, '2023-04-17 07:56:16', 1),
(171, 36, 3, '2023-04-17 07:56:16', 1),
(172, 36, 4, '2023-04-17 07:56:16', 1),
(173, 36, 5, '2023-04-17 07:56:16', 1),
(174, 36, 6, '2023-04-17 07:56:16', 1),
(175, 34, 1, '2023-04-17 07:58:31', 1),
(176, 34, 2, '2023-04-17 07:58:31', 1),
(177, 34, 3, '2023-04-17 07:58:31', 1),
(178, 34, 4, '2023-04-17 07:58:31', 1),
(179, 34, 5, '2023-04-17 07:58:31', 1),
(180, 34, 6, '2023-04-17 07:58:31', 1),
(181, 42, 6, '2023-04-17 07:58:55', 1),
(182, 43, 1, '2023-04-17 07:58:56', 1),
(183, 43, 2, '2023-04-17 07:58:56', 1),
(184, 43, 3, '2023-04-17 07:58:56', 1),
(185, 43, 4, '2023-04-17 07:58:56', 1),
(186, 43, 5, '2023-04-17 07:58:56', 1),
(187, 43, 6, '2023-04-17 07:58:56', 1),
(188, 38, 1, '2023-04-17 07:59:47', 1),
(189, 38, 2, '2023-04-17 07:59:47', 1),
(190, 38, 3, '2023-04-17 07:59:47', 1),
(191, 38, 4, '2023-04-17 07:59:47', 1),
(192, 38, 5, '2023-04-17 07:59:47', 1),
(193, 38, 6, '2023-04-17 07:59:47', 1),
(194, 39, 1, '2023-04-17 08:04:10', 1),
(195, 39, 2, '2023-04-17 08:04:10', 1),
(196, 39, 3, '2023-04-17 08:04:10', 1),
(197, 39, 4, '2023-04-17 08:04:10', 1),
(198, 39, 5, '2023-04-17 08:04:10', 1),
(199, 39, 6, '2023-04-17 08:04:10', 1),
(200, 48, 1, '2023-04-17 08:04:28', 1),
(201, 37, 1, '2023-04-17 08:04:41', 1),
(202, 37, 2, '2023-04-17 08:04:41', 1),
(203, 37, 3, '2023-04-17 08:04:41', 1),
(204, 37, 4, '2023-04-17 08:04:41', 1),
(205, 37, 5, '2023-04-17 08:04:41', 1),
(206, 37, 6, '2023-04-17 08:04:41', 1),
(207, 50, 3, '2023-04-17 08:05:05', 1),
(208, 40, 1, '2023-04-17 08:08:45', 1),
(209, 40, 2, '2023-04-17 08:08:45', 1),
(210, 40, 3, '2023-04-17 08:08:45', 1),
(211, 40, 4, '2023-04-17 08:08:45', 1),
(212, 40, 6, '2023-04-17 08:08:45', 1),
(213, 52, 1, '2023-04-17 08:11:57', 1),
(214, 52, 2, '2023-04-17 08:11:57', 1),
(215, 52, 3, '2023-04-17 08:11:57', 1),
(216, 52, 4, '2023-04-17 08:11:57', 1),
(217, 52, 5, '2023-04-17 08:11:57', 1),
(218, 52, 6, '2023-04-17 08:11:57', 1),
(219, 44, 1, '2023-04-17 08:14:21', 1),
(220, 44, 2, '2023-04-17 08:14:21', 1),
(221, 44, 6, '2023-04-17 08:14:21', 1),
(222, 43, 1, '2023-04-17 08:14:43', 1),
(223, 43, 2, '2023-04-17 08:14:43', 1),
(224, 43, 3, '2023-04-17 08:14:43', 1),
(225, 43, 4, '2023-04-17 08:14:43', 1),
(226, 43, 5, '2023-04-17 08:14:43', 1),
(227, 43, 6, '2023-04-17 08:14:43', 1),
(228, 46, 1, '2023-04-17 08:16:05', 1),
(229, 46, 2, '2023-04-17 08:16:05', 1),
(230, 46, 3, '2023-04-17 08:16:05', 1),
(231, 46, 4, '2023-04-17 08:16:05', 1),
(232, 46, 5, '2023-04-17 08:16:05', 1),
(233, 46, 6, '2023-04-17 08:16:05', 1),
(234, 45, 3, '2023-04-17 08:17:06', 1),
(235, 51, 1, '2023-04-17 08:22:19', 1),
(236, 51, 2, '2023-04-17 08:22:19', 1),
(237, 51, 3, '2023-04-17 08:22:19', 1),
(238, 51, 4, '2023-04-17 08:22:19', 1),
(239, 51, 5, '2023-04-17 08:22:19', 1),
(240, 51, 6, '2023-04-17 08:22:19', 1),
(241, 55, 1, '2023-04-18 12:01:29', 1),
(242, 55, 2, '2023-04-18 12:01:29', 1),
(243, 55, 3, '2023-04-18 12:01:29', 1),
(244, 55, 4, '2023-04-18 12:01:29', 1),
(245, 55, 5, '2023-04-18 12:01:29', 1),
(246, 55, 6, '2023-04-18 12:01:29', 1),
(259, 59, 1, '2023-04-22 11:04:21', 1),
(260, 59, 2, '2023-04-22 11:04:21', 1),
(261, 59, 3, '2023-04-22 11:04:21', 1),
(262, 59, 4, '2023-04-22 11:04:21', 1),
(263, 59, 6, '2023-04-22 11:04:21', 1),
(264, 62, 1, '2023-04-28 07:56:11', 1),
(265, 62, 2, '2023-04-28 07:56:11', 1),
(266, 62, 3, '2023-04-28 07:56:11', 1),
(267, 62, 4, '2023-04-28 07:56:11', 1),
(268, 62, 5, '2023-04-28 07:56:11', 1),
(269, 62, 6, '2023-04-28 07:56:11', 1),
(270, 58, 1, '2023-05-02 09:35:34', 1),
(271, 58, 2, '2023-05-02 09:35:34', 1),
(272, 58, 3, '2023-05-02 09:35:34', 1),
(273, 58, 4, '2023-05-02 09:35:34', 1),
(274, 58, 5, '2023-05-02 09:35:34', 1),
(275, 58, 6, '2023-05-02 09:35:34', 1),
(276, 2, 1, '2023-05-04 05:29:59', 1),
(277, 2, 1, '2023-05-04 05:29:59', 1),
(278, 2, 2, '2023-05-04 05:29:59', 1),
(279, 2, 2, '2023-05-04 05:29:59', 1),
(280, 2, 3, '2023-05-04 05:29:59', 1),
(281, 2, 3, '2023-05-04 05:29:59', 1),
(282, 2, 4, '2023-05-04 05:29:59', 1),
(283, 2, 4, '2023-05-04 05:29:59', 1),
(284, 2, 5, '2023-05-04 05:29:59', 1),
(285, 2, 5, '2023-05-04 05:29:59', 1),
(286, 2, 6, '2023-05-04 05:29:59', 1),
(287, 2, 6, '2023-05-04 05:29:59', 1),
(288, 65, 1, '2023-05-08 05:55:42', 1),
(289, 65, 2, '2023-05-08 05:55:42', 1),
(290, 65, 3, '2023-05-08 05:55:42', 1),
(291, 65, 5, '2023-05-08 05:55:42', 1),
(292, 69, 1, '2023-05-17 14:05:57', 1),
(293, 69, 2, '2023-05-17 14:05:57', 1),
(294, 69, 3, '2023-05-17 14:05:57', 1),
(295, 69, 4, '2023-05-17 14:05:57', 1),
(296, 69, 5, '2023-05-17 14:05:57', 1),
(297, 69, 6, '2023-05-17 14:05:57', 1),
(298, 70, 1, '2023-05-18 10:40:28', 1),
(299, 70, 2, '2023-05-18 10:40:28', 1),
(300, 70, 3, '2023-05-18 10:40:28', 1),
(301, 70, 4, '2023-05-18 10:40:28', 1),
(302, 70, 5, '2023-05-18 10:40:28', 1),
(303, 70, 6, '2023-05-18 10:40:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c_utilisateur_thematique`
--

CREATE TABLE `c_utilisateur_thematique` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_thematique` int(11) NOT NULL,
  `date_ins` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_utilisateur_thematique`
--

INSERT INTO `c_utilisateur_thematique` (`id`, `id_utilisateur`, `id_thematique`, `date_ins`, `etat`) VALUES
(6, 5, 7, '2023-04-11 12:59:53', 1),
(7, 5, 13, '2023-04-11 12:59:53', 1),
(8, 5, 18, '2023-04-11 12:59:53', 1),
(9, 3, 5, '2023-04-11 13:01:14', 1),
(10, 3, 13, '2023-04-11 13:01:14', 1),
(11, 3, 20, '2023-04-11 13:01:14', 1),
(12, 10, 4, '2023-04-11 13:03:23', 1),
(13, 10, 6, '2023-04-11 13:03:23', 1),
(14, 10, 13, '2023-04-11 13:03:23', 1),
(15, 8, 3, '2023-04-11 13:03:32', 1),
(16, 8, 18, '2023-04-11 13:03:32', 1),
(17, 15, 5, '2023-04-11 13:05:44', 1),
(18, 13, 13, '2023-04-11 13:06:05', 1),
(19, 13, 18, '2023-04-11 13:06:05', 1),
(20, 9, 4, '2023-04-11 13:06:52', 1),
(21, 9, 5, '2023-04-11 13:06:52', 1),
(22, 9, 9, '2023-04-11 13:06:52', 1),
(23, 18, 10, '2023-04-11 13:07:00', 1),
(24, 18, 12, '2023-04-11 13:07:00', 1),
(25, 18, 21, '2023-04-11 13:07:00', 1),
(29, 12, 12, '2023-04-11 13:08:19', 1),
(30, 12, 14, '2023-04-11 13:08:19', 1),
(31, 12, 5, '2023-04-11 13:08:19', 1),
(32, 8, 3, '2023-04-11 13:10:35', 1),
(33, 8, 18, '2023-04-11 13:10:35', 1),
(34, 11, 9, '2023-04-11 13:11:39', 1),
(35, 11, 18, '2023-04-11 13:11:39', 1),
(36, 11, 21, '2023-04-11 13:11:39', 1),
(37, 16, 13, '2023-04-11 13:11:39', 1),
(38, 16, 14, '2023-04-11 13:11:39', 1),
(39, 16, 6, '2023-04-11 13:11:39', 1),
(40, 4, 13, '2023-04-11 13:13:33', 1),
(41, 4, 15, '2023-04-11 13:13:33', 1),
(42, 4, 18, '2023-04-11 13:13:33', 1),
(43, 20, 1, '2023-04-11 13:13:43', 1),
(44, 20, 2, '2023-04-11 13:13:43', 1),
(45, 20, 3, '2023-04-11 13:13:43', 1),
(46, 17, 4, '2023-04-11 13:18:45', 1),
(47, 17, 5, '2023-04-11 13:18:45', 1),
(48, 17, 18, '2023-04-11 13:18:45', 1),
(49, 22, 3, '2023-04-11 13:30:03', 1),
(50, 24, 4, '2023-04-12 05:35:21', 1),
(51, 24, 13, '2023-04-12 05:35:21', 1),
(52, 24, 14, '2023-04-12 05:35:21', 1),
(56, 26, 13, '2023-04-12 08:33:25', 1),
(57, 26, 2, '2023-04-12 08:33:25', 1),
(58, 26, 14, '2023-04-12 08:33:25', 1),
(62, 29, 18, '2023-04-12 10:47:20', 1),
(63, 29, 19, '2023-04-12 10:47:20', 1),
(64, 29, 21, '2023-04-12 10:47:20', 1),
(65, 30, 1, '2023-04-13 12:31:39', 1),
(66, 30, 4, '2023-04-13 12:31:39', 1),
(67, 30, 6, '2023-04-13 12:31:39', 1),
(68, 31, 3, '2023-04-14 09:10:58', 1),
(72, 33, 1, '2023-04-16 15:11:25', 1),
(73, 33, 3, '2023-04-16 15:11:25', 1),
(74, 33, 4, '2023-04-16 15:11:25', 1),
(75, 36, 18, '2023-04-17 07:54:29', 1),
(76, 42, 4, '2023-04-17 07:55:39', 1),
(77, 42, 9, '2023-04-17 07:55:39', 1),
(78, 42, 14, '2023-04-17 07:55:39', 1),
(79, 34, 8, '2023-04-17 07:55:47', 1),
(80, 34, 13, '2023-04-17 07:55:47', 1),
(81, 34, 14, '2023-04-17 07:55:47', 1),
(82, 43, 9, '2023-04-17 07:58:11', 1),
(83, 43, 15, '2023-04-17 07:58:11', 1),
(84, 43, 20, '2023-04-17 07:58:11', 1),
(85, 38, 13, '2023-04-17 07:58:49', 1),
(86, 38, 15, '2023-04-17 07:58:49', 1),
(87, 38, 18, '2023-04-17 07:58:49', 1),
(88, 39, 18, '2023-04-17 08:01:59', 1),
(89, 48, 3, '2023-04-17 08:02:38', 1),
(90, 48, 9, '2023-04-17 08:02:38', 1),
(91, 48, 18, '2023-04-17 08:02:38', 1),
(92, 37, 3, '2023-04-17 08:03:26', 1),
(93, 37, 9, '2023-04-17 08:03:26', 1),
(94, 37, 13, '2023-04-17 08:03:26', 1),
(95, 50, 4, '2023-04-17 08:04:34', 1),
(96, 50, 10, '2023-04-17 08:04:34', 1),
(97, 40, 11, '2023-04-17 08:05:41', 1),
(98, 40, 13, '2023-04-17 08:05:41', 1),
(99, 40, 18, '2023-04-17 08:05:41', 1),
(100, 44, 4, '2023-04-17 08:11:07', 1),
(101, 44, 5, '2023-04-17 08:11:07', 1),
(102, 44, 14, '2023-04-17 08:11:07', 1),
(103, 52, 3, '2023-04-17 08:11:11', 1),
(104, 43, 9, '2023-04-17 08:14:36', 1),
(105, 43, 15, '2023-04-17 08:14:36', 1),
(106, 43, 20, '2023-04-17 08:14:36', 1),
(107, 46, 13, '2023-04-17 08:14:36', 1),
(108, 45, 4, '2023-04-17 08:15:27', 1),
(109, 45, 9, '2023-04-17 08:15:27', 1),
(110, 45, 10, '2023-04-17 08:15:27', 1),
(111, 51, 5, '2023-04-17 08:20:03', 1),
(112, 51, 7, '2023-04-17 08:20:03', 1),
(113, 51, 13, '2023-04-17 08:20:03', 1),
(114, 55, 1, '2023-04-18 11:59:45', 1),
(115, 55, 6, '2023-04-18 11:59:45', 1),
(123, 59, 3, '2023-04-22 11:02:40', 1),
(124, 62, 10, '2023-04-28 07:54:20', 1),
(125, 62, 15, '2023-04-28 07:54:20', 1),
(126, 62, 16, '2023-04-28 07:54:20', 1),
(127, 58, 2, '2023-04-28 08:16:28', 1),
(128, 58, 3, '2023-04-28 08:16:28', 1),
(129, 58, 21, '2023-04-28 08:16:28', 1),
(130, 2, 3, '2023-05-04 05:27:07', 1),
(131, 2, 18, '2023-05-04 05:27:07', 1),
(132, 65, 1, '2023-05-08 05:55:42', 1),
(133, 65, 3, '2023-05-08 05:55:42', 1),
(134, 14, 4, '2023-05-12 12:49:50', 1),
(135, 14, 6, '2023-05-12 12:49:50', 1),
(136, 14, 12, '2023-05-12 12:49:50', 1),
(137, 69, 14, '2023-05-17 14:05:57', 1),
(138, 69, 15, '2023-05-17 14:05:57', 1),
(139, 69, 16, '2023-05-17 14:05:57', 1),
(140, 70, 1, '2023-05-18 10:40:28', 1),
(141, 70, 10, '2023-05-18 10:40:28', 1),
(142, 70, 15, '2023-05-18 10:40:28', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `passage_quotidien`
-- (See below for the actual view)
--
CREATE TABLE `passage_quotidien` (
`somme_passages` decimal(32,0)
,`email` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `structure_categorie`
-- (See below for the actual view)
--
CREATE TABLE `structure_categorie` (
`nbr` bigint(21)
,`nom` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_act_struct`
-- (See below for the actual view)
--
CREATE TABLE `v_act_struct` (
`id` int(11)
,`id_acteur` int(11)
,`id_struct` int(11)
,`date_ins` timestamp
,`etat` int(11)
,`nom_social` varchar(500)
,`sigle` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_act_struct_user`
-- (See below for the actual view)
--
CREATE TABLE `v_act_struct_user` (
`id_acteur` int(11)
,`id_struct` int(11)
,`nom_social` varchar(500)
,`sigle` varchar(50)
,`id` int(11)
,`photo_profil` varchar(50)
,`id_utilisateur` int(11)
,`nom` varchar(50)
,`prenom` varchar(50)
,`etat` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_cs_struct_categorie`
-- (See below for the actual view)
--
CREATE TABLE `v_cs_struct_categorie` (
`id` int(11)
,`id_utilisateur` int(11)
,`id_categorie` int(11)
,`nom_social` varchar(500)
,`sigle` varchar(50)
,`siren` varchar(50)
,`adresse_siege` varchar(50)
,`adresse_principale` varchar(50)
,`email_siege` varchar(50)
,`tel_siege` varchar(50)
,`site_web` varchar(50)
,`desc_horaire_ouverture` text
,`desc_mission` text
,`exemples_action` text
,`photo_logo` varchar(100)
,`date_ins` timestamp
,`etat` int(11)
,`image_cat` varchar(80)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_cs_struct_notification`
-- (See below for the actual view)
--
CREATE TABLE `v_cs_struct_notification` (
`id` int(11)
,`nom_social` varchar(500)
,`id_utilisateur` int(11)
,`photo_logo` varchar(100)
,`id_envoyeur` int(11)
,`id_recepteur` int(11)
,`lu` int(11)
,`id_notification` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_cs_stru_user_cat`
-- (See below for the actual view)
--
CREATE TABLE `v_cs_stru_user_cat` (
`id` int(11)
,`id_utilisateur` int(11)
,`email` varchar(50)
,`id_categorie` int(11)
,`nomcategorie` varchar(50)
,`nom_social` varchar(500)
,`siren` varchar(50)
,`email_siege` varchar(50)
,`photo_logo` varchar(100)
,`etat` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_demande_confimer_struct`
-- (See below for the actual view)
--
CREATE TABLE `v_demande_confimer_struct` (
`id` int(11)
,`nom_social` varchar(500)
,`id_utilisateur` int(11)
,`photo_logo` varchar(100)
,`id_envoyeur` int(11)
,`id_recepteur` int(11)
,`lu` int(11)
,`id_notification` int(11)
,`id_acteur` int(11)
,`id_struct` int(11)
,`etat` int(11)
,`id_demande` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `passage_quotidien`
--
DROP TABLE IF EXISTS `passage_quotidien`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`agoracgagoracity`@`%` SQL SECURITY DEFINER VIEW `passage_quotidien`  AS SELECT coalesce(sum(`t1`.`nombre_de_passages`),0) AS `somme_passages`, `t2`.`email` AS `email` FROM (`c_utilisateur` `t2` left join `c_utilisateur` `t1` on((`t1`.`id` = `t2`.`id`))) GROUP BY `t2`.`id` ORDER BY `somme_passages` DESC LIMIT 0, 5 ;

-- --------------------------------------------------------

--
-- Structure for view `structure_categorie`
--
DROP TABLE IF EXISTS `structure_categorie`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`agoracgagoracity`@`%` SQL SECURITY DEFINER VIEW `structure_categorie`  AS SELECT count(`str`.`id`) AS `nbr`, `cat`.`nom` AS `nom` FROM (`cs_struct` `str` join `cs_categorie` `cat` on((`cat`.`id` = `str`.`id_categorie`))) GROUP BY `str`.`id_categorie` ;

-- --------------------------------------------------------

--
-- Structure for view `v_act_struct`
--
DROP TABLE IF EXISTS `v_act_struct`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`agoracgagoracity`@`%` SQL SECURITY DEFINER VIEW `v_act_struct`  AS SELECT `ca`.`id` AS `id`, `ca`.`id_acteur` AS `id_acteur`, `ca`.`id_struct` AS `id_struct`, `ca`.`date_ins` AS `date_ins`, `ca`.`etat` AS `etat`, `cs`.`nom_social` AS `nom_social`, `cs`.`sigle` AS `sigle` FROM (`c_acteur_struct` `ca` join `cs_struct` `cs` on((`ca`.`id_struct` = `cs`.`id`))) WHERE (`ca`.`etat` = 2) ;

-- --------------------------------------------------------

--
-- Structure for view `v_act_struct_user`
--
DROP TABLE IF EXISTS `v_act_struct_user`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_act_struct_user`  AS SELECT `v`.`id_acteur` AS `id_acteur`, `v`.`id_struct` AS `id_struct`, `v`.`nom_social` AS `nom_social`, `v`.`sigle` AS `sigle`, `ca`.`id` AS `id`, `ca`.`photo_profil` AS `photo_profil`, `ca`.`id_utilisateur` AS `id_utilisateur`, `ca`.`nom` AS `nom`, `ca`.`prenom` AS `prenom`, `ca`.`etat` AS `etat` FROM (`ca_acteur` `ca` left join `v_act_struct` `v` on((`ca`.`id` = `v`.`id_acteur`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_cs_struct_categorie`
--
DROP TABLE IF EXISTS `v_cs_struct_categorie`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`agoracgagoracity`@`%` SQL SECURITY DEFINER VIEW `v_cs_struct_categorie`  AS SELECT `cs_struct`.`id` AS `id`, `cs_struct`.`id_utilisateur` AS `id_utilisateur`, `cs_struct`.`id_categorie` AS `id_categorie`, `cs_struct`.`nom_social` AS `nom_social`, `cs_struct`.`sigle` AS `sigle`, `cs_struct`.`siren` AS `siren`, `cs_struct`.`adresse_siege` AS `adresse_siege`, `cs_struct`.`adresse_principale` AS `adresse_principale`, `cs_struct`.`email_siege` AS `email_siege`, `cs_struct`.`tel_siege` AS `tel_siege`, `cs_struct`.`site_web` AS `site_web`, `cs_struct`.`desc_horaire_ouverture` AS `desc_horaire_ouverture`, `cs_struct`.`desc_mission` AS `desc_mission`, `cs_struct`.`exemples_action` AS `exemples_action`, `cs_struct`.`photo_logo` AS `photo_logo`, `cs_struct`.`date_ins` AS `date_ins`, `cs_struct`.`etat` AS `etat`, `cs_categorie`.`image_cat` AS `image_cat` FROM (`cs_struct` join `cs_categorie` on((`cs_struct`.`id_categorie` = `cs_categorie`.`id`))) WHERE (`cs_struct`.`etat` = '1') ;

-- --------------------------------------------------------

--
-- Structure for view `v_cs_struct_notification`
--
DROP TABLE IF EXISTS `v_cs_struct_notification`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`agoracgagoracity`@`%` SQL SECURITY DEFINER VIEW `v_cs_struct_notification`  AS SELECT `cs_struct`.`id` AS `id`, `cs_struct`.`nom_social` AS `nom_social`, `cs_struct`.`id_utilisateur` AS `id_utilisateur`, `cs_struct`.`photo_logo` AS `photo_logo`, `c_notification`.`id_envoyeur` AS `id_envoyeur`, `c_notification`.`id_recepteur` AS `id_recepteur`, `c_notification`.`lu` AS `lu`, `c_notification`.`id` AS `id_notification` FROM (`cs_struct` join `c_notification` on((`cs_struct`.`id_utilisateur` = `c_notification`.`id_envoyeur`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_cs_stru_user_cat`
--
DROP TABLE IF EXISTS `v_cs_stru_user_cat`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`agoracgagoracity`@`%` SQL SECURITY DEFINER VIEW `v_cs_stru_user_cat`  AS SELECT `cs`.`id` AS `id`, `cs`.`id_utilisateur` AS `id_utilisateur`, `c`.`email` AS `email`, `cs`.`id_categorie` AS `id_categorie`, `ca`.`nom` AS `nomcategorie`, `cs`.`nom_social` AS `nom_social`, `cs`.`siren` AS `siren`, `cs`.`email_siege` AS `email_siege`, `cs`.`photo_logo` AS `photo_logo`, `cs`.`etat` AS `etat` FROM ((`cs_struct` `cs` join `c_utilisateur` `c` on((`cs`.`id_utilisateur` = `c`.`id`))) join `cs_categorie` `ca` on((`cs`.`id_categorie` = `ca`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_demande_confimer_struct`
--
DROP TABLE IF EXISTS `v_demande_confimer_struct`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`agoracgagoracity`@`%` SQL SECURITY DEFINER VIEW `v_demande_confimer_struct`  AS SELECT `v_cs_struct_notification`.`id` AS `id`, `v_cs_struct_notification`.`nom_social` AS `nom_social`, `v_cs_struct_notification`.`id_utilisateur` AS `id_utilisateur`, `v_cs_struct_notification`.`photo_logo` AS `photo_logo`, `v_cs_struct_notification`.`id_envoyeur` AS `id_envoyeur`, `v_cs_struct_notification`.`id_recepteur` AS `id_recepteur`, `v_cs_struct_notification`.`lu` AS `lu`, `v_cs_struct_notification`.`id_notification` AS `id_notification`, `c_acteur_struct`.`id_acteur` AS `id_acteur`, `c_acteur_struct`.`id_struct` AS `id_struct`, `c_acteur_struct`.`etat` AS `etat`, `c_acteur_struct`.`id` AS `id_demande` FROM (`v_cs_struct_notification` join `c_acteur_struct` on((`v_cs_struct_notification`.`id` = `c_acteur_struct`.`id_struct`))) WHERE (`c_acteur_struct`.`etat` = 2) GROUP BY `v_cs_struct_notification`.`id_notification` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ca_acteur`
--
ALTER TABLE `ca_acteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `cs_antenne`
--
ALTER TABLE `cs_antenne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `cs_antenne_jour_horaire`
--
ALTER TABLE `cs_antenne_jour_horaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `cs_categorie`
--
ALTER TABLE `cs_categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs_champ_action`
--
ALTER TABLE `cs_champ_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs_jour`
--
ALTER TABLE `cs_jour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs_jour_horaire`
--
ALTER TABLE `cs_jour_horaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `cs_modalite`
--
ALTER TABLE `cs_modalite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs_particularite_action`
--
ALTER TABLE `cs_particularite_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs_public`
--
ALTER TABLE `cs_public`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs_referent`
--
ALTER TABLE `cs_referent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `cs_struct`
--
ALTER TABLE `cs_struct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `cs_territoire`
--
ALTER TABLE `cs_territoire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs_thematique`
--
ALTER TABLE `cs_thematique`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_acteur_struct`
--
ALTER TABLE `c_acteur_struct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acteur` (`id_acteur`),
  ADD KEY `id_struct` (`id_struct`);

--
-- Indexes for table `c_file_type`
--
ALTER TABLE `c_file_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_notification`
--
ALTER TABLE `c_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_envoyeur` (`id_envoyeur`),
  ADD KEY `id_recepteur` (`id_recepteur`);

--
-- Indexes for table `c_utilisateur`
--
ALTER TABLE `c_utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur_categorie` (`id_utilisateur_categorie`);

--
-- Indexes for table `c_utilisateur_categorie`
--
ALTER TABLE `c_utilisateur_categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_utilisateur_champ_action`
--
ALTER TABLE `c_utilisateur_champ_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_champ_action` (`id_champ_action`);

--
-- Indexes for table `c_utilisateur_file`
--
ALTER TABLE `c_utilisateur_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_file_type` (`id_file_type`);

--
-- Indexes for table `c_utilisateur_files`
--
ALTER TABLE `c_utilisateur_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `c_utilisateur_modalite`
--
ALTER TABLE `c_utilisateur_modalite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_modalite` (`id_modalite`);

--
-- Indexes for table `c_utilisateur_particularite_action`
--
ALTER TABLE `c_utilisateur_particularite_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_particularite_action` (`id_particularite_action`);

--
-- Indexes for table `c_utilisateur_public`
--
ALTER TABLE `c_utilisateur_public`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_public` (`id_public`);

--
-- Indexes for table `c_utilisateur_territoire`
--
ALTER TABLE `c_utilisateur_territoire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_territoire` (`id_territoire`);

--
-- Indexes for table `c_utilisateur_thematique`
--
ALTER TABLE `c_utilisateur_thematique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_thematique` (`id_thematique`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ca_acteur`
--
ALTER TABLE `ca_acteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cs_antenne`
--
ALTER TABLE `cs_antenne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cs_antenne_jour_horaire`
--
ALTER TABLE `cs_antenne_jour_horaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cs_categorie`
--
ALTER TABLE `cs_categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cs_champ_action`
--
ALTER TABLE `cs_champ_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `cs_jour`
--
ALTER TABLE `cs_jour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cs_jour_horaire`
--
ALTER TABLE `cs_jour_horaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `cs_modalite`
--
ALTER TABLE `cs_modalite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cs_particularite_action`
--
ALTER TABLE `cs_particularite_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cs_public`
--
ALTER TABLE `cs_public`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cs_referent`
--
ALTER TABLE `cs_referent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cs_struct`
--
ALTER TABLE `cs_struct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `cs_territoire`
--
ALTER TABLE `cs_territoire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cs_thematique`
--
ALTER TABLE `cs_thematique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `c_acteur_struct`
--
ALTER TABLE `c_acteur_struct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `c_file_type`
--
ALTER TABLE `c_file_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_notification`
--
ALTER TABLE `c_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `c_utilisateur`
--
ALTER TABLE `c_utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `c_utilisateur_categorie`
--
ALTER TABLE `c_utilisateur_categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `c_utilisateur_champ_action`
--
ALTER TABLE `c_utilisateur_champ_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `c_utilisateur_file`
--
ALTER TABLE `c_utilisateur_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_utilisateur_files`
--
ALTER TABLE `c_utilisateur_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `c_utilisateur_modalite`
--
ALTER TABLE `c_utilisateur_modalite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `c_utilisateur_particularite_action`
--
ALTER TABLE `c_utilisateur_particularite_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `c_utilisateur_public`
--
ALTER TABLE `c_utilisateur_public`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `c_utilisateur_territoire`
--
ALTER TABLE `c_utilisateur_territoire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `c_utilisateur_thematique`
--
ALTER TABLE `c_utilisateur_thematique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ca_acteur`
--
ALTER TABLE `ca_acteur`
  ADD CONSTRAINT `ca_acteur_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`);

--
-- Constraints for table `cs_antenne`
--
ALTER TABLE `cs_antenne`
  ADD CONSTRAINT `cs_antenne_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`);

--
-- Constraints for table `cs_antenne_jour_horaire`
--
ALTER TABLE `cs_antenne_jour_horaire`
  ADD CONSTRAINT `cs_antenne_jour_horaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`);

--
-- Constraints for table `cs_jour_horaire`
--
ALTER TABLE `cs_jour_horaire`
  ADD CONSTRAINT `cs_jour_horaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`);

--
-- Constraints for table `cs_referent`
--
ALTER TABLE `cs_referent`
  ADD CONSTRAINT `cs_referent_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`);

--
-- Constraints for table `cs_struct`
--
ALTER TABLE `cs_struct`
  ADD CONSTRAINT `cs_struct_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`),
  ADD CONSTRAINT `cs_struct_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `cs_categorie` (`id`);

--
-- Constraints for table `c_acteur_struct`
--
ALTER TABLE `c_acteur_struct`
  ADD CONSTRAINT `c_acteur_struct_ibfk_1` FOREIGN KEY (`id_acteur`) REFERENCES `ca_acteur` (`id`),
  ADD CONSTRAINT `c_acteur_struct_ibfk_2` FOREIGN KEY (`id_struct`) REFERENCES `cs_struct` (`id`);

--
-- Constraints for table `c_notification`
--
ALTER TABLE `c_notification`
  ADD CONSTRAINT `c_notification_ibfk_1` FOREIGN KEY (`id_envoyeur`) REFERENCES `c_utilisateur` (`id`),
  ADD CONSTRAINT `c_notification_ibfk_2` FOREIGN KEY (`id_recepteur`) REFERENCES `c_utilisateur` (`id`);

--
-- Constraints for table `c_utilisateur`
--
ALTER TABLE `c_utilisateur`
  ADD CONSTRAINT `c_utilisateur_ibfk_1` FOREIGN KEY (`id_utilisateur_categorie`) REFERENCES `c_utilisateur_categorie` (`id`);

--
-- Constraints for table `c_utilisateur_champ_action`
--
ALTER TABLE `c_utilisateur_champ_action`
  ADD CONSTRAINT `c_utilisateur_champ_action_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`),
  ADD CONSTRAINT `c_utilisateur_champ_action_ibfk_2` FOREIGN KEY (`id_champ_action`) REFERENCES `cs_champ_action` (`id`);

--
-- Constraints for table `c_utilisateur_file`
--
ALTER TABLE `c_utilisateur_file`
  ADD CONSTRAINT `c_utilisateur_file_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`),
  ADD CONSTRAINT `c_utilisateur_file_ibfk_2` FOREIGN KEY (`id_file_type`) REFERENCES `c_file_type` (`id`);

--
-- Constraints for table `c_utilisateur_files`
--
ALTER TABLE `c_utilisateur_files`
  ADD CONSTRAINT `c_utilisateur_files_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`);

--
-- Constraints for table `c_utilisateur_modalite`
--
ALTER TABLE `c_utilisateur_modalite`
  ADD CONSTRAINT `c_utilisateur_modalite_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`),
  ADD CONSTRAINT `c_utilisateur_modalite_ibfk_2` FOREIGN KEY (`id_modalite`) REFERENCES `cs_modalite` (`id`);

--
-- Constraints for table `c_utilisateur_particularite_action`
--
ALTER TABLE `c_utilisateur_particularite_action`
  ADD CONSTRAINT `c_utilisateur_particularite_action_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`),
  ADD CONSTRAINT `c_utilisateur_particularite_action_ibfk_2` FOREIGN KEY (`id_particularite_action`) REFERENCES `cs_particularite_action` (`id`);

--
-- Constraints for table `c_utilisateur_public`
--
ALTER TABLE `c_utilisateur_public`
  ADD CONSTRAINT `c_utilisateur_public_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`),
  ADD CONSTRAINT `c_utilisateur_public_ibfk_2` FOREIGN KEY (`id_public`) REFERENCES `cs_public` (`id`);

--
-- Constraints for table `c_utilisateur_territoire`
--
ALTER TABLE `c_utilisateur_territoire`
  ADD CONSTRAINT `c_utilisateur_territoire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`),
  ADD CONSTRAINT `c_utilisateur_territoire_ibfk_2` FOREIGN KEY (`id_territoire`) REFERENCES `cs_territoire` (`id`);

--
-- Constraints for table `c_utilisateur_thematique`
--
ALTER TABLE `c_utilisateur_thematique`
  ADD CONSTRAINT `c_utilisateur_thematique_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `c_utilisateur` (`id`),
  ADD CONSTRAINT `c_utilisateur_thematique_ibfk_2` FOREIGN KEY (`id_thematique`) REFERENCES `cs_thematique` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
