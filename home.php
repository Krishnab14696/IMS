<?php
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
			$x=1;
		}
	}
}
?>
<html>
<head>
</head>
<body>
	<div style="width:100%;height:15%;background-color:lightgreen;margin-left:0.4%;padding:0.4%;">
		<div style="width:10%;height:95%;float:left;text-align:center;margin-left:0.5%;padding:0.1%;">
			<h3>@IMS</h3>
		</div>
		<div style="width:66%;float:left;height:95%;margin-left:1%;text-align:center;padding:0.1%;">
			<h3>INVENTORY MANAGEMENT SYSTEM</h3>
		</div>
		<div style="width:20%;float:left;height:60%;margin-left:1%;text-align:center;padding-top:3%;">
			<a href="signout.php" style="background-color:orange;margin-left:5%;margin-top:10%;color:white;padding:3%;text-decoration:none;">SignOut</a><br>
		    <br>Signed In as <b><?php echo $user; ?></b>
		</div>
	</div >
	
	<div style="width:100%;height:80%;padding:0.4%;">
	
		<div style="width:20%;height:100%;float:left;background-color:lightgreen;text-align:center;padding:0.1%;">
			<h3 style="background-color:green;padding:3%;color:white;">Choose Options</h3>
			
			<form action="" method="post">
				<input type="submit" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="checkavailability" value="Check Inventory Availability & Book" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="cancel" value="Cancel Booking" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="return" value="Return Inventory" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="view"value="View all Inventory" /><br>
			</form>
			<form action="" method="post">
				<input type="submit" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="booked"value="View Booked Inventory" /><br>
			</form>
			<form action="" method="post">
				<input type="submit" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="viewI"value="View All Instructor Details" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" style="background-color:green;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="feedback"value="Feed Back" /><br>
			</form>
		</div>
		<div style="width:78%;float:left;height:100%;background-color:white;margin-left:1%;text-align:center;padding:0.1%;">
			<?php 
					if(isset($_POST['view']))
					{
						$sql="select * from items order by itemid asc";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<center><div style=\"margin-top:5%;\"><table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr style=\"background-color:blue\"><th>Item Id</th><th>Item Name</th><th>Item Dnum</th><th>Item Category</th><th>Item Description</th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightblue\" ><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
							}
							echo "</table></div></center>";
						}
					}
					else if(isset($_POST['checkavailability']))
					{
						$sql="select * from items order by itemid asc";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<center><div style=\"margin-top:1%;\"><table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr style=\"background-color:blue\"><th>Item Id</th><th>Item Name</th><th>Item Dnum</th><th>Item Category</th><th>Item Description</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightblue\" ><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"itemid\" value=\"$row[0]\"><input type=\"submit\" style=\"background-color:cyan\" name=\"check\" value=\"Check Availability\"></form></td></tr>";
							}
							echo "</table></div></center>";
						}
					}
					else if(isset($_POST['viewI']))
					{
						$sql="select * from userinfo";
						$result=mysqli_query($con,$sql);
						if($result)
						{
							echo "<center><div style=\"margin-top:5%;\"><table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr style=\"background-color:blue\"><th>Instructor Id</th><th>Instructor FirstName</th><th>Instructor LastName</th><th>Instructor Dnum</th><th>Instructor Phone</th><th>Instructor Email</th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightblue\" ><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
							}
							echo "</table></div></center>";
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
							echo "<center><div style=\"margin-top:3%;\"><table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr style=\"background-color:blue\"><th>Instructor Id</th><th>Item Id</th><th>Date booked</th><th>Start Time</th><th>End Time</th><th>Purpose</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightblue\" ><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$row[0]\"><input type=\"submit\" style=\"background-color:cyan\" name=\"getPhoneNo\" value=\"Get Mobile Number\"></form></td></tr>";
							}
							echo "</table></div></center>";
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
							echo "<center><fieldset style=\"text-align:left;margin-top:5%;width:50%;\"><h2>Following are instructor details who booked $itemid</h2><br><b>Instructor Id&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b>$row[0]<br><b>Instructor Name&nbsp&nbsp&nbsp&nbsp&nbsp:</b>$row[1] &nbsp $row[2]<br><b>Instructor Mobile&nbsp&nbsp&nbsp:</b>$row[4]<form action=\"\" method=\"post\"><input type=\"submit\" name=\"ok\" style=\"margin-top:5%;float:right;width:15%;background-color:cyan;\" value=\"Ok\"></form></fieldset></center>";
							
						}
					}
					else if(isset($_POST['check']))
					{
						$itemid=$_POST['itemid'];
						$instid=$_SESSION['currentUser'];
						
						echo "<center><fieldset style=\"background-color:cyan;width:40%;margin-top:1%;\">
							  <div style=\"width:100%\">
							  <h2 style=\"width:75%;float:left;\">Check Inventory Availability</h2><form action=\"\" method=\"post\"><input style=\"width:15%;margin-top:8%;float:left;background-color:yellow;\" type=\"submit\" name=\"reset\" value=\"Reset\" onclick=\"reset()\"></form>
							  </div>
							  <form action=\"\" method=\"post\">
							  <table style=\"width:100%\">
							  <tr>
							  <td colspan=\"2\">
							  <p style=\"margin-top:2%;\"><?php echo (isset($msg1))?$msg1:'';?></p>
							  </td>
							  </tr>
							  <tr>
							  <td>
							  ITEM ID
							  </td>
							  <td>
							  <input style=\"width:90%;padding:5%;margin:2%;background-color:lightgray;\" type=\"text\" name=\"itemid\" maxlength=\"30\" value=\"$itemid\" required autofocus readonly><br>
							  </td>
							  </tr>
							  <tr>
							  <td>
							  DATE
							  </td>
							  <td >
							  <input style=\"width:90%;padding:5%;margin:2%;\" type=\"date\" name=\"date\" maxlength=\"30\" required autofocus><br>
							  </td>
							  </tr>
							  <tr>
							  <td>
							  START TIME
							  </td>
							  <td>
							  <select style=\"width:90%;padding:5%;margin:2%;\" id=\"starttime\" name=\"starttime\">
								<option value=\"08:00 AM\">08:00 AM</option>
								<option value=\"09:00 AM\">09:00 AM</option>
								<option value=\"10:00 AM\">10:00 AM</option>
								<option value=\"11:00 AM\">11:00 AM</option>
								<option value=\"12:00 PM\">12:00 PM</option>
								<option value=\"01:00 AM\">01:00 PM</option>
								<option value=\"02:00 PM\">02:00 PM</option>
								<option value=\"03:00 PM\">03:00 PM</option>
								<option value=\"04:00 PM\">04:00 PM</option>
								<option value=\"05:00 PM\">05:00 PM</option>
								<option value=\"06:00 PM\">06:00 PM</option>
							  </select>
							  </td>
							  </tr>
							   <tr>
							  <td>
							  PURPOSE
							  </td>
							  <td>
							  <select style=\"width:90%;padding:5%;margin:2%;\" name=\"purpose\" onchange=\"SetEndTime(this.value)\"required autofocus><option value=\"class\">Class<option><option value=\"lab\">Lab<option><option value=\"other\">Other<option></select>
							  </td>
							  </tr>
							   <tr>
							  <td>
							  END TIME
							  </td>
							  <td>
							  <input style=\"width:90%;padding:5%;margin:2%;background-color:lightgray;\" type=\"text\" id=\"endtime\" placeholder=\"End time\" name=\"endtime\" maxlength=\"30\" value=\"\" required autofocus readonly><br>
							   </td>
							  </tr>
							   <tr>
							  <td align=\"center\" colspan=\"2\">
							  <input style=\"width:80%;padding:2%;margin:2%;\" type=\"submit\" value=\"Check Availability\" name=\"checkNow\"><br>
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
						
						$sql="select * from booked where itemid='$itemid' and date='$date' and stime='$starttime'";
						
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							$row=mysqli_fetch_array($result);
							if(!empty($row))
							{
								echo "<center><fieldset style=\"text-align:left;width:60%;margin-top:5%;\">
												<h2>Inventory already Booked !!!</h2>
												<table cellpadding=\"5\">
														<tr><td><b>Instructor Id </b></td><td>: $row[0]</td></tr>
														<tr><td><b>Item Id </b></td><td>: $row[1]</td></tr>
														<tr><td><b>Date </b></td><td>: $row[2]</td></tr>
														<tr><td><b>Start time </b></td><td>: $row[3]</td></tr>
														<tr><td><b>End time </b></td><td>: $row[4]</td></tr>
														<tr><td><b>Purpose </b></td><td>: $row[5]</td></tr>
												</table>
											<form action=\"\" method=\"post\">
												<input type=\"submit\" style=\"float:right;margin-right:1%;background-color:cyan;padding:1%;width:15%;\" name=\"no\" value=\"Ok\">
												<input type=\"submit\" style=\"float:right;margin-right:1%;background-color:cyan;padding:1%;width:15%;\" name=\"checkavailability\" value=\"Try Another\">
											</form>
											</fieldset>
										</center>";
							}
							else
							{
								echo "<center><fieldset style=\"text-align:left;width:60%;margin-top:5%;\">
												<h2>Inventory Available for following time & Date that you choosed !!!</h2>
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
													<input type=\"submit\" style=\"float:right;margin-right:5%;background-color:cyan;padding:1%;width:15%;\" value=\"BookNow\" name=\"bookNowItem\">
													<input type=\"submit\" style=\"float:right;margin-right:1%;background-color:cyan;padding:1%;width:15%;\" name=\"no\" value=\"No\">
												</form>
											  </fieldset>
									  </center>";
							}
						}
						
					}
					else if(isset($_POST['feedback']))
					{
						echo "<center><fieldset style=\"background-color:cyan;width:30%;margin-top:5%;\">
							  <div style=\"width:100%\">
							  <h2 style=\"width:75%;float:left;\">Give Feed Back Here</h2><form action=\"\" method=\"post\"><input style=\"width:15%;margin-top:10%;float:left;background-color:yellow;\" type=\"submit\" name=\"reset\" value=\"Reset\" onclick=\"reset()\"></form>
							  </div>
							  <form action=\"\" method=\"post\">
							  <p style=\"margin-top:2%;\"><?php echo (isset($msg1))?$msg1:'';?></p>
							  <textarea style=\"width:90%;padding:5%;margin:2%;\" placeholder=\"Feed Back\" name=\"feedbackinfo\" required autofocus></textarea><br>
							  <input style=\"width:80%;padding:5%;margin:2%;\" type=\"submit\" value=\"Submit\" name=\"feed\"><br>
							  </form>
							  </fieldset><center>";
					}
					else if($x)
					{
						echo "<center><fieldset style=\"background-color:cyan;width:30%;margin-top:5%;\">
						     <h2>Feedback successfully submitted !!!</h2>
							 </fieldset></center>";
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
							echo "<center><fieldset style=\"background-color:cyan;width:60%;margin-top:4%;\">
						     <h2>Item successfully booked !!!</h2>
							 <table cellpadding=\"5\">
								<tr><td><b>ItemId </b></td><td>: $itemid</td></tr>
								<tr><td><b>Date </b></td><td>: $date</td></tr>
								<tr><td><b>Start time </b></td><td>: $starttime</td></tr>
								<tr><td><b>End time </b></td><td>: $endtime</td></tr>
								<tr><td><b>Purpose </b></td><td>: $purpose</td></tr>
							 </table><br>
							 <h2>Mail will be sent to you at start of your session !!!</h2>
							 <form action=\"\" method=\"post\"><input type=\"submit\" style=\"float:right;margin-right:1%;background-color:cyan;padding:1%;width:15%;\" name=\"no\" value=\"Ok\"></form>
							 </fieldset></center>";
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
							echo "<center><div style=\"margin-top:3%;\"><table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr style=\"background-color:blue\"><th>Instructor Id</th><th>Item Id</th><th>Date booked</th><th>Start Time</th><th>End Time</th><th>Purpose</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightblue\" ><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$row[0]\"><input type=\"hidden\" name=\"itemid\" value=\"$row[1]\"><input type=\"hidden\" name=\"date\" value=\"$row[2]\"><input type=\"hidden\" name=\"stime\" value=\"$row[3]\"><input type=\"hidden\" name=\"etime\" value=\"$row[4]\"><input type=\"hidden\" name=\"purpose\" value=\"$row[5]\"><input type=\"submit\" style=\"background-color:cyan\" name=\"returnNow\" value=\"Return\"></form></td></tr>";
							}
							echo "</table></div></center>";
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
							echo "<center><div style=\"margin-top:3%;\"><table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr style=\"background-color:blue\"><th>Instructor Id</th><th>Item Id</th><th>Date booked</th><th>Start Time</th><th>End Time</th><th>Purpose</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightblue\" ><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$row[0]\"><input type=\"hidden\" name=\"itemid\" value=\"$row[1]\"><input type=\"hidden\" name=\"date\" value=\"$row[2]\"><input type=\"hidden\" name=\"stime\" value=\"$row[3]\"><input type=\"hidden\" name=\"etime\" value=\"$row[4]\"><input type=\"hidden\" name=\"purpose\" value=\"$row[5]\"><input type=\"submit\" style=\"background-color:cyan\" name=\"returnNow\" value=\"Cancel\"></form></td></tr>";
							}
							echo "</table></div></center>";
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
							echo "<center><fieldset style=\"background-color:cyan;width:60%;margin-top:4%;\">
						     <h2>Item successfully Returned !!!</h2>
							 <table cellpadding=\"5\">
								<tr><td><b>ItemId </b></td><td>: $itemid</td></tr>
								<tr><td><b>Date </b></td><td>: $date</td></tr>
								<tr><td><b>Start time </b></td><td>: $starttime</td></tr>
								<tr><td><b>End time </b></td><td>: $endtime</td></tr>
								<tr><td><b>Purpose </b></td><td>: $purpose</td></tr>
							 </table><br>
							 <h2>Mail has been sent to you please check for confirmation !!!</h2>
							 <form action=\"\" method=\"post\"><input type=\"submit\" style=\"float:right;margin-right:1%;background-color:cyan;padding:1%;width:15%;\" name=\"no\" value=\"Ok\"></form>
							 </fieldset></center>";
						}
					}
					else
						echo "";
			?>
		</div>
		
	<div>
</body>
<script>
	function SetEndTime(purpose)
	{
		var stime=document.getElementById("starttime").value;
		if(purpose=="class" || purpose=="other")
		{
			if(stime=="08:00 AM"){ document.getElementById("endtime").value="09:00 AM";}
			else if(stime=="09:00 AM"){ document.getElementById("endtime").value="10:00 AM";}
			else if(stime=="10:00 AM"){ document.getElementById("endtime").value="11:00 AM";}
			else if(stime=="11:00 AM"){ document.getElementById("endtime").value="12:00 PM";}
			else if(stime=="12:00 PM"){ document.getElementById("endtime").value="01:00 PM";}
			else if(stime=="01:00 PM"){ document.getElementById("endtime").value="02:00 PM";}
			else if(stime=="02:00 PM"){ document.getElementById("endtime").value="03:00 PM";}
			else if(stime=="03:00 PM"){ document.getElementById("endtime").value="04:00 PM";}
			else if(stime=="04:00 PM"){ document.getElementById("endtime").value="05:00 PM";}
			else if(stime=="05:00 PM"){ document.getElementById("endtime").value="06:00 PM";}
			else if(stime=="06:00 PM"){ document.getElementById("endtime").value="07:00 PM";}
		}
		else
		{
			if(stime=="08:00 AM"){ document.getElementById("endtime").value="09:00 AM";}
			else if(stime=="09:00 AM"){ document.getElementById("endtime").value="10:00 AM";}
			else if(stime=="10:00 AM"){ document.getElementById("endtime").value="11:00 AM";}
			else if(stime=="11:00 AM"){ document.getElementById("endtime").value="12:00 PM";}
			else if(stime=="12:00 PM"){ document.getElementById("endtime").value="01:00 PM";}
			else if(stime=="01:00 PM"){ document.getElementById("endtime").value="02:00 PM";}
			else if(stime=="02:00 PM"){ document.getElementById("endtime").value="03:00 PM";}
			else if(stime=="03:00 PM"){ document.getElementById("endtime").value="04:00 PM";}
			else if(stime=="04:00 PM"){ document.getElementById("endtime").value="05:00 PM";}
			else if(stime=="05:00 PM"){ document.getElementById("endtime").value="06:00 PM";}
			else if(stime=="06:00 PM"){ document.getElementById("endtime").value="07:00 PM";}
		}
	}
</script>
</html>  