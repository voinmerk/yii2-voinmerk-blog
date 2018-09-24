-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.16 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных yii_voinmerk_advanced
CREATE DATABASE IF NOT EXISTS `yii_voinmerk_advanced` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yii_voinmerk_advanced`;

-- Дамп структуры для таблица yii_voinmerk_advanced.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `preview_content` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `FK_blog_user_created` (`created_by`),
  KEY `FK_blog_user_updated` (`updated_by`),
  CONSTRAINT `FK_blog_user_created` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_blog_user_updated` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.blog: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.blog_category
CREATE TABLE IF NOT EXISTS `blog_category` (
  `blog_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.blog_category: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `blog_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_category` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.blog_tag
CREATE TABLE IF NOT EXISTS `blog_tag` (
  `blog_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.blog_tag: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `blog_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_tag` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `FK_category_user_created` (`created_by`),
  KEY `FK_category_user_updated` (`updated_by`),
  CONSTRAINT `FK_category_user_created` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_category_user_updated` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.category: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.migration: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1537756756),
	('m130524_201442_init', 1537756758);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.portfolio
CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `preview` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `site_link` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `FK_portfolio_user_created` (`created_by`),
  KEY `FK_portfolio_user_updated` (`updated_by`),
  CONSTRAINT `FK_portfolio_user_created` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_portfolio_user_updated` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.portfolio: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` (`id`, `title`, `preview`, `content`, `image`, `slug`, `site_link`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'ТД ЮГ-элеватор', '<p>Разработка сайта для особо крупной компании в украине. ЮГ Элеватор - завод элеваторного оборудования. Сайт был разработан на платформе wordpress.</p>', '<p>Разработка сайта для особо крупной компании в украине. ЮГ Элеватор - завод элеваторного оборудования. Сайт был разработан на платформе wordpress.</p>\r\n\r\n<p>This is dummy copy. It is not meant to be read. It has been placed here solely to demonstrate the look and feel of finished, typeset text. Only for show. He who searches for meaning here will be sorely disappointed.  These words are here to provide the reader with a basic impression of how actual text will appear in its final presentation. </p>\r\n\r\n<p>This is dummy copy. It\'s Greek to you. Unless, of course, you\'re Greek, in which case, it really makes no sense. Why, you can\'t even read it!  It is strictly for mock-ups. You may mock it up as strictly as you wish.</p>', 'img/td-ugelevator-home.jpg', 'td-ugelevator', 'http://td-ugelevator.com', 1, 1, 123123123, 123123123),
	(2, 'НППК', '<p>Разработан на Yii2 Framework (шаблон advanced). Сайт для сенсорного киоска Новосибирского профессионально-педагогического колледжа.</p>', '<p>Разработан на Yii2 Framework (шаблон advanced). Сайт для сенсорного киоска Новосибирского профессионально-педагогического колледжа.</p>\r\n\r\n<p>This is dummy copy. It is not meant to be read. It has been placed here solely to demonstrate the look and feel of finished, typeset text. Only for show. He who searches for meaning here will be sorely disappointed.  These words are here to provide the reader with a basic impression of how actual text will appear in its final presentation. </p>\r\n\r\n<p>This is dummy copy. It\'s Greek to you. Unless, of course, you\'re Greek, in which case, it really makes no sense. Why, you can\'t even read it!  It is strictly for mock-ups. You may mock it up as strictly as you wish.</p>', 'img/nppk-home.png', 'nppk-infosens', 'http://info.nppk54.ru', 1, 1, 123123123, 123123123),
	(3, 'Cristalix Project', '<p>Разработан на форумной платформе Xenforo 1.4.3</p>', '<p>Разработан на форумной платформе Xenforo 1.4.3</p>\r\n\r\n<p>This is dummy copy. It is not meant to be read. It has been placed here solely to demonstrate the look and feel of finished, typeset text. Only for show. He who searches for meaning here will be sorely disappointed.  These words are here to provide the reader with a basic impression of how actual text will appear in its final presentation. </p>\r\n\r\n<p>This is dummy copy. It\'s Greek to you. Unless, of course, you\'re Greek, in which case, it really makes no sense. Why, you can\'t even read it!  It is strictly for mock-ups. You may mock it up as strictly as you wish.</p>', 'img/cristalix-home.jpg', 'cristalix-project', 'http://xenforo.cristalix.voinmerk.ru', 1, 1, 123123123, 123123123);
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.portfolio_image
CREATE TABLE IF NOT EXISTS `portfolio_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portfolio_id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_portfolio_image_portfolio` (`portfolio_id`),
  CONSTRAINT `FK_portfolio_image_portfolio` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.portfolio_image: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `portfolio_image` DISABLE KEYS */;
INSERT INTO `portfolio_image` (`id`, `portfolio_id`, `src`, `title`, `alt`) VALUES
	(1, 1, 'img/td-ugelevator-home.jpg', '1', '1'),
	(2, 1, 'img/td-ugelevator-about.jpg', '1', '1'),
	(3, 2, 'img/nppk-home.png', '1', '1'),
	(4, 2, 'img/nppk-rooms.jpg', '1', '1'),
	(5, 3, 'img/cristalix-home.jpg', '1', '1');
/*!40000 ALTER TABLE `portfolio_image` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.resume
CREATE TABLE IF NOT EXISTS `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `biography` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `salary` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `FK_resume_user_created` (`created_by`),
  KEY `FK_resume_user_updated` (`updated_by`),
  CONSTRAINT `FK_resume_user_created` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_resume_user_updated` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.resume: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `resume` DISABLE KEYS */;
INSERT INTO `resume` (`id`, `full_name`, `phone`, `email`, `position`, `category`, `city`, `biography`, `slug`, `image`, `birth_date`, `salary`, `gender`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'Евгений Кремнёв', '+7 (999) 463 9441', 'kremniov96@gmail.com', 'Junior-разработчик', 'ИТ и Интернет, Веб-разработка', 'Новосибирск', '<p>Желаю работать в команде над крупными веб-проектами. Хочу и буду развиваться в этой сфере. За 2 года изучения веб-программирования успел принять участие в нескольких проектах и разработать несколько тематических сайтов. Сейчас моя цель официально трудоустроиться, набраться опыта и стать настоящим профессионалом своего дела.</p>\r\n<p>Есть конечно отрицательные качества над которыми работаю каждый день, ибо мне ничто не должно мешать идти к своей цели.</p>', 'evgeniy-kremnev', 'https://pp.userapi.com/c637923/v637923115/c834/0vp9r1NDEk0.jpg', '2018-09-24', 0, 0, 1, 1, 1, 123123123, 123123123),
	(2, 'Евгений Кремнёв', '+7 (999) 463 9441', 'kremniov96@gmail.com', 'Junior-разработчик', 'ИТ и Интернет, Веб-разработка', 'Новосибирск', '<p>Желаю работать в команде над крупными веб-проектами. Хочу и буду развиваться в этой сфере. За 2 года изучения веб-программирования успел принять участие в нескольких проектах и разработать несколько тематических сайтов. Сейчас моя цель официально трудоустроиться, набраться опыта и стать настоящим профессионалом своего дела.</p>\r\n<p>Есть конечно отрицательные качества над которыми работаю каждый день, ибо мне ничто не должно мешать идти к своей цели.</p>', 'evgeniy-kremnev-copy', 'https://pp.userapi.com/c637923/v637923115/c834/0vp9r1NDEk0.jpg', '2018-09-24', 0, 0, 0, 1, 1, 123123123, 123123123);
/*!40000 ALTER TABLE `resume` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.resume_education
CREATE TABLE IF NOT EXISTS `resume_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `format` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_resume_education_resume` (`resume_id`),
  CONSTRAINT `FK_resume_education_resume` FOREIGN KEY (`resume_id`) REFERENCES `resume` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.resume_education: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `resume_education` DISABLE KEYS */;
INSERT INTO `resume_education` (`id`, `resume_id`, `institute`, `faculty`, `profession`, `city`, `format`, `start_date`, `end_date`) VALUES
	(1, 1, 'НГПУ', 'Факультет Технологий и Предпринимателства', 'Иформационные технологии', 'Новосибирск', 2, '2018-09-24', '2018-09-24'),
	(2, 1, 'НППК', 'Информационные технологии', 'Прикладная информатика', 'Новосибирск', 0, '2011-09-01', '2016-06-30');
/*!40000 ALTER TABLE `resume_education` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.resume_experience
CREATE TABLE IF NOT EXISTS `resume_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_resume_experience_resume` (`resume_id`),
  CONSTRAINT `FK_resume_experience_resume` FOREIGN KEY (`resume_id`) REFERENCES `resume` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.resume_experience: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `resume_experience` DISABLE KEYS */;
INSERT INTO `resume_experience` (`id`, `resume_id`, `position`, `organization`, `city`, `start_date`, `end_date`) VALUES
	(1, 1, 'Техник-программист', 'ГБПОУ НСО "НОВОСИБИРСКИЙ ПРОФЕССИОНАЛЬНО-ПЕДАГОГИЧЕСКИЙ КОЛЛЕДЖ"', 'Новосибирск', '2017-05-02', '2018-09-24');
/*!40000 ALTER TABLE `resume_experience` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.resume_portfolio
CREATE TABLE IF NOT EXISTS `resume_portfolio` (
  `resume_id` int(11) NOT NULL,
  `portfolio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.resume_portfolio: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `resume_portfolio` DISABLE KEYS */;
INSERT INTO `resume_portfolio` (`resume_id`, `portfolio_id`) VALUES
	(1, 3),
	(1, 2),
	(1, 1);
/*!40000 ALTER TABLE `resume_portfolio` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.resume_skill
CREATE TABLE IF NOT EXISTS `resume_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_resume_skill_resume` (`resume_id`),
  CONSTRAINT `FK_resume_skill_resume` FOREIGN KEY (`resume_id`) REFERENCES `resume` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.resume_skill: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `resume_skill` DISABLE KEYS */;
INSERT INTO `resume_skill` (`id`, `resume_id`, `content`) VALUES
	(1, 1, 'Работаю с реляционными базами данных, такими как MySQL, MSSQL, PostgreSQL и MariaDB.'),
	(2, 1, 'Знание ООП в php 5.6 и выше.'),
	(3, 1, 'Основы работы с JavaScript и JQuery.'),
	(4, 1, 'В своих проектах использую composer (пакетный менеджер) и git (систему управления версиями).'),
	(5, 1, 'Для размещения репозиториев использую GitHub и VisualStudio.'),
	(6, 1, 'Умение работать с мобильной вёрсткой используя Bootstrap 3 или 4, Foundation Framework.'),
	(7, 1, 'Имею опыт командной разработки.'),
	(8, 1, 'Есть опыт работы с UNIX-системами и их администрированием в локальной сети предприятия.'),
	(9, 1, 'В своих проектах использовал Drupal, Wordpress, Yii, Laravel, XenForo и OpenCart.'),
	(10, 1, 'Имею навыки администрирование и проектирование баз данных.');
/*!40000 ALTER TABLE `resume_skill` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.tag
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii_voinmerk_advanced.tag: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;

-- Дамп структуры для таблица yii_voinmerk_advanced.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы yii_voinmerk_advanced.user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'BalQFO4n8aJcYJ-gIksST7fSQXkI60Ag', '$2y$13$PCVpZrKnvoVA/rNwxWVbD.QQ1RNXbSP2JDxxL9U8SM8kLCd2/4HRq', NULL, 'admin@localhost', 10, 1537756758, 1537756758);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
