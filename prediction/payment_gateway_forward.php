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
	</head>
	<style>
	.pad-all
	{
	 padding: 20px;	
	}
	.item-js-hide
	{
		display: none;
	}
	</style>
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
				<div class="alert alert-danger alert-dismissible fade in">
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
							    <!--Security alert-->
								<div class="container">
								<div class="row">
								    <div class="col-sm-4"></div>
								    <div class="col-sm-4"><div id="status-auth" class="item-js-hide alert alert-danger">Failed!</div></div>
									<div class="col-sm-4"></div>	
								</div>
								</div>
								<div class="container pad-all">
									<div class="row">
									  <div class="col-sm-4"></div>
									  <div class="col-sm-5"><p class="lead">Two Step Authenticator</p></div>
									  <div class="col-sm-3"></div>
									</div>
								</div>
								<div class="row">
								    <div class="col-sm-3"></div>
									<div class="col-sm-3"><p class="lead">Enter Pin</p></div>
									<div class="col-sm-3"><input type="password" id="auth_pin" class="form-control"/></div>
									<div class="col-sm-3"></div>
								</div>
									<div class="row pad-all">
										<div class="col-sm-3"></div>
										<div class="col-sm-3"></div>
										<div class="col-sm-3"><button onclick="authUser()" type="button" class="btn btn-primary">Authenticate</button></div>
										<div class="col-sm-3"></div>
									</div>
									<label id="test"></label>
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
	function authUser()
	{
	 var xhttp = new XMLHttpRequest();
	 xhttp.onreadystatechange = function() {
		 if(this.readyState == 4 && this.status == 200)
		 {
			temp_test1.innerHTML = this.responseText;
			temp_test1.style.display = "none";
			if(temp_test1.innerHTML==1)
			{
			  window.location = "payment_gateway_final.php";
				
			}
			else
			{
				result_status.style.display = "block";
				
			}
			 
		 }
	 };
	 //temp result store
	 var temp_test1 = document.getElementById("test");
	 //bootstrap status class
	 var result_status = document.getElementById("status-auth");
	 //get pin field
	 var auth_pin = document.getElementById("auth_pin");
	 var re = /\d{4}/;
	 if(re.test(auth_pin.value)==true)
	 {
		 xhttp.open("GET","payment_gateway_forward_auth.php?py_pin="+auth_pin.value,true);
		 xhttp.send();
	 }
	}
	</script>

	</body>
</html>

