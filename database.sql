-- --------------------------------------------------
-- DATABASE `_api` DESCRIPTION
-- --------------------------------------------------

-- --------------------------------------------------
-- TABLE CREATION PATTERN
-- --------------------------------------------------
/*
CREATE TABLE IF NOT EXISTS `table_name`(
	`table_name_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NULL DEFAULT NULL
)ENGINE INNODB DEFAULT CHAR SET 'utf8' AUTO_INCREMENT=10;
*/

-- --------------------------------------------------
-- TABLE `test`
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `test`(
	`test_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `test_name` VARCHAR(50) NULL DEFAULT NULL
)ENGINE INNODB DEFAULT CHAR SET 'utf8' AUTO_INCREMENT=10;