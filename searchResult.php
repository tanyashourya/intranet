
<?php
						include("connect.php");
						$search1=$_GET["search"];
						$table=$_GET["table"];
						if($table=="login")
						{
							$var1="name";$var2="id";
						}
						else
						{
							$var1="client_name";$var2="company_name";
						}	
						$sql1="select * from $table where $var1='$search1' or $var2='$search1';";
						$result1=mysql_query($sql1,$link);
						$row1=mysql_fetch_object($result1);
						
?>
<html>
	<head>
		<title>
			Search Result
		</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <link href="../css/bootstrap.css" rel="stylesheet">
	    <style type="text/css">
	    	body{
	    		background-image: url("images/bg.png");
	    		background-size: cover;
	    		background-repeat: no-repeat;
	    	}
	    	#data{
	    		font-size:20px;
	    		padding: 1% 0 1% 0;
	    		text-transform: uppercase;
	    	}
	    	.col-sm-8{
	    		padding: 1% 0 5% 0;
	    		
	    	}
	    	#pic{
	    		opacity: 0;
	    		position: absolute;
	    		top: 50%;
			  	left: 60%;
			  	transform: translate(-50%, -50%);
			  	-ms-transform: translate(-50%, -50%);
			  	transition: .5s ease;
  			  
	    	}
	    	.col-sm-4{
	    		position: relative;
	    		
	    	}
	    	
	    	.container{
	    		background-image: url("images/bg1.png");
	    		padding: 5% 5% 10% 5%;
	    		margin: 0 5% 0 10%;
	    	}
	    </style>
</head>
<body >
		<?php
			include("navbar.php");
		?>
	<div class="container">
				<!-- PROFILE PICTURE-->
		<div class="row">
			<?php
				if($_GET['table']=='login')
				{
					echo '
			<div class="col-sm-4">
				<img src="uploads/'.$row1->image.'" width="300px" height="300px" class="img-circle">
			</div>
			<div class="col-sm-8" style="padding-left:5%">
				
				<div class="row" id="data" >
					
					<h1>'.$row1->name.'</h1>
					<h2>'.$row1->id.'</h2>	
					<h3>'.$row1->profile.'</h3>
					<div id="data">'.$row1->email.'</div>
					<div id="data">'.$row1->phone.'</div>
				</div>
			</div>';}
				else
				{
					echo '
					<div class="row" id="data" >
					
					<h1>'.$row1->client_name.' </h1>
					<h2>'.$row1->company_name.' </h2>	
					<div id="data">'.$row1->email.'</div>
					<div id="data">'.$row1->contact.'</div>
				</div>
					';
				}
				?>
			
		</div><!--row outer closes-->
	</div> <!--container closes-->
	</body>
	
		<?php
			include("footer.php");
		?>
		
</html>	