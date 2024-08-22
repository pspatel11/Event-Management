<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$id=$_SESSION['username'];
$name=$_POST['name'];
$add=$_POST['add'];
$mob=$_POST['mob'];
$age=$_POST['age'];

error_reporting(E_ALL ^ E_DEPRECATED);
$con=mysqli_connect("localhost","root","","joysworth");
$query="update user set name='".$name."',address='".$add."',contact='".$mob."',age='".$age."' where email='".$id."'";
$result=mysqli_query($con,$query);
mysqli_close($con);
echo '<script type="text/javascript">alert("Updated Successfully");window.location=\'profile.php\';</script>';
?>
