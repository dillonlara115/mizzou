<?php $pageTitle = 'Email Users'; include("includes/header.php"); ?>

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
			<h4>Send emails to verify members for the new semester</h4>
          	<a href="verify-profiles.php">Click here to send verification emails</a>
		</div>
        
        <div class="center-bucket">
			<h4>Send emails to members with incomplete profiles</h4>
			<a href="email-incomplete.php">Click here to send emails to incomplete profiles</a>
		</div>
	</div>

							</div><!-- /main -->
						</div><!-- /st-content-inner -->
					</div><!-- /st-content -->
				</div><!-- /st-pusher -->
			</div><!-- /st-container -->
<?php include("includes/footer.php"); ?>