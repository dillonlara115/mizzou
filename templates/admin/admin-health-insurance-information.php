<div class="modal fade" id="editHealthInsuranceInformation" tabindex="-1" role="dialog" aria-labelledby="editHealthInsuranceInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editHealthInsuranceInformation">Update Health Insurance Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="admin-dashboard.php" method="POST">
			<div class="form-group">
				<label for="health_prov">Name of Insurance Provider: </label>
				<input type="text" class="form-control" name="health_prov" placeholder="<?php echo $health_prov; ?>"/>
			</div>
			<div class="form-group">
				<label for="health_subsc">Subscriber Name: </label>
				<input type="text" class="form-control" name="health_subsc" placeholder="<?php echo $health_subsc; ?>"/>
			</div>
			<div class="form-group">
				<label for="health_subsc_employer">Subscriber Employer: </label>
				<input type="text" class="form-control" name="health_subsc_employer" placeholder="<?php echo $health_employer; ?>"/>
			</div>
			<div class="form-group">
				<label for="health_policy_no">Policy Number:</label>
				<input type="text" class="form-control" name="health_policy_no" placeholder="<?php echo $health_policy; ?>"/>
			</div>
			<div class="form-group">
				<label for="health_phone_no">Phone Number:</label>
				<input type="text" class="form-control" name="health_phone_no" placeholder="<?php echo $health_phone; ?>"/>
			</div>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</form>
      </div>
    </div>
  </div>
</div>
