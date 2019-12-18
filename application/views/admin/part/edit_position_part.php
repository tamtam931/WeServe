<?php 
	if($position):
	$position_data = $this->Admin_model->get_position_by_id($position); 
	$sections = $this->Admin_model->get_all_sections();
    $roles = $this->Admin_model->get_all_roles();?>


	<form action="<?= base_url('admin/edit_position'); ?>" method="post" role="form" class="needs-validation">
		<input type="hidden" class="form-control" id="position_id" name = "position_id" value="<?=  $position?>">
		<div class="col-md-12 mb-3">
			<h4>Edit Checking Area</h4>
		</div>
		<div class="row">
	    	<div class="col-md-4 mb-3">
	            <label for="section">Section</label>
	            <select class="custom-select d-block w-100" id="section" name="section" required>
	            	<option value="">-- Please Choose --</option>
	            	<?php foreach($sections as $section): ?>
	              	<option value="<?= $section->id; ?>" <?php if($section->id == $position_data->section_id) { echo 'selected'; }  ?>><?= $section->section_desc; ?></option>
	              	<?php endforeach; ?>
	            </select>
	        </div>

	        <div class="col-md-4 mb-3">
	            <label for="role">Role</label>
	            <select class="custom-select d-block w-100" id="role" name="role" required>
	            	<option value="">-- Please Choose --</option>
	            	<?php foreach($roles as $role): ?>
	              	<option value="<?= $role->id; ?>" <?php if($role->id == $position_data->role_id) { echo 'selected'; }  ?>><?= $role->role_desc; ?></option>
	              	<?php endforeach; ?>
	            </select>
	        </div>
	        <div class="col-md-4 mb-3">
	            <label>Option</label><br>
	            <a href="#" data-toggle="modal" data-target="#edit_position_confirm" class="btn btn-primary my-1 my-sm-0">
		          <span class="fas fa-edit mr-1"></span>
		          Update</a>
		        <a href="#"  data-toggle="modal" data-target="#cancel_position_confirm" class="btn btn-danger my-1 my-sm-0">
		          <span class="fas fa-eraser mr-1"></span>
		          Clear</a>
	        </div>
	    </div>



		<!-- ADD PASS Confirmation Modal -->
		<div class="modal fade" id="edit_position_confirm" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       Added position will be updated, do you wish to continue?
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Yes</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of ADD PASS Confirmation Modal -->

		<!-- CANCEL ADD Confirmation Modal -->
		<div class="modal fade" id="cancel_position_confirm" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Encoded details will be deleted, do you wish to continue?
		      </div>
		      <div class="modal-footer">
		        <button type="button" onClick="alert('Updating of Areas has been successfully cancelled.'); location.reload();" data-dismiss="modal" class="btn btn-primary">Yes</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of CANCEL ADD Confirmation Modal -->


	</form>


<?php endif; ?>