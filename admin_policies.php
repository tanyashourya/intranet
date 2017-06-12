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
	  	<script type="text/javascript" >
			$(document).ready(function(){
			    $( ".delete" ).on("click",function(){
			    	$.ajax({
			        type:"post",
			        url:"delete.php",
			        data: {id:$(this).attr('id'),
			    			table:"policies"},
			        success: function( data ) {
			           if(data!=""){
			            	alert("delted!");
			            	window.location.href="admin_policies.php";
			           }
			        }
			        });
			    });
			});
		</script>
		<script type="text/javascript">
			function toggle(name){
			if(document.getElementById(name).style.display== 'block')
  		  		document.getElementById(name).style.display= 'none' ;
  			else
  				document.getElementById(name).style.display= 'block' ;
  		}
  		</script>
		<style type="text/css">
			.row{
				text-transform: uppercase;
				text-align: center;
				font-size: 20px;
				padding: 10px;
			}
			
		</style>
		</head>
	<body>
		<div class="container">
			<?php
				include("navbar.php");
			?>
			<h1>hello</h1>
			<?php
				include ('connect.php');
				$sql="SELECT * FROM policies;";
				$result=mysql_query($sql,$link);
					while ($row = mysql_fetch_array($result)) {
						echo "<div class='row'>".$row['name']."
						<button class='delete btn btn-primary' name='delete' id='$row[policy_id]' >delete</button>";
						} ?>
		</div>		
	</body>
</html>	
