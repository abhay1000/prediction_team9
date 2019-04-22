<!DOCTYPE html>
<html>
    <head>
	</head>
	<body>
	    <?php
		
		
		include('dbcon.php');
		$py_pin = $_GET["py_pin"];
		session_start();
		
		$auth_user = "SELECT paypal_email,pin from paypal WHERE paypal_email='$_SESSION[paypal_email]' AND pin='$py_pin'";
		$r_auth_user = mysqli_query($conn,$auth_user);
		//result auth user pin
		if(mysqli_num_rows($r_auth_user))
		{
		 echo "1";
		 $_SESSION["paypal_pin"] = $py_pin;
		}
		else
		{
		 echo "2";	
		}
		
		?>
	
	
	
	
	
	
	</body>
</html>