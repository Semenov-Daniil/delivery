-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 08 2024 г., 14:23
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `delivery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(2, 'Продукты'),
(3, 'Обувь'),
(4, 'Куртки'),
(5, 'Животные');

-- --------------------------------------------------------

--
-- Структура таблицы `favourite`
--

CREATE TABLE `favourite` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `favourite`
--

INSERT INTO `favourite` (`id`, `product_id`, `user_id`, `status`) VALUES
(2, 13, 8, 0),
(3, 14, 8, 0),
(4, 15, 8, 0),
(5, 16, 8, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `type_pay_id` int UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `outpost_id` int UNSIGNED NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `comment_admin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `outpost`
--

CREATE TABLE `outpost` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `outpost`
--

INSERT INTO `outpost` (`id`, `title`) VALUES
(1, 'пункт 1'),
(2, 'пункт 2'),
(3, 'пункт 3'),
(4, 'пункт 4');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `count` int UNSIGNED NOT NULL DEFAULT '0',
  `like` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `dislike` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `weight` float UNSIGNED DEFAULT '0',
  `kilocalories` float UNSIGNED DEFAULT '0',
  `shelf_life` varchar(255) DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `category_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `photo`, `price`, `count`, `like`, `dislike`, `weight`, `kilocalories`, `shelf_life`, `description`, `category_id`) VALUES
(13, 'Молоко', '9_1731062634_GOx-9SCQ2VXMMolNF7Z2mvzGS_12QNbF.png', 100, 100, 5, 0, 100, 250, '25.10.2025', 'Молоко натуральное', 2),
(14, 'Слон', '9_1731062874_Lrt5x_GiVUeBZNS9DzX5mxbj8yvHEATZ.png', 1000, 100, 0, 0, 200, 0, '0', 'Наш  Слоняра', 5),
(15, 'Соль', '9_1731062954_7sgixL2dmn-tbG539jyURoMFupVjOP5u.jpg', 200, 10000, 0, 0, 2300, 10, '0', 'Отборная соль', 2),
(16, 'Порошок', '9_1731063093_oFz0sx-gvEqxbRXgAq8aZUYhPPssn6h6.jpg', 30, 5403, 0, 0, 54, 0, '0', 'Порошок высшего сорта!', 2),
(17, 'Молоко 2.0', '9_1731062634_GOx-9SCQ2VXMMolNF7Z2mvzGS_12QNbF.png', 105, 100, 0, 0, 100, 250, '25.10.2026', 'Молоко натуральное улучшенное', 2),
(18, 'Слон 0.3', '9_1731062874_Lrt5x_GiVUeBZNS9DzX5mxbj8yvHEATZ.png', 1300, 105, 0, 0, 199, 0, '0', 'Наш  Слоняра только лучше', 5),
(19, 'Соль 2077', '9_1731062954_7sgixL2dmn-tbG539jyURoMFupVjOP5u.jpg', 20077, 10000, 0, 0, 2300, 10, '0', 'Отборная соль 2077', 2),
(20, 'Порошок 2022', '9_1731063093_oFz0sx-gvEqxbRXgAq8aZUYhPPssn6h6.jpg', 30213, 5403, 0, 0, 54, 0, '0', 'Порошок высшего сорта!', 2),
(21, 'Молоко', '9_1731062634_GOx-9SCQ2VXMMolNF7Z2mvzGS_12QNbF.png', 10021, 100, 0, 0, 100, 250, '25.10.2025', 'Молоко натуральное 12', 2),
(22, 'Слон 2', '9_1731062874_Lrt5x_GiVUeBZNS9DzX5mxbj8yvHEATZ.png', 1000220, 100, 0, 0, 20021, 0, '0', 'Наш  Слоняра', 5),
(23, 'Соль 32', '9_1731062954_7sgixL2dmn-tbG539jyURoMFupVjOP5u.jpg', 200, 1000021, 0, 0, 230012, 1021, '0', 'Отборная соль', 2),
(24, 'Порошок 3', '9_1731063093_oFz0sx-gvEqxbRXgAq8aZUYhPPssn6h6.jpg', 3033, 5403, 0, 0, 54, 0, '0', 'Порошок высшего сорта!', 2),
(25, 'Молоко 2.0.2', '9_1731062634_GOx-9SCQ2VXMMolNF7Z2mvzGS_12QNbF.png', 105, 100, 0, 0, 100, 250, '25.10.2026', 'Молоко натуральное улучшенное', 2),
(26, 'Слон 0.3.4', '9_1731062874_Lrt5x_GiVUeBZNS9DzX5mxbj8yvHEATZ.png', 1300, 105, 0, 0, 199, 0, '0', 'Наш  Слоняра только лучше', 5),
(27, 'Соль 20.0', '9_1731062954_7sgixL2dmn-tbG539jyURoMFupVjOP5u.jpg', 20077, 10000, 0, 0, 2300, 10, '0', 'Отборная соль 20.0', 2),
(28, 'Порошок 20.2', '9_1731063093_oFz0sx-gvEqxbRXgAq8aZUYhPPssn6h6.jpg', 30213, 5403, 0, 0, 54, 0, '0', 'Порошок высшего сорта!', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'Новый'),
(2, 'Сборка'),
(3, 'Отмена'),
(4, 'Готовый к выдаче');

-- --------------------------------------------------------

--
-- Структура таблицы `type_pay`
--

CREATE TABLE `type_pay` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `type_pay`
--

INSERT INTO `type_pay` (`id`, `title`) VALUES
(1, 'наличные'),
(2, 'Банковская карта'),
(3, 'По QR-коду'),
(4, 'Электронные деньги');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int UNSIGNED NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `patronymic`, `login`, `email`, `phone`, `password`, `photo`, `created_at`, `role_id`, `auth_key`) VALUES
(8, 'Иван', 'Иванов', '', 'user', 'user@user.ru', '+7(999)-999-99-99', '$2y$13$2lTKQWY6lyVjGdlQbLyZbeUJsnTPfTMOSCeuENqiaK8I0Fd4f6Ldu', NULL, '2024-11-08 10:23:53', 2, 'iAU_8VZODDbZ7zlX7k7QdDZSffK2SjZj'),
(9, 'Админ', 'Админ', '', 'admin', 'admin@admin.ru', '+7(999)-999-99-99', '$2y$13$bYyRtq5R7Wqis7T4bRCiNOip3r8oqPiprxSW5pf5.mj9c.yy1.lwG', NULL, '2024-11-08 10:24:26', 1, 'sLrRv-E26NLTuyaYxUzd_bxv6DRxAZLR');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `type_pay_id` (`type_pay_id`),
  ADD KEY `outpost_id` (`outpost_id`);

--
-- Индексы таблицы `outpost`
--
ALTER TABLE `outpost`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_pay`
--
ALTER TABLE `type_pay`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_user_login` (`login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `outpost`
--
ALTER TABLE `outpost`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `type_pay`
--
ALTER TABLE `type_pay`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`type_pay_id`) REFERENCES `type_pay` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_5` FOREIGN KEY (`outpost_id`) REFERENCES `outpost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
