$(function()
{
	// get the nav and set nav event
	$("nav").load("pages/nav.html", function()
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
				location = "index.php";
			});
		});
	}); // end nav
});