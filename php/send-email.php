<?php

$to = 'lucasromanh@gmail.com';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $name = trim(stripslashes($_POST['name']));
   $email = trim(stripslashes($_POST['email']));
   $subject = trim(stripslashes($_POST['subject']));
   $contact_message = trim(stripslashes($_POST['message']));

   if ($subject == '') { $subject = "Contact Form Submission"; }

   $message = "Email from: " . $name . "<br />";
   $message .= "Email address: " . $email . "<br />";
   $message .= "Message: <br />";
   $message .= nl2br($contact_message);
   $message .= "<br /> ----- <br /> Este correo electrónico fue enviado desde tu sitio " . $_SERVER['SERVER_NAME'] . " mediante el formulario de contacto. <br />";

   $from = $name . " <" . $email . ">";

   $headers = "From: " . $from . "\r\n";
   $headers .= "Reply-To: " . $email . "\r\n";
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   ini_set("sendmail_from", $to); 
   $mail = mail($to, $subject, $message, $headers);

   if ($mail) {
      echo "OK";
   } else {
      echo "Algo salió mal, por favor inténtalo de nuevo.";
   }
}

?>
