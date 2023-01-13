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
        <h3>Add a new bookmark: </h3>
                <form method= "POST" name="add_bookmark">
                <form>
                    <input type ="text" name = "website" placeholder ="Enter Website" id="url"><br><br>
                    <button type ="submit" id="submit" name="button_submit" disabled>Add</button>
                    <input type="button" id="button_add" value = "validate"/>
                </form>

                <?php
                    if (isset($_POST['button_submit'])){
                        $conn = setup_database();

                        $id = $_SESSION['id'];

                        $website = $_POST['website'];

                        $query = "INSERT INTO bookmarks VALUES('$website', $id)";

                        try{
                            mysqli_query($conn, $query);
                            // echo '<script>alert("Website added")</script>';
                        }
                        catch (Exception $e) {
                            echo '<script>alert("Website already exist")</script>';
                        }

                        close_connection($conn);

                    }
                ?>
        </div>

        <?php 


            $conn = setup_database();

            $id = $_SESSION['id'];
            $query = "SELECT website FROM bookmarks WHERE user_id = $id;";

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
                    $website_link = ltrim($website,'https://');
                    $website_link = ltrim($website,'http://');
                    $website_link = str_replace('/', '', $website_link);
                    $website_link = str_replace(':', '', $website_link);

                    print("<a href = '$website' target='_blank'>$website_link</a>"); // Print a single column data   
                }
            }
            // }

            close_connection($conn);

        ?>
        </div>
        <div id="results"></div>

        <div> 
            <h3>Delete a bookmark: </h3>
                <form method= "POST" name="add_bookmark">
                <form>
                    <input type ="text" name = "website" placeholder ="Enter Website" id="url"><br><br>
                    <button type ="submit" id="submit" name="button_delete">Delete</button>
                </form>

                <?php
                    if (isset($_POST['button_delete'])){
                        $conn = setup_database();

                        $id = $_SESSION['id'];

                        $website = $_POST['website'];

                        $query = "DELETE FROM bookmarks WHERE user_id = $id AND website = '$website';";

                        $result = mysqli_query($conn, $query);

                        echo "right here";

                        try{
                            mysqli_query($conn, $query);
                            echo "Record Deleted successfully";
                        }
                        catch (Exception $e) {
                            echo "Error: " . $e->getMessage();
                            echo '<script>alert("Website does not exist")</script>';
                        }

                        close_connection($conn);

                    }
                ?>
        </div>
        <div> 
            <h3>Edit a bookmark: </h3>
                <form method= "POST" name="edit_bookmark">
                <form>
                    <input type ="text" name = "old_website" placeholder ="Enter the Old Website" id="old_url"><br><br>
                    <input type ="text" name = "new_website" placeholder ="Enter the New Website" id="new_url"><br><br>
                    <button type ="submit" id="submit" name="button_delete">Delete</button>
                    <input type="button" id="button_edit" value = "validate"/>

                </form>

     
        </div>
      </div>


    </div>
    <script src="url_valid.js"></script>
  </body>
</html>
