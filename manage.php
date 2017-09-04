<?php
  
			$mail=$_POST['mail'];
			$con=mysqli_connect('localhost','root','','php');
			$sql="select * from userinfo where email='$mail'";
			$result=mysqli_query($con,$sql);
				
			if($result)
			{
				session_start();
				$_SESSION["currentMail"] = $mail;
				header("Location: signin.php");
			}
?>