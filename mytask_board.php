<?php
include("connect.php");
	if(isset($_POST["submit_task"]))
	{
	  session_start();
	  $username=$_SESSION['user_name'];
	  $task=$_POST["task"];
	  $minutes=$_POST["minutes"];
	  $remarks=$_POST["remarks"];
	  $date=$_POST["date"];
	  $week=date("W",strtotime($date)); $year=date("Y",strtotime($date));
	  $sql1="INSERT INTO tasks values (null,'$username','$date','$week','$year','$task','$minutes','$remarks');";
	  $result1=mysql_query($sql1,$link);
	}
?>
<html>
	<head>
		<title>MY TASK BOARD</title>
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

			<form class="form-horizontal" role="form" method="post" action="" id="news_add">
		 		<br><br><br><br>
		 		<div class="row">
					<div class="form-group col-sm-3">
						TASK <input type="text" name="task">
					</div>
					<div class="form-group col-sm-3">
						MINUTES <input type="number" name="minutes">
					</div>
					<div class="form-group col-sm-3">
						REMARKS <input type="text" name="remarks">
					</div>
					<div class="form-group col-sm-3">
						DATE <input type="date" name="date">
					</div>
				</div>
				<div class="row">
			        <input type="submit" name="submit_task" class="btn btn-primary" value="add">
			  	</div> 
			
  			</form> 


  			<div class="row">
					<ul class="pagination">
						<?php
							$current_year=date("Y");
							session_start();
							$username=$_SESSION['user_name'];
							//get the min year from database
							
							$result_check_year=mysql_query("SELECT * from tasks where username='$username';");
							if(mysql_num_rows($result_check_year)>0)
								{
									$result_min_year=mysql_query("SELECT MIN(year) as min_year from tasks where username='$username';");
									$row_min_year=mysql_fetch_object($result_min_year);
									$min_year=$row_min_year->min_year;
								}
							else
								$min_year=$current_year;
							$var_year=$current_year;
							while($var_year>=$min_year)
							{
								echo "<li><a href='mytask_board.php?year=$var_year'>$var_year</a></li>";
								$var_year--;
							}
						?>
					</ul>
				</div>
  				<?php  					
						include("connect.php");						
						//fetch all tasks from database
						$year=$_GET['year'];
						echo "<h1>My Task Board $year</h1>";
						//min week
						$result_check_week=mysql_query("SELECT * from tasks where year='$year' and username='$username'");
						if(mysql_num_rows($result_check_year)>0 && mysql_num_rows($result_check_week)>0){
							$result_min_week=mysql_query("SELECT MIN(week) as min_week from tasks where year='$year' and username='$username';");
							$row_min_week=mysql_fetch_object($result_min_week);
							$min_week=$row_min_week->min_week;
							//max week 
							$result_max_week=mysql_query("SELECT MAX(week) as max_week from tasks where year='$year' and username='$username';");
							$row_max_week=mysql_fetch_object($result_max_week);
							$max_week=$row_max_week->max_week;
							// 
							$week=$max_week;
			  				
			  				while($week>=$min_week)
			  				{
			  					//fetch weekly tasks from database
													
				  					$sql_hours="SELECT SUM(minutes) as sum_min FROM tasks WHERE username='$username' AND week='$week' AND year='$year' ;";
									$result_hours=mysql_query($sql_hours,$link);
									$row_hours = mysql_fetch_object($result_hours);
									$hours=round($row_hours->sum_min/60,2);
									if($hours!=0)
									{
										echo "<div class='row'>";
											echo "<div class='col-sm-4'>week:$week</div>";
											echo "<div class='col-sm-4'>hours:$hours</div>";
											echo "<div class='col-sm-4 details_btn btn' id='$week'>details</div>";
										echo "</div>";
										$sql_task="SELECT * FROM tasks where username='$username' AND week='$week' AND year='$year' ORDER BY time DESC;";
										$result_task=mysql_query($sql_task);
										echo"<div class='row details $week'>
									  					<div class='col-sm-4'>task</div>
									  					<div class='col-sm-4'>minutes</div>
									  					<div class='col-sm-4'>remarks</div><hr>
									  				</div>";
										while ($row_task = mysql_fetch_object($result_task)) {								
												echo "<div class='row details $week'>";
													echo "<div class='col-sm-4'>$row_task->task</div>";
													echo "<div class='col-sm-4'>$row_task->minutes</div>";
													echo "<div class='col-sm-4'>$row_task->remarks</div>";
												echo "</div>";															
										}
										echo "<hr><hr>";
									}								
									$week --;
								}
							}	
					
				?>






  	</div> <!--container closes -->		
	</body>
	<?php
		include("footer.php");
	?>
</html> 		