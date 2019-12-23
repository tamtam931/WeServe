<?= $this->load->view('top', '', TRUE) ?>
<style>
#signature{
width: 100%;
height: 100px;
border: 1px solid black;
}
</style>
<?php $count = 0; ?>
<div class="container py-5 mb5">
  <h3 class="mb-3">TURN OVER PROCESS</h3>
    <?php if($ticket_bind) : 
    	$customer_number = "";
    	$unit_number = "";
    	$parking = "";
    	foreach($ticket_bind as $bind):
    		$customer_number .= $bind->customer_number . ' ,';
    		$unit_number .= $bind->unit_number . $bind->unit_desc . ' ,';
    		$parking .= $bind->parking_number . ' ,';
    	endforeach;
    endif; ?>
  	<div class="row">
  		<div class="col-md-12">
  			<div class="row">
  				<div class="col-md-4 mb-3">
		            <label for="ticket_num">Ticket Number</label>
		            <input type="text" class="form-control" id="ticket_num" name="ticket_num" placeholder="" value="<?= $ticket_details->ticket_number ?>" readonly>
			    </div>
  				<div class="col-md-4 mb-3">
		            <label for="customer_num">Customer Number</label>

		            <input type="text" class="form-control" id="customer_num" name="customer_num" placeholder="" value="<?= $customer_number ?>" readonly>
			    </div>

			    <div class="col-md-4 mb-3">
		            <label for="customer_name">Customer Name</label>
		            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="" value="<?= $ticket_details->customer_name ?>" readonly>
			    </div>

			    <div class="col-md-4 mb-3">
		            <label for="attorney">Attorney-In-Fact</label>
		            <input type="text" class="form-control" id="attorney" name="attorney" placeholder="" value="" readonly>
			    </div>

  				<div class="col-md-4 mb-3">
		            <label for="project">Property</label>
		            <input type="text" class="form-control" id="property" name="property" placeholder="" value="<?= $ticket_details->project_name ?>" readonly>
			    </div>
			    <div class="col-md-4 mb-3">
		            <label for="tower">Tower</label>
		            <input type="text" class="form-control" id="tower" name="tower" placeholder="" value="<?= $ticket_details->tower ?>" readonly>
			    </div>
			    <div class="col-md-4 mb-3">
		            <label for="unit_number">Unit Number</label>
		            <input type="text" class="form-control" id="unit_number" name="unit_number" placeholder="" value="<?= $unit_number ?>" readonly>
			    </div>
			    <div class="col-md-4 mb-3">
		            <label for="unit_type">Unit Type</label>
		            <input type="text" class="form-control" id="unit_type" name="unit_type" placeholder="" value="<?= $ticket_details->unit_type ?>" readonly>
			    </div>
			    <div class="col-md-4 mb-3">
		            <label for="parking">Parking Number</label>
		            <input type="text" class="form-control" id="parking" name="parking" placeholder="" value="<?= $parking ?>" readonly>
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
			    	<?php  if($attorney_uploaded):  ?>
			    		<label for="img_uploaded">Special Power of Attorney </label> <br>
			    		<?php foreach ($attorney_uploaded as $image_attorney) : ?>
			    			<img class="img-responsive" title="<?= $image_attorney->image_description; ?>" id="attorney_uploaded" src="<?= base_url('uploads/'.$image_attorney->image_path); ?>" style="max-height:150px;max-width:250px;" />
			    		<?php endforeach; ?>
			    	<?php endif;?>

			    </div>

			 
			    
		    </div>  
  		</div>

  		<div class="col-md-12"> 
  			
  			<form method="POST" action="<?= base_url('handover/add_turnover_process'); ?>" id="turnover_process_form">
				<table class="table table-bordered" id="checking_areas_table">
				  	<thead class="thead-light">
					    <tr>
					      <th scope="col">Areas for Checking</th>
					      <th scope="col">Observation</th>
					      <th scope="col">Attachment</th>
					    </tr>
				  	</thead>
				  	<tbody>
			  		
			  			<input type="hidden" class="form-control" id="ticket_type" name="ticket_type" placeholder="" value="<?= $this->uri->segment(4) ?>">
			  			<input type="hidden" class="form-control" id="unit_type_id" name="unit_type_id" value="1">
		  				<input type="hidden" class="form-control" id="ticket" name="ticket" value="<?= $ticket_details->ticket_number ?>">
		  				<input type="hidden" class="form-control" id="ticket_id" name="ticket_id" value="<?= $this->uri->segment(3) ?>">
		  			<?php $checklists = $this->Admin_model->get_checking_areas_by_unit_type_project($ticket_details->unit_type_id, $ticket_details->project_id); ?>
		  			<?php $count = 0; ?>

		  			<?php foreach($checklists AS $checklist) : ?>

		  				
		  				<?php $required = 0; $required_text = '';
		  				if($checklist->required == 1) {
		  					$required = 'required';
		  					$required_text = '<span style="color:red;">*</span>';
		  				} ?>
		  				<tr>
		  					<?php $details =  $this->Admin_model->get_ticket_checklist_by_ticketid_category($ticket_details->ticket_number, $checklist->list_id); ?>
		  					<?php $check = ''; $obser_txt = ''; ?>
		  					<?php if($details): $check = 'checked'; $obser_txt = $details->observation; endif;?>
						    <th scope="row">
						      	<div class="custom-control custom-checkbox">
						          <input type="checkbox" class="custom-control-input" name="area<?= $count ?>" id="area<?= $count ?>" value="<?= $checklist->list_id ?>" <?= $check; ?> <?= $required; ?>>
						          <label class="custom-control-label" for="area<?= $count ?>"><?= $checklist->area_description ?></label>
						          <?= $required_text; ?>
						        </div>
						    </th>
						    <th scope="row">
						      	<textarea rows="3" class="form-control observation_input" name="observation<?= $count ?>" id="observation<?= $count ?>"><?= $obser_txt; ?></textarea> 
						      	<!--  onkeyup="show_upload_btn(<?= $checklist->id ?>, this.value)" -->
						    </th>
						    <th scope="row" id="images_row<?= $count ?>">
						    	<?php $imgs = $this->Admin_model->get_ticket_images_by_category($ticket_details->ticket_number,$checklist->list_id); ?>
						    	<?php if($imgs): ?>
						    		<?php foreach($imgs AS $img): ?>
						    			<img class="img-responsive" title="<?= $img->image_description; ?>" id="id_uploaded" src="<?= base_url('uploads/'.$img->image_path); ?>" style="max-height:100px;max-width:150px;" />
						    		<?php endforeach; ?>
						    		<button type="button" id="image_btn<?= $checklist->list_id ?>" data-toggle="modal" data-target="#add_image<?= $checklist->list_id ?>" class="btn btn-default"><span style="font-size: 50px; color:#343758;" class="fa fa-camera"></span></button>
					    		<?php else: ?>
					    			<button type="button" id="image_btn<?= $checklist->list_id ?>" data-toggle="modal" data-target="#add_image<?= $checklist->list_id ?>" class="btn btn-default image_btn"><span style="font-size: 50px; color:#343758;" class="fa fa-camera"></span></button>
					    		<?php endif; ?>
						      	 
						    </th>
						</tr>

						<?php $count = $count + 1; ?>

			  		<?php endforeach; ?>

			  		<?php $other_concerns = $this->Admin_model->get_ticket_other_concern_by_ticket_id($this->uri->segment(3));
			  		$other_cnt = 0; ?>
					<?php if($other_concerns): ?>
					
						<?php foreach($other_concerns as $other) : ?>
						<tr id ="other<?= $other_cnt ?>">
							<th scope="row">Other Concern</th>
							<td scope="row">
								<?php 
								if($other->temporary_parking) { echo "<b>Temporary Parking: </b>".$other->temporary_parking."<br>"; }
								if($other->parking_remarks) { echo "<b>Temporary Parking Remarks: </b>".$other->parking_remarks."<br>";}
								if($other->other_concern) { echo "<b>Other Concern: </b>".$other->other_concern."<br>";}
								 ?>
							</td>
							<th scope="row">
								<?php if($other->attachment) : ?>
								<img class="img-responsive" src="<?= base_url('uploads/'.$other->attachment)?>" style="max-height:100px;max-width:150px;" />
								<?php endif; ?>
							</th>
						</tr>
						<?php $other_cnt = $other_cnt + 1; ?>
						<?php endforeach; ?>
					<?php endif; ?>
						
						

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
						        <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#summary_punchlist" onclick="populate_summary_punchlist(<?= $count?>);" class="sample_btn btn btn-primary">Yes</button> 
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						      </div>
						    </div>
						  </div>
						</div>

						<!-- End of ADD CHECKLIST Confirmation Modal -->

						<!-- ACCEPTANCE SIGNATURE Confirmation Modal -->
						<div class="modal fade" id="acceptance_signature" tabindex="-1" role="dialog" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title">Signature Confirmation</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						      	<div class="col-md-12">
									<div id="signature"></div><br/>
									 
									<input type="button" class="btn btn-primary" id="click" value="Finalize Signature" onclick="signature_footer_show()">

									<textarea id="output" name="signature_output" hidden></textarea><br/>

								</div>

								<div class="col-md-12" style="text-align: center;">
									<img src="" id="sign_prev" style="display: none;" /><br>
									<b><?= $ticket_details->customer_name ?></b><br>
									Name and Signature of Unit Owner
								</div>
						      </div>
						      <div class="modal-footer" id="signature_footer">
						        <button type="submit" class="btn btn-primary">Yes</button>
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						      </div>
						    </div>
						  </div>
						</div>
						<!-- End of ACCEPTANCE SIGNATURE Confirmation Modal -->


						
		  			<input type="hidden" class="form-control" id="count_inputs" name="count_inputs" value="<?= $count; ?>">
					</tbody>
				</table>

				<div class="col-md-12 mb-3">
					<button class="btn my-2 mr-2 text-oswald" type="button" data-toggle="modal" data-target="#add_issue" style="font-size: 50px;"><span class="fa fa-exclamation-circle"></span></button>
				</div>

				<div class="col-md-12 mb-3">
			    	<button class="btn btn-dark my-2 mr-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#add_checklist_confirm">Save</button>
	       			<button class="btn btn-outline-dark my-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#cancel_checklist_confirm">Cancel</button>
			    </div>

			</form>
					

				  

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

			

			<!-- SUMMARY Modal -->
			<div class="modal fade" id="summary_punchlist" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Summary of Punchlist</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			     
			      <div class="modal-body">
			      	<h4> Does the list of punchlist below complete? </h4>
			      	<table class="table table-bordered" id="checking_areas_table">
				  	<thead class="thead-light">
					    <tr>
					      <th scope="col">Areas for Checking</th>
					      <th scope="col">Observation</th>
					      <th scope="col">Attachment</th>
					    </tr>
				  	</thead>
				  	<tbody>
		      	<?php $checklists = $this->Admin_model->get_checking_areas_by_unit_type_project($ticket_details->unit_type_id, $ticket_details->project_id); ?>
		  			<?php $xcount = 0; ?>

		  			<?php foreach($checklists AS $checklist) : ?>

		  				
		  				<?php $required = 0; $required_text = '';
		  				if($checklist->required == 1) {
		  					$required = 'required';
		  					$required_text = '<span style="color:red;">*</span>';
		  				} ?>
		  				<tr>
		  					<?php $details =  $this->Admin_model->get_ticket_checklist_by_ticketid_category($ticket_details->ticket_number, $checklist->list_id); ?>
		  					<?php $check = ''; $obser_txt = ''; ?>
		  					<?php if($details): $check = 'checked'; $obser_txt = $details->observation; endif;?>
						    <th scope="row" id="desc<?= $xcount; ?>">
					          <?= $checklist->area_description ?>
					          <?= $required_text; ?>
						      
						    </th>
						    <th scope="row" id="obsrv<?= $xcount; ?>">
						      	<?= $obser_txt; ?>
						    </th>
						    <th scope="row" id="images_row">
						    	<?php $imgs = $this->Admin_model->get_ticket_images_by_category($ticket_details->ticket_number,$checklist->list_id); ?>
						    	<?php if($imgs): ?>
						    		<?php foreach($imgs AS $img): ?>
						    			<img class="img-responsive" title="<?= $img->image_description; ?>" id="id_uploaded" src="<?= base_url('uploads/'.$img->image_path); ?>" style="max-height:60px;max-width:80px;" />
						    		<?php endforeach; ?>
					    	
					    		<?php endif; ?>
						      	 
						    </th>
						</tr>

						<?php $xcount = $xcount + 1; ?>

			  		<?php endforeach; ?>

			  		<?php $other_concerns = $this->Admin_model->get_ticket_other_concern_by_ticket_id($this->uri->segment(3)); ?>
					<?php if($other_concerns): ?>
					
						<?php foreach($other_concerns as $other) : ?>
						<tr>
							<td scope="row">Other Concern</td>
							<td scope="row">
								<?php 
								if($other->temporary_parking) { echo "<b>Temporary Parking: </b>".$other->temporary_parking."<br>"; }
								if($other->parking_remarks) { echo "<b>Temporary Parking Remarks: </b>".$other->parking_remarks."<br>";}
								if($other->other_concern) { echo "<b>Other Concern: </b>".$other->other_concern."<br>";}
								 ?>
							</td>
							<td scope="row">
								<img class="img-responsive" src="<?= base_url('uploads/'.$other->attachment)?>" style="max-height:60px;max-width:80px;" />
							</td>
						</tr>
						<?php endforeach; ?>
					<?php endif; ?>
			       	</tbody>
			       </table>
			      </div>
			      <div class="modal-footer">
			      	<?php if($other_concerns): ?>
			        <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#accept_with_note" class="btn btn-primary">Yes</button>
			        <?php else: ?>
			         <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#acceptance_signature" class="btn btn-primary">Yes</button>
			         <?php endif; ?>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			      </div>
				 
			    </div>
			  </div>
			</div>
			<!-- End of SUMMARY Modal -->


		    <!-- ACCEPT WITH NOTED PUNCHLIST Confirmation Modal -->
			<div class="modal fade" id="accept_with_note" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Confirmation</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			     	Are you going to accept this unit despite of noted punchlist?
			      </div>
			      <div class="modal-footer">
			        <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#acceptance_signature" class="btn btn-primary">Yes</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- End of ACCEPT WITH NOTED PUNCHLIST  Confirmation Modal -->

			 <!-- ADD OTHER CONCERNS Modal -->
			<div class="modal fade" id="add_issue" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Other Concern</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<form id="form_other_concern"  role="form" method="POST" enctype="multipart/form-data">
			      		<div class="modal-body">
			      			<input type="hidden" class="form-control" id="ticket_id" name="ticket_id" value="<?= $ticket_details->ticket_id ?>">
			      			<?php $parkings = $this->Admin_model->get_all_project_parking($ticket_details->project_code);  ?>
					        <div class="col-md-12 mb-3">
						    	<label for="temp_parking">Temporary Parking </label>
					            <select class="custom-select d-block w-100" id="temp_parking" name="temp_parking" onchange="temp_parking_show()">
					            <option value=""></option>
					            <?php foreach($parkings as $parking):  ?>
					            	<option value="<?= $parking->parking_number ?>"><?= $parking->parking_number ?></option>
					            <?php endforeach; ?>
					            </select>
						    </div>

						    <div class="col-md-12 mb-3" id="temp_parking_remarks_div">
						    	<label for="temp_parking_remarks">Remarks on Temporary Parking Assignment</label>
					            <textarea rows="3" class="form-control" id="temp_parking_remarks" name="temp_parking_remarks" required></textarea> 
						    </div>

						    <div class="row" style="margin: 0px;">
						    	<div class="col-md-6 mb-3">
							    	<label for="other_concern">Other Concerns</label>
						            <textarea rows="5" class="form-control" name="other_concern"></textarea> 
							    </div>

							    <div class="col-md-6 mb-3" style="margin-top: 40px;">
							      	<div class="custom-file">  
									    <input type="file" class="custom-file-input" accept="image/*" id="capture" name="userfile" capture="camera">
									    <label class="custom-file-label" for="capture">Choose file</label>
									</div>							  
							    </div>
						    </div>
						   
					    </div>
				      <div class="modal-footer">
				        <button id="btn_other_concern" type="button" onclick="save_concerns_ajax()" class="btn btn-primary">Save</button>
				       <button class="btn btn-outline-dark my-2 text-oswald btn-wide" type="button" data-toggle="modal" data-target="#cancelConfirm">Cancel</button>
				      </div>
			      </form>
			    </div>
			  </div>
			</div>
			<!-- End of OTHER CONCERNS Modal -->

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
			        Other concern will not be saved, do you wish to continue? 
			      </div>
			      <div class="modal-footer">
			        <button type="button" onClick="location.reload();" class="btn btn-primary" data-dismiss="modal" >Yes</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- End of CANCEL Confirmation Modal -->


			<?php $checklists = $this->Admin_model->get_checking_areas_by_unit_type($ticket_details->unit_type_id);?>
			<?php $cnt2 = 0; ?>
  			<?php foreach($checklists AS $checklist) : ?>
	 		<!-- ADD IMAGE Modal -->
				<div class="modal fade add_img_modal" id="add_image<?= $checklist->list_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Capture</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form id="form_upload_checklist_img<?= $checklist->list_id ?>" method="POST" enctype="multipart/form-data">
					      <div class="modal-body">
					      		<input type="hidden" class="form-control" id="description" name="description" value="<?= $checklist->list_id ?>">
		      					<input type="hidden" class="form-control" id="ticket_num" name="ticket_num" value="<?= $ticket_details->ticket_number ?>">

						       	 <input type="file" class="form-control" accept="image/*" id="capture<?= $checklist->list_id ?>" name="userfile" capture="camera" onchange="readURL(this, 'preview_img' + <?= $checklist->list_id ?>);" required>
						       	<div id="image_preview" style="margin-top: 20px;">
						       		<img class="img-responsive" id="preview_img<?= $checklist->list_id ?>" src="#" style="max-height:300px;max-width:470px;" />
						       	</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" onclick="save_img_checklist_ajax(<?= $checklist->list_id ?>);">Save</button>
					        <button type="button" class="btn btn-primary" onclick="save_image_checklist_with_add_ajax(<?= $checklist->list_id ?>)">Save and Add</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					      </div>
				      </form>
				    </div>
				  </div>
				</div>
				<!-- End of ADD IMAGE Modal -->
				<?php $cnt2 = $cnt2 + 1; ?>
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

<?= $this->load->view('admin/part/turnover_process_script', '', TRUE) ?>
