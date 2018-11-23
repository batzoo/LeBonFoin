-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 23 nov. 2018 à 13:02
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lebonfoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double DEFAULT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`),
  KEY `IDX_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(2, 1, 'CART', 'CART', 149.52, 1, 2, '2018-10-12 13:39:43', '2018-10-12 13:39:43'),
(3, 1, 'ORDER', 'BILLED', 100, 3, 4, '2018-10-12 13:39:43', '2018-10-12 13:39:43');

-- --------------------------------------------------------

--
-- Structure de la table `order_addresses`
--

DROP TABLE IF EXISTS `order_addresses`;
CREATE TABLE IF NOT EXISTS `order_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_addresses`
--

INSERT INTO `order_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-12 13:39:43', '2018-10-12 13:39:43'),
(3, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'FRANCE', '2018-10-12 13:39:43', '2018-10-12 13:39:43'),
(4, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-12 13:39:43', '2018-10-12 13:39:43'),
(5, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'FRANCE', '2018-10-12 13:39:43', '2018-10-12 13:39:43');

-- --------------------------------------------------------

--
-- Structure de la table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(3) UNSIGNED NOT NULL,
  `unit_price` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_order_product` (`order_id`),
  KEY `IDX_product_order` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 57.08, '2018-10-12 13:39:43', '2018-10-12 13:39:43'),
(3, 1, 2, 3, 46.22, '2018-10-12 13:39:43', '2018-10-12 13:39:43'),
(4, 2, 1, 2, 50, '2018-10-12 13:39:43', '2018-10-12 13:39:43'),
(5, NULL, 1, 3, 1.47, '2018-11-11 12:31:09', '2018-11-11 12:31:09');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `unit_price` double DEFAULT NULL,
  `range_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_product_range` (`range_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `unit_price`, `range_id`, `created_at`, `updated_at`) VALUES
(1, 'Foin de Prairie', 'Comme l\'indique son nom, ce foin est issu de simples pâturages (herbages) destinés aux animaux. La fenaison a lieu au printemps, avant que la prairie soit pâturée. En général, ces pâturages ne font l\'objet que d\'un seul fauchage annuel destiné à la récolte du foin. Plus tard dans l\'année, ils peuvent être à nouveau fauchés afin de produire du préfané. Le foin de prairie ne fait donc généralement l\'objet que d\'une seule coupe de foin, suivie d\'une coupe de préfané ou du pâturage de la prairie.\r\n\r\nLe foin LebonFoin est récolté chaque année avec amour par des agriculteurs locaux. \r\n\r\nFoin estampillé label \"Foin Supérieur\" - Voir le site officiel de l\'ABF (Association du Bon Foin)', 1.47, 1, '2018-10-26 16:16:05', '2018-10-26 16:16:05'),
(2, 'RayGrass', 'Cette graminée peuple principalement les cultures et est souvent semée à l\'automne, après la moisson des céréales, des pommes de terre ou du maïs. Il s\'agit d\'une graminée à croissance rapide et dont le rendement est élevé lorsque la fertilisation est suffisante. Auparavant, le raygrass était principalement semé afin de produire du préfané, mais la tendance a évolué vers le foin aux cours des dernières années. La croissance rapide de cette herbe permet de réaliser plusieurs coupes annuelles.\r\n\r\nLe foin LebonFoin est récolté chaque année avec amour par des agriculteurs locaux.\r\n\r\nFoin estampillé label \"Foin Supérieur\" - Voir le site officiel de l\'ABF (Association du Bon Foin)', 1.98, 2, '2018-10-26 16:18:37', '2018-10-26 16:18:37'),
(3, 'Foin de Graminées', 'Ce foin est en fait un sous-produit de la production de graminées. Les semences de graminées doivent être à pleine maturité avant de pouvoir procéder au battage et à la récolte du foin. La valeur nutritive de ce type de foin est très peu élevée mais sa structure grossière peut se révéler très précieuse, principalement pour les animaux non compétiteurs.\r\n\r\nLe foin LebonFoin est récolté chaque année avec amour par des agriculteurs locaux.\r\n\r\nFoin estampillé label \"Foin Supérieur\" - Voir le site officiel de l\'ABF (Association du Bon Foin)', 2.48, 3, '2018-10-26 16:19:45', '2018-10-26 16:19:45'),
(4, 'Foin de race', 'La composition sur demande d\'un foin à partir d\'une ou plusieurs sortes de graminée est de plus en plus fréquente. Ainsi, l\'utilisation de combinaisons de graminées-légumineuses s\'est généralisée au cours des dernières années. On ajoute fréquemment à ces mélanges du pâturin des prés, de la queue de chat (ou herbe de Timothée) et du trèfle rouge, en raison de leurs propriétés spécifiques. Ce foin est principalement destiné aux petits animaux domestiques, tels que cobayes, lapins nains, etc.\r\n\r\nLe foin LebonFoin est récolté chaque année avec amour par des agriculteurs locaux.\r\n\r\nFoin estampillé label \"Foin Supérieur\" - Voir le site officiel de l\'ABF (Association du Bon Foin)', 4.18, 4, '2018-10-26 16:21:07', '2018-10-26 16:21:07'),
(5, 'Foin aux truffes', 'Un foin très particulier destiné aux destriers les plus gourmands : notre foin aux truffes assurera un apport très riches en nutriments.\r\n\r\nLe Raygrass LebonFoin est récolté chaque année avec amour par des agriculteurs locaux.\r\n\r\nFoin estampillé label \"Foin Supérieur\" - Voir le site officiel de l\'ABF (Association du Bon Foin)', 13.98, 5, '2018-10-26 16:23:15', '2018-10-26 16:23:15'),
(6, 'Foin plaqué or aux diamants', 'Un foin de luxe... Pour un destrier de luxe !\r\n\r\nLe foin LebonFoin est récolté chaque année avec amour par des agriculteurs locaux.\r\n\r\nFoin estampillé label \"Foin Supérieur\" - Voir le site officiel de l\'ABF (Association du Bon Foin)', 112.32, 6, '2018-10-26 16:24:56', '2018-10-26 16:24:56');

-- --------------------------------------------------------

--
-- Structure de la table `ranges`
--

DROP TABLE IF EXISTS `ranges`;
CREATE TABLE IF NOT EXISTS `ranges` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_range_parent` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ranges`
--

INSERT INTO `ranges` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Main range', NULL, '2018-10-12 13:39:42', '2018-10-12 13:39:42'),
(3, 'Second range', 1, '2018-10-12 13:39:42', '2018-10-12 13:39:42'),
(4, 'Third range', 1, '2018-10-12 13:39:42', '2018-10-12 13:39:42');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', 'fred.eric@example.com', 'password', 1, 2, '2018-10-12 13:39:42', '2018-10-12 13:39:42'),
(3, 'Frederic', 'frederic@example.com', 'password', 3, 4, '2018-10-12 13:39:42', '2018-10-12 13:39:42'),
(4, 'bat', '', 'oui', NULL, NULL, '2018-11-09 11:20:48', '2018-11-09 11:20:48');

-- --------------------------------------------------------

--
-- Structure de la table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
CREATE TABLE IF NOT EXISTS `user_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-12 13:39:42', '2018-10-12 13:39:42'),
(3, 'Eric Fred', '12 route Pleine', 'chez mon oncle', '59000', 'Lille', 'FRANCE', '2018-10-12 13:39:42', '2018-10-12 13:39:42'),
(4, 'Frederic', '239 rue de Douai', NULL, '59000', 'Lille', 'FRANCE', '2018-10-12 13:39:42', '2018-10-12 13:39:42'),
(5, 'Epicfred', '3 sans idée', 'oui oui', '59000', 'Lille', 'FRANCE', '2018-10-12 13:39:42', '2018-10-12 13:39:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
