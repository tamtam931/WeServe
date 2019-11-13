<div id = "change_password_div">
	<form action="<?= base_url('admin/change_password'); ?>" method="post" role="form" class="needs-validation">
		<input type="hidden" class="form-control" id="user_id" name = "user_id" value="<?= user('id') ?>">
	
	    <div class = "row">
		    <div class="col-md-6 mb-5">
	            <label for="username">Username <span style="color:red;">*</span></label>
	            <div class="input-group">
		            <div class="input-group-prepend">
		              <span class="input-group-text"><i class="fa fa-address-card"></i></span>
		            </div>
		            <input type="text" class="form-control" id="username" name="username" value="<?= user('username') ?>" placeholder="Username" readonly>
		        </div>
	        </div>

	        <div class="col-md-6 mb-5">
	            <label for="username">Current Password <span style="color:red;">*</span></label>
	            <div class="input-group">
		            <div class="input-group-prepend">
		              <span class="input-group-text"><i class="fa fa-lock"></i></span>
		            </div>
		            <input type="password" class="form-control" id="current_password" name="current_password" minlength="8" pattern="^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$" placeholder="Password" value="" title="- Password must be minimum of 8 characters. Combination of Alphabet, Numeric and Special Characters. Combination of Uppercase and Lowercase Letters" required>
		        </div>
	        </div>
	        <hr>
	        

	        <ul>
	        	<span>Please enter and confirm your new password following the below rules: </span>
	        	<li> Minimum of 8 characters </li>
	        	<li> Combination of alphabet, number and special character </li>
	        	<li> Combination of upper and lowercase</li>
	        </ul>
	        
	        <div class="col-md-6 mb-5">
	            <label for="username">New Password <span style="color:red;">*</span></label>
	            <div class="input-group">
		            <div class="input-group-prepend">
		              <span class="input-group-text"><i class="fa fa-lock"></i></span>
		            </div>
		            <input type="password" class="form-control" id="new_password" name="new_password" minlength="8" pattern="^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$" placeholder="Password" value="" title="- Password must be minimum of 8 characters. Combination of Alphabet, Numeric and Special Characters. Combination of Uppercase and Lowercase Letters" required>
		        </div>
	        </div>

	        <div class="col-md-6 mb-5">
	            <label for="username">Re-type New Password <span style="color:red;">*</span></label>
	            <div class="input-group">
		            <div class="input-group-prepend">
		              <span class="input-group-text"><i class="fa fa-lock"></i></span>
		            </div>
		            <input type="password" class="form-control" id="retype_password" name="retype_password" minlength="8" pattern="^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$" placeholder="Password" value="" title="- Password must be minimum of 8 characters. Combination of Alphabet, Numeric and Special Characters. Combination of Uppercase and Lowercase Letters" required>
		        </div>
	        </div>

	       
	    </div>

      	<div class="col-md-6 mb-3 float-right">
				<button class="btn btn-dark my-2 mr-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#changePassConfirm">Update</button>
				<button class="btn btn-outline-dark my-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#cancelPassConfirm">Cancel</button>
			</div>

			<!-- CHANGE PASS Confirmation Modal -->
		<div class="modal fade" id="changePassConfirm" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Changes made will be saved, do you wish to continue?
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Yes</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of CHANGE PASS Confirmation Modal -->

		<!-- CANCEL CHANGE PASS Confirmation Modal -->
		<div class="modal fade" id="cancelPassConfirm" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Changes made will not be saved, do you wish to continue? 
		      </div>
		      <div class="modal-footer">
		        <button type="button" onClick="alert('Saving of changes made has been successfully cancelled.'); form.reset();" data-dismiss="modal" class="btn btn-primary">Yes</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of CANCEL CHANGE PASS Confirmation Modal -->

	</form>

	
</div>