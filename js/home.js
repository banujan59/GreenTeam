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
		$(document.body).fadeOut(500, function()
		{
			location = url;
		});
	});
});