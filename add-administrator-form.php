<?php
	//Restrict pages to admin.
	include 'init.php';
	
	if(empty($_SESSION['admin_first_name']) == TRUE ) {
		header("Location: login.php");
	}
?>
<?php $pageTitle = 'Add New Administrator'; include("includes/header.php"); ?>
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

<?php include("includes/footer.php"); ?>
