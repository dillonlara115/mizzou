<?php
function check_fields($username, $password) {
	//Create local array to store errors.
	$errorsReturned = array();
	
		if(empty($username) == TRUE) {
			array_push($errorsReturned, 'First name must be entered.');
		}
		
		if(empty($password) == TRUE) {
			array_push($errorsReturned, 'Password must be entered.');
		}
	
	//Return errors if any exist.
	return($errorsReturned);
}

function get_admin_salt($user) {
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");

	// prepare username for DB query
	$username = "'" . $user . "'";

	//query DB salt of user
	$result = mysqli_query($connection,"SELECT salt FROM `admin` WHERE email LIKE $username");
		
	// see if row exists			
	$userSalt = mysqli_fetch_row($result);
	    
	// if row exists, return salt
	if(empty($userSalt[0]) == FALSE) {
		return($userSalt[0]);
	}
	else {
		return(1);
	}	
}

function get_member_salt($user) {
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");

	// prepare username for DB query
	$username = "'" . $user . "'";

	//query DB salt of user
	$result = mysqli_query($connection,"SELECT salt FROM `members` WHERE email LIKE $username");
		
	// see if row exists			
	$userSalt = mysqli_fetch_row($result);
	    
	// if row exists, return salt
	if(empty($userSalt[0]) == FALSE) {
		return($userSalt[0]);
	}
	else {
		return(1);
	}	
}

function check_user($salt, $username, $pass) {

	// Concatenate salt to pass
	$saltedPassword = "'" . sha1($salt . $pass) . "'";
	
	// Prepare username for DB query
	$user = "'" . $username . "'";
	
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	$result = mysqli_query($connection,"SELECT id FROM admin WHERE email LIKE $user AND pass_hash LIKE $saltedPassword");
	
	$userID = mysqli_fetch_row($result);
	
	if(empty($userID[0]) == FALSE) {
		//Return profile's ID.
		return($userID[0]);
	}
		
	else{ // otherwise, add error to errors array, redirect user to login to display error
		return(0);
	}	
}

function check_member_user($salt, $username, $pass) {

	// Concatenate salt to pass
	$saltedPassword = "'" . sha1($salt . $pass) . "'";
	
	// Prepare username for DB query
	$user = "'" . $username . "'";
	
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	$result = mysqli_query($connection,"SELECT id FROM members WHERE email LIKE $user AND pass_hash LIKE $saltedPassword");
	
	$userID = mysqli_fetch_row($result);
	
	if(empty($userID[0]) == FALSE) {
		//Return profile's ID.
		return($userID[0]);
	}
		
	else{ // otherwise, add error to errors array, redirect user to login to display error
		return(0);
	}	
}

function check_active_status($logInReturn) {
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	$result = mysqli_query($connection,"SELECT active FROM admin WHERE id = $logInReturn");
	
	$userID = mysqli_fetch_row($result);
	
	return($userID[0]);
}

function check_active_status_member($logInReturn) {
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	$result = mysqli_query($connection,"SELECT active FROM members WHERE id = $logInReturn");
	
	$userID = mysqli_fetch_row($result);
	
	return($userID[0]);
}

function check_member_active_status($logInReturn) {
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	$result = mysqli_query($connection,"SELECT active FROM members WHERE id = $logInReturn");
	
	$userID = mysqli_fetch_row($result);
	
	return($userID[0]);
}

function get_user_info($userID) {
	// connect to DB
	$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	// if 1 returned from DB query, set session variable logged in to TRUE, redirect
	$result = mysqli_query($con,"SELECT first_name, last_name, id FROM admin WHERE id = $userID");

	$userInfo = mysqli_fetch_row($result);
	
	$_SESSION['admin_first_name'] = $userInfo[0];
	$_SESSION['admin_last_name'] = $userInfo[1];
	$_SESSION['id'] = $userInfo[2];
}

function get_member_user_info($userID) {
	// connect to DB
	$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	// if 1 returned from DB query, set session variable logged in to TRUE, redirect
	$result = mysqli_query($con,"SELECT first_name, last_name, id FROM members WHERE id = $userID");

	$userInfo = mysqli_fetch_row($result);
	
	$_SESSION['member_first_name'] = $userInfo[0];
	$_SESSION['member_last_name'] = $userInfo[1];
	$_SESSION['id'] = $userInfo[2];
}

function check_email_field($email) {
	//Create local array to store errors.
	$errorsReturned = array();
	
		if(empty($email) == TRUE) {
			array_push($errorsReturned, 'Email address must be entered.');
		}
	
	//Return errors if any exist.
	return($errorsReturned);
}

function check_email_exists($email) {
	// connect to DB
	$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	// if 1 returned from DB query, set session variable logged in to TRUE, redirect
	$result = mysqli_query($con,"SELECT email FROM members WHERE email LIKE '$email'");

	$userInfo = mysqli_fetch_row($result);
	
	$emailReturned = $userInfo[0];
	
	if(empty($emailReturned) == TRUE) {
		return(1);
	}
	else {
		return($emailReturned);
	}
}

function send_email($emailReturned, $usernameDB, $passwordDB) {
	$email_code = sha1(rand());
	
	//Activation Link.
	$email_url = "http://greekamer.com/mizzou/password-reset.php?emailCode=" . $email_code;
	
	//Insert into DB.
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Prepare statement for userInfo insertion
	if (!($stmt = $dbh->prepare('UPDATE members SET pass_request_code=:code WHERE email LIKE :email_returned'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	$stmt->bindParam(":code", $email_code);
	$stmt->bindParam(":email_returned", $emailReturned);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	$to = $emailReturned;
    $subject = "Password Reset of GreekAmer Account";
    $message = "Hello,\n\nYou have requested a password reset.\n\nPlease visit the following link to reset your password\n\n" . $email_url;
    $header = "From: admin@greekamer.com\r\n";
    $retval = mail ($to,$subject,$message,$header);
   
    if( $retval == true ) {
    	return(1);
    }
    else {
    	return(0);
    } 
}
?>