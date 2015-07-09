<div class="modal fade" id="editGeneralInformation" tabindex="-1" role="dialog" aria-labelledby="editGeneralInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editGeneralInformation">Update Current General Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="admin-dashboard.php" method="POST">
			<div class="form-group">
				<label for="bday">Date of Birth:</label>
				<input type="text" class="form-control" name="bday" placeholder="<?php echo $birthday; ?>">
			</div>
			<div class="form-group">
				<label for="member_address">School Address:</label>
				<input type="text" class="form-control" name="member_address" placeholder="<?php echo $member_address; ?>"/>
			</div>
			<div class="form-group">
				<label for="member_apt">Apt:</label>
				<input type="text" class="form-control" name="member_apt" placeholder="<?php echo $member_apt; ?>"/>
			</div>
			<div class="form-group">
				<label for="member_city">City:</label>
				<input type="text" class="form-control" name="member_city" placeholder="<?php echo $member_city; ?>"/>
			</div>
			<div class="form-group">
				<label for="member_state">State:</label>
				<input type="text" class="form-control" name="member_state" placeholder="<?php echo $member_state; ?>"/>
			</div>
			<div class="form-group">
				<label for="member_zip">Zip Code:</label>
				<input type="text" class="form-control" name="member_zip" placeholder="<?php echo $member_zip; ?>"/>
			</div>
			<div class="form-group">
				<label for="member_home_phone">Home Phone Number:</label>
				<input type="tel" class="form-control" name="member_home_phone" placeholder="<?php echo $member_home; ?>">
			</div>
			<div class="form-group">
				<label for="member_cell_phone">Cell Phone Number:</label>
				<input type="tel" class="form-control" name="member_cell_phone" placeholder="<?php echo $member_cell; ?>">
			</div>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
		</form>
      </div>
    </div>
  </div>
</div>