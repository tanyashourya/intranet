<?php
$db_hostname='localhost';
$db_username='cli';
$db_userpass='cli';
$db_name='cli';
$link= mysql_connect($db_hostname,$db_username,$db_userpass);
if(!$link) {
	die('could not connect'.mysql_error());
}
$db_selected=mysql_select_db($db_name,$link);
if(!$db_selected)
	die("could not use $db_name".mysql_error());

?>