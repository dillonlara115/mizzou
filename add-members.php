<?php
	//Restrict pages to admin.
include 'init.php';

if(empty($_SESSION['admin_first_name']) == TRUE ) {
	header("Location: login.php");
}
?>

<?php $pageTitle = 'Add Members'; include("includes/header.php"); ?>
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
						<h4>Add General Member</h4>
						<p style="font-style: italic; font-size: 13px;">Enter each email separated by the enter/return key</p>
						<form action="add-multiple-users.php" method="POST">
							<textarea rows="8" cols="75" name="users" placeholder=""></textarea><br>
							<input type="submit" name="submitNewUser" value="Add Members" />
							<?php if($_GET['addedMultiple'] == 1) {
								echo "Emails sent successfully!";
							}
							?>
						</form>
						
						<! -- <form action="csv-add-users.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
						<! --	<input type="file" name="file">
						<! --	<input type="submit" name="btn_submit" value="Upload File" />
				<?php //if($_GET['csv'] == 1) {
					//echo "Emails sent successfully!";
				//}
					?>
					<! --</form>
				</div>
				
				<div class="center-bucket">
					<h4>Add Administrator</h4>
					<br>
					<form action="add-administrator.php" method="POST" style="width: 400px; float: left;">
						Email: <input type="text" name="newAdmin"/><br><br>
						<input type="submit" name="submit" value="Add New Administrator"><br>
					</form>
					
					<div id="super-list">
						<h3 id="admin-title">Administrators</h3>
						<?php
						$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
						
						$result = mysqli_query($con,"SELECT last_name, first_name, email, id FROM admin WHERE superAdmin = 1 AND id != 1 AND id != 12 ORDER BY last_name");
						
					// Display members and information
						while($row = mysqli_fetch_row($result))
						{
							echo "<a href='http://www.greekamer.com/mizzou/remove-member-admin.php?num=$row[3]'><img src='http://www.greekamer.com/mizzou/images/icons/x-icon.png' id='x-icon'></a><p style='font-size: 15px; margin-bottom: 15px; padding-top: 3px; margin-left: 5px; float: left;'>$row[1] $row[0]</p>";
							echo "<div style='clear: both;'></div>";
						}	
						?>
					</div>
					<div id="admin-list">	
						<h4>Add Member Administrator</h4>
						<div id="admin-box">
							<h3 id="admin-title">Promote Member</h3>
							<form action="add-member-administrator.php" method="POST">
								
								<select name="super-admin">
									<?php 
									mysql_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001");
									mysql_select_db("thetaDB");
									if(mysql_errno())
										die("Database Server is Offline");
									$q=mysql_query("SELECT `last_name`, `first_name`, `id` FROM members WHERE first_name != '' ORDER BY `last_name`");
									if(mysql_num_rows($q)){
										while($m=mysql_fetch_assoc($q))
										{
											echo "<option value='" . $m['id'] . "'>" . $m['last_name'] . ", " . $m['first_name'] . "</option>";
										}        
										
									} 
									?>
								</select>
								
								<br><br>
								<input type="submit" name="submit" value="Promote"><br>
							</form>
						</div>
						<div id="member-box">
							<h3 id="admin-title">Member Administrators</h3>
							<?php   
							$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
							
							$result = mysqli_query($con,"SELECT last_name, first_name, email, id FROM admin WHERE superAdmin = 0 ORDER BY last_name");
							
						// Display members and information
							while($row = mysqli_fetch_row($result))
							{
								echo "<a href='http://www.greekamer.com/mizzou/remove-member-admin.php?num=$row[3]'><img src='http://www.greekamer.com/mizzou/images/icons/x-icon.png' id='x-icon'></a><p style='font-size: 15px; margin-bottom: 15px; padding-top: 3px; margin-left: 5px; float: left;'>$row[1] $row[0]</p>";
								echo "<div style='clear: both;'></div>";
							}	
							?>
						</div>
					</div>
				</div>
			</div><!-- /main -->
		</div><!-- /st-content-inner -->
	</div><!-- /st-content -->
</div><!-- /st-pusher -->
</div><!-- /st-container -->
<?php include("includes/footer.php"); ?>