<?php
session_start();
if(!(isset($_SESSION['admin'])))
{
	header("Location: index.php");
}
$user=$_SESSION['admin'];

$itemid="";
$msg1="";
$itemname="";
$dnum=3;
$itemcat="";
$itemdesc="";
$added=0;
$deleted=0;


$instid="";
$instname="";
$addedI=0;
$deletedIn=0;


?>
<?php
$con=mysqli_connect('localhost','root','','php');

	if(empty($_POST)==false)
		{
			if(isset($_POST['addNow']))
			{
				$itemid=$_POST['itemid'];
				$itemname=$_POST['itemname'];
				$dnum=3;
				$itemcat=$_POST['itemcat'];
				$itemdesc=$_POST['itemdesc'];
				
				$sql="insert into items values('$itemid','$itemname',$dnum,'$itemcat','$itemdesc')";
				
				$result=mysqli_query($con,$sql);
				
				if($result)
				{
					$added=1;
				}
			}
			if(isset($_POST['delete']))
			{
				$itemid=$_POST['itemid'];
				
				$sql="delete from items where itemid='$itemid'";
				
				$result=mysqli_query($con,$sql);
				
				if($result)
				{
					$deleted=1;
				}
			}
			if(isset($_POST['deleteI']))
			{
				$instid=$_POST['instid'];
				
				$sql="delete from instructor where instid='$instid'";
				
				$result=mysqli_query($con,$sql);
				
				if($result)
				{
					$deletedIn=1;
				}
			}
			if(isset($_POST['deletefeed']))
			{
				$instid=$_POST['instid'];
				$feedback=$_POST['feedback'];
				$sql="delete from feedback where instid='$instid' and feedback='$feedback'";
				
				$result=mysqli_query($con,$sql);
				
				if($result)
				{
					$deletedFeed=1;
				}
			}
			if(isset($_POST['addI']))
			{
				$instid=$_POST['instid'];
				$instname=$_POST['instname'];
				$sql="insert into instructor values('$instid','$instname')";
				
				$result=mysqli_query($con,$sql);
				
				if($result)
				{
					$addedI=1;
				}
			}
		}
				
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style\dash.css">
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


	<div id="container1">
		<div class="sidebar">
			<h3>Ims</h3>
			<hr>

			<h4 style="padding:3%;color:white;">Actions</h4>

			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="addItem"value="Add Item" /><br>
			</form>
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="deleteItem"value="Delete Item" /><br>
			</form>
			
			
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="viewItems"value="View all Items" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="addInst"value="Add Instructor" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="deleteInst"value="Delete Instructor" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="viewInsts"value="View all Instructors" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" class="list-group-item list-group-item-action list-group-item-info" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="viewfeed"value="View Feedbacks" /><br>
			</form>
		</div>



		<div class="content">
			<div class="dashboardheader">
				<div style="width: 85%;float: left;">
					<h4>Dashboard</h4>
					<p>Welcome back,<?php echo " ".$user;?></p>
				</div>

				<div style="width: 4%;float: left;margin-top: 1%;">
					<div class="dropdown">
					    <button class="btn btn-info dropdown-toggle btn-circle" type="button" id="menu1" data-toggle="dropdown"><span class="glyphicon glyphicon-list"></span></span></button>
					    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
					      <li role="presentation"><a role="menuitem" tabindex="-1" href="editprofile.php">Edit Profile</a></li>
					      <li role="presentation" class="divider"></li>
					      <li role="presentation"><a role="menuitem" tabindex="-1" href="signout.php">Logout</a></li>
					    </ul>
					</div>
				</div>

				<div style="width: 10%;float: left;margin-top: 1.5%;">
					<?php 
						echo $user;
					?>
				</div>

			</div>

			<div style="padding-top: 5%;">
				<?php 
					if(isset($_POST['addItem']))
					{
						echo "<center><fieldset style=\"background-color:#bdc3c7;width:30%;margin-top:1%; border-radius:2%;\">
							  <div style=\"width:100%\">
							  <h2 style=\"width:100%;float:left;\">Add Item Here</h2>
							  </div>
							  <form action=\"\" method=\"post\">
							  <p style=\"margin-top:2%;\"><?php echo (isset($msg1))?$msg1:'';?></p>
							  <input class=\"form-control\" style=\"width:90%;padding:6%;\" type=\"text\" placeholder=\"Item Id\" name=\"itemid\" maxlength=\"30\" value=\"$itemid\" required autofocus><br>
							  <input class=\"form-control\" style=\"width:90%;padding:6%;\" type=\"text\" placeholder=\"Item Name\" name=\"itemname\" maxlength=\"30\" value=\"$itemname\" required autofocus><br>
							  <select class=\"form-control\" style=\"width:90%;\" name=\"itemcat\" required autofocus><option value=\"laptop\">Laptop<option><option value=\"projector\">Projector<option></select>
							  <input class=\"form-control\" style=\"width:90%;padding:6%;margin-top:6%;\" type=\"text\" placeholder=\"Item Description\" name=\"itemdesc\" maxlength=\"30\" value=\"$itemdesc\" required autofocus><br>
							  <input class=\"form-control btn btn-success\" style=\"width:80%;margin:2%;\" type=\"submit\" value=\"Add\" name=\"addNow\"><br>
							  </form>
							  </fieldset><center>";
					}
					else if(isset($_POST['deleteItem']))
					{
						$sql="select * from items order by itemid asc";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<center><div style=\"width:80%;\"><table class=\"table\" border=\"1\"><tr style=\"background-color:gray\"><th>Item Id</th><th>Item Name</th><th>Item Dnum</th><th>Item Category</th><th>Item Description</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightgray\" ><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"itemid\" value=\"$row[0]\"><input type=\"submit\" style=\"background-color:cyan\" class=\"form-control\" name=\"deleteDialog\" value=\"Delete\"></form></td></tr>";
							}
							echo "</table></div></center>";
						}
					}
					else if($added)
					{
						echo "<center><fieldset style=\"text-align:left;width:60%;background-color:lightgray;border-radius:2%;padding:2%;\"><h2>Item Successfully added !!!</h2><br><b>Item Id    :</b>  $itemid<br><b>Item Name    :</b> $itemname<br><b>Item Category    :</b> $itemcat<br><b>Item Description    :</b> $itemdesc<form action=\"\" method=\"post\"><input type=\"submit\" name=\"ok\" value=\"Ok\" class=\"form-control\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
						$added=0;
					}
					else if($deleted)
					{
						echo "<center><fieldset style=\"text-align:left;width:50%;background-color:lightgray;border-radius:2%;padding:2%;\"><h2>Item Successfully Deleted !!!</h2><br><b>Item Id :</b> $itemid<form action=\"\" method=\"post\"><input type=\"submit\" name=\"ok\" value=\"Ok\" class=\"form-control\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
					}
					else if(isset($_POST['deleteDialog']))
					{
						$itemid=$_POST['itemid'];
						echo "<center><fieldset style=\"text-align:left;width:50%;background-color:lightgray;border-radius:2%;padding:2%;\"><h2>Do you want to delete Item with Id : $itemid ?</h2><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"itemid\" value=\"$itemid\"><input type=\"submit\" name=\"delete\" class=\"form-control\" value=\"Yes\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"><input type=\"submit\" class=\"form-control\" name=\"ok\" value=\"No\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
					
					}
					else if(isset($_POST['ok']))
					{
						echo "";
					}
					else if(isset($_POST['addInst']))
					{
						echo "<center><fieldset style=\"background-color:cyan;width:30%;background-color:lightgray;border-radius:2%;padding:2%;\">
							  <div style=\"width:100%\">
							  <h3 style=\"width:100%;float:left;margin-bottom:10%;\">Add Instructor Here</h3>
							  </div>
							  <form action=\"\" method=\"post\">
							  <p style=\"margin-top:2%;\"><?php echo (isset($msg1))?$msg1:'';?></p>
							  <input class=\"form-control\" style=\"width:90%;padding:8%;margin:2%;\" type=\"text\" placeholder=\"Instructor Id\" name=\"instid\" maxlength=\"30\" value=\"$instid\" required autofocus><br>
							  <input class=\"form-control\" style=\"width:90%;padding:8%;margin:2%;\" type=\"text\" placeholder=\"Instructor Name\" name=\"instname\" maxlength=\"30\" value=\"$instname\" required autofocus><br>
							  <input class=\"form-control btn btn-success\" style=\"width:80%;padding:3%;margin:2%;\" type=\"submit\" value=\"Add\" name=\"addI\"><br>
							  </form>
							  </fieldset><center>";
					}
					else if($addedI)
					{
						echo "<center><fieldset style=\"text-align:left;width:50%;background-color:lightgray;border-radius:2%;padding:2%;\"><h2>Instructor Successfully Added !!!</h2><br><b>Instructor Id :</b> $instid<br><b>Instructor Name :</b> $instname<form action=\"\" method=\"post\"><input type=\"submit\" class=\"form-control\" name=\"ok\" value=\"Ok\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
						$addedI=0;
					}
					else if(isset($_POST['deleteInst']))
					{
						$sql="select * from instructor";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<center><div style=\"width:80%;\"><table class=\"table\" border=\"1\"><tr style=\"background-color:gray\"><th>Instructor Id</th><th>Instructor Name</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightgray\" ><td>$row[0]</td><td>$row[1]</td><td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$row[0]\"><input type=\"submit\" class=\"form-control\" style=\"background-color:cyan\" name=\"deleteInstDialog\" value=\"Delete\"></form></td></tr>";
							}
							echo "</table></div></center>";
						}
					}
					else if(isset($_POST['deleteInstDialog']))
					{
						$instid=$_POST['instid'];
						echo "<center><fieldset style=\"text-align:left;width:50%;background-color:lightgray;border-radius:2%;padding:2%;\"><h2>Do you want to delete Instructor with Id : $instid ?</h2><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$instid\"><input type=\"submit\" class=\"form-control\" name=\"deleteI\" value=\"Yes\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"><input type=\"submit\" class=\"form-control\" name=\"ok\" value=\"No\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
					}
					else if($deletedIn)
					{
						echo "<center><fieldset style=\"text-align:left;width:50%;background-color:lightgray;border-radius:2%;padding:2%;\"><h2>Instructor Successfully Deleted !!!</h2><br><b>Instructor Id :</b> $instid<form action=\"\" method=\"post\"><input type=\"submit\" name=\"ok\" class=\"form-control\" value=\"Ok\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
						$deletedI=0;
					}
					else if(isset($_POST['viewItems']))
					{
						$sql="select * from items order by itemid asc";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<center><div style=\"width:80%;\"><table class=\"table\" border=\"1\"><tr style=\"background-color:gray\"><th>Item Id</th><th>Item Name</th><th>Item Dnum</th><th>Item Category</th><th>Item Description</th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightgray\" ><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
							}
							echo "</table></div></center>";
						}
					}
					else if(isset($_POST['viewInsts']))
					{
						$sql="select * from instructor";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<center><div style=\"width:80%;\"><table class=\"table\" border=\"1\"><tr style=\"background-color:gray\"><th>Instructor Id</th><th>Instructor Name</th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightgray\" ><td>$row[0]</td><td>$row[1]</td></tr>";
							}
							echo "</table></div></center>";
						}
					}
					else if(isset($_POST['viewfeed']))
					{
						$sql="select * from feedback";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<center><div style=\"width:80%;\"><table class=\"table\" border=\"1\"><tr style=\"background-color:gray\"><th>Instructor Id</th><th>Feedback given</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightgray\" ><td>$row[0]</td><td>$row[1]</td><td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$row[0]\"><input type=\"hidden\" name=\"feedback\" value=\"$row[1]\"><input type=\"submit\" style=\"background-color:cyan\" name=\"deletefeed\" value=\"Delete\"></form></td></tr>";
							}
							echo "</table></div></center>";
						}
					}
					else
						
						echo "";
			?>
			</div>
		</div>
	</div>

</body>
</html>