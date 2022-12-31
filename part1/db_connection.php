<?php

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
    $sql = "CREATE DATABASE users;";
    if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
    } else {
    echo "Error creating database: " . $conn->error;
    }
    return $conn;
}

function close_connection($conn){
    $conn -> close();
}


function open_connection(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "1234";
    $db = "users";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
}

?>