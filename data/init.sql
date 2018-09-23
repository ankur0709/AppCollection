CREATE DATABASE test;

use app_collection;

CREATE TABLE apps (
	name VARCHAR(50) NOT NULL,
	email VARCHAR(50),
	username VARCHAR(30),
	mobile INT(10),
	password VARCHAR(50)
);