<?php
                    if(isset($_POST["submit_search"])){
                        include("connect.php");
                        $search=$_POST["search"];
                        $sql="select * from login where name='$search' or id='$search';";
                        $result=mysql_query($sql,$link);
                        if(mysql_num_rows($result)==0)
                        {
                            $sql="select * from clients where client_name='$search' or company_name='$search';";
                            $result=mysql_query($sql,$link); 
                            if(mysql_num_rows($result)==0)
                            {  
                            header("location: directory.php");
                            }
                            else
                                $table="clients";
                        }
                        else
                            $table="login";
                    header("location: searchResult.php?search=".$search."&table=".$table);
                }
?>
<style type="text/css">
    .bg-primary,.dropdown-menu a:hover{
                background-color: #002E5D;
                color: white;
            }
     a{
        color: white;
     }       
            .nav-item :active{
                background-color: white;
                color: #002E5D;
            }
         
          
          /*.dropdown:hover,.dropdown active{
            background-color: white;
            color: #002E5D;
          }*/
          .dropdown{
            padding: 7px;
            text-align: center;
            margin: 0px;
          }
           body{
             padding-top: 55px;
          }
</style>
<nav class="navbar  navbar-fixed-top  navbar-dark  bg-primary">
    <!--Links-->
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a href="employee.php"class="nav-link">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item btn-group bg-primary" >
                <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"  aria-expanded="false">
                  Directory</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <div class="dropdown bg-primary"><a href="clients.php" class="dropdown-item">Clients</a></div>
                    <div class="dropdown bg-primary"><a href="directory.php"class="nav-link">Employees</a></div>
                </div>
            </li>
            <li class="nav-item">
                <a href="feedback.php" class="nav-link">Feedback</a>
            </li>
            <li class="nav-item">
                <a href="add_news.php" class="nav-link">Add News</a>
            </li>
            <li class="nav-item">
                <a href="task_board.php?year=<?php echo date('Y')?>" class="nav-link">Task Board</a>
            </li>
            <li class="nav-item" style="padding:0 10px 0 10px;">

					<form method="post" action="" class="form-inline" style="margin-top:3%;">
						<div class="input-group">
						   <input type="text" class="form-control" placeholder="Search Employee" id="txtSearch" name="search"/>
						   <div class="input-group-btn">
						        <button class="btn btn-primary" name="submit_search"type="submit">
						        <span class="glyphicon glyphicon-search"></span>
						        </button>
						   </div>
						</div>
					</form>
            </li>
            <li class="nav-item btn-group bg-primary" style="float:right">
                <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"  aria-expanded="false">
                	<?php
						session_start();
						$id=$_SESSION["id"];
						include("connect.php");
						$sql="select name from login where id='$id';";
						$result=mysql_query($sql,$link);
						$row=mysql_fetch_object($result);
						echo "Welcome ".$row->name;
						$_SESSION['user_name']=$row->name;
					?>
                </a>
            	<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <div class="dropdown bg-primary"><a href="mytask_board.php?year=<?php echo date('Y')?> " class="dropdown-item">My Taskboard</a></div>
                    <div class="dropdown bg-primary" >
                        <?php
                            if($_SESSION["user_name"]=="admin")
                                echo "<a href='admin.php'>admin</a>";
                        ?>
                    </div>
                    <div class="dropdown bg-primary" ><a href="dashboard.php" class="dropdown-item">profile</a></div>
                    <div class="dropdown bg-primary"><a href="logout.php" class="dropdown-item">logout</a></div>
                </div>
            </li>
        </ul>
</nav>
<!--/.Navbar-->
