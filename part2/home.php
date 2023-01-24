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

        <div> 
            <h3>Please select a course to start: </h3>

            <label for="color">Background Color:</label>
<select name="color" id="color">
	<option value="">--- Choose a color ---</option>
	<option value="red">Red</option>
	<option value="green">Green</option>
	<option value="blue">Blue</option>
</select>

            <?php 


                $conn = setup_database();

                $id = $_SESSION['id'];
                $query = "SELECT course FROM courses;";

                try{
                    $result = mysqli_query($conn, $query);
                }
                catch(Exception $e) {
                    echo "error: $e";
                }

                if(mysqli_num_rows($result) == 0){

                    echo " No courses yet ";
        
                }
                else{
                    while($row = mysqli_fetch_array($result)) {
                        $course = $row['course'];


                        print("<a>$course</a> &nbsp;"); // Print a single column data   
                    }
                }
                // }

                close_connection($conn);

            ?>
        </div>
      </div>


    </div>
  </body>
</html>
