<?php

	include 'includes/init.php';
	
	if(empty($_SESSION['admin_first_name']) == TRUE ) {
		header("Location: login.php");
	}
	
	$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	$result = mysqli_query($con,"SELECT email FROM members");
		
	// Display members and information
	while($row = mysqli_fetch_row($result))
	{	
		$to = $row[0];
	    $subject = "Please Verify Your Information is Up to Date for New Semester";
	    $message = "Please log in to your Kappa Alpha Theta account and verify your information now.";
	    $header = "From:Kappa Alpha Theta\r\n";
	    $retval = mail ($to,$subject,$message,$header);
	    
	    $connectionUpdate= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
		$result2 = mysqli_query($connectionUpdate,"UPDATE members SET verified=0");
	}

	header("Location: http://greekamer.com/mizzou/admin-dashboard.php?verifyEmails=1");
?>
	
