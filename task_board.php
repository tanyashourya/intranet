<html>
	<head>
		<title>TASK BOARD</title>
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
			.details{
				display: none;
				padding:5%;
				background-color: #bdbdbd;
			}
		</style>
		<script type="text/javascript">
			function toggle (name) {
				if(document.getElementById(name).style.display=="none")
					document.getElementById(name).style.display="block";
				else
					document.getElementById(name).style.display="none";
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
		    	$(".details_btn").click(function(){
				
			    $class= "."+ $(this).attr('id');
			    $($class).toggle();

				});
		    });
		</script>
	</head>
	<body>
		<div class="container">
			<?php
				include("navbar.php");
			?>
			<div>
				<div class="row">
					<ul class="pagination">
						<?php
							//get the min year from database
							$result_min_year=mysql_query("SELECT MIN(year) as min_year from tasks;");
							$row_min_year=mysql_fetch_object($result_min_year);
							$min_year=$row_min_year->min_year;
							$current_year=date("Y");
							$var_year=$current_year;
							while($var_year>=$min_year)
							{
								echo "<li><a href='task_board.php?year=$var_year'>$var_year</a></li>";
								$var_year--;
							}
							
						?>


					  
					  
					</ul>
				</div>
  				<?php
					include("connect.php");
					//fetch all tasks from database
					$year=$_GET['year'];
					echo "<h1>Task Board $year</h1>";
					//min week
					$result_min_week=mysql_query("SELECT MIN(week) as min_week from tasks where year='$year';");
					$row_min_week=mysql_fetch_object($result_min_week);
					$min_week=$row_min_week->min_week;
					//max week 
					$result_max_week=mysql_query("SELECT MAX(week) as max_week from tasks where year='$year';");
					$row_max_week=mysql_fetch_object($result_max_week);
					$max_week=$row_max_week->max_week;
					// 
					$week=$max_week;
	  				
	  				while($week>=$min_week)
	  				{
	  					//fetch weekly tasks from database
						$sql_user="SELECT * FROM login;";
		  				$result_user=mysql_query($sql_user,$link);
		  				while ($row_user=mysql_fetch_object($result_user)) {
		  				//this week		 
		  					echo "<div>"; 					
		  					$sql_hours="SELECT SUM(minutes) as sum_min FROM tasks WHERE username='$row_user->name' AND week='$week' AND year='$year' ;";
							$result_hours=mysql_query($sql_hours,$link);
							$row_hours = mysql_fetch_object($result_hours);
							$hours=round($row_hours->sum_min/60,2);
							echo "<div class='row'>";
								echo "<div class='col-sm-4'>$row_user->name</div>";
								echo "<div class='col-sm-4'>$hours</div>";
								echo "<div class='col-sm-4 details_btn btn' id='$row_user->id"."$week'>details</div>";
							echo "</div>";
							$sql_task="SELECT * FROM tasks where username='$row_user->name' AND week='$week' AND year='$year' ORDER BY time DESC;";
							$result_task=mysql_query($sql_task);
							echo"<div class='row details $row_user->id"."$week'>
						  					<div class='col-sm-4'>task</div>
						  					<div class='col-sm-4'>minutes</div>
						  					<div class='col-sm-4'>remarks</div><hr>
						  				</div>";
							while ($row_task = mysql_fetch_object($result_task)) {								
									echo "<div class='row details $row_user->id"."$week'>";
										echo "<div class='col-sm-4'>$row_task->task</div>";
										echo "<div class='col-sm-4'>$row_task->minutes</div>";
										echo "<div class='col-sm-4'>$row_task->remarks</div>";
									echo "</div>";															
							}
						}
						echo "<hr><hr>";
						$week --;
					}
				?>
			</div>
		</div>
	</body>
	<?php
		include("footer.php");
	?>
</html>  		