<html>
	<head>
		<title>HOME</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <link href="../css/bootstrap.css" rel="stylesheet">
	    <meta charset= utf-8>
		<style type="text/css">
			.left{
				background-color: #1173BF;
				color: white;
				text-align: center;
				padding: 10% 0 10% 0;
			}
			.right{
				background-color: #63A3E8;
				color: white;
				text-align: center;
				padding: 1% 2% 5% 2%;
				
			}
			.middle{
				padding: 0 10% 0 10%;
			}
			.links{
				padding: 5% 0 5% 0;
			}
			 .process , .policies{
				color: white;
				text-transform: uppercase;
				font-size: 18px;
			}
			h5{
				color: #757575;
			}
			h4{
				text-transform: uppercase;
			}
			article{
				font-size: 15px;
			}
			
          body{
             padding-top: 55px;
          }
		</style>
		<script type="text/javascript" >
			$(document).ready(function(){
			    $( ".policies" ).on("click",function(){
			    	$.ajax({
			        type:"post",
			        url:"page.php",
			        data: {id:$(this).attr('id')},
			        success: function( data ) {
			           if(data!=""){
			            	window.location.href="policies_view.php?data="+data+"&type=policies";
			            }
			            
			        }
			         });
			        });
			    $( ".process" ).on("click",function(){
			    	$.ajax({
			        type:"post",
			        url:"page.php",
			        data: {id:$(this).attr('id')},
			        success: function( data ) {
			           if(data!=""){
			            	window.location.href="policies_view.php?data="+data+"&type=process";
			            }
			        }
			         });
			        });
			     $( ".image" ).on("click",function(){

			     });
				});
		</script>
	</head>
	<body>
		
		<div class="container-fluid">
			<?php
			include("navbar.php");
		?>
			<div class="row">
				<!-- LEFT PANEL -->
				<div class="col-sm-2 left">
					<!-- POLICIES -->
					<div class="links">
						<?php
							include ('connect.php');
							$sql="SELECT * FROM policies;";
							$result=mysql_query($sql,$link);
							while ($row = mysql_fetch_array($result)) {
								echo "<div class='policies' id='$row[name]'>".$row['name']."</div><br><br>"; 
						} ?>
					</div>
					<!-- light blue box -->
				
				</div>
				
				<!-- MIDDLE PANEL -->
				<div class="col-sm-6 middle">
					<?php
						include("connect.php");
						$sql="SELECT * FROM news ORDER BY time DESC LIMIT 5";
						$result=mysql_query($sql,$link);
						echo "<h1><b>NEWS FEED</b></h1>";
						
						while ($row = mysql_fetch_array($result)) {
								echo "<div class='row'><h5>".$row['time']."</h5>";
								echo "<h5>UPDATED BY: ".$row['user_name']."</h5>";
								echo "<h4>".$row['headline']."</h4>";
							 	echo "<article>".$row['news']."</article><br>";
							 	if($row['image'] !='')
							 		{
							 			echo "<br><img data-toggle='modal' data-target='#myModal' class='image' id='$row[news_id]' src='news/". $row['image']."' height='100px'><hr></div>";
							 			echo '
							 				<div id="myModal" class="modal fade" role="dialog">
											  <div class="modal-dialog">

											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">'.$row['headline'].'</h4>
											      </div>
											      <div class="modal-body">
											        <h3>Updated by:'.$row['user_name'].' at '.$row['time'].'</h3>
											        <img src="news/'.$row['image'].'"width="100%">
											        <p>'.$row['news'].'</p>
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											      </div>
											    </div>

											  </div>
											</div>

							 			';

							 		}
							 	else
							 		echo "<hr></div>";
							  } 						    
						
					?>
					<div style="text-align:right"><button class="btn btn-primary"><a href="news.php" style="background-color: transparent;">more</a></button></div>
				</div>
				<!-- RIGHT PANEL -->
				<div class="col-sm-4 right">
					<!-- CALENDAR -->
					<div class="calendar">
							<iframe src="https://calendar.google.com/calendar/embed?height=350&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=en.indian%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Asia%2FCalcutta" style="border-width:0" width="400" height="400" frameborder="0" scrolling="no"></iframe>
					</div>
					<!-- NAVIGATE -->
					<div class="links">
						<?php
							$sql="SELECT * FROM process;";
							$result=mysql_query($sql,$link);
							while ($row = mysql_fetch_array($result)) {
								echo "<div class='process' id='$row[name]'>".$row['name']."</div><br><br><br>"; 
						} ?>
					</div>
						

				</div>
			</div>
		</div>
	</body>
	<?php
		include("footer.php");
	?>
<html>