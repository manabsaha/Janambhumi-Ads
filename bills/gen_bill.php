<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$ad_id = $_POST['gen_bill'];
		$ad_bill = $_POST['ad_bill'];
		// echo $ad_id.$bill;	

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "dj_ads";
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		
		if (!$conn) {
		  	die("Connection failed: " . mysqli_connect_error());
		}
		else{
			$bill_date = date("Y-m-d");
			$sql = "SELECT cust_id FROM ads WHERE ad_id='".$ad_id."'";
			$result = mysqli_query($conn,$sql);
			if($result){
				while($cust = mysqli_fetch_assoc($result)){
					$cust_id = $cust['cust_id'];
				}
				$sql = "INSERT INTO bills (cust_id,ad_id,ad_bill,bill_date)
				VALUES ('".$cust_id."','".$ad_id."','".$ad_bill."','".$bill_date."')";
				if (mysqli_query($conn, $sql)) {
					$sql = "UPDATE ads SET ad_status = 'billed' WHERE ad_id = '".$ad_id."'";
					if (mysqli_query($conn, $sql)) {
				  		header("Location: /Janambhumi Ads/ads/view_ads.php");
				  }
				  else{
					  echo "Error: <br>" . mysqli_error($conn);
				  }
				} else {
				  echo "Error: <br>" . mysqli_error($conn);
				}			
			}
			else{
				echo "Error: <br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
?>