<?php 
	if($distance_id):
	$distance = $this->Admin_model->get_project_distance_by_id($distance_id); 
	$projects = $this->Admin_model->get_projects();?>


	<form action="<?= base_url('admin/edit_project_distance'); ?>" method="post" role="form" class="needs-validation">
		<input type="hidden" class="form-control" id="distance_id" name = "distance_id" value="<?=  $distance_id ?>">
		<input type="hidden" class="form-control" id="project_fr" name = "project_fr" value="<?=  $distance->project_fr_id; ?>">
		<div class="col-md-4 mb-3">
			<h4>Edit Distance</h4>
		</div>
		<div class="row">
	    	<div class="col-md-3 mb-3">
	            <label for="project">From</label>
	            <input type="text" class="form-control" id="project" name="project" value="<?= $distance->project_fr; ?>" readonly>
	        </div>

	        <div class="col-md-3 mb-3">
	            <label for="to_project">To</label>
	            <select class="custom-select d-block w-100" id="to_project" name="to_project" disabled>
	            	<option value="">-- Please Choose --</option>
	            	<?php foreach($projects as $project): ?>
	              	<option value="<?= $project->id ?>" <?php if($project->id == $distance->to_id){ echo 'selected'; } ?>><?= $project->project; ?></option>
	              	<?php endforeach; ?>
	            </select>
	        </div>

	        <div class="col-md-3 mb-3">
	            <label for="distance">Distance</label>
	            <input type="text" class="form-control" id="distance" name="distance" placeholder="Distance (KM)" value="<?= $distance->distance ?>">
	            <a href="https://www.distancefromto.net/" target="_blank"><span class="fa fa-external-link-alt"></span> Computation Guide</a>
	        </div>
	       
	        <div class="col-md-3 mb-3">
	            <label for="add_area_btn">Option</label><br>
	            <a href="#" data-toggle="modal" data-target="#edit_distance_confirm" class="btn btn-primary my-1 my-sm-0">
		          <span class="fas fa-edit mr-1"></span>
		          Update</a>
		        <a href="#"  data-toggle="modal" data-target="#cancel_distance_confirm" class="btn btn-danger my-1 my-sm-0">
		          <span class="fas fa-eraser mr-1"></span>
		          Clear</a>
	        </div>
	    </div>

		<!-- ADD DISTANCE Confirmation Modal -->
		<div class="modal fade" id="edit_distance_confirm" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       Added areas for checking will be updated, do you wish to continue?
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Yes</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of ADD DISTANCE Confirmation Modal -->

		<!-- CANCEL ADD Confirmation Modal -->
		<div class="modal fade" id="cancel_distance_confirm" tabindex="-1" role="dialog" aria-hidden="true">
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