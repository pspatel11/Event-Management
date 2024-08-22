<?php
session_start();
$e_id=$_GET['id'];		
error_reporting(E_ALL ^ E_DEPRECATED);
$con=mysqli_connect("localhost","root","","joysworth");
$query="insert into participant values('".$_SESSION['username']."','".$e_id."')";
$result=mysqli_query($con,$query);
header("location:index.php");
?>