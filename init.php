<?php
//Start session.
ob_start();
session_start();

//Credentials for connection to Database
$usernameDB = 	"thetaDB";
$passwordDB = 	"Venta#1001";
	
//Initialize array for errors.
$errors = array();

//Call function to output errors to user.
function output_errors($errors)
{	
	foreach($errors as $error)
	{
		echo $error;
		echo "<br>";
	}
}
?>