-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 29 2024 г., 20:10
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todolist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_completed` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `description`, `is_completed`, `created_at`, `updated_at`) VALUES
(1, 1, 'fgbv', 'dc v', 0, '2024-09-09 03:26:06', '2024-09-09 03:26:06'),
(2, 1, 'fv c', 'dfc v', 0, '2024-09-09 03:43:17', '2024-09-09 03:43:17'),
(6, 5, 'увыа', 'выамвы', 0, '2024-09-11 04:30:41', '2024-09-11 04:30:41'),
(13, 4, 'Создание заметки', 'Создать заметку и сделать', 0, '2024-09-19 10:43:32', '2024-09-19 10:43:32'),
(14, 4, 'Создание заметки2', 'Создать заметку и сделать', 1, '2024-09-21 03:38:55', '2024-09-21 03:38:55'),
(16, 6, 'Создание заметки', 'Создать заметку и сделать', 1, '2024-09-21 03:43:14', '2024-09-21 03:43:14'),
(18, 6, 'Создание заметки3', 'Создать заметку и сделать', 1, '2024-09-21 03:43:26', '2024-09-21 03:43:26'),
(19, 6, 'Создание заметки5', 'Создать заметку и сделать', 0, '2024-09-21 03:44:19', '2024-09-21 03:44:19'),
(21, 6, 'gbf', 'fgbgfg', 1, '2024-09-21 04:09:11', '2024-09-21 04:09:11'),
(25, 8, 'фываыфва', 'ывфафыва', 1, '2024-09-29 16:37:45', '2024-09-29 16:37:45');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`) VALUES
(8, 'asaphiev', '$2y$10$8JH/EfbEQuKwyFs.ArZIo.epLjWRdoWtbT/A5GgmdFq6T/xzem65S'),
(9, 'ываываы', '$2y$10$X5NDQf8WZq.dO1KIf8A.KeOzEN1WgTOpgw3duCdP1On4lHPlXIv7e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
