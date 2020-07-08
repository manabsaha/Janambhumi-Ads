<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$ad_id = $_POST['approve'];

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dj_ads";
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		
		if (!$conn) {
		  	die("Connection failed: " . mysqli_connect_error());
		}
		else{
			$sql = "UPDATE ads SET ad_status = 'approved' WHERE ad_id = '".$ad_id."'";
			if (mysqli_query($conn, $sql)) {
			  	header("Location: /Janambhumi Ads/ads/view_ads.php");
			} else {
			  echo "Error: <br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
?>