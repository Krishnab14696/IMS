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


<html>
<head>
</head>
<body >
	<div style="width:100%;height:15%;background-color:lightblue;margin-left:0.4%;padding:0.4%;">
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
	
		<div style="width:20%;height:100%;float:left;background-color:lightblue;text-align:center;padding:0.1%;">
			<h3 style="background-color:blue;padding:3%;color:white;">Choose Options</h3>
			
			<form action="" method="post">
				<input type="submit" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="addItem"value="Add Item" /><br>
			</form>
			<form action="" method="post">
				<input type="submit" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="deleteItem"value="Delete Item" /><br>
			</form>
			
			
			<form action="" method="post">
				<input type="submit" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="viewItems"value="View all Items" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="addInst"value="Add Instructor" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="deleteInst"value="Delete Instructor" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="viewInsts"value="View all Instructors" /><br>
			</form>
			
			<form action="" method="post">
				<input type="submit" style="background-color:blue;padding:3%;width:100%;text-align:left;color:white;font:100% tahoma;" name="viewfeed"value="View Feedbacks" /><br>
			</form>
		</div>
		<div style="width:78%;float:left;height:100%;background-color:white;margin-left:1%;text-align:center;padding:0.1%;">
			<?php 
					if(isset($_POST['addItem']))
					{
						echo "<center><fieldset style=\"background-color:cyan;width:30%;margin-top:1%;\">
							  <div style=\"width:100%\">
							  <h1 style=\"width:75%;float:left;\">Add Item Here</h1><form action=\"\" method=\"post\"><input style=\"width:15%;margin-top:10%;float:left;background-color:yellow;\" type=\"submit\" name=\"reset\" value=\"Reset\" onclick=\"reset()\"></form>
							  </div>
							  <form action=\"\" method=\"post\">
							  <p style=\"margin-top:2%;\"><?php echo (isset($msg1))?$msg1:'';?></p>
							  <input style=\"width:90%;padding:5%;margin:2%;\" type=\"text\" placeholder=\"Item Id\" name=\"itemid\" maxlength=\"30\" value=\"$itemid\" required autofocus><br>
							  <input style=\"width:90%;padding:5%;margin:2 	%;\" type=\"text\" placeholder=\"Item Name\" name=\"itemname\" maxlength=\"30\" value=\"$itemname\" required autofocus><br>
							  <select style=\"width:90%;padding:5%;margin:2%;\" name=\"itemcat\" required autofocus><option value=\"laptop\">Laptop<option><option value=\"projector\">Projector<option></select>
							  <input style=\"width:90%;padding:5%;margin:2%;\" type=\"text\" placeholder=\"Item Description\" name=\"itemdesc\" maxlength=\"30\" value=\"$itemdesc\" required autofocus><br>
							  <input style=\"width:80%;padding:5%;margin:2%;\" type=\"submit\" value=\"Add\" name=\"addNow\"><br>
							  </form>
							  </fieldset><center>";
					}
					else if(isset($_POST['deleteItem']))
					{
						$sql="select * from items order by itemid asc";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<center><div style=\"margin-top:5%;\"><table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr style=\"background-color:blue\"><th>Item Id</th><th>Item Name</th><th>Item Dnum</th><th>Item Category</th><th>Item Description</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightblue\" ><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"itemid\" value=\"$row[0]\"><input type=\"submit\" style=\"background-color:cyan\" name=\"deleteDialog\" value=\"Delete\"></form></td></tr>";
							}
							echo "</table></div></center>";
						}
					}
					else if($added)
					{
						echo "<center><fieldset style=\"text-align:left;width:50%;margin-top:10%;\"><h2>Item Successfully added !!!</h2><br><b>Item Id    :</b>  $itemid<br><b>Item Name    :</b> $itemname<br><b>Item Category    :</b> $itemcat<br><b>Item Description    :</b> $itemdesc<form action=\"\" method=\"post\"><input type=\"submit\" name=\"ok\" value=\"Ok\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
						$added=0;
					}
					else if($deleted)
					{
						echo "<center><fieldset style=\"text-align:left;width:50%;margin-top:10%;\"><h2>Item Successfully Deleted !!!</h2><br><b>Item Id :</b> $itemid<form action=\"\" method=\"post\"><input type=\"submit\" name=\"ok\" value=\"Ok\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
					}
					else if(isset($_POST['deleteDialog']))
					{
						$itemid=$_POST['itemid'];
						echo "<center><fieldset style=\"text-align:left;width:50%;margin-top:10%;\"><h2>Do you want to delete Item with Id : $itemid ?</h2><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"itemid\" value=\"$itemid\"><input type=\"submit\" name=\"delete\" value=\"Yes\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"><input type=\"submit\" name=\"ok\" value=\"No\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
					
					}
					else if(isset($_POST['ok']))
					{
						echo "";
					}
					else if(isset($_POST['addInst']))
					{
						echo "<center><fieldset style=\"background-color:cyan;width:30%;margin-top:5%;\">
							  <div style=\"width:100%\">
							  <h2 style=\"width:75%;float:left;\">Add Instructor Here</h2><form action=\"\" method=\"post\"><input style=\"width:15%;margin-top:10%;float:left;background-color:yellow;\" type=\"submit\" name=\"reset\" value=\"Reset\" onclick=\"reset()\"></form>
							  </div>
							  <form action=\"\" method=\"post\">
							  <p style=\"margin-top:2%;\"><?php echo (isset($msg1))?$msg1:'';?></p>
							  <input style=\"width:90%;padding:5%;margin:2%;\" type=\"text\" placeholder=\"Instructor Id\" name=\"instid\" maxlength=\"30\" value=\"$instid\" required autofocus><br>
							  <input style=\"width:90%;padding:5%;margin:2%;\" type=\"text\" placeholder=\"Instructor Name\" name=\"instname\" maxlength=\"30\" value=\"$instname\" required autofocus><br>
							  <input style=\"width:80%;padding:5%;margin:2%;\" type=\"submit\" value=\"Add\" name=\"addI\"><br>
							  </form>
							  </fieldset><center>";
					}
					else if($addedI)
					{
						echo "<center><fieldset style=\"text-align:left;width:50%;margin-top:10%;\"><h2>Instructor Successfully Added !!!</h2><br><b>Instructor Id :</b> $instid<br><b>Instructor Name :</b> $instname<form action=\"\" method=\"post\"><input type=\"submit\" name=\"ok\" value=\"Ok\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
						$addedI=0;
					}
					else if(isset($_POST['deleteInst']))
					{
						$sql="select * from instructor";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<center><div style=\"margin-top:5%;\"><table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr style=\"background-color:blue\"><th>Instructor Id</th><th>Instructor Name</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightblue\" ><td>$row[0]</td><td>$row[1]</td><td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$row[0]\"><input type=\"submit\" style=\"background-color:cyan\" name=\"deleteInstDialog\" value=\"Delete\"></form></td></tr>";
							}
							echo "</table></div></center>";
						}
					}
					else if(isset($_POST['deleteInstDialog']))
					{
						$instid=$_POST['instid'];
						echo "<center><fieldset style=\"text-align:left;width:50%;margin-top:10%;\"><h2>Do you want to delete Instructor with Id : $instid ?</h2><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$instid\"><input type=\"submit\" name=\"deleteI\" value=\"Yes\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"><input type=\"submit\" name=\"ok\" value=\"No\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
					}
					else if($deletedIn)
					{
						echo "<center><fieldset style=\"text-align:left;width:50%;margin-top:10%;\"><h2>Instructor Successfully Deleted !!!</h2><br><b>Instructor Id :</b> $instid<form action=\"\" method=\"post\"><input type=\"submit\" name=\"ok\" value=\"Ok\" style=\"float:right;background-color:cyan;padding:1%;width:15%;\"></form></fieldset></center>";
						$deletedI=0;
					}
					else if(isset($_POST['viewItems']))
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
					else if(isset($_POST['viewInsts']))
					{
						$sql="select * from instructor";
						$result=mysqli_query($con,$sql);
						
						if($result)
						{
							echo "<center><div style=\"margin-top:5%;\"><table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr style=\"background-color:blue\"><th>Instructor Id</th><th>Instructor Name</th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightblue\" ><td>$row[0]</td><td>$row[1]</td></tr>";
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
							echo "<center><div style=\"margin-top:5%;\"><table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr style=\"background-color:blue\"><th>Instructor Id</th><th>Feedback given</th><th></th></tr>";
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style=\"background-color:lightblue\" ><td>$row[0]</td><td>$row[1]</td><td><form action=\"\" method=\"post\"><input type=\"hidden\" name=\"instid\" value=\"$row[0]\"><input type=\"hidden\" name=\"feedback\" value=\"$row[1]\"><input type=\"submit\" style=\"background-color:cyan\" name=\"deletefeed\" value=\"Delete\"></form></td></tr>";
							}
							echo "</table></div></center>";
						}
					}
					else
						
						echo "";
			?>
		</div>
		
	<div>
</body>
</html>  