<?php
    session_start();
	$user=$_SESSION['UN'];
	
	echo "<center><fieldset style=\"background-color:cyan;padding:3%;width:50%;height:10%;text-align:center;margin-top:5%;\">";
	echo "You have been successfully Registered Mr :<b> $user </b>!!! <br> Your instructor id is your username and the password is that you provided";
	echo "<a href=\"signin.php\" style=\"background-color:green;margin-left:5%;margin-top:5%;color:white;padding:1%;text-decoration:none;\">SignIn Now</a>
";
	echo "</fieldset></center>";
	
	session_unset($_SESSION['UN']);
	
?>