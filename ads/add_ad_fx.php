<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$id = $_POST['put_ad'];
		$from = $_POST['display_from'];
		$till = $_POST['display_till'];
		$header = $_POST['ad_header'];
		$height = $_POST['ad_height'];
		$width = $_POST['ad_width'];
		$page = $_POST['ad_page'];

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dj_ads";
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		
		if (!$conn) {
		  	die("Connection failed: " . mysqli_connect_error());
		}
		else{
			$sql = "INSERT INTO ads (cust_id, ad_from, ad_till, ad_header, ad_height, ad_width, ad_page)
			VALUES ('".$id."','".$from."','".$till."','".$header."','".$height."','".$width."','".$page."')";
			if (mysqli_query($conn, $sql)) {
			  	header("Location: /Janambhumi Ads/homepage.php");
			} else {
			  echo "Error: <br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
?>