<?php

$fname = $_post["First name"];
$lname = $_post["Last name"];
$Email = $_post["Email"];
$contact = $_post["Contact number"];
$subject = $_post["Subject"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.mandrillapp.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "lyle.damien17@gmail.com.com";
$mail->Password = "bsxa pjbx eqpe lzmb";

$mail->setFrom($Email, $fname, $contact, $subject, $message );
$mail->addAddress("dave@example.com", "Dave");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: sent.html");
