<?php
/* This page is used to login a user to the data base */
	
	if(isset($_POST["email"]) && isset($_POST["pwd"]))
	{
			

	$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "universaldb";
        $name = $_POST["email"]; 
        $password = $_POST["pwd"]; 
	   
	    //$name = "admin"; 
        //$password = "admin"; 

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username, userId, userType FROM users WHERE username = '".$name."' AND  password = '".$password."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$row = $result->fetch_assoc();
	
	// GET ALL THE USER INFOS AND STORE THEM IN THE SESSION
    session_start();
    $_SESSION["user_email"] =  $row["userId"];
	$_SESSION["user_type"] =  $row["userType"];
	$_SESSION["username"] =  $row["userType"];
	
echo "success";
	
} else {
    echo "wrong user password combo";
}
$conn->close();
	}
	else
	{
		echo "fail";
	}
?>