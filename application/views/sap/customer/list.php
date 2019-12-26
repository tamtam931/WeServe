<div class="table-container col-12 col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<p class="lead mb-0">Customer List</p>
		</div>
		<div class="card-body">
			<table class="customer_table table table-striped">
				<thead>
					<tr>
						<th>Customer Number</th>
						<th>Name</th>
						<th>Activated</th>
						<th>Added</th>
						<th>Last Update</th>
						<th>Show Data</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($list as $data) {
							?>
								<tr>
									<td><?= $data['customer_number'] ?></td>
									<td><?= $data['customer_name'] ?></td>
									<td><?= ($data['status'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">in-Active</span>') ?></td>									
									<td><?= date("F d, Y",strtotime($data['created_at'])) ?></td>
									<td><?= ($data['updated_at'] == 0 ? 'Data not updated' : 'Updated as of '.date("F d, Y",strtotime($data['updated_at']))) ?></td>
									<td class="text-center"><a href="#!"><button class="btn btn-circle btn-sm btn-outline-dark"><span class="fa fa-search"></span></button></a></td>									
								</tr>
							<?php
						}
					?>
				</tbody>
			</table>			
		</div>
		<div class="card-footer">
			<div class="d-flex">
				  <div class="flex-grow-1">
				  		<a href="<?= base_url('sap/customer/create') ?>"><button class="add_customer btn btn-info btn-block">Fetch New Data</button></a>
				  </div>
				  <div class="flex-grow-1">
						<a href="<?= base_url('sap/customer') ?>"><button class="refresh_customers btn btn-default btn-secondary btn-block">Refresh</button></a>
				  </div>				
			</div>
		</div>
	</div>
</div>