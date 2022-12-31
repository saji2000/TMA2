<?php 

include "db_connection.php";

try{
    $conn = create_db();
    echo "worked praise God";
    close_connection($conn);

}

catch(Exception $e){
    echo "db already created and $e";
}


?>