<?php
    include '../contents/db_connect.php';

    $username = $_SESSION['username'];
    if(isset($username) && $username !=""){
        $missmsg = "";
        $correctmsg = "";
        $resetmsg = "";

        $hpassword = $_SESSION['password'];
        if(isset($_POST['submit'])){
            $oldpassword = $_POST['oldpassword'];
            $newpassword = $_POST['newpassword'];
            $cpassword = password_hash($newpassword, PASSWORD_DEFAULT, ['cost' => 12]);
            $confirmnewpassword = $_POST['confirmnewpassword'];
            $check = "SELECT * FROM registration WHERE username='$username'";
            $res_check = $conn->query($check);
            if($res_check->num_rows > 0  && password_verify($oldpassword, $hpassword)){
                if($newpassword==$confirmnewpassword){
                    $change = "UPDATE registration SET password='$cpassword' where username='$username'";
                    $res_change = $conn->query($change);
                    if($res_change == true){
                        $resetmsg = "Your Password has being changed successfully. Proceed to Log In";
                        session_destroy();
                        header("refresh: 3; ../index.php");
                    }
                }else{
                    $missmsg = "New Passwords Mismatched";
                }
            }else{
                $correctmsg = "Please provide the correct password";
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
    }else{
        header('location: ../index.php');
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
    <title>Change Password</title>
</head>
<body>
    <?php
        
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
                <p>Fill the form below to change your password</p>
                <div>
                    <div><i id="eye1" class="fas fa-eye-slash" onclick="myFunction1()"></i><label for="Password">Old Password </label></div>
                    <input type="password" name="oldpassword" id="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="password here.....">
                </div>
                <span class="red"><?php echo $correctmsg ?></span>
                <div>
                    <div><i id="eye2" class="fas fa-eye-slash" onclick="myFunction2()"></i><label for="Password">New Password </label></div>
                    <input type="password" name="newpassword" id="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="password here.....">
                </div>
                <div>
                    <div><i id="eye3" class="fas fa-eye-slash" onclick="myFunction3()"></i><label for="Password">Confirm New Password </label></div>
                    <input type="password" name="confirmnewpassword" id="password3" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="password here.....">
                </div>
                <span class="red"><?php echo $missmsg ?></span>
                <input type="submit" name="submit" value="submit" id="submit">
                <span class="green"><?php echo $resetmsg ?></span>
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
            function myFunction1() {
            var x = document.getElementById("password1");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("eye1").className = "fas fa-eye";
            } else {
                x.type = "password";
                document.getElementById("eye1").className = "fas fa-eye-slash";
            }
            }
            function myFunction2() {
            var x = document.getElementById("password2");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("eye2").className = "fas fa-eye";
            } else {
                x.type = "password";
                document.getElementById("eye2").className = "fas fa-eye-slash";
            }
            }
            function myFunction3() {
            var x = document.getElementById("password3");
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