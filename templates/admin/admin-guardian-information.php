<div class="modal fade" id="editGuardianInformation" tabindex="-1" role="dialog" aria-labelledby="editGuardianInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editGuardianInformation">Update Current Parent/Guardian Contact Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="admin-dashboard.php" method="POST">
			<div class="form-group">
				<label for="par_first_name">First Name: </label>
				<input type="text" class="form-control" name="par_first_name" placeholder="<?php echo $parent_first; ?>"/>
			</div>
			<div class="form-group">
				<label for="par_last_name">Last Name: </label>
				<input type="text" class="form-control" name="par_last_name" placeholder="<?php echo $parent_last; ?>"/>
			</div>
			<div class="form-group">
				<label for="par_address">Address: </label>
				<input type="text" class="form-control" name="par_address" placeholder="<?php echo $parent_address; ?>"/>
			</div>
			<div class="form-group">
				<label for="par_apt">Apt: </label>
				<input type="text" class="form-control" name="par_apt" placeholder="<?php echo $parent_apt; ?>"/>
			</div>
			<div class="form-group">
				<label for="par_city">City: </label>
				<input type="text" class="form-control" name="par_city" placeholder="<?php echo $parent_city; ?>"/>
			</div>
			<div class="form-group">
				<label for="par_state">State: </label>
				<input type="text" class="form-control" name="par_state" placeholder="<?php echo $parent_state;?>"/>
			</div>
			<div class="form-group">
				<label for="par_zip">Zip Code: </label>
				<input type="text" class="form-control" name="par_zip" placeholder="<?php echo $parent_zip; ?>"/>
			</div>
			<div class="form-group">
				<label for="par_home_phone">Home Phone Number:</label>
				<input type="tel" class="form-control" name="par_home_phone" placeholder="<?php echo $parent_home; ?>">
			</div>
			<div class="form-group">
				<label for="par_cell_phone">Cell Phone Number:</label>
				<input type="tel" class="form-control" name="par_cell_phone" placeholder="<?php echo $parent_cell; ?>">
			</div>
			
		   <input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
		</form>
      </div>
    </div>
  </div>
</div>
