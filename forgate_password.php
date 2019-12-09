<?php include('include/config.php') ?>
<?php include('admin/validate.php') ?>
 <?php

	if(!empty($_POST["forgot-password"])){
		
		
	    $username = $_POST["user-login-name"];
		$email = $_POST["user-email"];	
		
	    $sql = "Select * from users  WHERE username = '$username' OR email= '$email'";
		$result = mysqli_query($mysqli,$sql);
		global $user;
		$user = mysqli_fetch_array($result);
	
		if(!empty($user)) {
		    $success_message = 'Please check your mail and reset the password.';
			require_once("forgot-password-recovery-mail.php");
		} else {
			$error_message = 'No User Found';
		}
	}
?>
<script>
function validate_forgot() {
	if((document.getElementById("user-login-name").value == "") && (document.getElementById("user-email").value == "")) {
		document.getElementById("validation-message").innerHTML = "Login name or Email is required!"
		return false;
	}
	return true
}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="favicon.ico"/>
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
			<div class="wrap-login100">
			<div class="login100-more" style="background-image: url('images/password_reset.jpg');">
				</div>
				<form class="login100-form validate-form forgate"  method="post" id="frmForgot" name="frmForgot" role="form" autocomplete="off" onSubmit="return validate_forgot()">
				
					<span class="login100-form-title p-b-43">
						<a href="index.php"><h2><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Home</h2></a>
					</span>
					
					
	
					
					
					
	
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-2x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
                   
					<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?>
	
	</div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>
    
                      <div class="form-group">
                        <div class="input-group">
                         <input type="text" class="form-control" name="user-login-name" placeholder="User Name" id="user-login-name" class="input-field">
                        </div>
                      </div>
					   <div class="form-group">
                       <div class="login100-form-social flex-c-m">
						 <h5>Or</h5>
					</div>
                      
                      </div>
					  
					  
					  <div class="form-group">
                        <div class="input-group">
                          <input id="email" name="user-email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
					  
                    
                      
                     <input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="btn btn-lg btn-primary btn-block">
                    </form>
                  </div>
                </div>
              </div>
 </br>
					<div class="login100-form-social flex-c-m">
						<a href="https://www.facebook.com/worldmodelhunt/" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="https://www.instagram.com/worldmodelhunt/" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				
			</div>
		</div>
	</div>
	
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