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
			
		}
	}
?>