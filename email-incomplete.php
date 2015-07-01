<?php
	include 'init.php';
	
	if(empty($_SESSION['admin_first_name']) == TRUE ) {
		header("Location: login.php");
		exit();
	}
	
	$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	$result = mysqli_query($con,"SELECT DISTINCT members_additional.email FROM members_additional, members_contact, members WHERE health_provider_name LIKE '' OR health_subscriber_name LIKE '' OR health_employer LIKE '' OR health_policy_no LIKE '' OR health_phone_no LIKE '' OR auto_provider_name LIKE '' OR auto_subscriber_name LIKE '' OR auto_policy_no LIKE '' OR auto_phone_no LIKE '' OR auto_employer LIKE ''");
		
	// Display members and information
	while($row = mysqli_fetch_row($result))
	{	
		$to = $row[0];
	    $subject = "Please Finish Creating Kappa Alpha Theta Profile";
	    $message = "You still have missing information on your Kappa Alpha Theta Profile\n\nPlease visit the following link to finish creating your profile\n\nhttp://greekamer.com/mizzou/login.php";
	    $header = "From:Kappa Alpha Theta\r\n";
	    $retval = mail ($to,$subject,$message,$header);
	}

	header("Location: http://greekamer.com/mizzou/admin-dashboard.php?incompleteEmailSent=1");
?>
	
</body>
</html>