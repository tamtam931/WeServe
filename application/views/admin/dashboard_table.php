
  		<div class="col-md-8" id="turnover_div">
		  	<table class="table table-bordered table-responsive" id="turnover_table">

			  <tbody>
				<?php
					if (isset($floors)) {
						for ($y=0; $y < count($floors); $y++) {
							?>
								<tr>
									<th data-uri="<?= base_url('sap/unit/company/'.$project["company_code"].'/project/'.$project["project_code_sap"].'') ?>"><?= $floors[$y]['floor_code'] ?></th>
									<?php

										/*
											Get all units using Guzzle connection thru SAP
											Date: 12-19-19
											Author: Ben Zarmaynine E. Obra			
										*/

						  				$units = $this->weserve_sap->all($sub_resource_units,[
						  					'type' => 'GET',
						  					'params' => 'phase',
						  					'value' => $floors[$y]['floor_code']
						  				]);

						  				$floor_units = json_decode($units);
						  				//End

						  				for ($x=0; $x < count($floor_units); $x++) {

						  					$attributes = $this->weserve_sap->generateUnitAttributes($floor_units[$x]);

						  					if ($floor_units[$x]->STATUS->TEXT == 'WAIT') {
						  					 	
						  					 	continue;
						  					 } 
						  					
						  					?>
						  						<td style="background-color: <?= (isset($attributes['color']) ? $attributes['color'] : '') ?>">
						  							<a href="#!" class="get_quotation" data-status="<?= (isset($attributes['status_description']) ? $attributes['status_description'] : 'N\A') ?>">
						  								<?= $floor_units[$x]->REFNO ?>
						  							</a>
						  						</td>
						  					<?php
						  				}
									?>																	
								</tr>

				  			<?php							
						}						
					} else {

						echo "<h2 class='text-info'>No Data found on this Project</h2>";
					}
				?>

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
						      <th scope="col"><?= $project['project'] ?></th>
						      <th scope="col">Current Status</th>
						      <th scope="col">Total</th>
						    </tr>
		  				</thead>
			  			<tbody>
			  				<tr>
				    			<th scope="row" colspan="2">Total Unit Inventory</th>
				    			<td class="total_unit text-success font-weight-bold">11</td>
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
				    			<td scope="row" style="background-color: <?= $status->color; ?>"><a href="#!"><?= $status->status_description; ?></a></td>
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