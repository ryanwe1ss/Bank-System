CREATE DATABASE `db_bank`;

CREATE TABLE IF NOT EXISTS `db_bank`.tb_users(
  `id` int DEFAULT NULL,
  `email` text,
  `username` text,
  `password` text,
  `age` int DEFAULT NULL,
  `balance` double DEFAULT NULL
)