<div class="row">
	<div class="col-md-5">
		<div class="card bg-default mb-3">
		  <div class="card-header">AREA FOR CHECKING</div>
		  <div class="card-body">
				<div class="row">
					<div id="area_div">
						<form action="<?= base_url('admin/add_checking_area_list'); ?>" method="post" role="form" class="needs-validation">
						<div class="row">
					    	<div class="col-md-6 mb-3">
					            <label for="area">Area Description</label>
					            <input type="text" class="form-control" id="area" name="area" placeholder="Area Description" value="" required>
					        </div>
					     
					        <div class="col-md-6 mb-3">
					            <label for="add_area_btn">Option</label><br>
					            <a href="#" data-toggle="modal" data-target="#add_area_list_confirm" class="btn btn-primary my-1 my-sm-0">
						          <span class="fas fa-plus mr-1"></span>
						          Add</a>
						        <a href="#"  data-toggle="modal" data-target="#cancel_area_list_confirm" class="btn btn-danger my-1 my-sm-0">Clear</a>
					        </div>
					    </div>


					    	<!-- Confirmation Modal -->
							<div class="modal fade" id="add_area_list_confirm" tabindex="-1" role="dialog" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title">Confirmation</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        Details of new area will be saved, do you wish to continue?
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
							        Details of new area will not be saved, do you wish to continue? 
							      </div>
							      <div class="modal-footer">
							        <button type="button" onClick="alert('Adding of new area has been successfully cancelled.');form.reset();" class="btn btn-primary" data-dismiss="modal" >Yes</button>
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End of CANCEL Confirmation Modal -->
						</form>
					</div>

					<table class="table table-bordered" id="area_for_checking">
						<thead class="thead-light">
						    <tr>
						      <th scope="col">Description</th>
						      <th scope="col">Option</th>
						    </tr>
						</thead>
						<tbody>
							<?php $checking_areas = $this->Admin_model->get_checking_areas_list(); ?>
							<?php foreach($checking_areas as $area): ?>
						    <tr>
						      <th scope="row"><?= $area->area_description ?></th>
						      <th scope="row">
						      	<button type="button" onclick="edit_area_list_ajax(<?= $area->id ?>);" data-id="<?= $area->id ?>" id="btn_edit_area<?= $area->id ?>" class="btn_area_edit btn btn-sm btn-primary my-1 my-sm-0 "><span class="fas fa-edit mr-1"></span></button>
						        <a href="#" data-toggle="modal" data-target="#delete_area<?= $area->id; ?>" class="btn btn-sm btn-danger my-1 my-sm-0">
						          <span class="fas fa-trash mr-1"></span>
						          </a>
						      </th>
						  	</tr>
						  <?php endforeach; ?>
						</tbody>
					</table>


				</div>
			</div>
		</div>

	</div>


	<div class="col-md-7">
		<div class="card bg-default mb-3">
		  <div class="card-header">POSITIONS</div>
		  <div class="card-body">
				<div class="row">
					<div id="positions_div">
						<form action="<?= base_url('admin/add_checking_area_list'); ?>" method="post" role="form" class="needs-validation">
						<div class="row">
					    	<div class="col-md-4 mb-3">
					            <label for="section">Section</label>
					            <select class="custom-select d-block w-100" id="section" name="section" required>
					            	<option value="">-- Please Choose --</option>
					            	<?php foreach($sections as $section): ?>
					              	<option value="<?= $section->id; ?>"><?= $section->section_desc; ?></option>
					              	<?php endforeach; ?>
					            </select>
					        </div>

					        <div class="col-md-4 mb-3">
					            <label for="role">Role</label>
					            <select class="custom-select d-block w-100" id="role" name="role" required>
					            	<option value="">-- Please Choose --</option>
					            	<?php foreach($roles as $role): ?>
					              	<option value="<?= $role->id; ?>"><?= $role->role_desc; ?></option>
					              	<?php endforeach; ?>
					            </select>
					        </div>
					     
					        <div class="col-md-4 mb-3">
					            <label for="add_area_btn">Option</label><br>
					            <a href="#" data-toggle="modal" data-target="#add_area_confirm" class="btn btn-primary my-1 my-sm-0">
						          <span class="fas fa-plus mr-1"></span>
						          Add</a>
						        <a href="#"  data-toggle="modal" data-target="#cancel_areas_confirm" class="btn btn-danger my-1 my-sm-0">Clear</a>
					        </div>
					    </div>

						</form>
					</div>

					<table class="table table-bordered" id="positions_table">
						<thead class="thead-light">
						    <tr>
						      <th scope="col">Description</th>
						      <th scope="col">Option</th>
						    </tr>
						</thead>
						<tbody>
							<?php $positions = $this->Admin_model->get_positions(); ?>
							<?php foreach($positions as $position): ?>
						    <tr>
						      <th scope="row"><?= $position->position_desc ?></th>
						      <th scope="row">
						      	<button type="button" onclick="edit_areas_ajax(<?= $area->id ?>);" data-id="<?= $area->id ?>" id="btn_edit_area<?= $area->id ?>" class="btn_area_edit btn btn-sm btn-primary my-1 my-sm-0 "><span class="fas fa-edit mr-1"></span></button>
						        <a href="#" data-toggle="modal" data-target="#delete_area<?= $area->id; ?>" class="btn btn-sm btn-danger my-1 my-sm-0">
						          <span class="fas fa-trash mr-1"></span>
						          </a>
						      </th>
						  	</tr>
						  <?php endforeach; ?>
						</tbody>
					</table>


				</div>
			</div>
		</div>

	</div>




</div>


<script type="text/javascript">
function edit_area_list_ajax(checking_area_id){
 	console.log(checking_area_id);
	$ajaxData = $.ajax({
		url: "<?= base_url('admin/get_value_edit_area_list') ?>",
		method: "GET",
		data: {id : checking_area_id},
		dataType: "html",
		success:function(data){
			$('#area_div').empty();
			$('#area_div').html(data);
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
