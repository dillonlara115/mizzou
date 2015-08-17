<?php
function check_admin_email_fields($email) {

	//Create local array to store errors.
	$errorsReturned = array();
	
		if(empty($email) == TRUE) {
			array_push($errorsReturned, 'Email must be entered to add new user.');
		}
		
		//Check to make sure username is not already in use.		
		$con=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
			
		//Set up username variable for query
		$emailCheck = "'" . $email . "'";
		
		//Grab userID from userInfo table
		$result = mysqli_query($con,"SELECT COUNT(id) FROM members WHERE email LIKE $emailCheck");
					
		$queryResultEmailCheck = mysqli_fetch_row($result);
		    
		if($queryResultEmailCheck[0] == 1) {
			array_push($errorsReturned, "Profile already exists. Check entered email for activation."); 
		}
	//Return errors if any exist.
	return($errorsReturned);
}

function  check_add_user_fields($first_name, $last_name, $password, $password_conf, $birthday, $member_address, $member_city, $member_state, $member_zip, $member_cell_phone, $parent_first_name, $parent_last_name, $parent_address, $parent_city, $parent_state, $parent_zip, $parent_cell_phone, $other_first_name, $other_last_name, $other_cell_phone, $relation, $allergies, $medicine_allergies, $current_medications, $health_issues) {

	//Create local array to store errors.
	$errorsReturned = array();
	$multipleErrors = array();
	
	//Restructure birthday display.
	$birthdaySplit = explode("-", $birthday);
	
	$year 	=  $birthdaySplit[0];
	$month 	= $birthdaySplit[1];
	$day 	= $birthdaySplit[2];
	
	$birthday = $month . "-" . $day . "-" . $year;
	
		if(empty($first_name) == TRUE) {
			array_push($errorsReturned, 'First name must be entered.');
		}
		
		if(empty($last_name) == TRUE) {
			array_push($errorsReturned, 'Last name must be entered.');
		}
		
		if(empty($password) == TRUE) {
			array_push($errorsReturned, 'Password must be entered.');
		}
		
		if(empty($password_conf) == TRUE) {
			array_push($errorsReturned, 'Password confirmation must be entered.');
		}
		
		if($password !== $password_conf) {
			array_push($errorsReturned, 'Passwords do not match.');
		}
		
		if(empty($birthday) == TRUE) {
			//array_push($errorsReturned, 'Birthday must be entered.');
		}
		
		if(empty($member_address) == TRUE) {
			//array_push($errorsReturned, 'Your address must be entered.');
		}
		
		if(empty($member_city) == TRUE) {
			//array_push($errorsReturned, 'Your city must be entered.');
		}
		
		if(empty($member_state) == TRUE) {
			//array_push($errorsReturned, 'Your state must be entered.');
		}
		
		if(empty($member_zip) == TRUE) {
			//array_push($errorsReturned, 'Your zip code must be entered');
		}
		
		if(empty($member_cell_phone) == TRUE) {
			//array_push($errorsReturned, 'Your cell phone must be entered.');
		}
		
		if(empty($parent_first_name) == TRUE) {
			//array_push($errorsReturned, 'Parent first name must be entered.');
		}
		
		if(empty($parent_last_name) == TRUE) {
			//array_push($errorsReturned, 'Parent last name must be entered.');
		}
		
		if(empty($parent_address) == TRUE) {
			//array_push($errorsReturned, 'Parent address must be entered.');
		}
		
		if(empty($parent_city) == TRUE) {
			//array_push($errorsReturned, 'Parent city must be entered.');
		}
		
		if(empty($parent_state) == TRUE) {
			//array_push($errorsReturned, 'Parent state must be entered.');
		}
		
		if(empty($parent_zip) == TRUE) {
			//array_push($errorsReturned, 'Parent zip code must be entered.');
		}
		
		if(empty($parent_cell_phone) == TRUE) {
			//array_push($errorsReturned, 'Parent cell phone must be entered.');
		}
		
		if(empty($other_first_name) == TRUE) {
			//array_push($errorsReturned, 'Other first name must be entered.');
		}
		
		if(empty($other_last_name) == TRUE) {
			//array_push($errorsReturned, 'Other last name must be entered.');
		}
		
		if(empty($other_cell_phone) == TRUE) {
			//array_push($errorsReturned, 'Other cell phone must be entered.');
		}
		
		if(empty($relation) == TRUE) {
			//array_push($errorsReturned, 'Other relationship must be entered.');
		}
		
		if(empty($allergies) == TRUE) {
			//array_push($errorsReturned, 'Allergies must be entered.');
		}
		
		if(empty($medicine_allergies) == TRUE) {
			//array_push($errorsReturned, 'Medical allergies must be entered.');
		}
		
		if(empty($current_medications) == TRUE) {
			//array_push($errorsReturned, 'Current medications must be entered. (list none if none exist)');
		}
		
		if(empty($health_issues) == TRUE) {
			//array_push($errorsReturned, 'Health issues must be entered. (list none if none exist)');
		}
		
	//If more than 5 errors are generated, return prompt to try again.
	$errorCount = count($errorsReturned);

	if($errorCount > 5) {
		array_push($multipleErrors, 'Several fields left empty. Please try again.');
		
		return($multipleErrors);
	}
	
	//Else return individual errors.	
	else {
		return($errorsReturned);
	}
}

function send_email_to_user($email, $usernameDB, $passwordDB) {

	//Email code for GET variable
	$email_activation = sha1(rand());
	$activeStatus = 0;
	
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Add member to system.
	if (!($stmt = $dbh->prepare('INSERT INTO members(email, email_activation, active) VALUES(:email, :email_activation, :active)'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table.
	$stmt->bindParam(":email", $email);
	$stmt->bindParam(":email_activation", $email_activation);
	$stmt->bindParam(":active", $activeStatus);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	//Activation link
	$email_url = "http://greekamer.com/mizzou/activate.php?emailCode=" . $email_activation;
	
	// $to = $email;
	$to = $email;
    $subject = "Please Claim Your GreekAmer Account";
   	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: GreekAmer <admin@greekamer.com>' . "\r\n";
$message = <<<EOF





<!-- Inliner Build Version 4380b7741bb759d6cb997545f3add21ad48f010b -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
  </head>
  <body style="width: 100% !important; min-width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0; padding: 0;"><style type="text/css">
a:hover {
color: #2795b6 !important;
}
a:active {
color: #2795b6 !important;
}
a:visited {
color: #2ba6cb !important;
}
h1 a:active {
color: #2ba6cb !important;
}
h2 a:active {
color: #2ba6cb !important;
}
h3 a:active {
color: #2ba6cb !important;
}
h4 a:active {
color: #2ba6cb !important;
}
h5 a:active {
color: #2ba6cb !important;
}
h6 a:active {
color: #2ba6cb !important;
}
h1 a:visited {
color: #2ba6cb !important;
}
h2 a:visited {
color: #2ba6cb !important;
}
h3 a:visited {
color: #2ba6cb !important;
}
h4 a:visited {
color: #2ba6cb !important;
}
h5 a:visited {
color: #2ba6cb !important;
}
h6 a:visited {
color: #2ba6cb !important;
}
table.button:hover td {
background: #2795b6 !important;
}
table.button:visited td {
background: #2795b6 !important;
}
table.button:active td {
background: #2795b6 !important;
}
table.button:hover td a {
color: #fff !important;
}
table.button:visited td a {
color: #fff !important;
}
table.button:active td a {
color: #fff !important;
}
table.button:hover td {
background: #2795b6 !important;
}
table.tiny-button:hover td {
background: #2795b6 !important;
}
table.small-button:hover td {
background: #2795b6 !important;
}
table.medium-button:hover td {
background: #2795b6 !important;
}
table.large-button:hover td {
background: #2795b6 !important;
}
table.button:hover td a {
color: #ffffff !important;
}
table.button:active td a {
color: #ffffff !important;
}
table.button td a:visited {
color: #ffffff !important;
}
table.tiny-button:hover td a {
color: #ffffff !important;
}
table.tiny-button:active td a {
color: #ffffff !important;
}
table.tiny-button td a:visited {
color: #ffffff !important;
}
table.small-button:hover td a {
color: #ffffff !important;
}
table.small-button:active td a {
color: #ffffff !important;
}
table.small-button td a:visited {
color: #ffffff !important;
}
table.medium-button:hover td a {
color: #ffffff !important;
}
table.medium-button:active td a {
color: #ffffff !important;
}
table.medium-button td a:visited {
color: #ffffff !important;
}
table.large-button:hover td a {
color: #ffffff !important;
}
table.large-button:active td a {
color: #ffffff !important;
}
table.large-button td a:visited {
color: #ffffff !important;
}
table.secondary:hover td {
background: #d0d0d0 !important; color: #555;
}
table.secondary:hover td a {
color: #555 !important;
}
table.secondary td a:visited {
color: #555 !important;
}
table.secondary:active td a {
color: #555 !important;
}
table.success:hover td {
background: #457a1a !important;
}
table.alert:hover td {
background: #970b0e !important;
}
table.facebook:hover td {
background: #2d4473 !important;
}
table.twitter:hover td {
background: #0087bb !important;
}
table.google-plus:hover td {
background: #CC0000 !important;
}
@media only screen and (max-width: 600px) {
  table[class="body"] img {
    width: auto !important; height: auto !important;
  }
  table[class="body"] center {
    min-width: 0 !important;
  }
  table[class="body"] .container {
    width: 95% !important;
  }
  table[class="body"] .row {
    width: 100% !important; display: block !important;
  }
  table[class="body"] .wrapper {
    display: block !important; padding-right: 0 !important;
  }
  table[class="body"] .columns {
    table-layout: fixed !important; float: none !important; width: 100% !important; padding-right: 0px !important; padding-left: 0px !important; display: block !important;
  }
  table[class="body"] .column {
    table-layout: fixed !important; float: none !important; width: 100% !important; padding-right: 0px !important; padding-left: 0px !important; display: block !important;
  }
  table[class="body"] .wrapper.first .columns {
    display: table !important;
  }
  table[class="body"] .wrapper.first .column {
    display: table !important;
  }
  table[class="body"] table.columns td {
    width: 100% !important;
  }
  table[class="body"] table.column td {
    width: 100% !important;
  }
  table[class="body"] .columns td.one {
    width: 8.333333% !important;
  }
  table[class="body"] .column td.one {
    width: 8.333333% !important;
  }
  table[class="body"] .columns td.two {
    width: 16.666666% !important;
  }
  table[class="body"] .column td.two {
    width: 16.666666% !important;
  }
  table[class="body"] .columns td.three {
    width: 25% !important;
  }
  table[class="body"] .column td.three {
    width: 25% !important;
  }
  table[class="body"] .columns td.four {
    width: 33.333333% !important;
  }
  table[class="body"] .column td.four {
    width: 33.333333% !important;
  }
  table[class="body"] .columns td.five {
    width: 41.666666% !important;
  }
  table[class="body"] .column td.five {
    width: 41.666666% !important;
  }
  table[class="body"] .columns td.six {
    width: 50% !important;
  }
  table[class="body"] .column td.six {
    width: 50% !important;
  }
  table[class="body"] .columns td.seven {
    width: 58.333333% !important;
  }
  table[class="body"] .column td.seven {
    width: 58.333333% !important;
  }
  table[class="body"] .columns td.eight {
    width: 66.666666% !important;
  }
  table[class="body"] .column td.eight {
    width: 66.666666% !important;
  }
  table[class="body"] .columns td.nine {
    width: 75% !important;
  }
  table[class="body"] .column td.nine {
    width: 75% !important;
  }
  table[class="body"] .columns td.ten {
    width: 83.333333% !important;
  }
  table[class="body"] .column td.ten {
    width: 83.333333% !important;
  }
  table[class="body"] .columns td.eleven {
    width: 91.666666% !important;
  }
  table[class="body"] .column td.eleven {
    width: 91.666666% !important;
  }
  table[class="body"] .columns td.twelve {
    width: 100% !important;
  }
  table[class="body"] .column td.twelve {
    width: 100% !important;
  }
  table[class="body"] td.offset-by-one {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-two {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-three {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-four {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-five {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-six {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-seven {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-eight {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-nine {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-ten {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-eleven {
    padding-left: 0 !important;
  }
  table[class="body"] table.columns td.expander {
    width: 1px !important;
  }
  table[class="body"] .right-text-pad {
    padding-left: 10px !important;
  }
  table[class="body"] .text-pad-right {
    padding-left: 10px !important;
  }
  table[class="body"] .left-text-pad {
    padding-right: 10px !important;
  }
  table[class="body"] .text-pad-left {
    padding-right: 10px !important;
  }
  table[class="body"] .hide-for-small {
    display: none !important;
  }
  table[class="body"] .show-for-desktop {
    display: none !important;
  }
  table[class="body"] .show-for-small {
    display: inherit !important;
  }
  table[class="body"] .hide-for-desktop {
    display: inherit !important;
  }
  table[class="body"] .right-text-pad {
    padding-left: 10px !important;
  }
  table[class="body"] .left-text-pad {
    padding-right: 10px !important;
  }
}
</style>
  <table class="body" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; height: 100%; width: 100%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="center" align="center" valign="top" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: center; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;">
        <center style="width: 100%; min-width: 580px;">

          <table class="row header" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; background: #000; padding: 0px;" bgcolor="#000"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="center" align="center" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: center; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" valign="top">
                <center style="width: 100%; min-width: 580px;">

                  <table class="container" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: inherit; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="six sub-columns" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; min-width: 0px; width: 50%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px 0px;" align="left" valign="top">
                              <img src="http://greekamer.com/mizzou/images/kappa-alpha-theta-logo.png" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100px; float: left; clear: both; display: block;" align="left" /></td>
                            <td class="six sub-columns last" style="text-align: right; vertical-align: middle; word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; min-width: 0px; width: 50%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 0px 10px;" align="right" valign="middle">
                              <span class="template-label" style="color: #ffffff; font-weight: bold; font-size: 11px;">Greek Amer | Mizzou</span>
                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
                    </tr></table></center>
              </td>
            </tr></table><table class="container" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: inherit; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top">

                <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                      <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 0px 10px;" align="left" valign="top">
                            <h1 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 40px; margin: 0; padding: 0;" align="left">Hello,</h1>
                            <p class="lead" style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 21px; font-size: 18px; margin: 0 0 10px; padding: 0;" align="left">You have been added to the University of Missouri-Columbia - Kappa Alpha Theta Sorority management system. Please visit <a href="$email_url" style="color: #2ba6cb; text-decoration: none;">this link</a> to activate your account</p>
                          </td>
                          <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                        </tr></table></td>
                  </tr></table><!-- container end below --></td>
            </tr></table></center>
      </td>
    </tr></table></body>
</html>





EOF;

    $retval = mail ($to,$subject,$message,$headers);
   
    if( $retval == true ) {
    	return(1);
    }
    else {
    	return(0);
    } 
    
    exit();
}

function update_general_user_info($usernameDB, $passwordDB, $emailCode, $first_name, $last_name, $password, $season, $yearGraduate, $pledgeClass) {

	//Salt password.
	$salt = sha1(rand());
	
	//Add sha1 hash to partially "salted" password
	$pass_after_salt = sha1($salt . $password);
	
	$active = 1;
	$email_activated = '';
	
	//Connect to the database
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Prepare statement for userInfo insertion
	if (!($stmt = $dbh->prepare('UPDATE members SET first_name=:first_name, last_name=:last_name, graduation_season=:season, graduation_year=:year, pass_hash=:pass_hash, salt=:salt, active=:active, email_activation=:email_activation, pledge_class=:pledge_class WHERE email_activation LIKE :email_activation_code'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	$stmt->bindParam(":first_name", $first_name);
	$stmt->bindParam(":last_name", $last_name);
	$stmt->bindParam(":season", $season);
	$stmt->bindParam("year", $yearGraduate);
	$stmt->bindParam(":pass_hash", $pass_after_salt);
	$stmt->bindParam(":salt", $salt);
	$stmt->bindParam(":active", $active);
	$stmt->bindParam(":email_activation", $email_activated);
	$stmt->bindParam(":email_activation_code", $emailCode);
	$stmt->bindParam(":pledge_class", $pledgeClass);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
}

function insert_contact_user_info($usernameDB, $passwordDB, $email, $birthday, $member_address, $member_apartment, $member_city, $member_state, $member_zip, $member_home_phone, $member_cell_phone, $car_make, $car_model, $car_license, $parent_first_name, $parent_last_name, $parent_address, $parent_apartment, $parent_city, $parent_state, $parent_zip, $parent_cell_phone, $parent_home_phone, $other_first_name, $other_last_name, $other_address, $other_apartment, $other_city, $other_state, $other_zip, $other_cell_phone, $relation, $hasCar) {
	
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Add member to system.
	if (!($stmt = $dbh->prepare('INSERT INTO members_contact(email, date_of_birth, school_address, apt, city, state, zip_code, home_phone, cell_phone, car_make, car_model, car_license, par_first, par_last, par_address, par_apt, par_city, par_state, par_zip_code, par_cell_phone, par_home_phone, other_first, other_last, other_address, other_apt, other_city, other_state, other_zip, phone_no, relation, has_car) VALUES(:email, :birthday, :school_address, :apt, :city, :state, :zip_code, :home_phone, :cell_phone, :car_make, :car_model, :car_license, :par_first, :par_last, :par_address, :par_apt, :par_city, :par_state, :par_zip_code, :par_cell_phone, :par_home_phone, :other_first, :other_last, :other_address, :other_apt, :other_city, :other_state, :other_zip, :phone_no, :relation, :has_car)'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	$stmt->bindParam(":email", $email);
	$stmt->bindParam(":birthday", $birthday);
	$stmt->bindParam(":school_address", $member_address);
	$stmt->bindParam(":apt", $member_apartment);
	$stmt->bindParam(":city", $member_city);
	$stmt->bindParam(":state", $member_state);
	$stmt->bindParam(":zip_code", $member_zip);
	$stmt->bindParam(":home_phone", $member_home_phone);
	$stmt->bindParam(":cell_phone", $member_cell_phone);
	$stmt->bindParam(":car_make", $car_make);
	$stmt->bindParam(":car_model", $car_model);
	$stmt->bindParam(":car_license", $car_license);
	$stmt->bindParam(":par_first", $parent_first_name);
	$stmt->bindParam(":par_last", $parent_last_name);
	$stmt->bindParam(":par_address", $parent_address);
	$stmt->bindParam(":par_apt", $parent_apartment);
	$stmt->bindParam(":par_city", $parent_city);
	$stmt->bindParam(":par_state", $parent_state);
	$stmt->bindParam(":par_zip_code", $parent_zip);
	$stmt->bindParam(":par_cell_phone", $parent_cell_phone);
	$stmt->bindParam(":par_home_phone", $parent_home_phone);
	$stmt->bindParam(":other_first", $other_first_name);
	$stmt->bindParam(":other_last", $other_last_name);
	$stmt->bindParam(":other_address", $other_address);
	$stmt->bindParam(":other_apt", $other_apartment);
	$stmt->bindParam(":other_city", $other_city);
	$stmt->bindParam(":other_state", $other_state);
	$stmt->bindParam(":other_zip", $other_zip);
	$stmt->bindParam(":phone_no", $other_cell_phone);
	$stmt->bindParam(":relation", $relation);
	$stmt->bindParam(":has_car", $hasCar);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;	

}

function insert_additional_user_info($usernameDB, $passwordDB, $email, $allergies, $medicine_allergies, $current_medications, $health_issues, $health_provider, $health_subscriber, $health_employer, $health_policy_no, $health_phone_no, $auto_provider, $auto_subscriber, $auto_policy_no, $auto_phone_no, $auto_employer) {
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Add member to system.
	if (!($stmt = $dbh->prepare('INSERT INTO members_additional(email, allergies, allergic_medications, current_medications, health_issues, health_provider_name, health_subscriber_name, health_employer, health_policy_no, health_phone_no, auto_provider_name, auto_subscriber_name, auto_policy_no, auto_phone_no, auto_employer) VALUES(:email, :allergies, :allergic_medications, :current_medications, :health_issues, :health_provider_name, :health_subscriber_name, :health_employer, :health_policy_no, :health_phone_no, :auto_provider_name, :auto_subscriber_name, :auto_policy_no, :auto_phone_no, :auto_employer)'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	$stmt->bindParam(":email", $email);
	$stmt->bindParam(":allergies", $allergies);
	$stmt->bindParam(":allergic_medications", $medicine_allergies);
	$stmt->bindParam(":current_medications", $current_medications);
	$stmt->bindParam(":health_issues", $health_issues);
	$stmt->bindParam(":health_provider_name", $health_provider);
	$stmt->bindParam(":health_subscriber_name", $health_subscriber);
	$stmt->bindParam(":health_employer", $health_employer);
	$stmt->bindParam(":health_policy_no", $health_policy_no);
	$stmt->bindParam(":health_phone_no", $health_phone_no);
	$stmt->bindParam(":auto_provider_name", $auto_provider);
	$stmt->bindParam(":auto_subscriber_name", $auto_subscriber);
	$stmt->bindParam(":auto_policy_no", $auto_policy_no);
	$stmt->bindParam(":auto_phone_no", $auto_phone_no);
	$stmt->bindParam(":auto_employer", $auto_employer);

	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;	

}
?>
