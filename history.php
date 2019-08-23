<?php

session_start();

if (!isset($_SESSION['username'])) {
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hisotry</title>
	<style type="text/css">
		body
		{
			background-image: url(Resources/index.jpg);
			background-size: cover;
			background-repeat: no-repeat;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="Resources/style.css">
</head>
<body>
	<div class="headersection templete clear">
		<h2>JB Pharmacy</h2> 
	</div>
	<div class="navsection templete clear">
		<ul>
			<li ><a href="home.php">Home</a></li>
			<li><a href="#">Stock</a>
				<ul>
					<li ><a href="stock.php">Show</a></li>
					<li><a href="stock_up.php">Update</a></li>
					<li><a href="stock_new.php">Add new</a></li>
				</ul>
			</li>
			<li><a href="bill.php">Bill</a></li>
			<li class="active"><a href="history.php">History</a></li>
			<li><a href="logout.php">Log out</a></li>
			<!--<li><a href="#">Privacy</a></li>-->
		</ul>
	</div>
	<div class="contentsection templete clear">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="maincontent clear"> 
			<table class="tt1">
		     	<tr>
		     		<th >SL.</th>
		     		<th>Time & Date</th>
		     		<th >Name</th>
		     		<th >Quantity</th>
		     		<th >Price</th>
		     		<th >Username</th>
		     	</tr>
			<?php
			$conn = mysqli_connect('localhost','root','','pharmacy');
			$result = mysqli_query($conn,"SELECT * FROM `history`  ORDER BY `history`.`date_time` DESC ");
			while ($str = mysqli_fetch_assoc($result)) {
		     ?>
		     	<tr >
		     		<td><?php echo $str['SL'];?></td>
		     		<td><?php echo$str['date_time'];?></td>
		     		<td><?php echo$str['med_name'];?></td>
		     		<td><?php echo$str['quantity'];?></td>
		     		<td><?php echo$str['bill']; ?></td>
		     		<td><?php echo$str['username'] ?></td>
		     	</tr>
		     <?php
		 }
			?>	
		     </table>
		</div>
	</div>
</body>
</html>