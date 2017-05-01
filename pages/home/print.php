<?php
	if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin" && isset($_GET["printALLStudent"]) )
	{
		if($_GET["printALLStudent"] == "true")
		{
			?>
			<table class="table table-striped">
				<thead class="thead-inverse">
					<tr>
						<th>Student ID</th>
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
				
			$.post("pages/home/studentInfo" {operation : "selectALL"}, function(data)
			{
				var json = $.parseJSON(data);
				
				for(var i = 0 ; i < json.length ; i++)
				{
					var tbody = $("tbody");
					tbody.html("");
					var html = "<tr>";
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
			}); // end post
			});
			</script>
			<?php
		}
		
		else if( isset( $_GET["studentID"] ) )
		{
			?>
			<table>
				
			</table>
			<script>
			$(function()
			{
				var STUDENT_ID = "<?php echo $_GET["studentID"];?>";
				$.post("pages/home/studentInfo" {operation : "select", studentID : STUDENT_ID}, function(data)
				{
					var json = $.parseJSON(data);
				
				
				});
			});
			</script>
			<?php
		}
		<?php
	}
?>