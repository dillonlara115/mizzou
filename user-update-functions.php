<?php
function get_email_from_id($id) {
	//Use email code to get email for information insertion.
	$con2=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	//Grab userID from members table.
	$result = mysqli_query($con2,"SELECT email FROM members WHERE id = $id");
				
	$queryResultEmail = mysqli_fetch_row($result);
	
	$email = $queryResultEmail[0];
	
	return($email);
}

function get_email_from_admin_id($id) {
	//Use email code to get email for information insertion.
	$con2=mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
	
	//Grab userID from members table.
	$result = mysqli_query($con2,"SELECT email FROM admin WHERE id = $id");
				
	$queryResultEmail = mysqli_fetch_row($result);
	
	$email = $queryResultEmail[0];
	
	return($email);
}

function update_admin_general_info($usernameDB, $passwordDB, $email, $first_name_update, $last_name_update, $birthday, $member_address, $member_apartment, $member_city, $member_state, $member_zip, $member_home_phone, $member_cell_phone) {

	//Connect to the members database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);

	//Update any general information that has been changed.
	$update = array();
	
	if(trim($first_name_update) !== "") {
	    $update[] = "first_name = :first_name";
	}
	
	if(trim($last_name_update) !=="") {
		$update[] = "last_name = :last_name";
	}

	if(sizeof($update) > 0) {//check if we have any updates otherwise don't execute
	    $query = "UPDATE admin SET " . implode(", ", $update) . " WHERE email = :email";
	    //Prepare statement
	    $stmt = $dbh->prepare($query);
	    //Generic comparison variable.
	    $stmt->bindParam(":email", $email);
	    
	    if(trim($first_name_update) !== "") {
	        $stmt->bindParam(":first_name", $first_name_update);
	    }
	    
	    if(trim($last_name_update) !== "") {
	        $stmt->bindParam(":last_name", $last_name_update);
	    }
	    
	    $stmt->execute();
	}	
	
	//Connect to the members_contact
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);

	$update = array();
	
	if(trim($birthday) !== "") {
	    $update[] = "date_of_birth = :birthday";
	}
	
	if(trim($member_address) !== "") {
		$update[] = "school_address = :member_address";
	}
	
	if(trim($member_apartment) !== "") {
		$update[] = "apt = :member_apartment";
	}
	
	if(trim($member_city) !== "") {
		$update[] = "city = :member_city";
	}
	
	if(trim($member_state) !== "") {
		$update[] = "state = :member_state";
	}
	
	if(trim($member_zip) !== "") {
		$update[] = "zip_code = :member_zip_code";
	}
	
	if(trim($member_home_phone) !== "") {
		$update[] = "home_phone = :member_home_phone";
	}
	
	if(trim($member_cell_phone) !== "") {
		$update[] = "cell_phone = :member_cell_phone";
	}
	
	

	if(sizeof($update) > 0) {//check if we have any updates otherwise don't execute
	    $query = "UPDATE members_contact SET " . implode(", ", $update) . " WHERE email = :email";
	    //Prepare statement
	    $stmt = $dbh->prepare($query);
	    //Generic comparison variable.
	    $stmt->bindParam(":email", $email);
	    
	    if(trim($birthday) !== "") {
	        $stmt->bindParam(":birthday", $birthday);
	    }
	    
	    if(trim($member_address) !== "") {
		    $stmt->bindParam(":member_address", $member_address);
	    }
	    
	    if(trim($member_apartment) !== "") {
		    $stmt->bindParam(":member_apartment", $member_apartment);
	    }
	    
	    if(trim($member_city) !== "") {
		    $stmt->bindParam(":member_city", $member_city);
	    }
	    
	    if(trim($member_state) !== "") {
		    $stmt->bindParam(":member_state", $member_state);
	    }
	    
	    if(trim($member_zip) !== "") {
		    $stmt->bindParam(":member_zip_code", $member_zip);
	    }
	    
	    if(trim($member_home_phone) !== "") {
		    $stmt->bindParam(":member_home_phone", $member_home_phone);
	    }
	    
	    if(trim($member_cell_phone) !== "") {
		    $stmt->bindParam(":member_cell_phone", $member_cell_phone);
	    }

	    $stmt->execute();
	}
}

function update_general_info($usernameDB, $passwordDB, $email, $first_name_update, $last_name_update, $birthday, $member_address, $member_apartment, $member_city, $member_state, $member_zip, $member_home_phone, $member_cell_phone, $season, $yearGraduate, $pledgeClass) {

	//Connect to the members database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);

	//Update any general information that has been changed.
	$update = array();
	
	if(trim($first_name_update) !== "") {
	    $update[] = "first_name = :first_name";
	}
	
	if(trim($last_name_update) !=="") {
		$update[] = "last_name = :last_name";
	}
	
	if(trim($season) !== "") {
	    $update[] = "graduation_season = :season";
	}
	
	if(trim($yearGraduate) !=="") {
		$update[] = "graduation_year = :year";
	}
	
	if(trim($pledgeClass) !=="") {
		$update[] = "pledge_class = :pledge_class";
	}

	if(sizeof($update) > 0) {//check if we have any updates otherwise don't execute
	    $query = "UPDATE members SET " . implode(", ", $update) . " WHERE email = :email";
	    //Prepare statement
	    $stmt = $dbh->prepare($query);
	    //Generic comparison variable.
	    $stmt->bindParam(":email", $email);
	    
	    if(trim($first_name_update) !== "") {
	        $stmt->bindParam(":first_name", $first_name_update);
	    }
	    
	    if(trim($last_name_update) !== "") {
	        $stmt->bindParam(":last_name", $last_name_update);
	    }
	    
	    if(trim($season) !== "") {
	        $stmt->bindParam(":season", $season);
	    }
	    
	    if(trim($yearGraduate) !== "") {
	        $stmt->bindParam(":year", $yearGraduate);
	    }
	    	    
	    if(trim($pledgeClass) !== "") {
	        $stmt->bindParam(":pledge_class", $pledgeClass);
	    }

	    $stmt->execute();
	}	
	
	//Connect to the members_contact
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);

	$update = array();
	
	if(trim($birthday) !== "") {
	    $update[] = "date_of_birth = :birthday";
	}
	
	if(trim($member_address) !== "") {
		$update[] = "school_address = :member_address";
	}
	
	if(trim($member_apartment) !== "") {
		$update[] = "apt = :member_apartment";
	}
	
	if(trim($member_city) !== "") {
		$update[] = "city = :member_city";
	}
	
	if(trim($member_state) !== "") {
		$update[] = "state = :member_state";
	}
	
	if(trim($member_zip) !== "") {
		$update[] = "zip_code = :member_zip_code";
	}
	
	if(trim($member_home_phone) !== "") {
		$update[] = "home_phone = :member_home_phone";
	}
	
	if(trim($member_cell_phone) !== "") {
		$update[] = "cell_phone = :member_cell_phone";
	}
	
	

	if(sizeof($update) > 0) {//check if we have any updates otherwise don't execute
	    $query = "UPDATE members_contact SET " . implode(", ", $update) . " WHERE email = :email";
	    //Prepare statement
	    $stmt = $dbh->prepare($query);
	    //Generic comparison variable.
	    $stmt->bindParam(":email", $email);
	    
	    if(trim($birthday) !== "") {
	        $stmt->bindParam(":birthday", $birthday);
	    }
	    
	    if(trim($member_address) !== "") {
		    $stmt->bindParam(":member_address", $member_address);
	    }
	    
	    if(trim($member_apartment) !== "") {
		    $stmt->bindParam(":member_apartment", $member_apartment);
	    }
	    
	    if(trim($member_city) !== "") {
		    $stmt->bindParam(":member_city", $member_city);
	    }
	    
	    if(trim($member_state) !== "") {
		    $stmt->bindParam(":member_state", $member_state);
	    }
	    
	    if(trim($member_zip) !== "") {
		    $stmt->bindParam(":member_zip_code", $member_zip);
	    }
	    
	    if(trim($member_home_phone) !== "") {
		    $stmt->bindParam(":member_home_phone", $member_home_phone);
	    }
	    
	    if(trim($member_cell_phone) !== "") {
		    $stmt->bindParam(":member_cell_phone", $member_cell_phone);
	    }

	    $stmt->execute();
	}	
}

function update_parent_info($usernameDB, $passwordDB, $email, $parent_first_name, $parent_last_name, $parent_address, $parent_apt, $parent_city, $parent_state, $parent_zip, $parent_cell, $parent_home) {
		//Connect to the members database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);

	//Update any general information that has been changed.
	$update = array();
	
	if(trim($parent_first_name) !== "") {
	    $update[] = "par_first = :parent_first_name";
	}
	
	if(trim($parent_last_name) !== "") {
	    $update[] = "par_last = :parent_last_name";
	}
	
	if(trim($parent_address) !== "") {
	    $update[] = "par_address = :parent_address";
	}
	
	if(trim($parent_apt) !== "") {
	    $update[] = "par_apt = :parent_apartment";
	}
	
	if(trim($parent_city) !== "") {
	    $update[] = "par_city = :parent_city";
	}
	
	if(trim($parent_state) !== "") {
	    $update[] = "par_state = :parent_state";
	}
	
	if(trim($parent_zip) !== "") {
	    $update[] = "par_zip_code = :parent_zip";
	}
	
	if(trim($parent_cell) !== "") {
	    $update[] = "par_cell_phone = :parent_cell";
	}
	
	if(trim($parent_home) !== "") {
	    $update[] = "par_home_phone = :parent_home";
	}

	if(sizeof($update) > 0) {//check if we have any updates otherwise don't execute
	    $query = "UPDATE members_contact SET " . implode(", ", $update) . " WHERE email = :email";
	    //Prepare statement
	    $stmt = $dbh->prepare($query);
	    //Generic comparison variable.
	    $stmt->bindParam(":email", $email);
	    
	    if(trim($parent_first_name) !== "") {
	        $stmt->bindParam(":parent_first_name", $parent_first_name);
	    }
	    
	    if(trim($parent_last_name) !== "") {
	        $stmt->bindParam(":parent_last_name", $parent_last_name);
	    }
	    
	    if(trim($parent_address) !== "") {
	        $stmt->bindParam(":parent_address", $parent_address);
	    }
	    
	    if(trim($parent_apt) !== "") {
	        $stmt->bindParam(":parent_apartment", $parent_apt);
	    }
	    
	    if(trim($parent_city) !== "") {
	        $stmt->bindParam(":parent_city", $parent_city);
	    }
	    
	    if(trim($parent_state) !== "") {
	        $stmt->bindParam(":parent_state", $parent_state);
	    }
	    
	    if(trim($parent_zip) !== "") {
	        $stmt->bindParam(":parent_zip", $parent_zip);
	    }

		if(trim($parent_cell) !== "") {
			$stmt->bindParam(":parent_cell", $parent_cell);
		}
		
		if(trim($parent_home) !== "") {
			$stmt->bindParam(":parent_home", $parent_home);
		}
	    
	    $stmt->execute();
	}	
}

function update_other_info($usernameDB, $passwordDB, $email, $other_first_name, $other_last_name, $other_address, $other_apt, $other_city, $other_state, $other_zip, $other_home, $other_cell, $car_make, $car_model, $car_license, $relation) {
	
	//Connect to the members database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);

	//Update any general information that has been changed.
	$update = array();
	
	if(trim($car_make) !== "") {
	    $update[] = "car_make = :car_make";
	    $hasCar = "hasCar";
	}

	if(trim($car_model) !== "") {
	    $update[] = "car_model = :car_model";
	}
	
	if(trim($car_license) !== "") {
	    $update[] = "car_license = :car_license";
	}
	
	if(trim($other_first_name) !== "") {
	    $update[] = "other_first = :other_first";
	}
	
	if(trim($other_last_name) !== "") {
	    $update[] = "other_last = :other_last";
	}
	
	if(trim($other_address) !== "") {
	    $update[] = "other_address = :other_address";
	}
	
	if(trim($other_apt) !== "") {
	    $update[] = "other_apt = :other_apt";
	}
	
	if(trim($other_city) !== "") {
	    $update[] = "other_city = :other_city";
	}
	
	if(trim($other_state) !== "") {
	    $update[] = "other_state = :other_state";
	}
	
	if(trim($other_zip) !== "") {
	    $update[] = "other_zip = :other_zip";
	}
	
	if(trim($other_cell) !== "") {
	    $update[] = "phone_no = :other_phone";
	}
	
	if(trim($relation) !== "") {
	    $update[] = "relation = :relation";
	}
	
	if(trim($car_make) !== "") {
	    $update[] = "has_car = :hasCar";
	}

	if(sizeof($update) > 0) {//check if we have any updates otherwise don't execute
	    $query = "UPDATE members_contact SET " . implode(", ", $update) . " WHERE email = :email";
	    //Prepare statement
	    $stmt = $dbh->prepare($query);
	    //Generic comparison variable.
	    $stmt->bindParam(":email", $email);
	    
	    if(trim($car_make) !== "") {
	        $stmt->bindParam(":car_make", $car_make);
	    }
	    
	    if(trim($car_model) !== "") {
	        $stmt->bindParam(":car_model", $car_model);
	    }
	    
	    if(trim($car_license) !== "") {
	        $stmt->bindParam(":car_license", $car_license);
	    }
	    
	    if(trim($other_first_name) !== "") {
	        $stmt->bindParam(":other_first", $other_first_name);
	    }
	    
	    if(trim($other_last_name) !== "") {
	        $stmt->bindParam(":other_last", $other_last_name);
	    }
	    
	    if(trim($other_address) !== "") {
	        $stmt->bindParam(":other_address", $other_address);
	    }
	    
	    if(trim($other_apt) !== "") {
	        $stmt->bindParam(":other_apt", $other_apt);
	    }
	    
	    if(trim($other_city) !== "") {
	        $stmt->bindParam(":other_city", $other_city);
	    }
	    
	    if(trim($other_state) !== "") {
	        $stmt->bindParam(":other_state", $other_state);
	    }
	    
	    if(trim($other_zip) !== "") {
	        $stmt->bindParam(":other_zip", $other_zip);
	    }
	    
	    if(trim($other_cell) !== "") {
	        $stmt->bindParam(":other_phone", $other_cell);
	    }
	    
	    if(trim($relation) !== "") {
	        $stmt->bindParam(":relation", $relation);
	    }
	    
	    if(trim($car_make) !== "") {
		    $stmt->bindParam(":hasCar", $hasCar);
		}

	    $stmt->execute();
	}
}

function update_insurance_info($usernameDB, $passwordDB, $email, $allergies, $medicine_allergies, $current_medication, $health_issues, $health_prov, $health_subsc, $health_employer, $health_policy, $health_phone, $auto_prov, $auto_subsc, $auto_employer, $auto_policy, $auto_phone) {
		//Connect to the members database.
	$dbh = new PDO('mysql:host=thetaDB.db.9489000.hostedresource.com;dbname=thetaDB',$usernameDB,$passwordDB);

	//Update any general information that has been changed.
	$update = array();
	
	if(trim($allergies) !== "") {
	    $update[] = "allergies = :allergies";
	}
	
	if(trim($medicine_allergies) !== "") {
	    $update[] = "allergic_medications = :medicine_allergies";
	}
	
	if(trim($current_medication) !== "") {
	    $update[] = "current_medications = :current_medications";
	}
	
	if(trim($health_issues) !== "") {
	    $update[] = "health_issues = :health_issues";
	}
	
	if(trim($health_prov) !== "") {
	    $update[] = "health_provider_name = :health_prov";
	}
	
	if(trim($health_subsc) !== "") {
	    $update[] = "health_subscriber_name = :health_subsc";
	}
	
	if(trim($health_employer) !== "") {
	    $update[] = "health_employer = :health_employer";
	}
	
	if(trim($health_policy) !== "") {
	    $update[] = "health_policy_no = :health_policy";
	}
	
	if(trim($health_phone) !== "") {
	    $update[] = "health_phone_no = :health_phone";
	}
	
	if(trim($auto_prov) !== "") {
	    $update[] = "auto_provider_name = :auto_prov";
	}
	
	if(trim($auto_subsc) !== "") {
	    $update[] = "auto_subscriber_name = :auto_subsc";
	}
	
	if(trim($auto_employer) !== "") {
	    $update[] = "auto_employer = :auto_employer";
	}
	
	if(trim($auto_policy) !== "") {
	    $update[] = "auto_policy_no = :auto_policy";
	}
	
	if(trim($auto_phone) !== "") {
	    $update[] = "auto_phone_no = :auto_phone";
	}

	if(sizeof($update) > 0) {//check if we have any updates otherwise don't execute
	    $query = "UPDATE members_additional SET " . implode(", ", $update) . " WHERE email = :email";
	    //Prepare statement
	    $stmt = $dbh->prepare($query);
	    //Generic comparison variable.
	    $stmt->bindParam(":email", $email);
	    
	    if(trim($allergies) !== "") {
	        $stmt->bindParam(":allergies", $allergies);
	    }
	    
	    if(trim($medicine_allergies) !== "") {
	        $stmt->bindParam(":medicine_allergies", $medicine_allergies);
	    }
	    
       if(trim($current_medication) !== "") {
        	$stmt->bindParam(":current_medications", $current_medication);
	   }
	   
	   if(trim($health_issues) !== "") {
        	$stmt->bindParam(":health_issues", $health_issues);
	   }
	   
	   if(trim($health_prov) !== "") {
        	$stmt->bindParam(":health_prov", $health_prov);
	   }
	   
	   if(trim($health_subsc) !== "") {
        	$stmt->bindParam(":health_subsc", $health_subsc);
	   }
	   
	   if(trim($health_employer) !== "") {
        	$stmt->bindParam(":health_employer", $health_employer);
	   }
	   
	   if(trim($health_policy) !== "") {
        	$stmt->bindParam(":health_policy", $health_policy);
	   }
	   
	   if(trim($health_phone) !== "") {
        	$stmt->bindParam(":health_phone", $health_phone);
	   }
	   
	   if(trim($auto_prov) !== "") {
        	$stmt->bindParam(":auto_prov", $auto_prov);
	   }
	   
	   if(trim($auto_subsc) !== "") {
        	$stmt->bindParam(":auto_subsc", $auto_subsc);
	   }
	   
	   if(trim($auto_employer) !== "") {
        	$stmt->bindParam(":auto_employer", $auto_employer);
	   }
	   
	   if(trim($auto_policy) !== "") {
        	$stmt->bindParam(":auto_policy", $auto_policy);
	   }
	   
	   if(trim($auto_phone) !== "") {
        	$stmt->bindParam(":auto_phone", $auto_phone);
	   }
	   
	    $stmt->execute();
	}	
}
?>