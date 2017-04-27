<?php
	session_start();
	if( isset($_GET["page"]) )
	{
		if($_GET["page"] == "addStudent")
		{
			?>
			<div class="col-md-12">
						<section> 
							<div class="sectionHeader">
								<h2>Add Student to database</h2>
								<h2>Add student to database</h2>
							</div>
							
							<!-- The form -->
											<label>First Name:</label>
										</div>
										<div class="col-md-3">
											<input type="text" name="fname"/>
											<input type="text" name="fname" placeholder="Banujan"/>
										</div>
								</div><!-- End row -->
											<label>Last Name:</label>
										</div>
										<div class="col-md-3">
											<input type="text" name="lname"/>
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
								
								<div id="confirmButton" class="button" style="margin: 10px 395px">CONFIRM</div>
								<div id="cancelButton" class="button" style="margin: 10px 595px">CANCEL</div>
								
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
					
					section .form
					{
					}
				</style>
				<div class="row">
					<div class="col-md-12">
						<section> 
							<div class="sectionHeader">
								<?php
									if($_GET["action"] == "edit")
									{
										?>
											<h2>Search student to edit</h2>
										<?php
									}
									
									else if($_GET["action"] == "delete")
									{
										?>
											<h2>Search student to delete</h2>
										<?php
									}
									
									else if($_GET["action"] == "display")
									{
										?>
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
											<input type="radio" name="searchCriteria" value="fname"/> First Name
											&nbsp;&nbsp;&nbsp;
											<input type="radio" name="searchCriteria" value="lname"/> Last Name
											&nbsp;&nbsp;&nbsp;
											<input type="radio" name="searchCriteria" value="date"/> Date
											&nbsp;&nbsp;&nbsp;
											<input type="radio" name="searchCriteria" value="language"/> Language
											&nbsp;&nbsp;&nbsp;
											<input type="radio" name="searchCriteria" value="all"/> All
										</div> <!-- End col -->
									</div> <!-- End row -->
										<br/><br/>
									<div class="row" style="height:37.37166324435318%;">
										<div class="col-md-2"></div> <!-- End col -->
										<div class="col-md-8">
											<input style="width:100%;" type="text" placeholder="Search student..." name="searchField"/>
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