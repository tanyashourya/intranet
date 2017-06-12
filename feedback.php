<?php
	if(isset($_POST["submit"]))
{
    $message =$_POST["feedback"];
   /* $to = "tanyashourya@gmail.com";
	$subject = "feedback";
	$message =$_POST["feedback"];
	// $from = "ian@example.com";
	$headers = "From: ";*/

	// Send email
		 /*$retval = mail ($to,$subject,$message,$headers);
         
         if( $retval == true ) {
            echo "Message:".$message." sent successfully...<br>";
         }else {
            echo "Message:".$message." could not be sent...<br>";
         }*/
        

//Send mail using gmail
require 'C://xampp/htdocs/CLI/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = "ssl://smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = 'testmailcli@gmail.com';
$mail->Password = 'kiit@123';
$mail->setFrom('testmailcli@gmail.com', 'tanyashourya');
$mail->addAddress('tanyashourya@gmail.com', 'admin');
$mail->Subject  = 'First PHPMailer Message';
$mail->Body     = $message;
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';

}

         //store in database
         include("connect.php");
         session_start();
         $id=$_SESSION['id'];
		 $sql="insert into feedback values('$id','$message',now());";
		 $result=mysql_query($sql,$link);
		 if(mysql_affected_rows($link)>0)
		 	echo "Thanks for the feedback! It is being processed.";
		 else
		 	echo "oops";
}
?>

<html>
	<head>
		<title>
			FEEDBACK
		</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <link href="../css/bootstrap.css" rel="stylesheet">
	    <meta charset= utf-8>
	    <style type="text/css">
	    	body{
	    		background-image: url("images/feedback1.jpg");
	    		background-repeat: no-repeat;
	    		background-attachment: fixed;
	    		background-size: cover;
	    	}
	    	.container{
	    		background-image: url("images/bg1.png");
	    		background-size: cover;
	    		text-align: center;
	    		padding-top:15%;
	    		padding-bottom: 4%;
	    	}
	    </style>
	</head>
	<body>
		<?php
			include("navbar.php");
		?>
		<div class="container">
			<h1> FEEDBACK
			</h1><br>
			<form action="" method="post">
			<textarea name="feedback" rows="5" style="width:50%;">
			</textarea><br><br><br>
			<input type="submit"  name="submit" value="submit" class="btn btn-primary">
			</form>
		</div>
	</body>
	<?php
		include("footer.php")
	?>
</php>