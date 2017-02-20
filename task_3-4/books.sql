-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 20 2017 г., 10:14
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `authorId` int(11) NOT NULL,
  `authorSurname` varchar(20) NOT NULL,
  `authorName` varchar(20) NOT NULL,
  `authorYearOfBirth` int(4) NOT NULL,
  `authorDeath` int(4) DEFAULT NULL,
  `authorCountryName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`authorId`, `authorSurname`, `authorName`, `authorYearOfBirth`, `authorDeath`, `authorCountryName`) VALUES
(2, 'Українка ', 'Леся ', 1111, NULL, 1),
(3, 'Zhalba', 'Stas', 1997, 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `bookAuthor` int(11) NOT NULL,
  `bookName` varchar(30) NOT NULL,
  `bookGenre` int(11) NOT NULL,
  `bookPages` int(11) NOT NULL,
  `bookPublisherYear` int(4) NOT NULL,
  `bookEdition` int(11) NOT NULL,
  `bookReceipt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`bookId`, `bookAuthor`, `bookName`, `bookGenre`, `bookPages`, `bookPublisherYear`, `bookEdition`, `bookReceipt`) VALUES
(1, 2, 'Думи і мрії', 1, 333, 1902, 1, '2015-08-06'),
(2, 3, 'Teat', 1, 1234, 1945, 1, '2017-02-08'),
(4, 2, 'Тест', 1, 323, 1904, 1, '2017-02-02');

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `cityId` int(11) NOT NULL,
  `cityCountry` int(11) NOT NULL,
  `cityName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`cityId`, `cityCountry`, `cityName`) VALUES
(2, 1, 'Харків'),
(3, 1, 'Чернівці');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `countryId` int(11) NOT NULL,
  `countryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`countryId`, `countryName`) VALUES
(1, 'Україна'),
(3, 'Польша');

-- --------------------------------------------------------

--
-- Структура таблицы `edition`
--

CREATE TABLE `edition` (
  `editionId` int(11) NOT NULL,
  `editionName` varchar(30) NOT NULL,
  `editionAddress` varchar(50) NOT NULL,
  `editionZip` int(5) NOT NULL,
  `editionContactPerson` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `edition`
--

INSERT INTO `edition` (`editionId`, `editionName`, `editionAddress`, `editionZip`, `editionContactPerson`) VALUES
(1, 'Море', 'jkjfk fdk jdfj k', 22543, 'Stas Zhalba'),
(3, 'Zhalba', '2, Street, 32', 12432, 'dsg s f gdf fd'),
(4, 'тест', 'ыввафыа', 21233, 'Свс Ы');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `genreId` int(11) NOT NULL,
  `genreName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`genreId`, `genreName`) VALUES
(1, 'Лірика');

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE `person` (
  `personId` int(11) NOT NULL,
  `personName` varchar(20) NOT NULL,
  `personSurname` varchar(20) NOT NULL,
  `personPhoneNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`personId`, `personName`, `personSurname`, `personPhoneNumber`) VALUES
(1, 'Іван', 'Іванов', '098649986');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorId`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityId`),
  ADD KEY `city_id` (`cityId`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryId`),
  ADD KEY `country_id` (`countryId`);

--
-- Индексы таблицы `edition`
--
ALTER TABLE `edition`
  ADD PRIMARY KEY (`editionId`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreId`),
  ADD KEY `genre_id` (`genreId`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personId`),
  ADD KEY `person_id` (`personId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `authorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `cityId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `countryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `edition`
--
ALTER TABLE `edition`
  MODIFY `editionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `genreId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `personId` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
