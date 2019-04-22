<!DOCTYPE html>
<html>
    <head>
	</head>
	<body>
	
	 <?php
	 //payment gateway confirmation payus
	 //get value from payment gateway confirmation
	 $pgcp_price = "";
	 if(isset($_GET["conprice"]))
	 {
	  $pgcp_price = $_GET["conprice"];
	 }
	 //echo $pgcp_price;
	 session_start();
	 include('dbcon.php');
	 $paypal_get_amount = "SELECT amount FROM paypal WHERE paypal_email='$_SESSION[paypal_email]'";
	 $r_paypal_get_amount = mysqli_query($conn,$paypal_get_amount);
	 //result 
	 $rr_paypal_get_amount = mysqli_fetch_all($r_paypal_get_amount);
	 //available paypal amount
	 $avail_pa = $rr_paypal_get_amount[0][0];
	 if($pgcp_price > $avail_pa)
	 {
		echo "1"; 
	 }
	 else
	 {
		echo "2";
        $update_paypal_amount = $avail_pa - $pgcp_price;
		//update paypal amount transaction
		$update_pat = "UPDATE paypal SET amount='$update_paypal_amount' WHERE paypal_email='$_SESSION[paypal_email]'";
		$r_update_pat = mysqli_query($conn,$update_pat);
		//rise advertise
		$ra_amount = "SELECT amount FROM credentials WHERE email_id='$_SESSION[vendor_email]'";
		$r_ra_amount = mysqli_query($conn,$ra_amount);
		$rr_ra_amount = mysqli_fetch_all($r_ra_amount,MYSQLI_NUM);
		$avail_ra_amount = $rr_ra_amount[0][0];
		$avail_ra_amount += $pgcp_price;
		//update rise_avertise amount transaction
		$update_rat = "UPDATE credentials SET amount='$avail_ra_amount', type='vendor' WHERE email_id='$_SESSION[vendor_email]'";
		$r_update_rat = mysqli_query($conn,$update_rat);	
	 }
	 ?>

	</body>
</html>