/**
 * Author:  stalbaum
 * Created: 11.10.2017
 */

DROP DATABASE IF EXISTS `frinder`;
CREATE DATABASE `frinder` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `frinder`;

CREATE TABLE `place`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `gid` TEXT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `badge` VARCHAR(255),
    `lat` VARCHAR(255),
    `lon` VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE `photo` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `place_id` INT NOT NULL, 
    `src` TEXT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (place_id) REFERENCES place(id)
);

CREATE TABLE `type` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE `tour` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT,
    PRIMARY KEY (id)
);

CREATE TABLE `placetour` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `tour_id` INT NOT NULL,
    `place_id` INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (tour_id) REFERENCES tour(id),
    FOREIGN KEY (place_id) REFERENCES place(id)
);

CREATE TABLE `placetype` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `type_id` INT NOT NULL,
    `place_id` INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (place_id) REFERENCES place(id),
    FOREIGN KEY (type_id) REFERENCES type(id)
);

