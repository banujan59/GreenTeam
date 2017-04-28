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
	
	// for the confirm button on the student info form
	else if(id == "confirmButton")
	{
		
	}
	
	// for the cancel button on the student info form
	else if(id == "cancelButton")
	{
		fadeOUTContainer();
		setTimeout(function()
		{
			location = "home.php";
		}, 750);
	}
}