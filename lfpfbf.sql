-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 juil. 2022 à 12:53
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lfpfbf`
--

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `idclub` int(11) NOT NULL,
  `nomclub` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`idclub`, `nomclub`) VALUES
(1, 'FC DRAGON'),
(2, 'ASPFV'),
(3, 'ASLKVF'),
(4, 'FC ABDSEK');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `Idjoueur` int(11) NOT NULL,
  `saison` varchar(10) NOT NULL,
  `Categorie` varchar(20) NOT NULL,
  `idclub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`Idjoueur`, `saison`, `Categorie`, `idclub`) VALUES
(1, '2020-2021', 'Sénior', 1),
(1, '2021-2022', 'Sénior', 1),
(2, '2020-2021', 'Junior', 2),
(3, '2022-2023', 'Sénior', 1);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `Idjoueur` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `datenaissance` date NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`Idjoueur`, `Nom`, `prenom`, `datenaissance`, `ville`) VALUES
(1, 'ADEDIRAN', 'Abdel', '2022-07-05', 'calavi'),
(2, ' adediran    ', 'Abdel salame', '2022-07-14', 'calavi'),
(3, 'Odilon', 'Abdel', '2022-07-06', 'Cotonou'),
(4, 'Oussou', 'Abdel salame', '2022-07-13', 'Cotonou');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(10) NOT NULL,
  `motdepass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`idclub`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`Idjoueur`,`saison`),
  ADD KEY `idclub` (`idclub`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`Idjoueur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `idclub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `Idjoueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`Idjoueur`) REFERENCES `joueur` (`Idjoueur`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`idclub`) REFERENCES `club` (`idclub`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
