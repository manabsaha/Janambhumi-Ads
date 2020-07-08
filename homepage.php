<?php
	session_start();
	if (isset($_SESSION['userid'])){
		echo "USER ID: " . $_SESSION['userid'];
	}
	else{
		echo "Not signed in";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body align="center" horis>
	<h1>A web page in PHP</h1>
	<h3>Welcome</h3><br>
	<?php 
	if (isset($_SESSION['userid'])){
		?>
		<button onclick="window.location.href='customer/add_customer.php'">Add customer</button>
		<button onclick="window.location.href='customer/view_customers.php'">View customers</button><br><br>
		<button onclick="window.location.href='ads/view_ads.php'">View advertisement</button><br><br>
		<button onclick="window.location.href='bills/view_bills.php'">View bills</button><br><br>
		<button onclick="window.location.href='logout.php'">Logout</button><br><br>
		<?php
	}
	else{
		?>
		<button onclick="window.location.href='login.html'">Login</button>
		<?php
	}
	?>
</body>
</html>