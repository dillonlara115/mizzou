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
			<div class="form-group">
				 <label for="car_make">Make: </label>
				<input type="text" class="form-control" name="car_make" placeholder="<?php echo $car_make; ?>"/>
			</div>
			<div class="form-group">
				<label for="car_model">Model: </label>
				<input type="text" class="form-control" name="car_model" placeholder="<?php echo $car_model; ?>"/>
			</div>   
			<div class="form-group">
				<label for="license">License Plate Number: </label>
				<input type="text" class="form-control" name="license" placeholder="<?php echo $car_license; ?>"/>
			</div>	
			<input type="submit" name="updateInfo" value="Update Information" /><br>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		</form>
      </div>
    </div>
  </div>
</div>
