<?php
session_start();
if(!(isset($_SESSION['admin'])))
{
	header("Location: index.php");
}
$instid="";
$password="";
$password2="";


include "connect.php";

		if(empty($_POST)==false)
	  	{
	  		if(isset($_POST['signup']))
	  		{
	  			$instid =$_POST['instid'];
	  			$password2=$_POST['password2'];
	  			$password=$_POST['password'];

	  			if($password==$password2)
	  			{
	  				$sql="update administrator set upass='$password' where uname='$instid'";

		  			$result=mysqli_query($con,$sql);

			  			if($result )
			  			{
		  				
		  					echo "<div class=\"row alert-success col-md-offset-1 col-md-8\" id=\"alert\"><h4>Password successfully updated !!!</h4></div>";
		  				}
		  				else
		  				{
		  					echo "<div class=\"row alert-danger col-md-offset-1 col-md-8\" id=\"alert\"><h4>Error in updating the values !!!</h4></div>";
		  				}
		  				
		  			
	  			}
	  			else
	  			{
	  				echo "<div class=\"row alert-danger col-md-offset-1 col-md-8\" id=\"alert\"><h4>Password doesn't match !!!</h4></div>";
	  			}

	  		}

	  	}

	?>	
<!DOCTYPE html>
<html>
<head>
	<title>Form validation</title>
	<script type="text/javascript" src="js\jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js\bootstrap.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css" >

</head>
<body>
<div class="row">
<div class="page-header container col-md-8 col-md-offset-1"><h2>INVENTORY MANAGEMENT SYSTEM</h2></div>
<div class="col-md-2"><a href="admindashboard.php" class="btn btn-default glyphicon glyphicon-arrow-left" style="margin-top: 30%; width: 50%;"></a></div>
</div>




</div class="container">
	<center>
		<div id="form" class="container text-left col-md-offset-1 col-md-8" style="border-color: lightgray;">
		<h3 style="margin-bottom: 3%;">Edit Profile</h3>
			
			<form action="" method="POST">
				
				<div class="row">
				<div style="margin-left: 2%;"><b>Username:</b></div>
				
				<div class="col-md-5"><input type="text" class="form-control" name="instid" id="instid" value="admincs" required autofocus readonly></div>
				<div class="col-md-4" id="err_instid"></div>
				</div>
				<br>
				<div class="row">
				<div style="margin-left: 2%;"><b>Password:</b></div>
				
				<div class="col-md-5"><input type="text" class="form-control" name="password" id="password" value="" required autofocus></div>
				<div class="col-md-4" id="err_password"></div>
				</div>
				<br>
				
				<div class="row">
				<div style="margin-left: 2%;"><b>Confirm Password:</b></div>
				
				<div class="col-md-5"><input type="text" class="form-control" name="password2" id="password2" value="" required autofocus></div>
				<div class="col-md-4" id="err_password2"></div>
				</div>
				<br>
				

				<div class="row">
				<div class="col-md-5"><input type="submit" class="form-control btn-success" value="Update" name="signup"></div>
				
				<br>
				<br>
				<br>
				<br>

			</form>
		</div>
	</center>
</body>
</html>