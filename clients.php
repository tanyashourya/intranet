<?php
	include("connect.php");
	if(isset($_POST['submit_client'])){
		
		$client_name=$_POST['client_name'];
		$company=$_POST['company'];
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		mysql_query("INSERT INTO clients VALUES (null,'$company','$client_name','$email','$contact');");
	}
	if(isset($_POST['submit_edit'])){
		$id=$_POST['id'];
		$phone_new=$_POST['phone_new'];
		$email_new=$_POST['email_new'];
		mysql_query("UPDATE clients SET email='$email_new',contact='$phone_new' WHERE id='$id';");
	}
?>

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
	    		padding-top: 265px; 
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
	    <script type="text/javascript">
			$(document).ready(function(){
		    	$(".edit").click(function(){
				
			    $class= "."+ $(this).attr('id');
			    $($class).toggle();

				});
				$( ".delete" ).click(function(){
			    	$.ajax({
			        type:"post",
			        url:"delete.php",
			        data: {id:$(this).attr('id'),
			    			table:"clients"},
			        success: function( data ) {
			           if(data!=""){
			            	alert("delted!");
			            	window.location.href="clients.php";
			           }
			        }
			        });
			    });
		    });
		</script>
	</head>
	<body>

<?php
	include("navbar.php");
?>
		<div class="container">
			<div class="row">
				<h1 style="text-align:center">Directory</h1>
			</div>
			<?php
				session_start();
				if($_SESSION['type']!="emp")
				{
					echo'			
					<form class="form-horizontal row" role="form" method="post" action="">
				 		<br><br><br><br>
						<div class="form-group col-sm-3">
							Name :<input type="text" name="client_name" >
						</div>
						<div class="form-group col-sm-3">
							Company: <input type="text" name="company" >
						</div>
						<div class="form-group col-sm-3">
							Phone: <input type="text" name="contact">
						</div>
					    <div class="form-group col-sm-3" >
					   	 Email: <input type="email" name="email">
					  	</div> 
					  	<div class="form-group ">
					  		<input type="submit" name="submit_client" class="btn btn-primary" value="add">
					  	</div>
					
		  			</form>';
		  		}
  			?>
			
					<!-- DIRECTORY -->
					<?php
						include("connect.php");
						$sql_clients="SELECT * FROM clients;";
						$result_clients=mysql_query($sql_clients,$link);
						while ($row_client= mysql_fetch_array($result_clients)) {
								echo "<div class='row profile'>";
								echo "<div class='col-sm-6'>";
								echo "<h2>".$row_client['company_name']."</h2>";
								echo "<h4>".$row_client['client_name']."</h4>";
								echo "<h4>".$row_client['email']."</h4>";
								echo "<h4>".$row_client['contact']."</h4>";
								echo "</div>";
								#editing rights
								if($_SESSION['type']!="emp")
								{
									echo "<div class='col-sm-6'>
											<button  id='$row_client[id]' class='edit btn btn-primary' >edit</button>
											<button  id='$row_client[id]' class='delete btn btn-primary'>delete</button>
										</div>
										<br><br><br>
										<form class='form-horizontal $row_client[id]' role='form' method='post' style='display:none;'>
				 							Phone:<input type='text' name='phone_new' value='$row_client[contact]'><br>
				 							Email:<input type='text' name='email_new' value='$row_client[email]'><br>
				 							<input type='text' name='id' value='$row_client[id]' style='display:none;'>
				 							<input type='submit' name='submit_edit' value='save' class='btn btn-primary'>
				 						</form>
									</div>";

								}
								else
								{
									echo "</div>";
								}

							 } 						    
					?>

		</div>
	</body>
	<?php
		include("footer.php");
	?>
</html>