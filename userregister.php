 <?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

$_SESSION['name']=$_POST['name'];
$add=$_POST['add'];
$mob=$_POST['mob'];
$age=$_POST['age'];
$pass=$_POST['pass'];
$_SESSION['email']=$_POST['email'];

	error_reporting(E_ALL ^ E_DEPRECATED);
	$con=mysqli_connect("localhost","root","","joysworth");
	$check="select * from user where email='".$_SESSION['email']."'";
	$re=mysqli_query($con,$check);
	$count=mysqli_num_rows($re);
	if($count!=0)
	{
		echo '<script type="text/javascript">alert("Email Id already exist");window.location=\'profile.php\';</script>';
	}
	else
	{
		error_reporting(E_ALL ^ E_DEPRECATED);
		$con=mysqli_connect("localhost","root","","joysworth");
		$query="insert into user values('".$_SESSION['name']."','".$_SESSION['email']."','".$pass."','".$age."','".$mob."','".$add."')";
		$result=mysqli_query($con,$query);
	}
	mysqli_close($con);
	echo '<script type="text/javascript">alert("Register Successfully");window.location=\'profile.php\';</script>';
?>