<?php

session_start();


if (!isset($_SESSION['username'])) {
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock</title>
	<style type="text/css">
		body
		{
			background-color: steelblue;
			background-image: url(Resources/img1.jpg);
			background-size: cover;
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
			<li ><a href="home.php">Home</a></li>
			<li ><a href="stock.php">Stock</a>
				<ul>
					<li ><a href="stock.php">Show</a></li>
					<li><a href="stock_up.php">Update</a></li>
					<li><a href="stock_new.php">Add new</a></li>
				</ul>
			</li>
			<li><a href="bill.php">Bill</a></li>
			<li><a href="history.php">History</a></li>
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
		     		<th >Name</th>
		     		<th >Company</th>
		     		<th >Quantity</th>
		     		<th >Process</th>
		     		<th >Price</th>
		     	</tr>
		     	<?php
			$conn = mysqli_connect('localhost','root','','pharmacy');
			$result = mysqli_query($conn,"SELECT * FROM `stock` ORDER BY `med_name` ASC");
			while ($str = mysqli_fetch_assoc($result)) {
		     ?>
		     	<tr >
		     		<td><?php echo $str['id'];?></td>
		     		<td><?php echo$str['med_name'];?></td>
		     		<td><?php echo$str['company'];?></td>
		     		<td><?php echo$str['quantity'];?></td>
		     		<td><?php echo$str['process'];?></td>
		     		<td><?php echo$str['price']; ?></td>
		     	</tr>
		     <?php
		 }
			?>	
		     </table>
		</div>
	</div>
	
</body>
</html> 