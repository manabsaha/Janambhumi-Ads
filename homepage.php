<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("Location: login.html");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<style>
	*{
		padding: 0;
		margin: 0;
		font-family: sans-serif;
		box-sizing: border-box;
	}
	/*nav css*/
	nav{
		height: 15vh;
		width: 100%;
		display: flex;
		align-items: center;
	}
	nav h3{
		width: 30%;
		float: left;
		padding: 1% 3%;
		text-align: left;
		font-size: 2em;
	}
	nav ul{
		width: 70%;
		text-align: right;
		float: left;
		padding: 0 1%;
	}
	nav li{
		display: inline-block;
		padding: 2% 1%;
	}
	.active{
		border-bottom: 5px solid red;
	}
	nav li:hover{
		cursor: pointer;
		color: skyblue;
	}
	/*Body css*/
	#body{
		height: 80vh;
		width: 100%;
		background-image: url('static/img/bg_one.jpg');
		box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.3);
	}
	#left{
		height: 100%;
		width: 17%;
		float: left;
		color: #fff;
	}
	#middle{
		height: 100%;
		width: 64%;
		float: left;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		color: #fff;
	}
	#right{
		height: 100%;
		width: 17%;
		float: left;
		color: #fff;
	}
	.weather{
		display: flex;
		flex-direction: column;
		height: 50%;
	}
	.weather img{
		height: 45%;
		width: 50%;
		margin: 10% 8% 0 8%;
	}
	.weather p{
		text-align: left;
		padding: 1% 10%;
	}
	.sunrise{
		display: flex;
		padding: 5%;
		align-items: center;
	}
	.sunrise img{
		height: 50%;
		width: 50%;
	}
	.sunrise div{
		padding: 2%;
		text-align: left;
	}
	.data{
		font-size: 1.4em;
		font-weight: bold;
		padding: 10% 0;
	}
	.today{
		font-weight: bold;
		font-size: 3em;
	}
	.date{
		font-size: 1.8em;
		font-weight: bold;
		padding: 2%;
	}
	#middle button{
		background-color: #4f4f4f;
		padding: 2%;
		font-size: 1.2em;
		margin-top: 10%;
		border: none;
		border-radius: 2px;
		color: #fff;
		transition: 0.4s;
		outline: none;
	}
	#middle button:hover{
		cursor: pointer;
		transform: scale(1.1);
	}
	footer{
		height: 5vh;
		background-color: #494949;
		display: flex;
		align-items: center;
		padding: 1%;
		color: #fff;
	}
	.logout{
		border: none;
		background-color: orangered;
		padding: 1%;
		color: #fff;
		border-radius: 4px;
		font-weight: bold;
	}
	.logout:hover{
		color: #fff;
	}
</style>
<body align="center">
	<nav>
		<h3>দৈনিক জনমভূমি</h3>
		<ul>
			<li class="active">HOME</li>
			<li onclick="window.location.href='customer/view_customers.php'">CUSTOMERS</li>
			<li onclick="window.location.href='ads/view_ads.php'">ADVERTISEMENTS</li>
			<li onclick="window.location.href='bills/view_bills.php'">BILLS</li>
			<li onclick="window.location.href='customer/add_customer.php'">ADD CUSTOMER</li>
			<li class="logout" onclick="window.location.href='logout.php'">LOG OUT</li>
		</ul>
	</nav>

	<div id="body">
		<div id="left">
			<div class="weather">
				<img src="static/img/cloud.png" alt="icon">
				<p>Cloudy</p>
				<p>Jorhat Assam</p>
				<p class="data" style="font-size: 2em">28 °C</p>
			</div>
			<div class="sunrise">
				<img src="static/img/sunset.png" alt="icon">
				<div>
					<p>Sunrise</p>
					<p class="data">4:29 AM</p>
				</div>
			</div>
			<div class="sunrise">
				<img src="static/img/sunset.png" alt="icon">
				<div>
					<p>Sunset</p>
					<p class="data">6:09 PM</p>
				</div>
			</div>
		</div>

		<div id="middle">
			<span class="today">Today,</span>
			<span class="date">Sunday, 26th July, 2020</span>
			<!-- <div style="width: 50%;display: flex;justify-content: center;">
				<div>
					<div style="background-color: skyblue;padding: 10%;margin: 5% 5%;">
						45
					</div>
					<span>ADS THIS MONTH</span>
				</div>
				<div>
					<div style="background-color: skyblue;padding: 10%;margin: 5% 5%;">
						45
					</div>
					<span>ADS THIS MONTH</span>
				</div>
			</div> -->
			<button>Check today's schedule</button>
		</div>

		<div id="right">
			<div class="sunrise">
				<img src="static/img/sunset.png" alt="icon">
				<div>
					<p>Humidity</p>
					<p class="data">96%</p>
				</div>
			</div>
			<div class="sunrise">
				<img src="static/img/sunset.png" alt="icon">
				<div>
					<p>Air Pressure</p>
					<p class="data">1005 PS</p>
				</div>
			</div>
			<div class="sunrise">
				<img src="static/img/sunset.png" alt="icon">
				<div>
					<p>Chance of Rain</p>
					<p class="data">15%</p>
				</div>
			</div>
			<div class="sunrise">
				<img src="static/img/sunset.png" alt="icon">
				<div>
					<p>Wind Speed</p>
					<p class="data">2 kmph</p>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<p>All rights reserved 2020</p>
	</footer>
</body>
</html>