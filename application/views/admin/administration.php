<?= $this->load->view('top', '', TRUE) ?>

<div class="container py-5 mb5">
  <h3 class="mb-3">ADMINISTRATION</h3>

  	<div class="row">
	    <div class="col-md-2">
	        <div class="list-group">
	          <a href="#accounts_management" id="btn_accts" role="button" class="list-group-item list-group-item-action active"> Accounts Management </a>
	          <a href="#unit_type_management" id="btn_unit" role="button" class="list-group-item list-group-item-action"> Unit Type Management </a>
	          <a href="#turnover_management" id="btn_turnover" role="button" class="list-group-item list-group-item-action"> Turnover Management </a>
	          <a href="#list_values" id="btn_list" role="button" class="list-group-item list-group-item-action"> List of Values</a>
	          <a href="#change_password" id="btn_pwrd" role="button" class="list-group-item list-group-item-action">Change Password</a>
	        </div>
	    </div>
	  
	    <?php 
		$edit_user = $this->input->get('edit_id');
		$edit_data = $this->Admin_model->get_user_by_id($edit_user);?>

	    <div class="col-md-10" id="accounts_management">
	    	<div id = "add_user_div">
	    		<?php if(!$edit_data) :?>
		    	<form action="<?= base_url('admin/add_user'); ?>" method="post" role="form" class="needs-validation">
		    		<input type="hidden" class="form-control" id="user_id" name = "user_id" value="<?= user('id'); ?>">
	        		<div class="row">
				    	<div class="col-md-4 mb-3">
				            <label for="firstname">First Name <span style="color:red;">*</span></label>
				            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" value="" required>
				        </div>
				        <div class="col-md-4 mb-3">
				            <label for="middlename">Middle Name</label>
				            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="" value="">
				        </div>
				        <div class="col-md-4 mb-3">
				            <label for="lastname">Last Name <span style="color:red;">*</span></label>
				            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" value="" required>
				        </div>
				    </div>

				    <div class="row">
				    	<div class="col-md-4 mb-3">
					    	<label for="position">Position <span style="color:red;">*</span></label>
				            <select class="custom-select d-block w-100" id="position" name="position" required>
				            	<?php foreach($positions as $position): ?>
				              	<option value="<?= $position->id; ?>"><?= $position->position_desc; ?></option>
				              	<?php endforeach; ?>
				            </select>
					    </div>

					    <div class="col-md-4 mb-3" id="extension_number_div">
				            <label for="extension_number">Extension Number</label>
				            <input type="text" class="form-control" id="extension_number" name="extension_number" placeholder="" value="1002">
				        </div>

				    </div>
				   
				    <div class="row">
					   	<div class="col-md-4 mb-3">
				            <label for="email_address">Email Address<span style="color:red;">*</span></label>
				            <input type="email" class="form-control" id="email_address" name="email_address" placeholder="" value="" required>
				        </div>

				        <div class="col-md-4 mb-3">
				            <label for="mobile_number">Mobile Number<span style="color:red;">*</span></label>
				            <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="eg. 09123456789" value="" pattern="09[0-9]{9}" title="Sample format: 09123456789" required>
				        </div>
				    </div>
				    

				    <div class = "row">
					    <div class="col-md-4 mb-3">
				            <label for="username">Username <span style="color:red;">*</span></label>
				            <div class="input-group">
					            <div class="input-group-prepend">
					              <span class="input-group-text"><i class="fa fa-address-card"></i></span>
					            </div>
					            <input type="text" class="form-control" id="username" name="username" placeholder="Username" readonly>
					        </div>
				        </div>

				         <div class="col-md-4 mb-3">
				            <label for="username">Password <span style="color:red;">*</span></label>
				            <div class="input-group">
					            <div class="input-group-prepend">
					              <span class="input-group-text"><i class="fa fa-lock"></i></span>
					            </div>
					            <input type="password" class="form-control" id="password" name="password" minlength="8" pattern="^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$" placeholder="Password" value="" title="- Password must be minimum of 8 characters. Combination of Alphabet, Numeric and Special Characters. Combination of Uppercase and Lowercase Letters" required>
					        </div>
				        </div>
				    </div>
			        <div class="col-md-6 mb-3 float-right">
	       				<button class="btn btn-dark my-2 mr-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#saveConfirm">Save</button>
	       				<button class="btn btn-outline-dark my-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#cancelConfirm">Cancel</button>
	       			</div>

	       			<!-- Confirmation Modal -->
					<div class="modal fade" id="saveConfirm" tabindex="-1" role="dialog" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title">Confirmation</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        Details of new user will be saved, do you wish to continue?
					      </div>
					      <div class="modal-footer">
					        <button type="submit" class="btn btn-primary">Yes</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- End of Confirmation Modal -->

					<!-- CANCEL Confirmation Modal -->
					<div class="modal fade" id="cancelConfirm" tabindex="-1" role="dialog" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title">Confirmation</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        Details of new user will not be saved, do you wish to continue? 
					      </div>
					      <div class="modal-footer">
					        <button type="button" onClick="alert('Adding of new user has been successfully cancelled.');form.reset();" class="btn btn-primary" data-dismiss="modal" >Yes</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- End of CANCEL Confirmation Modal -->

				</form>
				<?php endif; ?>

			</div>


			<div id = "edit_user_div">
				
				<?php if($edit_data) :?>
		    	<form action="<?= base_url('admin/update_user'); ?>" method="post" role="form" class="needs-validation">
		    		<input type="hidden" class="form-control" id="user_id" name = "user_id" value="<?= user('id'); ?>">
		    		<input type="hidden" class="form-control" id="edit_user_id" name = "edit_user_id" value="<?= $edit_data->user_id; ?>">
	        		<div class="row">
				    	<div class="col-md-4 mb-3">
				            <label for="firstname">First Name <span style="color:red;">*</span></label>
				            <input type="text" class="form-control" id="efirstname" name="firstname" placeholder="" value="<?= $edit_data->firstname; ?>" required>
				        </div>
				        <div class="col-md-4 mb-3">
				            <label for="middlename">Middle Name</label>
				            <input type="text" class="form-control" id="emiddlename" name="middlename" placeholder="" value="<?= $edit_data->middlename; ?>">
				        </div>
				        <div class="col-md-4 mb-3">
				            <label for="lastname">Last Name <span style="color:red;">*</span></label>
				            <input type="text" class="form-control" id="elastname" name="lastname" placeholder="" value="<?= $edit_data->lastname; ?>" required>
				        </div>
				    </div>

				    <div class="row">
					    <div class="col-md-4 mb-3">
					    	 <label for="position">Position <span style="color:red;">*</span></label>
				            <select class="custom-select d-block w-100" id="eposition" name="position" disabled>
				            	<?php foreach($positions as $position): $text = "";?>
				            	<?php if($position->id == $edit_data->position): $text = "selected"; endif; ?>
				              	<option value="<?= $position->id; ?>" <?= $text ?>><?= $position->position_desc; ?></option>
				              	<?php endforeach; ?>
				            </select>
					    </div>

					    <div class="col-md-4 mb-3">
				            <label for="extension_number">Extension Number</label>
				            <input type="text" class="form-control" id="extension_number" name="extension_number" placeholder="" value="<?= $edit_data->extension_number ?>">
				        </div>
					</div>

					<div class="row">
						<div class="col-md-4 mb-3">
				            <label for="email_address">Email Address<span style="color:red;">*</span></label>
				            <input type="email" class="form-control" id="email_address" name="email_address" placeholder="" value="<?= $edit_data->email_address ?>" required>
				        </div>

				        <div class="col-md-4 mb-3">
				            <label for="mobile_number">Mobile Number<span style="color:red;">*</span></label>
				            <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="e.g. 09123456780" value="<?= $edit_data->mobile_number ?>" title="Sample Format: 09123456789" pattern="09[0-9]{9}" required>
				        </div>

					</div>

				    <div class = "row">
					    <div class="col-md-4 mb-3">
				            <label for="username">Username <span style="color:red;">*</span></label>
				            <div class="input-group">
					            <div class="input-group-prepend">
					              <span class="input-group-text"><i class="fa fa-address-card"></i></span>
					            </div>
					            <input type="text" class="form-control" id="eusername" name="username" placeholder="Username" value="<?= $edit_data->username; ?>" readonly>
					        </div>
				        </div>

				         <div class="col-md-4 mb-3">
				            <label for="username">Password <span style="color:red;">*</span></label>
				            <div class="input-group">
					            <div class="input-group-prepend">
					              <span class="input-group-text"><i class="fa fa-lock"></i></span>
					            </div>
					            <input type="password" class="form-control" id="epassword" name="password" minlength="8" value="<?= $edit_data->password; ?>" placeholder="Password" readonly>
					        </div>
				        </div>

				        <div class="col-md-4 mb-3">
					    	 <label for="estatus">Status <span style="color:red;">*</span></label>
				            <select class="custom-select d-block w-100" id="estatus" name="status">
				            	<?php $text1 = ""; $text2 = "";?>
				            	<?php if($edit_data->status == 1): $text1 = "selected"; else: $text2 = "selected"; endif; ?>
				              	<option value="1" <?= $text1 ?>>ACTIVE</option>
				              	<option value="0" <?= $text2 ?>>DEACTIVATED</option>
				            </select>
					    </div>

				    </div>
			        <div class="col-md-6 mb-3 float-right">
	       				<button class="btn btn-dark my-2 mr-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#updateConfirm">Update</button>
	       				<button class="btn btn-outline-dark my-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#cancelEditConfirm">Cancel</button>
	       			</div>

	       			<!-- Confirmation Modal -->
					<div class="modal fade" id="updateConfirm" tabindex="-1" role="dialog" aria-hidden="true">
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
					<!-- End of Confirmation Modal -->

					<!-- CANCEL EDIT Confirmation Modal -->
					<div class="modal fade" id="cancelEditConfirm" tabindex="-1" role="dialog" aria-hidden="true">
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
					        <button type="button" onClick="alert('Saving of changes made has been successfully cancelled.'); window.location.replace('<?= base_url('admin/administration/'); ?>');" class="btn btn-primary" data-dismiss="modal">Yes</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- End of CANCEL EDIT Confirmation Modal -->

				</form>
			<?php endif; ?>
				
			</div>

			
	    	<table class="table" id="users_table">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">Username</th>
			      <th scope="col">First Name</th>
			      <th scope="col">Middle Name</th>
			      <th scope="col">Last Name</th>
			      <th scope="col">Position</th>
			      <th scope="col">Status</th>
			      <th scope="col">Option</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php foreach($users as $user): ?>
			    <tr>
			   	  <th scope="row"><?= $user->username ?></th>
			      <th scope="row"><?= $user->firstname ?></th>
			      <th scope="row"><?= $user->middlename ?></th>
			      <th scope="row"><?= $user->lastname ?></th>
			      <th scope="row"><?= $user->position_desc ?></th>
			      <th scope="row"><?php
			      	if($user->status == 1) {
			      		echo "ACTIVE";
			      	} else {
			      		echo "DEACTIVATED";
			      	}
			      ?></th>
			      <td>
			      	<?php
			      	// get position og logon user
			      	if(user('position') > 0) :
			      		$logon_user_position = $this->Admin_model->get_position_by_id(user('position'));
				      	$table_item_user_position = $this->Admin_model->get_position_by_id($user->position_id);
				      	?>

				      	<?php if(user('position') != 1) :  ?>
					      	<?php if($logon_user_position->role_id < $table_item_user_position->role_id): ?>
					      		<?php if($logon_user_position->section_id == $table_item_user_position->section_id): ?>
						        <a href="<?= base_url('admin/administration/?edit_id='.$user->user_id); ?>" class="btn btn-sm btn-primary my-1 my-sm-0">
						          <span class="fas fa-edit mr-1"></span>
						          Edit</a>
						        <a href="#" data-toggle="modal" data-target="#deleteConfirm<?= $user->user_id; ?>" class="btn btn-sm btn-danger my-1 my-sm-0">
						          <span class="fas fa-trash mr-1"></span>
						          Delete</a>
						         <?php endif;?>
					        <?php endif;?>
					    <?php else: ?>
					    	 <a href="<?= base_url('admin/administration/?edit_id='.$user->user_id); ?>" class="btn btn-sm btn-primary my-1 my-sm-0">
					          <span class="fas fa-edit mr-1"></span>
					          Edit</a>
					        <a href="#" data-toggle="modal" data-target="#deleteConfirm<?= $user->user_id; ?>" class="btn btn-sm btn-danger my-1 my-sm-0">
					          <span class="fas fa-trash mr-1"></span>
					          Delete</a>

					    <?php endif;?>
					    <?php else: ?>
					    	<!-- ADMINISTRATOR -->
					    	<a href="<?= base_url('admin/administration/?edit_id='.$user->user_id); ?>" class="btn btn-sm btn-primary my-1 my-sm-0">
					          <span class="fas fa-edit mr-1"></span>
					          Edit</a>
					        <a href="#" data-toggle="modal" data-target="#deleteConfirm<?= $user->user_id; ?>" class="btn btn-sm btn-danger my-1 my-sm-0">
					          <span class="fas fa-trash mr-1"></span>
					          Delete</a>
						<?php endif;?>
			      </td>
			    </tr>


			    <!-- DELETE Confirmation Modal -->
				<div class="modal fade" id="deleteConfirm<?= $user->user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Confirmation</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      	<form action="<?= base_url('admin/delete_user'); ?>" method="post" role="form">
				      	<input type="hidden" class="form-control" id="the_user_id<?= $user->user_id; ?>" name = "the_user_id" value="<?= $user->user_id; ?>">
					      <div class="modal-body">
					        You are going to delete this account, do you wish to continue?
					      </div>
					      <div class="modal-footer">
					        <button type="submit" class="btn btn-primary">Yes</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					      </div>
				  		</form>
				    </div>
				  </div>
				</div>
				<!-- End of DELETE Confirmation Modal -->

			   <?php endforeach; ?>
			  
			  
			  
			  </tbody>
			</table>
	    </div>

	    <div class="col-md-10" id="change_password">
	    	<?= $this->load->view('admin/part/administration_change_password_part', '', TRUE) ?>

	    </div>

	    <div class="col-md-10" id="unit_type_management">
	    	<?= $this->load->view('admin/part/administration_unit_type_part', '', TRUE) ?>

	    </div>

	    <div class="col-md-10" id="turnover_management">
	    	<?= $this->load->view('admin/part/administration_turnover_part', '', TRUE) ?>
	    </div>

	    <div class="col-md-10" id="list_values">
	    	<?= $this->load->view('admin/part/administration_list_values_part', '', TRUE) ?>
	    </div>



	</div>

</div>

<?= $this->load->view('admin/part/administration_script', '', TRUE) ?>