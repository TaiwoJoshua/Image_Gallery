<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/Mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Mail/SMTP.php';

include '../../assets/php/user_registration.php';

function send_mail($reciever_email,$fullname){
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = gethostbyname('smtp.gmail.com'); // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'joshuataiwo07@gmail.com'; // email
$mail->Password = 'taiwojoshua07'; // password
$mail->setFrom('joshuataiwo07@gmail.com', 'TeeJayGallery'); // From email and name
$mail->addAddress($reciever_email, $fullname); // to email and name
$mail->Subject = 'Welcome to TeeJayGallery';
$mail->msgHTML(file_get_contents('welcome_email_content.php'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    header("location: ../index.php");
}
}
