
-- Дамп структуры базы данных Clinick_db
DROP DATABASE IF EXISTS `Clinick_db`;
CREATE DATABASE IF NOT EXISTS `Clinick_db` 
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Clinick_db.columns: ~2 rows (приблизительно)
DELETE FROM `columns`;
INSERT INTO `columns` (`id`, `number`, `name`, `table`) VALUES
	(4, 1, 'name', 0),
	(5, 2, 'author', 0),
	(11, 1, 'artickle', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Clinick_db.rows: ~2 rows (приблизительно)
DELETE FROM `rows`;
INSERT INTO `rows` (`id`, `number`, `color`, `table`) VALUES
	(2, 1, '#ffffff', 0),
	(3, 12, '#ffffff', 1);

-- Дамп структуры для таблица Clinick_db.tables
DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL,
  `header` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Clinick_db.tables: ~1 rows (приблизительно)
DELETE FROM `tables`;
INSERT INTO `tables` (`id`, `header`) VALUES
	(0, 'Book'),
	(1, 'Product');

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
  KEY `FK_values_columns` (`column`),
  KEY `FK_values_rows` (`row`),
  CONSTRAINT `FK_values_columns` FOREIGN KEY (`column`) REFERENCES `columns` (`number`),
  CONSTRAINT `FK_values_rows` FOREIGN KEY (`row`) REFERENCES `rows` (`number`),
  CONSTRAINT `FK_values_tables` FOREIGN KEY (`table`) REFERENCES `tables` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Clinick_db.values: ~2 rows (приблизительно)
DELETE FROM `values`;
INSERT INTO `values` (`id`, `table`, `column`, `row`, `value`) VALUES
	(2, 0, NULL, NULL, NULL),
	(3, 0, NULL, NULL, NULL);
