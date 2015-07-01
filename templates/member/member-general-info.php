<div class="modal fade" id="editAccountInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Current General Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="member-dashboard.php" method="POST">
		<fieldset>
			<small style="font-size: 14px; color: gray; padding-left: 0px; margin-top: 0px;">* denotes a required field.</small>
			 Date of Birth:<br><input type="text" name="bday" placeholder="<?php echo $birthday; ?>"><br>
		    <span>School Address:</span><br><input type="text" name="member_address" placeholder="<?php echo $member_address; ?>"/><br>
		    <span>Apt:</span><br><input type="text" name="member_apt" placeholder="<?php echo $member_apt; ?>"/><br>
		    <span>City:</span><br><input type="text" name="member_city" placeholder="<?php echo $member_city; ?>"/><br>
		    <span>State:</span><br><input type="text" name="member_state" placeholder="<?php echo $member_state; ?>"/><br>
		    <span>Zip Code:</span><br><input type="text" name="member_zip" placeholder="<?php echo $member_zip; ?>"/><br>
		    <span>Home Phone Number:</span><br><input type="tel" name="member_home_phone" placeholder="<?php echo $member_home; ?>"><br>
		    <span>Cell Phone Number:</span><br><input type="tel" name="member_cell_phone" placeholder="<?php echo $member_cell; ?>"><br>
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</fieldset>
		</form>
      </div>
    </div>
  </div>
</div>