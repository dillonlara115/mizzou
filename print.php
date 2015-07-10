<?php
	include 'init.php';
	
	if(empty($_SESSION['admin_first_name']) == TRUE ) {
		header("Location: login.php");
	}
?>
<?php $pageTitle = 'Download & Print Information'; include("includes/header.php"); ?>

<div id="st-container" class="st-container">
			<nav class="st-menu st-effect-4" id="menu-4">
				<ul>
					<li><a class="icon" href="admin-dashboard.php">Your Profile</a></li>
					<li><a class="icon" href="add-members.php">Add Users</a></li>
					<li><a class="icon" href="reports.php">Reports</a></li>
					<li><a class="icon" href="email.php">Email</a></li>
					<li><a class="icon" href="archive-members-form.php">Archive</a></li>
					<li><a class="icon" href="training.php">Training</a></li>
					<li><a class="icon" href="logout.php">Sign Out</a></li>
				</ul>
			</nav>
	
			<!-- content push wrapper -->
			<div class="st-pusher">
				<div class="st-content"><!-- this is the wrapper for the content -->
					<div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
						<div class="main clearfix">	
                        	  	<div class="menu-header">
                                		
                                        <a href="admin-dashboard.php"><div id="sorority-logo"></div></a>
                                
                                        <div id="st-trigger-effects">
                                            <button data-effect="st-effect-4" id="menu-image"></button>
                                        </div>
                                    </div>
                              	</div>

<div class="center-bucket" id="hide-selection">
<h4>Choose the information you want to display</h4>
<p style="font-size: 13px; margin-bottom: 10px; font-style: italic;">In order to properly print partial information, account information must be checked</p>

<form name="printForm" action="print.php" method="POST">
	<div class="checkbox">
		<label>
			<input type="checkbox" name="all" value="checked" style="width: 20px;">Display All Information
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="account" value="checked" style="width: 20px;">Account Information
		</label>
	</div>
	
	<div class="checkbox">
		<label>
			<input type="checkbox" name="general" value="checked" style="width: 20px;">General Information
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input class="information" type="checkbox" name="parent" value="checked" style="width: 20px;">Parent/Guardian Information
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="other" value="checked" style="width: 20px;">Other Contact Information
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input class="information" type="checkbox" name="vehicle" value="checked" style="width: 20px;">Vehicle Information
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input class="information" type="checkbox" name="health" value="checked" style="width: 20px;">Health Insurance Information
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="auto" value="checked" style="width: 20px;">Auto Insurance Information
		</label>
	</div>
	
	<input type="submit" name="submit" value="Display Selected Information">
	<br>
	<br>
	<a class="btn btn-primary" href="javascript:window.print()">Print Information</a>

</form> 
 
</div>

<?php
	if(isset($_POST['submit'])) {
	
	//Local variables for array additions for DB query.
	$account	= $_POST['account'];
	$all 		= $_POST['all'];
	$general 	= $_POST['general'];
	$parent 	= $_POST['parent'];
	$other 		= $_POST['other'];
	$vehicle	= $_POST['vehicle'];
	$allergy 	= $_POST['allergy'];
	$health 	= $_POST['health'];
	$auto 		= $_POST['auto'];
	
	
	//If all is selected, select all options.
	if($all == "checked") {
		$account	= "checked";
		$general 	= "checked";
		$parent 	= "checked";
		$other 		= "checked";
		$vehicle 	= "checked";
		$allergy 	= "checked";
		$health		= "checked";
		$auto 		= "checked";
	}
	
	//Query to use for user's information.
	$sqlQuery = $sqlQuery . "SELECT * FROM members, members_contact, members_additional WHERE members.email LIKE members_contact.email AND members.email LIKE members_additional.email ORDER BY members.last_name";
			
	$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	//Run query defined above.
	$result = mysqli_query($con, $sqlQuery);

	// Display members and information
	while($row = mysqli_fetch_row($result))
	{
	
		if($account == "checked") {
			echo '<div id="member-print">
			<div id="individual-name"><h4>' . $row[1]. ' ' . $row[2];
			echo '</h4></div>
			<div class="account-information">
				<div id="account-title" class="member-info">
				<h4>Account Information</h4>
			</div>
			<p>First Name: ' . $row[1] . '</p>
			<p>Last Name: ' . $row[2] . ' </p>
			<p>Email: ' . $row[3] . '  </p>
			<p>Time of Graduation: ' . $row[4] . ' </p>
			<p>Year of Graduation: ' . $row[5] . '</p>
			<p>Pledge Class: ' . $row[13] . '</p>
	</div>';
		}

		if($general == "checked") {
			echo '<div class="account-information">
			<div id="member-general" class="member-info">
				<h4>General Information</h4>
			</div>
			<p>Date of Birth: ' . $row[16] .  ' </p>
			<p>School Address: ' . $row[17] . ' </p>
			<p>Apartment Number: ' . $row[18] .  ' </p>
			<p>City: ' . $row[19] .  ' </p>
			<p>State: ' . $row[20] .  ' </p>
			<p>Zip Code: ' . $row[21] .  ' </p>
			<p>Home Phone Number: ' . $row[22] .  ' </p>
			<p>Cell Phone Number: ' . $row[23] .  ' </p>
		</div>';
		}
	
		if($parent == "checked") {
			echo '<div class="account-information">
		<div id="parent" class="member-info">
			<h4>Parent/Guardian Information</h4>
		</div>
		<p>First Name: ' . $row[27] . '</p>
		<p>Last Name: ' . $row[28] . '</p>
		<p>Address: ' . $row[29] . '</p>
		<p>Apartment Number: ' . $row[30] . '</p>
		<p>City: ' . $row[31] . '</p>
		<p>State: ' . $row[32] . '</p>
		<p>Zip Code: ' . $row[33] . '</p>
		<p>Home Phone Number: ' . $row[35] . '</p>
		<p>Cell Phone Number: ' . $row[34] . '</p>
	</div>';

		}
		
		if($other == "checked") {
			echo '<div class="account-information">
		<div id="other" class="member-info">
			<h4>Other Contact Information</h4>
		</div>
		<p>First Name: '. $row[36] . '</p>
		<p>Last Name: ' . $row[37] . '</p>
		<p>Address: ' . $row[38] . '</p>
		<p>Apartment Number: ' . $row[39] . '</p>
		<p>City: ' . $row[40] . '</p>
		<p>State: ' . $row[41] . '</p>
		<p>Zip Code: ' . $row[42] . '</p>
		<p>Cell Phone Number: ' . $row[43] . '</p>
		<p>Relation: ' . $row[44] . '</p>
	</div>';

		}
		
		if($vehicle == "checked") {
			echo '<div class="account-information">
				  <div id="transport" class="member-info">
				  <h4>Vehicle Information</h4>
				  </div>'; 
		if($row[45] == 'noCar') {
				echo "<p>Member entered no vehicle.</p>";
		} 
		else {
			echo '<p>Make: ' . $row[24] . '</p>
				  <p>Model: '. $row[25] .'</p>
				  <p>License Plate Number: ' . $row[26] . '</p>';
		} echo '</div>';
		
		}
		
		if($allergy == "checked") {
			echo '<div class="account-information">
		<div id="allergy" class="member-info">
			<h4>Allergy Information</h4>
		</div>
		<p>Allergies: ' . $row[47] . '</p>
		<p>Allergic to Medicines: ' . $row[48] . '</p>
		<p>Current Medications: ' . $row[49] . '</p>
		<p>Health Issues: ' . $row[50] . '</p>
	</div>';
		}
		
		if($health == "checked") {
			echo '<div class="account-information">
		<div id="health-insurance" class="member-info">
			<h4>Health Insurance Information</h4>
		</div>
		<p>Name of Insurance Provider: ' . $row[51] . '</p>
		<p>Subscriber Name: ' . $row[52] . '</p>
		<p>Subscriber Employer: ' . $row[53] . '</p>
		<p>Policy Number: ' . $row[54] . '</p>
		<p id="last-item">Phone Number: ' . $row[55] . '</p>
	</div>';
		}
		
		if($auto == "checked") {
			echo '<div class="account-information">
		<div id="auto-insurance" class="member-info">
			<h4>Auto Insurance Information</h4>
		</div>
		<p>Name of Insurance Provider: ' . $row[56] . '</p>
		<p>Subscriber Name: ' . $row[57] . '</p>
		<p>Subscriber Employer: ' . $row[60] . '</p>
		<p>Policy Number: ' . $row[58] . '</p>
		<p id="last-item">Phone Number: ' . $row[59] . '</p>
	</div>';
		}
		echo "</div>";
		}
}
?>


							</div><!-- /main -->
						</div><!-- /st-content-inner -->
					</div><!-- /st-content -->
				</div><!-- /st-pusher -->
			</div><!-- /st-container -->
<?php include("includes/footer.php"); ?>