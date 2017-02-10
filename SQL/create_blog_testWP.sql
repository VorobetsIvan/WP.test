-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Лют 10 2017 р., 14:35
-- Версія сервера: 5.5.48
-- Версія PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `blog_testWP`
--

-- --------------------------------------------------------

--
-- Структура таблиці `blog_artilcles`
--

CREATE TABLE IF NOT EXISTS `blog_artilcles` (
  `id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `intro_text` text NOT NULL,
  `full_text` text NOT NULL,
  `name_img` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `blog_artilcles`
--

INSERT INTO `blog_artilcles` (`id`, `category_id`, `title`, `intro_text`, `full_text`, `name_img`, `author`, `date_create`) VALUES
(1, 1, 'Пост 1', 'Скорочений текст до поста 1', 'Повний текст до поста 1', 'picture.jpg', NULL, '2017-02-06 22:00:00'),
(2, 1, 'Пост 2', 'Скорочений текст до поста 2', 'Повний текст до поста 2', 'picture.jpg', NULL, '2017-02-06 22:00:00'),
(3, 1, 'Пост 3', 'Скорочений текст до поста 3', 'Повний текст до поста 3', 'picture.jpg', 'Адмін', '2017-02-06 22:00:00'),
(4, 3, 'заголовок поста 4', 'Скорочений текст поста 4', 'Повний текст поста 4', 'picture.jpg', NULL, '2017-02-06 22:00:00'),
(5, 2, 'пост 5', 'Короткий пост 5', 'Повний пост 5', 'picture.jpg', NULL, '2017-02-05 22:00:00'),
(6, 4, 'пост 6', 'Короткий пост 6', 'Повний пост 6', 'picture.jpg', NULL, '2017-02-04 22:00:00'),
(7, 3, 'Пост 7', 'Короткий пост 7', 'повний пост 7', 'picture.jpg', NULL, '2017-02-08 22:00:00'),
(8, 1, 'Пост 8', 'Короткий пост 8', 'повний пост 8', 'picture.jpg', NULL, '2017-02-07 22:00:00'),
(9, 3, 'Пост 9', 'Короткий пост 9', 'Довгий пост 9', 'picture.jpg', NULL, '2017-02-07 22:00:00'),
(10, 2, 'Пост 10', 'Короткий пост 10', 'Довгий пост 10', 'picture.jpg', NULL, '2017-02-11 22:00:00'),
(25, NULL, 'Заголовок', '&lt;p&gt;Короткий текст&lt;/p&gt;\r\n', '&lt;p&gt;Повний текст&lt;/p&gt;\r\n', '005.jpg', 'admin', '2017-02-09 19:17:43'),
(23, NULL, 'Категорія 4', '', '', '', 'admin', '2017-02-09 19:14:54'),
(24, NULL, 'Категорія 4', '', '', '', 'admin', '2017-02-09 19:15:01'),
(22, NULL, 'фівфі', '&lt;p&gt;іфвфів&lt;/p&gt;\r\n', '&lt;p&gt;вфівфів&lt;/p&gt;\r\n', '', 'admin', '2017-02-09 19:10:45'),
(21, NULL, 'Psadasdas', '&lt;h1&gt;Короткий опис&lt;/h1&gt;\r\n', '&lt;p&gt;&lt;strong&gt;Довгий опис&lt;/strong&gt;&lt;/p&gt;\r\n', '002.jpg', 'admin', '2017-02-09 19:04:05'),
(20, NULL, 'Заголовок внесеней з програми', '&lt;p&gt;Короткий текст&lt;strong&gt; внесе&lt;/strong&gt;ний з програми&lt;/p&gt;\r\n', '&lt;h1&gt;Довгий текс&lt;strong&gt;т вн&lt;/strong&gt;есений з програми&lt;/h1&gt;\r\n', '001.jpg', 'admin', '2017-02-09 18:33:44'),
(26, 3, 'Заголовок', '&lt;p&gt;1111111111111111111111111&lt;/p&gt;\r\n', '&lt;p&gt;333333333333333333333333333333&lt;/p&gt;\r\n', '007.jpg', 'admin', '2017-02-09 20:02:19');

-- --------------------------------------------------------

--
-- Структура таблиці `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `blog_category`
--

INSERT INTO `blog_category` (`id`, `title`, `description`) VALUES
(1, 'Категорія 1', 'В категорії 1 пости 1'),
(2, 'Категорія 2', 'В категорії 2 пости 2'),
(3, 'Категорія 3', 'В категорії 3 пости 3'),
(4, 'Категорія 4', 'В категорії 4 пости 4');

-- --------------------------------------------------------

--
-- Структура таблиці `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id` int(11) unsigned NOT NULL,
  `id_article` int(11) unsigned NOT NULL,
  `user` varchar(255) NOT NULL,
  `text_comment` varchar(255) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `id_article`, `user`, `text_comment`, `date_create`) VALUES
(1, 10, 'user1', 'Коментар 1', '2017-02-09 20:51:10'),
(2, 10, 'user2', 'Коментар 1', '2017-02-09 20:55:00'),
(9, 10, 'user', 'вфівіф', '2017-02-10 11:12:17'),
(8, 10, 'user', 'іфвфівфі', '2017-02-10 11:11:23'),
(7, 10, 'admin', 'asdasdas', '2017-02-10 10:36:43'),
(10, 10, 'user', 'фівфів', '2017-02-10 11:13:04'),
(11, 10, 'user', 'фівіфв', '2017-02-10 11:13:34'),
(12, 10, 'user', 'dasdas', '2017-02-10 11:15:22');

-- --------------------------------------------------------

--
-- Структура таблиці `blog_users`
--

CREATE TABLE IF NOT EXISTS `blog_users` (
  `id` int(11) unsigned NOT NULL,
  `login` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `hash_password` varchar(32) NOT NULL,
  `pr_admin` tinyint(1) DEFAULT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `blog_users`
--

INSERT INTO `blog_users` (`id`, `login`, `name`, `hash_password`, `pr_admin`, `date_reg`) VALUES
(2, 'user', 'Ivan', 'b64894900619a4496e93acc2504e6aee', NULL, '2017-02-08 12:28:04'),
(7, 'Admin', 'Іван', 'b64894900619a4496e93acc2504e6aee', 1, '2017-02-08 15:30:19');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `blog_artilcles`
--
ALTER TABLE `blog_artilcles`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `blog_users`
--
ALTER TABLE `blog_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `blog_artilcles`
--
ALTER TABLE `blog_artilcles`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблиці `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблиці `blog_users`
--
ALTER TABLE `blog_users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
