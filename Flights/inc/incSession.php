<?php
session_start();
session_write_close();
$login_id=0;

if(array_key_exists("login_id",$_SESSION))
{	
	$login_id = $_SESSION['login_id'];
	$user_name =  $_SESSION['user_name'];
}	
else
{	
	
	header('Location:../index.php');
	exit;
}
?>
