<div class="table-container col-12 col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<p class="lead mb-0">Unit List</p>
		</div>
		<div class="card-body">
			<table class="unit_table table table-striped">
				<thead>
					<tr>
						<th>Unit/Parking number</th>
						<th>Description</th>
						<th>Unit Type</th>
						<th>Unit/Parking Area</th>

					</tr>
				</thead>
				<tbody>
					<?php
						if ($list) {
							
							foreach ($list as $unit) {
								?>
									<tr>
										<td><?= ($unit['unit_number'] ? $unit['unit_number'] : $unit['parking_number']) ?></td>
										<td><?= $unit['unit_desc'] ?></td>
										<td><?= $unit['unit_type'] ?></td>
										<td><?= $unit['unit_area'] ?></td>
	
									</tr>
								<?php
							}
													
						}
					?>
				</tbody>
			</table>			
		</div>
		<div class="card-footer">
			<div class="d-flex">
				  <div class="flex-grow-1">
				  		<a href="<?= base_url('sap/unit/create') ?>"><button class="add_unit btn btn-info btn-block">Fetch New Data</button></a>
				  </div>
				  <div class="flex-grow-1">
						<a href="<?= base_url('sap/unit') ?>"><button class="refresh_units btn btn-default btn-secondary btn-block">Refresh</button></a>
				  </div>
				  <div>
				  		<a href="<?= base_url('sap/project') ?>"><button class="back_dashlist btn btn-default btn-outline-dark">Back</button></a>
				  </div>				
			</div>
		</div>
	</div>
</div>