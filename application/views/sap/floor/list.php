<div class="table-container col-12 col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<p class="lead mb-0">Floor/Phases List</p>
		</div>
		<div class="card-body">
			<table class="company_table table table-striped">
				<thead>
					<tr>
						<th>Floor Code</th>
						<th>Company Code</th>
						<th>Floor Code</th>
						<th>Activated</th>
						<th>Added</th>
						<th>Last Update</th>
						<th>Show Data</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if($list){
							foreach ($list as $floor) {
								?>
									<tr>
										<td><?= $floor['floor_code'] ?></td>
										<td><?= $floor['company_code'] ?></td>
										<td><?= $floor['project_code'] ?></td>
										<td><?= ($floor['is_activated'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">in-Active</span>') ?></td>
										<td><?= date("F d, Y",strtotime($floor['created_at'])) ?></td>
										<td><?= ($floor['updated_at'] == 0 ? 'Data not updated' : 'Updated as of '.date("F d, Y",strtotime($floor['updated_at']))) ?></td>
										<td class="text-center"><a href="<?= base_url('sap/project') ?>/<?= $floor['id'] ?>" data-uri="show_floor"><button class="edit_floor btn btn-circle btn-sm btn-outline-dark"><span class="fa fa-search"></span></button></a></td>
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
				  		<a href="<?= base_url('sap/project/create') ?>" data-uri="create_floor"><button class="add_floor btn btn-info btn-block">Fetch New Data</button></a>
				  </div>
				  <div class="flex-grow-1">
						<a href="<?= base_url('sap/project') ?>" data-uri="floor"><button class="refresh_floors btn btn-default btn-secondary btn-block">Refresh</button></a>
				  </div>
				  <div>
				  		<a href="<?= base_url('sap/project') ?>"><button class="back_dashlist btn btn-default btn-outline-dark">Back</button></a>
				  </div>				
			</div>
		</div>
	</div>
</div>