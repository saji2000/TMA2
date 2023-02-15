<?php
    session_start();

    require_once('db_connection.php');

?>
<html>
	<head>
		<title>Beyond-Bookmarks</title>
		<link rel="stylesheet" type="text/css" href="../shared/style.css">
		<meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="../shared/logo.png" />
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
            <h3>Bookmarking App</h3>

            <form action = "sign_up.php" method= "POST">
                    <!--form for inputs for login-->
                    <input type ="text" name = "name" placeholder ="Enter Name" required><br><br>
                    <input type ="email" name = "email" placeholder ="Enter Email" required><br><br>
                    <input type ="text" name = "pass" placeholder ="Enter Password" required><br><br>
                    <button type ="submit" name="submit">Sign-Up</button>
            </form>

<?php 



    $conn = setup_database();

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $name = $_POST['name'];

        $id = rand(1, 10000);

        $query = "SELECT * FROM users_b WHERE email = '$email';";

        $result = mysqli_query($conn, $query);

        // checking if the email already exists
        if(mysqli_num_rows($result) > 0){

            echo '<script>alert("user already exist")</script>';

        }

        // create the account
        else{
            $query = "INSERT INTO users_b(id, name, email, password) VALUES($id, '$name', '$email', '$pass');";

            // if id has already been used
            while(mysqli_query($conn, $query)==false){
                $id = rand(1, 10000);

                $query = "INSERT INTO users_b VALUES($id, '$name', '$email', '$pass');";
            }

            // taking the user to the home page
            $_SESSION['id'] = $id;
            header("Location:home.php");
            exit();
        }
    }
    
    close_connection($conn);
?>

<p><strong>Already have an account?</strong></p><a href="sign_in.php">Sign-In</a>
</div>

</html>