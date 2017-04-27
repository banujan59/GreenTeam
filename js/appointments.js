$(function()
{	
	$(".container").css("transform", "translateZ(2px)");
	$(".circleButton").click(function()
	{
		var buttonID = $(this).attr("id")
		
		fadeOUTContainer();
		setTimeout(function()
		{
			if(buttonID == "makeAppoint")
			{
				$(".container").load("pages/home/getAppointments.php?page=makeAppointment", function()
				{
					fadeINContainer();
				});
			}
		
			else if(buttonID == "removeAppoint")
			{
				$(".container").load("pages/home/getAppointments.php?page=removeAppointment", function()
				{
					fadeINContainer();
				});
			}
		}, 750);
	});
});

function setNewButtonEvent()
{
	$(".button").click(function()
	{
		var buttonID = $(this).attr("id");
		
		if(buttonID == "confirmAppointmentButton")
		{
			var classType = $("input[name=classType]:checked").val();
			var date = $("input[name=appointmentDate]").val();
			var time = $("input[name=appointmentTime]").val();
			
			// TODO : add appointment to databse
			
			Toast("Your appointment request was sent and is waiting for approval.");
		}
		
		else if(buttonID == "removeAppointmentButton")
		{
			var classToCancel = $("select").find(":selected").text();
			
			// TODO : remove appointment from databse
			
			Toast("Your appointment has been cancelled.");
		}
		
		fadeOUTContainer();
			
		setTimeout(function()
		{
			$(".container").load("pages/home/getAppointments.php", function()
			{
				fadeINContainer();
			});
		}, 750);
	});
	
	// event to enhance radio button clicking...
	$(".radioText").click(function()
	{
		var spanText = $(this).text();
		
		if(spanText == "Practical Class")
		{
			$(".radio1").prop('checked', true);
			$(".radio2").prop('checked', false);
		}
		
		else if(spanText == "Theory Class")
		{
			$(".radio1").prop('checked', false);
			$(".radio2").prop('checked', true);
		}
	});
}