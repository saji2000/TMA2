<?php
    session_start();

    require_once('db_connection.php');

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass';";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0){

            echo " Wrong passowrd or email ";

        }
        else{
            while($row = mysqli_fetch_array($result)) {
                echo $row['id']; // Print a single column data
                $_SESSION['id'] = $row['id'];
            }
        }
    }

?>