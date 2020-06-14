<?php
session_start();
include_once "../connection.php";

$cookie_name = 'EduTechLogin';
if(isSet($_COOKIE[$cookie_name]))
{
   // remove 'site_auth' cookie
   setcookie ($cookie_name, '', time() - $cookie_time);
}
session_destroy();
header('Location:index.php');
exit;
?>
