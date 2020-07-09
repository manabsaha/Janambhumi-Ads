<!DOCTYPE html>
<html>
<head>
	<title>ad</title>
	<link rel="stylesheet" href="/Janambhumi Ads/static/css/styles.css">
	<script type="text/javascript" src="/Janambhumi Ads/static/js/scripts.js"></script>
</head>
<body align="center">
	<h2>View Customers</h2>
	<h5>FILTER CUSTOMERS: BY NAME</h5>
	<table border="2" align="center">
		<tr>
			<th>Customer ID</th>
			<th>Customer Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Type</th>
			<th>ID</th>
			<th>ACTION</th>
		</tr>
		<?php

			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "dj_ads";
			$conn = mysqli_connect($servername, $username, $password,$dbname);
			
			if (!$conn) {
			  	die("Connection failed: " . mysqli_connect_error());
			}
			else{
				$sql = "SELECT * FROM customers";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
				  while($cust = mysqli_fetch_assoc($result)) {
				  	?>
				  	<tr>
				    <td><?php echo $cust["cust_id"] ?></td>
				    <td><?php echo $cust["cust_name"] ?></td>
				    <td><?php echo $cust["cust_address"] ?></td>
				    <td><?php echo $cust["cust_phone"] ?></td>
				    <td><?php echo $cust["cust_type"] ?></td>
				    <td><?php echo $cust["cust_off_id"] ?></td>
				    <td>
				    	<button onclick="put_ad('<?php echo $cust['cust_id'] ?>')" value="<?php echo $cust['cust_id'] ?>">Put AD</button>
				    	<form action="/Janambhumi Ads/bills/pay_bills.php" method="post">
				    		<button value="<?php echo $cust["cust_id"] ?>" name="pay_btn">Pay bill</button>
				    	</form>
				    </td>
				    </tr>
				    <?php
				  }
				}
				else{
					?>
					<tr>
						<td colspan="7">No records found</td>
					</tr>
					<?php
				}
				mysqli_close($conn);
			}
		?>
	</table>
	<!-- The Modal -->
	<div id="myModal" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
	    <span class="close">&times;</span>
	    <h3>Add AD</h3>
	    <form action="/Janambhumi Ads/ads/add_ad_fx.php" method="post">
	    	<label for="customer_id">Customer ID</label>
	    	<input type="text" id="customer_id" name="customer_id" disabled="true"><br>
	    	<label for="display_from">Display from</label>
	    	<input type="date" id="display_from" name="display_from"><br>
	    	<label for="display_till">Display till</label>
	    	<input type="date" id="display_till" name="display_till"><br>
	    	<label for="ad_header">Ad header</label>
	    	<input type="text" id="ad_header" name="ad_header"><br>
	    	<label for="ad_height">Ad height</label>
	    	<input type="text" id="ad_height" name="ad_height"><br>
	    	<label for="ad_width">Ad width</label>
	    	<input type="text" id="ad_width" name="ad_width"><br>
	    	<label for="ad_page">Ad page (optional)</label>
	    	<input type="text" id="ad_page" name="ad_page"><br><br>
	    	<button id="put_ad" name="put_ad" onclick="return confirm('Are you sure?')">Send for approval</button>
	    </form>
	  </div>
	</div>

</body>
<script>
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
function put_ad(cust_id){
  modal.style.display = "block";
  document.getElementById("put_ad").value = cust_id;
  document.getElementById("customer_id").value = cust_id;
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</html>