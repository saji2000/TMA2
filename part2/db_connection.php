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

    // create_tables($conn);

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

        "CREATE TABLE users(id int , name varchar(255) NOT NULL, email varchar(255) NOT NULL UNIQUE, 
        password varchar(255), PRIMARY KEY (id));

        CREATE TABLE courses(course varchar(255) NOT NULL UNIQUE, cid int, PRIMARY KEY (cid));
        
        CREATE TABLE units(unit varchar(255) NOT NULL UNIQUE, uid int, cid int,
        FOREIGN KEY (cid) REFERENCES courses(cid));

        CREATE TABLE descriptions(description TEXT NOT NULL UNIQUE, did int, uid int ,cid int, 
        FOREIGN KEY (cid) REFERENCES courses(cid));

        CREATE TABLE assignments(description TEXT NOT NULL UNIQUE, did int, uid int ,cid int, 
        FOREIGN KEY (cid) REFERENCES courses(cid));

        CREATE TABLE quizzes(inquiry varchar (255), option_1 varchar (255), option_2 varchar (255), option_3 varchar (255), 
        option_4 varchar (255), answer int, qid int, cid int, FOREIGN KEY (cid) REFERENCES courses(cid));
        ";
    
    if (mysqli_multi_query($conn, $tables) === TRUE){

    } else {
        echo "Error creating tables: " . $conn->error;
    }

    populate_tables($conn);
}


// our xml parser in php which populates the tables that were created
function populate_tables($conn){

    $xml=simplexml_load_file("courses.xml") or die("Error: Cannot create object");

    // primary key and the order are decided by cid
    $cid = 0;    
    foreach($xml->children() as $course){

        // populating the tables with courses
        $uid = 0;
        ++$cid;
        $title = $course->title;
        $query = "INSERT INTO courses(course, cid) VALUES ('$title', $cid);";
        mysqli_multi_query($conn, $query);

        foreach($course->units->children() as $unit){

            // populating the tables with units
        
            $did = 0;
            ++$uid;
            $unit_title = $unit->title;
            $query = "INSERT INTO units(unit, uid, cid) VALUES ('$unit_title', $uid, $cid);";
            mysqli_multi_query($conn, $query);

            // populating the tables with descriptions
            foreach($unit->lesson->children() as $description){
                ++$did;
                $query = "INSERT INTO descriptions(description, did, uid, cid) VALUES ('$description',$did, $uid, $cid);";
                mysqli_multi_query($conn, $query);
            }
            $did = 0;
            // populating the tables with assignment descriptions
            foreach($unit->assignment->children() as $description){
                ++$did;
                $query = "INSERT INTO assignments(description, did, uid, cid) VALUES ('$description',$did, $uid, $cid);";
                mysqli_multi_query($conn, $query);
            }
        }

        // parsing the quizzes
        $qid = 0;
        foreach($course->quiz->children() as $question){

            ++$qid;

            $inquiry = $question->inquiry;

            $array = [];

            foreach($question->option as $option){
                array_push($array, $option);
            }

            $option_1 = $array[0];
            $option_2 = $array[1];
            $option_3 = $array[2];
            $option_4 = $array[3];
            $answer = $question->answer;

            $query = "INSERT INTO quizzes(inquiry, option_1, option_2, option_3, option_4, answer, qid, cid) 
            VALUES ('$inquiry', '$option_1', '$option_2', '$option_3', '$option_4', $answer , $qid, $cid);";

            mysqli_multi_query($conn, $query);
        }
    }
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