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
<body align="center">

	<nav>
		<h3>দৈনিক জনমভূমি</h3>
		<ul>
			<li onclick="window.location.href='../'">HOME</li>
			<li onclick="window.location.href='../customer/view_customers.php'">CUSTOMERS</li>
			<li onclick="window.location.href='../ads/view_ads.php'">ADVERTISEMENTS</li>
			<li class="active">BILLS</li>
			<li onclick="window.location.href='../customer/add_customer.php'">ADD CUSTOMER</li>
			<li class="logout" onclick="window.location.href='../logout.php'">LOG OUT</li>
		</ul>
	</nav>

	<div id="body">
		<div id="middle" style="overflow: auto;padding: 2%;">
			<h3>View Bills</h3>
			<table border="2" align="center" style="text-align: center;height: 90%;">
				<tr>
					<th style="width: 15%;">Ad ID</th>
					<th style="width: 15%;">Customer ID</th>
					<th style="width: 15%;">Net bill</th>
					<th style="width: 15%;">Total</th>
					<th style="width: 15%;">GST (18%)</th>
					<th style="width: 25%;">Bill date</th>
				</tr>
				<?php

					$servername = "localhost";
					$username = "root";
					$password = "root";
					$dbname = "dj_ads";
					$conn = mysqli_connect($servername, $username, $password,$dbname);
					
					if (!$conn) {
					  	die("Connection failed: " . mysqli_connect_error());
					}
					else{
						$sql = "SELECT * FROM bills";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
						  while($cust = mysqli_fetch_assoc($result)) {
						  	?>
						  	<tr>
						    <td><?php echo $cust["ad_id"] ?></td>
						    <td><?php echo $cust["cust_id"] ?></td>
						    <td><?php echo $cust["ad_bill"] ?></td>
						    <td><?php echo $cust["ad_bill"]*0.82 ?></td>
						    <td><?php echo $cust["ad_bill"]*0.18 ?></td>
						    <td><?php echo $cust["bill_date"] ?></td>
						    </tr>
						    <?php
						  }
						}
						else{
							?>
							<tr>
								<td colspan="">No records found</td>
							</tr>
							<?php
						}
						mysqli_close($conn);
					}
				?>
			</table>
		</div>
	</div>

	<footer>
		<p>All rights reserved 2020</p>
	</footer>

</body>
</html>