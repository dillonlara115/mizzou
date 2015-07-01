<?php
	include 'init.php';
	
	$season 		= $_POST['season'];
	$yearGraduate 	= $_POST['yearGraduate'];		
	
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Prepare statement for userInfo insertion
	if (!($stmt = $dbh->prepare('UPDATE members SET archive=0, active=1 WHERE graduation_season LIKE :season AND graduation_year =:year'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	//$stmt->bindParam(":code", $email_code);
	$stmt->bindParam(":season", $season);
	$stmt->bindParam(":year", $yearGraduate);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	header("Location: archive-members-form.php?yearUnarchive=1");
?>