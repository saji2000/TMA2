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

        "CREATE TABLE users(id int , name varchar(255) NOT NULL, email varchar(255) NOT NULL UNIQUE, password varchar(255), PRIMARY KEY (id));

        CREATE TABLE courses(course varchar(255) NOT NULL, cid int, PRIMARY KEY (cid));
        
        CREATE TABLE units(unit varchar(255) NOT NULL, uid int, cid int, PRIMARY KEY (uid),FOREIGN KEY (cid) REFERENCES courses(cid));

        CREATE TABLE descriptions(description TEXT NOT NULL, did int, uid int ,cid int, FOREIGN KEY (cid) REFERENCES courses(cid), FOREIGN KEY (uid) REFERENCES units(uid));
        ";
    
    if (mysqli_multi_query($conn, $tables) === TRUE){
        echo "Tables created successfully";
    } else {
        echo "Error creating tables: " . $conn->error;
    }
}

function populate_tables($conn){

    echo "in here dawg";

    $query = 
    
    "INSERT INTO courses(course, cid) VALUES ('<course>HTML tutorial</course>', 1);
    
    INSERT INTO courses(course, cid) VALUES ('<course>CSS tutorial</course>', 2);
    
    INSERT INTO courses(course, cid) VALUES ('<course>JS tutorial</course>', 3);";

    mysqli_multi_query($conn, $query);
}

// closing the connection
function close_connection($conn){
    $conn -> close();
}

// setting up the database
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

    try {
        populate_tables($conn);
    }

    catch(Exception $e){
    }

    return $conn;
}

?>