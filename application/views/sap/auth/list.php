<div class="table-container col-12 col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<h4 class="mb-1">Configuration List</h4>
		</div>
		<div class="card-body">
			<table class="auth_table table table-striped">
				<thead>
					<tr>
						<th>Complete URL</th>
						<td>User</td>
						<th>Added</th>
						<th>Active</th>
						<th>Show</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($list as $data) {
							
							?>
								<tr>
									<td><?= $data['sap_scheme'].'://'.$data['sap_domain'].$data['sap_base'] ?></td>
									<td>
										<?php
											if ($data['auth_username'] && $data['auth_password']) {
												
												echo $data['auth_username'];

											} else if($data['auth_username'] && !$data['auth_password']){

												?><span class="text-warning">Username Only</span><?php

											} else if(!$data['auth_username'] && $data['auth_password']){

												?><span class="text-warning">Password Only</span><?php

											} else {

												?><span class="text-danger">No Authentication Credentials</span><?php
											}
										?>
									</td>
									<td><?= date("F d, Y",strtotime($data['created_at'])) ?></td>
									<td><a href="<?= base_url('sap/auth/') ?><?= $data["id"] ?>">
										<?= (!$data['deleted_at'] ? '<button class="del_auth btn btn-success btn-md">Yes</button>' : '<button class="del_auth btn btn-danger btn-md">No</button>') ?>
									</a></td>
									<td><a href="<?= base_url('sap/auth/') ?><?= $data["id"] ?>/edit"><button class="edit_auth btn btn-circle btn-info btn-md"><span class="fa fa-search"></span></button></a></td>
								</tr>
							<?php

						}
					?>			
				</tbody>
			</table>			
		</div>
		<div class="card-footer">
			<a href="<?= base_url('sap/auth/create') ?>"><button class="add_auth btn btn-info btn-block">Make New Authentication</button></a>
		</div>
	</div>
</div>