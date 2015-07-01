<?php
function update_email($newEmail, $email, $usernameDB, $passwordDB) {
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Prepare statement for userInfo insertion
	if (!($stmt = $dbh->prepare('UPDATE members SET email=:newEmail WHERE email LIKE :oldEmail'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	//$stmt->bindParam(":code", $email_code);
	$stmt->bindParam(":newEmail", $newEmail);
	$stmt->bindParam(":oldEmail", $email);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Prepare statement for userInfo insertion
	if (!($stmt = $dbh->prepare('UPDATE members_contact SET email=:newEmail WHERE email LIKE :oldEmail'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	//$stmt->bindParam(":code", $email_code);
	$stmt->bindParam(":newEmail", $newEmail);
	$stmt->bindParam(":oldEmail", $email);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Prepare statement for userInfo insertion
	if (!($stmt = $dbh->prepare('UPDATE members_additional SET email=:newEmail WHERE email LIKE :oldEmail'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	//$stmt->bindParam(":code", $email_code);
	$stmt->bindParam(":newEmail", $newEmail);
	$stmt->bindParam(":oldEmail", $email);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	session_destroy();
	header('Location: login.php?emailChanged=1');
	exit;

}

?>