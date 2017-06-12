<?php
	if(isset($_POST["update"]))
	{
	//add into policy
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "files/".$_FILES['pdfFile']['name'];
		$name=$_POST['name'];
		move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
		include("connect.php");
		$sql="delete from policies where name='$name';";
		$result=mysql_query($sql,$link);
		$sql = "INSERT INTO policies values ('$name','$dest_file');";
		mysql_query($sql,$link);
		echo "<script>alert('Successfully Added!!!'); </script>";
		
		}
	}
	
?>
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
			    $( ".view" ).on("click",function(){
			    	$.ajax({
			        type:"post",
			        url:"page.php",
			        data: {id:$(this).attr('id')},
			        success: function( data ) {
			           if(data!=""){
			            	window.location.href="policies_view.php?data="+data;
			            }
			            
			        }
			         });
			        });
			    $( ".update" ).on("click",function(){
			    	$.ajax({
			        type:"post",
			        url:"page.php",
			        data: {id:$(this).attr('id')},
			        success: function( data ) {
			           <?php
			           		$sql="INSERT INTO "
			           ?>
			        }
			         });
			        });
			    $( ".delete" ).on("click",function(){
			    	$.ajax({
			        type:"post",
			        url:"page.php",
			        data: {id:$(this).attr('id')},
			        success: function( data ) {
			           if(data!=""){
			            	window.location.href="policies_view.php?data="+data;
			            }
			            
			        }
			         });
			        });


			});
</script>
		<style type="text/css">
			.row{
				text-transform: uppercase;
				text-align: center;
				font-size: 20px;
				padding: 10px;
			}
			.update , .delete{
				
			}
		</style>
		</head>
	<body>
		<div class="container">
			<?php
				include ('connect.php');
				$sql="SELECT * FROM policies;";
				$result=mysql_query($sql,$link);
					while ($row = mysql_fetch_array($result)) {
						echo "<div class='row'>".$row['name']."
						<form action='' method='post'><input type='submit' name='view' id='$row[name]' value='view' class='view btn btn-danger'></form>
						<input type='submit' name='update' id='$row[name]' value='update' class='update btn btn-danger'>
						</div>"; 
						} ?>
				
	</body>
</html>		
