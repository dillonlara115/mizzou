<div class="modal fade" id="editAccountInformation" tabindex="-1" role="dialog" aria-labelledby="editAccountInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editAccountInformation">Update Current Account Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="member-dashboard.php" method="POST">
		
			<small style="font-size: 14px; color: gray; padding-left: 0px; margin-top: 0px;">* denotes a required field.</small>
			<div class="form-group">
				<label for="email">*First Name: </label>
				<input type="text" class="form-control" name="first_name" placeholder="<?php echo $first_name; ?>" />	
			</div>
			<div class="form-group">				
				<label for="email">*Last Name: </label>
				<input type="text" name="last_name" class="form-control" placeholder="<?php echo $last_name; ?>"/>
			</div>
			<div class="form-group">
				<label for="season">*Time of Graduation (Spring/Fall): </label>
				<input type="text" name="season" class="form-control" placeholder="<?php echo $season; ?>"/>
			</div>
			<div class="form-group">
				<label for="yearGraduate">*Year of Graduation: </label><br>
				<input type="text" class="form-control" name="yearGraduate" placeholder="<?php echo $yearGraduate; ?>"/>
			</div>
			<div class="form-group">
				<label for="pledgeClass">*Pledge Class: </label>
				<input type="text" name="pledgeClass" class="form-control" placeholder="<?php echo $pledgeClass; ?>"/>
			</div>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
		</form>
      </div>
    </div>
  </div>
</div>
