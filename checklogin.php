<?php
	session_start();
	$user_name = $_POST['number'];
	$user_password = $_POST['password'];

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dj_ads";

	$conn = mysqli_connect($servername, $username, $password,$dbname);
	if (!$conn) {
	  	die("Connection failed: " . mysqli_connect_error());
	}
	else{
		$sql = "SELECT * FROM users WHERE user_name='".$user_name."'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		  while($user = mysqli_fetch_assoc($result)) {
		  	if($user_password == $user['user_password']){
		  		$_SESSION['userid'] = $user['user_id'];
				header("Location: homepage.php");
		  	}
		  	else{
		  		echo "Incorrect password";
		  	}
		  }
		} 
		else {
		  echo "username not found";
		}
		mysqli_close($conn);
	}
?>