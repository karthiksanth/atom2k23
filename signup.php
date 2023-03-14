<?php
@ob_start();
session_start();

if (!isset($_SESSION['email'])) {

?>

    <!doctype html>
    <html>

    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="assets/atom2k23.ico" rel="icon">
        <title>ATOM 2K23</title>

        <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>

        <!-- Font Awesome Icons-->
        <script src="https://kit.fontawesome.com/a74d0f3882.js" crossorigin="anonymous"></script>

        <link rel='stylesheet' href='assets/css/signup.css'>
        <link rel="stylesheet" href="assets/css/nav.css">
        <link rel="stylesheet" href="assets/css/common-styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                // Submit form data via Ajax
                $("#supForm").on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'adduser.php',
                        data: new FormData(this),
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('.submitBtn').attr("disabled", "disabled");
                            $('#add_err2').html('<p>Loading...</p>');
                        },
                        success: function(response) {
                            console.log(response);
                            $('.statusMsg').html('');
                            if (response.status == 1) {
                                $('#supForm')[0].reset();
                                $('#add_err2').html('<div class="alert alert-success"> \
                                                        <strong>' + response.message + '</strong> \ \
                                                    </div>');
                                window.location.href = "index.php";
                            } else {
                                $('#add_err2').html('<div class="alert alert-success"> \
                                                        <strong>' + response.message + '</strong> \ \
                                                    </div>');
                                alert(response.message);
                            }
                            $('#supForm').css("opacity", "");
                            $(".submitBtn").removeAttr("disabled");
                        }
                    });
                });
            });
        </script>

        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'>
        </script>

        <script src="https://kit.fontawesome.com/a74d0f3882.js" crossorigin="anonymous"></script>
    </head>

    <style>
        @font-face {
            font-family: AquireBold;
            src: url('assets/fonts/AquireBold.otf');
        }

        @font-face {
            font-family: MonumentReg;
            src: url('assets/fonts/MonumentExtended-Regular.otf');
        }


        @font-face {
            font-family: FlareReg;
            src: url('assets/fonts/Flare-Regular.otf');
        }
    </style>

    <body oncontextmenu='return false' class='snippet-body'>

        <div id="loader">
            <div class="center">
                <div class="nulled-loader">
                    <div class="nulled-inner nulled-one"></div>
                    <div class="nulled-inner nulled-two"></div>
                    <div class="nulled-inner nulled-three"></div>
                </div>
            </div>
        </div>

        <div id="menu">
            <div id="menu-bar" onclick="menuOnClick()">
                <div id="bar1" class="bar"></div>
                <div id="bar2" class="bar"></div>
                <div id="bar3" class="bar"></div>
            </div>
            <nav class="nav1" id="nav1">
                <ul>
                    <li><a href="index.php"><i class="fas fa-home" style="padding-right:10px; color:#650404"></i>Home</a></li>
                    <li><a href="event.php"><i class="fas fa-calendar-day" style="padding-right:10px; color:#650404"></i>Events</a></li>
                    <li><a href="schedule.php"><i class="fas fa-hourglass-half" style="padding-right:10px; color:#650404"></i>Schedule</a></li>
                    <!-- <li><a href="login.php" class="nav-link scrollto">Register</a></li> -->
                    <?php require_once 'user.php'; ?>
                </ul>
            </nav>
        </div>

        <div class="menu-bg" id="menu-bg"></div>


        <section class="body">
            <div class="container">
                <div class="login-box" id="signup">
                    <div class="row">
                        <div class="col-sm-6">
                            <div style="font-family:AquireBold;font-size:40px;text-align:center; ">
                                <span style="color:#ff3737">ATOM 2K23</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <br>
                            <h3 class="header-title">Sign Up</h3>
                            <div id="add_err2"></div>
                            <form id="supForm" class="login-form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" for="name" name="name" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" for="email" name="email" placeholder="Offical mail id">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" for="department" name="department" placeholder="Department">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" for="mobile" name="mobile" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <input type="Password" class="form-control" for="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button class="submitBtn" id="signup" name="submit">Sign Up</button>
                                </div>
                                <div class="form-group">
                                    <div class="text-center">Already have an account <a href="login.php">Login</a></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6 hide-on-mobile">
                            <div id="demo" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                </ul>
                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="slider-feature-card" style="border-radius:2rem;">
                                            <img src="https://i.imgur.com/YMn8Xo1.png" alt="">
                                            <h3 class="slider-title">Events</h3>
                                            <p class="slider-description">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Iure, odio!</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="slider-feature-card">
                                            <img src="https://i.imgur.com/Yi5KXKM.png" alt="">
                                            <h3 class="slider-title">Workshop</h3>
                                            <!-- <p class="slider-description">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. Ratione, debitis?</p> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="header">
            <!--Waves Container-->
            <div>
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="parallax">
                        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255, 55, 55, 0.7)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255, 55, 55,0.5)" />
                        <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(255, 55, 55,0.3)" />
                        <use xlink:href="#gentle-wave" x="48" y="9" fill="#ff3737" />
                    </g>
                </svg>
            </div>
            <!--Waves end-->
        </div>
        <!--Header ends-->


        <!--Content starts-->
        <footer class="footer">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <ul class="social-icon">
                        <li class="social-icon__item"><a class="social-icon__link" href="mailto:ieee.studentschapter.12951@gmail.com">
                                <ion-icon name="mail-outline"></ion-icon>
                            </a></li>
                        <li class="social-icon__item"><a class="social-icon__link" href="https://www.linkedin.com/company/ieee-students-chapter-12951/">
                                <ion-icon name="logo-linkedin"></ion-icon>
                            </a></li>
                        <li class="social-icon__item"><a class="social-icon__link" href="https://instagram.com/ieee_sc_12951?igshid=YmMyMTA2M2Y=">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a></li>
                    </ul>

                    <ul class="menu">
                        <li class="menu__item"><a class="menu__link" href="index.php">Home</a></li>
                        <li class="menu__item"><a class="menu__link" href="event.php">Events</a></li>
                        <li class="menu__item"><a class="menu__link" href="schedule.php">Schedule</a></li>
                        <li class="menu__item"><a class="menu__link" href="login.php">Register</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6 d-flex flex-column">
                    <h4 class="text-center">CONTACT</h4>
                    <ul class="contact d-flex flex-column">
                        <li><a style="color: #ffd6d6;text-transform: uppercase;text-decoration: none;" href=" tel:+916383405138">SASHANK T M - 6383405138</a></li>
                        <li><a style="color: #ffd6d6;text-transform: uppercase;text-decoration: none;" href=" tel:+919500288886">KRISHNA R S - 9500288886</a></li>
                        <li><a style="color: #ffd6d6;text-transform: uppercase;text-decoration: none;" href=" tel:+918110815874">SHUBIKSHA M - 8110815874</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <p>IEEE STUDENTS CHAPTER 12951 | PSG COLLEGE OF TECHNOLOGY</p>
            </div>
        </footer>
        <!--Content ends-->

        <script type=" module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


        <script type='text/javascript'></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
        <script>
            jQuery(document).ready(function($) {
                "use strict"
                $("#loader").delay(1000).fadeOut("slow");
            });
        </script>
        <script>
            function menuOnClick() {
                document.getElementById("menu-bar").classList.toggle("change");
                document.getElementById("nav1").classList.toggle("change");
                document.getElementById("menu-bg").classList.toggle("change-bg");
            }
        </script>
    </body>

    </html>
<?php

} else {
    if (isset($_SESSION['email'])) {
        header("location:profile.php ");
    }
}

?>