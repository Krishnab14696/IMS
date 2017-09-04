<?php
	date_default_timezone_set("Asia/Kolkata");
$instid="";

$itemid="";
$itemcat="";
$itemdesc="";
$itemname="";
$msg1="";
$x=0;
session_start();
$user=$_SESSION['currentUser'];
if(!($user))
{
	echo "<script>alert(\"SignIn First !!!\");</script>";
	header("Location: index.php");
}
?>
<?php
$con=mysqli_connect('localhost','root','','php');

if(empty($_POST)==false)
{
	if(isset($_POST['feed']))
	{
		
		$feedback=$_POST['feedbackinfo'];
		$user=$_SESSION['currentUser'];
		
		$sql="insert into feedback values('$user','$feedback')";
		$res=mysqli_query($con,$sql);
		
		if($res)
		{
			echo("<script>alert(\"Feedback\");</script>");
			$x=1;
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<script type="text/javascript" src="js\jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js\bootstrap.js"></script>
	
	<script type="text/javascript" src="jquery-ui\jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery-ui\jquery-ui.css">
	<script type="text/javascript" src="js\check.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="style/style.css" >
</head>
<body>
<div class="row">
	<div class="col-md-2" style="float:left;background-color: #330033;height: 625px;">
		<div class="page-header" style="color: white;">
			<h4>Ims</h4>
		</div>
		<div class="list-group" style="width: 100%;">
	  		 <h3 style="padding:3%;color:white;">Actions</h3>
			
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="checkavailability" value="Check Inventory Availability & Book" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="cancel" value="Cancel Booking" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="return" value="Return Inventory" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="view"value="View all Inventory" /><br>
			</form>
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="booked"value="View Booked Inventory" /><br>
			</form>
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="viewI"value="View All Instructor Details" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="feedback"value="Feed Back" /><br>
			</form>
		</div>
	</div>


	<div class="col-md-10" style="float:left;background-color: white;height: 625px;">
		<div class="row" style="width: 100%; height: 12%; background-color: lightgray; color: black;padding: 0.5%;margin-bottom: 1%;">
			<div style="width: 80%;float: left;">
					<p style="font-size: 20px;">Dashboard</p><p style="font-size: 12px;">Welcome back</p>
			</div>

			<div style="width: 4%;float: left;margin-top: 1%;">
				<div class="dropdown">
				    <button class="btn btn-info dropdown-toggle btn-circle" type="button" id="menu1" data-toggle="dropdown"><span class="glyphicon glyphicon-list"></span></span></button>
				    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
				      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit Profile</a></li>
				      <li role="presentation" class="divider"></li>
				      <li role="presentation"><a role="menuitem" tabindex="-1" href="signout.php">Logout</a></li>
				    </ul>
				</div>
			</div>
			<div style="width: 15%;float: left;margin-top: 1.5%;">
				<?php 
					$sql="select * from userinfo where instid='$user'";
					$res=mysqli_query($con,$sql);
					if($res)
					{
						$row=mysqli_fetch_array($res);
						echo $row[1]." ".$row[2];
					}
				?>
			</div>
		</div>
		
		<div class="container text-center" style="padding: 1%; height: 550px;">
			<?php 
					if(isset($_POST['view']))
					{
						$sql="select * from items order by itemid asc";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<div style=\"margin-top:5%;width:87%;\"><table class=\"table table-striped\"><tr style=\"background-color:gray;\"><th >Item Id</th><th>Item Name</th><th>Item Dnum</th><th>Item Category</th><th>Item Description</th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo '<tr style="background-color:lightgray;" >
										<td style="text-align:left">'.$row[0].'</td>
										<td style="text-align:left">'.$row[1].'</td>
										<td style="text-align:left">'.$row[2].'</td>
										<td style="text-align:left">'.$row[3].'</td>
										<td style="text-align:left">'.$row[4].'</td>
									  </tr>';
							}
							echo "</table></div>";
						}
					}
					else if(isset($_POST['checkavailability']))
					{
						$sql="select * from items order by itemid asc";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<div style=\"margin-top:1%;\"><table style=\"width:87%;\" class=\"table table-striped table-bordered\"><tr style=\"background-color:gray;\"><th>Item Id</th><th>Item Name</th><th>Item Dnum</th><th>Item Category</th><th>Item Description</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightgray;\" >
										<td style=\"text-align:left\">$row[0]</td>
										<td style=\"text-align:left\">$row[1]</td>
										<td style=\"text-align:left\">$row[2]</td>
										<td style=\"text-align:left\">$row[3]</td>
										<td style=\"text-align:left\">$row[4]</td>
										<td style=\"text-align:center\"><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"itemid\" value=\"$row[0]\"><input type=\"submit\" class=\"btn btn-default\" style=\"background-color:cyan\" name=\"check\" value=\"Check Availability\"></form>
										</td>
									  </tr>";
							}
							echo "</table></div>";
							echo "<center>";
							
						}
					}
					else if(isset($_POST['viewI']))
					{
						$sql="select * from userinfo";
						$result=mysqli_query($con,$sql);
						if($result)
						{
							echo "<div style=\"margin-top:3%;width:87%;\"><table class=\"table\" border=\"1\"><tr style=\"background-color:gray\"><th>Instructor Id</th><th>Instructor Name</th><th>Instructor Dnum</th><th>Instructor Phone</th><th>Instructor Email</th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightgray\" >
										<td style=\"text-align:left\">$row[0]</td>
										<td style=\"text-align:left\">$row[1] $row[2]</td>
										<td style=\"text-align:left\">$row[3]</td>
										<td style=\"text-align:left\">$row[4]</td>
										<td style=\"text-align:left\">$row[5]</td>
									  </tr>";
							}
							echo "</table></div>";
						}
					}
					else if(isset($_POST['booked']))
					{
						$sql="select * from booked";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							
							$row=mysqli_fetch_array($result);
							
							if(!empty($row))
							{
							echo "<div style=\"margin-top:3%;width:87%;\"><table class=\"table\" border=\"1\"><tr style=\"background-color:gray\"><th>Instructor Id</th><th>Item Id</th><th>Date booked</th><th>Start Time</th><th>End Time</th><th>Purpose</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightgray\" >
										<td style=\"text-align:left;\">$row[0]</td>
										<td style=\"text-align:left;\">$row[1]</td>
										<td style=\"text-align:left;\">$row[2]</td>
										<td style=\"text-align:left;\">$row[3]</td>
										<td style=\"text-align:left;\">$row[4]</td>
										<td style=\"text-align:left;\">$row[5]</td>
										<td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$row[0]\"><input type=\"submit\" class=\"form-control\" style=\"background-color:cyan\" name=\"getPhoneNo\" value=\"Get Mobile Number\"></form>
										</td>
									  </tr>";
							}
							echo "</table></div>";
							}
							else
							{
								echo "<fieldset><h2>No bookings Found</h2></fieldset>";
							}
						}
						
					}
					else if(isset($_POST['getPhoneNo']))
					{
						$instid=$_POST['instid'];
						$sql="select * from userinfo where instid='$instid'";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							$row=mysqli_fetch_array($result);
							echo "<fieldset style=\"text-align:left;margin-top:5%;width:70%;margin-left:8%;background-color:lightgray;padding:1%;border-radius:2%;border:1px solid gray;\"><h3 class=\"page-header\">Following are instructor details who booked $itemid</h3><br><b>Instructor Id&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b>$row[0]<br><b>Instructor Name&nbsp&nbsp&nbsp&nbsp&nbsp:</b>$row[1] &nbsp $row[2]<br><b>Instructor Mobile&nbsp&nbsp&nbsp:</b>$row[4]<form action=\"\" method=\"post\"><input type=\"submit\" class=\"form-control\" name=\"ok\" style=\"margin-top:5%;float:right;width:15%;background-color:cyan;\" value=\"Ok\"></form></fieldset>";
							
						}
					}
					else if(isset($_POST['check']))
					{
						$itemid=$_POST['itemid'];
						$instid=$_SESSION['currentUser'];
						
						echo "<center><fieldset style=\"background-color:lightgray;width:40%;padding:1%; border-radius:5px; margin-top:1%;\">
							  <h4 style=\"width:100%;\">Check Inventory Availability</h4>
							  <form action=\"\" method=\"post\">
							  <table class=\"table\" style=\"width:100%\">
							  <tr>
							  <td>
							  <p style=\"margin-top:5%;\">ITEM ID</p>
							  </td>
							  <td>
							  <input class=\"form-control\" style=\"width:100%;height:90%;background-color:gray;\" type=\"text\" name=\"itemid\" maxlength=\"30\" value=\"$itemid\" required autofocus readonly><br>
							  </td>
							  </tr>
							  <tr>
							  <td>
							  <p style=\"margin-top:5%;\">DATE</p>
							  </td>
							  <td >
							  <input class=\"form-control\" style=\" width:100%;height:90%;\" type=\"text\" placeholder=\"Date\" name=\"date\" maxlength=\"30\" id=\"dateInput\" required autofocus><br>
							  </td>
							  </tr>
							  <tr>
							  <td>
							  <p style=\"margin-top:5%;\">START TIME</p>
							  </td>
							  <td>
							  <select class=\"form-control\" style=\"height:90%;width:100%;\" id=\"starttime\" name=\"starttime\" onchange=\"SetEndTime()\">
								<option value=\"08:00 AM\">08:00 AM</option>
								<option value=\"08:30 AM\">08:30 AM</option>
								<option value=\"09:00 AM\">09:00 AM</option>
								<option value=\"09:30 AM\">09:30 AM</option>
								<option value=\"10:00 AM\">10:00 AM</option>
								<option value=\"10:30 AM\">10:30 AM</option>
								<option value=\"11:00 AM\">11:00 AM</option>
								<option value=\"11:30 AM\">11:30 AM</option>
								<option value=\"12:00 PM\">12:00 PM</option>
								<option value=\"12:30 PM\">12:30 PM</option>
								<option value=\"01:00 PM\">01:00 PM</option>
								<option value=\"01:30 PM\">01:30 PM</option>
								<option value=\"02:00 PM\">02:00 PM</option>
								<option value=\"02:30 PM\">02:30 PM</option>
								<option value=\"03:00 PM\">03:00 PM</option>
								<option value=\"03:30 PM\">03:30 PM</option>
								<option value=\"04:00 PM\">04:00 PM</option>
								<option value=\"04:30 PM\">04:30 PM</option>
								<option value=\"05:00 PM\">05:00 PM</option>
								<option value=\"05:30 PM\">05:30 PM</option>
								<option value=\"06:00 PM\">06:00 PM</option>
								<option value=\"06:30 PM\">06:30 PM</option>
							  </select>
							  </td>
							  </tr>
							   <tr>
							  <td>
							  <p style=\"margin-top:5%;\">PURPOSE</p>
							  </td>
							  <td>
							  <select class=\"form-control\" style=\"height:90%;width:100%;\" name=\"purpose\" onchange=\"SetEndTime()\"required autofocus id=\"purpose\"><option value=\"class\">Class<option><option value=\"lab\">Lab<option><option value=\"other\">Other<option></select>
							  </td>	
							  </tr>
							   <tr>
							  <td>
							  <p style=\"margin-top:5%;\">END TIME</p>
							  </td>
							  <td>
							  <input class=\"form-control\" style=\"height:90%;width:100%;background-color:gray;\" type=\"text\" id=\"endtime\" placeholder=\"End time\" name=\"endtime\" maxlength=\"30\" value=\"09:00 AM\" required autofocus readonly><br>
							   </td>
							  </tr>
							   <tr>
							  <td align=\"center\" colspan=\"2\">
							  <input class=\"form-control btn btn-info\" style=\"width:80%;padding:2%;\" type=\"submit\" value=\"Check Availability\" name=\"checkNow\"><br>
							   </td>
							  </tr>
							  </form>
							  </table>
							  </fieldset></center>";
					}
					else if(isset($_POST['checkNow']))
					{
						$itemid=$_POST['itemid'];
						$date=$_POST['date'];
						$starttime=$_POST['starttime'];
						$endtime=$_POST['endtime'];
						$purpose=$_POST['purpose'];
						
						date_default_timezone_set("Asia/Kolkata");

						
						$sql="select * from booked where itemid='$itemid' and date='$date' and stime='$starttime'";
						
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							$row=mysqli_fetch_array($result);
							if(!empty($row))
							{
								echo "<fieldset class=\"container-fluid\" style=\"text-align:left;width:70%;margin-top:10%;margin-left:8%; background-color:lightgray;border-radius:2%;border:1px solid gray;\">
												<h3 class=\"page-header\">Inventory already Booked !!!</h3>
												<table  cellpadding=\"5\">
														<tr><td><b>Instructor Id </b></td><td>: $row[0]</td></tr>
														<tr><td><b>Item Id </b></td><td>: $row[1]</td></tr>
														<tr><td><b>Date </b></td><td>: $row[2]</td></tr>
														<tr><td><b>Start time </b></td><td>: $row[3]</td></tr>
														<tr><td><b>End time </b></td><td>: $row[4]</td></tr>
														<tr><td><b>Purpose </b></td><td>: $row[5]</td></tr>
												</table>
											<form action=\"\" method=\"post\">
												<input type=\"submit\" class=\"form-control\" style=\"float:right;margin-right:1%;background-color:cyan;padding:1%;width:15%;margin-bottom:2%;\" name=\"no\" value=\"Ok\">
												<input type=\"submit\" class=\"form-control\" style=\"float:right;margin-right:1%;background-color:cyan;padding:1%;width:15%;margin-bottom:2%;\" name=\"checkavailability\" value=\"Try Another\">
											</form>
											</fieldset>";
							}
							else
							{
								echo "<fieldset style=\"text-align:left;width:70%;margin-top:5%; background-color:lightgray;padding:1%;border-radius:2%;margin-left:8%;border:1px solid gray;\">
												<h3 class=\"page-header\">Inventory Available for following time & Date that you choosed !!!</h3>
													<table cellpadding=\"5\">
														<tr><td><b>ItemId </b></td><td>: $itemid</td></tr>
														<tr><td><b>Date </b></td><td>: $date</td></tr>
														<tr><td><b>Start time </b></td><td>: $starttime</td></tr>
														<tr><td><b>End time </b></td><td>: $endtime</td></tr>
														<tr><td><b>Purpose </b></td><td>: $purpose</td></tr>
													</table>
												<br>
												<form action=\"\" method=\"post\">
													<input type=\"hidden\" name=\"itemid\" value=\"$itemid\">
													<input type=\"hidden\" name=\"date\" value=\"$date\">
													<input type=\"hidden\" name=\"starttime\" value=\"$starttime\">
													<input type=\"hidden\" name=\"endtime\" value=\"$endtime\">
													<input type=\"hidden\" name=\"purpose\" value=\"$purpose\">
													<input type=\"submit\" class=\"form-control\" style=\"float:right;margin-right:5%;background-color:cyan;padding:1%;width:15%;\" value=\"BookNow\" name=\"bookNowItem\">
													<input type=\"submit\" class=\"form-control\" style=\"float:right;margin-right:1%;background-color:cyan;padding:1%;width:15%;\" name=\"no\" value=\"Not Now\">
												</form>
									  </fieldset>";
							}
						}
						
					}
					else if(isset($_POST['feedback']))
					{
						echo "<center><fieldset style=\"background-color:lightgray;width:40%;border-radius:2%; margin-top:5%;\">
							  <div style=\"width:100%\">
							  <h3 style=\"width:100%;float:left;margin-bottom:5%;\">Give Feed Back Here</h3>
							  </div>
							  <form action=\"\" method=\"post\">
							  
							  <textarea class=\"form-control\" style=\"width:90%;padding:4%;margin:2%;\" placeholder=\"Feed Back\" name=\"feedbackinfo\" required autofocus></textarea><br>
							  <input class=\"form-control btn btn-success\" style=\"width:60%;margin:1%;margin-bottom:4%;\" type=\"submit\" value=\"Submit\" name=\"feed\"><br>
							  </form>
							  </fieldset><center>";
					}
					else if($x)
					{
						
						echo "<fieldset style=\"background-color:cyan;width:87%;margin-top:5%;\">
						     <h2>Feedback successfully submitted !!!</h2>
							 </fieldset>";
						$x=0;
					}
					else if(isset($_POST['bookNowItem']))
					{
						$itemid=$_POST['itemid'];
						$date=$_POST['date'];
						$starttime=$_POST['starttime'];
						$endtime=$_POST['endtime'];
						$purpose=$_POST['purpose'];
						
						echo $date."<br>";
						echo $starttime."<br>";
						$instid=$_SESSION['currentUser'];
						
						$d=strtotime($date);
						$st=strtotime($starttime);
						$today=date("Y-m-d");
						$now=date("h:i A");
						
						echo $st."<br>";
						echo $today;
						echo $now;
						if($today<=$d && $now<=$st)
						{
							$sql="insert into booked values('$instid','$itemid','$date','$starttime','$endtime','$purpose')";
						
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<fieldset style=\"background-color:lightgray;width:70%;margin-top:4%; border-radius:2%;border:1px solid gray;text-align:left;padding:1%;margin-left:8%;\">
						     <h3 class=\"page-header\">Item successfully booked !!!</h3>
							 <table cellpadding=\"5\">
								<tr><td><b>ItemId </b></td><td>: $itemid</td></tr>
								<tr><td><b>Date </b></td><td>: $date</td></tr>
								<tr><td><b>Start time </b></td><td>: $starttime</td></tr>
								<tr><td><b>End time </b></td><td>: $endtime</td></tr>
								<tr><td><b>Purpose </b></td><td>: $purpose</td></tr>
							 </table><br>
							 <h3>Mail will be sent to you at start of your session !!!</h3>
							 <form action=\"\" method=\"post\"><input type=\"submit\" class=\"form-control\" style=\"float:right;margin-right:1%;background-color:cyan;padding:1%;width:15%;\" name=\"no\" value=\"Ok\"></form>
							 </fieldset>";
						}
						}
						
						
					}
					else if(isset($_POST['no']))
					{
						echo "";
					}
					else if(isset($_POST['return']))
					{
						$instid=$_SESSION['currentUser'];
						
						$sql="select * from booked where instid='$instid'";
						
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							
							$row=mysqli_fetch_array($result);
							
							if(!empty($row))
							{
							echo "<div style=\"margin-top:3%;width:87%;\"><table class=\"table\" border=\"1\"><tr style=\"background-color:gray\"><th>Instructor Id</th><th>Item Id</th><th>Date booked</th><th>Start Time</th><th>End Time</th><th>Purpose</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightgray\" >
										<td style=\"text-align:left\">$row[0]</td>
										<td style=\"text-align:left\">$row[1]</td>
										<td style=\"text-align:left\">$row[2]</td>
										<td style=\"text-align:left\">$row[3]</td>
										<td style=\"text-align:left\">$row[4]</td>
										<td style=\"text-align:left\">$row[5]</td>
										<td><form action=\"\" method=\"post\">
												<input type=\"hidden\" name=\"instid\" value=\"$row[0]\"><input type=\"hidden\" name=\"itemid\" value=\"$row[1]\"><input type=\"hidden\" name=\"date\" value=\"$row[2]\"><input type=\"hidden\" name=\"stime\" value=\"$row[3]\"><input type=\"hidden\" name=\"etime\" value=\"$row[4]\"><input type=\"hidden\" name=\"purpose\" value=\"$row[5]\"><input type=\"submit\" class=\"form-control\" style=\"background-color:cyan\" name=\"returnNow\" value=\"Return\">
											</form>
										</td>
									  </tr>";
							}
							echo "</table></div>";
							}
							else
							{
								echo "<fieldset><h2>No bookings Found</h2></fieldset>";
							}
						}
					}
					else if(isset($_POST['cancel']))
					{
						$instid=$_SESSION['currentUser'];
						
						$sql="select * from booked where instid='$instid'";
						
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							
							$row=mysqli_fetch_array($result);
							
							if(!empty($row))
							{
							echo "<div style=\"margin-top:3%;width:87%;\"><table class=\"table\" border=\"1\"><tr style=\"background-color:gray\"><th>Instructor Id</th><th>Item Id</th><th>Date booked</th><th>Start Time</th><th>End Time</th><th>Purpose</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightgray\" >
										<td style=\"text-align:left\">$row[0]</td>
										<td style=\"text-align:left\">$row[1]</td>
										<td style=\"text-align:left\">$row[2]</td>
										<td style=\"text-align:left\">$row[3]</td>
										<td style=\"text-align:left\">$row[4]</td>
										<td style=\"text-align:left\">$row[5]</td>
										<td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$row[0]\"><input type=\"hidden\" name=\"itemid\" value=\"$row[1]\"><input type=\"hidden\" name=\"date\" value=\"$row[2]\"><input type=\"hidden\" name=\"stime\" value=\"$row[3]\"><input type=\"hidden\" name=\"etime\" value=\"$row[4]\"><input type=\"hidden\" name=\"purpose\" value=\"$row[5]\"><input type=\"submit\" class=\"form-control\" style=\"background-color:cyan\" name=\"returnNow\" value=\"Cancel\"></form>
										</td>
									  </tr>";
							}
							echo "</table></div>";
							}
							else
							{
								echo "<fieldset><h2>No bookings Found</h2></fieldset>";
							}
						}
					}
					else if(isset($_POST['returnNow']))
					{
						$instid=$_POST['instid'];
						$itemid=$_POST['itemid'];
						$date=$_POST['date'];
						$starttime=$_POST['stime'];
						$endtime=$_POST['etime'];
						$purpose=$_POST['purpose'];
						
						$sql="delete from booked where instid='$instid' and itemid='$itemid' and date='$date' and stime='$starttime' and etime='$endtime' and purpose='$purpose'";
					
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<fieldset style=\"background-color:lightgray;width:60%;margin-top:4%;border-radius:2%;margin-left:8%;border:1px solid gray;padding:1%;text-align:left;\">
						     <h3 class=\"page-header\">Item successfully Returned !!!</h3>
							 <table cellpadding=\"5\">
								<tr><td><b>ItemId </b></td><td>: $itemid</td></tr>
								<tr><td><b>Date </b></td><td>: $date</td></tr>
								<tr><td><b>Start time </b></td><td>: $starttime</td></tr>
								<tr><td><b>End time </b></td><td>: $endtime</td></tr>
								<tr><td><b>Purpose </b></td><td>: $purpose</td></tr>
							 </table><br>
							 <h3>Mail has been sent to you please check for confirmation !!!</h3>
							 <form action=\"\" method=\"post\"><input type=\"submit\" class=\"form-control\" style=\"float:right;margin-right:1%;background-color:cyan;padding:1%;width:15%;\" name=\"no\" value=\"Ok\"></form>
							 </fieldset>";
						}
					}
					else
						echo "";
			?>
		</div>
	</div>
</div>
	<script type="text/javascript">
		function SetEndTime()
		{
			var purpose=document.getElementById("purpose").value;
			var starttime=document.getElementById("starttime").value;

			//alert(purpose+"  "+starttime);

			if(purpose=="class" || purpose=="other")
			{
				if(starttime=="08:00 AM"){ document.getElementById("endtime").value="09:00 AM";}
				else if(starttime=="09:00 AM"){ document.getElementById("endtime").value="10:00 AM";}
				else if(starttime=="10:00 AM"){ document.getElementById("endtime").value="11:00 AM";}
				else if(starttime=="11:00 AM"){ document.getElementById("endtime").value="12:00 PM";}
				else if(starttime=="12:00 PM"){ document.getElementById("endtime").value="01:00 PM";}
				else if(starttime=="01:00 PM"){	document.getElementById("endtime").value="02:00 PM";}
				else if(starttime=="02:00 PM"){ document.getElementById("endtime").value="03:00 PM";}
				else if(starttime=="03:00 PM"){ document.getElementById("endtime").value="04:00 PM";}
				else if(starttime=="04:00 PM"){ document.getElementById("endtime").value="05:00 PM";}
				else if(starttime=="05:00 PM"){ document.getElementById("endtime").value="06:00 PM";}
				else if(starttime=="06:00 PM"){ document.getElementById("endtime").value="07:00 PM";}
				else if(starttime=="08:30 AM"){ document.getElementById("endtime").value="09:30 AM";}
				else if(starttime=="09:30 AM"){ document.getElementById("endtime").value="10:30 AM";}
				else if(starttime=="10:30 AM"){ document.getElementById("endtime").value="11:30 AM";}
				else if(starttime=="11:30 AM"){ document.getElementById("endtime").value="12:30 PM";}
				else if(starttime=="12:30 PM"){ document.getElementById("endtime").value="01:30 PM";}
				else if(starttime=="01:30 PM"){ document.getElementById("endtime").value="02:30 PM";}
				else if(starttime=="02:30 PM"){ document.getElementById("endtime").value="03:30 PM";}
				else if(starttime=="03:30 PM"){ document.getElementById("endtime").value="04:30 PM";}
				else if(starttime=="04:30 PM"){ document.getElementById("endtime").value="05:30 PM";}
				else if(starttime=="05:30 PM"){ document.getElementById("endtime").value="06:30 PM";}
				else if(starttime=="06:30 PM"){ document.getElementById("endtime").value="07:30 PM";}
				else{ document.getElementById("endtime").value="09:00 AM";}
			}
			else
			{
				if(starttime=="08:00 AM"){ document.getElementById("endtime").value="10:00 AM";}
				else if(starttime=="09:00 AM"){ document.getElementById("endtime").value="11:00 AM";}
				else if(starttime=="10:00 AM"){ document.getElementById("endtime").value="12:00 PM";}
				else if(starttime=="11:00 AM"){ document.getElementById("endtime").value="01:00 PM";}
				else if(starttime=="12:00 PM"){ document.getElementById("endtime").value="02:00 PM";}
				else if(starttime=="01:00 PM"){	document.getElementById("endtime").value="03:00 PM";}
				else if(starttime=="02:00 PM"){ document.getElementById("endtime").value="04:00 PM";}
				else if(starttime=="03:00 PM"){ document.getElementById("endtime").value="05:00 PM";}
				else if(starttime=="04:00 PM"){ document.getElementById("endtime").value="06:00 PM";}
				else if(starttime=="05:00 PM"){ document.getElementById("endtime").value="07:00 PM";}
				else if(starttime=="06:00 PM"){ document.getElementById("endtime").value="08:00 PM";}
				else if(starttime=="08:30 AM"){ document.getElementById("endtime").value="10:30 AM";}
				else if(starttime=="09:30 AM"){ document.getElementById("endtime").value="11:30 AM";}
				else if(starttime=="10:30 AM"){ document.getElementById("endtime").value="12:30 PM";}
				else if(starttime=="11:30 AM"){ document.getElementById("endtime").value="01:30 PM";}
				else if(starttime=="12:30 PM"){ document.getElementById("endtime").value="02:30 PM";}
				else if(starttime=="01:30 PM"){ document.getElementById("endtime").value="03:30 PM";}
				else if(starttime=="02:30 PM"){ document.getElementById("endtime").value="04:30 PM";}
				else if(starttime=="03:30 PM"){ document.getElementById("endtime").value="05:30 PM";}
				else if(starttime=="04:30 PM"){ document.getElementById("endtime").value="06:30 PM";}
				else if(starttime=="05:30 PM"){ document.getElementById("endtime").value="07:30 PM";}
				else if(starttime=="06:30 PM"){ document.getElementById("endtime").value="08:30 PM";}

				else{ document.getElementById("endtime").value="09:00 AM";}	
			}

				//if(starttime=="09:00 AM" && (purpose="1" | purpose=="3"){ document.getElementById("endtime").value="10:00 AM";}
			
			/*if(purpose=="class" || purpose="other")
			{
				alert("Class or Other");
				
				if(starttime=="08:00 AM"){ document.getElementById("endtime").value="09:00 AM";}
				else if(starttime=="09:00 AM"){ document.getElementById("endtime").value="10:00 AM";}
				else if(starttime=="10:00 AM"){ document.getElementById("endtime").value="11:00 AM";}
				else if(starttime=="11:00 AM"){ document.getElementById("endtime").value="12:00 PM";}
				else if(starttime=="12:00 PM"){ document.getElementById("endtime").value="01:00 PM";}
				else if(starttime=="01:00 PM"){	document.getElementById("endtime").value="02:00 PM";}
				else if(starttime=="02:00 PM"){ document.getElementById("endtime").value="03:00 PM";}
				else if(starttime=="03:00 PM"){ document.getElementById("endtime").value="04:00 PM";}
				else if(starttime=="04:00 PM"){ document.getElementById("endtime").value="05:00 PM";}
				else if(starttime=="05:00 PM"){ document.getElementById("endtime").value="06:00 PM";}
				else if(starttime=="06:00 PM"){ document.getElementById("endtime").value="07:00 PM";}
				else{ document.getElementById("endtime").value="09:00 AM";}*/
			//}
		}
	</script>
	  
</body>
</html>



