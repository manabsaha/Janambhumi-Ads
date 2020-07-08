<?php
	session_start();
	$user_number = $_POST['number'];
	$user_password = $_POST['password'];

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mydjdb";

	$conn = mysqli_connect($servername, $username, $password,$dbname);
	if (!$conn) {
	  //die("Connection failed: " . mysqli_connect_error());
		echo "failed mysql";
	}
	else{

		/*$sql = "CREATE DATABASE myDJDB";
		if (mysqli_query($conn, $sql)) {
		  echo "Database created successfully";
		} else {
		  echo "Error creating database: " . mysqli_error($conn);
		}*/

		/*$sql = "CREATE TABLE MyGuests (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		email VARCHAR(50),
		reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";
		if ($conn->query($sql)) {
		  echo "Table MyGuests created successfully";
		} else {
		  echo "Error creating table: " . $conn->error;
		}*/

		/*$sql = "INSERT INTO MyGuests (firstname, lastname, email)
		VALUES ('John', 'Doe', 'john@example.com')";
		if (mysqli_query($conn, $sql)) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}*/

		/*$sql = "SELECT id, firstname, lastname FROM MyGuests";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		  while($row = mysqli_fetch_assoc($result)) {
		    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		  }
		} else {
		  echo "0 results";
		}*/

		mysqli_close($conn);

		/*if ($user_number == "admin" && $user_password == "admin"){
			header("Location: homepage.php");
			$_SESSION['userid'] = "$user_number";
		}
		else{
			echo "Invalid details";
		}*/
	}

	

	/* INSTRUCTIONS */
	/*-------------*/
	
	/*
	create database dj_ads;
	use dj_ads;
	*/

	/*
	create users:
	create table users ( user_id int auto_increment, user_name varchar(255) not null, user_password varchar(255) not null, primary key(user_id))auto_increment=10001;
	*/

	/*
	create customers:
	create table customers ( cust_id int auto_increment, cust_name varchar(255) not null, cust_address varchar(255) not null, cust_phone varchar(20) not null, cust_type varchar(100) not null, cust_off_id varchar(255), primary key(cust_id))auto_increment=10001;
	*/

	/*
	create ads:
	create table ads ( ad_id int auto_increment, cust_id int not null, ad_from date not null, ad_till date not null, ad_header varchar(255) not null, ad_height float not null, ad_width float not null, ad_page int, ad_status varchar(32) default 'pending', rejection_desc varchar(255) default '', rejection_date date, primary key(ad_id), foreign key(cust_id) references customers(cust_id))auto_increment=10001;
	*/

	/*
	create bills:
	create table bills ( bill_id int auto_increment, cust_id int not null, ad_id int not null unique, ad_bill float not null, bill_date date not null, bill_status varchar(32) default 'unpaid', primary key(bill_id), foreign key(ad_id) references ads(ad_id), foreign key(cust_id) references customers(cust_id))auto_increment=10001;
	*/

	/*
	create payments:
	create table payments ( payment_id int auto_increment, cust_id int not null, pay_method varchar(32) default 'CASH', pay_amount float not null, pay_date date not null, primary key(payment_id), foreign key(cust_id) references customers(cust_id))auto_increment=10001;
	*/


?>
