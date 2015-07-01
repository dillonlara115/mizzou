<?php
	//Restrict pages to admin.
include 'init.php';

if(empty($_SESSION['admin_first_name']) == TRUE ) {
	header("Location: login.php");
}
?>
<?php $pageTitle = 'Add Members'; include("includes/header.php"); ?>

<div>
	<div class="center-bucket">
		<h4>Add Members</h4>
		<p style="font-style: italic; font-size: 13px;">Enter each email followed by a comma with no spaces.</p>
		<form action="add-multiple-users.php" method="POST">
			<textarea rows="8" cols="50" name="users" placeholder="example@example.com,example2@example2.com"></textarea><br>
			<input type="submit" name="submitNewUser" value="Add Members" />
			<?php if($_GET['addedMultiple'] == 1) {
				echo "Emails sent successfully!";
			}
			?>
		</form>
		
		<form action="csv-add-users.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="btn_submit" value="Upload File" />
			<?php if($_GET['csv'] == 1) {
				echo "Emails sent successfully!";
			}
			?>
		</form>
	</div>
	
	<div>
		
		<div class="center-bucket">
			<h4>Add Administrator</h4>
			<br>
			<form action="add-administrator.php" method="POST">
				Email: <input type="text" name="newAdmin"/><br><br>
				<input type="submit" name="submit" value="Add New Administrator"><br>
			</form>
		</div>
	</div>
</div>
<?php include("includes/footer.php"); ?>