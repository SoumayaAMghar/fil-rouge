-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 juin 2022 à 18:06
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
-- Base de données : `dmi`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', 'adminadmin'),
('admin@gmail.com', 'adminadmin'),
('admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `allergy`
--

CREATE TABLE `allergy` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `allergy` varchar(255) NOT NULL,
  `diagnostic_method` varchar(100) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `allergy`
--

INSERT INTO `allergy` (`id`, `id_patient`, `allergy`, `diagnostic_method`, `treatment`, `date`) VALUES
(10, 55, ' insects allergy', 'prick testing', 'none', '2022-06-14'),
(11, 55, 'dust mites allergy', 'prick testing', 'antihistaminic', '2022-06-14');

-- --------------------------------------------------------

--
-- Structure de la table `attachement`
--

CREATE TABLE `attachement` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `attachement` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `attachement`
--

INSERT INTO `attachement` (`id`, `id_patient`, `date`, `type`, `titre`, `attachement`) VALUES
(15, 55, '2022-06-02', 'medical analyses', 'NFS', 'nfs.jpg'),
(16, 55, '2022-06-14', 'medical analyses', 'NFS', 'classD.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `biometry`
--

CREATE TABLE `biometry` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `blood_group` enum('O+','O-','A+','A-','B+','B-','AB+','AB-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `biometry`
--

INSERT INTO `biometry` (`id`, `id_patient`, `date`, `age`, `weight`, `height`, `blood_group`) VALUES
(8, 55, '2022-06-13', '24 Years', '50 Kg', '1.63 m', 'A+');

-- --------------------------------------------------------

--
-- Structure de la table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date` date NOT NULL,
  `disease` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `diseases`
--

INSERT INTO `diseases` (`id`, `id_patient`, `date`, `disease`, `status`) VALUES
(38, 55, '2022-06-09', 'grippe', 'Active'),
(39, 55, '2022-06-15', 'cancer', 'Inactive'),
(40, 55, '2022-06-14', 'grippe', 'Active'),
(41, 70, '2022-06-16', 'mamridach', 'Inactive'),
(42, 55, '2022-06-21', 'flu', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `patente` varchar(255) NOT NULL,
  `status` enum('pending','accepted','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `doctors`
--

INSERT INTO `doctors` (`id`, `firstname`, `lastname`, `speciality`, `phone`, `email`, `password`, `patente`, `status`) VALUES
(1, 'soma', 'soma', 'soma', '23456789', 'soma@gmail.com', '$2y$12$SfPnOZDn14VKCqDxGfBNCOUDrgLiyfaxhkoDmjeBmO53VgZcrgeD2', 'soma', 'accepted'),
(5, 'zineb', 'zineb', 'zineb', '631576604', 'zineb@zineb.com', '$2y$12$096DQbkQmSHJ/55eif0KC.ApP4gvuA/zI/9hT.YPgmz2vGip/I75a', 'zineb', 'accepted'),
(27, 'dounya', 'dounya', 'tbib', '0633551656', 'dounya@gmail.com', '$2y$12$Azm.Ep1ukMvbLUN9uDTmk.rDzlOq3j2hdZjFYKH.1jCQZdqtW3B9i', 'Fa123', 'accepted'),
(29, 'ABDEL', 'Goodwin', 'HHHHH', '+1 (993) 283-6753', 'xamen@mailinator.com', '$2y$12$eoq3ivAzEOwQHNpG5/DrIe9rdWphwiqaxwKXlMSWv8cX.YVePCl9y', 'DD345667', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birthday` date NOT NULL,
  `cin` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `lastname`, `gender`, `birthday`, `cin`, `phone`) VALUES
(55, 'Nash', 'Gallagher', 'male', '2021-11-19', 'HH125891', '+1 (578) 834-7989'),
(56, 'Melvin', 'Watkins', 'male', '1976-12-01', 'HH190467', '+1 (516) 209-3522'),
(59, 'Silas', 'Walters', 'male', '1983-03-05', 'HH124567', '+1 (317) 712-3107'),
(60, 'Erica', 'Noble', 'female', '2013-10-06', 'HH390467', '+1 (541) 987-6807'),
(64, 'Devin', 'Rollins', 'female', '2011-09-06', 'Q305048', '+1 (994) 489-1195'),
(70, 'dounya', 'dou', 'female', '0000-00-00', 'HHHHHHHH1', '1234567890'),
(71, 'test', 'test', 'male', '0000-00-00', 'Q398909', '+1 (981) 343-5941'),
(72, 'Mariam', 'Strong', 'female', '0000-00-00', 'D564321', '0677889900');

-- --------------------------------------------------------

--
-- Structure de la table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `vaccine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vaccine`
--

INSERT INTO `vaccine` (`id`, `id_patient`, `date`, `type`, `vaccine`) VALUES
(6, 55, '2022-01-03', 'COVID-19 ARNm', 'Pfizer-BioNTech COVID-19 Vaccine');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `allergy`
--
ALTER TABLE `allergy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Index pour la table `attachement`
--
ALTER TABLE `attachement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Index pour la table `biometry`
--
ALTER TABLE `biometry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Index pour la table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Index pour la table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `allergy`
--
ALTER TABLE `allergy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `attachement`
--
ALTER TABLE `attachement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `biometry`
--
ALTER TABLE `biometry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `allergy`
--
ALTER TABLE `allergy`
  ADD CONSTRAINT `allergy_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `attachement`
--
ALTER TABLE `attachement`
  ADD CONSTRAINT `attachement_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `biometry`
--
ALTER TABLE `biometry`
  ADD CONSTRAINT `biometry_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`);

--
-- Contraintes pour la table `diseases`
--
ALTER TABLE `diseases`
  ADD CONSTRAINT `diseases_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vaccine`
--
ALTER TABLE `vaccine`
  ADD CONSTRAINT `vaccine_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
