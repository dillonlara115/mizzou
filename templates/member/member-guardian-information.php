<div class="modal fade" id="editGuardianInformation" tabindex="-1" role="dialog" aria-labelledby="editGuardianInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editGuardianInformation">Update Current Parent/Guardian Contact Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="member-dashboard.php" method="POST">
		<fieldset>
			<small style="font-size: 14px; color: gray; padding-left: 0px; margin-top: 0px;">* denotes a required field.</small>
		    <label for="par_first_name">First Name: </label><br>
			<input type="text" name="par_first_name" placeholder="<?php echo $parent_first; ?>"/><br>
			<label for="par_last_name">Last Name: </label><br>
			<input type="text" name="par_last_name" placeholder="<?php echo $parent_last; ?>"/><br>
		    <span>Address:</span><br><input type="text" name="par_address" placeholder="<?php echo $parent_address; ?>"/><br>
		    <span>Apt:</span><br><input type="text" name="par_apt" placeholder="<?php echo $parent_apt; ?>"/><br>
		    <span>City:</span><br><input type="text" name="par_city" placeholder="<?php echo $parent_city; ?>"/><br>
		    <span>State:</span><br><input type="text" name="par_state" placeholder="<?php echo $parent_state;?>"/><br>
		    <span>Zip Code:</span><br><input type="text" name="par_zip" placeholder="<?php echo $parent_zip; ?>"/><br>
		    <span>Home Phone Number:</span><br><input type="tel" name="par_home_phone" placeholder="<?php echo $parent_home; ?>"><br>
		    <span>Cell Phone Number:</span><br><input type="tel" name="par_cell_phone" placeholder="<?php echo $parent_cell; ?>"><br>
		   <input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</fieldset>
		</form>
      </div>
    </div>
  </div>
</div>
