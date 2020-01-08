<?php 
	if($data && $data):
		//var_dump($project); exit;
	$unit_type = $this->Admin_model->get_unit_types_by_id_project($data, $project);
	$areas = $this->Admin_model->get_checking_areas_list(); ?>

<div id="dynamic_div_area">
	<form action="<?= base_url('admin/add_checking_area'); ?>" method="post" role="form" class="needs-validation">
		<input type="hidden" class="form-control" id="project_id" name = "project_id" value="<?=  $unit_type->project_id; ?>">
		<input type="hidden" class="form-control" id="unit_id" name = "unit_id" value="<?=  $data; ?>">
		<div class="col-md-12 mb-3">
			<h4><?= $unit_type->project_desc; ?> - <?= $unit_type->tower; ?> [<?= $unit_type->unit_type; ?>]</h4>
		</div>
		<div class="row">
	    	<div class="col-md-4 mb-3">
	            <label for="area">Areas for Checking</label>
	            <select class="custom-select d-block w-100" id="area" name="area" required>
	            	<?php foreach($areas as $area): ?>
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
		       Added areas for checking will be saved, do you wish to continue?
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
	      <th scope="col">Areas of Checking</th>
	      <th scope="col">Required to Check?</th>
	      <th scope="col">Option</th>
	    </tr>
	</thead>
	<tbody>
		<?php $checking_areas = $this->Admin_model->get_checking_areas_by_unit_type($data); ?>
		<?php foreach($checking_areas as $area): ?>
	    <tr>
	      <th scope="row"><?= $area->area_description ?></th>
	      <th scope="row">
	      	<?php if($area->required == 0) {
		      	echo "No";
		      } else { echo "Yes"; } ?>
	      </th>
	      <th scope="row">
	      	<button type="button" onclick="edit_areas_ajax(<?= $area->list_id ?>);" data-id="<?= $area->id ?>" id="btn_edit_area<?= $area->id ?>" class="btn_area_edit btn btn-sm btn-primary my-1 my-sm-0 "><span class="fas fa-edit mr-1"></span>Edit</button>
	        <a href="#" data-toggle="modal" data-target="#delete_area<?= $area->id; ?>" class="btn btn-sm btn-danger my-1 my-sm-0">
	          <span class="fas fa-trash mr-1"></span>
	          Delete</a>
	      </th>
	  	</tr>

	  	<!-- DELETE Confirmation Modal -->
		<div class="modal fade" id="delete_area<?= $area->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      	<!-- <form action="<?= base_url('admin/delete_checking_area'); ?>" method="post" role="form">
		      	<input type="hidden" class="form-control" id="area_id<?= $area->id; ?>" name = "area_id" value="<?= $area->id; ?>"> -->
			      <div class="modal-body">
			        Added areas for checking will be deleted, do you wish to continue? 
			      </div>
			      <div class="modal-footer">
			      	<a href="<?= base_url('admin/delete_checking_area/'.$area->id.'/'.$area->list_id.'/'.$area->project); ?>" class="btn btn-primary">Yes</a>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			      </div>
		  		<!-- </form> -->
		    </div>
		  </div>
		</div>
		<!-- End of DELETE Confirmation Modal -->

	  	<?php endforeach; ?>
	</tbody>
</table>

<?php endif;?>

<script type="text/javascript">
function edit_areas_ajax(checking_area_id){
 	//console.log(checking_area_id);
	$ajaxData = $.ajax({
		url: "<?= base_url('admin/get_value_edit_area') ?>",
		method: "GET",
		data: {id : checking_area_id},
		dataType: "html",
		success:function(data){
			$('#dynamic_div_area').empty();
			$('#dynamic_div_area').html(data);
			console.log(data);
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

