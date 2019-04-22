<!DOCTYPE html>
<html>
    <head>
	</head>
	<body>
	    <?php
		//input php amount
		 $ipamount = $_GET["iamount"];
		  //$ipamount = 40000;
		  session_start();
		  include('dbcon.php');
		  $check_fund = "SELECT amount FROM paypal WHERE paypal_email='$_SESSION[paypal_email]' AND pin='$_SESSION[paypal_pin]'";
		  $r_check_fund = mysqli_query($conn,$check_fund);
		  //result 
		  $rr_check_fund = mysqli_fetch_all($r_check_fund,MYSQLI_NUM);
		  $avail_fund = $rr_check_fund[0][0];
		  if($ipamount > $avail_fund)
		  {
			echo "1";    
		  }
		  else
		  {
			echo "2";
            echo "<br/>";	
            //paypal updated amount			
			$transfer_rise = $avail_fund - $ipamount;
            $transfer_rise_fund = "SELECT amount from credentials WHERE email_id='$_SESSION[paypal_email]'";
            $r_transfer_rise_fund = mysqli_query($conn,$transfer_rise_fund);
            //result get amount of rise & advertise
            $rr_transfer_rise_fund = mysqli_fetch_all($r_transfer_rise_fund,MYSQLI_NUM);
            //current transfer rise fund current_trf			
            $current_trf = $rr_transfer_rise_fund[0][0];
            /*initial rise n advertise value will be 0
            input amount will be transfer to rise n advertise vendor amount field and which we will update
			after addition,it will have some amount so when vendor add another fund intial + new input fund and then update
			now,we will deduct paypal fund subtract input amount and then update paypal amount
			*/
			//current trf update
			$current_trf_update = $current_trf+$ipamount;
			//echo $current_trf_update;
			//update rise amount
			$update_ra = "UPDATE credentials SET amount='$current_trf_update' WHERE email_id='$_SESSION[paypal_email]'";
			$r_update_ra = mysqli_query($conn,$update_ra);
			//echo $r_update_ra;
			$update_paypal = "UPDATE paypal SET amount='$transfer_rise' WHERE paypal_email='$_SESSION[paypal_email]'";
			$r_update_paypal = mysqli_query($conn,$update_paypal);
			//echo $r_update_paypal;
            			
			  
		  }
		  
		
		
		?>
	</body>
</html>