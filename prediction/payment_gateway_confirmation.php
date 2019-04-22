<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">	
		<!--scalable viewport-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<style>
		/*hide any element*/
		.item-js-hide
		{
			display: none;	
		}
		.pad-all
		{ 
		 padding: 20px;
		}
		.dir-right-item
		{
			text-align: right;
		}
		.dir-center-item
		{
			text-align: center;
		}
		</style>
	</head>
	<body>
	    
		<?php
		
		$sduration = $sprice = "";
		if(isset($_GET["duration"]))
		{
			$sduration = $_GET["duration"];
			$sprice = $_GET["price"];
		}
		//echo $sduration." ".$sprice;
		?>
	
	
	    <div class="container" style="padding:20px;">
		<div class="container">
		    <div class="row">
			    <div class="col-sm-3"><p class=" text-primary lead">Rise & Advertise</p></div>
			    <!--<div class="col-sm-3"><img src="./payment_gateway/img/paypal-logo.svg"/></div>-->
				<div class="col-sm-3"></div>
				<div class="col-sm-3"></div>
				<div class="col-sm-3" style="text-align:right;"><button type="button" id="backtoindex" onclick="exitGateway()" class="btn btn-danger">Exit</button></div>
			</div>
		</div>
		</div>
		
		<div class="container">
			<div class="container">
				<div class="alert alert-danger aleert-dismissible fade in">
					<a class="close" data-dismiss="alert" arial-label="close">&times;</a>
					<strong>Currently!</strong> We support Paypal soon we will add more payment gateway
				</div>
			</div>
		</div>
		
		<div class="container">
				<div class="container">
						<div class="well well-lg">
							<div class="row">
								<div class="col-sm-5"></div>
								<div class="col-sm-5" style="padding:20px;"><img src="./payment_gateway/img/paypal-logo.svg"></div>
								<div class="col-sm-2"></div>
							</div>
							<div class="container">
							    <div class="row">
								    <div class="col-sm-4"><p class="lead">Hello,<?php session_start(); echo $_SESSION["paypal_email"]; ?></p></div>
									<div class="col-sm-4"></div>
									<div class="col-sm-4"><p class="lead">Amount:
									 <?php
										include('dbcon.php');
										//SOF CODE
										function moneyFormatIndia($num) {
											$explrestunits = "" ;
											if(strlen($num)>3) {
												$lastthree = substr($num, strlen($num)-3, strlen($num));
												$restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
												$restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
												$expunit = str_split($restunits, 2);
												for($i=0; $i<sizeof($expunit); $i++) {
													// creates each of the 2's group and adds a comma to the end
													if($i==0) {
														$explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
													} else {
														$explrestunits .= $expunit[$i].",";
													}
												}
												$thecash = $explrestunits.$lastthree;
											} else {
												$thecash = $num;
											}
											return $thecash; // writes the final format where $currency is the currency symbol.
                                        }
									    $get_amount = "SELECT amount FROM paypal WHERE paypal_email='$_SESSION[paypal_email]' and pin='$_SESSION[paypal_pin]'";
									    $r_get_amount = mysqli_query($conn,$get_amount);
										//result amount
										$rr_get_amount = mysqli_fetch_all($r_get_amount,MYSQLI_NUM);
										$amount = $rr_get_amount[0][0];
										//setlocale(LC_MONETARY, 'en_IN');
										//$amount = money_format('%!i',$amount);
										//echo $amount;
										$amount = moneyFormatIndia( $amount );
									    echo $amount." ","INR"; 
									 ?></p>
									</div>
								</div>   
							</div>
							<!--alert Status sucess-->
							<div class="container">
							    <div class="row">
								    <div class="col-sm-4"></div>
									<div id="status-transfer-success" class="item-js-hide alert alert-success col-sm-4">Success</div>
									<div class="col-sm-4"></div>
							    </div>
							</div>
							<!--alert Status failed-->
							<div class="container">
							    <div class="row">
								    <div class="col-sm-4"></div>
									<div id="status-transfer-cancel" class="item-js-hide alert alert-danger col-sm-4">Cancelled By User</div>
									<div class="col-sm-4"></div>
							    </div>
							</div>
							
							<div class="container">
							    <p class="text-primary lead">Subscription of Rise & Advertise</p>
								<!--outdate code
								<div class="row">
								    <div class="col-sm-3"></div>
									<div class="col-sm-3" style="text-align:center;"><p class="lead">Enter Amount</p></div>
									input amount i-amount
									<div class="col-sm-3"><input type="text" id="i-amount" class="form-control"></div>
									<div class="col-sm-3"></div>
								</div>
								-->
								<!--confirmation of subscription with price-->
								<div class="container">
								   <p class="lead text-center">
								   <?php
								   
								   if(isset($_GET["duration"]))
									{
										   echo "Are you sure to pay for "; 
										   echo $sduration;
									       echo " @ <strong id='gsprice'>$sprice</strong>/-"; 
									}
								   ?>
								   </p>
								</div>
								<!--Proceed and cancel button-->
								<div class="row pad-all">
								    <div class="col-sm-3"></div>
									<div class="col-sm-3 dir-right-item"><button onclick="payUsAction()" type="button" class="btn btn-primary">Pay Us</button></div>
									<div class="col-sm-3"><button onclick="cancelAction()" type="button" class="btn btn-danger">Cancel</button></div>
									<div class="col-sm-3"></div>
								</div>
								<!--outdate code
								<div class="row">
								    <div class="col-sm-3"></div>
									<div class="col-sm-3"></div>
									<div class="col-sm-3"><button onclick="amountTransfer()" id="amounttrans" type="button" class="btn btn-primary">Transfer</button></div>
									<div class="col-sm-3"></div>
								</div>
								-->
							</div>
							<label style="display:none;" id="test">rf</label>
							
						</div>
					</div>
				</div>
			</div>
			
	    
		
		<script>
		  /*exit gateway*/
		  function exitGateway()
		  {
			 var xhttp = new XMLHttpRequest();
			 xhttp.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200)
				{
					window.location = "realindex.php";
				}	
			 };
			 xhttp.open("GET","payment_gateway.php",true);
			 xhttp.send();	
		  }
          /*Pay Us Action*/
		  function payUsAction()
		  {
			var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200)
				{
					temp_test.innerHTML = this.responseText;
					//console.log(temp_test.innerHTML);
					if(temp_test.innerHTML==1)
					{
						success_show.style.display = "none";
						cancel_show.style.display = "block";
						cancel_show.innerHTML = "Insufficient Fund..Cancelled By System";
					}
					else
					{
						cancel_show.style.display = "none";
						success_show.style.display = "block";
					}
				}
			};
			//get price for strong tag
			var gprice = document.getElementById("gsprice").innerHTML;
			var success_show = document.getElementById("status-transfer-success");
			var cancel_show = document.getElementById("status-transfer-cancel");
			var temp_test = document.getElementById("test");
            xhttp.open("GET","payment_gateway_con_pay.php?conprice="+gprice,true);
            xhttp.send();		   
		  }
          /*Cancel Action*/	
          function cancelAction()
		  {
			var success_show = document.getElementById("status-transfer-success");
            var cancel_show = document.getElementById("status-transfer-cancel");
			cancel_show.innerHTML = "Cancelled By User";
			success_show.style.display = "none";
			cancel_show.style.display = "block";



		  }		  
		</script>
	 
	</body>
</html>