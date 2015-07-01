<?php
function get_profile_picture_path($email) {
	//Grab information from email in use.		
	$con=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	//Set up username variable for query.
	$emailCheck = "'" . $email . "'";
	
	//Get information from table.
	$result = mysqli_query($con,"SELECT profile_picture FROM members WHERE email LIKE $emailCheck");
				
	$informationQuery = mysqli_fetch_row($result);
	
	return($informationQuery[0]);
}

function get_admin_profile_picture_path($email) {
	//Grab information from email in use.		
	$con=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	//Set up username variable for query.
	$emailCheck = "'" . $email . "'";
	
	//Get information from table.
	$result = mysqli_query($con,"SELECT profile_picture FROM admin WHERE email LIKE $emailCheck");
				
	$informationQuery = mysqli_fetch_row($result);
	
	return($informationQuery[0]);
}

function get_user_name($usernameDB, $passwordDB, $email) {
	//Local array to return information
	$informationQuery = array();

	//Grab information from email in use.		
	$con=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	//Set up username variable for query.
	$emailCheck = "'" . $email . "'";
	
	//Get information from table.
	$result = mysqli_query($con,"SELECT * FROM members WHERE email LIKE $emailCheck");
				
	$informationQuery = mysqli_fetch_row($result);
	
	return($informationQuery);
}

function get_admin_user_name($usernameDB, $passwordDB, $email) {
	//Local array to return information
	$informationQuery = array();

	//Grab information from email in use.		
	$con=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	//Set up username variable for query.
	$emailCheck = "'" . $email . "'";
	
	//Get information from table.
	$result = mysqli_query($con,"SELECT * FROM admin WHERE email LIKE $emailCheck");
				
	$informationQuery = mysqli_fetch_row($result);
	
	return($informationQuery);
}

function get_user_info($usernameDB, $passwordDB, $email) {

	//Local array to return information
	$informationQuery = array();

	//Grab information from email in use.		
	$con=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	//Set up username variable for query.
	$emailCheck = "'" . $email . "'";
	
	//Get information from table.
	$result = mysqli_query($con,"SELECT * FROM members_contact WHERE email LIKE $emailCheck");
				
	$informationQuery = mysqli_fetch_row($result);
	
	return($informationQuery);
	
}

function get_additional_user_info($usernameDB, $passwordDB, $email) {

	//Local array to return information
	$informationQuery = array();

	//Grab information from email in use.		
	$con=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	//Set up username variable for query.
	$emailCheck = "'" . $email . "'";
	
	//Get information from table.
	$result = mysqli_query($con,"SELECT * FROM members_additional WHERE email LIKE $emailCheck");
				
	$informationQuery = mysqli_fetch_row($result);
	
	return($informationQuery);
	
}
?>