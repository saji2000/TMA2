<?php 

    include "db_connection.php";

    $conn = setup_database();

    // try{
    //     $conn = create_db();
    //     echo "worked praise God";
    // }

    // catch(Exception $e){
    //     $conn = connect_db();
    //     echo "connected to db";
    // }

    // try {
    //     create_tables($conn);
    //     echo "Created the tables";
    // }

    // catch(Exception $e){
    //     echo "Tables already exist $e";
    // }

    close_connection($conn);

?>