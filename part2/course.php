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

        <div class = 'center'> 
            <?php

                $conn = setup_database();

                $course = $_SESSION['course'];

                print("<h4> Welcome to the $course</h4>");

                $course = trim($course);

                // fetching the course id
                $query = "SELECT cid FROM courses WHERE course LIKE '%$course%';";

                $result = mysqli_query($conn, $query);

                $row = mysqli_fetch_array($result);

                $cid = $row['cid'];

                // fetching the units
                $query = "SELECT unit, uid FROM units WHERE cid = $cid ORDER BY uid ASC;";

                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)) {

                    $unit = $row['unit'];

                    $uid = $row['uid'];

                    print_r("<h4>$unit</h4>");

                    // fetching the descriptions

                    $query_descripton = "SELECT description FROM descriptions WHERE cid = $cid AND uid = $uid ORDER BY did ASC;";
                    
                    $result_descripton = mysqli_query($conn, $query_descripton);

                    while($row_descripton = mysqli_fetch_array($result_descripton)) {

                        $description = $row_descripton['description'];
    
                        print_r("<p>$description</p>");

                    }
                }

            ?>
        </div>
      </div>


    </div>
  </body>
</html>
