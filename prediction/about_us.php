<!--Tested-->
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
    body
	{
		background-image: linear-gradient(to left,blue,green,orange);
	}
	.ft-black
	{
		color: black;
	}
  </style>
</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent" color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="" rel="tooltip" data-placement="bottom">
          Rise & Advertise
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php" onclick="scrollToDownload()">
              <!--<i class="now-ui-icons arrows-1_cloud-download-93"></i>-->
              <p>HOME</p>
            </a>
          </li>
		  <!--This button is for Guest User to just to through our service-->
          <li class="nav-item dropdown">
            <a href="" class="nav-link" id="navbarDropdownMenuLink1">
              <!--<i class="now-ui-icons design_app"></i>-->
              <p>ABOUT US</p>
            </a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" href="login_ajax.php">
              <!--<i class="now-ui-icons arrows-1_share-66"></i>-->
              <p>USER PANEL</p>
            </a>
          </li>
		  
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <!--Onscreen Menu-->  

      <div class="container text-center ft-black">
        <div class="content-center brand">
          <h2>About Us</h2>
		  <img src="./assets/img/abu_img1.jpg"/>
		  <h4>Our System Works on Sentiment Analysis</h4>
		  <img width="752" src="./assets/img/abu_img2.jpg"/>
		  <h4>We Predict the Best Possible Trending Player For Product Advertisement</h4>
		  <img src="./assets/img/abu_img3.jpg"/>
		  <h4>Successive Selection which results in Huge Profit</h4>
        </div>
      </div>


      
    <footer class="footer">
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
</body>

</html>