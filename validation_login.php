<?php

$name="";
$pass="";
session_start();

$conn = mysqli_connect('localhost','root','','pharmacy');


$name = $_POST['user'];
$pass = $_POST['password'];

$s = "select * from user where username= '$name' && password='$pass'";
$result = mysqli_query($conn,$s);
$num = mysqli_num_rows($result);
//header('location:home.php');

if($num == 1)
{
	$_SESSION['username']=$name;
	header('location:home.php');
}
else
{
	header('location:login.php');
}

?>