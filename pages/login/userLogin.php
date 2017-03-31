<?php
	/* This page is used to login a user to the data base */
	
	if(isset($_POST["email"]) && isset($_POST["pwd"]))
	{
		/* TODO : access datbase and check if email and pass are valid */
		
		/* for now, the echo will be success only */
		echo "success";
	}
	
	else
	{
		echo "fail";
	}
?>