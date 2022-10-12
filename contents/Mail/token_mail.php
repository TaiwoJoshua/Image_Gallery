<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/Mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Mail/SMTP.php';

include '../../assets/php/db_connect.php';

$select = "SELECT * FROM registration WHERE email=(SELECT max(email) FROM forgotten_password)";
$result = $conn->query($select);
if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $firstname = $_SESSION['firstname']=$row['firstname'];
            $lastname = $_SESSION['lastname']=$row['lastname'];
            $fullname = $firstname." ".$lastname;
            $reciever_email = $_SESSION['email']=$row['email'];
        }
$token = md5(date('i')+123456789% 10);
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
$mail->Subject = 'Reset Password Token';
$mail->Body = "<html lang='en'>
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
</html>"; //Read an HTML message body from an external file, convert referenced images to embedded,
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
    echo "Message sent!";
    header("location: ../../contents/tokenexitpage.php");
}
}