<?php
session_start();
$id=$_GET['id'];
error_reporting(E_ALL ^ E_DEPRECATED);
$con=mysqli_connect("localhost","root","","joysworth");
$query="delete from participant where e_id='".$id."'";
$result=mysqli_query($con,$query);
mysqli_close($con);
echo '<script type="text/javascript">alert("deleted Successfully");window.location=\'profile.php\';</script>';
?>
