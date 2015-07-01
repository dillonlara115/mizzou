<?php
include 'init.php';
include 'update-email-functions.php';

$email = $_SESSION['email'];

//Credentials for connection to Database
$usernameDB = 	"thetaDB";
$passwordDB = 	"Venta#1001";

if(isset($_POST['submit'])) {
	$newEmail = $_POST['newEmail'];
	
	//Check to make sure email filled out.
	if(empty($newEmail) == FALSE) {
		//Update email in tables with current and new email.
		update_email($newEmail, $email, $usernameDB, $passwordDB);
	}
	else {
		array_push($errors, "Email must be filled in.");
	}
}

?>

<form action="update-email.php" method="POST">
	<!-- fieldsets -->
	<fieldset>
	<h2>Update Your Email Address</h2>
	<label for="newEmail">Enter New Email Address: </label>
	<input type="text" name="newEmail" /><br>
	<br>
	
	<input type="submit" name="submit" value="Submit" /><br>
	<a href="member-dashboard.php">Back to profile.</a><br>
	<br>
	<?php
		//Output errors from login form, if any exist.
		output_errors($errors);
	?>
	</fieldset>
	<br>
</form>