-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 01 sep. 2020 à 13:09
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stuliday`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `address_article` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `price` int(255) NOT NULL,
  `author_article` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `title`, `description`, `city`, `category`, `image_url`, `address_article`, `active`, `price`, `author_article`, `start_date`, `end_date`, `publish_date`) VALUES
(40, 'Loft à Arlac', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio aperiam deserunt, consequuntur dolorem possimus illum sit placeat architecto asperiores totam explicabo accusamus unde, eius reprehenderit optio sint! Nobis, aut repellat Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod fuga odit ducimus in expedita deserunt, pariatur voluptas quas dolorem modi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, repellat expedita hic aliquid distinctio blanditiis.', 'Mérignac', 'Loft', '5f4e2a98afd8b_1.jpg', '74 cours Pasteur', 1, 70, 8, '2020-09-02', '2020-09-18', '2020-09-01 11:03:52'),
(41, 'Cocooning aux Chartrons', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio aperiam deserunt, consequuntur dolorem possimus illum sit placeat architecto asperiores totam explicabo accusamus unde, eius reprehenderit optio sint! Nobis, aut repellat Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod fuga odit ducimus in expedita deserunt, pariatur voluptas quas dolorem modi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, repellat expedita hic aliquid distinctio blanditiis.', 'Bordeaux', 'Appartement', '5f4e2ad4bc93e_2.jpg', '74 rue François Hollande', 1, 54, 8, '2020-09-04', '2020-10-02', '2020-09-01 11:04:52'),
(42, 'Cave au Aubiers', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio aperiam deserunt, consequuntur dolorem possimus illum sit placeat architecto asperiores totam explicabo accusamus unde, eius reprehenderit optio sint! Nobis, aut repellat Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod fuga odit ducimus in expedita deserunt, pariatur voluptas quas dolorem modi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, repellat expedita hic aliquid distinctio blanditiis.', 'Bordeaux', 'Cave', '5f4e2b126cde0_3.jpg', '22 rue de Los Aubios', 1, 13, 8, '2020-09-22', '2020-12-24', '2020-09-01 11:05:54'),
(43, 'Maison de maître à Bacalan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio aperiam deserunt, consequuntur dolorem possimus illum sit placeat architecto asperiores totam explicabo accusamus unde, eius reprehenderit optio sint! Nobis, aut repellat Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod fuga odit ducimus in expedita deserunt, pariatur voluptas quas dolorem modi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, repellat expedita hic aliquid distinctio blanditiis.', 'Bordeaux', 'Maison', '5f4e2b4444f2c_4.jpg', '45 avenue Nicolas Sarkozy', 1, 117, 8, '2020-09-29', '2020-11-20', '2020-09-01 11:06:44');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `id_annonce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`) VALUES
(8, 'jul.az@hotmail.com', '$2y$10$Ml.Ud.xSM6zRkedhoXuSu.yl4KPOP0UgmX/Itd28rLObE0.MRlrQG', 'Az', 'Julie'),
(11, 'o@o.o', '$2y$10$tPiGysT0vso1yMiHYWES8eknEh9kRdMxwSg2GfxVvxjHR7MxMOcl2', 'Ju', 'Az');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_article` (`author_article`) USING BTREE;

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_annonce` (`id_annonce`),
  ADD KEY `reservations_ibfk_2` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`author_article`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `annonces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
