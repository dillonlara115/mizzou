<?php
function check_fields($username, $password) {
	//Create local array to store errors.
	$errorsReturned = array();
	
		if(empty($username) == TRUE) {
			array_push($errorsReturned, 'First name must be entered.');
		}
		
		if(empty($password) == TRUE) {
			array_push($errorsReturned, 'Password must be entered.');
		}
	
	//Return errors if any exist.
	return($errorsReturned);
}

function get_admin_salt($user) {
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");

	// prepare username for DB query
	$username = "'" . $user . "'";

	//query DB salt of user
	$result = mysqli_query($connection,"SELECT salt FROM `admin` WHERE email LIKE $username");
		
	// see if row exists			
	$userSalt = mysqli_fetch_row($result);
	    
	// if row exists, return salt
	if(empty($userSalt[0]) == FALSE) {
		return($userSalt[0]);
	}
	else {
		return(1);
	}	
}

function get_member_salt($user) {
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");

	// prepare username for DB query
	$username = "'" . $user . "'";

	//query DB salt of user
	$result = mysqli_query($connection,"SELECT salt FROM `members` WHERE email LIKE $username");
		
	// see if row exists			
	$userSalt = mysqli_fetch_row($result);
	    
	// if row exists, return salt
	if(empty($userSalt[0]) == FALSE) {
		return($userSalt[0]);
	}
	else {
		return(1);
	}	
}

function check_user($salt, $username, $pass) {

	// Concatenate salt to pass
	$saltedPassword = "'" . sha1($salt . $pass) . "'";
	
	// Prepare username for DB query
	$user = "'" . $username . "'";
	
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	$result = mysqli_query($connection,"SELECT id FROM admin WHERE email LIKE $user AND pass_hash LIKE $saltedPassword");
	
	$userID = mysqli_fetch_row($result);
	
	if(empty($userID[0]) == FALSE) {
		//Return profile's ID.
		return($userID[0]);
	}
		
	else{ // otherwise, add error to errors array, redirect user to login to display error
		return(0);
	}	
}

function check_member_user($salt, $username, $pass) {

	// Concatenate salt to pass
	$saltedPassword = "'" . sha1($salt . $pass) . "'";
	
	// Prepare username for DB query
	$user = "'" . $username . "'";
	
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	$result = mysqli_query($connection,"SELECT id FROM members WHERE email LIKE $user AND pass_hash LIKE $saltedPassword");
	
	$userID = mysqli_fetch_row($result);
	
	if(empty($userID[0]) == FALSE) {
		//Return profile's ID.
		return($userID[0]);
	}
		
	else{ // otherwise, add error to errors array, redirect user to login to display error
		return(0);
	}	
}

function check_active_status($logInReturn) {
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	$result = mysqli_query($connection,"SELECT active FROM admin WHERE id = $logInReturn");
	
	$userID = mysqli_fetch_row($result);
	
	return($userID[0]);
}

function check_active_status_member($logInReturn) {
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	$result = mysqli_query($connection,"SELECT active FROM members WHERE id = $logInReturn");
	
	$userID = mysqli_fetch_row($result);
	
	return($userID[0]);
}

function check_member_active_status($logInReturn) {
	//Make connection to database. (use $connection to connect on pages)
	$connection = mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
	$result = mysqli_query($connection,"SELECT active FROM members WHERE id = $logInReturn");
	
	$userID = mysqli_fetch_row($result);
	
	return($userID[0]);
}

function get_user_info($userID) {
	// connect to DB
	$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	// if 1 returned from DB query, set session variable logged in to TRUE, redirect
	$result = mysqli_query($con,"SELECT first_name, last_name, id FROM admin WHERE id = $userID");

	$userInfo = mysqli_fetch_row($result);
	
	$_SESSION['admin_first_name'] = $userInfo[0];
	$_SESSION['admin_last_name'] = $userInfo[1];
	$_SESSION['id'] = $userInfo[2];
}

function get_member_user_info($userID) {
	// connect to DB
	$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	// if 1 returned from DB query, set session variable logged in to TRUE, redirect
	$result = mysqli_query($con,"SELECT first_name, last_name, id FROM members WHERE id = $userID");

	$userInfo = mysqli_fetch_row($result);
	
	$_SESSION['member_first_name'] = $userInfo[0];
	$_SESSION['member_last_name'] = $userInfo[1];
	$_SESSION['id'] = $userInfo[2];
}

function check_email_field($email) {
	//Create local array to store errors.
	$errorsReturned = array();
	
		if(empty($email) == TRUE) {
			array_push($errorsReturned, 'Email address must be entered.');
		}
	
	//Return errors if any exist.
	return($errorsReturned);
}

function check_email_exists($email) {
	// connect to DB
	$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	// if 1 returned from DB query, set session variable logged in to TRUE, redirect
	$result = mysqli_query($con,"SELECT email FROM members WHERE email LIKE '$email'");

	$userInfo = mysqli_fetch_row($result);
	
	$emailReturned = $userInfo[0];
	
	if(empty($emailReturned) == TRUE) {
		return(1);
	}
	else {
		return($emailReturned);
	}
}

function send_email($emailReturned, $usernameDB, $passwordDB) {
	$email_code = sha1(rand());
	
	//Activation Link.
	$email_url = "http://greekamer.com/mizzou/password-reset.php?emailCode=" . $email_code;
	
	//Insert into DB.
	//Connect to the database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);
				
	//Prepare statement for userInfo insertion
	if (!($stmt = $dbh->prepare('UPDATE members SET pass_request_code=:code WHERE email LIKE :email_returned'))) {
		echo "Prepare failed: (" . $mysql->errno . ") " . $mysql->error;
	}
		
	//Bind all parameters for insertion to userInfo table
	$stmt->bindParam(":code", $email_code);
	$stmt->bindParam(":email_returned", $emailReturned);
	
	//Execute userInfo insertion
	$stmt->execute();
				
	$dbh = null;
	
	$to = $emailReturned;
    $subject = "Password Reset of GreekAmer Account";
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
                            <h1 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 40px; margin: 0; padding: 0;" align="left">Hello</h1>
                            <p class="lead" style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 21px; font-size: 18px; margin: 0 0 10px; padding: 0;" align="left">You have requested a password reset. Please visit <a href="$email_url" style="color: #2ba6cb; text-decoration: none;">this link</a> to reset your password.</p>
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
}
?>