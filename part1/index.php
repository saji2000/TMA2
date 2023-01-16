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
        <?php 

          $conn = setup_database();

          $id = $_SESSION['id'];
          $query = "SELECT website, COUNT(website) AS count FROM bookmarks GROUP BY website ORDER BY count DESC LIMIT 10;";

          try{
              $result = mysqli_query($conn, $query);
          }
          catch(Exception $e) {
              echo "error: $e";
          }

          if(mysqli_num_rows($result) == 0){

              echo " No bookmarks yet ";

          }
          else{
              while($row = mysqli_fetch_array($result)) {
                  $website = $row['website'];
                  $count = $row['count'];

                  $website_link = ltrim($website,'https://');
                  $website_link = ltrim($website_link,'http://');
                  $website_link = str_replace('/', '', $website_link);
                  $website_link = str_replace(':', '', $website_link);

                  print("<a href = '$website' target='_blank'>$website_link</a> &nbsp;"); // Print a single column data
                  print("<p> $count</p>");
              }
          }
          // }

          close_connection($conn);

        ?>
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
