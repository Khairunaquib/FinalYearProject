<?php

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = "true";
$mail->SMTPSecure = 'tls';

$mail->Host = "smtp.gmail.com";
$mail->Port = '587';
$mail->isHTML();

$mail->Username = 'coprems.demo@gmail.com';
$mail->Password = 'coprems97';
$mail->SetFrom('no-reply@copremskkm.my');
$mail->AddAddress('naquibza@gmail.com');

$mail->Subject = "Hello";
$mail->Body = "another mail";
$mail->Send();

?>
