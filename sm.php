<?php
require_once "Mail.php";

$from = "Sandra Sender <info@wdgexchange.com>";
$to = "Ramona Recipient <webhostcool@yahoo.com.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = "mail.wdgexchange.com";
$username = "info@wdgexchange.com";
$password = "#$Welcome2k3";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>