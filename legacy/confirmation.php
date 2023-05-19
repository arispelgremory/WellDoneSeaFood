<!doctype html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Well Done Seafood | Confirmation</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

  <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <header>
    <!-- Header Start -->
    <?php
      include("links.php");
    ?>
    <!-- Header End -->
  </header>
  <main>
      <!-- Hero Area Start-->
      <div class="slider-area ">
          <div class="single-slider slider-height2 d-flex align-items-center">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="hero-cap text-center">
                              <h2>Confirmation</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================ confirmation part start =================-->
      <section class="confirmation_part section_padding">
        <?php
          include("conn_db.php");
          $database = 'wdsf';
          // Create connection
          $mysql = new mysqli($host, $user, $password, $database);
          // Check connection
          if ($mysql -> connect_error) {
            die("Connection failed: " . $mysql->connect_error);
          }

          // Order ID
          $query1 = "select max(Order_Id) as Order_Id from orders";
          if (!($result = $mysql -> query($query1))){
            echo $mysqli -> error;
          }

          $row = $result -> fetch_assoc();
          $cartNo = $row['Order_Id'];
          $no = (int)substr($cartNo ,3) + 1;
          $newcartNo = substr($cartNo, 0, 3);
          for($i = 6 - strlen($no); $i >= 1; $i--){
            $newcartNo .='0';
          }
          $newcartNo .= $no;

          //Get Order id　
          $getOrderQuery = "select * from cart where Customer_id='".$_SESSION['ID']."'";
          if(!($orderResult = $mysql -> query($getOrderQuery))){
            echo $mysqli -> error;
          }
          $productRow = $orderResult -> fetch_assoc();
          $CartID = $productRow['Cart_id'];

          // Reset the format of Order
          $listProducts = array();
          $products = explode(",", $productRow['Product_name']);

          for ($i = 0; $i < count($products); $i++){
            // Product Amounts
            $amount_str1 = substr($products[$i],7);
            $amount_str2 = ltrim($amount_str1, "(");
            $amount_str3 = rtrim($amount_str2, ")");

            //Product ID
            $productId = substr_replace($products[$i],"",7);

            if(array_key_exists($productId, $listProducts)){
              $listProducts["$productId"] += intval($amount_str3);
            } else {
              $listProducts["$productId"] = intval($amount_str3);
            } 
          }
          echo '
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="confirmation_tittle">
                  <span>Thank you. Your order has been received.</span>
                </div>
            </div>
            <div class="col-lg-6 col-lx-4">
              <div class="single_confirmation_details">
                <h4>order info</h4>
                  <ul>
                    <li>
                      <p>order id</p><span>: '. $newcartNo .'</span>
                    </li>
                    <li>
                      <p>date</p><span>: '. date("Y-m-d") .'</span>
                    </li>
                    <li>
                      <p>total</p><span id="totalx">: RM '. 'hi' .'</span>
                    </li>
                    <li>
                      <p>payment method</p><span>: Paypal</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6 col-lx-4">
                <div class="single_confirmation_details">
                  <h4>Billing Address</h4>
                    <ul>
                      <li>
                        <p>Street</p><span>: 56/8</span>
                      </li>
                      <li>
                        <p>city</p><span>: Los Angeles</span>
                      </li>
                      <li>
                        <p>country</p><span>: United States</span>
                      </li>
                      <li>
                        <p>postcode</p><span>: 36952</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="order_details_iner">
                    <h3>Order Details</h3>
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th scope="col" colspan="2">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>';
          $total = 0;
          foreach ($listProducts as $productId => $productAmount){
            $query2 = "select * from product join cart where Product_id='". $productId . "' and Customer_id='". $_SESSION['ID'] ."'";
            if (($result2 = $mysql -> query($query2)) == false ){
              echo $mysql->error;    
            }
            if ($result2 -> num_rows > 0) {
              while ($row2 = $result2->fetch_assoc()) {
                $total += floatval($productAmount) * floatval($row2['Product_price']);
                  echo '<tbody>
                        <tr>
                          <th colspan="2"><span>'. $row2['Product_Name'] .'</span></th>
                          <th>x'. $productAmount .'</th>
                          <th> <span>RM'. floatval($row2['Product_price']) * floatval($productAmount) .'</span></th>
                        </tr>
                        </tbody>';
                   }
                }
              }


              $insertcart = "insert into orders(Order_Id,Customer_id,Order_date,Cart_id,Total) values('".$newcartNo."','".$_SESSION['ID']."','". date("Y-m-d") ."','". $CartID ."','". $total ."')";
              if (!($result = $mysql -> query($insertcart))){
                echo $mysql -> error;    
              } else {
                $clearCart = "update cart set Product_name='' where Cart_id='$CartID'";
                if(!($clearResult = $mysql -> query($clearCart))){
                  echo $mysql -> error;  
                }
              }
        ?>
        
        <tfoot>
          <tr>
            <th scope="col" colspan="3">Quantity</th>
              <th scope="col">Total:RM<?php echo $total;?></th>
            </tr>
            </tfoot>
            </table>
            </div>
           </div>
          </div>
         </div>
      </section>
      <!--================ confirmation part end =================-->
  </main>
  
  <!--? Search model Begin -->
  <div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
  </div>
  <!-- Search model end -->
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

  
  <script>
    $("#totalx").text(': RM<?php echo $total ?>');
  </script>
</body>
</html>