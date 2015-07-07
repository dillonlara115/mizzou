<div class="modal fade" id="editAutoInsuranceInformation" tabindex="-1" role="dialog" aria-labelledby="editAutoInsuranceInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editAutoInsuranceInformation">Update Auto Insurance Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="admin-dashboard.php" method="POST">
		<fieldset>
			<legend>Auto Insurance</legend>
			<label for="auto_provider">Name of Insurance Provider: </label><br>
			<input type="text" name="auto_prov" placeholder="<?php echo $auto_prov; ?>"/><br>
			<label for="other_last_name">Subscriber Name: </label><br>
			<input type="text" name="auto_subsc" placeholder="<?php echo $auto_subsc; ?>"/><br>
			<span>Subscriber Employer:</span><br><input type="text" name="auto_subsc_employer" placeholder="<?php echo $auto_employer; ?>"/><br>
			<span>Policy Number:</span><br><input type="text" name="auto_policy_no" placeholder="<?php echo $auto_policy; ?>"/><br>
			<span>Phone Number:</span><br><input type="text" name="auto_phone_no" placeholder="<?php echo $auto_phone; ?>"/><br>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</fieldset>
		</form>
      </div>
    </div>
  </div>
</div>
