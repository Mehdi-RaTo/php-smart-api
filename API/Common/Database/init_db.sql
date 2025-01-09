-- Developer: Mehdi-RaTo

-- Settings

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Tables

CREATE TABLE `activities` (
    `GuidKey` VARCHAR(150) PRIMARY KEY,
    `Type` VARCHAR(150),
    `Data` LONGTEXT,
    `CreateDate` DATETIME,
    `ChangeDate` DATETIME,
    `ViewState` INT(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
    `ID` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `Email` VARCHAR(300),
    `Password` VARCHAR(150),
    `Token` VARCHAR(150),
    `TokenExpireDate` DATETIME,
    `CreateDate` DATETIME,
    `ChangeDate` DATETIME,
    `ViewState` INT(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Developer: Mehdi-RaTo