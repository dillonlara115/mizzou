<?php
	//Member Id to add user to admin table.
	$memberID = $_POST['super-admin'];
	
	//Get information for table for user.
	$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
				
	$result = mysqli_query($con,"SELECT last_name, first_name, email, pass_hash, salt, profile_picture, id FROM members WHERE id=$memberID");
		
	// Display members and information
	while($row = mysqli_fetch_row($result))
	{
		$lastname =  $row[0];
		$firstname = $row[1];
		$email = $row[2];
		$pass_hash = $row[3];
		$salt = $row[4];
		$profile_picture = $row[5];
		$active = 1;
		$superAdmin = 0;
	}	
	
	//Insert member into admin table.
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB','thetaDB','Venta#1001');
				
	//Add member to system.
	if (!($stmt = $dbh->prepare('INSERT INTO admin(first_name, last_name, email, profile_picture, pass_hash, salt, active, superAdmin) VALUES(:first_name, :last_name, :email, :profile_picture, :pass_hash, :salt, :active, :superAdmin)'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table.
	$stmt->bindParam(":first_name", $firstname);
	$stmt->bindParam(":last_name", $lastname);
	$stmt->bindParam(":email", $email);
	$stmt->bindParam(":profile_picture", $profile_picture);
	$stmt->bindParam(":pass_hash", $pass_hash);
	$stmt->bindParam(":salt", $salt);
	$stmt->bindParam(":active", $active);
	$stmt->bindParam(":superAdmin", $superAdmin);
	
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	header('Location: http://greekamer.com/mizzou/add-members.php?memberPromoted=1');
?>

