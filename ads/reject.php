<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$ad_id = $_POST['reject'];

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dj_ads";
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		
		if (!$conn) {
		  	die("Connection failed: " . mysqli_connect_error());
		}
		else{
			$desc = "Rejected by admin";
			$rej_date = date("Y-m-d");
			$sql = "UPDATE ads SET ad_status = 'rejected', rejection_desc = '".$desc."', rejection_date = '".$rej_date."' WHERE ad_id = '".$ad_id."'";
			if (mysqli_query($conn, $sql)) {
			  	header("Location: /Janambhumi Ads/ads/view_ads.php");
			} else {
			  echo "Error: <br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}	
	}
?>