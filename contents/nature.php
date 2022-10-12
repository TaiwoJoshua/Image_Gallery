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
    <title>Nature</title>
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
                <div><a class="text"><i class="fas fa-tree"></i> Nature</a></div>
                <div><a href="./technology.php"><i class="fas fa-robot"></i> Technology</a></div>
                <div><a href="./fashion.php"><i class="fas fa-tshirt"></i> Fashion</a></div>                    
                <div><a href="./wallpaper.php"><i class="fas fa-image"></i> Wallpaper</a></div>
                <div><a href="./business.php"><i class="fas fa-chart-line"></i> Business</a></div>
                <div><a href="./sports.php"><i class="fas fa-basketball-ball"></i> Sports</a></div>
                <div><a href="./cars.php"><i class="fas fa-car"></i> Cars</a></div>
                <div><a href="./buildings.php"><i class="fas fa-building"></i> Buildings</a></div>
            </div>
            <div class="content">
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Nature/allec-gomes-ccgUifCgRg8-unsplash1.jpg">
                        <img src="../assets/img/Nature/allec-gomes-ccgUifCgRg8-unsplash1.jpg" alt="">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Nature/allec-gomes-ccgUifCgRg8-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Nature/chuttersnap-u-vmeJcJ-Z4-unsplash1.jpg">
                        <img src="../assets/img/Nature/chuttersnap-u-vmeJcJ-Z4-unsplash1.jpg" alt="">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Nature/chuttersnap-u-vmeJcJ-Z4-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Nature/eberhard-grossgasteiger-HXJkqHexaak-unsplash1.jpg">
                        <img src="../assets/img/Nature/eberhard-grossgasteiger-HXJkqHexaak-unsplash1.jpg" alt="">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Nature/eberhard-grossgasteiger-HXJkqHexaak-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Nature/gabe-rebra-tFvjSBm-gng-unsplash1.jpg">
                        <img src="../assets/img/Nature/gabe-rebra-tFvjSBm-gng-unsplash1.jpg" alt="">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Nature/gabe-rebra-tFvjSBm-gng-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Nature/jocelyn-morales-N2xqgreISsA-unsplash1.jpg">
                        <img src="../assets/img/Nature/jocelyn-morales-N2xqgreISsA-unsplash1.jpg" alt="">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Nature/jocelyn-morales-N2xqgreISsA-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Nature/meritt-thomas-lW5yf-EQFDs-unsplash1.jpg">
                        <img src="../assets/img/Nature/meritt-thomas-lW5yf-EQFDs-unsplash1.jpg" alt="">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Nature/meritt-thomas-lW5yf-EQFDs-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Nature/ruslan-bogdanov-7ZWV0AgYhAQ-unsplash1.jpg">
                        <img src="../assets/img/Nature/ruslan-bogdanov-7ZWV0AgYhAQ-unsplash1.jpg" alt="">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Nature/ruslan-bogdanov-7ZWV0AgYhAQ-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Nature/sergey-pesterev-_VqyrvQi6do-unsplash1.jpg">
                        <img src="../assets/img/Nature/sergey-pesterev-_VqyrvQi6do-unsplash1.jpg" alt="">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Nature/sergey-pesterev-_VqyrvQi6do-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Nature/theo-eilertsen-photography-ajhmqq12XvI-unsplash1.jpg">
                        <img src="../assets/img/Nature/theo-eilertsen-photography-ajhmqq12XvI-unsplash1.jpg" alt="">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Nature/theo-eilertsen-photography-ajhmqq12XvI-unsplash.jpg">download</a></button>
                </div>
                <div class="inputs">
                    <a data-fancybox="gallery" href="../assets/img/Nature/usgs-4mmGxLTYZnw-unsplash1.jpg">
                        <img src="../assets/img/Nature/usgs-4mmGxLTYZnw-unsplash1.jpg" alt="">
                    </a>
                    <button class="download"><a download="img" href="../assets/img/Nature/usgs-4mmGxLTYZnw-unsplash.jpg">download</a></button>
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