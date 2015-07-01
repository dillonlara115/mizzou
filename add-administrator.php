<?php
	include 'init.php';
	
	//Email code for GET variable
	$email_activation = sha1(rand());
	
	//Local variable for newAdmin email.
	$newAdmin = $_POST['newAdmin'];
	
	$activeStatus = 1;
	
	//Connect to the admin database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Add member to system.
	if (!($stmt = $dbh->prepare('INSERT INTO admin(email, active, email_code) VALUES(:email, :active, :code)'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table.
	$stmt->bindParam(":email", $newAdmin);
	$stmt->bindParam(":active", $activeStatus);
	$stmt->bindParam(":code", $email_activation);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	//Connect to the members_contact database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Add member to system.
	if (!($stmt = $dbh->prepare('INSERT INTO members_contact(email) VALUES(:email)'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to members_contact.
	$stmt->bindParam(":email", $newAdmin);

	
	//Execute members_contact insertion.
	$stmt->execute();
				
	$dbh = null;
	
	//Connect to the members_additional database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Add member to system.
	if (!($stmt = $dbh->prepare('INSERT INTO members_additional(email) VALUES(:email)'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to members_additional.
	$stmt->bindParam(":email", $newAdmin);
	
	//Execute members_additional insertion.
	$stmt->execute();
				
	$dbh = null;
	
	//Activation link
	$email_url = "http://greekamer.com/mizzou/activate-admin.php?admin=" . $email_activation;
	
	$to = $newAdmin;
    $subject = "Administrator Profile Created.";
    $message = "You have been added to the University of Missouri-Columbia - Kappa Alpha Theta Sorority management system.\n\nPlease visit the following link to activate your account\n\n" . $email_url;
    $header = "From:Kappa Alpha Theta\r\n";
    $retval = mail ($to,$subject,$message,$header);
   
   header("Location: admin-dashboard.php?adminAdded=1");
	    
   exit();
?>