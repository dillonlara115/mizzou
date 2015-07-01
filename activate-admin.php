<?php
include 'init.php';

//Local variable for query.
$emailCode = $_GET['admin'];

if(isset($_POST['submit'])) {

	$password = $_POST['password'];
	$pass_conf	= $_POST['pass_conf'];
	$emailCode = $_POST['emailCode'];
	$first_name = $_POST['fname'];
	$last_name = $_POST['lname'];

	if(empty($password) == TRUE) {
		array_push($errors, 'Password must be entered.');
	}
	
	if(empty($pass_conf) == TRUE) {
		array_push($errors, 'Confirmation password must be entered.');
	}
	
	if(empty($first_name) == TRUE) {
		array_push($errors, 'First Name must be entered.');
	}
	
	if(empty($last_name) == TRUE) {
		array_push($errors, 'Last Name must be entered.');
	}
	
	
	if(empty($errors) == TRUE) {
		//Set salt and hash password.
		$salt = sha1(rand());
		
		//Add sha1 hash to partially "salted" password
		$pass_after_salt = sha1($salt . $password);
	
		//Connect to the database.
		$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
					
		//Prepare statement for userInfo insertion
		if (!($stmt = $dbh->prepare('UPDATE admin SET first_name=:first, last_name=:last, pass_hash=:password, salt=:salt WHERE email_code LIKE :emailCode'))) {
			echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
		}
			
		//Bind all parameters for insertion to userInfo table
		//$stmt->bindParam(":code", $email_code);
		$stmt->bindParam(":first", $first_name);
		$stmt->bindParam(":last", $last_name);
		$stmt->bindParam(":password", $pass_after_salt);
		$stmt->bindParam(":salt", $salt);
		$stmt->bindParam(":emailCode", $emailCode);
		
		//Execute userInfo insertion
		$stmt->execute();
					
		$dbh = null;
		
		header("Location: login.php?newAdminFinished=1");
	}

}
?>

<h4>Activate Your Account</h4>
	
	<form action="activate-admin.php" method="POST">
	First Name: <input type="text" name="fname" /><br>
	Last Name: <input type="text" name="lname" /><br>
	Set Password: <input type="password" name="password"/><br>
	Confirm Password: <input type="password" name="pass_conf" /><br>
	<input type="hidden" name="emailCode" value="<? echo $emailCode; ?>" />
	<?php
			output_errors($errors);
	?>
	<input type="submit" name="submit" value="Activate"><br>
	
</form>