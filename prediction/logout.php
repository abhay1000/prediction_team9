<!DOCTYPE html>
<html>
		<head>
		    <title>Rise & Advertise</title>
		</head>
		<body>
		 
		<?php
		
		session_start();
		if(isset($_SESSION["vendor_email"]))
		{
		 session_unset();
		 session_destroy();
		}
		else
		{
			//echo "Session Variable destroyed";
			
		}
		
		
		
        ?>
		</body>
</html>