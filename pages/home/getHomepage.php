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
			//$sql = "SELECT stud.balance, c.type, s.day, s.dayStart, s.dayEnd FROM course c, schedule s, students stud where (stud.studentId = 2) AND (s.scheduleId = c.scheduleId) AND (stud.courseId = c.courseId)";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				$row = $result->fetch_assoc();
				
				$_SESSION["user_balance"] =  $row["balance"];
				
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
            
            <section style="margin-top:5%" class="scheduleViewer">
            	<div class="sectionHeader">
					<h2>What's on your schedule?</h2>
                </div>
                <div class="blockContainer">
                	<div class="blockInnerContainer">
    	            	<!-- Show the 7 latest events only -->
	                	<div class="block">
                        	<div class="blockHeader"><h3>Monday</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>No class</b>
                                    	<br/><br/>
                                   
                                </p>
                            </div>
        	            </div>
                    
            	        <div class="block">
                        	<div class="blockHeader"><h3>Tuesday</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>No class</b>
                                    	<br/><br/>
                                  
                                </p>
                            </div>
        	            </div>
                    
                    	<div class="block">
                        	<div class="blockHeader"><h3>Wednesday</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>No class</b>
                                    	<br/><br/>
                                  
                                </p>
                            </div>
        	            </div>
    	                
        	            <div class="block">
                        	<div class="blockHeader"><h3>Thursday</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>No class</b>
                                    	<br/><br/>
                                  
                                </p>
                            </div>
        	            </div>
                    
                	    <div class="block">
                        	<div class="blockHeader"><h3>Friday</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>No class</b>
                                    	<br/><br/>
                                   
                                </p>
                            </div>
        	            </div>
                        
                        <div class="block">
                        	<div class="blockHeader"><h3>Saturday</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>No class</b>
                                    	<br/><br/>
                                  
                                </p>
                            </div>
        	            </div>
                        
                        <div class="block">
                        	<div class="blockHeader"><h3>Sunday</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>No class</b>
                                    	<br/><br/>
                                    
                                </p>
                            </div>
        	            </div>
                    </div>
                </div>
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