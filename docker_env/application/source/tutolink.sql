-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : database:3306
-- Généré le :  lun. 29 nov. 2021 à 13:30
-- Version du serveur :  10.4.2-MariaDB-1:10.4.2+maria~bionic
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `tutolink`
--

CREATE TABLE `tutolink` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `langage` varchar(255) NOT NULL,
  `environnement` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tutolink`
--

INSERT INTO `tutolink` (`id`, `titre`, `auteur`, `langage`, `environnement`, `lien`) VALUES
(1, 'Apprendre le JS part 1.', 'Primfx', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/PIU_2SBSZgw'),
(2, 'NodeJs (2/6)', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/53U0TBKFwUw'),
(3, 'NodeJs (3/6)', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/HLPHoY-h7vc'),
(4, 'NodeJs (4/6)', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/iZCYQSq9IQM'),
(5, 'NodeJs (5/6)', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/B4P_b-UzjLw'),
(6, 'NodeJs (6/6)', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/Q8wacXNngXs'),
(7, 'Grafikart', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/JidGRO0cQQ4'),
(8, 'Grafikart', 'Grafikart', 'Javascript', 'Frontend', 'https://www.youtube.com/embed/JidGRO0cQQ4'),
(9, 'Grafikart', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/JidGRO0cQQ4'),
(10, 'Grafikart', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/JidGRO0cQQ4'),
(11, 'Grafikart', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/JidGRO0cQQ4'),
(12, 'Grafikart', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/JidGRO0cQQ4'),
(13, 'Grafikart', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/JidGRO0cQQ4'),
(14, 'Grafikart', 'Grafikart', 'JavaScript', 'Frontend', 'https://www.youtube.com/embed/JidGRO0cQQ4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tutolink`
--
ALTER TABLE `tutolink`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tutolink`
--
ALTER TABLE `tutolink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
