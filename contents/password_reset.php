<?php
    include '../contents/db_connect.php';
    include './Mailer/passwordresetsuccessful_mail.php';

    $successmsg = "";
    $missmsg = "";
    $invalidmsg = "";

    if(isset($_POST['change'])){
        $newpassword = $_POST['password'];
        $hnewpassword = password_hash($newpassword, PASSWORD_DEFAULT, ['cost' => 12]);
        $confirmPassword = $_POST['confirmPassword'];
        $token=$_POST['tokens'];
        $checktoken = "SELECT * from forgotten_password where token='$token'";
        $res_token = $conn->query($checktoken);
        if($res_token->num_rows > 0){
            while($rows = $res_token->fetch_assoc()){
                $email = $_SESSION['email']=$rows['email'];
                $username = $_SESSION['username']=$rows['username'];
            }
            if($newpassword == $confirmPassword){
                $delete = "DELETE FROM forgotten_password where username='$username' and token='$token'";
                $res_delete = $conn->query($delete);
                $update = "UPDATE registration SET password='$hnewpassword' where email='$email'";
                $res_update = $conn->query($update);
                $checkemail = "SELECT * from registration where email='$email'";
                $res_email = $conn->query($checkemail);

                if($res_email->num_rows > 0){
                    while($row = $res_email->fetch_assoc()){
                        $username = $_SESSION['username']=$row['username'];
                        $email = $_SESSION['email']=$row['email'];
                }
                $successmsg = "Password Reset Successful, Proceed to Log In";
                $fullname = $username;  
                $reciever_email = $email; 
                $sendemail = send_mail($reciever_email, $fullname);
                header("refresh: 2; ../index.php");
            }
            }else{
                $missmsg = "Password Mismatched";
            }
        }else{
            $invalidmsg = "Invalid Token";
        }
    }

    $loginmsg = "";
    $lusermsg = "";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $select = "SELECT * FROM registration WHERE username='$username'";
        $result = $conn->query($select);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $_SESSION['username']=$row['username'];
                $hpassword = $_SESSION['password']=$row['password'];
            }
            if(password_verify($password, $hpassword)){
                header('location: ./imagegallery.php');
            }else{
                $loginmsg = "Incorrect Password";
            }
        }else{
            $lusermsg = "Username not Registered";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/TeeJay.JPG">
    <link rel="stylesheet" href="../assets/css/reset_password.css">
    <link rel="stylesheet" href="../assets/library/fontawesome-free-6.0.0-beta3-web/css/all.min.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="pagewrapper" id="pagewrapper">
        <nav class="navbar">
            <div class="teejay" onclick="home()">
                <h2>
                    TeeJay<span>Gallery</span> 
                </h2>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div>
                    <div>
                        <div><i class="fas fa-user"></i><label for="e-mail">Username </label></div>
                        <input type="text" name="username" required placeholder="username here.....">
                        
                    </div>
                    <p class="red"><?php echo $lusermsg ?></p>
                </div>
                <div>
                    <div>
                        <div><i id="eye" class="fas fa-eye-slash" onclick="myFunction2()"></i><label for="Password">Password </label></div>
                        <input type="password" name="password" id="password" required placeholder="password here.....">
                        
                    </div>
                    <p class="red"><?php echo $loginmsg ?></p>
                </div>
                <div>
                    <div>
                        <input type="submit" id="submitted" name="login" value="Log In">
                    </div>
                </div> 
            </form>
        </nav>
        <div class="formwrapper">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="form">
                <div>
                    <div><i id="eye3" class="fas fa-eye-slash" onclick="theirFunction()"></i><label for="Password">New Password</label></div>
                    <input type="password" name="password" id="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="new password here.....">
                </div>
                <div>
                    <div><i id="eye2" class="fas fa-eye-slash" onclick="yourFunction()"></i><label for="confirmpassword">Confirm New Password</label></div>
                    <input type="password" name="confirmPassword" id="confirmPassword" required placeholder="confirm new password here.....">
                    <div>
                        <span class="red"><?php echo $missmsg ?></span>
                    </div>                    
                </div>
                <div>
                    <div><i class="fas fa-key"></i><label for="token">Token</label></div>
                    <input type="text" name="tokens" id="token" required placeholder="token code here.....">
                    <div>
                        <span class="red"><?php echo $invalidmsg ?></span>
                    </div>                    
                </div>
                <div>
                    <input type="submit" name="change" value="submit" id="submit2">
                </div>  
                <span class="green"><?php echo $successmsg ?></span>  
            </form>
        </div>
        <footer class="footer"> 
            <div class="icons">
                <a href="https://medium.com/@joshuataiwo07" target="_blank"><i class="fab fa-medium"></i></a>
                <a href="https://www.facebook.com/joshuataiwo07" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://www.linkedin.com/in/taiwo-joshua-olamilekan-02b42520a/" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="mailto:joshuataiwo07@gmail.com" target="_blank"><i class="fas fa-envelope"></i></a>
                <a href="https://www.instagram.com/taiwojoshua07/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://api.whatsapp.com/send?phone=+2348103182378" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="tel:+2348103182378"><i class="fas fa-phone"></i></a>
            </div>
        </footer>
    </div>
    <script src="../assets/js/modal.js"></script>
    <script>
        function myFunction() {
        var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("eye").className = "fas fa-eye";
            } else {
                x.type = "password";
                document.getElementById("eye").className = "fas fa-eye-slash";
            }
            }

        function yourFunction() {
        var x = document.getElementById("confirmPassword");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("eye2").className = "fas fa-eye";
            } else {
                x.type = "password";
                document.getElementById("eye2").className = "fas fa-eye-slash";
            }
            }

        function theirFunction() {
        var x = document.getElementById("password2");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("eye3").className = "fas fa-eye";
            } else {
                x.type = "password";
                document.getElementById("eye3").className = "fas fa-eye-slash";
            }
            }
            
    </script>
    <?php
        $DateTime = date('Y-m-d H:i:s');
        $timelimit = strtotime($DateTime) - 600;
        
        $gettime = "SELECT * from forgotten_password where id=(select max(id) from forgotten_password)";
        $res_gettime = $conn->query($gettime);
        if($res_gettime->num_rows > 0){
            while($rows = $res_gettime->fetch_assoc()){
                $requesttime = $_SESSION['time']=$rows['time'];
            }
            if(strtotime($requesttime) > $timelimit){
    
            }else{
                $deltoken = "TRUNCATE forgotten_password";
                $conn->query($deltoken);
                echo '<h2 style="text-align: center; color: red;">Link has Expired!!!</h2>';
                echo    '<script type="text/javascript">
                            document.getElementById("pagewrapper").style.display = "none";
                        </script>';
                header("refresh: 3; ../index.php");
            } 
        }else{
            echo '<h2 style="text-align: center; color: red;">Link has Expired!!!</h2>';
            echo    '<script type="text/javascript">
                        document.getElementById("pagewrapper").style.display = "none";
                    </script>';
            header("refresh: 3; ../index.php");
        } 
    ?>
</body>
</html>