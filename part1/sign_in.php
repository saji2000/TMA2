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
            <h3>Bookmarking App</h3>

            <form action = "sign_in.php" method= "POST">
                <!--form for inputs for login-->
                <input type ="email" name = "email" placeholder ="Enter Email" required><br><br>
                <input type ="text" name = "pass" placeholder ="Enter Password" required><br><br>
                <button type ="submit" name="submit">Sign-In</button>
            </form>

<?php 


    $conn = setup_database();

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
                echo $row['id']; // Print a single column data
                $_SESSION['id'] = $row['id'];
            }

            header("Location:home.php");
            exit();
        }
    }
    

    

    // else{
    //     $query = "INSERT INTO users(id, name, email, password) VALUES($id, '$name', '$email', '$pass');";


    //     while(mysqli_query($conn, $query)==false){
    //         $id = rand(1, 1000);

    //         $query = "INSERT INTO users VALUES($id, $name, $email, $pass);";
    //     }

    //     echo " Sign-Up successful ";
    // }
    // $email = '';
    // $pass = '';
    // $name = '';



    close_connection($conn);
?>

<p><strong>Don't have an account?</strong></p><a href="sign_up.php">Sign-Up</a>
</div>

</html>