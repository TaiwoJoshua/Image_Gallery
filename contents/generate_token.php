<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/TeeJay.JPG">
    <link rel="stylesheet" href="../assets/css/reset_password.css">
    <link rel="stylesheet" href="../assets/library/fontawesome-free-6.0.0-beta3-web/css/all.min.css">
    <title>Generate Token</title>
</head>
<body>
    <?php
        include '../contents/db_connect.php';
        include './Mailer/token_mail.php';

        $username = ""; 
        $errormsg2 = "";
        $errormsg1 = "";
        $control = "";

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $checkusername = "SELECT * from registration where username='$username'";
            $res_username = $conn->query($checkusername);

            if($res_username->num_rows > 0){
                while($row = $res_username->fetch_assoc()){
                    $email = $_SESSION['email']=$row['email'];
                }
                $fullname = $username;
                $reciever_email = $email; 
                $tokens = $token;
                $DateTime = date('Y-m-d H:i:s');
                $check = "SELECT * FROM forgotten_password WHERE username='$username'";
                $res_check = $conn->query($check);
                if($res_check->num_rows == 0){
                    $insert = "INSERT INTO forgotten_password VALUES(null,'$username','$email','$tokens','$DateTime')";
                    $insert = $conn->query($insert);
                    $control = true;
                    // header("location: ./password_reset.php");
                    header("refresh: 2; ./password_reset.php");
                }else{
                    $errormsg2 = "You already requested for a token and it is yet to be used";
                }
            } else{
                $errormsg1 = "Username not Registered";
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
    <div class="pagewrapper">
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
                <p>Please input your username below to receive your token code through your registered e-mail and a reset link</p>
                <div><i class="fas fa-user"></i><label for="username">Username</label><br>
                <input type="text" name="username" id="username" required placeholder="username here.....">
                </div>
                <span class="red"><?php echo $errormsg1?></span>
                <input type="submit" name="submit" value="submit" id="submit">
                <span class="red"><?php echo $errormsg2?></span>
            </form>
            <form id="form2">
                <p>
                    An e-mail has being sent to you containing your token and reset link.
                </p>
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
        function myFunction2() {
        var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("eye").className = "fas fa-eye";
            } else {
                x.type = "password";
                document.getElementById("eye").className = "fas fa-eye-slash";
            }
            }
    </script>
</body>
</html>
<?php
    if($control == true){
        echo    '<script type="text/javascript">
                                document.getElementById("form").style.display = "none";
                                document.getElementById("form2").style.display = "block";
                            </script>';
    }
?>