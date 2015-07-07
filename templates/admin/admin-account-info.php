<div class="modal fade" id="editAccountInformation" tabindex="-1" role="dialog" aria-labelledby="editAccountInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editAccountInformation">Update Current Account Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="admin-dashboard.php" method="POST">
		<fieldset>
			<legend>Update Current Account Information</legend>
			<label for="email">First Name: </label><br>
			<input type="text" name="first_name" placeholder="<?php echo $first_name; ?>" /><br>
			
			<label for="email">Last Name: </label><br>
			<input type="text" name="last_name" placeholder="<?php echo $last_name; ?>"/><br>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</fieldset>
		</form>
      </div>
    </div>
  </div>
</div>
