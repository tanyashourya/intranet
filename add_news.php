<?php
include("connect.php");
	if(isset($_POST["submit_news"]))
{
  session_start();
  $user_name=$_SESSION["user_name"];
  $news="";
  $headline="";
  $news=$_POST["news"];
  $headline=$_POST["headline"];
  move_uploaded_file($_FILES["image"]["tmp_name"],"news/".$_FILES["image"]["name"])."";			
  $location=$_FILES["image"]["name"];
  $sql="INSERT INTO news values (null,NOW(),'$headline','$news','$user_name','$location');";
  $result=mysql_query($sql,$link);
   	echo "<script>alert('POSTED!');</script>";
  
 }
 ?>

<html>
	<head>
		<title>ADD NEWS</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <link href="../css/bootstrap.css" rel="stylesheet">
	    <style type="text/css">
			body{
				padding-top: 850px;
			}
			.news{
				width: 80%;
			}
			.container{
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<?php
				include("navbar.php");
			?>
			
			<form class="form-horizontal" role="form" method="post" action="" id="news_add" enctype = "multipart/form-data">
		 		<h2 style="text-align:center; color:white;margin-top:25px;"><b>POST NEWS</b></h2>
				<div class="form-group"><h3>Headline</h3><br>
					<input type="text" name="headline" required>
				</div>
				<div class="form-group"><h3>News</h3><br>
					<textarea name="news" class="news" rows="5">
					</textarea>
				</div>
				<div class="form-group"><h3>Image</h3><br>
					<input type="file" name="image" value="image" >
				</div>
			    <div class="form-group" >
			   	  <input type="submit" name="submit_news" class="btn btn-primary btn-lg" value="POST">
			  	</div> 
  			</form> 
		</div>
	</body>
	<?php
		include("footer.php");
	?>
</html>  		