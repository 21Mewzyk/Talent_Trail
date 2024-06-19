<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'config.php';

function sendMail($sender_email, $subject, $message)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = MAILHOST;
    $mail->Username = USERNAME;
    $mail->Password = PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setFrom($sender_email); // Set the sender's email as "From"
    $mail->addReplyTo($sender_email); // Set sender's email as Reply-To address
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = $message;

  


    // Set the moderator's email address as the "To" address
    $mail->addAddress("Talenttrail.applications@gmail.com");

    if (!$mail->send()) {
        return "Email not sent. Please try again";
    } else {
        return "success";
    }
}



?>
