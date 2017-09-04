<!DOCTYPE html>
<html>
<head>
	<title>Acknoledgement</title>
	<link rel="stylesheet" href="css/bootstrap.css" >
</head>
<body>
	<center>
		<fieldset class="card" style="width: 50%;margin-top: 10%;">
			<div style="border:1px solid black; ">
				<div style="height: 20%;text-align: center;text-align: left; background-color: blue;color: white;padding: 1%;">
					<b>Successfully Registered !!!</b>
				</div>

				<div style="height: 20%;text-align: center;padding: 1%;text-align: left;">
					<pre>
						<div><b>Name</b>	: Krishna</div>
						<div><b>Email</b>   : krishnab14696@gmail.com</div>
						<div><b>Username</b>: <?php session_start(); echo $_SESSION['currentUser'];?></div>
					</pre>

					<div class="row">
						<div class="col-md-2 col-md-offset-7">
						<form action="index.php"><input type="submit" name="submit" value="Goto Home" class="btn btn-default"></form>
						</div>
						<div class="col-md-2">
						<form action="signin.php" method="post">
							<input type="hidden" name="instid" value="<?php echo $_SESSION['currentUser']; ?>">
							<input type="submit" name="submit" value="sign In Now" class="btn btn-success"></form>
						</div>	
					</div>
				</div>

			</div>
		</fieldset>
	</center>
</body>
</html>