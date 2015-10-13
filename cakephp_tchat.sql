-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Octobre 2015 à 22:22
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cakephp_tchat`
--

-- --------------------------------------------------------

--
-- Structure de la table `tchats`
--

CREATE TABLE IF NOT EXISTS `tchats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `tchats`
--

INSERT INTO `tchats` (`id`, `user_id`, `text`, `created`, `modified`) VALUES
(1, 1, 'La directive ng-app permet de dire à AngularJs qu’il doit être actif sur cette section de la page. Dans notre cas, il s’agit de toute la page puisqu’elle est située sur la balise <html>, mais on pourrait très bien la mettre sur un <div> par exemple.\r\n', '2015-05-04 00:00:00', '2014-12-15 14:15:40'),
(2, 1, 'La directive ng-controller permet d''indiquer que la section de la page est gérée par le contrôleur. Les variables et fonctions déclarées dans le scope de ce contrôleur sont accessibles dans cette zone du html, et pas en dehors.', '2015-05-04 02:00:00', '2014-12-15 14:16:13'),
(3, 1, 'Les directives ng-show et ng-hide permet de dire à AngularJs qu''il doit monter ou cacher la div correspondante.', '2015-05-04 03:00:00', '2014-12-15 14:16:32'),
(4, 1, 'Le two-way data binding. Si les données sont mises à jour dans le contrôleur, les changements seront répercutés dans la vue, et si les données sont mises à jour dans la vue, les changements seront répercutés dans le contrôleur! Dans l’exemple ci-dessus, l’utilisateur tape du texte dans l’input, ce qui met à jour la variable $scope.name du contrôleur, et le changement est instantanement répércuté côté vue dans {{name}}.', '2015-05-04 04:00:00', '2014-12-15 14:24:42'),
(5, 1, 'Le scope est ce qui fait le lien entre le contrôleur et la vue. Techniquement c’est un objet javascript, et les propriétés qu’on lui ajoute (variables et fonctions) sont accessibles dans la vue, elles sont en quelque sorte publiques. Mais il est également possible de créer des variables et des fonctions privées (pas accessibles dans la vue).', '2015-05-04 05:00:00', '2014-12-15 14:16:49'),
(7, 1, 'test', '2015-05-06 11:59:49', '2015-05-06 11:59:49'),
(8, 1, 're test', '2015-05-14 16:20:25', '2015-05-14 16:20:25'),
(9, 1, 're re test', '2015-05-14 16:20:58', '2015-05-14 16:20:58'),
(10, 1, 're re re test', '2015-05-14 16:22:35', '2015-05-14 16:22:35'),
(11, 1, 're re re re test', '2015-05-14 16:22:45', '2015-05-14 16:22:45'),
(12, 1, 're test', '2015-05-14 16:23:17', '2015-05-14 16:23:17'),
(13, 1, 're test', '2015-05-14 16:48:28', '2015-05-14 16:48:28'),
(14, 1, 're re test', '2015-05-14 16:48:42', '2015-05-14 16:48:42'),
(15, 1, 're re re test', '2015-05-14 17:00:30', '2015-05-14 17:00:30'),
(16, 1, 're test', '2015-05-14 17:01:07', '2015-05-14 17:01:07'),
(17, 1, 're re test', '2015-05-14 17:02:25', '2015-05-14 17:02:25'),
(18, 1, 'nouveau test en ligne', '2015-05-15 15:21:01', '2015-05-15 15:21:01'),
(19, 3, 'Test', '2015-10-13 15:23:36', '2015-10-13 15:23:36'),
(20, 1, 'retest', '2015-10-13 15:38:22', '2015-10-13 15:38:22'),
(35, 1, 'retest', '2015-10-13 17:36:13', '2015-10-13 17:36:13'),
(34, 1, 'retest', '2015-10-13 17:33:09', '2015-10-13 17:33:09'),
(33, 1, 'test', '2015-10-13 17:27:45', '2015-10-13 17:27:45'),
(24, 1, 'reretest', '2015-10-13 15:44:50', '2015-10-13 15:44:50'),
(28, 1, 'new test', '2015-10-13 16:06:47', '2015-10-13 16:06:47'),
(29, 1, 're new test', '2015-10-13 16:07:34', '2015-10-13 16:07:34'),
(30, 1, 'test', '2015-10-13 16:08:26', '2015-10-13 16:08:26'),
(31, 1, 'retest', '2015-10-13 16:08:53', '2015-10-13 16:08:53'),
(32, 1, 'new test', '2015-10-13 16:12:20', '2015-10-13 16:12:20'),
(36, 4, 'test', '2015-10-13 17:50:36', '2015-10-13 17:50:36');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `last_login` timestamp NOT NULL,
  `tchat_count` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `last_login`, `tchat_count`, `status`, `created`, `modified`) VALUES
(1, 'creasitenet', 'creasitenet.com@gmail.com', '$2y$10$6GudBXBVMMWcOWUcXNeUZOEljg1mP.ksCNlNkR4ncYDIzGnOIQXtm', 'admin', '2015-10-13 17:36:13', 27, 1, '2015-09-24 13:04:06', '2015-10-13 17:36:13'),
(3, 'edouard', 'edouardboissel@gmail.com', '$2y$10$37Ne7SyiRHSu8pNu54lly.dEyNo7ybCWKyjCj7E7gTkfVSmyg/EnS', 'user', '2015-10-13 15:07:44', 0, 0, NULL, NULL),
(4, 'edouardo', 'edouardboissel@hotmail.com', '$2y$10$sjUvsls4lJI.gGpA9YVT2ObRBc5elaS0eqtmrudtYyAChrAUgiR6K', 'user', '2015-10-13 17:50:36', 1, 0, '2015-10-13 17:00:46', '2015-10-13 17:50:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
