<!--Tested-->
<!DOCTYPE html>
<html>
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
			  <h2>Login</h2>
			  <label id="check1"></label>
			  <!--Email BS row-->
			  <div class="row pad-all">
				<div class="col-sm-2"></div>
				<div class="col-sm-4">Email</div>
				<div class="col-sm-4"><input id="vvemail" type="text" class="form-control strict-white"/></div>
				<div class="col-sm-2"></div>
			  </div>
			  <!--Password BS row-->
			  <div class="row pad-all">
				<div class="col-sm-2"></div>
				<div class="col-sm-4">Password</div>
				<div class="col-sm-4"><input id="vvpass" type="password" class="form-control strict-white"/></div>
				<div class="col-sm-2"></div>
			  </div>
			  <!--Submit Button-->
			  <div class="row pad-all">
				<div class="col-sm-4"></div>
				<div class="col-sm-4"><button onclick="redirectValid()" type="submit" class="btn btn-default"/>LOGIN</button></div>
				<div class="col-sm-4"></div>
			  </div>
			  <!--End of Submit Button-->
			  <label class="lead">New Here? <a href="register_ajax.php">Register Here</a></label>
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
            <li>
              <a href="">
                About Us
              </a>
            </li>
            <li>
              <a href="">
                Blog
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>
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
    /*redirect login page to real index only if credentials is valid*/
	function redirectValid()
	{
	 //console.log("Start");
	 var xhttp = new XMLHttpRequest();
	 xhttp.onreadystatechange = function() {
		//console.log("this.readystate:"+this.responseText);
		if(this.readyState == 4  && this.status == 200)
		{
		 redirect_page.style.display = "none";
		 redirect_page.innerHTML = this.responseText;
		 //console.log(redirect_page);
			 if(redirect_page.innerHTML==1)
			 {
				 console.log(1);
				window.location = "realindex.php"; 
			 }
			 else
			 {
				 console.log(2);
				//window.location = "login_ajax.php"; 
				 
			 }	
		}
	 };
	 //vendor email
	 var vv_email = document.getElementById("vvemail").value;
	 var vv_pass = document.getElementById("vvpass").value;
	 var redirect_page = document.getElementById("check1");
	 var forward_page = "login_ajax_serve.php?email="+vv_email+"&pass="+vv_pass;
	 xhttp.open("GET",forward_page,true);
     xhttp.send();
	 //console.log("End");
	}
	</script>
    
 </body>
</html>