$(function()
{
	// nav in and out events..
	$("nav ul li a").mouseenter(function()
	{
		$(".container").css("filter", "blur(2px) grayscale(100%)");
	});
	
	$("nav ul li a").mouseleave(function()
	{
		$(".container").css("filter", "none");
	});
		
	// set the logout button
	$(".logoutLink").click(function(e)
	{
		e.preventDefault();
		
		$.post("pages/logout.php", function()
		{
			$(document.body).fadeOut(500, function()
			{
				location = "index.php";
			});
		});
	});
		
	// transition to other pages
	$("nav ul li a").click(function(e)
	{
		e.preventDefault();
		
		var url = $(this).attr("href");
		$(".container").css("transform", "translateZ(-50px)");
		$(document.body).fadeOut(500, function()
		{
			location = url;
		});
	});
});

function Toast(message)
{
	var div = $("<div></div>");
	div.attr("class", "toast");
	
	div.text(message);
	div.css("opacity", "0");
	div.insertAfter( $("nav") );
	
	div.fadeTo(500, 1, function()
	{
		setTimeout(function()
		{
			div.fadeTo(500, 0, function()
			{
				div.remove();
			});
		}, 1500);
	});
}

function fadeINContainer()
{
	$(".container").css("opacity", "1");
	$(".container").css("transform", "translateZ(0px)");
}

function fadeOUTContainer()
{
	$(".container").css("transform", "translateZ(-50px)");
	$(".container").css("opacity", "0");
}


function buttonClicked()
{
	var id = $(this).attr("id");
	if(id == "performStudentButton")
	{
		var selectedAction = $("#studentDropdown").val();
		
		if(selectedAction == "Print Summary")
		{
			window.open("pages/home/print.php?printALLStudent=true");
		}
		
		else
		{
			fadeOUTContainer();
			setTimeout(function()
			{
				var selectedAction = $("#studentDropdown").val();
				if(selectedAction == "Add new student")
				{
					location = "home.php?page=studentInfoForm&action=add";
				}
		
				else if(selectedAction == "Edit student")
				{
					location = "home.php?page=searchStudent&action=edit";
				}
		
				else if(selectedAction == "Delete student")
				{
					location = "home.php?page=searchStudent&action=delete";
				}
		
				else if(selectedAction == "Display student")
				{
					location = "home.php?page=searchStudent&action=display";
				}
			}, 750);
		}
		
		
	}
	
	// for the save button on the student info form
	else if(id == "saveButton")
	{
		$(".errorMessages").css("opacity", "0");
		$("label").css("color", "black");
		
		// get inputs
		var fname = $("input[name=fname]").val();
		var lname = $("input[name=lname]").val();
		var phone = $("input[name=studentPhone]").val();
		var emergencyPhone = $("input[name=studentEC]").val();
		var email = $("input[name=studentEmail]").val();
		var address = $("input[name=studentAddress]").val();
		var bday = $("input[name=studentBD]").val();
		var balance = $("input[name=balance]").val();
		var balanceDueDate = $("input[name=balanceDueDate]").val();
		var courseType = $("input[name=studentCourseType]:checked").val();
		var language = $("select").val();
		
		var inputs = 
		[
			fname, lname, phone, emergencyPhone, email, address, bday, balance, balanceDueDate, language
		];
		
		var patterns = [
		/^[a-zA-Z]{2,15}$/i,			
		/^[a-zA-Z]{2,15}$/i,	
		/[(]?[0-9]{3}[)]?[\s-]?[0-9]{3}[-]?[0-9]{4}/i,
		/[(]?[0-9]{3}[)]?[\s-]?[0-9]{3}[-]?[0-9]{4}/i,
		/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/i,	
	    /^[a-z0-9]+/i,	
		/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/i,
		/^[0-9]{1,15}[,.]?[0-9]*$/i,	
		/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/i,
		/^[English,French,Tamil]/ 
		];
	
	var errorFields = 
	[
		$("#firstNameError"),
		$("#lastNameError"),
		$("#phoneError"),
		$("#emergencyPhoneError"),
		$("#emailError"),
		$("#addressError"),
		$("#bdayError"),
		$("#balanceError"),
		$("#balanceDueDateError"),
		$("#languageError")
	];
	
	var labels = 
	[
		$("#firstNameLabel"),
		$("#lastNameLabel"),
		$("#phoneLabel"),
		$("#emergencyPhoneLabel"),
		$("#emailLabel"),
		$("#addressLabel"),
		$("#bdayLabel"),
		$("#balanceLabel"),
		$("#balanceDueDateLabel"),
		$("#languagelabel")
	];
		
			var errors = false;		
			
			for(var i=0; i<inputs.length; i++)
			{
				var pattern = patterns[i];
				var input = inputs[i];					
					
				if( input != "" && pattern.test(input))
				{
					// add () and - to phone numbr and emergency phone number if needed
					if(i == 2 || i == 3)
					{
						if(/[0-9]{10}/g.test(input))
						{
							input = "(" + input.charAt(0) + input.charAt(1) + input.charAt(2) +
							") " + input.charAt(3) + input.charAt(4) + input.charAt(5) + "-" +
							input.charAt(6) + input.charAt(7) + input.charAt(8) + input.charAt(9);
							
							switch(i)
							{
								case 2:
									phone = input;
								break;
								
								case 3:
									emergencyPhone = input;
								break;
							}	
						}
						
						// add () if needed
						else if(!/\(([^)]+)\)/.test(input))
						{
							var temp = input;
							input = "(";
							
							for(var j = 0 ; j < temp.length ; j++)
							{
								if(j == 3 && temp.charAt(j) == "-")
									input += " ";
								
								else
									input += temp.charAt(j);
								
								if(j == 2)
									input += ") ";
									
							}
							
							switch(i)
							{
								case 2:
									phone = input;
								break;
								
								case 3:
									emergencyPhone = input;
								break;
							}	
						}
					}
					
					// check if student is at least 16 years old
					else if(i == 6)
					{
						// get current date
						var d = new Date();
						var currentYear = d.getFullYear();
						var currentMonth = d.getMonth() + 1;
						var currentDay = d.getDate();
						
						var bdayValues = inputs[i].split("-");
						var inputYear, inputMonth, inputDay;
						
						if(bdayValues[0] > 31)
							inputYear = bdayValues[0];
						
						else
							inputMonth = bdayValues[0];
						
						if(inputMonth == undefined)
						{
							inputMonth = bdayValues[1];
							inputDay = bdayValues[2];
						}
						
						else
						{
							inputDay = bdayValues[1];
							inputYear = bdayValues[2];
						}
						
						
						// calculate input age
						var differenceYear = currentYear - inputYear;
						if( differenceYear >= 16)
						{
							if(differenceYear == 16)
							{
								// if difference is 16 exactly, check if birthday has passed already
								var differenceMonth = currentMonth - inputMonth;
								if( differenceMonth < 0)
								{
									showErrorInput(labels[i], errorFields[i]);
									errors = true;
								}
							
								else if( differenceMonth == 0 )
								{
									// if same month, check date
									if( (currentDay - inputDay) < 0)
									{
										showErrorInput(labels[i], errorFields[i]);
										errors = true;
									}
								}
							}
						}
						
						// if student is less than 16 years old
						else
						{
							showErrorInput(labels[i], errorFields[i]);
							errors = true;
						}
					}
				} 
				
				else 
				{   
					errors = true;
					showErrorInput(labels[i], errorFields[i]);
				}
			}
			
			if(errors == false)
			{
				var studentInfo = {
					operation : "",
					firstName : fname,
					lastName : lname,
					phoneNumber : phone,
					emergencyPhoneNumber : emergencyPhone,
					email : email,
					address : address,
					birthdate : bday,
					balance : balance,
					balanceDueDate : balanceDueDate,
					courseID : courseType,
					language : language
				};
				addOrEditDB(studentInfo);	
			}
	}
	
	else if(id == "deleteButton")
	{
		if(ACTION == "delete") // Just for security purposes... Not sure if necessary. Will research when I'm sober ;)
		{
			$.post("pages/home/studentInfo.php", {operation : "delete", studentID : STUDENT_ID}, function(data)
			{
				if(data == "success")
				{
					showNoticeBox("The selected record was successfully deleted!");
				}
				
				else
				{
					showNoticeBox("Something went wrong... Please try again later.");
				}	
			});
		}
	}
	
	else if(id == "printStudentButton")
	{
		window.open("pages/home/print.php?printALLStudent=false&studentID=" + STUDENT_ID);
	}
	
	// for the cancel button on the student info form
	else if(id == "cancelButton")
	{
		var linkURL = $(this).attr("link");
		fadeOUTContainer();
		setTimeout(function()
		{
			location = linkURL;
		}, 750);
	}
	
	// the ok button in the notice box
	else if(id == "okButton")
	{
		hideNoticeBox();
		$("#cancelButton").trigger("click");
	}
}

function showNoticeBox(message)
{
	var modalDiv = $("<div></div>");
	modalDiv.addClass("modalDiv");
	modalDiv.insertAfter($("nav"));
	
	// blur
	$(".container").css(
	{
		"-webkit-filter" : "blur(5px)",
		"-moz-filter" : "blur(5px)",
		"-o-filter" : "blur(5px)",
		"-ms-filter" : "blur(5px)",
		"filter" : "blur(5px)"
	});
	
	modalDiv.load("pages/home/confirmationBox.php", function()
	{
		$(".message").text(message);
	});
}

function hideNoticeBox()
{
	$(".modalDiv").remove();
	
	$("#container").css(
	{
		"-webkit-filter" : "none",
		"-moz-filter" : "none",
		"-o-filter" : "none",
		"-ms-filter" : "none",
		"filter" : "none"
	});
}

function addOrEditDB(studentInfo)
{		
		if(ACTION == "add")
		{
			studentInfo.operation = "insert";
			
			$.post("pages/home/studentInfo.php", studentInfo, function(data)
			{
				if(data == "success")
				{
					showNoticeBox("The selected record was successfully added to the database!");
				}
				
				else
				{
					Toast("Something went wrong... Please try again later.");
				}
			});
		}
		
		else if(ACTION == "edit")
		{
			studentInfo.operation = "update";
			studentInfo.studentID = STUDENT_ID;
			
			$.post("pages/home/studentInfo.php", studentInfo, function(data)
			{
				if(data == "success")
				{
					showNoticeBox("The selected record was successfully edited!");
				}
				
				else
				{
					Toast("Something went wrong... Please try again later.");
				}
			});
		}
}

function showErrorInput(label, errorDiv)
{
	label.css("color", "red");
	errorDiv.css("opacity", "1");
}