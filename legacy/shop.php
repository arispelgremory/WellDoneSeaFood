<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Well Done Seafood | Shop</title>
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
    <link rel="stylesheet" href="assets/css/modalx.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    
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
      <!-- Hero Area Start-->
      <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center">
          <div class="container">
            <div class="row">
              <div class="col-xl-12">
                <div class="hero-cap text-center">
                  <h2>Seafood Shop</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Hero Area End-->
      <!-- Latest Products Start -->
      
      <section class="popular-items latest-padding">
        <div class="container">
          <div class="row product-btn justify-content-between mb-40">
            <div class="properties__button">
              <!--Nav Button  -->
              <nav>
              <?php
                  include ("conn_db.php");
                  $database="wdsf";
                  $mysqli=new mysqli($host, $user, $password, $database);
                  if(mysqli_connect_errno())
                  {
                      echo 'Could not connect to database. Error: '.mysqli_connect_error();
                      exit;
                  }
                  if (!isset($_GET["query"])) {
                    $query = "select * from product order by Product_id";
                  } else {
                    $query = "select * from product WHERE Category_id=".$_GET['query'] . " order by Product_id";
                  }
                  echo '
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-all-tab" href="shop.php"> ALL</a>
                    <a class="nav-item nav-link" id="nav-fish-tab" href="shop.php?query=3"> FISH</a>
                    <a class="nav-item nav-link" id="nav-prawn-tab" href="shop.php?query=1"> PRAWN</a>
                    <a class="nav-item nav-link" id="nav-crab-tab" href="shop.php?query=2"> CRAB</a>
                    <a class="nav-item nav-link" id="nav-clam-tab" href="shop.php?query=4"> CLAM</a>
                  </div>
                ';
              ?>
              </nav>
              <!--End Nav Button  -->
            </div>
          <!-- Nav Card -->
          <div class="tab-content" id="nav-tabContent">
            <!-- Card all -->
            <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
              <div class="row">
                <?php
                  if(($result=$mysqli->query($query))==false)
                  {
                      echo 'Invalid query: '.$mysqli->error;
                      exit();
                  }

                  $numrows = $result->num_rows;
                  if ($numrows > 0){
                    while ($row = $result -> fetch_array()){  
                      $productId = strval($row['Product_id']);
                      echo'
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                          <div class="popular-img">
                            <img src="assets/seafoodimg/'.$row["Product_id"].'.jpg" alt="" />
                            <div class="img-cap">
                              <span id="'.$row["Product_id"].'">Add to cart</span>
                            </div>
                            <div class="favorit-items">
                              <span class="flaticon-heart"></span>
                            </div>
                          </div>
                          <div class="popular-caption">
                            <h3><a href="product_details.php">'.$row["Product_Name"].'</a></h3>
                            <span>RM '.$row["Product_price"].'</span>
                          </div>
                        </div>
                      </div>
                      <div id="Modal'.$row["Product_id"].'" class="modal">
                        <!-- Modal Content -->
                        <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="container1">
                          <div class="left1">
                            <img src="assets/seafoodimg/'.$row["Product_id"].'.jpg" alt="">
                          </div>
                          <div class="right1">
                            <div class="mobileleft">
                            <input type="text" name="name" value="'.$row['Product_id'].'" style="display:none;">
                              <h2>'.$row["Product_Name"].'</h2>
                              <p>Details: '.$row["Details"].'</p>
                            </div>
                            <div class="card_area">
                                <div class="product1">
                                    <p>Quantity</p>
                                    <div class="product_count d-inline-block">
                                      <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                      <input class="product_count_item input-number" name="unit" type="text" value="1" min="0" max="'.$row["unit"].'">
                                      <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                    </div>
                                    <p>kg</p>
                                </div>
                                <div class="add_to_cart">
                                  <input id="'. $row["Product_id"] .'" type="submit" class="btn_3" value="add to cart">
                                  <input type="submit" class="btn_3" value="Booking">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>'
                      ;
                    }
                  }
                ?>

                  <script>
                    $(document).ready(function () {
                      $("input").click(function () {
                        let product_id = this.id;
                        let amount = $('#Modal' + this.id + " input[name='unit']").val();
                        $.ajax({
                          url: "postpage.php",
                          method: "POST",
                          data: {
                            product_id : product_id,
                            amount: amount,
                          },
                          success: function(req){
                            console.log(req);
                          }
                        });
                      });
                    });
                  </script>

              </div>
            </div>
          </div>
          <!-- End Nav Card -->
        </div>
      </section>
      <!-- Latest Products End -->
      <!--? Shop Method Start-->
      <div class="shop-method-area">
        <div class="container">
          <div class="method-wrapper">
            <div class="row d-flex justify-content-between">
              <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-method mb-40">
                  <i class="ti-package"></i>
                  <h6>Shipping Method Keep Fresh</h6>
                  <p>
                    The storage life span of frozen seafood is dependent on the temperature of the environment it’s stored in.
                  </p>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-method mb-40">
                  <i class="ti-unlock"></i>
                  <h6>Customer Support and Service</h6>
                  <p>
                    Companies involved with software and system delivery projects often require customer service, sales and support staff to be deeply engaged with the customers.
                  </p>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-method mb-40">
                  <i class="ti-reload"></i>
                  <h6>Secure Payment System</h6>
                  <p>
                    More safety way to purchase the seafood
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Shop Method End-->
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
                    <li><a href="#">Fish Types</a></li>
                    <li><a href="#">Shrimp Types</a></li>
                    <li><a href="#">Crab Types</a></li>
                    <li><a href="#">Clam Types</a></li>
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
    <!-- All JS Custom Plugins Link Here here -->
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
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scroll up, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <!-- Modal js -->
    <script src="./assets/js/modal.js"></script>
  </body>
</html>
<?php

?>