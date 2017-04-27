<?php
	session_start();
	if( isset($_GET["page"]) )
	{
		if($_GET["page"] == "addStudent")
		{
			?>
				<div class="row" style="height:37.37166324435318%;">
					<div class="col-md-12">
						<section> 
							<div class="sectionHeader">
								<h2>Add Student to database</h2>
							</div>
							
							<!-- The form -->
							<br/>
							<div>
								<form>
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>First Name:</label>
										</div>
										<div class="col-md-3">
											<input type="text" name="fname"/>
										</div>
								</div><!-- End row -->
									
									<br/>
								
								<div class="row" style="height:37.37166324435318%;">
									<div class="col-md-4"></div>
									
										<div class="col-md-2">
											<label>Last Name:</label>
										</div>
										<div class="col-md-3">
											<input type="text" name="lname"/>
										</div>
								</div><!-- End row -->
								</form>
							</div>
						</section>
					</div> <!-- End col -->
				</div> <!-- End row -->
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