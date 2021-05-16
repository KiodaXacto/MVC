-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 02:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `IdEvent` int(11) NOT NULL,
  `TitreE` varchar(50) NOT NULL,
  `DateE` date NOT NULL,
  `ContenuE` longtext NOT NULL,
  `Photo` varchar(500) NOT NULL,
  `Prix` int(10) NOT NULL,
  `TypeE` varchar(10) NOT NULL,
  `NbInscritE` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`IdEvent`, `TitreE`, `DateE`, `ContenuE`, `Photo`, `Prix`, `TypeE`, `NbInscritE`) VALUES
(1, '     Rencontre entre membres ', '2021-06-06', ' 			 			 Le but de cette rencontre est premièrement de nous revoir entre ancien, mais toute personne intéressée par nos projet est fortement conviée pour nous rencontrer et parler de nos projets etc...1 Le but de cette rencontre est premièrement de nous revoir entre ancien, mais toute personne intéressée par nos projet est fortement conviée pour nous rencontrer et parler de nos projets etc...2 Le but de cette rencontre est premièrement de nous revoir entre ancien, mais toute personne intéressée par nos projet est fortement conviée pour nous rencontrer et parler de nos projets etc...3 Le but de cette rencontre est premièrement de nous revoir entre ancien, mais toute personne intéressée par nos projet est fortement conviée pour nous rencontrer et parler de nos projets etc...4   ', 'https://www.biofan.com/blog/wp-content/uploads/2012/05/iStock_000009652658XSmall.jpg', 0, 'Colloque', NULL),
(2, 'Colloque ABC', '2021-06-10', '1 A 18h30 à la salle polyvalente de Lyon 7eme.\r\n\r\nRéunion visant à l\'étude d\'une question scientifique ou à la discussion de problèmes diplomatiques, économiques, politiques, etc congrès.\r\nÀ l\'origine les colloques, du latin colloquium (« conversation »), sont des conférences religieuses tenues dans le but de discuter un point de doctrine ou de concilier des opinions diverses.\r\n\r\n2. A 18h30 à la salle polyvalente de Lyon 7eme.\r\n\r\nRéunion visant à l\'étude d\'une question scientifique ou à la discussion de problèmes diplomatiques, économiques, politiques, etc congrès.\r\nÀ l\'origine les colloques, du latin colloquium (« conversation »), sont des conférences religieuses tenues dans le but de discuter un point de doctrine ou de concilier des opinions diverses.\r\n\r\n3.A 18h30 à la salle polyvalente de Lyon 7eme.\r\n\r\nRéunion visant à l\'étude d\'une question scientifique ou à la discussion de problèmes diplomatiques, économiques, politiques, etc congrès.\r\nÀ l\'origine les colloques, du latin colloquium (« conversation »), sont des conférences religieuses tenues dans le but de discuter un point de doctrine ou de concilier des opinions diverses.', '', 15, 'Colloque', NULL),
(3, 'Les enfants à haut potentiel avec difficultés', '2021-08-13', '1. Rencontre de plusieurs psychologues sur le sujet des enfants à haut potentiel.\r\n\r\nUne confrontation d\'idées (scientifiques ou médicales, philosophiques, politique…) sur un sujet jugé d\'importance par les participants. \r\n\r\nLieu: Salle de conférence 2 de l\'université de Lyon II \r\nHoraire: 16h30 \r\n\r\n2. Rencontre de plusieurs psychologues sur le sujet des enfants à haut potentiel.\r\n\r\nUne confrontation d\'idées (scientifiques ou médicales, philosophiques, politique…) sur un sujet jugé d\'importance par les participants. \r\n\r\nLieu: Salle de conférence 2 de l\'université de Lyon II \r\nHoraire: 16h30 \r\n\r\n\r\n', '', 5, 'Conférence', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `IdQuestion` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Réponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`IdQuestion`, `Question`, `Réponse`) VALUES
(1, 'Comment s\'inscrire à un évènement ou formation ?', 'C\'est très simple ! \r\nIl suffit de vous rendre sur la page qui vous intéresse et de cliquer sur \"S\'inscrire\". Remplissez ensuite le formulaire avec vos informations, et voilà ! '),
(2, 'Pourquoi faire ce site ?', 'Parce que c\'est très pratique et très simple !');

-- --------------------------------------------------------

--
-- Table structure for table `fichier`
--

CREATE TABLE `fichier` (
  `Id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `path` varchar(250) NOT NULL,
  `formation` int(11) DEFAULT NULL,
  `evenement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fichier`
--

INSERT INTO `fichier` (`Id`, `name`, `path`, `formation`, `evenement`) VALUES
(7, 'document.pdf', 'document_609fa1d2778a58.68083337.pdf', 13, NULL),
(8, 'bibliotheque_de_recherche_pratique.pdf', 'bibliotheque_de_recherche_pratique_609fa1ec0591f6.17048720.pdf', 13, NULL),
(9, 'ATTESTATION D’HEBERGEMENT.pdf', 'ATTESTATION D’HEBERGEMENT_609fa28a473308.81203199.pdf', 13, NULL),
(10, 'bibliotheque_de_recherche_pratique.pdf', 'bibliotheque_de_recherche_pratique_609fb90aa4cb20.64409709.pdf', 15, NULL),
(11, 'CamScanner 09-22-2020 20.05.21_1.pdf', 'CamScanner 09-22-2020 20_609fd187001750.01281918.pdf', 14, NULL),
(12, 'bibliotheque_de_recherche_pratique.pdf', 'bibliotheque_de_recherche_pratique_60a03f9a48ee11.95635917.pdf', 1, NULL),
(13, 'ATTESTATION D’HEBERGEMENT.pdf', 'ATTESTATION D’HEBERGEMENT_60a049dd27e860.98161244.pdf', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fomrcontact`
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
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `IdFormation` int(11) NOT NULL,
  `TitreF` varchar(100) NOT NULL,
  `Duree` int(11) NOT NULL DEFAULT 0,
  `DateF` date NOT NULL DEFAULT current_timestamp(),
  `Prix` int(100) DEFAULT NULL,
  `DescriptionF` longtext NOT NULL,
  `Public` varchar(200) NOT NULL DEFAULT 'Public',
  `CompetencesDev` varchar(500) NOT NULL DEFAULT 'CompétencesDev',
  `NbPersonneInscrit` int(10) NOT NULL,
  `NbPersonneMax` int(10) NOT NULL DEFAULT 0,
  `image` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`IdFormation`, `TitreF`, `Duree`, `DateF`, `Prix`, `DescriptionF`, `Public`, `CompetencesDev`, `NbPersonneInscrit`, `NbPersonneMax`, `image`) VALUES
(1, '     Évaluation de la créativité, EPoC   ', 2147483647, '2021-05-14', 250, ' 			 			 Cette formation d\'une journée permet à comprendre les mesures du potentiel créatif chez l\'enfant et l\'adolescent. L\'outil EPoC (Évaluation du Potentiel Créatif) sera présenté. Les exercices pratiques permettent à effectuer la passation des épreuves, noter les réponses selon les grilles de cotation, et interpréter les résultats. Moyens pédagogiques d’encadrement : conférences d\'experts, exercices, discussions. Moyens permettant de suivre l’exécution de l’action et d’en apprécier les résultats : tests de connaissances ( quizz) et exercices de mise en situation, auto-questionnaire de positionnement en fin de formation.   ', '     Psychologues et professionnels de l\'éducation ( enseignants, ... )   ', '     Capacité à mettre en œuvre un bilan du potentiel créatif   ', 2, 10, 'https://ichef.bbci.co.uk/news/800/cpsprodpb/916C/production/_117382273_google-cookies.jpg'),
(2, 'Formation à la créativité thérapeutique', 2147483647, '2021-05-14', 350, 'Formation de deux jours. Le premier jour consiste en une présentation synthétique de la créativité en contexte clinique et une présentation de 4 techniques permettant à introduire des idées originales lors des séances de thérapie. \r\n\r\nLe deuxième jour est centré sur la mise en application des techniques (mise en situation, jeux de rôles) et un bilan des difficultés rencontrées.\r\n\r\nMoyens pédagogiques d’encadrement : conférences d\'experts, démonstrations, exercices, discussions.\r\n\r\nMoyens permettant de suivre l’exécution de l’action et d’en apprécier les résultats : tests de connaissances ( quizz) et exercices de mise en situation, auto-questionnaire de positionnement en fin de formation.', 'Psychiatres, psychologues et professionnels de santé', 'Capacité à mettre en œuvre des techniques de créativité au profit de la prise en charge des clients en psychiatrie et psychologie', 0, 20, NULL),
(12, 'test', 99, '2021-05-13', 2, 'esdfdsf', 'Public', 'CompétencesDev', 0, 3, NULL),
(13, 'dfd', 75, '2021-05-14', 3, 'dgdg', 'Public', 'CompétencesDev', 0, 2, NULL),
(14, 'modif de titre', 75, '2021-05-20', 3, '', 'Public', 'CompétencesDev', 0, 4, 'https://www.amylee.fr/wp-content/uploads/2023/06/cr%C3%A9ativit%C3%A9-artiste.jpg'),
(15, 'test', 99, '2021-05-26', 4, 'dfdfdf', 'Public', 'CompétencesDev', 0, 3, 'https://www.amylee.fr/wp-content/uploads/2023/06/cr%C3%A9ativit%C3%A9-artiste.jpg'),
(16, '', 0, '0000-00-00', 0, '', 'Public', 'CompétencesDev', 0, 0, ''),
(17, 'dfd', 0, '0000-00-00', 0, '', 'Public', 'CompétencesDev', 0, 0, ''),
(19, 'test', 152, '2021-05-13', 34, 'test modification', 'Public', 'CompétencesDev', 0, 45, 'https://www.amylee.fr/wp-content/uploads/2023/06/cr%C3%A9ativit%C3%A9-artiste.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `IdInformation` int(11) NOT NULL,
  `TitreI` varchar(50) NOT NULL,
  `ContenuI` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inscrit`
--

CREATE TABLE `inscrit` (
  `Id` int(11) NOT NULL,
  `IdMembre` int(11) NOT NULL,
  `IdEvent` int(11) NOT NULL,
  `payment` tinyint(4) NOT NULL,
  `source` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscrit`
--

INSERT INTO `inscrit` (`Id`, `IdMembre`, `IdEvent`, `payment`, `source`) VALUES
(1, 6, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inscritf`
--

CREATE TABLE `inscritf` (
  `Id` int(11) NOT NULL,
  `IdMembre` int(11) NOT NULL,
  `IdFormation` int(11) NOT NULL,
  `payment` tinyint(4) NOT NULL,
  `source` tinyint(1) NOT NULL,
  `Q1` tinyint(1) NOT NULL,
  `Q2` text NOT NULL,
  `Q3` text NOT NULL,
  `Q4` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscritf`
--

INSERT INTO `inscritf` (`Id`, `IdMembre`, `IdFormation`, `payment`, `source`, `Q1`, `Q2`, `Q3`, `Q4`) VALUES
(1, 3, 1, 0, 0, 0, '', '', ''),
(2, 2, 1, 0, 0, 0, '', '', ''),
(6, 4, 2, 1, 1, 0, 'FDF', 'DFDF', 'DFDF'),
(7, 4, 1, 2, 1, 1, 'DFDF', 'DFD', 'DFDF'),
(8, 4, 13, 1, 0, 1, 'dfdf', 'dfdf', 'dfdf');

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `IdMembre` int(11) NOT NULL,
  `Nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Prenom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Mail` varchar(60) CHARACTER SET utf8 NOT NULL,
  `Tel` varchar(10) CHARACTER SET utf8 NOT NULL,
  `metier` varchar(250) NOT NULL,
  `niveauEtudes` varchar(250) NOT NULL,
  `isFormationContinue` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`IdMembre`, `Nom`, `Prenom`, `Mail`, `Tel`, `metier`, `niveauEtudes`, `isFormationContinue`) VALUES
(1, 'Arpp', 'Arpp', 'arppmessagerie@gmail.com', '', '', '', 0),
(2, 'Lubart', 'Elsa', 'elsa.lubart@hotmail.com', '0782397698', '', '', 0),
(3, 'Martelet', 'Sophie', 'fgfg', '06.....', 'sophiemartelet@yahoo.com', '', 0),
(4, 'ouboullah', 'noureddine', 'noureddine.ouboullah@gmail.com', '0605788140', 'fgfg', 'fgfg', 0),
(5, 'ouboullah', 'noureddine', 'noureddine.ouboullah.20@gmail.com', '0605788140', 'fgfg', 'fgfg', 0),
(6, 'ouboullah', 'noureddine', 'noureddine.ouboullah.30@gmail.com', '0605788140', 'fgfg', 'fgfg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
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
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`IdQuestionnaire`, `TitreQ`, `InfoQ`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`) VALUES
(2, 'QUESTIONNAIRE INDIVIDUEL DES BESOINS EN FORMATION ET D’ANALYSE DES PRATIQUES PROFESSIONNELLES', '', '1 - Avez-vous déjà suivi une formation sur le thème proposé Oui ou  Non. Décrivez vos formations antérieures', '2 – Qu’attendez-vous concrètement de cette formation ?', '3 – Avez-vous, au cours de votre activité professionnelle, rencontré des situations en lien avec le thème de cette formation ?', 'QUESTIONNAIRE INDIVIDUEL EN FIN DE FORMATION ET D’ANALYSE D\'IMPACT PAR RAPPORT AUX PRATIQUES PROFESSIONNELLES', '1 – Suite à cette formation, avez vous acquis de nouvelles connaissances ?\r\npas du tout /plutôt non /plutôt oui /tout à fait.\r\nDécrivez ce que vous avez appris en terme de connaissance.', '2- Suite à cette formation, avez vous acquis des nouveaux savoir faire ? Pas du tout/ plutôt non /plutôt oui /tout à fait. Décrivez ce que vous avez appris en terme de savoir faire.', '3 – Cette formation, a-t-elle répondu à vos attentes ?', '4 – Cette formation, peut-elle impacter votre activité professionnelle ? Comment ?', '5 – Si vous pouvez aller plus loin dans un parcours de formation, quels thèmes vous intéressent?');

-- --------------------------------------------------------

--
-- Table structure for table `réponsesq`
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
-- Table structure for table `sujet`
--

CREATE TABLE `sujet` (
  `IdSujet` int(11) NOT NULL,
  `TitreS` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sujet`
--

INSERT INTO `sujet` (`IdSujet`, `TitreS`) VALUES
(1, 'Questions générales'),
(2, 'Evénement'),
(3, 'Formation'),
(4, 'Association'),
(5, 'Site');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`IdEvent`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`IdQuestion`);

--
-- Indexes for table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `fomrcontact`
--
ALTER TABLE `fomrcontact`
  ADD PRIMARY KEY (`IdMessage`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`IdFormation`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`IdInformation`);

--
-- Indexes for table `inscrit`
--
ALTER TABLE `inscrit`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `IdMembre` (`IdMembre`),
  ADD KEY `IdEvent` (`IdEvent`);

--
-- Indexes for table `inscritf`
--
ALTER TABLE `inscritf`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdMembre` (`IdMembre`),
  ADD KEY `IdFormation` (`IdFormation`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`IdMembre`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`IdQuestionnaire`);

--
-- Indexes for table `réponsesq`
--
ALTER TABLE `réponsesq`
  ADD PRIMARY KEY (`IdReponse`);

--
-- Indexes for table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`IdSujet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `IdEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `IdQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fomrcontact`
--
ALTER TABLE `fomrcontact`
  MODIFY `IdMessage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `IdFormation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `IdInformation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inscrit`
--
ALTER TABLE `inscrit`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inscritf`
--
ALTER TABLE `inscritf`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `IdMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `IdQuestionnaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `réponsesq`
--
ALTER TABLE `réponsesq`
  MODIFY `IdReponse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `IdSujet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
