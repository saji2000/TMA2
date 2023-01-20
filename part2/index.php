<?php 

    session_start();

    require_once('db_connection.php');

    $conn = setup_database();

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

        </div>

        <div> 
            <h3>Sign-In: </h3>
                <a href="sign_in.php">Sign-In</a>
                <p><strong>Don't have an account?</strong></p><a href="sign_up.php">Sign-Up</a>
        </div>
      </div>


    </div>
  </body>
</html>
