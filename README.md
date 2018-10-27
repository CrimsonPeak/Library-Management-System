# Library-Management-System
Library management system for personal (small) libraries. Using PHP, bootstrap, javascript, html and css.

# [SEE WHAT IT LOOKS LIKE](https://www.youtube.com/watch?v=O8EXLeLzDe8)

# Database Settings
> Database connection settings are in /includes/psl-config.php

--> Create Database in phpmyadmin:
```
CREATE DATABASE `library`;
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
