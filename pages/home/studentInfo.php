<?php
session_start();
	if( isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin" && isset($_POST["operation"]) )
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
		
		if($_POST["operation"] == "select")
		{
		
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
		
		else if($_POST["operation"] == "selectALL")
		{
			$sql = "SELECT * FROM STUDENTS";
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
		
		else if($_POST["operation"] == "insert")
		{
			$sql = "SELECT MAX(studentId) + 1 FROM students";
			$result = $conn->query($sql);
			$studentID = $result->fetch_assoc();
			
			$sql = "INSERT INTO students ("
			. "studentId,"
			. "firstName,"
			. "lastName,"
			. "phoneNumber,"
			. "emergencyPhoneNumber,"
			. "email,"
			. "address,"
			. "birthdate,"
			. "balance,"
			. "balanceDueDate,"
			. "courseID,"
			. "language"
			. ") VALUES ("
			. $studentID["MAX(studentId) + 1"] . ","
			. "\"" . $_POST["firstName"] . "\","
			. "\"" . $_POST["lastName"] . "\","
			. "\"" . $_POST["phoneNumber"] . "\","
			. "\"" . $_POST["emergencyPhoneNumber"] . "\","
			. "\"" . $_POST["email"] . "\","
			. "\"" . $_POST["address"] . "\","
			. "\"" . $_POST["birthdate"] . "\","
			. $_POST["balance"] . ","
			. "\"" . $_POST["balanceDueDate"] . "\","
			. $_POST["courseID"] . ","
			. "\"" . $_POST["language"] . "\""
			. ")";

			if ($conn->query($sql) === TRUE) {
				echo "success";
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

		}
		
		else if($_POST["operation"] == "update")
		{
			$sql = "UPDATE students "
				. "SET firstName=\"" . $_POST["firstName"] . "\""
				. ",lastName=\"" . $_POST["lastName"] . "\""
				. ",phoneNumber=\"" . $_POST["phoneNumber"] . "\""
				. ",emergencyPhoneNumber=\"" . $_POST["emergencyPhoneNumber"] . "\""
				. ",email=\"" . $_POST["email"] . "\""
				. ",address=\"" . $_POST["address"] . "\""
				. ",birthdate=\"" . $_POST["birthdate"] . "\""
				. ",balance=" . $_POST["balance"]
				. ",balanceDueDate=\"" . $_POST["balanceDueDate"] . "\""
				. ",courseID=" . $_POST["courseID"]
				. ",language=\"" . $_POST["language"] . "\""
				. "WHERE studentId=" . $_POST["studentID"];

			if ($conn->query($sql) === TRUE) {
				echo "success";
			} else {
			echo "fail: " . $conn->error;
			}
		}
		
		else if($_POST["operation"] == "delete")
		{
			$sql = "DELETE FROM students "
				."WHERE studentId=" . $_POST["studentID"];

			if ($conn->query($sql) === TRUE) {
				echo "success";
			} else {
			echo "fail: " . $conn->error;
			}
		}
		
		$conn->close();
	}
	
?>