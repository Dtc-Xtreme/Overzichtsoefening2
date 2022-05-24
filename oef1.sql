DROP DATABASE IF EXISTS examenwa2019;

CREATE DATABASE examenwa2019;

USE examenwa2019;

CREATE TABLE sender
(
   id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name varchar(30) NOT NULL
);

CREATE TABLE message
(
   id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   sender_id int NOT NULL,
   contents varchar(100) NOT NULL,
   FOREIGN KEY (sender_id) REFERENCES sender(id)
);


INSERT INTO `sender` (`id`, `name`) VALUES
(1, 'tim'),
(2, 'sofie'),
(3, 'nele');


INSERT INTO `message` (`id`, `sender_id`, `contents`) VALUES
(1, 1, 'ok'),
(2, 1, ':-)'),
(3, 2, 'nope'),
(4, 1, 'ok');

