<div class="modal fade" id="editAccountInformation" tabindex="-1" role="dialog" aria-labelledby="editAccountInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editAccountInformation">Update Current Account Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="admin-dashboard.php" method="POST">
		      <div class="form-group">
            <label for="first_name">First Name: </label><br>
            <input type="text" class="form-control" name="first_name" placeholder="<?php echo $first_name; ?>" /><br>
          </div>
		      <div class="form-group">
            <label for="last_name">Last Name: </label><br>
            <input type="text" class="form-control" name="last_name" placeholder="<?php echo $last_name; ?>"/><br>
          </div>
          <input type="submit" name="updateInfo" value="Update Information" /><br>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </form>
      </div>
    </div>
  </div>
</div>
