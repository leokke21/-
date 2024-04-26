-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 26 2024 г., 14:29
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `KP_3_KURS`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Categories`
--

CREATE TABLE `Categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Categories`
--

INSERT INTO `Categories` (`id_category`, `name_category`) VALUES
(1, 'Genshin'),
(2, 'Honkai Impact'),
(3, 'Honkai Star Rail');

-- --------------------------------------------------------

--
-- Структура таблицы `comments_forum`
--

CREATE TABLE `comments_forum` (
  `id_comment` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments_forum`
--

INSERT INTO `comments_forum` (`id_comment`, `id_post`, `author`, `text`, `data`, `likes`) VALUES
(1, 2, 'leonid', 'Комментарий для проверки', '2024-03-01', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `comments_posts`
--

CREATE TABLE `comments_posts` (
  `id_comment` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments_posts`
--

INSERT INTO `comments_posts` (`id_comment`, `id_post`, `author`, `text`, `data`, `likes`) VALUES
(1, 2, 'leonid', 'Комментарий для проверки', '2024-03-01', 1),
(4, 2, 'leo', 'Вторая проверка', '2024-04-24', 1),
(5, 2, 'leo', 'Вторая проверка', '2024-04-24', 1),
(6, 2, 'leo', 'Вторая проверка', '2024-04-24', 1),
(7, 2, 'leo', 'Вторая проверка', '2024-04-24', 1),
(8, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(9, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(10, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(11, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(12, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(13, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(14, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(15, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(16, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(17, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(18, 2, 'leo', 'Третья проверка', '2024-04-24', 1),
(19, 9, 'leonid', 'Вторая проверка', '2024-04-24', 1),
(20, 9, 'leonid', 'Вторая проверка', '2024-04-24', 1),
(21, 10, 'leonid', 'Новый комментарий', '2024-04-25', 1),
(22, 10, 'leonid', 'Новый комментарий', '2024-04-25', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` int(11) NOT NULL,
  `header` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forum_posts`
--

INSERT INTO `forum_posts` (`id`, `header`, `author`, `data`, `text`, `image`, `id_category`) VALUES
(2, 'Ахахахаха, мой первый пост!', 'Admin', '2024-03-01', 'На самом деле я вас всех обманул и этот пост был не первым, но вы никогда об этом не узнаете, ведь возможно, все остальные посты были удалены (или нет) но дело в том, что я сейчас пишу этот тест чтобы не использовать генератор lorem ipsum, ведь иметь осмысленный текст куда приятнее непонятных символов, все пока', 'post1.jpg', 1),
(3, 'Ахахахаха, мой первый пост!', 'Admin', '2024-03-01', 'На самом деле я вас всех обманул и этот пост был не первым, но вы никогда об этом не узнаете, ведь возможно, все остальные посты были удалены (или нет) но дело в том, что я сейчас пишу этот тест чтобы не использовать генератор lorem ipsum, ведь иметь осмысленный текст куда приятнее непонятных символов, все пока', 'post1.jpg', 3),
(4, 'Первый пост по хонкаю', 'Admin', '2024-04-02', '123', 'first.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `header` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `header`, `author`, `data`, `text`, `image`, `id_category`) VALUES
(2, 'Ахахахаха, мой первый пост!', 'leonid', '2024-03-01', 'На самом деле я вас всех обманул и этот пост был не первым, но вы никогда об этом не узнаете, ведь возможно, все остальные посты были удалены (или нет) но дело в том, что я сейчас пишу этот тест чтобы не использовать генератор lorem ipsum, ведь иметь осмысленный текст куда приятнее непонятных символов, все пока <br><br>На самом деле я вас всех обманул и этот пост был не первым, но вы никогда об этом не узнаете, ведь возможно, все остальные посты были удалены (или нет) но дело в том, что я сейчас пишу этот тест чтобы не использовать генератор lorem ipsum, ведь иметь осмысленный текст куда приятнее непонятных символов, все пока\n<br><br>На самом деле я вас всех обманул и этот пост был не первым, но вы никогда об этом не узнаете, ведь возможно, все остальные посты были удалены (или нет) но дело в том, что я сейчас пишу этот тест чтобы не использовать генератор lorem ipsum, ведь иметь осмысленный текст куда приятнее непонятных символов, все пока\n<br><br>На самом деле я вас всех обманул и этот пост был не первым, но вы никогда об этом не узнаете, ведь возможно, все остальные посты были удалены (или нет) но дело в том, что я сейчас пишу этот тест чтобы не использовать генератор lorem ipsum, ведь иметь осмысленный текст куда приятнее непонятных символов, все пока', 'post1.jpg', 1),
(3, 'Ахахахаха, мой первый пост!', 'leonid', '2024-03-01', 'На самом деле я вас всех обманул и этот пост был не первым, но вы никогда об этом не узнаете, ведь возможно, все остальные посты были удалены (или нет) но дело в том, что я сейчас пишу этот тест чтобы не использовать генератор lorem ipsum, ведь иметь осмысленный текст куда приятнее непонятных символов, все пока', 'post1.jpg', 3),
(4, 'Первый пост по хонкаю', 'leonid', '2024-04-02', '123', 'first.jpg', 2),
(5, 'Ахахахаха, мой Отредактированный пост!', 'leonid', '2024-03-01', 'На самом деле я вас всех обманул и этот пост был не первым, но вы никогда об этом не узнаете, ведь возможно, все остальные посты были удалены (или нет) но дело в том, что я сейчас пишу этот тест чтобы не использовать генератор lorem ipsum, ведь иметь осмысленный текст куда приятнее непонятных символов, все пока (Ghbdtn)', 'img5.jpg', 1),
(8, 'Чудо-пост', 'leonid', '2024-04-24', 'Тут новый пост ура', 'img2.jpg', 1),
(9, 'Введите заголовок', 'leonid', '2024-04-24', 'Введите содержание поста', 'img7.jpg', 2),
(10, 'Введите заголовок', 'leonid', '2024-04-24', 'Введите содержание поста', 'img7.jpg', 2),
(11, 'Введите заголовок', 'leonid', '2024-04-24', 'Введите содержание поста', 'img7.jpg', 3),
(12, 'Готовый пост', 'leonid', '2024-04-25', 'В данном посте будет побольше информации', 'img9.jpg', 1),
(13, 'Введите заголовок', 'leonid', '2024-04-25', 'Введите содержание поста', 'img8.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `name_role`) VALUES
(1, 'user'),
(2, 'moderator'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `avatar`, `id_role`) VALUES
(1, 'leonid', 'hgfewq', 'leonid.jpg', 3),
(2, 'user', '123', 'user.jpg', 1),
(4, 'leo', '123', 'leo.jpg', 1),
(9, 'leo2', '12345678', NULL, 1),
(11, 'leo3', '123456789', NULL, 1),
(13, 'leo4', '123456', NULL, 1),
(16, 'name', 'password', NULL, 1),
(30, 'asd', '7', NULL, 1),
(31, 'Admin', 'hgfewq', 'Admin.jpg', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `comments_forum`
--
ALTER TABLE `comments_forum`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `author` (`author`);

--
-- Индексы таблицы `comments_posts`
--
ALTER TABLE `comments_posts`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `author` (`author`);

--
-- Индексы таблицы `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `posts_ibfk_2` (`id_category`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `posts_ibfk_2` (`id_category`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comments_forum`
--
ALTER TABLE `comments_forum`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `comments_posts`
--
ALTER TABLE `comments_posts`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments_forum`
--
ALTER TABLE `comments_forum`
  ADD CONSTRAINT `comments_forum_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `forum_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_forum_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments_posts`
--
ALTER TABLE `comments_posts`
  ADD CONSTRAINT `comments_posts_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_posts_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `Categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
