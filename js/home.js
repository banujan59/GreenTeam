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


function buttonClicked()
{
	var id = $(this).attr("id");
	
	if(id == "performStudentButton")
	{
		var selectedAction = $("#studentDropdown").val();
		if(selectedAction == "Add new student")
		{
			
		}
		
		else if(selectedAction == "Edit student")
		{
			
		}
		
		else if(selectedAction == "Delete student")
		{
			
		}
		
		else if(selectedAction == "Display student")
		{
			
		}
	}
}