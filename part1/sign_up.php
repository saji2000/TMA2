
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
                    <input type ="text" name = "name" placeholder ="Enter Name"><br><br>
                    <input type ="email" name = "email" placeholder ="Enter Email"><br><br>
                    <input type ="text" name = "pass" placeholder ="Enter Password"><br><br>
                    <button type ="submit">Sign-Up</button>
                </form>

<?php 

    include "db_connection.php";

    $conn = setup_database();

    close_connection($conn);


    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];

    echo "$email and $pass";

    $query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass';";

    if(!($result=mysqli_query($conn,$database))){
        die("<p> Could not execute query </p>");
    }
    echo "here";
    
    close_connection($conn);
?> 
</div>

</html>