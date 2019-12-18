<?= $this->load->view('top', '', TRUE) ?>

<?php if($customer):  ?>
<div class="container py-5 mb5">
	<div class="ht-tm-codeblock">
		<ul class="nav nav-tabs ht-tm-element">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#customer_details">BUYER'S INFORMATION</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#properties_list">PROPERTY INFORMATION</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#tickets_list">LIST OF TICKETS</a>
		  </li>
		</ul>
	</div>


<div class="tab-content">
  
  	<div class="tab-pane container active" id="customer_details" style="padding-top: 30px;">
  		<h3 class="mb-3">BUYER'S INFORMATION</h3>
	  	<div class="row" >
			<div class="col-md-6 mb-3">
				<label for="customer_name">Customer Name</label>
		    	<input type="text" class="form-control" id="customer_name" name="customer_name" value="<?= $customer->customer_name; ?>" readonly>
	        </div>

	        <div class="col-md-6 mb-3">
				<label for="tin">TIN Number</label>
		    	<input type="text" class="form-control" id="tin" name="tin" value="<?= $customer->tin; ?>" readonly>
	        </div>

	        <div class="col-md-6 mb-3">
				<label for="birthday">Date of Birth</label>
		    	<input type="text" class="form-control" id="birthday" name="birthday" value="<?= $customer->birthday; ?>" readonly>
	        </div>

	        <div class="col-md-6 mb-3">
				<label for="address">Billing Address</label>
		    	<input type="text" class="form-control" id="address" name="address" value="<?= $customer->address; ?>" readonly>
	        </div>

	        <div class="col-md-6 mb-3">
				<label for="gender">Gender</label>
		    	<input type="text" class="form-control" id="gender" name="gender" value="<?= $customer->gender; ?>" readonly>
	        </div>

	        <div class="col-md-6 mb-3">
				<label for="telephone">Telephone Number</label>
		    	<input type="text" class="form-control" id="telephone" name="telephone" value="<?= $customer->telephone; ?>" readonly>
	        </div>

	        <div class="col-md-6 mb-3">
				<label for="civil_status">Civil Status</label>
		    	<input type="text" class="form-control" id="civil_status" name="civil_status" value="<?= $customer->civil_status; ?>" readonly>
	        </div>

	        <div class="col-md-6 mb-3">
				<label for="mobile">Mobile Number</label>
		    	<input type="text" class="form-control" id="mobile" name="mobile" value="<?= $customer->mobile_number; ?>" readonly>
	        </div>

	        <div class="col-md-6 mb-3">
				<label for="spouse">Name of Spouse</label>
		    	<input type="text" class="form-control" id="spouse" name="spouse" value="<?= $customer->spouse; ?>" readonly>
	        </div>

	         <div class="col-md-6 mb-3">
				<label for="fax">Fax Number</label>
		    	<input type="text" class="form-control" id="fax" name="fax" value="<?= $customer->fax; ?>" readonly>
	        </div>

			</div>
		</div>

		<div class="tab-pane container" id="properties_list" style="padding-top: 30px;">
			<?php $properties = $this->Admin_model->get_all_properties_by_tin($customer->tin); ?>
			<?php if ($properties): ?>
			 <h3 class="mb-3">LIST OF PROPERTIES</h3>
			 <div class="row">
			 	<table class="table" id="properties_table">
					  <thead class="thead-light">
					    <tr>
					      <th scope="col">Property Name</th>
					      <th scope="col">Tower Number</th>
					      <th scope="col">Unit Type</th>
					      <th scope="col">Unit Number</th>
					      <th scope="col">Customer Number</th>
					      <th scope="col">Options</th>
					    </tr>
					  </thead>
					  <tbody>
					 <?php foreach ($properties as $property) : ?>
					    <tr> 
					   	  <th scope="row"><?= $property->project ?></th>
					      <th scope="row"><?= $property->tower ?></th>
					      <th scope="row"><?= $property->unit_type ?></th>
					      <th scope="row"><?= $property->unit_number ?></th>
					      <th scope="row"><?= $property->customer_number ?></th>
					      <th scope="row">
					      	 <button type="button" onclick="get_buyer_details(<?=$property->customer_number;?>);" class="btn btn-sm btn-primary my-1 my-sm-0">
					          <span class="fas fa-eye mr-1"></span>
					          View</button>
					      </th>
					  	</tr>
					  <?php endforeach; ?>
						</tbody>
					</table>
			 </div>
			 <div class="row" id="properties_details">
			 </div>
			<?php endif; ?>
		</div>

		<div class="tab-pane container" id="tickets_list" style="padding-top: 30px;">
			<?php $tickets = $this->Admin_model->get_all_tickets_by_customer_number($this->uri->segment(3)); ?>
			<?php if($tickets): ?>
				<div class="row">
				<?php foreach($tickets as $ticket) : ?>
				<div class="col-md-4">
					<div class="card border-primary mb-3" >
					  <div class="card-header"><?= $ticket->ticket_number ?></div>
					  <div class="card-body text-primary">
					    <h5 class="card-title"><?= $ticket->category ?></h5>
					    <p class="card-text">
					    	<b> Description: </b> <?= $ticket->subject ?><br>
					    	<b> Date Created: </b> <?= $ticket->date_created?><br>
					    	<b> Currently Assigned to: </b> <?= $ticket->a_lastname ?>, <?= $ticket->a_firstname ?><br>
					    	<b> Date Assigned: </b> <?= $ticket->last_update ?><br>
					    	</p>
					  </div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
		<?php endif; ?>	
		</div>
	</div>
<?php endif; ?>
</div>

<script type="text/javascript">
function get_buyer_details(customer_number){
 	$('#properties_details').empty();
	$ajaxData = $.ajax({
		url: "<?= base_url('admin/get_buyer_details') ?>",
		method: "GET",
		data: {customer_number : customer_number},
		dataType: "html",
		success:function(data){
			$('#properties_details').html(data);
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