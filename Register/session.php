<?php
include('login.php');
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'studenttour';

$connection = mysqli_connect($host, $user, $pass, $db);
		if (!$connection) {
			die('Could not connect: ' . mysql_error());
		}
		
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login-email'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select email from users where email='$loginemail'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['login-email'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: login.php'); // Redirecting To Home Page
}
?>