<?php
session_start();	
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "universaldb";
	if( isset($_SESSION["user_type"]) )
	{
			?>
            <div class="row" style="height:37.37166324435318%;">
            <div class="col-md-5">
            
            <image class="homeBanner" src="images/home.jpg"/>
            
			<?php
			
			if($_SESSION["user_type"] == "student")
			{
				?>
			<?php
			$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$studentid = $_SESSION["user_studentid"];
			$sql = "SELECT balance, type, day, dayStart,dayEnd FROM students INNER JOIN course ON course.courseId=students.courseId INNER JOIN schedule ON schedule.scheduleId=course.scheduleId where students.studentId ='".$studentid."'";
		    $result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				$row = $result->fetch_assoc();
				
				$_SESSION["user_balance"] =  $row["balance"];
				$_SESSION["user_coursetype"] =  $row["type"];
				$_SESSION["user_courseday"] =  $row["day"];
				$_SESSION["user_coursedaystart"] =  $row["dayStart"];
				$_SESSION["user_coursedayend"] =  $row["dayEnd"];
				
			}
			$conn->close();
			?>
				<section class="notifications">
            	<div class="sectionHeader">
					<h2>Notifications</h2>
                </div>
                <div class="sectionContent">
                	<h4>Payment Status</h4>
                	<p>
                    	Account balance: <b><span class="accountBalanceValue"><?php echo $_SESSION["user_balance"];?></span></b>.
                       	<br/>
                        Come to driving school to pay.
                    </p>
                    	<hr/>
                     <h4>Messages</h4>
                	<p>
                    	You have <b>1</b> new message. <a>Click here to view messages</a>
                    </p>
                </div>	
            </section>
				<?php
			}
			
			else if($_SESSION["user_type"] == "admin")
			{
				?>
					<section class="notifications">
            	<div class="sectionHeader">
					<h2>My Tools</h2>
                </div>
                <div class="sectionContent">
					<br/>
                	<form>
					<div class="row" style="height:37.37166324435318%;">
						<div class="col-md-2">
							<label>Events: </label>
						</div> <!-- End col -->
						
						<div class="col-md-5">
							<select id="eventDropdown">
								<option>Choose action</option>
								<option>Add a new event</option>
								<option>Edit an existant event</option>
								<option>Update schedule</option>
								<option>Add new lesson</option>
							</select>
						</div> <!-- End col -->
						<div class="col-md-5">
							<div id="performEventButton" class="button toolButtons">Perform</div>
						</div> <!-- End col -->
					</div> <!-- End row -->
					
					<br/>
					
					<div class="row" style="height:37.37166324435318%;">
						<div class="col-md-2">
							<label>Students: </label>
						</div> <!-- End col -->
						<div class="col-md-5">
						<select id="studentDropdown">
							<option>Choose action</option>
							<option>Add new student</option>
							<option>Edit student</option>
							<option>Delete student</option>
							<option>Display student</option>
							<option>Print Summary</option>
						</select>
						</div> <!-- End col -->
						<div class="col-md-5">
							<div id="performStudentButton" class="button toolButtons">Perform</div>
						</div> <!-- End col -->
					</div> <!-- End row -->
					
					<br/>
					
					<div class="row" style="height:37.37166324435318%;">
						<div class="col-md-2">
							<label>Schedule: </label>
						</div> <!-- End col -->
						<div class="col-md-5">
							<select id="scheduleDropdown">
								<option>Choose action</option>
							</select>
						</div> <!-- End col -->	
						<div class="col-md-5">
							<div id="performScheduleButton" class="button toolButtons">Perform</div>
						</div> <!-- End col -->
					</div> <!-- End row -->
					
					<br/>
					</form>
					<br/>
                </div>
            </section>
			
			<script>
				$(".button").click(buttonClicked);
			</script>
				<?php
			}
            
			
			?>
            
            </div>
            
            <div class="col-md-2"></div>
            
            <div class="col-md-5">
            
            <section class="latestNews"> 
            	<div class="sectionHeader">
					<h2>Latest News</h2>
                </div>
                
                <div class="news">
	                <p>
                    	<b>Monday, April 17<sup>th</sup>, 2017</b>
                        	<br/>
                         Easter Holiday - School will be closed
                    </p>
                    	<hr/>
					<p>
                    	<b>Friday, April 14<sup>th</sup>, 2017</b>
                        	<br/>
                         Good Friday - School will be closed
                    </p>
	                    <hr/>
                    <p>
                    	<b>Thursday, April 13<sup>th</sup>, 2017</b>
                        	<br/>
                         You have 1 new message from your teacher.
						 <!--Remember, the '1' in the above line must be a changeable int value.-->
                    </p>
                    	<hr/>
                    <p>
                    	<b>Date</b>
                        	<br/>
                         News Name
                    </p>
                    	<hr/>
                    <p>
                    	<b>Date</b>
                        	<br/>
                         News Name
                    </p>
                    	<hr/>
                    <p>
                    	<b>Date</b>
                        	<br/>
                         News Name
                    </p>
                    	<hr/>
                    <p>
                    	<b>Date</b>
                        	<br/>
                         News Name
                    </p>
                    	<hr/>
                    <p>
                    	<b>Date</b>
                        	<br/>
                         News Name
                    </p>
                </div>
            </section>
            
            </div>
            </div><!-- end row -->
            
            <div class="row">
            <div class="col-md-12">
            
            <section style="margin-top:5%;" class="scheduleViewer">
			<?php
			if($_SESSION["user_type"] == "student"){ 
			?>
            	<div class="sectionHeader">
					<h2>What's on your schedule?</h2>
                </div>
                <div class="blockContainer">
                	<div id="blockInnerContainerList" class="blockInnerContainer">
    	            	<!-- Show the 7 latest events only -->
						<script>
						var script1 = "";
						var day = "<?php echo $_SESSION["user_courseday"]?>";
						var coursetype = "<?php echo $_SESSION["user_coursetype"]?>";
						var coursestart = "<?php 
						$dt = DateTime::createFromFormat("Y-m-d H:i:s", $_SESSION["user_coursedaystart"]);
                        $hours = $dt->format('H:i');
						echo $hours?>";
						var courseend = "<?php
						$dt = DateTime::createFromFormat("Y-m-d H:i:s", $_SESSION["user_coursedayend"]);
                        $hours = $dt->format('H:i');
						echo $hours?>";
						var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday","Sunday"];
						for(i = 0; i < days.length; i++){
							
						if(days[i] == day ) {
								 script1 +="<div class='block'><div class='blockHeader'><h3>"+days[i]+"</h3></div><div class='blockContent'><p><b>"+coursetype+" Licence</b><br/>Theory Class<br>"+coursestart+" to "+courseend+"<br/></p></div></div>";
						} else {
	                	 script1 +="<div class='block'><div class='blockHeader'><h3>"+days[i]+"</h3></div><div class='blockContent'><p><b>No class on this day.</b><br/><br/></p></div></div>";
						}}
						document.getElementById("blockInnerContainerList").innerHTML = script1;
                    </script>
            	        
                    </div>
                </div>
				<?php
			} else if($_SESSION["user_type"] == "admin")
			{ 
		    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$studentid = $_SESSION["user_studentid"];
			$sql = "SELECT studentId, firstName, lastName, balance, phoneNumber, balanceDueDate FROM students where balanceDueDate < CURDATE() and balance > 0 order by DATE_FORMAT(balanceDueDate, '%Y/%m/%d')";
		    $result = $conn->query($sql);
			$studentsids = array();
			$students = array();
			$num = $result->num_rows;
			if(0==$num) {
				echo "No record";
				} else {
			 while($row = $result->fetch_assoc()) {
				$studentsids[] = $row["studentId"];
				$date1=date_create($row["balanceDueDate"]);
                $myDate = new DateTime();
				$diff=date_diff($date1,$myDate);
				$students[] = "Name: " . $row["firstName"] . " " . $row["lastName"] . " <br>Due Amount: $" . $row["balance"] . "<br>Due: " . $diff->days . " days ago<br>Due Date: " . $row["balanceDueDate"] . "<br>Phone Number: " . $row["phoneNumber"];
				}}
			
			$conn->close();
		
			?>
				<div class="sectionHeader">
					<h2>Due balances</h2>
                </div>
                <div class="blockContainer" >
                	<div id="blockInnerContainerList" class="blockInnerContainer">
    	            	<!-- Show the 7 latest events only -->
						<script>
						var script1 = "";
						
						var studentIds= <?php echo json_encode($studentsids ); ?>;
						var days= <?php echo json_encode($students ); ?>;
						for(i = 0; i < days.length; i++){
						
	                	 script1 +="<div class='block'><div class='blockHeader'><h3>Student ID "+studentIds[i]+"</h3></div><div class='blockContent'><p><b>"+days[i]+"</b><br/><br/></p></div></div>";
						}
						document.getElementById("blockInnerContainerList").innerHTML = script1;
                    </script>
            	        
                    </div>
                </div>
				
				<?php
			} 
			?>
            </section>
            
            </div>
            </div>
            <?php
	}
	
	else
	{
		?>
        	<script>
				location = "index.php";
			</script>
        <?php
	}
?>