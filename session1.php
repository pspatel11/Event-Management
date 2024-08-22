<?php
$user=$_POST['username'];
$pass=$_POST['password'];
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(E_ALL ^ E_DEPRECATED);
	$con=mysqli_connect("localhost","root","","joysworth");
	$query="select * from user where email='".$user."' and password='".$pass."'";
	$result=mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
		if($count!=0)
		{
	
			session_start();
			$_SESSION['username']=$user;
			$_SESSION['password']=$pass;
			$_SESSION['last_login_timestamp'] = time();
			header("location:session2.php");
		}
		else
		{
			echo '<script type="text/javascript">alert("Wrong Username & Password");window.location=\'profile.php\';</script>';
		}
mysqli_close($con);
?>