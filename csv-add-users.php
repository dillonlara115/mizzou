<?php
include 'init.php';
include 'add-user-functions.php';

$fh = fopen($_FILES['file']['tmp_name'], 'r+');
			 
$lines = array();

while( ($row = fgetcsv($fh, 8192)) !== FALSE ) {
	$lines[] = $row;
}

$result = count($lines[0]);

for ($i = 0; $i < $result; $i++) {
     //Send emails to all emails entered.
	 send_email_to_user($lines[0][$i], $usernameDB, $passwordDB);
}

header("Location: admin-dashboard.php?csv=1");
?>