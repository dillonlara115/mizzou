<?php
	include 'init.php';
	include 'add-user-functions.php';
	
	//Grab get variable and save it for use on submission.
	$emailCode = $_GET['emailCode'];
	
	//Credentials for connection to Database.
	$usernameDB = 	"thetaDB";
	$passwordDB = 	"Venta#1001";
	
	//Add new users.
	if(isset($_POST['submitNewUser'])) {
	
		//Variable to make sure terms checkbox selected.
		$agreed = $_POST['terms'];
		
		//Email code
		$emailCode 	= $_POST['email_code'];
		
		if($agreed !== 'Agree') {
			header("Location: activate.php?agree=1&emailCode=" . $emailCode);
			exit();
		}
	
		//Set up local variables for general input.
		$first_name 		= 	$_POST['first_name'];	
		$last_name 			= 	$_POST['last_name'];	
		$password 			=	$_POST['password'];	
		$password_conf 		= 	$_POST['password_conf'];
		$season 			=	$_POST['season'];
		$yearGraduate		=	$_POST['yearGraduate'];
		$pledgeClass 		=	$_POST['pledgeClass'];
		
		//Set up local variables for contact input.
		$birthday 			= 	$_POST['bday'];
		$member_address		= 	$_POST['member_address'];
		$member_apartment 	= 	$_POST['member_apt'];
		$member_city 		= 	$_POST['member_city'];
		$member_state 		=	$_POST['member_state'];
		$member_zip 		= 	$_POST['member_zip'];
		$member_home_phone 	=	$_POST['member_home_phone'];
		$member_cell_phone 	= 	$_POST['member_cell_phone'];
		$parent_first_name	= 	$_POST['par_first_name'];
		$parent_last_name 	= 	$_POST['par_last_name'];
		$parent_address		= 	$_POST['par_address'];
		$parent_apartment 	= 	$_POST['par_apt'];
		$parent_city 		= 	$_POST['par_city'];
		$parent_state 		= 	$_POST['par_state'];
		$parent_zip			= 	$_POST['par_zip'];
		$parent_cell_phone	=	$_POST['par_cell_phone'];
		$parent_home_phone	=	$_POST['par_home_phone'];
		$other_first_name 	= 	$_POST['other_first_name'];
		$other_last_name 	=	$_POST['other_last_name'];
		$other_address		=	$_POST['other_address'];
		$other_apartment	=	$_POST['other_apt'];
		$other_city			=	$_POST['other_city'];
		$other_state 		=	$_POST['other_state'];
		$other_zip			=	$_POST['other_zip'];
		$other_cell_phone	=	$_POST['other_cell_phone'];
		$other_home_phone	=	$_POST['other_home_phone'];
		
		//Set up local variables for car information.
		$car_make 			=	$_POST['car_make'];
		$car_model 			=	$_POST['car_model'];
		$car_license 		=	$_POST['license'];
		$hasCar				=	$_POST['car'];
		
		if($hasCar !== 'noCar') {
			$hasCar = 'hasCar';
		}
		
		if($hasCar == 'noCar') {
			$car_make 	 = '';
			$car_model	 = '';
			$car_license = '';
		}
		
	 	//Set up local variables for allergy and insurance input.
	 	$allergies 			 = 	$_POST['allergies'];
	 	$medicine_allergies	 =	$_POST['medicine_allergies'];
	 	$current_medications =	$_POST['current_medications'];
	 	$health_issues		 =	$_POST['health_issues'];
	 	$health_provider	 =	$_POST['health_prov'];
	 	$health_subscriber	 =	$_POST['health_subsc'];
	 	$health_employer	 =	$_POST['health_subsc_employer'];
	 	$health_policy_no	 =	$_POST['health_policy_no'];
	 	$health_phone_no	 =	$_POST['health_phone_no'];
	 	$auto_provider		 =	$_POST['auto_prov'];
	 	$auto_subscriber 	 =	$_POST['auto_subsc'];
	 	$auto_employer 		 =	$_POST['auto_subsc_employer'];
	 	$auto_policy_no		 = 	$_POST['auto_policy_no'];
	 	$auto_phone_no 		 = 	$_POST['auto_phone_no'];
	 	$relation 			 =  $_POST['relation'];
	 	
		//Make sure all fields are input. Must be modified for new fields.
		$errorsFields = check_add_user_fields($first_name, $last_name, $password, $password_conf, $birthday, $member_address, $member_city, $member_state, $member_zip, $member_cell_phone, $parent_first_name, $parent_last_name, $parent_address, $parent_city, $parent_state, $parent_zip, $parent_cell_phone, $other_first_name, $other_last_name, $other_cell_phone, $relation, $allergies, $medicine_allergies, $current_medications, $health_issues);
		
		//If errors are generated, add them to the errors array.
		$errors = $errorsFields;
		
		if(empty($errors) == TRUE) {
			
			$con=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
			
			//Set up username variable for query.
			$emailCheck = "'" . $emailCode . "'";
			
			//Grab userID from members table.
			$result = mysqli_query($con,"SELECT id FROM members WHERE email_activation LIKE $emailCheck");
						
			$queryResultEmailCheck = mysqli_fetch_row($result);
			
			$userID = $queryResultEmailCheck[0];
			
			$_SESSION['id'] = $userID;
			
			//Use email code to get email for information insertion.
			$con2=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
			
			//Set up username variable for query.
			$emailCheck = "'" . $emailCode . "'";
			
			//Grab userID from members table.
			$result = mysqli_query($con2,"SELECT email FROM members WHERE email_activation LIKE $emailCheck");
						
			$queryResultEmail = mysqli_fetch_row($result);
			
			$email = $queryResultEmail[0];
			
			//Update General Information.
			update_general_user_info($usernameDB, $passwordDB, $emailCode, $first_name, $last_name, $password, $season, $yearGraduate, $pledgeClass);
			
			//Update Contact information.
			insert_contact_user_info($usernameDB, $passwordDB, $email, $birthday, $member_address, $member_apartment, $member_city, $member_state, $member_zip, $member_home_phone, $member_cell_phone, $car_make, $car_model, $car_license, $parent_first_name, $parent_last_name, $parent_address, $parent_apartment, $parent_city, $parent_state, $parent_zip, $parent_cell_phone, $parent_home_phone, $other_first_name, $other_last_name, $other_address, $other_apartment, $other_city, $other_state, $other_zip, $other_cell_phone, $relation, $hasCar);
			
			//Upate Allergy information.
			insert_additional_user_info($usernameDB, $passwordDB, $email, $allergies, $medicine_allergies, $current_medications, $health_issues, $health_provider, $health_subscriber, $health_employer, $health_policy_no, $health_phone_no, $auto_provider, $auto_subscriber, $auto_policy_no, $auto_phone_no, $auto_employer);
			
			//Set Session Variables and Log in -> Redirect to profile.
			$_SESSION['member_first_name'] = $first_name;
			$_SESSION['member_last_name'] = $last_name;

			
			//Redirect
			header('Location: member-dashboard.php?activated=1');
		}
	}
?>

<?php $pageTitle = 'Activate Your Account'; include("includes/header.php"); ?>

	
		<div class="menu-header">
             <div id="sorority-logo"></div>
        </div>
        
        
		<div style="width: 100%; max-width: 960px; margin: 0 auto; margin-top: 20px;">
			<?php
			output_errors($errors);
			?>
	
			<h4>Activate Your Account:</h4>
			<h4 style="font-style: italic; font-size: 14px;">* Represents a required field</h4>
			<br>
			<p style="font-size: 14px;">Please enter all of the information required below. Fields without an asterisk may be filled in later, but fields with an asterisk must be completed before continuing.</p>
			<?php 
				if($_GET['agree'] == 1) {
					echo "<h4 style='font-style: italic;'>You must agree to the terms of use.</h4>";
				}
			?>
			
			<form action="activate.php" method="POST">
			<div class="account-information">		
					
						<div id="account-title" class="member-info">
						<h4>Account Information</h4>
						</div>
						
						<label for="first_name">*First Name: </label><br>
						<input type="text" name="first_name" /><br>
						
						<label for="last_name">*Last Name: </label><br>
						<input type="text" name="last_name" /><br>
						
						<label for="pass">*Password: </label><br>
						<input type="password" name="password" /><br>
						
						<label for="conf_pass">*Confirm Password: </label><br>
						<input type="password" name="password_conf" /><br>
						
						<label for="conf_pass">*Expected Graduation Date: </label>
						
						<select name="season">
							<option value="Fall">Fall</option>
							<option value="Spring">Spring</option>
						</select>
						
						<select name="yearGraduate">
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>
							<option value="2027">2027</option>
							<option value="2028">2028</option>
							<option value="2029">2029</option>
							<option value="2030">2030</option>
						</select><br>
						
						<label for="pledge_class">*Pledge Class: </label>
						
						<select name="pledgeClass">
                        	<option value="2009">2009</option>
							<option value="2010">2010</option>
							<option value="2011">2011</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015" selected="selected">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>
							<option value="2027">2027</option>
							<option value="2028">2028</option>
							<option value="2029">2029</option>
							<option value="2030">2030</option>
						</select>
				
					<br>
				
					    <div id="member-general" class="member-info">
							<h4>General Information</h4>
						</div>
					     Date of Birth:<br><input type="date" name="bday"><br>
					    <span>School Address:<br></span><input type="text" name="member_address"/><br>
					    <span>Apartment:<br></span><input type="text" name="member_apt"/><br>
					    <span>City:<br></span><input type="text" name="member_city"/><br>
					    <!-- <span>*State:<br></span><input type="text" name="member_state"/><br> -->
					    <span>State<br></span>
					    <select name="member_state"> 
						<option value="" selected="selected">Select a State</option> 
						<option value="AL">Alabama</option> 
						<option value="AK">Alaska</option> 
						<option value="AZ">Arizona</option> 
						<option value="AR">Arkansas</option> 
						<option value="CA">California</option> 
						<option value="CO">Colorado</option> 
						<option value="CT">Connecticut</option> 
						<option value="DE">Delaware</option> 
						<option value="DC">District Of Columbia</option> 
						<option value="FL">Florida</option> 
						<option value="GA">Georgia</option> 
						<option value="HI">Hawaii</option> 
						<option value="ID">Idaho</option> 
						<option value="IL">Illinois</option> 
						<option value="IN">Indiana</option> 
						<option value="IA">Iowa</option> 
						<option value="KS">Kansas</option> 
						<option value="KY">Kentucky</option> 
						<option value="LA">Louisiana</option> 
						<option value="ME">Maine</option> 
						<option value="MD">Maryland</option> 
						<option value="MA">Massachusetts</option> 
						<option value="MI">Michigan</option> 
						<option value="MN">Minnesota</option> 
						<option value="MS">Mississippi</option> 
						<option value="MO">Missouri</option> 
						<option value="MT">Montana</option> 
						<option value="NE">Nebraska</option> 
						<option value="NV">Nevada</option> 
						<option value="NH">New Hampshire</option> 
						<option value="NJ">New Jersey</option> 
						<option value="NM">New Mexico</option> 
						<option value="NY">New York</option> 
						<option value="NC">North Carolina</option> 
						<option value="ND">North Dakota</option> 
						<option value="OH">Ohio</option> 
						<option value="OK">Oklahoma</option> 
						<option value="OR">Oregon</option> 
						<option value="PA">Pennsylvania</option> 
						<option value="RI">Rhode Island</option> 
						<option value="SC">South Carolina</option> 
						<option value="SD">South Dakota</option> 
						<option value="TN">Tennessee</option> 
						<option value="TX">Texas</option> 
						<option value="UT">Utah</option> 
						<option value="VT">Vermont</option> 
						<option value="VA">Virginia</option> 
						<option value="WA">Washington</option> 
						<option value="WV">West Virginia</option> 
						<option value="WI">Wisconsin</option> 
						<option value="WY">Wyoming</option>
						</select>
						<br>
					    <span>Zip Code:<br></span><input type="text" name="member_zip"/><br>
					    <span>Home Phone Number:<br></span><input type="tel" name="member_home_phone"><br>
					    <span>Cell Phone Number:<br></span><input type="tel" name="member_cell_phone"><br>
			
					<br>
						<div id="parent" class="member-info">
							<h4>Parent/Guardian Information</h4>
						</div>
						
					    <label for="par_first_name">First Name:</label><br>
						<input type="text" name="par_first_name" /><br>
						<label for="par_last_name">Last Name: </label><br>
						<input type="text" name="par_last_name" /><br>
					    <span>Address: </span><br><input type="text" name="par_address"/><br>
					    <span>Apartment: </span><br><input type="text" name="par_apt"/><br>
					    <span>City: </span><br><input type="text" name="par_city"/><br>
					    <!--<span>*State: </span><br><input type="text" name="par_state"/><br> -->
					    <span>State<br></span>
					    <select name="par_state"> 
						<option value="" selected="selected">Select a State</option> 
						<option value="AL">Alabama</option> 
						<option value="AK">Alaska</option> 
						<option value="AZ">Arizona</option> 
						<option value="AR">Arkansas</option> 
						<option value="CA">California</option> 
						<option value="CO">Colorado</option> 
						<option value="CT">Connecticut</option> 
						<option value="DE">Delaware</option> 
						<option value="DC">District Of Columbia</option> 
						<option value="FL">Florida</option> 
						<option value="GA">Georgia</option> 
						<option value="HI">Hawaii</option> 
						<option value="ID">Idaho</option> 
						<option value="IL">Illinois</option> 
						<option value="IN">Indiana</option> 
						<option value="IA">Iowa</option> 
						<option value="KS">Kansas</option> 
						<option value="KY">Kentucky</option> 
						<option value="LA">Louisiana</option> 
						<option value="ME">Maine</option> 
						<option value="MD">Maryland</option> 
						<option value="MA">Massachusetts</option> 
						<option value="MI">Michigan</option> 
						<option value="MN">Minnesota</option> 
						<option value="MS">Mississippi</option> 
						<option value="MO">Missouri</option> 
						<option value="MT">Montana</option> 
						<option value="NE">Nebraska</option> 
						<option value="NV">Nevada</option> 
						<option value="NH">New Hampshire</option> 
						<option value="NJ">New Jersey</option> 
						<option value="NM">New Mexico</option> 
						<option value="NY">New York</option> 
						<option value="NC">North Carolina</option> 
						<option value="ND">North Dakota</option> 
						<option value="OH">Ohio</option> 
						<option value="OK">Oklahoma</option> 
						<option value="OR">Oregon</option> 
						<option value="PA">Pennsylvania</option> 
						<option value="RI">Rhode Island</option> 
						<option value="SC">South Carolina</option> 
						<option value="SD">South Dakota</option> 
						<option value="TN">Tennessee</option> 
						<option value="TX">Texas</option> 
						<option value="UT">Utah</option> 
						<option value="VT">Vermont</option> 
						<option value="VA">Virginia</option> 
						<option value="WA">Washington</option> 
						<option value="WV">West Virginia</option> 
						<option value="WI">Wisconsin</option> 
						<option value="WY">Wyoming</option>
						</select>
						<br>
					    <span>Zip Code: </span><br><input type="text" name="par_zip"/><br>
					    <span>Home Phone Number:<br></span><input type="tel" name="par_home_phone"><br>
					    <span>Cell Phone Number:<br></span><input type="tel" name="par_cell_phone"><br>
					<br>
						<div id="other" class="member-info">
							<h4>Other Contact Information</h4>
						</div>
					    <label for="other_first_name">First Name: </label><br>
						<input type="text" name="other_first_name" /><br>
						<label for="other_last_name">Last Name: </label><br>
						<input type="text" name="other_last_name" /><br>
					    <span>Address:<br></span><input type="text" name="other_address"/><br>
					    <span>Apartment:<br></span><input type="text" name="other_apt"/><br>
					    <span>City:<br></span><input type="text" name="other_city"/><br>
					    <!--<span>State:<br></span><input type="text" name="other_state"/><br>-->
					     <span>State<br></span>
					    <select name="other_state"> 
						<option value="" selected="selected">Select a State</option> 
						<option value="AL">Alabama</option> 
						<option value="AK">Alaska</option> 
						<option value="AZ">Arizona</option> 
						<option value="AR">Arkansas</option> 
						<option value="CA">California</option> 
						<option value="CO">Colorado</option> 
						<option value="CT">Connecticut</option> 
						<option value="DE">Delaware</option> 
						<option value="DC">District Of Columbia</option> 
						<option value="FL">Florida</option> 
						<option value="GA">Georgia</option> 
						<option value="HI">Hawaii</option> 
						<option value="ID">Idaho</option> 
						<option value="IL">Illinois</option> 
						<option value="IN">Indiana</option> 
						<option value="IA">Iowa</option> 
						<option value="KS">Kansas</option> 
						<option value="KY">Kentucky</option> 
						<option value="LA">Louisiana</option> 
						<option value="ME">Maine</option> 
						<option value="MD">Maryland</option> 
						<option value="MA">Massachusetts</option> 
						<option value="MI">Michigan</option> 
						<option value="MN">Minnesota</option> 
						<option value="MS">Mississippi</option> 
						<option value="MO">Missouri</option> 
						<option value="MT">Montana</option> 
						<option value="NE">Nebraska</option> 
						<option value="NV">Nevada</option> 
						<option value="NH">New Hampshire</option> 
						<option value="NJ">New Jersey</option> 
						<option value="NM">New Mexico</option> 
						<option value="NY">New York</option> 
						<option value="NC">North Carolina</option> 
						<option value="ND">North Dakota</option> 
						<option value="OH">Ohio</option> 
						<option value="OK">Oklahoma</option> 
						<option value="OR">Oregon</option> 
						<option value="PA">Pennsylvania</option> 
						<option value="RI">Rhode Island</option> 
						<option value="SC">South Carolina</option> 
						<option value="SD">South Dakota</option> 
						<option value="TN">Tennessee</option> 
						<option value="TX">Texas</option> 
						<option value="UT">Utah</option> 
						<option value="VT">Vermont</option> 
						<option value="VA">Virginia</option> 
						<option value="WA">Washington</option> 
						<option value="WV">West Virginia</option> 
						<option value="WI">Wisconsin</option> 
						<option value="WY">Wyoming</option>
						</select>
						<br>
					    <span>Zip Code:<br></span><input type="text" name="other_zip"/><br>
					    <span>Cell Phone Number:<br></span><input type="tel" name="other_cell_phone"><br>
					    <span>Relation:<br></span><input type="text" name="relation"><br>
					<br>
						<div id="transport" class="member-info">
							<h4>Vehicle Information</h4>
						</div>
					    <p style="font-style: italic; font-size: 14px;">Must input either "no vehicle" or make and model.</p><br>
					    <input type="checkbox" name="car" value="noCar" style="width: 20px;">I do not have a vehicle.<br><br>
					    <label for="make">Make: </label><br>
						<input type="text" name="car_make" /><br>
						<label for="model">Model: </label><br>
						<input type="text" name="car_model" /><br>
						<label for="model">License Plate Number: </label><br>
						<input type="text" name="license" /><br>
					<br>
						<div id="allergy" class="member-info">
							<h4>Allergy Information</h4>
						</div>
						<form class="allergy-selection">
							<fieldset>
								<legend>Do you have allergies?</legend>
		                        <input type="radio" name="allergyRadio" value="Yes" class="yes-selected" />Yes<br />
		                        <input type="radio" name="allergyRadio" value="No" />No<br />                
							</fieldset>
						</form>
						<div class="allergy-information">
							 <label for="allergies" style="display: block;">List any allergies:</label>
							<textarea rows="4" cols="50" name="allergies"></textarea>
							
							<label for="allergies_med" style="display: block;">Are you allergic to any medications?</label>
							<textarea rows="4" cols="50" name="medicine_allergies"></textarea>
							
							<label for="allergies" style="display: block;">List any medications you are taking:</label>
							<textarea rows="4" cols="50" name="current_medications"></textarea>
							
							<label for="allergies" style="display: block;">Do you have any health issues? If so, please indicate:</label>
							<textarea rows="4" cols="50" name="health_issues"></textarea>
						</div>
					<br>
						<div id="health-insurance" class="member-info">
							<h4>Health Insurance Information</h4>
						</div>
					    <label for="health_provider">Name of Insurance Provider: </label><br>
						<input type="text" name="health_prov" /><br>
						<label for="other_last_name">Subscriber Name: </label><br>
						<input type="text" name="health_subsc" /><br>
					    <span>Subscriber Employer: </span><br><input type="text" name="health_subsc_employer"/><br>
					    <span>Policy Number: </span><br><input type="text" name="health_policy_no"/><br>
					    <span>Phone Number: </span><br><input type="text" name="health_phone_no"/><br>
					<br>
						<div id="auto-insurance" class="member-info">
							<h4>Auto Insurance Information</h4>
						</div>
					    <label for="auto_provider">Name of Insurance Provider: </label><br>
						<input type="text" name="auto_prov" /><br>
						<label for="other_last_name">Subscriber Name: </label><br>
						<input type="text" name="auto_subsc" /><br>
					    <span>Subscriber Employer: </span><br><input type="text" name="auto_subsc_employer"/><br>
					    <span>Policy Number: </span><br><input type="text" name="auto_policy_no"/><br>
					    <span>Phone Number: </span><br><input type="text" name="auto_phone_no"/><br><br>
					
					<input type="hidden" name="email_code" value="<?php echo $emailCode?>">
					
					<input type="checkbox" name="terms" value="Agree" style="width: 20px;">This information was voluntarily submitted to the chapter officers of Alpha Chapter of Kappa Alpha Theta; this information will remain confidential. In case of emergency, I give my permission for the officers of Alpha Chapter to disclose this information to the emergency personnel.<br><br>
				
					<input type="submit" name="submitNewUser" value="Set Up Account" /><br>
			</form>
		</div>	
		</div>
	<?php include("includes/footer.php"); ?>