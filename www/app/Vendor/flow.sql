-- Adminer 3.6.1 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `flow`;
CREATE DATABASE `flow` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `flow`;

DROP TABLE IF EXISTS `build_commands`;
CREATE TABLE `build_commands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `command` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `build_commands` (`id`, `name`, `command`, `active`, `available`, `created`, `modified`) VALUES
(1,	'PHPLOC',	'phploc %p',	1,	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(2,	'PHP Mess Detector',	'phpmd %f xml codesize,unusedcode,naming',	1,	1,	'2012-11-23 23:59:51',	'0000-00-00 00:00:00'),
(3,	'PHP Code Sniffer',	'phpcs %f',	1,	1,	'2012-11-24 00:00:38',	'0000-00-00 00:00:00'),
(4,	'PHP Documentor',	'phpdoc -d %p -t %d',	1,	1,	'2012-11-24 00:01:41',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `build_items`;
CREATE TABLE `build_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `build_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `builds`;
CREATE TABLE `builds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `build_commands` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `contributors`;
CREATE TABLE `contributors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `open_id` varchar(255) NOT NULL,
  `keys` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `features`;
CREATE TABLE `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `points` tinyint(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `contributors` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `started` datetime NOT NULL,
  `finished` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `active`, `created`, `modified`) VALUES
(1,	'cto',	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(2,	'devops',	1,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(3,	'dev',	1,	'2012-11-24 00:25:31',	'0000-00-00 00:00:00'),
(4,	'webdesigner',	1,	'2012-11-24 00:25:45',	'0000-00-00 00:00:00'),
(5,	'preprod',	1,	'2012-11-24 00:25:56',	'0000-00-00 00:00:00'),
(6,	'prod',	1,	'2012-11-24 00:26:06',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `hotfixes`;
CREATE TABLE `hotfixes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `points` tinyint(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `contributors` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `started` datetime NOT NULL,
  `finished` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `command` text NOT NULL,
  `data` text NOT NULL,
  `response` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `milestones`;
CREATE TABLE `milestones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `completion` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `started` datetime NOT NULL,
  `finish` datetime NOT NULL,
  `due` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `version` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` varchar(255) NOT NULL,
  `modified` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `description` text NOT NULL,
  `origin` varchar(255) NOT NULL,
  `prod` varchar(255) NOT NULL,
  `preprod` varchar(255) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `release` varchar(255) NOT NULL,
  `hotfix` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `started` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `archived` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `projects` (`id`, `name`, `status`, `description`, `origin`, `prod`, `preprod`, `feature`, `release`, `hotfix`, `created`, `started`, `modified`, `archived`) VALUES
(1,	'cakento',	1,	'',	'gitolite@git.darkelda.com',	'gitolite@dbox3.darkelda.com',	'/develop',	'/feature',	'/release',	'/hotfix',	'2012-11-24 00:27:43',	'2012-11-24 00:27:43',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `releases`;
CREATE TABLE `releases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `points` tinyint(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `contributors` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `started` datetime NOT NULL,
  `finished` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(2) NOT NULL,
  `parent_id` tinyint(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `priority` tinyint(2) NOT NULL,
  `points` tinyint(2) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `started` datetime NOT NULL,
  `finished` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `types` (`id`, `name`, `created`, `modified`) VALUES
(1,	'Feature',	'2012-11-24 00:13:40',	'0000-00-00 00:00:00'),
(2,	'Hotfix',	'2012-11-24 00:13:51',	'0000-00-00 00:00:00'),
(3,	'Release',	'2012-11-24 00:14:05',	'0000-00-00 00:00:00');

-- 2012-11-25 12:35:28
