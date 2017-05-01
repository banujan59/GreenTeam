<?php 
if( isset($_POST["operation"]) )
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
		
		if($_POST["operation"] == "selectALL")
		{
		
		$sql = "SELECT * FROM COURSE";
		$result = $conn->query($sql);
		
		if($result->num_rows > 0)
		{
			$json = array();
			while($row = $result->fetch_assoc())
			{
				$course = array(
						'courseId' => $row['courseId'],
						'type' => $row['type'],
						'language' => $row['language'],
						'scheduleId' => $row['scheduleId'],
						'maxStudents' => $row['maxStudents']
				);
				array_push($json, $course);
			}
			
			$jsonstring = json_encode($json);
			echo $jsonstring;
		}
		}
	}
?>