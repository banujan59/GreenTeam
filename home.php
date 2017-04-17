<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8"/>
        
        <link rel="stylesheet" href="css/home.css"/>
        <link rel="stylesheet" href="css/keyframes.css"/>
        <link rel="stylesheet" href="Libraries/bootstrap.min.css"/>
	</head>
	
    <script src="Libraries/jQuery.js"></script>
    <script src="js/home.js"></script>
    
	<body>
    <?php
		// check if user is logged in
		if( !isset($_SESSION["user_email"]))
		{
			?>
            	<script>
					location = "index.php";
				</script>
            <?php
		}
	?>
	    <nav>
    	    <ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="home.php?page=personal_file">Personal File</a></li>
			    <li><a href="home.php?page=schedule">Schedule</a></li>
			    <li><a href="home.php?page=appointments">Appointments</a></li>
			    <?php
					if( $_SESSION["user_type"] == "student")
					{
						?>
				            <li><a href="home.php?page=progression">Progression</a></li>
			            <?php
					}
				?>
			    <li><a class="logoutLink">Logout</a></li>
			</ul>
	    </nav>
        	<br/><br/>

			<div class="container">

            <?php 
				if(!isset($_GET["page"]))
				{
					?>
                    	<script>
							$(".container").load("pages/home/getHomepage.php");
						</script>
                    <?php
				}
				
				else if($_GET["page"] == "personal_file")
				{
					
				}
				
				else if($_GET["page"] == "schedule")
				{
					?>
                    	<p>
                        	You loaded the schedule.
                        </p>
                    <?php
				}
				
				else if($_GET["page"] == "appointments")
				{
					?>
                    	<script>
							$(".container").load("pages/home/getAppointments.php");
						</script>
                    <?php
				}
				
				else if($_GET["page"] == "progression")
				{
					
				}
				
				else
				{
					?>
                    	<script>
							location = "home.php";
						</script>
                    <?php
				}
			?>
            
            </div> <!-- End container -->
	</body>
</html>