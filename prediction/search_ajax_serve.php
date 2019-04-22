<!--FIlter Suitable Player-->
<!DOCTYPE html>
<html>
<head>
 <title>Filter Player</title>
 <style>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	  <!--     Fonts and icons     -->
	  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	  <!-- CSS Files -->
	  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
	  <link href="./assets/css/now-ui-kit.css?v=1.2.0" rel="stylesheet" />
	  <!-- CSS Just for demo purpose, don't include it in your project -->
	  <link href="./assets/demo/demo.css" rel="stylesheet" />
	  .pad-all
	  {
		padding: 0px;
	  }
 </style>
</head>
<body>


 
 <?php
    include("dbcon.php");
	//popular face list
	$a = "";
	$a = $_GET["q"];
	$range1 = $_GET["ar1"];
	$range2 = $_GET["ar2"];
	$coun_r = $_GET["coun"];
	//echo $range1 . $range2;
	//echo $a;
	if($coun_r=="ALL")
	{
	    $search_query = "SELECT player,pflp,suitable_for,amount,gender,country FROM popular_face_list WHERE amount BETWEEN $range1 AND $range2 AND suitable_for LIKE '%$a%' ORDER BY pflp DESC";		
	}
	else
	{
        $search_query = "SELECT player,pflp,suitable_for,amount,gender,country FROM popular_face_list WHERE amount BETWEEN $range1 AND $range2 AND suitable_for LIKE '%$a%' AND COUNTRY='$coun_r' ORDER BY pflp DESC";
	}	
	$search_query_result = mysqli_query($conn, $search_query);
	$search_query_fetch = mysqli_fetch_all($search_query_result,MYSQLI_NUM);
	$search_query_rows = mysqli_num_rows($search_query_result);
	$search_query_field = mysqli_field_count($conn);	
 ?>
 <div style="background-color:white;padding: 40px 0 40px 0;" class="container">
    <div class="table-responsive">
	    <table class="table">
		    <thead>
			    <tr>
				    <th>Sr.No</th>
					<th>Player</th>
					<th>PFL</th>
					<th>Suitable For</th>
					<th>Amount</th>
					<th>Gender</th>
					<th>Country</th>
				</tr>
			</thead>
		    <!--Php Result-->
			<?php
			 $x = 1;
				for($i=0;$i<$search_query_rows;$i++)
				{
					echo "<tbody>";
					echo "<tr>";
					echo "<td>$x</td>";
					for($j=0;$j<$search_query_field;$j++)
					{
					  echo "<td>";
					  echo $search_query_fetch[$i][$j];
					  echo "</td>";
					}
					echo "</tr>";
					echo "</tbody>";
					$x++;	
				}
			?>
		</table>
	</div>
 </div>
 	
 </table>
</center>
</div> 

</body>
</html>