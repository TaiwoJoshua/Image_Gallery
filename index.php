<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/library/fontawesome-free-6.0.0-beta3-web/css/all.min.css">
    <link rel="icon" href="./assets/img/TeeJay.JPG">
    <script src="./assets/js/jquery.js"></script>
    <title>Registration</title>
</head>
<body>
    <div class="pagewrapper" id="pagewrapper">
    <?php
        include './contents/db_connect.php';
        include './contents/Mailer/welcome_email.php';

        $errormsg = "";
        $phonemsg = "";
        $usermsg = "";
        $passmsg = "";
        $rsuccess = "";
        $failmsg = "";
        if(isset($_POST['submit'])){
            $email=$_POST['email'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $hpassword = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
            $confirmPassword=$_POST['confirmPassword'];
            $fullname = $username;
            $reciever_email = $_POST['email'];
            $DateTime = date('Y-m-d H:i:s');
            
            if($password!=$confirmPassword){
                $passmsg = "Password Mismatched";
            }else{
            $checkusername = "SELECT * from registration where username='$username'";
            $res_username = $conn->query($checkusername);
            if($res_username->num_rows > 0){
                $usermsg = "Username Taken";
            }else{
                $ins = "INSERT INTO registration VALUES(null,'$email','$username','$hpassword','$DateTime')";
                $res = $conn->query($ins);

                if($res == true){
                    $send = send_mail($reciever_email,$fullname);
                    $rsuccess = "Registration Successful. Proceed to Log In";
                    echo    '<script type="text/javascript">
                                document.getElementById("pagewrapper").style.zIndex = 1;
                            </script>';
                    
                }else{
                    $failmsg = "Registration Unsuccessful";
                }
            }
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
                    header('location: ./contents/imagegallery.php');
                }else{
                    $loginmsg = "Incorrect Password";
                    echo    '<script type="text/javascript">
                                document.getElementById("pagewrapper").style.zIndex = 1;
                            </script>';
                }
            }else{
                $lusermsg = "Username not Registered";
                echo    '<script type="text/javascript">
                                document.getElementById("pagewrapper").style.zIndex = 1;
                            </script>';
            }
        }
    ?>

        <div class= "formwrapper">
            <div class="img">
                <h2>
                    TeeJay<span>Gallery</span> 
                </h2>
                <h1 class="production">
                    Production Starts Here
                </h1>
                <p class="access">
                    Get access to millions of unique images for free with high resolutions
                </p>
            </div>
            <form class="form" id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <h1 class="class">
                        Join TeeJay<span>Gallery</span> 
                </h1>
                <span class="red"><?php echo $failmsg;?></span>
                <!-- <div id="first"><i class="fas fa-user"></i><label for="Firstname">Firstname</label></div>
                <input type="text" name="firstname" id="firstName" maxlength="11" required placeholder="firstname here.....">
                <div><i class="fas fa-user"></i><label for="Lastname">Lastname</label></div>
                <input type="text" name="lastname" id="lastName" maxlength="11" required placeholder="lastname here....."> -->
                <div><i class="fas fa-user"></i><label for="Username">Username</label></div>
                <input type="text" name="username" id="userName" maxlength="11" required placeholder="username here.....">
                <span class="red"><?php echo $usermsg ?></span>
                <div><i class="fas fa-envelope"></i><label for="e-mail">E-Mail</label></div>
                <input type="email" name="email" id="email" required placeholder="e-mail here.....">
                <span class="red"><?php echo $errormsg ?></span>
                <!-- <div><i class="fas fa-phone"></i><label for="phoneNumber">Phone Number</label></div>
                <input type="text" name="phoneNumber" minlength="11" maxlength="15" id="phoneNumber" required placeholder="phone number here.....">
                <span class="red"><?php echo $phonemsg ?></span> -->
                <div><i id="eye" class="fas fa-eye-slash" onclick="myFunction2()"></i><label for="Password">Password</label></div>
                <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="password here.....">
                <div><i id="eye2" class="fas fa-eye-slash" onclick="yourFunction()"></i><label for="confirmpassword">Confirm Password</label></div>
                <input type="password" name="confirmPassword" id="confirmPassword" required placeholder="confirm password here.....">
                <span class="red"><?php echo $passmsg ?></span>
                <p id="note">At least 6 characters, 1 upper case, 1 lowercase, 1 number and a special character</p>
                <input type="submit" name="submit" value="submit" id="submit">
                <p>Already have an account? <button onclick="myFunction()"><a href="#blockdisplay">login</a></button></p>
            </form>
        </div>
    </div>
    <div id="blockdisplay" class="loginpagewrapper">
        <form class="loginformwrapper come" action="#" method="POST">
            <span class="green" id="rsuccess"><?php echo $rsuccess ?></span>    
            <h2 class="loginh2">Login</h2><br>
            <!-- <div class="others"> -->
            <!-- <div class="pnumber visible" id="clickphone" onclick="phoneFunction()">Phone <br>Number</div> -->
            <!-- <div class="usemail visible" id="clickemail" onclick="emailFunction()">E-mail</div> -->
            <!-- <div class="puser invisible" id="clickuser" onclick="userFunction()">Username</div> -->
            <!-- </div> -->
            <!-- <div class="invisible" id="iconmail"><i class="fas fa-envelope"></i><label for="e-mail">E-Mail</label></div> -->
            <!-- <input class="invisible" type="email" name="email" id="emails" placeholder="e-mail here....."> -->
            <!-- <div class="invisible" id="iconphone"><i class="fas fa-phone"></i><label for="phoneNumber">Phone Number</label></div>
            <input class="invisible" type="text" name="phoneNumber" minlength="11" id="numbers" maxlength="15" placeholder="phone number here....."> -->
            <div class="visible" id="iconuser"><i class="fas fa-user"></i><label for="Username">Username</label></div>
            <input class="visible" type="text" name="username" id="uName" maxlength="11" placeholder="username here.....">
            <span class="red"><?php echo $lusermsg ?></span>
            <div><i id="eye3" class="fas fa-eye-slash" onclick="theirFunction()"></i><label for="Password">Password</label></div>
            <input type="password" name="password" id="pWord" required placeholder="password here.....">
            <span class="red"><?php echo $loginmsg?></span>
            <div class="forget"><a href="./contents/generate_token.php">Forgotten Password?</a></div>
            <input type="submit" name="login" value="submit" id="lsubmit">
            <p id="account">Don't have an account yet, <button id="lsignup" onclick="ourFunction()">Sign Up</button></p>
        </form>
        <div onclick="ourFunction()" class="close">X</div>
    </div>
    
    <script src="./assets/js/modal.js"></script>
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
            var x = document.getElementById("pWord");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("eye3").className = "fas fa-eye";
            } else {
                x.type = "password";
                document.getElementById("eye3").className = "fas fa-eye-slash";
            }
        }
    </script>  
</body>
</html>
