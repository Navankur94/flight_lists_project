<?php
session_start();
include_once "connection.php";
$cookie_name = 'flight_login';
$cookie_time = (3600 * 24 * 30); // 30 days
$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
$password=mysqli_real_escape_string($con,SHA1($_POST['password']));

$sql="SELECT login_id,user_name FROM `tbl_login_details` WHERE `user_name`='".$user_name."' AND `password`='".$password."' AND deleted_flag=0";
$validateAPIUserRes = mysqli_query($con,$sql);
if(mysqli_num_rows($validateAPIUserRes)==0) 
{
	//wrong username  or password
	echo $apiError ="Incorrect password or username";
}

else if(mysqli_num_rows($validateAPIUserRes)==1) 
{
	$callerRow = mysqli_fetch_assoc($validateAPIUserRes);
	$_SESSION['login_id']=$callerRow["login_id"];
	$_SESSION['user_name']=$callerRow["user_name"];
	header('Location:views/viewFlightDetails.php');	
}

?>