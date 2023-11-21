-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 21 2023 г., 22:07
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
-- База данных: `League`
--

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Goals`
--

CREATE TABLE `Goals` (
  `id` int UNSIGNED NOT NULL,
  `id_match` int UNSIGNED NOT NULL,
  `id_player` int UNSIGNED NOT NULL,
  `minuts` time NOT NULL,
  `assistant` int UNSIGNED DEFAULT NULL,
  `id_com` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Goals`
--

INSERT INTO `Goals` (`id`, `id_match`, `id_player`, `minuts`, `assistant`, `id_com`) VALUES
(1, 2, 9, '00:15:33', NULL, 3),
(2, 2, 12, '00:36:02', 13, 4),
(3, 1, 3, '00:18:53', 4, 1),
(4, 3, 9, '00:36:02', NULL, 3),
(5, 3, 6, '00:20:14', 7, 2),
(6, 2, 10, '01:27:18', 9, 3),
(9, 10, 14, '00:40:00', 15, 7),
(10, 10, 15, '00:27:00', 14, 7),
(11, 9, 12, '00:20:31', 13, 4),
(12, 8, 15, '01:20:31', 14, 7),
(13, 3, 10, '01:24:49', NULL, 3),
(14, 3, 9, '00:27:00', 10, 3),
(15, 7, 14, '00:36:02', 15, 7),
(16, 7, 14, '00:39:00', 15, 7),
(17, 2, 9, '01:39:00', 10, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `Matches`
--

CREATE TABLE `Matches` (
  `id` int UNSIGNED NOT NULL,
  `id_com1` int UNSIGNED NOT NULL,
  `id_com2` int UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `win_com` int UNSIGNED DEFAULT NULL,
  `lose_com` int UNSIGNED DEFAULT NULL,
  `id_city` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Matches`
--

INSERT INTO `Matches` (`id`, `id_com1`, `id_com2`, `date`, `win_com`, `lose_com`, `id_city`) VALUES
(1, 1, 2, '2023-08-21 16:00:00', 1, 2, 1),
(2, 3, 4, '2023-08-21 14:00:00', 3, 4, 4),
(3, 3, 2, '2023-08-17 12:00:00', 3, 2, 2),
(4, 1, 4, '2023-08-24 11:00:00', NULL, NULL, 4),
(5, 2, 4, '2023-08-17 18:00:00', NULL, NULL, 4),
(6, 4, 1, '2023-08-21 13:00:00', NULL, NULL, 4),
(7, 7, 6, '2023-08-18 20:00:00', 7, 6, 7),
(8, 4, 7, '2023-08-23 14:00:00', 7, 4, 4),
(9, 6, 4, '2023-08-19 17:00:00', 4, 6, 6),
(10, 7, 3, '2023-08-24 12:00:00', 7, 3, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_17_191003_create_posts_table', 2),
(6, '2023_08_18_012150_create_tables', 3),
(7, '2023_08_21_061508_add_com_goals', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `id` int UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `short_description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagesPath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `News`
--

INSERT INTO `News` (`id`, `date`, `short_description`, `full_text`, `imagesPath`) VALUES
(1, '2023-08-16', 'ТРЕНЕРСКИЙ ШТАБ «КРАСНОДАРА-2» ПРИЗНАН ЛУЧШИМ В 6-М ТУРЕ LEON-ВТОРОЙ ЛИГИ А', 'В LEON-Второй лиге А уже прошли шесть туров. Намечаются явные лидеры, а также те, кому стоит поднапрячься, чтобы взобраться выше. Представляем топ-5 в группах «Золото» и «Серебро» после прошедшего тура.«Золото»По итогам тура лучшим голкипером стал Владислав Полетаев из «Иртыша». Матч с «Велесом» он отстоял на ноль. И вообще для футболиста это уже четвертая «сухая» игра в сезоне.Среди защитников выделился Алексей Никитин. «Ротор» в прошлом туре одержал свою первую победу в сезоне, а футболист забил решающий гол.', './images/new-1.jpg'),
(2, '2023-08-15', '«РОТОР», «АМКАР», «ТЕКСТИЛЬЩИК» И «ЧЕЛЯБИНСК» ПРОШЛИ В СЛЕДУЮЩИЙ ЭТАП КУБКА РОССИИ', 'Стартовал второй раунд Пути регионов FONBET Кубка России 2023/24. Матчи проходят 22 и 23 августа. На этом этапе в борьбу вступили клубы LEON-Второй лиги А.\r\n\r\n«Челябинск» с минимальным счетом обыграл «Иртыш». Гол за авторством Данилы Козлова.\r\n\r\n«Ротору» также хватило одного гола, чтобы победить «Астрахань». Мяч в ворота отправил Кирилл Родионов.\r\n\r\nДве встречи в основное время завершились ничьей, поэтому победителя определяли в серии пенальти. Так, пермский «Амкар» переиграл «Торпедо Миасс», а «Текстильщик» выиграл у «Амкала» из Медиалиги.\r\n\r\nМатчи второго раунда продолжатся 23 августа, где определится, кто пройдет в следующий этап. Уже известно, что «Амкар Пермь» и «Челябинск» встретятся в третьем раунде Пути регионов.', './images/new-2.jpg'),
(3, '2023-08-15', 'ФИЛИПП ДВОРЕЦКОВ СТАЛ ИГРОКОМ «РОТОРА»', 'Филипп Дворецков присоединился к «Ротору». Футболист подписал соглашение на один год. Полузащитник последние два сезона провел в «Нефтехимики», где сыграл 45 матчей и забил пять голов. Также он выступал за московское «Торпедо», «Мордовию» и «Носту».Защитник Владимир Мастеров вернулся в «Салют Белгород». В июле футболист перешел в ФК «Спартак» (Кострома), за который сыграл лишь один матч, затем покинул команду. За «Салют» Мастеров играл с 2019 года.', './images/new-3.jpg'),
(6, '2023-08-23', 'ТРЕНЕРСКИЙ ШТАБ «КРАСНОДАРА-2» ПРИЗНАН ЛУЧШИМ В 6-М ТУРЕ LEON-ВТОРОЙ ЛИГИ А', 'В LEON-Второй лиге А уже прошли шесть туров. Намечаются явные лидеры, а также те, кому стоит поднапрячься, чтобы взобраться выше. Представляем топ-5 в группах «Золото» и «Серебро» после прошедшего тура.\r\n\r\n«Золото»\r\n\r\nПо итогам тура лучшим голкипером стал Владислав Полетаев из «Иртыша». Матч с «Велесом» он отстоял на ноль. И вообще для футболиста это уже четвертая «сухая» игра в сезоне.\r\n\r\nСреди защитников выделился Алексей Никитин. «Ротор» в прошлом туре одержал свою первую победу в сезоне, а футболист забил решающий гол.', './images/new-4.jpg'),
(7, '2023-08-17', 'В СЛЕДУЮЩИЙ РАУНД ПУТИ РЕГИОНОВ КУБКА РОССИИ ПРОШЛИ ЕЩЕ 6 КЛУБОВ LEON-ВТОРОЙ ЛИГИ А', 'Завершился второй раунд Пути регионов FONBET Кубка России сезона 2023/2024. Во второй день определилось, кто продолжит борьбу в турнире среди клубов LEON-Второй лиги А. Накануне стало известно, что «Ротор», «Челябинск», «Амкар Пермь» и «Текстильщик» прошли в следующий раунд.\r\n\r\n«Муром» встречался с командой из Медиалиги 2DROTS и проиграл со счетом 1:3. «Салют Белгород» превзошел курский «Авангард», а «Форте» в серии пенальти переиграл «Металлург». В своих парах среди команд LEON-Второй лиги А также победили «Уфа», «Динамо-Брянск», «Волга» и «Велес».\r\n\r\nТретий раунд пройдет 12-14 сентября. Точные даты и соперники определятся позднее.', './images/new-5.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Players`
--

CREATE TABLE `Players` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_team` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Players`
--

INSERT INTO `Players` (`id`, `name`, `photo`, `position`, `id_team`) VALUES
(2, 'Петров И.В', './images/p1.jpg', 'Вратарь', 1),
(3, 'Снегирев А.Р', './images/p2.jpg', 'Нападающий', 1),
(4, 'Дмитриенко О.Л', './images/p3.jpg', 'Защитник', 1),
(5, 'Иванов Д.Л', './images/p4.jpg', 'Вратарь', 2),
(6, 'Попов Д.Ш', './images/p5.jpg', 'Нападающий', 2),
(7, 'Рылин Л.Д', './images/p6.jpg', 'Защитник', 2),
(8, 'Каспаров Е.Л', './images/p7.jpg', 'Вратарь', 3),
(9, 'Меняйлов П.З', './images/p8.jpg', 'Нападающий', 3),
(10, 'Чичиков Д.Л', './images/p9.jpg', 'Защитник', 3),
(11, 'Рогов У.Л', './images/p10.png', 'Вратарь', 4),
(12, 'Мальцев В.З', './images/p11.jpg', 'Нападающий', 4),
(13, 'Хамитов Д.В', './images/p12.jpg', 'Защитник', 4),
(14, 'Мясников М.Л', './images/p14.jpg', 'нападающий', 7),
(15, 'Лекомцев И.А', './images/p16.jpg', 'защитник', 7),
(16, 'Батырев А.И', './images/p15.jpg', 'вратарь', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Red cards`
--

CREATE TABLE `Red cards` (
  `id` int NOT NULL,
  `id_match` int NOT NULL,
  `id_player` int NOT NULL,
  `minut` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Red_cards`
--

CREATE TABLE `Red_cards` (
  `id` int UNSIGNED NOT NULL,
  `id_match` int UNSIGNED NOT NULL,
  `id_player` int UNSIGNED NOT NULL,
  `minuts` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Teams`
--

CREATE TABLE `Teams` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emblem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_stadium` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coach` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_coach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Teams`
--

INSERT INTO `Teams` (`id`, `name`, `emblem`, `city`, `name_stadium`, `coach`, `photo_coach`) VALUES
(1, 'Авангард', './images/avangard.png', 'Тольяти', 'Казань арена', 'Иванов Иван Иванович', './images/tr2.jpg'),
(2, 'Динамо', './images/Dinamo.png', 'Москва', 'Динамо', 'Петров Петр Петрович', './images/tr5.jpg'),
(3, 'Спартак', './images/Spartak.png', 'Иваново', 'Лужники', 'Сергеев Сергей Сергеевич', './images/tr1.png'),
(4, 'Торпедо', './images/torpedo.png', 'Ижевск', 'Газпром Арена', 'Андреев Андрей Андреевич', './images/tr3.png'),
(6, 'Металург', './images/metalurg.png', 'Новосибирск', 'Центральный стадион профсоюзов', 'Сергеев Иван Иванович', './images/tr4.png'),
(7, 'ЦСКА', './images/cska.png', 'Тольяти', 'ВЭБ Арена', 'Брекоткин Дмитрий Сергеевич', './images/tr6.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sergey', '11111@mail.ru', NULL, '$2y$10$m/GbWlaXk5YvltKwfaCgYu.7XWpQCAUFT5eCor3X2iKSKbzFqjHfu', NULL, '2023-08-17 16:15:45', '2023-08-17 16:15:45'),
(2, 'andrey', '22222@mail.ru', NULL, '$2y$10$ekcpPOnYexL6Dw8GNojcwOsjiczixIITpwaWDnfjMbPq28L39.rbW', NULL, '2023-08-17 16:28:31', '2023-08-17 16:28:31'),
(3, 'Сергей', 'skorpionshik83@mail.ru', NULL, '$2y$10$pyt11TBVndFEDKydOJKq1Op2zyyYW9VgNc/lHIDJGmK3npKf8cggi', NULL, '2023-08-28 04:43:59', '2023-08-28 04:43:59');

-- --------------------------------------------------------

--
-- Структура таблицы `Yellow_cards`
--

CREATE TABLE `Yellow_cards` (
  `id` int UNSIGNED NOT NULL,
  `id_match` int UNSIGNED NOT NULL,
  `id_player` int UNSIGNED NOT NULL,
  `minuts` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `Goals`
--
ALTER TABLE `Goals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goals_id_match_foreign` (`id_match`),
  ADD KEY `goals_id_player_foreign` (`id_player`),
  ADD KEY `goals_assistant_foreign` (`assistant`),
  ADD KEY `goals_id_com_foreign` (`id_com`);

--
-- Индексы таблицы `Matches`
--
ALTER TABLE `Matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matches_id_com1_foreign` (`id_com1`),
  ADD KEY `matches_id_com2_foreign` (`id_com2`),
  ADD KEY `matches_win_com_foreign` (`win_com`),
  ADD KEY `matches_id_city_foreign` (`id_city`),
  ADD KEY `lose_com` (`lose_com`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `Players`
--
ALTER TABLE `Players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `players_name_unique` (`name`),
  ADD KEY `players_id_team_foreign` (`id_team`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Red cards`
--
ALTER TABLE `Red cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_match` (`id_match`),
  ADD KEY `id_player` (`id_player`);

--
-- Индексы таблицы `Red_cards`
--
ALTER TABLE `Red_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `red_cards_id_match_foreign` (`id_match`),
  ADD KEY `red_cards_id_player_foreign` (`id_player`);

--
-- Индексы таблицы `Teams`
--
ALTER TABLE `Teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_name_unique` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `Yellow_cards`
--
ALTER TABLE `Yellow_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yellow_cards_id_match_foreign` (`id_match`),
  ADD KEY `yellow_cards_id_player_foreign` (`id_player`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Goals`
--
ALTER TABLE `Goals`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `Matches`
--
ALTER TABLE `Matches`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Players`
--
ALTER TABLE `Players`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Red cards`
--
ALTER TABLE `Red cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Red_cards`
--
ALTER TABLE `Red_cards`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Teams`
--
ALTER TABLE `Teams`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Yellow_cards`
--
ALTER TABLE `Yellow_cards`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Goals`
--
ALTER TABLE `Goals`
  ADD CONSTRAINT `goals_assistant_foreign` FOREIGN KEY (`assistant`) REFERENCES `Players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `goals_id_com_foreign` FOREIGN KEY (`id_com`) REFERENCES `Teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `goals_id_match_foreign` FOREIGN KEY (`id_match`) REFERENCES `Matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `goals_id_player_foreign` FOREIGN KEY (`id_player`) REFERENCES `Players` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Matches`
--
ALTER TABLE `Matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`lose_com`) REFERENCES `Teams` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `matches_id_city_foreign` FOREIGN KEY (`id_city`) REFERENCES `Teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_id_com1_foreign` FOREIGN KEY (`id_com1`) REFERENCES `Teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_id_com2_foreign` FOREIGN KEY (`id_com2`) REFERENCES `Teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_win_com_foreign` FOREIGN KEY (`win_com`) REFERENCES `Teams` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Players`
--
ALTER TABLE `Players`
  ADD CONSTRAINT `players_id_team_foreign` FOREIGN KEY (`id_team`) REFERENCES `Teams` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Red_cards`
--
ALTER TABLE `Red_cards`
  ADD CONSTRAINT `red_cards_id_match_foreign` FOREIGN KEY (`id_match`) REFERENCES `Matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `red_cards_id_player_foreign` FOREIGN KEY (`id_player`) REFERENCES `Players` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Yellow_cards`
--
ALTER TABLE `Yellow_cards`
  ADD CONSTRAINT `yellow_cards_id_match_foreign` FOREIGN KEY (`id_match`) REFERENCES `Matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `yellow_cards_id_player_foreign` FOREIGN KEY (`id_player`) REFERENCES `Players` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
