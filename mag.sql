-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 15 2020 г., 12:01
-- Версия сервера: 10.4.13-MariaDB
-- Версия PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mag`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` text COLLATE utf8_bin NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `discr` text COLLATE utf8_bin NOT NULL,
  `price` text COLLATE utf8_bin NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL,
  `category` text COLLATE utf8_bin NOT NULL,
  `sizes` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `discr`, `price`, `img`, `category`, `sizes`) VALUES
('1', 'Куртка Casual', 'Отличная куртка по достойно цене, теплая и удобная', '8800', 'casual', 'men', '{\"0\":\"34\",\"1\":\"45\",\"2\":\"54\",\"3\":\"34\"}'),
('2', 'Стильная кожаная куртка', 'Стильная, легкая кожаная куртка с теплым наполнителем', '12800', 'leather', 'men', '{\"0\":\"34\",\"1\":\"45\",\"2\":\"54\",\"3\":\"34\"}'),
('4', 'Кеды серые', 'Отличные кеды', '2900', 'snikers', 'men', '{\"0\":\"34\",\"1\":\"45\",\"2\":\"54\",\"3\":\"34\"}'),
('5', 'Кеды черные', 'Среднего качества кеды', '4500', 'snikers-black', 'men', '{\"0\":\"34\",\"1\":\"45\",\"2\":\"54\",\"3\":\"34\"}'),
('5', 'Кеды серые', 'Великолепные кеды casual', '5900', 'snikers-casual', 'men', '{\"0\":\"34\",\"1\":\"45\",\"2\":\"54\",\"3\":\"34\"}');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `NAME` text COLLATE utf8_bin NOT NULL,
  `LOGIN` text COLLATE utf8_bin NOT NULL,
  `EMAIL` text COLLATE utf8_bin NOT NULL,
  `PASSWORD` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`NAME`, `LOGIN`, `EMAIL`, `PASSWORD`) VALUES
('admin', 'admin', 'admin', 'admin'),
('qwe', 'wqew', 'qweqwe', 'eqwe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
