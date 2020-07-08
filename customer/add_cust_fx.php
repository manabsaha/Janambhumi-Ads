<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['customer_name'];
		$address = $_POST['customer_address'];
		$phone = $_POST['customer_phone'];
		$type = $_POST['customer_type'];
		$off_id = $_POST['customer_off_id'];
		
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dj_ads";
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		
		if (!$conn) {
		  	die("Connection failed: " . mysqli_connect_error());
		}
		else{
			$sql = "INSERT INTO customers (cust_name, cust_address, cust_phone, cust_type, cust_off_id)
			VALUES ('" .$name. "', '" .$address. "', '" .$phone. "','" .$type. "','" .$off_id. "')";
			if (mysqli_query($conn, $sql)) {
			  	header("Location: /Janambhumi Ads/homepage.php");
			} else {
			  echo "Error: <br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}	
	}
?>