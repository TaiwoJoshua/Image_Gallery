<?php
    include '../contents/db_connect.php';

    if(isset($_SESSION['username'])&&$_SESSION['username']!=""){
        
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
    <link rel="stylesheet" href="../assets/css/gallery.css">
    <link rel="stylesheet" href="../assets/library/fontawesome-free-6.0.0-beta3-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/library/fancybox-master/dist/jquery.fancybox.min.css">
    <link rel="icon" href="../assets/img/TeeJay.JPG">
    <title>Cars</title>
</head>
<body>
    <div class="pagewrapper">
        <nav class="navbar">
            <div class="teejay" onclick="home()">
                <h2>
                    TeeJay<span>Gallery</span> 
                </h2>
            </div>
            <div class="search">
                <div class="busy">
                    <i class="fas fa-search" id="fas" onclick="searchFunction()"></i><input type="search" name="search" minlength="3" title="please input at least 3 letters" id="search" placeholder="search images here....">
                </div>
            </div>
            <div class="special">
            <div class="links">
                <a href="./imagegallery.php">
                    Home
                </a>
            </div>
            <div class="links">
                <a href="./about_us.php">
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
                <div><a class="text"><i class="fas fa-car"></i> Cars</a></div>
                <div><a href="./buildings.php"><i class="fas fa-building"></i> Buildings</a></div>
            </div>
            <div class="content">
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/brandon-atchison-eBJWhlqWR54-unsplash1.jpg">
                        <img src="../assets/img/Cars/brandon-atchison-eBJWhlqWR54-unsplash1.jpg" alt="yellow mercedes benz">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/brandon-atchison-eBJWhlqWR54-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/campbell-3ZUsNJhi_Ik-unsplash1.jpg">
                        <img src="../assets/img/Cars/campbell-3ZUsNJhi_Ik-unsplash1.jpg" alt="black porsche sedan">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/campbell-3ZUsNJhi_Ik-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/chris-nguyen-aTX_bRaOZnA-unsplash1.jpg">
                        <img src="../assets/img/Cars/chris-nguyen-aTX_bRaOZnA-unsplash1.jpg" alt="black and red lamborghini aventador">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/chris-nguyen-aTX_bRaOZnA-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/joey-banks-YApiWyp0lqo-unsplash1.jpg" download>
                        <img src="../assets/img/Cars/joey-banks-YApiWyp0lqo-unsplash1.jpg" alt="Black Shelby">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/joey-banks-YApiWyp0lqo-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/karl-kohler-Hf1rAKkfMAg-unsplash1.jpg">
                        <img src="../assets/img/Cars/karl-kohler-Hf1rAKkfMAg-unsplash1.jpg" alt="White audi A8">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/karl-kohler-Hf1rAKkfMAg-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/marcus-p-oUBjd22gF6w-unsplash1.jpg" download>
                        <img src="../assets/img/Cars/marcus-p-oUBjd22gF6w-unsplash1.jpg" alt="Orange Lamborghini">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/marcus-p-oUBjd22gF6w-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/neonbrand-FcyipqujfGg-unsplash1.jpg" download>
                        <img src="../assets/img/Cars/neonbrand-FcyipqujfGg-unsplash1.jpg" alt="Gray car">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/neonbrand-FcyipqujfGg-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/olav-tvedt-6lSBynPRaAQ-unsplash1.jpg" download>
                        <img src="../assets/img/Cars/olav-tvedt-6lSBynPRaAQ-unsplash1.jpg" alt="Gray Sports Coupe">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/olav-tvedt-6lSBynPRaAQ-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/peter-broomfield-m3m-lnR90uM-unsplash1.jpg" download>
                        <img src="../assets/img/Cars/peter-broomfield-m3m-lnR90uM-unsplash1.jpg" alt="White car">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/peter-broomfield-m3m-lnR90uM-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/photo_2022-01-18_21-06-221.jpg" download>
                        <img src="../assets/img/Cars/photo_2022-01-18_21-06-221.jpg" alt="Black car">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/photo_2022-01-18_21-06-22.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/photo_2022-01-18_21-32-561.jpg">
                        <img src="../assets/img/Cars/photo_2022-01-18_21-32-561.jpg" alt="Yellow car">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/photo_2022-01-18_21-32-56.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Cars/viktor-theo-aIDkOU7eGgo-unsplash1.jpg">
                        <img src="../assets/img/Cars/viktor-theo-aIDkOU7eGgo-unsplash1.jpg" alt="Black and Orange Sports Coupe">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Cars/viktor-theo-aIDkOU7eGgo-unsplash.jpg">download</a></button>
                </div>
                <div style="display: none;" id="notFound">Search Input not found</div>
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
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/modal.js"></script>
    <script src="../assets/library/fancybox-master/dist/jquery.fancybox.min.js"></script>
    <script>
        $('[data-fancybox]').fancybox({
            animationEffect : "slide",
            transitionEffect : "circular",
            loop : "true",
            buttons : [
                "zoom",
                "share",
                "slideShow",
                "fullScreen",
                // "download",
                "thumbs",
                "close"
            ]
        });
    </script>
</body>
</html>
