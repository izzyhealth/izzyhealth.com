<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>IZZYhealth</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- Favicons -->
  <link href="images/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">


</head>

<body>

  <!--==========================
  Header
  ============================-->
    <div class="wrapper">
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <a href="index.php" class="scrollto"><img src="images/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="Javascript:void(0):;">Home</a></li>
          <li><a href="Javascript:void(0):;">Product</a></li>
          <li><a href="Javascript:void(0):;">Pricing</a></li>          
          <li><a href="Javascript:void(0):;">Health Proffessional</a></li>
            <li><a href="Javascript:void(0):;">Login</a></li>
            <li><a  href="login.php">Admin Login</a></li>
              <li><a class="btn-izz" href="Javascript:void(0):;">Get Started</a></li>


        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">
        <div class="info-chat">
      <div class="intro-img">
    <ul>
        <li><div class="note"> <img src="images/video.png" /> <p>Video Message</p></div></li>
        <li><div class="note"> <img src="images/chat.png" /><p>Voice Note</p></div></li>
        <li><div class="note"> <img src="images/battery.png" /><p>Prescription Message</p></div></li>
    </ul>
          <img class="img-fluid" src="images/chat-panel.jpg" />
      </div>

      <div class="intro-info wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
        <h2>Personalized health for you    <br />and your family from<br> anywhere </h2>
		<?php
		$mysqli = new mysqli("208.91.198.197:3306","neerusanju","neerusanju@226021","neerukxg_neerusanju");
 
			// Check connection
			if ($mysqli -> connect_errno) {
			  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
			  exit();
			}
		if(isset($_POST['subscribe'])){
			$email = $_POST['email'];
			$data = "SELECT * from subscribe WHERE email = '$email'";
			$query = mysqli_query($mysqli,$data);
		    $count = mysqli_num_rows($query);
			//print_r($count);
			if($count== 0){
				$insert = "INSERT INTO subscribe (email) VALUES ('$email')";
				$insquery = mysqli_query($mysqli,$insert);
				if($insquery){
				$_SESSION['msg'] = '<p style="color: green;">You are subscribe succesfully</p>';
				}
			}else{
				$_SESSION['msg'] = '<p style="color: green;">This email already subscribed</p>';
			}
		}
		?>
		
		  <form method="post" action="">
		  <?php
		  if(!empty($_SESSION['msg'])){
			  echo $_SESSION['msg'];
		  }
		  ?>
        <div class="input-group customH">
  <input type="text" class="form-control" placeholder="Your email address" aria-label="Username" aria-describedby="basic-addon1"  required name="email">
            <div class="input-group-prepend">
				<input class="input-group-text" id="basic-addon1" type="submit" name="subscribe" value="Subscribe">
   <!--  <span class="input-group-text" id="basic-addon1">Subscribe</span> -->
  </div>
</div>
			  </form>
       </div>
      </div>
       
    </div>
     
     
  </section><!-- #intro -->
     </div>
    <div class="container">
          <div class="chatting">
            <img style="height: 350px;" class="img-fluid" src="images/chatting.png" />
        </div>
    </div>
   
     <div class="icons">
          <div class="container">
          <div class="row footer1">
              <div class="col-md-3 col-sm-12">
<p> <img  class="img-fluid" src="images/footer-logo1.png" /> </p>
              </div>
               <div class="col-md-6  col-sm-12">
                 <ul class="footer-menu">
          <li class="active"><a href="Javascript:void(0):;">Home</a></li>
          <li><a href="Javascript:void(0):;">Product</a></li>
          <li><a href="Javascript:void(0):;">Pricing</a></li>          
          <li><a href="Javascript:void(0):;">About Us</a></li>
            <li><a href="Javascript:void(0):;">Contact Us</a></li>
        </ul>
</div>
              <div class="col-md-3  col-sm-12">
                    <div class="social-links pull-right">
                       <a href="Javascript:void(0):;" class="facebook" style="background-color:#3b5998"><i class="fa fa-facebook"></i></a>
                       <a href="Javascript:void(0):;" class="facebook" style="background-color:#CC3333"><i class="fa fa-youtube"></i></a>
              <a href="Javascript:void(0):;" class="twitter" style="background-color:#00acee" ><i class="fa fa-twitter"></i></a>
              <a href="Javascript:void(0):;" class="linkedin" style="background-color:#0e76a8"><i class="fa fa-linkedin"></i></a>
            </div>
                  </div>
              </div>
               <div class="row footer2">
              <div class="col-md-6 col-sm-12">
<p>
    <img class="img-fluid"  src="images/footer-logo.png" />  </p>
                  <p class="fizzy">lezzyhealth2019. All rights reserved.</p>
              </div>
              <div class="col-md-6  col-sm-12">
                      <ul class="footer-menu text-right">
          <li class="active"><a href="index.html">Trems and conditation</a></li>
          <li><a href="blockchain.html">Privacy policy</a></li>
        </ul>
                  </div>
              </div>
          </div>
      </div>

  <!--==========================
    Footer
  ============================-->
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
