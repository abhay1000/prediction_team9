<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Rise & Advertise</title>
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
		background-image: linear-gradient(to right,black,gray,black);
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

					
					<!--php-->
					<?php
						include("dbcon.php");
						$trending_player = "SELECT player,rating,country from popular_face_list ORDER BY pflp DESC";
						$r_trending_player = mysqli_query($conn, $trending_player);
						$count_trending_player = mysqli_num_rows($r_trending_player);
						$fr_trending_player = mysqli_fetch_all($r_trending_player,MYSQLI_NUM);
						//print_r($fr_trending_player);
					?>
					
					<?php
				    if(isset($_SESSION["vendor_email"]) and $gtu=='vendor')
					{
						echo "<div style='color:black;' class='container bg-white pad-all'>";
						 echo "<h1 class='lead brand'>Trending Player</h1>";
							echo "<div class='table-responsive'>";
								echo "<table class='table'>";
									echo "<thead>";
										echo "<tr>";
											echo "<th>Sr.No</th>";
											echo "<th>Player Name</th>";
											echo "<th>Rating</th>";
											echo "<th>Country</th>";
										echo "</tr>";
									echo "</thead>";

										$x = 1;
										for($i=0;$i<$count_trending_player;$i++)
										{
											echo "<tbody>";
											echo "<tr>";
											echo "<td>$x</td>";
											for($j=0;$j<=2;$j++)
											{
												echo "<td>";
												echo $fr_trending_player[$i][$j];
												echo "</td>";			
											}
											echo "</tr>";
											echo "</tbody>";
											$x++;			
										} 
				
								echo "</table>";
							echo "</div>";
						echo "</div>";
				    }
				?>
	
      
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
    $(document).ready(function() {
      // the body of this function is in assets/js/now-ui-kit.js
      nowuiKit.initSliders();
    });
 
  </script>
</body>

</html>