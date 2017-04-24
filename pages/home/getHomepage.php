<?php
session_start();	
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
				<section class="notifications">
            	<div class="sectionHeader">
					<h2>Notifications</h2>
                </div>
                <div class="sectionContent">
                	<h4>Payment Status</h4>
                	<p>
                    	Account balance: <b><span class="accountBalanceValue">$200.00</span></b>.
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
							<select>
								<option>Choose action</option>
								<option>Add a new event</option>
								<option>Edit an existant event</option>
								<option>Update schedule</option>
								<option>Add new lesson</option>
							</select>
						</div> <!-- End col -->
						<div class="col-md-5">
							<div class="button toolButtons">Perform</div>
						</div> <!-- End col -->
					</div> <!-- End row -->
					
					<br/>
					
					<div class="row" style="height:37.37166324435318%;">
						<div class="col-md-2">
							<label>Students: </label>
						</div> <!-- End col -->
						<div class="col-md-5">
						<select>
							<option>Choose action</option>
							<option>Add new student</option>
							<option>Edit student</option>
							<option>Delete student</option>
							<option>Display student</option>
						</select>
						</div> <!-- End col -->
						<div class="col-md-5">
							<div class="button toolButtons">Perform</div>
						</div> <!-- End col -->
					</div> <!-- End row -->
					
					<br/>
					
					<div class="row" style="height:37.37166324435318%;">
						<div class="col-md-2">
							<label>Schedule: </label>
						</div> <!-- End col -->
						<div class="col-md-5">
							<select>
								<option>Choose action</option>
							</select>
						</div> <!-- End col -->	
						<div class="col-md-5">
							<div class="button toolButtons">Perform</div>
						</div> <!-- End col -->
					</div> <!-- End row -->
					
					<br/>
					</form>
					<br/>
                </div>
            </section>
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
                    	<b>Monday April 17th 2017</b>
                        	<br/>
                         Easter Holiday - School will be closed
                    </p>
                    	<hr/>
					<p>
                    	<b>Friday April 14th 2017</b>
                        	<br/>
                         Good Friday - School will be closed
                    </p>
	                    <hr/>
                    <p>
                    	<b>Thursday April 13th 2017</b>
                        	<br/>
                         You have 1 new message from your teacher.
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
                        	<div class="blockHeader"><h3>Date</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>Event Name</b>
                                    	<br/><br/>
                                    Short Event Description
                                </p>
                            </div>
        	            </div>
                    
            	        <div class="block">
                        	<div class="blockHeader"><h3>Date</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>Event Name</b>
                                    	<br/><br/>
                                    Short Event Description
                                </p>
                            </div>
        	            </div>
                    
                    	<div class="block">
                        	<div class="blockHeader"><h3>Date</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>Event Name</b>
                                    	<br/><br/>
                                    Short Event Description
                                </p>
                            </div>
        	            </div>
    	                
        	            <div class="block">
                        	<div class="blockHeader"><h3>Date</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>Event Name</b>
                                    	<br/><br/>
                                    Short Event Description
                                </p>
                            </div>
        	            </div>
                    
                	    <div class="block">
                        	<div class="blockHeader"><h3>Date</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>Event Name</b>
                                    	<br/><br/>
                                    Short Event Description
                                </p>
                            </div>
        	            </div>
                        
                        <div class="block">
                        	<div class="blockHeader"><h3>Date</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>Event Name</b>
                                    	<br/><br/>
                                    Short Event Description
                                </p>
                            </div>
        	            </div>
                        
                        <div class="block">
                        	<div class="blockHeader"><h3>Date</h3></div>
                            <div class="blockContent">
                            	<p>
                                	<b>Event Name</b>
                                    	<br/><br/>
                                    Short Event Description
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