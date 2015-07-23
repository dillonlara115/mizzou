<?php
include 'init.php';

if(empty($_SESSION['admin_first_name']) == TRUE ) {
	header("Location: login.php");
	exit();
}

$memberID = $_GET[id];

	//Use member ID to retrieve email for display from multiple tables.
$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");

$result = mysqli_query($con,"SELECT email FROM members WHERE id = $memberID");

$row = mysqli_fetch_row($result);

	//Member email returned from query.
$memberEmail = $row[0];

	//Gets pledge class, first name, last name, email, graduation year, 
$result_general = mysqli_query($con,"SELECT * FROM members WHERE id = $memberID");

$row = mysqli_fetch_row($result_general);

$first_name = $row[1];
$last_name = $row[2];
$email = $row[3];
$season = $row[4];
$yearGraduate = $row[5];
$pledgeClass = $row[13];
$profile_picture = $row[6];

	//Gets contact information for parent, other, and car information.
$result = mysqli_query($con,"SELECT * FROM members_contact WHERE email LIKE '$email'");

$row = mysqli_fetch_row($result);

	//Member information.
$birthday 		= $row[1];
$member_address = $row[2];
$member_apt 	= $row[3];
$member_city	= $row[4];
$member_state 	= $row[5];
$member_zip 	= $row[6];
$member_home 	= $row[7];
$member_cell 	= $row[8];

	//Parent information.
$parent_first 	= $row[12];
$parent_last 	= $row[13];
$parent_address = $row[14];
$parent_apt		= $row[15];
$parent_city 	= $row[16];
$parent_state 	= $row[17];
$parent_zip 	= $row[18];
$parent_cell	= $row[19];
$parent_home 	= $row[20];

	//Other information.
$other_first 	= $row[21];
$other_last 	= $row[22];
$other_address	= $row[23];
$other_apt		= $row[24];
$other_city		= $row[25];
$other_state	= $row[26];
$other_zip		= $row[27];
$other_cell 	= $row[28];
$relation		= $row[29];

	//Car information.
$has_car		= $row[30];
$car_make		= $row[9];
$car_model		= $row[10];
$car_license	= $row[11];

	//Gets allergies, health, and auto insurance information.
$result = mysqli_query($con,"SELECT * FROM members_additional WHERE email LIKE '$email'");

$row = mysqli_fetch_row($result);

	//Health issues.
$allergies 			 = $row[1];
$allergic_medication = $row[2];
$current_medication  = $row[3];
$health_issues		 = $row[4];

	//Health insurance.
$health_prov = $row[5];
$health_subsc = $row[6];
$health_employer = $row[7];
$health_policy = $row[8];
$health_phone = $row[9];

	//Auto insurance.
$auto_prov	 	= $row[10];
$auto_subsc 	= $row[11];
$auto_policy 	= $row[12];
$auto_phone 	= $row[13];
$auto_employer 	= $row[14];
?>
<?php $pageTitle = 'Profile Overview'; include("includes/header.php"); ?>


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

					<!--Display Account Information To User -->
					<div id="general-profile">
						<?php if(empty($profile_picture) == FALSE) {?>
						<div class="image-container">
							<a href="member-dashboard.php"><img src="http://greekamer.com/mizzou/uploads/<?php echo $profile_picture; ?>"></a>
						</div>
						<br>
						<?php } ?>
						<div id="name-display" style="margin-left: 200px;">
							<h4><?php echo $first_name . ' ' . $last_name; ?></h4>
							<p class="member-status">Active Member</p>
							<br>
						</div>
					</div>

					<div class="account-information" style="margin-top: 80px;">
						<div id="account-title" class="member-info">
							<h4>Account Information</h4>
						</div>
						<p>First Name: <?php echo $first_name; ?></p>
						<p>Last Name: <?php echo $last_name; ?></p>
						<p>Email: <?php echo $email; ?> </p>
						<p>Time of Graduation: <?php echo $season; ?></p>
						<p>Year of Graduation: <?php echo $yearGraduate; ?></p>
						<p>Pledge Class: <?php echo $pledgeClass; ?></p>
					</div>

					<!--Display General Information To User -->
					<div class="account-information">
						<div id="member-general" class="member-info">
							<h4>General Information</h4>
						</div>
						<p>Date of Birth: <?php echo $birthday; ?></p>
						<p>School Address: <?php echo $member_address; ?></p>
						<p>Apartment Number: <?php echo $member_apt; ?></p>
						<p>City: <?php echo $member_city; ?></p>
						<p>State: <?php echo $member_state; ?></p>
						<p>Zip Code: <?php echo $member_zip; ?></p>
						<p style="<?php if(empty($member_home) == TRUE) { echo'color: red;'; } ?>">Home Phone Number: <?php echo $member_home; ?></p>
						<p>Cell Phone Number: <?php echo $member_cell; ?></p>
					</div>

					<div class="account-information">
						<div id="parent" class="member-info">
							<h4>Parent/Guardian Information</h4>
						</div>
						<p>First Name: <?php echo $parent_first; ?></p>
						<p>Last Name: <?php echo $parent_last; ?></p>
						<p>Address: <?php echo $parent_address; ?></p>
						<p>Apartment Number: <?php echo $parent_apt; ?></p>
						<p>City: <?php echo $parent_city; ?></p>
						<p>State: <?php echo $parent_state; ?></p>
						<p>Zip Code: <?php echo $parent_zip; ?></p>
						<p style="<?php if(empty($parent_home) == TRUE) { echo'color: red;'; } ?>">Home Phone Number: <?php echo $parent_home; ?></p>
						<p>Cell Phone Number: <?php echo $parent_cell; ?></p>
					</div>

					<div class="account-information">
						<div id="other" class="member-info">
							<h4>Other Contact Information</h4>
						</div>
						<p>First Name: <?php echo $other_first; ?></p>
						<p>Last Name: <?php echo $other_last; ?></p>
						<p style="<?php if(empty($other_address) == TRUE) { echo'color: red;'; } ?>">Address: <?php echo $other_address; ?></p>
						<p>Apartment Number: <?php echo $other_apt; ?></p>
						<p style="<?php if(empty($other_city) == TRUE) { echo'color: red;'; } ?>">City: <?php echo $other_city; ?></p>
						<p style="<?php if(empty($other_state) == TRUE) { echo'color: red;'; } ?>">State: <?php echo $other_state; ?></p>
						<p style="<?php if(empty($other_zip) == TRUE) { echo'color: red;'; } ?>">Zip Code: <?php echo $other_zip; ?></p>
						<p style="<?php if(empty($other_cell) == TRUE) { echo'color: red;'; } ?>">Cell Phone Number: <?php echo $other_cell; ?></p>
						<p style="<?php if(empty($relation) == TRUE) { echo'color: red;'; } ?>">Relation: <?php echo $relation; ?></p>
					</div>

					<div class="account-information">
						<div id="transport" class="member-info">
							<h4>Vehicle Information</h4>
						</div>

						<?php if($has_car == 'noCar') {
							echo "<p>You entered no vehicle.</p>";
						} else {
							?>
							<p>Make: <?php echo $car_make; ?></p>
							<p>Model: <?php echo $car_model; ?></p>
							<p>License Plate Number: <?php echo $car_license; ?></p>
						<?php }?>
					</div>

					<!--Display Allergy Information To User -->
					<div class="account-information">
						<div id="allergy" class="member-info">
							<h4>Allergy Information</h4>
						</div>
						<p style="<?php if(empty($allergies) == TRUE) { echo'color: red;'; } ?>">Allergies: <?php echo $allergies; ?></p>
						<p style="<?php if(empty($allergic_medication) == TRUE) { echo'color: red;'; } ?>">Allergic to Medicines: <?php echo $allergic_medication; ?></p>
						<p style="<?php if(empty($current_medication) == TRUE) { echo'color: red;'; } ?>">Current Medications: <?php echo $current_medication; ?></p>
						<p style="<?php if(empty($health_issues) == TRUE) { echo'color: red;'; } ?>">Health Issues: <?php echo $health_issues; ?></p>
					</div>

					<!--Display Health Insurance Information To User -->
					<div class="account-information">
						<div id="health-insurance" class="member-info">
							<h4>Health Insurance Information</h4>
						</div>
						<p style="<?php if(empty($health_prov) == TRUE) { echo'color: red;'; } ?>">Name of Insurance Provider: <?php echo $health_prov; ?></p>
						<p style="<?php if(empty($health_subsc) == TRUE) { echo'color: red;'; } ?>">Subscriber Name: <?php echo $health_subsc; ?></p>
						<p style="<?php if(empty($health_employer) == TRUE) { echo'color: red;'; } ?>">Subscriber Employer: <?php echo $health_employer; ?></p>
						<p style="<?php if(empty($health_policy) == TRUE) { echo'color: red;'; } ?>">Policy Number: <?php echo $health_policy; ?></p>
						<p style="<?php if(empty($health_phone) == TRUE) { echo'color: red;'; } ?>">Phone Number: <?php echo $health_phone; ?></p>
					</div>

					<!--Display Auto Insurance Information To User -->
					<div class="account-information">
						<div id="auto-insurance" class="member-info">
							<h4>Auto Insurance Information</h4>
						</div>
						<p style="<?php if(empty($auto_prov) == TRUE) { echo'color: red;'; } ?>">Name of Insurance Provider: <?php echo $auto_prov; ?></p>
						<p style="<?php if(empty($auto_subsc) == TRUE) { echo'color: red;'; } ?>">Subscriber Name: <?php echo $auto_subsc; ?></p>
						<p style="<?php if(empty($auto_employer) == TRUE) { echo'color: red;'; } ?>">Subscriber Employer: <?php echo $auto_employer; ?></p>
						<p style="<?php if(empty($auto_policy) == TRUE) { echo'color: red;'; } ?>">Policy Number: <?php echo $auto_policy; ?></p>
						<p style="<?php if(empty($auto_phone) == TRUE) { echo'color: red;'; } ?>">Phone Number: <?php echo $auto_phone; ?></p>
					</div>


				</div><!-- /main -->
			</div><!-- /st-content-inner -->
		</div><!-- /st-content -->
	</div><!-- /st-pusher -->
</div><!-- /st-container -->
<?php include("includes/footer.php"); ?>