-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.19-log - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных Clinick_db
DROP DATABASE IF EXISTS `Clinick_db`;
CREATE DATABASE IF NOT EXISTS `Clinick_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Clinick_db`;

-- Дамп структуры для таблица Clinick_db.columns
DROP TABLE IF EXISTS `columns`;
CREATE TABLE IF NOT EXISTS `columns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT NULL,
  `name` text,
  `table` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_columns_tables` (`table`),
  KEY `number` (`number`),
  CONSTRAINT `FK_columns_tables` FOREIGN KEY (`table`) REFERENCES `tables` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Clinick_db.columns: ~5 rows (приблизительно)
DELETE FROM `columns`;
/*!40000 ALTER TABLE `columns` DISABLE KEYS */;
INSERT INTO `columns` (`id`, `number`, `name`, `table`) VALUES
	(4, 1, 'name', 0),
	(5, 2, 'author', 0),
	(11, 1, 'artickle', 1),
	(12, 2, 'four', 1),
	(13, 3, 'five', 0);
/*!40000 ALTER TABLE `columns` ENABLE KEYS */;

-- Дамп структуры для таблица Clinick_db.rows
DROP TABLE IF EXISTS `rows`;
CREATE TABLE IF NOT EXISTS `rows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT NULL,
  `color` char(50) NOT NULL DEFAULT '#ffffff',
  `table` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rows_tables` (`table`),
  KEY `number` (`number`),
  CONSTRAINT `FK_rows_tables` FOREIGN KEY (`table`) REFERENCES `tables` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Clinick_db.rows: ~4 rows (приблизительно)
DELETE FROM `rows`;
/*!40000 ALTER TABLE `rows` DISABLE KEYS */;
INSERT INTO `rows` (`id`, `number`, `color`, `table`) VALUES
	(2, 1, '#ffffff', 0),
	(3, 2, '#ffffff', 0),
	(4, 3, '#ffffff', 0),
	(5, 4, '#ffffff', 0),
	(6, 1, '#ffffff', 1);
/*!40000 ALTER TABLE `rows` ENABLE KEYS */;

-- Дамп структуры для таблица Clinick_db.tables
DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL,
  `header` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Clinick_db.tables: ~0 rows (приблизительно)
DELETE FROM `tables`;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` (`id`, `header`) VALUES
	(0, 'Book'),
	(1, 'Product');
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;

-- Дамп структуры для таблица Clinick_db.values
DROP TABLE IF EXISTS `values`;
CREATE TABLE IF NOT EXISTS `values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table` int(11) DEFAULT NULL,
  `column` int(11) DEFAULT NULL,
  `row` int(11) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `FK_values_tables` (`table`),
  CONSTRAINT `FK_values_tables` FOREIGN KEY (`table`) REFERENCES `tables` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Clinick_db.values: ~2 rows (приблизительно)
DELETE FROM `values`;
/*!40000 ALTER TABLE `values` DISABLE KEYS */;
INSERT INTO `values` (`id`, `table`, `column`, `row`, `value`) VALUES
	(4, 0, 1, 1, 'val1'),
	(6, 0, 2, 2, 'val2'),
	(7, 1, 1, 1, 'val3'),
	(8, 0, 3, 1, 'val4');
/*!40000 ALTER TABLE `values` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
