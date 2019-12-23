<div class="table-container col-12 col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<p class="lead mb-0">Unit Type List</p>
		</div>
		<div class="card-body">
			<table class="unitType_table table table-striped">
				<thead>
					<tr>
						<th>Unit Type Code</th>
						<th>Description</th>
						<th>Unit Type Abbreviation</th>
						<th>Activated</th>
						<th>Added</th>
						<th>Updated</th>
						<th>Show Data</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if ($list) {
							
							foreach ($list as $unitType) {
								?>
									<tr>
										<td><?= $unitType['unit_type_code'] ?></td>
										<td><?= $unitType['unit_type'] ?></td>
										<td><?= $unitType['unit_type_abbreviation'] ?></td>
										<td><?= ($unitType['status'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">in-Active</span>') ?></td>										
										<td><?= date("F d, Y",strtotime($unitType['created_at'])) ?></td>
										<td><?= ($unitType['updated_at'] == 0 ? 'Data not updated' : 'Updated as of '.date("F d, Y",strtotime($unitType['updated_at']))) ?></td>
										<td><a href="<?= base_url('sap/project') ?>/<?= $unitType['id'] ?>" data-uri="show_unitType"><button class="edit_unitType btn btn-circle btn-sm btn-outline-dark"><span class="fa fa-search"></span></button></a></td>	
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
				  		<a href="<?= base_url('sap/project/create') ?>" data-uri="create_unitType"><button class="add_unitType btn btn-info btn-block">Fetch New Data</button></a>
				  </div>
				  <div class="flex-grow-1">
						<a href="<?= base_url('sap/project') ?>" data-uri="unitType"><button class="refresh_unitTypes btn btn-default btn-secondary btn-block">Refresh</button></a>
				  </div>
				  <div>
				  		<a href="<?= base_url('sap/project') ?>"><button class="back_dashlist btn btn-default btn-outline-dark">Back</button></a>
				  </div>				
			</div>
		</div>
	</div>
</div>