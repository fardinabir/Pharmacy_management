<?php

session_start();

if (!isset($_SESSION['username'])) {
	header('location:login.php');
}
?>
<!DOCTYPE html>
<?php include('Requests.php');?>
<html>
<head>
	<title>Stock</title>
	<style type="text/css">
		body
		{
			background-color: steelblue;
			background-size: cover;
			background-image: url(Resources/images.jpg);
			background-repeat: no-repeat;
		}
		
	</style>
	<link rel="stylesheet" href="Resources/style.css">
	<link rel="stylesheet" type="text/css" href="Resources/style1.css">
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
					<li ><a href="stock_up.php">Update</a></li>
					<li ><a href="stock_new.php">Add new</a></li>
				</ul>
			</li>
			<li><a href="bill.php">Bill</a></li>
			<li><a href="history.php">History</a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul>
	</div>
	<div class="contentsection templete clear">
		<br>
	     
		<div class="maincontent clear"> 
			<h3 style="font-size: 25px; color: #ff0000; margin-left: 900px;">* Add New Medicine</h3>
		     <form action="addNewVal.php" method="post">
		     <div class="form-group">
		     	<label >Company       : </label><br>
		     	<input type="text" name="company" class="text" list="list_comp">
		     	<datalist id="list_comp">
		     		<?php 
		     		display_comp();
		     		 ?>

		     	</datalist>

		     ></div>
		     <div class="form-group">
		     	<label >Medicine Name : </label><br>
		     	<input type="text" name="med_name" class="text">
		     </div>
		     
		     <div >
		     	<label>Quantity      : </label><br>
		     	<input type="number" name="quantity" class="text">
		     </div>
		     <div class="form-group">
		     	<label>Price      : </label><br>
		     	<input type="text" name="price" class="text">
		     </div>
		     
		     <div class="form-group">
		     	<label>Process : </label>
		     	<input type="radio" name="process" value="Normal" checked="checked"> <label class="ls"> Normal</label>
		     	<input type="radio" name="process" value="Fridge"><label class="ls"> Fridge</label> 
		     </div>
		     	<input type="submit" class="button" name="submit" value="Add New"><br>

		     </form>
		</div>
	</div>	
</body>
</html>