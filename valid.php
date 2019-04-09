<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "gmail";
		// Create connection
    $conn=new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $user = mysqli_real_escape_string($conn,$_POST['email']); 
    echo $user;	
    $res ="SELECT * FROM user_mail where mail='$user' ; ";
	$result = $conn->query($res);
    if ($result->num_rows !=0) {
header("Location: index2.php");
	}
?>