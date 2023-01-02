<?php 
    include "db_connection.php";

    try{
        $conn = create_db();
        echo "worked praise God";
    }

    catch(Exception $e){
        $conn = connect_db();
        echo "connected to db";
    }

    try {
        create_tables($conn);
        echo "Created the tables";
    }

    catch(Exception $e){
        echo "Tables already exist $e";
    }

    close_connection($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Bookmarks (Part 1)</title>
    <link rel="stylesheet" href="../shared/style.css" />
  </head>
  <body>
   
    <div class="body">
      <div>
        <h1>Menu</h1>
        <nav>
          <ul>
            <li><a href="../tma.htm">Home</a></li>
            <li><a href="../part1/resume.xml">Part 1</a></li>
            <li><a href="part2.html">Part 2</a></li>
            <li><a href="../part3/part3.html">Part 3</a></li>
            <li><a href="../part4/part4.html">Part 4</a></li>
          </ul>
        </nav>
      </div>

      <div class="description">
        <h3 class="title">Most Popular Bookmarks</h3>
        <div class="popular_bookmarks">
            <a href="http://facebook.com">facebook</a>
            <a href="http://facebook.com">facebook</a>
            <a href="http://facebook.com">facebook</a>
        </div>

        <div> 
            <h3>Sign-In: </h3>
                <form action = "sign_in.php" method= "POST">
                <!--form for inputs for login-->
                    <input type ="email" name = "email" placeholder ="Enter Email"><br><br>
                    <input type ="text" name = "pass" placeholder ="Enter Password"><br><br>
                    <button type ="submit">Sign-In</button>
                </form>
                <p><strong>Don't have an account?</strong></p><a href="sign_up.php">Sign-Up</a>
        </div>
      </div>


    </div>
  </body>
</html>
