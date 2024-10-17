-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 oct. 2024 à 21:41
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `itsupport`
--

-- --------------------------------------------------------

--
-- Structure de la table `entete`
--

CREATE TABLE `entete` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu_entete` text DEFAULT NULL,
  `contenu_footer_col` text DEFAULT NULL,
  `contenu_footer_col2` text DEFAULT NULL,
  `alignement_entete` enum('left','center','right','justify') DEFAULT 'center',
  `alignement_footer` enum('left','center','right','justify') DEFAULT 'center',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entete`
--

INSERT INTO `entete` (`id`, `logo`, `titre`, `contenu_entete`, `contenu_footer_col`, `contenu_footer_col2`, `alignement_entete`, `alignement_footer`, `created_at`, `updated_at`) VALUES
(2, '1729167129_essf.png', 'Nom Entreprise', 'MARKETING ET COMMERCIAL', 'Société Anonyme avec Conseil d’administration au Capital social de CFA 3.000.000.000. Entreprise régie par le code CIMA immeuble NSIA, 1006 Boulevard Saint Michel - BP 958 Tri Postal.', 'Tél : (229) 20 24 69 00 / 21 30 54 50 Fax : (229) 21 95 61 17 Email : nsia.com@groupsesia.com - Site web : www.nsiawebenin.com', 'right', 'center', '2024-10-16 14:52:24', '2024-10-17 13:53:39');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entete`
--
ALTER TABLE `entete`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entete`
--
ALTER TABLE `entete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
