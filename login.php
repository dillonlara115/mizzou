<?php
include 'init.php';
include 'login-functions.php';

if(isset($_POST['submit'])) {
	$username = $_POST['uname'];
	$password_entered = $_POST['pass'];	
	
	//Make sure all fields are input.
	$errorsReturned = check_fields($username, $password_entered);
	$errors = $errorsReturned; //append errors.
	
	//Grab salt from table to validate user
	$saltReturn = get_admin_salt($username);
	
	if($saltReturn !== 1) {
		//Compare username and password against DB.
		$logInReturn = check_user($saltReturn, $username, $password_entered);
		
		if($logInReturn == 0) {
			array_push($errors, "Invalid profile/password combination. Please try again.");
		}
		
		else {
			//Check active status with ID
			$active = check_active_status($logInReturn);
			
			if($active == 0) {
				array_push($errors, "This account must be activated! Check your email for verification.");
			}
			
			else {
				//Get user info and assign session variable to hold first and last name.
				get_user_info($logInReturn);
				header('Location: admin-dashboard.php');
				exit();	
			}
		}
	}
	
	$saltReturn = get_member_salt($username);
	
	if($saltReturn !== 1) {
		//Compare username and password against DB.
		$logInReturn = check_member_user($saltReturn, $username, $password_entered);
		
		if($logInReturn == 0) {
			array_push($errors, "Invalid profile/password combination. Please try again.");
		}
		
		else {
			//Check active status with ID
			$active = check_active_status_member($logInReturn);
			
			if($active == 0) {
				array_push($errors, "This account must be activated! Check your email for verification.");
			}
		
		else {
				//Get user info and assign session variable to hold first and last name.			
				get_member_user_info($logInReturn);
				header('Location: member-dashboard.php');
				exit();	
		}
		
		}
	}
	
}


?>
<html>
	<head>
		<title>Kappa Alpha Theta | University of Missouri Alpha Chapter</title>
		<link rel="stylesheet" type="text/css" href="http://greekamer.com/mizzou/css/style.css">
	</head>
	
	<body>
		<div id="logo">
			
		</div>
		
		<div id="logo-sorority">
			<img src="http://greekamer.com/mizzou/images/kappa-alpha-theta-logo.png">
		</div>
		<div id="university">
			<h3 id="tagline">Kappa Alpha Theta. Alpha MU Chapter. Established 1909.</h3>
		</div>
		
		<div id="login-box">
			<?php 
					if($_GET['changedPass'] == 1) {
						echo "Your password has been changed. You may now log in.";
					}
					
					if($_GET['emailChanged'] == 1) {
						echo "Your email has been updated. Please log in to continue.";
					}
				
			?>
			<form action="login.php" method="post" class="basic-grey"> 
			    <label>
			        <span>Email:</span>
			        <input id="name" type="text" name="uname" placeholder=""/>
			    </label>
			    
			    <label>
			        <span>Password:</span>
			        <input id="email" type="password" name="pass" placeholder="" />
			    </label>
			    
				<label id="login-button">
			       <input class="button" type="submit" name="submit" value="Login" style="width: 120px;"/><br>
			    </label>  
			    
			    <span id="password-reset">
			    <a href="password-request.php" style="width:135px;">Forgot your password?</a><br><br>
			    </span>
			    <?php
				//Output errors from login form, if any exist.
				output_errors($errors);
				?>  
			</form>
		</div>
	</body>
</html>