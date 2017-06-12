<?php
include("connect.php");
	
 if ( isset( $_POST['submit_policies'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "policies/".$_FILES['pdfFile']['name'];
		$name=$_POST['name'];
		move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
		$sql = "INSERT INTO policies values (null,'$name','$dest_file');";
		mysql_query($sql,$link);
		echo "<script>alert('Successfully Added!!!'); </script>";
		
 	}
}

 if ( isset( $_POST['submit_process'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "process/".$_FILES['pdfFile']['name'];
		$name=$_POST['name'];
		move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
		$sql = "INSERT INTO process values (null,'$name','$dest_file');";
		mysql_query($sql,$link);
		echo "<script>alert('Successfully Added!!!'); </script>";
		
 	}
}
?>

<html>
	<head>
		<title>
			ADMIN
		</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <link href="../css/bootstrap.css" rel="stylesheet">
		<style type="text/css">
			body{
				padding-top: 850px;
			}
			.news{
				
				width: 100%;

			}
			.form-horizontal{
				margin-top: 3%;
			}
			
		</style>
		<script type="text/javascript">
			function toggle(name){
				document.getElementById("process_add").style.display= 'none' ;
				document.getElementById("policies_add").style.display= 'none' ;
				if(name=="policies")
					name1="process";
				else if(name=="process")
					name1="policies";
			if(document.getElementById(name).style.display== 'block')
  		  		document.getElementById(name).style.display= 'none' ;
  			else
  				{
  					document.getElementById(name).style.display= 'block' ;
  					document.getElementById(name1).style.display= 'none' ;
  				}
  		}
		</script>
	</head>
	<body>
		
		<div class="container">
		<?php
			include("navbar.php");
		?>
		<div class="row" >
				<button class="btn btn-primary"><a href="admin_news.php">DELETE NEWS</a></button>
				<button class="btn btn-primary" id="show_policies"OnClick="toggle('policies')">POLICY</button>
				<button class="btn btn-primary" id="show_process"OnClick="toggle('process')">PROCESS</button>
			</div>
			<div class="bg1 row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<!-- <div id="news" style="display:none;">
						<button class="btn btn-primary"  OnClick="toggle('news_add')">ADD NEWS</button>
						<button class="btn btn-primary"><a href="manager_news.php">UPDATE/DELETE NEWS</a></button>
					</div> -->
					<div style="display:none;" id="policies">
					<button class="btn btn-primary" OnClick="toggle('policies_add')">ADD POLICY</button>
					<button class="btn btn-primary" ><a href="admin_policies.php">UPDATE/DELETE POLICY</a></button>
					</div>
					<div style="display:none" id="process">
					<button class="btn btn-primary" id="process" OnClick="toggle('process_add')">ADD PROCESS</button>
					<button class="btn btn-primary" ><a href="admin_process.php">UPDATE/DELETE PROCESS</a></button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<!-- ADD NEWS -->
		<!-- <form style="display:none;" class="form-horizontal" role="form" method="post" action="" id="news_add">
		 		<h2 style="text-align:center; color:white;margin-top:25px;"><b>POST NEWS</b></h2>
				<div class="form-group">
					<input type="text" name="headline" class="headline">HEADLINE
				</div>
				<div class="form-group">
					<textarea name="news" class="news" rows="5">
					</textarea>
				</div>
			    <div class="form-group" >
			   	  <input type="submit" name="submit_news" class="btn btn-danger btn-lg" value="POST" style="margin-left:45%">
			  	</div> 
  			</form> -->
  			<!-- ADD POLICIES -->
  			<form style="display:none;" enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="" id="policies_add">
		 		<h2 style="text-align:center; color:white;margin-top:25px;"><b>ADD POLICIES</b></h2>
				<div class="form-group">
					<input type="text" placeholder="name" name="name" required style="margin-left:45%;">
				</div>
				<div class="form-group">
					<input type="file" name="pdfFile" style="margin-left:45%;">
				</div>
			    <div class="form-group" >
			   	  <input type="submit" name="submit_policies" class="btn btn-danger btn-lg" value="ADD POLICIES" style="margin-left:45%">
			  	</div> 
  			</form>
  			<!-- ADD PROCESS -->
  			<form style="display:none;" enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="" id="process_add">
		 		<h2 style="text-align:center; color:white;margin-top:25px;"><b>ADD PROCESS</b></h2>
				<div class="form-group">
					<input type="text" placeholder="name" name="name" required style="margin-left:45%;">
				</div>
				<div class="form-group">
					<input type="file" name="pdfFile" style="margin-left:45%;">
				</div>
			    <div class="form-group" >
			   	  <input type="submit" name="submit_process" class="btn btn-danger btn-lg" value="ADD PROCESS" style="margin-left:45%">
			  	</div> 
  			</form>

  		</div>
  	</body>
<?php
	include("footer.php");
?>

</html>