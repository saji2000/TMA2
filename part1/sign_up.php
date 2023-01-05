
<html>
	<head>
		<title>Sign-In/Sign-Up</title>
		<link rel="stylesheet" type="text/css" href="../shared/style.css">
		<meta charset="utf-8">
	</head>
	
	<body class = "body">
			<div>	
            <h1><a href="../tma.htm">Bookmarking App</a></h1>

            <form action = "sign_up.php" method= "POST">
                <!--form for inputs for login-->
                    <input type ="text" name = "name" placeholder ="Enter Name" required><br><br>
                    <input type ="email" name = "email" placeholder ="Enter Email" required><br><br>
                    <input type ="text" name = "pass" placeholder ="Enter Password" required><br><br>
                    <button type ="submit">Sign-Up</button>
            </form>

<?php 

    include "db_connection.php";

    $conn = setup_database();

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];

    $id = rand(1, 1000);

    echo " email  now: $email ";

    $query = "SELECT * FROM users WHERE email = '$email';";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        echo '$result';

        echo " This email is already used! ";

    }

    else{
        $query = "INSERT INTO users(id, name, email, password) VALUES($id, '$name', '$email', '$pass');";


        while(mysqli_query($conn, $query)==false){
            $id = rand(1, 1000);

            $query = "INSERT INTO users VALUES($id, $name, $email, $pass);";
        }

        echo " Sign-Up successful ";
    }
    $email = '';
    $pass = '';
    $name = '';
    close_connection($conn);
?> 
<p><strong>Already have an account?</strong></p><a href="sign_in.php">Sign-In</a>
</div>

</html>