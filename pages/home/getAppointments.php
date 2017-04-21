<?php
session_start();
	
	if(!isset($_GET["page"]))
	{
		if( $_SESSION["user_type"] == "student")
		{
			?>
            <style>
				.block
				{
					width: 200px !important;
					height: 200px !important;
				}
				
				.sectionHeader
				{
					border-top-left-radius: 10px;
					border-top-right-radius: 10px;
				}
				
				.container
				{
					height: 80%;
				}
				
				.circleButton
				{
					position: fixed;
				}
			</style>
            <script src="js/appointments.js"></script>
     		   	<div class="row" style="height:37.37166324435318%;">
	                <div class="col-md-1"></div>
	       		     <div class="col-md-11">
            	
                		<section style="border:none" class="scheduleViewer">
                    		<div class="sectionHeader">
                        		<h2>Appointments Scheduled</h2>
                       		</div>
	                        <div style="overflow:hidden" class="blockContainer">
                				<div style="width:100%; margin-left:75px;" class="blockInnerContainer">
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

                		    </div> <!-- End -->
		                </div>
            	        </section>
            
	    	        </div> <!-- End col -->
    	        </div> <!-- End row -->
            
        	    <div id="makeAppoint" class="circleButton">Make Appointment</div>
	            <div id="removeAppoint" class="circleButton">Remove Appointment</div>
    	    <?php
		}
	}
	
	else
	{
		if($_GET["page"] == "makeAppointment")
		{
			?>
            	<div class="row" style="height:37.37166324435318%;">
	       		     <div class="col-md-12">
                     
	                     <section class="appointmentForm">
                         	<div class="sectionHeader">
                            	<h2>Make Appointment</h2>
                            </div>
                            
                            <br/>
                         
                     	<form>
                        	<input class="radio1" type="radio" name="classType" value="practical" checked="checked"/> <span class="radioText">Practical Class</span>
                            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="radio2" type="radio" name="classType" value="theory"/> <span class="radioText">Theory Class</span>
                            
                            	<br/><br/>
                            
                            <label>Date: </label>
                            <input type="date" name="appointmentDate"/>
                            	<br/>
                            <label>Time: </label>
                            <input type="time" name="appointmentTime"/>
                            
	                            <br/><br/>
                            <label>Teacher: </label>
                            <span class="teacherValue">Complete fields above</span>
                            	<br/>
                            <label>Car: </label>
                            <span class="carValue">Complete fields above</span>
                            
                            	<br/><br/>
                            <div id="confirmAppointmentButton" class="button">Confirm</div>
                            	<br/>
                        </form>
                        
                        </section>
                     	
                     </div> <!-- End col -->
                </div> <!-- End row -->
                
                <script>setNewButtonEvent();</script>
            <?php
		}
		
		else if($_GET["page"] == "removeAppointment")
		{
			?>
            	<div class="row" style="height:37.37166324435318%;">
	       		     <div class="col-md-12">
                     	
                        <section class="appointmentForm">
                         	<div class="sectionHeader">
                            	<h2>Remove Appointment</h2>
                            </div>
                            
                            <br/>
                         
                     	<form>
                        	<select>
                            	<option>Theory Class - 10/10/2017</option>
                                <option>Practical Class - 11/10/2017</option>
                            </select>
                            
                            <br/><br/>
                            <div id="removeAppointmentButton" class="button">Remove</div>
                            	<br/>
                        </form>
                        
                        </section>
                        
                     </div> <!-- End col -->
                </div> <!-- End row -->
                <script>setNewButtonEvent();</script>
            <?php
		}
	}
?>