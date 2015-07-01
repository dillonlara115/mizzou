<div class="modal fade" id="editAccountInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Current Account Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="member-dashboard.php" method="POST">
		<fieldset>
			<small style="font-size: 14px; color: gray; padding-left: 0px; margin-top: 0px;">* denotes a required field.</small>
			<label for="email">*First Name: </label><br>
			<input type="text" name="first_name" placeholder="<?php echo $first_name; ?>" /><br>
			
			<label for="email">*Last Name: </label><br>
			<input type="text" name="last_name" placeholder="<?php echo $last_name; ?>"/><br>
			
			<label for="season">*Time of Graduation (Spring/Fall): </label><br>
			<input type="text" name="season" placeholder="<?php echo $season; ?>"/><br>
			
			<label for="yearGraduate">*Year of Graduation: </label><br>
			<input type="text" name="yearGraduate" placeholder="<?php echo $yearGraduate; ?>"/><br>
		
			<label for="pledgeClass">*Pledge Class: </label><br>
			<input type="text" name="pledgeClass" placeholder="<?php echo $pledgeClass; ?>"/><br><br>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</fieldset>
		</form>
      </div>
    </div>
  </div>
</div>
