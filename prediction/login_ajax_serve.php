<!DOCTYPE html>
<html>
    <head>
	</head>
    <body>
	<?php
	
	$vvemail = $vvpass = "";
	
		$vvemail = $_GET["email"];
		$vvpass = $_GET["pass"];
	
	
	include("dbcon.php");
	$verify_user_pass  = "SELECT email_id,password FROM credentials WHERE email_id='$vvemail' AND password='$vvpass'";
	//echo $verify_user_pass;
	$q_verify_user_pass = mysqli_query($conn,$verify_user_pass);
	//print_r($q_verify_user_pass);
	if(mysqli_num_rows($q_verify_user_pass)==1)
	{
	 //echo "Succes";
	 //header('Location: index.php');
	 echo "1";
	 session_start();
	 $_SESSION["vendor_email"] = $vvemail;
	}
	else
	{
	 echo "2";	
	}
	?>
	
	
	
	
	
	
	
	
	
	
	</body>
</html>