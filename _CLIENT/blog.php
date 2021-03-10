<!DOCTYPE html>
<html lang="en">
  <head>
    <title>iRespondPH - News & Announcements</title>
	<link href="../lib/Client/images/logo.png" rel="icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="../lib/Client/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../lib/Client/css/animate.css">
    
    <link rel="stylesheet" href="../lib/Client/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../lib/Client/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../lib/Client/css/magnific-popup.css">

    <link rel="stylesheet" href="../lib/Client/css/aos.css">

    <link rel="stylesheet" href="../lib/Client/css/ionicons.min.css">

    <link rel="stylesheet" href="../lib/Client/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../lib/Client/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../lib/Client/css/flaticon.css">
    <link rel="stylesheet" href="../lib/Client/css/icomoon.css">
    <link rel="stylesheet" href="../lib/Client/css/style.css">
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    <img src="../lib/Client/images/logo.png" class="logo" alt="" />
        <a class="navbar-brand" href="index.php">iRespond<span>PH</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	        	 <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Who We Are
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="about.php">
                  <span class="fas fa-angle-right mr-3"></span>About Us</a
                >

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="team.php"
                  ><span class="fas fa-angle-right mr-3"></span>Our Team</a
                >
              </div>
            </li>
	        	<li class="nav-item active"><a href="blog.php" class="nav-link">News & Announcements</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        <li class="nav-item">
                <a href="../_CLIENT/_LOGIN/login.php" class="nav-link">Log In</a>
            </li>
                </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section
      class="hero-wrap hero-wrap-2"
      style="background-image: url('../lib/Client/images/bg_2.jpg')"
      data-stellar-background-ratio="0.5"
    >
      <div class="overlay"></div>
      <div class="container">
        <div
          class="row no-gutters slider-text js-fullheight align-items-end justify-content-center"
        >
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h2 class="mb-3 bread">News & Announcements</h2>
            <p class="breadcrumbs">
              <span class="mr-2"
                ><a href="index.php"
                  >Home <i class="ion-ios-arrow-forward"></i></a
              ></span>
            </p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
			<div class="row">
                            <?php 
                            include '../_COMMANDS/NewsSection.php';
                            $News = new NewsSection();

                            $result = $News->getNews();

                            while($rows=mysqli_fetch_assoc($result)){
                            $NewsID = $rows['NewsID'];
                            ?>
                            <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		             <a href="blog.php" class="block-20" style="background-image: url('../lib/Client/images/image_1.jpg');width: 300px"> </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3"> 
		                  <div><a href="#"><?php echo $rows['NewsTime'] ?></a></div><br>
		                  <div><a href="#"><?php echo $rows['NewsAuthorFName'].' '.$rows['NewsAuthorMName'].' '.$rows['NewsAuthorLName'].' '.$rows['NewsAuthorSuffix']; ?></a></div>
		                </div>
		                <h3 class="heading"><a href="#"><?php echo $rows['NewsContent'];?></h3>
		                <!--<p><a href="blog.php" class="btn btn-primary py-2 px-3">Read more</a></p>-->
		              </div>
		            </div>
		          </div>
                           <?php } ?>
                        </div>
			<div class="row mt-5">
		        </div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
              <h3 class="heading-2">Recent Blog</h3>
              <?php 
              $var=0;
              $result = $News->getNews();
              while($rows=mysqli_fetch_assoc($result)){
                  if($var < 3 ){
              ?>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(../lib/Client/images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#"><?php echo $rows['NewsContent']; ?></a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> <?php echo $rows['NewsTime'] ?> </a></div>
                    <div><a href="#"><span class="icon-person"></span><?php echo $rows['NewsAuthorFName'].' '.$rows['NewsAuthorMName'].' '.$rows['NewsAuthorLName'].' '.$rows['NewsAuthorSuffix']; ?></a></div>
                  </div>
                </div>
              </div>
              <?php 
                  }
               $var+=1; 
              } ?>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->

   <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">
                <a>iRespond<span>PH</span></a>
              </h2>
              <p>
                A Post Disaster Management System that responds to the needs of victims of the disasters
              </p>
              <ul
                class="ftco-footer-social list-unstyled float-md-left float-lft mt-5"
              >
                <li class="ftco-animate">
                  <a href="#"><span class="icon-twitter"></span></a>
                </li>
                <li class="ftco-animate">
                  <a href="#"><span class="icon-facebook"></span></a>
                </li>
                <li class="ftco-animate">
                  <a href="#"><span class="icon-instagram"></span></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Donation</a></li>
                <li><a href="#" class="py-2 d-block">Privacy</a></li>
                <li><a href="#" class="py-2 d-block">Terms Condition</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                  <li><a href="index.php" class="py-2 d-block">Home</a></li>
                  <li><a href="about.php" class="py-2 d-block">Who we are</a></li>
                  <li><a href="blog.php" class="py-2 d-block">Stories</a></li>
                  <li><a href="contact.php" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li>
                    <span class="icon icon-map-marker"></span
                    ><span class="text"
                      >551 M.F. Jhocson St, Sampaloc, Manila, 1008 Metro Manila</span
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="icon icon-phone"></span
                      ><span class="text">0944 444 4444</span></a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><span class="icon icon-envelope"></span
                      ><span class="text">irespondph@gmail.com</span></a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              All rights reserved 
              <a href="https://colorlib.com" target="_blank"></a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../lib/Client/js/jquery.min.js"></script>
  <script src="../lib/Client/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../lib/Client/js/popper.min.js"></script>
  <script src="../lib/Client/js/bootstrap.min.js"></script>
  <script src="../lib/Client/js/jquery.easing.1.3.js"></script>
  <script src="../lib/Client/js/jquery.waypoints.min.js"></script>
  <script src="../lib/Client/js/jquery.stellar.min.js"></script>
  <script src="../lib/Client/js/owl.carousel.min.js"></script>
  <script src="../lib/Client/js/jquery.magnific-popup.min.js"></script>
  <script src="../lib/Client/js/aos.js"></script>
  <script src="../lib/Client/js/jquery.animateNumber.min.js"></script>
  <script src="../lib/Client/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../lib/Client/js/google-map.js"></script>
  <script src="../lib/Client/js/main.js"></script>
    
  </body>
</html>