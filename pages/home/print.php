<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../../Libraries/bootstrap.min.css"/>
	</head>
	
	<script src="../../Libraries/jQuery.js"></script>
	<body>

<?php
session_start();
	if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin" && isset($_GET["printALLStudent"]) )
	{
		if($_GET["printALLStudent"] == "true")
		{
			?>
			<table class="table table-striped">
				<thead class="thead-inverse">
					<tr>
						<th>ID</th>
						<th>First name</th>
						<th>Last name</th>
						<th>Phone number</th>
						<th>Emergency number</th>
						<th>Email</th>
						<th>Address</th>
						<th>Birthdate</th>
						<th>Balance</th>
						<th>Balance due date</th>
						<th>Course ID</th>
						<th>Language</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<script>
			$(function()
			{
				
			$.post("studentInfo.php", {operation : "selectALL"}, function(data)
			{
				var json = $.parseJSON(data);
				var tbody = $("tbody");
				tbody.html("");
				var html = "";
				
				for(var i = 0 ; i < json.length ; i++)
				{
					html += "<tr>";
						html += "<td>";
							html += json[i].studentId;
						html += "</td>";
						html += "<td>";
							html += json[i].firstName;
						html += "</td>";
						html += "<td>";
							html += json[i].lastName;
						html += "</td>";
						html += "<td>";
							html += json[i].phoneNumber;
						html += "</td>";
						html += "<td>";
							html += json[i].emergencyPhoneNumber;
						html += "</td>";
						html += "<td>";
							html += json[i].email;
						html += "</td>";
						html += "<td>";
							html += json[i].address;
						html += "</td>";
						html += "<td>";
							html += json[i].birthdate;
						html += "</td>";
						html += "<td>";
							html += json[i].balance;
						html += "</td>";
						html += "<td>";
							html += json[i].balanceDueDate;
						html += "</td>";
						html += "<td>";
							html += json[i].courseID;
						html += "</td>";
						html += "<td>";
							html += json[i].language;
						html += "</td>";
					html += "</tr>";
				}
				
				tbody.html(html);
			}); // end post
			});
			</script>
			<?php
		}
		
		else if( isset( $_GET["studentID"] ) )
		{
			?>
			<table class="table table-striped">
				<tbody>
				</tbody>
			</table>
			<script>
			$(function()
			{
				var STUDENT_ID = "<?php echo $_GET["studentID"];?>";
				$.post("studentInfo.php", {operation : "select", studentID : STUDENT_ID}, function(data)
				{
					var json = $.parseJSON(data);
					
					var tbody = $("tbody");
					tbody.html("");
					var html = "<tr>";
						html += "<th>Student ID:</th>"
						html += "<td>" + json[0].studentId + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>First Name:</th>"
						html += "<td>" + json[0].firstName + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>Last Name:</th>"
						html += "<td>" + json[0].lastName + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>Phone Number:</th>"
						html += "<td>" + json[0].phoneNumber + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>Emergency Phone Number:</th>"
						html += "<td>" + json[0].emergencyPhoneNumber + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>Email:</th>"
						html += "<td>" + json[0].email + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>Address:</th>"
						html += "<td>" + json[0].address + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>Birthdate:</th>"
						html += "<td>" + json[0].birthdate + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>Balance:</th>"
						html += "<td>" + json[0].balance + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>Balance due date:</th>"
						html += "<td>" + json[0].balanceDueDate + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>Course ID:</th>"
						html += "<td>" + json[0].courseID + "</td>"
					html += "</tr>";
					
					html += "<tr>";
						html += "<th>Language:</th>"
						html += "<td>" + json[0].language + "</td>"
					html += "</tr>";
					
					tbody.html(html);
				});
			});
			</script>
			<?php
		}
	}
?>

<script>
				//window.print();
			</script>
	</body>
</html>