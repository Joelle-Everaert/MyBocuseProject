-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 jan. 2021 à 19:30
-- Version du serveur :  10.3.27-MariaDB
-- Version de PHP : 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `uaanzmse_mybocus`
--

-- --------------------------------------------------------

--
-- Structure de la table `attendanceTimes`
--

CREATE TABLE `attendanceTimes` (
  `id_time` int(11) NOT NULL,
  `fk_id_user` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `attendance_morning` time DEFAULT NULL,
  `attendance_evening` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='different attendances of the students';

--
-- Déchargement des données de la table `attendanceTimes`
--

INSERT INTO `attendanceTimes` (`id_time`, `fk_id_user`, `date`, `attendance_morning`, `attendance_evening`) VALUES
(37, 12, '2021-01-13', '20:26:25', '20:27:42'),
(41, 21, '2021-01-14', '16:34:58', '16:35:01'),
(43, 17, '2021-01-14', '18:03:14', '18:03:15'),
(44, 12, '2021-01-14', '18:55:19', '19:09:12'),
(45, 12, '2021-01-14', '19:09:10', '19:09:12'),
(46, 20, '2021-01-14', '19:22:25', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Students`
--

CREATE TABLE `Students` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `password` text COLLATE utf8mb4_bin NOT NULL,
  `account_type` enum('chef','student') COLLATE utf8mb4_bin NOT NULL,
  `birthday` date DEFAULT NULL,
  `promo` enum('Boccer1-25','Bocson2-50') COLLATE utf8mb4_bin NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `Students`
--

INSERT INTO `Students` (`id_user`, `name`, `surname`, `email`, `password`, `account_type`, `birthday`, `promo`, `phone_number`) VALUES
(12, 'Fabry', 'Jean', 'mouettemouette@mybocus.org', '$2y$10$xUpSvdv.qLwsKvZwiq6yT.WrmWqhU976gnZxZkc/tZro34xNWe6mK', 'student', '1994-04-15', 'Boccer1-25', ''),
(15, 'Hajji', 'Sifedine', 'hajji_Sifedine@mybocus.org', '$2y$10$eTUghs9FMboOwRBXp1fKwOqYzmrxicCWTThB4tG/SYaICRKiG0c2e', 'student', '1997-11-06', 'Boccer1-25', ''),
(16, 'Bourgeois', 'Thomas', 'bourgeois_Thomas@mybocus.org', '$2y$10$uRC7JXJLtwGKiueFO.LAseILN9VK38ut4DYnL1ZYrKWb7X29jEgrS', 'student', '1997-03-25', 'Boccer1-25', ''),
(17, 'Everaert', 'Joelle', 'joelle_everaert@mybocus.org', '$2y$10$v6kMp9f3qndxIG6OlR/U6Oc6.fxIxoEV6oanQir37mirP9KlVFhri', 'student', '1990-05-22', 'Boccer1-25', ''),
(18, 'Axel', 'Nalesso', 'axel_nalesso@mybocus.org', '$2y$10$gSSxHn29GGA4fXUYXi9MUOiJD1OOb8acYaWjyyarNk1fC05LaOB9u', 'student', '1996-03-14', 'Bocson2-50', ''),
(19, 'Florian', 'Bertchi', 'florian_bertchi@mybocus.org', '$2y$10$1/tYyV8iphPzTZa9ZzxtX.od4W6fJxfzYqeDM2jnaiIDGVqSWbBUC', 'student', '1990-04-19', 'Bocson2-50', ''),
(20, 'Aurore', 'Van Hoorebeke', 'aurore_VH@mybocus.org', '$2y$10$FKjb/YyeG9ZKXaOO.wGFkO6sUxFZ1albvI8NwsE.ENdjTmmVIw.HC', 'student', '1999-01-13', 'Bocson2-50', ''),
(21, 'Carpentier', 'Bérangère', 'berangere_carpentier@mybocus.org', '$2y$10$MOZoQBm8QKWw1.Tznwn6d.jC.kBfw1kHfUU/c4DqYUqA174T5zOsG', 'student', '1994-07-19', 'Bocson2-50', ''),
(22, 'Guillaume', 'Vanleynseele', 'vanleynseele_G@mybocus.org', '$2y$10$.tkpQafmNkQggUSCZ8CdKO2FN1jyL8fNW7edyrPbyslgySkFfT.mm', 'student', '1989-12-23', 'Bocson2-50', ''),
(23, 'Chef', 'Emily', 'emily_chef@mybocus.org', '$2y$10$r8ZZTVNoo3NKy3sz0m45Leuw5V66mGhpPNV9zNeXTp80CF88YZnsS', 'chef', '1990-11-29', 'Boccer1-25', ''),
(24, 'Chef', 'Kill', 'kill_chef@mybocus.org', '$2y$10$9uYYZ9ER/RYBWfpiNeCLI.3EMttwxu9SVFC6Msw8VYG4pC0xjmKkS', 'chef', '1993-03-17', 'Boccer1-25', '');

-- --------------------------------------------------------

--
-- Structure de la table `watch_recipe`
--

CREATE TABLE `watch_recipe` (
  `id_recipe` int(11) NOT NULL,
  `title_watch` text COLLATE utf8mb4_bin NOT NULL,
  `date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `FK_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `watch_recipe`
--

INSERT INTO `watch_recipe` (`id_recipe`, `title_watch`, `date`, `description`, `FK_id_user`) VALUES
(18, 'gratin d\'aubergine', '2021-01-15', 'aubergine facon provencal au four avec pomme croquette', 17),
(25, 'cuisse de grenouille', '2021-01-30', 'cuisse de grenouille', 15),
(31, 'Coq au vin', '2021-01-28', 'Coq minute au vin d\'appelation bordelais', 21),
(32, 'mouette à la coq', '2021-01-11', 'mouette avec mie de pain', 12),
(35, 'soupe verte', '2021-01-04', 'Verte soupe -> c bon', 12),
(36, 'lentille corail', '2021-01-31', 'soupe de lentille corail', 17),
(37, 'Wok de boulettes aux chicons et à la mangue et purée au cresson', '2021-01-14', 'Boulettes de haché campagne, sautées au wok avec des lanières de chicon et de la mangue. Servi avec des pâtes fraîches faites maison.', 20);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attendanceTimes`
--
ALTER TABLE `attendanceTimes`
  ADD PRIMARY KEY (`id_time`),
  ADD KEY `fk_id_user` (`fk_id_user`);

--
-- Index pour la table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `watch_recipe`
--
ALTER TABLE `watch_recipe`
  ADD PRIMARY KEY (`id_recipe`),
  ADD KEY `FK_id_user` (`FK_id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attendanceTimes`
--
ALTER TABLE `attendanceTimes`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `Students`
--
ALTER TABLE `Students`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `watch_recipe`
--
ALTER TABLE `watch_recipe`
  MODIFY `id_recipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attendanceTimes`
--
ALTER TABLE `attendanceTimes`
  ADD CONSTRAINT `attendancetimes_ibfk_1` FOREIGN KEY (`fk_id_user`) REFERENCES `Students` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `watch_recipe`
--
ALTER TABLE `watch_recipe`
  ADD CONSTRAINT `watch_recipe_ibfk_1` FOREIGN KEY (`FK_id_user`) REFERENCES `Students` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
