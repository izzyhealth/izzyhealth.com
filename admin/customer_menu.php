<?php  
include('validate.php'); 
include('functions.php'); 


if (!isUser()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}

?>

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			
		<?php endif ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />


  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
<script>
		// Wait for window load
		$(window).load(function() {
		//$('.loader').css('display','none')
		});
	</script>	
</head>

<!--<div class="loader"></div>-->
<body class="nav-md">
  <div class="spinner-wrapper">
</div>

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="http://brieanamayne.com" target="blank" class="site_title"><i class="fa fa-eye" aria-hidden="true"></i> <span>View Site</span></a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile" >
            <div class="profile_pic">
             
            </div>
            <div class="profile_info" style="    padding: 0px 0px 15px 0px;width: 80%;float: left;">
              <img src="/admin/uploads/blogs/1.jpg" alt="..." class="thumbnail profile_img" style="height: 80px;padding: 0px;margin-left: 55px;">
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="margin-top:100px">

            <div class="menu_section">
              <h3>Welcome to dashbord</h3>
              <ul class="nav side-menu">
                <li><a href="customer_home.php"><i class="fa fa-home"></i> Home </a>
                </li>
              
                
               	 <li><a><i class="fa fa-edit"></i>Profile<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="#">test</a>
                    </li>
				
                  </ul>
                </li>
               	 <li>	<a href="customer_home.php?logout='1'" style="color: red;"><i class="fa fa-sign-out" aria-hidden="true"></i>logout</a>
                  
                </li>
               
              </ul>
            </div>
          

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
         
          <!-- /menu footer buttons -->
        </div>
      </div>
<div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">
				    <?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
			
                </a>
              	<?php endif ?>
                  </li>
                </ul>
              </li>

            

            </ul>
          </nav>
        </div>

      </div>