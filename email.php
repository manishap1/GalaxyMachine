<?php
//get data

$first_name = $_POST['first_name']; 
$last_name = $_POST['last_name']; 
$Email= $_POST['Email'];
$phone = $_POST['phone'];
   

//email data
$txt = sprintf("Name =".$first_name." ".$last_name);
$Eid= sprintf("Email Id =".$Email);
$pNo= sprintf("Phone Number =".$phone);


$htmlBody = "<table>
<tr><td> $txt</td></tr>
<tr><td>$Eid</td></tr>
<tr><td>$pNo</td></tr>

</table>";
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
$mail->SMTPAuth = True;                               // Enable SMTP authentication
$mail->Username = 'mchinegalaxy@gmail.com';                            // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587; 


 
                  // set the SMTP port for the GMAIL server

$mail->From = 'mchinegalaxy@gmail.com';
$mail->FromName = $first_name;
$mail->AddAddress('mchinegalaxy@gmail.com');               // Name is optional

//$mail->AddCC('');
//$mail->AddBCC('');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'New client request!  ';

$mail->Body = 
$htmlBody ;



$mail->AltBody = '';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Thank you, your message has been sent!';




?>
