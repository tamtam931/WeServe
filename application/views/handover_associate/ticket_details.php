<?= $this->load->view('top', '', TRUE) ?>
<div class="container py-5 mb5">
  <h3 class="mb-3">TICKET DETAILS</h3>
  	 <?php  
  	 	$customer_number = array();
    	$unit_number = array();
    	$parking = array();
    	$customer_name = array();
    	$unit_type = array();
    	$ticket_type = "";

  	 if($ticket_bind) : 
    	
    	foreach($ticket_bind as $bind):
    		$unit = $bind->unit_number . $bind->unit_desc;
    		array_push($customer_number, $bind->customer_number);
    		if($unit) { array_push($unit_number, $unit); }
    		array_push($customer_name, $bind->customer_name);
    		array_push($unit_type, $bind->unit_type_desc);
    		if($bind->parking_number) {array_push($parking, $bind->parking_number); }
    	endforeach;

    	
    	
    else:
    	$unit2 = $ticket_details->unit_number . $ticket_details->unit_desc;
    	$customer_number = array($ticket_details->customer_number);
    	$unit_number = array($unit2);
    	$parking = array($ticket_details->parking_number);
    	$customer_name = array($ticket_details->customer_name);
    	$unit_type = array($ticket_details->unit_type);

    endif; 

    if($unit_number && empty($parking)) {
    		// UNIT ONLY
    		$ticket_type = 'U';
    	} else if (empty($unit_number) && $parking) {
    		// PARKING ONLY
    		$ticket_type = 'P';
    	} else if($unit_number && $parking) {
    		// UNIT AND PRKING
    		$ticket_type = 'UP';
    	}
    ?>
  	<div class="row">
		<div class= "col-md-12">
	  		<table class="table" id="tickets_table">
			  	<thead class="thead-light">
				    <tr>
				      <th scope="col">Ticket No.</th>
				      <th scope="col">Customer Number</th>
				      <th scope="col">Created By</th>
				      <th scope="col">Date Created</th>
				      <th scope="col">Last Update</th>
				      <th scope="col">TAT (DD:MM:SS)</th>
				    </tr>
			  	</thead>
			  	<tbody>
			  		
				    <tr>
				      <th scope="row"><?= $ticket_details->ticket_number ?></th>
				      <th scope="row"><?= $ticket_details->customer_number ?></th>
				      <th scope="row"></th>
				      <th scope="row"><?= $ticket_details->date_created; ?></th>
					  <th scope="row"><?= $ticket_details->last_update; ?></th>
				      <th scope="row"><?php
						$date_expire = $ticket_details->date_created;    
						$date = new DateTime($date_expire);
						$now = new DateTime();
						echo $date->diff($now)->format("%d days, %h hours and %i minutes"); ?></th>
				  	</tr>
				 
				</tbody>
			</table>
	  	</div>

  		<div class= "col-md-9">
	  	
		  	<div class= "col-md-12">
		  		<div class="card border-primary mb-3">
		  			<div class="card-header text-primary" style="background-color: #343758; color: #e9ecef !important;">
		  				<h5>SUMMARY</h5>
		  			</div>
				  <div class="card-body text-primary">
				  	 <p class="card-text">
				    	<div class="">
				    		<b>Date Qualified for Turnover: </b> <?= date("F d, Y ",strtotime($ticket_details->qualified_turnover_date)); ?>
				    	</div>
				    	<div class="">
				    		<?php $selected_sched = $this->Admin_model->get_schedules_by_ticket_number($ticket_details->ticket_number); ?>
					    	<b>Turnover Schedule: </b>
					    	<?php if($selected_sched) { echo date("F d, Y H:i A",strtotime($selected_sched->schedule)); }?>
				    	</div>
				    </p>
					<a style="<?php if($accepted === '1'){echo "display: none;";}else{echo "";} ?>" <?php if($acceptance === true){ echo 'data-toggle="modal" . " " . data-target="#confirmation_accepted"'; } ?> href="<?php if($acceptance === true){echo "#";}else{echo base_url('handover/turnover_process/'.$ticket_details->ticket_id.'/'.$ticket_type);} ?>" class="btn btn-dark"><?php if($acceptance === true){echo "Accept"; }else{echo "Turnover Process";} ?></a>

					<button style="<?php if($accepted === '1'){echo "display: none;";}else{echo "";} ?>" type="submit" class="btn btn-dark" data-toggle="modal" data-target="<?php if($acceptance === true){ echo '#confirmation_not_accepted'; }else{echo '#no_show_confirm';} ?>"><?php if($acceptance === true){ echo 'Not Accepted'; }else{echo 'No Show';} ?></button>
				  </div>
				</div>
		  	</div>

		  	<!-- NO SHOW CONFIRM -->
		  	<div id="no_show_confirm" class="modal fade">
		        <div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <h4 id="modalTitle" class="modal-title">NO SHOW</h4>
		                    <button type="button" class="close" data-dismiss="modal">&times;</button>
		                </div>
		                <form action="<?= base_url('handover/turnover_no_show'); ?>" method="post" role="form" class="needs-validation">
		                	<input type="hidden" class="form-control" id="ticket_type" name = "ticket_type" value="<?= $ticket_type ?>">
			                <input type="hidden" class="form-control" id="ticket_id" name = "ticket_id" value="<?= $this->uri->segment(3) ?>">
			                <input type="hidden" class="form-control" id="ticket_number" name = "ticket_number" value="<?= $ticket_details->ticket_number ?>">
			                <input type="hidden" class="form-control" id="buyer_email" name = "buyer_email" value="<?= $ticket_details->buyer_email ?>">
			                <input type="hidden" class="form-control" id="buyer_mobile" name = "buyer_mobile" value="<?= $ticket_details->mobile_number ?>">
			                <div class="modal-body">
			                	Unit Owner / Authorized Representative did not show-up, do you wish to continue?
			                </div>
			               <div class="modal-footer">
						        <button type="submit" class="btn btn-dark">Yes</button>
						        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">No</button>
						     </div>
						 </form>
		            </div>
		        </div>
		    </div>
		    <!-- END OF NO SHOW CONFIRM MODAL -->
			
 		<!-- ACCEPT Confirmation Modal -->
 			<div class="modal fade" id="confirmation_accepted" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Confirmation</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      	<form action="<?= base_url('handover/close_ticket'); ?>" method="post" role="form">
						<input type="hidden" class="form-control" id="ticket_type" name = "ticket_type" value="UP">
			            <input type="hidden" class="form-control" id="ticket_id" name = "ticket_id" value="27">
			            <input type="hidden" class="form-control" id="ticket_number" name = "ticket_number" value="BCR-2019-000111">
			            <input type="hidden" class="form-control" id="buyer_email" name = "buyer_email" value="elsucgang@federalland.ph">
			            <input type="hidden" class="form-control" id="buyer_mobile" name = "buyer_mobile" value="">
				      	<input type="hidden" class="form-control" id="">
					      <div class="modal-body">
							  	Unit will be accepted, do you wish to continue?
					      </div>
					      <div class="modal-footer">
					        <button type="submit" class="btn btn-primary">Yes</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					      </div>
				  		</form>
				    </div>
				  </div>
			</div>
			<!-- End of ACCEPT Confirmation Modal -->

			 <!-- NOT ACCEPT Confirmation Modal -->
			 <div class="modal fade" id="confirmation_not_accepted" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title">Reason for not acceptance of unit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<form action="<?= base_url('handover/ticket_not_accepted'); ?>" method="post" role="form">
						<div class="modal-body">
							<input type="hidden" class="form-control" id="modal_id" name="modal_id" value="primary_modal">
							<input type="hidden" class="form-control" id="ticket_id" name = "ticket_id" value="<?php echo $this->uri->segment(3); ?>">
							<input type="hidden" class="form-control" id="ticket_number" name = "ticket_number" value="BCR-2019-000111">
							<textarea placeholder="Reason for not accepting the unit" class="form-control" rows="5" id="reason" name="reason" required></textarea>
						</div>
						<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#confirmation_message">Cancel</button>
						</div>
					</form>
				</div>
				</div>
			</div>
			<!-- End of NOT ACCEPT Confirmation Modal -->

			 <!-- Confirmation Modal -->
			 <div class="modal fade" id="confirmation_message" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Confirmation</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      	<form method="post" role="form">
				      	<input type="hidden" class="form-control" id="">
					      <div class="modal-body">
							  Changes made will not be saved, do you wish to continue? 
					      </div>
					      <div class="modal-footer">
					        <button type="submit" class="btn btn-primary">Yes</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					      </div>
				  		</form>
				    </div>
				  </div>
			</div>
			<!-- End of Confirmation Modal -->
			
			<!-- Confirmation Modal Saving-->
			<div class="modal fade" id="confirmation_message_saving" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Confirmation</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      	<form action="<?= base_url('handover/ticket_not_accepted'); ?>" method="post" role="form">
				      	<input type="hidden" class="form-control" id="">
					      <div class="modal-body">
						 	 <input type="hidden" class="form-control" id="modal_id" name="modal_id" value="final_modal">
								 Unit will not be accepted, do you wish to continue?
					      </div>
					      <div class="modal-footer">
					        <button type="submit" class="btn btn-primary">Yes</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					      </div>
				  		</form>
				    </div>
				  </div>
			</div>
			<!-- End of Confirmation Modal -->


		  	<div class= "col-md-12">
		  		<div class="card border-primary mb-3">
		  			<div class="card-header text-primary" style="background-color: #343758; color: #e9ecef !important;">
		  				<h5>ACTIVITIES</h5>
		  			</div>

		  			<?php $activities = $this->Admin_model->get_public_activities_per_ticket($this->uri->segment(3)); ?>
		  			<?php if($activities) :?>
		  				<?php foreach($activities as $activity) :?>
					  	<div class="card-body text-primary">
					  		<div class="row" style="border-bottom: 1px #808080 solid">
							    <div class="col-md-4 border-primary">
							    	<span><?= $activity->firstname ?> <?= $activity->lastname ?> |<br> <?= date("F d, Y H:i A",strtotime($activity->date_created)); ?> </span>
							    </div>
							    <div class="col-md-8 border-primary">
							    	<?php echo $activity->description; ?>
							    </div>
							</div>
					  	</div>
					 <?php endforeach; ?>
				  <?php endif; ?>

				</div>
		  	</div>

		  	<div class= "col-md-12">
		  		<div class="card border-primary mb-3">
		  			<div class="card-header text-primary" style="background-color: #343758; color: #e9ecef !important;">
		  				<h5>ADD NOTE</h5>
		  			</div>
				  	<div class="card-body text-primary">
				  		<form action="<?= base_url('handover/add_ticket_note') ?>" role="form" method="POST" enctype="multipart/form-data">
			  			<input type="hidden" class="form-control" id="ticket_id" name="ticket_id" placeholder="" value="<?= $this->uri->segment(3) ?>">
			  			<input type="hidden" class="form-control" id="ticket_number" name="ticket_number" placeholder="" value="<?= $ticket_details->ticket_number ?>">
				  		<div class="row">
						    <div class="col-md-12">
						    	<div class="form-group">
						    		<label for="status">VIEW STATUS</label>
						    		<div class="custom-control custom-checkbox">
						    			<input type="hidden" name="status" value="0" />
							          <input type="checkbox" class="custom-control-input" id="status" name="status" value="1">
							          <label class="custom-control-label" for="status">PRIVATE</label>
							        </div>
						    	</div>
						    </div>
						    <div class="col-md-12">
						    	<div class="form-group">
						    		<?php $users = $this->Admin_model->get_users(); ?>
						    		<?php if($users): ?>
							    		<label for="team_huddle">TEAM HUDDLE</label>
							            <select class="custom-select d-block w-100" id="team_huddle" name="team_huddle">
							            	<option value=""> -- Please Choose -- </option>
							            	<?php foreach($users as $user): ?>
							              	<option value="<?= $user->user_id ?>"> <?= $user->lastname ?>, <?= $user->firstname ?> </option>
							              	<?php endforeach; ?>
							            </select>
							        <?php endif; ?>
						    	</div>
						    </div>

						    <div class="col-md-12">
						    	<div class="form-group">
						    		 <label for="note"> NOTE</label>
						            <textarea class="form-control" rows="5" id="note" name="note"></textarea>
						    	</div>
						    </div>

						    <div class="col-md-12">
						    	<div class="form-group">
						    		<label for="file_upload">UPLOAD</label>
						            <input type="file" accept="image/*" id="capture" name="capture_img" capture="camera">
						    	</div>
						    </div>
						</div>
						<br>
						<button type="submit" class="btn btn-dark">Add Note</button>
					</form>
				  </div>

				</div>
			</div>
	  	</div>
	  	<div class="col-md-3">
	  		<div class="card text-white bg-primary mb-3">
			  <div class="card-header">DETAILS</div>
			  <div class="card-body">
		  		<div class="row">
			            <label for="project">Project</label>
			            <input type="text" class="form-control" id="project" name="project" placeholder="" value="<?= $ticket_details->project_name ?>">

			            <label for="tower">Tower</label>
			            <input type="text" class="form-control" id="tower" name="tower" placeholder="" value="<?= $ticket_details->tower ?>">

			            <label for="unit_number">Unit Number</label>
			            <input type="text" class="form-control" id="unit_number" name="unit_number" placeholder="" value="<?= implode("','",$unit_number) ?>">

			            <label for="unit">Unit</label>
			            <input type="text" class="form-control" id="unit" name="unit" placeholder="" value="<?= implode("','",$unit_type) ?>">

			            <label for="parking">Parking Number</label>
			            <input type="text" class="form-control" id="parking" name="parking" placeholder="" value="<?= implode("','",$parking) ?>">

			            <label for="customer_name">Customer Name</label>
			            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="" value=" <?= implode("','",$customer_name) ?>">

			            <label for="ticket_type">Ticket Type</label>
			            <input type="text" class="form-control" id="ticket_type" name="ticket_type" placeholder="" value="<?= $ticket_details->subject ?>">

			            <label for="assigned_to">Assigned To</label>
			            <input type="text" class="form-control" id="assigned_to" name="assigned_to" placeholder="" value="<?= $ticket_details->a_lastname ?>, <?= $ticket_details->a_firstname ?>">

			            <label for="status">Status</label>
			            <input type="text" class="form-control" id="status" name="status" placeholder="" value="Call Confirmation">

		    	</div>  
			  </div>
			</div>
	  	</div>




  	</div>
  </div>