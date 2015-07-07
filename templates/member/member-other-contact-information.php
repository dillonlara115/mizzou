<div class="modal fade" id="editOtherContactInformation" tabindex="-1" role="dialog" aria-labelledby="editOtherContactInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editOtherContactInformation">Update Other Parent/Guardian Contact Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="member-dashboard.php" method="POST">
			<fieldset>
			    <legend>Other Emergency Contact Information</legend>
			    <label for="other_first_name">First Name: </label><br>
				<input type="text" name="other_first_name" /placeholder="<?php echo $other_first; ?>"><br>
				<label for="other_last_name">Last Name: </label><br>
				<input type="text" name="other_last_name" placeholder="<?php echo $other_last; ?>"/><br>
			    <span>Address:</span><br><input type="text" name="other_address" placeholder="<?php echo $other_address; ?>"/><br>
			    <span>Apt:</span><br><input type="text" name="other_apt" placeholder="<?php echo $other_apt; ?>"/><br>
			    <span>City:</span><br><input type="text" name="other_city" placeholder="<?php echo $other_city; ?>"/><br>
			    <span>State:</span><br><input type="text" name="other_state" placeholder="<?php echo $other_state; ?>"/><br>
			    <span>Zip Code:</span><br><input type="text" name="other_zip" placeholder="<?php echo $other_zip; ?>"/><br>
			    <span>Cell Phone Number:</span><br><input type="tel" name="other_cell_phone" placeholder="<?php echo $other_cell; ?>"><br>
			    <span>Relation:</span><br><input type="text" name="relation" placeholder="<?php echo $other_relation; ?>"><br>
			    <input type="submit" name="updateInfo" value="Update Information" /><br>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</fieldset>
		</form>
      </div>
    </div>
  </div>
</div>
