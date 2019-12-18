<?php 
	if($data):
	$project_details = $this->Admin_model->get_project_by_id($data); 
	$projects = $this->Admin_model->get_projects();?>

<div id="dynamic_div_proj">
	<form action="<?= base_url('admin/add_project_distance'); ?>" method="post" role="form" class="needs-validation">
		<input type="hidden" class="form-control" id="project_id" name = "project_id" value="<?=  $data ?>">
		<div class="col-md-12 mb-3">
			<h4><?= $project_details->project; ?></h4>
		</div>
		<div class="row">
	    	<div class="col-md-3 mb-3">
	            <label for="project">From</label>
	            <input type="text" class="form-control" id="project" name="project" value="<?= $project_details->project; ?>" readonly>
	        </div>

	        <div class="col-md-3 mb-3">
	            <label for="to_project">To</label>
	            <select class="custom-select d-block w-100" id="to_project" name="to_project" required>
	            	<option value="">-- Please Choose --</option>
	            	<?php foreach($projects as $project): ?>
	              	<option value="<?= $project->id ?>" <?php if($project->id == $data){ echo 'disabled'; } ?>><?= $project->project; ?></option>
	              	<?php endforeach; ?>
	            </select>
	        </div>

	        <div class="col-md-3 mb-3">
	            <label for="distance">Distance</label>
	            <input type="text" class="form-control" id="distance" name="distance" placeholder="Distance (KM)">
	            <a href="https://www.distancefromto.net/" target="_blank"><span class="fa fa-external-link-alt"></span> Computation Guide</a>
	        </div>
	       
	        <div class="col-md-3 mb-3">
	            <label for="add_area_btn">Option</label><br>
	            <a href="#" data-toggle="modal" data-target="#add_area_confirm" class="btn btn-primary my-1 my-sm-0">
		          <span class="fas fa-plus mr-1"></span>
		          Add</a>
		        <a href="#"  data-toggle="modal" data-target="#cancel_areas_confirm" class="btn btn-danger my-1 my-sm-0">
		          <span class="fas fa-eraser mr-1"></span>
		          Clear</a>
	        </div>
	    </div>

		<!-- ADD PASS Confirmation Modal -->
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
		       Added Distance will be saved, do you wish to continue?
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
		<!-- End of CANCEL ADD Confirmation Modal -->

	</form>
</div>

<table class="table table-bordered" id="unit_type_details_table">
	<thead class="thead-light">
	    <tr>
	      <th scope="col">From</th>
	      <th scope="col">To</th>
	      <th scope="col">Distance (KM)</th>
	      <th scope="col">Option</th>
	    </tr>
	</thead>
	<tbody>
		<?php $distances = $this->Admin_model->get_project_distance_by_project($data); ?>
		<?php foreach($distances as $distance): ?>
	    <tr>
	      <th scope="row"><?= $distance->project_fr ?></th>
	      <th scope="row"><?= $distance->project_to ?></th>
	      <th scope="row"><?= $distance->distance ?></th>
	      <th scope="row">
	      	<button type="button" onclick="edit_distance_ajax(<?= $distance->distance_id ?>);" data-id="<?= $distance->distance_id ?>" id="btn_edit_distance<?= $distance->id ?>" class="btn_distance_edit btn btn-sm btn-primary my-1 my-sm-0 "><span class="fas fa-edit mr-1"></span>Edit</button>
	        <a href="#" data-toggle="modal" data-target="#delete_distance<?= $distance->distance_id; ?>" class="btn btn-sm btn-danger my-1 my-sm-0">
	          <span class="fas fa-trash mr-1"></span>
	          Delete</a>
	      </th>
	  	</tr>

	  	<!-- DELETE Confirmation Modal -->
		<div class="modal fade" id="delete_distance<?= $distance->distance_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Added Distance will be deleted, do you wish to continue? 
		      </div>
		      <div class="modal-footer">
		      	<a href="<?= base_url('admin/delete_project_distance/'.$distance->distance_id); ?>" class="btn btn-primary">Yes</a>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of DELETE Confirmation Modal -->

	  	<?php endforeach; ?>
	</tbody>
</table>

<?php endif;?>

<script type="text/javascript">
function edit_distance_ajax(distance_id){
	$ajaxData = $.ajax({
		url: "<?= base_url('admin/get_value_edit_distance') ?>",
		method: "GET",
		data: {id : distance_id},
		dataType: "html",
		success:function(data){
			$('#dynamic_div_proj').empty();
			$('#dynamic_div_proj').html(data);
		},
		beforeSend:function(){
			$('.hidden-loader').show();
		},
		complete:function(){
			$('.hidden-loader').hide();
		}

	});

	return $ajaxData;
}

</script>

