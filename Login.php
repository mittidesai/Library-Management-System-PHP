<html>
<head>
<title>Login Page</title>

</head>
<body>
<?php
echo "I am in echo";
$cn = mysqli_connect("localhost","root","","login");
echo $cn;
echo "I cleared connection";
echo "Connected Successfully";
error_reporting(0);
session_start()
?>
	
<?php

error_reporting(0);
session_start();
$username=$_REQUEST["username"];
echo $username;
if(!$username)
echo "Enter A Username And Password";
else
{
	$login1 = "SELECT * FROM users WHERE Username ='$username'";
	$res=mysqli_query($login1,$cn);
	$row=mysqli_fetch_array($res);
	$counter=mysqli_num_rows($res);
	
</body>
</html>