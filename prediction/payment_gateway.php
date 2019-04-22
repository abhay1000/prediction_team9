<!--Bootstrap Payment Gateway-->
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
		</style>
	</head>
	<body>
	<!--
		<div class="container">
			<p class="lead">Rise & Advertise</p>
		</div>

		<div class="container">
			<p class="lead">Payment Gateway</p>
		</div>
	-->
	
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
							<!--Form-->
							<div class="container">
								<div class="form-horizontal">
									<div class="form-group">
										<label class="control-label col-sm-4" for="email">Email:</label>
										<div class="col-sm-4">
										<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4" for="pwd">Password:</label>
										<div class="col-sm-4">          
										<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
										</div>
									</div>
									<div class="form-group">        
										<div class="col-sm-offset-4 col-sm-4">
										<button onclick="loginPaypal()" type="submit" class="btn btn-primary">Login</button>
										<label class="item-js-hide" id="test">Test</label>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
    <script>
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
	function loginPaypal()
	{
	 var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
          //document.getElementById("test").innerHTML = this.responseText;
		  status.innerHTML = this.responseText;
		  if(status.innerHTML==1)
		  {
			window.location = "payment_gateway_forward.php";    
		  }
		  else
		  {
			  
			  
		  }
		  
        }
	 };
	 //paypal email
	 var paypal_email = document.getElementById("email").value;
	 var paypal_password = document.getElementById("pwd").value;
	 var status = document.getElementById("test");
	 xhttp.open("GET","payment_gateway_login.php?py_email="+paypal_email+"&py_pass="+paypal_password,true);
	 xhttp.send();		
	}
	</script>

	</body>
</html>

