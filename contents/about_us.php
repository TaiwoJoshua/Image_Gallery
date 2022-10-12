<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/about-us.css">
    <link rel="stylesheet" href="../assets/library/fontawesome-free-6.0.0-beta3-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/library/fancybox-master/dist/jquery.fancybox.min.css">
    <link rel="icon" href="../assets/img/TeeJay.JPG">
    <title>About us</title>
</head>
<body>
    <div class="pagewrapper">
        <nav class="navbar">
            <div class="teejay">
                <h2 onclick="home()">
                    TeeJay<span>Gallery</span> 
                </h2>
            </div>
            <div class="search">
                <div class="busy">
                    <!-- <i class="fas fa-search" id="fas"></i><input type="search" name="" id="search" placeholder="search images here...."> -->
                </div>
            </div>
            <div class="special">
            <div class="links">
                <a href="./imagegallery.php">
                    Home
                </a>
            </div>
            <div class="links">
                <a class="text">
                    About Us
                </a>
            </div>
            <div class="links">
                <a href="mailto:joshuataiwo07@gmail.com">
                    Contact Us
                </a>
            </div>
            <div class="links">
                <a href="#">
                    <i class="fas fa-bars" id="bars" onclick="logout()"></i>
                </a>
                <div id="logouts">
                <a href="./change_password_page.php"><i class="fas fa-key"></i> Change Password</a><br><hr>
                <a href="delete_page.php"><i class="fas fa-trash"></i> Delete Account</a><br><hr>
                <a href="logout.php"><i class="fas fa-sign-out"></i> Log Out</a>
                </div>
            </div>
            </div>
        </nav>
        <div class="body" onclick="remove()">
            <div class="sidenav">
                    <div><a href="./animal.php"><i class="fas fa-dog"></i> Animals</a></div>
                    <div><a href="./food.php"><i class="fas fa-pizza-slice"></i> Food</a></div>
                    <div><a href="./nature.php"><i class="fas fa-tree"></i> Nature</a></div>
                    <div><a href="./technology.php"><i class="fas fa-robot"></i> Technology</a></div>
                    <div><a href="./fashion.php"><i class="fas fa-tshirt"></i> Fashion</a></div>                    
                    <div><a href="./wallpaper.php"><i class="fas fa-image"></i> Wallpaper</a></div>
                    <div><a href="./business.php"><i class="fas fa-chart-line"></i> Business</a></div>
                    <div><a href="./sports.php"><i class="fas fa-basketball-ball"></i> Sports</a></div>
                    <div><a href="./cars.php"><i class="fas fa-car"></i> Cars</a></div>
                    <div><a href="./buildings.php"><i class="fas fa-building"></i> Buildings</a></div>
            </div>
            <div class="content">
            <div>
                    <div>
                        <h3>About TeeJay<span>Gallery</span></h3>
                    </div>
                    <center><div>Hundreds of New Images Displayed Yearly<br>
                        Over 50 Thousand Monthly Visits<br>
                        One of The Largest Image Gallery Site on the Internet</div></center>
                    <h4>What is TeeJayGallery?</h4>
                    <p>TeeJayGallery is a website which provides unique images from all over the world with high resolutions for free.<br>
                        This site derives its name from its developer's name <span>T</span>aiwo <span>J</span>oshua, hence TeeJayGallery.<br>
                        This site was launched on the 25th of January, 2022.
                    </p>
                    <h4>Easy Usage</h4>
                    <p>TeeJayGallery has focus on simplicity. <br>
                        TeeJayGallery practice easy and straight-forward method of accessing images.
                    </p>
                    <h4>TeeJayGallery is Free</h4>
                    <p>
                        TeeJayGallery is, and will always be, a completely free source for images.
                    </p>
                    <h4>You Can Help</h4>
                    <p>
                        Many people are working very hard to make TeeJayGallery interesting, useful, and correct. <br>
                        If you find an error, or a broken link, please tell us about it. <br>
                        Use the link "Contact us" at the top of each page or click <a href="mailto:joshuataiwo07@gmail.com">here</a> 
                    </p>
                </div>
            </div>
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
</body>
</html>