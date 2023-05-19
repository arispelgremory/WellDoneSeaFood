
<!doctype html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Well Done SeaFood | Cart</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="./image/x-icon" href="./assets/img/favicon.ico">
  <!-- CSS here -->
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="./assets/css/flaticon.css">
  <link rel="stylesheet" href="./assets/css/slicknav.css">
  <link rel="stylesheet" href="./assets/css/animate.min.css">
  <link rel="stylesheet" href="./assets/css/magnific-popup.css">
  <link rel="stylesheet" href="./assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="./assets/css/themify-icons.css">
  <link rel="stylesheet" href="./assets/css/slick.css">
  <link rel="stylesheet" href="./assets/css/nice-select.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/position.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  
</head>

<body>
  <header>
    <!-- Header Start -->
    <?php
      include("links.php");
      if(!$_SESSION['username']){
        echo '<script>alert("Please Login!")</script>';
        echo '<script>window.location = "login.php"</script>';
      }
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
                <h2>Cart List</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Remove</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  include("conn_db.php");
                  $database = 'wdsf';
                  // Create connection
                  $conn = new mysqli($host, $user, $password, $database);
                  // Check connection
                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }
                  $CartIdquery = 'select * from cart where Customer_id="'.$_SESSION['ID'].'"';
                  $Cartresult = $conn->query($CartIdquery);
                  

                  if ($Cartresult -> num_rows == 0){
                      
                      $query1="select max(Cart_id) as cartNo from cart";
                      if (($result=$conn->query($query1))==false)
                      {
                      echo $mysqli->error;
                      }
                      
                      $row=$result->fetch_assoc();
                        $cartNo=$row['cartNo'];
                          
                        $no=(int)substr($cartNo,3)+1;
                    
                        
                        $newcartNo=substr($cartNo,0,3);
                    
                        
                      for($i=5-strlen($no); $i>=1;$i--)
                      {
                      $newcartNo.='0';
                      }
                      
                      $newcartNo.=$no;
                      

                      $insertcart="insert into cart(Cart_id,Customer_id) values('".$newcartNo."','".$_SESSION['ID']."')";
                      if (($result=$conn->query($insertcart))==false)
                      {
                        echo $conn->error;    
                      }
            
                  } 

                
                  $listProducts = array();
                  while ($row3 = $Cartresult -> fetch_assoc()){

                    $products = explode(",", $row3['Product_name']);

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
                }
                $total = 0;
                foreach ($listProducts as $productId => $productAmount){
                  $query2 = "select * from product join cart where Product_id='". $productId . "' and Customer_id='". $_SESSION['ID'] ."'";
                  if (($result2=$conn->query($query2))==false){
                    echo $conn->error;    
                  }
                  if ($result2 -> num_rows > 0) {
                    
                    while ($row2 = $result2->fetch_assoc()) {
                    $total += floatval($productAmount) * floatval($row2['Product_price']);
                          echo "
                            <tr>
                            <div class='cart_list'>
                              <div class='cart_items'>
                                <td>
                                  <div class='media'>
                                    <div class='d-flex'>
                                      <img src='assets/seafoodimg/".$row2['Product_id'].".jpg' alt='" . $row2['Product_Name'] . "' />
                                    </div>
                                    <div class='media-body'>
                                      <p class='item_name'>" . $row2['Product_Name'] . "</p>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class='item_price'>
                                    <h5 class='Price' >RM" . $row2['Product_price'] . "</h5>
                                  </div>
                                </td>
                                <td>
                                  <div class='item_price'>
                                    <h5 class='input-number'>" . intval($productAmount) . "</h5>
                                  </div>
                                </td>
                                <td>
                                  <div class='remove_btn'>
                                  <form method='post' action='cart.php'>
                                  <input type='text' name='id' id='id' value='" . $row2['Cart_id'] . "' style='display:none;'>
                                  <input type='submit' name='getID' value='Remove'>
                                  </form>                        
                                  </div>
                                </td>
                                <td>
                                  <div class='total'>
                                    <h5 class='total_price'>RM". floatval($productAmount) * floatval($row2['Product_price']) ."</h5>
                                  </div>
                                </td>
                              </div>
                            </div>
                          </tr>";
                        }
                  }

                }
                  
                echo "<script>
                $(document).ready(() => {
                  $('.subtotal_amount').html('RM$total');
                });
                </script>"
                  
                ?>


                

                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Shipping</h5>
                  </td>
                  <td class="table_list">
                    <ul class="list">
                      <li>
                        Flat Rate: $5.00
                        <input type="radio" name="delivery" aria-label="Radio button for following text input">
                      </li>
                      <li>
                        Free Shipping
                        <input type="radio" name="delivery" aria-label="Radio button for following text input">
                      </li>
                      <li>
                        Flat Rate: $10.00
                        <input type="radio" name="delivery" aria-label="Radio button for following text input">
                      </li>
                      <li class="active">
                        Local Delivery: $2.00
                        <input type="radio" name="delivery" aria-label="Radio button for following text input">
                      </li>
                    </ul>
                    <h6>
                      Calculate Shipping
                      <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </h6>
                  </td>
                </tr>
                <tr class="shipping_area">
                  <td></td>
                  <td></td>
                  <td>
                    <h5 class="subtotal">Subtotal</h5>
                  </td>
                  <td>
                    <h5 class="subtotal_amount">123</h5>
                  </td>
                </tr>
                <tr class="shipping_address">
                  <td>
                    <div class="shipping_box">
                      <h5 class="subtotal"></h5>
                      <select class="shipping_select section_bg">
                        <option value="1">Johor</option>
                        <option value="2">Kedah</option>
                        <option value="3">Kelantan</option>
                        <option value="4">Melaka</option>
                        <option value="5">Negeri Sembilan</option>
                        <option value="6">Pahang</option>
                        <option value="7">Penang</option>
                        <option value="8">Perak</option>
                        <option value="9">Perlis</option>
                        <option value="10">Sabah</option>
                        <option value="11">Sarawak</option>
                        <option value="12">Selangor</option>
                        <option value="13">Terangganu</option>
                        <option value="14">Kuala Lumpur</option>
                        <option value="15">PutraJaya</option>
                        <option value="16">Labuan</option>
                      </select>
                      <input class="address" type="text" style="font-size: 18px;" placeholder="Address" />
                      <input class="post_code" type="text" style="font-size: 18px;" placeholder="Postcode/Zipcode" />
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="checkout_btn_inner float-right">
              <a class="btn_1" href="shop.php">Continue Shopping</a>
              <a class="btn_1" href="confirmation.php">Proceed to checking</a>
            </div>
          </div>
        </div>
    </section>

    <!--================End Cart Area =================-->
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
        <input type="text" id="search-input" placeholder="Searching key.....">
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

  <!-- Scrollup, nice-select, sticky -->
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