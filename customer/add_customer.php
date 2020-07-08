<!DOCTYPE html>
<html>
<head>
	<title>ad</title>
</head>
<body align="center">
	<h2>Customer Details</h2>
	<form action="add_cust_fx.php" method="post">
		<label for="customer_name">Name</label>
		<input type="text" id="customer_name" name="customer_name"><br>
		<label for="customer_address">Address</label>
		<input type="text" id="customer_address" name="customer_address"><br>
		<label for="customer_phone">Phone</label>
		<input type="text" id="customer_phone" name="customer_phone"><br>
		<label for="customer_type">Type</label>
		<select id="customer_type" name="customer_type">
			<option value="government">Government</option>
			<option value="private">Private</option>
			<option value="non_government">Non Government</option>
		</select><br>
		<label for="customer_off_id">Government ID</label>
		<input type="text" id="customer_off_id" name="customer_off_id"><br><br>
		<button>ADD</button>
	</form>
</body>
</html>