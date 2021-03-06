<?php
	//Restrict pages to admin.
include 'init.php';

if(empty($_SESSION['admin_first_name']) == TRUE ) {
	header("Location: login.php");
}
?>

<?php $pageTitle = 'Archived Members'; include("includes/header.php"); ?>
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
					<h4 style="margin-bottom: 10px;">Archive Members For:</h4>
					<p style="font-size: 15px; font-style: italic;">This action will prevent all users in the chosen time from logging in. Archiving is based on graduation year.</p><br>
					<form action="archive.php" method="POST">
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
						</select><br><br>
						<input type="submit" name="archive" value="Archive Members" />
					</form>

					<?php if($_GET['archive'] == 1) {
						echo "Members have been set as inactive in the system!";
					}
					?>	
					
					<h4 style="margin-bottom: 10px;">Unarchive Members For:</h4>
					<p style="font-size: 15px; font-style: italic;">This action will allow all users currently archived in the chosen time to log in.</p><br>
					<form action="unarchive.php" method="POST">
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
						</select><br><br>
						<input type="submit" name="archive" value="Unarchive Members" />
					</form>

					<?php if($_GET['yearUnarchive'] == 1) {
						echo "Members have been activated in the system!";
					}
					?>	
					
					<h4>Lookup Members for:</h4>
					<form action="archive-members-form.php" method="POST">
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
						</select><br><br>
						<input type="submit" name="archive-lookup" value="Lookup" />
					</form>
					
					<?php if($_GET['unarchive'] == 1) {
						echo "Members have been activated in the system!";
					}
					?>	
					
					<?php
					if(isset($_POST['archive-lookup'])) {
		//Get selected graduation year and season.
						$season = $_POST['season'];
						$yearGraduate = $_POST['yearGraduate'];
						
						$con= mysqli_connect("thetaDB.db.9489000.hostedresource.com","thetaDB","Venta#1001","thetaDB");
						
						$result = mysqli_query($con,"SELECT members.first_name, members.last_name, members.id, members.email, members.pledge_class, members.archive, members.active FROM members WHERE graduation_season LIKE '$season' AND graduation_year = $yearGraduate");
						
						$row = mysqli_fetch_row($result);
						
						if(empty($row) == FALSE) {
							echo "<hr><div class='form-inline'>
								<div class='form-group'>
									<label for='search'>Search for a profile</label>
							        <input id='search' name='search' placeholder='Start typing here' type='text' class='form-control' data-list='.default_list' autocomplete='off'>
								</div>
							</div>
							<br><table id='myTable' class='table table-hover table-bordered table-striped tablesorter'><thead><tr><th>Name</th><th>Email</th><th>Pledge Class</th><th>Unarchive Member</th></tr><thead><tbody class='default_list'>";
		
							$resultReal = mysqli_query($con,"SELECT members.first_name, members.last_name, members.id, members.email, members.pledge_class, members.archive, members.active FROM members WHERE graduation_season LIKE '$season' AND graduation_year = $yearGraduate");
							
							while($row = mysqli_fetch_row($resultReal))
							{
								if($row[5] == 1 && $row[6] == 0) {
									$value = 'archived';
									
								} elseif($row[5] == 0 && $row[6] == 1) {
									$value = 'active';
									
								}
								echo "
								<tr>
									<td><a href='http://greekamer.com/mizzou/profile-overview.php?id=$row[2]'>$row[0] $row[1]</a></td>
									<td>$row[3]</td>
									<td>$row[4]</td>
									<td>";?>

									<?php if($value == 'archived') {?> 
										<a class='btn btn-primary' href='http://greekamer.com/mizzou/unarchive-member.php?id=<?php echo $row[2]?>'>Unarchive</a>status: <?php echo $value; ?></td>
									<?php } else { ?> 

										<a class='btn btn-danger' href='http://greekamer.com/mizzou/archive-member.php?id=<?php echo $row[2]?>'>Archive</a>status: <?php echo $value; ?> </td>

									<?php } ?>
								</tr>
								<?php ;
							}
							
							echo "</tbody></table>";
						}
						
	//Display each user with button to unarchive.
					}
					?>
				</div>

			</div><!-- /main -->
		</div><!-- /st-content-inner -->
	</div><!-- /st-content -->
</div><!-- /st-pusher -->
</div><!-- /st-container -->
<?php include("includes/footer.php"); ?>