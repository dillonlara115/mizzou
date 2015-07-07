<div class="modal fade" id="editAllergyInformation" tabindex="-1" role="dialog" aria-labelledby="editAllergyInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editAllergyInformation">Edit Allergy Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="admin-dashboard.php" method="POST">
		<fieldset>
			<legend>Update Current Allergies</legend>
			<label for="allergies" style="display: block;">List any allergies:</label><br>
			<textarea rows="4" cols="50" name="allergies" placeholder="<?php echo $allergies; ?>"></textarea>

			<label for="allergies_med" style="display: block;">Are you allergic to any medications?</label><br>
			<textarea rows="4" cols="50" name="medicine_allergies" placeholder="<?php echo $allergic_medication; ?>"></textarea>

			<label for="current_med" style="display: block;">List any medications you are taking:</label><br>
			<textarea rows="4" cols="50" name="current_medications" placeholder="<?php echo $current_medication; ?>"></textarea>

			<label for="allergies" style="display: block;">Do you have any health issues? If so, please indicate:</label><br>
			<textarea rows="4" cols="50" name="health_issues" placeholder="<?php echo $health_issues; ?>"></textarea><br>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</fieldset>
		</form>
      </div>
    </div>
  </div>
</div>
