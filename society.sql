-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Янв 29 2021 г., 09:31
-- Версия сервера: 5.5.62-log
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `society`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1611732998),
('m210127_073615_create_table_users', 1611733328);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patronymic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `photo`, `date`, `name`, `last_name`, `patronymic`, `birth_date`, `gender`, `city`, `email`, `phone`, `about`) VALUES
(5, 'images/profile-foto-8.jpg', '2021-01-28 01:54:13', 'Анна', 'Иванова', 'Петровна', '1995-01-09', 'Женщина', 'Кемерово', 'ivanova@mail.ru', '5-555-555-5555', 'ссссссссссс'),
(6, 'images/profile-foto-10.jpg', '2021-01-28 04:08:48', 'Иван', 'Иванов', 'Иванович', '1955-01-01', 'Мужчина', 'Санкт-Петербуг', 'ivanov@mail.ru', '5-555-555-5555', ''),
(7, 'images/profile-foto-11.jpg', '2021-01-28 04:16:29', 'Иван', 'Иванов', 'Иванович', '2000-01-21', 'Мужчина', 'Санкт-Петербуг', 'ivanov@mail.ru', '1-111-111-1111', ''),
(8, 'images/profile-foto-4.jpg', '2021-01-28 04:17:59', 'Иван', 'Иванов', 'Иванович', '1980-01-15', 'Мужчина', 'Новокузнецк', 'ivanov@mail.ru', '2-222-222-2222', ''),
(9, 'images/profile-foto-3.jpg', '2021-01-28 04:23:58', 'Иван', 'Иванов', 'Иванович', '1982-09-19', 'Мужчина', 'Новокузнецк', 'ivanov@mail.ru', '3-333-333-3333', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
