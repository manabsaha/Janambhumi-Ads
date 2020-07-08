<!DOCTYPE html>
<html>
<head>
	<title>ad</title>
</head>
<body align="center">
	<h3>View Bills</h3>
	<h5>FILTER BILLS: BY CUSTOMER ID & DATE</h5>
	<table border="2" align="center">
		<tr>
			<th>Ad ID</th>
			<th>Customer ID</th>
			<th>Net bill</th>
			<th>Total</th>
			<th>GST (18%)</th>
			<th>Bill date</th>
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
</body>
</html>