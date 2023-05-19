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


-- Listage de la structure de la base pour lesevenements
CREATE DATABASE IF NOT EXISTS `lesevenements` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `lesevenements`;

-- Listage de la structure de table lesevenements. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `nameCategory` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table lesevenements.category : ~3 rows (environ)
DELETE FROM `category`;
INSERT INTO `category` (`id_category`, `nameCategory`) VALUES
	(1, 'Culture'),
	(2, 'Sport '),
	(3, 'Jeux de sociétés');

-- Listage de la structure de table lesevenements. comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `titleComment` varchar(50) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `categorie_id` (`event_id`) USING BTREE,
  KEY `membre_id` (`user_id`) USING BTREE,
  CONSTRAINT `FK_comment_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id_event`),
  CONSTRAINT `FK_comment_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table lesevenements.comment : ~6 rows (environ)
DELETE FROM `comment`;
INSERT INTO `comment` (`id_comment`, `titleComment`, `comment`, `creationDate`, `event_id`, `user_id`) VALUES
	(1, 'Ca c\'est du sport !', 'Ils se sont dépassés', '2023-01-23 09:36:02', 1, 3),
	(2, 'C\'est une honte !', 'Tolérer ce genre d\'activitées est une insulte à la personne. On devrait commencer à interdire ce genre d\'événements inhumain.', '2023-02-15 09:11:37', 1, 1),
	(3, 'Ma qué, on va brûler de la gomme', 'Les bambinis se sont régalé. On reviendra.', '2023-02-15 09:45:14', 2, 3),
	(4, 'La recontre des cerveaux', 'Les Kasparovs n\'ont qu\'à bien se tenir, la relève arrive.', '2023-02-15 09:46:44', 3, 2),
	(5, 'La cervelle en bouillie', 'Y avait des Kadors de l\'échiquier cette année. Il m\'ont massacré.', '2023-02-28 14:51:13', 3, 4),
	(6, 'Bonne lecture.', 'Si tu aimes les bons mots.', '2023-05-05 02:46:29', 4, 8);

-- Listage de la structure de table lesevenements. event
CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `titleEvent` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `zipcode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `country` varchar(100) NOT NULL,
  `dateStart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateEnd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maxUsers` int DEFAULT NULL,
  `contribution` decimal(20,6) DEFAULT NULL,
  `imgEvent` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `alt` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `comment_id` (`category_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `FK_event_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_event_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table lesevenements.event : ~15 rows (environ)
DELETE FROM `event`;
INSERT INTO `event` (`id_event`, `titleEvent`, `description`, `zipcode`, `address`, `city`, `country`, `dateStart`, `dateEnd`, `maxUsers`, `contribution`, `imgEvent`, `alt`, `user_id`, `category_id`) VALUES
	(1, 'Lancer de noyaux de cerises party', 'Venez découvrir une discipline revenue du fond des ages', '66400', '', 'Céret', 'France', '2023-01-22 22:00:00', '2023-01-23 21:59:59', 500, 25.320000, 'cerisiers.jpg', 'cerisiers', 2, 1),
	(2, 'Grand prix de la petite Italie', 'Encore une fois cette année nos petits Fangio pourront s\'affronter sur le circuit en vue de remporter la coupe des petits Fangion, sur le circuit de karting de ...', '54500', '', 'Vandœuvre-lès-Nancy', 'France', '2023-02-15 09:20:05', '2023-02-15 09:20:05', 650, 30.000000, 'piste-karting-740x494.jpg', 'piste-karting', 9, 2),
	(3, 'Tournoi d\'échecs', 'Appel à tous les amoureux du jeu d\'échecs....', '67200', '', 'Strasbourg', 'France', '2023-02-15 09:32:46', '2023-02-15 09:32:47', NULL, 5.000000, 'Echecs2.jpg', 'Echecs', 4, 3),
	(4, 'Le livre toujours', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, assumenda est, amet minus distinctio incidunt et maiores autem quaerat rem, error asperiores iste temporibus id voluptatibus eaque provident fugit tempora.', '67100', '', 'Strasbourg', 'France', '2023-02-20 08:16:47', '2023-02-20 08:16:47', 450, 0.000000, 'image_livre.jpg', 'image_livre', 1, 1),
	(5, 'Toujours plus haut', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, assumenda est, amet minus distinctio incidunt et maiores autem quaerat rem, error asperiores iste temporibus id voluptatibus eaque provident fugit tempora.', '67300', '', 'Schiltigheim', 'France', '2023-02-20 08:21:19', '2023-02-20 08:21:19', 500, 0.000000, 'Capture-escalade.png', 'Capture-escalade', 2, 2),
	(6, 'Du son', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, assumenda est, amet minus distinctio incidunt et maiores autem quaerat rem, error asperiores iste temporibus id voluptatibus eaque provident fugit tempora.', '67000', '', 'Strasbourg', 'France', '2023-02-20 08:24:30', '2023-02-20 08:24:30', 800, 95.000000, 'Orchestre_Philharmonique_de_Strasbourg_1.jpg', 'Orchestre_Philharmonique_de_Strasbourg', 1, 1),
	(7, 'On joue à Berstett', 'Cette balade est destinée aux familles avec enfants de 4 à plus de 10 ans. Vous serez amenés à répondre à plusieurs énigmes portant sur le patrimoine et la culture de Berstett tout en visitant le village. Un moyen ludique pour en apprendre un peu plus sur les trésors de cette commune ! Venez ensuite donner vos réponses à l\'Office de Tourisme et si elles s\'avèrent justes, un petit cadeau bien mérité vous attend !', '67000', '', 'Strasbourg', 'France', '2023-02-20 14:19:22', '2023-02-22 20:19:36', NULL, 0.000000, 'ferme-Berstett.jpg', 'Ferme Berstett', 1, 3),
	(8, 'Y a du Rock', 'Ils vont mettre le feux', '67000', '', 'Strasbourg', 'France', '2023-02-19 14:45:09', '2023-02-19 14:45:23', 500, 10.000000, 'concert-medium.jpg', 'Concert Medium', 2, 1),
	(9, 'A vos plumes', 'Un marthon d\'écriture...', '67000', '', 'Strasbourg', 'France', '2023-09-15 12:51:13', '2023-02-15 14:51:01', 1000, 0.000000, 'write-a-story.jpg', 'Write a story', 9, 1),
	(10, 'La nuit des clémentines', 'Une soirée sucré acidulée au son du rock méditerranéen', '67201', '', 'Eckbolsheim', 'France', '2023-09-14 13:02:53', '2023-02-14 15:03:09', 800, 0.000000, 'Zénith-Strasbourg.jpg', 'Zénith Strasbourg la nuit', 2, 1),
	(11, 'Découverte de la Petite-france', 'Un cadre idillyque à redécouvrir. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est tempore numquam et aut illum pariatur impedit dignissimos vitae aperiam, cum ipsa assumenda officia blanditiis, necessitatibus, fuga dolorem modi maxime expedita quasi. Atque veniam quaerat eius.', '67000', '', 'Strasbourg', 'France', '2023-09-28 05:00:00', '2023-09-28 13:00:00', NULL, 0.000000, 'petite-france-strasbourg.jpg', 'Petite-france Strasbourg', 9, 3),
	(12, 'Rétrospective de Un Tel', 'Une exposition à vous couper le souffle', '67000', '', 'Strasbourg', 'France', '2023-09-27 20:00:00', '2023-10-12 20:00:00', NULL, 10.000000, 'exposition.jpg', 'Exposition', 2, 1),
	(13, 'Le Vox vous invite', 'Comme tous les ans', '67000', '', 'Strasbourg', 'France', '2023-06-03 11:12:23', '2023-07-06 11:12:05', 250, 4.000000, 'cinema_vox.jpg', 'cinema vox', 1, 1),
	(14, 'La maison bleue fait peau neuve', 'Lieu pour les musiciens et maintenant pour les mélomanes aussi', '67100', '3 Rue de Guebwiller', 'Strasbourg', 'France', '2023-06-22 11:19:00', '2023-06-22 11:19:16', 300, 0.000000, 'maison-bleue-oiseau-de-nuit.jpg', 'maison bleue', 2, 1),
	(15, 'Le vélo-rail de Drulingen', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, assumenda est, amet minus distinctio incidunt et maiores autem quaerat rem, error asperiores iste temporibus id voluptatibus eaque provident fugit tempora.', '67302', '6 rue de Weyer', 'Drulingen', 'France', '2024-04-22 07:24:13', '2024-02-29 09:24:37', NULL, NULL, 'Velorail-Drulingen.jpg', 'Vélo-rail de Drulingen', 7, 2);

-- Listage de la structure de table lesevenements. participate
CREATE TABLE IF NOT EXISTS `participate` (
  `user_id` int NOT NULL,
  `event_id` int NOT NULL,
  KEY `id_event` (`event_id`) USING BTREE,
  KEY `id_user` (`user_id`) USING BTREE,
  CONSTRAINT `FK_participate_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id_event`),
  CONSTRAINT `FK_participate_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lesevenements.participate : ~0 rows (environ)
DELETE FROM `participate`;

-- Listage de la structure de table lesevenements. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'user',
  `banish` tinyint(1) NOT NULL DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table lesevenements.user : ~8 rows (environ)
DELETE FROM `user`;
INSERT INTO `user` (`id_user`, `firstName`, `lastName`, `email`, `pseudo`, `password`, `status`, `banish`, `registerDate`) VALUES
	(1, 'Paquita', 'Lacorason', 'paquit@lacora.com', 'PaquitaLacora', '$2y$10$pTlDOUhdiydUdoqw63nEcuh6MjZuFhzxScnDKE1vkr8knf9QHjbTq', 'moderator', 0, '2023-02-06 11:34:22'),
	(2, 'Elbono', 'DeUto', 'elbonod@uto.com', 'ElbonoDeUto', '$2y$10$pTlDOUhdiydUdoqw63nEcuh6MjZuFhzxScnDKE1vkr8knf9QHjbTq', 'admin', 0, '2023-02-06 11:34:22'),
	(3, 'Enzo', 'Mazer', 'Mazer@ti.com', 'Enzo', '$2y$10$pTlDOUhdiydUdoqw63nEcuh6MjZuFhzxScnDKE1vkr8knf9QHjbTq', 'user', 0, '2023-02-06 16:06:54'),
	(4, 'El', 'Lobo', 'ellobo@gmail.com', 'Ellobo', 'azer', 'admin', 0, '2023-02-28 08:42:18'),
	(6, 'Freaky', 'Fennec', 'freaky@fennec.com', 'FreakyFennec', 'azert', 'admin', 0, '2023-04-17 19:17:46'),
	(7, 'zaza', 'zaza', 'zaza@gmail.com', 'zaza', '$2y$10$PRU5hIOYXrSTRIwc22P67OD8Y2If4zw/LmqhyPIFn4fYgzdcLzqyi', 'admin', 0, '2023-05-04 07:52:58'),
	(8, 'zeze', 'zeze', 'zeze@gmail.com', 'zeze', '$2y$10$xmdZJ9I34lv6Pjp/8uAeXOYfPMmorqB48cB/06M9uaMYEgnwDZnd6', 'user', 0, '2023-05-04 09:49:32'),
	(9, 'Ad', 'Min', 'admin@gmail.com', 'Admin', '$2y$10$.tVhlGdV4NBDHMW8V0GruujwCHGzYk/macFOA.hYqomiLyx0E1RZm', 'admin', 0, '2023-05-04 07:52:58');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
