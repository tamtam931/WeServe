<div class="table-container col-12 col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<p class="lead mb-0">Company List</p>
		</div>
		<div class="card-body">
			<table class="company_table table table-striped">
				<thead>
					<tr>
						<th>Company Code</th>
						<td>Description</td>
						<th>Added</th>
						<th>Updated</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if($list){
							foreach ($list as $company) {
								?>
									<tr>
										<td><?= $company['company_code'] ?></td>
										<td><?= $company['company_description'] ?></td>
										<td><?= date("F d, Y",strtotime($company['created_at'])) ?></td>
										<td><?= (empty($company['updated_at']) ? 'Updated as of '.date("F d, Y",strtotime($company['updated_at'])) : 'Data not updated') ?></td>
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
				  		<a href="<?= base_url('sap/project/create') ?>" data-uri="create_company"><button class="add_auth btn btn-info btn-block">Fetch New Data</button></a>
				  </div>
				  <div class="flex-grow-1">
						<a href="<?= base_url('sap/project') ?>" data-uri="company"><button class="refresh_companies btn btn-default btn-secondary btn-block">Refresh</button></a>
				  </div>
				  <div>
				  		<a href="<?= base_url('sap/project') ?>"><button class="back_dashlist btn btn-default btn-outline-dark">Back</button></a>
				  </div>				
			</div>
		</div>
	</div>
</div>