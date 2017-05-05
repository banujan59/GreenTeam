<?php
	session_start();
	$_SESSION["user_language"] = "EN";
?>

<!DOCTYPE HTML>
<html>
	<head>
    	<title>Universal Driving School</title>
        <meta charset="utf-8"/>
        
        <link rel="stylesheet" href="css/login.css"/>
        <link rel="stylesheet" href="css/keyframes.css"/>
    </head>
    
    <script src="Libraries/jQuery.js"></script>
    <script src="js/login.js"></script>
    
    <body>
	<div id="container">
    	<header>
        	<img width="100%" height="auto" src="images/banner.jpg"/>
        </header>
        
        <section>
        	<div class="buttonContainer">
            	<div id="moreInfoButton" class="button">More Information</div>
                <div id="loginButton" class="button">Login</div>
            </div>
        </section>
    </div>
    	<footer>
	    	<div id="enButton" class="languageButton">English</div>
	        <div id="frButton" class="languageButton">French</div>
	        <div id="tlButton" class="languageButton">Tamil</div>
        </footer>
    </body>
</html>