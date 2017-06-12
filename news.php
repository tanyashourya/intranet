<html>
	<head>
		<title>NEWS</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <link href="../css/bootstrap.css" rel="stylesheet">
	    <meta charset= utf-8>
	    <style type="text/css">
	    	.white{
	    		text-align: center;
	    		background-image: url("images/bg1.png");
	    	}
	    	body{
	    		background-image: url("images/bg5.jpg");
	    		background-repeat: no-repeat;
	    		background-size: cover;
	    		background-attachment: fixed;
	    	}
	    	footer{
				background-color: #002E5D;
				text-align: center;
				color: white;
				font-size: 18px;
				padding: 3%;
			}
			h5{
				color: #757575;
			}
			h4{
				text-transform: uppercase;
			}
			article{
				font-size: 15px;
			}
		body{
             style="padding-top: 265px; "
          }
	    </style>
	</head>
	<body>
		<?php
			include("navbar.php");
		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8 white">
					<a href="employee.php"><button class="btn btn-primary">BACK</button></a>
					<?php
						include("connect.php");
						$sql="SELECT * FROM news ORDER BY time DESC";
						$result=mysql_query($sql,$link);
						echo "<h1><b>NEWS FEED</b></h1>";
						while ($row = mysql_fetch_array($result)) {
								echo "<div class='row'><h5>".$row['time']."</h5>";
								echo "<h5>UPDATED BY: ".$row['user_name']."</h5>";
								echo "<h4>".$row['headline']."</h4>";
							 	echo "<article>".$row['news']."</article><br>";
							 	if($row['image'] !=''){
							 		echo "<br><img data-toggle='modal' data-target='#myModal' class='image' id='$row[news_id]' src='news/". $row['image']."' height='100px'><hr></div>";
							 		echo '
							 				<div id="myModal" class="modal fade" role="dialog">
											  <div class="modal-dialog">

											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">'.$row['headline'].'</h4>
											      </div>
											      <div class="modal-body">
											        <h3>Updated by:'.$row['user_name'].' at '.$row['time'].'</h3>
											        <img src="news/'.$row['image'].'"width="100%">
											        <p>'.$row['news'].'</p>
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											      </div>
											    </div>

											  </div>
											</div>

							 			';
							 	}
							 		
							 	else
							 		echo "<hr></div>";
							  } 	
			?>
				</div>
				<div class="col-sm-2">
				</div>
			</div>
			
		</div>
	</body>
	<footer>
		copyright@CLI 		All Rights Reserved.
	</footer>
</html>