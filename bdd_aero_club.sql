-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 jan. 2024 à 17:03
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
-- Base de données : `bdd_aero_club`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherant`
--

CREATE TABLE `adherant` (
  `autorisation` tinyint(1) NOT NULL DEFAULT 0,
  `nom` char(50) DEFAULT NULL,
  `prenom` char(50) DEFAULT NULL,
  `civilite` char(50) NOT NULL,
  `mail` char(255) NOT NULL,
  `mdp` char(255) NOT NULL,
  `code_postale` char(5) NOT NULL,
  `ville` char(50) NOT NULL,
  `adresse` char(255) NOT NULL,
  `num_tel` char(14) NOT NULL,
  `licence` char(255) NOT NULL,
  `licence_valid` tinyint(1) NOT NULL DEFAULT 0,
  `date_naissance` date DEFAULT NULL,
  `date_crea` timestamp NULL DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT current_timestamp(),
  `compte_actif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherant`
--

INSERT INTO `adherant` (`autorisation`, `nom`, `prenom`, `civilite`, `mail`, `mdp`, `code_postale`, `ville`, `adresse`, `num_tel`, `licence`, `licence_valid`, `date_naissance`, `date_crea`, `date_update`, `compte_actif`) VALUES
(3, 'Guillard', 'Glenn', 'Homme', 'glenn.guillard@gmail.com', '$2y$10$4vN8gXfVJ8r49V08aKD.U.lvuspyiExA3X5KUx..AAr8J10hXBZwu', '77138', 'Luzancy', '3 rue des jardinets', '06 43 50 67 04', 'CyQ84YQqUvrefLJcYXcJ30ORf345budKskPexEkYwEbS6Kyt9s', 2, '2004-02-01', '2023-12-28 02:34:36', '2024-01-04 15:57:32', 1),
(0, 'Guillard', 'Glenn', 'Homme', 'glenn.guillard@outlook.com', '$2y$10$UKlX9I1liUez73mZZKUiseTTHQ0a4Q/NO/UtLR42hp47vm8Fb.l5.', '77138', 'Luzancy', '3 rue des jardinets', '06 43 50 67 04', '0Tah0zXWLZNKe42Fq6WcW23DUEZr7LmYq4F7sP27fgfbnitWMU', 1, '2004-01-30', '2024-01-05 10:56:29', '2024-01-05 10:56:29', 1),
(3, 'Fabre', 'Jérôme', 'Homme', 'jerome.fabre77@gmail.com', '$2y$10$9TDp.NMbX7PJbSV2tCqBNec7ok7XEjPtoXaLIPW0lSScgwneKr/bG', '77181', 'Courtry', '2 rue désiré lefevre', '06 37 84 22 34', '5KGMB9a9jjq39XV56ZXt6kK9U2Q5K1T67K5wi9btHE5Hzi4FRQ', 2, '2004-11-07', '2023-12-28 02:33:11', '2023-12-28 02:33:11', 1),
(1, 'Henry', 'Thomas', 'Femme', 'thomas.henry@gmail.com', '$2y$10$EoVaKqnCSx2rHJsc9/qzXOax9/ehqmIgMCAGkP0JMU6Sg2IxR856S', '31000', 'Toulouse', '13 place de ta mere', '06 23 71 91 08', '', 0, '2004-01-01', '2023-12-28 02:36:12', '2023-12-28 02:36:12', 1),
(3, 'Lamour', 'Valentin', 'Autre', 'valentinlamour@gmail.com', '$2y$10$Ea8mbEGNibXmKvSG1jSHCu.lrRpiF2gqH6Vr5xQWRmPD7/EgOy99W', '93100', 'sdf', 'sdf', '01 23 45 67 89', '', 0, '2022-01-01', '2023-12-28 02:38:21', '2023-12-28 02:38:21', 1);

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

CREATE TABLE `avion` (
  `nom` char(255) DEFAULT NULL,
  `matricule` char(6) NOT NULL,
  `type` char(255) DEFAULT NULL,
  `date_crea` timestamp NULL DEFAULT NULL,
  `date_update` timestamp NULL DEFAULT current_timestamp(),
  `Active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avion`
--

INSERT INTO `avion` (`nom`, `matricule`, `type`, `date_crea`, `date_update`, `Active`) VALUES
('CAMION', 'F-XXXX', 'Multiexiale', '0000-00-00 00:00:00', '2023-12-22 13:54:35', 0),
('Tese', 'Wazo', 'F-8HEL', '2024-01-02 09:06:16', '2024-01-02 09:06:16', 1);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `type` char(50) NOT NULL,
  `prenom` char(50) DEFAULT NULL,
  `nom` char(50) DEFAULT NULL,
  `note` tinyint(1) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `type`, `prenom`, `nom`, `note`, `commentaire`, `date`) VALUES
(2, 'Formation', 'Glenn', 'Guillard', 4, 'Yes &#039;&quot;&#039;&quot;', '2024-01-07 08:31:20'),
(3, 'Bapteme', 'Glenn', 'Guillard', 5, 'je n&#039;aime pas les nems', '2024-01-07 18:13:02'),
(4, 'Forfait', 'Glenn', 'Guillard', 5, 'Trop bien', '2024-01-07 19:57:44'),
(5, 'Forfait', 'Glenn', 'Guillard', 4, 'BOnjour', '2024-01-08 15:38:59');

-- --------------------------------------------------------

--
-- Structure de la table `bapteme`
--

CREATE TABLE `bapteme` (
  `id` int(11) NOT NULL,
  `nom` char(255) NOT NULL,
  `formule` char(20) DEFAULT NULL,
  `temps` char(20) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `image` char(255) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bapteme`
--

INSERT INTO `bapteme` (`id`, `nom`, `formule`, `temps`, `prix`, `image`, `active`) VALUES
(7, 'ULM Pendulaire', 'duo', '30', 100.95, 'KYzy5Vrg0r0D1oS607fCf3S804eFm897WE6d9TTNa066LpElKR', 0),
(8, 'ULM Multiaxiale', 'solo', '20', 95, 'nrNv3UJ3c65A1w64450c0tAKrcP7H0DJ8P2F9n3LGx63L7m96u', 0),
(9, 'ULM Autogire', 'solo', '20;30', 125, '9gE9Ts66E9o2NhGTBt096D21U860eBKH8BoQj2q1169EDYZf2l', 0);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nom` char(50) NOT NULL,
  `prenom` char(50) NOT NULL,
  `fonction` char(50) DEFAULT NULL,
  `image` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `prenom`, `fonction`, `image`) VALUES
(6, 'Saitout', 'CIao', 'Chef pilote', '33MJp9By5dpLS8T24zaSvx363HFH3M9yOUKT5P671B5YkxOg8C'),
(7, 'Laplume', 'Céline', 'Secrétaire', 'OtZuq3VDVnfeuUhF0J2KURB9Zl85XL9VSi0KTGRZZObkM233TD'),
(8, 'Justine', 'Volavu', 'Instructrice', 'H52K6N1LqiCn0LirK1o5I4B87Kg2KsNyg5I6GEKkB0rV9oT94r'),
(9, 'Alain', 'Strument', 'Instructeur', 'C25Tl4JOz94a3tokk7d6l9LDkgpW87ZDas1q4TxCiX146u2HMh'),
(10, 'Jacques', 'Adit', 'Président', '1sfc03eBNx18n45t5k4oMnGLEW0u17QsAW5p2G50OD1w1x8KTQ'),
(11, 'Igor', 'Cleplatte', 'Mécanicien', '0x7ry99LD78S6K7ro0g87Nu8kRO34n4ZreHpudH22Oz5bjv769'),
(12, 'Claudine', 'Monet', 'Trésorière', 'Hc2giRy3xqKdT0a9OM2vi5nYgu6JZOBUZ7eN8ux1e2txZ7jly7');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `nom` char(255) NOT NULL,
  `image` char(255) NOT NULL,
  `lieu` char(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `lien` char(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `nom`, `image`, `lieu`, `date_debut`, `date_fin`, `lien`, `active`) VALUES
(8, 'Journée Sécurité des vols - Grand Est', '6VuN6B928wOmS016ur4Q8BNx9h5ywmwB9s9mF62G2Zc34cK0WP', 'Serrouville, France', '2024-01-10', '2024-01-26', 'https://ffplum.fr/agenda/653-journee-securite-des-vols-2023', 0);

-- --------------------------------------------------------

--
-- Structure de la table `forfait`
--

CREATE TABLE `forfait` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `prix` float NOT NULL,
  `par_h` tinyint(1) NOT NULL DEFAULT 0,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `forfait`
--

INSERT INTO `forfait` (`id`, `nom`, `description`, `prix`, `par_h`, `active`) VALUES
(9, 'Forfait Initiation', 'Idéal pour s\'initier au pilotage;5 vols avec un instructeur du club;5h de vol;Idéal pour se faire une idée;Essence comprise', 500, 0, 0),
(10, 'Forfait Membre', 'Prix pour les 10 premières heures ;Cotisation club 105€;Cotisation moins de 25 ans 60€;Assurance comprise;Avoir licence FFPLUM ou FFW', 90, 1, 0),
(11, 'Forfait Membre +40h', '+10 = 75€ par heure;+20 = 71€ par heure;+30 = 67€ par heure;Moins de 25 ans = -20%;Avoir licence FFPLUM ou FFW', 64, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `nom` char(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `prix` float NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `nom`, `description`, `prix`, `active`) VALUES
(9, 'Brevet de pilote', 'Validité 1 an;Cours illimités;Formation à pied ou en chariot ;Prêt du matériel;10 vols minimum;Cours théorique ;1 cours de perfectionnement offert;Brevet d’Initiation Aéronautique (BIA)', 1200, 0),
(10, 'Emport de passager', 'Durée de 6h à 8h;Évaluation préalable du pilote ;Formation biplace à pied ou en chariot ;Avec le matériel du stagiaire ;4 vols minimum ;Sensibilisation aux facteurs humains', 450, 0),
(11, 'Stage d\'initiation', 'Durée de 3h;Présentation de l’aéronef et notion de mécanique du vol;Gonflage et pilotage d’un parapente au sol;Vol de 20 min en biplace;Initiation au pilotage', 180, 1),
(12, 'Formation', 'bonjour;bonsoir', 125, 0);

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL,
  `image` char(255) NOT NULL,
  `titre` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `image`, `titre`) VALUES
(8, 'H99C1QsOdUBvkM6Ku4ababmfr0H9K4vCMlGmJ3p0bfXi76Q1hJ', 'Avion Galerie'),
(9, 'vaHA4yRi3KRh8H80roiG1oDwDIu9T125gnRl2dHrw4YXh3ImmU', 'Triple avions'),
(10, 'tKt7pCOGKB4iAqdaJG1iQ06e85KaIpFzMaKfAdV8yenI5KqVo6', 'Avions au sol'),
(12, '9640n30dKo3DVm3KildvJ308t75iF67CZg0rp1d153P9t3kb2y', 'Avions'),
(13, 'Nqf4VCaCK4n4i17A0Q9nb3nxVPEx59Od30Z186FuM9J5u25vNW', 'Avions blanc');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `num_res` int(11) NOT NULL,
  `mail` char(255) NOT NULL,
  `matricule` char(255) DEFAULT NULL,
  `pilote` char(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `date_j` date DEFAULT NULL,
  `date_h` time DEFAULT NULL,
  `validation` tinyint(1) DEFAULT 0,
  `date_crea` datetime DEFAULT NULL,
  `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `temps_presta` int(2) DEFAULT NULL,
  `formule` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`num_res`, `mail`, `matricule`, `pilote`, `id`, `date_j`, `date_h`, `validation`, `date_crea`, `date_update`, `temps_presta`, `formule`) VALUES
(6, 'glenn.guillard@gmail.com', '', NULL, 8, '2024-01-29', '14:00:00', 0, '2024-01-09 16:47:39', '2024-01-09 16:03:02', 20, 'solo');

-- --------------------------------------------------------

--
-- Structure de la table `r_forfait`
--

CREATE TABLE `r_forfait` (
  `num_res` int(11) NOT NULL,
  `mail` char(255) NOT NULL,
  `id` int(11) NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT 0,
  `date_crea` datetime DEFAULT NULL,
  `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `r_forfait`
--

INSERT INTO `r_forfait` (`num_res`, `mail`, `id`, `validation`, `date_crea`, `date_update`) VALUES
(6, 'glenn.guillard@gmail.com', 9, 0, '2024-01-09 16:49:06', '2024-01-09 15:49:06');

-- --------------------------------------------------------

--
-- Structure de la table `r_formation`
--

CREATE TABLE `r_formation` (
  `num_res` int(11) NOT NULL,
  `mail` char(255) NOT NULL,
  `id` int(11) NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT 0,
  `date_crea` datetime DEFAULT NULL,
  `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `r_formation`
--

INSERT INTO `r_formation` (`num_res`, `mail`, `id`, `validation`, `date_crea`, `date_update`) VALUES
(6, 'glenn.guillard@gmail.com', 9, 0, '2024-01-09 16:49:03', '2024-01-09 15:49:03');

-- --------------------------------------------------------

--
-- Structure de la table `vu`
--

CREATE TABLE `vu` (
  `date` varchar(7) NOT NULL,
  `compteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vu`
--

INSERT INTO `vu` (`date`, `compteur`) VALUES
('2024-01', 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherant`
--
ALTER TABLE `adherant`
  ADD PRIMARY KEY (`mail`);

--
-- Index pour la table `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bapteme`
--
ALTER TABLE `bapteme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forfait`
--
ALTER TABLE `forfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`num_res`),
  ADD KEY `mail` (`mail`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `r_forfait`
--
ALTER TABLE `r_forfait`
  ADD PRIMARY KEY (`num_res`),
  ADD KEY `mail` (`mail`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `r_formation`
--
ALTER TABLE `r_formation`
  ADD PRIMARY KEY (`num_res`),
  ADD KEY `mail` (`mail`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `vu`
--
ALTER TABLE `vu`
  ADD PRIMARY KEY (`date`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `bapteme`
--
ALTER TABLE `bapteme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `forfait`
--
ALTER TABLE `forfait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `num_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `r_forfait`
--
ALTER TABLE `r_forfait`
  MODIFY `num_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `r_formation`
--
ALTER TABLE `r_formation`
  MODIFY `num_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `adherant` (`mail`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id`) REFERENCES `bapteme` (`id`);

--
-- Contraintes pour la table `r_forfait`
--
ALTER TABLE `r_forfait`
  ADD CONSTRAINT `r_forfait_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `adherant` (`mail`),
  ADD CONSTRAINT `r_forfait_ibfk_2` FOREIGN KEY (`id`) REFERENCES `forfait` (`id`);

--
-- Contraintes pour la table `r_formation`
--
ALTER TABLE `r_formation`
  ADD CONSTRAINT `r_formation_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `adherant` (`mail`),
  ADD CONSTRAINT `r_formation_ibfk_2` FOREIGN KEY (`id`) REFERENCES `formation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
