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

            $id = $_SESSION['id'];
            echo "here is the id: $id ";
            $query = "SELECT website FROM bookmarks WHERE user_id = $id;";

            try{
                $result = mysqli_query($conn, $query);
            }
            catch(Exception $e) {
                echo "error: $e";
            }

            echo "here";

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
                    <input type ="text" name = "website" placeholder ="Enter Website" id="url"><br><br>
                    <button type ="submit" id="submit" name="button_submit" disabled>Add</button>
                    <input type="button" id="button" value = "validate"/>
                </form>

                <?php
                    if (isset($_POST['button_submit'])){
                        $conn = setup_database();

                        $id = $_SESSION['id'];

                        $website = $_POST['website'];

                        $query = "INSERT INTO bookmarks VALUES('$website', $id)";

                        $result = mysqli_query($conn, $query);

                        if(mysqli_query($conn, $query)){

                            echo "Record added successfully";
                
                        }
                        else{
                            echo "Error";
                        }

                        close_connection($conn);

                    }
                ?>
        </div>
      </div>


    </div>
    <script src="url_valid.js"></script>
  </body>
</html>
