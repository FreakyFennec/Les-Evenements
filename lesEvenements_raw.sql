CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `nameCategory` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table lesevenements.category : ~3 rows (environ)
DELETE FROM `category`;
INSERT INTO `category` (`id_category`, `nameCategory`) VALUES
	(1, 'Culture'),
	(2, 'Sport '),
	(3, 'Jeux de sociétés');


CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `titleEvent` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `zipcode` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `country` varchar(100) NOT NULL,
  `dateStart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateEnd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maxUsers` int DEFAULT NULL,
  `contribution` decimal(20,6) DEFAULT NULL,
  `imgEvent` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `alt` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `comment_id` (`category_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `FK_event_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_event_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table lesevenements.event : ~15 rows (environ)
DELETE FROM `event`;
INSERT INTO `event` (`id_event`, `titleEvent`, `description`, `zipcode`, `address`, `city`, `country`, `dateStart`, `dateEnd`, `maxUsers`, `contribution`, `imgEvent`, `alt`, `user_id`, `category_id`) VALUES
	(1, 'Lancer de noyaux de cerises party', 'Venez découvrir une discipline revenue du fond des ages', '66400', '', 'Céret', 'France', '2023-01-22 23:00:00', '2023-01-23 22:59:59', 500, 25.320000, 'cerisiers.jpg', 'cerisiers', 2, 1),
	(2, 'Grand prix de la petite Italie', 'Encore une fois cette année nos petits Fangio pourront s\'affronter sur le circuit en vue de remporter la coupe des petits Fangion, sur le circuit de karting de ...', '54500', '', 'Vandœuvre-lès-Nancy', 'France', '2023-02-15 10:20:05', '2023-02-15 10:20:05', 650, 30.000000, 'piste-karting-740x494.jpg', 'piste-karting', 3, 2),
	(3, 'Tournoi d\'échecs', 'Appel à tous les amoureux du jeu d\'échecs....', '67200', '', 'Strasbourg', 'France', '2023-02-15 10:32:46', '2023-02-15 10:32:47', NULL, 5.000000, 'Echecs2.jpg', 'Echecs', 4, 3),
	(4, 'Le livre toujours', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, assumenda est, amet minus distinctio incidunt et maiores autem quaerat rem, error asperiores iste temporibus id voluptatibus eaque provident fugit tempora.', '67100', '', 'Strasbourg', 'France', '2023-02-20 09:16:47', '2023-02-20 09:16:47', 450, 0.000000, 'image_livre.jpg', 'image_livre', 1, 1),
	(5, 'Toujours plus haut', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, assumenda est, amet minus distinctio incidunt et maiores autem quaerat rem, error asperiores iste temporibus id voluptatibus eaque provident fugit tempora.', '67300', '', 'Schiltigheim', 'France', '2023-02-20 09:21:19', '2023-02-20 09:21:19', 500, 0.000000, 'Capture-escalade.png', 'Capture-escalade', 2, 2),
	(6, 'Du son', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, assumenda est, amet minus distinctio incidunt et maiores autem quaerat rem, error asperiores iste temporibus id voluptatibus eaque provident fugit tempora.', '67000', '', 'Strasbourg', 'France', '2023-02-20 09:24:30', '2023-02-20 09:24:30', 800, 95.000000, 'Orchestre_Philharmonique_de_Strasbourg_1.jpg', 'Orchestre_Philharmonique_de_Strasbourg', 1, 1),
	(7, 'On joue à Berstett', 'Cette balade est destinée aux familles avec enfants de 4 à plus de 10 ans. Vous serez amenés à répondre à plusieurs énigmes portant sur le patrimoine et la culture de Berstett tout en visitant le village. Un moyen ludique pour en apprendre un peu plus sur les trésors de cette commune ! Venez ensuite donner vos réponses à l\'Office de Tourisme et si elles s\'avèrent justes, un petit cadeau bien mérité vous attend !', '67000', '', 'Strasbourg', 'France', '2023-02-20 15:19:22', '2023-02-22 21:19:36', NULL, 0.000000, 'ferme-Berstett.jpg', 'Ferme Berstett', 1, 3),
	(8, 'Y a du Rock', 'Ils vont mettre le feux', '67000', '', 'Strasbourg', 'France', '2023-02-19 15:45:09', '2023-02-19 15:45:23', 500, 10.000000, 'concert-medium.jpg', 'Concert Medium', 2, 1),
	(9, 'A vos plumes', 'Un marthon d\'écriture...', '67000', '', 'Strasbourg', 'France', '2023-09-15 14:51:13', '2023-02-15 15:51:01', 1000, 0.000000, 'write-a-story.jpg', 'Write a story', 3, 1),
	(10, 'La nuit des clémentines', 'Une soirée sucré acidulée au son du rock méditerranéen', '67201', '', 'Eckbolsheim', 'France', '2023-09-14 15:02:53', '2023-02-14 16:03:09', 800, 0.000000, 'Zénith-Strasbourg.jpg', 'Zénith Strasbourg la nuit', 2, 1),
	(11, 'Découverte de la Petite-france', 'Un cadre idillyque à redécouvrir. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est tempore numquam et aut illum pariatur impedit dignissimos vitae aperiam, cum ipsa assumenda officia blanditiis, necessitatibus, fuga dolorem modi maxime expedita quasi. Atque veniam quaerat eius.', '67000', '', 'Strasbourg', 'France', '2023-09-28 07:00:00', '2023-09-28 15:00:00', NULL, 0.000000, 'petite-france-strasbourg.jpg', 'Petite-france Strasbourg', 3, 3),
	(12, 'Rétrospective de Un Tel', 'Une exposition à vous couper le souffle', '67000', '', 'Strasbourg', 'France', '2023-09-27 22:00:00', '2023-10-12 22:00:00', NULL, 10.000000, 'exposition.jpg', 'Exposition', 2, 1),
	(13, 'Le Vox vous invite', 'Comme tous les ans', '67000', '', 'Strasbourg', 'France', '2023-06-03 13:12:23', '2023-07-06 13:12:05', 250, 4.000000, 'cinema_vox.jpg', 'cinema vox', 1, 1),
	(14, 'La maison bleue fait peau neuve', 'Lieu pour les musiciens et maintenant pour les mélomanes aussi', '67100', '3 Rue de Guebwiller', 'Strasbourg', 'France', '2023-06-22 13:19:00', '2023-06-22 13:19:16', 300, 0.000000, 'maison-bleue-oiseau-de-nuit.jpg', 'maison bleue', 2, 1),
	(15, 'Le vélo-rail de Drulingen', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, assumenda est, amet minus distinctio incidunt et maiores autem quaerat rem, error asperiores iste temporibus id voluptatibus eaque provident fugit tempora.', '67302', '6 rue de Weyer', 'Drulingen', 'France', '2024-04-22 09:24:13', '2024-02-29 10:24:37', NULL, NULL, 'Velorail-Drulingen.jpg', 'Vélo-rail de Drulingen', 7, 2);

CREATE TABLE IF NOT EXISTS `participate` (
  `user_id` int NOT NULL,
  `event_id` int NOT NULL,
  KEY `id_event` (`event_id`) USING BTREE,
  KEY `id_user` (`user_id`) USING BTREE,
  CONSTRAINT `FK_participate_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id_event`),
  CONSTRAINT `FK_participate_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELETE FROM `participate`;
INSERT INTO `participate` (`user_id`, `event_id`) VALUES
	(2, 1),
	(1, 1),
	(3, 3),
	(3, 2),
	(4, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table lesevenements.comment : ~6 rows (environ)
DELETE FROM `comment`;
INSERT INTO `comment` (`id_comment`, `titleComment`, `comment`, `creationDate`, `event_id`, `user_id`) VALUES
	(1, 'Ca c\'est du sport !', 'Ils se sont dépassés', '2023-01-23 10:36:02', 1, 3),
	(2, 'C\'est une honte !', 'Tolérer ce genre d\'activitées est une insulte à la personne. On devrait commencer à interdire ce genre d\'événements inhumain.', '2023-02-15 10:11:37', 1, 1),
	(3, 'Ma qué, on va brûler de la gomme', 'Les bambinis se sont régalé. On reviendra.', '2023-02-15 10:45:14', 2, 3),
	(4, 'La recontre des cerveaux', 'Les Kasparovs n\'ont qu\'à bien se tenir, la relève arrive.', '2023-02-15 10:46:44', 3, 2),
	(5, 'La cervelle en bouillie', 'Y avait des Kadors de l\'échiquier cette année. Il m\'ont massacré.', '2023-02-28 15:51:13', 3, 4),
	(6, 'Bonne lecture.', 'Si tu aimes les bons mots.', '2023-05-05 04:46:29', 4, 8);


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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

DELETE FROM `user`;
INSERT INTO `user` (`id_user`, `firstName`, `lastName`, `email`, `pseudo`, `password`, `status`, `banish`, `registerDate`) VALUES
	(1, 'Paquita', 'Lacorason', 'paquit@lacora.com', 'PaquitaLacora', '$2y$10$pTlDOUhdiydUdoqw63nEcuh6MjZuFhzxScnDKE1vkr8knf9QHjbTq', 'moderator', 0, '2023-02-06 11:34:22'),
	(2, 'Elbono', 'DeUto', 'elbonod@uto.com', 'ElbonoDeUto', '$2y$10$pTlDOUhdiydUdoqw63nEcuh6MjZuFhzxScnDKE1vkr8knf9QHjbTq', 'admin', 0, '2023-02-06 11:34:22'),
	(3, 'Enzo', 'Mazer', 'Mazer@ti.com', 'Enzo', '$2y$10$pTlDOUhdiydUdoqw63nEcuh6MjZuFhzxScnDKE1vkr8knf9QHjbTq', 'user', 0, '2023-02-06 16:06:54'),
	(4, 'El', 'Lobo', 'ellobo@gmail.com', 'Ellobo', 'azer', 'admin', 0, '2023-02-28 08:42:18'),
	(6, 'Freaky', 'Fennec', 'freaky@fennec.com', 'FreakyFennec', 'azert', 'admin', 0, '2023-04-17 19:17:46'),
	(7, 'zaza', 'zaza', 'zaza@gmail.com', 'zaza', '$2y$10$PRU5hIOYXrSTRIwc22P67OD8Y2If4zw/LmqhyPIFn4fYgzdcLzqyi', 'admin', 0, '2023-05-04 07:52:58'),
	(8, 'zeze', 'zeze', 'zeze@gmail.com', 'zeze', '$2y$10$xmdZJ9I34lv6Pjp/8uAeXOYfPMmorqB48cB/06M9uaMYEgnwDZnd6', 'user', 0, '2023-05-04 09:49:32');
