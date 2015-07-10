<?php
//Get count of incomplete profiles.
$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
			
$result = mysqli_query($con,"SELECT COUNT(DISTINCT members_additional.email) FROM members_additional, members_contact, members WHERE health_provider_name LIKE '' OR health_subscriber_name LIKE '' OR health_employer LIKE '' OR health_policy_no LIKE '' OR health_phone_no LIKE '' ORDER BY members_additional.email");
		
$incompleteCount = mysqli_fetch_row($result);
$incompleteCountFull = $incompleteCount[0];

//Get count of pending profiles.
$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
				
$result = mysqli_query($con,"SELECT COUNT(email) FROM members WHERE active = 0 ORDER BY email");
			
$pendingCount = mysqli_fetch_row($result);
$pendingCountFull = $pendingCount[0];

//Get count of completed profiles.
$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
			
$result = mysqli_query($con,"SELECT COUNT(DISTINCT(members_additional.email)) FROM members_additional, members_contact WHERE members_contact.email LIKE members_additional.email AND health_provider_name <> '' AND health_subscriber_name <> '' AND health_employer <> '' AND health_policy_no <> '' AND health_phone_no <> '' ORDER BY members_additional.email");
		
$completedProfiles = mysqli_fetch_row($result);
$completedProfilesFull = $completedProfiles[0];

?>
<?php $pageTitle = 'Reports'; include("includes/header.php"); ?>

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
                                
	<div>
		<div class="center-bucket">
			<h4>Reports</h4>
          	<div class="list-group">
          		<a class="list-group-item" href="roster.php">Members Overview</a>
	          	<a class="list-group-item" href="complete-profiles.php">Completed Profile List <span class="badge"><?php echo $completedProfilesFull; ?> members</span></a>
	            <a class="list-group-item" href="incomplete-profiles.php">Incompleted Profile List <span class="badge"><?php echo $incompleteCountFull; ?> members</span></a>
	            <a class="list-group-item" href="pending-profiles.php">Pending Profile List <span class="badge"><?php echo $pendingCountFull; ?> members</span></a>
	            <a class="list-group-item" href="unverified-profiles.php">Unverified Semester Updated Profiles</a>
	            <a class="list-group-item" href="print.php">Print/Download Information</a>
          	</div>
          	

            
		</div>
	</div>
    
    </div><!-- /main -->
						</div><!-- /st-content-inner -->
					</div><!-- /st-content -->
				</div><!-- /st-pusher -->
			</div><!-- /st-container -->
<?php include("includes/footer.php"); ?>	