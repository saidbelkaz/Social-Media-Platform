-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 août 2022 à 13:08
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `megachat`
--

-- --------------------------------------------------------

--
-- Structure de la table `followers`
--

CREATE TABLE `followers` (
  `user_id` int(11) NOT NULL,
  `incoming_follower_id` int(255) NOT NULL,
  `NbrFollowers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date_post` datetime NOT NULL,
  `statut` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`user_id`, `post_id`, `date_post`, `statut`, `image`) VALUES
(9, 42, '2022-08-14 21:29:18', 'hello ', ''),
(9, 43, '2022-08-14 21:29:31', '', '62f95b2ba26462.50956411.jpg'),
(8, 62, '2022-08-18 12:37:18', 'welcome to this platform to chat with your friends and browse the news', '62fe246e768c95.59831489.jpg'),
(8, 64, '2022-08-18 12:37:54', '😀 😃 😄 😁 😆 😅 😂 🤣', ''),
(1, 65, '2022-08-19 21:13:00', 'test post', ''),
(1, 66, '2022-08-19 21:13:08', '', '62ffeed4e26511.80145222.jpg'),
(4, 67, '2022-08-22 12:01:34', '', '6303620ecd79a8.61215865.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `react`
--

CREATE TABLE `react` (
  `post_id` int(11) NOT NULL,
  `incoming_react_id` int(255) NOT NULL,
  `outgoing_react_id` int(255) NOT NULL,
  `like` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Verification` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `unique_id`, `Fname`, `lname`, `email`, `password`, `profile`, `status`, `Verification`) VALUES
(1, 1255720784, 'sa', 'id', 'saidbel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '63036197d09d39.56248281.jpg', 'Offline now', 0),
(2, 1260879904, 'Ahmed', 'mosta', 'ahmed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1660485237151561805_1754974548042347_7553885715731973183_n.jpg', 'Offline now', 0),
(3, 1340858668, 'Oussama', 'kh', 'oussama@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1660485286275003011_3097022623890257_6250321197546066861_n.jpg', 'Offline now', 0),
(4, 1444289493, 'Walid', 'Cr', 'walid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '6303620310fd47.94747393.jpg', 'Offline now', 0),
(5, 954303994, 'Abdo', '12', 'abdo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '630361e87e6e31.72235790.jpg', 'Offline now', 0),
(6, 1011163073, 'Dev', 'Python', 'python@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1660485410FB_IMG_16360351341448400.jpg', 'Offline now', 0),
(8, 937550010, 'MeGa', 'Chat', 'megachat1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '62fcfb46e8f9a6.96655245.jpg', 'Offline now', 1),
(9, 462288554, 'test', 'test', 'test@tes.fr', 'e10adc3949ba59abbe56e057f20f883e', '1660508923avatar-01.jpg', 'Offline now', 0),
(10, 1070552410, 'test offi', 'test', 'testest1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1660599847avatar-01.jpg', 'Offline now', 0),
(11, 801369983, 'test', 'tesst', 'ttest@gmail.co', 'e10adc3949ba59abbe56e057f20f883e', '1660653004banner-05.jpg', 'Offline now', 0),
(12, 876663318, 'reer', 'reer', 'reere@gmail.ceo', 'e10adc3949ba59abbe56e057f20f883e', '1660653380avatar-01.jpg', 'Offline now', 0),
(13, 1289820974, 'aa', 'aa', 'aa@aa.aa', 'e10adc3949ba59abbe56e057f20f883e', '62fceb3eb00cb1.62417676.jpg', 'Offline now', 0),
(14, 1559310472, 'testtt', 'testt', 'test111@gmail.cc', 'e10adc3949ba59abbe56e057f20f883e', '6303625c7e5590.39313026.jpg', 'Offline now', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `followers`
--
ALTER TABLE `followers`
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `react`
--
ALTER TABLE `react`
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `followers`
--
ALTER TABLE `followers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `react`
--
ALTER TABLE `react`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `react`
--
ALTER TABLE `react`
  ADD CONSTRAINT `react_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
