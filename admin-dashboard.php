<?php
include 'init.php';
include 'add-user-functions.php';
include 'user-update-functions.php';
include 'user-information.php';

if(empty($_SESSION['admin_first_name']) == TRUE ) {
	header("Location: login.php");
}

$id = $_SESSION['id'];

$last_name = $_SESSION['admin_last_name'];

	//Get email for use in DB connections.
$email = get_email_from_admin_id($id);
$_SESSION['email'] = $email;

	//Get profile picture path.
$profile_picture = get_admin_profile_picture_path($email);

	//Update information when update button is clicked.
if(isset($_POST['updateInfo'])) {

		//Variables to send to general account update.
	$first_name_update  = 	$_POST['first_name'];
	$last_name_update 	= 	$_POST['last_name'];	
	$birthday 			= 	$_POST['bday'];
	$member_address 	= 	$_POST['member_address'];
	$member_apartment 	= 	$_POST['member_apt'];
	$member_city 		= 	$_POST['member_city'];
	$member_state 		= 	$_POST['member_state'];
	$member_zip 		= 	$_POST['member_zip'];
	$member_home_phone 	= 	$_POST['member_home_phone'];
	$member_cell_phone 	= 	$_POST['member_cell_phone'];

		//Update General Account Information
	update_admin_general_info($usernameDB, $passwordDB, $email, $first_name_update, $last_name_update, $birthday, $member_address, $member_apartment, $member_city, $member_state, $member_zip, $member_home_phone, $member_cell_phone);
	
		//Variables to send to parent update.
	$parent_first_name 	= 	$_POST['par_first_name'];
	$parent_last_name 	= 	$_POST['par_last_name'];
	$parent_address 	= 	$_POST['par_address'];
	$parent_apt			= 	$_POST['par_apt'];
	$parent_city 		=	$_POST['par_city'];
	$parent_state		=	$_POST['par_state'];
	$parent_zip			=	$_POST['par_zip'];
	$parent_cell		=	$_POST['par_cell_phone'];
	$parent_home		=	$_POST['par_home_phone'];
	
		//Update Parent Contact Information
	update_parent_info($usernameDB, $passwordDB, $email, $parent_first_name, $parent_last_name, $parent_address, $parent_apt, $parent_city, $parent_state, $parent_zip, $parent_cell, $parent_home);

		//Variables to send to other/car update.
	$other_first_name 	=	$_POST['other_first_name'];
	$other_last_name	=	$_POST['other_last_name'];
	$other_address		=	$_POST['other_address'];
	$other_apt			=	$_POST['other_apt'];
	$other_city			=	$_POST['other_city'];
	$other_state		=	$_POST['other_state'];
	$other_zip			=	$_POST['other_zip'];
	$other_home			=	$_POST['other_home_phone'];
	$other_cell			=	$_POST['other_cell_phone'];
	$relation 			=	$_POST['relation'];

	$car_make			=	$_POST['car_make'];
	$car_model			=	$_POST['car_model'];
	$car_license		=	$_POST['license'];

		//Update Other Contact Information and Car.
	
	update_other_info($usernameDB, $passwordDB, $email, $other_first_name, $other_last_name, $other_address, $other_apt, $other_city, $other_state, $other_zip, $other_home, $other_cell, $car_make, $car_model, $car_license, $relation);

		//Variables to update insurance and allergy information.
	$allergies			=	$_POST['allergies'];
	$medicine_allergies	=	$_POST['medicine_allergies'];
	$current_medication	=	$_POST['current_medications'];
	$health_issues		=	$_POST['health_issues'];

	$health_prov		=	$_POST['health_prov'];
	$health_subsc		=	$_POST['health_subsc'];
	$health_employer	=	$_POST['health_subsc_employer'];
	$health_policy		=	$_POST['health_policy_no'];	
	$health_phone		=	$_POST['health_phone_no'];

	$auto_prov			=	$_POST['auto_prov'];
	$auto_subsc			=	$_POST['auto_subsc'];
	$auto_employer		=	$_POST['auto_subsc_employer'];
	$auto_policy		=	$_POST['auto_policy_no'];
	$auto_phone			=	$_POST['auto_phone_no'];

		//Update Allergies and Insurance.
	update_insurance_info($usernameDB, $passwordDB, $email, $allergies, $medicine_allergies, $current_medication, $health_issues, $health_prov, $health_subsc, $health_employer, $health_policy, $health_phone, $auto_prov, $auto_subsc, $auto_employer, $auto_policy, $auto_phone);

	header("Location: admin-dashboard.php?successEdit=1");
}

	//Array to hold information
$name = array();

	//Get users name
$name = get_admin_user_name($usernameDB, $passwordDB, $email);

$first_name = 	$name[1];
$last_name 	= 	$name[2];

	//Array to hold information
$information = array();

	//Get users current information
$information = get_user_info($usernameDB, $passwordDB, $email);

	//General Information.
$birthday 		= $information[1];
$member_address = $information[2];
$member_apt		= $information[3];
$member_city	= $information[4];
$member_state	= $information[5];
$member_zip		= $information[6];
$member_home 	= $information[7];
$member_cell 	= $information[8];
	//Car Information.
$car_make		= $information[9];
$car_model		= $information[10];
$car_license	= $information[11];
	//Contact Information.
$parent_first 	= $information[12];
$parent_last 	= $information[13];
$parent_address = $information[14];
$parent_apt 	= $information[15];
$parent_city 	= $information[16];
$parent_state 	= $information[17];
$parent_zip 	= $information[18];
$parent_cell 	= $information[19];
$parent_home 	= $information[20];
$other_first 	= $information[21];
$other_last 	= $information[22];
$other_address  = $information[23];
$other_apt 		= $information[24];
$other_city		= $information[25];
$other_state 	= $information[26];
$other_zip		= $information[27];
$other_cell		= $information[28];
$other_relation	= $information[29];
$has_car		= $information[30];

	//Array to hold information
$additional_information = array();

	//Get users current information
$additional_information = get_additional_user_info($usernameDB, $passwordDB, $email);

$allergies 				= $additional_information[1];
$allergic_medication	= $additional_information[2];
$current_medication 	= $additional_information[3];
$health_issues 			= $additional_information[4];
	//Health Insurance
$health_prov 			= $additional_information[5];
$health_subsc			= $additional_information[6];
$health_employer 		= $additional_information[7];
$health_policy			= $additional_information[8];
$health_phone 			= $additional_information[9];
	//Auto Insurance
$auto_prov				= $additional_information[10];
$auto_subsc				= $additional_information[11];
$auto_policy			= $additional_information[12];
$auto_phone				= $additional_information[13];
$auto_employer			= $additional_information[14];

	//Add new users.
if(isset($_POST['submitNewUser'])) {
	$email = 	$_POST['email'];

		//Make sure email is input.
	$errorsFields = check_admin_email_fields($email);

		//If error is generated, add them to the errors array.
	$errors = $errorsFields;

	if(empty($errors) == TRUE) {
		send_email_to_user($email, $usernameDB, $passwordDB);
		header("Location: admin-dashboard.php?successAdd=1");
	}
}
?>
<?php $pageTitle = 'Admin Dashboard'; include("includes/header.php"); ?>
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

				<div id="general-profile" style="min-height: initial; margin-left: 150px;">
					<?php if(empty($profile_picture) == FALSE) {?>
					<div class="image-container">
						<img src="http://greekamer.com/mizzou/uploads/<?php echo $profile_picture; ?>">
					</div>
					<br>
					<?php } ?>
					<div id="name-display">
						<h4><?php echo $first_name; ?>, <?php echo $last_name; ?></h4>
						<p class="member-status">Administrator</p>
						<a href="logout.php">Sign out</a><br>
						<a href="admin-profile-picture.php">Add/Change Profile Picture</a>
					</div>


				</div>

				<br>	

				<h4 style="font-size: 14px; width: 400px; margin: 0 auto;">
					<?php 
					if($_GET['addedMultiple'] == 1) {
						echo "Members have been added and emails have been sent!";
					}
					?>
				</h4>

				<div style="max-width: 960px; margin: 0 auto;">
					<form class='admin-form' action="admin-dashboard.php" method="POST">

						<!--Display Account Information To User -->
						<div class="account-information">
							<br>
							
							<div id="account-title" class="member-info">
								<h4>Account Information</h4>
								
							</div>
							<h4 style="font-size: 14px; color: gray; padding-left: 0px; margin-top: 0px;">* denotes a required field.</h4>
							<p>*First Name: <?php echo $first_name; ?></p>
							<p>*Last Name: <?php echo $last_name; ?></p>
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Edit Account Information</button>
							
						</div>
						<br>

						<!--Display General Information To User -->
						<div class="account-information">
							<div id="member-general" class="member-info">
								<h4>General Information</h4>
							</div>
							<p>*Date of Birth: <?php echo $birthday; ?></p>
							<p>*School Address: <?php echo $member_address; ?></p>
							<p>*Apartment Number: <?php echo $member_apt; ?></p>
							<p>*City: <?php echo $member_city; ?></p>
							<p>*State: <?php echo $member_state; ?></p>
							<p>*Zip Code: <?php echo $member_zip; ?></p>
							<p>Home Phone Number: <?php echo $member_home; ?></p>
							<p>*Cell Phone Number: <?php echo $member_cell; ?></p>
							<button type="button" id="account-general-edit">Edit General Information</button>
							<button type="button" id="cancel-general-edit">Cancel</button>

							<!--Edit Box -->
							<fieldset id="general-info">
								<legend>Update Current General Information</legend>
								Date of Birth: <br><input type="text" name="bday" placeholder="<?php echo $birthday; ?>"><br>
								<span>School Address:</span><br><input type="text" name="member_address" placeholder="<?php echo $member_address; ?>"/><br>
								<span>Apt:</span><br><input type="text" name="member_apt" placeholder="<?php echo $member_apt; ?>"/><br>
								<span>City:</span><br><input type="text" name="member_city" placeholder="<?php echo $member_city; ?>"/><br>
								<span>State:</span><br><input type="text" name="member_state" placeholder="<?php echo $member_state; ?>"/><br>
								<span>Zip Code:</span><br><input type="text" name="member_zip" placeholder="<?php echo $member_zip; ?>"/><br>
								<span>Home Phone Number:</span><br><input type="tel" name="member_home_phone" placeholder="<?php echo $member_home; ?>"><br>
								<span>Cell Phone Number:</span><br><input type="tel" name="member_cell_phone" placeholder="<?php echo $member_cell; ?>"><br>
								<input type="submit" name="updateInfo" value="Update Information" /><br>
							</fieldset>
						</div>
						<br>

						<div class="account-information">
							<!--Display Parent Information To User -->
							<div id="parent" class="member-info">
								<h4>Parent/Guardian Information</h4>
							</div>
							<p>*First Name: <?php echo $parent_first; ?></p>
							<p>*Last Name: <?php echo $parent_last; ?></p>
							<p>*Address: <?php echo $parent_address; ?></p>
							<p>Apartment Number: <?php echo $parent_apt; ?></p>
							<p>*City: <?php echo $parent_city; ?></p>
							<p>*State: <?php echo $parent_state; ?></p>
							<p>*Zip Code: <?php echo $parent_zip; ?></p>
							<p>Home Phone Number: <?php echo $parent_home; ?></p>
							<p>*Cell Phone Number: <?php echo $parent_cell; ?></p>
							<button type="button" id="account-parent-edit">Edit Parent/Guardian Information</button>
							<button type="button" id="cancel-parent-edit">Cancel</button>

							<!--Edit Box -->
							<fieldset id="parent-info">
								<legend>Update Current Parent/Guardian Contact Information</legend>
								<label for="par_first_name">First Name: </label><br>
								<input type="text" name="par_first_name" placeholder="<?php echo $parent_first; ?>"/><br>
								<label for="par_last_name">Last Name: </label><br>
								<input type="text" name="par_last_name" placeholder="<?php echo $parent_last; ?>"/><br>
								<span>Address:</span><br><input type="text" name="par_address" placeholder="<?php echo $parent_address; ?>"/><br>
								<span>Apt:</span><br><input type="text" name="par_apt" placeholder="<?php echo $parent_apt; ?>"/><br>
								<span>City:</span><br><input type="text" name="par_city" placeholder="<?php echo $parent_city; ?>"/><br>
								<span>State:</span><br><input type="text" name="par_state" placeholder="<?php echo $parent_state;?>"/><br>
								<span>Zip Code:</span><br><input type="text" name="par_zip" placeholder="<?php echo $parent_zip; ?>"/><br>
								<span>Home Phone Number:</span><br><input type="tel" name="par_home_phone" placeholder="<?php echo $parent_home; ?>"><br>
								<span>Cell Phone Number:</span><br><input type="tel" name="par_cell_phone" placeholder="<?php echo $parent_cell; ?>"><br>	
								<input type="submit" name="updateInfo" value="Update Information" /><br>
							</fieldset>
						</div>
						<br>

						<!--Display Other Contact Information To User -->
						<div class="account-information">
							<div id="other" class="member-info">
								<h4>Other Contact Information</h4>
							</div>
							<p>*First Name: <?php echo $other_first; ?></p>
							<p>*Last Name: <?php echo $other_last; ?></p>
							<p>Address: <?php echo $other_address; ?></p>
							<p>Apartment Number: <?php echo $other_apt; ?></p>
							<p>City: <?php echo $other_city; ?></p>
							<p>State: <?php echo $other_state; ?></p>
							<p>Zip Code: <?php echo $other_zip; ?></p>
							<p>*Relationship: <?php echo $other_relation; ?></p>
							<p>*Cell Phone Number: <?php echo $other_cell; ?></p>
							<button type="button" id="account-other-edit">Edit Additional Contact Information</button>
							<button type="button" id="cancel-other-edit">Cancel</button>

							<fieldset id="other-info">
								<legend>Other Emergency Contact Information</legend>
								<label for="other_first_name">First Name: </label><br>
								<input type="text" name="other_first_name" /placeholder="<?php echo $other_first; ?>"><br>
								<label for="other_last_name">Last Name: </label><br>
								<input type="text" name="other_last_name" placeholder="<?php echo $other_last; ?>"/><br>
								<span>Address:</span><br><input type="text" name="other_address" placeholder="<?php echo $other_address; ?>"/><br>
								<span>Apt:</span><br><input type="text" name="other_apt" placeholder="<?php echo $other_apt; ?>"/><br>
								<span>City:</span><br><input type="text" name="other_city" placeholder="<?php echo $other_city; ?>"/><br>
								<span>State:</span><br><input type="text" name="other_state" placeholder="<?php echo $other_state; ?>"/><br>
								<span>Zip Code:</span><br><input type="text" name="other_zip" placeholder="<?php echo $other_zip; ?>"/><br>
								<span>Cell Phone Number:</span><br><input type="tel" name="other_cell_phone" placeholder="<?php echo $other_cell; ?>"><br>
								<span>Relation:</span><br><input type="text" name="relation" placeholder="<?php echo $other_relation; ?>"><br>
								<input type="submit" name="updateInfo" value="Update Information" /><br>
							</fieldset>
						</div>
						<br>

						<!--Display Car Information To User -->
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
								<button type="button" id="account-car-edit">Edit Vehicle Information</button>
								<button type="button" id="cancel-car-edit">Cancel</button>

								<fieldset id="car-info">
									<legend>Update Vehicle Information</legend>
									<label for="make">Make: </label><br>
									<input type="text" name="car_make" placeholder="<?php echo $car_make; ?>"/><br>
									<label for="model">Model: </label><br>
									<input type="text" name="car_model" placeholder="<?php echo $car_model; ?>"/><br>
									<label for="model">License Plate Number: </label><br>
									<input type="text" name="license" placeholder="<?php echo $car_license; ?>"/><br>
									<input type="submit" name="updateInfo" value="Update Information" /><br>
								</fieldset>
							</div>
							<br>

							<!--Display Allergy Information To User -->
							<div class="account-information">
								<div id="allergy" class="member-info">
									<h4>Allergy Information</h4>
								</div>
								<p>*Allergies: <?php echo $allergies; ?></p>
								<p>*Allergic to Medicines: <?php echo $allergic_medication; ?></p>
								<p>*Current Medications: <?php echo $current_medication; ?></p>
								<p>*Health Issues: <?php echo $health_issues; ?></p>
								<button type="button" id="account-allergy-edit">Edit Allergy Information</button>
								<button type="button" id="cancel-allergy-edit">Cancel</button>

								<fieldset id="allergy-info">
									<legend>Update Current Allergies</legend>
									<label for="allergies" style="display: block;">List any allergies:</label><br>
									<textarea rows="4" cols="50" name="allergies" placeholder="<?php echo $allergies; ?>"></textarea>

									<label for="allergies_med" style="display: block;">Are you allergic to any medications?</label><br>
									<textarea rows="4" cols="50" name="medicine_allergies" placeholder="<?php echo $allergic_medication; ?>"></textarea>

									<label for="current_med" style="display: block;">List any medications you are taking:</label><br>
									<textarea rows="4" cols="50" name="current_medications" placeholder="<?php echo $current_medication; ?>"></textarea>

									<label for="allergies" style="display: block;">Do you have any health issues? If so, please indicate:</label><br>
									<textarea rows="4" cols="50" name="health_issues" placeholder="<?php echo $health_issues; ?>"></textarea><br>
									<input type="submit" name="updateInfo" value="Update Information" /><br>
								</fieldset>
							</div>
							<br>

							<!--Display Health Insurance Information To User -->
							<div class="account-information">
								<div id="health-insurance" class="member-info">
									<h4>Health Insurance Information</h4>
								</div>
								<p>Name of Insurance Provider: <?php echo $health_prov; ?></p>
								<p>Subscriber Name: <?php echo $health_subsc; ?></p>
								<p>Subscriber Employer: <?php echo $health_employer; ?></p>
								<p>Policy Number: <?php echo $health_policy; ?></p>
								<p>Phone Number: <?php echo $health_phone; ?></p>
								<button type="button" id="account-health-edit">Edit Health Insurance Information</button>
								<button type="button" id="cancel-health-edit">Cancel</button>

								<fieldset id="health-info">
									<legend>Update Health Insurance Information</legend>
									<label for="health_provider">Name of Insurance Provider: </label><br>
									<input type="text" name="health_prov" placeholder="<?php echo $health_prov; ?>"/><br>
									<label for="other_last_name">Subscriber Name: </label><br>
									<input type="text" name="health_subsc" placeholder="<?php echo $health_subsc; ?>"/><br>
									<span>Subscriber Employer:</span><br><input type="text" name="health_subsc_employer" placeholder="<?php echo $health_employer; ?>"/><br>
									<span>Policy Number:</span><br><input type="text" name="health_policy_no" placeholder="<?php echo $health_policy; ?>"/><br>
									<span>Phone Number:</span><br><input type="text" name="health_phone_no" placeholder="<?php echo $health_phone; ?>"/><br>
									<input type="submit" name="updateInfo" value="Update Information" /><br>
								</fieldset>
							</div>
							<br>

							<!--Display Auto Insurance Information To User -->
							<div class="account-information">
								<div id="auto-insurance" class="member-info">
									<h4>Auto Insurance Information</h4>
								</div>
								<fieldset>
									<legend>Do you have a vehicle?</legend>
									<input type="radio" name="vehicle" value="Yes" class="yes-selected" />Yes<br />
									<input type="radio" name="vehicle" value="No" />No<br />
								</fieldset>
								<p>Name of Insurance Provider: <?php echo $auto_prov; ?></p>
								<p>Subscriber Name: <?php echo $auto_subsc; ?></p>
								<p>Subscriber Employer: <?php echo $auto_employer; ?></p>
								<p>Policy Number: <?php echo $auto_policy; ?></p>
								<p>Phone Number: <?php echo $auto_phone; ?></p>
								<button type="button" id="account-auto-edit">Edit Auto Insurance Information</button>
								<button type="button" id="cancel-auto-edit">Cancel</button>

								<fieldset id="auto-info">
									<legend>Auto Insurance</legend>
									<label for="auto_provider">Name of Insurance Provider: </label><br>
									<input type="text" name="auto_prov" placeholder="<?php echo $auto_prov; ?>"/><br>
									<label for="other_last_name">Subscriber Name: </label><br>
									<input type="text" name="auto_subsc" placeholder="<?php echo $auto_subsc; ?>"/><br>
									<span>Subscriber Employer:</span><br><input type="text" name="auto_subsc_employer" placeholder="<?php echo $auto_employer; ?>"/><br>
									<span>Policy Number:</span><br><input type="text" name="auto_policy_no" placeholder="<?php echo $auto_policy; ?>"/><br>
									<span>Phone Number:</span><br><input type="text" name="auto_phone_no" placeholder="<?php echo $auto_phone; ?>"/><br>
									<input type="submit" name="updateInfo" value="Update Information" /><br>
								</fieldset>
							</div>
							<br><br>
							<div class="account-information">

								<input type="submit" name="updateInfo" value="Update All Information" /><br>
							</div>
						</form>
					</div><!-- /main -->
				</div><!-- /st-content-inner -->
			</div><!-- /st-content -->
		</div><!-- /st-pusher -->
	</div><!-- /st-container -->
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Current Account Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="admin-dashboard.php" method="POST">
		<fieldset >
			<legend>Update Current Account Information</legend>
			<label for="email">First Name: </label><br>
			<input type="text" name="first_name" placeholder="<?php echo $first_name; ?>" /><br>
			
			<label for="email">Last Name: </label><br>
			<input type="text" name="last_name" placeholder="<?php echo $last_name; ?>"/><br>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</fieldset>
		</form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	 $(function() {
	 		$('.modal-body input[type=submit]').on('click', function(){
	 				$(this).submit();
	 		});
	 });
</script>
<?php include("includes/footer.php"); ?>

