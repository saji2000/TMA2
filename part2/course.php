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

        <div class="course"> 
            <?php

                $conn = setup_database();

                $course = $_SESSION['course'];

                print("<h4 class = 'center'> Welcome to the $course</h4>");

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

                    print_r("<h4 class = 'center'>$unit</h4>");

                    // fetching the descriptions
                    $query_descripton = "SELECT description FROM descriptions WHERE cid = $cid AND uid = $uid ORDER BY did ASC;";
                    
                    $result_descripton = mysqli_query($conn, $query_descripton);

                    while($row_descripton = mysqli_fetch_array($result_descripton)) {

                        $description = $row_descripton['description'];

                        // dealing with special characters
                        if($description != htmlspecialchars($description, ENT_QUOTES) && $uid == 2 && $cid == 1){
                            $htmlspecial = htmlspecialchars($description, ENT_QUOTES);
                            print_r("<p>$htmlspecial</p>");
                        }
                        else{
                            $description = htmlspecialchars($description, ENT_QUOTES);
                        }
    
                        print_r("<p>$description</p>");

                    }

                    print_r("<h4 class = 'center'>Assignment</h4>");

                    $query_assignment = "SELECT description FROM assignments WHERE cid = $cid AND uid = $uid ORDER BY did ASC;";
                    
                    $result_descripton = mysqli_query($conn, $query_assignment);

                    while($row_descripton = mysqli_fetch_array($result_descripton)) {

                        $description = $row_descripton['description'];

                        $description = htmlspecialchars($description, ENT_QUOTES);
    
                        print_r("<p>$description</p>");

                    }

                }

            ?>
        </div>
        <br>
        <div class = "quiz">
            <?php

                print_r("<h3 class = 'center'>Quiz</h3>");

                $query = "SELECT * FROM quizzes WHERE cid = $cid ORDER BY qid ASC;";

                $result = mysqli_query($conn, $query);

                print_r("<form method='POST' name='quiz'>");

                $q_num = 0;

                while($row = mysqli_fetch_array($result)) {

                    ++$q_num;

                    $question = $row['inquiry'];

                    $qid = $row['qid'];

                    $o1 = htmlspecialchars($row['option_1']);
                    $o2 = htmlspecialchars($row['option_2']);
                    $o3 = htmlspecialchars($row['option_3']);
                    $o4 = htmlspecialchars($row['option_4']);

                    print_r("<p>Q$qid: $question</p>");

                    print_r("<input value='$o1' name='$qid' type='radio'>$o1<br>");
                    print_r("<input value='$o2' name='$qid' type='radio'>$o2<br>");
                    print_r("<input value='$o3' name='$qid' type='radio'>$o3<br>");
                    print_r("<input value='$o4' name='$qid' type='radio'>$o4<br>");

                }

                print_r("<br><button type ='submit' name='finish_quiz'>Finish Quiz</button>");

                print_r("</form><br>");

                // grading the quiz
                if(isset($_POST['finish_quiz'])){

                    $query = "SELECT answer FROM quizzes WHERE cid = $cid ORDER BY qid ASC;";

                    $result = mysqli_query($conn, $query);

                    $grade = 0;
                    
                    $x = 1;

                    while($row = mysqli_fetch_array($result)) {

                        $ans = trim($row['answer']);

                        if(isset($_POST["$x"])){
                            $selected = $_POST["$x"];
                        }
                        else{
                            $selected = null;
                        }

                        if($selected == $ans){
                            $grade++;
                        }
                        $x++;
                    }
                    
                    $grade_percent = ($grade / $q_num) * 100;

                    print_r("<h4>Your grade is $grade out of $q_num, $grade_percent%</h4>");
                    print_r("<script>alert('Your grade is $grade out of $q_num, $grade_percent%')</script>");
                }


                close_connection($conn);

            ?>
        </div>
      </div>


    </div>
  </body>
</html>
