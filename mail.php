<?php

$name = $_REQUEST['name'] ;
$surname = $_REQUEST['surname'] ;
$email = $_REQUEST['email'] ;
$phone= $_REQUEST['phone'] ;
$message = $_REQUEST['message'] ;

require("PHPMailer-master/lib/PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "localhost"; 
$mail->SMTPAuth = true; 

$mail->Username = "username"; 
$mail->Password = "password"; 

$mail->From = $email;
$mail->AddAddress($email, $surname);
$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject = "You have received feedback from your website!";
$mail->Body = "From : " $surname + ", Mobile : " + $phone " - " + $message;
$mail->AltBody = $message;


if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}

echo "Message has been sent";
?>