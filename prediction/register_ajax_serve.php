<!DOCTYPE html>
<html>
    <head>
	
	
	
	</head>
	<body>
	<?php
	$vemail = $cname = $cpass = "";
	if(isset($_GET["pjvemail"]))
	{
		$vemail = $_GET["pjvemail"];
		$cname = $_GET["pjcname"];
		$cpass = $_GET["pjcpass"];
	}
	
	//echo $vemail." ".$cname." ".$cpass;
	
	
	include("dbcon.php");
	$exist_user = "SELECT * FROM credentials WHERE email_id='$vemail'";
	$r_exist_user = mysqli_query($conn,$exist_user);
	if(mysqli_num_rows($r_exist_user)==1)
	{
		echo "User Exist";
	}
	else
    {
		$add_user = "INSERT INTO credentials(email_id,password,company_name,type) VALUES('$vemail','$cpass','$cname','guest')";
		$q_add_user = mysqli_query($conn,$add_user);
		echo "User Created Successfully";
	}
	
	?>
	</body>
</html>