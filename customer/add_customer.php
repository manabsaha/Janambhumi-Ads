<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("Location: ../login.html");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ad</title>
	<link rel="stylesheet" href="../static/css/styles.css">
</head>
<style>
	.add-form{
		background-color: #000;
		opacity: 0.8;
		border-radius: 10px;
		padding: 10% 10%;
		text-align: left;
	}
	.add-form h2,.add-form hr{
		margin-bottom: 5%
	}
	.add-form input,.add-form select{
		margin-bottom: 5%;
		width: 70%;
		outline: none;
	}
	.add-form button{
		padding: 2% 5%;
		background-color: red;
		border: none;
		outline: none;
		border-radius: 2px;
		color: #fff;
		transition: 0.4s;
		font-size: 1.0em;
		font-weight: bold;
	}
	.add-form button:hover{
		transform: scale(1.1);
		cursor: pointer;
	}
</style>
<body align="center">

	<nav>
		<h3>দৈনিক জনমভূমি</h3>
		<ul>
			<li onclick="window.location.href='../'">HOME</li>
			<li onclick="window.location.href='../customer/view_customers.php'">CUSTOMERS</li>
			<li onclick="window.location.href='../ads/view_ads.php'">ADVERTISEMENTS</li>
			<li onclick="window.location.href='../bills/view_bills.php'">BILLS</li>
			<li class="active">ADD CUSTOMER</li>
			<li class="logout" onclick="window.location.href='../logout.php'">LOG OUT</li>
		</ul>
	</nav>
	
	<div id="body">
		<div id="middle" style="overflow: auto;padding: 2%;width: 60%;">
			<div class="add-form">
				<h2>Customer Details</h2>
				<hr>
				<form action="add_cust_fx.php" method="post">
					<label for="customer_name">Name&nbsp&nbsp&nbsp&nbsp</label>
					<input type="text" id="customer_name" name="customer_name"><br>
					<label for="customer_address">Address</label>
					<input type="text" id="customer_address" name="customer_address"><br>
					<label for="customer_phone">Phone&nbsp&nbsp&nbsp</label>
					<input type="text" id="customer_phone" name="customer_phone"><br>
					<label for="customer_type">Type&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<select id="customer_type" name="customer_type">
						<option value="government">Government</option>
						<option value="private">Private</option>
						<option value="non_government">Non Government</option>
					</select><br>
					<label for="customer_off_id">Govt. ID&nbsp</label>
					<input type="text" id="customer_off_id" name="customer_off_id"><br><br>
					<button>ADD</button>
				</form>
			</div>
		</div>
	</div>

	<footer>
		<p>All rights reserved 2020</p>
	</footer>
	
</body>
</html>