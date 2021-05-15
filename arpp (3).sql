-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 mai 2021 à 16:37
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arpp`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `IdEvent` int(11) NOT NULL,
  `TitreE` varchar(50) NOT NULL,
  `DateE` date NOT NULL,
  `ContenuE` longtext NOT NULL,
  `Photo` varchar(30) NOT NULL,
  `Prix` int(10) NOT NULL,
  `TypeE` varchar(10) NOT NULL,
  `NbInscritE` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`IdEvent`, `TitreE`, `DateE`, `ContenuE`, `Photo`, `Prix`, `TypeE`, `NbInscritE`) VALUES
(1, '     Rencontre entre membres ', '2021-06-06', ' 			 			 Le but de cette rencontre est premièrement de nous revoir entre ancien, mais toute personne intéressée par nos projet est fortement conviée pour nous rencontrer et parler de nos projets etc...1 Le but de cette rencontre est premièrement de nous revoir entre ancien, mais toute personne intéressée par nos projet est fortement conviée pour nous rencontrer et parler de nos projets etc...2 Le but de cette rencontre est premièrement de nous revoir entre ancien, mais toute personne intéressée par nos projet est fortement conviée pour nous rencontrer et parler de nos projets etc...3 Le but de cette rencontre est premièrement de nous revoir entre ancien, mais toute personne intéressée par nos projet est fortement conviée pour nous rencontrer et parler de nos projets etc...4   ', '', 0, '     Renco', NULL),
(2, 'Colloque ABC', '2021-06-10', '1 A 18h30 à la salle polyvalente de Lyon 7eme.\r\n\r\nRéunion visant à l\'étude d\'une question scientifique ou à la discussion de problèmes diplomatiques, économiques, politiques, etc congrès.\r\nÀ l\'origine les colloques, du latin colloquium (« conversation »), sont des conférences religieuses tenues dans le but de discuter un point de doctrine ou de concilier des opinions diverses.\r\n\r\n2. A 18h30 à la salle polyvalente de Lyon 7eme.\r\n\r\nRéunion visant à l\'étude d\'une question scientifique ou à la discussion de problèmes diplomatiques, économiques, politiques, etc congrès.\r\nÀ l\'origine les colloques, du latin colloquium (« conversation »), sont des conférences religieuses tenues dans le but de discuter un point de doctrine ou de concilier des opinions diverses.\r\n\r\n3.A 18h30 à la salle polyvalente de Lyon 7eme.\r\n\r\nRéunion visant à l\'étude d\'une question scientifique ou à la discussion de problèmes diplomatiques, économiques, politiques, etc congrès.\r\nÀ l\'origine les colloques, du latin colloquium (« conversation »), sont des conférences religieuses tenues dans le but de discuter un point de doctrine ou de concilier des opinions diverses.', '', 15, 'Colloque', NULL),
(3, 'Les enfants à haut potentiel avec difficultés', '2021-08-13', '1. Rencontre de plusieurs psychologues sur le sujet des enfants à haut potentiel.\r\n\r\nUne confrontation d\'idées (scientifiques ou médicales, philosophiques, politique…) sur un sujet jugé d\'importance par les participants. \r\n\r\nLieu: Salle de conférence 2 de l\'université de Lyon II \r\nHoraire: 16h30 \r\n\r\n2. Rencontre de plusieurs psychologues sur le sujet des enfants à haut potentiel.\r\n\r\nUne confrontation d\'idées (scientifiques ou médicales, philosophiques, politique…) sur un sujet jugé d\'importance par les participants. \r\n\r\nLieu: Salle de conférence 2 de l\'université de Lyon II \r\nHoraire: 16h30 \r\n\r\n\r\n', '', 5, 'Conférence', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `IdQuestion` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Réponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`IdQuestion`, `Question`, `Réponse`) VALUES
(1, 'Comment s\'inscrire à un évènement ou formation ?', 'C\'est très simple ! \r\nIl suffit de vous rendre sur la page qui vous intéresse et de cliquer sur \"S\'inscrire\". Remplissez ensuite le formulaire avec vos informations, et voilà ! '),
(2, 'Pourquoi faire ce site ?', 'Parce que c\'est très pratique et très simple !');

-- --------------------------------------------------------

--
-- Structure de la table `fomrcontact`
--

CREATE TABLE `fomrcontact` (
  `IdMessage` int(11) NOT NULL,
  `NomC` text NOT NULL,
  `Email` text NOT NULL,
  `IdSujet` int(11) NOT NULL,
  `ContenuC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `IdFormation` int(11) NOT NULL,
  `TitreF` varchar(100) NOT NULL,
  `Durée` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Prix` int(100) DEFAULT NULL,
  `DescriptionF` longtext NOT NULL,
  `Public` varchar(200) NOT NULL,
  `CompétencesDev` varchar(500) NOT NULL,
  `NbPersonneInscrit` int(10) NOT NULL,
  `NbPersonneMax` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`IdFormation`, `TitreF`, `Durée`, `Prix`, `DescriptionF`, `Public`, `CompétencesDev`, `NbPersonneInscrit`, `NbPersonneMax`) VALUES
(1, '     Évaluation de la créativité, EPoC   ', '2021-05-11 14:01:01', 250, ' 			 			 Cette formation d\'une journée permet à comprendre les mesures du potentiel créatif chez l\'enfant et l\'adolescent. L\'outil EPoC (Évaluation du Potentiel Créatif) sera présenté. Les exercices pratiques permettent à effectuer la passation des épreuves, noter les réponses selon les grilles de cotation, et interpréter les résultats. Moyens pédagogiques d’encadrement : conférences d\'experts, exercices, discussions. Moyens permettant de suivre l’exécution de l’action et d’en apprécier les résultats : tests de connaissances ( quizz) et exercices de mise en situation, auto-questionnaire de positionnement en fin de formation.   ', '     Psychologues et professionnels de l\'éducation ( enseignants, ... )   ', '     Capacité à mettre en œuvre un bilan du potentiel créatif   ', 2, 10),
(2, 'Formation à la créativité thérapeutique', '2021-04-28 15:09:58', 350, 'Formation de deux jours. Le premier jour consiste en une présentation synthétique de la créativité en contexte clinique et une présentation de 4 techniques permettant à introduire des idées originales lors des séances de thérapie. \r\n\r\nLe deuxième jour est centré sur la mise en application des techniques (mise en situation, jeux de rôles) et un bilan des difficultés rencontrées.\r\n\r\nMoyens pédagogiques d’encadrement : conférences d\'experts, démonstrations, exercices, discussions.\r\n\r\nMoyens permettant de suivre l’exécution de l’action et d’en apprécier les résultats : tests de connaissances ( quizz) et exercices de mise en situation, auto-questionnaire de positionnement en fin de formation.', 'Psychiatres, psychologues et professionnels de santé', 'Capacité à mettre en œuvre des techniques de créativité au profit de la prise en charge des clients en psychiatrie et psychologie', 0, 20),
(3, 'Formation en dramathérapie', '2021-04-28 15:15:23', 1000, 'Formation de 10 séances, sur 10 mois: 1 journée par moi.\r\nPrésentation des techniques de dramathérapie. Les concepts et techniques du théâtre sont mis en œuvre au profit de l\'aide à la personne. \r\nLors des séances les soignants participeront aux exercices impliquant les patients de leurs établissements.\r\n\r\nMoyens pédagogiques d’encadrement : démonstrations, exercices, discussions.\r\n\r\nMoyens permettant de suivre l’exécution de l’action et d’en apprécier les résultats : exercices de mise en situation, auto-questionnaire de positionnement en fin de formation.', 'Psychiatres, psychologues et professionnels de santé (infirmiers en psychiatrie, ..)', 'Capacité à mettre en œuvre des techniques de dramathérapie au profit\r\nde la prise en charge des clients en psychiatrie et psychologie', 0, 10),
(4, 'Formation en supervision thérapeutique', '2021-04-28 15:17:23', 1000, 'Formation de 10 séances, sur 10 mois. \r\nPrésentation des concepts de supervision et d\'analyse des pratiques cliniques. \r\n\r\nLors des séances les soignants participeront aux analyses, études de cas, et\r\ndiscussions de leur pratique clinique.\r\n\r\nMoyens pédagogiques d’encadrement : discussions, débats, analyse de cas clinique\r\nMoyens permettant de suivre l’exécution de l’action et d’en apprécier les résultats : exercices de mise\r\nen situation, auto-questionnaire de positionnement à chaque séance', 'Psychiatres, psychologues et professionnels de santé (infirmiers en psychiatrie, ..)', 'Capacité à prendre du recul par rapport aux situations cliniques,\r\naugmentation de la capacité à mener une thérapie bien formalisée et encadrée', 0, 15),
(5, 'Formation à la prise en charge d\'enfants à haut potentiel avec difficultés', '2021-04-28 15:20:20', 350, 'Formation de deux jours. \r\nLe premier jour consiste en une présentation synthétique des concepts du\r\nhaut potentiel et les différents types de difficultés rencontrées (socio-émotionelles et scolaires).\r\n\r\nLe deuxième jour est centré sur la mise en application des un bilan psychologique du haut potentiel et des des difficultés rencontrées, ainsi que les pistes cliniques de prise en charge.\r\n\r\nMoyens pédagogiques d’encadrement : conférences d\'experts, exercices, discussions.\r\n\r\nMoyens permettant de suivre l’exécution de l’action et d’en apprécier les résultats : tests de connaissances ( quizz) et exercices de mise en situation, auto-questionnaire de positionnement en fin de formation.', 'Psychiatres, psychologues et professionnels de santé', 'Compréhension du haut potentiel, capacité à mener un bilan du haut\r\npotentiel, compréhension de la prise en charge des clients en psychiatrie et psychologie', 0, 20);

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `IdInformation` int(11) NOT NULL,
  `TitreI` varchar(50) NOT NULL,
  `ContenuI` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE `inscrit` (
  `IdMembre` int(11) NOT NULL,
  `IdEvent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscritf`
--

CREATE TABLE `inscritf` (
  `IdMembre` int(11) NOT NULL,
  `IdFormation` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscritf`
--

INSERT INTO `inscritf` (`IdMembre`, `IdFormation`) VALUES
(3, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `IdMembre` int(11) NOT NULL,
  `Nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Prenom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Mail` varchar(60) CHARACTER SET utf8 NOT NULL,
  `Tel` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`IdMembre`, `Nom`, `Prenom`, `Mail`, `Tel`) VALUES
(1, 'Arpp', 'Arpp', 'arppmessagerie@gmail.com', ''),
(2, 'Lubart', 'Elsa', 'elsa.lubart@hotmail.com', '0782397698'),
(3, 'Martelet', 'Sophie', 'sophiemartelet@yahoo.com', '06.....');

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `IdQuestionnaire` int(11) NOT NULL,
  `TitreQ` text NOT NULL,
  `InfoQ` text NOT NULL,
  `Q1` text NOT NULL,
  `Q2` text NOT NULL,
  `Q3` text NOT NULL,
  `Q4` text NOT NULL,
  `Q5` text NOT NULL,
  `Q6` text NOT NULL,
  `Q7` text NOT NULL,
  `Q8` text NOT NULL,
  `Q9` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`IdQuestionnaire`, `TitreQ`, `InfoQ`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`) VALUES
(2, 'QUESTIONNAIRE INDIVIDUEL DES BESOINS EN FORMATION ET D’ANALYSE DES PRATIQUES PROFESSIONNELLES', '', '1 - Avez-vous déjà suivi une formation sur le thème proposé Oui ou  Non. Décrivez vos formations antérieures', '2 – Qu’attendez-vous concrètement de cette formation ?', '3 – Avez-vous, au cours de votre activité professionnelle, rencontré des situations en lien avec le thème de cette formation ?', 'QUESTIONNAIRE INDIVIDUEL EN FIN DE FORMATION ET D’ANALYSE D\'IMPACT PAR RAPPORT AUX PRATIQUES PROFESSIONNELLES', '1 – Suite à cette formation, avez vous acquis de nouvelles connaissances ?\r\npas du tout /plutôt non /plutôt oui /tout à fait.\r\nDécrivez ce que vous avez appris en terme de connaissance.', '2- Suite à cette formation, avez vous acquis des nouveaux savoir faire ? Pas du tout/ plutôt non /plutôt oui /tout à fait. Décrivez ce que vous avez appris en terme de savoir faire.', '3 – Cette formation, a-t-elle répondu à vos attentes ?', '4 – Cette formation, peut-elle impacter votre activité professionnelle ? Comment ?', '5 – Si vous pouvez aller plus loin dans un parcours de formation, quels thèmes vous intéressent?');

-- --------------------------------------------------------

--
-- Structure de la table `réponsesq`
--

CREATE TABLE `réponsesq` (
  `IdReponse` int(11) NOT NULL,
  `Q1` varchar(500) NOT NULL,
  `Q2` varchar(500) NOT NULL,
  `Q3` varchar(500) NOT NULL,
  `Q5` varchar(500) NOT NULL,
  `Q6` varchar(500) NOT NULL,
  `Q7` varchar(500) NOT NULL,
  `Q8` varchar(500) NOT NULL,
  `Q9` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `IdSujet` int(11) NOT NULL,
  `TitreS` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`IdSujet`, `TitreS`) VALUES
(1, 'Questions générales'),
(2, 'Evénement'),
(3, 'Formation'),
(4, 'Association'),
(5, 'Site');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`IdEvent`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`IdQuestion`);

--
-- Index pour la table `fomrcontact`
--
ALTER TABLE `fomrcontact`
  ADD PRIMARY KEY (`IdMessage`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`IdFormation`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`IdInformation`);

--
-- Index pour la table `inscrit`
--
ALTER TABLE `inscrit`
  ADD UNIQUE KEY `IdMembre` (`IdMembre`),
  ADD KEY `IdEvent` (`IdEvent`);

--
-- Index pour la table `inscritf`
--
ALTER TABLE `inscritf`
  ADD KEY `IdMembre` (`IdMembre`),
  ADD KEY `IdFormation` (`IdFormation`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`IdMembre`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`IdQuestionnaire`);

--
-- Index pour la table `réponsesq`
--
ALTER TABLE `réponsesq`
  ADD PRIMARY KEY (`IdReponse`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`IdSujet`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `IdEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `IdQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `fomrcontact`
--
ALTER TABLE `fomrcontact`
  MODIFY `IdMessage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `IdFormation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `IdInformation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `IdMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `IdQuestionnaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `réponsesq`
--
ALTER TABLE `réponsesq`
  MODIFY `IdReponse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `IdSujet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
