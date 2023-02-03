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
    <title>E-University</title>
    <link rel="stylesheet" href="../shared/style.css" />
  </head>
  <body>
   
    <div class="body">
      <div>
        <h1>Menu</h1>
        <nav>
          <ul>
            <li><a href="../tma.htm">Home</a></li>
            <li><a href="../part1/index.php">Part 1</a></li>
            <li><a href="../part2/index.php">Part 2</a></li>
          </ul>
        </nav>
      </div>

      <div class="description">
        <h3 class="title">E-University</h3>
        <a href="home.php">Back</a>

        <div> 
            <?php

                $conn = setup_database();

                $course = $_SESSION['course'];

                print("<h4> Welcome to the $course</h4>");

                $query = "SELECT course FROM courses WHERE cid = 1;";

                $result = mysqli_query($conn, $query);

                echo mysqli_num_rows($result);

                $row = mysqli_fetch_row($result);

                $cid = $row['cid'];
                // echo "here";
                print_r("$cid");
            ?>
        </div>
      </div>


    </div>
  </body>
</html>
