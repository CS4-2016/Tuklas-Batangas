<?php
require 'PHPMailer/PHPMailerAutoload.php';
session_start();
if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["vercode"]==$_POST["captcha"])
{
$mail = new PHPMailer;
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'jaeangelob@gmail.com';          // SMTP username
$mail->Password = '09155012465'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('jaeangelob@gmail.com', 'CodexWorld');
$mail->addReplyTo('jaeangelob@gmail.com', 'CodexWorld');
$mail->addAddress('jaeangelob@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML
$bodyContent = '<p>First Name:</p><h3>';
$bodyContent .= $_POST["fname"];
$bodyContent .= '</h3><p> Last Name:</p><h3>';
$bodyContent .= $_POST["lname"];
$bodyContent .= '</h3><p>Email:</p><h3>';
$bodyContent .= $_POST["email"];
$bodyContent .= '</h3><p>Phone Number:</p><h3>';
$bodyContent .= $_POST["phone"];
$bodyContent .= '</h3><p>Message</p><h3>';
$bodyContent .= $_POST["message"];
$bodyContent .= '</h3>';


$mail->Subject = ' Email from Localhost by CodexWorld';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  header("Location: index.php");
}
}
else
{
echo $_SESSION['login-attempt'] = 1;
        header("Location: contact.php");
}



?>