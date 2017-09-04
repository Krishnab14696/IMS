<?php
session_start();
session_unset($SESSION['currentUser']); 
session_unset($SESSION['admin']); 
header("Location: index.php");
?>