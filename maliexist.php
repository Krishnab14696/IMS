<?php
  if(empty($_POST)==false)
  {
	if(isset($_POST['submit']))
	{
		if(isset($_POST['reset']))
		{
			$msg="";
		}
		
		$mail=$_POST['mail'];
		require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'krishnab14696@gmail.com';                   // SMTP username
$mail->Password = 'V7795825154';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('krishnab14696@gmail.com', 'Amit Agarwal');     //Set who the message is to be sent from
$mail->addReplyTo('krishnab14696@gmail.com', 'First Last');  //Set an alternative reply-to address
$mail->addAddress('krishnab14696@gmail.com', 'Josh Adams');  // Add a recipient
$mail->addAddress('krishnab14696@gmail.com');               // Name is optional
$mail->addCC('krishnab14696@gmail.com');
$mail->addBCC('krishnab14696@gmail.com');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';
		
		$msg="A Confirmation mail has been sent to you, please check your mail to continue registration";
			
			
	}
}
  
?>

<html>
<head>
</head>
<body>
<script type="text/javascript" src="validate.js">
</script>
<center>
<div style="margin-top:8%">
<a href="index.php" style="background-color:blue;color:white;margin-top:5%;margin-left:17%;padding:1%;text-decoration:none;"><== Goto Home</a>
</div>
<fieldset style="background-color:cyan;width:25%;margin-top:1%;">
	<div style="width:100%">
	<h1 style="width:75%;float:left;">Confirmation</h1><form action="" method="post"><input style="width:15%;margin-top:10%;float:left;background-color:yellow;" type="submit" name="reset" value="Reset" onclick="reset()"></form>
	</div>
	<form action="" method="post"><br><br>
		<p style="color:green;"><?php echo (isset($msg))?$msg:'';?></p>
		<input style="width:90%;padding:5%;margin:5%;"  type="text" placeholder="Email" name="mail" value="<?php echo (isset($mail))?$mail:'';?>" maxlength="30" required autofocus><br>
		<input style="width:80%;padding:5%;margin:5%;" type="submit" value="Next" name="submit"><br>
	</form>
</fieldset>

</center>
</body>
</html>