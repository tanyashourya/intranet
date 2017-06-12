<html>
	<head>
		<title>DIRECTORY</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <link href="../css/bootstrap.css" rel="stylesheet">
	    <meta charset= utf-8>
	    <style type="text/css">
	    	body{
	    		background-image: url("images/bg7.png");
	    		background-repeat: no-repeat;
	    		background-size: cover;
	    		background-attachment: fixed;
	    		padding-top: 256 px;
	    	}
			.profile{
				margin: 5%;
			}
			.profile_pic{
				height: 200px; 
				width: 220px;
			}
			h2 , h4{
				text-transform: uppercase;
			}
			         		
	    </style>
	</head>
	<body>

<?php
	include("navbar.php");
?>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h1 style='padding:8%'><b>DIRECTORY</b></h1>
				</div>
				<div class="col-sm-4" style="padding-top:5%;">
					<!-- SEARCH EMPLOYEE -->

				</div>
				<div class="col-sm-2"></div>
			</div>
					<!-- DIRECTORY -->
					<?php
						include("connect.php");
						$sql="SELECT * FROM login";
						$result=mysql_query($sql,$link);
						while ($row = mysql_fetch_array($result)) {
								echo "<div class='row profile'>";
								echo "<img class='profile_pic img-circle col-sm-6' src='uploads/$row[image]'>";
								echo "<div class='col-sm-6'>";
								echo "<h2>".$row['name']."</h2>";
								echo "<h4>".$row['email']."</h4>";
								echo "<h4>".$row['phone']."</h4>";
								echo "</div></div>";
							 } 						    
					?>

		</div>
	</body>
	<?php
		include("footer.php");
	?>
</html>