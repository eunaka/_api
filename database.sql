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
 * Use this table for testing.
 */
CREATE TABLE IF NOT EXISTS `test`(
	`test_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`test_name` VARCHAR(50) NULL DEFAULT NULL
)ENGINE INNODB DEFAULT CHAR SET 'utf8' AUTO_INCREMENT=10;

INSERT INTO `test` (`test_name`) VALUES ('teste1'),('teste2'),('teste3'),('teste4'),('teste5');

/* --------------------------------------------------
 * TABLE `user`
 * --------------------------------------------------
 */
CREATE TABLE IF NOT EXISTS `user`(
	`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`username` VARCHAR(50) NOT NULL UNIQUE,
	`email` VARCHAR(50) NOT NULL
)ENGINE INNODB DEFAULT CHAR SET 'utf8' AUTO_INCREMENT=10;

/* --------------------------------------------------
 * TABLE `store`
 * --------------------------------------------------
 */
CREATE TABLE IF NOT EXISTS `store`(
	`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL UNIQUE
)ENGINE INNODB DEFAULT CHAR SET 'utf8' AUTO_INCREMENT=10;

/* --------------------------------------------------
 * TABLE `product`
 * --------------------------------------------------
 */
CREATE TABLE IF NOT EXISTS `product`(
	`id` INT(11) PRIMARY KEY AUTO_INCREMENT
)ENGINE INNODB DEFAULT CHAR SET 'utf8' AUTO_INCREMENT=10;

/* --------------------------------------------------
 * TABLE `user_store`
 * --------------------------------------------------
 */
CREATE TABLE IF NOT EXISTS `user_store`(
	`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`user_id` INT(11) NOT NULL,
	`store_id` INT(11) NOT NULL,
	CONSTRAINT `fk_user_id`
		FOREIGN KEY `user_id`
		REFERENCES `user`(`id`),
	CONSTRAINT `fk_store_id`
		FOREIGN KEY `store_id`
		REFERENCES `store`(`id`)
)ENGINE INNODB DEFAULT CHAR SET 'utf8' AUTO_INCREMENT=10;