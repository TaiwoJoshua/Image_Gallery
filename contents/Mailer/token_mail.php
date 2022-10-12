<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$token = md5(time()+123456789% rand(4000, 55000000));      
function send_mail($reciever_email, $fullname){
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->SMTPDebug =  false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'joshuataiwo07@gmail.com';                     //SMTP username
    $mail->Password   = 'taiwojoshua07';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('joshuataiwo07@gmail.com', 'TeeJayGallery');
    $mail->addAddress($reciever_email, $fullname);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    global $token;
    $mail->isHTML(true);                            //Set email format to HTML
    $mail->Subject = 'Reset Password Token';
    $mail->Body    = "<html lang='en'>
    <head>
        <title>Token Request</title>
        <style>
            .pagewrapper{
                width: 100%;
                padding: 10px;
                color: #B68973;
                background-color: white;
                box-sizing: border-box;
            }
            h2{
                text-align: center;
            }
            a{
                text-decoration: none;
                color: #B68973;
            }
            a:hover{
                color: #1E212D !important;
            }
            footer{
                width: 100%;
                background-color: #FAF3E0;
                padding: 15px;
                box-sizing: border-box;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class='pagewrapper'>
            <div class='formwrapper'>
                <h2>TeeJay<span style='color: #1E212D;'>Gallery</span></h2>
                <p>This is your token $token</p>
                <p>This token can only be used once and will also expire after 10minutes if not used.</p>
                <p>Click <a href='https://pictures-gallery.000webhostapp.com/contents/password_reset.php'>here </a>to proceed with password reset.</p> 
                <p>If you did not request for this token, please ignore this mail and be rest assured that your account is safe.</p>
                <footer class='footer'>
                    <p>
                        You received this email because you have signed up with <span style='font-weight: bold;'>TeeJay<span style='color: #1E212D;'>Gallery</span></span>
                    </p>
                </footer>
            </div>
        </div>
    </body>
    </html>";
    $mail->AltBody = 'Your token is ';
    

    $mail->send();
    return true;
} catch (Exception $e) {
    return $mail->ErrorInfo;
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}