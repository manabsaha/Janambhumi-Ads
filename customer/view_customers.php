<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("Location: ../login.html");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../static/css/styles.css">
</head>
<body>
	<nav>
		<h3>দৈনিক জনমভূমি</h3>
		<ul>
			<li onclick="window.location.href='../'">HOME</li>
			<li class="active">CUSTOMERS</li>
			<li onclick="window.location.href='../ads/view_ads.php'">ADVERTISEMENTS</li>
			<li onclick="window.location.href='../bills/view_bills.php'">BILLS</li>
			<li onclick="window.location.href='../customer/add_customer.php'">ADD CUSTOMER</li>
			<li class="logout" onclick="window.location.href='../logout.php'">LOG OUT</li>
		</ul>
	</nav>

	<div id="body">
		
		<!-- table -->
		<div id="middle" style="overflow: auto;padding: 2%;">
			<table border="2" align="center" style="text-align: center;height: 90%;">
				<tr>
					<th style="width: 10%;">Customer ID</th>
					<th style="width: 20%;">Customer Name</th>
					<th style="width: 20%;">Address</th>
					<th style="width: 15%;">Phone</th>
					<th style="width: 10%;">Type</th>
					<th style="width: 15%;">ID</th>
					<th style="width: 10%;">ACTION</th>
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
						    	<button class="action" onclick="put_ad('<?php echo $cust['cust_id'] ?>')" value="<?php echo $cust['cust_id'] ?>">Put AD</button>
						    	<form action="/Janambhumi Ads/bills/pay_bills.php" method="post">
						    		<button class="action" value="<?php echo $cust["cust_id"] ?>" name="pay_btn">Pay bill</button>
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
		</div>
	</div>

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

	<footer>
		<p>All rights reserved 2020</p>
	</footer>
</body>
<style>
	/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 40%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
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