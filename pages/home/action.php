<?php
	session_start();
	if( isset($_GET["page"]) )
	{
		if($_GET["page"] == "addStudent")
		{
			?>
			It works!
			<?php
		}
		
		else if($_GET["page"] == "searchStudent")
		{
			
		}
	}
?>