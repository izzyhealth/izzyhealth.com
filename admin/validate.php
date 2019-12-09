<?php 
session_start();

// connect to database
$db = mysqli_connect("208.91.198.197:3306","neerusanju","neerusanju@226021","neerukxg_neerusanju");

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 







// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);


	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}


	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			/* $query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!"; */
			header('location: register.php');
		}else{
			 $checkemail = "SELECT email FROM users WHERE email='$email'"; 
			 $resultemail = mysqli_query($db,$checkemail); 
			 $emailresult = mysqli_num_rows ($resultemail );
			 if($emailresult > 0){
				 //array_push($errors, "The email you are entered is allready exist");
			 }
			 $checusername = "SELECT username FROM users WHERE username ='$username'"; 
             $resultusername = mysqli_query($db,$checusername);
			 $usernameresult = mysqli_num_rows ($resultusername );
			 if($usernameresult > 0){
				 //array_push($errors, "The username you are entered is allready exist");
			 }
			 if($emailresult == 0 && $usernameresult == 0){
			 $query = "INSERT INTO users (username, email, user_type, password,status) 
					  VALUES('$username', '$email', 'user', '$password',0)";
			 mysqli_query($db, $query);
			 array_push($errors, "New user successfully created!!");
			 }else{
				 array_push($errors, "The username or email you are entered is allready exist");
			 }
			
		

			// get id of the created user
			/*$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  ='<center><div style="color: #fff; margin-top: 85px;" class="alert alert-success">
  <strong>Success!</strong> Successfully Registered<a href="login.php">Login Here</a>.
</div></center>';
  echo $_SESSION['success'];*/
							
		}
	}
}




// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}


// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}


// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) { // user found
		
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			
	
	
			if ($logged_in_user['user_type'] == 'superadmin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['username'] = $username;
				if($_POST["remember"]==1)
                    {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('username', $username, $hour);
                         setcookie('password', $_POST['password'], $hour);
                         setcookie('usertype', 'superadmin', $hour);
                    }
				//$_SESSION['success']  = "You are now logged in";
				//header('location: admin/home.php');		  
			}else if ($logged_in_user['user_type'] == 'admin') {

			
		
 
 
 
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['username'] = $username;
				//$_SESSION['success']  = "You are now logged in";
				if($_POST["remember"]==1)
                    {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('username', $username, $hour);
                         setcookie('password', $_POST['password'], $hour);
                         setcookie('usertype', 'admin', $hour);
                    }
				header('location: admin/home.php');		  
			}else if ($logged_in_user['user_type'] == 'user') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['email'] = $logged_in_user['email'];
				$_SESSION['username'] = $username;
				//$_SESSION['success']  = "You are now logged in";
					if($_POST["remember"]==1)
                    {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('username', $username, $hour);
                         setcookie('password', $_POST['password'], $hour);
                         setcookie('usertype', 'user', $hour);
                    }
				header('location: order_online.php');		  
			}
			else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['username'] = $username;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		
		}else {
			
			array_push($errors, "Wrong username/password combination");
		}
	}
}


function issuperAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function isUser()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user' ) {
		return true;
	}else{
		return false;
	}
}





