<?php
include 'init.php';

//Email to maintain user uploading image in DB.
$email = $_SESSION['email'];

// include ImageManipulator class
require_once('ImageManipulator.php');
 
if ($_FILES['fileToUpload']['error'] > 0) {
    echo "Error: " . $_FILES['fileToUpload']['error'] . "<br />";
} else {
    // array of valid extensions
    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension = strrchr($_FILES['fileToUpload']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension, $validExtensions)) {
        $newNamePrefix = time() . '_';
        $manipulator = new ImageManipulator($_FILES['fileToUpload']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX  -100; // 200 / 2
        $y1 = $centreY -65; // 130 / 2
 
        $x2 = $centreX + 100; // 200 / 2
        $y2 = $centreY + 65; // 130 / 2
 
        // center cropping to 200x130
        //$newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('uploads/' . $newNamePrefix . $_FILES['fileToUpload']['name']);
        echo 'Your Profile Picture Has Been Updated!';
    } else {
        echo 'You must upload an image...';
    }
    
    $imagePath = $newNamePrefix . $_FILES['fileToUpload']['name'];
    
    //Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Prepare statement for userInfo insertion
	if (!($stmt = $dbh->prepare('UPDATE admin SET profile_picture=:path WHERE email LIKE :email'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	//$stmt->bindParam(":code", $email_code);
	$stmt->bindParam(":path", $imagePath);
	$stmt->bindParam(":email", $email);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	header('Location: admin-dashboard.php');
}