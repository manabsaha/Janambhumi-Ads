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
			<li class="active" onclick="window.location.href='../customer/view_customers.php'">CUSTOMERS</li>
			<li onclick="window.location.href='../ads/view_ads.php'">ADVERTISEMENTS</li>
			<li onclick="window.location.href='../bills/view_bills.php'">BILLS</li>
			<li onclick="window.location.href='../customer/add_customer.php'">ADD CUSTOMER</li>
			<li class="logout" onclick="window.location.href='../logout.php'">LOG OUT</li>
		</ul>
	</nav>

	<div id="body">
		<div id="middle" style="overflow: auto;padding: 2%;">
			<h3>Pay bills</h3>
			<h5>Customer ID: <?php echo $cust_id = $_POST['pay_btn'] ?></h5>
			<table border="2" align="center" style="text-align: center;height: 30%;">
				<tr>
					<th style="width: 15%;">Ad ID</th>
					<th style="width: 15%;">Net bill</th>
					<th style="width: 15%;">Total</th>
					<th style="width: 15%;">GST (18%)</th>
					<th style="width: 20%;">Bill status</th>
					<th style="width: 20%;">Bill date</th>
				</tr>
				<?php
					if ($_SERVER['REQUEST_METHOD'] == 'POST'){
						$servername = "localhost";
						$username = "root";
						$password = "root";
						$dbname = "dj_ads";
						$conn = mysqli_connect($servername, $username, $password,$dbname);
						
						if (!$conn) {
						  	die("Connection failed: " . mysqli_connect_error());
						}
						else{
							// $cust_id = $_POST['pay_btn'];
							$sql = "SELECT * FROM bills WHERE cust_id='".$cust_id."'";
							$result = mysqli_query($conn, $sql);
							$total_bill = 0;
							if (mysqli_num_rows($result) > 0) {
							  while($cust = mysqli_fetch_assoc($result)) {
							  	?>
							  	<tr>
							    <td><?php echo $cust["ad_id"] ?></td>
							    <td><?php echo $cust["ad_bill"] ?></td>
							    <td><?php echo $cust["ad_bill"]*0.82 ?></td>
							    <td><?php echo $cust["ad_bill"]*0.18 ?></td>
							    <td><?php echo $cust["bill_status"] ?></td>
							    <td><?php echo $cust["bill_date"] ?></td>
							    </tr>
							    <?php
							    $total_bill += $cust['ad_bill'];
							  }
							}
							else{
								?>
								<tr>
									<td colspan="6">No records found</td>
								</tr>
								<?php
							}
						}
					}
				?>
			</table>
			<h4>Total Bill: <?php echo $total_bill ?></h4>
			<h2>PAYMENT HISTORY</h2>
			<table align="center" border="2" style="text-align: center;height: 20%;">
				<tr>
					<th>Payment date</th>
					<th>Amount</th>
					<th>Mode</th>
				</tr>
				<?php
				if (!$conn) {
				  	die("Connection failed: " . mysqli_connect_error());
				}
				else{
					$sql = "SELECT * FROM payments WHERE cust_id='".$cust_id."'";
					$result = mysqli_query($conn, $sql);
					$total_paid = 0;
					if (mysqli_num_rows($result) > 0) {
					  while($pay = mysqli_fetch_assoc($result)) {
					  	?>
					  	<tr>
					    <td><?php echo $pay["pay_date"] ?></td>
					    <td><?php echo $pay["pay_amount"] ?></td>
					    <td><?php echo $pay["pay_method"] ?></td>
					    </tr>
					    <?php
					    $total_paid += $pay['pay_amount'];
					  }
					}
					else{
						?>
						<tr>
							<td colspan="3">No records found</td>
						</tr>
						<?php
					}
					mysqli_close($conn);
				}
				?>
			</table>
			<h4>PAID: <?php echo $total_paid ?> | DUE: <?php echo $total_bill-$total_paid ?></h4>
			<h2>MAKE PAYMENT</h2>
			<form action="/Janambhumi Ads/bills/pay_bill_fx.php" method="post">
				<label for="pay_mode">Payment mode</label>
				<input type="text" id="pay_mode" name="pay_mode"><br>
				<label for="pay_amount">Amount</label>
				<input type="text" id="pay_amount" name="pay_amount"><br><br>
				<button name="payment_btn" value="<?php echo $cust_id ?>">Pay Bill</button>
			</form>
		</div>
	</div>

	<footer>
		<p>All rights reserved 2020</p>
	</footer>

</body>
</html>