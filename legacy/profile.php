<!doctype php>
<php class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Well Done Seafood | Profile</title>
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
	<!-- Preloader Start -->
	<!-- <div id="preloader-active">
		<div class="preloader d-flex align-items-center justify-content-center">
			<div class="preloader-inner position-relative">
				<div class="preloader-circle"></div>
				<div class="preloader-img pere-text">
					<img src="assets/img/logo/logo.png" alt="">
				</div>
			</div>
		</div>
	</div> -->
	<!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <?php
          include("links.php");
          if(!$_SESSION['username']){
            echo '<script>alert("Please Login!")</script>';
            echo '<script>window.location = "login.php"</script>';
          }

          include("conn_db.php");
          $database = 'wdsf';
          $sql = new mysqli($host,$user,$password,$database);

          if (!$sql){
            echo mysqli_connect_error();
            exit();
          }

          $query = "select * from customer where Username='". $_SESSION['username']. "' and Email='". $_SESSION['email'] . "'";
          $result = $sql -> query($query);

          $row = $result -> fetch_assoc();
          if (isset($_POST)){
            if (isset($_POST['ID'])){
              echo $_POST['ID'];
              if (!$_POST['pw']){
                $queryu = "update customer set Username='".$_POST['username']. "', FName='". $_POST['fname'] . "', LName='" . $_POST['lname'] . "', Phone_num='".$_POST['pn']. "', Email='". $_POST['em'] . "', Address='". $_POST['address'] . "' where Customer_id='".$_POST['ID']."'";
              } else {
                $queryu = "update customer set Username='".$_POST['username']. "', FName='". $_POST['fname'] . "', LName='" . $_POST['lname'] . "', Phone_num='".$_POST['pn']. "', Email='". $_POST['em'] . "', Address='". $_POST['address'] . "', Password='" . md5($_POST['pw']) . "' where Customer_id='".$_POST['ID']."'" ;
              }

              $resultu = $sql -> query($queryu);
              if ($resultu){
                echo '<script>alert("User Inforamtion Update Successful!")</script>';
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['email'] =  $_POST['em'];
                // echo '<script>window.location = "profile.php"</script>';
              } else {
                echo '<script>alert("shit")</script>';
              }
            }
          }
      	?>
        <!-- Header End -->
    </header>
	<main>
		<!-- Start Sample Area -->
		<!-- Start Align Area -->
		<div class="whole-wrap">
			<div class="container box_1170">
				<div class="section-top-border">
					<h3 class="mb-30">Profile</h3>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/img/elements/user3.jpg">
							<input type="file" name="pic">
						</div>
						<div class="col-md-9 mt-sm-20">
							<form action="profile.php" method="post">
								<span name="ID">User ID</span>
								<input type="text" name="ID" value="<?php echo $row['Customer_id'] ?>" readonly>
								<br><br>
								<span name="username">Username</span>
								<input type="text" name="username" value="<?php echo $row['Username'] ?>">
								<br><br>
								<span name="firstname">First Name</span>
								<input type="text" name="fname" value="<?php echo $row['FName'] ?>">
								<br><br>
								<span name="lastname">Last Name</span>
								<input type="text" name="lname" value="<?php echo $row['LName'] ?>">
								<br><br>
								<span name="phone">Phone Number</span>
								<input type="text" name="pn" value="<?php echo $row['Phone_num'] ?>">
								<br><br>
								<span name="email">Email</span>
								<input type="text" name="em" value="<?php echo $row['Email'] ?>">
								<br><br>
								<span name="password">New Password</span>
								<input type="text" name="pw">
								<br><br>
								<span name="address">Address</span><br>
								<textarea name="address" cols="50" rows="5" style="resize: none;"><?php echo $row['Address'] ?></textarea>
								<br><br>
								<input type="submit" value="Save" style="color: black;">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Align Area -->
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
</php>