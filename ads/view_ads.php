<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("Location: ../login.html");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ad</title>
	<link rel="stylesheet" href="../static/css/styles.css">
	<script type="text/javascript" src="/Janambhumi Ads/static/js/scripts.js"></script>
</head>
<body align="center">
	<nav>
		<h3>দৈনিক জনমভূমি</h3>
		<ul>
			<li onclick="window.location.href='../'">HOME</li>
			<li onclick="window.location.href='../customer/view_customers.php'">CUSTOMERS</li>
			<li class="active">ADVERTISEMENTS</li>
			<li onclick="window.location.href='../bills/view_bills.php'">BILLS</li>
			<li onclick="window.location.href='../customer/add_customer.php'">ADD CUSTOMER</li>
			<li class="logout" onclick="window.location.href='../logout.php'">LOG OUT</li>
		</ul>
	</nav>

	<div id="body">
		
		<div id="middle" style="overflow: auto;padding: 2%;">
			<h3>View ads</h3>
			<table border="2" align="center" style="text-align: center;height: 90%;">
				<tr>
					<th style="width: 10%;">Customer ID</th>
					<th style="width: 10%;">Ad ID</th>
					<th style="width: 10%;">Ad header</th>
					<th style="width: 10%;">Ad from</th>
					<th style="width: 10%;">Ad till</th>
					<th style="width: 10%;">Ad height</th>
					<th style="width: 10%;">Ad width</th>
					<th style="width: 10%;">Ad page</th>
					<th style="width: 10%;">Ad status</th>
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
						$sql = "SELECT * FROM ads";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
						  while($ad = mysqli_fetch_assoc($result)) {
						  	?>
						  	<tr>
						    <td><?php echo $ad["cust_id"] ?></td>
						    <td><?php echo $ad["ad_id"] ?></td>
						    <td><?php echo $ad["ad_header"] ?></td>
						    <td><?php echo $ad["ad_from"] ?></td>
						    <td><?php echo $ad["ad_till"] ?></td>
						    <td><?php echo $ad["ad_height"] ?></td>
						    <td><?php echo $ad["ad_width"] ?></td>
						    <td><?php echo $ad["ad_page"] ?></td>
						    <td><?php echo $ad["ad_status"] ?></td>
						    <?php 
						    if($ad["ad_status"] == "pending"){
						    	?>
						    	<td>
						    		<form method="post" action="/Janambhumi Ads/ads/approve.php">
						    		<button class="action" onclick="return confirm('Are you sure to approve?')" value="<?php echo $ad["ad_id"] ?>" name="approve">APPROVE</button>
						    		</form>
						    		<form method="post" action="/Janambhumi Ads/ads/reject.php">
						    		<button class="action" onclick="return confirm('Are you sure to reject?')" value="<?php echo $ad["ad_id"] ?>" name="reject">REJECT</button>
						    		</form>
						    	</td>
						    	<?php
						    }
						    elseif($ad["ad_status"] == "approved"){
						    	?>
						    	<td>
						    		<button class="action" onclick="billing('<?php echo $ad["ad_id"] ?>')" value="<?php echo $ad["ad_id"] ?>">BILLING</button>
						    	</td>
						    	<?php
						    }
						    else{
						    	?>
						    	<td>---</td>
						    	<?php
						    }
						    ?>
						    </tr>
						    <?php
						  }
						}
						else{
							?>
							<tr>
								<td colspan="10">No records found</td>
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
	    <form action="/Janambhumi Ads/bills/gen_bill.php" method="post">
	    	<label for="adv_id">Ad ID</label>
	    	<input type="text" id="adv_id" name="adv_id" disabled="true"><br>
	    	<label for="ad_bill">Ad bill (in Rs.)</label>
	    	<input type="text" id="ad_bill" name="ad_bill"><br><br>
	    	<button id="gen_bill" name="gen_bill" onclick="return confirm('Are you sure?')">Generate Bill</button>
	    </form>
	  </div>
	</div>

	<footer>
		<p>All rights reserved 2020</p>
	</footer>

</body>
<script>
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
function billing(ad_id){
	modal.style.display = "block";
	document.getElementById("gen_bill").value = ad_id;
	document.getElementById("adv_id").value = ad_id;
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