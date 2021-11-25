-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : database:3306
-- Généré le :  mar. 23 nov. 2021 à 09:53
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
(1, 'NodeJs (1/6)', 'Grafikart', 'JavaScript', 'Frontend', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/0PA69L88HeI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(2, 'NodeJs (2/6)', 'Grafikart', 'JavaScript', 'Frontend', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/53U0TBKFwUw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(3, 'NodeJs (3/6)', 'Grafikart', 'JavaScript', 'Frontend', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HLPHoY-h7vc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(4, 'NodeJs (4/6)', 'Grafikart', 'JavaScript', 'Frontend', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iZCYQSq9IQM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(5, 'NodeJs (5/6)', 'Grafikart', 'JavaScript', 'Frontend', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/B4P_b-UzjLw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(6, 'NodeJs (6/6)', 'Grafikart', 'JavaScript', 'Frontend', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Q8wacXNngXs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
