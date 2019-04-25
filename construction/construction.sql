-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 25 avr. 2019 à 23:57
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `construction`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `libelle`) VALUES
(1, 'Tole'),
(2, 'Sable'),
(3, 'Fer a betton'),
(4, 'Ciment'),
(5, 'Bois'),
(6, 'Menuisirie'),
(7, 'peinture'),
(8, 'fauteil'),
(9, 'brique');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `contact`, `email`, `ville`, `password`, `photo`) VALUES
(2, 'Toure', 'Lamagnigui', '23064665', 'lamagnigui.toure@gmail.com', 'Ltoure', '123456', 'Photo.jpg'),
(7, 'Kouassi', 'Konan', '5246987', 'konan.kouakou@gmail.com', 'Bouake', '123456', 'IMG-20181123-WA0004.jpg'),
(9, 'Babi', 'Lolo', '01265478', 'baby@gmail.com', 'Bouake', '123456', 'IDT BB.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `fournisseur` int(11) NOT NULL,
  `materiel` int(11) NOT NULL,
  `quantite` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `client`, `fournisseur`, `materiel`, `quantite`, `date`) VALUES
(6, 2, 3, 2, '2 tonnes', '24-04-2019 02:52:08'),
(10, 2, 1, 2, '126tonnes', '24-04-2019 02:55:32'),
(14, 2, 2, 2, '2 tonnes', '24-04-2019 03:00:21'),
(15, 2, 2, 2, '2 tonnes', '24-04-2019 03:01:26'),
(17, 2, 2, 2, '2 tonnes', '24-04-2019 03:01:59'),
(18, 2, 2, 2, '2 tonnes', '24-04-2019 03:02:25'),
(19, 2, 1, 1, '2 tonnes', '24-04-2019 03:05:52'),
(20, 2, 1, 1, '2 tonnes', '24-04-2019 03:07:30'),
(21, 2, 1, 1, '2 tonnes', '24-04-2019 03:10:20'),
(22, 2, 1, 1, '2 tonnes', '24-04-2019 03:11:04'),
(28, 2, 3, 2, '126tonnes', '24-04-2019 03:12:44'),
(29, 2, 3, 2, '126tonnes', '24-04-2019 03:15:32'),
(30, 2, 2, 2, '126tonnes', '24-04-2019 03:18:02'),
(31, 2, 2, 3, '5 tonnes', '25-04-2019 00:11:43'),
(32, 2, 1, 3, '5 tonnes', '25-04-2019 00:15:33'),
(35, 2, 2, 2, '5 tonnes', '25-04-2019 00:33:59'),
(37, 2, 2, 2, '5 tonnes', '25-04-2019 00:47:35'),
(42, 7, 5, 3, '10 tonnes', '25/04/2019 11:24:46');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `article` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `username`, `contact`, `email`, `ville`, `article`, `password`) VALUES
(1, 'CUIRASSE', 'cuirasse', '23536426', 'cuirace@gmail.com', 'Bouna', 'Ciment', '214563'),
(2, 'Cimaf', 'Cimaf', '42653481', 'cimaf@gmail.com', 'Bouake', 'Ciment', '456123'),
(3, 'Cinuvoire', 'Cinuvoire', '09465123', 'cinuvoire@gmail.com', 'Abouuasso', 'Sable', '36521kh'),
(4, 'Leopard', 'Leopart', '085634125', 'leopard.ivoire@gmail.ci', 'Abidjan', 'Ciment', '42652ldm'),
(5, 'SOTACI', 'SOTACI', '23654845', 'sotaci@gmail.com', 'Abidjan', 'Tole', 'sotaci'),
(6, 'Monsieur Bricollage', 'bricollage', '21536547', 'monsieur.bricolage@gmail.com', 'Abidjan', 'Fer a betton', '4856321kl'),
(7, 'Equipe', 'equipe', '09456235', 'equipe@gmail.com', 'Bouake', 'Sable', '2158gfb'),
(8, 'Mefco', 'mefco', '53654210', 'mefco@gmail.ci', 'Abidjan', 'Ciment', 'azer1253'),
(9, 'Cimouvoire', 'Cimouvoire', '5864523641', 'cimouvoire@yoho.fr', 'Yamoussoukro', 'Sable', '4562lmd'),
(10, 'CISAGUE', 'cisague', '46532176', 'cisague@gmail.com', 'San-Pedro', 'Bois', 'Pas2364'),
(11, 'SASAM', 'sasam', '6254659', 'sasam@gmail.com', 'Bouafle', 'Fer a betton', '123456'),
(12, 'SOSAM', 'sosam', '25653145', 'sosam@gmail.com', 'Adiake', 'Ciment', '123456');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`client`),
  ADD KEY `founisseur` (`fournisseur`),
  ADD KEY `materiel` (`materiel`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article` (`article`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`materiel`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `commande_ibfk_3` FOREIGN KEY (`fournisseur`) REFERENCES `fournisseur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
