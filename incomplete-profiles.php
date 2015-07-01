<?php $pageTitle = 'Incomplete Profiles'; include("includes/header.php"); ?>

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
                                
<div class="center-bucket">
<h4>Incomplete Profiles</h4>
<p>These members have incomplete information on their profiles.</p><br>
	<?php
		$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
			
		$result = mysqli_query($con,"SELECT DISTINCT members_additional.email FROM members_additional, members_contact, members WHERE health_provider_name LIKE '' OR health_subscriber_name LIKE '' OR health_employer LIKE '' OR health_policy_no LIKE '' OR health_phone_no LIKE '' ORDER BY members_additional.email");
		
		$rowCheck = mysqli_fetch_row($result);
		
		$result = mysqli_query($con,"SELECT DISTINCT members_additional.email FROM members_additional, members_contact, members WHERE health_provider_name LIKE '' OR health_subscriber_name LIKE '' OR health_employer LIKE '' OR health_policy_no LIKE '' OR health_phone_no LIKE '' ORDER BY members_additional.email");
		
		if(empty($rowCheck) == FALSE) {
			// Display members and information
			echo "<table border='1'>
			<thead>
			<tr>
			  <th>Email</th>
			  <th>First Name</th>
			  <th>Last Name</th>
			</tr>
			<tr>
			</thead>
			<tbody>";
	
			
			while($row = mysqli_fetch_row($result))
			{
				echo "<tr>
						<td>$row[0]</td>";
						
						$resultDetails = mysqli_query($con,"SELECT id, first_name, last_name FROM members WHERE email LIKE '$row[0]'");
						
						$rowDetails = mysqli_fetch_row($resultDetails);
						
						echo "<td><a href='http://greekamer.com/mizzou/profile-overview.php?id=$rowDetails[0]'>$rowDetails[1]</a></td>";
						echo "<td>$rowDetails[2]</td>";
						
					 echo "</tr>";
			}
			
			echo "</tbody></table>";
		}
		else {
			echo "All profiles have been completed at this time.";
		}
	?>
	
</div>


							</div><!-- /main -->
						</div><!-- /st-content-inner -->
					</div><!-- /st-content -->
				</div><!-- /st-pusher -->
			</div><!-- /st-container -->
	<?php include("includes/footer.php"); ?>	