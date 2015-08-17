<?php
	include 'init.php';
	include 'login-functions.php';
	
	//Credentials for connection to Database
	$usernameDB = 	"thetaDB";
	$passwordDB = 	"Venta#1001";
	
	if(isset($_POST['submit'])) {
		$email = $_POST['email'];
		
		//check email exists.
		$errorsReturned = check_email_field($email);
		$errors = $errorsReturned; //append errors.
		
		if(empty($errors) == TRUE) {
			//Check for existing email in DB.
			$emailReturned = check_email_exists($email);
			
			if($emailReturned !== 1) {
				send_email($emailReturned, $usernameDB, $passwordDB);
				$success = "Please follow the instructions in the email that has just been sent to your account to set a new password.";
			}
			else {
				array_push($errors, "Email does not exist, please try again.");
			}
		}
	}
?>
<?php $pageTitle = 'Password Request'; include("includes/header.php"); ?>
<div class="menu-header">
	<a href="login.php"><div id="sorority-logo"></div></a>
</div>

<form action="password-request.php" method="POST">
	<!--Password Reset Box -->
	<div class="account-information">
		<div id="account-title" class="member-info">
			<h4>Enter Email to Reset Password</h4>	
		</div>
		
		<label for="email">Email: </label>
		<input type="text" name="email" /><br>
		
		<br>
		
		<input type="submit" name="submit" value="Submit" /><br>
		
		<?php
			//Output errors from login form, if any exist.
			output_errors($errors);
			if(empty($success) == FALSE) {
				echo $success;
			}
		?>
	</div>
</form>

<?php include("includes/footer.php"); ?>