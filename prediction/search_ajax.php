<!--FIlter Suitable Player-->
<!--
In Ajax,close all necessary tag
tag in which you add onclick event 

-->
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
		background-image: linear-gradient(to right,blue,gray,black);
		/*background-image: url('./assets/img/header.jpg');*/
		/*background-image: linear-gradient(to top,black,gray,white,black);*/
	}
	.pad-all
	{
		padding: 40px;
	}
	.bg-white
	{
		background-color: white;
	}
	
  </style>
</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed navbar-transparent" color-on-scroll="400">
        <div class="container">
		      <!--Navbar-Left-->
			  <div class="navbar-translate">
				<a class="navbar-brand" rel="tooltip" data-placement="bottom">Rise & Advertise</a>
				<button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-bar top-bar"></span>
				  <span class="navbar-toggler-bar middle-bar"></span>
				  <span class="navbar-toggler-bar bottom-bar"></span>
				</button>
			  </div>
			  <!--Navbar-Right-->
			  <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
				<ul class="navbar-nav">
				  <li class="nav-item">
					<a class="nav-link" href="realindex.php">
					  <p>HOME</p>
					</a>
				  </li>
				  <!--nav check credentials-->
				  <?php
					session_start();
					include('dbcon.php');
					$check = "right";
					if(isset($_SESSION["vendor_email"]))
					{
					$type_user = "SELECT type FROM credentials WHERE email_id='$_SESSION[vendor_email]'";
					$r_type_user = mysqli_query($conn,$type_user);
					//result
					$rr_type_user = mysqli_fetch_all($r_type_user,MYSQLI_NUM);
					//get type of user
					$gtu = $rr_type_user[0][0];
					}
					if(isset($_SESSION["vendor_email"]) and $gtu=='vendor')
					{
					echo "<li class='nav-item dropdown'>";
					echo "<a href='trending_player.php' class='nav-link' id='navbarDropdownMenuLink1'>";
					echo "<p>Trending Player</p>";
					echo "</a>";
					echo "</li>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='search_ajax.php'>";
					echo "<p>Popular Face List</p>";
					echo "</a>";
					echo "</li>";
					//dropdown
					  echo "<li class='nav-item dropdown'>";
					  echo "<a href='#' class='nav-link dropdown-toggle' id='navbarDropdownMenuLink1' data-toggle='dropdown'>";
					  echo "<p>$_SESSION[vendor_email]</p>";
					  echo "</a>";
					  echo "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink1'>";
					  echo "<a class='dropdown-item' href='profile.php'>Profile</a>";
					  echo "<a class='dropdown-item' href='payment_gateway.php' target='_blank'>Payment</a>";
					  echo "<a class='dropdown-item' onclick='logoutRedirect()' href='logout.php'>Logout</a>";
					  echo "</div>";
					  echo "</li>";
					}
					else if(isset($_SESSION["vendor_email"]) and $gtu=='guest')
					{
						echo "<li class='nav-item dropdown'>";
						echo "<a href='cricket_website.php' class='nav-link' id='navbarDropdownMenuLink1'>";
						echo "<p>cricket website</p>";
						echo "</a>";
						echo "</li>";
						echo "<li class='nav-item'>";
						echo "<a class='nav-link' href='cricket_youtube.php'>";
						echo "<p>cricket videos</p>";
						echo "</a>";
						echo "</li>";
						//dropdown
						  echo "<li class='nav-item dropdown'>";
						  echo "<a href='#' class='nav-link dropdown-toggle' id='navbarDropdownMenuLink1' data-toggle='dropdown'>";
						  echo "<p>$_SESSION[vendor_email]</p>";
						  echo "</a>";
						  echo "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink1'>";
						  echo "<a class='dropdown-item' href='profile.php'>Profile</a>";
						  echo "<a class='dropdown-item' href='payment_gateway.php' target='_blank'>Payment</a>";
						  echo "<a class='dropdown-item' onclick='logoutRedirect()' href='logout.php'>Logout</a>";
						  echo "</div>";
						  echo "</li>";
						
					}
					else
					{
						echo "<li class='nav-item'>";
						echo "<a class='nav-link' href='about_us.php'>";
						echo "<p>ABOUT US</p>";
						echo "</a>";
						echo "</li>";
						echo "<li class='nav-item'>";
						echo "<a class='nav-link' href='index.php'>";
						echo "<p>USER PANEL</p>";
						echo "</a>";
						echo "</li>";	
					}
				  
				  ?>    
				</ul>
			  </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!--Onscreen Menu-->
    <?php 	
	if(isset($_SESSION["vendor_email"]) and $gtu=='vendor')
	{
		echo "<div class='container bg-white pad-all'>";
			echo "<div class='container'>";
				echo "<label>Ads Category</label>";		
				echo "<div class='row'>";
					echo "<div class='col-sm-4'>";			
						
						echo "<select class='form-control' id='ad_category' onclick='loadDoc()'>";
							echo "<option style='height: 10px;padding: 10px;'>Shoes</option>";
							echo "<option>FACEWASH</option>";
							echo "<option>PERFUME</option>";
							echo "<option>SOFTDRINKS</option>";
							echo "<option>SPORTSHOES</option>";
							echo "<option>CHIPS</option>";
							echo "<option>TELECOM</option>";
							echo "<option>CHOCOLATE</option>";
							echo "<option>MOBILE</option>";
							echo "<option>BAGS</option>";
							echo "<option>CAR</option>";
							echo "<option>BIKE</option>";
							echo "<option>WATCH</option>";
							echo "<option>GEL</option>";
							echo "<option>SHAMPOO</option>";
						echo "</select>";
					echo "</div>";
					echo "<div class='col-sm-4'>";
					  echo "<select class='form-control' id='amount_range' onclick='loadDoc()'>";
						echo "<option value='0'>1,00,000-50,00,000</option>";
						echo "<option value='1'>50,00,001-1,00,00,000</option>";
						echo "<option value='2'>1,00,00,000-2,00,00,000</option>";
						echo "<option value='3'>2,00,00,000-4,00,00,000</option>"; 
					   echo "</select>"; 
					echo "</div>";
					echo "<div class='col-sm-4'>";
						echo "<select id='country' class='form-control' onclick='loadDoc()'>";
							echo "<option value='ALL'>ALL</option>";
							echo "<option>INDIA</option>";
							echo "<option>ENGLAND</option>";
							echo "<option>AUSTRALIA</option>";
							echo "<option>NEW ZEALAND</option>";
							echo "<option>PAKISTAN</option>";
							echo "<option value='WINDIES'>WEST INDIES</option>";
							echo "<option>AFGHANISTAN</option>";
							echo "<option>SOUTH AFRICA</option>";
							echo "<option>SRI LANKA</option>";
							echo "<option>BANGLADESH</option>";
						echo "</select>"; 
					echo "</div>";
				echo "</div>";			
			echo "</div>";			
		echo "</div>";
		echo "<div id='res-table-hide' style='display:none;' class='container bg-white'>";
		  echo "<div class='container'>";
			echo "<div id='demo' class='demo'>";
			echo "</div>";
		  echo "</div>";
		echo "</div>";
	}
	?>

    <!--Onscreen End-->  
    <footer class="footer" data-background-color="transparent">
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
          </script>,
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
	/*search ajax engine*/
    function loadDoc()
	{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200)
			{
				table_hidder.style.display = "block";
				document.getElementById("demo").innerHTML = this.responseText;				
			}
		  };
		  //ad category
		  var adc = document.getElementById("ad_category").value;
		  //amout range
		  var ar = document.getElementById("amount_range").value;
		  //country;
		  var country = document.getElementById("country").value;
		  //result table hidder
		  var table_hidder = document.getElementById("res-table-hide");
		  //to get first half amount range
		  var r1 = [10000,5000001,10000001,20000001];
		  //to get second half amount range
		  var r2 = [5000000,10000000,20000000,45000000];
		  var sr1 = r1[ar];
		  var sr2 = r2[ar]; 
		  var rtext = "search_ajax_serve.php?q="+adc+"&ar1="+sr1+"&ar2="+sr2+"&coun="+country;
		  xhttp.open("GET",rtext,true);
		  xhttp.send();
	}
    </script>
</body>

</html>