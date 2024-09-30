CREATE TABLE IF NOT EXISTS `maintenance_curatives` (
    `id` int NOT NULL AUTO_INCREMENT,
    `periodedebut` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `periodefin` varchar(20) DEFAULT NULL,
    `user` bigint DEFAULT NULL,
    `diagnostique` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `cause` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `resultat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `etat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `commentaire` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `action` bigint DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = latin1;
CREATE TABLE IF NOT EXISTS `gestionmaintenance_curatives` (
    `id` int NOT NULL AUTO_INCREMENT,
    `outil` bigint DEFAULT NULL,
    `maintenance` bigint DEFAULT NULL,
    `etat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `commentaireinf` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `commentaireuser` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `avisinf` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `avisuser` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `action_effectuer` varchar(255) DEFAULT NULL,
    `action` bigint DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = latin1;