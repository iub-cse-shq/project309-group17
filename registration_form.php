<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
include "config.php";

// Don't forget to properly escape your values before you send them to DB
// to prevent SQL injection attacks.
if(isset($_REQUEST['booking'])){
	$name    			= $_POST['name'];
	$email   			= $_POST['email'];
	$phone   			= $_POST['phone'];
	$bdate    			= $_POST['bdate'];
	$number_of_people 	= $_POST['number_of_people'];
	$branch   			= $_POST['branch'];
	$message 			= $_POST['message'];

	$sql = "INSERT INTO info (name,email,phone,bdate,number_of_people,branch,message) VALUES ('$name','$email','$phone','$bdate','$number_of_people','$branch','$message')";

	$result = mysqli_query($con, $sql);
	if($result){
		

		$mail = new PHPMailer(true);

		//Enable SMTP debugging.
		$mail->SMTPDebug = 3;                               
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();     
		//Set SMTP host name                          
		$mail->Host = "smtp.gmail.com";
		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;                          
		//Provide username and password     
		$mail->Username = "1610202@iub.edu.bd";                 
		$mail->Password = "iubbaje09";                           
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "tls";                           
		//Set TCP port to connect to
		$mail->Port = 587;                                   

		$mail->From = "admin@restaurent.com";
		$mail->FromName = "Restaurent Management Admin";

		$mail->addAddress($email, $name);

		$mail->isHTML(true);

		$mail->Subject = "Restaurent Reservation";
		$mail->Body = "Hello, <b>".$name."</b><br><p>You've booked our restaurent for ".$number_of_people." people at ".$branch." branch in ".$bdate."</p><p>Thanks for being with us.</p>";
		// $mail->AltBody = "This is the plain text version of the email content";

		try {
		    $mail->send();
		    echo "Message has been sent successfully";
		} catch (Exception $e) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		}
		header("Location: index.php");
	} else{
		header("Location: index.php");
	}
	mysqli_close($con);
}

