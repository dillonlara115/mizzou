
<?php $pageTitle = 'Active Member List'; include("includes/header.php"); ?>
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
	<h4>Unverified Profile List</h4>
	<div class="form-inline">
		<div class="form-group">
			<label for="search">Search for a profile</label>
	        <input id="search" name="search" placeholder="Start typing here" type="text" class="form-control" data-list=".default_list" autocomplete="off">
		</div>
	</div>
	<br>
	<?php
		
		$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
		
		//Checks to make sure at least one profile is unverified, else display message.
		$result = mysqli_query($con,"SELECT first_name, last_name, email, pledge_class, id FROM members WHERE verified = 0");
		$rowCheck = mysqli_fetch_row($result);
		
		//Gets unverified profiles to display if they exist.
		$result = mysqli_query($con,"SELECT first_name, last_name, email, pledge_class, id FROM members WHERE verified = 0");
		
		if(empty($rowCheck[0]) == FALSE) {
			echo "<table class='table table-hover table-bordered table-striped'>
					<thead>
					<tr>
					  <th>Member Name</th>
					  <th>Pledge Class</th>
					  <th>Email</th>
					</tr>
					</thead><tbody class='default_list'>
					<tr>";
				
			// Display members and information
			while($row = mysqli_fetch_row($result))
			{
				echo "<tr>
						<td><a href='http://greekamer.com/mizzou/profile-overview.php?id=$row[4]'>$row[0] $row[1]</a></td>
						<td>$row[3]</td>
						<td>$row[2]</td>
					  </tr>";
			}
			echo "</tbody></table>";
		}
		
		else {
			echo "All profiles have been verified at this time.";
		}
	?>
</div>

							</div><!-- /main -->
						</div><!-- /st-content-inner -->
					</div><!-- /st-content -->
				</div><!-- /st-pusher -->
			</div><!-- /st-container -->
	<?php include("includes/footer.php"); ?>