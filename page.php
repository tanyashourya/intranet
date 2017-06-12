<?php
if($_POST){
	$id=$_POST['id'];
	echo $id;
}else{
	$id=$_GET;
	echo $id;
}
?>

