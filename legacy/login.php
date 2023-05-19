<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Well Done Seafood | Login</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="manifest" href="site.webmanifest" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/flaticon.css" />
    <link rel="stylesheet" href="assets/css/slicknav.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="assets/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/css/slick.css" />
    <link rel="stylesheet" href="assets/css/nice-select.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <header>
      <!-- Header Start -->
      <div class="header-area">
        <div class="main-header header-sticky">
          <div class="container-fluid">
            <div class="menu-wrapper">
              <!-- Logo -->
              <div class="logo">
                <a href="index.php"><img src="assets/img/logo/logo.png" alt="" /></a>
              </div>
              <!-- Main-menu -->
              <div class="main-menu d-none d-lg-block">
                <nav>
                  <ul id="navigation">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">shop</a></li>
                    <li><a href="about.php">about</a></li>
                    <li><a href="contact.php">Contact</a></li>
                  </ul>
                </nav>
              </div>
              <!-- Header Right -->
              <div class="header-right">
                <ul>
                  <li>
                    <a href="login.php"><span class="flaticon-user"></span></a>
                  </li>
                  <li>
                    <a href="cart.php"><span class="flaticon-shopping-cart"></span></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
              <div class="mobile_menu d-block d-lg-none"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header End -->
    </header>
    <main>
      <!-- Hero Area Start-->
      <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center">
          <div class="container">
            <div class="row">
              <div class="col-xl-12">
                <div class="hero-cap text-center">
                  <h2>Login</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Hero Area End-->
      <?php

        include('conn_db.php');
        $database='wdsf';
        $mysqli=new mysqli($host,$user,$password,$database);

        if(isset($_POST['Email'])){
     
          $email = $_POST["Email"];
          $password = md5($_POST['password']);
                    
          $query="select * from customer where Email='".$email."'and Password='".$password."'";
             
          $result=mysqli_query($mysqli,$query);
          $count=mysqli_num_rows($result);

          $row = $result -> fetch_assoc();
          if($count==1){
              session_start();
              $_SESSION['username'] = $row['Username'];
              $_SESSION['email'] = $row['Email'];
              $_SESSION['auth'] = 0;
              $_SESSION['ID'] = $row['Customer_id'];
              echo "<script>alert('successfully login')</script>";
              echo '<script>window.location.href = "index.php";</script>';
          }else{
              echo "<script>alert('You have entered In correct password or username');</script>";
              echo "<script>return false;</script>";
          }

      }

      ?>
      <!--================login_part Area =================-->
      <div class="modal"></div>
      <section class="login_part section_padding">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
              <div class="login_part_text text-center">
                <div class="login_part_text_iner">
                  <h2>New to our Shop?</h2>
                  <p>Various seafood to purchase in this shop! Create your own account to start to purchase our seafood!</p>
                  <a href="signup.php" class="btn_3">Create an Account</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="login_part_form">
                <div class="login_part_form_iner">
                  <h3>
                    Welcome Back ! <br />
                    Please Sign in now
                  </h3>
                  <form class="row contact_form" action="login.php" method="post" novalidate="novalidate">
                    <div class="col-md-12 form-group p_star">
                      <input type="text" class="form-control" id="Email" name="Email" value="" placeholder="Email" />
                    </div>
                    <div class="col-md-12 form-group p_star">
                      <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" />
                    </div>
                    <div class="col-md-12 form-group">
                      <div class="creat_account d-flex align-items-center">
                        <input type="checkbox" id="f-option" name="selector" />
                        <label for="f-option">Remember me</label>
                      </div>
                      <input type="submit" value="Log in" class="btn_3">
                        
                      <a class="lost_pass" href="AdminPage/login.php">Are you an admin?</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================login_part end =================-->
    </main>
    <footer>
      <!-- Footer Start-->
      <div class="footer-area footer-padding">
        <div class="container">
          <div class="row d-flex justify-content-between">
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
              <div class="single-footer-caption mb-50">
                <div class="single-footer-caption mb-30">
                  <!-- logo -->
                  <div class="footer-logo">
                    <a href="index.php"><img src="assets/img/logo/logo.png"></a>
                  </div>
                  <div class="footer-tittle">
                    <div class="footer-pera">
                      <p>
                        Made By: <br />
                        Chong Tik Joe 1950347-DWD <br />
                        Goh Neng Fu 1950374-DWD <br />
                        Lim Yao Tong 1950289-DWD <br />
                        Lim Wai Min 1950267-DWD <br />
                        Tan Pei Yu 1950181-DWD <br />
                        Chua Yong Kit 1950349-DWD <br />
                        TWEB223 - Web Programming @ NEUC 2020
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Quick Links</h4>
                  <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Seafood Types</h4>
                  <ul>
                    <li><a href="shop.php">Fish Types</a></li>
                    <li><a href="shop.php">Shrimp Types</a></li>
                    <li><a href="shop.php">Crab Types</a></li>
                    <li><a href="shop.php">Clam Types</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Support</h4>
                  <ul>
                    <li><a href="#">Frequently Asked Questions</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Report a Payment Issue</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Footer bottom -->
          <div class="row align-items-center">
            <div class="col-xl-7 col-lg-8 col-md-7">
              <div class="footer-copy-right">
                <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
              </div>
            </div>
            <div class="col-xl-5 col-lg-4 col-md-5">
              <div class="footer-copy-right f-right">
                <!-- social -->
                <div class="footer-social">
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href=""><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-behance"></i></a>
                  <a href="#"><i class="fas fa-globe"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer End-->
    </footer>
    <!--? Search model Begin -->
    <div class="search-model-box">
      <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
          <input type="text" id="search-input" placeholder="Searching key....." />
        </form>
      </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>

    <!-- Scroll up, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
  </body>
</html>
