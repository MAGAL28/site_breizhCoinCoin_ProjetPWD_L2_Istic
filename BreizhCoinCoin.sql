-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 29 mai 2022 à 14:22
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BreizhCoinCoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `Acces`
--

CREATE TABLE `Acces` (
  `id` int(11) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `age` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Acces`
--

INSERT INTO `Acces` (`id`, `prenom`, `login`, `password`, `statut`, `age`) VALUES
(1, 'Tom', 'tomahawk', 'indien', 'Etudiant', 22),
(2, 'Pierre', 'Pierrot', 'delalune', 'Prof', 44),
(3, 'Michel', 'lamere', 'sonchat', 'Admin', 69);

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `date_creation` date DEFAULT NULL,
  `image` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `categorie` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `title`, `price`, `date_creation`, `image`, `description`, `categorie`, `author_id`, `location`, `statut`) VALUES
(1, 'titre 1', 98, '2022-09-09', 'marker2.png', 'texte de l\'annonce', 2, 1, 'Rennes', 'archived'),
(2, 'titre 2', 48, '2020-07-05', 'pic2.png', 'texte de l\'annonce 2', 4, 1, 'Rennes', 'created'),
(3, 'titre 3', 38, '2020-09-05', 'pic8.png', 'texte de l\'annonce 3', 3, 1, 'Rennes', 'in_progress'),
(4, 'titre 4', 58, '2020-07-05', 'pic4.png', 'texte de l\'annonce 4', 1, 1, 'Paris', 'created'),
(5, 'titre 5', 59.32, '2022-04-02', 'pic6.png', 'texte de l\'annonce 5', 4, 1, 'Rennes', 'archived'),
(6, 'titre 6', 39.32, '2020-07-05', 'pic7.png', 'texte de l\'annonce 7', 6, 2, 'Rennes', 'created'),
(7, 'titre 7', 69.32, '2020-07-05', 'pic3.png', 'texte de l\'annonce 2', 5, 1, 'Rennes', 'archived'),
(8, 'titre 8', 89.32, '2020-07-05', 'pic9.png', 'texte de l\'annonce 9', 2, 1, 'Rennes', 'created'),
(9, 'titre 10', 19.32, '2020-07-05', 'pic5.png', 'texte de l\'annonce 10', 1, 1, 'Rennes', 'archived');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `NAME`) VALUES
(1, 'Jouet'),
(2, 'Jeux'),
(3, 'Livres'),
(4, 'Bijoux'),
(5, 'Voitures'),
(6, 'Locations');

-- --------------------------------------------------------

--
-- Structure de la table `Statut`
--

CREATE TABLE `Statut` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Statut`
--

INSERT INTO `Statut` (`id`, `nom`) VALUES
(1, 'Etudiant'),
(2, 'Prof'),
(3, 'Admin'),
(4, 'Visiteur');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `nom`, `prenom`) VALUES
(1, 'seck', 'serigne'),
(2, 'seck', 'serigne');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `newsletter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `role`, `newsletter`) VALUES
(1, 'seck', 'serigne', 'Serigne@gmail.com', 'saliounqU4YRWw68ZeNRxJNT9r', NULL, 'on'),
(2, 'seck', 'serigne', 'salioumagal@gmail.com', '84bc8bddbc13bb0a4936947aa5b564c6', NULL, 'on'),
(3, 'seck', 'serigne', 'Serigne@gmail.com', 'saliounqU4YRWw68ZeNRxJNT9r', NULL, 'on'),
(4, 'seck', 'serigne', 'salioumagal@gmail.com', '84bc8bddbc13bb0a4936947aa5b564c6', NULL, 'on'),
(8, 'abantan', 'thony', 'bana@gmail.com', '9990775155c3518a0d7917f7780b24aa', NULL, 'on'),
(9, 'seck', 'serigne', 'salioumagal@gmail.com', '81964cbcbb07bee4e8e07787e1f66c36', NULL, 'on'),
(10, 'kjnf', 'serigne', 'bana@gmail.com', 'fa816edb83e95bf0c8da580bdfd491ef', NULL, 'on'),
(11, 'abdalah', 'sophia', 'sofia@gmail.com', '17da1ae431f965d839ec8eb93087fb2b', NULL, 'on');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Acces`
--
ALTER TABLE `Acces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Statut`
--
ALTER TABLE `Statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Acces`
--
ALTER TABLE `Acces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Statut`
--
ALTER TABLE `Statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
