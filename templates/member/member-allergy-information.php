<div class="modal fade" id="editAllergyInformation" tabindex="-1" role="dialog" aria-labelledby="editAllergyInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editAllergyInformation">Edit Allergy Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="member-dashboard.php" method="POST">
		<div class="form-group">
			<label for="allergies">List any allergies:</label>
			<textarea rows="4" class="form-control" name="allergies" placeholder="<?php echo $allergies; ?>"></textarea>
		</div>

		<div class="form-group">
			<label for="allergies_med" >Are you allergic to any medications?</label>
			<textarea rows="4" class="form-control" name="medicine_allergies" placeholder="<?php echo $allergic_medication; ?>"></textarea>
		</div>			 
							
		<div class="form-group">
			<label for="current_med" style="display: block;">List any medications you are taking:</label>
			<textarea rows="4" class="form-control" name="current_medications" placeholder="<?php echo $current_medication; ?>"></textarea>
		</div>					
							
		<div class="form-group">
			<label for="allergies" style="display: block;">Do you have any health issues? If so, please indicate:</label>
			<textarea rows="4" class="form-control" name="health_issues" placeholder="<?php echo $health_issues; ?>"></textarea>
		</div>		
		<input type="submit" name="updateInfo" value="Update Information" /><br>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</form>
      </div>
    </div>
  </div>
</div>
