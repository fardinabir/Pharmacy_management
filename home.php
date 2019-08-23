<?php

session_start();

if (!isset($_SESSION['username'])) {
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
	<style type="text/css">
		body
		{
			background-color:steelblue;
			background-size: cover;
			background-image: url(Resources/12.jpg);
			background-position: 0px -5px;
		}
		h1
		{
			font-family: serif;
			font-size: 100px;
			padding-top: 180px;
			line-height: 100px;
		}
		
	</style>
	<link rel="stylesheet" href="Resources/style.css">
</head>

<body>
	<div class="headersection templete clear">
		<h2>JB Pharmacy</h2>  

	</div>
	<div class="navsection templete clear">
		<ul>
			<li class="active"><a href="home.php">Home</a></li>
			<li><a href="#">Stock</a>
				<ul>
					<li><a href="stock.php">Show</a></li>
					<li><a href="stock_up.php">Update</a></li>
					<li><a href="stock_new.php">Add new</a></li>
				</ul>
			</li>
			<li><a href="bill.php">Bill</a></li>
			<li><a href="history.php">History</a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul>
	</div>
	<div class="contentsection templete clear">
		
		<br><br><br><h2 style="text-align: center; color:white; margin-top: 190px; font-size: 50px;">Username :  <?php echo $_SESSION['username']; ?></h2>
	</div>
</body>
</html>