-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 18 2018 г., 23:28
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bookcat_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `title`) VALUES
(1, 'Duma'),
(2, 'Pushkin'),
(3, 'Lermontov'),
(4, 'Shevchenko');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `text`, `description`, `price`) VALUES
(15, '111+0:21', '111', '111', 1111),
(16, '111', '111', '111', 1111),
(17, 'Yara', 'Text YARA', 'Dovhan', 99999),
(18, 'Yara', 'Text YARA', 'Dovhan', 99999),
(19, 'Yara08', 'Yara08', 'Yara08', 1234567);

-- --------------------------------------------------------

--
-- Структура таблицы `books_authors`
--

CREATE TABLE `books_authors` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_authors`
--

INSERT INTO `books_authors` (`book_id`, `author_id`) VALUES
(15, 4),
(16, 4),
(16, 4),
(16, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `books_categories`
--

CREATE TABLE `books_categories` (
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_categories`
--

INSERT INTO `books_categories` (`book_id`, `category_id`) VALUES
(15, 4),
(16, 4),
(16, 2),
(16, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Roman'),
(2, 'Proza'),
(3, 'Biography'),
(4, 'Myth');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books_authors`
--
ALTER TABLE `books_authors`
  ADD KEY `author_id` (`author_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Индексы таблицы `books_categories`
--
ALTER TABLE `books_categories`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books_authors`
--
ALTER TABLE `books_authors`
  ADD CONSTRAINT `books_authors_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_authors_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `books_categories`
--
ALTER TABLE `books_categories`
  ADD CONSTRAINT `books_categories_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
