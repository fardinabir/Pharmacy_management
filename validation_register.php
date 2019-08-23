<?php

$name="";
$pass="";
session_start();

$conn = mysqli_connect('localhost','root','','pharmacy');


$name = $_POST['user'];
$pass = $_POST['password'];

$s = "select * from user where username= '$name'";
$result = mysqli_query($conn,$s);
$num = mysqli_num_rows($result);
//header('location:home.php');

if($num == 1)
{
	echo "Username Already Taken ! <br> Try another..!! ";
}
else
{
	$s = "INSERT INTO `user`(`username`, `password`) VALUES ('$name','$pass')";
	$result = mysqli_query($conn,$s);
	header('location:login.php');
}

?>