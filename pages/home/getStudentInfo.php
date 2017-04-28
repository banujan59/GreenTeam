<?php
	if( isset($_POST["operation"]) && isset($_POST["studentID"]))
	{
		if($_POST["operation"] == "get")
		{
		$servername = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "universaldb";
		
		$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
		if($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "SELECT * FROM STUDENTS WHERE STUDENTID=" . $_POST["studentID"];
		$result = $conn->query($sql);
		
		if($result->num_rows > 0)
		{
			$json = array();
			while($row = $result->fetch_assoc())
			{
				$students = array(
						'studentId' => $row['studentId'],
						'firstName' => $row['firstName'],
						'lastName' => $row['lastName'],
						'phoneNumber' => $row['phoneNumber'],
						'emergencyPhoneNumber' => $row['emergencyPhoneNumber'],
						'email' => $row['email'],
						'address' => $row['address'],
						'birthdate' => $row['birthdate'],
						'balance' => $row['balance'],
						'balanceDueDate' => $row['balanceDueDate'],
						'courseID' => $row['courseID'],
						'language' => $row['language']
				);
				array_push($json, $students);
			}
			
			$jsonstring = json_encode($json);
			echo $jsonstring;
		}
		}
		
		else if($_POST["operation"] == "update")
		{
			
		}
	}
?>