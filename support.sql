-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table bd_support. action_menus
CREATE TABLE IF NOT EXISTS `action_menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_dev` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.action_menus : ~62 rows (environ)
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
	(66, '17', 'Suppression d\'une maintenance enregistrer', 'delete_maint_admin', NULL, '2023-09-08 01:04:09', '2023-09-08 01:04:09');

-- Listage de la structure de table bd_support. action_menu_acces
CREATE TABLE IF NOT EXISTS `action_menu_acces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Menu` bigint unsigned DEFAULT NULL,
  `Role` bigint unsigned DEFAULT NULL,
  `ActionMenu` bigint unsigned DEFAULT NULL,
  `statut` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.action_menu_acces : ~112 rows (environ)
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
	(114, 18, 1, 61, 0, '2023-09-08 01:06:19', '2023-09-08 01:06:19');

-- Listage de la structure de table bd_support. categorieoutils
CREATE TABLE IF NOT EXISTS `categorieoutils` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.categorieoutils : ~3 rows (environ)
INSERT INTO `categorieoutils` (`id`, `action`, `libelle`, `created_at`, `updated_at`) VALUES
	(2, '1', 'Ordinateurs', '2023-08-29 22:38:17', '2023-09-08 08:58:58'),
	(4, '1', 'SIM', '2024-06-12 18:54:21', '2024-06-12 18:54:21'),
	(5, '1', 'Maison', '2024-07-09 22:07:03', '2024-07-09 22:07:03');

-- Listage de la structure de table bd_support. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmpCat` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.categories : ~5 rows (environ)
INSERT INTO `categories` (`id`, `action`, `libelle`, `tmpCat`, `created_at`, `updated_at`) VALUES
	(2, '1', 'Matériels', 24, '2022-04-06 15:27:20', '2022-06-12 22:40:52'),
	(3, '1', 'Logiciel interne', 48, '2022-04-20 16:08:19', '2022-06-12 22:41:26'),
	(4, '1', 'Logiciel externe', 72, '2022-06-12 22:41:45', '2022-06-12 22:41:45'),
	(5, '1', 'Connexion Internet', 12, '2022-06-12 22:42:27', '2022-06-12 22:42:27'),
	(6, '1', 'Connexion Internet Métier', 24, '2022-06-12 22:43:14', '2022-07-21 13:57:39');

-- Listage de la structure de table bd_support. champscategorieoutils
CREATE TABLE IF NOT EXISTS `champscategorieoutils` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoutil` bigint unsigned DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.champscategorieoutils : ~18 rows (environ)
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
	(23, '1', '', '', 5, 'date', '2024-07-09 22:08:14', '2024-07-09 22:08:14');

-- Listage de la structure de table bd_support. gestionmaintenances
CREATE TABLE IF NOT EXISTS `gestionmaintenances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `outil` bigint DEFAULT NULL,
  `maintenance` bigint DEFAULT NULL,
  `etat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `commentaireinf` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `commentaireuser` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `avisinf` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `avisuser` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `detailjson` varchar(255) DEFAULT NULL,
  `action` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table bd_support.gestionmaintenances : ~0 rows (environ)
INSERT INTO `gestionmaintenances` (`id`, `outil`, `maintenance`, `etat`, `commentaireinf`, `commentaireuser`, `avisinf`, `avisuser`, `detailjson`, `action`, `created_at`, `updated_at`) VALUES
	(5, 2, 5, 'Excellent', 'Je suis bien là', NULL, NULL, 'Excellent', '|sft|mjw|rdd|duc|dram|dcs|decr', 1, '2023-09-05 14:01:37', '2023-09-08 00:04:51');

-- Listage de la structure de table bd_support. hierarchies
CREATE TABLE IF NOT EXISTS `hierarchies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.hierarchies : ~3 rows (environ)
INSERT INTO `hierarchies` (`id`, `action`, `libelle`, `created_at`, `updated_at`) VALUES
	(2, '1', 'Gênant', '2022-04-06 16:17:00', '2022-04-06 16:17:00'),
	(3, '1', 'Bloquant', '2022-06-12 22:43:43', '2022-06-12 22:43:43'),
	(4, '1', 'Confort', '2022-06-14 10:34:38', '2022-06-14 10:34:38');

-- Listage de la structure de table bd_support. incidents
CREATE TABLE IF NOT EXISTS `incidents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Service` bigint unsigned DEFAULT NULL,
  `Emetteur` bigint unsigned DEFAULT NULL,
  `DateEmission` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Module` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cat` bigint unsigned DEFAULT NULL,
  `hierarchie` bigint unsigned DEFAULT NULL,
  `piece` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resolue` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avis` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sugg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `DateResolue` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affecter` int DEFAULT NULL,
  `statut` int DEFAULT '0',
  `action` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.incidents : ~2 rows (environ)
INSERT INTO `incidents` (`id`, `Service`, `Emetteur`, `DateEmission`, `Module`, `description`, `cat`, `hierarchie`, `piece`, `etat`, `resolue`, `avis`, `sugg`, `DateResolue`, `affecter`, `statut`, `action`, `created_at`, `updated_at`) VALUES
	(21, 5, 1, '16-09-2022', 'Outlook', 'Boite pleine', 3, 3, '', 'Incident résolu', NULL, 'Excellent', NULL, '2022-09-16', NULL, 1, 1, '2023-08-16 13:55:32', '2024-06-12 18:36:06'),
	(203, 2, 1, '09-07-2024 23:43:23', 'Ordinateur', 'Ma connexion internet ne marche pas.', 2, 3, '', 'En attente', NULL, 'Bien', 'bbrb', NULL, NULL, 0, NULL, '2024-07-09 22:43:23', '2024-07-09 21:45:00');

-- Listage de la structure de table bd_support. maintenances
CREATE TABLE IF NOT EXISTS `maintenances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `periodedebut` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `periodefin` varchar(20) DEFAULT NULL,
  `etat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `commentaire` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user` bigint DEFAULT NULL,
  `action` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table bd_support.maintenances : ~0 rows (environ)
INSERT INTO `maintenances` (`id`, `periodedebut`, `periodefin`, `etat`, `commentaire`, `user`, `action`, `created_at`, `updated_at`) VALUES
	(5, '2023-08-28', '2023-09-13', 'TRES BON', 'n', 1, 1, '2023-09-02 11:19:21', '2023-09-02 12:32:17');

-- Listage de la structure de table bd_support. menus
CREATE TABLE IF NOT EXISTS `menus` (
  `idMenu` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelleMenu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Topmenu_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_ordre` tinyint DEFAULT NULL,
  `order_ss` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `element_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_action` bigint unsigned DEFAULT NULL,
  `action_save` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.menus : ~14 rows (environ)
INSERT INTO `menus` (`idMenu`, `libelleMenu`, `titre_page`, `controller`, `route`, `Topmenu_id`, `num_ordre`, `order_ss`, `iconee`, `element_menu`, `statut`, `user_action`, `action_save`, `created_at`, `updated_at`) VALUES
	(2, 'Menus', 'Liste des menus', NULL, 'GM', '0', 6, NULL, '#', NULL, NULL, 1, NULL, '2022-06-14 15:09:03', '2022-10-28 16:45:18'),
	(3, 'Utilisateurs', 'Liste des utilisateurs', NULL, 'GU', '0', 5, NULL, '#', NULL, NULL, 1, NULL, '2022-06-14 15:29:29', '2022-06-15 10:20:05'),
	(4, 'Services', 'Liste des services', NULL, 'GS', '0', 3, NULL, '#', NULL, NULL, 1, NULL, '2022-06-14 15:36:18', '2022-06-15 10:20:25'),
	(5, 'Hiérarchies', 'Liste des hierarchies', NULL, 'GH', '0', 2, NULL, '#', NULL, NULL, 1, NULL, '2022-06-14 15:37:12', '2022-06-15 12:18:42'),
	(6, 'Catégories d\'incident', 'Liste des catégories d\'incident', NULL, 'GC', '0', 1, NULL, '#', NULL, NULL, 1, NULL, '2022-06-14 15:37:54', '2023-08-29 14:48:02'),
	(7, 'Déclaration d\'Incidents', 'Déclaration d\'Incidents', NULL, 'GI', '0', 10, NULL, '#', '500', NULL, 1, NULL, '2022-06-14 16:03:41', '2023-09-21 13:59:15'),
	(8, 'Gestion Incidents', 'Liste des incidents', NULL, 'GIA', '0', 9, NULL, '#', '500', NULL, 1, NULL, '2022-06-14 16:09:10', '2023-09-02 12:34:13'),
	(9, 'Tableau de bord', 'Tableau de bord', NULL, 'dashboard', '0', 8, NULL, '#', '500', NULL, 1, NULL, '2022-06-15 09:38:30', '2022-07-21 14:46:43'),
	(13, 'Rôles', 'Rôles', NULL, 'GR', '0', 4, NULL, '#', NULL, NULL, 1, NULL, '2022-08-30 17:29:53', '2022-08-30 17:44:27'),
	(14, 'Aide', 'Aide', NULL, 'MAD', '0', 14, NULL, '#', '500', NULL, 1, NULL, '2022-09-06 08:06:46', '2022-09-06 08:06:46'),
	(15, 'Outils', 'Outils', NULL, 'GO', '0', 13, NULL, '#', '500', NULL, 1, NULL, '2023-08-03 17:12:04', '2023-08-07 10:45:58'),
	(16, 'Catégories d\'outils', 'Catégories d\'outils', NULL, 'GCO', '0', 7, NULL, '#', NULL, NULL, 1, NULL, '2023-08-29 15:35:50', '2023-08-29 15:36:25'),
	(17, 'Gestion Maintenances', 'Gestion Maintenances', NULL, 'GMPC', '0', 12, NULL, '#', '500', NULL, 1, NULL, '2023-09-01 22:34:55', '2023-09-02 12:33:47'),
	(18, 'Maintenances', 'Maintenances', NULL, 'GMU', '0', 11, NULL, '#', '500', NULL, 1, NULL, '2023-09-02 12:35:23', '2023-09-08 00:25:46');

-- Listage de la structure de table bd_support. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.migrations : ~16 rows (environ)
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

-- Listage de la structure de table bd_support. outils
CREATE TABLE IF NOT EXISTS `outils` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` bigint DEFAULT NULL,
  `nameoutils` varchar(255) DEFAULT NULL,
  `categorie` bigint DEFAULT NULL,
  `otherjson` json DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `action` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table bd_support.outils : ~2 rows (environ)
INSERT INTO `outils` (`id`, `user`, `nameoutils`, `categorie`, `otherjson`, `etat`, `action`, `created_at`, `updated_at`) VALUES
	(2, 1, 'Ordinateur', 2, '{"m": "20", "momo": "KANTHS Toussaint", "tdpa": "cc", "delor": "cc", "mptut": "VV", "other": "", "squdu": "5", "steee": "c", "crooft": "cc", "oceseu": "c"}', NULL, 1, '2023-08-31 18:34:48', '2023-09-01 21:43:31'),
	(6, 1, 'LETTET', 4, '{"mer": "61505124", "opro": "Emmanuel", "teel": "2024-06-12", "other": ""}', NULL, 1, '2024-06-12 18:56:26', '2024-07-09 22:19:48');

-- Listage de la structure de table bd_support. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_action` bigint unsigned DEFAULT NULL,
  `action_save` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.roles : ~4 rows (environ)
INSERT INTO `roles` (`idRole`, `libelle`, `code`, `user_action`, `action_save`, `created_at`, `updated_at`) VALUES
	(1, 'Développeur', 'dev', 1, NULL, '2022-02-10 19:54:21', '2022-02-10 19:54:21'),
	(2, 'Administrateur', 'admin', 1, NULL, '2022-02-10 19:59:32', '2022-02-10 21:02:04'),
	(4, 'Services', 'serv', 1, NULL, '2022-06-15 12:14:58', '2022-06-15 12:14:58');

-- Listage de la structure de table bd_support. services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.services : ~3 rows (environ)
INSERT INTO `services` (`id`, `action`, `libelle`, `created_at`, `updated_at`) VALUES
	(2, '1', 'Service Informatique', '2022-06-29 09:34:27', '2022-07-11 10:50:04'),
	(9, '1', 'Direction Générale', '2022-07-01 08:42:16', '2022-07-01 08:42:16'),
	(10, '1', 'Externe', '2023-08-31 18:46:39', '2023-08-31 18:46:39');

-- Listage de la structure de table bd_support. traces
CREATE TABLE IF NOT EXISTS `traces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idsec` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1617 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.traces : ~163 rows (environ)
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
	(1418, '1', 'Data ancien : {"id":2,"user":1,"nameoutils":"Ordinateur","categorie":2,"otherjson":"{\\"m\\": \\"2\\", \\"momo\\": \\"KANTHS Toussaint\\", \\"tdpa\\": \\"cc\\", \\"delor\\": \\"cc\\", \\"mptut\\": \\"VV\\", \\"other\\": \\"\\", \\"squdu\\": \\"5\\", \\"steee\\": \\"c\\", \\"crooft\\": \\"cc\\", \\"oceseu\\": \\"c\\"}","etat":null,"action":1,"created_at":"2023-08-31T19:34:48.000000Z","updated_at":"2023-09-01T16:57:20.000000Z"}', '', NULL, '2023-09-01 21:43:31', '2023-09-01 21:43:31'),
	(1419, '1', 'Vous avez modifiée les informations de Ordinateur .', 'outil', 2, '2023-09-01 21:43:31', '2023-09-01 21:43:31'),
	(1420, '1', 'Data ancien : {"id":1,"user":2,"nameoutils":null,"categorie":3,"otherjson":"{\\"mer\\": \\"555\\", \\"other\\": \\"\\", \\"teeto\\": \\"2023-08-22\\", \\"texpi\\": \\"2023-09-01\\", \\"eraeur\\": \\"bvbbv\\"}","etat":null,"action":1,"created_at":"2023-08-31T18:46:29.000000Z","updated_at":"2023-09-01T16:56:34.000000Z"}', '', NULL, '2023-09-01 21:44:19', '2023-09-01 21:44:19'),
	(1421, '1', 'Vous avez modifiée les informations de  .', 'outil', 1, '2023-09-01 21:44:19', '2023-09-01 21:44:19'),
	(1422, '1', 'Data delete : {"id":1,"user":2,"nameoutils":null,"categorie":3,"otherjson":"{\\"mer\\": \\"61310573\\", \\"other\\": \\"\\", \\"teeto\\": \\"2023-08-22\\", \\"texpi\\": \\"2023-09-01\\", \\"eraeur\\": \\"bvbbv\\"}","etat":null,"action":1,"created_at":"2023-08-31T18:46:29.000000Z","updated_at":"2023-09-01T22:44:19.000000Z"}', '', NULL, '2023-09-01 22:04:41', '2023-09-01 22:04:41'),
	(1423, '1', 'Data delete : {"id":1,"user":2,"nameoutils":null,"categorie":3,"otherjson":"{\\"mer\\": \\"61310573\\", \\"other\\": \\"\\", \\"teeto\\": \\"2023-08-22\\", \\"texpi\\": \\"2023-09-01\\", \\"eraeur\\": \\"bvbbv\\"}","etat":null,"action":1,"created_at":"2023-08-31T18:46:29.000000Z","updated_at":"2023-09-01T22:44:19.000000Z"}', '', NULL, '2023-09-01 22:05:08', '2023-09-01 22:05:08'),
	(1424, '1', 'Vous avez enregistrée l\'outil 61310573 .', '', NULL, '2023-09-01 22:06:14', '2023-09-01 22:06:14'),
	(1425, '1', 'Vous avez affecter `61310573` à l\'utilisateur MADJA Karelle', 'outil', 4, '2023-09-01 22:06:33', '2023-09-01 22:06:33'),
	(1426, '1', 'Vous avez défini l\'état de l\'outil 61310573 à `TRES BON``. <br> OUi', 'outil', 4, '2023-09-01 22:29:18', '2023-09-01 22:29:18'),
	(1427, '1', 'Vous avez enregistré le menu Maintenances.', '', NULL, '2023-09-01 22:34:55', '2023-09-01 22:34:55'),
	(1428, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 01-09-2023 à 23:38:58', '', NULL, '2023-09-01 22:38:58', '2023-09-01 22:38:58'),
	(1429, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 02-09-2023 à 08:32:30', '', NULL, '2023-09-02 07:32:30', '2023-09-02 07:32:30'),
	(1430, '1', 'Vous avez programmer une maintenance pour la période du 2023-09-21 au 2023-09-05 .', '', NULL, '2023-09-02 11:19:21', '2023-09-02 11:19:21'),
	(1431, '1', 'Vous avez programmer une maintenance pour la période du 2023-08-29 au 2023-09-07 .', '', NULL, '2023-09-02 11:41:31', '2023-09-02 11:41:31'),
	(1432, '1', 'Data existant : {"id":5,"periodedebut":"2023-09-21","periodefin":"2023-09-05","etat":null,"commentaire":null,"user":1,"action":1,"created_at":"2023-09-02T12:19:21.000000Z","updated_at":"2023-09-02T12:19:21.000000Z"}', '', NULL, '2023-09-02 11:44:51', '2023-09-02 11:44:51'),
	(1433, '1', 'Vous avez défini l\'état de la maintenance de la période du `2023-09-21 2023-09-05` à TRES BON``. <br> n', '', NULL, '2023-09-02 11:44:51', '2023-09-02 11:44:51'),
	(1434, '1', 'Data delete : {"id":6,"periodedebut":"2023-08-29","periodefin":"2023-09-07","etat":null,"commentaire":null,"user":1,"action":1,"created_at":"2023-09-02T12:41:31.000000Z","updated_at":"2023-09-02T12:41:31.000000Z"}', '', NULL, '2023-09-02 12:09:16', '2023-09-02 12:09:16'),
	(1435, '1', 'Data ancien : {"id":5,"periodedebut":"2023-09-21","periodefin":"2023-09-05","etat":"TRES BON","commentaire":"n","user":1,"action":1,"created_at":"2023-09-02T12:19:21.000000Z","updated_at":"2023-09-02T12:44:51.000000Z"}', '', NULL, '2023-09-02 12:31:30', '2023-09-02 12:31:30'),
	(1436, '1', 'Vous avez modifiée les informations de la période de 2023-09-21 au 2023-09-05  en 2023-09-21 au 2023-09-13', '', NULL, '2023-09-02 12:31:30', '2023-09-02 12:31:30'),
	(1437, '1', 'Data ancien : {"id":5,"periodedebut":"2023-09-21","periodefin":"2023-09-13","etat":"TRES BON","commentaire":"n","user":1,"action":1,"created_at":"2023-09-02T12:19:21.000000Z","updated_at":"2023-09-02T13:31:30.000000Z"}', '', NULL, '2023-09-02 12:31:33', '2023-09-02 12:31:33'),
	(1438, '1', 'Vous avez modifiée les informations de la période de 2023-09-21 au 2023-09-13  en 2023-09-21 au 2023-09-13', '', NULL, '2023-09-02 12:31:33', '2023-09-02 12:31:33'),
	(1439, '1', 'Data ancien : {"id":5,"periodedebut":"2023-09-21","periodefin":"2023-09-13","etat":"TRES BON","commentaire":"n","user":1,"action":1,"created_at":"2023-09-02T12:19:21.000000Z","updated_at":"2023-09-02T13:31:33.000000Z"}', '', NULL, '2023-09-02 12:32:17', '2023-09-02 12:32:17'),
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
	(1455, '1', 'Data ancien : {"id":5,"outil":2,"maintenance":5,"etat":"Excellent","commentaireinf":null,"commentaireuser":null,"avisinf":null,"avisuser":null,"detailjson":"|sft|mjw|dram|decr","action":1,"created_at":"2023-09-05T15:01:37.000000Z","updated_at":"2023-09-05T15:01:37.000000Z"}', '', NULL, '2023-09-07 20:01:23', '2023-09-07 20:01:23'),
	(1456, '1', 'Data ancien : {"id":5,"outil":2,"maintenance":5,"etat":null,"commentaireinf":null,"commentaireuser":null,"avisinf":null,"avisuser":null,"detailjson":"|sft|mjw|duc|dram|dcs|decr","action":1,"created_at":"2023-09-05T15:01:37.000000Z","updated_at":"2023-09-07T21:01:23.000000Z"}', '', NULL, '2023-09-07 20:04:22', '2023-09-07 20:04:22'),
	(1457, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 20:04:22', '2023-09-07 20:04:22'),
	(1458, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 07-09-2023 à 23:31:53', '', NULL, '2023-09-07 22:31:53', '2023-09-07 22:31:53'),
	(1459, '1', 'Data ancien : {"id":5,"outil":2,"maintenance":5,"etat":null,"commentaireinf":null,"commentaireuser":null,"avisinf":null,"avisuser":null,"detailjson":"|sft|mjw|duc|dram|dcs|decr","action":1,"created_at":"2023-09-05T15:01:37.000000Z","updated_at":"2023-09-07T21:04:22.000000Z"}', '', NULL, '2023-09-07 22:32:16', '2023-09-07 22:32:16'),
	(1460, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 22:32:16', '2023-09-07 22:32:16'),
	(1461, '1', 'Data ancien : {"id":5,"outil":2,"maintenance":5,"etat":null,"commentaireinf":"Je suis bien l\\u00e0","commentaireuser":null,"avisinf":null,"avisuser":null,"detailjson":"|mjw|rdd|duc|dram|dcs|decr","action":1,"created_at":"2023-09-05T15:01:37.000000Z","updated_at":"2023-09-07T23:32:16.000000Z"}', '', NULL, '2023-09-07 22:33:23', '2023-09-07 22:33:23'),
	(1462, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 22:33:23', '2023-09-07 22:33:23'),
	(1463, '1', 'Data ancien : {"id":5,"outil":2,"maintenance":5,"etat":null,"commentaireinf":"Je suis bien l\\u00e0","commentaireuser":null,"avisinf":null,"avisuser":null,"detailjson":"|sft|mjw|rdd|duc|dram|dcs|decr","action":1,"created_at":"2023-09-05T15:01:37.000000Z","updated_at":"2023-09-07T23:33:23.000000Z"}', '', NULL, '2023-09-07 22:40:24', '2023-09-07 22:40:24'),
	(1464, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 22:40:24', '2023-09-07 22:40:24'),
	(1465, '1', 'Data ancien : {"id":5,"outil":2,"maintenance":5,"etat":null,"commentaireinf":"Je suis bien l\\u00e0","commentaireuser":null,"avisinf":null,"avisuser":null,"detailjson":"|sft|mjw|rdd|duc|dram|dcs|decr","action":1,"created_at":"2023-09-05T15:01:37.000000Z","updated_at":"2023-09-07T23:40:24.000000Z"}', '', NULL, '2023-09-07 22:40:36', '2023-09-07 22:40:36'),
	(1466, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 22:40:36', '2023-09-07 22:40:36'),
	(1467, '1', 'Data ancien : {"id":5,"outil":2,"maintenance":5,"etat":"Bien","commentaireinf":"Je suis bien l\\u00e0","commentaireuser":null,"avisinf":null,"avisuser":null,"detailjson":"|sft|mjw|rdd|duc|dram|dcs|decr","action":1,"created_at":"2023-09-05T15:01:37.000000Z","updated_at":"2023-09-07T23:40:36.000000Z"}', '', NULL, '2023-09-07 22:40:47', '2023-09-07 22:40:47'),
	(1468, '1', 'Vous avez modifiée les informations de la période du 2023-08-28 au 2023-09-13 sur l\'ordinateur Ordinateur.', '', NULL, '2023-09-07 22:40:47', '2023-09-07 22:40:47'),
	(1469, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 00:22:44', '', NULL, '2023-09-07 23:22:44', '2023-09-07 23:22:44'),
	(1470, '1', 'Vous avez modifié le menu Maintenances.', '', NULL, '2023-09-08 00:25:46', '2023-09-08 00:25:46'),
	(1471, '1', 'Action "Ajouter un outil" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:27:14', '2023-09-08 00:27:14'),
	(1472, '1', 'Action "Modification de l\'état d\'outil" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:29:17', '2023-09-08 00:29:17'),
	(1473, '1', 'Action "Réaffectation d\'outil à un autre utilisateur" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:30:19', '2023-09-08 00:30:19'),
	(1474, '1', 'Action "Affectation d\'outil à un utilisateur" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:31:21', '2023-09-08 00:31:21'),
	(1475, '1', 'Action "Historique de l\'outil" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:33:54', '2023-09-08 00:33:54'),
	(1476, '1', 'Action "Caractéritiques d\'outils" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:35:53', '2023-09-08 00:35:53'),
	(1477, '1', 'Action "Modification des caractéristiques de l\'outil" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:38:18', '2023-09-08 00:38:18'),
	(1478, '1', 'Action "Suppression d\'outil" ajouté à Outils effectuée avec succès.', '', NULL, '2023-09-08 00:40:29', '2023-09-08 00:40:29'),
	(1479, '1', 'Action "Enregistrer un catégorie" ajouté à Catégories d\'outils effectuée avec succès.', '', NULL, '2023-09-08 00:42:43', '2023-09-08 00:42:43'),
	(1480, '1', 'Action "Modification de catégorie" ajouté à Catégories d\'outils effectuée avec succès.', '', NULL, '2023-09-08 00:43:22', '2023-09-08 00:43:22'),
	(1481, '1', 'Action "Suppression de catégorie" ajouté à Catégories d\'outils effectuée avec succès.', '', NULL, '2023-09-08 00:44:18', '2023-09-08 00:44:18'),
	(1482, '1', 'Action "Définitions des champs caractéristisques de la catégorie d\'outil" ajouté à Catégories d\'outils effectuée avec succès.', '', NULL, '2023-09-08 00:45:23', '2023-09-08 00:45:23'),
	(1483, '1', 'Action "Programmer une maintenance" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:47:28', '2023-09-08 00:47:28'),
	(1484, '1', 'Action "Définition de l\'état" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:48:36', '2023-09-08 00:48:36'),
	(1485, '1', 'Action "Imprimer l\'état de la maintenance globale d\'une période en pdf" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:50:12', '2023-09-08 00:50:12'),
	(1486, '1', 'Action "Imprimer l\'état de la maintenance globale d\'une période en excel" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:51:08', '2023-09-08 00:51:08'),
	(1487, '1', 'Action "Afficher les détails de la maintenance d\'une période" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:51:53', '2023-09-08 00:51:53'),
	(1488, '1', 'Action "Modification d\'une maintenance programmer" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:53:24', '2023-09-08 00:53:24'),
	(1489, '1', 'Action "Supprimer une maintenance programmer" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:54:10', '2023-09-08 00:54:10'),
	(1490, '1', 'Action "Imprimer l\'état de la maintenance d\'une période en pdf" ajouté à Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:56:25', '2023-09-08 00:56:25'),
	(1491, '1', 'Action "Détails de la maintenance" ajouté à Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:58:00', '2023-09-08 00:58:00'),
	(1492, '1', 'Action "Commentaire" ajouté à Maintenances effectuée avec succès.', '', NULL, '2023-09-08 00:59:15', '2023-09-08 00:59:15'),
	(1493, '1', 'Action "Enregistrement de la maintenance effectuée" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 01:01:11', '2023-09-08 01:01:11'),
	(1494, '1', 'Action "Imprimer l\'état de la maintenance d\'une période en pdf" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 01:01:56', '2023-09-08 01:01:56'),
	(1495, '1', 'Action "Détails de la maintenance" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 01:02:29', '2023-09-08 01:02:29'),
	(1496, '1', 'Action "Modification d\'une maintenance enregistrer" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 01:03:33', '2023-09-08 01:03:33'),
	(1497, '1', 'Action "Suppression d\'une maintenance enregistrer" ajouté à Gestion Maintenances effectuée avec succès.', '', NULL, '2023-09-08 01:04:09', '2023-09-08 01:04:09'),
	(1498, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 02:09:58', '', NULL, '2023-09-08 01:09:58', '2023-09-08 01:09:58'),
	(1499, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 02:13:30', '', NULL, '2023-09-08 01:13:30', '2023-09-08 01:13:30'),
	(1500, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 02:16:35', '', NULL, '2023-09-08 01:16:35', '2023-09-08 01:16:35'),
	(1501, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 08-09-2023 à 09:34:46', '', NULL, '2023-09-08 08:34:46', '2023-09-08 08:34:46'),
	(1502, '1', 'Catégorie d\'outil supprimé : {"id":3,"action":"1","libelle":"SIM","created_at":"2023-08-31T09:06:13.000000Z","updated_at":"2023-08-31T09:06:13.000000Z"}', NULL, NULL, '2023-09-08 08:56:03', '2023-09-08 08:56:03'),
	(1503, '1', 'Vous avez modifié la catégorie  .', '', NULL, '2023-09-08 08:58:58', '2023-09-08 08:58:58'),
	(1504, '1', 'Vous avez enregistrée le champ suivant toto dans la catégorie toto .', '', NULL, '2023-09-08 09:09:25', '2023-09-08 09:09:25'),
	(1505, '1', 'Vous avez enregistrée l\'outil dd .', '', NULL, '2023-09-08 09:18:59', '2023-09-08 09:18:59'),
	(1506, '1', 'Vous avez affecter `dd` à l\'utilisateur DJIDAGBAGBA S T Emmanuel', 'outil', 5, '2023-09-08 09:20:24', '2023-09-08 09:20:24'),
	(1507, '1', 'Vous avez retiré `dd` à DJIDAGBAGBA S T Emmanuel et réaffecté à DOCHAMOU Magloire', 'outil', 5, '2023-09-08 09:23:00', '2023-09-08 09:23:00'),
	(1508, '1', 'Data delete : {"id":5,"user":7,"nameoutils":"dd","categorie":2,"otherjson":"{\\"m\\": \\"1\\", \\"momo\\": \\"d\\", \\"tdpa\\": \\"dd\\", \\"delor\\": \\"cc\\", \\"mptut\\": \\"d\\", \\"other\\": \\"\\", \\"squdu\\": \\"24\\", \\"steee\\": \\"dd\\", \\"crooft\\": \\"d\\", \\"oceseu\\": \\"d\\"}","etat":null,"action":1,"created_at":"2023-09-08T10:18:59.000000Z","updated_at":"2023-09-08T10:23:00.000000Z"}', '', NULL, '2023-09-08 09:27:23', '2023-09-08 09:27:23'),
	(1509, '1', 'Data delete : {"id":4,"user":14,"nameoutils":"61310573","categorie":3,"otherjson":"{\\"mer\\": \\"61310573\\", \\"other\\": \\"\\", \\"teeto\\": \\"2023-09-07\\", \\"texpi\\": \\"2023-09-07\\", \\"eraeur\\": \\"mtn\\"}","etat":"TRES BON","action":1,"created_at":"2023-09-01T23:06:14.000000Z","updated_at":"2023-09-01T23:29:18.000000Z"}', '', NULL, '2023-09-08 09:27:34', '2023-09-08 09:27:34'),
	(1510, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":2,"nom":"KPOVIHOUEDE","prenom":"Roger","sexe":"M","tel":"","mail":"roger.kpovihouede@groupensia.com","adresse":"","login":"kpovihouede.ro","password":"com7110eda4d09e062aa5e4a390b0a572ac0d2c0220dste","Role":2,"Service":2,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-04-27T13:44:38.000000Z","updated_at":"2022-04-27T14:30:19.000000Z"}.', '', NULL, '2023-09-08 09:42:34', '2023-09-08 09:42:34'),
	(1511, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":3,"nom":"STAGE","prenom":"Vie BENIN","sexe":"M","tel":"","mail":"","adresse":"Bp250","login":"stagiaire.viebenin","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":2,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-06-29T13:28:17.000000Z","updated_at":"2023-04-26T12:11:25.000000Z"}.', '', NULL, '2023-09-08 09:42:40', '2023-09-08 09:42:40'),
	(1512, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":4,"nom":"TOGBONON","prenom":"CHANTAL","sexe":"F","tel":"","mail":"chantal.togbonon@groupensia.com","adresse":"NSIA Vie Assurances","login":"chantal.togbonon","password":"comac1ab23d6288711be64a25bf13432baf1e60b2bddste","Role":4,"Service":3,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-07-01T09:19:08.000000Z","updated_at":"2022-07-01T09:22:35.000000Z"}.', '', NULL, '2023-09-08 09:42:42', '2023-09-08 09:42:42'),
	(1513, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":6,"nom":"GOUTONDJI","prenom":"Thierry","sexe":"M","tel":"21365444","mail":"thierry.goutondji@groupensia.com","adresse":"","login":"goutondji.th","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":7,"other":"DC&amp; DTSI","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:36:27.000000Z","updated_at":"2022-09-05T15:23:10.000000Z"}.', '', NULL, '2023-09-08 09:42:44', '2023-09-08 09:42:44'),
	(1514, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":7,"nom":"DOCHAMOU","prenom":"Magloire","sexe":"M","tel":"21365402","mail":"magloire.dochamou@groupensia.com","adresse":"","login":"magloire.dochamou","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":9,"other":"DG","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:37:37.000000Z","updated_at":"2022-09-05T15:23:18.000000Z"}.', '', NULL, '2023-09-08 09:42:45', '2023-09-08 09:42:45'),
	(1515, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":8,"nom":"HOUETOHOSSOU","prenom":"Styve","sexe":"M","tel":"21365534","mail":"styve.houetohossou@groupensia.com","adresse":"","login":"styve.houetohossou","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":7,"other":"Assistant  CSMA","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:39:13.000000Z","updated_at":"2022-09-05T15:23:26.000000Z"}.', '', NULL, '2023-09-08 09:42:47', '2023-09-08 09:42:47'),
	(1516, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":9,"nom":"KOUAKANOU","prenom":"C\\u00e9dric","sexe":"M","tel":"21365533","mail":"cedric.koukanou@groupensia.com","adresse":"","login":"cedric.kouakanou","password":"come0ad0bafd4e55c56d88393578f197fd08c4f8a40dste","Role":4,"Service":5,"other":"Responsable service encaissement","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:41:21.000000Z","updated_at":"2023-04-26T12:15:07.000000Z"}.', '', NULL, '2023-09-08 09:42:48', '2023-09-08 09:42:48'),
	(1517, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":10,"nom":"DANMINTONDE","prenom":"Rosine","sexe":"F","tel":"21365486","mail":"rosine.danmitonde@groupensia.com","adresse":"","login":"rosine.danmitonde","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":5,"other":"Chef Service Production","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:42:48.000000Z","updated_at":"2022-09-05T15:23:43.000000Z"}.', '', NULL, '2023-09-08 09:42:50', '2023-09-08 09:42:50'),
	(1518, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":11,"nom":"DANSOU","prenom":"juste","sexe":"M","tel":"21365491","mail":"juste.dansou@groupensia.com","adresse":"","login":"juste.dansou","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":9,"other":"Auditeur interne","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:44:02.000000Z","updated_at":"2022-09-05T15:23:51.000000Z"}.', '', NULL, '2023-09-08 09:42:51', '2023-09-08 09:42:51'),
	(1519, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":12,"nom":"ZOSSOU","prenom":"Corrine","sexe":"F","tel":"21365531","mail":"corrine.zossou@groupensia.com","adresse":"","login":"corrine.zossou","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":5,"other":"Responsable Service r\\u00e9assurance","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:45:13.000000Z","updated_at":"2022-09-05T15:23:59.000000Z"}.', '', NULL, '2023-09-08 09:42:53', '2023-09-08 09:42:53'),
	(1520, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":13,"nom":"BOCO","prenom":"Urbain","sexe":"M","tel":"21365483","mail":"urbain.boco@groupensia.com","adresse":"","login":"boco.ur","password":"com1cf65b224a4cd91a4c4f0dc856e94a56ce131462dste","Role":4,"Service":7,"other":"Chef Service Individuel","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:46:37.000000Z","updated_at":"2023-08-07T18:07:36.000000Z"}.', '', NULL, '2023-09-08 09:42:54', '2023-09-08 09:42:54'),
	(1521, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":14,"nom":"MADJA","prenom":"Karelle","sexe":"F","tel":"21365485","mail":"karelle.madja@groupensia.com","adresse":"","login":"madja.ka","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":7,"other":"Chef Service Gestion Client\\u00e8le","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:48:02.000000Z","updated_at":"2022-09-05T15:24:16.000000Z"}.', '', NULL, '2023-09-08 09:42:56', '2023-09-08 09:42:56'),
	(1522, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":15,"nom":"DOS-REIS","prenom":"Pegghy","sexe":"F","tel":"","mail":"pegghy.dosreis@groupensia.com","adresse":"","login":"dosreis.pe","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":7,"other":"Chef Service Micro Assurance","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:49:23.000000Z","updated_at":"2022-09-05T15:24:40.000000Z"}.', '', NULL, '2023-09-08 09:42:58', '2023-09-08 09:42:58'),
	(1523, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":16,"nom":"DASSI","prenom":"Boris","sexe":"M","tel":"21365422","mail":"boris.dassi@groupensia.com","adresse":"","login":"boris.dassi","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":8,"other":"Chef Service Moyens G\\u00e9n\\u00e9raux","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:51:48.000000Z","updated_at":"2022-09-05T15:24:50.000000Z"}.', '', NULL, '2023-09-08 09:42:59', '2023-09-08 09:42:59'),
	(1524, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":17,"nom":"ADANMENOUKON","prenom":"K\\u00e9vin","sexe":"M","tel":"21365423","mail":"kevin.adanmenoukon@groupensia.com","adresse":"","login":"kevin.adanmenoukon","password":"com7c4a8d09ca3762af61e59520943dc26494f8941bdste","Role":4,"Service":8,"other":"CDAF","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:53:06.000000Z","updated_at":"2022-12-08T18:28:09.000000Z"}.', '', NULL, '2023-09-08 09:43:01', '2023-09-08 09:43:01'),
	(1525, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":18,"nom":"KODJA","prenom":"Roger","sexe":"M","tel":"21365492","mail":"roger.kodja@groupensia.com","adresse":"","login":"kodja.ro","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":8,"other":"Chef Service Contr\\u00f4le de Gestion","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:54:59.000000Z","updated_at":"2022-09-05T15:25:16.000000Z"}.', '', NULL, '2023-09-08 09:43:05', '2023-09-08 09:43:05'),
	(1526, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":19,"nom":"GNANVOSSOU","prenom":"Prixille","sexe":"F","tel":"21365489","mail":"prixille.gnanvossou@groupensia.com","adresse":"","login":"prixille.gnanvossou","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":7,"other":"Assistante  Gestion Client\\u00e8le","signature":null,"auth":"","Societe":1,"image":null,"user_action":2,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T14:56:23.000000Z","updated_at":"2022-09-05T15:25:25.000000Z"}.', '', NULL, '2023-09-08 09:43:07', '2023-09-08 09:43:07'),
	(1527, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":20,"nom":"DOSSOU","prenom":"Elis\\u00e9e","sexe":"M","tel":"","mail":"elisee.dossou@groupensia.com","adresse":"","login":"elisee.dossou","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":5,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T16:52:35.000000Z","updated_at":"2023-04-26T12:11:38.000000Z"}.', '', NULL, '2023-09-08 09:43:08', '2023-09-08 09:43:08'),
	(1528, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":21,"nom":"MADJID","prenom":"AMADOU","sexe":"M","tel":"","mail":"madjid.amadou@groupensia.com","adresse":"","login":"madjid.amadou","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":5,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T16:53:59.000000Z","updated_at":"2022-09-05T16:56:56.000000Z"}.', '', NULL, '2023-09-08 09:43:10', '2023-09-08 09:43:10'),
	(1529, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":22,"nom":"CHOKKI","prenom":"Jos\\u00e9","sexe":"M","tel":"","mail":"jose.chokki@groupensia.com","adresse":"","login":"jose.chokki","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":8,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T16:55:18.000000Z","updated_at":"2022-09-05T17:03:27.000000Z"}.', '', NULL, '2023-09-08 09:43:13', '2023-09-08 09:43:13'),
	(1530, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":23,"nom":"ADJAFFON","prenom":"Edmond","sexe":"M","tel":"","mail":"edmond.adjaffon@groupensia.com","adresse":"","login":"edmond.adjaffon","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":8,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-05T16:56:50.000000Z","updated_at":"2022-09-05T17:03:34.000000Z"}.', '', NULL, '2023-09-08 09:43:14', '2023-09-08 09:43:14'),
	(1531, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":24,"nom":"ADJANOHOUN","prenom":"Scarlett","sexe":"F","tel":"","mail":"scarlett.adjanohoun@groupensia.com","adresse":"","login":"scarlett.adjanohoun","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":7,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-16T09:11:19.000000Z","updated_at":"2022-09-16T09:11:42.000000Z"}.', '', NULL, '2023-09-08 09:43:16', '2023-09-08 09:43:16'),
	(1532, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":25,"nom":"SEGLA","prenom":"Aurore","sexe":"F","tel":"","mail":"aurore.segla@groupensia.com","adresse":"","login":"aurore.segla","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":8,"other":"Caissi\\u00e8re","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-09-16T15:12:00.000000Z","updated_at":"2022-09-16T15:12:09.000000Z"}.', '', NULL, '2023-09-08 09:43:17', '2023-09-08 09:43:17'),
	(1533, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":26,"nom":"GNAHO","prenom":"Kelly","sexe":"F","tel":"","mail":"kelly.gnaho@groupensia.com","adresse":"NSIA Vie Assurances","login":"kelly.gnaho","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":5,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2022-10-28T13:50:47.000000Z","updated_at":"2022-10-28T13:51:22.000000Z"}.', '', NULL, '2023-09-08 09:43:19', '2023-09-08 09:43:19'),
	(1534, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":27,"nom":"Archives","prenom":"Archives","sexe":"M","tel":"","mail":"boristossa311@gmail.com","adresse":"","login":"archives","password":"comc7bd800216b6f6b99eef25604cc5f06970680bf5dste","Role":4,"Service":5,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2023-04-25T09:21:42.000000Z","updated_at":"2023-04-25T10:32:18.000000Z"}.', '', NULL, '2023-09-08 09:43:22', '2023-09-08 09:43:22'),
	(1535, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":28,"nom":"HOUNKPONOU","prenom":"Corinne","sexe":"F","tel":"","mail":"corinne.hounkponou@nsiaassurances.com","adresse":"","login":"corinne.hounkponou","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":5,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2023-05-11T19:17:26.000000Z","updated_at":"2023-05-12T08:48:10.000000Z"}.', '', NULL, '2023-09-08 09:43:25', '2023-09-08 09:43:25'),
	(1536, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":29,"nom":"BONOU","prenom":"P\\u00e2come","sexe":"M","tel":"","mail":"pacome.bonou@nsiaassurances.com","adresse":"","login":"pacome.bonou","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":7,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2023-05-12T08:47:49.000000Z","updated_at":"2023-05-12T08:48:05.000000Z"}.', '', NULL, '2023-09-08 09:43:26', '2023-09-08 09:43:26'),
	(1537, NULL, 'Vous avez supprimé le compte dont les informations sont les suivants : {"idUser":30,"nom":"KINGNIDE","prenom":"Lucresse","sexe":"F","tel":"","mail":"lucresse.kingnide@nsiaassurances.com","adresse":"","login":"lucresse.kingnide","password":"com40bd001563085fc35165329ea1ff5c5ecbdbbeefdste","Role":4,"Service":7,"other":"","signature":null,"auth":"","Societe":1,"image":null,"user_action":1,"action_save":"s","statut":"0","remember_token":null,"created_at":"2023-06-14T10:21:37.000000Z","updated_at":"2023-08-24T09:53:33.000000Z"}.', '', NULL, '2023-09-08 09:43:28', '2023-09-08 09:43:28'),
	(1538, '1', 'Service supprimé : {"id":3,"action":"1","libelle":"Ressource Humaine","created_at":"2022-07-01T09:37:32.000000Z","updated_at":"2022-07-01T09:37:32.000000Z"}', NULL, NULL, '2023-09-08 09:44:23', '2023-09-08 09:44:23'),
	(1539, '1', 'Service supprimé : {"id":5,"action":"1","libelle":"Direction Technique","created_at":"2022-07-01T09:39:28.000000Z","updated_at":"2022-07-01T09:39:28.000000Z"}', NULL, NULL, '2023-09-08 09:44:28', '2023-09-08 09:44:28'),
	(1540, '1', 'Service supprimé : {"id":7,"action":"1","libelle":"Direction du d\\u00e9veloppement Commercial","created_at":"2022-07-01T09:40:00.000000Z","updated_at":"2022-07-01T09:40:00.000000Z"}', NULL, NULL, '2023-09-08 09:44:31', '2023-09-08 09:44:31'),
	(1541, '1', 'Service supprimé : {"id":8,"action":"1","libelle":"D\\u00e9partement Administratif et Financier","created_at":"2022-07-01T09:41:07.000000Z","updated_at":"2022-07-01T09:41:07.000000Z"}', NULL, NULL, '2023-09-08 09:44:34', '2023-09-08 09:44:34'),
	(1542, '1', 'Rôle supprimé : {"idRole":5,"libelle":"Stagiaire","code":"stag","user_action":1,"action_save":null,"created_at":"2023-08-31T19:47:05.000000Z","updated_at":"2023-08-31T19:47:05.000000Z"}', NULL, NULL, '2023-09-08 09:50:39', '2023-09-08 09:50:39'),
	(1543, '1', 'Rôle supprimé : {"idRole":6,"libelle":"Partenaire","code":"part","user_action":1,"action_save":null,"created_at":"2023-08-31T19:47:19.000000Z","updated_at":"2023-08-31T19:47:19.000000Z"}', NULL, NULL, '2023-09-08 09:50:42', '2023-09-08 09:50:42'),
	(1544, '1', 'Rôle supprimé : {"idRole":7,"libelle":"Commerciaux","code":"comx","user_action":1,"action_save":null,"created_at":"2023-08-31T19:47:41.000000Z","updated_at":"2023-08-31T19:47:41.000000Z"}', NULL, NULL, '2023-09-08 09:50:44', '2023-09-08 09:50:44'),
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
	(1598, '1', 'DJIDAGBAGBA S T Emmanuel! Vous vous êtes bien connecté aujourd\'hui 11-06-2024 à 17:04:12', '', NULL, '2024-06-11 16:04:12', '2024-06-11 16:04:12'),
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
	(1616, '1', 'Vous avez affecter `LETTET` à l\'utilisateur DJIDAGBAGBA S T Emmanuel', 'outil', 6, '2024-07-09 22:19:48', '2024-07-09 22:19:48');

-- Listage de la structure de table bd_support. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUser` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Role` bigint unsigned DEFAULT NULL,
  `Service` bigint unsigned DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Societe` bigint unsigned DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activereceiveincident` tinyint DEFAULT '1',
  `user_action` bigint unsigned DEFAULT NULL,
  `action_save` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_support.utilisateurs : ~1 rows (environ)
INSERT INTO `utilisateurs` (`idUser`, `nom`, `prenom`, `sexe`, `tel`, `mail`, `adresse`, `login`, `password`, `Role`, `Service`, `other`, `signature`, `auth`, `Societe`, `image`, `activereceiveincident`, `user_action`, `action_save`, `statut`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'DJIDAGBAGBA', 'S T Emmanuel', 'M', '61310573', 'emmanueldjidagbagba@gmail.com', 'Cotonou', 'kanths', 'com8397c8070f8bb39004be88e3fe65d27f2e23f52fdste', 1, 2, 'Analyste Concepteur; Développeur; DBA Oracle; Formateur; ', NULL, NULL, NULL, NULL, 0, 1, 's', '0', NULL, '2022-01-26 10:06:01', '2024-06-12 18:38:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
