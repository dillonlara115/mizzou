<?php
include 'init.php';

if(empty($_SESSION['admin_first_name']) == TRUE ) {
	header("Location: login.php");
}
?>
<?php $pageTitle = 'Active Member List'; include("includes/header.php"); ?>
<script>
	$(document).ready(function() 
	{ 
		$("#myTable").tablesorter(); 
	} 
	); 
</script>
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
					<h4>Active Member Roster</h4>

					<?php
					echo "<table border='1' style='width: 960px;' id='myTable' class='tablesorter'>
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Pledge Class</th>
							<th>Cell Phone Number</th>
							<th>License Plate</th>
							<th>Email</th>
							<th>Status</th>
						</tr>
						<tr>
						</thead><tbody>";
						
						$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
						
						$result = mysqli_query($con,"SELECT members.first_name, members.last_name, members.pledge_class, members_contact.cell_phone, members_contact.car_license, members.id, members.email FROM members, members_contact WHERE members.email LIKE members_contact.email ORDER BY members.last_name");
						
		// Display members and information
						while($row = mysqli_fetch_row($result))
						{
							echo "<tr>
							<td><a href='http://greekamer.com/mizzou/profile-overview.php?id=$row[5]'>$row[0]</a></td>
							<td>$row[1]</td>
							<td>$row[2]</td>
							<td>$row[3]</td>
							<td>$row[4]</td>
							<td>$row[6]</td>";
							
							$resultStatus = mysqli_query($con,"SELECT DISTINCT(members_additional.email) FROM members_additional, members_contact WHERE '$row[6]' LIKE members_additional.email AND members_contact.email LIKE '$row[6]' AND health_provider_name <> '' AND health_subscriber_name <> '' AND health_employer <> '' AND health_policy_no <> '' AND health_phone_no <> '' AND auto_provider_name <> '' AND auto_subscriber_name <> '' AND auto_policy_no <> '' AND auto_phone_no <> '' AND auto_employer <> '' AND other_address != ''");
							
							$rowStatus = mysqli_fetch_row($resultStatus);
							
							if(empty($rowStatus[0]) == FALSE) {
								echo "<td>Complete</td>";
							}
							
							else {
								echo "<td>Incomplete</td>";
							}
							
							echo "</tr>";
						}
						echo "</tbody></table>";
						?>
						
					</div>
				</div><!-- /main -->
			</div><!-- /st-content-inner -->
		</div><!-- /st-content -->
	</div><!-- /st-pusher -->
</div><!-- /st-container -->
<script type="text/javascript" src="http://greekamer.com/mizzou/js/jquery.tablesorter.js"></script> 

<?php include("includes/footer.php"); ?>