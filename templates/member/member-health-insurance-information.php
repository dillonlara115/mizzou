<div class="modal fade" id="editHealthInsuranceInformation" tabindex="-1" role="dialog" aria-labelledby="editHealthInsuranceInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editHealthInsuranceInformation">Update Health Insurance Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="member-dashboard.php" method="POST">
		<fieldset>
			<legend>Update Health Insurance Information</legend>
		    <label for="health_provider">Name of Insurance Provider: </label><br>
			<input type="text" name="health_prov" placeholder="<?php echo $health_prov; ?>"/><br>
			<label for="other_last_name">Subscriber Name: </label><br>
			<input type="text" name="health_subsc" placeholder="<?php echo $health_subsc; ?>"/><br>
		    <span>Subscriber Employer:</span><br><input type="text" name="health_subsc_employer" placeholder="<?php echo $health_employer; ?>"/><br>
		    <span>Policy Number:</span><br><input type="text" name="health_policy_no" placeholder="<?php echo $health_policy; ?>"/><br>
		    <span>Phone Number:</span><br><input type="text" name="health_phone_no" placeholder="<?php echo $health_phone; ?>"/><br>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</fieldset>
		</form>
      </div>
    </div>
  </div>
</div>
