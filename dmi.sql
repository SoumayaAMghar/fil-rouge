-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 juin 2022 à 00:27
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
  `diagnostic` varchar(100) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `allergy`
--

INSERT INTO `allergy` (`id`, `id_patient`, `allergy`, `diagnostic`, `treatment`, `date`) VALUES
(4, 9, 'Dust mite allergy', 'eczema', 'none', '2022-06-01'),
(6, 2, 'Hic expedita ex ad p', 'Itaque ut ad rerum d', 'Laudantium similiqu', '1998-11-12');

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
(3, 9, '2022-05-31', 'Medical analyses', 'diabetes', 'file-pdf'),
(9, 2, '1981-07-18', 'Minim dolor officia ', 'Ut eius aliquid duis', 'Capture.PNG'),
(10, 2, '2018-03-10', 'Quam eos quo minim e', 'Est sit animi nulla', 'ab_medical-ai-1030x438.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `biometry`
--

CREATE TABLE `biometry` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `age` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `blood_group` enum('O+','O-','A+','A-','B+','B-','AB+','AB-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `biometry`
--

INSERT INTO `biometry` (`id`, `id_patient`, `age`, `weight`, `height`, `blood_group`) VALUES
(1, 2, '23', '67 KG', '1.65 m', 'O+'),
(2, 2, '56', '45', '1.52', 'A-');

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
(1, 3, '2022-05-31', 'Cholesterol', 'Active'),
(2, 7, '2022-05-26', 'Diabetes mellitus', 'Active'),
(3, 2, '2022-05-01', 'Cardiomyopathy', 'Active'),
(4, 7, '2022-04-06', 'Cholesterol', 'Inactive'),
(5, 7, '2012-10-17', 'Anemia', 'Inactive'),
(6, 7, '2018-05-01', 'Alzheimer', 'Active'),
(16, 2, '2022-05-30', 'cancer', 'Inactive'),
(17, 3, '2022-05-23', 'grippe', 'Active'),
(18, 3, '2022-05-30', 'cancer', 'Active'),
(19, 3, '2022-05-31', 'Teeeeeeeeeeeeeeeeest', 'Inactive'),
(20, 3, '2022-06-01', 'grippe', 'Inactive'),
(21, 3, '1991-08-26', 'In tenetur nihil sun', 'Inactive'),
(22, 3, '1970-06-26', 'Ratione adipisicing ', 'Active'),
(23, 3, '2022-05-30', 'grippe', 'Inactive'),
(24, 3, '2009-02-20', 'Ea quia dolor nisi e', 'Inactive'),
(29, 2, '2002-04-01', 'Vitae consequatur li', 'Inactive'),
(30, 2, '2022-06-09', 'grippe', 'Active'),
(31, 2, '1974-10-16', 'fungy', 'Active');

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
(3, 'abdo', 'abdo', 'abdo', '623813946', 'abdo@abdo.com', '$2y$12$Ps.GeL/srEBNJJ9HqkZAz.EOUd4QASuqNnNcKjN0VTqyiz4UkyLHa', 'abdo', 'rejected'),
(4, 'Kimberley', 'Donaldson', 'Quae lorem perferend', '1', 'hagimo@mailinator.com', '$2y$12$jvJTOGbjJ/MfF1NguuYi4OOGtRMN6411INyMmhaMr41arAYzoTN/S', 'Irure minima fugit ', 'rejected'),
(5, 'zineb', 'zineb', 'zineb', '631576604', 'zineb@zineb.com', '$2y$12$096DQbkQmSHJ/55eif0KC.ApP4gvuA/zI/9hT.YPgmz2vGip/I75a', 'zineb', 'accepted'),
(6, 'Pascale', 'Carpenter', 'Anim odio qui sint i', '1', 'wigula@mailinator.com', '$2y$12$1NIepMHbWa/Lcuzzv7eQhOahRlwiTzoHhBqnbzUn6fCwpen.MuO0O', 'Repellendus Ipsam o', 'pending'),
(10, 'Gloria', 'Eaton', 'Corporis qui minima ', '1', 'rexyzecoko@mailinator.com', '$2y$12$CK/XG.wqkedKcuHNpLUgnepq.z4MknGHpIqS59CUNzHV72uhM4Zky', 'Quia aliquid cupidit', 'pending'),
(11, 'Keith', 'Vasquez', 'Maxime similique sit', '1', 'lopod@mailinator.com', '$2y$12$d4kk2YzRSkq6iGcqdw54q.dmPbLl3fbrO4rI7JYuZ2f1SaFDUMbaC', 'Vasquez', 'pending'),
(12, 'Scarlett', 'Ochoa', 'Ea aute asperiores e', '1', 'butofep@mailinator.com', '$2y$12$alugbPbeESZiHmPiraZcselLOxCztDFP0uNyg7EpaJa0.ZP2UXAX6', 'Scarlett', 'rejected');

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
  `phone` varchar(20) NOT NULL,
  `blood_group` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `lastname`, `gender`, `birthday`, `cin`, `phone`, `blood_group`) VALUES
(2, 'Herrod', 'Blackwell', 'male', '1990-05-07', 'FG456788', '2147483647', 'B-'),
(3, 'test2', 'test2', 'female', '1992-05-01', 'Q23456', '3456789', 'A+'),
(5, 'Harlan', 'Rich', 'male', '1973-08-11', 'HH124567', '631576604', 'O+'),
(7, 'Christopher', 'Patterson', 'male', '1991-04-01', 'JH345678', '1567156', 'AB-'),
(8, 'Stewart', 'Scott', 'female', '2015-01-25', 'AA1234567', '123418', 'A+'),
(9, 'Hale', 'Vincent', 'male', '1998-01-04', 'Q1234567', '2345863', 'B+'),
(10, 'Wallace', 'Stanley', 'male', '2002-08-10', 'HH191652', '762340439', 'AB+'),
(12, 'Jasper', 'Simon', 'male', '0000-00-00', 'Ex voluptatibus expl', '00212688643167', ''),
(13, 'soumaya', 'amghar', 'female', '1994-02-02', 'Q305048', '0700740294', 'A+');

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
(3, 2, '1971-06-10', 'Id aperiam natus mod', 'Tenetur quo eum eum '),
(4, 2, '2000-03-03', 'COVID-19 ARNm', 'Pfizer-BioNTech COVID-19 Vaccine');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `attachement`
--
ALTER TABLE `attachement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `biometry`
--
ALTER TABLE `biometry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
