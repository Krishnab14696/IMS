<?php
$instid="";
$password="";
include "connect.php";
?>

<?php
		if(empty($_POST)==false)
	  	{
	  		if(isset($_POST['signin']))
	  		{
	  			$instid =$_POST['instid'];
	  			$password=$_POST['password'];

	  			$sql="select * from administrator where uname='$instid' and upass='$password'";

	  			$result=mysqli_query($con,$sql);

	  			if($result )
	  			{
	  				$row=mysqli_fetch_array($result);
	  				if($row[0]==$instid && $row[1]==$password)
	  				{
	  					session_start();
	  					$_SESSION['admin']=$instid;
	  					header("Location: admindashboard.php");
	  				}
	  				else
	  				echo "<div class=\"row alert-danger col-md-offset-1 col-md-8\" id=\"alert\"><h3>Invalid Username Or Password !!!</h3></div>";
	  			}

	  		}
	  		else
	  			echo "";
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
<div class="page-header container col-md-6 col-md-offset-1"><h2>INVENTORY MANAGEMENT SYSTEM</h2></div>
<div class="col-md-2"><a href="index.php" class="btn btn-default glyphicon glyphicon-arrow-left" style="margin-top: 30%; width: 50%;"></a></div>
</div>


</div class="container">
	<center>
		<div id="form" class="container text-left col-md-offset-1 col-md-8" style="border-color: lightgray;">
		<h3 style="margin-bottom: 4%;">Sign In Now</h3>
			
			<form action="" method="post"> 
				
				<div class="row">
				<div style="margin-left: 2%;"><b>Username:</b></div>
				
				<div class="col-md-5"><input type="text" class="form-control" name="instid" id="instid" value="<?php echo $instid;?>" required autofocus></div>
				<div class="col-md-4" id="err_instid" style="color: red;"></div>
				</div>
				<br>
				

				<div class="row">
				<div style="margin-left: 2%;"><b>Password:</b></div>
				
				<div class="col-md-5"><input type="password" class="form-control" name="password" id="password" required autofocus></div>
				<div class="col-md-4" id="err_password"></div>
				</div>
				<br>

				<div class="row">
				<div style="margin-left: 2%;"><b></b></div>
				
				<div class="col-md-5"><input type="submit" class="form-control btn-success" value="Sign In" name="signin"></div>
				<div class="col-md-4" ></div>
				</div>
				<br>
			

				<div class="row">
				<div style="margin-left: 2%;"><b></b></div>
				<div class="col-md-5"><a style="text-decoration:none;" href="#">Forgot Password?</a></div>
				<div class="col-md-4"></div>
				</div>
				<br>


				<br>
				<br>
				<br>

			</form>
		</div>
	</center>
</body>
</html>