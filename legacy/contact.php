<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Well Done Seafood | Contact</title>
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
    <link rel="stylesheet" href="assets/css/addon.css" />
  </head>

  <body>
    <!--? Preloader Start -->
    <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="preloader-circle"></div>
          <div class="preloader-img pere-text">
            <img src="assets/img/logo/logo.png" alt="" />
          </div>
        </div>
      </div>
    </div>
    <!-- Preloader Start -->
    <header>
      <!-- Header Start -->
      <?php
        include("links.php");
      ?>
      <!-- Header End -->
    </header>
    <main>
      <!--? Hero Area Start-->
      <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center">
          <div class="container">
            <div class="row">
              <div class="col-xl-12">
                <div class="hero-cap text-center">
                  <h2>Contacts</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--? Hero Area End-->
      <!-- ================ contact section start ================= -->
      <section class="contact-section">
        <div class="container">
          <div class="d-sm-block mb-5 pb-4">
            <div id="map" style="height: 480px; position: relative; overflow: hidden;">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3984.399123910505!2d101.7905767!3d2.9866043!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdcb841d3762c7%3A0x4dc97330d731c530!2sNew%20Era%20University%20College!5e0!3m2!1sen!2smy!4v1595003920671!5m2!1sen!2smy" width="100%" height="100%" frameborder="0" style="border: 0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="row">
              <div class="col-12">
                <h2 class="contact-title">Get in Touch</h2>
              </div>
              <div class="col-lg-8">
                <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                  </div>
                </form>
              </div>
              <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                  <span class="contact-info__icon"><i class="ti-home"></i></span>
                  <div class="media-body">
                    <h3>Kajang, Selangor.</h3>
                    <p>Hulu Langat District, Kajang 43000</p>
                  </div>
                </div>
                <div class="media contact-info">
                  <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                  <div class="media-body">
                    <h3>+60387392770</h3>
                    <p>Mon to Fri 9am to 6pm</p>
                  </div>
                </div>
                <div class="media contact-info">
                  <span class="contact-info__icon"><i class="ti-email"></i></span>
                  <div class="media-body">
                    <h3>neuc@newera.edu.my</h3>
                    <p>Send us your query anytime!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ================ contact section end ================= -->
    </main>
    <footer>
      <!-- Footer Start-->
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
                      <a href="index.php"><img src="assets/img/logo/logo.png" alt="" /></a>
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
