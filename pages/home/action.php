		<?php
		session_start();
		if( isset($_GET["page"]) )
		{
		if($_GET["page"] == "addStudent")
		{
			?>
			<style>
				.button
				{
					position: relative;
				}
				
				#cancelButton
				{
					margin-top: -20px;
				}
			</style>
		
			<div class="col-md-12">
						<section> 
							<div class="sectionHeader">
								<h2>Add student to database</h2>
							</div>
							
							<!-- The form -->
							
							<br/>
							
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>First Name:</label>
										</div>
										<div class="col-md-3">
											<input type="text" name="fname" placeholder="Banujan"/>
										</div>
								</div><!-- End row -->		
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Last Name:</label>
										</div>
										<div class="col-md-3">
											<input type="text" name="lname" placeholder="Atputhawhatever"/>
										</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Phone Number:</label>
										</div>
										<div class="col-md-3">
											<input type="tel" name="studentPhone" placeholder="514-123-4567"/>
										</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Emergency Contact:</label>
										</div>
										<div class="col-md-3">
											<input type="tel" name="studentEC" placeholder="450-987-6543"/>
										</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Email Address:</label>
										</div>
										<div class="col-md-3">
											<input type="email" name="studentEmail" placeholder="banuthegreat@gmail.com"/>
										</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Home Address:</label>
										</div>
										<div class="col-md-3">
											<input type="text" name="studentAddress" placeholder="123 Rue MacDonald"/>
										</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Date of Birth:</label>
										</div>
										<div class="col-md-3">
											<input type="date" name="studentBD"/>
										</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Course Time:</label>
										</div>
										<div class="col-md-3">
											<input type="time" name="studentCourseTime"/>
										</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Course Type:</label>
										</div>
										<div class="col-md-3">
											<input type="radio" name="studentCourseType" value="trucks"/> Class 3 - Trucks </br>
											<input type="radio" name="studentCourseType" value="regularVehicles" checked/> Class 5 - Regular Vehicles
										</div>
								</div><!-- End row -->
								
								<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Language of Preference:</label>
										</div>
										<div class="col-md-3">
											<select>
											  <option value="eng">English</option>
											  <option value="fre">French</option>
											  <option value="tam">Tamil</option>
											</select>
										</div>
								</div><!-- End row -->
								
								<br/>
								
								<div id="confirmButton" class="button" style="margin: 15px 395px">CONFIRM</div>
								<div id="cancelButton" class="button" style="margin: 15px 595px">CANCEL</div>
								
								</form>
							</div>
						</section>
			<?php

		}

		
		else if($_GET["page"] == "searchStudent")
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
					
				</style>
				
				<script>
					// object of type student
					function student(id, fname, lname, phone, emergencyPhone, bday, balance, balanceDueDate, courseID)
					{
						this.studentId = id;
						this.firstName = fname;
						this.lastName = lname;
						this.phone = phone;
						this.emergencyPhoneNumber = emergencyPhone;
						this.birthdate = bday;
						this.balance = balance;
						this.balanceDueDate = balanceDueDate;
						this.courseID = courseID;
					}
					
					// array that will contain all students
					var allStudents[];
					
					$(function()
					{	
						// event handler for search box
						$("input[name=searchField]").keyup(function(e)
						{
							e.preventDefault();
							
							var toSearch = $(this).val();
							
							// create the RegExp
							pattern = new RegExp(toSearch, "i");
		
							// create an array to store search results
							var results = [];
		
							// check each elements of the catalog for pattern
							for(var i = 0 ; i < allStudents.length ; i++)
							{
								// store each string to serach in a variable
								var lname = allStudents[i].lastName;
								var fname = allStudents[i].firstName;
								var bday = allStudents[i].birthdate;
								//var language = allStudents[i].language;
			
								// perform the search....
								if( (categoryName.search(pattern) != -1) || (description.search(pattern) != -1) ||
									(name.search(pattern) != -1) || (supplier.search(pattern) != -1) )
								{
									// if match is found, then store current index to results array
									results[results.length] = catalog[i];
								}
							}
		
							// if at least one match has been found, then show result in a table using showListOfProducts(var) function
							if(results.length > 0)
							{
								displaySearchResult(results);
							}
		
							// if no results have been found
							else
							{
								$("tbody").html("<p>Sorry. No matches for your search. :(></p>");
							}
						});
					});
					
					function displaySearchResult(result)
					{
						
					}
				</script>
				
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
										<div class="col-md-7">
											<label class="radio-inline">
												<input type="radio" name="searchCriteria" value="lname" checked>Last Name
											</label>
											<label class="radio-inline">
												<input type="radio" name="searchCriteria" value="fname">First Name
											</label>
											<label class="radio-inline">
												<input type="radio" name="searchCriteria" value="birthdate">Date of birth
											</label>
											<label class="radio-inline">
												<input type="radio" name="searchCriteria" value="all">All
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
														<th>Student ID</th>
														<th>First name</th>
														<th>Last name</th>
														<th>Phone number</th>
														<th>Emergency number</th>
														<th>Birthdate</th>
														<th>Balance</th>
														<th>Balance due date</th>
														<th>Course ID</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$servername = "localhost";
														$dbusername = "root";
														$dbpassword = "";
														$dbname = "universaldb";
													
														// Create connection
														$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
														// Check connection
														if ($conn->connect_error) {
															die("Connection failed: " . $conn->connect_error);
														} 
	
														$sql = "SELECT studentId, firstName, lastName, phoneNumber, emergencyPhoneNumber, birthdate, balance, balanceDueDate, courseID  FROM STUDENTS";
														$result = $conn->query($sql);
	
														if ($result->num_rows > 0) {
														// output data of each row
															while($row = $result->fetch_assoc())
															{
																?>
																	<tr id="<?php echo $row["studentId"];?>">
																		<td><?php echo $row["studentId"]; ?></td>
																		<td><?php echo $row["firstName"]; ?></td>
																		<td><?php echo $row["lastName"]; ?></td>
																		<td><?php echo $row["phoneNumber"]; ?></td>
																		<td><?php echo $row["emergencyPhoneNumber"]; ?></td>
																		<td><?php echo $row["birthdate"]; ?></td>
																		<td><?php echo $row["balance"]; ?></td>
																		<td><?php echo $row["balanceDueDate"]; ?></td>
																		<td><?php echo $row["courseID"]; ?></td>
																	</tr>
																	
																	<script>
																		allStudents[allStudents.length] = new student(
																			"<?php echo $row["studentId"]; ?>",
																			"<?php echo $row["firstName"]; ?>", 
																			"<?php echo $row["lastName"]; ?>", 
																			"<?php echo $row["phoneNumber"]; ?>", 
																			"<?php echo $row["emergencyPhoneNumber"]; ?>", 
																			"<?php echo $row["birthdate"]; ?>", 
																			"<?php echo $row["balance"]; ?>",
																			"<?php echo $row["balanceDueDate"]; ?>",
																			"<?php echo $row["courseID"]; ?>"
																		);
																	</script>
																<?php
															}
	
														} else {
															echo "wrong user password combo";
														}
														$conn->close();
													?>
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
	}
?>

