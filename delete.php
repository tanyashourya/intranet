<?php
	session_start();
	$user_name=$_SESSION["user_name"];
	$id=$_POST["id"];
	$table=$_POST["table"];
	include("connect.php");
	if ($table=="news")
		$value="news_id";
	else if($table=="policies")
		$value="policy_id";
	else if($table=="process")
		$value="process_id";
	else if($table=="clients")
		$value="id";
		$sql="DELETE FROM $table WHERE $value='$id'";
		$result=mysql_query($sql,$link);
		echo "successful";
?>