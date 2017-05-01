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
	div.css("top", "85%");
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
	
	// for the save button on the student info form
	else if(id == "saveButton")
	{
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
		
		if ( studentInfo.firstName.length < 4 || studentInfo.lastName.length < 4 || studentInfo.phoneNumber.length < 10 || studentInfo.emergencyPhoneNumber.length < 10 || studentInfo.email.length < 4 || studentInfo.address.length < 4 || studentInfo.birthdate.length < 4 || studentInfo.balance.length < 2 || studentInfo.balanceDueDate.length < 4) {
			window.alert("Please fill in all the information.");
			
		} else {
		
		if(ACTION == "add")
		{
			studentInfo.operation = "insert";
			
			$.post("pages/home/studentInfo.php", studentInfo, function(data)
			{
				window.alert(data);
				if(data == "success")
				{
					showNoticeBox("The selected record was successfully added to the database!");
				}
				
				else
				{
					showNoticeBox("Something went wrong... Please try again later.");
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
					showNoticeBox("Something went wrong... Please try again later.");
				}
			});
		}
	}
	}
	
	else if(id == "deleteButton")
	{
		if(ACTION == "delete") // Just for security purposes... Not sure if necessary. Will research when I'm sober ;)
		{
			$.post("pages/home/studentInfo.php", {operation : "delete", studentID : STUDENT_ID}, function(data)
			{
				window.alert(data);
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
	
	else if(id == "printStudentButton" || id == "printAllStudentButton")
	{
		fadeOUTContainer();
		
		if(id == "printStudentButton")
		{
			setTimeout(function()
			{
				location = "pages/home/print.php?printALLStudent=false&studentID=" + STUDENT_ID;
			}, 750);
		}
		
		else
		{
			setTimeout(function()
			{
				location = "pages/home/print.php?printALLStudent=true"
			}, 750);
		}
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