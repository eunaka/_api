/* --------------------------------------------------
 * DATABASE `_api`
 * --------------------------------------------------
 * Drop any database with the same name and
 * create a new one and select it.
 */
DROP DATABASE IF EXISTS `_api`;
CREATE DATABASE `_api` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `_api`;

/* --------------------------------------------------
 * TABLE `test`
 * --------------------------------------------------
 */
/* TABLE `test` CREATION */
CREATE TABLE IF NOT EXISTS `test`(
	`test_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `test_name` VARCHAR(50) NULL DEFAULT NULL
)ENGINE INNODB DEFAULT CHAR SET 'utf8' AUTO_INCREMENT=10;

/* TABLE `test` INSERTIONS */
INSERT INTO `test` (`test_name`) VALUES ('teste1'),('teste2'),('teste3'),('teste4'),('teste5');