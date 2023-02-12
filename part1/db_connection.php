<?php

session_start();


// creating the db
function create_db(){
    $servername = "localhost";
    $username = "root";
    $password = "1234";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Create database
    $sql = "CREATE DATABASE part2;";

    mysqli_query($conn, $sql);

    return $conn;
}

// connecting to db
function connect_db(){
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "part2";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    return $conn;
}

// creating the tbales
function create_tables($conn){

    $tables = 

        "CREATE TABLE users_b(id int , name varchar(255) NOT NULL, email varchar(255) NOT NULL UNIQUE, password varchar(255), PRIMARY KEY (id));

        CREATE TABLE bookmarks(website varchar(255) NOT NULL, user_id int NOT NULL, FOREIGN KEY (user_id) REFERENCES users_b(id), CONSTRAINT one_website UNIQUE (website, user_id));";
    
    if (mysqli_multi_query($conn, $tables) === TRUE) {
        echo "Tables created successfully";
    } else {
        echo "Error creating tables: " . $conn->error;
    }

}

function populate_tables($conn){


    $query = 
    
    "INSERT INTO users_b(id, name, email, password) VALUES (1, 'sajad', 'sajad@gmail.com', '1234');
    
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
    ";

    mysqli_multi_query($conn, $query);
}

// closing the connection
function close_connection($conn){
    $conn -> close();
}

function setup_database(){
    try{
        $conn = create_db();
    }

    catch(Exception $e){
        $conn = connect_db();
    }

    try {
        create_tables($conn);
    }

    catch(Exception $e){
        $conn = connect_db();
    }

    try {
        populate_tables($conn);
    }

    catch(Exception $e){
    }

    return $conn;
}

?>