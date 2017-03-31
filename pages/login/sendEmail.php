<?php
	if( isset($_POST["email"]) )
	{
		// generate tempory key code
		$_SESSION["keyCode"] = rand ( 1000 , 9999 );
		
		// generate email
		$to = $_POST["email"];
		$subject = "Universal Driving School Password Recovery";

		$message = "
			<html>
				<head>
					<title>Universal Driving School Password Recovery</title>
				</head>
				<body>
					<p>Your key code is <b>" + $_SESSION["keyCode"] + "</b></p>
						<br/>
						<br/>
					<p>The key code is temporary and will expire if not used on time.</p>
				</body>
			</html>
		";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <noreply@universaldrivingschool.com>' . "\r\n";

		mail($to,$subject,$message,$headers);
	}
?>