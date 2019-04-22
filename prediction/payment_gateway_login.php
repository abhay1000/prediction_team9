<!DOCTYPE html>
<html>
    <head>
	</head>
	<body>
	 <?php
	    include("dbcon.php");
		//payment_gateway_login
		$pgl_email = $_GET["py_email"];
		$pgl_pass = $_GET["py_pass"];
		//echo $pgl_email." ".$pgl_pass;
		//login user pass login_up
		$login_up = "SELECT paypal_email,paypal_password FROM paypal WHERE paypal_email='$pgl_email' AND paypal_password='$pgl_pass'";
	    $r_login_up = mysqli_query($conn,$login_up);
	    if(mysqli_num_rows($r_login_up)==1)
		{
			echo "1";
            session_start();
            $_SESSION["paypal_email"] = $pgl_email;			
		}
		else
		{
			echo "2";	
		} 
	 ?>
	
	</body>
</html>