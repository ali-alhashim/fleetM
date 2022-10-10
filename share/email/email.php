<?php
// PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendNotificationEmail($toEmail,$subject,$messageBody)
{



//--------------------------------
$smtpServer   = "outlook.live.com";
$smtpPort     = 587;
$smtpUser     = "AKHDB@outlook.com";
$smtpPassword = '******';
//------------------------------------



// Base files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// create object of PHPMailer class with boolean parameter which sets/unsets exception.
$mail = new PHPMailer(true);
try {
    $mail->isSMTP(); // using SMTP protocol
    $mail->Host = $smtpServer; // SMTP host as gmail
    $mail->SMTPAuth = true;  // enable smtp authentication
    $mail->Username = $smtpUser  ;  // sender gmail host
    $mail->Password = $smtpPassword; // sender gmail host password
    $mail->SMTPSecure = 'tls';  // for encrypted connection
    $mail->Port = 587;   // port for SMTP

    $mail->setFrom($smtpUser, "FleetM System"); // sender's email and name
    $mail->addAddress($toEmail, "Receiver");  // receiver's email and name

    $mail->Subject = $subject;
    $mail->Body    = $messageBody;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) { // handle error.
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}


 //sendNotificationEmail('system.akte@gmail.com','Test April 21-2022','this test sent from php malier');

?>
