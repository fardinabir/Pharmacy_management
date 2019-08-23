<!DOCTYPE html>
<html>

<head>
	<title>Simple Form</title>

	<link rel="stylesheet" type="text/css" href="Resources/style1.css">
	<style type="text/css">
		body
		{
			background-color:#201997;
			font: 1em/1.5  sans-serif;
			background-size: cover;
			background-repeat: no-repeat;
			background-image: url(Resources/loginn.jpg);
		}
	</style>
</head>
<body>
	<h2>JB Pharmacy</h2>
	<form action="validation_register.php" method="post">
		<div class="form-group">
			<input type="text" class="text" name="user" placeholder="Username">
		</div>
		<br>
		<div>
			<input type="password" class="password" name="password" placeholder="Password">
		</div>
		<input type="submit" class="button" value="Register" name="submit">
	</form>
</body>
</html>
