-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 juin 2022 à 20:08
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
-- Base de données : `dmii`
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
  `id_doctor` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `allergy` varchar(255) NOT NULL,
  `diagnostic_method` varchar(100) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `allergy`
--

INSERT INTO `allergy` (`id`, `id_doctor`, `id_patient`, `doctor_name`, `allergy`, `diagnostic_method`, `treatment`, `date`) VALUES
(13, 35, 80, '0', ' insects allergy', 'prick testing', 'antihistaminic', '1996-08-22'),
(18, 1, 77, 'soma', 'Impedit Nam sed qui', 'Enim qui sed placeat', 'Ab tenetur sit sunt ', '1998-07-04');

-- --------------------------------------------------------

--
-- Structure de la table `attachement`
--

CREATE TABLE `attachement` (
  `id` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date` date NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `attachement` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `attachement`
--

INSERT INTO `attachement` (`id`, `id_doctor`, `id_patient`, `date`, `doctor_name`, `type`, `titre`, `attachement`) VALUES
(21, 35, 80, '1998-12-08', '', 'medical analyses', ' blood count (CBC)', 'nfs.jpg'),
(22, 35, 77, '1997-07-21', '', 'Fugit temporibus ve', 'Odio occaecat soluta', 'nfs.jpg'),
(23, 1, 77, '2010-01-22', 'soma', 'Expedita unde obcaec', 'Quo eiusmod assumend', 'nfs.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `biometry`
--

CREATE TABLE `biometry` (
  `id` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date` date NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `age` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `blood_group` enum('O+','O-','A+','A-','B+','B-','AB+','AB-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `biometry`
--

INSERT INTO `biometry` (`id`, `id_doctor`, `id_patient`, `date`, `doctor_name`, `age`, `weight`, `height`, `blood_group`) VALUES
(14, 35, 80, '2005-05-15', '0', '19 year', '50 kg', '1.63 m', 'O+'),
(15, 35, 77, '1982-06-23', '0', '20 years', '100 Kg', '1.78 m', 'A-'),
(18, 1, 77, '2001-09-30', 'soma', 'Neque labo', 'Dolores ex', 'Dolore ten', 'A-');

-- --------------------------------------------------------

--
-- Structure de la table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date` date NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `diseases`
--

INSERT INTO `diseases` (`id`, `id_doctor`, `id_patient`, `date`, `doctor_name`, `disease`, `status`) VALUES
(45, 35, 80, '1991-04-03', '', 'cancer', 'Inactive'),
(46, 35, 77, '2021-12-04', '', 'Tempor necessitatibu', 'Inactive'),
(49, 1, 77, '1990-01-19', 'soma', 'Qui nostrum libero e', 'Inactive');

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
(33, 'Ina', 'Burgess', 'ophthalmologist', '+1 (894) 898-8644', 'mera@mailinator.com', '$2y$12$KKojfevm0FLuEbLG4.zubeHpElcoREg75GKewKymJL.CGNIuLLGbC', 'SD4567888', 'pending'),
(34, 'Rafael', 'Abbott', 'cardiologist', '+1 (152) 545-3042', 'mepihugebi@mailinator.com', '$2y$12$B406HiNrOX0s.lwbodru2e2GzqtJmoCBsliJGnw0srZXVooTSLIja', 'XW3456789', 'rejected'),
(35, 'Demetria', 'Pitts', 'pediatrician', '+1 (609) 213-8911', 'baxakysa@mailinator.com', '$2y$12$jhV1pgV6mgFhC2c60Xet/utHpHhJQkERJm1.k5tCMnfaohKj9kVte', 'KK3456789', 'accepted'),
(36, 'Ethan', 'Mcintyre', 'nephrologist', '+1 (811) 258-1497', 'lukawacehi@mailinator.com', '$2y$12$tnaLsadLNXutQPepPVw66OmszI1qzzF3IQAKRz3pHrcg0umVDyuDi', 'KJ2345678', 'accepted'),
(37, 'Katelyn', 'Griffin', ' radiologist', '+1 (316) 507-1314', 'zydacatyge@mailinator.com', '$2y$12$J7QQkf3TMDugj86R4faDV.vAN2c0h/BgP6uW9kprLNH4Gb33/Hb7e', 'LMK45678', 'accepted'),
(38, 'Adria', 'Hernandez', ' generalist', '+1 (786) 415-1925', 'robawab@mailinator.com', '$2y$12$7zdOvv1ULa8ZoItLwPYWwezhb1GN3J/Hq1z63c3I0PGm/BH9Q51IO', 'BNV45678', 'pending'),
(39, 'Theodore', 'Norton', 'neurologist', '+1 (402) 187-4188', 'pagoqu@mailinator.com', '$2y$12$OsbC.pbBuHUMVTOxC6zdh.O2kWXMIspef0W.vYv9J4ernLLpx97fC', 'BLV2345678', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
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

INSERT INTO `patients` (`id`, `id_doctor`, `firstname`, `lastname`, `gender`, `birthday`, `cin`, `phone`) VALUES
(77, 1, 'Marvin', 'Boyle', 'female', '0000-00-00', 'Deserunt rerum quaer', '+1 (486) 729-6682'),
(78, 1, 'Jenna', 'Saunders', 'male', '0000-00-00', 'Illo incididunt adip', '+1 (452) 471-3603'),
(79, 1, 'Ivor', 'Reese', 'female', '0000-00-00', 'Proident velit itaq', '+1 (178) 887-4871'),
(80, 35, 'Jameson', 'Rojas', 'female', '0000-00-00', 'Sit ex voluptate do', '+1 (583) 166-8109');

-- --------------------------------------------------------

--
-- Structure de la table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date` date NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `vaccine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vaccine`
--

INSERT INTO `vaccine` (`id`, `id_doctor`, `id_patient`, `date`, `doctor_name`, `type`, `vaccine`) VALUES
(9, 35, 80, '2022-06-15', '', 'COVID-19 ARNm', 'Pfizer-BioNTech COVID-19 Vaccine'),
(10, 35, 77, '2016-11-13', '', 'Obcaecati pariatur ', 'Veniam illo repudia'),
(11, 1, 77, '1977-03-08', 'soma', 'Soluta qui eos cons', 'Facere nostrum a et ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `allergy`
--
ALTER TABLE `allergy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Index pour la table `attachement`
--
ALTER TABLE `attachement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Index pour la table `biometry`
--
ALTER TABLE `biometry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Index pour la table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Index pour la table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Index pour la table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `vaccine_ibfk_2` (`id_doctor`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `allergy`
--
ALTER TABLE `allergy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `attachement`
--
ALTER TABLE `attachement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `biometry`
--
ALTER TABLE `biometry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `allergy`
--
ALTER TABLE `allergy`
  ADD CONSTRAINT `allergy_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allergy_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`);

--
-- Contraintes pour la table `attachement`
--
ALTER TABLE `attachement`
  ADD CONSTRAINT `attachement_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attachement_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`);

--
-- Contraintes pour la table `biometry`
--
ALTER TABLE `biometry`
  ADD CONSTRAINT `biometry_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `biometry_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`);

--
-- Contraintes pour la table `diseases`
--
ALTER TABLE `diseases`
  ADD CONSTRAINT `diseases_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diseases_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`);

--
-- Contraintes pour la table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`);

--
-- Contraintes pour la table `vaccine`
--
ALTER TABLE `vaccine`
  ADD CONSTRAINT `vaccine_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccine_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
