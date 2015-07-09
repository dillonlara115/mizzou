<div class="modal fade" id="editOtherContactInformation" tabindex="-1" role="dialog" aria-labelledby="editOtherContactInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editOtherContactInformation">Update Other Parent/Guardian Contact Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="member-dashboard.php" method="POST">
			<div class="form-group">
				<label for="other_first_name">First Name: </label>
				<input type="text" class="form-control" name="other_first_name" /placeholder="<?php echo $other_first; ?>">
			</div>
			<div class="form-group">
				<label for="other_last_name">Last Name: </label>
				<input type="text" class="form-control" name="other_last_name" placeholder="<?php echo $other_last; ?>"/>
			</div>    
			<div class="form-group">
				<label for="other_address">Address:</label>
				<input type="text" class="form-control" name="other_address" placeholder="<?php echo $other_address; ?>"/>
			</div>	
			<div class="form-group">
				<label for="other_apt" >Apt:</label>
				<input type="text" class="form-control" name="other_apt" placeholder="<?php echo $other_apt; ?>"/>
			</div>    
			<div class="form-group">
				<label for="other_city">City:</label>
				<input type="text" class="form-control" name="other_city" placeholder="<?php echo $other_city; ?>"/>
			</div>
			<div class="form-group">
				<label for="other_state">State:</label>
				<input type="text" class="form-control" name="other_state" placeholder="<?php echo $other_state; ?>"/>
			</div>
			<div class="form-group">
				<label for="other_zip">Zip Code:</label>
				<input type="text" class="form-control" name="other_zip" placeholder="<?php echo $other_zip; ?>"/>
			</div>
			<div class="form-group">
				<label for="other_cell_phone">Cell Phone Number:</label>
				<input type="tel" class="form-control" name="other_cell_phone" placeholder="<?php echo $other_cell; ?>">
			</div>   
			<div class="form-group">
				<label for="relation">Relation:</label>
				<input type="text" class="form-control" name="relation" placeholder="<?php echo $other_relation; ?>">
			</div>
			    
			    <input type="submit" name="updateInfo" value="Update Information" /><br>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		</form>
      </div>
    </div>
  </div>
</div>
