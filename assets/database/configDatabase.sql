/* CREATE DATABASE */
CREATE DATABASE IF NOT EXISTS code_igniter_starter;

/* USE DATABASE */
USE code_igniter_starter;

/* CREATE TABLE */
CREATE TABLE IF NOT EXISTS users(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);
