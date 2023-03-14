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
        <title>Atom-2k22</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='assets/css/signup.css' rel='stylesheet'>
        <link rel="stylesheet" href="assets/css/nav.css">
        <link rel="stylesheet" href="assets/css/common-styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript">
                $(document).ready(function(){
                
                $("#request").click(function(){
                    
                        email=$("#remail").val();
                        $.ajax({
                            type: "POST",
                            url: "includes/reset-req.inc.php",
                            data: "email=" + email,
                            success: function(html){
                            if(html=='true')
                            {
                                
                                $("#add_err4").html('<div class="alert alert-success"> \
                                                        <strong>Check your Email!</strong> \ \
                                                    </div>');

                                //window.location.href = "index.php";
                            
                            } else if (html=='false') {
                                    $("#add_err4").html('<div class="alert alert-danger"> \
                                                        <strong>Email not found!</strong> \ \
                                                    </div>');
                                    
                            
                            } else {
                                    $("#add_err4").html('<div class="alert alert-danger"> \
                                                        <strong>Error</strong> processing request. Please try again. \ \
                                                    </div>');
                            
                            }
                            },
                            beforeSend:function()
                            {
                                $("#add_err4").html("loading...");
                            }
                        });
                        return false;
                    });
                });
    </script>

        <script type='text/javascript' src=''></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
    </head>

    <body oncontextmenu='return false' class='snippet-body'>
        <section class="body">
            <div class="container">
                <div class="login-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="logo">
                                <span class="logo-font">ATOM 2K23</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <br>
                            <div id="add_err4"></div>
                            <h3 class="header-title">Forget Password</h3>
                            <div id="add_err4 text-dark"></div>
                            <form class="login-form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="email" id="remail" class="form-control" placeholder="Mail id">
                                </div>
                                <button id="request" class="btn submitBtn pad-ten">Send Link</button>
                                <div class="form-group">
                                    <div class="text-center"><a href="login.php">Close</a></div>
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
                                        <div class="slider-feature-card">
                                            <img src="https://i.imgur.com/YMn8Xo1.png" alt="">
                                            <h3 class="slider-title">Title Here</h3>
                                            <p class="slider-description">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Iure, odio!</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="slider-feature-card">
                                            <img src="https://i.imgur.com/Yi5KXKM.png" alt="">
                                            <h3 class="slider-title">Worship</h3>
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
        <script type='text/javascript'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            function menuOnClick() {
                document.getElementById("menu-bar").classList.toggle("change");
                document.getElementById("nav").classList.toggle("change");
                document.getElementById("menu-bg").classList.toggle("change-bg");
            }
        </script>

        <script>
            jQuery(document).ready(function($) {
                "use strict"
                $("#loader").delay(1000).fadeOut("slow");
            });
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