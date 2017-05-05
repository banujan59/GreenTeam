		<?php
		session_start();
		if( isset($_GET["page"]) && isset($_GET["action"]))
		{
			?>
			<script>
				// initialize variables
				var PAGE = "<?php echo $_GET["page"];?>";
				var ACTION = "<?php echo $_GET["action"];?>";
				var STUDENT_ID = "";
				
				<?php
				if(isset($_GET["studentID"]))
				{
					?>
					STUDENT_ID = "<?php echo $_GET["studentID"];?>";
					<?php
				}
				?>
			</script>
			<?php
		if($_GET["page"] == "searchStudent")
		{
			?>
				<style>
					.container
					{
						position:relative;
						height: 80%;
					}
					
					.row, .row div:not(.sectionHeader), .row section
					{
						height:100%;
					}
					
					.selectHint
					{
						position: relative;
						left: 30%;
						color: gray;
					}
					
					#tableContainer
					{
					    overflow-y: scroll;
						height: 70%;
						left: 0%;
						position: absolute;
					}
					
					tbody tr
					{
						transition: .5s;
						cursor: pointer;
					}
					
					tbody tr:hover
					{
						background-color: rgba(239, 48, 56, 0.5) !important;
					}
					
					#printAllStudentButton
					{
						height: 40px;
					}
				</style>
				<script src="js/searchStudent.js"></script>
				
				<div class="row">
					<div class="col-md-12">
						<section> 
							<div class="sectionHeader">
								<?php
									if($_GET["action"] == "edit")
									{
										?>
											<script>
												var PAGE_ACTION = "edit";
											</script>
											<h2>Search student to edit</h2>
										<?php
									}
									
									else if($_GET["action"] == "delete")
									{
										?>
											<script>
												var PAGE_ACTION = "delete";
											</script>
											<h2>Search student to delete</h2>
										<?php
									}
									
									else if($_GET["action"] == "display")
									{
										?>
											<script>
												var PAGE_ACTION = "display";
											</script>
											<h2>Search student to display</h2>
										<?php
									}
								?>
							</div>
							
							<!-- The form -->
							<br/>
							<div class="form">
								<form>
									<div class="row" style="height:37.37166324435318%;">
										<div class="col-md-2"></div> <!-- End col -->
										<div class="col-md-2">
											<label>Search by:</label>
										</div> <!-- End col -->
										<div class="col-md-5">
									
											<label class="radio-inline">
												<input type="radio" name="searchCriteria" value="fname">First Name
											</label>
											<label class="radio-inline">
												<input type="radio" name="searchCriteria" value="lname" checked>Last Name
											</label>
											<label class="radio-inline">
												<input type="radio" name="searchCriteria" value="birthdate">Date of birth
											</label>
										</div> <!-- End col -->
									</div> <!-- End row -->
										<br/><br/>
									<div class="row" style="height:37.37166324435318%;">
										<div class="col-md-2"></div> <!-- End col -->
										<div class="col-md-8">
											<input style="width:100%;" type="text" placeholder="Search student..." name="searchField"/>
												<br/>
											<div class="selectHint">Click on a table row to select a student.</div>
										</div> <!-- End col -->
									</div> <!-- End row -->
									
										<br/><br/>
										
									<div class="row" style="height:37.37166324435318%;">
										<div class="col-md-2"></div> <!-- End col -->
										<div id="tableContainer" class="col-md-12">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>First name</th>
														<th>Last name</th>
														<th>Phone number</th>
														<th>Emergency number</th>
														<th>Birthdate</th>
														<th>Balance</th>
														<th>Balance due date</th>
														<th>Course ID</th>
														<th>Language</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div> <!-- End col -->
									</div> <!-- End row -->
								</form>
								
								<br/><br/>
							</div>
						</section>
					</div> <!-- End col -->
				</div> <!-- End row -->
			<?php
		}
		
		//if($_GET["page"] == "addStudent")
		else if($_GET["page"] == "studentInfoForm")
		{
			?>
			<style>
				.button
				{
					position: relative;
					margin-right: 15px;
				}
				
				.errorMessages
				{
					color: red;
					opacity: 0;
					transition: .5s;
				}
				
				label
				{
					transition: .5s;
				}
			</style>
		
			<div class="col-md-12">
						<section> 
							<div class="sectionHeader">
								<?php
									if($_GET["action"] == "add")
									{
										?>
											<h2>Add student to database</h2>
										<?php
									}
									
									else if($_GET["action"] == "edit")
									{
										?>
											<h2>Edit student</h2>
										<?php
									}
									
									else if($_GET["action"] == "delete")
									{
										?>
											<h2>Delete student</h2>
										<?php
									}
									
									else if($_GET["action"] == "display")
									{
										?>
											<h2>Display student</h2>
										<?php
									}
								?>
							</div>
							
							<!-- The form -->
							
							<br/>
							
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label id="firstNameLabel">First Name:</label>
										</div>
										<div id="firstNameContainer" class="col-md-3"></div>
										<div id="firstNameError" class="col-md-3 errorMessages">Please enter a valid first name</div>
								</div><!-- End row -->		
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label id="lastNameLabel">Last Name:</label>
										</div>
										<div id="lastNameContainer" class="col-md-3"></div>
										<div id="lastNameError" class="col-md-3 errorMessages">Please enter a valid last name</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label id="phoneLabel">Phone Number:</label>
										</div>
										<div id="phoneContainer" class="col-md-3"></div>
										<div id="phoneError" class="col-md-3 errorMessages">Please enter a valid phone number</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label id="emergencyPhoneLabel">Emergency Contact:</label>
										</div>
										<div id="emerPhoneContainer" class="col-md-3"></div>
										<div id="emergencyPhoneError" class="col-md-3 errorMessages">Please enter a valid emergency phone number</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label id="emailLabel">Email Address:</label>
										</div>
										<div id="emailContainer" class="col-md-3"></div>
										<div id="emailError" class="col-md-3 errorMessages">Please enter a valid email</div>

								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label id="addressLabel">Home Address:</label>
										</div>
										<div id="addressContainer" class="col-md-3"></div>
										<div id="addressError" class="col-md-3 errorMessages">Please enter a valid address</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label id="bdayLabel">Date of Birth:</label>
										</div>
										<div id="bdayContainer" class="col-md-3"></div>
										<div id="bdayError" class="col-md-3 errorMessages">Please enter a valid birth date</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label id="balanceLabel">Balance:</label>
										</div>
										<div id="balanceContainer" class="col-md-3"></div>
										<div id="balanceError" class="col-md-3 errorMessages">Please enter a valid balance</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label id="balanceDueDateLabel">Balance due date:</label>
										</div>
										<div id="balanceDueDateContainer" class="col-md-3"></div>
										<div id="balanceDueDateError" class="col-md-3 errorMessages">Please enter a due date</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Course Type:</label>
										</div>
										<div id="courseTypeContainer" class="col-md-3"></div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label id="languagelabel">Language of Preference:</label>
										</div>
										<div id="languageContainer" class="col-md-3"></div>
										<div id="languageError" class="col-md-3 errorMessages">Please select a valid language</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="btn-group" style="margin: 12px 385px">
								  <button id="saveButton" class="button">Save</button>
								  <button id="cancelButton" class="button" link="home.php">Cancel</button>
								</div>
								
								
								<?php
									if($_GET["action"] == "add" || $_GET["action"] == "edit")
									{
										?>
											<script>
											
												$("#firstNameContainer").html('<input type="text" name="fname" placeholder="Enter student\'s first name"/>');
												$("#lastNameContainer").html('<input type="text" name="lname" placeholder="Enter student\'s last name"/>');
												$("#phoneContainer").html('<input type="tel" name="studentPhone" placeholder="5141234567"/>');
												$("#emerPhoneContainer").html('<input type="tel" name="studentEC" placeholder="5141234567"/>');
												$("#emailContainer").html('<input type="email" name="studentEmail" placeholder="example@example.com"/>');
												$("#addressContainer").html('<input type="text" name="studentAddress" placeholder="123 Rue MacDonald"/>');
												$("#bdayContainer").html('<input type="date" name="studentBD" placeholder="MM-DD-YYYY"/>');
												$("#balanceContainer").html('$ <input type="number" name="balance"/>');
												$("#balanceDueDateContainer").html('<input type="date" name="balanceDueDate"/>');
			
												$.post("pages/home/courseDB.php", {operation : "selectALL"}, function(data)
												{
													var json = $.parseJSON(data);
													for(var i = 0 ; i < json.length ; i++)
													{
													}
													
													$("#courseTypeContainer").html('<input type="radio" name="studentCourseType" value="2"/> Class 3 - Trucks </br>' +

																				'<input type="radio" name="studentCourseType" value="1" checked/> Class 5 - Regular Vehicles');
												});
												
												$("#languageContainer").html('<select>'+
																				'<option value="default">Select language</option>' +
																				'<option value="English">English</option>' +
																				'<option value="French">French</option>'+
																				'<option value="Tamil">Tamil</option>'+
																			'</select>');
											</script>
										<?php
										
										if($_GET["action"] == "edit")
										{
											?>
											<script>
												$.post("pages/home/studentInfo.php", {operation : "select", studentID : STUDENT_ID}, function(data)
												{
													var json = $.parseJSON(data);
													
													$("input[name=fname]").val(json[0].firstName);
													$("input[name=lname]").val(json[0].lastName);
													$("input[name=studentPhone]").val(json[0].phoneNumber);
													$("input[name=studentEC]").val(json[0].emergencyPhoneNumber);
													$("input[name=studentEmail]").val(json[0].email);
													$("input[name=studentAddress]").val(json[0].address);
													$("input[name=studentBD]").val(json[0].birthdate);
													$("input[name=balance]").val(json[0].balance);
													$("input[name=balanceDueDate]").val(json[0].balanceDueDate);
													$("input[name=studentCourseType]:checked").val(json[0].courseID);
													$("select").val(json[0].language);
												});
												
												$("#cancelButton").attr("link", "home.php?page=searchStudent&action=edit");
											</script>
											<?php
										}
									}
									
									else if($_GET["action"] == "delete" || $_GET["action"] == "display")
									{
										?>
											<script>
												$.post("pages/home/studentInfo.php", {operation : "select", studentID : STUDENT_ID}, function(data)
												{
													var json = $.parseJSON(data);
													$("#firstNameContainer").html('<span>' + json[0].firstName + '</span>');
													$("#lastNameContainer").html('<span>' + json[0].lastName + '</span>');
													$("#phoneContainer").html('<span>' + json[0].phoneNumber + '</span>');
													$("#emerPhoneContainer").html('<span>' + json[0].emergencyPhoneNumber + '</span>');
													$("#emailContainer").html('<span>' + json[0].email + '</span>');
													$("#addressContainer").html('<span>' + json[0].address + '</span>');
													$("#bdayContainer").html('<span>' + json[0].birthdate + '</span>');
													$("#balanceContainer").html('<span>$ ' + json[0].balance + '</span>');
													$("#balanceDueDateContainer").html('<span>' + json[0].balanceDueDate + '</span>');
													
													
													if(parseInt(json[0].courseID) == 1 )
														$("#courseTypeContainer").html('<span>Class 3 - Trucks</span>');
													
													else if(parseInt(json[0].courseID) == 2 )
														$("#courseTypeContainer").html('<span>Class 5 - Regular Vehicles</span>');
													
													
													$("#languageContainer").html('<span>' + json[0].language + '</span>');
												});
											</script>
										<?php
										
										if($_GET["action"] == "delete")
										{
											?>
											<script>
												$("#cancelButton").attr("link", "home.php?page=searchStudent&action=delete");
												$("#saveButton").attr("id", "deleteButton");
												$("#deleteButton").text("Delete");
												$("#deleteButton").addClass("criticalButton");
											</script>
											<?php
										}
										
										else
										{
											?>
											<script>
												$("#cancelButton").attr("link", "home.php?page=searchStudent&action=display");
												$("#cancelButton").text("Back");
												$("#saveButton").attr("id", "printStudentButton");
												$("#printStudentButton").text("Print");
											</script>
											<?php
										}
									}
								?>
								
								
								<script>
									$(".button").click(buttonClicked);
								</script>
								
								</form>
							</div>
						</section>
			<?php

		}
	}
?>

