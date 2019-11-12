<?= $this->load->view('top', '', TRUE) ?>
<div class="container py-5 mb5">
  <h3 class="mb-3">TURN OVER PROCESS</h3>
  	<div class="row">
  		<div class="col-md-12">

  			<div class="row">
  				<div class="col-md-4 mb-3">
		            <label for="ticket_num">Ticket Number</label>
		            <input type="text" class="form-control" id="ticket_num" name="ticket_num" placeholder="" value="<?= $ticket_details->ticket_number ?>">
			    </div>
  				<div class="col-md-4 mb-3">
		            <label for="customer_num">Customer Number</label>
		            <input type="text" class="form-control" id="customer_num" name="customer_num" placeholder="" value="12345">
			    </div>

			    <div class="col-md-4 mb-3">
		            <label for="customer_name">Customer Name</label>
		            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="" value="XXX YYYY">
			    </div>

			    <div class="col-md-4 mb-3">
		            <label for="attorney">Attorney-In-Fact</label>
		            <input type="text" class="form-control" id="attorney" name="attorney" placeholder="" value="ZZZZZ WWWWW">
			    </div>

  				<div class="col-md-4 mb-3">
		            <label for="project">Property</label>
		            <input type="text" class="form-control" id="property" name="property" placeholder="" value="The Grand Midori Makati">
			    </div>
			    <div class="col-md-4 mb-3">
		            <label for="tower">Tower</label>
		            <input type="text" class="form-control" id="tower" name="tower" placeholder="" value="1">
			    </div>
			    <div class="col-md-4 mb-3">
		            <label for="unit_number">Unit Number</label>
		            <input type="text" class="form-control" id="unit_number" name="unit_number" placeholder="" value="1A">
			    </div>
			    <div class="col-md-4 mb-3">
		            <label for="unit_type">Unit Type</label>
		            <input type="text" class="form-control" id="unit_type" name="unit_type" placeholder="" value="One Bedroom">
			    </div>
			    <div class="col-md-4 mb-3">
		            <label for="parking">Parking Number</label>
		            <input type="text" class="form-control" id="parking" name="parking" placeholder="" value="LG1">
			    </div>

			    <div class="col-md-12 mb-3">
		            <label>Turn Over To </label> <br>
		            <div class="form-check-inline">
					  <label class="form-check-label">
					    <input type="radio" class="form-check-input" name="turn_over_to" onchange="turnover_modal('unit_owner')">Unit Owner
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
					    <input type="radio" class="form-check-input" name="turn_over_to"  onchange="turnover_modal('authorized_rep')">Authorized Representative
					  </label>
					</div>

			    </div>
			    <div class="col-md-12 mb-3">
			    	<?php  $id_uploaded = $this->Admin_model->get_ticket_images_by_category($ticket_details->ticket_number, 'Authorized Representative Identification Card'); ?>
			    	<?php if($id_uploaded): ?>
			    		<label for="img_uploaded">Proof of Identification </label> <br>
			    		<?php foreach ($id_uploaded as $image) : ?>
			    			<img class="img-responsive" title="<?= $image->image_description; ?>" id="id_uploaded" src="<?= base_url('uploads/'.$image->image_path); ?>" style="max-height:150px;max-width:250px;" />
			    		<?php endforeach; ?>
			    	<?php endif;?>

			    </div>

			    <div class="col-md-12 mb-3">
			    	<?php  $attorney_uploaded = $this->Admin_model->get_ticket_images_by_category($ticket_details->ticket_number, 'Special Power of Attorney'); ?>
			    	<?php if($attorney_uploaded): ?>
			    		<label for="img_uploaded">Special Power of Attorney </label> <br>
			    		<?php foreach ($attorney_uploaded as $image_attorney) : ?>
			    			<img class="img-responsive" title="<?= $image_attorney->image_description; ?>" id="attorney_uploaded" src="<?= base_url('uploads/'.$image_attorney->image_path); ?>" style="max-height:150px;max-width:250px;" />
			    		<?php endforeach; ?>
			    	<?php endif;?>

			    </div>

			 
			    
		    </div>  
  		</div>

  		<div class="col-md-12"> 
  			
			<table class="table table-bordered" id="checking_areas_table">
			  	<thead class="thead-light">
				    <tr>
				      <th scope="col">Areas for Checking</th>
				      <th scope="col">Observation</th>
				      <th scope="col">Attachment</th>
				    </tr>
			  	</thead>
			  	<tbody>
			  		<form method="POST" action="<?= base_url('admin/add_turnover_process'); ?>">
		  			<?php $checklists = $this->Admin_model->get_checking_areas_by_unit_type($this->uri->segment(3)); ?>
		  			<?php $count = 0; ?>
		  			<?php foreach($checklists AS $checklist) : ?>
		  				<input type="hidden" class="form-control" id="unit_type_id" name="unit_type_id" value="1">
		  				<input type="hidden" class="form-control" id="ticket" name="ticket" value="<?= $ticket_details->ticket_number ?>">
		  				<?php $required = 0; $required_text = '';
		  				if($checklist->required == 1) {
		  					$required = 'required';
		  					$required_text = '<span style="color:red;">*</span>';
		  				} ?>
		  				<tr>
		  					<?php $details =  $this->Admin_model->get_ticket_checklist_by_ticketid_category($ticket_details->ticket_number, $checklist->id); ?>
		  					<?php $check = ''; $obser_txt = ''; ?>
		  					<?php if($details): $check = 'checked'; $obser_txt = $details->observation; endif;?>
						    <th scope="row">
						      	<div class="custom-control custom-checkbox">
						          <input type="checkbox" class="custom-control-input" name="area<?= $count ?>" id="area<?= $count ?>" value="<?= $checklist->id ?>" <?= $check; ?> <?= $required; ?>>
						          <label class="custom-control-label" for="area<?= $count ?>"><?= $checklist->area_desc ?></label>
						          <?= $required_text; ?>
						        </div>
						    </th>
						    <th scope="row">
						      	<textarea rows="3" class="form-control observation_input" name="observation<?= $count ?>" onkeyup="show_upload_btn(<?= $checklist->id ?>, this.value)"><?= $obser_txt; ?></textarea>
						    </th>
						    <th scope="row">
						    	<?php $imgs = $this->Admin_model->get_ticket_images_by_category($ticket_details->ticket_number,$checklist->id); ?>
						    	<?php if($imgs): ?>
						    		<?php foreach($imgs AS $img): ?>
						    			<img class="img-responsive" title="<?= $img->image_description; ?>" id="id_uploaded" src="<?= base_url('uploads/'.$img->image_path); ?>" style="max-height:100px;max-width:150px;" />
						    		<?php endforeach; ?>
						    		<button type="button" id="image_btn<?= $checklist->id ?>" data-toggle="modal" data-target="#add_image<?= $checklist->id ?>" class="btn btn-default"><span style="font-size: 50px; color:#343758;" class="fa fa-camera"></span></button>
					    		<?php else: ?>
					    			<button type="button" id="image_btn<?= $checklist->id ?>" data-toggle="modal" data-target="#add_image<?= $checklist->id ?>" class="btn btn-block btn-default image_btn"><span style="font-size: 50px; color:#343758;" class="fa fa-camera"></span></button>
					    		<?php endif; ?>
						      	 
						    </th>
						</tr>

						

						<?php $count = $count + 1; ?>

			  		<?php endforeach; ?>
			  			<input type="hidden" class="form-control" id="count_inputs" name="count_inputs" value="<?= $count; ?>">
						</tbody>
					</table>

					<div class="col-md-12 mb-3">
				    	<button class="btn btn-dark my-2 mr-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#add_checklist_confirm">Save</button>
		       			<button class="btn btn-outline-dark my-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#cancel_checklist_confirm">Cancel</button>
				    </div>

				    <!-- ADD CHECKLIST Confirmation Modal -->
					<div class="modal fade" id="add_checklist_confirm" tabindex="-1" role="dialog" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title">Confirmation</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					       Turnover checklist will be saved, do you wish to continue?
					      </div>
					      <div class="modal-footer">
					        <button type="submit" class="btn btn-primary">Yes</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- End of ADD CHECKLIST Confirmation Modal -->

					<!-- CANCEL ADD CHECKLIST Confirmation Modal -->
					<div class="modal fade" id="cancel_checklist_confirm" tabindex="-1" role="dialog" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title">Confirmation</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        Changes made will not be saved, do you wish to continue? ?
					      </div>
					      <div class="modal-footer">
					        <button type="button" onClick="alert('Updating of Areas has been successfully cancelled.'); location.reload();" data-dismiss="modal" class="btn btn-primary">Yes</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- End of CANCEL ADD CHECKLIST Confirmation Modal -->
			</form>

			<?php $checklists = $this->Admin_model->get_checking_areas_by_unit_type($this->uri->segment(3)); ?>
  			<?php foreach($checklists AS $checklist) : ?>
	 		<!-- ADD IMAGE Modal -->
				<div class="modal fade add_img_modal" id="add_image<?= $checklist->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Capture</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form id="form_upload_checklist_img<?= $checklist->id ?>" method="POST" enctype="multipart/form-data">
					      <div class="modal-body">
					      		<input type="hidden" class="form-control" id="description" name="description" value="<?= $checklist->id ?>">
		      					<input type="hidden" class="form-control" id="ticket_num" name="ticket_num" value="<?= $ticket_details->ticket_number ?>">

						       	 <input type="file" class="form-control" accept="image/*" id="capture<?= $checklist->id ?>" name="userfile" capture="camera" onchange="readURL(this, 'preview_img' + <?= $checklist->id ?>);" required>
						       	<div id="image_preview" style="margin-top: 20px;">
						       		<img class="img-responsive" id="preview_img<?= $checklist->id ?>" src="#" style="max-height:300px;max-width:470px;" />
						       	</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" onclick="save_img_checklist_ajax(<?= $checklist->id ?>);">Save</button>
					        <button type="button" class="btn btn-primary" onclick="save_image_checklist_with_add_ajax(<?= $checklist->id ?>)">Save and Add</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					      </div>
				      </form>
				    </div>
				  </div>
				</div>
				<!-- End of ADD IMAGE Modal -->
			<?php endforeach; ?>
  		</div>

  		<!-- UNIT OWNER Confirmation Modal -->
		<div class="modal fade" id="turnover_confirmation" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" id="turnover_confirmation_text">
		      </div>
		      <div class="modal-footer" id="turnover_confirmation_buttons">
		        
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of UNIT OWNER Confirmation Modal -->

		<!-- SPECIAL POWER Confirmation Modal -->
		<div class="modal fade" id="special_confirmation" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       	Does the Authorized Representative is covered by Attorney-In-Fact? 
		      </div>
		      <div class="modal-footer">
		        <button type="button" onclick="id_capture_upload_modal();" class="btn btn-primary">Yes</button>
		        <button type="button" onclick="special_power_upload_modal();" class="btn btn-secondary">No</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of SPECIAL POWER Confirmation Modal -->

		<!-- SPECIAL POWER UPLOAD Modal -->
		<div class="modal fade" id="special_power_upload" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Special Power of Attorney Capture</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		       <form id="form_upload_image_special_power" method="POST" enctype="multipart/form-data">
		       		<input type="hidden" class="form-control" id="description" name="description" value="Special Power of Attorney">
			      	<input type="hidden" class="form-control" id="ticket_num" name="ticket_num" value="<?= $ticket_details->ticket_number ?>">
			      <div class="modal-body">
			       	<input type="file" class="form-control" accept="image/*" id="spcl_capture" name="userfile" capture="camera" onchange="readURL(this,'special_preview_img');" required>
			       	<div id="image_preview" style="margin-top: 20px;">
			       		<img class="img-responsive" id="special_preview_img" src="#" style="max-height:300px;max-width:470px;" />
			       	</div>
			       	
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" onclick="save_image_special_power_ajax();">Save</button>
			        <button type="button" class="btn btn-primary" onclick="save_image_special_power_with_add_ajax();">Save and Add</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			      </div>
			  </form>
		    </div>
		  </div>
		</div>
		<!-- End of SPECIAL POWER UPLOAD Modal -->

		<!-- ADD IMAGE Modal -->
			<div class="modal fade" id="turnover_id_capture" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">ID Capture</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form id="form_upload_image" method="POST" enctype="multipart/form-data">
			      <div class="modal-body">
			      	<input type="hidden" class="form-control" id="description" name="description" value="Authorized Representative Identification Card">
			      	<input type="hidden" class="form-control" id="ticket_num" name="ticket_num" value="<?= $ticket_details->ticket_number ?>">
			       	<input type="file" class="form-control" accept="image/*" id="trn_capture" name="userfile" capture="camera" onchange="readURL(this,'trnovr_preview');" required>
			       	<div id="image_preview" style="margin-top: 20px;">
			       		<img class="img-responsive" id="trnovr_preview" src="#" style="max-height:300px;max-width:470px;" />
			       	</div>
			       	
			      </div>
			      <div class="modal-footer">
			        <button type="button" onclick="save_image_ajax(); " class="btn btn-primary">Save</button>
			        <button type="button" onclick="save_image_ajax_with_add();" class="btn btn-primary">Save and Add</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			      </div>
			  </form>
		    </div>
		  </div>
		</div>
		<!-- End of ADD IMAGE Modal -->
  	</div>
  </div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>	
<?= $this->load->view('admin/part/turnover_process_script', '', TRUE) ?>