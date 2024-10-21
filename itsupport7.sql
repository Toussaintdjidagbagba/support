-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 oct. 2024 à 22:37
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
-- Structure de la table `action_menus`
--

CREATE TABLE `action_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_dev` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `action_menus`
--

INSERT INTO `action_menus` (`id`, `Menu`, `action`, `code_dev`, `statut`, `created_at`, `updated_at`) VALUES
(3, '1', 'Ajouter rôles', 'add_role', NULL, '2022-06-14 14:56:34', '2022-06-14 14:56:34'),
(4, '1', 'Modifier rôles', 'update_role', NULL, '2022-06-14 14:56:58', '2022-06-14 14:56:58'),
(5, '1', 'Supprimer rôles', 'delete_role', NULL, '2022-06-14 14:57:26', '2022-06-14 14:57:26'),
(6, '1', 'Attribuer rôle', 'menu_role', NULL, '2022-06-14 15:14:57', '2022-06-14 15:14:57'),
(7, '2', 'Ajouter menu', 'add_menu', NULL, '2022-06-14 15:24:17', '2022-06-14 15:24:17'),
(8, '2', 'Supprimer menu', 'delete_menu', NULL, '2022-06-14 15:24:48', '2022-06-14 15:24:48'),
(9, '2', 'Modifier Menu', 'update_menu', NULL, '2022-06-14 15:25:21', '2022-06-14 15:25:21'),
(10, '2', 'Ajouter action', 'action_menu', NULL, '2022-06-14 15:25:58', '2022-06-14 15:25:58'),
(11, '3', 'Modifier utilisateur', 'update_user', NULL, '2022-06-14 15:32:19', '2022-06-14 15:32:19'),
(12, '3', 'Supprimer utilisateur', 'delete_user', NULL, '2022-06-14 15:32:44', '2022-06-14 15:32:44'),
(13, '3', 'Réinitialiser utilisateur', 'reset_user', NULL, '2022-06-14 15:33:07', '2022-06-14 15:33:07'),
(14, '3', 'Statut utilisateur', 'status_user', NULL, '2022-06-14 15:33:41', '2022-06-14 15:33:41'),
(15, '3', 'Ajouter utilisateur', 'add_user', NULL, '2022-06-14 15:34:46', '2022-06-14 15:34:46'),
(16, '4', 'Ajouter service', 'add_service', NULL, '2022-06-14 15:51:47', '2022-06-14 15:51:47'),
(17, '4', 'Supprimer service', 'delete_service', NULL, '2022-06-14 15:52:29', '2022-06-14 15:52:29'),
(18, '4', 'Modifier service', 'update_service', NULL, '2022-06-14 15:54:23', '2022-06-14 15:54:23'),
(19, '5', 'Ajouter Hiérarchie', 'add_hie', NULL, '2022-06-14 15:55:34', '2022-06-14 15:55:34'),
(20, '5', 'Supprimer hiérarchie', 'delete_hie', NULL, '2022-06-14 15:57:39', '2022-06-14 15:57:39'),
(21, '5', 'Modifier hiérarchie', 'update_hie', NULL, '2022-06-14 15:58:01', '2022-06-14 15:58:01'),
(22, '6', 'Ajouter catégorie', 'add_cat', NULL, '2022-06-14 16:00:35', '2022-06-14 16:00:35'),
(23, '6', 'Modifier catégorie', 'update_cat', NULL, '2022-06-14 16:00:54', '2022-06-14 16:00:54'),
(24, '6', 'Supprimer catégorie', 'delete_cat', NULL, '2022-06-14 16:01:11', '2022-06-14 16:01:11'),
(25, '7', 'Ajouter incidents', 'add_incident', NULL, '2022-06-14 16:04:10', '2022-06-14 16:04:10'),
(26, '7', 'Modifier incident', 'update_incident', NULL, '2022-06-14 16:04:34', '2022-06-14 16:04:34'),
(27, '7', 'Supprimer incident', 'delete_incident', NULL, '2022-06-14 16:04:56', '2022-06-14 16:04:56'),
(28, '8', 'Ajouter Incidents', 'add_incie', NULL, '2022-06-14 16:36:36', '2022-06-14 16:36:36'),
(29, '8', 'Supprimer incident', 'delete_incie', NULL, '2022-06-14 16:45:19', '2022-06-14 16:45:19'),
(30, '8', 'Modifier Incident', 'update_incie', NULL, '2022-06-14 16:45:50', '2022-06-14 16:45:50'),
(31, '8', 'Modifier Etat', 'update_etat', NULL, '2022-06-14 16:46:24', '2022-06-14 16:46:24'),
(32, '8', 'Affecter à un service', 'affec_incie', NULL, '2022-06-14 16:51:10', '2022-06-14 16:51:10'),
(33, '11', '(action)', '(action dev)', NULL, '2022-07-21 14:56:53', '2022-07-21 14:56:53'),
(36, '13', 'Action Menu', 'menu_role', NULL, '2022-08-30 17:32:08', '2022-08-30 17:32:08'),
(37, '13', 'Ajouter un rôle', 'add_role', NULL, '2022-08-30 17:32:44', '2022-08-30 17:32:44'),
(38, '13', 'Supprimer un rôle', 'delete_role', NULL, '2022-08-30 17:33:10', '2022-08-30 17:33:10'),
(39, '13', 'Modifier un rôle', 'update_role', NULL, '2022-08-30 17:34:05', '2022-08-30 17:34:05'),
(40, '15', 'Ajouter un outil', 'add_outil', NULL, '2023-09-08 00:27:14', '2023-09-08 00:27:14'),
(41, '15', 'Modification de l\'état d\'outil', 'update_etat_outil', NULL, '2023-09-08 00:29:17', '2023-09-08 00:29:17'),
(42, '15', 'Réaffectation d\'outil à un autre utilisateur', 'reaffecte_outil', NULL, '2023-09-08 00:30:19', '2023-09-08 00:30:19'),
(43, '15', 'Affectation d\'outil à un utilisateur', 'affecte_outil', NULL, '2023-09-08 00:31:21', '2023-09-08 00:31:21'),
(44, '15', 'Historique de l\'outil', 'hist_outil', NULL, '2023-09-08 00:33:54', '2023-09-08 00:33:54'),
(45, '15', 'Caractéritiques d\'outils', 'caract_outil', NULL, '2023-09-08 00:35:52', '2023-09-08 00:35:52'),
(46, '15', 'Modification des caractéristiques de l\'outil', 'update_caract_outil', NULL, '2023-09-08 00:38:18', '2023-09-08 00:38:18'),
(47, '15', 'Suppression d\'outil', 'delete_outil', NULL, '2023-09-08 00:40:29', '2023-09-08 00:40:29'),
(48, '16', 'Enregistrer un catégorie', 'add_cat_outil', NULL, '2023-09-08 00:42:43', '2023-09-08 00:42:43'),
(49, '16', 'Modification de catégorie', 'update_cat_outil', NULL, '2023-09-08 00:43:22', '2023-09-08 00:43:22'),
(50, '16', 'Suppression de catégorie', 'delete_cat_outil', NULL, '2023-09-08 00:44:18', '2023-09-08 00:44:18'),
(51, '16', 'Définitions des champs caractéristisques de la catégorie d\'outil', 'define_champ_cat_outil', NULL, '2023-09-08 00:45:23', '2023-09-08 00:45:23'),
(52, '17', 'Programmer une maintenance', 'prog_maint', NULL, '2023-09-08 00:47:28', '2023-09-08 00:47:28'),
(53, '17', 'Définition de l\'état', 'define_etat_maint', NULL, '2023-09-08 00:48:36', '2023-09-08 00:48:36'),
(54, '17', 'Imprimer l\'état de la maintenance globale d\'une période en pdf', 'etat_pdf_maint_global', NULL, '2023-09-08 00:50:12', '2023-09-08 00:50:12'),
(55, '17', 'Imprimer l\'état de la maintenance globale d\'une période en excel', 'etat_excel_maint_global', NULL, '2023-09-08 00:51:08', '2023-09-08 00:51:08'),
(56, '17', 'Afficher les détails de la maintenance d\'une période', 'see_detail_maint', NULL, '2023-09-08 00:51:53', '2023-09-08 00:51:53'),
(57, '17', 'Modification d\'une maintenance programmer', 'update_maint_prog', NULL, '2023-09-08 00:53:24', '2023-09-08 00:53:24'),
(58, '17', 'Supprimer une maintenance programmer', 'delete_maint_prog', NULL, '2023-09-08 00:54:10', '2023-09-08 00:54:10'),
(59, '18', 'Imprimer l\'état de la maintenance d\'une période en pdf', 'print_maint_pdf', NULL, '2023-09-08 00:56:25', '2023-09-08 00:56:25'),
(60, '18', 'Détails de la maintenance', 'detail_maint_user', NULL, '2023-09-08 00:58:00', '2023-09-08 00:58:00'),
(61, '18', 'Commentaire', 'comment_maint_user', NULL, '2023-09-08 00:59:15', '2023-09-08 00:59:15'),
(62, '17', 'Enregistrement de la maintenance effectuée', 'add_maint_outil', NULL, '2023-09-08 01:01:11', '2023-09-08 01:01:11'),
(63, '17', 'Imprimer l\'état de la maintenance d\'une période en pdf', 'print_maint_admin_pdf', NULL, '2023-09-08 01:01:56', '2023-09-08 01:01:56'),
(64, '17', 'Détails de la maintenance', 'detail_maint_admin', NULL, '2023-09-08 01:02:29', '2023-09-08 01:02:29'),
(65, '17', 'Modification d\'une maintenance enregistrer', 'update_maint_admin', NULL, '2023-09-08 01:03:33', '2023-09-08 01:03:33'),
(66, '17', 'Suppression d\'une maintenance enregistrer', 'delete_maint_admin', NULL, '2023-09-08 01:04:09', '2023-09-08 01:04:09'),
(67, '8', 'Afficher le document lié ', 'viewdoc_incie', NULL, '2024-07-22 14:50:03', '2024-07-22 14:50:03');

-- --------------------------------------------------------

--
-- Structure de la table `action_menu_acces`
--

CREATE TABLE `action_menu_acces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Menu` bigint(20) UNSIGNED DEFAULT NULL,
  `Role` bigint(20) UNSIGNED DEFAULT NULL,
  `ActionMenu` bigint(20) UNSIGNED DEFAULT NULL,
  `statut` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `action_menu_acces`
--

INSERT INTO `action_menu_acces` (`id`, `Menu`, `Role`, `ActionMenu`, `statut`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 0, 0, '2022-06-14 15:05:38', '2022-06-14 15:05:38'),
(4, 1, 1, 3, 1, '2022-06-14 15:05:38', '2022-06-14 15:05:38'),
(5, 1, 1, 4, 1, '2022-06-14 15:05:38', '2022-06-14 15:05:38'),
(6, 1, 1, 5, 1, '2022-06-14 15:05:38', '2022-06-14 15:05:38'),
(7, 1, 1, 6, 1, '2022-06-14 15:15:59', '2022-06-14 15:15:59'),
(8, 2, 1, 0, 0, '2022-06-14 15:16:05', '2022-06-14 15:16:05'),
(9, 2, 1, 7, 0, '2022-06-14 15:27:32', '2022-06-14 15:27:32'),
(10, 2, 1, 8, 0, '2022-06-14 15:27:32', '2022-06-14 15:27:32'),
(11, 2, 1, 9, 0, '2022-06-14 15:27:32', '2022-06-14 15:27:32'),
(12, 2, 1, 10, 0, '2022-06-14 15:27:32', '2022-06-14 15:27:32'),
(13, 3, 1, 0, 0, '2022-06-14 15:35:16', '2022-06-14 15:35:16'),
(14, 3, 1, 11, 0, '2022-06-14 15:35:16', '2022-06-14 15:35:16'),
(15, 3, 1, 12, 0, '2022-06-14 15:35:16', '2022-06-14 15:35:16'),
(16, 3, 1, 13, 0, '2022-06-14 15:35:16', '2022-06-14 15:35:16'),
(17, 3, 1, 14, 0, '2022-06-14 15:35:16', '2022-06-14 15:35:16'),
(18, 3, 1, 15, 0, '2022-06-14 15:35:16', '2022-06-14 15:35:16'),
(19, 4, 1, 0, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(20, 5, 1, 0, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(21, 6, 1, 0, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(22, 4, 1, 16, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(23, 4, 1, 17, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(24, 4, 1, 18, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(25, 5, 1, 19, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(26, 5, 1, 20, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(27, 5, 1, 21, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(28, 6, 1, 22, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(29, 6, 1, 23, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(30, 6, 1, 24, 0, '2022-06-14 16:01:50', '2022-06-14 16:01:50'),
(31, 7, 1, 0, 0, '2022-06-14 17:02:05', '2022-06-14 17:02:05'),
(32, 8, 1, 0, 0, '2022-06-14 17:02:05', '2022-06-14 17:02:05'),
(33, 7, 1, 25, 0, '2022-06-14 17:02:06', '2022-06-14 17:02:06'),
(34, 7, 1, 26, 0, '2022-06-14 17:02:06', '2022-06-14 17:02:06'),
(35, 7, 1, 27, 0, '2022-06-14 17:02:06', '2022-06-14 17:02:06'),
(36, 8, 1, 28, 0, '2022-06-14 17:02:06', '2022-06-14 17:02:06'),
(37, 8, 1, 29, 0, '2022-06-14 17:02:06', '2022-06-14 17:02:06'),
(38, 8, 1, 30, 0, '2022-06-14 17:02:06', '2022-06-14 17:02:06'),
(39, 8, 1, 31, 0, '2022-06-14 17:02:06', '2022-06-14 17:02:06'),
(40, 8, 1, 32, 0, '2022-06-14 17:02:06', '2022-06-14 17:02:06'),
(41, 9, 1, 0, 0, '2022-06-15 09:46:59', '2022-06-15 09:46:59'),
(42, 3, 2, 0, 0, '2022-06-15 09:48:24', '2022-06-15 09:48:24'),
(43, 4, 2, 0, 0, '2022-06-15 09:48:24', '2022-06-15 09:48:24'),
(44, 5, 2, 0, 0, '2022-06-15 09:48:24', '2022-06-15 09:48:24'),
(45, 6, 2, 0, 0, '2022-06-15 09:48:24', '2022-06-15 09:48:24'),
(46, 8, 2, 0, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(47, 9, 2, 0, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(48, 3, 2, 11, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(49, 3, 2, 12, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(50, 3, 2, 13, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(51, 3, 2, 14, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(52, 3, 2, 15, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(53, 4, 2, 16, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(54, 4, 2, 17, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(55, 4, 2, 18, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(56, 5, 2, 19, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(57, 5, 2, 20, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(58, 5, 2, 21, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(59, 6, 2, 22, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(60, 6, 2, 23, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(61, 6, 2, 24, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(62, 8, 2, 28, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(63, 8, 2, 29, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(64, 8, 2, 30, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(65, 8, 2, 31, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(66, 8, 2, 32, 0, '2022-06-15 09:48:25', '2022-06-15 09:48:25'),
(67, 7, 4, 0, 0, '2022-06-15 12:18:15', '2022-06-15 12:18:15'),
(68, 9, 4, 0, 0, '2022-06-15 12:18:15', '2022-06-15 12:18:15'),
(69, 7, 4, 25, 0, '2022-06-15 12:18:15', '2022-06-15 12:18:15'),
(70, 7, 4, 26, 0, '2022-06-15 12:18:15', '2022-06-15 12:18:15'),
(71, 7, 4, 27, 0, '2022-06-15 12:18:15', '2022-06-15 12:18:15'),
(72, 13, 1, 0, 0, '2022-06-14 15:05:38', '2022-06-14 15:05:38'),
(73, 13, 1, 36, 0, '2022-06-14 15:05:38', '2022-06-14 15:05:38'),
(74, 13, 1, 37, 0, '2022-06-14 15:05:38', '2022-06-14 15:05:38'),
(75, 13, 1, 38, 0, '2022-06-14 15:05:38', '2022-06-14 15:05:38'),
(76, 13, 1, 39, 0, '2022-06-14 15:05:38', '2022-06-14 15:05:38'),
(77, 14, 1, 0, 0, '2022-09-06 08:07:19', '2022-09-06 08:07:19'),
(78, 14, 2, 0, 0, '2022-09-06 08:07:50', '2022-09-06 08:07:50'),
(79, 14, 4, 0, 0, '2022-09-06 08:08:04', '2022-09-06 08:08:04'),
(80, 7, 2, 0, 0, '2023-07-04 11:17:47', '2023-07-04 11:17:47'),
(81, 7, 2, 25, 0, '2023-07-04 11:17:47', '2023-07-04 11:17:47'),
(82, 7, 2, 26, 0, '2023-07-04 11:17:47', '2023-07-04 11:17:47'),
(83, 7, 2, 27, 0, '2023-07-04 11:17:47', '2023-07-04 11:17:47'),
(84, 15, 1, 0, 0, '2023-08-03 18:27:31', '2023-08-03 18:27:31'),
(85, 16, 1, 0, 0, '2023-08-29 15:37:32', '2023-08-29 15:37:32'),
(86, 17, 1, 0, 0, '2023-09-01 22:38:36', '2023-09-01 22:38:36'),
(87, 18, 1, 0, 0, '2023-09-02 12:35:38', '2023-09-02 12:35:38'),
(88, 15, 1, 40, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(89, 15, 1, 41, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(90, 15, 1, 42, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(91, 15, 1, 43, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(92, 15, 1, 44, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(93, 15, 1, 45, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(94, 15, 1, 46, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(95, 15, 1, 47, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(96, 16, 1, 48, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(97, 16, 1, 49, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(98, 16, 1, 50, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(99, 16, 1, 51, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(100, 17, 1, 52, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(101, 17, 1, 53, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(102, 17, 1, 54, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(103, 17, 1, 55, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(104, 17, 1, 56, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(105, 17, 1, 57, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(106, 17, 1, 58, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(107, 17, 1, 62, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(108, 17, 1, 63, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(109, 17, 1, 64, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(110, 17, 1, 65, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(111, 17, 1, 66, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(112, 18, 1, 59, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(113, 18, 1, 60, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(114, 18, 1, 61, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19'),
(115, 3, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(116, 4, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(117, 5, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(118, 6, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(119, 7, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(120, 8, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(121, 9, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(122, 13, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(123, 14, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(124, 15, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(125, 16, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(126, 17, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(127, 18, 8, 0, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(128, 3, 8, 11, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(129, 3, 8, 12, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(130, 3, 8, 13, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(131, 3, 8, 14, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(132, 3, 8, 15, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(133, 4, 8, 16, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(134, 4, 8, 17, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(135, 4, 8, 18, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(136, 5, 8, 19, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(137, 5, 8, 20, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(138, 5, 8, 21, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(139, 6, 8, 22, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(140, 6, 8, 23, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(141, 6, 8, 24, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(142, 7, 8, 25, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(143, 7, 8, 26, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(144, 7, 8, 27, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(145, 8, 8, 28, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(146, 8, 8, 29, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(147, 8, 8, 30, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(148, 8, 8, 31, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(149, 8, 8, 32, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(150, 13, 8, 36, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(151, 13, 8, 37, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(152, 13, 8, 38, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(153, 13, 8, 39, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(154, 15, 8, 40, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(155, 15, 8, 41, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(156, 15, 8, 42, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(157, 15, 8, 43, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(158, 15, 8, 44, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(159, 15, 8, 45, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(160, 15, 8, 46, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(161, 15, 8, 47, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(162, 16, 8, 48, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(163, 16, 8, 49, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(164, 16, 8, 50, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(165, 16, 8, 51, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(166, 17, 8, 52, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(167, 17, 8, 53, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(168, 17, 8, 54, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(169, 17, 8, 55, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(170, 17, 8, 56, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(171, 17, 8, 57, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(172, 17, 8, 58, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(173, 17, 8, 62, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(174, 17, 8, 63, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(175, 17, 8, 64, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(176, 17, 8, 65, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(177, 17, 8, 66, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(178, 18, 8, 59, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(179, 18, 8, 60, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(180, 18, 8, 61, 0, '2024-07-16 21:38:22', '2024-07-16 21:38:22'),
(181, 19, 1, 0, 0, '2024-07-19 16:30:29', '2024-07-19 16:30:29'),
(182, 8, 1, 67, 0, '2024-07-22 14:57:49', '2024-07-22 14:57:49'),
(183, 20, 1, 0, 0, '2024-09-24 10:43:41', '2024-09-24 10:43:41'),
(184, 21, 1, 0, 0, '2024-09-24 10:43:41', '2024-09-24 10:43:41'),
(185, 24, 1, 0, 0, '2024-10-11 14:54:32', '2024-10-11 14:54:32');

-- --------------------------------------------------------

--
-- Structure de la table `action_outils`
--

CREATE TABLE `action_outils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Outils` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_users` int(5) DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `action_outils`
--

INSERT INTO `action_outils` (`id`, `Outils`, `libelle`, `code`, `action_users`, `statut`, `created_at`, `updated_at`) VALUES
(1, '2', 'azerty', 'ad', 1, NULL, '2024-09-28 17:39:53', '2024-09-28 17:39:53'),
(2, '2', 'azertys', 'adds', 1, NULL, '2024-09-28 17:41:12', '2024-09-28 17:41:12'),
(3, '4', 'qsdfggh', 'qs', 1, NULL, '2024-09-28 17:57:31', '2024-09-28 17:57:31'),
(4, '4', 'qsdfgghf', 'kjh', 1, NULL, '2024-09-28 17:57:41', '2024-09-28 17:57:41'),
(5, '5', 'dqddsd', 'fvsfsf', 1, NULL, '2024-09-28 17:59:07', '2024-09-28 17:59:07'),
(6, '6', 'dqddsd', 'fvsfsf', 1, NULL, '2024-09-28 17:59:20', '2024-09-28 17:59:20'),
(7, '7', 'Ajouter', 'add', 1, NULL, '2024-10-01 12:40:23', '2024-10-01 12:40:23'),
(8, '7', 'Ajouters', 'addss', 1, NULL, '2024-10-01 12:40:29', '2024-10-01 12:40:29'),
(9, '7', 'Modifier', 'modif', 1, NULL, '2024-10-01 12:40:39', '2024-10-01 12:40:39'),
(10, '6', 'zkeg', 'kze', 1, NULL, '2024-10-03 13:31:40', '2024-10-03 13:31:40'),
(11, '6', 'zkegs', 'kzes', 1, NULL, '2024-10-03 13:31:50', '2024-10-03 13:31:50');

-- --------------------------------------------------------

--
-- Structure de la table `categorieoutils`
--

CREATE TABLE `categorieoutils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorieoutils`
--

INSERT INTO `categorieoutils` (`id`, `action`, `libelle`, `created_at`, `updated_at`) VALUES
(2, '1', 'Ordinateurs', '2023-08-29 22:38:17', '2023-09-08 08:58:58'),
(4, '1', 'SIM', '2024-06-12 18:54:21', '2024-06-12 18:54:21'),
(5, '1', 'Maison', '2024-07-09 22:07:03', '2024-07-09 22:07:03'),
(6, '1', 'BIC', '2024-07-27 09:09:43', '2024-07-27 09:09:43'),
(7, '1', 'Imprimante', '2024-10-01 09:06:18', '2024-10-02 14:08:28');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmpCat` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `action`, `libelle`, `tmpCat`, `created_at`, `updated_at`) VALUES
(2, '1', 'Matériels', 24, '2022-04-06 15:27:20', '2024-10-01 16:06:18'),
(3, '1', 'Logiciel interne', 48, '2022-04-20 16:08:19', '2022-06-12 22:41:26'),
(4, '1', 'Logiciel externe', 24, '2022-06-12 22:41:45', '2022-06-12 22:41:45'),
(5, '1', 'Connexion Internet', 12, '2022-06-12 22:42:27', '2022-06-12 22:42:27');

-- --------------------------------------------------------

--
-- Structure de la table `champscategorieoutils`
--

CREATE TABLE `champscategorieoutils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoutil` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `champscategorieoutils`
--

INSERT INTO `champscategorieoutils` (`id`, `action`, `libelle`, `code`, `categoutil`, `type`, `created_at`, `updated_at`) VALUES
(1, '1', 'Nom Ordinateur', 'momo', 2, 'text', '2023-08-30 15:32:38', '2023-08-30 15:32:38'),
(2, '1', ' RAM (Go)', 'm', 2, 'number', '2023-08-30 16:10:57', '2023-08-30 16:10:57'),
(3, '1', 'Compte utilisateur', 'mptut', 2, 'text', '2023-08-30 16:12:29', '2023-08-30 16:12:29'),
(4, '1', 'Mot de passe utilisateur', 'tdpa', 2, 'text', '2023-08-30 16:12:43', '2023-08-30 16:12:43'),
(5, '1', 'Processeur', 'oceseu', 2, 'text', '2023-08-30 16:13:09', '2023-08-30 16:13:09'),
(6, '1', 'Microsoft Office', 'crooft', 2, 'text', '2023-08-30 16:13:23', '2023-08-30 16:13:23'),
(7, '1', 'Disque dur (Go)', 'squdu', 2, 'number', '2023-08-30 16:13:32', '2023-08-30 16:13:32'),
(8, '1', 'Modèle Ordinateur', 'delor', 2, 'text', '2023-08-30 16:14:21', '2023-08-30 16:14:21'),
(9, '1', 'Systeme exploitation', 'steee', 2, 'text', '2023-08-30 16:14:56', '2023-08-30 16:14:56'),
(14, '1', 'Autres Caractériques', 'other', NULL, 'text', NULL, NULL),
(16, '1', 'REFE', 'fe', 2, 'text', '2023-09-29 18:35:53', '2023-09-29 18:35:53'),
(17, '1', 'Numéro', 'mer', 4, 'number', '2024-06-12 18:54:44', '2024-06-12 18:54:44'),
(18, '1', 'Proprio', 'opro', 4, 'text', '2024-06-12 18:55:08', '2024-06-12 18:55:08'),
(19, '1', 'Date de livraison', 'teel', 4, 'date', '2024-06-12 18:55:30', '2024-06-12 18:55:30'),
(20, '1', 'Nom', 'm', 5, 'text', '2024-07-09 22:07:19', '2024-07-09 22:07:19'),
(21, '1', 'Lot', 't', 5, 'number', '2024-07-09 22:07:34', '2024-07-09 22:07:34'),
(22, '1', 'Date de création', 'teec', 5, 'date', '2024-07-09 22:07:47', '2024-07-09 22:07:47'),
(23, '1', '', '', 5, 'date', '2024-07-09 22:08:14', '2024-07-09 22:08:14'),
(24, '1', 'Date', 'te', 6, 'date', '2024-07-27 09:10:08', '2024-07-27 09:10:08'),
(25, '1', 'Nom', 'm', 6, 'text', '2024-07-27 09:15:02', '2024-07-27 09:15:02'),
(26, '1', 'Ecran', 'ran', 2, 'text', '2024-09-24 09:28:23', '2024-09-24 09:28:23'),
(27, '1', '', '', 5, 'number', '2024-09-24 16:14:33', '2024-09-24 16:14:33'),
(28, '1', '', '', 5, 'number', '2024-09-24 16:14:47', '2024-09-24 16:14:47'),
(29, '1', '', '', 5, 'number', '2024-09-24 16:14:49', '2024-09-24 16:14:49'),
(30, '1', 'Imprimante', 'priant', 7, 'text', '2024-10-01 09:06:37', '2024-10-01 09:06:37'),
(31, '1', 'Types', 'pes', 7, 'text', '2024-10-01 09:06:48', '2024-10-01 09:06:48'),
(32, '1', 'Numero de serie', 'merde', 7, 'number', '2024-10-01 09:07:06', '2024-10-01 09:07:06');

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

-- --------------------------------------------------------

--
-- Structure de la table `gestionincidents`
--

CREATE TABLE `gestionincidents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incident` bigint(20) UNSIGNED DEFAULT NULL,
  `etat` bigint(20) UNSIGNED DEFAULT NULL,
  `observation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenumail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avis` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actiontech` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gestionincidents`
--

INSERT INTO `gestionincidents` (`id`, `incident`, `etat`, `observation`, `contenumail`, `avis`, `actiontech`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, 'bien', 'En cours d\'analyse', NULL, 1, '2024-07-20 06:41:10', '2024-07-20 06:41:10'),
(2, 203, 3, 'bien', 'En cours d\'analyse', NULL, 1, '2024-07-20 06:45:08', '2024-07-20 06:45:08'),
(3, 205, 5, 'Bon', 'Votre incident est résolu', NULL, 1, '2024-09-24 10:11:11', '2024-09-24 10:11:11'),
(4, 208, 5, 'd', 'd', NULL, 1, '2024-09-24 17:49:21', '2024-09-24 17:49:21'),
(5, 207, 4, 'hjfjhfj', 'cch', NULL, 1, '2024-09-25 14:44:44', '2024-09-25 14:44:44'),
(6, 206, 3, 'fsgsfg', 'ssf', NULL, 1, '2024-09-25 15:03:44', '2024-09-25 15:03:44'),
(7, 21, 5, 'bfbxbx', 'cwbxcb', NULL, 1, '2024-09-25 15:03:56', '2024-09-25 15:03:56'),
(8, 211, 3, 'ff', 'tte', NULL, 1, '2024-09-25 17:20:50', '2024-09-25 17:20:50'),
(9, 209, 3, 'ghh', 'hggjg', NULL, 1, '2024-09-25 17:26:09', '2024-09-25 17:26:09'),
(10, 209, 5, 'Traitement éffectuer', 'Vérifier le resultat et donner votre avis', NULL, 1, '2024-10-08 10:45:25', '2024-10-08 10:45:25'),
(11, 209, 4, 'fdfd', 'ffdf', NULL, 1, '2024-10-08 10:52:08', '2024-10-08 10:52:08'),
(12, 213, 3, 'fdfd', 'ffdf', NULL, 1, '2024-10-08 11:05:19', '2024-10-08 11:05:19'),
(13, 213, 5, 'dhdh', 'ddhdh', NULL, 1, '2024-10-11 06:34:48', '2024-10-11 06:34:48'),
(14, NULL, 6, 'dff', 'ffdf', NULL, 1, '2024-10-11 10:02:38', '2024-10-11 10:02:38'),
(15, NULL, 5, 'if', 'ygfhg', NULL, 1, '2024-10-11 10:33:34', '2024-10-11 10:33:34'),
(16, 214, 5, 'SGDFER', 'HHDGDG', NULL, 1, '2024-10-11 11:03:50', '2024-10-11 11:03:50'),
(17, 220, 5, 'vkjhvkj', 'fvjkff', NULL, 1, '2024-10-11 13:28:47', '2024-10-11 13:28:47');

-- --------------------------------------------------------

--
-- Structure de la table `gestionmaintenances`
--

CREATE TABLE `gestionmaintenances` (
  `id` int(11) NOT NULL,
  `outil` bigint(20) DEFAULT NULL,
  `maintenance` bigint(20) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `commentaireinf` varchar(255) DEFAULT NULL,
  `commentaireuser` varchar(255) DEFAULT NULL,
  `avisinf` varchar(255) DEFAULT NULL,
  `avisuser` varchar(255) DEFAULT NULL,
  `detailjson` varchar(255) DEFAULT NULL,
  `action` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gestionmaintenances`
--

INSERT INTO `gestionmaintenances` (`id`, `outil`, `maintenance`, `etat`, `commentaireinf`, `commentaireuser`, `avisinf`, `avisuser`, `detailjson`, `action`, `created_at`, `updated_at`) VALUES
(3, 1, 9, 'Bien', 'Hhdcdslvn', NULL, NULL, NULL, 'cdbcvddjbbvdBBSBgfbkjfsbfsj', 1, '2024-09-30 12:28:11', '2024-09-30 12:28:11'),
(4, 1, 2, 'Passable', 'AucuEFNLNFnfddlfnl', NULL, NULL, 'Médiocre', '|ad|adds', 1, '2024-10-01 09:33:37', '2024-10-14 13:10:36'),
(6, 3, 2, 'Médiocre', '4555555', NULL, NULL, NULL, '|add|addss', 1, '2024-10-01 10:28:43', '2024-10-01 14:13:33'),
(8, 1, 3, 'Autres', NULL, NULL, NULL, 'Passable', '|ad', 1, '2024-10-03 18:51:49', '2024-10-14 13:10:07');

-- --------------------------------------------------------

--
-- Structure de la table `gestionmaintenance_curatives`
--

CREATE TABLE `gestionmaintenance_curatives` (
  `id` int(11) NOT NULL,
  `outil` bigint(20) DEFAULT NULL,
  `maintenance` bigint(20) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `commentaireinf` varchar(255) DEFAULT NULL,
  `commentaireuser` varchar(255) DEFAULT NULL,
  `avisinf` varchar(255) DEFAULT NULL,
  `avisuser` varchar(255) DEFAULT NULL,
  `action_effectuer` varchar(255) DEFAULT NULL,
  `action` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gestionmaintenance_curatives`
--

INSERT INTO `gestionmaintenance_curatives` (`id`, `outil`, `maintenance`, `etat`, `commentaireinf`, `commentaireuser`, `avisinf`, `avisuser`, `action_effectuer`, `action`, `created_at`, `updated_at`) VALUES
(11, 3, 12, 'Très Bien', 'hghhddf', NULL, NULL, NULL, 'ddhcfd', 1, '2024-10-01 10:27:32', '2024-10-03 08:22:05'),
(12, 1, 12, 'Passable', 'tdyiddyditui', NULL, NULL, NULL, 'ddhcfd', 1, '2024-10-01 10:27:44', '2024-10-01 13:15:56'),
(13, 1, 13, 'Bien', 'Mise a jour', NULL, NULL, NULL, 'Mise a jour', 1, '2024-10-01 11:02:58', '2024-10-01 11:02:58');

-- --------------------------------------------------------

--
-- Structure de la table `hierarchies`
--

CREATE TABLE `hierarchies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hierarchies`
--

INSERT INTO `hierarchies` (`id`, `action`, `libelle`, `created_at`, `updated_at`) VALUES
(2, '1', 'Gênant', '2022-04-06 16:17:00', '2024-10-01 15:47:56'),
(3, '1', 'Bloquant', '2022-06-12 22:43:43', '2024-10-01 15:48:08'),
(8, '1', 'Confort', '2024-10-03 15:36:56', '2024-10-03 15:36:56');

-- --------------------------------------------------------

--
-- Structure de la table `incidents`
--

CREATE TABLE `incidents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Service` bigint(20) UNSIGNED DEFAULT NULL,
  `Emetteur` bigint(20) UNSIGNED DEFAULT NULL,
  `DateEmission` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Module` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat` bigint(20) UNSIGNED DEFAULT NULL,
  `hierarchie` bigint(20) UNSIGNED DEFAULT NULL,
  `piece` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` bigint(20) DEFAULT NULL,
  `resolue` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avis` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sugg` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateResolue` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affecter` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT 0,
  `action` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `incidents`
--

INSERT INTO `incidents` (`id`, `Service`, `Emetteur`, `DateEmission`, `Module`, `description`, `cat`, `hierarchie`, `piece`, `etat`, `resolue`, `avis`, `sugg`, `DateResolue`, `affecter`, `statut`, `action`, `created_at`, `updated_at`) VALUES
(212, 2, 1, '03-10-2024 15:12:44', 'Problême d\'internet', 'Aucun accès a iternete', 5, 8, '', NULL, NULL, NULL, NULL, NULL, 31, 0, NULL, '2024-10-03 14:12:44', '2024-10-17 12:52:18'),
(215, 2, 1, '08-10-2024 12:21:31', 'Power Points Excel', 'ccc', 3, 3, 'documents/incident/incident21.png', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2024-10-08 11:21:31', '2024-10-08 11:21:31'),
(218, 2, 1, '11-10-2024 12:47:40', 'SHGHDGDG', 'ssssddd', 4, 2, '', NULL, NULL, NULL, NULL, NULL, 32, 0, NULL, '2024-10-11 11:47:40', '2024-10-11 13:02:01'),
(220, 2, 1, '11-10-2024 14:11:21', 'fhdgf', 'ffff', 2, 2, '', 5, NULL, NULL, NULL, '2024-10-11 14:28:47', 31, 1, NULL, '2024-10-11 13:11:21', '2024-10-11 13:02:09');

-- --------------------------------------------------------

--
-- Structure de la table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` int(11) NOT NULL,
  `periodedebut` varchar(20) DEFAULT NULL,
  `periodefin` varchar(20) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `user` bigint(20) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `action` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maintenances`
--

INSERT INTO `maintenances` (`id`, `periodedebut`, `periodefin`, `etat`, `commentaire`, `user`, `service`, `action`, `created_at`, `updated_at`) VALUES
(2, '2024-10-01', '2024-10-02', 'Médiocre', 'DJHdJhjhsjfjdhfjl', 31, '9', 1, '2024-09-28 18:00:19', '2024-10-04 13:55:21'),
(3, '2024-10-04', '2024-10-07', 'Passable', NULL, 31, '2', 1, '2024-10-03 18:45:22', '2024-10-03 18:45:35'),
(4, '2024-10-07', '2024-10-10', 'Excellent', 'cmuiuh', 32, '2', 1, '2024-10-04 13:18:33', '2024-10-04 14:12:20');

-- --------------------------------------------------------

--
-- Structure de la table `maintenance_curatives`
--

CREATE TABLE `maintenance_curatives` (
  `id` int(11) NOT NULL,
  `periodedebut` varchar(20) DEFAULT NULL,
  `periodefin` varchar(20) DEFAULT NULL,
  `outil` bigint(20) UNSIGNED DEFAULT NULL,
  `user` bigint(20) DEFAULT NULL,
  `diagnostique` varchar(50) DEFAULT NULL,
  `cause` varchar(50) DEFAULT NULL,
  `resultat` varchar(50) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `action` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maintenance_curatives`
--

INSERT INTO `maintenance_curatives` (`id`, `periodedebut`, `periodefin`, `outil`, `user`, `diagnostique`, `cause`, `resultat`, `etat`, `commentaire`, `action`, `created_at`, `updated_at`) VALUES
(12, '2024-10-01', '19:20', 1, 1, 'dhgdhgf', 'AEZEZRT', 'ghHEFE', 'Défaillant', 'ggg', 1, '2024-10-01 08:23:27', '2024-10-11 15:29:07'),
(13, '2024-10-18', '17:02', 3, 1, 'Mise a jour', 'Virus', 'Opérationnelle', 'Défaillant', 'azertyyoyoy', 1, '2024-10-01 11:02:19', '2024-10-14 15:00:57'),
(14, '2024-10-10', '18:51', 1, 32, 'HJFSF', 'hdd', 'gffjdfhg', 'Passable', 'ggggg', 1, '2024-10-04 10:10:19', '2024-10-04 14:06:27');

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `idMenu` bigint(20) UNSIGNED NOT NULL,
  `libelleMenu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Topmenu_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_ordre` tinyint(4) DEFAULT NULL,
  `order_ss` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `element_menu` smallint(6) DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_action` bigint(20) UNSIGNED DEFAULT NULL,
  `action_save` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`idMenu`, `libelleMenu`, `titre_page`, `controller`, `route`, `Topmenu_id`, `num_ordre`, `order_ss`, `iconee`, `element_menu`, `statut`, `user_action`, `action_save`, `created_at`, `updated_at`) VALUES
(2, 'Menus', 'Liste des menus', NULL, 'GM', '0', 6, NULL, '#', 600, NULL, 1, NULL, '2022-06-14 15:09:03', '2022-10-28 16:45:18'),
(3, 'Utilisateurs', 'Liste des utilisateurs', NULL, 'GU', '0', 5, NULL, '#', 600, NULL, 1, NULL, '2022-06-14 15:29:29', '2022-06-15 10:20:05'),
(4, 'Services', 'Liste des services', NULL, 'GS', '0', 3, NULL, '#', 600, NULL, 1, NULL, '2022-06-14 15:36:18', '2022-06-15 10:20:25'),
(5, 'Hiérarchies', 'Liste des hierarchies', NULL, 'GH', '0', 2, NULL, '#', 600, NULL, 1, NULL, '2022-06-14 15:37:12', '2022-06-15 12:18:42'),
(6, 'Catégories d\'incident', 'Liste des catégories d\'incident', NULL, 'GC', '0', 1, NULL, '#', 600, NULL, 1, NULL, '2022-06-14 15:37:54', '2023-08-29 14:48:02'),
(7, 'Déclaration d\'Incidents', 'Déclaration d\'Incidents', NULL, 'GI', '0', 10, NULL, '#', 500, NULL, 1, NULL, '2022-06-14 16:03:41', '2023-09-21 13:59:15'),
(8, 'Gestion Incidents', 'Liste des incidents', NULL, 'GIA', '0', 9, NULL, '#', 500, NULL, 1, NULL, '2022-06-14 16:09:10', '2023-09-02 12:34:13'),
(9, 'Tableau de bord', 'Tableau de bord', NULL, 'dashboard', '0', 8, NULL, '#', 500, NULL, 1, NULL, '2022-06-15 09:38:30', '2022-07-21 14:46:43'),
(13, 'Rôles', 'Rôles', NULL, 'GR', '0', 4, NULL, '#', 600, NULL, 1, NULL, '2022-08-30 17:29:53', '2022-08-30 17:44:27'),
(14, 'Aide', 'Aide', NULL, 'MAD', '0', 14, NULL, '#', 500, NULL, 1, NULL, '2022-09-06 08:06:46', '2022-09-06 08:06:46'),
(15, 'Outils / Matériels', 'Outils / Matériels', NULL, 'GO', '0', 13, NULL, '#', 500, NULL, 1, NULL, '2023-08-03 17:12:04', '2024-07-16 22:03:06'),
(16, 'Catégories d\'outils', 'Catégories d\'outils', NULL, 'GCO', '0', 7, NULL, '#', 600, NULL, 1, NULL, '2023-08-29 15:35:50', '2023-08-29 15:36:25'),
(17, 'Gestion Maintenances Préventives', 'Gestion Maintenances Préventives', NULL, 'GMPC', '0', 12, NULL, '#', 500, NULL, 1, NULL, '2023-09-01 22:34:55', '2024-07-16 22:13:17'),
(18, 'Maintenances préventives', 'Maintenances préventives', NULL, 'GMU', '0', 11, NULL, '#', 500, NULL, 1, NULL, '2023-09-02 12:35:23', '2024-07-16 22:12:43'),
(19, 'Etats / Avis', 'Etats / Avis', NULL, 'GETAT', '0', 8, NULL, '#', 600, NULL, 1, NULL, '2024-07-19 16:10:52', '2024-07-19 16:10:52'),
(20, 'Maintenances curatives', 'Maintenances curatives', NULL, 'LMC', '0', 15, NULL, '#', 500, NULL, 1, NULL, '2024-09-24 10:42:03', '2024-09-24 10:43:22'),
(21, 'Gestion Maintenances Curatives', 'Gestion Maintenances Curatives', NULL, 'GMC', '0', 16, NULL, '#', 500, NULL, 1, NULL, '2024-09-24 10:43:10', '2024-10-02 15:40:37'),
(24, 'Entête / Rappords', 'Paramétrage des entêtes', NULL, 'GERAP', '0', 17, NULL, '#', 600, NULL, 1, NULL, '2024-10-11 14:51:15', '2024-10-11 14:51:15');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_18_164633_create_utilisateurs_table', 1),
(6, '2021_11_18_164842_create_roles_table', 1),
(7, '2021_11_18_164907_create_menus_table', 1),
(8, '2021_11_18_164945_create_action_menus_table', 1),
(9, '2021_11_18_165017_create_action_menu_acces_table', 1),
(10, '2021_11_18_165051_create_packs_table', 1),
(11, '2021_11_18_165121_create_produits_table', 1),
(12, '2021_11_18_175454_create_traces_table', 1),
(13, '2022_03_30_150507_create_incidents_table', 2),
(14, '2022_04_05_102321_create_categories_table', 3),
(15, '2022_04_05_102426_create_hierarchies_table', 3),
(16, '2022_04_07_102555_create_services_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `outils`
--

CREATE TABLE `outils` (
  `id` int(11) NOT NULL,
  `user` bigint(20) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `dateacquisition` varchar(255) DEFAULT NULL,
  `nameoutils` varchar(255) DEFAULT NULL,
  `categorie` bigint(20) DEFAULT NULL,
  `otherjson` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`otherjson`)),
  `etat` varchar(50) DEFAULT NULL,
  `action` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `outils`
--

INSERT INTO `outils` (`id`, `user`, `reference`, `dateacquisition`, `nameoutils`, `categorie`, `otherjson`, `etat`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ordis', '2024-09-10', 'Ordinateur', 2, '{\"other\":\"\",\"momo\":\"HP\",\"m\":\"8\",\"mptut\":\"Jhon\",\"tdpa\":\"jhon\",\"oceseu\":\"2.5\",\"crooft\":\"13\",\"squdu\":null,\"delor\":\"Pavion\",\"steee\":\"Win64\",\"fe\":\"*****\",\"ran\":\"15\'\'\"}', 'Bien', 1, '2024-09-28 17:46:34', '2024-10-01 16:33:05'),
(3, 1, 'PHDTIS', '2024-09-30', 'Photocopieuse', 7, '{\"other\":\"\",\"priant\":\"HP-5864\",\"pes\":\"Hp JetLasers\",\"merde\":null}', 'Excellent', 1, '2024-10-01 09:08:07', '2024-10-02 14:08:42');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `idRole` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_action` bigint(20) UNSIGNED DEFAULT NULL,
  `action_save` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idRole`, `libelle`, `code`, `user_action`, `action_save`, `created_at`, `updated_at`) VALUES
(1, 'Développeur', 'dev', 1, NULL, '2022-02-10 19:54:21', '2024-10-02 16:47:35'),
(2, 'Administrateur', 'admin', 1, NULL, '2022-02-10 19:59:32', '2022-02-10 21:02:04'),
(4, 'Services', 'serv', 1, NULL, '2022-06-15 12:14:58', '2022-06-15 12:14:58'),
(8, 'SUPER ADMINISTREUR', 'superadmin', 1, NULL, '2024-07-16 21:36:31', '2024-07-16 21:36:31'),
(9, 'Technicien', 'tech', 1, NULL, '2024-07-19 06:34:27', '2024-07-19 06:34:27');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `action`, `libelle`, `created_at`, `updated_at`) VALUES
(2, '1', 'Service Informatique', '2022-06-29 09:34:27', '2022-07-11 10:50:04'),
(9, '1', 'Direction Générale', '2022-07-01 08:42:16', '2022-07-01 08:42:16'),
(10, '1', 'Externe', '2023-08-31 18:46:39', '2023-08-31 18:46:39');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `user_action` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `libelle`, `type`, `user_action`, `created_at`, `updated_at`) VALUES
(1, 'Excellente', 'Avis', NULL, '2024-07-19 17:47:39', '2024-07-19 17:47:39'),
(2, 'Bien', 'Avis', NULL, '2024-07-19 17:47:50', '2024-07-19 17:47:50'),
(3, 'En cours d\'analyse', 'Etat', NULL, '2024-07-19 17:51:07', '2024-07-19 17:51:07'),
(4, 'En cours de traitement', 'Etat', NULL, '2024-07-19 17:51:21', '2024-07-19 17:51:21'),
(5, 'Incident résolu', 'Etat', 1, '2024-07-19 17:51:34', '2024-10-02 15:12:56'),
(6, 'Action de grâce', 'Etat', 1, '2024-10-02 15:00:36', '2024-10-02 15:13:02'),
(32, 'Passable', 'Avis', NULL, '2024-10-02 15:14:51', '2024-10-02 15:14:51'),
(33, 'Médiocre', 'Avis', NULL, '2024-10-02 15:15:11', '2024-10-02 15:15:11');

-- --------------------------------------------------------

--
-- Structure de la table `traces`
--

CREATE TABLE `traces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idsec` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `traces`
--

INSERT INTO `traces` (`id`, `action`, `libelle`, `type`, `idsec`, `created_at`, `updated_at`) VALUES
(1408, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 31-08-2023 à 22:52:02', NULL, NULL, '2023-08-31 21:52:02', '2023-08-31 21:52:02'),
(1409, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 01-09-2023 à 08:58:48', NULL, NULL, '2023-09-01 07:58:48', '2023-09-01 07:58:48'),
(1410, '1', 'Vous avez enregistrée l\'outil vv .', NULL, NULL, '2023-09-01 08:01:17', '2023-09-01 08:01:17'),
(1411, '1', 'Vous avez affecter  à l\'utilisateurDJIDAGBAGBA S T Emmanuel', 'outil', 1, '2023-09-01 10:39:45', '2023-09-01 10:39:45'),
(1412, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 01-09-2023 à 13:59:07', '', NULL, '2023-09-01 12:59:07', '2023-09-01 12:59:07'),
(1413, '1', 'Vous avez affecter Ordinateur à l\'utilisateur KPOVIHOUEDE Roger', 'outil', 1, '2023-09-01 12:59:31', '2023-09-01 12:59:31'),
(1414, '1', 'Vous avez retiré `Ordinateur` à l\'utilisateur KPOVIHOUEDE Roger et réaffecté à DJIDAGBAGBA S T Emmanuel', 'outil', 1, '2023-09-01 15:55:49', '2023-09-01 15:55:49'),
(1415, '1', 'Vous avez retiré `` à DJIDAGBAGBA S T Emmanuel et réaffecté à KPOVIHOUEDE Roger', 'outil', 2, '2023-09-01 15:56:34', '2023-09-01 15:56:34'),
(1416, '1', 'Vous avez retiré `Ordinateur` à DJIDAGBAGBA S T Emmanuel', 'outil', 2, '2023-09-01 15:56:56', '2023-09-01 15:56:56'),
(1417, '1', 'Vous avez affecter `Ordinateur` à l\'utilisateur DJIDAGBAGBA S T Emmanuel', 'outil', 2, '2023-09-01 15:57:20', '2023-09-01 15:57:20'),
(1418, '1', 'Data ancien : {\"id\":2,\"user\":1,\"nameoutils\":\"Ordinateur\",\"categorie\":2,\"otherjson\":\"{\\\"m\\\": \\\"2\\\", \\\"momo\\\": \\\"KANTHS Toussaint\\\", \\\"tdpa\\\": \\\"cc\\\", \\\"delor\\\": \\\"cc\\\", \\\"mptut\\\": \\\"VV\\\", \\\"other\\\": \\\"\\\", \\\"squdu\\\": \\\"5\\\", \\\"steee\\\": \\\"c\\\", \\\"crooft\\\": \\\"cc\\\", \\\"oceseu\\\": \\\"c\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2023-08-31T19:34:48.000000Z\",\"updated_at\":\"2023-09-01T16:57:20.000000Z\"}', '', NULL, '2023-09-01 21:43:31', '2023-09-01 21:43:31'),
(1419, '1', 'Vous avez modifiée les informations de Ordinateur .', 'outil', 2, '2023-09-01 21:43:31', '2023-09-01 21:43:31'),
(1420, '1', 'Data ancien : {\"id\":1,\"user\":2,\"nameoutils\":null,\"categorie\":3,\"otherjson\":\"{\\\"mer\\\": \\\"555\\\", \\\"other\\\": \\\"\\\", \\\"teeto\\\": \\\"2023-08-22\\\", \\\"texpi\\\": \\\"2023-09-01\\\", \\\"eraeur\\\": \\\"bvbbv\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2023-08-31T18:46:29.000000Z\",\"updated_at\":\"2023-09-01T16:56:34.000000Z\"}', '', NULL, '2023-09-01 21:44:19', '2023-09-01 21:44:19'),
(1421, '1', 'Vous avez modifiée les informations de  .', 'outil', 1, '2023-09-01 21:44:19', '2023-09-01 21:44:19'),
(1422, '1', 'Data delete : {\"id\":1,\"user\":2,\"nameoutils\":null,\"categorie\":3,\"otherjson\":\"{\\\"mer\\\": \\\"61310573\\\", \\\"other\\\": \\\"\\\", \\\"teeto\\\": \\\"2023-08-22\\\", \\\"texpi\\\": \\\"2023-09-01\\\", \\\"eraeur\\\": \\\"bvbbv\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2023-08-31T18:46:29.000000Z\",\"updated_at\":\"2023-09-01T22:44:19.000000Z\"}', '', NULL, '2023-09-01 22:04:41', '2023-09-01 22:04:41'),
(1423, '1', 'Data delete : {\"id\":1,\"user\":2,\"nameoutils\":null,\"categorie\":3,\"otherjson\":\"{\\\"mer\\\": \\\"61310573\\\", \\\"other\\\": \\\"\\\", \\\"teeto\\\": \\\"2023-08-22\\\", \\\"texpi\\\": \\\"2023-09-01\\\", \\\"eraeur\\\": \\\"bvbbv\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2023-08-31T18:46:29.000000Z\",\"updated_at\":\"2023-09-01T22:44:19.000000Z\"}', '', NULL, '2023-09-01 22:05:08', '2023-09-01 22:05:08'),
(1424, '1', 'Vous avez enregistrée l\'outil 61310573 .', '', NULL, '2023-09-01 22:06:14', '2023-09-01 22:06:14'),
(1425, '1', 'Vous avez affecter `61310573` à l\'utilisateur MADJA Karelle', 'outil', 4, '2023-09-01 22:06:33', '2023-09-01 22:06:33'),
(1426, '1', 'Vous avez défini l\'état de l\'outil 61310573 à `TRES BON``. <br> OUi', 'outil', 4, '2023-09-01 22:29:18', '2023-09-01 22:29:18'),
(1427, '1', 'Vous avez enregistré le menu Maintenances.', '', NULL, '2023-09-01 22:34:55', '2023-09-01 22:34:55'),
(1428, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 01-09-2023 à 23:38:58', '', NULL, '2023-09-01 22:38:58', '2023-09-01 22:38:58'),
(1429, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 02-09-2023 à 08:32:30', '', NULL, '2023-09-02 07:32:30', '2023-09-02 07:32:30'),
(1430, '1', 'Vous avez programmer une maintenance pour la période du 2023-09-21 au 2023-09-05 .', '', NULL, '2023-09-02 11:19:21', '2023-09-02 11:19:21'),
(1431, '1', 'Vous avez programmer une maintenance pour la période du 2023-08-29 au 2023-09-07 .', '', NULL, '2023-09-02 11:41:31', '2023-09-02 11:41:31'),
(1432, '1', 'Data existant : {\"id\":5,\"periodedebut\":\"2023-09-21\",\"periodefin\":\"2023-09-05\",\"etat\":null,\"commentaire\":null,\"user\":1,\"action\":1,\"created_at\":\"2023-09-02T12:19:21.000000Z\",\"updated_at\":\"2023-09-02T12:19:21.000000Z\"}', '', NULL, '2023-09-02 11:44:51', '2023-09-02 11:44:51'),
(1433, '1', 'Vous avez défini l\'état de la maintenance de la période du `2023-09-21 2023-09-05` à TRES BON``. <br> n', '', NULL, '2023-09-02 11:44:51', '2023-09-02 11:44:51'),
(1434, '1', 'Data delete : {\"id\":6,\"periodedebut\":\"2023-08-29\",\"periodefin\":\"2023-09-07\",\"etat\":null,\"commentaire\":null,\"user\":1,\"action\":1,\"created_at\":\"2023-09-02T12:41:31.000000Z\",\"updated_at\":\"2023-09-02T12:41:31.000000Z\"}', '', NULL, '2023-09-02 12:09:16', '2023-09-02 12:09:16'),
(1435, '1', 'Data ancien : {\"id\":5,\"periodedebut\":\"2023-09-21\",\"periodefin\":\"2023-09-05\",\"etat\":\"TRES BON\",\"commentaire\":\"n\",\"user\":1,\"action\":1,\"created_at\":\"2023-09-02T12:19:21.000000Z\",\"updated_at\":\"2023-09-02T12:44:51.000000Z\"}', '', NULL, '2023-09-02 12:31:30', '2023-09-02 12:31:30'),
(1436, '1', 'Vous avez modifiée les informations de la période de 2023-09-21 au 2023-09-05  en 2023-09-21 au 2023-09-13', '', NULL, '2023-09-02 12:31:30', '2023-09-02 12:31:30'),
(1437, '1', 'Data ancien : {\"id\":5,\"periodedebut\":\"2023-09-21\",\"periodefin\":\"2023-09-13\",\"etat\":\"TRES BON\",\"commentaire\":\"n\",\"user\":1,\"action\":1,\"created_at\":\"2023-09-02T12:19:21.000000Z\",\"updated_at\":\"2023-09-02T13:31:30.000000Z\"}', '', NULL, '2023-09-02 12:31:33', '2023-09-02 12:31:33'),
(1438, '1', 'Vous avez modifiée les informations de la période de 2023-09-21 au 2023-09-13  en 2023-09-21 au 2023-09-13', '', NULL, '2023-09-02 12:31:33', '2023-09-02 12:31:33'),
(1439, '1', 'Data ancien : {\"id\":5,\"periodedebut\":\"2023-09-21\",\"periodefin\":\"2023-09-13\",\"etat\":\"TRES BON\",\"commentaire\":\"n\",\"user\":1,\"action\":1,\"created_at\":\"2023-09-02T12:19:21.000000Z\",\"updated_at\":\"2023-09-02T13:31:33.000000Z\"}', '', NULL, '2023-09-02 12:32:17', '2023-09-02 12:32:17'),
(1440, '1', 'Vous avez modifiée les informations de la période de 2023-09-21 au 2023-09-13  en 2023-08-28 au 2023-09-13', '', NULL, '2023-09-02 12:32:17', '2023-09-02 12:32:17'),
(1441, '1', 'Vous avez modifié le menu Gestion Maintenances.', '', NULL, '2023-09-02 12:33:47', '2023-09-02 12:33:47'),
(1442, '1', 'Vous avez modifié le menu Gestion Incidents.', '', NULL, '2023-09-02 12:34:13', '2023-09-02 12:34:13'),
(1443, '1', 'Vous avez enregistré le menu Maintenances.', '', NULL, '2023-09-02 12:35:23', '2023-09-02 12:35:23'),
(1444, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 02-09-2023 à 13:35:44', '', NULL, '2023-09-02 12:35:44', '2023-09-02 12:35:44'),
(1445, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 03-09-2023 à 01:42:00', '', NULL, '2023-09-03 00:42:00', '2023-09-03 00:42:00'),
(1446, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 03-09-2023 à 22:56:45', '', NULL, '2023-09-03 21:56:45', '2023-09-03 21:56:45'),
(1447, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 04-09-2023 à 11:36:30', '', NULL, '2023-09-04 10:36:30', '2023-09-04 10:36:30'),
(1448, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 04-09-2023 à 16:34:01', '', NULL, '2023-09-04 15:34:01', '2023-09-04 15:34:01'),
(1449, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 05-09-2023 à 08:31:04', '', NULL, '2023-09-05 07:31:04', '2023-09-05 07:31:04'),
(1450, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 05-09-2023 à 14:34:30', '', NULL, '2023-09-05 13:34:30', '2023-09-05 13:34:30'),
(1451, '1', 'Vous avez enregistrée une maintenance de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-05 14:01:37', '2023-09-05 14:01:37'),
(1452, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 06-09-2023 à 11:33:38', '', NULL, '2023-09-06 10:33:38', '2023-09-06 10:33:38'),
(1453, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 07-09-2023 à 08:49:46', '', NULL, '2023-09-07 07:49:46', '2023-09-07 07:49:46'),
(1454, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 07-09-2023 à 19:52:44', '', NULL, '2023-09-07 18:52:44', '2023-09-07 18:52:44'),
(1455, '1', 'Data ancien : {\"id\":5,\"outil\":2,\"maintenance\":5,\"etat\":\"Excellent\",\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|sft|mjw|dram|decr\",\"action\":1,\"created_at\":\"2023-09-05T15:01:37.000000Z\",\"updated_at\":\"2023-09-05T15:01:37.000000Z\"}', '', NULL, '2023-09-07 20:01:23', '2023-09-07 20:01:23'),
(1456, '1', 'Data ancien : {\"id\":5,\"outil\":2,\"maintenance\":5,\"etat\":null,\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|sft|mjw|duc|dram|dcs|decr\",\"action\":1,\"created_at\":\"2023-09-05T15:01:37.000000Z\",\"updated_at\":\"2023-09-07T21:01:23.000000Z\"}', '', NULL, '2023-09-07 20:04:22', '2023-09-07 20:04:22'),
(1457, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 20:04:22', '2023-09-07 20:04:22'),
(1458, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 07-09-2023 à 23:31:53', '', NULL, '2023-09-07 22:31:53', '2023-09-07 22:31:53'),
(1459, '1', 'Data ancien : {\"id\":5,\"outil\":2,\"maintenance\":5,\"etat\":null,\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|sft|mjw|duc|dram|dcs|decr\",\"action\":1,\"created_at\":\"2023-09-05T15:01:37.000000Z\",\"updated_at\":\"2023-09-07T21:04:22.000000Z\"}', '', NULL, '2023-09-07 22:32:16', '2023-09-07 22:32:16'),
(1460, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 22:32:16', '2023-09-07 22:32:16'),
(1461, '1', 'Data ancien : {\"id\":5,\"outil\":2,\"maintenance\":5,\"etat\":null,\"commentaireinf\":\"Je suis bien l\\u00e0\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|mjw|rdd|duc|dram|dcs|decr\",\"action\":1,\"created_at\":\"2023-09-05T15:01:37.000000Z\",\"updated_at\":\"2023-09-07T23:32:16.000000Z\"}', '', NULL, '2023-09-07 22:33:23', '2023-09-07 22:33:23'),
(1462, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 22:33:23', '2023-09-07 22:33:23'),
(1463, '1', 'Data ancien : {\"id\":5,\"outil\":2,\"maintenance\":5,\"etat\":null,\"commentaireinf\":\"Je suis bien l\\u00e0\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|sft|mjw|rdd|duc|dram|dcs|decr\",\"action\":1,\"created_at\":\"2023-09-05T15:01:37.000000Z\",\"updated_at\":\"2023-09-07T23:33:23.000000Z\"}', '', NULL, '2023-09-07 22:40:24', '2023-09-07 22:40:24'),
(1464, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 22:40:24', '2023-09-07 22:40:24'),
(1465, '1', 'Data ancien : {\"id\":5,\"outil\":2,\"maintenance\":5,\"etat\":null,\"commentaireinf\":\"Je suis bien l\\u00e0\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|sft|mjw|rdd|duc|dram|dcs|decr\",\"action\":1,\"created_at\":\"2023-09-05T15:01:37.000000Z\",\"updated_at\":\"2023-09-07T23:40:24.000000Z\"}', '', NULL, '2023-09-07 22:40:36', '2023-09-07 22:40:36'),
(1466, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 22:40:36', '2023-09-07 22:40:36'),
(1467, '1', 'Data ancien : {\"id\":5,\"outil\":2,\"maintenance\":5,\"etat\":\"Bien\",\"commentaireinf\":\"Je suis bien l\\u00e0\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|sft|mjw|rdd|duc|dram|dcs|decr\",\"action\":1,\"created_at\":\"2023-09-05T15:01:37.000000Z\",\"updated_at\":\"2023-09-07T23:40:36.000000Z\"}', '', NULL, '2023-09-07 22:40:47', '2023-09-07 22:40:47'),
(1468, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 22:40:47', '2023-09-07 22:40:47'),
(1469, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 00:22:44', '', NULL, '2023-09-07 23:22:44', '2023-09-07 23:22:44'),
(1470, '1', 'Vous avez modifié le menu Maintenances.', '', NULL, '2023-09-08 00:25:46', '2023-09-08 00:25:46'),
(1471, '1', 'Action \"Ajouter un outil\" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:27:14', '2023-09-08 00:27:14'),
(1472, '1', 'Action \"Modification de l\'état d\'outil\" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:29:17', '2023-09-08 00:29:17'),
(1473, '1', 'Action \"Réaffectation d\'outil à un autre utilisateur\" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:30:19', '2023-09-08 00:30:19'),
(1474, '1', 'Action \"Affectation d\'outil à un utilisateur\" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:31:21', '2023-09-08 00:31:21'),
(1475, '1', 'Action \"Historique de l\'outil\" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:33:54', '2023-09-08 00:33:54'),
(1476, '1', 'Action \"Caractéritiques d\'outils\" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:35:53', '2023-09-08 00:35:53'),
(1477, '1', 'Action \"Modification des caractéristiques de l\'outil\" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:38:18', '2023-09-08 00:38:18'),
(1478, '1', 'Action \"Suppression d\'outil\" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:40:29', '2023-09-08 00:40:29'),
(1479, '1', 'Action \"Enregistrer un catégorie\" ajouté à Catégories d\'outils effectuée avec succès.', '', NULL, '2023-09-08 00:42:43', '2023-09-08 00:42:43'),
(1480, '1', 'Action \"Modification de catégorie\" ajouté à Catégories d\'outils effectuée avec succès.', '', NULL, '2023-09-08 00:43:22', '2023-09-08 00:43:22'),
(1481, '1', 'Action \"Suppression de catégorie\" ajouté à Catégories d\'outils effectuée avec succès.', '', NULL, '2023-09-08 00:44:18', '2023-09-08 00:44:18'),
(1482, '1', 'Action \"Définitions des champs caractéristisques de la catégorie d\'outil\" ajouté à Catégories d\'outils effectuée avec succès.', '', NULL, '2023-09-08 00:45:23', '2023-09-08 00:45:23'),
(1483, '1', 'Action \"Programmer une maintenance\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:47:28', '2023-09-08 00:47:28'),
(1484, '1', 'Action \"Définition de l\'état\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:48:36', '2023-09-08 00:48:36'),
(1485, '1', 'Action \"Imprimer l\'état de la maintenance globale d\'une période en pdf\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:50:12', '2023-09-08 00:50:12'),
(1486, '1', 'Action \"Imprimer l\'état de la maintenance globale d\'une période en excel\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:51:08', '2023-09-08 00:51:08'),
(1487, '1', 'Action \"Afficher les détails de la maintenance d\'une période\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:51:53', '2023-09-08 00:51:53'),
(1488, '1', 'Action \"Modification d\'une maintenance programmer\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:53:24', '2023-09-08 00:53:24'),
(1489, '1', 'Action \"Supprimer une maintenance programmer\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:54:10', '2023-09-08 00:54:10'),
(1490, '1', 'Action \"Imprimer l\'état de la maintenance d\'une période en pdf\" ajouté à Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:56:25', '2023-09-08 00:56:25'),
(1491, '1', 'Action \"Détails de la maintenance\" ajouté à Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:58:00', '2023-09-08 00:58:00'),
(1492, '1', 'Action \"Commentaire\" ajouté à Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:59:15', '2023-09-08 00:59:15'),
(1493, '1', 'Action \"Enregistrement de la maintenance effectuée\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 01:01:11', '2023-09-08 01:01:11'),
(1494, '1', 'Action \"Imprimer l\'état de la maintenance d\'une période en pdf\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 01:01:56', '2023-09-08 01:01:56'),
(1495, '1', 'Action \"Détails de la maintenance\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 01:02:29', '2023-09-08 01:02:29'),
(1496, '1', 'Action \"Modification d\'une maintenance enregistrer\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 01:03:33', '2023-09-08 01:03:33'),
(1497, '1', 'Action \"Suppression d\'une maintenance enregistrer\" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 01:04:09', '2023-09-08 01:04:09'),
(1498, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 02:09:58', '', NULL, '2023-09-08 01:09:58', '2023-09-08 01:09:58'),
(1499, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 02:13:30', '', NULL, '2023-09-08 01:13:30', '2023-09-08 01:13:30'),
(1500, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 02:16:35', '', NULL, '2023-09-08 01:16:35', '2023-09-08 01:16:35'),
(1501, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 09:34:46', '', NULL, '2023-09-08 08:34:46', '2023-09-08 08:34:46'),
(1502, '1', 'Catégorie d\'outil supprimé : {\"id\":3,\"action\":\"1\",\"libelle\":\"SIM\",\"created_at\":\"2023-08-31T09:06:13.000000Z\",\"updated_at\":\"2023-08-31T09:06:13.000000Z\"}', NULL, NULL, '2023-09-08 08:56:03', '2023-09-08 08:56:03'),
(1503, '1', 'Vous avez modifié la catégorie  .', '', NULL, '2023-09-08 08:58:58', '2023-09-08 08:58:58'),
(1504, '1', 'Vous avez enregistrée le champ suivant toto dans la catégorie toto .', '', NULL, '2023-09-08 09:09:25', '2023-09-08 09:09:25'),
(1505, '1', 'Vous avez enregistrée l\'outil dd .', '', NULL, '2023-09-08 09:18:59', '2023-09-08 09:18:59'),
(1506, '1', 'Vous avez affecter `dd` à l\'utilisateur DJIDAGBAGBA S T Emmanuel', 'outil', 5, '2023-09-08 09:20:24', '2023-09-08 09:20:24'),
(1507, '1', 'Vous avez retiré `dd` à DJIDAGBAGBA S T Emmanuel et réaffecté à DOCHAMOU Magloire', 'outil', 5, '2023-09-08 09:23:00', '2023-09-08 09:23:00'),
(1508, '1', 'Data delete : {\"id\":5,\"user\":7,\"nameoutils\":\"dd\",\"categorie\":2,\"otherjson\":\"{\\\"m\\\": \\\"1\\\", \\\"momo\\\": \\\"d\\\", \\\"tdpa\\\": \\\"dd\\\", \\\"delor\\\": \\\"cc\\\", \\\"mptut\\\": \\\"d\\\", \\\"other\\\": \\\"\\\", \\\"squdu\\\": \\\"24\\\", \\\"steee\\\": \\\"dd\\\", \\\"crooft\\\": \\\"d\\\", \\\"oceseu\\\": \\\"d\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2023-09-08T10:18:59.000000Z\",\"updated_at\":\"2023-09-08T10:23:00.000000Z\"}', '', NULL, '2023-09-08 09:27:23', '2023-09-08 09:27:23'),
(1509, '1', 'Data delete : {\"id\":4,\"user\":14,\"nameoutils\":\"61310573\",\"categorie\":3,\"otherjson\":\"{\\\"mer\\\": \\\"61310573\\\", \\\"other\\\": \\\"\\\", \\\"teeto\\\": \\\"2023-09-07\\\", \\\"texpi\\\": \\\"2023-09-07\\\", \\\"eraeur\\\": \\\"mtn\\\"}\",\"etat\":\"TRES BON\",\"action\":1,\"created_at\":\"2023-09-01T23:06:14.000000Z\",\"updated_at\":\"2023-09-01T23:29:18.000000Z\"}', '', NULL, '2023-09-08 09:27:34', '2023-09-08 09:27:34'),
(1510, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":2,\"nom\":\"KPOVIHOUEDE\",\"prenom\":\"Roger\",\"sexe\":\"M\",\"tel\":\"\",\"mail\":\"roger.kpovihouede@groupensia.com\",\"adresse\":\"\",\"login\":\"kpovihouede.ro\",\"password\":\"com7110eda4d09e062aa5e4a390b0a572ac0d2c0220dste\",\"Role\":2,\"Service\":2,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-04-27T13:44:38.000000Z\",\"updated_at\":\"2022-04-27T14:30:19.000000Z\"}.', '', NULL, '2023-09-08 09:42:34', '2023-09-08 09:42:34'),
(1511, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":3,\"nom\":\"STAGE\",\"prenom\":\"Vie BENIN\",\"sexe\":\"M\",\"tel\":\"\",\"mail\":\"\",\"adresse\":\"Bp250\",\"login\":\"stagiaire.viebenin\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":2,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-06-29T13:28:17.000000Z\",\"updated_at\":\"2023-04-26T12:11:25.000000Z\"}.', '', NULL, '2023-09-08 09:42:40', '2023-09-08 09:42:40'),
(1512, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":4,\"nom\":\"TOGBONON\",\"prenom\":\"CHANTAL\",\"sexe\":\"F\",\"tel\":\"\",\"mail\":\"chantal.togbonon@groupensia.com\",\"adresse\":\"NSIA Vie Assurances\",\"login\":\"chantal.togbonon\",\"password\":\"comac1ab23d6288711be64a25bf13432baf1e60b2bddste\",\"Role\":4,\"Service\":3,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-07-01T09:19:08.000000Z\",\"updated_at\":\"2022-07-01T09:22:35.000000Z\"}.', '', NULL, '2023-09-08 09:42:42', '2023-09-08 09:42:42'),
(1513, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":6,\"nom\":\"GOUTONDJI\",\"prenom\":\"Thierry\",\"sexe\":\"M\",\"tel\":\"21365444\",\"mail\":\"thierry.goutondji@groupensia.com\",\"adresse\":\"\",\"login\":\"goutondji.th\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":7,\"other\":\"DC&amp; DTSI\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:36:27.000000Z\",\"updated_at\":\"2022-09-05T15:23:10.000000Z\"}.', '', NULL, '2023-09-08 09:42:44', '2023-09-08 09:42:44'),
(1514, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":7,\"nom\":\"DOCHAMOU\",\"prenom\":\"Magloire\",\"sexe\":\"M\",\"tel\":\"21365402\",\"mail\":\"magloire.dochamou@groupensia.com\",\"adresse\":\"\",\"login\":\"magloire.dochamou\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":9,\"other\":\"DG\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:37:37.000000Z\",\"updated_at\":\"2022-09-05T15:23:18.000000Z\"}.', '', NULL, '2023-09-08 09:42:45', '2023-09-08 09:42:45'),
(1515, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":8,\"nom\":\"HOUETOHOSSOU\",\"prenom\":\"Styve\",\"sexe\":\"M\",\"tel\":\"21365534\",\"mail\":\"styve.houetohossou@groupensia.com\",\"adresse\":\"\",\"login\":\"styve.houetohossou\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":7,\"other\":\"Assistant  CSMA\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:39:13.000000Z\",\"updated_at\":\"2022-09-05T15:23:26.000000Z\"}.', '', NULL, '2023-09-08 09:42:47', '2023-09-08 09:42:47'),
(1516, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":9,\"nom\":\"KOUAKANOU\",\"prenom\":\"C\\u00e9dric\",\"sexe\":\"M\",\"tel\":\"21365533\",\"mail\":\"cedric.koukanou@groupensia.com\",\"adresse\":\"\",\"login\":\"cedric.kouakanou\",\"password\":\"come0ad0bafd4e55c56d88393578f197fd08c4f8a40dste\",\"Role\":4,\"Service\":5,\"other\":\"Responsable service encaissement\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:41:21.000000Z\",\"updated_at\":\"2023-04-26T12:15:07.000000Z\"}.', '', NULL, '2023-09-08 09:42:48', '2023-09-08 09:42:48'),
(1517, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":10,\"nom\":\"DANMINTONDE\",\"prenom\":\"Rosine\",\"sexe\":\"F\",\"tel\":\"21365486\",\"mail\":\"rosine.danmitonde@groupensia.com\",\"adresse\":\"\",\"login\":\"rosine.danmitonde\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":5,\"other\":\"Chef Service Production\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:42:48.000000Z\",\"updated_at\":\"2022-09-05T15:23:43.000000Z\"}.', '', NULL, '2023-09-08 09:42:50', '2023-09-08 09:42:50'),
(1518, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":11,\"nom\":\"DANSOU\",\"prenom\":\"juste\",\"sexe\":\"M\",\"tel\":\"21365491\",\"mail\":\"juste.dansou@groupensia.com\",\"adresse\":\"\",\"login\":\"juste.dansou\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":9,\"other\":\"Auditeur interne\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:44:02.000000Z\",\"updated_at\":\"2022-09-05T15:23:51.000000Z\"}.', '', NULL, '2023-09-08 09:42:51', '2023-09-08 09:42:51'),
(1519, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":12,\"nom\":\"ZOSSOU\",\"prenom\":\"Corrine\",\"sexe\":\"F\",\"tel\":\"21365531\",\"mail\":\"corrine.zossou@groupensia.com\",\"adresse\":\"\",\"login\":\"corrine.zossou\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":5,\"other\":\"Responsable Service r\\u00e9assurance\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:45:13.000000Z\",\"updated_at\":\"2022-09-05T15:23:59.000000Z\"}.', '', NULL, '2023-09-08 09:42:53', '2023-09-08 09:42:53'),
(1520, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":13,\"nom\":\"BOCO\",\"prenom\":\"Urbain\",\"sexe\":\"M\",\"tel\":\"21365483\",\"mail\":\"urbain.boco@groupensia.com\",\"adresse\":\"\",\"login\":\"boco.ur\",\"password\":\"com1cf65b224a4cd91a4c4f0dc856e94a56ce131462dste\",\"Role\":4,\"Service\":7,\"other\":\"Chef Service Individuel\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:46:37.000000Z\",\"updated_at\":\"2023-08-07T18:07:36.000000Z\"}.', '', NULL, '2023-09-08 09:42:54', '2023-09-08 09:42:54'),
(1521, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":14,\"nom\":\"MADJA\",\"prenom\":\"Karelle\",\"sexe\":\"F\",\"tel\":\"21365485\",\"mail\":\"karelle.madja@groupensia.com\",\"adresse\":\"\",\"login\":\"madja.ka\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":7,\"other\":\"Chef Service Gestion Client\\u00e8le\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:48:02.000000Z\",\"updated_at\":\"2022-09-05T15:24:16.000000Z\"}.', '', NULL, '2023-09-08 09:42:56', '2023-09-08 09:42:56'),
(1522, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":15,\"nom\":\"DOS-REIS\",\"prenom\":\"Pegghy\",\"sexe\":\"F\",\"tel\":\"\",\"mail\":\"pegghy.dosreis@groupensia.com\",\"adresse\":\"\",\"login\":\"dosreis.pe\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":7,\"other\":\"Chef Service Micro Assurance\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:49:23.000000Z\",\"updated_at\":\"2022-09-05T15:24:40.000000Z\"}.', '', NULL, '2023-09-08 09:42:58', '2023-09-08 09:42:58'),
(1523, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":16,\"nom\":\"DASSI\",\"prenom\":\"Boris\",\"sexe\":\"M\",\"tel\":\"21365422\",\"mail\":\"boris.dassi@groupensia.com\",\"adresse\":\"\",\"login\":\"boris.dassi\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":8,\"other\":\"Chef Service Moyens G\\u00e9n\\u00e9raux\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:51:48.000000Z\",\"updated_at\":\"2022-09-05T15:24:50.000000Z\"}.', '', NULL, '2023-09-08 09:42:59', '2023-09-08 09:42:59'),
(1524, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":17,\"nom\":\"ADANMENOUKON\",\"prenom\":\"K\\u00e9vin\",\"sexe\":\"M\",\"tel\":\"21365423\",\"mail\":\"kevin.adanmenoukon@groupensia.com\",\"adresse\":\"\",\"login\":\"kevin.adanmenoukon\",\"password\":\"com7c4a8d09ca3762af61e59520943dc26494f8941bdste\",\"Role\":4,\"Service\":8,\"other\":\"CDAF\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:53:06.000000Z\",\"updated_at\":\"2022-12-08T18:28:09.000000Z\"}.', '', NULL, '2023-09-08 09:43:01', '2023-09-08 09:43:01'),
(1525, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":18,\"nom\":\"KODJA\",\"prenom\":\"Roger\",\"sexe\":\"M\",\"tel\":\"21365492\",\"mail\":\"roger.kodja@groupensia.com\",\"adresse\":\"\",\"login\":\"kodja.ro\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":8,\"other\":\"Chef Service Contr\\u00f4le de Gestion\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:54:59.000000Z\",\"updated_at\":\"2022-09-05T15:25:16.000000Z\"}.', '', NULL, '2023-09-08 09:43:05', '2023-09-08 09:43:05'),
(1526, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":19,\"nom\":\"GNANVOSSOU\",\"prenom\":\"Prixille\",\"sexe\":\"F\",\"tel\":\"21365489\",\"mail\":\"prixille.gnanvossou@groupensia.com\",\"adresse\":\"\",\"login\":\"prixille.gnanvossou\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":7,\"other\":\"Assistante  Gestion Client\\u00e8le\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":2,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T14:56:23.000000Z\",\"updated_at\":\"2022-09-05T15:25:25.000000Z\"}.', '', NULL, '2023-09-08 09:43:07', '2023-09-08 09:43:07'),
(1527, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":20,\"nom\":\"DOSSOU\",\"prenom\":\"Elis\\u00e9e\",\"sexe\":\"M\",\"tel\":\"\",\"mail\":\"elisee.dossou@groupensia.com\",\"adresse\":\"\",\"login\":\"elisee.dossou\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":5,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T16:52:35.000000Z\",\"updated_at\":\"2023-04-26T12:11:38.000000Z\"}.', '', NULL, '2023-09-08 09:43:08', '2023-09-08 09:43:08'),
(1528, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":21,\"nom\":\"MADJID\",\"prenom\":\"AMADOU\",\"sexe\":\"M\",\"tel\":\"\",\"mail\":\"madjid.amadou@groupensia.com\",\"adresse\":\"\",\"login\":\"madjid.amadou\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":5,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T16:53:59.000000Z\",\"updated_at\":\"2022-09-05T16:56:56.000000Z\"}.', '', NULL, '2023-09-08 09:43:10', '2023-09-08 09:43:10'),
(1529, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":22,\"nom\":\"CHOKKI\",\"prenom\":\"Jos\\u00e9\",\"sexe\":\"M\",\"tel\":\"\",\"mail\":\"jose.chokki@groupensia.com\",\"adresse\":\"\",\"login\":\"jose.chokki\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":8,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T16:55:18.000000Z\",\"updated_at\":\"2022-09-05T17:03:27.000000Z\"}.', '', NULL, '2023-09-08 09:43:13', '2023-09-08 09:43:13'),
(1530, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":23,\"nom\":\"ADJAFFON\",\"prenom\":\"Edmond\",\"sexe\":\"M\",\"tel\":\"\",\"mail\":\"edmond.adjaffon@groupensia.com\",\"adresse\":\"\",\"login\":\"edmond.adjaffon\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":8,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-05T16:56:50.000000Z\",\"updated_at\":\"2022-09-05T17:03:34.000000Z\"}.', '', NULL, '2023-09-08 09:43:14', '2023-09-08 09:43:14'),
(1531, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":24,\"nom\":\"ADJANOHOUN\",\"prenom\":\"Scarlett\",\"sexe\":\"F\",\"tel\":\"\",\"mail\":\"scarlett.adjanohoun@groupensia.com\",\"adresse\":\"\",\"login\":\"scarlett.adjanohoun\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":7,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-16T09:11:19.000000Z\",\"updated_at\":\"2022-09-16T09:11:42.000000Z\"}.', '', NULL, '2023-09-08 09:43:16', '2023-09-08 09:43:16'),
(1532, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":25,\"nom\":\"SEGLA\",\"prenom\":\"Aurore\",\"sexe\":\"F\",\"tel\":\"\",\"mail\":\"aurore.segla@groupensia.com\",\"adresse\":\"\",\"login\":\"aurore.segla\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":8,\"other\":\"Caissi\\u00e8re\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-09-16T15:12:00.000000Z\",\"updated_at\":\"2022-09-16T15:12:09.000000Z\"}.', '', NULL, '2023-09-08 09:43:17', '2023-09-08 09:43:17'),
(1533, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":26,\"nom\":\"GNAHO\",\"prenom\":\"Kelly\",\"sexe\":\"F\",\"tel\":\"\",\"mail\":\"kelly.gnaho@groupensia.com\",\"adresse\":\"NSIA Vie Assurances\",\"login\":\"kelly.gnaho\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":5,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2022-10-28T13:50:47.000000Z\",\"updated_at\":\"2022-10-28T13:51:22.000000Z\"}.', '', NULL, '2023-09-08 09:43:19', '2023-09-08 09:43:19'),
(1534, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":27,\"nom\":\"Archives\",\"prenom\":\"Archives\",\"sexe\":\"M\",\"tel\":\"\",\"mail\":\"boristossa311@gmail.com\",\"adresse\":\"\",\"login\":\"archives\",\"password\":\"comc7bd800216b6f6b99eef25604cc5f06970680bf5dste\",\"Role\":4,\"Service\":5,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2023-04-25T09:21:42.000000Z\",\"updated_at\":\"2023-04-25T10:32:18.000000Z\"}.', '', NULL, '2023-09-08 09:43:22', '2023-09-08 09:43:22'),
(1535, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":28,\"nom\":\"HOUNKPONOU\",\"prenom\":\"Corinne\",\"sexe\":\"F\",\"tel\":\"\",\"mail\":\"corinne.hounkponou@nsiaassurances.com\",\"adresse\":\"\",\"login\":\"corinne.hounkponou\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":5,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2023-05-11T19:17:26.000000Z\",\"updated_at\":\"2023-05-12T08:48:10.000000Z\"}.', '', NULL, '2023-09-08 09:43:25', '2023-09-08 09:43:25'),
(1536, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":29,\"nom\":\"BONOU\",\"prenom\":\"P\\u00e2come\",\"sexe\":\"M\",\"tel\":\"\",\"mail\":\"pacome.bonou@nsiaassurances.com\",\"adresse\":\"\",\"login\":\"pacome.bonou\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":7,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2023-05-12T08:47:49.000000Z\",\"updated_at\":\"2023-05-12T08:48:05.000000Z\"}.', '', NULL, '2023-09-08 09:43:26', '2023-09-08 09:43:26'),
(1537, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {\"idUser\":30,\"nom\":\"KINGNIDE\",\"prenom\":\"Lucresse\",\"sexe\":\"F\",\"tel\":\"\",\"mail\":\"lucresse.kingnide@nsiaassurances.com\",\"adresse\":\"\",\"login\":\"lucresse.kingnide\",\"password\":\"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste\",\"Role\":4,\"Service\":7,\"other\":\"\",\"signature\":null,\"auth\":\"\",\"Societe\":1,\"image\":null,\"user_action\":1,\"action_save\":\"s\",\"statut\":\"0\",\"remember_token\":null,\"created_at\":\"2023-06-14T10:21:37.000000Z\",\"updated_at\":\"2023-08-24T09:53:33.000000Z\"}.', '', NULL, '2023-09-08 09:43:28', '2023-09-08 09:43:28'),
(1538, '1', 'Service supprimé : {\"id\":3,\"action\":\"1\",\"libelle\":\"Ressource Humaine\",\"created_at\":\"2022-07-01T09:37:32.000000Z\",\"updated_at\":\"2022-07-01T09:37:32.000000Z\"}', NULL, NULL, '2023-09-08 09:44:23', '2023-09-08 09:44:23'),
(1539, '1', 'Service supprimé : {\"id\":5,\"action\":\"1\",\"libelle\":\"Direction Technique\",\"created_at\":\"2022-07-01T09:39:28.000000Z\",\"updated_at\":\"2022-07-01T09:39:28.000000Z\"}', NULL, NULL, '2023-09-08 09:44:28', '2023-09-08 09:44:28'),
(1540, '1', 'Service supprimé : {\"id\":7,\"action\":\"1\",\"libelle\":\"Direction du d\\u00e9veloppement Commercial\",\"created_at\":\"2022-07-01T09:40:00.000000Z\",\"updated_at\":\"2022-07-01T09:40:00.000000Z\"}', NULL, NULL, '2023-09-08 09:44:31', '2023-09-08 09:44:31'),
(1541, '1', 'Service supprimé : {\"id\":8,\"action\":\"1\",\"libelle\":\"D\\u00e9partement Administratif et Financier\",\"created_at\":\"2022-07-01T09:41:07.000000Z\",\"updated_at\":\"2022-07-01T09:41:07.000000Z\"}', NULL, NULL, '2023-09-08 09:44:34', '2023-09-08 09:44:34'),
(1542, '1', 'Rôle supprimé : {\"idRole\":5,\"libelle\":\"Stagiaire\",\"code\":\"stag\",\"user_action\":1,\"action_save\":null,\"created_at\":\"2023-08-31T19:47:05.000000Z\",\"updated_at\":\"2023-08-31T19:47:05.000000Z\"}', NULL, NULL, '2023-09-08 09:50:39', '2023-09-08 09:50:39'),
(1543, '1', 'Rôle supprimé : {\"idRole\":6,\"libelle\":\"Partenaire\",\"code\":\"part\",\"user_action\":1,\"action_save\":null,\"created_at\":\"2023-08-31T19:47:19.000000Z\",\"updated_at\":\"2023-08-31T19:47:19.000000Z\"}', NULL, NULL, '2023-09-08 09:50:42', '2023-09-08 09:50:42'),
(1544, '1', 'Rôle supprimé : {\"idRole\":7,\"libelle\":\"Commerciaux\",\"code\":\"comx\",\"user_action\":1,\"action_save\":null,\"created_at\":\"2023-08-31T19:47:41.000000Z\",\"updated_at\":\"2023-08-31T19:47:41.000000Z\"}', NULL, NULL, '2023-09-08 09:50:44', '2023-09-08 09:50:44'),
(1545, '1', 'Vous avez désactivé le compte de l\'utilisateur DJIDAGBAGBA et dont l\'identifiant est kanths.', '', NULL, '2023-09-08 09:59:02', '2023-09-08 09:59:02'),
(1546, '1', 'Vous avez activé le compte de l\'utilisateur DJIDAGBAGBA et dont l\'identifiant est kanths.', '', NULL, '2023-09-08 09:59:05', '2023-09-08 09:59:05'),
(1547, '1', 'Le compte de l\'utilisateur DJIDAGBAGBA est activé avec succès pour recevoir les incidents déclarer.', '', NULL, '2023-09-08 11:19:11', '2023-09-08 11:19:11'),
(1548, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 13:01:04', '', NULL, '2023-09-08 12:01:04', '2023-09-08 12:01:04'),
(1549, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 13:08:41', '', NULL, '2023-09-08 12:08:41', '2023-09-08 12:08:41'),
(1550, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 13:20:07', '', NULL, '2023-09-08 12:20:07', '2023-09-08 12:20:07'),
(1551, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 13:21:46', '', NULL, '2023-09-08 12:21:46', '2023-09-08 12:21:46'),
(1552, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 13:26:16', '', NULL, '2023-09-08 12:26:16', '2023-09-08 12:26:16'),
(1553, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 13:38:04', '', NULL, '2023-09-08 12:38:04', '2023-09-08 12:38:04'),
(1554, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 13:55:08', '', NULL, '2023-09-08 12:55:08', '2023-09-08 12:55:08'),
(1555, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 13:55:38', '', NULL, '2023-09-08 12:55:38', '2023-09-08 12:55:38'),
(1556, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 14:04:47', '', NULL, '2023-09-08 13:04:47', '2023-09-08 13:04:47'),
(1557, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 17:44:24', '', NULL, '2023-09-08 16:44:24', '2023-09-08 16:44:24'),
(1558, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 20:22:56', '', NULL, '2023-09-08 19:22:56', '2023-09-08 19:22:56'),
(1559, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 09-09-2023 à 00:25:39', '', NULL, '2023-09-08 23:25:39', '2023-09-08 23:25:39'),
(1560, '1', 'Incident supprimé : null', NULL, NULL, '2023-09-08 23:54:59', '2023-09-08 23:54:59'),
(1561, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 09-09-2023 à 12:25:58', '', NULL, '2023-09-09 11:25:58', '2023-09-09 11:25:58'),
(1562, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-09-2023 à 07:48:55', '', NULL, '2023-09-11 06:48:55', '2023-09-11 06:48:55'),
(1563, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-09-2023 à 11:38:37', '', NULL, '2023-09-11 10:38:37', '2023-09-11 10:38:37'),
(1564, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-09-2023 à 17:42:30', '', NULL, '2023-09-11 16:42:30', '2023-09-11 16:42:30'),
(1565, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 12-09-2023 à 16:56:01', '', NULL, '2023-09-12 15:56:01', '2023-09-12 15:56:01'),
(1566, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 13-09-2023 à 10:36:00', '', NULL, '2023-09-13 09:36:00', '2023-09-13 09:36:00'),
(1567, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 13-09-2023 à 16:35:02', '', NULL, '2023-09-13 15:35:02', '2023-09-13 15:35:02'),
(1568, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 13-09-2023 à 23:49:20', '', NULL, '2023-09-13 22:49:20', '2023-09-13 22:49:20'),
(1569, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 20-09-2023 à 22:18:26', '', NULL, '2023-09-20 21:18:26', '2023-09-20 21:18:26'),
(1570, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 21-09-2023 à 08:15:13', '', NULL, '2023-09-21 07:15:13', '2023-09-21 07:15:13'),
(1571, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 21-09-2023 à 14:30:18', '', NULL, '2023-09-21 13:30:18', '2023-09-21 13:30:18'),
(1572, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 21-09-2023 à 14:33:29', '', NULL, '2023-09-21 13:33:29', '2023-09-21 13:33:29'),
(1573, '1', 'Vous avez modifié le menu Déclaration d\'Incidents.', '', NULL, '2023-09-21 13:59:15', '2023-09-21 13:59:15'),
(1574, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 27-09-2023 à 14:34:40', '', NULL, '2023-09-27 13:34:40', '2023-09-27 13:34:40'),
(1575, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 27-09-2023 à 22:08:52', '', NULL, '2023-09-27 21:08:53', '2023-09-27 21:08:53'),
(1576, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 28-09-2023 à 07:22:36', '', NULL, '2023-09-28 06:22:36', '2023-09-28 06:22:36'),
(1577, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 28-09-2023 à 09:47:04', '', NULL, '2023-09-28 08:47:04', '2023-09-28 08:47:04'),
(1578, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 28-09-2023 à 10:18:08', '', NULL, '2023-09-28 09:18:08', '2023-09-28 09:18:08'),
(1579, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 29-09-2023 à 16:40:19', '', NULL, '2023-09-29 15:40:19', '2023-09-29 15:40:19'),
(1580, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 29-09-2023 à 16:40:28', '', NULL, '2023-09-29 15:40:28', '2023-09-29 15:40:28'),
(1581, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 29-09-2023 à 18:21:12', '', NULL, '2023-09-29 17:21:12', '2023-09-29 17:21:12'),
(1582, '1', 'Vous avez réintialisé le mot de passe du compte de l\'utilisateur DJIDAGBAGBA et dont l\'identifiant est kanths.', '', NULL, '2023-09-29 18:33:33', '2023-09-29 18:33:33'),
(1583, '1', 'Le compte de l\'utilisateur DJIDAGBAGBA est désactivé avec succès de la liste des destinaires à recevoir les incidents déclarer.', '', NULL, '2023-09-29 18:33:59', '2023-09-29 18:33:59'),
(1584, '1', 'Le compte de l\'utilisateur DJIDAGBAGBA est activé avec succès pour recevoir les incidents déclarer.', '', NULL, '2023-09-29 18:34:06', '2023-09-29 18:34:06'),
(1585, '1', 'Vous avez enregistrée le champ suivant REFE dans la catégorie REFE .', '', NULL, '2023-09-29 18:35:53', '2023-09-29 18:35:53'),
(1586, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 06-10-2023 à 14:17:22', '', NULL, '2023-10-06 13:17:22', '2023-10-06 13:17:22'),
(1587, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 16-10-2023 à 19:17:51', '', NULL, '2023-10-16 18:17:51', '2023-10-16 18:17:51'),
(1588, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 18-10-2023 à 10:33:57', '', NULL, '2023-10-18 09:33:57', '2023-10-18 09:33:57'),
(1589, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 19-10-2023 à 17:49:36', '', NULL, '2023-10-19 16:49:36', '2023-10-19 16:49:36'),
(1590, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 30-10-2023 à 10:09:08', '', NULL, '2023-10-30 09:09:08', '2023-10-30 09:09:08'),
(1591, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 01-11-2023 à 12:34:37', '', NULL, '2023-11-01 11:34:37', '2023-11-01 11:34:37'),
(1592, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 03-11-2023 à 08:46:07', '', NULL, '2023-11-03 07:46:07', '2023-11-03 07:46:07'),
(1593, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-11-2023 à 17:04:00', '', NULL, '2023-11-08 16:04:00', '2023-11-08 16:04:00'),
(1594, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 10-11-2023 à 08:52:17', '', NULL, '2023-11-10 07:52:17', '2023-11-10 07:52:17'),
(1595, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 01-12-2023 à 11:37:01', '', NULL, '2023-12-01 10:37:01', '2023-12-01 10:37:01'),
(1596, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 09-02-2024 à 18:40:11', '', NULL, '2024-02-09 17:40:11', '2024-02-09 17:40:11'),
(1597, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 13-05-2024 à 13:52:13', '', NULL, '2024-05-13 12:52:13', '2024-05-13 12:52:13'),
(1598, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-06-2024 à 17:04:12', '', NULL, '2024-06-11 16:04:12', '2024-06-11 16:04:12');
INSERT INTO `traces` (`id`, `action`, `libelle`, `type`, `idsec`, `created_at`, `updated_at`) VALUES
(1599, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 12-06-2024 à 19:17:29', '', NULL, '2024-06-12 18:17:29', '2024-06-12 18:17:29'),
(1600, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 12-06-2024 à 19:29:47', '', NULL, '2024-06-12 18:29:47', '2024-06-12 18:29:47'),
(1601, '1', 'Le compte de l\'utilisateur DJIDAGBAGBA est désactivé avec succès de la liste des destinaires à recevoir les incidents déclarer.', '', NULL, '2024-06-12 18:38:34', '2024-06-12 18:38:34'),
(1602, '1', 'Le compte de l\'utilisateur DJIDAGBAGBA est activé avec succès pour recevoir les incidents déclarer.', '', NULL, '2024-06-12 18:38:50', '2024-06-12 18:38:50'),
(1603, '1', 'Vous avez enregistrée la Catégorie d\'outil SIM .', '', NULL, '2024-06-12 18:54:21', '2024-06-12 18:54:21'),
(1604, '1', 'Vous avez enregistrée le champ suivant Numéro dans la catégorie Numéro .', '', NULL, '2024-06-12 18:54:44', '2024-06-12 18:54:44'),
(1605, '1', 'Vous avez enregistrée le champ suivant Proprio dans la catégorie Proprio .', '', NULL, '2024-06-12 18:55:08', '2024-06-12 18:55:08'),
(1606, '1', 'Vous avez enregistrée le champ suivant Date de livraison dans la catégorie Date de livraison .', '', NULL, '2024-06-12 18:55:30', '2024-06-12 18:55:30'),
(1607, '1', 'Vous avez enregistrée l\'outil LETTET .', '', NULL, '2024-06-12 18:56:26', '2024-06-12 18:56:26'),
(1608, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 20-06-2024 à 08:06:20', '', NULL, '2024-06-20 07:06:20', '2024-06-20 07:06:20'),
(1609, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 09-07-2024 à 22:41:22', '', NULL, '2024-07-09 21:41:22', '2024-07-09 21:41:22'),
(1610, '1', 'Vous avez déclaré un incident.203', '', NULL, '2024-07-09 22:43:23', '2024-07-09 22:43:23'),
(1611, '1', 'Vous avez enregistrée la Catégorie d\'outil Maison .', '', NULL, '2024-07-09 22:07:03', '2024-07-09 22:07:03'),
(1612, '1', 'Vous avez enregistrée le champ suivant Nom dans la catégorie Nom .', '', NULL, '2024-07-09 22:07:19', '2024-07-09 22:07:19'),
(1613, '1', 'Vous avez enregistrée le champ suivant Lot dans la catégorie Lot .', '', NULL, '2024-07-09 22:07:34', '2024-07-09 22:07:34'),
(1614, '1', 'Vous avez enregistrée le champ suivant Date de création dans la catégorie Date de création .', '', NULL, '2024-07-09 22:07:47', '2024-07-09 22:07:47'),
(1615, '1', 'Vous avez enregistrée le champ suivant  dans la catégorie  .', '', NULL, '2024-07-09 22:08:14', '2024-07-09 22:08:14'),
(1616, '1', 'Vous avez affecter `LETTET` à l\'utilisateur DJIDAGBAGBA S T Emmanuel', 'outil', 6, '2024-07-09 22:19:48', '2024-07-09 22:19:48'),
(1617, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 16-07-2024 à 21:21:46', '', NULL, '2024-07-16 20:21:46', '2024-07-16 20:21:46'),
(1618, '31', 'TEST Dado! Vous vous êtes bien connecté aujourd\'hui 16-07-2024 à 22:31:28', '', NULL, '2024-07-16 21:31:28', '2024-07-16 21:31:28'),
(1619, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 16-07-2024 à 22:32:30', '', NULL, '2024-07-16 21:32:30', '2024-07-16 21:32:30'),
(1620, '1', 'Vous avez modifié le compte du personnel TEST Dado .', '', NULL, '2024-07-16 21:34:07', '2024-07-16 21:34:07'),
(1621, '1', 'Vous avez enregistré l\'utilisateur dont le nom est ADMIN SUPER.', '', NULL, '2024-07-16 21:35:44', '2024-07-16 21:35:44'),
(1622, '1', 'Vous avez activé le compte de l\'utilisateur SUPER et dont l\'identifiant est superadmin.', '', NULL, '2024-07-16 21:35:53', '2024-07-16 21:35:53'),
(1623, '1', 'Vous avez enregistré le rôle SUPER ADMINISTREUR .', '', NULL, '2024-07-16 21:36:31', '2024-07-16 21:36:31'),
(1624, '1', 'Vous avez modifié le compte du personnel SUPER ADMIN .', '', NULL, '2024-07-16 21:38:39', '2024-07-16 21:38:39'),
(1625, '1', 'Vous avez réintialisé le mot de passe du compte de l\'utilisateur SUPER et dont l\'identifiant est superadmin.', '', NULL, '2024-07-16 21:38:43', '2024-07-16 21:38:43'),
(1626, '1', 'Le compte de l\'utilisateur SUPER est activé avec succès pour recevoir les incidents déclarer.', '', NULL, '2024-07-16 21:39:10', '2024-07-16 21:39:10'),
(1627, '1', 'Vous avez modifié le menu Outils / Matériels.', '', NULL, '2024-07-16 22:03:06', '2024-07-16 22:03:06'),
(1628, '1', 'Vous avez modifié le menu Maintenances préventives.', '', NULL, '2024-07-16 22:12:43', '2024-07-16 22:12:43'),
(1629, '1', 'Vous avez modifié le menu Gestion Maintenances Préventives.', '', NULL, '2024-07-16 22:13:17', '2024-07-16 22:13:17'),
(1630, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 17-07-2024 à 07:54:10', '', NULL, '2024-07-17 06:54:10', '2024-07-17 06:54:10'),
(1631, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 19-07-2024 à 07:32:26', '', NULL, '2024-07-19 06:32:26', '2024-07-19 06:32:26'),
(1632, '1', 'Vous avez enregistré le rôle Technicien .', '', NULL, '2024-07-19 06:34:27', '2024-07-19 06:34:27'),
(1633, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 19-07-2024 à 11:39:44', '', NULL, '2024-07-19 10:39:44', '2024-07-19 10:39:44'),
(1634, '1', 'Vous avez modifié le compte du personnel DJIDAGBAGBA S T Emmanuel .', '', NULL, '2024-07-19 11:19:39', '2024-07-19 11:19:39'),
(1635, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 19-07-2024 à 12:21:01', '', NULL, '2024-07-19 11:21:01', '2024-07-19 11:21:01'),
(1636, '1', 'Vous avez enregistré le menu Etats / Avis.', '', NULL, '2024-07-19 16:10:52', '2024-07-19 16:10:52'),
(1637, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 19-07-2024 à 17:37:00', '', NULL, '2024-07-19 16:37:00', '2024-07-19 16:37:00'),
(1638, '1', 'Vous avez enregistrée le Excellente dans la base de Avis .', '', NULL, '2024-07-19 17:47:39', '2024-07-19 17:47:39'),
(1639, '1', 'Vous avez enregistrée le Bien dans la base de Avis .', '', NULL, '2024-07-19 17:47:50', '2024-07-19 17:47:50'),
(1640, '1', 'Vous avez enregistrée le En cours d\'analyse dans la base de Etat .', '', NULL, '2024-07-19 17:51:07', '2024-07-19 17:51:07'),
(1641, '1', 'Vous avez enregistrée le En cours de traitement dans la base de Etat .', '', NULL, '2024-07-19 17:51:21', '2024-07-19 17:51:21'),
(1642, '1', 'Vous avez enregistrée le Incident résolu dans la base de Etat .', '', NULL, '2024-07-19 17:51:34', '2024-07-19 17:51:34'),
(1643, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 20-07-2024 à 06:40:43', '', NULL, '2024-07-20 05:40:43', '2024-07-20 05:40:43'),
(1644, '1', 'L\'état : Ordinateur est modifiée avec succès. ', '', NULL, '2024-07-20 06:45:08', '2024-07-20 06:45:08'),
(1645, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 21-07-2024 à 13:50:49', '', NULL, '2024-07-21 12:50:49', '2024-07-21 12:50:49'),
(1646, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 22-07-2024 à 14:05:11', '', NULL, '2024-07-22 13:05:11', '2024-07-22 13:05:11'),
(1647, '1', 'L\'incident est affecté à : SUPER ADMIN avec succès. ', '', NULL, '2024-07-22 14:37:13', '2024-07-22 14:37:13'),
(1648, '1', 'L\'incident est affecté à : SUPER ADMIN avec succès. ', '', NULL, '2024-07-22 14:37:22', '2024-07-22 14:37:22'),
(1649, '1', 'L\'incident est affecté à : SUPER ADMIN avec succès. ', '', NULL, '2024-07-22 14:39:06', '2024-07-22 14:39:06'),
(1650, '1', 'Action \"viewdoc_incie\" ajouté à Gestion Incidents effectuée avec succès.', '', NULL, '2024-07-22 14:50:03', '2024-07-22 14:50:03'),
(1651, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 22-07-2024 à 15:57:58', '', NULL, '2024-07-22 14:57:58', '2024-07-22 14:57:58'),
(1652, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 23-07-2024 à 00:35:51', '', NULL, '2024-07-22 23:35:51', '2024-07-22 23:35:51'),
(1653, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 23-07-2024 à 09:50:26', '', NULL, '2024-07-23 08:50:26', '2024-07-23 08:50:26'),
(1654, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 23-07-2024 à 13:27:23', '', NULL, '2024-07-23 12:27:23', '2024-07-23 12:27:23'),
(1655, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 27-07-2024 à 10:08:29', '', NULL, '2024-07-27 09:08:29', '2024-07-27 09:08:29'),
(1656, '1', 'Vous avez enregistrée la Catégorie d\'outil BIC .', '', NULL, '2024-07-27 09:09:44', '2024-07-27 09:09:44'),
(1657, '1', 'Vous avez enregistrée le champ suivant Date dans la catégorie Date .', '', NULL, '2024-07-27 09:10:08', '2024-07-27 09:10:08'),
(1658, '1', 'Vous avez enregistrée le champ suivant Nom dans la catégorie Nom .', '', NULL, '2024-07-27 09:15:02', '2024-07-27 09:15:02'),
(1659, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 29-07-2024 à 17:56:54', '', NULL, '2024-07-29 16:56:54', '2024-07-29 16:56:54'),
(1660, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 30-07-2024 à 16:47:15', '', NULL, '2024-07-30 15:47:15', '2024-07-30 15:47:15'),
(1661, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 01-08-2024 à 07:31:39', '', NULL, '2024-08-01 06:31:39', '2024-08-01 06:31:39'),
(1662, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 01-08-2024 à 13:11:33', '', NULL, '2024-08-01 12:11:33', '2024-08-01 12:11:33'),
(1663, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 01-08-2024 à 16:21:40', '', NULL, '2024-08-01 15:21:40', '2024-08-01 15:21:40'),
(1664, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 03-08-2024 à 13:03:02', '', NULL, '2024-08-03 12:03:02', '2024-08-03 12:03:02'),
(1665, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 14-08-2024 à 08:37:06', '', NULL, '2024-08-14 07:37:06', '2024-08-14 07:37:06'),
(1666, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 16-08-2024 à 10:25:26', '', NULL, '2024-08-16 09:25:26', '2024-08-16 09:25:26'),
(1667, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 27-08-2024 à 08:15:57', '', NULL, '2024-08-27 07:15:57', '2024-08-27 07:15:57'),
(1668, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 27-08-2024 à 15:33:22', '', NULL, '2024-08-27 14:33:22', '2024-08-27 14:33:22'),
(1669, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 13-09-2024 à 08:29:31', '', NULL, '2024-09-13 07:29:31', '2024-09-13 07:29:31'),
(1670, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 23-09-2024 à 12:42:18', '', NULL, '2024-09-23 11:42:18', '2024-09-23 11:42:18'),
(1671, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 24-09-2024 à 09:11:27', '', NULL, '2024-09-24 08:11:27', '2024-09-24 08:11:27'),
(1672, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 24-09-2024 à 09:29:07', '', NULL, '2024-09-24 08:29:07', '2024-09-24 08:29:07'),
(1673, '1', 'Vous avez déclaré un incident.204', '', NULL, '2024-09-24 10:00:56', '2024-09-24 10:00:56'),
(1674, '1', 'Incident supprimé : {\"id\":204,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"24-09-2024 11:00:56\",\"Module\":\"Excel\",\"description\":\"Mon Excel ne fonctionne pas.\",\"cat\":2,\"hierarchie\":2,\"piece\":\"\",\"etat\":null,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":null,\"affecter\":null,\"statut\":0,\"action\":null,\"created_at\":\"2024-09-24T11:00:56.000000Z\",\"updated_at\":\"2024-09-24T11:00:56.000000Z\"}', NULL, NULL, '2024-09-24 09:02:24', '2024-09-24 09:02:24'),
(1675, '1', 'Vous avez déclaré un incident.205', '', NULL, '2024-09-24 10:02:48', '2024-09-24 10:02:48'),
(1676, '1', 'L\'état : Excel est modifiée avec succès. ', '', NULL, '2024-09-24 10:11:11', '2024-09-24 10:11:11'),
(1677, '1', 'Vous avez enregistrée le champ suivant Ecran dans la catégorie Ecran .', '', NULL, '2024-09-24 09:28:23', '2024-09-24 09:28:23'),
(1678, '1', 'Vous avez enregistrée l\'outil SIM .', '', NULL, '2024-09-24 09:42:45', '2024-09-24 09:42:45'),
(1679, '1', 'Vous avez affecter `SIM` à l\'utilisateur TEST Dado', 'outil', 7, '2024-09-24 09:57:19', '2024-09-24 09:57:19'),
(1680, '1', 'Vous avez retiré `SIM` à TEST Dado', 'outil', 7, '2024-09-24 09:59:36', '2024-09-24 09:59:36'),
(1681, '1', 'Vous avez enregistré le menu Maintenances curatives.', '', NULL, '2024-09-24 10:42:03', '2024-09-24 10:42:03'),
(1682, '1', 'Vous avez enregistré le menu Gestion Maintenances Curatives.', '', NULL, '2024-09-24 10:43:10', '2024-09-24 10:43:10'),
(1683, '1', 'Vous avez modifié le menu Maintenances curatives.', '', NULL, '2024-09-24 10:43:22', '2024-09-24 10:43:22'),
(1684, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 24-09-2024 à 11:44:02', '', NULL, '2024-09-24 10:44:02', '2024-09-24 10:44:02'),
(1685, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 24-09-2024 à 14:11:25', '', NULL, '2024-09-24 13:11:25', '2024-09-24 13:11:25'),
(1686, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 24-09-2024 à 15:09:28', '', NULL, '2024-09-24 14:09:28', '2024-09-24 14:09:28'),
(1687, '1', 'L\'incident est affecté à : SUPER ADMIN avec succès. ', '', NULL, '2024-09-24 14:24:45', '2024-09-24 14:24:45'),
(1688, '1', 'Vous avez modifié l\'incident Mon Excel ne marche pas. .', '', NULL, '2024-09-24 14:25:20', '2024-09-24 14:25:20'),
(1689, '1', 'Vous avez enregistrée le champ suivant  dans la catégorie  .', '', NULL, '2024-09-24 16:14:33', '2024-09-24 16:14:33'),
(1690, '1', 'Vous avez enregistrée le champ suivant  dans la catégorie  .', '', NULL, '2024-09-24 16:14:47', '2024-09-24 16:14:47'),
(1691, '1', 'Vous avez enregistrée le champ suivant  dans la catégorie  .', '', NULL, '2024-09-24 16:14:49', '2024-09-24 16:14:49'),
(1692, '1', 'Vous avez modifié la catégorie Matériels .', '', NULL, '2024-09-24 16:15:15', '2024-09-24 16:15:15'),
(1693, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 24-09-2024 à 17:15:42', '', NULL, '2024-09-24 16:15:42', '2024-09-24 16:15:42'),
(1694, '1', 'Vous avez déclaré un incident.206', '', NULL, '2024-09-24 17:16:49', '2024-09-24 17:16:49'),
(1695, '1', 'Vous avez modifié l\'incident ddfjqfd .', '', NULL, '2024-09-24 16:18:15', '2024-09-24 16:18:15'),
(1696, '1', 'Vous avez déclaré un incident.207', '', NULL, '2024-09-24 17:26:06', '2024-09-24 17:26:06'),
(1697, '1', 'L\'incident est affecté à : SUPER ADMIN avec succès. ', '', NULL, '2024-09-24 16:46:16', '2024-09-24 16:46:16'),
(1698, '1', 'L\'incident est affecté à : TEST Dado avec succès. ', '', NULL, '2024-09-24 16:46:29', '2024-09-24 16:46:29'),
(1699, '1', 'Vous avez déclaré un incident.208', '', NULL, '2024-09-24 17:48:27', '2024-09-24 17:48:27'),
(1700, '1', 'L\'état : Word est modifiée avec succès. ', '', NULL, '2024-09-24 17:49:21', '2024-09-24 17:49:21'),
(1701, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 25-09-2024 à 10:37:46', '', NULL, '2024-09-25 09:37:46', '2024-09-25 09:37:46'),
(1702, '1', 'Data delete : {\"id\":7,\"user\":null,\"reference\":\"REF\\/TU1\\/MDP\\/SP\",\"dateacquisition\":\"2024-09-24\",\"nameoutils\":\"SIM\",\"categorie\":4,\"otherjson\":\"{\\\"mer\\\": \\\"61310573\\\", \\\"opro\\\": \\\"Emmanuel\\\", \\\"teel\\\": \\\"2024-09-24\\\", \\\"other\\\": \\\"\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2024-09-24T10:42:45.000000Z\",\"updated_at\":\"2024-09-24T10:59:36.000000Z\"}', '', NULL, '2024-09-25 10:15:37', '2024-09-25 10:15:37'),
(1703, '1', 'Incident supprimé : {\"id\":203,\"Service\":2,\"Emetteur\":31,\"DateEmission\":\"09-07-2024 23:43:23\",\"Module\":\"Ordinateur\",\"description\":\"Ma connexion internet ne marche pas.\",\"cat\":2,\"hierarchie\":3,\"piece\":\"\",\"etat\":3,\"resolue\":null,\"avis\":\"Bien\",\"sugg\":\"bbrb\",\"DateResolue\":\"2024-07-20 07:45:08\",\"affecter\":32,\"statut\":1,\"action\":null,\"created_at\":\"2024-07-09T23:43:23.000000Z\",\"updated_at\":\"2024-09-24T15:24:45.000000Z\"}', NULL, NULL, '2024-09-25 12:40:25', '2024-09-25 12:40:25'),
(1704, '1', 'Incident supprimé : {\"id\":205,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"24-09-2024 11:02:48\",\"Module\":\"Excel\",\"description\":\"Mon Excel ne marche pas.\",\"cat\":3,\"hierarchie\":4,\"piece\":\"\",\"etat\":5,\"resolue\":\"\",\"avis\":\"Excellent\",\"sugg\":\"J\'aurai aim\\u00e9 que \\u00e7a se passe plut\\u00f4t au vu de mes urgences.\",\"DateResolue\":\"2024-09-24 11:11:11\",\"affecter\":null,\"statut\":1,\"action\":null,\"created_at\":\"2024-09-24T11:02:48.000000Z\",\"updated_at\":\"2024-09-24T15:25:20.000000Z\"}', NULL, NULL, '2024-09-25 13:13:43', '2024-09-25 13:13:43'),
(1705, '1', 'Incident supprimé : {\"id\":208,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"24-09-2024 18:48:27\",\"Module\":\"Word\",\"description\":\"scscsv\",\"cat\":3,\"hierarchie\":3,\"piece\":\"\",\"etat\":5,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":\"2024-09-24 18:49:21\",\"affecter\":null,\"statut\":1,\"action\":null,\"created_at\":\"2024-09-24T18:48:27.000000Z\",\"updated_at\":\"2024-09-24T18:49:21.000000Z\"}', NULL, NULL, '2024-09-25 13:15:25', '2024-09-25 13:15:25'),
(1706, '1', 'L\'incident est affecté à : SUPER ADMIN avec succès. ', '', NULL, '2024-09-25 13:20:14', '2024-09-25 13:20:14'),
(1707, '1', 'L\'incident est affecté à : TEST Dado avec succès. ', '', NULL, '2024-09-25 13:20:23', '2024-09-25 13:20:23'),
(1708, '1', 'L\'incident est affecté à : TEST Dado avec succès. ', '', NULL, '2024-09-25 13:42:23', '2024-09-25 13:42:23'),
(1709, '1', 'L\'incident est affecté à : SUPER ADMIN avec succès. ', '', NULL, '2024-09-25 13:42:31', '2024-09-25 13:42:31'),
(1710, '1', 'L\'état : Canva est modifiée avec succès. ', '', NULL, '2024-09-25 14:44:45', '2024-09-25 14:44:45'),
(1711, '1', 'L\'état : Word est modifiée avec succès. ', '', NULL, '2024-09-25 15:03:45', '2024-09-25 15:03:45'),
(1712, '1', 'L\'état : Outlook est modifiée avec succès. ', '', NULL, '2024-09-25 15:03:57', '2024-09-25 15:03:57'),
(1713, '1', 'Vous avez enregistré un incident.209', '', NULL, '2024-09-25 14:39:12', '2024-09-25 14:39:12'),
(1714, '1', 'Vous avez enregistré un incident.210', '', NULL, '2024-09-25 14:40:04', '2024-09-25 14:40:04'),
(1715, '1', 'Incident supprimé : {\"id\":210,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"25-09-2024 15:40:04\",\"Module\":\"Word\",\"description\":\"\",\"cat\":3,\"hierarchie\":2,\"piece\":\"\",\"etat\":0,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":null,\"affecter\":null,\"statut\":0,\"action\":null,\"created_at\":\"2024-09-25T15:40:04.000000Z\",\"updated_at\":\"2024-09-25T15:40:04.000000Z\"}', NULL, NULL, '2024-09-25 16:19:46', '2024-09-25 16:19:46'),
(1716, '1', 'Vous avez déclaré un incident.211', '', NULL, '2024-09-25 17:20:20', '2024-09-25 17:20:20'),
(1717, '1', 'L\'état : Excel est modifiée avec succès. ', '', NULL, '2024-09-25 17:20:51', '2024-09-25 17:20:51'),
(1718, '1', 'L\'état : Canva est modifiée avec succès. ', '', NULL, '2024-09-25 17:26:09', '2024-09-25 17:26:09'),
(1719, '1', 'Data existant :{\"id\":2,\"user\":1,\"reference\":null,\"dateacquisition\":null,\"nameoutils\":\"Ordinateur\",\"categorie\":2,\"otherjson\":\"{\\\"m\\\": \\\"20\\\", \\\"momo\\\": \\\"KANTHS Toussaint\\\", \\\"tdpa\\\": \\\"cc\\\", \\\"delor\\\": \\\"cc\\\", \\\"mptut\\\": \\\"VV\\\", \\\"other\\\": \\\"\\\", \\\"squdu\\\": \\\"5\\\", \\\"steee\\\": \\\"c\\\", \\\"crooft\\\": \\\"cc\\\", \\\"oceseu\\\": \\\"c\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2023-08-31T19:34:48.000000Z\",\"updated_at\":\"2023-09-01T22:43:31.000000Z\"}', '', NULL, '2024-09-25 16:51:45', '2024-09-25 16:51:45'),
(1720, '1', 'Vous avez défini l\'état de l\'outil Ordinateur à `BON``. <br> ', 'outil', 2, '2024-09-25 16:51:45', '2024-09-25 16:51:45'),
(1721, '1', 'Data existant :{\"id\":2,\"user\":1,\"reference\":null,\"dateacquisition\":null,\"nameoutils\":\"Ordinateur\",\"categorie\":2,\"otherjson\":\"{\\\"m\\\": \\\"20\\\", \\\"momo\\\": \\\"KANTHS Toussaint\\\", \\\"tdpa\\\": \\\"cc\\\", \\\"delor\\\": \\\"cc\\\", \\\"mptut\\\": \\\"VV\\\", \\\"other\\\": \\\"\\\", \\\"squdu\\\": \\\"5\\\", \\\"steee\\\": \\\"c\\\", \\\"crooft\\\": \\\"cc\\\", \\\"oceseu\\\": \\\"c\\\"}\",\"etat\":\"BON\",\"action\":1,\"created_at\":\"2023-08-31T19:34:48.000000Z\",\"updated_at\":\"2024-09-25T17:51:45.000000Z\"}', '', NULL, '2024-09-25 16:52:07', '2024-09-25 16:52:07'),
(1722, '1', 'Vous avez défini l\'état de l\'outil Ordinateur à `Autres``. <br> ', 'outil', 2, '2024-09-25 16:52:07', '2024-09-25 16:52:07'),
(1723, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 26-09-2024 à 11:12:21', '', NULL, '2024-09-26 10:12:21', '2024-09-26 10:12:21'),
(1724, '1', 'Vous avez programmer une maintenance pour la période du 2024-09-27 au 2024-09-30 .', '', NULL, '2024-09-26 10:50:50', '2024-09-26 10:50:50'),
(1725, '1', 'Data ancien : {\"id\":5,\"periodedebut\":\"2023-08-28\",\"periodefin\":\"2023-09-13\",\"etat\":\"TRES BON\",\"commentaire\":\"n\",\"user\":1,\"action\":1,\"created_at\":\"2023-09-02T12:19:21.000000Z\",\"updated_at\":\"2023-09-02T13:32:17.000000Z\"}', '', NULL, '2024-09-26 12:03:07', '2024-09-26 12:03:07'),
(1726, '1', 'Vous avez modifiée les informations de la période de 2023-08-28 au 2023-09-13  en 2023-08-28 au 2023-09-13', '', NULL, '2024-09-26 12:03:07', '2024-09-26 12:03:07'),
(1727, '1', 'Data ancien : {\"id\":5,\"periodedebut\":\"2023-08-28\",\"periodefin\":\"2023-09-13\",\"etat\":\"TRES BON\",\"commentaire\":\"n\",\"user\":1,\"action\":1,\"created_at\":\"2023-09-02T12:19:21.000000Z\",\"updated_at\":\"2024-09-26T13:03:07.000000Z\"}', '', NULL, '2024-09-26 12:03:18', '2024-09-26 12:03:18'),
(1728, '1', 'Vous avez modifiée les informations de la période de 2023-08-28 au 2023-09-13  en 2023-08-28 au 2023-09-13', '', NULL, '2024-09-26 12:03:18', '2024-09-26 12:03:18'),
(1729, '1', 'Data ancien : {\"id\":5,\"periodedebut\":\"2023-08-28\",\"periodefin\":\"2023-09-13\",\"etat\":\"TRES BON\",\"commentaire\":\"n\",\"user\":1,\"action\":1,\"created_at\":\"2023-09-02T12:19:21.000000Z\",\"updated_at\":\"2024-09-26T13:03:18.000000Z\"}', '', NULL, '2024-09-26 12:04:17', '2024-09-26 12:04:17'),
(1730, '1', 'Vous avez modifiée les informations de la période de 2023-08-28 au 2023-09-13  en 2023-08-28 au 2023-09-13', '', NULL, '2024-09-26 12:04:17', '2024-09-26 12:04:17'),
(1731, '1', 'Data ancien : {\"id\":7,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-30\",\"etat\":null,\"commentaire\":null,\"user\":32,\"action\":1,\"created_at\":\"2024-09-26T11:50:50.000000Z\",\"updated_at\":\"2024-09-26T11:50:50.000000Z\"}', '', NULL, '2024-09-26 12:04:31', '2024-09-26 12:04:31'),
(1732, '1', 'Vous avez modifiée les informations de la période de 2024-09-27 au 2024-09-30  en 2024-09-27 au 2024-09-30', '', NULL, '2024-09-26 12:04:31', '2024-09-26 12:04:31'),
(1733, '1', 'Incident supprimé : {\"id\":21,\"Service\":5,\"Emetteur\":31,\"DateEmission\":\"16-09-2022\",\"Module\":\"Outlook\",\"description\":\"Boite pleine\",\"cat\":3,\"hierarchie\":3,\"piece\":\"\",\"etat\":5,\"resolue\":null,\"avis\":\"Excellent\",\"sugg\":null,\"DateResolue\":\"2024-09-25 16:03:57\",\"affecter\":1,\"statut\":1,\"action\":1,\"created_at\":\"2023-08-16T14:55:32.000000Z\",\"updated_at\":\"2024-09-25T16:03:57.000000Z\"}', NULL, NULL, '2024-09-26 14:06:48', '2024-09-26 14:06:48'),
(1734, '1', 'Incident supprimé : {\"id\":206,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"24-09-2024 18:16:49\",\"Module\":\"Word\",\"description\":\"ddfjqfd\",\"cat\":3,\"hierarchie\":2,\"piece\":\"\",\"etat\":3,\"resolue\":null,\"avis\":\"Bien\",\"sugg\":null,\"DateResolue\":\"2024-09-25 16:03:44\",\"affecter\":31,\"statut\":1,\"action\":null,\"created_at\":\"2024-09-24T18:16:49.000000Z\",\"updated_at\":\"2024-09-25T16:03:44.000000Z\"}', NULL, NULL, '2024-09-26 14:18:53', '2024-09-26 14:18:53'),
(1735, '1', 'Data delete M : {\"id\":7,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-30\",\"etat\":null,\"commentaire\":null,\"user\":1,\"action\":1,\"created_at\":\"2024-09-26T11:50:50.000000Z\",\"updated_at\":\"2024-09-26T13:04:31.000000Z\"}', '', NULL, '2024-09-26 14:36:04', '2024-09-26 14:36:04'),
(1736, '1', 'Data ancien : {\"id\":5,\"periodedebut\":\"2023-08-28\",\"periodefin\":\"2023-09-13\",\"etat\":\"TRES BON\",\"commentaire\":\"n\",\"user\":1,\"action\":1,\"created_at\":\"2023-09-02T12:19:21.000000Z\",\"updated_at\":\"2024-09-26T13:04:17.000000Z\"}', '', NULL, '2024-09-26 14:36:54', '2024-09-26 14:36:54'),
(1737, '1', 'Vous avez modifiée les informations de la période de 2023-08-28 au 2023-09-13  en 2023-08-28 au 2023-09-13', '', NULL, '2024-09-26 14:36:54', '2024-09-26 14:36:54'),
(1738, '1', 'Vous avez programmer une maintenance pour la période du 2024-09-28 au 2024-10-01 .', '', NULL, '2024-09-26 14:37:55', '2024-09-26 14:37:55'),
(1739, '1', 'Vous avez programmer une maintenance pour la période du 2024-09-27 au 2024-10-04 .', '', NULL, '2024-09-26 14:39:45', '2024-09-26 14:39:45'),
(1740, '1', 'Vous avez programmer une maintenance pour la période du 24 octobre 2024 au 30 octobre 2024 .', '', NULL, '2024-09-26 14:41:47', '2024-09-26 14:41:47'),
(1741, '1', 'Data delete M : {\"id\":10,\"periodedebut\":\"2024-10-24\",\"periodefin\":\"2024-10-30\",\"etat\":null,\"commentaire\":null,\"user\":32,\"action\":1,\"created_at\":\"2024-09-26T15:41:47.000000Z\",\"updated_at\":\"2024-09-26T15:41:47.000000Z\"}', '', NULL, '2024-09-26 14:42:33', '2024-09-26 14:42:33'),
(1742, '1', 'Data delete M : {\"id\":9,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-10-04\",\"etat\":null,\"commentaire\":null,\"user\":32,\"action\":1,\"created_at\":\"2024-09-26T15:39:44.000000Z\",\"updated_at\":\"2024-09-26T15:39:44.000000Z\"}', '', NULL, '2024-09-26 14:44:36', '2024-09-26 14:44:36'),
(1743, '1', 'Incident supprimé : {\"id\":207,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"24-09-2024 18:26:06\",\"Module\":\"Canva\",\"description\":\"DHGJ\",\"cat\":4,\"hierarchie\":4,\"piece\":\"\",\"etat\":4,\"resolue\":null,\"avis\":\"Passable\",\"sugg\":null,\"DateResolue\":\"2024-09-25 15:44:45\",\"affecter\":32,\"statut\":1,\"action\":null,\"created_at\":\"2024-09-24T18:26:06.000000Z\",\"updated_at\":\"2024-09-25T15:44:45.000000Z\"}', NULL, NULL, '2024-09-26 14:45:07', '2024-09-26 14:45:07'),
(1744, '1', 'Data delete M : {\"id\":8,\"periodedebut\":\"2024-09-28\",\"periodefin\":\"2024-10-01\",\"etat\":null,\"commentaire\":null,\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T15:37:55.000000Z\",\"updated_at\":\"2024-09-26T15:37:55.000000Z\"}', '', NULL, '2024-09-26 14:48:25', '2024-09-26 14:48:25'),
(1745, '1', 'Vous avez programmer une maintenance pour la période du 27 septembre 2024 au 30 septembre 2024 .', '', NULL, '2024-09-26 14:50:21', '2024-09-26 14:50:21'),
(1746, '1', 'Data delete M : {\"id\":11,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-30\",\"etat\":null,\"commentaire\":null,\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T15:50:21.000000Z\",\"updated_at\":\"2024-09-26T15:50:21.000000Z\"}', '', NULL, '2024-09-26 14:50:43', '2024-09-26 14:50:43'),
(1747, '1', 'Vous avez programmer une maintenance pour la période du 27 septembre 2024 au 30 septembre 2024 .', '', NULL, '2024-09-26 14:52:08', '2024-09-26 14:52:08'),
(1748, '1', 'Data delete M : {\"id\":12,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-30\",\"etat\":null,\"commentaire\":null,\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T15:52:08.000000Z\",\"updated_at\":\"2024-09-26T15:52:08.000000Z\"}', '', NULL, '2024-09-26 14:52:29', '2024-09-26 14:52:29'),
(1749, '1', 'Data delete M : {\"id\":5,\"periodedebut\":\"2023-08-28\",\"periodefin\":\"2023-09-13\",\"etat\":\"TRES BON\",\"commentaire\":\"n\",\"user\":1,\"action\":1,\"created_at\":\"2023-09-02T12:19:21.000000Z\",\"updated_at\":\"2024-09-26T15:36:54.000000Z\"}', '', NULL, '2024-09-26 14:53:08', '2024-09-26 14:53:08'),
(1750, '1', 'Vous avez programmer une maintenance pour la période du 04 septembre 2024 au 12 septembre 2024 .', '', NULL, '2024-09-26 14:57:31', '2024-09-26 14:57:31'),
(1751, '1', 'Data existant : {\"id\":13,\"periodedebut\":\"2024-09-04\",\"periodefin\":\"2024-09-12\",\"etat\":null,\"commentaire\":null,\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T15:57:31.000000Z\",\"updated_at\":\"2024-09-26T15:57:31.000000Z\"}', '', NULL, '2024-09-26 14:58:07', '2024-09-26 14:58:07'),
(1752, '1', 'Vous avez défini l\'état de la maintenance de la période du `2024-09-04 2024-09-12` à MAUVAISE``. <br> ', '', NULL, '2024-09-26 14:58:07', '2024-09-26 14:58:07'),
(1753, '1', 'Vous avez programmer une maintenance pour la période du 27 septembre 2024 au 29 septembre 2024 .', '', NULL, '2024-09-26 15:01:56', '2024-09-26 15:01:56'),
(1754, '1', 'Data ancien : {\"id\":14,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-29\",\"etat\":null,\"commentaire\":null,\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T16:01:56.000000Z\",\"updated_at\":\"2024-09-26T16:01:56.000000Z\"}', '', NULL, '2024-09-26 15:02:26', '2024-09-26 15:02:26'),
(1755, '1', 'Vous avez modifiée les informations de la période de 2024-09-27 au 2024-09-29  en 2024-09-27 au 2024-09-29', '', NULL, '2024-09-26 15:02:26', '2024-09-26 15:02:26'),
(1756, '1', 'Data existant : {\"id\":13,\"periodedebut\":\"2024-09-04\",\"periodefin\":\"2024-09-12\",\"etat\":\"MAUVAISE\",\"commentaire\":null,\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T15:57:31.000000Z\",\"updated_at\":\"2024-09-26T15:58:07.000000Z\"}', '', NULL, '2024-09-26 15:06:03', '2024-09-26 15:06:03'),
(1757, '1', 'Vous avez défini l\'état de la maintenance de la période du `2024-09-04 au 2024-09-12` à TRES BON``. <br> fdgfdsgs', '', NULL, '2024-09-26 15:06:03', '2024-09-26 15:06:03'),
(1758, '1', 'Data existant : {\"id\":13,\"periodedebut\":\"2024-09-04\",\"periodefin\":\"2024-09-12\",\"etat\":\"TRES BON\",\"commentaire\":\"fdgfdsgs\",\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T15:57:31.000000Z\",\"updated_at\":\"2024-09-26T16:06:03.000000Z\"}', '', NULL, '2024-09-26 15:08:46', '2024-09-26 15:08:46'),
(1759, '1', 'Vous avez défini l\'état de la maintenance de la période du `2024-09-04 au 2024-09-12` à TRES BON``. <br> fdgfdsgs', '', NULL, '2024-09-26 15:08:46', '2024-09-26 15:08:46'),
(1760, '1', 'Data existant : {\"id\":13,\"periodedebut\":\"2024-09-04\",\"periodefin\":\"2024-09-12\",\"etat\":\"TRES BON\",\"commentaire\":\"fdgfdsgs\",\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T15:57:31.000000Z\",\"updated_at\":\"2024-09-26T16:08:46.000000Z\"}', '', NULL, '2024-09-26 15:09:06', '2024-09-26 15:09:06'),
(1761, '1', 'Vous avez défini l\'état de la maintenance de la période du `2024-09-04 au 2024-09-12` à DEFAILLANT``. <br> ddff', '', NULL, '2024-09-26 15:09:06', '2024-09-26 15:09:06'),
(1762, '1', 'Data existant : {\"id\":14,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-29\",\"etat\":null,\"commentaire\":null,\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T16:01:56.000000Z\",\"updated_at\":\"2024-09-26T16:02:26.000000Z\"}', '', NULL, '2024-09-26 15:09:40', '2024-09-26 15:09:40'),
(1763, '1', 'Vous avez défini l\'état de la maintenance de la période du `2024-09-27 au 2024-09-29` à BON``. <br> ddff', '', NULL, '2024-09-26 15:09:40', '2024-09-26 15:09:40'),
(1764, '1', 'Data ancien : {\"id\":14,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-29\",\"etat\":\"BON\",\"commentaire\":\"ddff\",\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T16:01:56.000000Z\",\"updated_at\":\"2024-09-26T16:09:40.000000Z\"}', '', NULL, '2024-09-26 15:10:01', '2024-09-26 15:10:01'),
(1765, '1', 'Vous avez modifiée les informations de la période de 2024-09-27 au 2024-09-29  en 2024-09-27 au 2024-09-29', '', NULL, '2024-09-26 15:10:01', '2024-09-26 15:10:01'),
(1766, '1', 'Data ancien : {\"id\":14,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-29\",\"etat\":\"BON\",\"commentaire\":\"ddff\",\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T16:01:56.000000Z\",\"updated_at\":\"2024-09-26T16:10:01.000000Z\"}', '', NULL, '2024-09-26 15:11:48', '2024-09-26 15:11:48'),
(1767, '1', 'Data ancien : {\"id\":14,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-29\",\"etat\":\"BON\",\"commentaire\":\"ddff\",\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T16:01:56.000000Z\",\"updated_at\":\"2024-09-26T16:10:01.000000Z\"}', '', NULL, '2024-09-26 15:11:58', '2024-09-26 15:11:58'),
(1768, '1', 'Data ancien : {\"id\":14,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-29\",\"etat\":\"BON\",\"commentaire\":\"ddff\",\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T16:01:56.000000Z\",\"updated_at\":\"2024-09-26T16:10:01.000000Z\"}', '', NULL, '2024-09-26 15:13:07', '2024-09-26 15:13:07'),
(1769, '1', 'Data ancien : {\"id\":14,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-29\",\"etat\":\"BON\",\"commentaire\":\"ddff\",\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T16:01:56.000000Z\",\"updated_at\":\"2024-09-26T16:10:01.000000Z\"}', '', NULL, '2024-09-26 15:13:43', '2024-09-26 15:13:43'),
(1770, '1', 'Vous avez modifiée les informations de la période de 2024-09-27 au 2024-09-29  en 2024-09-27 au 2024-09-29', '', NULL, '2024-09-26 15:13:44', '2024-09-26 15:13:44'),
(1771, '1', 'Data ancien : {\"id\":5,\"outil\":2,\"maintenance\":14,\"etat\":\"Excellent\",\"commentaireinf\":\"Je suis bien l\\u00e0\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":\"Excellent\",\"detailjson\":\"|sft|mjw|rdd|duc|dram|dcs|decr\",\"action\":1,\"created_at\":\"2023-09-05T15:01:37.000000Z\",\"updated_at\":\"2023-09-08T01:04:51.000000Z\"}', '', NULL, '2024-09-26 15:26:05', '2024-09-26 15:26:05'),
(1772, '1', 'Vous avez modifiée les informations de la période du 27 septembre 2024 au 29 septembre 2024 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-26 15:26:05', '2024-09-26 15:26:05'),
(1773, '1', 'Data delete GM : {\"id\":5,\"outil\":2,\"maintenance\":14,\"etat\":\"Excellent\",\"commentaireinf\":\"Je suis bien l\\u00e0\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":\"Excellent\",\"detailjson\":\"|sft|mjw|dfg|rdd|duc|dram|dcs|decr|bkpi\",\"action\":1,\"created_at\":\"2023-09-05T15:01:37.000000Z\",\"updated_at\":\"2024-09-26T16:26:05.000000Z\"}', '', NULL, '2024-09-26 15:47:09', '2024-09-26 15:47:09'),
(1774, '1', 'Data delete GM : null', '', NULL, '2024-09-26 15:48:26', '2024-09-26 15:48:26'),
(1775, '1', 'Data delete M : {\"id\":14,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-29\",\"etat\":\"BON\",\"commentaire\":\"ddff\",\"user\":31,\"action\":1,\"created_at\":\"2024-09-26T16:01:56.000000Z\",\"updated_at\":\"2024-09-26T16:13:43.000000Z\"}', '', NULL, '2024-09-26 16:40:12', '2024-09-26 16:40:12'),
(1776, '1', 'Vous avez programmer une maintenance pour la période du 27 septembre 2024 au 30 septembre 2024 .', '', NULL, '2024-09-26 17:00:36', '2024-09-26 17:00:36'),
(1777, '1', 'Vous avez programmer une maintenance pour la période du 27 septembre 2024 au 29 septembre 2024 .', '', NULL, '2024-09-26 17:00:58', '2024-09-26 17:00:58'),
(1778, '1', 'Vous avez enregistrée une maintenance de la période du 2024-09-27 au 2024-09-30 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-26 17:07:16', '2024-09-26 17:07:16'),
(1779, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 27-09-2024 à 10:22:16', '', NULL, '2024-09-27 09:22:16', '2024-09-27 09:22:16'),
(1780, '1', 'Vous avez enregistrée l\'outil CRAYON .', '', NULL, '2024-09-27 10:47:45', '2024-09-27 10:47:45'),
(1781, '1', 'Data ancien : {\"id\":8,\"user\":null,\"reference\":\"DGETE\",\"dateacquisition\":\"2024-09-28\",\"nameoutils\":\"CRAYON\",\"categorie\":6,\"otherjson\":\"{\\\"other\\\":\\\"\\\",\\\"te\\\":\\\"2024-09-28\\\",\\\"m\\\":\\\"CRO\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2024-09-27T11:47:45.000000Z\",\"updated_at\":\"2024-09-27T11:47:45.000000Z\"}', '', NULL, '2024-09-27 10:54:22', '2024-09-27 10:54:22'),
(1782, '1', 'Vous avez modifiée les informations de CRAYON .', 'outil', 8, '2024-09-27 10:54:22', '2024-09-27 10:54:22'),
(1783, '1', 'Vous avez affecter `CRAYON` à l\'utilisateur TEST Dado', 'outil', 8, '2024-09-27 10:57:58', '2024-09-27 10:57:58'),
(1784, '1', 'Vous avez enregistrée l\'action  pour l\'outil :.', '', NULL, '2024-09-27 13:04:20', '2024-09-27 13:04:20'),
(1785, '1', 'Vous avez enregistrée l\'action  pour l\'outil :.', '', NULL, '2024-09-27 13:05:53', '2024-09-27 13:05:53'),
(1786, '1', 'Vous avez enregistrée l\'action dgfdfdffsfsfdd pour l\'outil :LETTET.', '', NULL, '2024-09-27 13:21:32', '2024-09-27 13:21:32'),
(1787, '1', 'Vous avez enregistrée l\'action sgff pour l\'outil :LETTET.', '', NULL, '2024-09-27 13:31:42', '2024-09-27 13:31:42'),
(1788, '1', 'Vous avez enregistrée l\'action AGDGEG pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 13:54:09', '2024-09-27 13:54:09'),
(1789, '1', 'Vous avez enregistrée l\'action Suppression des fichiers temporaire pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 14:03:49', '2024-09-27 14:03:49'),
(1790, '1', 'Vous avez enregistrée l\'action Mise à jour Windows pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 14:04:21', '2024-09-27 14:04:21'),
(1791, '1', 'Vous avez enregistrée l\'action Défragmentation pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 14:04:47', '2024-09-27 14:04:47'),
(1792, '1', 'Vous avez enregistrée l\'action Réparation des disques pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 14:05:22', '2024-09-27 14:05:22'),
(1793, '1', 'Vous avez enregistrée l\'action Etat de disque pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 14:08:10', '2024-09-27 14:08:10'),
(1794, '1', 'Vous avez enregistrée l\'action Espace de disque pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 14:08:42', '2024-09-27 14:08:42'),
(1795, '1', 'Vous avez enregistrée l\'action Antivirus pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 14:09:10', '2024-09-27 14:09:10'),
(1796, '1', 'Vous avez enregistrée l\'action Dépoussièrer Unité Centrale pour l\'outil :LETTET.', '', NULL, '2024-09-27 15:50:28', '2024-09-27 15:50:28'),
(1797, '1', 'Vous avez enregistrée l\'action Dépoussièrer Clavier/Souris pour l\'outil :LETTET.', '', NULL, '2024-09-27 15:51:20', '2024-09-27 15:51:20'),
(1798, '1', 'Vous avez enregistrée l\'action Dépoussièrer Ecran pour l\'outil :LETTET.', '', NULL, '2024-09-27 15:51:59', '2024-09-27 15:51:59'),
(1799, '1', 'Vous avez programmer une maintenance pour la période du 29 septembre 2024 au 26 septembre 2024 .', '', NULL, '2024-09-27 16:05:16', '2024-09-27 16:05:16'),
(1800, '1', 'Data ancien : {\"id\":7,\"outil\":6,\"maintenance\":13,\"etat\":\"Passable\",\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|duc|decr|bkpi|bkpe\",\"action\":1,\"created_at\":\"2024-09-26T18:20:51.000000Z\",\"updated_at\":\"2024-09-26T18:20:51.000000Z\"}', '', NULL, '2024-09-27 16:24:08', '2024-09-27 16:24:08'),
(1801, '1', 'Data ancien : {\"id\":6,\"outil\":2,\"maintenance\":15,\"etat\":\"Bien\",\"commentaireinf\":\"shfgsjfsfgshfj\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|sft|mjw|dfg|rdd|edd|duc|dram|dcs|decr\",\"action\":1,\"created_at\":\"2024-09-26T18:07:16.000000Z\",\"updated_at\":\"2024-09-26T18:07:16.000000Z\"}', '', NULL, '2024-09-27 17:21:02', '2024-09-27 17:21:02'),
(1802, '1', 'Vous avez modifiée les informations de la période du 27 septembre 2024 au 30 septembre 2024 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-27 17:21:02', '2024-09-27 17:21:02'),
(1803, '1', 'Vous avez enregistrée l\'action Suppression pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 17:39:31', '2024-09-27 17:39:31'),
(1804, '1', 'Vous avez enregistrée l\'action Defrage pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 17:39:49', '2024-09-27 17:39:49'),
(1805, '1', 'Vous avez enregistrée l\'action Optimize pour l\'outil :Ordinateur.', '', NULL, '2024-09-27 17:40:05', '2024-09-27 17:40:05'),
(1806, '1', 'Vous avez enregistrée l\'action Netoyage pour l\'outil :CRAYON.', '', NULL, '2024-09-27 17:40:27', '2024-09-27 17:40:27'),
(1807, '1', 'Vous avez enregistrée l\'action Antivirus pour l\'outil :CRAYON.', '', NULL, '2024-09-27 17:40:47', '2024-09-27 17:40:47'),
(1808, '1', 'Vous avez enregistrée l\'action Installation pour l\'outil :LETTET.', '', NULL, '2024-09-27 17:41:07', '2024-09-27 17:41:07'),
(1809, '1', 'Vous avez enregistrée l\'action Installation pour l\'outil :LETTET.', '', NULL, '2024-09-27 17:41:08', '2024-09-27 17:41:08'),
(1810, '1', 'Vous avez enregistrée une maintenance de la période du 2024-09-04 au 2024-09-12 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-27 17:41:27', '2024-09-27 17:41:27'),
(1811, '1', 'Vous avez enregistrée l\'action Restoration pour l\'outil :LETTET.', '', NULL, '2024-09-27 17:45:56', '2024-09-27 17:45:56'),
(1812, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 28-09-2024 à 11:44:00', '', NULL, '2024-09-28 10:44:00', '2024-09-28 10:44:00'),
(1813, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 28-09-2024 à 11:50:16', '', NULL, '2024-09-28 10:50:16', '2024-09-28 10:50:16'),
(1814, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 28-09-2024 à 11:50:35', '', NULL, '2024-09-28 10:50:35', '2024-09-28 10:50:35'),
(1815, '1', 'Vous avez enregistrée l\'action gfdf pour l\'outil :SIM.', '', NULL, '2024-09-28 11:06:16', '2024-09-28 11:06:16'),
(1816, '1', 'Vous avez enregistrée l\'action sss pour l\'outil :Maison.', '', NULL, '2024-09-28 11:10:25', '2024-09-28 11:10:25'),
(1817, '1', 'Vous avez enregistrée l\'action ss pour l\'outil :Maison.', '', NULL, '2024-09-28 11:11:04', '2024-09-28 11:11:04'),
(1818, '1', 'Vous avez programmer une maintenance pour la période du 28 septembre 2024 au 29 septembre 2024 .', '', NULL, '2024-09-28 11:12:22', '2024-09-28 11:12:22'),
(1819, '1', 'Vous avez enregistrée l\'action Ajouter pour l\'outil :Ordinateurs.', '', NULL, '2024-09-28 12:56:31', '2024-09-28 12:56:31'),
(1820, '1', 'Vous avez enregistrée l\'action Delete pour l\'outil :Ordinateurs.', '', NULL, '2024-09-28 12:56:47', '2024-09-28 12:56:47'),
(1821, '1', 'Vous avez enregistrée l\'action Update pour l\'outil :BIC.', '', NULL, '2024-09-28 12:57:06', '2024-09-28 12:57:06'),
(1822, '1', 'Vous avez enregistrée l\'action Supprimer pour l\'outil :SIM.', '', NULL, '2024-09-28 12:57:24', '2024-09-28 12:57:24'),
(1823, '1', 'Vous avez enregistrée l\'action sss pour l\'outil :Maison.', '', NULL, '2024-09-28 15:01:30', '2024-09-28 15:01:30'),
(1824, '1', 'Vous avez enregistrée l\'action ddsd pour l\'outil :Ordinateurs.', '', NULL, '2024-09-28 15:16:43', '2024-09-28 15:16:43'),
(1825, '1', 'Vous avez enregistrée l\'action ddsds pour l\'outil :Ordinateurs.', '', NULL, '2024-09-28 15:16:49', '2024-09-28 15:16:49'),
(1826, '1', 'Vous avez enregistrée l\'action ddsdss pour l\'outil :Ordinateurs.', '', NULL, '2024-09-28 15:16:54', '2024-09-28 15:16:54'),
(1827, '1', 'Vous avez enregistrée l\'action aaaa pour l\'outil :SIM.', '', NULL, '2024-09-28 15:18:36', '2024-09-28 15:18:36'),
(1828, '1', 'Vous avez enregistrée une maintenance de la période du 2024-09-04 au 2024-09-12 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-28 15:26:14', '2024-09-28 15:26:14'),
(1829, '1', 'Vous avez enregistrée une maintenance de la période du 2024-09-29 au 2024-09-26 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-28 15:45:04', '2024-09-28 15:45:04'),
(1830, '1', 'Vous avez enregistrée l\'action aaaassss pour l\'outil :BIC.', '', NULL, '2024-09-28 15:51:30', '2024-09-28 15:51:30'),
(1831, '1', 'Data ancien : {\"id\":1,\"outil\":2,\"maintenance\":13,\"etat\":\"Excellent\",\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|del|dsdsds|dsdsdsss|dsdsdsssss\",\"action\":1,\"created_at\":\"2024-09-28T16:26:14.000000Z\",\"updated_at\":\"2024-09-28T16:26:14.000000Z\"}', '', NULL, '2024-09-28 15:59:05', '2024-09-28 15:59:05'),
(1832, '1', 'Vous avez modifiée les informations de la période du 04 septembre 2024 au 12 septembre 2024 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-28 15:59:06', '2024-09-28 15:59:06'),
(1833, '1', 'Data ancien : {\"id\":3,\"outil\":6,\"maintenance\":18,\"etat\":\"Passable\",\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|udp\",\"action\":1,\"created_at\":\"2024-09-28T16:50:52.000000Z\",\"updated_at\":\"2024-09-28T16:50:52.000000Z\"}', '', NULL, '2024-09-28 15:59:26', '2024-09-28 15:59:26'),
(1834, '1', 'Data ancien : {\"id\":1,\"outil\":2,\"maintenance\":13,\"etat\":\"Excellent\",\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad|del|dsdsds|dsdsdsss|dsdsdsssss\",\"action\":1,\"created_at\":\"2024-09-28T16:26:14.000000Z\",\"updated_at\":\"2024-09-28T16:59:05.000000Z\"}', '', NULL, '2024-09-28 16:01:10', '2024-09-28 16:01:10'),
(1835, '1', 'Vous avez modifiée les informations de la période du 04 septembre 2024 au 12 septembre 2024 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-28 16:01:10', '2024-09-28 16:01:10'),
(1836, '1', 'Data ancien : {\"id\":1,\"outil\":2,\"maintenance\":13,\"etat\":\"Excellent\",\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad|del|dsdsds|dsdsdsss|dsdsdsssss\",\"action\":1,\"created_at\":\"2024-09-28T16:26:14.000000Z\",\"updated_at\":\"2024-09-28T17:01:10.000000Z\"}', '', NULL, '2024-09-28 16:01:26', '2024-09-28 16:01:26'),
(1837, '1', 'Vous avez modifiée les informations de la période du 04 septembre 2024 au 12 septembre 2024 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-28 16:01:26', '2024-09-28 16:01:26'),
(1838, '1', 'Data ancien : {\"id\":1,\"outil\":2,\"maintenance\":13,\"etat\":\"Excellent\",\"commentaireinf\":\"ghhg\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad|del|dsdsds|dsdsdsss|dsdsdsssss\",\"action\":1,\"created_at\":\"2024-09-28T16:26:14.000000Z\",\"updated_at\":\"2024-09-28T17:01:26.000000Z\"}', '', NULL, '2024-09-28 16:01:39', '2024-09-28 16:01:39'),
(1839, '1', 'Vous avez modifiée les informations de la période du 04 septembre 2024 au 12 septembre 2024 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-28 16:01:39', '2024-09-28 16:01:39'),
(1840, '1', 'Data delete : {\"id\":2,\"user\":1,\"reference\":null,\"dateacquisition\":null,\"nameoutils\":\"Ordinateur\",\"categorie\":2,\"otherjson\":\"{\\\"m\\\": \\\"20\\\", \\\"momo\\\": \\\"KANTHS Toussaint\\\", \\\"tdpa\\\": \\\"cc\\\", \\\"delor\\\": \\\"cc\\\", \\\"mptut\\\": \\\"VV\\\", \\\"other\\\": \\\"\\\", \\\"squdu\\\": \\\"5\\\", \\\"steee\\\": \\\"c\\\", \\\"crooft\\\": \\\"cc\\\", \\\"oceseu\\\": \\\"c\\\"}\",\"etat\":\"Autres\",\"action\":1,\"created_at\":\"2023-08-31T19:34:48.000000Z\",\"updated_at\":\"2024-09-25T17:52:07.000000Z\"}', '', NULL, '2024-09-28 16:28:46', '2024-09-28 16:28:46'),
(1841, '1', 'Data delete : {\"id\":6,\"user\":1,\"reference\":null,\"dateacquisition\":null,\"nameoutils\":\"LETTET\",\"categorie\":4,\"otherjson\":\"{\\\"mer\\\": \\\"61505124\\\", \\\"opro\\\": \\\"Emmanuel\\\", \\\"teel\\\": \\\"2024-06-12\\\", \\\"other\\\": \\\"\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2024-06-12T19:56:26.000000Z\",\"updated_at\":\"2024-07-09T23:19:48.000000Z\"}', '', NULL, '2024-09-28 16:31:51', '2024-09-28 16:31:51'),
(1842, '1', 'Incident supprimé : {\"id\":211,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"25-09-2024 18:20:19\",\"Module\":\"Excel\",\"description\":\"hhsfgsfgsgf\",\"cat\":3,\"hierarchie\":2,\"piece\":\"\",\"etat\":3,\"resolue\":null,\"avis\":\"Excellent\",\"sugg\":null,\"DateResolue\":\"2024-09-25 18:20:50\",\"affecter\":null,\"statut\":1,\"action\":null,\"created_at\":\"2024-09-25T18:20:19.000000Z\",\"updated_at\":\"2024-09-25T17:28:06.000000Z\"}', NULL, NULL, '2024-09-28 16:43:48', '2024-09-28 16:43:48'),
(1843, '1', 'Vous avez enregistrée l\'outil Cotrole .', '', NULL, '2024-09-28 16:47:54', '2024-09-28 16:47:54'),
(1844, '1', 'Vous avez affecter `Cotrole` à l\'utilisateur DJIDAGBAGBA S T Emmanuel', 'outil', 9, '2024-09-28 16:48:31', '2024-09-28 16:48:31'),
(1845, '1', 'Vous avez programmer une maintenance pour la période du 27 septembre 2024 au 28 septembre 2024 .', '', NULL, '2024-09-28 16:49:21', '2024-09-28 16:49:21'),
(1846, '1', 'Vous avez enregistrée une maintenance de la période du 2024-09-27 au 2024-09-28 sur l\'ordinateur CRAYON.', '', NULL, '2024-09-28 17:15:02', '2024-09-28 17:15:02'),
(1847, '1', 'Data ancien : {\"id\":5,\"outil\":8,\"maintenance\":19,\"etat\":\"Excellent\",\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad|del|dsdsdsssss\",\"action\":1,\"created_at\":\"2024-09-28T18:15:02.000000Z\",\"updated_at\":\"2024-09-28T18:15:02.000000Z\"}', '', NULL, '2024-09-28 17:15:17', '2024-09-28 17:15:17'),
(1848, '1', 'Vous avez modifiée les informations de la période du 27 septembre 2024 au 28 septembre 2024 sur l\'ordinateur CRAYON.', '', NULL, '2024-09-28 17:15:17', '2024-09-28 17:15:17'),
(1849, '1', 'Data ancien : {\"id\":5,\"outil\":8,\"maintenance\":19,\"etat\":\"Excellent\",\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad|del|dsdsds|dsdsdsssss\",\"action\":1,\"created_at\":\"2024-09-28T18:15:02.000000Z\",\"updated_at\":\"2024-09-28T18:15:17.000000Z\"}', '', NULL, '2024-09-28 17:15:27', '2024-09-28 17:15:27'),
(1850, '1', 'Vous avez modifiée les informations de la période du 27 septembre 2024 au 28 septembre 2024 sur l\'ordinateur CRAYON.', '', NULL, '2024-09-28 17:15:27', '2024-09-28 17:15:27'),
(1851, '1', 'Vous avez enregistrée l\'action azerty pour l\'outil :Ordinateurs.', '', NULL, '2024-09-28 17:38:15', '2024-09-28 17:38:15'),
(1852, '1', 'Vous avez enregistrée l\'action azerty pour l\'outil :Ordinateurs.', '', NULL, '2024-09-28 17:39:53', '2024-09-28 17:39:53'),
(1853, '1', 'Vous avez enregistrée l\'action azertys pour l\'outil :Ordinateurs.', '', NULL, '2024-09-28 17:41:12', '2024-09-28 17:41:12'),
(1854, '1', 'Vous avez programmer une maintenance pour la période du 30 septembre 2024 au 01 octobre 2024 .', '', NULL, '2024-09-28 17:42:07', '2024-09-28 17:42:07'),
(1855, '1', 'Vous avez enregistrée l\'outil Ordinateur .', '', NULL, '2024-09-28 17:46:34', '2024-09-28 17:46:34');
INSERT INTO `traces` (`id`, `action`, `libelle`, `type`, `idsec`, `created_at`, `updated_at`) VALUES
(1856, '1', 'Vous avez enregistrée une maintenance de la période du 2024-09-30 au 2024-10-01 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-28 17:50:24', '2024-09-28 17:50:24'),
(1857, '1', 'Data ancien : {\"id\":1,\"outil\":1,\"maintenance\":1,\"etat\":\"M\\u00e9diocre\",\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|adds\",\"action\":1,\"created_at\":\"2024-09-28T18:50:24.000000Z\",\"updated_at\":\"2024-09-28T18:50:24.000000Z\"}', '', NULL, '2024-09-28 17:50:36', '2024-09-28 17:50:36'),
(1858, '1', 'Vous avez modifiée les informations de la période du 30 septembre 2024 au 01 octobre 2024 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-28 17:50:36', '2024-09-28 17:50:36'),
(1859, '1', 'Vous avez affecter `Ordinateur` à l\'utilisateur DJIDAGBAGBA S T Emmanuel', 'outil', 1, '2024-09-28 17:56:10', '2024-09-28 17:56:10'),
(1860, '1', 'Vous avez enregistrée l\'action qsdfggh pour l\'outil :SIM.', '', NULL, '2024-09-28 17:57:31', '2024-09-28 17:57:31'),
(1861, '1', 'Vous avez enregistrée l\'action qsdfgghf pour l\'outil :SIM.', '', NULL, '2024-09-28 17:57:41', '2024-09-28 17:57:41'),
(1862, '1', 'Vous avez enregistrée l\'action dqddsd pour l\'outil :Maison.', '', NULL, '2024-09-28 17:59:07', '2024-09-28 17:59:07'),
(1863, '1', 'Vous avez enregistrée l\'action dqddsd pour l\'outil :BIC.', '', NULL, '2024-09-28 17:59:20', '2024-09-28 17:59:20'),
(1864, '1', 'Data ancien : {\"id\":1,\"outil\":1,\"maintenance\":1,\"etat\":\"M\\u00e9diocre\",\"commentaireinf\":\"oo\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|adds\",\"action\":1,\"created_at\":\"2024-09-28T18:50:24.000000Z\",\"updated_at\":\"2024-09-28T18:50:36.000000Z\"}', '', NULL, '2024-09-28 17:59:47', '2024-09-28 17:59:47'),
(1865, '1', 'Vous avez modifiée les informations de la période du 30 septembre 2024 au 01 octobre 2024 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-28 17:59:47', '2024-09-28 17:59:47'),
(1866, '1', 'Vous avez programmer une maintenance pour la période du 01 octobre 2024 au 02 octobre 2024 .', '', NULL, '2024-09-28 18:00:19', '2024-09-28 18:00:19'),
(1867, '1', 'Vous avez enregistrée l\'outil dzdzdzz .', '', NULL, '2024-09-28 18:02:02', '2024-09-28 18:02:02'),
(1868, '1', 'Vous avez affecter `dzdzdzz` à l\'utilisateur TEST Dado', 'outil', 2, '2024-09-28 18:09:11', '2024-09-28 18:09:11'),
(1869, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 30-09-2024 à 09:05:53', '', NULL, '2024-09-30 08:05:53', '2024-09-30 08:05:53'),
(1870, '1', 'Le compte de l\'utilisateur TEST est activé avec succès pour recevoir les incidents déclarer.', '', NULL, '2024-09-30 08:08:42', '2024-09-30 08:08:42'),
(1871, '1', 'Vous avez désactivé le compte de l\'utilisateur SUPER et dont l\'identifiant est superadmin.', '', NULL, '2024-09-30 08:09:04', '2024-09-30 08:09:04'),
(1872, '1', 'Le compte de l\'utilisateur SUPER est désactivé avec succès de la liste des destinaires à recevoir les incidents déclarer.', '', NULL, '2024-09-30 08:09:08', '2024-09-30 08:09:08'),
(1873, '1', 'Vous avez activé le compte de l\'utilisateur SUPER et dont l\'identifiant est superadmin.', '', NULL, '2024-09-30 08:09:20', '2024-09-30 08:09:20'),
(1874, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 30-09-2024 à 11:17:19', '', NULL, '2024-09-30 10:17:19', '2024-09-30 10:17:19'),
(1875, '1', 'Data delete GM : {\"id\":1,\"outil\":1,\"maintenance\":1,\"etat\":\"Excellent\",\"commentaireinf\":\"oo\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad|adds\",\"action\":1,\"created_at\":\"2024-09-28T18:50:24.000000Z\",\"updated_at\":\"2024-09-28T18:59:47.000000Z\"}', '', NULL, '2024-09-30 10:23:59', '2024-09-30 10:23:59'),
(1876, '1', 'Vous avez enregistrer une maintenance curative pour la période du 30 septembre 2024 au 01 octobre 2024 .', '', NULL, '2024-09-30 11:00:03', '2024-09-30 11:00:03'),
(1877, '1', 'Data existant : {\"id\":7,\"periodedebut\":\"2024-09-30\",\"periodefin\":\"2024-10-01\",\"user\":31,\"diagnostique\":\"gdhdfjh\",\"cause\":\"dfgdhqj\",\"resultat\":\"dgfihdgfdkjf\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-09-30T12:00:03.000000Z\",\"updated_at\":\"2024-09-30T12:00:03.000000Z\"}', '', NULL, '2024-09-30 11:23:56', '2024-09-30 11:23:56'),
(1878, '1', 'Vous avez défini l\'état de la maintenance curative de la période du `2024-09-30 au 2024-10-01` à BON``. <br> Aucun', '', NULL, '2024-09-30 11:23:56', '2024-09-30 11:23:56'),
(1879, '1', 'Data ancien : {\"id\":7,\"periodedebut\":\"2024-09-30\",\"periodefin\":\"2024-10-01\",\"user\":31,\"diagnostique\":\"gdhdfjh\",\"cause\":\"dfgdhqj\",\"resultat\":\"dgfihdgfdkjf\",\"etat\":\"BON\",\"commentaire\":\"Aucun\",\"action\":1,\"created_at\":\"2024-09-30T12:00:03.000000Z\",\"updated_at\":\"2024-09-30T12:23:56.000000Z\"}', '', NULL, '2024-09-30 11:41:44', '2024-09-30 11:41:44'),
(1880, '1', 'Vous avez modifiée les informations de la période de 2024-09-30 au 2024-10-01  en 2024-09-30 au 2024-10-01', '', NULL, '2024-09-30 11:41:44', '2024-09-30 11:41:44'),
(1881, '1', 'Data delete M : {\"id\":7,\"periodedebut\":\"2024-09-30\",\"periodefin\":\"2024-10-01\",\"user\":1,\"diagnostique\":\"Ecran bleu de la mort\",\"cause\":\"Ram\",\"resultat\":\"Ach\\u00e2t d\'une nouvelle Ram\",\"etat\":\"BON\",\"commentaire\":\"Aucun\",\"action\":1,\"created_at\":\"2024-09-30T12:00:03.000000Z\",\"updated_at\":\"2024-09-30T12:41:44.000000Z\"}', '', NULL, '2024-09-30 11:53:15', '2024-09-30 11:53:15'),
(1882, '1', 'Vous avez enregistrée une maintenance de la période du 2024-09-30 au 2024-10-01 sur l\'ordinateur Ordinateur.', '', NULL, '2024-09-30 11:55:18', '2024-09-30 11:55:18'),
(1883, '1', 'Vous avez enregistrer une maintenance curative pour la période du 30 septembre 2024 au 30 septembre 2024 .', '', NULL, '2024-09-30 11:57:51', '2024-09-30 11:57:51'),
(1884, '1', 'Data ancien : {\"id\":8,\"periodedebut\":\"2024-09-30\",\"periodefin\":\"2024-09-30\",\"user\":31,\"diagnostique\":\"DEHJEGE\",\"cause\":\"skfvfslgvs\",\"resultat\":\"dbkbdsggsfdih\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-09-30T12:57:51.000000Z\",\"updated_at\":\"2024-09-30T12:57:51.000000Z\"}', '', NULL, '2024-09-30 11:58:15', '2024-09-30 11:58:15'),
(1885, '1', 'Vous avez modifiée les informations de la période de 2024-09-30 au 2024-09-30  en 2024-09-30 au 2024-09-30', '', NULL, '2024-09-30 11:58:15', '2024-09-30 11:58:15'),
(1886, '1', 'Data ancien : {\"id\":8,\"periodedebut\":\"2024-09-30\",\"periodefin\":\"2024-09-30\",\"user\":31,\"diagnostique\":\"DEHJEGE\",\"cause\":\"skfvfslgvs\",\"resultat\":\"dbkbdsggsfdih\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-09-30T12:57:51.000000Z\",\"updated_at\":\"2024-09-30T12:58:15.000000Z\"}', '', NULL, '2024-09-30 11:59:59', '2024-09-30 11:59:59'),
(1887, '1', 'Vous avez modifiée les informations de la période de 30 septembre 2024 au 30 septembre 2024  en 30 septembre 2024 au 30 septembre 2024', '', NULL, '2024-09-30 11:59:59', '2024-09-30 11:59:59'),
(1888, '1', 'Data ancien : {\"id\":8,\"periodedebut\":\"2024-09-30\",\"periodefin\":\"2024-09-30\",\"user\":31,\"diagnostique\":\"DEHJEGE\",\"cause\":\"skfvfslgvs\",\"resultat\":\"dbkbdsggsfdih\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-09-30T12:57:51.000000Z\",\"updated_at\":\"2024-09-30T12:59:59.000000Z\"}', '', NULL, '2024-09-30 12:00:23', '2024-09-30 12:00:23'),
(1889, '1', 'Vous avez modifiée les informations de la période de 30 septembre 2024 au 30 septembre 2024  en 02 octobre 2024 au 04 octobre 2024', '', NULL, '2024-09-30 12:00:23', '2024-09-30 12:00:23'),
(1890, '1', 'Data delete M : {\"id\":8,\"periodedebut\":\"2024-10-02\",\"periodefin\":\"2024-10-04\",\"user\":31,\"diagnostique\":\"DEHJEGE\",\"cause\":\"skfvfslgvs\",\"resultat\":\"dbkbdsggsfdih\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-09-30T12:57:51.000000Z\",\"updated_at\":\"2024-09-30T13:00:23.000000Z\"}', '', NULL, '2024-09-30 12:00:45', '2024-09-30 12:00:45'),
(1891, '1', 'Vous avez enregistrer une maintenance curative pour la période du 05 novembre 2024 au 12 décembre 2024 .', '', NULL, '2024-09-30 12:01:24', '2024-09-30 12:01:24'),
(1892, '1', 'Vous avez enregistrée l\'exécution de la maintenance curative de la période du 2024-11-05 au 2024-12-12 sur l\'outil Ordinateur.', '', NULL, '2024-09-30 12:41:38', '2024-09-30 12:41:38'),
(1893, '1', 'Vous avez enregistrée l\'exécution de la maintenance curative de la période du 05 novembre 2024 au 12 décembre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-09-30 13:50:55', '2024-09-30 13:50:55'),
(1894, '1', 'Data ancien : {\"id\":1,\"outil\":1,\"maintenance\":9,\"etat\":\"Passable\",\"commentaireinf\":\"ffhhh\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"hhkjgjg\",\"action\":1,\"created_at\":\"2024-09-30T14:50:55.000000Z\",\"updated_at\":\"2024-09-30T14:50:55.000000Z\"}', '', NULL, '2024-09-30 14:05:12', '2024-09-30 14:05:12'),
(1895, '1', 'Data ancien : {\"id\":1,\"outil\":1,\"maintenance\":9,\"etat\":\"Passable\",\"commentaireinf\":\"ffhhh\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"hhkjgjg\",\"action\":1,\"created_at\":\"2024-09-30T14:50:55.000000Z\",\"updated_at\":\"2024-09-30T14:50:55.000000Z\"}', '', NULL, '2024-09-30 14:05:48', '2024-09-30 14:05:48'),
(1896, '1', 'Data ancien : {\"id\":1,\"outil\":1,\"maintenance\":9,\"etat\":\"Passable\",\"commentaireinf\":\"ffhhh\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"hhkjgjg\",\"action\":1,\"created_at\":\"2024-09-30T14:50:55.000000Z\",\"updated_at\":\"2024-09-30T14:50:55.000000Z\"}', '', NULL, '2024-09-30 14:06:23', '2024-09-30 14:06:23'),
(1897, '1', 'Data ancien : {\"id\":1,\"outil\":1,\"maintenance\":9,\"etat\":\"Passable\",\"commentaireinf\":\"ffhhh\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"hhkjgjg\",\"action\":1,\"created_at\":\"2024-09-30T14:50:55.000000Z\",\"updated_at\":\"2024-09-30T14:50:55.000000Z\"}', '', NULL, '2024-09-30 14:10:09', '2024-09-30 14:10:09'),
(1898, '1', 'Vous avez modifiée les informations de la période du 05 novembre 2024 au 12 décembre 2024 sur l\'outils Ordinateur.', '', NULL, '2024-09-30 14:10:09', '2024-09-30 14:10:09'),
(1899, '1', 'Data delete GM : {\"id\":1,\"outil\":1,\"maintenance\":9,\"etat\":\"Passable\",\"commentaireinf\":\"ffhhh\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"AZERTY\",\"action\":1,\"created_at\":\"2024-09-30T14:50:55.000000Z\",\"updated_at\":\"2024-09-30T15:10:09.000000Z\"}', '', NULL, '2024-09-30 14:17:07', '2024-09-30 14:17:07'),
(1900, '1', 'Vous avez enregistrée l\'exécution de la maintenance curative de la période du 05 novembre 2024 au 12 décembre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-09-30 14:17:33', '2024-09-30 14:17:33'),
(1901, '1', 'Data ancien : {\"id\":2,\"outil\":1,\"maintenance\":9,\"etat\":\"M\\u00e9diocre\",\"commentaireinf\":\"fgsgfsgf\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"degdsgsgsfh\",\"action\":1,\"created_at\":\"2024-09-30T15:17:33.000000Z\",\"updated_at\":\"2024-09-30T15:17:33.000000Z\"}', '', NULL, '2024-09-30 14:17:51', '2024-09-30 14:17:51'),
(1902, '1', 'Vous avez modifiée les informations de la période du 05 novembre 2024 au 12 décembre 2024 sur l\'outils Ordinateur.', '', NULL, '2024-09-30 14:17:51', '2024-09-30 14:17:51'),
(1903, '1', 'Data delete M : {\"id\":9,\"periodedebut\":\"2024-11-05\",\"periodefin\":\"2024-12-12\",\"user\":31,\"diagnostique\":\"dfsfgs\",\"cause\":\"fzfdzfd\",\"resultat\":\"dfcdvdvd\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-09-30T13:01:24.000000Z\",\"updated_at\":\"2024-09-30T13:01:24.000000Z\"}', '', NULL, '2024-09-30 14:18:16', '2024-09-30 14:18:16'),
(1904, '1', 'Data delete GM : {\"id\":2,\"outil\":1,\"maintenance\":9,\"etat\":\"Excellent\",\"commentaireinf\":\"fgsgfsgf\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"degdsgsgsfh\",\"action\":1,\"created_at\":\"2024-09-30T15:17:33.000000Z\",\"updated_at\":\"2024-09-30T15:17:51.000000Z\"}', '', NULL, '2024-09-30 14:18:31', '2024-09-30 14:18:31'),
(1905, '1', 'Vous avez enregistrer une maintenance curative pour la période du 27 septembre 2024 au 30 septembre 2024 .', '', NULL, '2024-09-30 14:23:53', '2024-09-30 14:23:53'),
(1906, '1', 'Vous avez enregistrée l\'exécution de la maintenance curative de la période du 27 septembre 2024 au 30 septembre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-09-30 14:24:13', '2024-09-30 14:24:13'),
(1907, '1', 'Data delete MC : {\"id\":10,\"periodedebut\":\"2024-09-27\",\"periodefin\":\"2024-09-30\",\"user\":31,\"diagnostique\":\"QSQKDKHHVDH\",\"cause\":\"fdhbfvqkhdkh\",\"resultat\":\"bhdbvjdjb\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-09-30T15:23:53.000000Z\",\"updated_at\":\"2024-09-30T15:23:53.000000Z\"}', '', NULL, '2024-09-30 14:24:36', '2024-09-30 14:24:36'),
(1908, '1', 'Data delete GMC : null', '', NULL, '2024-09-30 14:24:36', '2024-09-30 14:24:36'),
(1909, '1', 'Vous avez enregistrer une maintenance curative pour la période du 24 septembre 2024 au 26 septembre 2024 .', '', NULL, '2024-09-30 14:26:12', '2024-09-30 14:26:12'),
(1910, '1', 'Data delete GMC : {\"id\":3,\"outil\":1,\"maintenance\":10,\"etat\":\"M\\u00e9diocre\",\"commentaireinf\":\"kfgufgfff\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"cfyfuf\",\"action\":1,\"created_at\":\"2024-09-30T15:24:13.000000Z\",\"updated_at\":\"2024-09-30T15:24:13.000000Z\"}', '', NULL, '2024-09-30 14:26:26', '2024-09-30 14:26:26'),
(1911, '1', 'Vous avez enregistrée l\'exécution de la maintenance curative de la période du 24 septembre 2024 au 26 septembre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-09-30 14:26:50', '2024-09-30 14:26:50'),
(1912, '1', 'Data delete MC : {\"id\":11,\"periodedebut\":\"2024-09-24\",\"periodefin\":\"2024-09-26\",\"user\":32,\"diagnostique\":\"fgqfkb\",\"cause\":\"hxghfxhfj\",\"resultat\":\"dfydydjh\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-09-30T15:26:12.000000Z\",\"updated_at\":\"2024-09-30T15:26:12.000000Z\"}', '', NULL, '2024-09-30 14:27:32', '2024-09-30 14:27:32'),
(1913, '1', 'Data delete GMC : null', '', NULL, '2024-09-30 14:27:33', '2024-09-30 14:27:33'),
(1914, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 01-10-2024 à 08:55:24', '', NULL, '2024-10-01 07:55:24', '2024-10-01 07:55:24'),
(1915, '1', 'Data delete M : {\"id\":1,\"periodedebut\":\"2024-09-30\",\"periodefin\":\"2024-10-01\",\"etat\":null,\"commentaire\":null,\"user\":31,\"action\":1,\"created_at\":\"2024-09-28T18:42:07.000000Z\",\"updated_at\":\"2024-09-28T18:42:07.000000Z\"}', '', NULL, '2024-10-01 08:12:33', '2024-10-01 08:12:33'),
(1916, '1', 'Data delete GM : {\"id\":2,\"outil\":1,\"maintenance\":1,\"etat\":\"Bien\",\"commentaireinf\":\"kk\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":null,\"action\":1,\"created_at\":\"2024-09-30T12:55:18.000000Z\",\"updated_at\":\"2024-09-30T12:55:18.000000Z\"}', '', NULL, '2024-10-01 08:12:33', '2024-10-01 08:12:33'),
(1917, '1', 'Vous avez enregistrer une maintenance curative pour la période du 01 octobre 2024 au 02 octobre 2024 .', '', NULL, '2024-10-01 08:23:27', '2024-10-01 08:23:27'),
(1918, '1', 'Vous avez enregistrée l\'exécution de la maintenance curative de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-10-01 08:24:49', '2024-10-01 08:24:49'),
(1919, '1', 'Vous avez modifié l\'hierarchie Gênants .', '', NULL, '2024-10-01 08:25:49', '2024-10-01 08:25:49'),
(1920, '1', 'Vous avez modifié l\'hierarchie Bloquants .', '', NULL, '2024-10-01 08:28:29', '2024-10-01 08:28:29'),
(1921, '1', 'Hierarchie supprimé : {\"id\":4,\"action\":\"1\",\"libelle\":\"Confort\",\"created_at\":\"2022-06-14T11:34:38.000000Z\",\"updated_at\":\"2022-06-14T11:34:38.000000Z\"}', NULL, NULL, '2024-10-01 08:28:35', '2024-10-01 08:28:35'),
(1922, '1', 'Data delete GMC : {\"id\":6,\"outil\":2,\"maintenance\":12,\"etat\":\"Passable\",\"commentaireinf\":\"shjgjd\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"ssghgs\",\"action\":1,\"created_at\":\"2024-10-01T09:34:33.000000Z\",\"updated_at\":\"2024-10-01T09:34:33.000000Z\"}', '', NULL, '2024-10-01 08:46:25', '2024-10-01 08:46:25'),
(1923, '1', 'Vous avez enregistrée la Catégorie d\'outil Imprimante .', '', NULL, '2024-10-01 09:06:18', '2024-10-01 09:06:18'),
(1924, '1', 'Vous avez enregistrée le champ suivant Imprimante dans la catégorie Imprimante .', '', NULL, '2024-10-01 09:06:37', '2024-10-01 09:06:37'),
(1925, '1', 'Vous avez enregistrée le champ suivant Types dans la catégorie Types .', '', NULL, '2024-10-01 09:06:48', '2024-10-01 09:06:48'),
(1926, '1', 'Vous avez enregistrée le champ suivant Numero de serie dans la catégorie Numero de serie .', '', NULL, '2024-10-01 09:07:06', '2024-10-01 09:07:06'),
(1927, '1', 'Vous avez enregistrée l\'outil Photocopieuse .', '', NULL, '2024-10-01 09:08:07', '2024-10-01 09:08:07'),
(1928, '1', 'Data delete : {\"id\":2,\"user\":31,\"reference\":\"dSFQS\",\"dateacquisition\":\"2024-09-27\",\"nameoutils\":\"dzdzdzz\",\"categorie\":3,\"otherjson\":\"{\\\"other\\\":\\\"\\\",\\\"mer\\\":\\\"32556656\\\",\\\"opro\\\":\\\"jhjhj\\\",\\\"teel\\\":\\\"2024-09-27\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2024-09-28T19:02:02.000000Z\",\"updated_at\":\"2024-09-28T19:09:11.000000Z\"}', '', NULL, '2024-10-01 09:08:24', '2024-10-01 09:08:24'),
(1929, '1', 'Vous avez affecter `Photocopieuse` à l\'utilisateur TEST Dado', 'outil', 3, '2024-10-01 09:08:36', '2024-10-01 09:08:36'),
(1930, '1', 'Data delete GMC : {\"id\":7,\"outil\":2,\"maintenance\":12,\"etat\":\"Bien\",\"commentaireinf\":\"vjfgf\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"ghgghjgh\",\"action\":1,\"created_at\":\"2024-10-01T09:50:41.000000Z\",\"updated_at\":\"2024-10-01T09:50:41.000000Z\"}', '', NULL, '2024-10-01 09:09:28', '2024-10-01 09:09:28'),
(1931, '1', 'Data delete GMC : {\"id\":8,\"outil\":3,\"maintenance\":12,\"etat\":\"Bien\",\"commentaireinf\":\"Bon a travailler\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"Entretients\",\"action\":1,\"created_at\":\"2024-10-01T10:09:58.000000Z\",\"updated_at\":\"2024-10-01T10:09:58.000000Z\"}', '', NULL, '2024-10-01 09:10:17', '2024-10-01 09:10:17'),
(1932, '1', 'Data delete GMC : {\"id\":9,\"outil\":3,\"maintenance\":12,\"etat\":\"Bien\",\"commentaireinf\":\"Bon a travailler\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"Entretients\",\"action\":1,\"created_at\":\"2024-10-01T10:10:34.000000Z\",\"updated_at\":\"2024-10-01T10:10:34.000000Z\"}', '', NULL, '2024-10-01 09:20:17', '2024-10-01 09:20:17'),
(1933, '1', 'Vous avez enregistrée l\'exécution de la maintenance curative de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Photocopieuse', '', NULL, '2024-10-01 09:20:47', '2024-10-01 09:20:47'),
(1934, '1', 'Vous avez enregistrée une maintenance de la période du 2024-10-01 au 2024-10-02 sur l\'ordinateur Ordinateur.', '', NULL, '2024-10-01 09:33:37', '2024-10-01 09:33:37'),
(1935, '1', 'Vous avez retiré `Photocopieuse` à TEST Dado et l’avez réaffecté à SUPER ADMIN', 'outil', 3, '2024-10-01 10:00:14', '2024-10-01 10:00:14'),
(1936, '1', 'Vous avez retiré `Photocopieuse` à SUPER ADMIN et l’avez réaffecté à TEST Dado', 'outil', 3, '2024-10-01 10:00:42', '2024-10-01 10:00:42'),
(1937, '1', 'Data delete GMC : {\"id\":10,\"outil\":3,\"maintenance\":12,\"etat\":\"Passable\",\"commentaireinf\":\"Pi\\u00e8ce a changer\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"Entretients\",\"action\":1,\"created_at\":\"2024-10-01T10:20:47.000000Z\",\"updated_at\":\"2024-10-01T10:20:47.000000Z\"}', '', NULL, '2024-10-01 10:27:11', '2024-10-01 10:27:11'),
(1938, '1', 'Data delete GMC : {\"id\":5,\"outil\":1,\"maintenance\":12,\"etat\":\"Passable\",\"commentaireinf\":\"ddddd\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"AZEZRZZZ\",\"action\":1,\"created_at\":\"2024-10-01T09:24:49.000000Z\",\"updated_at\":\"2024-10-01T09:24:49.000000Z\"}', '', NULL, '2024-10-01 10:27:18', '2024-10-01 10:27:18'),
(1939, '1', 'Vous avez enregistrée l\'exécution de la maintenance curative de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Photocopieuse', '', NULL, '2024-10-01 10:27:32', '2024-10-01 10:27:32'),
(1940, '1', 'Vous avez enregistrée l\'exécution de la maintenance curative de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Ordinateur', '', NULL, '2024-10-01 10:27:45', '2024-10-01 10:27:45'),
(1941, '1', 'Data delete GM : {\"id\":5,\"outil\":3,\"maintenance\":2,\"etat\":\"Excellent\",\"commentaireinf\":\"225\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":null,\"action\":1,\"created_at\":\"2024-10-01T11:26:21.000000Z\",\"updated_at\":\"2024-10-01T11:26:21.000000Z\"}', '', NULL, '2024-10-01 10:28:30', '2024-10-01 10:28:30'),
(1942, '1', 'Vous avez enregistrée une maintenance de la période du 2024-10-01 au 2024-10-02 sur l\'ordinateur Photocopieuse.', '', NULL, '2024-10-01 10:28:44', '2024-10-01 10:28:44'),
(1943, '1', 'Vous avez retiré `Photocopieuse` à DJIDAGBAGBA S T Emmanuel et l’avez réaffecté à TEST Dado', 'outil', 3, '2024-10-01 10:29:45', '2024-10-01 10:29:45'),
(1944, '1', 'Vous avez enregistrer une maintenance curative pour la période du 10 octobre 2024 au 17 octobre 2024 .', '', NULL, '2024-10-01 11:02:19', '2024-10-01 11:02:19'),
(1945, '1', 'Vous avez enregistrée l\'exécution de la maintenance curative de la période du 10 octobre 2024 au 17 octobre 2024 sur l\'outil Ordinateur', '', NULL, '2024-10-01 11:02:58', '2024-10-01 11:02:58'),
(1946, '1', 'Vous avez retiré `Ordinateur` à DJIDAGBAGBA S T Emmanuel et l’avez réaffecté à SUPER ADMIN', 'outil', 1, '2024-10-01 11:05:42', '2024-10-01 11:05:42'),
(1947, '1', 'Data existant : {\"id\":13,\"periodedebut\":\"2024-10-10\",\"periodefin\":\"2024-10-17\",\"user\":31,\"diagnostique\":\"Mise a jour\",\"cause\":\"Virus\",\"resultat\":\"Op\\u00e9rationnelle\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-10-01T12:02:19.000000Z\",\"updated_at\":\"2024-10-01T12:02:19.000000Z\"}', '', NULL, '2024-10-01 11:07:00', '2024-10-01 11:07:00'),
(1948, '1', 'Vous avez défini l\'état de la maintenance curative de la période du `2024-10-10 au 2024-10-17` à BON``. <br> ccc', '', NULL, '2024-10-01 11:07:00', '2024-10-01 11:07:00'),
(1949, '1', 'Data ancien : {\"id\":12,\"outil\":1,\"maintenance\":12,\"etat\":\"Excellent\",\"commentaireinf\":\"hcjjjqdffh\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"ddhcfd\",\"action\":1,\"created_at\":\"2024-10-01T11:27:44.000000Z\",\"updated_at\":\"2024-10-01T11:27:44.000000Z\"}', '', NULL, '2024-10-01 12:23:44', '2024-10-01 12:23:44'),
(1950, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outils Ordinateur.', '', NULL, '2024-10-01 12:23:44', '2024-10-01 12:23:44'),
(1951, '1', 'Vous avez enregistrée l\'action Ajouter pour l\'outil :Imprimante.', '', NULL, '2024-10-01 12:40:23', '2024-10-01 12:40:23'),
(1952, '1', 'Vous avez enregistrée l\'action Ajouters pour l\'outil :Imprimante.', '', NULL, '2024-10-01 12:40:29', '2024-10-01 12:40:29'),
(1953, '1', 'Vous avez enregistrée l\'action Modifier pour l\'outil :Imprimante.', '', NULL, '2024-10-01 12:40:39', '2024-10-01 12:40:39'),
(1954, '1', 'Data ancien : {\"id\":11,\"outil\":3,\"maintenance\":12,\"etat\":\"Excellent\",\"commentaireinf\":\"hcjjjqdffh\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"ddhcfd\",\"action\":1,\"created_at\":\"2024-10-01T11:27:32.000000Z\",\"updated_at\":\"2024-10-01T11:27:32.000000Z\"}', '', NULL, '2024-10-01 12:56:00', '2024-10-01 12:56:00'),
(1955, '1', 'Data ancien : {\"id\":6,\"outil\":3,\"maintenance\":2,\"etat\":\"Bien\",\"commentaireinf\":\"fghfskjgfgfsjghgj\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":null,\"action\":1,\"created_at\":\"2024-10-01T11:28:43.000000Z\",\"updated_at\":\"2024-10-01T11:28:43.000000Z\"}', '', NULL, '2024-10-01 13:06:21', '2024-10-01 13:06:21'),
(1956, '1', 'Data ancien : {\"id\":4,\"outil\":1,\"maintenance\":2,\"etat\":\"Passable\",\"commentaireinf\":\"Aucun\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad\",\"action\":1,\"created_at\":\"2024-10-01T10:33:37.000000Z\",\"updated_at\":\"2024-10-01T10:33:37.000000Z\"}', '', NULL, '2024-10-01 13:10:05', '2024-10-01 13:10:05'),
(1957, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'ordinateur Ordinateur.', '', NULL, '2024-10-01 13:10:06', '2024-10-01 13:10:06'),
(1958, '1', 'Data ancien : {\"id\":6,\"outil\":3,\"maintenance\":2,\"etat\":\"Bien\",\"commentaireinf\":\"fghfskjgfgfsjghgj\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad\",\"action\":1,\"created_at\":\"2024-10-01T11:28:43.000000Z\",\"updated_at\":\"2024-10-01T14:06:21.000000Z\"}', '', NULL, '2024-10-01 13:10:56', '2024-10-01 13:10:56'),
(1959, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'ordinateur Photocopieuse.', '', NULL, '2024-10-01 13:10:56', '2024-10-01 13:10:56'),
(1960, '1', 'Data ancien : {\"id\":6,\"outil\":3,\"maintenance\":2,\"etat\":\"Excellent\",\"commentaireinf\":\"4555555\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|adds|modif\",\"action\":1,\"created_at\":\"2024-10-01T11:28:43.000000Z\",\"updated_at\":\"2024-10-01T14:10:56.000000Z\"}', '', NULL, '2024-10-01 13:13:26', '2024-10-01 13:13:26'),
(1961, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'ordinateur Photocopieuse.', '', NULL, '2024-10-01 13:13:26', '2024-10-01 13:13:26'),
(1962, '1', 'Data ancien : {\"id\":6,\"outil\":3,\"maintenance\":2,\"etat\":\"Excellent\",\"commentaireinf\":\"4555555\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|adds|modif|adds|modif\",\"action\":1,\"created_at\":\"2024-10-01T11:28:43.000000Z\",\"updated_at\":\"2024-10-01T14:13:26.000000Z\"}', '', NULL, '2024-10-01 13:13:42', '2024-10-01 13:13:42'),
(1963, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'ordinateur Photocopieuse.', '', NULL, '2024-10-01 13:13:42', '2024-10-01 13:13:42'),
(1964, '1', 'Data ancien : {\"id\":12,\"outil\":1,\"maintenance\":12,\"etat\":\"Excellent\",\"commentaireinf\":\"tdyiddyditui\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"ddhcfd\",\"action\":1,\"created_at\":\"2024-10-01T11:27:44.000000Z\",\"updated_at\":\"2024-10-01T13:23:44.000000Z\"}', '', NULL, '2024-10-01 13:15:56', '2024-10-01 13:15:56'),
(1965, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outils Ordinateur.', '', NULL, '2024-10-01 13:15:56', '2024-10-01 13:15:56'),
(1966, '1', 'Data ancien : {\"id\":11,\"outil\":3,\"maintenance\":12,\"etat\":\"Bien\",\"commentaireinf\":\"hcjjjqdffh\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"ddhcfd\",\"action\":1,\"created_at\":\"2024-10-01T11:27:32.000000Z\",\"updated_at\":\"2024-10-01T13:56:00.000000Z\"}', '', NULL, '2024-10-01 13:16:11', '2024-10-01 13:16:11'),
(1967, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outils Photocopieuse.', '', NULL, '2024-10-01 13:16:11', '2024-10-01 13:16:11'),
(1968, '1', 'Data existant : {\"id\":2,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"2024-10-02\",\"etat\":null,\"commentaire\":null,\"user\":32,\"action\":1,\"created_at\":\"2024-09-28T19:00:19.000000Z\",\"updated_at\":\"2024-09-28T19:00:19.000000Z\"}', '', NULL, '2024-10-01 13:18:34', '2024-10-01 13:18:34'),
(1969, '1', 'Vous avez défini l\'état de la maintenance de la période du `2024-10-01 au 2024-10-02` à TRES BON``. <br> A verifier', '', NULL, '2024-10-01 13:18:35', '2024-10-01 13:18:35'),
(1970, '1', 'Data ancien : {\"id\":4,\"outil\":1,\"maintenance\":2,\"etat\":\"Passable\",\"commentaireinf\":\"AucuEFNLNFnfddlfnl\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad|adds\",\"action\":1,\"created_at\":\"2024-10-01T10:33:37.000000Z\",\"updated_at\":\"2024-10-01T14:10:06.000000Z\"}', '', NULL, '2024-10-01 13:19:08', '2024-10-01 13:19:08'),
(1971, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'ordinateur Ordinateur.', '', NULL, '2024-10-01 13:19:09', '2024-10-01 13:19:09'),
(1972, '1', 'Data ancien : {\"id\":4,\"outil\":1,\"maintenance\":2,\"etat\":\"Passable\",\"commentaireinf\":\"AucuEFNLNFnfddlfnl\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad\",\"action\":1,\"created_at\":\"2024-10-01T10:33:37.000000Z\",\"updated_at\":\"2024-10-01T14:19:08.000000Z\"}', '', NULL, '2024-10-01 13:19:43', '2024-10-01 13:19:43'),
(1973, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-10-01 13:19:43', '2024-10-01 13:19:43'),
(1974, '1', 'Data ancien : {\"id\":4,\"outil\":1,\"maintenance\":2,\"etat\":\"Passable\",\"commentaireinf\":\"AucuEFNLNFnfddlfnl\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":null,\"action\":1,\"created_at\":\"2024-10-01T10:33:37.000000Z\",\"updated_at\":\"2024-10-01T14:19:43.000000Z\"}', '', NULL, '2024-10-01 13:34:41', '2024-10-01 13:34:41'),
(1975, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-10-01 13:34:41', '2024-10-01 13:34:41'),
(1976, '1', 'Data ancien : {\"id\":6,\"outil\":3,\"maintenance\":2,\"etat\":\"M\\u00e9diocre\",\"commentaireinf\":\"4555555\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|adds|modif\",\"action\":1,\"created_at\":\"2024-10-01T11:28:43.000000Z\",\"updated_at\":\"2024-10-01T14:13:42.000000Z\"}', '', NULL, '2024-10-01 13:35:54', '2024-10-01 13:35:54'),
(1977, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Photocopieuse.', '', NULL, '2024-10-01 13:35:55', '2024-10-01 13:35:55'),
(1978, '1', 'Data ancien : {\"id\":4,\"outil\":1,\"maintenance\":2,\"etat\":\"Passable\",\"commentaireinf\":\"AucuEFNLNFnfddlfnl\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad|adds\",\"action\":1,\"created_at\":\"2024-10-01T10:33:37.000000Z\",\"updated_at\":\"2024-10-01T14:34:41.000000Z\"}', '', NULL, '2024-10-01 13:42:59', '2024-10-01 13:42:59'),
(1979, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-10-01 13:42:59', '2024-10-01 13:42:59'),
(1980, '1', 'Data ancien : {\"id\":4,\"outil\":1,\"maintenance\":2,\"etat\":\"Passable\",\"commentaireinf\":\"AucuEFNLNFnfddlfnl\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":null,\"action\":1,\"created_at\":\"2024-10-01T10:33:37.000000Z\",\"updated_at\":\"2024-10-01T14:42:59.000000Z\"}', '', NULL, '2024-10-01 13:43:34', '2024-10-01 13:43:34'),
(1981, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-10-01 13:43:34', '2024-10-01 13:43:34'),
(1982, '1', 'Data ancien : {\"id\":4,\"outil\":1,\"maintenance\":2,\"etat\":\"Passable\",\"commentaireinf\":\"AucuEFNLNFnfddlfnl\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|ad|adds\",\"action\":1,\"created_at\":\"2024-10-01T10:33:37.000000Z\",\"updated_at\":\"2024-10-01T14:43:34.000000Z\"}', '', NULL, '2024-10-01 13:43:42', '2024-10-01 13:43:42'),
(1983, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-10-01 13:43:42', '2024-10-01 13:43:42'),
(1984, '1', 'Data ancien : {\"id\":6,\"outil\":3,\"maintenance\":2,\"etat\":\"M\\u00e9diocre\",\"commentaireinf\":\"4555555\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|addss\",\"action\":1,\"created_at\":\"2024-10-01T11:28:43.000000Z\",\"updated_at\":\"2024-10-01T14:35:54.000000Z\"}', '', NULL, '2024-10-01 14:13:33', '2024-10-01 14:13:33'),
(1985, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Photocopieuse.', '', NULL, '2024-10-01 14:13:33', '2024-10-01 14:13:33'),
(1986, '1', 'Data ancien : {\"id\":2,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"2024-10-02\",\"etat\":\"TRES BON\",\"commentaire\":\"A verifier\",\"user\":32,\"action\":1,\"created_at\":\"2024-09-28T19:00:19.000000Z\",\"updated_at\":\"2024-10-01T14:18:35.000000Z\"}', '', NULL, '2024-10-01 14:15:28', '2024-10-01 14:15:28'),
(1987, '1', 'Vous avez modifiée les informations de la période de 2024-10-01 au 2024-10-02  en 2024-10-01 au 2024-10-02', '', NULL, '2024-10-01 14:15:28', '2024-10-01 14:15:28'),
(1988, '1', 'Data existant : {\"id\":12,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"2024-10-02\",\"user\":31,\"diagnostique\":\"dhgdhgf\",\"cause\":\"AEZEZRT\",\"resultat\":\"ghHEFE\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-10-01T09:23:27.000000Z\",\"updated_at\":\"2024-10-01T09:23:27.000000Z\"}', '', NULL, '2024-10-01 14:16:45', '2024-10-01 14:16:45'),
(1989, '1', 'Vous avez défini l\'état de la maintenance curative de la période du `2024-10-01 au 2024-10-02` à MAUVAISE``. <br> ', '', NULL, '2024-10-01 14:16:45', '2024-10-01 14:16:45'),
(1990, '1', 'Data existant : {\"id\":13,\"periodedebut\":\"2024-10-10\",\"periodefin\":\"2024-10-17\",\"user\":31,\"diagnostique\":\"Mise a jour\",\"cause\":\"Virus\",\"resultat\":\"Op\\u00e9rationnelle\",\"etat\":\"BON\",\"commentaire\":\"ccc\",\"action\":1,\"created_at\":\"2024-10-01T12:02:19.000000Z\",\"updated_at\":\"2024-10-01T12:07:00.000000Z\"}', '', NULL, '2024-10-01 14:43:46', '2024-10-01 14:43:46'),
(1991, '1', 'Vous avez défini l\'état de la maintenance curative de la période du `2024-10-10 au 2024-10-17` à Bien``. <br> ', '', NULL, '2024-10-01 14:43:46', '2024-10-01 14:43:46'),
(1992, '1', 'Data existant : {\"id\":12,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"2024-10-02\",\"user\":31,\"diagnostique\":\"dhgdhgf\",\"cause\":\"AEZEZRT\",\"resultat\":\"ghHEFE\",\"etat\":\"MAUVAISE\",\"commentaire\":null,\"action\":1,\"created_at\":\"2024-10-01T09:23:27.000000Z\",\"updated_at\":\"2024-10-01T15:16:45.000000Z\"}', '', NULL, '2024-10-01 14:44:02', '2024-10-01 14:44:02'),
(1993, '1', 'Vous avez défini l\'état de la maintenance curative de la période du `2024-10-01 au 2024-10-02` à Médiocre``. <br> ', '', NULL, '2024-10-01 14:44:02', '2024-10-01 14:44:02'),
(1994, '1', 'Data existant : {\"id\":12,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"2024-10-02\",\"user\":31,\"diagnostique\":\"dhgdhgf\",\"cause\":\"AEZEZRT\",\"resultat\":\"ghHEFE\",\"etat\":\"M\\u00e9diocre\",\"commentaire\":null,\"action\":1,\"created_at\":\"2024-10-01T09:23:27.000000Z\",\"updated_at\":\"2024-10-01T15:44:02.000000Z\"}', '', NULL, '2024-10-01 14:45:53', '2024-10-01 14:45:53'),
(1995, '1', 'Vous avez défini l\'état de la maintenance curative de la période du `2024-10-01 au 2024-10-02` à Défaillant``. <br> ', '', NULL, '2024-10-01 14:45:53', '2024-10-01 14:45:53'),
(1996, '1', 'Data existant : {\"id\":13,\"periodedebut\":\"2024-10-10\",\"periodefin\":\"2024-10-17\",\"user\":31,\"diagnostique\":\"Mise a jour\",\"cause\":\"Virus\",\"resultat\":\"Op\\u00e9rationnelle\",\"etat\":\"Bien\",\"commentaire\":null,\"action\":1,\"created_at\":\"2024-10-01T12:02:19.000000Z\",\"updated_at\":\"2024-10-01T15:43:46.000000Z\"}', '', NULL, '2024-10-01 15:06:23', '2024-10-01 15:06:23'),
(1997, '1', 'Vous avez défini l\'état de la maintenance curative de la période du `2024-10-10 au 2024-10-17` à Défaillant``. <br> ', '', NULL, '2024-10-01 15:06:23', '2024-10-01 15:06:23'),
(1998, '1', 'Data existant : {\"id\":2,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"2024-10-02\",\"etat\":\"TRES BON\",\"commentaire\":\"A verifier\",\"user\":1,\"action\":1,\"created_at\":\"2024-09-28T19:00:19.000000Z\",\"updated_at\":\"2024-10-01T15:15:28.000000Z\"}', '', NULL, '2024-10-01 15:12:49', '2024-10-01 15:12:49'),
(1999, '1', 'Vous avez défini l\'état de la maintenance de la période du `2024-10-01 au 2024-10-02` à Très Bien``. <br> ', '', NULL, '2024-10-01 15:12:49', '2024-10-01 15:12:49'),
(2000, '1', 'Data existant : {\"id\":2,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"2024-10-02\",\"etat\":\"Tr\\u00e8s Bien\",\"commentaire\":null,\"user\":1,\"action\":1,\"created_at\":\"2024-09-28T19:00:19.000000Z\",\"updated_at\":\"2024-10-01T16:12:49.000000Z\"}', '', NULL, '2024-10-01 15:13:01', '2024-10-01 15:13:01'),
(2001, '1', 'Vous avez défini l\'état de la maintenance de la période du `2024-10-01 au 2024-10-02` à Médiocre``. <br> ', '', NULL, '2024-10-01 15:13:01', '2024-10-01 15:13:01'),
(2002, '1', 'Data ancien : {\"id\":4,\"outil\":1,\"maintenance\":2,\"etat\":\"Passable\",\"commentaireinf\":\"AucuEFNLNFnfddlfnl\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":\"|adds\",\"action\":1,\"created_at\":\"2024-10-01T10:33:37.000000Z\",\"updated_at\":\"2024-10-01T14:43:42.000000Z\"}', '', NULL, '2024-10-01 15:19:11', '2024-10-01 15:19:11'),
(2003, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outil Ordinateur.', '', NULL, '2024-10-01 15:19:11', '2024-10-01 15:19:11'),
(2004, '1', 'Data ancien : {\"id\":11,\"outil\":3,\"maintenance\":12,\"etat\":\"Excellent\",\"commentaireinf\":\"hcjjjqdffh\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"ddhcfd\",\"action\":1,\"created_at\":\"2024-10-01T11:27:32.000000Z\",\"updated_at\":\"2024-10-01T14:16:11.000000Z\"}', '', NULL, '2024-10-01 15:19:28', '2024-10-01 15:19:28'),
(2005, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outils Photocopieuse.', '', NULL, '2024-10-01 15:19:28', '2024-10-01 15:19:28'),
(2006, '1', 'Vous avez enregistrée l\'hierarchie Obsecelète .', '', NULL, '2024-10-01 15:41:19', '2024-10-01 15:41:19'),
(2007, '1', 'Hierarchie supprimé : {\"id\":5,\"action\":\"1\",\"libelle\":\"Obsecel\\u00e8te\",\"created_at\":\"2024-10-01T16:41:19.000000Z\",\"updated_at\":\"2024-10-01T16:41:19.000000Z\"}', NULL, NULL, '2024-10-01 15:42:47', '2024-10-01 15:42:47'),
(2008, '1', 'Vous avez enregistrée l\'hierarchie AHJJAHGEJEGGKHA .', '', NULL, '2024-10-01 15:47:11', '2024-10-01 15:47:11'),
(2009, '1', 'Hierarchie supprimé : {\"id\":6,\"action\":\"1\",\"libelle\":\"AHJJAHGEJEGGKHA\",\"created_at\":\"2024-10-01T16:47:10.000000Z\",\"updated_at\":\"2024-10-01T16:47:10.000000Z\"}', NULL, NULL, '2024-10-01 15:47:19', '2024-10-01 15:47:19'),
(2010, '1', 'Vous avez modifié l\'hierarchie Gênantss .', '', NULL, '2024-10-01 15:47:46', '2024-10-01 15:47:46'),
(2011, '1', 'Vous avez modifié l\'hierarchie Gênant .', '', NULL, '2024-10-01 15:47:56', '2024-10-01 15:47:56'),
(2012, '1', 'Vous avez modifié l\'hierarchie Bloquant .', '', NULL, '2024-10-01 15:48:08', '2024-10-01 15:48:08'),
(2013, '1', 'Vous avez enregistrée l\'hierarchie Obsecelète .', '', NULL, '2024-10-01 15:52:28', '2024-10-01 15:52:28'),
(2014, '1', 'Catégorie supprimé : {\"id\":6,\"action\":\"1\",\"libelle\":\"Connexion Internet M\\u00e9tier\",\"tmpCat\":24,\"created_at\":\"2022-06-12T23:43:14.000000Z\",\"updated_at\":\"2022-07-21T14:57:39.000000Z\"}', NULL, NULL, '2024-10-01 15:52:45', '2024-10-01 15:52:45'),
(2015, '1', 'Vous avez modifié la catégorie Matérielss .', '', NULL, '2024-10-01 16:06:09', '2024-10-01 16:06:09'),
(2016, '1', 'Vous avez modifié la catégorie Matériels .', '', NULL, '2024-10-01 16:06:18', '2024-10-01 16:06:18'),
(2017, '1', 'Vous avez enregistrée la Catégorie fbfbbhdfbhd .', '', NULL, '2024-10-01 16:12:09', '2024-10-01 16:12:09'),
(2018, '1', 'Catégorie supprimé : {\"id\":8,\"action\":\"1\",\"libelle\":\"fbfbbhdfbhd\",\"tmpCat\":55,\"created_at\":\"2024-10-01T17:12:09.000000Z\",\"updated_at\":\"2024-10-01T17:12:09.000000Z\"}', NULL, NULL, '2024-10-01 16:13:05', '2024-10-01 16:13:05'),
(2019, '1', 'Vous avez enregistrée le service fhvjfvhfhvfjk .', '', NULL, '2024-10-01 16:14:53', '2024-10-01 16:14:53'),
(2020, '1', 'Service supprimé : {\"id\":11,\"action\":\"1\",\"libelle\":\"fhvjfvhfhvfjk\",\"created_at\":\"2024-10-01T17:14:53.000000Z\",\"updated_at\":\"2024-10-01T17:14:53.000000Z\"}', NULL, NULL, '2024-10-01 16:22:35', '2024-10-01 16:22:35'),
(2021, '1', 'Data existant :{\"id\":1,\"user\":32,\"reference\":\"Ordis\",\"dateacquisition\":\"2024-09-10\",\"nameoutils\":\"Ordinateur\",\"categorie\":2,\"otherjson\":\"{\\\"other\\\":\\\"\\\",\\\"momo\\\":\\\"HP\\\",\\\"m\\\":\\\"8\\\",\\\"mptut\\\":\\\"Jhon\\\",\\\"tdpa\\\":\\\"jhon\\\",\\\"oceseu\\\":\\\"2.5\\\",\\\"crooft\\\":\\\"13\\\",\\\"squdu\\\":null,\\\"delor\\\":\\\"Pavion\\\",\\\"steee\\\":\\\"Win64\\\",\\\"fe\\\":\\\"*****\\\",\\\"ran\\\":\\\"15\'\'\\\"}\",\"etat\":null,\"action\":1,\"created_at\":\"2024-09-28T18:46:34.000000Z\",\"updated_at\":\"2024-10-01T12:05:42.000000Z\"}', '', NULL, '2024-10-01 16:33:05', '2024-10-01 16:33:05'),
(2022, '1', 'Vous avez défini l\'état de l\'outil Ordinateur à `Bien``. <br> ', 'outil', 1, '2024-10-01 16:33:05', '2024-10-01 16:33:05'),
(2023, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 02-10-2024 à 12:37:32', '', NULL, '2024-10-02 11:37:32', '2024-10-02 11:37:32'),
(2024, '1', 'Vous avez enregistrée la Catégorie d\'outil qMHfjogmjobgog .', '', NULL, '2024-10-02 14:06:00', '2024-10-02 14:06:00'),
(2025, '1', 'Catégorie d\'outil supprimé : {\"id\":8,\"action\":\"1\",\"libelle\":\"qMHfjogmjobgog\",\"created_at\":\"2024-10-02T15:06:00.000000Z\",\"updated_at\":\"2024-10-02T15:06:00.000000Z\"}', NULL, NULL, '2024-10-02 14:07:00', '2024-10-02 14:07:00'),
(2026, '1', 'Vous avez modifié la catégorie  .', '', NULL, '2024-10-02 14:07:21', '2024-10-02 14:07:21'),
(2027, '1', 'Vous avez modifié la catégorie  .', '', NULL, '2024-10-02 14:08:09', '2024-10-02 14:08:09'),
(2028, '1', 'Vous avez modifié la catégorie  .', '', NULL, '2024-10-02 14:08:28', '2024-10-02 14:08:28'),
(2029, '1', 'Data existant :{\"id\":3,\"user\":31,\"reference\":\"PHDTIS\",\"dateacquisition\":\"2024-09-30\",\"nameoutils\":\"Photocopieuse\",\"categorie\":7,\"otherjson\":\"{\\\"other\\\":\\\"\\\",\\\"priant\\\":\\\"HP-5864\\\",\\\"pes\\\":\\\"Hp JetLasers\\\",\\\"merde\\\":null}\",\"etat\":null,\"action\":1,\"created_at\":\"2024-10-01T10:08:07.000000Z\",\"updated_at\":\"2024-10-01T11:29:45.000000Z\"}', '', NULL, '2024-10-02 14:08:42', '2024-10-02 14:08:42'),
(2030, '1', 'Vous avez défini l\'état de l\'outil Photocopieuse à `Excellent``. <br> ', 'outil', 3, '2024-10-02 14:08:42', '2024-10-02 14:08:42'),
(2031, '1', 'Vous avez enregistrée le ogoiyfgii dans la base de Etat .', '', NULL, '2024-10-02 14:09:10', '2024-10-02 14:09:10'),
(2032, '1', 'Vous avez enregistrée le ibihv dans la base de Avis .', '', NULL, '2024-10-02 14:09:16', '2024-10-02 14:09:16'),
(2033, '1', 'ibihvsupprimé : {\"id\":7,\"libelle\":\"ibihv\",\"type\":\"Avis\",\"user_action\":null,\"created_at\":\"2024-10-02T15:09:16.000000Z\",\"updated_at\":\"2024-10-02T15:09:16.000000Z\"}', NULL, NULL, '2024-10-02 14:29:54', '2024-10-02 14:29:54'),
(2034, '1', 'ogoiyfgiisupprimé : {\"id\":6,\"libelle\":\"ogoiyfgii\",\"type\":\"Etat\",\"user_action\":null,\"created_at\":\"2024-10-02T15:09:10.000000Z\",\"updated_at\":\"2024-10-02T15:09:10.000000Z\"}', NULL, NULL, '2024-10-02 14:30:02', '2024-10-02 14:30:02'),
(2035, '1', 'Vous avez enregistrée le sfkjqhvqbvfk dans la base de Etat .', '', NULL, '2024-10-02 15:00:36', '2024-10-02 15:00:36'),
(2036, '1', 'Vous avez modifié le services  .', '', NULL, '2024-10-02 15:05:36', '2024-10-02 15:05:36'),
(2037, '1', 'Vous avez modifié le services Action de grâce .', '', NULL, '2024-10-02 15:11:40', '2024-10-02 15:11:40'),
(2038, '1', 'Vous avez modifié le services Action de grâce .', '', NULL, '2024-10-02 15:12:21', '2024-10-02 15:12:21'),
(2039, '1', 'Vous avez modifié le services Incident résolu .', '', NULL, '2024-10-02 15:12:47', '2024-10-02 15:12:47'),
(2040, '1', 'Vous avez modifié le services Incident résolu .', '', NULL, '2024-10-02 15:12:56', '2024-10-02 15:12:56'),
(2041, '1', 'Vous avez modifié le services Action de grâce .', '', NULL, '2024-10-02 15:13:02', '2024-10-02 15:13:02'),
(2042, '1', 'Vous avez enregistrée le Passable dans la base de Avis .', '', NULL, '2024-10-02 15:14:51', '2024-10-02 15:14:51'),
(2043, '1', 'Vous avez enregistrée le Médiocre dans la base de Avis .', '', NULL, '2024-10-02 15:15:11', '2024-10-02 15:15:11'),
(2044, '1', 'Vous avez enregistré le menu bkb.', '', NULL, '2024-10-02 15:18:06', '2024-10-02 15:18:06'),
(2045, '1', 'Menu supprimé : {\"idMenu\":22,\"libelleMenu\":\"bkb\",\"titre_page\":\"bkjbj\",\"controller\":null,\"route\":\"kbkbjb\",\"Topmenu_id\":\"0\",\"num_ordre\":10,\"order_ss\":null,\"iconee\":\"bkbkj\",\"element_menu\":500,\"statut\":null,\"user_action\":1,\"action_save\":null,\"created_at\":\"2024-10-02T16:18:06.000000Z\",\"updated_at\":\"2024-10-02T16:18:06.000000Z\"}', NULL, NULL, '2024-10-02 15:18:22', '2024-10-02 15:18:22'),
(2046, '1', 'Vous avez enregistré le menu fnb.', '', NULL, '2024-10-02 15:38:55', '2024-10-02 15:38:55'),
(2047, '1', 'Menu supprimé : {\"idMenu\":23,\"libelleMenu\":\"fnb\",\"titre_page\":\"fbfb\",\"controller\":null,\"route\":\"fbbfl\",\"Topmenu_id\":\"0\",\"num_ordre\":12,\"order_ss\":null,\"iconee\":\"fbnbfl\",\"element_menu\":500,\"statut\":null,\"user_action\":1,\"action_save\":null,\"created_at\":\"2024-10-02T16:38:55.000000Z\",\"updated_at\":\"2024-10-02T16:38:55.000000Z\"}', NULL, NULL, '2024-10-02 15:39:06', '2024-10-02 15:39:06'),
(2048, '1', 'Vous avez modifié le menu Gestion Maintenances Curatives.', '', NULL, '2024-10-02 15:40:18', '2024-10-02 15:40:18'),
(2049, '1', 'Vous avez modifié le menu Gestion Maintenances Curatives.', '', NULL, '2024-10-02 15:40:38', '2024-10-02 15:40:38'),
(2050, '1', 'Vous avez modifié le compte du personnel DJIDAGBAGBA S T Emmanuel .', '', NULL, '2024-10-02 16:20:44', '2024-10-02 16:20:44'),
(2051, '1', 'Vous avez modifié le compte du personnel TEST Dado .', '', NULL, '2024-10-02 16:21:36', '2024-10-02 16:21:36'),
(2052, '1', 'Vous avez modifié le compte du personnel TEST Dado .', '', NULL, '2024-10-02 16:22:45', '2024-10-02 16:22:45'),
(2053, '1', 'Vous avez enregistré le rôle hh .', '', NULL, '2024-10-02 16:27:23', '2024-10-02 16:27:23'),
(2054, '1', 'Rôle supprimé : {\"idRole\":10,\"libelle\":\"hh\",\"code\":\"gffg\",\"user_action\":1,\"action_save\":null,\"created_at\":\"2024-10-02T17:27:23.000000Z\",\"updated_at\":\"2024-10-02T17:27:23.000000Z\"}', NULL, NULL, '2024-10-02 16:27:26', '2024-10-02 16:27:26'),
(2055, '1', 'Vous avez enregistré le rôle BloozDev .', '', NULL, '2024-10-02 16:40:45', '2024-10-02 16:40:45'),
(2056, '1', 'Rôle supprimé : {\"idRole\":11,\"libelle\":\"BloozDev\",\"code\":\"bdev\",\"user_action\":1,\"action_save\":null,\"created_at\":\"2024-10-02T17:40:45.000000Z\",\"updated_at\":\"2024-10-02T17:40:45.000000Z\"}', NULL, NULL, '2024-10-02 16:40:51', '2024-10-02 16:40:51'),
(2057, '1', 'Vous avez enregistré le rôle BloozDev .', '', NULL, '2024-10-02 16:42:45', '2024-10-02 16:42:45'),
(2058, '1', 'Rôle supprimé : {\"idRole\":12,\"libelle\":\"BloozDev\",\"code\":\"bdev\",\"user_action\":1,\"action_save\":null,\"created_at\":\"2024-10-02T17:42:45.000000Z\",\"updated_at\":\"2024-10-02T17:42:45.000000Z\"}', NULL, NULL, '2024-10-02 16:42:52', '2024-10-02 16:42:52'),
(2059, '1', 'Vous avez enregistré le rôle BloozDev .', '', NULL, '2024-10-02 16:46:19', '2024-10-02 16:46:19'),
(2060, '1', 'Vous avez modifié le rôle BloozDevs .', '', NULL, '2024-10-02 16:46:29', '2024-10-02 16:46:29'),
(2061, '1', 'Rôle supprimé : {\"idRole\":13,\"libelle\":\"BloozDevs\",\"code\":\"bdev\",\"user_action\":1,\"action_save\":null,\"created_at\":\"2024-10-02T17:46:19.000000Z\",\"updated_at\":\"2024-10-02T17:46:29.000000Z\"}', NULL, NULL, '2024-10-02 16:46:36', '2024-10-02 16:46:36'),
(2062, '1', 'Vous avez modifié le rôle Développeur .', '', NULL, '2024-10-02 16:47:35', '2024-10-02 16:47:35'),
(2063, '1', 'Hierarchie supprimé : {\"id\":7,\"action\":\"1\",\"libelle\":\"Obsecel\\u00e8te\",\"created_at\":\"2024-10-01T16:52:28.000000Z\",\"updated_at\":\"2024-10-01T16:52:28.000000Z\"}', NULL, NULL, '2024-10-02 17:01:19', '2024-10-02 17:01:19'),
(2064, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 03-10-2024 à 08:33:38', '', NULL, '2024-10-03 07:33:38', '2024-10-03 07:33:38'),
(2065, '1', 'Data ancien : {\"id\":11,\"outil\":3,\"maintenance\":12,\"etat\":\"Tr\\u00e8s Bien\",\"commentaireinf\":\"hcjjjqdffhghhddf\",\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"action_effectuer\":\"ddhcfd\",\"action\":1,\"created_at\":\"2024-10-01T11:27:32.000000Z\",\"updated_at\":\"2024-10-01T16:19:28.000000Z\"}', '', NULL, '2024-10-03 08:22:05', '2024-10-03 08:22:05'),
(2066, '1', 'Vous avez modifiée les informations de la période du 01 octobre 2024 au 02 octobre 2024 sur l\'outils Photocopieuse.', '', NULL, '2024-10-03 08:22:05', '2024-10-03 08:22:05'),
(2067, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 03-10-2024 à 14:17:41', '', NULL, '2024-10-03 13:17:41', '2024-10-03 13:17:41'),
(2068, '1', 'Vous avez enregistrée l\'action zkeg pour l\'outil :BIC.', '', NULL, '2024-10-03 13:31:40', '2024-10-03 13:31:40'),
(2069, '1', 'Vous avez enregistrée l\'action zkegs pour l\'outil :BIC.', '', NULL, '2024-10-03 13:31:51', '2024-10-03 13:31:51');
INSERT INTO `traces` (`id`, `action`, `libelle`, `type`, `idsec`, `created_at`, `updated_at`) VALUES
(2070, '1', 'Vous avez enregistré un incident.212', '', NULL, '2024-10-03 14:12:44', '2024-10-03 14:12:44'),
(2071, '1', 'Vous avez modifié l\'incident Aucun accès a iternete .', '', NULL, '2024-10-03 14:44:54', '2024-10-03 14:44:54'),
(2072, '1', 'Vous avez modifié l\'incident Aucun accès a iternete .', '', NULL, '2024-10-03 14:45:37', '2024-10-03 14:45:37'),
(2073, '1', 'Vous avez modifié l\'incident Aucun accès a iternete .', '', NULL, '2024-10-03 14:46:08', '2024-10-03 14:46:08'),
(2074, '1', 'Vous avez modifié l\'incident Aucun accès a iternete .', '', NULL, '2024-10-03 14:46:59', '2024-10-03 14:46:59'),
(2075, '1', 'Vous avez modifié l\'incident Aucun accès a iternete .', '', NULL, '2024-10-03 14:49:09', '2024-10-03 14:49:09'),
(2076, '1', 'Vous avez modifié l\'incident Aucun accès a iternete .', '', NULL, '2024-10-03 14:49:51', '2024-10-03 14:49:51'),
(2077, '1', 'Vous avez modifié l\'incident Aucun accès a iternete .', '', NULL, '2024-10-03 15:05:17', '2024-10-03 15:05:17'),
(2078, '1', 'Vous avez enregistrée l\'hierarchie Confort .', '', NULL, '2024-10-03 15:36:56', '2024-10-03 15:36:56'),
(2079, '1', 'Vous avez modifié l\'incident Aucun accès a iternete .', '', NULL, '2024-10-03 15:37:11', '2024-10-03 15:37:11'),
(2080, '1', 'Vous avez modifié l\'incident DESE .', '', NULL, '2024-10-03 15:37:34', '2024-10-03 15:37:34'),
(2081, '1', 'Vous avez modifié l\'incident DESE .', '', NULL, '2024-10-03 15:37:50', '2024-10-03 15:37:50'),
(2082, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 03-10-2024 à 19:44:38', '', NULL, '2024-10-03 18:44:38', '2024-10-03 18:44:38'),
(2083, '1', 'Vous avez programmer une maintenance pour la période du 04 octobre 2024 au 07 octobre 2024 .', '', NULL, '2024-10-03 18:45:22', '2024-10-03 18:45:22'),
(2084, '1', 'Data existant : {\"id\":3,\"periodedebut\":\"2024-10-04\",\"periodefin\":\"2024-10-07\",\"etat\":null,\"commentaire\":null,\"user\":31,\"action\":1,\"created_at\":\"2024-10-03T19:45:22.000000Z\",\"updated_at\":\"2024-10-03T19:45:22.000000Z\"}', '', NULL, '2024-10-03 18:45:35', '2024-10-03 18:45:35'),
(2085, '1', 'Vous avez défini l\'état de la maintenance de la période du `2024-10-04 au 2024-10-07` à Passable``. <br> ', '', NULL, '2024-10-03 18:45:35', '2024-10-03 18:45:35'),
(2086, '1', 'Vous avez enregistrée une maintenance de la période du 2024-10-04 au 2024-10-07 sur l\'ordinateur Ordinateur.', '', NULL, '2024-10-03 18:45:55', '2024-10-03 18:45:55'),
(2087, '1', 'Data delete GM : {\"id\":7,\"outil\":1,\"maintenance\":3,\"etat\":\"Bien\",\"commentaireinf\":null,\"commentaireuser\":null,\"avisinf\":null,\"avisuser\":null,\"detailjson\":null,\"action\":1,\"created_at\":\"2024-10-03T19:45:55.000000Z\",\"updated_at\":\"2024-10-03T19:45:55.000000Z\"}', '', NULL, '2024-10-03 18:51:31', '2024-10-03 18:51:31'),
(2088, '1', 'Vous avez enregistrée une maintenance de la période du 2024-10-04 au 2024-10-07 sur l\'ordinateur Ordinateur.', '', NULL, '2024-10-03 18:51:49', '2024-10-03 18:51:49'),
(2089, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 04-10-2024 à 10:06:53', '', NULL, '2024-10-04 09:06:53', '2024-10-04 09:06:53'),
(2090, '1', 'Vous avez enregistrer une maintenance curative pour la période du 10 octobre 2024 au 04 octobre 2024 .', '', NULL, '2024-10-04 10:10:19', '2024-10-04 10:10:19'),
(2091, '1', 'Data ancien : {\"id\":13,\"periodedebut\":\"2024-10-10\",\"periodefin\":\"2024-10-17\",\"outil\":null,\"user\":31,\"diagnostique\":\"Mise a jour\",\"cause\":\"Virus\",\"resultat\":\"Op\\u00e9rationnelle\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":null,\"action\":1,\"created_at\":\"2024-10-01T12:02:19.000000Z\",\"updated_at\":\"2024-10-01T16:06:23.000000Z\"}', '', NULL, '2024-10-04 10:55:03', '2024-10-04 10:55:03'),
(2092, '1', 'Vous avez modifiée les informations de la période de 10 octobre 2024 au 17 octobre 2024  en 10 octobre 2024 au 04 octobre 2024', '', NULL, '2024-10-04 10:55:04', '2024-10-04 10:55:04'),
(2093, '1', 'Data ancien : {\"id\":13,\"periodedebut\":\"2024-10-10\",\"periodefin\":\"17:02\",\"outil\":3,\"user\":1,\"diagnostique\":\"Mise a jour\",\"cause\":\"Virus\",\"resultat\":\"Op\\u00e9rationnelle\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":\"azertyyoyoy\",\"action\":1,\"created_at\":\"2024-10-01T12:02:19.000000Z\",\"updated_at\":\"2024-10-04T11:55:03.000000Z\"}', '', NULL, '2024-10-04 10:55:34', '2024-10-04 10:55:34'),
(2094, '1', 'Vous avez modifiée les informations de la période de 10 octobre 2024 au 04 octobre 2024  en 18 octobre 2024 au 04 octobre 2024', '', NULL, '2024-10-04 10:55:34', '2024-10-04 10:55:34'),
(2095, '1', 'Data ancien : {\"id\":12,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"2024-10-02\",\"outil\":null,\"user\":31,\"diagnostique\":\"dhgdhgf\",\"cause\":\"AEZEZRT\",\"resultat\":\"ghHEFE\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":null,\"action\":1,\"created_at\":\"2024-10-01T09:23:27.000000Z\",\"updated_at\":\"2024-10-01T15:45:53.000000Z\"}', '', NULL, '2024-10-04 10:57:54', '2024-10-04 10:57:54'),
(2096, '1', 'Vous avez modifiée les informations de la période de 01 octobre 2024 au 02 octobre 2024  en 01 octobre 2024 au 04 octobre 2024', '', NULL, '2024-10-04 10:57:54', '2024-10-04 10:57:54'),
(2097, '1', 'Data ancien : {\"id\":13,\"periodedebut\":\"2024-10-18\",\"periodefin\":\"17:02\",\"outil\":3,\"user\":1,\"diagnostique\":\"Mise a jour\",\"cause\":\"Virus\",\"resultat\":\"Op\\u00e9rationnelle\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":\"azertyyoyoy\",\"action\":1,\"created_at\":\"2024-10-01T12:02:19.000000Z\",\"updated_at\":\"2024-10-04T11:55:34.000000Z\"}', '', NULL, '2024-10-04 11:00:58', '2024-10-04 11:00:58'),
(2098, '1', 'Vous avez modifiée les informations de la maintenace curative du 18 octobre 2024 en 18 octobre 2024à 12h 00m', '', NULL, '2024-10-04 11:00:58', '2024-10-04 11:00:58'),
(2099, '1', 'Data ancien : {\"id\":14,\"periodedebut\":\"2024-10-10\",\"periodefin\":\"18:50\",\"outil\":1,\"user\":31,\"diagnostique\":\"HJFSF\",\"cause\":\"hdd\",\"resultat\":\"gffjdfhg\",\"etat\":null,\"commentaire\":\"hfhgff\",\"action\":1,\"created_at\":\"2024-10-04T11:10:19.000000Z\",\"updated_at\":\"2024-10-04T11:10:19.000000Z\"}', '', NULL, '2024-10-04 12:25:32', '2024-10-04 12:25:32'),
(2100, '1', 'Vous avez modifiée les informations de la maintenace curative du 10 octobre 2024 en 10 octobre 2024 à 13h 25m', '', NULL, '2024-10-04 12:25:32', '2024-10-04 12:25:32'),
(2101, '1', 'Data ancien : {\"id\":14,\"periodedebut\":\"2024-10-10\",\"periodefin\":\"18:50\",\"outil\":1,\"user\":32,\"diagnostique\":\"HJFSF\",\"cause\":\"hdd\",\"resultat\":\"gffjdfhg\",\"etat\":null,\"commentaire\":\"hfhgff\",\"action\":1,\"created_at\":\"2024-10-04T11:10:19.000000Z\",\"updated_at\":\"2024-10-04T13:25:32.000000Z\"}', '', NULL, '2024-10-04 12:25:54', '2024-10-04 12:25:54'),
(2102, '1', 'Vous avez modifiée les informations de la maintenace curative du 10 octobre 2024 en 10 octobre 2024 à 13h 25m', '', NULL, '2024-10-04 12:25:54', '2024-10-04 12:25:54'),
(2103, '1', 'Vous avez programmer une maintenance pour la période du 07 octobre 2024 au 10 octobre 2024 .', '', NULL, '2024-10-04 13:18:33', '2024-10-04 13:18:33'),
(2104, '1', 'Data ancien : {\"id\":4,\"periodedebut\":\"2024-10-07\",\"periodefin\":\"2024-10-10\",\"etat\":null,\"commentaire\":\"cm\",\"user\":31,\"service\":\"10\",\"action\":1,\"created_at\":\"2024-10-04T14:18:33.000000Z\",\"updated_at\":\"2024-10-04T14:18:33.000000Z\"}', '', NULL, '2024-10-04 13:45:42', '2024-10-04 13:45:42'),
(2105, '1', 'Vous avez modifiée les informations de la période de 2024-10-07 au 2024-10-10  en 2024-10-07 au 2024-10-10', '', NULL, '2024-10-04 13:45:42', '2024-10-04 13:45:42'),
(2106, '1', 'Data ancien : {\"id\":4,\"periodedebut\":\"2024-10-07\",\"periodefin\":\"2024-10-10\",\"etat\":null,\"commentaire\":\"cmuiuh\",\"user\":31,\"service\":\"10\",\"action\":1,\"created_at\":\"2024-10-04T14:18:33.000000Z\",\"updated_at\":\"2024-10-04T14:45:42.000000Z\"}', '', NULL, '2024-10-04 13:45:53', '2024-10-04 13:45:53'),
(2107, '1', 'Vous avez modifiée les informations de la période de 2024-10-07 au 2024-10-10  en 2024-10-07 au 2024-10-10', '', NULL, '2024-10-04 13:45:54', '2024-10-04 13:45:54'),
(2108, '1', 'Data ancien : {\"id\":4,\"periodedebut\":\"2024-10-07\",\"periodefin\":\"2024-10-10\",\"etat\":null,\"commentaire\":\"cmuiuh\",\"user\":31,\"service\":\"2\",\"action\":1,\"created_at\":\"2024-10-04T14:18:33.000000Z\",\"updated_at\":\"2024-10-04T14:45:54.000000Z\"}', '', NULL, '2024-10-04 13:46:07', '2024-10-04 13:46:07'),
(2109, '1', 'Vous avez modifiée les informations de la période de 2024-10-07 au 2024-10-10  en 2024-10-07 au 2024-10-10', '', NULL, '2024-10-04 13:46:07', '2024-10-04 13:46:07'),
(2110, '1', 'Data ancien : {\"id\":4,\"periodedebut\":\"2024-10-07\",\"periodefin\":\"2024-10-10\",\"etat\":null,\"commentaire\":\"cmuiuh\",\"user\":31,\"service\":\"2\",\"action\":1,\"created_at\":\"2024-10-04T14:18:33.000000Z\",\"updated_at\":\"2024-10-04T14:46:07.000000Z\"}', '', NULL, '2024-10-04 13:46:19', '2024-10-04 13:46:19'),
(2111, '1', 'Vous avez modifiée les informations de la période de 2024-10-07 au 2024-10-10  en 2024-10-07 au 2024-10-10', '', NULL, '2024-10-04 13:46:19', '2024-10-04 13:46:19'),
(2112, '1', 'Data ancien : {\"id\":2,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"2024-10-02\",\"etat\":\"M\\u00e9diocre\",\"commentaire\":null,\"user\":1,\"service\":\"1\",\"action\":1,\"created_at\":\"2024-09-28T19:00:19.000000Z\",\"updated_at\":\"2024-10-01T16:13:01.000000Z\"}', '', NULL, '2024-10-04 13:55:09', '2024-10-04 13:55:09'),
(2113, '1', 'Vous avez modifiée les informations de la période de 2024-10-01 au 2024-10-02  en 2024-10-01 au 2024-10-02', '', NULL, '2024-10-04 13:55:09', '2024-10-04 13:55:09'),
(2114, '1', 'Data ancien : {\"id\":2,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"2024-10-02\",\"etat\":\"M\\u00e9diocre\",\"commentaire\":\"DJHdJhjhsjfjdhfjl\",\"user\":1,\"service\":\"0\",\"action\":1,\"created_at\":\"2024-09-28T19:00:19.000000Z\",\"updated_at\":\"2024-10-04T14:55:09.000000Z\"}', '', NULL, '2024-10-04 13:55:21', '2024-10-04 13:55:21'),
(2115, '1', 'Vous avez modifiée les informations de la période de 2024-10-01 au 2024-10-02  en 2024-10-01 au 2024-10-02', '', NULL, '2024-10-04 13:55:21', '2024-10-04 13:55:21'),
(2116, '1', 'Data ancien : {\"id\":12,\"periodedebut\":\"2024-10-01\",\"periodefin\":null,\"outil\":1,\"user\":1,\"diagnostique\":\"dhgdhgf\",\"cause\":\"AEZEZRT\",\"resultat\":\"ghHEFE\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":null,\"action\":1,\"created_at\":\"2024-10-01T09:23:27.000000Z\",\"updated_at\":\"2024-10-04T11:57:54.000000Z\"}', '', NULL, '2024-10-04 14:05:04', '2024-10-04 14:05:04'),
(2117, '1', 'Vous avez modifiée les informations de la maintenace curative du 01 octobre 2024 en 01 octobre 2024 à 15h 05m', '', NULL, '2024-10-04 14:05:04', '2024-10-04 14:05:04'),
(2118, '1', 'Data existant : {\"id\":14,\"periodedebut\":\"2024-10-10\",\"periodefin\":\"18:51\",\"outil\":1,\"user\":32,\"diagnostique\":\"HJFSF\",\"cause\":\"hdd\",\"resultat\":\"gffjdfhg\",\"etat\":null,\"commentaire\":\"hfhgff\",\"action\":1,\"created_at\":\"2024-10-04T11:10:19.000000Z\",\"updated_at\":\"2024-10-04T13:25:54.000000Z\"}', '', NULL, '2024-10-04 14:06:27', '2024-10-04 14:06:27'),
(2119, '1', 'Vous avez défini l\'état de la maintenance curative de la période du `2024-10-10 au 18:51` à Passable``. <br> ggggg', '', NULL, '2024-10-04 14:06:27', '2024-10-04 14:06:27'),
(2120, '1', 'Data existant : {\"id\":4,\"periodedebut\":\"2024-10-07\",\"periodefin\":\"2024-10-10\",\"etat\":null,\"commentaire\":\"cmuiuh\",\"user\":32,\"service\":\"2\",\"action\":1,\"created_at\":\"2024-10-04T14:18:33.000000Z\",\"updated_at\":\"2024-10-04T14:46:19.000000Z\"}', '', NULL, '2024-10-04 14:12:20', '2024-10-04 14:12:20'),
(2121, '1', 'Vous avez défini l\'état de la maintenance de la période du `2024-10-07 au 2024-10-10` à Excellent``. <br> cmuiuh', '', NULL, '2024-10-04 14:12:20', '2024-10-04 14:12:20'),
(2122, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-10-2024 à 09:48:52', '', NULL, '2024-10-08 08:48:52', '2024-10-08 08:48:52'),
(2123, '1', 'Vous avez déclaré un incident.213', '', NULL, '2024-10-08 10:17:51', '2024-10-08 10:17:51'),
(2124, '1', 'L\'état : Canva est modifiée avec succès. ', '', NULL, '2024-10-08 10:45:25', '2024-10-08 10:45:25'),
(2125, '1', 'L\'état : Power Points est modifiée avec succès. ', '', NULL, '2024-10-08 11:05:20', '2024-10-08 11:05:20'),
(2126, '1', 'Vous avez déclaré un incident.214', '', NULL, '2024-10-08 11:15:00', '2024-10-08 11:15:00'),
(2127, '1', 'L\'incident est affecté à : SUPER ADMIN avec succès. ', '', NULL, '2024-10-08 10:16:25', '2024-10-08 10:16:25'),
(2128, '1', 'L\'incident est affecté à : TEST Dado avec succès. ', '', NULL, '2024-10-08 10:19:49', '2024-10-08 10:19:49'),
(2129, '1', 'Vous avez déclaré un incident.215', '', NULL, '2024-10-08 11:21:32', '2024-10-08 11:21:32'),
(2130, '1', 'Vous avez modifié l\'incident VDFD .', '', NULL, '2024-10-08 10:39:07', '2024-10-08 10:39:07'),
(2131, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 09-10-2024 à 15:30:56', '', NULL, '2024-10-09 14:30:56', '2024-10-09 14:30:56'),
(2132, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 09-10-2024 à 18:24:22', '', NULL, '2024-10-09 17:24:22', '2024-10-09 17:24:22'),
(2133, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 10-10-2024 à 09:41:54', '', NULL, '2024-10-10 08:41:54', '2024-10-10 08:41:54'),
(2134, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 10-10-2024 à 09:56:11', '', NULL, '2024-10-10 08:56:11', '2024-10-10 08:56:11'),
(2135, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 10-10-2024 à 11:41:34', '', NULL, '2024-10-10 10:41:34', '2024-10-10 10:41:34'),
(2136, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-10-2024 à 04:43:49', '', NULL, '2024-10-11 03:43:49', '2024-10-11 03:43:49'),
(2137, '1', 'Vous avez déclaré un incident.216', '', NULL, '2024-10-11 05:44:39', '2024-10-11 05:44:39'),
(2138, '1', 'Incident supprimé : {\"id\":216,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"11-10-2024 06:44:39\",\"Module\":\"sdddddddd\",\"description\":\"xxxx\",\"cat\":4,\"hierarchie\":3,\"piece\":\"\",\"etat\":null,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":null,\"affecter\":null,\"statut\":0,\"action\":null,\"created_at\":\"2024-10-11T06:44:39.000000Z\",\"updated_at\":\"2024-10-11T06:44:39.000000Z\"}', NULL, NULL, '2024-10-11 05:00:21', '2024-10-11 05:00:21'),
(2139, '1', 'L\'état : Power Points est modifiée avec succès. ', '', NULL, '2024-10-11 06:34:48', '2024-10-11 06:34:48'),
(2140, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-10-2024 à 09:22:46', '', NULL, '2024-10-11 08:22:46', '2024-10-11 08:22:46'),
(2141, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-10-2024 à 10:16:00', '', NULL, '2024-10-11 09:16:00', '2024-10-11 09:16:00'),
(2142, '1', 'L\'état : PDF est modifiée avec succès. ', '', NULL, '2024-10-11 11:03:50', '2024-10-11 11:03:50'),
(2143, '1', 'Vous avez déclaré un incident.217', '', NULL, '2024-10-11 11:37:06', '2024-10-11 11:37:06'),
(2144, '1', 'Vous avez déclaré un incident.218', '', NULL, '2024-10-11 11:47:40', '2024-10-11 11:47:40'),
(2145, '1', 'Vous avez déclaré un incident.219', '', NULL, '2024-10-11 11:50:43', '2024-10-11 11:50:43'),
(2146, '1', 'Vous avez déclaré un incident.220', '', NULL, '2024-10-11 13:11:21', '2024-10-11 13:11:21'),
(2147, '1', 'L\'état : fhdgf est modifiée avec succès. ', '', NULL, '2024-10-11 13:28:47', '2024-10-11 13:28:47'),
(2148, '1', 'Incident supprimé : {\"id\":209,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"25-09-2024 15:39:12\",\"Module\":\"Canva\",\"description\":\"DESE\",\"cat\":4,\"hierarchie\":2,\"piece\":\"\",\"etat\":5,\"resolue\":null,\"avis\":\"Bien\",\"sugg\":null,\"DateResolue\":\"2024-10-08 11:45:25\",\"affecter\":null,\"statut\":1,\"action\":null,\"created_at\":\"2024-09-25T15:39:12.000000Z\",\"updated_at\":\"2024-10-08T10:45:47.000000Z\"}', NULL, NULL, '2024-10-11 12:49:15', '2024-10-11 12:49:15'),
(2149, '1', 'Incident supprimé : {\"id\":219,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"11-10-2024 12:50:42\",\"Module\":\"DVDDH\",\"description\":\"sff\",\"cat\":3,\"hierarchie\":2,\"piece\":\"\",\"etat\":null,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":null,\"affecter\":null,\"statut\":0,\"action\":null,\"created_at\":\"2024-10-11T12:50:42.000000Z\",\"updated_at\":\"2024-10-11T12:50:42.000000Z\"}', NULL, NULL, '2024-10-11 12:49:21', '2024-10-11 12:49:21'),
(2150, '1', 'Incident supprimé : {\"id\":217,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"11-10-2024 12:37:06\",\"Module\":\"GOMME\",\"description\":\"ddddd\",\"cat\":2,\"hierarchie\":3,\"piece\":\"\",\"etat\":null,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":null,\"affecter\":null,\"statut\":0,\"action\":null,\"created_at\":\"2024-10-11T12:37:06.000000Z\",\"updated_at\":\"2024-10-11T12:37:06.000000Z\"}', NULL, NULL, '2024-10-11 12:49:27', '2024-10-11 12:49:27'),
(2151, '1', 'Incident supprimé : {\"id\":213,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"08-10-2024 11:17:51\",\"Module\":\"Power Points\",\"description\":\"S\'arr\\u00eate apres 20min d\'activiter\",\"cat\":3,\"hierarchie\":3,\"piece\":\"documents\\/incident\\/incident17.png\",\"etat\":5,\"resolue\":null,\"avis\":\"Excellent\",\"sugg\":null,\"DateResolue\":\"2024-10-11 07:34:48\",\"affecter\":32,\"statut\":1,\"action\":null,\"created_at\":\"2024-10-08T11:17:51.000000Z\",\"updated_at\":\"2024-10-11T11:34:51.000000Z\"}', NULL, NULL, '2024-10-11 12:49:34', '2024-10-11 12:49:34'),
(2152, '1', 'Incident supprimé : {\"id\":214,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"08-10-2024 12:15:00\",\"Module\":\"PDF\",\"description\":\"VDFD\",\"cat\":4,\"hierarchie\":8,\"piece\":\"documents\\/incident\\/incident15.png\",\"etat\":5,\"resolue\":\"ffdff\",\"avis\":\"Passable\",\"sugg\":null,\"DateResolue\":\"2024-10-11 12:03:50\",\"affecter\":31,\"statut\":1,\"action\":null,\"created_at\":\"2024-10-08T12:15:00.000000Z\",\"updated_at\":\"2024-10-11T11:34:42.000000Z\"}', NULL, NULL, '2024-10-11 12:49:39', '2024-10-11 12:49:39'),
(2153, '1', 'L\'incident est affecté à : TEST Dado avec succès. ', '', NULL, '2024-10-11 13:01:54', '2024-10-11 13:01:54'),
(2154, '1', 'L\'incident est affecté à : SUPER ADMIN avec succès. ', '', NULL, '2024-10-11 13:02:01', '2024-10-11 13:02:01'),
(2155, '1', 'L\'incident est affecté à : TEST Dado avec succès. ', '', NULL, '2024-10-11 13:02:09', '2024-10-11 13:02:09'),
(2156, '1', 'Vous avez enregistré le menu Entête / Rappords.', '', NULL, '2024-10-11 14:51:16', '2024-10-11 14:51:16'),
(2157, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-10-2024 à 15:51:41', '', NULL, '2024-10-11 14:51:41', '2024-10-11 14:51:41'),
(2158, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-10-2024 à 15:54:56', '', NULL, '2024-10-11 14:54:56', '2024-10-11 14:54:56'),
(2159, '1', 'Data ancien : {\"id\":12,\"periodedebut\":\"2024-10-01\",\"periodefin\":null,\"outil\":1,\"user\":1,\"diagnostique\":\"dhgdhgf\",\"cause\":\"AEZEZRT\",\"resultat\":\"ghHEFE\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":\"ggg\",\"action\":1,\"created_at\":\"2024-10-01T09:23:27.000000Z\",\"updated_at\":\"2024-10-04T15:05:04.000000Z\"}', '', NULL, '2024-10-11 15:18:35', '2024-10-11 15:18:35'),
(2160, '1', 'Data ancien : {\"id\":12,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"19:20\",\"outil\":1,\"user\":1,\"diagnostique\":\"dhgdhgf\",\"cause\":\"AEZEZRT\",\"resultat\":\"ghHEFE\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":\"ggg\",\"action\":1,\"created_at\":\"2024-10-01T09:23:27.000000Z\",\"updated_at\":\"2024-10-11T16:18:35.000000Z\"}', '', NULL, '2024-10-11 15:18:56', '2024-10-11 15:18:56'),
(2161, '1', 'Data ancien : {\"id\":12,\"periodedebut\":\"2024-10-01\",\"periodefin\":\"19:20\",\"outil\":1,\"user\":1,\"diagnostique\":\"dhgdhgf\",\"cause\":\"AEZEZRT\",\"resultat\":\"ghHEFE\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":\"ggg\",\"action\":1,\"created_at\":\"2024-10-01T09:23:27.000000Z\",\"updated_at\":\"2024-10-11T16:18:56.000000Z\"}', '', NULL, '2024-10-11 15:29:07', '2024-10-11 15:29:07'),
(2162, '1', 'Vous avez modifiée les informations de la maintenace curative du 2024-10-01 en 2024-10-01 ', '', NULL, '2024-10-11 15:29:07', '2024-10-11 15:29:07'),
(2163, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-10-2024 à 16:47:05', '', NULL, '2024-10-11 15:47:05', '2024-10-11 15:47:05'),
(2164, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-10-2024 à 21:26:32', '', NULL, '2024-10-11 20:26:32', '2024-10-11 20:26:32'),
(2165, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 14-10-2024 à 10:06:07', '', NULL, '2024-10-14 09:06:07', '2024-10-14 09:06:07'),
(2166, '1', 'Vous avez programmer une maintenance pour la période du 2024-10-16 au 2024-10-17 .', '', NULL, '2024-10-14 11:21:01', '2024-10-14 11:21:01'),
(2167, '1', 'Data delete M : {\"id\":5,\"periodedebut\":\"2024-10-16\",\"periodefin\":\"2024-10-17\",\"etat\":null,\"commentaire\":\"khfhf\",\"user\":31,\"service\":\"2\",\"action\":1,\"created_at\":\"2024-10-14T12:21:01.000000Z\",\"updated_at\":\"2024-10-14T12:21:01.000000Z\"}', '', NULL, '2024-10-14 11:26:35', '2024-10-14 11:26:35'),
(2168, '1', 'Vous avez enregistrer une maintenance curative réçu le 2024-10-08 dont la durée d\'arrêt est 15:12 .', '', NULL, '2024-10-14 14:40:07', '2024-10-14 14:40:07'),
(2169, '1', 'Data existant : {\"id\":15,\"periodedebut\":\"2024-10-08\",\"periodefin\":\"15:12\",\"outil\":1,\"user\":31,\"diagnostique\":\",l lnlnj\",\"cause\":\"kgkg\",\"resultat\":\"cxgxg\",\"etat\":null,\"commentaire\":null,\"action\":1,\"created_at\":\"2024-10-14T15:40:07.000000Z\",\"updated_at\":\"2024-10-14T15:40:07.000000Z\"}', '', NULL, '2024-10-14 14:41:51', '2024-10-14 14:41:51'),
(2170, '1', 'Vous avez défini l\'état de la maintenance curative de la période du `2024-10-08 au 15:12` à Défaillant``. <br> ', '', NULL, '2024-10-14 14:41:51', '2024-10-14 14:41:51'),
(2171, '1', 'Data ancien : {\"id\":15,\"periodedebut\":\"2024-10-08\",\"periodefin\":\"15:12\",\"outil\":1,\"user\":31,\"diagnostique\":\",l lnlnj\",\"cause\":\"kgkg\",\"resultat\":\"cxgxg\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":null,\"action\":1,\"created_at\":\"2024-10-14T15:40:07.000000Z\",\"updated_at\":\"2024-10-14T15:41:51.000000Z\"}', '', NULL, '2024-10-14 14:42:10', '2024-10-14 14:42:10'),
(2172, '1', 'Vous avez modifiée les informations de la maintenace curative du 2024-10-08 en 2024-10-08 ', '', NULL, '2024-10-14 14:42:10', '2024-10-14 14:42:10'),
(2173, '1', 'Data delete MC : {\"id\":15,\"periodedebut\":\"2024-10-08\",\"periodefin\":\"15:12\",\"outil\":1,\"user\":31,\"diagnostique\":\",l lnlnj\",\"cause\":\"kgkg\",\"resultat\":\"cxgxg\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":\"nln\",\"action\":1,\"created_at\":\"2024-10-14T15:40:07.000000Z\",\"updated_at\":\"2024-10-14T15:42:10.000000Z\"}', '', NULL, '2024-10-14 14:42:21', '2024-10-14 14:42:21'),
(2174, '1', 'Data ancien : {\"id\":13,\"periodedebut\":\"2024-10-18\",\"periodefin\":\"17:02\",\"outil\":3,\"user\":1,\"diagnostique\":\"Mise a jour\",\"cause\":\"Virus\",\"resultat\":\"Op\\u00e9rationnelle\",\"etat\":\"D\\u00e9faillant\",\"commentaire\":\"azertyyoyoy\",\"action\":1,\"created_at\":\"2024-10-01T12:02:19.000000Z\",\"updated_at\":\"2024-10-04T12:00:58.000000Z\"}', '', NULL, '2024-10-14 15:00:56', '2024-10-14 15:00:56'),
(2175, '1', 'Vous avez modifiée les informations de la maintenace curative du 2024-10-18 en 2024-10-18 ', '', NULL, '2024-10-14 15:00:57', '2024-10-14 15:00:57'),
(2176, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 15-10-2024 à 10:54:45', '', NULL, '2024-10-15 09:54:45', '2024-10-15 09:54:45'),
(2177, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 15-10-2024 à 11:17:25', '', NULL, '2024-10-15 10:17:25', '2024-10-15 10:17:25'),
(2178, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 15-10-2024 à 14:46:48', '', NULL, '2024-10-15 13:46:48', '2024-10-15 13:46:48'),
(2179, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 16-10-2024 à 10:32:46', '', NULL, '2024-10-16 09:32:46', '2024-10-16 09:32:46'),
(2180, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 16-10-2024 à 15:27:27', '', NULL, '2024-10-16 14:27:27', '2024-10-16 14:27:27'),
(2181, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 17-10-2024 à 11:22:52', '', NULL, '2024-10-17 10:22:52', '2024-10-17 10:22:52'),
(2182, '1', 'Vous avez modifié l\'en-tête et le footer avec le titre Développeur-Intégrateur Unity .', '', NULL, '2024-10-17 11:10:51', '2024-10-17 11:10:51'),
(2183, '1', 'Vous avez modifié l\'en-tête et le footer avec le titre Développeur-Intégrateur Unity .', '', NULL, '2024-10-17 11:11:50', '2024-10-17 11:11:50'),
(2184, '1', 'Vous avez modifié l\'en-tête et le footer avec le titre Développeur-Intégrateur Unity .', '', NULL, '2024-10-17 11:12:09', '2024-10-17 11:12:09'),
(2185, '1', 'Vous avez modifié l\'en-tête et le footer avec le titre Développeur-Intégrateur Unit .', '', NULL, '2024-10-17 11:13:51', '2024-10-17 11:13:51'),
(2186, '1', 'Vous avez modifié l\'incident Aucun accès a iternete .', '', NULL, '2024-10-17 12:52:18', '2024-10-17 12:52:18'),
(2187, '1', 'Vous avez déclaré un incident.221', '', NULL, '2024-10-17 14:41:15', '2024-10-17 14:41:15'),
(2188, '1', 'Vous avez déclaré un incident.222', '', NULL, '2024-10-17 14:41:43', '2024-10-17 14:41:43'),
(2189, '1', 'Vous avez déclaré un incident.223', '', NULL, '2024-10-17 14:42:01', '2024-10-17 14:42:01'),
(2190, '1', 'Vous avez déclaré un incident.224', '', NULL, '2024-10-17 14:42:19', '2024-10-17 14:42:19'),
(2191, '1', 'Vous avez déclaré un incident.225', '', NULL, '2024-10-17 14:42:41', '2024-10-17 14:42:41'),
(2192, '1', 'Incident supprimé : {\"id\":225,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"17-10-2024 15:42:41\",\"Module\":\"yujikoll\",\"description\":\"gbhnjkuiyutyrtr\",\"cat\":5,\"hierarchie\":3,\"piece\":\"documents\\/incident\\/incident42.png\",\"etat\":null,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":null,\"affecter\":null,\"statut\":0,\"action\":null,\"created_at\":\"2024-10-17T15:42:41.000000Z\",\"updated_at\":\"2024-10-17T15:42:41.000000Z\"}', NULL, NULL, '2024-10-17 13:51:24', '2024-10-17 13:51:24'),
(2193, '1', 'Incident supprimé : {\"id\":224,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"17-10-2024 15:42:19\",\"Module\":\"jk,ujythyr\",\"description\":\"ghgjn,kui\",\"cat\":3,\"hierarchie\":3,\"piece\":\"documents\\/incident\\/incident42.png\",\"etat\":null,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":null,\"affecter\":null,\"statut\":0,\"action\":null,\"created_at\":\"2024-10-17T15:42:19.000000Z\",\"updated_at\":\"2024-10-17T15:42:19.000000Z\"}', NULL, NULL, '2024-10-17 13:51:30', '2024-10-17 13:51:30'),
(2194, '1', 'Incident supprimé : {\"id\":223,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"17-10-2024 15:42:01\",\"Module\":\"yhygyg\",\"description\":\"gbhj,ku;lipu\",\"cat\":2,\"hierarchie\":8,\"piece\":\"documents\\/incident\\/incident42.png\",\"etat\":null,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":null,\"affecter\":null,\"statut\":0,\"action\":null,\"created_at\":\"2024-10-17T15:42:01.000000Z\",\"updated_at\":\"2024-10-17T15:42:01.000000Z\"}', NULL, NULL, '2024-10-17 13:51:36', '2024-10-17 13:51:36'),
(2195, '1', 'Incident supprimé : {\"id\":222,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"17-10-2024 15:41:43\",\"Module\":\"erfr\",\"description\":\"yjuyikolyukiyjutrtr\",\"cat\":5,\"hierarchie\":3,\"piece\":\"documents\\/incident\\/incident41.png\",\"etat\":null,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":null,\"affecter\":null,\"statut\":0,\"action\":null,\"created_at\":\"2024-10-17T15:41:43.000000Z\",\"updated_at\":\"2024-10-17T15:41:43.000000Z\"}', NULL, NULL, '2024-10-17 13:51:42', '2024-10-17 13:51:42'),
(2196, '1', 'Incident supprimé : {\"id\":221,\"Service\":2,\"Emetteur\":1,\"DateEmission\":\"17-10-2024 15:41:15\",\"Module\":\"efefe\",\"description\":\"ghytujyiuyujtyrgez\",\"cat\":3,\"hierarchie\":3,\"piece\":\"documents\\/incident\\/incident41.png\",\"etat\":null,\"resolue\":null,\"avis\":null,\"sugg\":null,\"DateResolue\":null,\"affecter\":null,\"statut\":0,\"action\":null,\"created_at\":\"2024-10-17T15:41:15.000000Z\",\"updated_at\":\"2024-10-17T15:41:15.000000Z\"}', NULL, NULL, '2024-10-17 13:51:48', '2024-10-17 13:51:48'),
(2197, '1', 'Vous avez modifié l\'en-tête et le footer avec le titre Nom Entreprise .', '', NULL, '2024-10-17 13:53:39', '2024-10-17 13:53:39');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Role` bigint(20) UNSIGNED DEFAULT NULL,
  `Service` bigint(20) UNSIGNED DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Societe` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activereceiveincident` tinyint(4) DEFAULT 1,
  `user_action` bigint(20) UNSIGNED DEFAULT NULL,
  `action_save` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUser`, `nom`, `prenom`, `sexe`, `tel`, `mail`, `adresse`, `login`, `password`, `Role`, `Service`, `other`, `signature`, `auth`, `Societe`, `image`, `activereceiveincident`, `user_action`, `action_save`, `statut`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'DJIDAGBAGBA', 'S T Emmanuel', 'M', '61310573', 'emmanueldjidagbagba@gmail.com', 'Cotonou', 'kanths', 'com8397c8070f8bb39004be88e3fe65d27f2e23f52fdste', 1, 2, 'Analyste Concepteur; Développeur; DBA Oracle; Formateur;', NULL, NULL, NULL, '1727889644.jpg', 0, 1, 's', '0', NULL, '2022-01-26 10:06:01', '2024-10-02 16:20:44'),
(31, 'TEST', 'Dado', 'M', '61310573', 'touskanths@gmail.com', '', 'touskanths@gmail.com', 'com47824751721aec573f11fb268b0800733db9d016dste', 9, NULL, '', NULL, NULL, NULL, '1727889765.jpg', 0, 1, 's', NULL, NULL, '2024-07-16 21:30:59', '2024-10-02 16:22:45'),
(32, 'SUPER', 'ADMIN', 'M', '61000000', 'emmanueldjidagbagba@gmail.com', 'Cotonou', 'superadmin', 'com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste', 8, 2, '', NULL, '', 1, NULL, 1, 1, 's', '0', NULL, '2024-07-16 21:35:44', '2024-09-30 08:09:20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `action_menus`
--
ALTER TABLE `action_menus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `action_menu_acces`
--
ALTER TABLE `action_menu_acces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `action_outils`
--
ALTER TABLE `action_outils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorieoutils`
--
ALTER TABLE `categorieoutils`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `champscategorieoutils`
--
ALTER TABLE `champscategorieoutils`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `entete`
--
ALTER TABLE `entete`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gestionincidents`
--
ALTER TABLE `gestionincidents`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `gestionmaintenances`
--
ALTER TABLE `gestionmaintenances`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `gestionmaintenance_curatives`
--
ALTER TABLE `gestionmaintenance_curatives`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `hierarchies`
--
ALTER TABLE `hierarchies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `maintenance_curatives`
--
ALTER TABLE `maintenance_curatives`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`idMenu`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `outils`
--
ALTER TABLE `outils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `traces`
--
ALTER TABLE `traces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `action_menus`
--
ALTER TABLE `action_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `action_menu_acces`
--
ALTER TABLE `action_menu_acces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT pour la table `action_outils`
--
ALTER TABLE `action_outils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `categorieoutils`
--
ALTER TABLE `categorieoutils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `champscategorieoutils`
--
ALTER TABLE `champscategorieoutils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `entete`
--
ALTER TABLE `entete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `gestionincidents`
--
ALTER TABLE `gestionincidents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `gestionmaintenances`
--
ALTER TABLE `gestionmaintenances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `gestionmaintenance_curatives`
--
ALTER TABLE `gestionmaintenance_curatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `hierarchies`
--
ALTER TABLE `hierarchies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT pour la table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `maintenance_curatives`
--
ALTER TABLE `maintenance_curatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `idMenu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `outils`
--
ALTER TABLE `outils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `traces`
--
ALTER TABLE `traces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2198;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUser` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
