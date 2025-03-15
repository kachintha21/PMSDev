<?php
require_once('../include/class.smtp.php');
require_once('../include/class.phpmailer.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.mail.yahoo.com";
$mail->Port = 25;
$mail->Username = "vijitha_wu@yahoo.com";
$mail->Password = "052163@wuv";
$address = "vijitha_wu@yahoo.com";
//$address = "pgoonetillake@gmail.com";

$name = "Pradeep Goonetillake";
$body = "This is a test email";


$mail->SetFrom('vijitha_wu@yahoo.com', 'Clinic Admin System');
$mail->Subject = "Alert from Clinic Admin System";
$mail->MsgHTML($body);
$mail->AddAddress($address, $name);
$send_mail=$mail->Send();
header("location:order_office_supplier_view.php");
exit();
/*
if($mail->Send()) {
  echo "Message sent!";
} else {
  echo "Mailer Error: " . $mail->ErrorInfo;
}
*/


?>
