<?= $this->load->view('top', '', TRUE) ?>
<div class="container py-5 mb5">
  <h3 class="mb-3">TICKET DETAILS</h3>

  	<div class="row">
		<div class= "col-md-12">
	  		<table class="table" id="tickets_table">
			  	<thead class="thead-light">
				    <tr>
				      <th scope="col">Ticket No.</th>
				      <th scope="col">Created By</th>
				      <th scope="col">Date Created</th>
				      <th scope="col">Last Update</th>
				      <th scope="col">TAT (DD:MM:SS)</th>
				    </tr>
			  	</thead>
			  	<tbody>
				    <tr>
				      <th scope="row"><?= $ticket_details->ticket_number ?></th>
				      <th scope="row"><?= $ticket_details->lastname; ?>, <?= $ticket_details->firstname; ?></th>
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
				  	<?php $schedule = $this->Admin_model->get_schedules_per_customer_number($ticket_details->customer_number); ?>
				  	<?php if($schedule): ?>
				    <p class="card-text">
				    	<div class="">
				    		<b>Date Qualified for Turnover: </b> December 1, 2019 9:00 AM 
				    	</div>
				    	<div class="">
				    		<b>Turnover Schedule: </b> <?= $schedule->schedule ?>
				    	</div>
				    </p>
					<?php endif; ?>
				    <a href="<?= base_url('outbound/schedule_specific/'.$ticket_details->customer_number); ?>" class="btn btn-dark">Turnover Schedule</a>

					<button type="button" class="btn btn-outline-dark">No Show</button>
				  </div>
				</div>
		  	</div>

		  	<div class= "col-md-12">
		  		<div class="card border-primary mb-3">
		  			<div class="card-header text-primary" style="background-color: #343758; color: #e9ecef !important;">
		  				<h5>ACTIVITIES</h5>
		  			</div>
				  	<div class="card-body text-primary">
				  		<div class="row" style="border-bottom: 1px #808080 solid">
						    <div class="col-md-4 border-primary">
						    	<span>Unit Owner | December 1, 2019 9:00 AM </span>
						    </div>
						    <div class="col-md-8 border-primary">
						    	Turnover schedule has been successfully booked by Unit Owner.
						    </div>
						</div>
				  </div>
				</div>
		  	</div>

		  	<div class= "col-md-12">
		  		<div class="card border-primary mb-3">
		  			<div class="card-header text-primary" style="background-color: #343758; color: #e9ecef !important;">
		  				<h5>ADD NOTE</h5>
		  			</div>
				  	<div class="card-body text-primary">
				  		<div class="row">
						    <div class="col-md-12">
						    	<div class="form-group">
						    		<label for="status">VIEW STATUS</label>
						    		<div class="custom-control custom-checkbox">
							          <input type="checkbox" class="custom-control-input" id="status">
							          <label class="custom-control-label" for="status">PRIVATE</label>
							        </div>
						    	</div>
						    </div>
						    <div class="col-md-12">
						    	<div class="form-group">
						    		<label for="team_huddle">TEAM HUDDLE</label>
						            <select class="custom-select d-block w-100" id="team_huddle" name="team_huddle">
						              	<option value=""> -- Please Choose -- </option>
						            </select>
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
						<button type="button" class="btn btn-dark">Add Note</button>
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
			            <input type="text" class="form-control" id="unit_number" name="unit_number" placeholder="" value="<?= $ticket_details->unit_number ?><?= $ticket_details->unit_desc ?>">

			            <label for="unit">Unit</label>
			            <input type="text" class="form-control" id="unit" name="unit" placeholder="" value="<?= $ticket_details->unit_type ?>">

			            <label for="parking">Parking Number</label>
			            <input type="text" class="form-control" id="parking" name="parking" placeholder="" value="<?= $ticket_details->parking_number ?>">

			            <label for="customer_name">Customer Name</label>
			            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="" value="<?= $ticket_details->customer_name ?>">

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