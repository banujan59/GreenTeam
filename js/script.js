var toastISOpen = false;
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
	
	else if( buttonClicked.attr("id") == "forgotPasswordButton" ||  buttonClicked.attr("id") == "backToLoginButton")
	{
		$("#formContainer").toggleClass("flipped");
	}
	
	else if( buttonClicked.attr("id") == "loginToHomeButton" )
	{
		var email = $("input[name=emailField]").val();
		var pwd = $("input[name=pwdField]").val();
		
		var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(patt.test(email))
		{
			$.post("pages/login/userLogin.php", {"email" : email, "pwd" : pwd}, function(data)
			{
				if(data == "success")
				{
					$(".button").css("transition", "none");
					$("input[name=emailField], input[name=pwdField], .button").fadeOut(500, function()
					{
						carDrive();
					
						setTimeout(function()
						{
							$(document.body).fadeOut(500, function()
							{
								location = "home.php";
							});
						}, 2000);
					});
				}
				
				else if(data =="wrong user password combo")
				{
					Toast("The email or password you entered is incorrect.");
					shakeCar();
				}
				
				else
				{
					Toast("The server could not be accessed. Please try again");
					shakeCar();
				}
			});
		}
		
		else
		{
			Toast("The email you entered is invalid.");
			shakeCar();
		}
	}
	
	else if( buttonClicked.attr("id") == "sendEmailKeyButton" )
	{
		$("form").fadeOut(500, function()
		{
			// get the email
			var email = $("input[name=passRecInputField]").val();
			
			// send email
			$.post("pages/login/sendEmail.php", {"email" : email}, function(data)
			{
			});
			
			// clear field
			$("input[name=passRecInputField]").val("");
			
			// go to step 2
			$(".instructions").text("Step 2 - Enter the key code you received in your email.");
			buttonClicked.attr("id", "verifyKeyButton");
			buttonClicked.text("Confirm");
			
			// fadeIn & show Toast for confirmation
			$(this).fadeIn(500);
			
			Toast("An email was sent to " + email);
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
					var div = insertModalDiv();
					div.load("pages/login/resetPassword.php", function(data, s, x)
					{
						div.html(data);
					});
				}
				
				// if key code is not valid
				else
				{
					Toast("The key you entered is not valid.");
				}
			});
	}
	
	else if( buttonClicked.attr("id") == "setPasswordButton" )
	{
		var newPassword = $("input[name=setPasswordField]").val();
		var newPasswordConfirm = $("input[name=setPasswordFieldConfirm]").val();
		
		// check if password match
		// TODO regex password
		if( (newPassword != "")  && (newPassword == newPasswordConfirm) )
		{
			// proceed to update password
			// TODO
			
			// remove modal div and show confirmation message
			removeModalDiv();
			Toast("Your password has been successfully changed!");
			
			setTimeout(function()
			{
				$("#backToLoginButton").trigger("click");
			}, 3000);
			
		}
		
		else
		{
			Toast("The passwords do not match in the confirmation");
		}
	}
		
	// for the cancel and confirm button in the languageDiv
	else
	{
		if( buttonClicked.attr("id") == "confirm" )
		{
			requestLanguageChange($(".languageChoice").val());
		}
			
		removeModalDiv();
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
		buttonClicked.css(
		{
			"background-color" : "rgb(239, 48, 56)",
			"box-shadow" : "0px 0px 40px rgba(0, 0, 0, 0.50)"
		});
		
		// add modal div
		var div = insertModalDiv();
		
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

function Toast(message)
{
	if(toastISOpen == false)
	{
		toastISOpen = true;
		var div = $("<div></div>");
		div.attr("class", "toast");
	
		div.text(message);
		div.insertAfter( $("#container") );
	
		div.css("animation", "toastAnimation 4s");
		setTimeout(function()
		{
			div.remove();
			toastISOpen = false;
		}, 2750);
	}
}

function shakeCar()
{
	$(".loginForm").css("transition", ".1");
	$(".loginForm").css("transform", "rotate(5deg)");
	setTimeout(function()
	{
		$(".loginForm").css("transform", "rotate(-5deg)");
		setTimeout(function()
		{
			$(".loginForm").css("transform", "rotate(5deg)");
			setTimeout(function()
			{
				$(".loginForm").css("transform", "rotate(-5deg)");
				setTimeout(function()
				{
					$(".loginForm").css("transform", "rotate(0deg)");
					$(".loginForm").css("transition", ".5");
				}, 100);
			}, 100);
		}, 100);
	}, 100);
}

function carDrive()
{
	$(".loginForm").css(
	{
		"transition" : "2s",
		"transform" : "translateX(-1500px)"
	});
}

function insertModalDiv()
{	
	// add modal div
	var div = $("<div></div>");
	div.attr("class", "modalDiv");
	div.insertBefore($("footer"));
	
	// blur
	$("#container").css(
	{
		"-webkit-filter" : "blur(5px)",
		"-moz-filter" : "blur(5px)",
		"-o-filter" : "blur(5px)",
		"-ms-filter" : "blur(5px)",
		"filter" : "blur(5px)"
	});
	
	return div;
}

function removeModalDiv()
{
	$(".modalDiv").remove();
	$("#selectLanguage").css(
	{
		"background-color" : "rgb(30, 39, 142)",
		"box-shadow" : "none"
	});
			
	// remove blur
	$("#container").css(
	{
		"-webkit-filter" : "none",
		"-moz-filter" : "none",
		"-o-filter" : "none",
		"-ms-filter" : "none",
		"filter" : "none"
	});
}