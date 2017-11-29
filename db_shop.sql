-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 29 2017 г., 13:22
-- Версия сервера: 5.7.19-log
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_shop`
--
CREATE DATABASE IF NOT EXISTS `db_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `basket` int(11) NOT NULL,
  `basket_id_products` int(11) NOT NULL,
  `basket_price` int(11) NOT NULL,
  `basket_count` int(11) NOT NULL,
  `basket_date_time` datetime NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `type` varchar(22) NOT NULL,
  `brend` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `type`, `brend`) VALUES
(1, 'женщинам', 'Alina Assi'),
(2, 'женщинам', 'Baon'),
(3, 'женщинам', 'Banana Republic'),
(4, 'женщинам', 'Colin\'s'),
(5, 'женщинам', 'Diesel'),
(6, 'женщинам', 'Gap'),
(7, 'женщинам', 'Lee'),
(8, 'женщинам', 'Mango'),
(9, 'женщинам', 'Marc O\'Polo'),
(10, 'женщинам', 'Trussardi Collection'),
(12, 'мужчинам', 'Baon'),
(13, 'мужчинам', 'Banana Republic'),
(14, 'мужчинам', 'Colin\'s'),
(15, 'мужчинам', 'Diesel'),
(16, 'мужчинам', 'Gap'),
(17, 'мужчинам', 'Lee'),
(18, 'мужчинам', 'Mango'),
(19, 'мужчинам', 'Marc O\'Polo'),
(20, 'мужчинам', 'Trussardi Collection');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `date`) VALUES
(1, 'ГОТОВИМСЯ К BLACK FRIDAY\r\n', 'ПОДПИШИТЕСЬ НА НОВОСТНУЮ РАССЫЛКУ ПРЯМО СЕЙЧАС И ПОЛУЧИТЕ\r\nСкидку 25% на один товар на Ваш выбор.\r\nЭксклюзивные предложения.\r\n', '2017-11-20'),
(2, 'Принимаем бонусы', 'Начисляем 200 бонусов за каждую тысячу в чеке. Оплачивай следующие покупки бонусами до 30% от стоимости.', '2017-11-19'),
(3, 'ГОТОВИМСЯ К BLACK FRIDAY', 'ПОДПИШИТЕСЬ НА НОВОСТНУЮ РАССЫЛКУ ПРЯМО СЕЙЧАС И ПОЛУЧИТЕ\r\nСкидку 25% на один товар на Ваш выбор.\r\nЭксклюзивные предложения.\r\n', '2017-11-17'),
(4, 'Принимаем бонусы', 'Начисляем 200 бонусов за каждую тысячу в чеке. Оплачивай следующие покупки бонусами до 30% от стоимости.', '2017-11-21'),
(5, 'ГОТОВИМСЯ К BLACK FRIDAY', 'ПОДПИШИТЕСЬ НА НОВОСТНУЮ РАССЫЛКУ ПРЯМО СЕЙЧАС И ПОЛУЧИТЕ\r\nСкидку 25% на один товар на Ваш выбор.\r\nЭксклюзивные предложения.\r\n', '2017-11-19');

-- --------------------------------------------------------

--
-- Структура таблицы `reg_user`
--

CREATE TABLE `reg_user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `adress` text NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reg_user`
--

INSERT INTO `reg_user` (`id`, `login`, `pass`, `surname`, `name`, `email`, `phone`, `adress`, `datetime`, `ip`) VALUES
(1, 'admin', '1111', 'm', 's', 'svp1982@mail.ru', '7788-55555', 'netherlands', '2017-11-23 00:00:00', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `table_producrs`
--

CREATE TABLE `table_producrs` (
  `products_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `seo_words` text NOT NULL,
  `seo_description` text NOT NULL,
  `mini_description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mini_features` text NOT NULL,
  `features` text NOT NULL,
  `date_time` datetime NOT NULL,
  `new` int(11) NOT NULL DEFAULT '0',
  `leader` int(11) NOT NULL DEFAULT '0',
  `sale` int(11) NOT NULL DEFAULT '0',
  `visible` int(11) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `type_products` varchar(255) NOT NULL,
  `brend_id` int(11) NOT NULL,
  `votes` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `table_producrs`
--

INSERT INTO `table_producrs` (`products_id`, `title`, `price`, `brand`, `seo_words`, `seo_description`, `mini_description`, `image`, `description`, `mini_features`, `features`, `date_time`, `new`, `leader`, `sale`, `visible`, `count`, `type_products`, `brend_id`, `votes`) VALUES
(1, 'Colin\'s Куртка утепленная', 2999, 'Colin\'s', '', '', 'Бежевая утепленная куртка выполнена из плотной ткани с подстежкой. \r\nДетали: приталенный крой, застежка на молнию, 2 кармана на молнии.', 'img1.jpg', '', 'Состав: Полиэстер - 100%\r\nМатериал подкладки: Полиэстер - 100%\r\nУтеплитель: Полиэстер - 100%\r\nСтрана производства: Вьетнам\r\nРазмер товара на модели: 42/44\r\n\r\n', '', '2017-11-09 12:06:00', 0, 0, 0, 1, 0, 'женщинам', 4, 1),
(2, 'Colin\'s\r\nКуртка утепленная\r\n', 4990, 'Colin\'s', '', '', 'Темно-синяя утепленная куртка выполнена из плотной ткани с подстежкой. \r\nДетали: приталенный крой, застежка на молнию и пуговицы, 2 накладных кармана. ', 'img2.jpg', '', 'Состав: Полиэстер - 100%\r\nМатериал подкладки: Полиэстер - 100%\r\nУтеплитель: Полиэстер - 100%\r\nСтрана производства: Китай\r\nРазмер товара на модели: 48/50\r\n', '', '2017-11-09 08:00:00', 0, 0, 0, 1, 0, 'мужчинам', 14, 1),
(3, 'Alina Assi Кардиган', 3540, 'Alina Assi', '', '', 'Кардиган Alina Assi выполнен из мягкого трикотажа. Модель прямого кроя дополнена поясом в тон, длинные рукава, асимметричный низ.', 'img3.jpg', '', 'Состав: Полиэстер - 60%, Вискоза - 30%, Лайкра - 10% Страна производства: Россия Сезон: мульти Цвет: розовый Застежка: без застежки Размер товара на модели: 40/42', '', '2017-11-14 13:14:00', 0, 0, 0, 1, 0, 'женщинам', 1, 1),
(44, 'Trussardi Collection\r\nФутболка', 3630, 'Trussardi Collection', '', '', 'Футболка Trussardi выполнена из мягкого хлопкового трикотажа. Модель прямого кроя. Особенности: круглый вырез,  спереди принт.', 'img13.jpg', '', 'Состав: Хлопок - 97%, Эластан - 3%\r\nСтрана производства: Италия\r\nРазмер товара на модели: 42/44\r\nСезон: мульти\r\nЦвет: серый\r\nУзор: рисунки и надписи\r\nЗастежка: без застежки', '', '2017-11-19 00:00:00', 0, 0, 0, 1, 0, 'женщинам', 10, 1),
(45, 'Marc O\'Polo\r\nФутболка', 3410, 'Marc O\'Polo', '', '', 'Футболка с принтом.', 'img12.jpg', '', 'Состав: Хлопок - 100%\r\nСтрана производства: Индия\r\nСезон: мульти\r\nЦвет: серый\r\nУзор: рисунки и надписи', '', '2017-11-19 00:00:00', 0, 0, 0, 1, 0, 'мужчинам', 19, 1),
(46, 'Mango\r\nШуба', 6999, 'Mango', '', '', 'Искусственный мех. Круглый вырез горловины. Длинные рукава. Застежка на крючки. Подкладка.', 'img11.jpg', '', 'Состав: Акрил - 100%\r\nМатериал подкладки: Полиэстер - 100%\r\nСтрана производства: Китай\r\nДлина: 70 см\r\nСезон: демисезон, зима\r\nЦвет: фиолетовый\r\nУзор: однотонный\r\nЗастежка: на крючках', '', '2017-11-19 00:00:00', 0, 0, 0, 1, 0, 'женщинам', 8, 2),
(47, 'Lee\r\nРубашка', 4700, 'Lee', '', '', 'Рубашка Lee выполнена из мягкого хлопкового текстиля в клетку. Модель прямого кроя. Детали: планка и манжеты с застежкой на кнопки, отложной воротник, один нагрудный карман.', 'img10.jpg', '', 'Состав: Хлопок - 100%\r\nСтрана производства: Индия\r\nРазмер товара на модели: 46/48\r\nСезон: мульти\r\nЦвет: зеленый\r\nУзор: клетка\r\nЗастежка: на пуговицах\r\nТип силуэта: прямой', '', '2017-11-19 00:00:00', 0, 0, 0, 1, 0, 'мужчинам', 17, 1),
(48, 'Gap\r\nЛонгслив', 2099, 'Gap', '', '', 'Трикотажный лонгслив в полоску.', 'img9.jpg', '', 'Состав: Хлопок - 100%\r\nСтрана производства: Вьетнам\r\nРазмер товара на модели: 48/50\r\nСезон: мульти\r\nЦвет: мультиколор\r\nУзор: полоска\r\nЗастежка: без застежки', '', '2017-11-19 00:00:00', 0, 0, 0, 1, 0, 'мужчинам', 16, 1),
(49, 'Gap\r\nЮбка', 3550, 'Gap', '', '', 'Юбка Gap выполнена из легкого текстиля с хлопковой подкладкой. Детали: расклешенный крой, эластичный пояс со сборкой, два боковых кармана.', 'img8.jpg', '', 'Состав: Вискоза - 60%, Хлопок - 40%\r\nМатериал подкладки: Хлопок - 100%\r\nСтрана производства: Индия\r\nРазмер товара на модели: 42/44\r\nСезон: мульти\r\nЦвет: синий\r\n', '', '2017-11-19 00:00:00', 0, 0, 0, 1, 0, 'женщинам', 6, 1),
(50, 'Banana Republic\r\nДжинсы', 5600, 'Banana Republic', '', '', 'Джинсы Banana Republic выполнены из стрейчевого денима с декоративными потертостями. Детали: застежка на молнию и пуговицу, кармана сзади.', 'img6.jpg', '', 'Состав: Хлопок - 78%, Полиэстер - 13%, Эластомультиэстер - 6%, Эластан - 3%\r\nСтрана производства: Соединенное Королевство\r\nРазмер товара на модели: 27/32\r\nСезон: мульти\r\nЦвет: синий\r\n', '', '2017-11-19 00:00:00', 0, 0, 0, 1, 0, 'женщинам', 3, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reg_user`
--
ALTER TABLE `reg_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_producrs`
--
ALTER TABLE `table_producrs`
  ADD PRIMARY KEY (`products_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `basket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `reg_user`
--
ALTER TABLE `reg_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `table_producrs`
--
ALTER TABLE `table_producrs`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
