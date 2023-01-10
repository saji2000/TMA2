<?php
    session_start();

    require_once('db_connection.php');

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
            <li><a href="index.php">Part 1</a></li>
            <li><a href="part2/part2.html">Part 2</a></li>
            <li><a href="part3/part3.html">Part 3</a></li>
            <li><a href="part4/part4.html">Part 4</a></li>
          </ul>
        </nav>
      </div>

      <div class="description">
        <h3 class="title">Most Popular Bookmarks</h3>
        <div class="bookmarks" id="bookmarks">

        <?php 


            $conn = setup_database();

            // phpinfo();

            $id = $_SESSION['id'];

            // print_r($_SESSION);

            $query = "SELECT website FROM bookmarks WHERE user_id = $id;";

            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) == 0){

                echo " No bookmarks yet ";
    
            }
            else{
                while($row = mysqli_fetch_array($result)) {
                    echo $row['website']; // Print a single column data
                    // echo print_r($row);      
                }
            }

            close_connection($conn);

        ?>
        </div>
        <div id="results"></div>

        <div> 
            <h3>Add a new bookmark: </h3>
                <form method= "POST" name="add_bookmark">
                <form>

                <!--form for inputs for login-->
                    <input type ="text" name = "website" placeholder ="Enter Website" id="url"><br><br>
                    <button type ="submit" id="submit" name="button_submit">Enter</button>
                    <!-- <input type="button" id="button" value = "Enter js"/> -->
                </form>

                <?php
                    if (isset($_POST['button_submit'])){
                        echo "ok";
                    }
                    else{
                        echo "not set";
                    }
                ?>
        </div>
      </div>


    </div>
    <script src="url_valid.js"></script>
  </body>
</html>
