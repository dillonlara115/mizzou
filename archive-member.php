<?php
	include 'init.php';
	
	$id = $_GET['id'];
	
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Prepare statement for userInfo insertion
	if (!($stmt = $dbh->prepare('UPDATE members SET active=0, archive=1 WHERE id =:id'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to members table.
	$stmt->bindParam(":id", $id);
	
	//Execute unarchive query
	$stmt->execute();
				
	$dbh = null;
	
	header("Location: archive-members-form.php?archive=1");
?>