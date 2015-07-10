
<?php $pageTitle = 'Pending Profiles'; include("includes/header.php"); ?>
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
					<h4>Pending Profiles</h4>
					<p>These members have been sent an email and have not created their profiles.</p><br>
					<?php
					$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");

					$result = mysqli_query($con,"SELECT email FROM members WHERE active = 0 ORDER BY email");

					$rowCheck = mysqli_fetch_row($result);

					$result = mysqli_query($con,"SELECT email, id, first_name, last_name FROM members WHERE active = 0 ORDER BY email");

					if(empty($rowCheck) == FALSE) {
				// Display members and information
						echo "<table class='table table-hover table-bordered table-striped'>
						<tr>
							<th>Email</th>
						</tr>
						<tr>";


							while($row = mysqli_fetch_row($result))
							{
								echo "<tr>
								<td>$row[0]</td>
							</tr>";
						}
					}
					else {
						echo "All profiles have been created at this time.";
					}
					?>
				</div>


			</div><!-- /main -->
		</div><!-- /st-content-inner -->
	</div><!-- /st-content -->
</div><!-- /st-pusher -->
<!-- /st-container -->
<?php include("includes/footer.php"); ?>