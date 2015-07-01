<?php
	include 'init.php';
	include 'add-user-functions.php';
	
	//List of emails, comma separated with no spaces.
	$emailString = $_POST['users'];
	
	//Parse the list of emails.
	$emailList = explode("\n", $emailString);
	
	//Number of emails to add.
	$result = count($emailList);
	
	for ($i = 0; $i < $result; $i++) {
	    //Send emails to all emails entered.
	    send_email_to_user($emailList[$i], $usernameDB, $passwordDB);
	}
	
	header("Location: admin-dashboard.php?addedMultiple=1");
?>