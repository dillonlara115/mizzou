<?php
function check_pass_fields($password, $pass_conf) {
	//Create local array to store errors.
	$errorsReturned = array();
	
		if(empty($password) == TRUE) {
			array_push($errorsReturned, 'Password must be entered.');
		}
		
		if(empty($pass_conf) == TRUE) {
			array_push($errorsReturned, 'Password confirmation must be entered.');
		}
	
	//Return errors if any exist.
	return($errorsReturned);
}

function update_password($emailCode, $password, $usernameDB, $passwordDB) {

	//Set salt and password hash
	$salt = sha1(rand());
	
	//Add sha1 hash to partially "salted" password
	$pass_after_salt = sha1($salt . $password);
	
	//Insert into DB.
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
	
	if(empty($emailCode) == FALSE) {
				
	//Prepare statement for userInfo insertion
	if (!($stmt = $dbh->prepare('UPDATE members SET pass_request_code="", salt=:salt, pass_hash=:pass_hash WHERE pass_request_code LIKE :emailCode'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	//$stmt->bindParam(":code", $email_code);
	$stmt->bindParam(":emailCode", $emailCode);
	$stmt->bindParam(":salt", $salt);
	$stmt->bindParam(":pass_hash", $pass_after_salt);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	}

}

?>