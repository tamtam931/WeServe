<?= $this->load->view('top', '', TRUE) ?>
<div class="container py-5 mb5">
<!--
	Updated: from weserve_merge
	date: 12-27-19
	Author: Ben Zarmaynine E. Obra
-->	
  <h3 class="mb-3">TURN OVER DASHBOARD</h3>
  	<div class="row">

  		<div class="col-md-12">
	    	<div id="">
		    	<form action="<?= base_url('inbound/dashboard'); ?>" method="get" role="form" class="needs-validation">
	        		<div class="row">
	        			<div class="col-md-4 mb-3">
				            <label for="project">Project</label>

				            <select class="custom-select d-block w-100" id="project" name="project" required>
				              	<option value=""> -- Please Choose --</option>
				              	<option value="TEM" <?php if(!empty($_GET)){if($_GET['project'] == "TEM"){echo 'selected';}} ?>> The Estate Makati</option>
				            </select>
				        </div>
				        <div class="col-md-4 mb-3">
				            <label for="tower">Tower </label>
				            <select class="custom-select d-block w-100" id="tower" name="tower" required>
				              	<option value=""> -- Please Choose --</option>
				              	<option value="1" <?php if(!empty($_GET)){if($_GET['tower'] == "1"){echo 'selected';}} ?>> 1 </option>
				            </select>
				        </div>
				        <div class="col-md-4 mb-3">
				        	<br>
				        	<button type="submit" class="btn btn-dark" id="btn_search">SEARCH</button>
				        </div>
	        		</div>
	        		
				</form>
			</div>
		</div>
		<?php if(!empty($_GET['project']) && !empty($_GET['tower'])): ?>
  		<div class="col-md-8" id="turnover_div">
		  	<table class="table table-bordered" id="turnover_table">
			  <tbody>
			  	<?php $units = $this->Admin_model->get_all_unit_floors_by_project_tower($_GET['project'], $_GET['tower']);  ?>
			  	<?php foreach($units as $floor): ?>
			    <tr>
				    <th scope="row"><?= $floor->unit_number ?></th>
				     <?php $units = $this->Admin_model->get_units_per_floor($floor->unit_number); ?>
			    	<?php foreach($units as $unit): ?>
			    		<?php $design = $this->Admin_model->get_color_status_per_unit($unit->status); 
			    			$unit_details = $this->Admin_model->get_customer_transaction_by_unit($unit->id); ?>
			    		<?php if($design->id == 8) : #QUALIFIED FOR TURNOVER ?> 
				    	<td style="background-color: <?= $design->color; ?>"><a href="<?= base_url('inbound/schedule_specific/'.$unit_details->customer_number); ?>"><?= $unit->unit_number; ?><?= $unit->unit_desc; ?></a></td>
				    	<?php else:?>
				    		<td style="background-color: <?= $design->color; ?>"><?= $unit->unit_number; ?><?= $unit->unit_desc; ?></td>
				    	<?php endif;?>
			      	<?php endforeach; ?>
			    </tr>
				<?php endforeach; ?>

			  </tbody>
			</table>
		</div>
		<div class="col-md-4" id="status_div">
			<div class="card text-white border-primary mb-3">
			  <div class="card-body">
		  		<div class="row">
		  			<table class="table table-bordered text-center" id="status_table">
		  				<thead>
		  					<tr>
						      <th scope="col"></th>
						      <th scope="col">Current Status</th>
						      <th scope="col">Total</th>
						    </tr>
		  				</thead>
			  			<tbody>
			  				<tr>
				    			<th scope="row" colspan="2">Total Unit Inventory</th>
				    			<td>188</td>
			    			</tr>
			  			<?php $statuses = $this->Admin_model->get_all_dashboard_status(); $cnt = 0;?>
			  			<?php foreach($statuses as $status): ?>
			  				<?php $cnt = $cnt +1; ?>
			  				<?php if($cnt == 1) :?>
			  					<th colspan="2"><a href="<?= base_url('admin/dashboard/'.$status->status_description); ?>">Not Ready for Turnover</a></th>
			  					<td>23</td>
			  				<?php elseif($cnt == 8) :?>
			  					<th colspan="2">Ready for Turnover</th>
			  					<td>13</td>
			  				<?php elseif($cnt == 11) :?>
			  					<th colspan="2">With Concern</th>
			  					<td>11</td>
			  				<?php elseif($cnt == 14) :?>
			  					<th colspan="2">Complete Transaction</th>
			  					<td>54</td>
			  				<?php endif;?>
			  				<tr>
				    			<td scope="row" style="background-color: <?= $status->color; ?>"><a href="<?= base_url('admin/dashboard/'.$status->status_description); ?>"><?= $status->status_description; ?></a></td>
				    			<td>1</td>
				    			<td>5</td>

			    			</tr>
			    			

			  			<?php endforeach; ?>
				  		</tbody>
				  	</table>
			           
		    	</div>  
			  </div>
			</div>
		</div>

	<?php endif; ?>



  </script>