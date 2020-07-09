<!DOCTYPE html>
<html>
<head>
	<title>ad</title>
	<link rel="stylesheet" href="/Janambhumi Ads/static/css/styles.css">
	<script type="text/javascript" src="/Janambhumi Ads/static/js/scripts.js"></script>
</head>
<body align="center">
	<h3>View ads</h3>
	<h5>ADD A FILTER SEARCH HERE: BY AD STATUS & CUSTOMER ID</h5>
	<table border="2" align="center">
		<tr>
			<th>Customer ID</th>
			<th>Ad ID</th>
			<th>Ad header</th>
			<th>Ad from</th>
			<th>Ad till</th>
			<th>Ad height</th>
			<th>Ad width</th>
			<th>Ad page</th>
			<th>Ad status</th>
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
				    		<button onclick="return confirm('Are you sure to approve?')" value="<?php echo $ad["ad_id"] ?>" name="approve">APPROVE</button>
				    		</form>
				    		<form method="post" action="/Janambhumi Ads/ads/reject.php">
				    		<button onclick="return confirm('Are you sure to reject?')" value="<?php echo $ad["ad_id"] ?>" name="reject">REJECT</button>
				    		</form>
				    	</td>
				    	<?php
				    }
				    elseif($ad["ad_status"] == "approved"){
				    	?>
				    	<td>
				    		<button onclick="billing('<?php echo $ad["ad_id"] ?>')" value="<?php echo $ad["ad_id"] ?>">BILLING</button>
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