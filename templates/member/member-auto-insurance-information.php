<div class="modal fade" id="editAutoInsuranceInformation" tabindex="-1" role="dialog" aria-labelledby="editAutoInsuranceInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editAutoInsuranceInformation">Update Auto Insurance Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="member-dashboard.php" method="POST">
			<div class="form-group">
				<label for="auto_provider">Name of Insurance Provider: </label>
				<input type="text" class="form-control" name="auto_prov" placeholder="<?php echo $auto_prov; ?>"/>
			</div>
		    <div class="form-group">
		    	<label for="other_last_name">Subscriber Name: </label>
				<input type="text" class="form-control" name="auto_subsc" placeholder="<?php echo $auto_subsc; ?>"/>
		    </div>
			<div class="form-group">
				<label for="auto_subsc_employer">Subscriber Employer:</label>
				<input type="text" class="form-control" name="auto_subsc_employer" placeholder="<?php echo $auto_employer; ?>"/>
			</div>
		    <div class="form-group">
		    	<label for="auto_policy_no">Policy Number:</label>
		    	<input type="text" class="form-control" name="auto_policy_no" placeholder="<?php echo $auto_policy; ?>"/>
		    </div>
		    <div class="form-group">
		    	<label for="auto_phone_no">Phone Number:</label>
		    	<input type="text" class="form-control" name="auto_phone_no" placeholder="<?php echo $auto_phone; ?>"/>
		    </div>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</form>
      </div>
    </div>
  </div>
</div>
