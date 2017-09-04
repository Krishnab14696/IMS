<?php

session_start();
$user=$_SESSION['currentUser'];
if(!($user))
{
	echo "<script>alert(\"SignIn First !!!\");</script>";
	header("Location: index.php");
}



include "connect.php";

$sql="select * from userinfo where instid='$user'";

$res=mysqli_query($con,$sql);

$instid="";
$fname="";
$lname="";
$dnum=3;
$phone="";
$email="";
$password="";
$password2="";

if($res)
{
	$row=mysqli_fetch_array($res);

	$fname=$row[1];
	$lname=$row[2];
	$dnum=3;
	$phone=$row[4];
	$email=$row[5];
	$password=$row[6];
	$password2=$row[6];
}

		if(empty($_POST)==false)
	  	{
	  		if(isset($_POST['signup']))
	  		{
	  			$instid =$_POST['instid'];
	  			$fname=$_POST['fname'];
	  			$lname=$_POST['lname'];
	  			$email=$_POST['email'];
	  			$phone=$_POST['phone'];
	  			$password2=$_POST['password2'];
	  			$password=$_POST['password'];


	  	
	  			if($password==$password2)
	  			{
	  				
		  					$sql="update userinfo set fname='$fname' and lname='$lname' and email='$email' and phone='$phone' and password='$password' where instid='$instid'";
		  					
							$result=mysqli_query($con,$sql);

							if($result)
							{
								echo "<div class=\"row alert-success col-md-offset-1 col-md-8\" id=\"alert\"><h3>Details successfully updated !!! $fname $lname</h3></div>";
							}
							else
							{
								echo "<div class=\"row alert-danger col-md-offset-1 col-md-8\" id=\"alert\"><h3>Error in updating the values !!!</h3></div>";
							}
		  				
	  			}
	  			else
	  			{
	  				echo "<h4>Password doesn't match !!!</h4>";
	  			}

	  		}
	  		else
	  			echo "";
	  	}

	?>	
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<script type="text/javascript" src="js\jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js\bootstrap.js"></script>
	<script type="text/javascript" src="js\validation.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css" >

</head>
<body>
<div class="row">
<div class="page-header container col-md-8 col-md-offset-1"><h2>INVENTORY MANAGEMENT SYSTEM</h2></div>
<div class="col-md-2"><a href="userdashboard.php" class="btn btn-default glyphicon glyphicon-arrow-left" style="margin-top: 30%; width: 50%;"></a></div>
</div>


	


</div class="container">
	<center>
		<div id="form" class="container text-left col-md-offset-1 col-md-8" style="border-color: lightgray;">
		<h3 style="margin-bottom: 3%;">Edit Profile</h3>
			
			<form action="" method="POST">
				
				<div class="row">
				<div style="margin-left: 2%;"><b>Instructor Id:</b></div>
				
				<div class="col-md-5"><input type="text" class="form-control" name="instid" id="instid" value="<?php echo $user;?>" required autofocus readonly></div>
				<div class="col-md-4" id="err_instid"></div>
				</div>
				<br>
				<div class="row">
				<div style="margin-left: 2%;"><b>First Name:</b></div>
				
				<div class="col-md-5"><input type="text" class="form-control" name="fname" id="fname" value="<?php echo $fname;?>" required autofocus></div>
				<div class="col-md-4" id="err_fname"></div>
				</div>
				<br>

				<div class="row">
				<div style="margin-left: 2%;"><b>Last Name:</b></div>
				
				<div class="col-md-5"><input type="text" class="form-control" name="lname" id="lname"  value="<?php echo $lname;?>" required autofocus></div>
				<div class="col-md-4" id="err_lname"></div>
				</div>
				<br>

				<div class="row">
				<div style="margin-left: 2%;"><b>Email:</b></div>
				
				<div class="col-md-5"><input type="text" class="form-control" name="email" id="email"  value="<?php echo $email;?>" required autofocus></div>
				<div class="col-md-4" id="err_email"></div>
				</div>
				<br>

				<div class="row">
				<div style="margin-left: 2%;"><b>Mobile Number:</b></div>
				
				<div class="col-md-5"><input type="text" class="form-control" name="phone" id="phone"  value="<?php echo $phone;?>" required autofocus></div>
				<div class="col-md-4" id="err_phone"></div>
				</div>
				<br>

				<div class="row">
				<div style="margin-left: 2%;"><b>Password:</b></div>
				
				<div class="col-md-5"><input type="password" class="form-control" name="password" id="password"  value="<?php echo $password;?>" required autofocus></div>
				<div class="col-md-4" id="err_password"></div>
				</div>
				<br>

				<div class="row">
				<div style="margin-left: 2%;"><b>Confirm password:</b></div>
				
				<div class="col-md-5"><input type="password" class="form-control" name="password2" id="passwordassword2"  value="<?php echo $password2;?>" required autofocus></div>
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