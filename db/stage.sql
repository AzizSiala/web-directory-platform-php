-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 mars 2024 à 19:05
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

CREATE TABLE `archive` (
  `id` int(100) NOT NULL,
  `nom` varchar(2000) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dep` varchar(255) NOT NULL,
  `numtel` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `societe` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `archive`
--

INSERT INTO `archive` (`id`, `nom`, `prenom`, `dep`, `numtel`, `email`, `societe`, `site`, `role`) VALUES
(44, 'salah', 'mejri', 'info', 23250005, 'salah@gmail.com', 'Sodimac', 'sfax', 'utilisateur'),
(48, 'Ahmad', 'chaari', 'Direction', 71100801, 'ahmed.chaari@groupe-hammami.com', 'SCPC', 'sfax', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `attente`
--

CREATE TABLE `attente` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dep` varchar(255) NOT NULL,
  `numtel` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `societe` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `attente`
--

INSERT INTO `attente` (`id`, `nom`, `prenom`, `dep`, `numtel`, `email`, `societe`, `site`, `mot_de_passe`, `role`) VALUES
(5, 'Ala', 'chtourou', 'Energy Solution', 71100801, 'ala.chtourou@groupe-hammami.com', 'SCPC', '', 'ala147258', ''),
(6, 'Anis', 'Ben massoud', 'Achat', 71100801, 'anis.benmassoud@groupe-hammami.com', 'TMS', '', 'anis1234', '');

-- --------------------------------------------------------

--
-- Structure de la table `loginn`
--

CREATE TABLE `loginn` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `loginn`
--

INSERT INTO `loginn` (`id`, `nom`, `email`, `mot_de_passe`, `role`) VALUES
(1, 'aziz', 'sialaaziz234@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(2, 'ahmed', 'kkk@gmail.com', '123456', 'user'),
(3, 'sami', 'sami@gmail.com', '147', 'admin'),
(4, 'mohamed', 'mohamed@gmail.com', '258', 'user'),
(5, 'hhh', 'hhh@gmail.com', '369', 'utilisateur'),
(6, 'mohamed', 'mohamed@gmail.com', '789', 'admin'),
(7, 'aziz', 'sialaaziz234@gmail.com', '24610373', 'admin'),
(8, 'slim', 'slim@gmail', '0147', 'utilisateur'),
(9, 'helmi', 'helmi@gmail.com', '123456789', 'admin'),
(10, 'ahmad', 'ahmad.ktata@gmail.com', '789456123', 'admin'),
(11, 'Ahmad', 'ahmed.chaari@groupe-hammami.com', '789456123', 'utilisateur'),
(12, 'Henda', 'henda.elgharbi@groupe-hammami.com', '7410852963', 'utilisateur'),
(13, 'Ahmad', 'ahmed.chaari@groupe-hammami.com', '0147258369', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `dep` varchar(255) NOT NULL,
  `numtel` int(8) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `societe` varchar(200) DEFAULT NULL,
  `site` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `dep`, `numtel`, `email`, `societe`, `site`, `role`) VALUES
(41, 'ahmed', 'ketata', 'Flotte', 78456123, 'ketata@gmail.com', 'SCPC', 'sfax', 'utilisateur'),
(42, 'fathi', 'zouari', 'Achat', 24610373, 'fathi@gmail.com', 'STMT', 'sfax', 'utilisateur'),
(43, 'mahmoud', 'kolsi', 'info', 52639852, 'mahmoud@gmail.com', 'SCPC', 'sfax', 'utilisateur'),
(45, 'sami', 'siala', 'info', 23250005, 'sami.siala@gmail.com', 'SCPC', 'sfax', 'admin'),
(46, 'helmi', 'hentati', 'info', 50258369, 'helmi@gmail.com', 'SCPC', 'sfax', 'admin'),
(47, 'ahmad', 'ktata', 'RH', 54632118, 'ahmad.ktata@gmail.com', 'SCPC', 'marroc', 'admin'),
(49, 'Henda', 'elgharbi', 'Direction', 71100801, 'henda.elgharbi@groupe-hammami.com', '', 'Sfax', 'utilisateur'),
(50, 'salma', 'rekik', 'Marketing', 44258369, 'rekik@gmail.com', 'Hannabal_immobilier', '', ''),
(51, 'Ahmad', 'chaari', 'Info', 71100801, 'ahmed.chaari@groupe-hammami.com', '', 'Sfax', 'utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attente`
--
ALTER TABLE `attente`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `loginn`
--
ALTER TABLE `loginn`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `attente`
--
ALTER TABLE `attente`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `loginn`
--
ALTER TABLE `loginn`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
