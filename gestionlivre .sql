-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 04 déc. 2024 à 10:06
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionlivre`
--

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id_livre` int NOT NULL AUTO_INCREMENT,
  `nom_livre` varchar(50) NOT NULL,
  `nom_auteur` varchar(50) NOT NULL,
  `nb_page` int NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `genre` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '1',
  `date` date DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  PRIMARY KEY (`id_livre`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `nom_livre`, `nom_auteur`, `nb_page`, `image_url`, `genre`, `quantite`, `etat`, `date`, `id_user`) VALUES
(25, 'LADY OF THE HIGHWAY', 'Deborah SWIFT', 150, 'uploads/cc.jpg', 'History', 3, 1, '2024-11-30', 1),
(24, 'BREAK THROUGH', 'James DAKOTA', 200, 'uploads/hhh.jpg', 'Philosophy', 0, 0, '2024-11-30', NULL),
(23, 'TO THE BRIGHT AGE OF THE WORLD', 'EOWYN IVEY', 100, 'uploads/fiction2.jpeg', 'fiction', 0, 0, '2024-11-30', NULL),
(22, 'GRATITUDE THROUGH HARD TIMES', 'CHRIS CHEMBRA', 130, 'uploads/fff.jpg', 'Philosophy', 1, 1, '2024-11-30', NULL),
(21, 'LEGACY OF AGES', 'Emily C REYNOLDS', 130, 'uploads/f.jpg', 'History', 1, 1, '2024-11-30', NULL),
(20, 'DUNE', 'Frank HERBERT', 230, 'uploads/fiction3.jpg', 'Fiction', 4, 1, '2024-11-30', NULL),
(18, 'THE MAID', 'Nita PROSE', 200, 'uploads/fictiion4.jpg', 'Thriller', 2, 1, '2024-11-30', NULL),
(19, 'The Fortune keeper', 'Deborah SWIFT', 200, 'uploads/dd.jpg', 'History ', 4, 1, '2024-11-30', NULL),
(13, 'CRIME AND PUNISHMENT', 'Fyodor DYOSTOVESKI', 200, 'uploads/crime and punishment.jpg', 'ACTION', 2, 1, '2024-11-30', NULL),
(17, 'city of spies', 'iszi LAWRENCE', 140, 'uploads/city-of-spies.jpg', 'Comic', 4, 1, '2024-11-30', NULL),
(15, 'Wanda Vision', 'Jac Schaeffer', 100, 'uploads/01.jpg', 'Comic', 2, 1, '2024-11-30', NULL),
(16, 'Philosophy Of Science', 'Martin CURD', 120, 'uploads/aaa.jpg', 'Philosophy', 3, 1, '2024-11-30', NULL);

--
-- Déclencheurs `livre`
--
DROP TRIGGER IF EXISTS `trg_before_insert_livre`;
DELIMITER $$
CREATE TRIGGER `trg_before_insert_livre` BEFORE INSERT ON `livre` FOR EACH ROW BEGIN
    IF NEW.quantite > 0 THEN
        SET NEW.etat = 1;
    ELSE
        SET NEW.etat = 0;
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trg_before_update_livre`;
DELIMITER $$
CREATE TRIGGER `trg_before_update_livre` BEFORE UPDATE ON `livre` FOR EACH ROW BEGIN
    IF NEW.quantite > 0 THEN
        SET NEW.etat = 1;
    ELSE
        SET NEW.etat = 0;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `user_form`
--

DROP TABLE IF EXISTS `user_form`;
CREATE TABLE IF NOT EXISTS `user_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_type` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user_form`
--

INSERT INTO `user_form` (`id`, `email`, `password`, `user_type`, `created_at`) VALUES
(1, 'benhmidaa@gmail.com', '741', 'user', '2024-11-27 16:39:06'),
(2, 'benhmidaa59@mail.com', '$2y$10$CsB7.s.D3df3WIN/tU', 'user', '2024-11-27 20:42:25'),
(3, 'bo7midbenhmida@gmail.com', '$2y$10$PzP//sngtXBSNe7KAd', 'user', '2024-11-27 20:43:27'),
(4, 'a@gmail.com', '$2y$10$UzE.go8AptDlJ6P7bK', 'user', '2024-11-28 13:07:43'),
(5, 'z@gmail.com', '$2y$10$T9eoukMfhAPKvorWAEeCl.DvCRbSr.cKAtGSZHZ6FGjoTEe7SUlwW', 'admin', '2024-11-28 13:09:25'),
(6, 's@gmail.com', '$2y$10$3bjT8h9TuZfJ8P5kaNmiP.cQ2ArbgiydT/Ucemy.F/fk7yT0QeYHi', 'user', '2024-11-28 13:21:04'),
(7, 'q@gmail.com', '$2y$10$J87XdBvemyHqi5i2WupVpOZktsZQqpDoVLr/damPLB23Gl.a14ZC.', 'user', '2024-11-28 13:22:08'),
(8, 'bennour@gmail.com', '$2y$10$3elCdjfdYdECFRJ0o7lkRuhLz70jRIGDWoQVvE2UPYfT.lCsFO/da', 'user', '2024-11-28 13:51:19'),
(9, 'd@gmail.com', '$2y$10$dwxYPov5YaNR0CLTlxkGLeQD8m9dJQoxev7D8OZqx9hbv35SjX5kS', 'user', '2024-11-28 14:39:17'),
(10, 'w@gmail.com', '$2y$10$xxHUfrgQqtMkXu5FM6Wkz.CU9EJWeugIOirsPwcYos5NIeH1Dwn4.', 'user', '2024-11-28 19:26:23'),
(11, 'b@gmail.com', '$2y$10$OgdJ3sSKW5Sotz1t0xfjrOKaImRTkTDqPAMiM2GvRz5F4D9vcYTPW', 'user', '2024-11-28 21:56:06'),
(12, 'm@gmail.com', '$2y$10$URmUkIqYPfRYmcRmhfyKkuUnxl3UvphFd/T2OesTK1y5tsOi7a44G', 'admin', '2024-11-29 12:10:33'),
(13, 'manel@gmail.com', '$2y$10$uzkqD4dU7nEXPKkj/VBfDejppYGV9D9khlOyEvzHuNSJVij7PDIAC', 'user', '2024-11-29 12:31:56'),
(14, 'h@gmail.com', '$2y$10$1uz8GzaMfXugzsJRJeHT5unz2C.CE8w1z74lwftWSGJoIfC7Nm.TS', 'user', '2024-11-30 18:06:58'),
(15, 'ahmed@gmail.com', '$2y$10$p1k787yuaTOKDXi/vbR2jeFNQUj4ev6rbiXYkLfHQ42eOVQ.iJmgy', 'user', '2024-12-02 12:10:44'),
(16, 'a2@gmail.com', '$2y$10$6ox4RjhpRWDaOzGlzln.iOtMz6EvQIbH8jLJ1LP0yrhvkIgDb2Lua', 'user', '2024-12-02 12:16:48'),
(17, 'imen@gmail.com', '$2y$10$skcP7VlIIJ0WRDQgLdrBJeVT2yrJqxhKPElr1QjWq1cOfWKTMiPt.', 'user', '2024-12-02 13:04:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
