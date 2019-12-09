<?php include('admin/validate.php') ;
	
?>
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
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="">
			<div class="login100-more" style="background-image: url('images/login_banner.jpg');">
				</div>
				<form class="login100-form validate-form" action="" method="post">
					
					<span class="login100-form-title p-b-43">
						<a href="index.php"><h2 style="color: #fff;"> <img class="img-fluid" style="height: 40px" src="images/logo.png"></h2></a>
					</span>
					
					<?php echo display_error(); ?>
					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: xyz">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<!-- <span class="label-input100">Username</span> -->
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<!-- <span class="label-input100">Password</span> -->
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" value="1" id="ckb1" type="checkbox" name="remember">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<!-- <div>
							<a href="forgate_password.php" class="txt1">
								Forgot Password?
							</a>
						</div> -->
					</div>
			

					<div class="container-login100-form-btn">
						<button id="myBtn" type="submit"  name="login_btn" class="btn-login">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-20 p-b-5">
						<span class="txt2">
			Not yet a member? <a hrefJavascript:void(0):;"> Sign up</a>
					
						</span>
					</div>
<!-- 
					<div class="login100-form-social flex-c-m">
						<a href="https://www.facebook.com/worldmodelhunt/" class="login100-form-social-item flex-c-m bg1 m-r-5" target="_blank">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="https://www.instagram.com/worldmodelhunt/" class="login100-form-social-item flex-c-m bg2 m-r-5" target="_blank">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>

				
			</div>
		</div>
	</div>
	
<?php
if(isset($_GET['logout'])){
session_destroy();
}
?>	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>