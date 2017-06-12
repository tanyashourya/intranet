
<?php
	include("connect.php");	 
		session_start();
		$id=$_SESSION['id'];
		if (isset($_POST['submit_image'])) {
 			move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);			
			$location=$_FILES["image"]["name"];
			
			$sql1 = "UPDATE login SET image='$location' WHERE id='$id';";
			mysql_query($sql1,$link);
			echo "<script>alert('Successfully Added!!!'); </script>";
		}

	if (isset($_POST['submit_email'])){
		$email=$_POST['email'];
		$sql2 = "UPDATE login SET email='$email' WHERE id='$id';";
		mysql_query($sql2,$link);
		echo "<script>alert('Successfully Updated!!!'); </script>";

	}
	if (isset($_POST['submit_contact'])){
		$contact=$_POST['contact'];
		$sql3 = "UPDATE login SET phone='$contact' WHERE id='$id';";
		mysql_query($sql3,$link);
		echo "<script>alert('Successfully Updated!!!'); </script>";

	}
	if (isset($_POST['submit_new_password'])){
		$password=$_POST['new_password'];
		$sql4 = "UPDATE login SET password='$password' WHERE id='$id';";
		$result4=mysql_query($sql4,$link);
		echo "<script>alert('Successfully Updated!!!'); </script>";

	}

		?>


<html>
	<head>
		<title>
			DASHBOARD
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
	    	img:hover{
	    		opacity: 0.5;
	    	}
	    	.col-sm-4:hover #pic{
	    		opacity: 1;
	    	}
	    	a{
	    		color: white;
	    	}
	    	a:hover{
	    		color: white;
	    	}
	    	a:active{
	    		color: white;
	    	}
	    	.container{
	    		background-image: url("images/bg1.png");
	    		padding: 5%;
	    		margin: 0 5% 0 10%;
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
				<!-- WELCOME HEADING -->
				<h1><?php
						//session_start();
						$name=$_SESSION['user_name'];
						//include("connect.php");
						echo "Welcome ".$name."</h1><br><br>";
						$sql5="select * from login where name='$name';";
						$result5=mysql_query($sql5);
						$row5=mysql_fetch_object($result5);
				?>
			</div>
			<div class="col-sm-6">
				
			</div>
		</div>
		<!-- PROFILE PICTURE-->
		<div class="row">
			<div class="col-sm-4">
				<img src="uploads/<?php echo $row5->image; ?>" width="300px" height="300px" class="img-circle">
				<br><br>
				<form id="pic" class="form-horizontal" role="form" method="post" action="" enctype = "multipart/form-data" >
					<input type="file" name="image" value="image" >
					<input type="submit" value="submit" name="submit_image" class="btn btn-primary btn-sm">
				</form>
			</div>
			<div class="col-sm-8" style="padding-left:5%">
				<div class="row" id="data" >
					<!-- DETAILS-->
					<!--job profile / designation-->
					<h1><?php
						
						echo $row5->name;
					?></h1>
					<h2><?php
						echo $row5->id;
					?></h2>	
					<h3><?php
						
						echo $row5->profile;
					?></h3>
					
				</div>
				<div class="row" id="data" >
					<!--email-->
					<?php
						
						echo $row5->email;
					?>
					
				</div>
				<div class="row" id="data" >
					<!--contact-->
					<?php
						
						echo $row5->phone;
					?>
					<button onClick='show("contact")' class="btn btn-link btn-xs">Edit contact</button>
					<form action="" method="post" id="contact" style="display:none;" class="form-group">
					<input  type="number" name="contact" maxlength="10">
					<input type="submit" value="submit" name="submit_contact"  class="btn btn-primary">
					</form>
				</div><!--row inner closes-->
				<div class="row">
					<label onClick='show("password")'>Change Password</label>
					<form action="" method="post" id="password" style="display:none;" class="form-group">
						<input  type="password" name="old_password" placeholder="input old password">
						<input type="submit" value="submit" name="submit_old_password"  class="btn btn-primary">
					</form>
					<?php
							if (isset($_POST['submit_old_password'])){
								$password=$_POST['old_password'];
								$id=$_SESSION['id'];
								$sql6 = "select * from login where id='$id';";
								$result6=mysql_query($sql,$link);
								$row6=mysql_fetch_object($result6);
								if($password==$row6->password)
								{
									echo "
								<form method='post' class='form-group'>
								<input type='password' name='new_password' placeholder='new password'>
								<input type='submit' name='submit_new_password' value='submit'>
								</form>";
								}
								else
								{
									echo "<script>alert('wrong password!')</script>";
								}

							}
					?>
				</div>
			</div><!--col-sm-8 closes-->
		</div><!--row outer closes-->
	</div> <!--container closes-->
</body>
	<script type="text/javascript">
		function show(name){
			if(document.getElementById(name).style.display== 'block' )
  		  		document.getElementById(name).style.display= 'none' ;
  			else
  				document.getElementById(name).style.display= 'block' ;
  		  
}
	</script>
<?php
	include("footer.php");
?>									
</html>