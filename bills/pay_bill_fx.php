<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$cust_id = $_POST['payment_btn'];
		$pay_mode = $_POST['pay_mode'];
		$pay_amount = $_POST['pay_amount'];
		$pay_date = date("Y-m-d");

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dj_ads";
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		
		if (!$conn) {
		  	die("Connection failed: " . mysqli_connect_error());
		}
		else{
			$sql = "INSERT INTO payments (cust_id,pay_method,pay_amount,pay_date)
			VALUES ('".$cust_id."','".$pay_mode."','".$pay_amount."','".$pay_date."')";
			if (mysqli_query($conn, $sql)) {
			  	header("Location: /Janambhumi Ads/customer/view_customers.php");
			} else {
			  echo "Error: <br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}	
	}
?>