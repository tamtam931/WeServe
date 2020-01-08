<div class="col-md-12">
	
	<table class="table table-bordered" id="unit_type_table">
		<thead class="thead-light">
		     <tr>
		     <th scope="col">Project</th>
		      <th scope="col">Tower</th>
		      <th scope="col">Unit Type</th>
		      <th scope="col">Areas of Checking</th>
		      <th scope="col">Required to Check?</th>
		    </tr>
		</thead>
		<tbody>

			<?php foreach($unit_types as $unit_type): ?>
		    <tr>
		    	<th scope="row">
		    		<button type="button" data-id="<?= $unit_type->unit_type_id ?>" data-project="<?= $unit_type->project_id ?>" id="btn_unit_area<?= $unit_type->area_id ?>" class="btn_unit_area btn btn-sm btn-primary my-1 my-sm-0"><?= $unit_type->project ?></button>
		    	</th>
		    	<th scope="row"><?= $unit_type->tower ?></th>
		        <th scope="row"><?= $unit_type->unit_type ?></th>
		        <?php $checking_datas = $this->Admin_model->get_checking_areas_by_unit_type_project($unit_type->unit_type_id, $unit_type->project_id); ?>
		   		<th scope="row">
			      	<?php foreach($checking_datas as $area): ?>
			      		- <?= $area->area_description ?><br>
			      	<?php endforeach; ?>
		      	</th>
		      	<th scope="row">
		      	<?php foreach($checking_datas as $area): ?>
	      			<?php if($area->required == 0) {
	      				echo '- No';
	      			} else {
	      				echo '- Yes';
	      			} ?><br>
		      	<?php endforeach; ?>
		      </th>
		  	</tr>
		  	<?php endforeach; ?>
		</tbody>
	</table>
</div>

<div class="col-md-12" id="unit_type_details" style="margin-top: 50px; border: 2px solid #343758; padding-top: 10px;">
	<form action="<?= base_url('admin/add_checking_area'); ?>" method="post" role="form" class="needs-validation">
<!-- 		<input type="hidden" class="form-control" id="project_id" name = "project_id" value="<?=  $unit_type->project_id; ?>">
		<input type="hidden" class="form-control" id="unit_id" name = "unit_id" value="<?=  $data; ?>"> -->
		<div class="col-md-12 mb-3">
			<h4>Add Area for Checking</h4>
		</div>
		<div class="row">
			
	        <div class="col-md-4 mb-3">
	            <label for="project_id">Project</label>
	            <select class="custom-select d-block w-100" id="project_id" name="project_id" required>
	            	<?php foreach($projects as $project): ?>
	              	<option value="<?= $project->id ?>"><?= $project->project; ?></option>
	              	<?php endforeach; ?>
	            </select>
	        </div>
	        
	        <div class="col-md-4 mb-3">
	            <label for="unit_id">Unit Type</label>
	            <select class="custom-select d-block w-100" id="unit_id" name="unit_id" required>
	            	<?php foreach($unit_types_complete as $unit): ?>
	              	<option value="<?= $unit->id ?>"><?= $unit->unit_type; ?></option>
	              	<?php endforeach; ?>
	            </select>
	        </div>

	    	<div class="col-md-4 mb-3">
	            <label for="area">Areas for Checking</label>
	            <select class="custom-select d-block w-100" id="area" name="area" required>
	            	<?php foreach($checking_lists as $area): ?>
	              	<option value="<?= $area->id ?>"><?= $area->area_description; ?></option>
	              	<?php endforeach; ?>
	            </select>
	        </div>
	        <div class="col-md-4 mb-3">
	            <label for="required_check">Required to Check?</label>
	            <select class="custom-select d-block w-100" id="required_check" name="required_check" required>
	              	<option value="0">No</option>
	              	<option value="1">Yes</option>
	            </select>
	        </div>
	        <div class="col-md-4 mb-3">
	            <label for="add_area_btn">Option</label><br>
	            <a href="#" data-toggle="modal" data-target="#add_area_confirm" class="btn btn-primary my-1 my-sm-0">
		          <span class="fas fa-plus mr-1"></span>
		          Add</a>
		        <a href="#"  data-toggle="modal" data-target="#cancel_areas_confirm" class="btn btn-danger my-1 my-sm-0">
		          <span class="fas fa-eraser mr-1"></span>
		          Clear</a>
	        </div>

	        <!-- ADD AREA Confirmation Modal -->
		<div class="modal fade" id="add_area_confirm" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       Added areas for checking will be saved, do you wish to continue?
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Yes</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of ADD AREA Confirmation Modal -->

		<!-- CANCEL AREA Confirmation Modal -->
		<div class="modal fade" id="cancel_areas_confirm" tabindex="-1" role="dialog" aria-hidden="true">
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
		        <button type="button" onClick="alert('Adding of Areas has been successfully cancelled.'); form.reset();" data-dismiss="modal" class="btn btn-primary">Yes</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of CANCEL AREA Confirmation Modal -->

	    </div>
	</form>
</div>