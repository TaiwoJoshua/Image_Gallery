<?php
    $token = md5(time()+123456789% rand(4000, 55000000));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Token</title>
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
        <div class="pagewrapper">
            <div class="formwrapper">
                <h2>TeeJay<span style="color: #1E212D;">Gallery</span></h2>
                <p>This is your token <?php echo $token ?></p>
                <p>This token can only be used once and will also expire after 10minutes if not used.</p>
                <p>Click <a href="https://pictures-gallery.000webhostapp.com/contents/password_reset.php">here </a>to proceed with password reset.</p> 
                <p>If you did not request for this token, please ignore this mail and be rest assured that your account is safe.</p>
                <footer class="footer">
                    <p>
                        You received this email because you have signed up with <span style="font-weight: bold;">TeeJay<span style="color: #1E212D;">Gallery</span></span>
                    </p>
                </footer>
            </div>
        </div>
</body>
</html>