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
						<th>Description</th>
						<th>Activated</th>
						<th>Added</th>
						<th>Last Update</th>
						<th>Show Data</th>
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
										<td><?= ($company['is_activated'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">in-Active</span>') ?></td>
										<td><?= date("F d, Y",strtotime($company['created_at'])) ?></td>
										<td><?= ($company['updated_at'] == 0 ? 'Data not updated' : 'Updated as of '.date("F d, Y",strtotime($company['updated_at']))) ?></td>
										<td class="text-center"><a href="<?= base_url('sap/project') ?>/<?= $company['id'] ?>" data-uri="show_company"><button class="edit_company btn btn-circle btn-sm btn-outline-dark"><span class="fa fa-search"></span></button></a></td>
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