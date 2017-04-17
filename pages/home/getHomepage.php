<?php
session_start();	
	if( isset($_SESSION["user_type"]) )
	{
		if($_SESSION["user_type"] = "student")
		{
			?>
            <div class="row" style="height:37.37166324435318%;">
            <div class="col-md-5">
            
            <image class="homeBanner" src="images/home.jpg"/>
            
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
		} // end student home
		
		else
		{
			?>
            	<script>
					location = "index.php";
				</script>
            <?php
		}
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