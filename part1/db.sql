DROP DATABASE IF EXISTS part2;

CREATE DATABASE part2;

CREATE TABLE users_b(id int , name varchar(255), email varchar(255), password varchar(255), PRIMARY KEY (id));
    
CREATE TABLE bookmarks(website varchar(255), user_id int, FOREIGN KEY (user_id) REFERENCES users(id));

INSERT INTO users_b(id, name, email, password) VALUES (1, 'sajad', 'sajad@gmail.com', '1234');
    
INSERT INTO bookmarks(website, user_id) VALUES ('https://facebook.com', 1);
INSERT INTO bookmarks(website, user_id) VALUES ('https://instagram.com', 1);
INSERT INTO bookmarks(website, user_id) VALUES ('https://twitter.com', 1);
INSERT INTO bookmarks(website, user_id) VALUES ('https://reddit.com', 1);
INSERT INTO bookmarks(website, user_id) VALUES ('https://google.com', 1);
INSERT INTO bookmarks(website, user_id) VALUES ('https://cnn.com', 1);
INSERT INTO bookmarks(website, user_id) VALUES ('https://apple.com', 1);
INSERT INTO bookmarks(website, user_id) VALUES ('https://cbc.ca', 1);
INSERT INTO bookmarks(website, user_id) VALUES ('https://amazon.com', 1);
INSERT INTO bookmarks(website, user_id) VALUES ('https://alberta.ca', 1);