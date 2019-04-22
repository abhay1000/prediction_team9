<!--Partial Tested-->
<!--not checked:vendor email empty,company name,password,regex validation-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Rise & Advertise
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-kit.css?v=1.2.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <style>
    .pad-all
	{
		padding: 10px;
	}
	.strict-white
	{
		background-color: white;
	}
  </style>
</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index.php" rel="tooltip" data-placement="bottom">
          Rise & Advertise
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  
	
	
  <!--Onscreen Menu-->  
    <div class="wrapper">
    <div class="page-header clear-filter" id="changeable" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/header.jpg');">
      </div>
 
            <div class="container">
			<div class="content-center brand">
			  <h2>Register</h2>
			  <label id="check1"></label>
			  <!--Vendor Email BS row-->
			  <div class="row pad-all">
				<div class="col-sm-2"></div>
				<div class="col-sm-4">Vendor Email</div>
				<div class="col-sm-4"><input oninput="valEmail()" id="vemail" type="text" class="form-control strict-white"/></div>
				<div class="col-sm-2"></div>
			  </div>
			  <!--Vendor Validation-->
			  <div>
			     <div id="row-pad-all-email" class="row pad-all" style="display:none;">
					<div class="col-sm-2"></div>
					<div class="col-sm-4"></div>
					<div class="col-sm-4"><label id="l-alert-show"></label></div>
					<div class="col-sm-2"></div>
				 </div>
			  </div>
			  <!--Company Name BS row-->
			  <div class="row pad-all">
				<div class="col-sm-2"></div>
				<div class="col-sm-4">Company Name</div>
				<div class="col-sm-4"><input oninput="valCame()" id="cname" type="text" class="form-control strict-white"/></div>
				<div class="col-sm-2"></div>
			  </div>
			  <!--Company Validation-->
			  <div>
			     <div class="row pad-all" style="display:none;">
					<div class="col-sm-2"></div>
					<div class="col-sm-4"></div>
					<div class="col-sm-4"><label id="l-alert-show-cn"></label></div>
					<div class="col-sm-2"></div>
				 </div>
			  </div>
			  <!--Set Password BS Row-->
			  <div class="row pad-all">
				<div class="col-sm-2"></div>
				<div class="col-sm-4">Password</div>
				<div class="col-sm-4"><input id="pass" type="password" class="form-control strict-white"/></div>
				<div class="col-sm-2"></div>
			  </div>
			  <!--Confirm Password BS Row-->
			  <div class="row pad-all">
				<div class="col-sm-2"></div>
				<div class="col-sm-4">Confirm Password</div>
				<div class="col-sm-4"><input id="cpass" type="password" class="form-control strict-white"/></div>
				<div class="col-sm-2"></div>
			  </div>
			  <!--Alert Box-->
			   <div class="row pad-all">
				<div class="col-sm-2"></div>
				<div class="col-sm-4"></div>
				<div class="col-sm-4"><label style="display:none;" id="alert-js-box-pa">Password Does Not Match</label></div>
				<div class="col-sm-2"></div>
			  </div>
			  <!--Submit Button-->
			  <div class="row pad-all">
				<div class="col-sm-4"></div>
				<div class="col-sm-4"><button onclick="createValidUser()" type="submit" class="btn btn-default"/>Register</button></div>
				<div class="col-sm-4"></div>
			  </div>
			  <!--End of Submit Button-->
			  <label class="lead">Existing Here? <a href="login_ajax.php">Login Here</a></label>
			</div>
			</div>
	</div>				
    </div>
	</div>
	
      
      
    <footer class="footer" data-background-color="black">
      <div class="container">
        <nav>
          <ul>
            <li>
              <a href="">
                Rise & Advertise
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>
          <a href="" target="_blank">Rise & Advertise</a>.
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="./assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
  
  
  <script>
    /*
	vendor email id = vemail
	company name id = cname
	password id = pass
	confirm password id = cpass
	*/
	let warn = 0;
	function valEmail()
	{
		var getvemail = document.getElementById("vemail").value;
		//hide show box
		var hs_container = document.getElementById("row-pad-all-email");
		var hs_box = document.getElementById("l-alert-show");
		
		var re = /\S+@\S+\.\S+/;
		if(re.test(getvemail)==true)
		{
			//hs_box.innerHTML = "Valid Email Address";
			hs_container.style.display = "none";
			hs_box.style.display = "none";
			warn = 0;
			
		}
		else
		{
		  hs_container.style.display = "flex";
		  hs_box.style.display = "block";
		  hs_box.innerHTML = "Invalid Email Address";
		  warn = 1;
		}	
		console.log(warn);
	}
	function valCame()
	{
		var cname = document.getElementById("cname").value;
		var hs_box = document.getElementById("l-alert-show-cn");
		var re = /([a-zA-Z]+)+/g;
	    var get_reg = re.exec(cname);
		console.log(get_reg);
	}
	function createValidUser()
	{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200)
		{
		 	document.getElementById("check1").innerHTML = this.responseText;
		}
	};
	//js j 
	var jvemail = document.getElementById("vemail");
	var jcname = document.getElementById("cname");
	var jpass = document.getElementById("pass");
	var jcpass = document.getElementById("cpass");
	//alert js box vendor email
	var alert_js_ve = document.getElementById("alert-js-box-ve");
	//alert js box pass
	var alert_jb_pa = document.getElementById("alert-js-box-pa");
	if(jpass.value!="" && jcpass.value!="")
	{
		if(jpass.value==jcpass.value && jvemail.value!="" && jcname.value!="" && warn!='1')
		{
		//pjvemail pass js vendor email
		var user_detail = "register_ajax_serve.php?pjvemail="+jvemail.value+"&pjcname="+jcname.value+"&pjcpass="+jcpass.value;
		xhttp.open("GET",user_detail,true);
		xhttp.send();
		}
	}
	else
	{
		
	}
	}
  </script>
</body>

</html>