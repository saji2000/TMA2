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
    <link rel="shortcut icon" type="image/x-icon" href="../shared/E-University.png" />

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
        <div class="websites">
          <h3 class="title">E-University</h3>
          <div>
            Welcome to the E-University, in here you can choose from our offered courses to start learning about 
            web development and programming concepts
          </div>
          <div> 
              <h3>Sign-In: </h3>
                  <a href="sign_in.php">Sign-In</a>
                  <p><strong>Don't have an account?</strong></p><a href="sign_up.php">Sign-Up</a>
          </div>
        </div>
      </div>


    </div>
  </body>
</html>
