CREATE DATABASE IF NOT EXISTS bioskop
CHARACTER SET = utf8 COLLATE = utf8_general_ci;
USE bioskop;

-- tabela users
CREATE TABLE IF NOT EXISTS users (
  id int unsigned NOT NULL AUTO_INCREMENT,
  username varchar(60) COLLATE utf8_general_ci NOT NULL,
  email varchar(80) COLLATE utf8_general_ci NOT NULL,
  password varchar(64) COLLATE utf8_general_ci NOT NULL,
  role enum('user', 'bloger', 'admin') NOT NULL DEFAULT 'user',
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB
DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT = 1;

-- tabela films
CREATE TABLE IF NOT EXISTS films (
  id int unsigned NOT NULL AUTO_INCREMENT,
  film_name varchar(60) COLLATE utf8_general_ci NOT NULL,
  year int unsigned NOT NULL,
  runtime varchar(10) COLLATE utf8_general_ci NOT NULL,
  genre varchar(40) COLLATE utf8_general_ci NOT NULL,
  director varchar(40) COLLATE utf8_general_ci NOT NULL,
  actors varchar(80) COLLATE utf8_general_ci NOT NULL,
  plot text COLLATE utf8_general_ci NULL,
  language varchar(40) COLLATE utf8_general_ci NOT NULL,
  poster varchar(200) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB
DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT = 1;

-- tabela showings
CREATE TABLE IF NOT EXISTS showings (
  id int unsigned NOT NULL AUTO_INCREMENT,
  film_id int unsigned NOT NULL,
  time DATETIME NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (film_id) REFERENCES films(id)
) ENGINE = InnoDB
DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT = 1;

-- tabela news
CREATE TABLE IF NOT EXISTS news (
  id int unsigned NOT NULL AUTO_INCREMENT,
  title varchar(60) COLLATE utf8_general_ci NOT NULL,
  body text COLLATE utf8_general_ci NULL,
  img varchar(80) COLLATE utf8_general_ci NOT NULL,
  category_id int unsigned NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB
DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT = 1;
