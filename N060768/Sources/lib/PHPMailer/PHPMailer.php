<?php

include ("src/PHPMailer.php");
include ("src/Exception.php");
include ("src/OAuth.php");
include ("src/POP3.php");
include ("src/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

try {
    //Server settings                                   // TCP port to connect to
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('', 'Admin');
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>