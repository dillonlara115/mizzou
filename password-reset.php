<?php
	include 'init.php';
	include 'pasword-reset-functions.php';
	
	//Credentials for connection to Database
	$usernameDB = 	"thetaDB";
	$passwordDB = 	"Venta#1001";
	
	$emailCode = $_GET['emailCode'];
	
	if(isset($_POST['submit'])) {
		//Prevent redirect to login if submit button clicked.
		$emailCode = $_POST['emailCode'];
		
		//Local variables
		$password = $_POST['pass'];
		$pass_conf = $_POST['pass_conf'];
		
		//Make sure both fields are entered.
		$errorsReturned = check_pass_fields($password, $pass_conf);
		$errors = $errorsReturned;
		
		//Make sure passwords match.
		if($password == $pass_conf) {
		
		//Update password field
		update_password($emailCode, $password, $usernameDB, $passwordDB);
		
		//Redirect with success message as GET variable.
		header('Location: login.php?changedPass=1');
		}
		else {
			array_push($errors, "Passwords do not match. Please try again.");
		}
	}
	
	if(empty($emailCode) == TRUE) {
		header('Location: login.php');
	}
?>
<?php $pageTitle = 'Password Reset'; include("includes/header.php"); ?>
<div class="menu-header">
	<a href="member-dashboard.php"><div id="sorority-logo"></div></a>
</div>

<form action="password-reset.php" method="POST">
	<div class="account-information">
		<div id="account-title" class="member-info">
			<h4>Enter New Password</h4>	
		</div>
		
		<label for="uname">Password: </label><br>
		<input type="password" name="pass" /><br>
		
		<input type="hidden" name="emailCode" value="<?php echo $_GET['emailCode']; ?>">
		
		<label for="uname">Password Confirmation: </label><br>
		<input type="password" name="pass_conf" /><br>
	
		<br>
		
		<input type="submit" name="submit" value="Submit" /><br>
		<br>
		<?php
			//Output errors from login form, if any exist.
			output_errors($errors);
			?>
		</form>
	</div>
<?php include("includes/footer.php"); ?>