<?php
session_start();
if(isset($_SESSION['currentUser']))
{
	header("Location: dashboard.php");
}
if(isset($_SESSION['admin']))
{
	header("Location: admindashboard.php");
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width">
	<title>Ims</title>
	<script type="text/javascript" src="js\jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js\bootstrap.js"></script>
	
	<script type="text/javascript" src="jquery-ui\jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery-ui\jquery-ui.css">
	<script type="text/javascript" src="js\index.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="style/index.css" >
</head>
<body >
 
	<div style="background-image:url(lap.jpg);width:100%;height:100%;">	
		<div class="container">
			<div class="row">	
				<div class="col-md-6">
					<h2 style="color: white;">Ims.co</h2>
				</div>

				<div class="col-md-6 my-menu" style="color: white;">
					<nav class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="mynavbar">
							<ul class="nav navbar-nav" id="ul"  >
							<li><a style="color: white;" href="index.php">Home</a></li>
							<li><a style="color: white;" href="#">About</a></li>
							<li><a style="color: white;" href="#">Contact</a></li>
							<li><a style="color: white;" href="adminLogin.php">Admin</a></li>
							<li><a style="color: white;" href="signin.php">Sign In</a></li>
							<li><a style="color: white;" href="signup.php">Sign Up</a></li>
						</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>

		<div class="container" style="margin-top: 12%;color: white;">
			<center>
					<h2 >INVENTORY MANAGEMENT SYSTEM</h2>
					<h4 >Book Your Favourate Inventory with IMS</h4>
			</center>
			
		</div>
	</div>


	<div class="container" style="padding: 4%;margin-top: 3%; border: 1px solid lightgray;margin-bottom: 5%;">
		<div class="row">
			<div class="col-md-5">
				<h2>About Ims</h2>
				<p>
				Inventory Management System is a web based software tool to manage inventory of an organization in effective way.This tool will have many inbuilt features like user registrations and login and  will have capability to allow registered users to request for resource booking, track resource allotment status, to get the other status like the presently alloted to which user.</p><p>On the admin side the tool will help to generate report to check the demand for resources, to approve the resource allotment to the user, approve registration of user, keep track of any defect in resources. The tool developed is targeted to use in Institution’s/College’s, to handle resources like laptops, projectors, etc.</p>
			</div>
			<div class="col-md-7">
				<img src="images\proj1.jpg" style="width: 100%;margin-top: 10%;height: 40%;">
			</div>
		</div>
	</div>


	<div class="container" style="padding: 4%;padding-top: 1%;padding-bottom: 1%; border: 1px solid lightgray;">
		<h2>We Manage</h2>
		<div class="row">
			<div class="col-md-4" style="padding: 5%;">
				<h4>Projectors</h4>
				<img src="images\proj1.jpg" style="width: 100%;height: 25%;">
			</div>
			<div class="col-md-4" style="padding: 5%;">
				<h4>Laptops</h4>
				<img src="images\lap1.jpg" style="width: 100%;height: 25%;">
			</div>
			<div class="col-md-4" style="padding: 5%;">
				<h4>More</h4>
				<img src="lap.jpg" style="width: 100%;height: 25%;">
			</div>
		</div>
	</div>


	<div class="container-fluid" style="margin-top: 5%;background-color: gray;">
		<div class="col-md-4" style="padding: 2%;">
			<div style="margin-bottom: 5%;">
			<a href="#" style="color:white;padding: 1%;text-decoration:none;">Home</a>
			</div>
			<table class="table">
					<tr>
						<td>1</td>
					</tr>
					<tr>
						<td>2</td>
					</tr>
				</table>
		</div>
		<div class="col-md-4" style="padding: 2%;">
			<div style="margin-bottom: 5%;">
			<a href="#" style="color:white;padding: 1%;text-decoration:none;">Contact</a>
			</div>
				<table class="table">
					<tr>
						<td>Mob:</td>
						<td>7795825154</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>krishnab14696@gmail.com</td>
					</tr>
				</table>
		</div>
	</div>

</body>
</html>