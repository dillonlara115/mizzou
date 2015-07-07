<div class="modal fade" id="editCarInformation" tabindex="-1" role="dialog" aria-labelledby="editCarInformation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editCarInformation">Update Vehicle Information</h4>
      </div>
      <div class="modal-body">
        <!--Edit Box -->
        <form class='admin-form' action="admin-dashboard.php" method="POST">
			<fieldset>
			    <legend>Update Vehicle Information</legend>
			    <label for="make">Make: </label><br>
				<input type="text" name="car_make" placeholder="<?php echo $car_make; ?>"/><br>
				<label for="model">Model: </label><br>
				<input type="text" name="car_model" placeholder="<?php echo $car_model; ?>"/><br>
				<label for="model">License Plate Number: </label><br>
				<input type="text" name="license" placeholder="<?php echo $car_license; ?>"/><br>
				<input type="submit" name="updateInfo" value="Update Information" /><br>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</fieldset>
		</form>
      </div>
    </div>
  </div>
</div>
