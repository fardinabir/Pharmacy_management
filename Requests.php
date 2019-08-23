<?php
	if(session_status()==PHP_SESSION_NONE)
		session_start();
	$cmp="";
	$mdn="";
	$qnt="";
	$prc="";
	$pric="";
	$dte="";


	function display_comp()
	{
		$conn = mysqli_connect('localhost','root','','pharmacy');
		$s = "SELECT DISTINCT company FROM `stock`";
		$result = mysqli_query($conn,$s);
		while ($row = mysqli_fetch_assoc($result))
			{
				$name=$row['company'];
				echo "<option value='$name'> $name </option> ";
			}
	}
	function display_med()
	{
		$conn = mysqli_connect('localhost','root','','pharmacy');
		$s = "SELECT med_name FROM `stock`";
		$result = mysqli_query($conn,$s);
		while ($row = mysqli_fetch_assoc($result))
			{
				$name=$row['med_name'];
				echo "<option value='$name'> $name </option> ";
			}
	}

	$conn = mysqli_connect('localhost','root','','pharmacy');

	if(isset($_POST['submit']) && $_POST['submit']=='Update')
	{
		$cmp= $_POST['company'];
		$mdn= $_POST['med_name'];
		$qnt= $_POST['quantity'];
		$pric= $_POST['price']; 
		$_SESSION['rer']='';
		$xx=0;
		if(empty($_POST['company']))
		{
			echo "Enter a company name !<br><br>";
			$xx=1;
		}
		if(empty($_POST['med_name']))
		{
			echo "Enter a medicine name !<br><br>";
			$xx=1;
		}
		if(empty($_POST['quantity']))
		{
			echo "Enter the quantity !<br><br>";
			$xx=1;
		}
		else if(empty($_POST['price']))
		{
			echo "Enter the price !<br><br>";
			$xx=1;
		}
		if ($xx==1) {
			echo $_SESSION['rer'];
		}
		if($qnt<0 || $pric<0)
		{
			echo "Enter positive value !";
		}
		$s= "SELECT id FROM `stock` WHERE `company`='$cmp' && `med_name`='$mdn'";
		$result = mysqli_query($conn,$s);
		if (mysqli_num_rows($result)==0) {					
			echo "Company name and medicine name doesn't match  !<br><br>";
			
		}
		else
		{
			$s= "UPDATE `stock` SET `quantity` = `quantity`+'$qnt' , `price` = '$pric' WHERE `stock`.`med_name` = '$mdn' ";
			$result = mysqli_query($conn,$s);	
			header('location:stock_up.php');
		}
		
		
	}
	else if(isset($_POST['submit']) && $_POST['submit']=='Add New')
	{ 	
		$cmp= $_POST['company'];
		$mdn= $_POST['med_name'];
		$qnt= $_POST['quantity'];
		$pric= $_POST['price']; 
		$prc=$_POST['process'];

		if($qnt<0 || $pric<0)
		{
			echo "Enter positive value !";
		}
		else
		{
			$s= "INSERT INTO `stock`(`id`, `med_name`, `company`, `quantity`, `process`, `price`) VALUES (null,'$mdn','$cmp','$qnt','$prc','$pric')";	
			$result = mysqli_query($conn,$s);

			header('location:stock_new.php');
		}
		
		
	}
	
	else if(isset($_POST['submit']) && $_POST['submit']=='Bill')
	{
		$mdn= $_POST['med_name'];
		$qnt= $_POST['quantity'];

		$user_nm=$_SESSION['username'];
		echo "$user_nm, ";

		$s="SELECT `quantity` FROM `stock` WHERE med_name='$mdn' ";
		$result = mysqli_query($conn,$s);

		if(mysqli_num_rows($result)==0)
		{
			echo "Invalid Medicine Name !";
		}

		if($qnt<=0)
		{
			echo "Enter a positive value of quantity !";
		}
		else
		{
		$avv = mysqli_fetch_array($result);
		$av=$avv[0];
		if($av==0)
		{
			echo "No more '$mdn' available !";
		}
		else if($av < $qnt)
		{
			echo "Only '$av' are availabe !";
		}

		else
		{
			$s= "SELECT `price` FROM `stock` WHERE med_name='$mdn' ";
			$result = mysqli_query($conn,$s);
			$prict=0;
			$pv=0;

			$avv = mysqli_fetch_array($result);
			$pv=$avv[0];
			//$user_nm=$_SESSION['username'];
			$prict=$pv*$qnt;
			$s="INSERT INTO `history`(`med_name`, `quantity`, `bill`, `username`) VALUES ('$mdn','$qnt','$prict','$user_nm')";
			$result = mysqli_query($conn,$s);
			echo "Bill added successfully !! <br> Bill = $prict Tk.";

			$pv=$av-$qnt;
			$s="UPDATE `stock` SET `quantity` = '$pv'  WHERE `med_name` = '$mdn' ";
			$result = mysqli_query($conn,$s);
		}
	}
	}
	

?>