CREATE TABLE users(id int , name TEXT NOT NULL, email TEXT NOT NULL UNIQUE, 
password TEXT, PRIMARY KEY (id));

CREATE TABLE courses(course TEXT NOT NULL UNIQUE, cid int, PRIMARY KEY (cid));

CREATE TABLE units(unit TEXT NOT NULL UNIQUE, uid int, cid int,
FOREIGN KEY (cid) REFERENCES courses(cid));

CREATE TABLE descriptions(description TEXT NOT NULL UNIQUE, did int, uid int ,cid int, 
FOREIGN KEY (cid) REFERENCES courses(cid));

CREATE TABLE assignments(description TEXT NOT NULL UNIQUE, did int, uid int ,cid int, 
FOREIGN KEY (cid) REFERENCES courses(cid));

CREATE TABLE quizzes(inquiry TEXT , option_1 TEXT , option_2 TEXT , option_3 TEXT , 
option_4 TEXT , answer TEXT, qid int, cid int, FOREIGN KEY (cid) REFERENCES courses(cid), CONSTRAINT one_question UNIQUE (qid, cid));
