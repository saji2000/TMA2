<?php


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
    $sql = "CREATE DATABASE part1;";

    mysqli_query($conn, $sql);

    return $conn;
}

// connecting to db
function connect_db(){
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "part1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    return $conn;
}

// creating the tbales
function create_tables($conn){

    $tables = 

        "CREATE TABLE users(id int , name varchar(255), email varchar(255) UNIQUE, password varchar(255), PRIMARY KEY (id));

        CREATE TABLE bookmarks(website varchar(255), user_id int, FOREIGN KEY (user_id) REFERENCES users(id));";
    
    if (mysqli_multi_query($conn, $tables) === TRUE) {
        echo "Tables created successfully";
    } else {
        echo "Error creating tables: " . $conn->error;
    }
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
    }

    return $conn;
}

?>