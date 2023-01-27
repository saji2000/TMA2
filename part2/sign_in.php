<?php
    session_start();
    require_once('db_connection.php');

?>
<html>
	<head>
		<title>Sign-In/Sign-Up</title>
		<link rel="stylesheet" type="text/css" href="../shared/style.css">
		<meta charset="utf-8">
	</head>
	
	<body>
        <div class = "body">
            <h1>Menu</h1>
            <nav>
                <ul>
                    <li><a href="../tma.htm">Home</a></li>
                    <li><a href="../part1/index.php">Part 1</a></li>
                    <li><a href="../part2/index.php">Part 2</a></li>
                </ul>
            </nav>
			<div>	
            <h3>E-University</h3>

            <form action = "sign_in.php" method= "POST">
                <!--form for inputs for login-->
                <input type ="email" name = "email" placeholder ="Enter Email" required><br><br>
                <input type ="text" name = "pass" placeholder ="Enter Password" required><br><br>
                <button type ="submit" name="submit">Sign-In</button>
            </form>

<?php 


    $conn = setup_database();

    $xml=simplexml_load_file("courses.xml") or die("Error: Cannot create object");
    print_r($xml);

    if(isset($_POST['submit'])){
        
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass';";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0){

            echo '<script>alert("Wrong password or email address")</script>';

        }

        else{
            while($row = mysqli_fetch_array($result)) {
                $_SESSION['id'] = $row['id'];
            }

            header("Location:home.php");
            exit();
        }
    }

    close_connection($conn);
?>

<p><strong>Don't have an account?</strong></p><a href="sign_up.php">Sign-Up</a>
</div>

</html>