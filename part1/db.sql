DROP DATABASE IF EXISTS part1;

CREATE DATABASE part1;

CREATE TABLE users(id int , name varchar(255), email varchar(255), password varchar(255), PRIMARY KEY (id));
    
CREATE TABLE bookmarks(website varchar(255), user_id int, FOREIGN KEY (user_id) REFERENCES users(id));