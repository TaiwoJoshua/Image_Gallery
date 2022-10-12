<?php
    include '../contents/db_connect.php';

    $username = $_SESSION['username'];
    if(isset($username) && $username !=""){
        $invalidmsg = "";
        $control = "";
        if(isset($_POST['submit'])){
            $hpassword = $_SESSION['password'];
            $password = $_POST['passwords'];
            $select = "SELECT * FROM registration WHERE username='$username'";
            $query = $conn->query($select);
            if($query->num_rows > 0 && password_verify($password, $hpassword)){
                $control = true;
            }else{
                $invalidmsg = "Incorrect Password";
            }
        }

        $deletemsg = "";
        $missmsg = "";
        if(isset($_POST['delete'])){
            $text = $_POST['text'];
            if($text == $username){
                $delete = "DELETE FROM registration WHERE username='$username'";
                $res_delete = $conn->query($delete);
                if($res_delete == true){
                    $deletemsg = "Your account has being deleted successfully";
                    session_destroy();
                    header("refresh: 2; ../index.php");
                }
            }else{
                $missmsg = "Text does not match";
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
    <title>Delete Account</title>
</head>
<body>
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
                <p>Please input your password below for verification</p>
                <div><i id="eyes" class="fas fa-eye-slash" onclick="myFunction()"></i><label for="Password">Password</label><br>
                    <input type="password" name="passwords" id="passwords" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="password here.....">
                    <div>
                        <span class="red"><?php echo $invalidmsg ?></span>
                    </div>
                </div>
                <input type="submit" name="submit" value="submit" id="submit">
            </form>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="form2">
                <p>This is an irreversible action and cannot be undone</p>
                <p>Type <span><?php echo $username ?></span> in the box below to confirm your action</p>
                <div>
                    <input type="text" name="text" id="username" required placeholder="text here.....">
                    <span class="red"><?php echo $missmsg ?></span>
                </div>
                <input type="submit" name="delete" value="submit" id="submit2">
                <span class="green"><?php echo $deletemsg ?></span>
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
                <a href="tel:+2348103182378" target="_blank"><i class="fas fa-phone"></i></a>
            </div>
        </footer>
    </div>
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

        function myFunction() {
            var x = document.getElementById("passwords");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("eyes").className = "fas fa-eye";
            } else {
                x.type = "password";
                document.getElementById("eyes").className = "fas fa-eye-slash";
            }
            }
    </script>
    <script src="../assets/js/modal.js"></script>
</body>
</html>
<?php
    if($control == true){
        echo    '<script type="text/javascript">
                                document.getElementById("form").style.display = "none";
                                document.getElementById("form2").style.display = "flex";
                            </script>';
    }
?>