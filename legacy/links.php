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
                  <?php 
                        include("session.php");
                        if (empty($_SESSION['username'])){
                           $_SESSION['username']='';
                           $_SESSION['auth']= 0 ;
                           echo '<a href="login.php"><span class="flaticon-user"></span></a>';
                        } else if ($_SESSION['auth'] != 0) {
                            logout();
                            echo '<a href="login.php"><span class="flaticon-user"></span></a>';
                        } else {
                          echo '<a style="color: black;margin-right:20px;" href = "profile.php">' . $_SESSION['username'] . '</a>';
                          echo '<a style="color: black;" href = "logout.php">Logout</a>';
                        }

                        function logout(){
                          $_SESSION = array(); 
                          session_destroy();
                          // echo "<script>alert('Logout Successful')</script>";
                        }
                    ?>
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
</div>