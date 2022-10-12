<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_mail($reciever_email,$fullname){
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
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to TeeJayGallery';
    $mail->Body    = '<html lang="en">
    <head>
        <title>Welcome</title>
        <style>
            .pagewrapper{
                width: 100%;
                padding: 10px;
                color: #B68973;
                background-color: white;
                box-sizing: border-box;
            }
            h3{
                margin: 10px auto;
                text-align: center;
            }
            h2{
                margin: 20px auto; 
                color: #B68973; 
                font-size: 35px;
                text-align: center;
            }
            a{
                text-decoration: none;
                color: #B68973;
            }
            a:hover{
                color: #1E212D !important;
            }
            .login{
                font-size: 15px; 
                font-weight: bold; 
                color: white;
                padding: 20px; 
                background-color: blue; 
                border: 2px solid blue;
                box-sizing: border-box;
            }
            .login:hover{
                background-color: white;
                color: blue !important;
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
        <div class="pagewrapper">
            <div class="formwrapper">
                <h3>Welcome to</h3>
                <h2>TeeJay<span style="color: #1E212D;">Gallery</span></h2>
                <h4>Hello,</h4>
                <p>Thank you for joining <span style="font-weight: bold;">TeeJay<span style="color: #1E212D;">Gallery</span></span>. We are really excited to have you as one of our users.</p>
                <h4>What is TeeJay<span style="color: #1E212D;">Gallery</span>?</h4>
                <p>TeeJay<span style="color: #1E212D;">Gallery</span> is a website which provides unique images from all over the world with high resolutions for free.</p>
                <p>Want to know more about TeeJay<span style="color: #1E212D;">Gallery</span>, <a href="https://pictures-gallery.000webhostapp.com/contents/about-us.php#" style="color: #B68973;">click me.</a></p><br>
                <center><a href="https://pictures-gallery.000webhostapp.com/contents/imagegallery.php#" class="login" style="color: white;">LOGIN TO YOUR ACCOUNT</a></center><br>
                <h4>Have a question?</h4>
                <p>You can always contact us via our <a href="mailto:joshuataiwo07@gmail.com" style="color: #B68973;">email</a> and we would get back to you within 24hrs. We are always happy to help you.</p>
                <hr>
                <footer class="footer">
                    <p>
                        You received this email because you have signed up with <span style="font-weight: bold;">TeeJay<span style="color: #1E212D;">Gallery</span></span>
                    </p>
                </footer>
            </div>
        </div>
    </body>
    </html>';
    $mail->AltBody = 'Welcome to TeeJayGallery';

    $mail->send();
    return true;
} catch (Exception $e) {
    return $mail->ErrorInfo;
}
}

