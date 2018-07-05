# Library-Management-System
Library management system for personal (small) libraries. Using PHP, bootstrap, javascript, html and css.

Secure login script i used is from [this website](https://de.wikihow.com/Ein-sicheres-Login-Skript-mit-PHP-und-MySQL-erstellen)

# [SEE WHAT IT LOOKS LIKE](https://www.youtube.com/watch?v=O8EXLeLzDe8)

# Database Settings
> Database connection settings are in /includes/psl-config.php

--> Create Database in phpmyadmin:
```
CREATE DATABASE `library`;
```
--> Create table which will store the members login data:
```
CREATE TABLE `library`.`members` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(30) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` CHAR(128) NOT NULL,
    `salt` CHAR(128) NOT NULL 
) ENGINE = InnoDB;
```
--> Create table to store the login attempts:
```
CREATE TABLE `library`.`login_attempts` (
    `user_id` INT(11) NOT NULL,
    `time` VARCHAR(30) NOT NULL
) ENGINE=InnoDB
```
--> Create table to store the books:
```
CREATE TABLE `library`.`books` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `ISBN` BIGINT(20),
    `Name` VARCHAR(255) NOT NULL,
    `Author` VARCHAR(255),
    `Publisher` VARCHAR(255),
    `Print_Date` VARCHAR(255),
    `Date_Received` VARCHAR(255),
    `Volume` VARCHAR(255),
    `Language` VARCHAR(255),
    `Category` VARCHAR(255),
    `IsRead` VARCHAR(255),
    `Lend` VARCHAR(255), 
    `Lend_To` VARCHAR(255)
) ENGINE = InnoDB;
```
--> Create table to add languages:
```
CREATE TABLE `library`.`language` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `language` VARCHAR(255) NOT NULL
) ENGINE = InnoDB;
```
--> Create table to add categories:
```
CREATE TABLE `library`.`category` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `category` VARCHAR(255) NOT NULL
) ENGINE = InnoDB;
```
--> To create a test user for the first login:
```
INSERT INTO `library`.`members` VALUES(1, 'test_user', 'test@example.com',
'00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc',
'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef');
```
--> The Test-User details are:
```
Username: test_user
Email: test@example.com
Password: 6ZaxN2Vzm9NUJT2y
```
