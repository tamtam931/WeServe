<?php 
	if($checking_area_id):
	$checking_area = $this->Admin_model->get_checking_area_list_by_id($checking_area_id); ?>


	<form action="<?= base_url('admin/edit_checking_area_list'); ?>" method="post" role="form" class="needs-validation">
		<input type="hidden" class="form-control" id="edit_area_id" name = "edit_area_id" value="<?=  $checking_area->id ?>">
		<div class="col-md-12 mb-3">
			<h4>Edit Checking Area</h4>
		</div>
		<div class="row">
	    	<div class="col-md-6 mb-3">
	            <label for="area">Area Description</label>
	            <input type="text" class="form-control" id="area" name="area" placeholder="Area Description" value="<?= $checking_area->area_description ?>" required>
	        </div>
	     
	        <div class="col-md-6 mb-3">
	            <label for="add_area_btn">Option</label><br>
	            <a href="#" data-toggle="modal" data-target="#edit_area_list_confirm" class="btn btn-primary my-1 my-sm-0">
		          <span class="fas fa-edit mr-1"></span>
		          Update</a>
		        <a href="#"  data-toggle="modal" data-target="#cancel_area_list_confirm" class="btn btn-danger my-1 my-sm-0">Clear</a>
	        </div>
	    </div>

		<!-- ADD PASS Confirmation Modal -->
		<div class="modal fade" id="edit_area_list_confirm" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       Added area will be updated, do you wish to continue?
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
		<div class="modal fade" id="cancel_area_list_confirm" tabindex="-1" role="dialog" aria-hidden="true">
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