<div class="table-container col-12 col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<p class="lead mb-0">Project list with company code</p>
		</div>
		<div class="card-body">
			<table class="project_table table table-striped">
				<thead>
					<tr>
						<th>Project Code</th>
						<th>Company Code</th>
						<td>Description</td>
						<th>Added</th>
						<th>Updated</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if ($list) {
							foreach ($list as $project) {
								?>
									<tr>
										<td><?= $project['project_code'] ?></td>
										<td><?= $project['company_code'] ?></td>
										<td><?= $project['project_description'] ?></td>
										<td><?= date("F d, Y",strtotime($project['created_at'])) ?></td>
										<td><?= (empty($project['updated_at']) ? 'Updated as of '.date("F d, Y",strtotime($project['updated_at'])) : 'Data not updated') ?></td>
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
				  		<a href="<?= base_url('sap/project/create') ?>" data-uri="create_project"><button class="add_auth btn btn-info btn-block">Fetch New Data</button></a>
				  </div>
				  <div class="flex-grow-1">
						<a href="<?= base_url('sap/project') ?>" data-uri="project"><button class="refresh_projects btn btn-default btn-secondary btn-block">Refresh</button></a>
				  </div>
				  <div>
				  		<a href="<?= base_url('sap/project') ?>"><button class="back_dashlist btn btn-default btn-outline-dark">Back</button></a>
				  </div>				
			</div>			
		</div>
	</div>
</div>