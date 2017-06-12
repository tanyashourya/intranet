<html>
	<head>
		<title>
			POLICIES
		</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <link href="../css/bootstrap.css" rel="stylesheet">
	  	<meta charset= utf-8>
	  	<style type="text/css">
	  		object{
	  			width: 100%;
	  			height: 100%;
	  		}
	  	</style>
	</head>
	<body>
		<a href="employee.php"><button class="btn btn-primary">BACK</button></a><br>
		<?php
			$data=$_GET["data"];
			$type=$_GET["type"];
			include("connect.php");
			$sql="select * from $type where name='$data'";
			$result=mysql_query($sql,$link);
			$row=mysql_fetch_object($result);
			echo "<h1>".$row->name."</h1>";
			if($type=="policies")
				$fetch="policy";
			else
				$fetch="process";
			echo "<object data=".$row->$fetch."></object>";
			
			
		?>
	</body>

