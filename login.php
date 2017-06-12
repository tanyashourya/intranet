<!-- sign in -->
<?php                                                             
if(isset($_POST["id"]))
{
  $err_msg="";
  $password="";
  $id="";
  $type="";
  $id=$_POST["id"];
 
  $password=$_POST["password"];
  include("connect.php");
  $sql="Select * from login where id='$id' And password='$password'";
  $result=mysql_query($sql,$link);
  if(mysql_num_rows($result)==0)
   { 
    echo "<script>alert('Invalid Login'); </script>";
  }
  else
  {
   
    $row=mysql_fetch_object($result);
    //$type=mysql_result($result, 2);
    session_start();
    $type=$row->type;
    $_SESSION['id']=$id;
    $_SESSION['user_name']=$row->name;
    $_SESSION['type']=$type;
         
    if($type=="admin")
    	header("location:  admin.php"); 
    else
    	header("location:  employee.php"); 
  }
}
?>
<html>
	<head>
		<title>LOGIN CLINF</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <link href="../css/bootstrap.css" rel="stylesheet">
		<style type="text/css">
			body{
				background-image: url('images/bg1.jpg');
				background-size: cover;
				background-repeat: no-repeat;
			}
			.form {
				
				background-image: url('images/white.png');
				margin: 10% 20% 0 45%; 
				padding: 3% 1% 3% 1%;
				
				position: relative;
			}
			.logo{
				margin: 5% 0 0 17%;
			}

		</style>
	</head>
	<body>
		
		 		
		 	
		<div class="form">		 	
		 	<form class="form-horizontal" role="form" method="post" action="">
		 		<img src="images/logo.jpg" class="logo">
				<h3 style="padding-left:17%;"><b>MEMBER LOGIN</b></h3>
				<div class="form-group">

     		      <div class="col-sm-2"></div>
     		      <div class="col-sm-4"><label>ID</label><input type="text" name="id" class="form-control" placeholder="ID" required></div>
  				  <div class="col-sm-6"></div>
  				</div>
   
  				<div class="form-group">
      				<div class="col-sm-2"></div>
      				<div class="col-sm-4"><label>PASSWORD</label><input type="password" name="password" class="form-control" placeholder="Password" required></div>
      				<div class="col-sm-6"></div>
  				</div>
			    <div class="form-group" >
			  	  <div class="col-sm-2"></div>
			  	  <div class="col-sm-4"><input type="submit" name="submit" class="btn btn-danger" value="LOGIN"></div>  
			  	  <div class="col-sm-6"></div>
			    </div> 
  		</div>
					
			</form>
		</div>	
		  
	</body>

</html>