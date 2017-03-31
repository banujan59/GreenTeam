$(function()
{	
	/* Event handler for the buttons */
	
	$(".button").click(buttonClicked);
	// for the language buttons
	$(".languageButton").click(languageButtonClicked);
});

function moveLanguageButtonToLeft()
{
	$("#enButton, #frButton, #tlButton").css(
	{
		"margin-left" : "0px",
		"left" : "0%"
	});
	
	$("#tlButton").text("Language").attr("id", "selectLanguage");
}

function moveLanguageButtonToCenter()
{
	$("#selectLanguage").text("Tamil").attr("id", "tlButton");
	
	$("#enButton, #frButton, #tlButton").css("left", "50%");
	
	$("#enButton").css("margin-left", "-250px");
	$("#frButton").css("margin-left", "-60px");
	$("#tlButton").css("margin-left", "130px");
}

function buttonClicked()
{
	// get the buttonClicked
	var buttonClicked = $(this); 

	// for the more information button
	if( buttonClicked.attr("id") == "moreInfoButton" )
	{
		// fade away the section
		$("section").fadeOut(500, function()
		{
			moveLanguageButtonToLeft();
				
			// get the more info page
			$("section").load("pages/login/moreInfo.php", function(response, status, xhr)
			{
				$(this).html(response);
				$(this).fadeIn(500);
			});
		});
	}
		
	// for the login button
	else if( buttonClicked.attr("id") == "loginButton" )
	{
		// fade away the section
		$("section").fadeOut(500, function()
		{
			moveLanguageButtonToLeft();
			
			$(this).load("pages/login/loginForm.php", function(data, status, xhr)
			{
				$(this).html(data);
				$(this).fadeIn(500);
			});
		});
	}
		
	// for the back button
	else if( buttonClicked.attr("id") == "backButton" )
	{
		// fade away the section
		$("section").fadeOut(500, function()
		{
			moveLanguageButtonToCenter();
			$("section").load("pages/login/main.php", function(response, status, xhr)
			{
				$(this).html(response);
				$(this).fadeIn(500);
			});
		});
	}
	
	else if( buttonClicked.attr("id") == "forgotPasswordButton" )
	{
		$("#formContainer").toggleClass("flipped");
		
		$("#backButton").text("Back to login");
		$("#backButton").attr("id", "backToLoginButton");
	}
	
	else if( buttonClicked.attr("id") == "loginToHomeButton" )
	{
		var email = $("input[name=emailField]").val();
		var pwd = $("input[name=pwdField]").val();
		
		$.post("pages/login/userLogin.php", {"email" : email, "pwd" : pwd}, function(data)
			{
				if(data == "success")
				{
					location = "home.php";
				}
			});
	}
	
	else if( buttonClicked.attr("id") == "backToLoginButton" )
	{
		$("#formContainer").toggleClass("flipped");
		
		$("#backToLoginButton").text("Back");
		$("#backToLoginButton").attr("id", "backButton");
	}
	
	else if( buttonClicked.attr("id") == "sendEmailKeyButton" )
	{
		$("form").fadeOut(500, function()
		{
			// get the email
			var email = $("input[name=passRecInputField]").val();
			
			// send email
			
			// clear field
			$("input[name=passRecInputField]").val("");
			
			// go to step 2
			$(".instructions").text("Step 2 - Enter the key code you received in your email.");
			buttonClicked.attr("id", "verifyKeyButton");
			buttonClicked.text("Confirm");
			
			// fadeIn & show toast for confirmation
			$(this).fadeIn(500);
			
			toast("An email was sent to " + email);
		});
	}
	
	else if( buttonClicked.attr("id") == "verifyKeyButton" )
	{
		// get the key
		var key = $("input[name=passRecInputField]").val();
		
		// verify key
		$.post("pages/login/verifyKeyCode.php", {"keyCode" : key}, function(data)
			{
				if(data == "valid")
				{
					// proceed with changing password
					
				}
				
				// if key code is not valid
				else
				{
					Toast("The key you entered is not valid.");
				}
			});
	}
		
	// for the cancel and confirm button in the languageDiv
	else
	{
		if( buttonClicked.attr("id") == "confirm" )
		{
			requestLanguageChange($(".languageChoice").val());
		}
			
		$(".modalDiv").remove();
		$("#selectLanguage").css(
		{
			"background-color" : "rgb(30, 39, 142)",
			"box-shadow" : "none"
		});
			
		$("#container").css(
		{
			"-webkit-filter" : "none",
			"-moz-filter" : "none",
			"-o-filter" : "none",
			"-ms-filter" : "none",
			"filter" : "none"
		});
	}
}

function languageButtonClicked()
{	
	// get the buttonClicked
	var buttonClicked = $(this); 
	
	// for the english button
	if( buttonClicked.attr("id") == "enButton" )
	{
		requestLanguageChange("English");
	}
	
	// for the french button
	else if( buttonClicked.attr("id") == "frButton" )
	{
		requestLanguageChange("French");
	}
	
	// for the tamil button
	else if( buttonClicked.attr("id") == "tlButton" )
	{
		requestLanguageChange("Tamil");
	}
	
	// for the language button
	else if( buttonClicked.attr("id") == "selectLanguage" )
	{
		$("#container").css(
		{
			"-webkit-filter" : "blur(5px)",
			"-moz-filter" : "blur(5px)",
			"-o-filter" : "blur(5px)",
			"-ms-filter" : "blur(5px)",
			"filter" : "blur(5px)"
		});
		
		buttonClicked.css(
		{
			"background-color" : "rgb(239, 48, 56)",
			"box-shadow" : "0px 0px 40px rgba(0, 0, 0, 0.50)"
		});
		
		// add modal div
		var div = $("<div></div>");
		div.attr("class", "modalDiv");
		div.insertBefore($("footer"));
		
		div.load("pages/login/selectLanguageDiv.php", function(data, s, x)
		{
			div.html(data);
		});
	}
}

function requestLanguageChange(language)
{
	// TODO : request language change
}

function toast(message)
{
	var div = $("<div></div>");
	div.attr("class", "toast");
	
	div.text(message);
	div.insertAfter( $("#container") );
	
	div.css("animation", "toastAnimation 4s");
	setTimeout(function()
	{
		div.remove();
	}, 4500);
}