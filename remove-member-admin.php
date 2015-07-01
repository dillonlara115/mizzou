<?php
	//Member ID used for deletion from admin table.
	$memberID = $_GET['num'];
	
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB','thetaDB','Venta#1001');
				
	//Add member to system.
	if (!($stmt = $dbh->prepare('DELETE FROM admin WHERE id = :id'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table.
	$stmt->bindParam(":id", $memberID);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	header('Location: http://greekamer.com/mizzou/add-members.php?memberDeleted=1');
?>